<?php

for($i = 1; $i <= 100;$i++){
    if($i % 4 == 0){
        $soma += $i;
    }
}

echo "A soma dos números divisiveis por 4 é: $soma";
