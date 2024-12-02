<?php
require_once "conexao.php";

function buscaCidade($id){
    $con = Conexao::conectar();
    $sql = "SELECT * FROM cidade WHERE idEstado = ". $id;
    $query = $con->query($sql);
    $dados = $query->fetchAll(PDO::FETCH_OBJ);
    foreach ($dados as $dado) {
        echo "<option value=". $dado->id . ">" . $dado->nomeCidade . "</option>";
    }
    return $dados;
}

buscaCidade($_GET['id']);
?> 
