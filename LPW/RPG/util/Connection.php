<?php

require_once(__DIR__ . "/config.php");

//Arquivo Connection.php   

class Connection {

    private static $conn = null;

    public static function getConnection() {
        if (self::$conn === null) { // Verifica se já existe uma conexão
            try {
                $opcoes = array(
                    // Define o charset da conexão
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                    // Define o tipo do erro como exceção 
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    // Define o tipo do retorno das consultas como array associativo
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                );

                // Cria a conexão com o banco de dados
                $strConn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME;
                self::$conn = new PDO($strConn, DB_USER, DB_PASSWORD, $opcoes);

            } catch (PDOException $e) {
                die("Erro ao conectar na base de dados: " . $e->getMessage());
            }
        }
        return self::$conn;
    }
}