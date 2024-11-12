<?php
include_once(__DIR__."/../../model/aluno.php");
include_once(__DIR__."/../../model/curso.php");
include_once(__DIR__."/../../controller/alunoController.php");

$msgErro = "";
$aluno = null;
$alunoCont = new AlunoController();

if(isset($_POST['nome'])){
    
    $nome = trim($_POST['nome'])? trim($_POST['nome']):null;
    $idade = is_numeric($_POST['idade'])?$_POST['idade']:null;
    $estrang = trim($_POST['estrang'])?trim($_POST['estrang']):null;
    $curso = trim($_POST['selCurso'])?$_POST['selCurso']:null;
    $idAluno = $_POST['id'];

    $aluno = new Aluno();
    $aluno->setIdade($idade);
    $aluno->setNome($nome);
    
    $aluno->setEstrangeiro($estrang);
    
    if($curso){
        $cursoObj = new Curso();
        $cursoObj->setId($curso);
        $aluno->setCurso($cursoObj);
    }else{
        $aluno->setCurso(null);
    }

    $aluno->setId($idAluno);

    $erros=$alunoCont->alterar($aluno);

    if(count($erros)<= 0){ 
        header("location: listar.php");    
    }else{
        $msgErro = implode("<br>",$erros);
        //echo "<p style='color: red;'>".implode("<br>",$erros)."</p>";
    }
    
}else{
    //Carregar os dados do aluno
    
    if(isset($_GET['id'])){
        $idAluno = $_GET['id'];
        $aluno = $alunoCont->buscarPorId($idAluno);

    }else{
        echo "ID do aluno é inválido";
        echo "<br><a href='listar.php'>Voltar</a>";
        exit;
    }


}

echo "<h3>Alterar Aluno</h3>";

include("form.php");
?>
