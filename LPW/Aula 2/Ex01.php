<?php 

function fatorial($num){
  $fatorial = 1;
  for($i = $num; $i >= 1; $i--){
    $fatorial *= $i; 
  }
  return $fatorial;
}
for($i = 5; $i <= 12; $i++){
    echo "<br>Fatorial de $i: ".fatorial($i);
}
