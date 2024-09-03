<?php
//Configuração para mostrar os erros
ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once('conexao.php');
$conn = Conexao::getConexao();
//print_r($conn);


//Verifica se o usuário já clicou no gravar
if ($_POST) {
    $titulo = $_POST['titulo'];
    $genero = $_POST['genero'];
    $qtdPaginas = $_POST['qtdPaginas'];

    //echo "$titulo - $genero - $qtdPaginas";

    $sql = "INSERT INTO livros (titulo, genero, qtd_paginas)
        VALUES (?, ?, ?)";

    $stm = $conn->prepare($sql);
    $stm->execute([$titulo,  $genero, $qtdPaginas]);

    //Redirecionar para a pagina desejada
    header("Location: livro.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de livros</title>
</head>

<body>
    <h3>Formulário do livro</h3>

    <form method="post">
        <input type="text" name="titulo" placeholder="Informe o título">
        <br><br>
        <select name="genero">
            <option value="">--Selecione o gênero--</option>
            <option value="A">Aventura</option>
            <option value="D">Drama</option>
            <option value="F">Ficção</option>
            <option value="R">Romance</option>
            <option value="O">Outros</option>
        </select>
        <br><br>
        <input type="number" name="qtdPaginas" placeholder="Quantidade de páginas">
        <br><br>
        <input type="submit" value="Salvar">
        <input type="reset" value="Limpar">
    </form>

    <h3>Listagem do livros</h3>

    <?php

    $sql = "SELECT * FROM livros";
    $stm = $conn->prepare($sql);
    $stm->execute();
    $livros = $stm->fetchAll();
    ?>

    <table border="1">
        <thead>
            <th>ID</th>
            <th>Título</th>
            <th>Gênero</th>
            <th>Páginas</th>
            <th></th>
        </thead>
        <?php foreach ($livros as $livro): ?>

            <tr>
                <td> <?=$livro['id']?></td>
                <td> <?=$livro['titulo']?> </td>
                <td> <?=$livro['genero']?> </td>
                <td> <?=$livro['qtd_paginas']?> </td>
                <td> 
                    <a href="livroDel.php?id=<?=$livro['id']?>">Excluir</a>
                </td>
            </tr>

        <?php endforeach; ?>
    </table>
</body>

</html>
