<?php
require_once("../model/Pessoa.php");
require_once("../dao/PessoaDao.php");

class PessoaControl{
    private $pessoa;
    private $acao;
    private $dao;

    public function __construct(){
        $this->pessoa=new Pessoas();
        $this->dao = new PessoaDao();
        $this->acao = $_GET['a'];
        $this->verificaAcao();
    }

    function verificaAcao(){
        switch($this->acao){
            case 1:
                $this->pessoa->setId($_POST['id']);
                $this->pessoa->setNome($_POST['nome']);
                $this->pessoa->setIdade($_POST['idade']);
                $this->dao->alterar($this->pessoa);
                break;
        }
    }
}
new PessoaControl();
?>
