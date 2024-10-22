<?php
include_once(__DIR__.'/../dao/alunoDAO.php');

class AlunoController{

    public function listar(){
        $alunoDao = new AlunoDAO();

        $alunos = $alunoDao->list();
        return $alunos;
        
    }

    public function cadastrar(array $aluno){
        $alunoDao = new AlunoDAO();

        return $alunoDao->insert($aluno);
    }
}

?>
