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

    function selecionarValues($obj){
        $reflection = new ReflectionClass($obj);
        $properties = $reflection->getProperties();
        $txt="";
        for ($i=0; $i < count($properties); $i++) { 
            $property = $reflection->getProperty($properties[$i]->name);
            $property->setAccessible(true);
            $valor=$property->getValue($obj)==NULL?"NULL":"'".$property->getValue($obj)."'";
            $txt .= $valor.",";
        }
        $txt=substr($txt, 0, -1);
        return $txt;
    }

    function buscaPorId($id, $tabela){
        $this->conexao();
        $colunas = $this->selecionarColunas($tabela);
        $vet = explode(",", $colunas);
        $sql = "select * from ".$tabela." where ".$vet[0]. "=".$id;
        $query = $this->conn->query($sql);
        $dados = $query->fetch(PDO::FETCH_OBJ);
        return $dados;
    }
    
    function salvar($obj){
        $this->conexao();
        $tabela = $this->selecionarTabela(get_class($obj));
        $colunas = $this->selecionarColunas($tabela);
        $values = $this->selecionarValues($obj); 
        $sql= "insert into ".$tabela." (".$colunas.") values(".$values.")";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    function excluir($id, $tabela){
        $this->conexao();
        $sql="delete from ".$tabela." where id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        

    }

    function lista($tabela){
        $this->conexao();
        $sql="select * from ".$tabela;

        $colunas = $this->selecionarColunas($tabela);
        $colunasArray = explode(',', $colunas); // Pega o txt retornado e separa em um array

        $query= $this->conn->query($sql);
        $dados=$query->fetchAll(PDO::FETCH_OBJ);
        $txt="";
        foreach ($dados as $dado){
            foreach ($colunasArray as $coluna) { //Realiza a busca dinâmicamente com um foreach do colunasArray
                $txt .= ucfirst($coluna) . " : " . $dado->$coluna . " ";
            }
            $txt.= " - <a href='../fwkSis/FWK.php?excluir=$dado->id&tabela=".$tabela."'>excluir</a>";
            $txt.= " <hr>  ";

        }
        return $txt;

    }

    function alterar($obj){
        $this->conexao();
        $tabela = $this->selecionarTabela(get_class($obj));
        $colunas = $this->selecionarColunas($tabela);
        $valores = $this->selecionarValues($obj);
        $vetColunas = explode(",", $colunas);
        $vetValores = explode(",", $valores);
        for($i=1;$i<sizeof($vetColunas);$i++){
            $sql = "update from ". $tabela . " set ". $vetColunas[$i] . "=" . $vetValores[$i] . " where " . $vetColunas[0] . "=" . $vetValores[0];
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
        }
    }
}
