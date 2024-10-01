<?php
include_once(__DIR__.'/../dao/alunoDAO.php');

class AlunoController{

    public function listar(){
        $alunoDao = new alunoDAO();

        $alunos = $alunoDao->list();
        return $alunos;
        
    }
}

?>
