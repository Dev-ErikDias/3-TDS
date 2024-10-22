<?php
include_once(__DIR__.'/../../controller/alunoController.php');


if($_GET){
    $alunoCont = new AlunoController();
    
    $alunoCont->excluir($_GET['id']);

    header("Location: listar.php");
}

?>
