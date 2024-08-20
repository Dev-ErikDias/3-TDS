<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de filme</title>
</head>

<body>
    <form action="filme_card.php" method="post">
        <fieldset>
            <legend><b>INFORMÇÕES DO CARD</b></legend><br>
            <label for="nome">Nome: <input type="text" name="nome"></label><br><br>
            <label for="diretor">Diretor: <input type="text" name="diretor"></label><br><br>
            <label for="ano">Ano: <input type="number" name="ano"></label><br><br>
            <label for="link">Link da imagem: <input type="url" name="link"></label><br><br>
            <input type="submit" value="Enviar">
        </fieldset>
    </form>
</body>

</html>
