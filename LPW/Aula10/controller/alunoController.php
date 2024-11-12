<?php

include_once(__DIR__."/../dao/alunoDAO.php");
include_once(__DIR__."/../service/alunoService.php");

class AlunoController{

    private $alunoDao;
    private $alunoService;

    public function __construct(){
        $this->alunoDao = new AlunoDao();
        $this->alunoService = new AlunoService();
    }

    public function listar() {
        
        $alunos = $this->alunoDao->list();
        return $alunos;
    }

    public function inserir($aluno){
        $erros = $this->alunoService->validarDados($aluno);
        if(count($erros)>0){
            return $erros;
        }

        $this->alunoDao->insert($aluno);
        return array();
    }

    public function deletar($id){
        $this->alunoDao->delete($id);
    }

    public function buscarPorId($id){
        $aluno = $this->alunoDao->findById($id);
        return $aluno;
    }

    public function alterar(Aluno $aluno){
        $erros = $this->alunoService->validarDados($aluno);
        if(count($erros)>0){
            return $erros;
        }

        $this->alunoDao->update($aluno);
        return array();
    }
}

?>
