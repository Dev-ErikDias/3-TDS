<?php

$palavras = array("Futebol", "Volei", "Computador", "Mouse", "Garrafa");

$vazio = array();

foreach ($palavras as $pal) {
    array_push($vazio, $pal);
}

echo "<ul>";

foreach ($vazio as $vaz) {
    echo "<li>$vaz</li>";
}

echo "</ul>";
