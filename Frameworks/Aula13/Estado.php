<?php
require_once "conexao.php";

function buscaEstado(){
    $con = Conexao::conectar();
    $sql = "SELECT * FROM estado ORDER BY nomeEstado";
    $query = $con->query($sql);
    $dados = $query->fetchAll(PDO::FETCH_OBJ);
    return $dados;
}

?>
