<?php

function calcularArea($altura, $base){
    $area = $altura * $base;
    return $area;
}

function calcularPerimetro($altura, $base){
    $perimetro = ($altura * 2) + ($base * 2);
    return $perimetro;
}

for($i = 1; $i<= 5; $i+=2){
    $altura = $i;
    $base = $i + 2;
    echo "RETANGULO - BASE: $base, ALTURA: $altura";
    echo "<br>Area: ".calcularArea($altura, $base);
    echo "<br>Perimetro: ".calcularPerimetro($altura, $base)."<br><br>";
    
}
