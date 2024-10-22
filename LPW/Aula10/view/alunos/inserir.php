<?php
include_once(__DIR__.'/../../controller/alunoController.php');

$erros = array();

if(isset($_POST['nome'])){
    $nome = trim($_POST['nome']) ? trim($_POST['nome']) : null;
    $idade = trim($_POST['idade']) ? trim($_POST['idade']) : null;
    $estrang = trim($_POST['estrang']) ? trim($_POST['estrang']) : null;
    $curso = trim($_POST['curso']) ? trim($_POST['curso']) : null;


    if(!$nome){
        array_push($erros, "Infome o nome");
    } 
    if(!$idade){
        array_push($erros, "Infome a idade");
    }
    if(!$estrang){
        array_push($erros, "Infome se é ou não estrangeiro");
    }
    if(!$curso){
        array_push($erros, "Infome o curso");
    }

    if(empty($erros)){
        $alunoCont = new AlunoController();

        echo $alunoCont->cadastrar($_POST);
    }else{ 
        echo implode("<br>", $erros);
    }

    header("Location: listar.php");
}

include('form.php');
?>
