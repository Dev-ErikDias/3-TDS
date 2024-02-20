<?php

$num1 = 5;
$num2 = 4;
$resp = $num1;

for($i = 1; $i < $num2;$i++){
    $resp *= $num1;
}
echo "A) $num1 elevado a $num2 é: $resp";


$resp = 0;
for($i = 0; $i < $num2;$i++){
    $resp += $num1;
}
echo "<br>B) $num1 vezes $num2 é: $resp";


$resp = 1 / $num1;
echo "<br>C) O numero inverso de $num1 é: $resp";


$resp = $num2 + ($num1/2);
echo "<br>D) A soma do segundo número com a metade de primeiro número é: $resp";

$resp = $num1 - $num2;
echo "<br>E)A diferença entre $num1 e $num2 é: $resp";
