<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário do Aluno</title>
</head>

<body>
    <form action='aluno_formulario.php' method="post">
        <fieldset>
            <label for="nome">Nome: <input type="text" name="nome"></label><br><br>
            <label for="senha">Senha: <input type="password" name="senha"></label><br><br>
            <input type="submit" value="Logar">
        </fieldset>
    </form>
    <?php

    $user = $_POST['nome'];
    $senha = $_POST['senha'];

    if ($user != "" && $senha != "") {
        if ($user == "ifpr" && $senha == "tds") {
            echo "<style>form{ display:none; }</style>";
            echo "Bem vindos ao TDS!";
        } else {
            echo "Nome ou senha incorretos";
        }
    }

    ?>
</body>

</html>
