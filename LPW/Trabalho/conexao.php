<?php

class Conexao
{
    private static $conn = null;

    public static function getConexao()
    {
        if (self::$conn == null) {
            //Criar a conexão com o banco
            $opcoes = array(
                //Define o charset da conexão
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                //Define o tipo do erro como exceção
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                //Define o retorno das consultas ao banco
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            );

            $endereco = "mysql:host=localhost;dbname=db_jogos";
            $user = "root";
            $password = "bancodedados";


            try {
                self::$conn = new PDO($endereco, $user, $password, $opcoes);
            } catch (PDOException $e) {
                echo "Erro ao conectar no banco de dados. ERRO: " . $e->getMessage();
            }
        }


        return self::$conn;
    }
}
