CREATE DATABASE trabalholaravel;

use trabalholaravel;

CREATE TABLE carro (
    id INT AUTO_INCREMENT PRIMARY KEY,
    modelo VARCHAR(100) NOT NULL,
    marca VARCHAR(100) NOT NULL,
    ano INT NOT NULL,
    cor VARCHAR(50),
    preço FLOAT
);
