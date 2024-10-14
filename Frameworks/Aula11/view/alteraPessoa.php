<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar dados pessoas</title>
</head>
<body>
    <?php

    require_once("../dao/PessoaDao.php");
    if($_POST){
        $dao = new PessoaDao();
        $dados = $dao->buscaPessoa($_POST['id']);
        if($dados == null){
            echo "Registro não encontrado";
        }
    }

    ?>
    <form action="#" method="post">
        <label for="id">Informe o id</label>
        <input type="number" name="id">
        <input type="submit" value="Buscar">
        <hr>
    </form>
    <form action="../control/pessoaControl.php?a=1" method="post">
        <input type="hidden" name="id" value="<?php echo $dados->id;?>">
        <label for="nome">Nome</label>
        <input type="text" name="nome" value="<?php echo $dados->nome;?>"><br><br>
        <label for="idade">Idade</label>
        <input type="number" name="idade" value="<?php echo $dados->idade;?>"><br>
        <input type="submit" value="Alterar">
    </form>
</body>
</html>
