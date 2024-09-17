CREATE DATABASE db_jogos;
USE db_jogos;
CREATE TABLE jogos (
    id INTEGER NOT NULL AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL,
    genero VARCHAR(1) NOT NULL,
    ano INTEGER NOT NULL,
    tipo VARCHAR(3) NOT NULL,
    preco INTEGER NOT NULL,
    plataforma VARCHAR(5) NOT NULL,
    faixa_etaria INTEGER NOT NULL,
    CONSTRAINT pk_jogos PRIMARY KEY (id)
);
