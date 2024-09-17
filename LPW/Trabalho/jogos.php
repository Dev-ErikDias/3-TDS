<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jogos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <form method="POST" class="bg-secondary w-75 flex-column">

        <div class="form-floating w-50 mb-3">
            <input type="text" class="form-control" name="nome" placeholder="Nome do jogo">
            <label for="nome">Nome</label>
        </div>

        <div class="form-floating w-50 mb-3">
            <select name="genero">
                <option value="">--Selecione o Gênero--</option>
                <option value="S">Simulador</option>
                <option value="R">RPG</option>
                <option value="A">Ação</option>
                <option value="E">Estratégia</option>
                <option value="O">Outro</option>
            </select>
        </div>

        <div class="form-floating w-50 mb-3">
            <input type="text" class="form-control" name="ano" placeholder="Ano de lançamento">
            <label for="ano">Ano</label>
        </div>

        <div class="w-50 mb-3">
            <input type="checkbox" class="" name="singleplayer" value='S'>
            <label for="singleplayer">Singleplayer</label>
            <input type="checkbox" class="" name="multiplayerL" value='L'>
            <label for="multiplayerL">Multiplayer Local</label>
            <input type="checkbox" class="" name="multiplayerO" value='O'>
            <label for="multiplayerO">Multiplayer Online</label>
        </div>

        <div class="form-floating w-50 mb-3">
            <input type="number" class="form-control" name="preco" placeholder="Preço de compra">
            <label for="preco">Preço</label>
        </div>

        <div class="w-50 mb-3">
            <input type="checkbox" class="" name="nintendo" value='N'>
            <label for="nintendo">Nintendo</label>
            <input type="checkbox" class="" name="computador" value='C'>
            <label for="computador">Computador</label>
            <input type="checkbox" class="" name="playstation" value='P'>
            <label for="playstation">Playstation</label>
            <input type="checkbox" class="" name="xbox" value='X'>
            <label for="xbox">Xbox</label>
            <input type="checkbox" class="" name="mobile" value='M'>
            <label for="mobile">Mobile</label>
        </div>

        <div class="w-50 mb-3">
            <select name="faixaEtaria">
                <option value="">--Selecione a Faixa Etária--</option>
                <option value=3>+3 anos</option>
                <option value=7>+7 anos</option>
                <option value=12>+12 anos</option>
                <option value=16>+16 anos</option>
                <option value=18>+18 anos</option>
            </select>
        </div>

        <input type="submit" value="Salvar">
        <input type="reset" value="Limpar">
    </form>
</body>
</html>


<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once('conexao.php');

$conn = Conexao::getConexao();

$msgErro = '';

if(isset($_POST)){
    
}

?>
