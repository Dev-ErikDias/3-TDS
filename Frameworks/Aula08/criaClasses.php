<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

 include "conexao.php";
 $query = $conn->query("show tables");
 $tabelas = $query->fetchALL(PDO::FETCH_OBJ);
 $conteudo="";

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
    file_put_contents($tabela->Tables_in_framework.".php",$conteudo);
    $conteudo="";
 }
?>
