<?php

$pessoa = array("nome" => "Manuel de Medeiros", "endereco" => "Rua das Acácias", "cidade" => "Foz do Iguaçu", "uf" => "PR");
$pessoa2 = array("nome" => "Juliana de Amaral", "endereco" => "Rua dos Pinheiros", "cidade" => "Florianópolis", "uf" => "SC");
$pessoa3 = array("nome" => "Rodrigo Baidek", "endereco" => "Rua Dom Pedro I", "cidade" => "Petrópolis", "uf" => "RJ");
$pessoa4 = array("nome" => "Fabíola da Silva", "endereco" => "Rua Chile", "cidade" => "Guarulhos", "uf" => "SP");
$pessoas = array($pessoa, $pessoa2, $pessoa3, $pessoa4);

function gerarLinha($vetor){
    for($i = 0; $i <count($vetor); $i++){
        echo "<tr>";
        foreach($vetor[$i] as $vet){
            echo "<td> $vet</td>";
        }
        echo "</tr>";
    }
}

echo "<table border='1'>";

echo "<tr>";
echo "<th>Nome</th>";
echo "<th>Endereço</th>";
echo "<th>Cidade</th>";
echo "<th>UF</th>";
echo "</tr>";

gerarLinha($pessoas);

echo "</table>";
