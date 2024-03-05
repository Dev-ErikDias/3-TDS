<?php

$vetor = array(5, 7, 9, 2, 4);

echo $vetor[2];
echo "<br>";

for($i = 0; $i < count($vetor);$i++){
    echo $vetor[$i]. "<br>";
}

foreach ($vetor as $var) {
   echo $var;
}

echo "<br>";
//Associativo
$professor = array("nome" => "Daniel", "idade" => 25, "disciplina" => "LPW");
$professor2 = array("nome" => "Jefferson", "idade" => 34, "disciplina" => "Algoritmos");

$professores = array($professor, $professor2);

echo $professor["nome"];
echo "<br>". $professor["idade"];
echo "<br>". $professor["disciplina"];

echo "<br>";

//FOR normal n funciona, por causa da troca dos indices
foreach($professor as $p){
    echo $p . "<br>";
}

echo $professores[1]["disciplina"];

foreach ($professores as $prof) {
    echo "<br><br>Nome: ".$prof["nome"];
    echo "<br>Idade: ".$prof["idade"];
    echo "<br>Disciplina: ".$prof["disciplina"];
}
