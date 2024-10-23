<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
require_once "../dao/livroDao.php";
require_once "../model/livro.php";

class LivroControl
{
    private $acao;
    private $livro;
    private $dao;

    public function __construct(){
        $this->dao=new LivroDao();
        $this->livro=new Livro();
        $this->acao=$_GET["acao"];
        $this->verificaAcao();

    }

    function verificaAcao(){

        switch ($this->acao){
            case 1:
                $this->livro->setIsbn($_POST["isbn"]);
                $this->livro->setTitulo($_POST["titulo"]);
                $this->livro->setAutor($_POST["autor"]);
                $this->livro->setPaginas($_POST["paginas"]);
                $this->livro->setEditora($_POST["editora"]);
                $this->dao->inserir($this->livro);
                break;
        }
    }
}
new LivroControl();
