DROP DATABASE IF EXISTS laravell;
CREATE DATABASE IF NOT EXISTS laravell;
USE laravell;

CREATE TABLE utenti (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NULL,
    cognome VARCHAR(100) NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    telefono VARCHAR(30) NULL,
    bio TEXT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL
);

CREATE TABLE orti (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    provincia VARCHAR(50) NULL,
    utente_id INT NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,

    FOREIGN KEY (utente_id) REFERENCES utenti(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

CREATE TABLE categorie_piante (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    livello_acqua ENUM('LOW', 'MEDIUM', 'MEDIUM-HIGH', 'HIGH') NOT NULL,
    soglia_suolo INT NOT NULL,
    durata_irrigazione INT NOT NULL,
    intervallo_irrigazione INT NOT NULL,
    attiva TINYINT(1) DEFAULT 1,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL
);

CREATE TABLE piante (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    attiva TINYINT(1) DEFAULT 0,
    orto_id INT NOT NULL,
    categoria_id INT NOT NULL,

    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,

    FOREIGN KEY (orto_id) REFERENCES orti(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE,

    FOREIGN KEY (categoria_id) REFERENCES categorie_piante(id)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
);

CREATE TABLE dati (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pianta_id INT NOT NULL,
    temperatura FLOAT NOT NULL,
    umidita_aria FLOAT NOT NULL,
    suolo INT NOT NULL,
    acqua INT NOT NULL,
    rele TINYINT(1) NOT NULL,
    data_rilevazione TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY (pianta_id) REFERENCES piante(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

-- CACHE
CREATE TABLE cache (
    `key` VARCHAR(255) PRIMARY KEY,
    `value` MEDIUMTEXT NOT NULL,
    `expiration` INT NOT NULL
);

-- CACHE LOCKS
CREATE TABLE cache_locks (
    `key` VARCHAR(255) PRIMARY KEY,
    `owner` VARCHAR(255) NOT NULL,
    `expiration` INT NOT NULL
);

-- FAILED JOBS
CREATE TABLE failed_jobs (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    uuid VARCHAR(255) NOT NULL UNIQUE,
    connection TEXT NOT NULL,
    queue TEXT NOT NULL,
    payload LONGTEXT NOT NULL,
    exception LONGTEXT NOT NULL,
    failed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- JOBS
CREATE TABLE jobs (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    queue VARCHAR(255) NOT NULL,
    payload LONGTEXT NOT NULL,
    attempts TINYINT UNSIGNED NOT NULL,
    reserved_at INT UNSIGNED NULL,
    available_at INT UNSIGNED NOT NULL,
    created_at INT UNSIGNED NOT NULL
);

-- JOB BATCHES
CREATE TABLE job_batches (
    id VARCHAR(255) PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    total_jobs INT NOT NULL,
    pending_jobs INT NOT NULL,
    failed_jobs INT NOT NULL,
    failed_job_ids LONGTEXT NOT NULL,
    options MEDIUMTEXT NULL,
    cancelled_at INT NULL,
    created_at INT NOT NULL,
    finished_at INT NULL
);

-- MIGRATIONS
CREATE TABLE migrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    migration VARCHAR(255) NOT NULL,
    batch INT NOT NULL
);

-- PASSWORD RESET TOKENS
CREATE TABLE password_reset_tokens (
    email VARCHAR(255) PRIMARY KEY,
    token VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NULL
);

-- SESSIONS
CREATE TABLE sessions (
    id VARCHAR(255) PRIMARY KEY,
    user_id BIGINT UNSIGNED NULL,
    ip_address VARCHAR(45) NULL,
    user_agent TEXT NULL,
    payload LONGTEXT NOT NULL,
    last_activity INT NOT NULL
);

-- USERS (Laravel default)
CREATE TABLE users (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    email_verified_at TIMESTAMP NULL,
    password VARCHAR(255) NOT NULL,
    remember_token VARCHAR(100) NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);

INSERT INTO categorie_piante
(nome, livello_acqua, soglia_suolo, durata_irrigazione, intervallo_irrigazione, attiva)
VALUES
('Piante da interno', 'MEDIUM', 700, 5, 86400, 1),
('Piante aromatiche', 'LOW', 750, 4, 172800, 1),
('Ortaggi', 'HIGH', 650, 8, 43200, 1),
('Radici', 'MEDIUM', 700, 6, 86400, 1),
('Ortaggi a foglia', 'MEDIUM-HIGH', 680, 7, 43200, 1);

INSERT INTO tipologie_pianta
(nome_pianta, umidita_ideale_perc, esposizione_solare_ideale)
VALUES
('Fragola', 70, 8),
('Rosmarino', 40, 8),
('Salvia', 45, 7),
('Pomodoro', 75, 8),
('Insalata', 80, 5);

INSERT INTO utenti
(nome, cognome, email, password)
VALUES
('Damiano', 'Armonici', 'test@gmail.com', 'password_hashata');

INSERT INTO orti
(nome, provincia, utente_id)
VALUES
('Orto principale', 'Arezzo', 1);

INSERT INTO piante
(nome, orto_id, categoria_id, tipologia_id)
VALUES
('Fragola balcone', 1, 3, 1);