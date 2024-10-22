<?php
include_once(__DIR__.'/../dao/alunoDAO.php');
include_once(__DIR__.'/../model/aluno.php');
include_once(__DIR__.'/../model/curso.php');

class AlunoController{

    public function listar(){
        $alunoDao = new AlunoDAO();

        $alunos = $alunoDao->list();
        return $alunos;
        
    }

    public function cadastrar(array $aluno){
        $alunoDao = new AlunoDAO();  
    
        $alunoObj = new Aluno();
        $alunoObj->setNome($aluno['nome']);
        $alunoObj->setIdade($aluno['idade']);
        $alunoObj->setEstrangeiro($aluno['estrang']);

        $cursoObj = new Curso();
        $cursoObj->setId($aluno['curso']);

        $alunoObj->setCurso($cursoObj);     

        return $alunoDao->insert($alunoObj);
    }

    public function excluir($id){
        $alunoDao = new AlunoDAO();

        return $alunoDao->delete($id);
    }
}

?>
