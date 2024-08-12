<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
try{
   $conn= new PDO("mysql:host=localhost;dbname=framework","root","bancodedados");
}catch(PDOException $e){
	echo "erro".$e->getMessage();
}
?>
