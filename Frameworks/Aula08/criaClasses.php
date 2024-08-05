<?php
include "conexao.php";

$query = $conn->query("show tables");
$tabelas = $query->fetchAll(PDO::FETCH_OBJ);
$conteudo = "";

foreach ($tabelas as $tabela) {
    $conteudo .= "class ". ucfirst($tabela->Tables_in_framework). "{\n"; //ucfirst = Upper Case first (capitalize)
    $queryAttr = $conn->query("show columns from ". $tabela->Tables_in_framework);
    $atributos = $queryAttr->fetchAll(PDO::FETCH_OBJ);
    foreach ($atributos as $atributo) {
        $conteudo .= "private $". $atributo->Field. ";\n";
    }

    foreach ($atributos as $atributo) {
        //Criando o set
        $conteudo .= "public function set". ucfirst($atributo->Field). "($". $atributo->Field. "){
            $".  "this->". ucfirst($atributo->Field). ";
        }\n";

        //Criando o get
        $conteudo .= "public function get" . ucfirst($atributo->Field). "(){ 
            return $". "this->". $atributo->Field. ";
        }\n";
    }

    file_put_contents($tabela->tables_in_framework . ".php", $conteudo);
    $conteudo = "";
}
echo $conteudo;
?>
