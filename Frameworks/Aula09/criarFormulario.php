<?php
include "sistema/dao/conexao.php";
$conn = Conexao::conectar();
$banco = "Tables_in_" . $_GET["bd"];
$query = $conn->query("show tables");
$tabelas = $query->fetchALL(PDO::FETCH_OBJ);
$tb = "Tables_in_" . $_GET["bd"];
echo "<form method='post' action='#'>";
echo "<select name=\"tabelas\">";
foreach ($tabelas as $tabela) {
    echo "<option>" . $tabela->$tb . "</option>";
}
echo "</select>";
echo "<button type='submit'>Criar</button>";


if ($_POST) {
    $queryAttr = $conn->query("show columns from " . $_POST["tabelas"]);
    $atributos = $queryAttr->fetchAll(PDO::FETCH_OBJ);
    $conteudo = "<html>\n<head>\n\t<title>Cadastro</title>\n";
    
    $conteudo .= '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">';
    $conteduo .= "\n". '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>';

    $conteudo .= "\n</head>\n<body>\n";  //Tente fazer o bagl do floating
    $conteudo .= "<form class='w-25 ' method='post' action='#'>\n";
    $conteudo .= "<fieldset class='bg-black'>";
    foreach ($atributos as $atributo){
        if((strpos($atributo->Extra, 'auto_increment') === false) && (strpos($atributo->Extra, 'primary_key') === false)){
            $conteudo .= "<div class='mb3'>\n";
            $conteudo .= "\t<label class='text-light' for='$atributo->Field'>".ucfirst($atributo->Field).":</label> " . "\t<input class='bg.secondary-subtle' type='text' name='$atributo->Field'><br>\n";
            $conteudo .= "\n<div>";
        }
    }
    $conteudo .= "\n<input type='submit' value='Cadastrar'>";
    $conteudo .= "\n</fieldset>";
    $conteudo .= "</form>\n";
    $conteudo .= "</body>\n</html>";
    file_put_contents("sistema/view/" . "Cadastro" . ucfirst($_POST['tabelas']) . ".php", $conteudo);
}
