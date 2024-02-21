<?php 

$num1 = 1;
$num2 = 1;
echo "$num1 $num2";

for($i = 1; $i <= 13; $i++){
  $aux = $num2;
  $num2 += $num1;
  $num1 = $aux;
  echo " $num2 ";
}

?>
