<?php
include "conexao.php";

$dados = $conn->query("select * from tds");
echo "<table border='1'>";
echo "<thead>";
echo '<th>Id</th>';
echo "<th>Nome</th>";
echo "<th>Idade</th>";
echo "<th>Ano</th>";
echo "</thead>";

foreach ($dados as $aluno) {
    echo "<tr>";
    echo "<td>" . $aluno['id'] . "</td>";
    echo "<td>" . $aluno['nome'] . "</td>";
    echo "<td>" . $aluno['idade'] . "</td>";
    echo "<td>" . $aluno['ano'] . "</td>";
    echo "</tr>";
}

echo "</table>";
