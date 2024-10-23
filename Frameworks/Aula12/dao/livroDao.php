<?php
require_once "Conexao.php";
require_once "../fwkSis/FWK.php";

class LivroDao{
    private $con;
    private $fwk;

    public function __construct(){
        $this->con=Conexao::conectar();
    }
    
    function inserir($obj){
        $this->fwk = new FWK();
        $this->fwk->salvar($obj);
    }
} 