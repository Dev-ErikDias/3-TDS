<?php

$jogadores = ["Tafarel", "Jorginho", "Aldair", "Márcio Santos", "Branco", "Mauro Silva", "Dunga", "Mazinho", "Zinho", "Romário", "Bebeto"];
$numeros = [1, 2, 13, 15, 6, 5, 8, 17, 9, 11, 7];

function linhaJogador($jogadores, $numeros, $cor){
    echo "<tr style='background-color: $cor'>";
    echo "<td>". $numeros ."</td>";
    echo "<td>". $jogadores ."</td>";
    echo "</tr>";
}


echo "<h1>Seleção brasileira de 1994</h1>";


echo "<table border='1'>";

echo "<tr>";
echo "<th>Número</th>";
echo "<th>Nome</th>";
echo "</tr>";

for($i = 0; $i<11;$i++){
    if($i % 2 == 0){
        $cor = "lightgreen";
    }else{
        $cor = "yellow";
    }
    linhaJogador($jogadores[$i], $numeros[$i], $cor);
}

echo "</table>";
