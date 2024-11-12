<?php
#Página para excluir um aluno

require_once(__DIR__ . "/../../controller/alunoController.php");

//1- Capturar o ID do aluno utilizando a superglobal $_GET
$id = isset($_GET['id']) && is_numeric($_GET['id']) ? trim($_GET['id']) : 0;

if($id) {
    //2- Chamar o AlunoController para excluir o aluno pelo ID 
    //Excluir
    $alunoCont = new AlunoController();
    $erros = $alunoCont->deletar($id);
    
    //3- Voltar para o listar.php
    header("location: listar.php");
} else {
    echo "Aluno não encontrado!<br>";
    echo "<a href='listar.php'>Voltar</a>";
}
