<?php

for($i = 20; $i <= 70;$i++){
    if($i % 2 == 0){
        $somaImp += $i;
    }else{
        $somaPar += $i;
    }
}

echo "A soma dos números impares entre 20 e 70 é : $somaImp";
echo "<br>A soma dos números pares entre 20 e 70 é : $somaPar";
