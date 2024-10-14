<?php
require_once("Conexao.php");
require_once("../fwkSis/FWK.php");

class PessoaDao{
    private $con;

    public function __construct(){
        $this->con = Conexao::conectar();
    }

    function  buscaPessoa($id){
        $fwk = new FWK();
        return $fwk->buscaPorId($id, "pessoas");
    }

    function alterar($obj){
        $fwk = new FWK();
        $fwk->alterar($obj);
    }
}

?>
