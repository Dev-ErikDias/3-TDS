<?php
class Conexao
{

  static function conectar(){
      return (new PDO('mysql:host=localhost;dbname=framework', "root", "bancodedados"));
  }
}
