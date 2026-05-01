#include <WiFiS3.h>
#include <DHT.h>
#include <LiquidCrystal.h>

// -------------------------
// WIFI
// -------------------------
char nome_rete[] = "TIM-51297409";
char password[] = "jSf6CaXcL7YZfi2h";

const char server[] = "192.168.1.8";  // IP PC con Laravel
WiFiClient client;

// -------------------------
// LCD
// -------------------------
LiquidCrystal lcd(2, 3, 4, 5, 6, 7);

// -------------------------
// SENSORI
// -------------------------
#define DHTPIN 8
#define DHTTYPE DHT11

const int PIN_SUOLO = A0;
const int PIN_ACQUA = A1;
const int PIN_RELE = A2;

DHT dht(DHTPIN, DHTTYPE);

// -------------------------
// VARIABILI
// -------------------------
bool releAcceso = false;
bool statoRelePrecedente = false;

unsigned long ultimaLettura = 0;
const unsigned long intervalloLettura = 20000;  // 20 secondi

// Configurazione presa da Laravel
int sogliaSuolo = 700;
int durataIrrigazione = 5;                    // secondi
unsigned long intervalloIrrigazione = 20000;  // millisecondi, valore iniziale per test

unsigned long ultimaIrrigazione = 0;

// -------------------------
// SETUP
// -------------------------
void setup() {
  Serial.begin(9600);
  delay(2000);

  dht.begin();

  pinMode(PIN_RELE, OUTPUT);

  // Relè attivo LOW → inizialmente spento
  digitalWrite(PIN_RELE, HIGH);
  releAcceso = false;
  statoRelePrecedente = false;

  lcd.begin(16, 2);
  lcd.clear();
  lcd.setCursor(0, 0);
  lcd.print("Sistema avviato");
  lcd.setCursor(0, 1);
  lcd.print("WiFi...");

  Serial.println("Connessione al WiFi...");

  while (WiFi.begin(nome_rete, password) != WL_CONNECTED) {
    Serial.println("Connessione fallita, riprovo...");
    delay(2000);
  }

  Serial.println("WiFi connesso!");

  lcd.clear();
  lcd.setCursor(0, 0);
  lcd.print("WiFi connesso");
  delay(2000);

  lcd.clear();

  // Lettura iniziale configurazione pianta
  leggiConfigurazionePianta();
}

// -------------------------
// LOOP
// -------------------------
void loop() {

  if (millis() - ultimaLettura >= intervalloLettura) {
    ultimaLettura = millis();

    float temperatura = dht.readTemperature();
    float umiditaAria = dht.readHumidity();

    int valoreSuolo = analogRead(PIN_SUOLO);
    int valoreAcqua = analogRead(PIN_ACQUA);

    Serial.println("----------- LETTURA SENSORI -----------");

    if (isnan(temperatura) || isnan(umiditaAria)) {
      Serial.println("Errore lettura DHT11");
      return;
    }

    // Legge eventuale categoria aggiornata da Laravel
    leggiConfigurazionePianta();

    Serial.print("Temperatura: ");
    Serial.print(temperatura);
    Serial.println(" °C");

    Serial.print("Umidita aria: ");
    Serial.print(umiditaAria);
    Serial.println(" %");

    Serial.print("Suolo: ");
    Serial.println(valoreSuolo);

    Serial.print("Acqua: ");
    Serial.println(valoreAcqua);

    Serial.print("Soglia suolo DB: ");
    Serial.println(sogliaSuolo);

    Serial.print("Durata irrigazione DB: ");
    Serial.print(durataIrrigazione);
    Serial.println(" sec");

    Serial.print("Intervallo irrigazione DB: ");
    Serial.print(intervalloIrrigazione / 1000);
    Serial.println(" sec");

    // -------------------------
    // LOGICA RELÈ / POMPA
    // -------------------------
    statoRelePrecedente = releAcceso;

    // condizioni base
    bool acquaPresente = valoreAcqua > 300;
    bool terrenoSecco = valoreSuolo > sogliaSuolo;
    bool temperaturaAlta = temperatura > 28;

    // tempo passato dall'ultima irrigazione
    unsigned long tempoPassato = millis() - ultimaIrrigazione;

    // tempo minimo di sicurezza per non irrigare troppo spesso
    unsigned long intervalloMinimoSicurezza = 20000;  // 20 secondi per test

    // 1) irrigazione programmata secondo categoria
    bool irrigazioneProgrammata = tempoPassato >= intervalloIrrigazione;

    // 2) irrigazione per terreno secco, ma non continua
    bool irrigazionePerSuolo = terrenoSecco && tempoPassato >= intervalloMinimoSicurezza;

    // 3) irrigazione per temperatura alta, ma solo dopo un po' di tempo
    bool irrigazionePerCaldo = temperaturaAlta && tempoPassato >= intervalloMinimoSicurezza;

    if (
      acquaPresente && (irrigazioneProgrammata || irrigazionePerSuolo || irrigazionePerCaldo)) {
      Serial.println("Pompa attiva");

      if (irrigazioneProgrammata) {
        Serial.println("Motivo: tempo categoria raggiunto");
      }

      if (irrigazionePerSuolo) {
        Serial.println("Motivo: terreno secco");
      }

      if (irrigazionePerCaldo) {
        Serial.println("Motivo: temperatura alta");
      }

      digitalWrite(PIN_RELE, LOW);
      releAcceso = true;

      delay(durataIrrigazione * 1000);

      digitalWrite(PIN_RELE, HIGH);
      releAcceso = false;

      ultimaIrrigazione = millis();

    } else {
      digitalWrite(PIN_RELE, HIGH);
      releAcceso = false;
    }

    Serial.print("Rele: ");
    Serial.println(releAcceso ? "ACCESO" : "SPENTO");

    // -------------------------
    // INVIO DATI API
    // -------------------------
    inviaDatiPHP(
      temperatura,
      umiditaAria,
      valoreSuolo,
      valoreAcqua,
      releAcceso);

    // -------------------------
    // LCD
    // -------------------------
    lcd.clear();

    lcd.setCursor(0, 0);
    lcd.print("T:");
    lcd.print((int)temperatura);
    lcd.print(" H:");
    lcd.print((int)umiditaAria);

    lcd.setCursor(0, 1);
    lcd.print("S:");
    lcd.print(valoreSuolo);
    lcd.print(" A:");
    lcd.print(valoreAcqua);

    Serial.println("----------------------------------------");
    Serial.println();
  }
}

// -------------------------
// LETTURA CONFIGURAZIONE PIANTA DA LARAVEL
// -------------------------
void leggiConfigurazionePianta() {

  if (client.connect(server, 8000)) {

    String url = "/api/configurazione-pianta";

    Serial.println("Lettura configurazione pianta...");
    Serial.println(url);

    client.print("GET " + url + " HTTP/1.1\r\n");
    client.print("Host: ");
    client.print(server);
    client.print("\r\n");
    client.print("Connection: close\r\n\r\n");

    String risposta = "";

    unsigned long timeout = millis();

    while (client.connected() && millis() - timeout < 5000) {
      while (client.available()) {
        char c = client.read();
        risposta += c;
        timeout = millis();
      }
    }

    client.stop();

    int jsonStart = risposta.indexOf("{");

    if (jsonStart == -1) {
      Serial.println("Errore: JSON configurazione non trovato");
      return;
    }

    String json = risposta.substring(jsonStart);

    int nuovaSoglia = estraiNumero(json, "soglia_suolo");
    int nuovaDurata = estraiNumero(json, "durata_irrigazione");
    int nuovoIntervallo = estraiNumero(json, "intervallo_irrigazione");

    if (nuovaSoglia > 0) {
      sogliaSuolo = nuovaSoglia;
    }

    if (nuovaDurata > 0) {
      durataIrrigazione = nuovaDurata;
    }

    if (nuovoIntervallo > 0) {
      intervalloIrrigazione = (unsigned long)nuovoIntervallo * 1000;
    }

    Serial.println("Configurazione aggiornata:");
    Serial.print("Soglia suolo: ");
    Serial.println(sogliaSuolo);
    Serial.print("Durata irrigazione: ");
    Serial.println(durataIrrigazione);
    Serial.print("Intervallo irrigazione ms: ");
    Serial.println(intervalloIrrigazione);

  } else {
    Serial.println("Errore connessione configurazione pianta");
  }
}

// -------------------------
// ESTRAZIONE NUMERO DA JSON SEMPLICE
// -------------------------
int estraiNumero(String json, String campo) {
  String chiave = "\"" + campo + "\":";

  int start = json.indexOf(chiave);

  if (start == -1) {
    return 0;
  }

  start += chiave.length();

  int end = json.indexOf(",", start);

  if (end == -1) {
    end = json.indexOf("}", start);
  }

  String valore = json.substring(start, end);
  valore.trim();

  return valore.toInt();
}

// -------------------------
// FUNZIONE INVIO DATI SENSORI A LARAVEL
// -------------------------
void inviaDatiPHP(float temperatura, float umiditaAria, int suolo, int acqua, bool rele) {

  if (client.connect(server, 8000)) {

    String url = "/api/salva-dati-wifi?";
    url += "temperatura=" + String(temperatura, 1);
    url += "&umidita_aria=" + String(umiditaAria, 1);
    url += "&suolo=" + String(suolo);
    url += "&acqua=" + String(acqua);
    url += "&rele=" + String(rele ? 1 : 0);

    Serial.println("Invio richiesta dati:");
    Serial.println(url);

    client.print("GET " + url + " HTTP/1.1\r\n");
    client.print("Host: ");
    client.print(server);
    client.print("\r\n");
    client.print("Connection: close\r\n\r\n");

    unsigned long timeout = millis();

    while (client.connected() && millis() - timeout < 5000) {
      while (client.available()) {
        char c = client.read();
        Serial.write(c);
        timeout = millis();
      }
    }

    client.stop();

    Serial.println();
    Serial.println("Dati inviati al server");

  } else {
    Serial.println("Errore connessione invio dati!");
  }
}