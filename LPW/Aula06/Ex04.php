<?php

class Estado{
    private $nome;
    private $sigla;

    public function __construct($nome, $sigla){
        $this->nome = $nome;
        $this->sigla = $sigla;
    }

    public function getDados(){
        return $this->nome . "-".$this->sigla;
        
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

    public function getSigla()
    {
        return $this->sigla;
    }

    public function setSigla($sigla): self
    {
        $this->sigla = $sigla;

        return $this;
    }
}
class Cidade{

    private $nome;
    private $qtdHabitantes;
    private $areaTerritorial;
    private $altitude;
    private $estado;

    public function __construct($nome, $qtdHabitantes, $areaTerritorial, $altitude, $estado){
        $this->nome = $nome;
        $this->qtdHabitantes = $qtdHabitantes;
        $this->areaTerritorial = $areaTerritorial;
        $this->altitude = $altitude;
        $this->estado = $estado;
    }

    public function getDados(){
       echo "<td> $this->nome</td>";
       echo "<td> $this->qtdHabitantes</td>";
       echo "<td>". $this->areaTerritorial ."Km²</td>";
       echo "<td> ". $this->altitude ."m</td>";
       echo "<td>" . $this->estado->getDados() . "</td>";
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

    public function getQtdHabitantes()
    {
        return $this->qtdHabitantes;
    }

    public function setQtdHabitantes($qtdHabitantes): self
    {
        $this->qtdHabitantes = $qtdHabitantes;

        return $this;
    }

    public function getAreaTerritorial()
    {
        return $this->areaTerritorial;
    }

    public function setAreaTerritorial($areaTerritorial): self
    {
        $this->areaTerritorial = $areaTerritorial;

        return $this;
    }

    public function getAltitude()
    {
        return $this->altitude;
    }

    public function setAltitude($altitude): self
    {
        $this->altitude = $altitude;

        return $this;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado): self
    {
        $this->estado = $estado;

        return $this;
    }
}

$est1 = new Estado("Paraná", "PR");
$est2 = new Estado("Santa Catarina", "SC");

$cid1 = new Cidade("Foz do Iguaçu", 250000, 500, 145, $est1);
$cid2 = new Cidade("Cascavel", 300000, 420, 320, $est1);
$cid3 = new Cidade("Chapecó", 240000, 120, 620, $est2);
$cid4 = new Cidade("Blumenau", 330000, 200, 85, $est2);
$cid5 = new Cidade("Curitiba", 1150000, 300, 850, $est1);

$cidades = array($cid1, $cid2, $cid3, $cid4, $cid5);


echo "<table border='1'>";
echo "<thead>";
echo "<th>Nome</th>";
echo "<th>Habitantes</th>";
echo "<th>Área</th>";
echo "<th>Altitude</th>";
echo "<th>Estado</th>";
echo "</thead>";

foreach ($cidades as $cidade){
    echo "<tr>";
    $cidade->getDados();
    echo "</tr>";
}

echo "</table>";
?>
