<?php

define("PI", 3.14);

function areaCirculo($raio){
    $area = PI * $raio * $raio;
    return $area;
}

function circunferenciaCirculo($raio){
    $circunferencia = 2 * PI * $raio;
    return $circunferencia;
}

echo "RAIO 5";
echo "<br>Circunferencia: ". circunferenciaCirculo(5);
echo "<br>Area: ". areaCirculo(5);


echo "<br><br>RAIO 10";
echo "<br>Circunferencia: ". circunferenciaCirculo(10);
echo "<br>Area: ". areaCirculo(10);

echo "<br><br>RAIO 20";
echo "<br>Circunferencia: ". circunferenciaCirculo(20);
echo "<br>Area: ". areaCirculo(20);
