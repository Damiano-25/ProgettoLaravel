#include <WiFiS3.h>
#include <DHT.h>
#include <LiquidCrystal.h>

// -------------------------
// WIFI
// -------------------------
char nome_rete[] = "TIM-51297409";
char password[] = "jSf6CaXcL7YZfi2h";

const char server[] = "192.168.1.8";
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
const int PIN_RELE  = A2;

DHT dht(DHTPIN, DHTTYPE);

// -------------------------
// VARIABILI
// -------------------------
bool releAcceso = false;

unsigned long ultimaLettura = 0;
const unsigned long intervalloLettura = 20000;

// CONFIGURAZIONE DA LARAVEL
int sogliaSuolo = 700;
int durataIrrigazione = 5;
unsigned long intervalloIrrigazione = 20000;

unsigned long ultimaIrrigazione = 0;


int piantaId = 0;

// -------------------------
// SETUP
// -------------------------
void setup() {
  Serial.begin(9600);
  delay(2000);

  dht.begin();
  pinMode(PIN_RELE, OUTPUT);

  digitalWrite(PIN_RELE, HIGH);

  lcd.begin(16, 2);
  lcd.print("Avvio...");

  while (WiFi.begin(nome_rete, password) != WL_CONNECTED) {
    Serial.println("Connessione fallita...");
    delay(2000);
  }

  Serial.println("WiFi connesso!");
  lcd.clear();
  lcd.print("WiFi OK");
  delay(2000);
  lcd.clear();

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

    if (isnan(temperatura) || isnan(umiditaAria)) {
      Serial.println("Errore DHT");
      return;
    }

    // Aggiorna configurazione
    leggiConfigurazionePianta();

    Serial.println("------ DATI ------");
    Serial.print("Pianta ID: "); Serial.println(piantaId);
    Serial.print("Temp: "); Serial.println(temperatura);
    Serial.print("Umidita: "); Serial.println(umiditaAria);
    Serial.print("Suolo: "); Serial.println(valoreSuolo);
    Serial.print("Acqua: "); Serial.println(valoreAcqua);

    // -------------------------
    // LOGICA IRRIGAZIONE
    // -------------------------
    bool acquaPresente = valoreAcqua > 300;
    bool terrenoSecco = valoreSuolo > sogliaSuolo;

    unsigned long tempoPassato = millis() - ultimaIrrigazione;

    if (acquaPresente && terrenoSecco && tempoPassato >= intervalloIrrigazione) {

      Serial.println("Irrigazione attiva");

      digitalWrite(PIN_RELE, LOW);
      releAcceso = true;

      delay(durataIrrigazione * 1000);

      digitalWrite(PIN_RELE, HIGH);
      releAcceso = false;

      ultimaIrrigazione = millis();
    }

    // -------------------------
    // INVIO DATI
    // -------------------------
    inviaDatiPHP(
      temperatura,
      umiditaAria,
      valoreSuolo,
      valoreAcqua,
      releAcceso
    );

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
  }
}

// -------------------------
// LETTURA CONFIGURAZIONE
// -------------------------
void leggiConfigurazionePianta() {

  if (client.connect(server, 8000)) {

    client.print("GET /api/configurazione-pianta HTTP/1.1\r\n");
    client.print("Host: ");
    client.print(server);
    client.print("\r\nConnection: close\r\n\r\n");

    String risposta = "";

    while (client.available()) {
      risposta += (char)client.read();
    }

    client.stop();

    int jsonStart = risposta.indexOf("{");
    if (jsonStart == -1) return;

    String json = risposta.substring(jsonStart);

    sogliaSuolo = estraiNumero(json, "soglia_suolo");
    durataIrrigazione = estraiNumero(json, "durata_irrigazione");
    intervalloIrrigazione = estraiNumero(json, "intervallo_irrigazione") * 1000;


    piantaId = estraiNumero(json, "pianta_id");

    Serial.println("Config aggiornata");
  }
}

// -------------------------
// ESTRAI NUMERO JSON
// -------------------------
int estraiNumero(String json, String campo) {
  String chiave = "\"" + campo + "\":";

  int start = json.indexOf(chiave);
  if (start == -1) return 0;

  start += chiave.length();

  int end = json.indexOf(",", start);
  if (end == -1) end = json.indexOf("}", start);

  return json.substring(start, end).toInt();
}

// -------------------------
// INVIO DATI
// -------------------------
void inviaDatiPHP(float temperatura, float umiditaAria, int suolo, int acqua, bool rele) {

  if (piantaId == 0) {
    Serial.println("Nessuna pianta attiva");
    return;
  }

  if (client.connect(server, 8000)) {

    String url = "/api/salva-dati-wifi?";
    url += "pianta_id=" + String(piantaId);
    url += "&temperatura=" + String(temperatura, 1);
    url += "&umidita_aria=" + String(umiditaAria, 1);
    url += "&suolo=" + String(suolo);
    url += "&acqua=" + String(acqua);
    url += "&rele=" + String(rele ? 1 : 0);

    Serial.println(url);

    client.print("GET " + url + " HTTP/1.1\r\n");
    client.print("Host: ");
    client.print(server);
    client.print("\r\nConnection: close\r\n\r\n");

    while (client.available()) {
      Serial.write(client.read());
    }

    client.stop();
  }
}