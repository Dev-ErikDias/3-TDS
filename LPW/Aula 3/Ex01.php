<?php

$times = array("Man. United", "Man. City", "Real Madrid", "Barcelona", "Arsenal");
$frutas = array("Morango", "Uva", "Laranja", "Banana", "Goiaba");
$marcas = array("Gucci", "Nike", "Adidas", "Fila", "Olympkus");
$carros = array("Audi A8", "BMW X6", "Nissa GT-R", "Porshe 911", "Mustang Shelby");

function gerarLista($vetor, $frase){
    echo "<h1>$frase</h1>";
    echo "<ol>";
    foreach($vetor as $vet){
        echo "<li>$vet</li>";
    }
    echo "</ol>";
}

gerarLista($times , "Times de Futebol");
gerarLista($frutas , "Frutas");
gerarLista($marcas , "Marcas de Roupa");
gerarLista($carros , "Carros");
