-- Criação do banco de dados
CREATE DATABASE db_rpg;

-- Seleção do banco de dados para uso
USE db_rpg;

-- Criação da tabela 'classe'
CREATE TABLE classe (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50),
    attack FLOAT,
    defense FLOAT,
    vida FLOAT,
    habilidade VARCHAR(100)
);

-- Criação da tabela 'item'
CREATE TABLE item (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100),
    bonus FLOAT,
    attack FLOAT,
    defense FLOAT,
    vida FLOAT,
    classe VARCHAR(80)
);

-- Criação da tabela 'personagem'
CREATE TABLE personagem (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nickname VARCHAR(50) NOT NULL,
    vida FLOAT,
    attack FLOAT,
    defense FLOAT,
    id_classe INT, -- Relacionamento com a tabela 'classe'
    id_item INT,   -- Relacionamento com a tabela 'item'
    FOREIGN KEY (id_classe) REFERENCES classe(id),
    FOREIGN KEY (id_item) REFERENCES item(id)
);

-- Inserções na tabela 'classe' com todos os valores de colunas correspondentes
INSERT INTO classe (nome, attack, defense, vida, habilidade) VALUES 
    ("Mago", 5.0, 0.0, 0.0, "Ataques causam dano em área e longo alcance"),
    ("Guerreiro", 4.0, 2.0, 2.0, "Regenera vida ao causar dano"),
    ("Paladino", 2.0, 5.0, 3.0, "Regenera vida dos aliados ao seu redor"),
    ("Assassino", 7.0, 0.0, 0.5, "Recebe 15% dos atributos do inimigo abatido");

-- Inserções na tabela 'item'
INSERT INTO item (nome, bonus, attack, defense, vida, classe) VALUES
    ("Espada do Guerreiro", 1.5, 3.0, 1.0, 0.0, "Guerreiro"),
    ("Cajado do Mago", 2.0, 4.0, 0.5, 0.0, "Mago"),
    ("Escudo do Paladino", 1.8, 0.5, 4.0, 1.0, "Paladino"),
    ("Adaga do Assassino", 1.2, 5.0, 0.2, 0.0, "Assassino"),
    ("Armadura de Guerreiro", 1.3, 0.0, 3.5, 2.0, "Guerreiro"),
    ("Anel do Mago", 1.7, 2.0, 0.5, 0.5, "Mago");

INSERT INTO personagem (nickname, vida, attack, defense, id_classe, id_item) VALUES
    ('Arthur', 100.0, 4.0, 2.0, 2, 1),  -- Guerreiro com Espada do Guerreiro
    ('Merlin', 80.0, 5.0, 1.0, 1, 2),   -- Mago com Cajado do Mago
    ('Lancelot', 120.0, 3.0, 5.0, 3, 3),-- Paladino com Escudo do Paladino
    ('Shade', 60.0, 7.5, 0.2, 4, 4);    -- Assassino com Adaga do Assassino
