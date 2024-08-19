<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include "conexao.php";
$query = $conn->query("show tables");
$tabelas = $query->fetchALL(PDO::FETCH_OBJ);
$conteudo="";

if(!file_exists("sistema")){
	mkdir("sistema");
}
if(!file_exists("sistema/model")){
	mkdir("sistema/model");
}
if(!file_exists("sistema/view")){
	mkdir("sistema/view");
}
if(!file_exists("sistema/control")){
	mkdir("sistema/control");
}
if(!file_exists("sistema/dao")){
	mkdir("sistema/dao");
}
file_put_contents("sistema/index.php","");


 //var_dump($tabelas);
foreach($tabelas as $tabela){
	$conteudo.="class ".ucfirst($tabela->Tables_in_framework)."{\n";
	$queryAttr=$conn->query("show columns from ".$tabela->Tables_in_framework);
	$atributos= $queryAttr->fetchAll(PDO::FETCH_OBJ);
		
	foreach($atributos as $atributo){
		$conteudo.="private $".$atributo->Field.";\n";
	}
		
	foreach($atributos as $atributo){
		$conteudo.= "function get".ucfirst($atributo->Field)."(){
			return $"."this->".$atributo->Field.";}\n";
		$conteudo.="function set".ucfirst($atributo->Field)."($".$atributo->Field."){
			$"."this->".$atributo->Field."=$".$atributo->Field.";
		}\n";     
	}
	$conteudo .= "}";
		
	//echo $conteudo;
	file_put_contents("sistema/model/",$tabela->Tables_in_framework.".php",$conteudo);
	$conteudo="";
}
?>
