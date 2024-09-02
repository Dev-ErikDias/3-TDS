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
    $conteudo = "<html>\n\t<head>\n\t<title>Cadastro</title>\n</head>\n\t<body>\n";
    $conteudo .= "<form method 'post' action='#>\n";
    foreach ($atributos as $atributo) {
        $conteudo .= $atributo->Field . "<input type='text' name='$atributo->Field'><br>\n";
    }
    $conteudo .= "<input type='submit' value='Cadastrar'>";
    $conteudo .= "</form>\n";
    $conteudo .= "</body>\n</html>";
    file_put_contents("sistema/view/" . "Cadastro" . ucfirst($_POST['tabelas']) . ".php", $conteudo);
}
