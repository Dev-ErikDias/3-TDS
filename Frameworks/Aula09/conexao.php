<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
try {
   $servidor = $_POST['servidor'];
   $banco = $_POST['banco'];
   $usuario = $_POST['usuario'];
   $senha = $_POST['senha'];

   $conn = new PDO("mysql:host=" . $servidor . ";dbname=$banco",  "$usuario", "$senha");

   /*
   echo "Servidor: $servidor <br>";
   echo "Banco de Dados: $banco <br>";
   echo "Usuário: $usuario <br>";
   echo "Senha: $senha <br>";
   */

   header("Location:frameworkMVC.php?msg=0");
} catch (PDOException $e) {
   //echo "erro" . $e->getMessage();
   header("Location:frameworkMVC.php?msg=1");
}
