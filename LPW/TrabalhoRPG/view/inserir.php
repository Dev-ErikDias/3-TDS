<?php
include_once(__DIR__."/../model/Classe.php");
include_once(__DIR__."/../model/Item.php");
include_once(__DIR__."/../model/Personagem.php");
include_once(__DIR__."/../controller/personagemController.php");
$personagemCont = new PersonagemController();


if(isset($_POST["nickName"])){
    
    $nickname = trim($_POST['nickName'])? trim($_POST['nickName']):null;
    $id_classe = trim($_POST['classe'])? trim($_POST['classe']):null;
    $vida = trim($_POST['vida'])? trim($_POST['vida']):0;
    $id_item = trim($_POST['item'])? trim($_POST['item']):null;
    $attack = trim($_POST['attack'])? trim($_POST['attack']):0;
    $defense = trim($_POST['defense'])? trim($_POST['defense']):0;
    
    $personagem = new  Personagem();
    $personagem->setId(0);
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
    
    $personagemCont->inserir($personagem);
    header('Location: inserir.php');
    exit;
}
include(__DIR__."/index.php");
