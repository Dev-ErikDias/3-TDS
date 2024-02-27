<?php
function calculo($x){
    $y = ((5 * $x) + (2 * $x) + 3);
    return $y; 
}

for($i = 2; $i <= 10; $i+=2){
    echo "Função com $i: ".calculo($i)."<br>";
}
