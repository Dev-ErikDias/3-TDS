<?php
include_once(__DIR__."/../controller/personagemController.php");


$personagemCont = new PersonagemController();
$personagemCont->excluir($_GET['id_del']);
header('Location: inserir.php');
exit;
?>