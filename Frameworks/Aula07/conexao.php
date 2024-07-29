<?php

try{
    $usuario = "root";
    $senha = "bancodedados";
    $conn = new PDO("mysql:host=localhost;dbname=alunos", $usuario, $senha);

}catch(PDOException $e){
    echo "Falha na conexão com o banco de dados<hr>";
    echo "ERRO: ".$e->getMessage();
}

?>
