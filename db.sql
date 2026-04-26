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