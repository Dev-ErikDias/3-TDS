<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Framework MVC</title>
</head>

<body>
    <form action="conexao.php" method="post">
        <label for="servidor">Servidor:</label>
        <input type="text" name="servidor"><br><br>
        <label for="banco">Banco de Dados:</label>
        <input type="text" name="banco"><br><br>
        <label for="usuario">Usúario do Banco de Dados:</label>
        <input type="text" name="usuario"><br><br>
        <label for="senha">Senha:</label>
        <input type="password" name="senha"><br><br>
        <input type="submit" value="Criar">
    </form>
    <label>
        <?php

        if (isset($_GET['msg'])) {
            switch ($_GET['msg']) {
                case 0:
                    echo "Conexão com o Banco de Dados estabelecida com sucesso";
                    echo "<br> Criando estrutura de diretórios e classes";
                    header("Location:criaClasses.php");
                    break;
                case 1:
                    echo "ERRO: Problema ao conectar com o Banco de Dados";
                    break;
            }
        }
        ?>
    </label>
</body>

</html>
