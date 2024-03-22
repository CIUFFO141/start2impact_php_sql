-- migrations.sql

CREATE DATABASE IF NOT EXISTS OrizonDB;

USE OrizonDB;

-- Tabella dei paesi
CREATE TABLE IF NOT EXISTS Paesi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL
);

-- Tabella dei viaggi
CREATE TABLE IF NOT EXISTS Viaggi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    paesi_id INT,
    posti_disponibili INT,
    FOREIGN KEY (paesi_id) REFERENCES Paesi(id)
);
