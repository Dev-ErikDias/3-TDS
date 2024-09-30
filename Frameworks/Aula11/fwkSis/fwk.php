<?php
require_once "../dao/Conexao.php";
if(isset($_GET['excluir'])){
    $x=new FWK();
    $x->excluir($_GET['excluir'],$_GET['tabela']);
 
 }


class FWK
{
    private $conn;

    public function conexao(){
        $this->conn=Conexao::conectar();
    }

    function selecionarBanco(){
        $sql="select database()";
        $query=$this->conn->query($sql);
        $banco=$query->fetch();
        return $banco[0];
    }

    function selecionarTabela($t){
        $banco="Tables_in_".$this->selecionarBanco();
        $t1=strtoupper($t);
        $sql="Show tables";
        $query=$this->conn->query($sql);
        $tabelas=$query->fetchAll(PDO::FETCH_OBJ);
        foreach ($tabelas as $tabela) {
            $t2=strtoupper($tabela->$banco);
            if(strcmp($t1,$t2)==0)
                return $tabela->$banco;
        }

    }

    function selecionarColunas($tabela){
        $sql="Show columns from ".$tabela;
        $query=$this->conn->query($sql);
        $colunas=$query->fetchAll(PDO::FETCH_OBJ);
        $txt="";
        foreach ($colunas as $coluna){
            $txt.=$coluna->Field.",";
        }
        $txt=substr($txt,0,-1);
        return $txt;


    }

    function salvar($obj){
        $this->conexao();
        $tabela = $this->selecionarTabela(get_class($obj));
        $colunas= $this->selecionarColunas($tabela);
        $id = $obj->getId();
        $nome = $obj->getNome();
        $idade = $obj->getIdade();
        $sql= "insert into ".$tabela." (".$colunas.") values(null,'$nome','$idade')";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    function excluir($id,$tabela){
        $this->conexao();
        $sql="delete from ".$tabela." where id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        

    }

    function lista($tabela){
        $this->conexao();
        $sql="select * from ".$tabela;
        $query= $this->conn->query($sql);
        $dados=$query->fetchAll(PDO::FETCH_OBJ);
        $txt="";
        foreach ($dados as $dado){
            $txt.= "id :".$dado->id;
            $txt.= " Nome :  ".$dado->nome;
            $dado_class = get_class($dado);
            $txt.= " - <a href='../fwkSis/FWK.php?excluir=$dado->id&tabela=".$tabela."'>excluir</a>";
            $txt.= " <hr>  ";

        }
        return $txt;

    }
}
