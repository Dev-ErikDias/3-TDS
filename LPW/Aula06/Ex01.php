<?php

class Pessoa{

    private $nome;
    private $sobrenome;

    public function __construct($nome, $sobrenome){
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
    }

    public function getNomeCompleto(){
        echo "Nome Completo: ". $this->nome . " " . $this->sobrenome;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getSobrenome()
    {
        return $this->sobrenome;
    }

    public function setSobrenome($sobrenome): self
    {
        $this->sobrenome = $sobrenome;

        return $this;
    }
}

$pessoa1 = new Pessoa("Erik", "Dias Paulinio");
$pessoa1->getNomeCompleto();

echo "<br>";

$pessoa2 = new Pessoa("Vinicius", "Gonçalves");
$pessoa2->getNomeCompleto();

echo "<br>";

$pessoa3 = new Pessoa("Miriã", "Brizola");
$pessoa3->getNomeCompleto();
?>
