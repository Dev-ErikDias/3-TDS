<?php
include_once(__DIR__.'/../../controller/alunoController.php');
include("form.php");


if($_POST){
    $alunoCont = new AlunoController();
    
    echo $alunoCont->cadastrar($_POST);
}

?>
