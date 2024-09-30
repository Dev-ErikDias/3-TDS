<?php
include "../fwkSis/FWK.php";
include "../model/Animal.php";
include "../model/Pessoa.php";


$fwk=new FWK();

for($i = 0; $i<10;$i++){
    $a= new Pessoas();
    $a->setNome("Pessoa $i");
    $a->setIdade(rand(20, 50));

    $fwk->salvar($a);
}


/*
$a->setRaca("Vira latas");
$a->setPeso(3);
$a->setTamanho(10);
*/

