<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Background</title>
</head>
<body>
    <form method="POST">
        <label for="cores">Cor de fundo: </label>
        <select name="cores">
            <option value="Tomato">Tomato</option>
            <option value="Orange">Orange</option>
            <option value="Gray">Gray</option>
            <option value="Violet">Violet</option>
        </select>
        <br>    
        <input type="submit" value="Enviar">
    </form>
    <?php
        echo "<style> body{ background-color: ". $_POST['cores'] ."}</style>";
    ?>
</body>
</html>
