<?php
require_once "../dao/Conexao.php";
if(isset($_GET['excluir'])){
    $x=new FWK();
    $x->excluir($_GET['excluir'],$_GET['tabela']);

}

class FWK
{
    private $conn;
    function alterar($obj){
        $this->conexao();
        $tabela = $this->selecionarTabela(get_class($obj));
        $colunas= $this->selecionarColunas($tabela);
        $valores = $this->selecionarValores($obj);
        $vetColunas=explode(",",$colunas);
        $vetValores=explode(",",$valores);
        for($i=1;$i<sizeof($vetColunas);$i++) {
            $sql = "update " . $tabela . " set " .
                $vetColunas[$i] . "=" . $vetValores[$i].
            " where ".$vetColunas[0]."=".$vetValores[0];
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
        }


    }




    public function conexao()
    {
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

        $sql="show columns from ".$tabela;
        $query = $this->conn->query($sql);
        $colunas=$query->fetchAll(PDO::FETCH_OBJ);

        $txt="";
        foreach ($colunas as $coluna){
            $txt.=$coluna->Field.",";
        }
        $txt=substr($txt,0,-1);
        return $txt;


    }
    function selecionarValores($obj){
        $reflection = new ReflectionClass($obj);
        $properties = $reflection->getProperties();
         $txt="";
        for($i=0;$i<count($properties);$i++) {
            $property = $reflection->getProperty($properties[$i]->name);
            $property->setAccessible(true);
            $valor=$property->getValue($obj)==NULL?"NULL":"'".$property->getValue($obj)."'";
            $txt .=$valor.",";
        }
        $txt=substr($txt,0,-1);
        return $txt;
    }
    function salvar($obj)
    {
        $this->conexao();
        $tabela = $this->selecionarTabela(get_class($obj));
        $colunas= $this->selecionarColunas($tabela);
        $valores = $this->selecionarValores($obj);
        $sql= "insert into ".$tabela." (".$colunas.") values(".$valores.")";

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
        $atributos = $this->selecionarColunas($tabela);
        $vetAtr = explode(",", $atributos);
        $txt="";
        foreach ($dados as $dado){

            for($i = 0; $i < sizeof($vetAtr); $i++){
                $atr = str_replace('"', '', $vetAtr[$i]);
                $txt .= " <b>" . $vetAtr[$i] . ":</b> ". $dado->$atr;
            }

            $txt.= " - <a href='../fwkSis/FWK.php?exclui=$dado->isbn&tabela=".$tabela."'>exluir</a>";
            $txt.= " <hr>  ";
        }
        return $txt;
    }

    function buscaPorId($id,$tabela){
        $this->conexao();
        $colunas = $this->selecionarColunas($tabela);

        $vet=explode(",",$colunas);
        $sql="select * from ".$tabela." where ".$vet[0]."=".$id ;
        $query= $this->conn->query($sql);
        $dados=$query->fetch(PDO::FETCH_OBJ);
        return $dados;
    }
}
