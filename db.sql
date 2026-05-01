DROP DATABASE IF EXISTS laravel;
CREATE DATABASE IF NOT EXISTS laravel;
USE laravel;

CREATE TABLE articoli (
    id INT UNSIGNED AUTO_INCREMENT,
    nome VARCHAR(30) NOT NULL,
    descrizione VARCHAR(100),
    prezzo DECIMAL(10, 2) NOT NULL,
    PRIMARY KEY (id)
);
INSERT INTO articoli (nome, descrizione, prezzo) VALUES
('Mouse', 'Mouse ottico USB', 29.99),
('Tastiera', 'Tastiera meccanica RGB', 79.99),
('Monitor', 'Monitor 24 pollici Full HD', 199.99),
('Cuffie', 'Cuffie gaming con microfono', 49.99),
('Webcam', 'Webcam HD con microfono', 39.99);

CREATE TABLE clienti (
    id INT UNSIGNED AUTO_INCREMENT,
    nome VARCHAR(30) NOT NULL,
    cognome VARCHAR(30) NOT NULL,
    indirizzo_via VARCHAR(50),
    indirizzo_civico VARCHAR(10),
    indirizzo_citta VARCHAR(50),
    PRIMARY KEY (id)
);
INSERT INTO clienti (nome, cognome, indirizzo_via, indirizzo_civico, indirizzo_citta) VALUES
('Mario', 'Rossi', 'Via Roma', '12', 'Firenze'),
('Luca', 'Bianchi', 'Via Milano', '5', 'Pisa'),
('Anna', 'Verdi', 'Via Napoli', '22', 'Siena'),
('Giulia', 'Neri', 'Via Firenze', '8', 'Lucca');

CREATE TABLE ordini (
    id INT UNSIGNED AUTO_INCREMENT,
    data_ordine DATE NOT NULL,
    id_cliente INT UNSIGNED,
    PRIMARY KEY (id),
    FOREIGN KEY (id_cliente) REFERENCES clienti(id)
);
INSERT INTO ordini (data_ordine, id_cliente) VALUES
('2026-03-01', 1),
('2026-03-02', 2),
('2026-03-03', 1),
('2026-03-03', 3),
('2026-03-04', 4);

CREATE TABLE ordini_articoli (
    id_ordine INT UNSIGNED,
    id_articolo INT UNSIGNED,
    quantita INT NOT NULL,
    PRIMARY KEY (id_ordine, id_articolo),
    FOREIGN KEY (id_ordine) REFERENCES ordini(id),
    FOREIGN KEY (id_articolo) REFERENCES articoli(id)
);
INSERT INTO ordini_articoli (id_ordine, id_articolo, quantita) VALUES
(1, 1, 2),
(1, 2, 1),
(2, 3, 1),
(3, 1, 1),
(3, 4, 2),
(4, 5, 1),
(5, 2, 3);

----------------------------------------------------------------------

CREATE TABLE tipologie_pianta (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    livello_acqua ENUM('LOW','MEDIUM','MEDIUM-HIGH','HIGH') NOT NULL,

    soglia_suolo INT NOT NULL,                -- quando irrigare (valore sensore)
    durata_irrigazione INT NOT NULL,          -- secondi
    intervallo_irrigazione INT NOT NULL,      -- secondi tra due irrigazioni

    attiva BOOLEAN DEFAULT 0,                 -- quale è selezionata

    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);
INSERT INTO categorie_piante
(nome, livello_acqua, soglia_suolo, durata_irrigazione, intervallo_irrigazione, attiva)
VALUES
('Piante grasse', 'LOW', 850, 3, 1296000, 0),
('Piante aromatiche', 'MEDIUM', 700, 5, 604800, 0),
('Piante da fiore', 'MEDIUM-HIGH', 650, 5, 172800, 0),
('Piante ortaggi', 'HIGH', 600, 6, 43200, 1),
('Piante radici', 'MEDIUM-HIGH', 650, 6, 302400, 0),
('Piante a foglia', 'HIGH', 600, 9, 86400, 0),
('Piante ornamentali da interno', 'MEDIUM', 720, 5, 1036800, 0);