<?php

echo "<link rel='stylesheet' href='style.css'>";


$USA = array("ordem" => "1", "nome" => 'Estados Unidos', "ouro" => 46, "prata" => 37, "bronze" => 38, "total" => 121, "bandeira" => "(link)");
$GBR = array("ordem" => "2", "nome" => 'Grã-Bretanha', "ouro" => 27, "prata" => 23, "bronze" => 17, "total" => 67);
$CHN = array("ordem" => "3", "nome" => 'China', "ouro" => 26, "prata" => 18, "bronze" => 26, "total" => 70);
$RUS = array("ordem" => "4", "nome" => 'Rússia', "ouro" => 19, "prata" => 17, "bronze" => 20, "total" => 56);
$GER = array("ordem" => "5", "nome" => 'Alemanha', "ouro" => 17, "prata" => 10, "bronze" => 15, "total" => 42);

$paises = array($USA, $GBR, $CHN, $RUS, $GER);

echo "<table border = '1'>";
echo "<thead>";
echo "<th>Ordem</th>";
echo "<th>Países</th>";
echo "<th><img src='https://static.vecteezy.com/system/resources/previews/019/051/654/original/gold-medal-symbol-png.png'></th>";
echo "<th><img src='https://static.vecteezy.com/system/resources/previews/029/474/759/original/silver-medal-with-red-ribbon-for-second-place-pro-png.png'></th>";
echo "<th><img src='https://static.vecteezy.com/system/resources/previews/029/759/660/original/bronze-medal-with-red-ribbon-for-third-place-pro-png.png'></th>";
echo "<th><img class='medalhas' src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQGvK6iaWxaodKrJb7BISCziex-YLwFRTa1B1GklhhmirC7uMT8Z0BqNLfAqYCJretlBh4&usqp=CAU'></th>";
echo "</thead>";
function criarLinhas($paises){
    foreach ($paises as $pais) {
        echo "<tr>";
        echo "<td>".$pais['ordem']."</td>";
        echo "<td>".$pais['nome']."</td>";
        echo "<td>".$pais['ouro']."</td>";
        echo "<td>".$pais['prata']."</td>";
        echo "<td>".$pais['bronze']."</td>";
        echo "<td>".$pais['total']."</td>";
        echo "</tr>";
    }
    echo "</table>";
}

criarLinhas($paises);
