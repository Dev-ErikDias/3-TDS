<?php

class Computador{
    private $preco;
    private $marca;

    public function __construct($preco, $marca){
        $this->preco = $preco;
        $this->marca = $marca;
    }

    public function ligar(){
        echo "Computador ligando";
    }

    public function getDados(){
        echo $this->preco;
    }

    public function getPreco(){
        return $this->preco;
    }

    public function setPreco($preco): self{
        $this->preco = $preco;

        return $this;
    }

    public function getMarca(){
        return $this->marca;
    }

    public function setMarca($marca): self{
        $this->marca = $marca;

        return $this;
    }
}

$comp = new Computador(2000, "Dell");
$comp->ligar();
echo "<br>";
echo $comp->getPreco() . " - ". $comp->getMarca();
?>
