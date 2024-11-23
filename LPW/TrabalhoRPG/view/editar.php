<?php
include_once(__DIR__."/../model/Classe.php");
include_once(__DIR__."/../model/Item.php");
include_once(__DIR__."/../model/Personagem.php");
include_once(__DIR__."/../controller/personagemController.php");

$personagemCont = new PersonagemController();
$personagem= $personagemCont->buscarPorId($_GET['id_edit']);


if(isset($_POST['gravar'])){
    $personagemCont->atualizar($_POST);
    $personagem = null;
    header('Location: inserir.php');
    exit;
}

include_once(__DIR__."/index.php");
?>
