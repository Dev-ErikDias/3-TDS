<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once(__DIR__."/../model/Classe.php");
include_once(__DIR__."/../model/Item.php");
include_once(__DIR__."/../model/Personagem.php");
include_once(__DIR__."/../controller/personagemController.php");
$personagemCont = new PersonagemController();
$personagem = null;
$msgErro = "";


if(isset($_POST["nickName"]) && isset($_GET['id_edit'])){
    $nickname = trim($_POST['nickName'])? trim($_POST['nickName']):null;
    $id_classe = trim($_POST['classe'])? trim($_POST['classe']):null;
    $vida = trim($_POST['vida'])? trim($_POST['vida']):0;
    $id_item = trim($_POST['item'])? trim($_POST['item']):null;
    $attack = trim($_POST['attack'])? trim($_POST['attack']):0;
    $defense = trim($_POST['defense'])? trim($_POST['defense']):0;
    
    $personagem = new  Personagem();
    $personagem->setId($_GET['id_edit']);
    $personagem->setNickname($nickname);
    $personagem->setVida($vida);
    $personagem->setAttack($attack);
    $personagem->setDefense($defense);
    
    if($id_classe){
        $classe = new Classe();
        $classe->setId($id_classe);      
        $personagem->setClasse($classe);
    }else{
        $personagem->setClasse(null);
    }
    
    if($id_item){
        $item = new Item();
        $item->setId($id_item);   
        $personagem->setItem($item);
    }else{
        $personagem->setItem(null);
    }
    
    $erros = $personagemCont->atualizar($personagem);
    if (count($erros) > 0) {
        $msgErro = implode("<br>", $erros);
    } else {
        header('Location: inserir.php');
        exit;
    }
    
   
}else {
    
    if(isset($_GET['id_edit']))
        $personagem= $personagemCont->buscarPorId($_GET['id_edit']);

    if(!$personagem) {
        echo "ID do personagem é invalido!<br>";
        echo "<a href='inserir.php'>Voltar</a>";
        exit;
    }
}



include(__DIR__."/index.php");