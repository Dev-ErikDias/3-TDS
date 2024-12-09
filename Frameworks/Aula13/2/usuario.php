<?php
require_once "conexao.php";
function buscaUsuario($nome){

     $con=Conexao::conectar();
     $sql="SELECT COUNT(id) AS numero FROM usuario where usuario='".$nome."'";
     $query = $con->query($sql);
     $dados=$query->fetch(PDO::FETCH_OBJ);
     echo $dados->numero;
}
buscaUsuario($_GET["nome"]);
?>
