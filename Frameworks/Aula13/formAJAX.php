<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário com AJAX</title>
    <script src="ajax.js"></script>
</head>

<body>
    <form action="#" name="fr1" method="post">
        <label for="estados">Estados</label>
        <select name="estados" onchange="buscaCidade(this)">
            <option></option>
            <?php
            require_once "Estado.php";
            
            $estados = buscaEstado();
            foreach ($estados as $estado) {
                echo "<option value= " . $estado->id . ">" . $estado->nomeEstado . "</option>";
            }
            ?>
        </select>
        <label for="cidades">Cidades</label>
        <select name="cidades" id="cidades">

        </select>
    </form>
</body>

</html>
