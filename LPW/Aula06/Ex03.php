<?php

class Retangulo{

    private $base;
    private $altura;

    public function getDados(){
        echo "Altura: ". $this->altura;
        echo "<br>";
        echo "Base: ". $this->base;
        echo "<br>";
        echo "Área: ". $this->calcularArea();
        echo "<br>";
        echo "Perímetro: ". $this->calcularPerimetro();
    }


    public function calcularArea(){
        $area = $this->altura * $this->base;
        return $area;
    }

    public function calcularPerimetro(){
        $perimetro = ($this->altura * 2) + ($this->base * 2);
        return $perimetro;
    }

    public function __construct($base, $altura){
        $this->base = $base;
        $this->altura = $altura;
    }

    public function getBase()
    {
        return $this->base;
    }

    public function setBase($base): self
    {
        $this->base = $base;

        return $this;
    }

    public function getAltura()
    {
        return $this->altura;
    }

    public function setAltura($altura): self
    {
        $this->altura = $altura;

        return $this;
    }
}

$ret1 = new Retangulo(10, 5);
echo "Retangulo 1";
echo "<br>";
$ret1->getDados();

echo "<br><br>";

$ret2 = new Retangulo(5, 2);
echo "Retangulo 2";
echo "<br>";
$ret2->getDados();
echo "<br><br>";

$ret3 = new Retangulo(8, 4);
echo "Retangulo 3";
echo "<br>";
$ret3->getDados();
?>
