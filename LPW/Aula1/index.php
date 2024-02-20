<?php

echo "Tabuada com WHILE";
$num1 = 2;
$num2 = 1;
while($num2 <=   10){
    $soma = $num1 * $num2;
    echo "<br>$num1 X $num2 = $soma";
    $num2 = $num2 + 1;
}

echo "<br><br>Tabuada com DO-WHILE";
$num2 = 1;
do{
    $soma = $num1 * $num2;
    echo "<br>$num1 X $num2 = $soma";
    $num2 = $num2 + 1;
}while($num2 <= 10);


echo "<br><br>Tabuada com FOR";

for($i = 1; $i <=10;$i++){
    $soma = $num1 * $i;
    echo "<br>$num1 X $i = $soma";
}

