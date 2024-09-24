<?php  

ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once 'conexao.php';

$conn = Conexao::getConexao();


$msgErro = '';

$nome = '';
$genero = '';
$ano = '';
$rede = '';
$preco = '';
$plataforma = '';
$faixaEtaria = '';

if($_POST){
    $nome = trim($_POST['nome']) ? trim($_POST['nome']) : null;
    $genero = $_POST['genero'] ? $_POST['genero'] : null;
    $ano = trim($_POST['ano']) ? trim($_POST['ano']) : null;

    $rede .= (isset($_POST['singleplayer']) ? $_POST['singleplayer'] : '') . (isset($_POST['multplayerO']) ? $_POST['multplayerO'] : '') . (isset($_POST['multplayerL']) ? $_POST['multplayerL'] : '');
    
    $preco = trim($_POST['preco']) ? trim($_POST['preco']) : null;

    $plataforma .= (isset($_POST['nintendo']) ? $_POST['nintendo'] : '') . (isset($_POST['computador']) ? $_POST['computador'] : '') . (isset($_POST['playstation']) ? $_POST['playstation'] : '');
    $plataforma .= (isset($_POST['xbox']) ? $_POST['xbox'] : '') . (isset($_POST['mobile']) ? $_POST['mobile'] : '');

    $plataforma = $plataforma != '' ? $plataforma : null;

    $faixaEtaria = $_POST['faixaEtaria'] ? $_POST['faixaEtaria'] : null;
    
    $erros = array();
    if(!$nome){
        array_push($erros, 'Informe o nome!');
    }
    if(!$genero){
        array_push($erros, 'Informe o gênero!');
    }
    if(!$ano){
        array_push($erros, 'Informe o ano!');
    }
    if(!$rede){
        array_push($erros, 'Informe a rede!');
    }
    if(!$preco){
        array_push($erros, 'Informe o preço!');
    }
    if(!$plataforma){
        array_push($erros, 'Informe a plataforma!');
    }
    if(!$faixaEtaria){
        array_push($erros, 'Informe a faixa etária!');
    }

    if(empty($erros)){
        
        $sql = "INSERT INTO jogos (nome, genero, ano, rede, preco, plataforma, faixa_etaria) VALUES (?, ?, ?, ?, ?, ?, ?)";

        $stm = $conn->prepare($sql);
        $stm->execute([$nome,  $genero, $ano, $rede, $preco ,$plataforma, $faixaEtaria]);

        //Redirecionar para a pagina desejada
        header("Location: jogos.php");
        
    }else{
        $msgErro = implode("<br>", $erros);
    }

}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jogos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        form {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 30px auto;
            max-width: 600px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .form-floating select, .form-control {
            height: 50px;
        }

        .form-floating label {
            font-size: 14px;
            padding-left: 10px;
        }

        .form-floating select {
            padding: 12px;
        }

        .w-50 {
            width: 100% !important;
        }

        .form-check {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
        }

        input[type="submit"], input[type="reset"] {
            width: 48%;
            margin-top: 15px;
        }

        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #343a40;
            color: #ffffff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .error-message {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <form method="POST" class="bg-secondary w-75 flex-column">
        <legend class="text-center text-white">Cadastro de jogos</legend>
        <div class="form-floating w-50 mb-3">
            <input type="text" class="form-control" name="nome" placeholder="Nome do jogo" value="<?= $nome ?>">
            <label for="nome">Nome</label>
        </div>

        <div class="form-floating w-50 mb-3">
            <select name="genero">
                <option value="">--Selecione o Gênero--</option>
                <option value="S" <?= ($genero == 'S') ? 'selected' : '' ?>>Simulador</option>
                <option value="R" <?= ($genero == 'R') ? 'selected' : '' ?>>RPG</option>
                <option value="A" <?= ($genero == 'A') ? 'selected' : '' ?>>Ação</option>
                <option value="E" <?= ($genero == 'E') ? 'selected' : '' ?>>Estratégia</option>
                <option value="O" <?= ($genero == 'O') ? 'selected' : '' ?>>Outro</option>
            </select>
        </div>


        <div class="form-floating w-50 mb-3">
            <input type="number" class="form-control" name="ano" placeholder="Ano de lançamento" value="<?= $ano ?>">
            <label for="ano">Ano</label>
        </div>

        <div class="w-50 mb-3">
            <input type="checkbox" class="" name="singleplayer" value='S' <?= isset($_POST['singleplayer']) ? 'checked' : '' ?>>
            <label for="singleplayer">Singleplayer</label>
            <input type="checkbox" class="" name="multplayerO" value='O' <?= isset($_POST['multplayerO']) ? 'checked' : '' ?>>
            <label for="multiplayerO">Multiplayer Online</label>
            <input type="checkbox" class="" name="multplayerL" value='L <?= isset($_POST['multplayerL']) ? 'checked' : '' ?>'>
            <label for="multiplayerL">Multiplayer Local</label>
        </div>

        <div class="form-floating w-50 mb-3">
            <input type="number" class="form-control" name="preco" placeholder="Preço de compra" value="<?= $preco ?>">
            <label for="preco">Preço</label>
        </div>

        <div class="w-50 mb-3">
            <input type="checkbox" class="" name="nintendo" value='N' <?= isset($_POST['nintendo']) ? 'checked' : '' ?>>
            <label for="nintendo">Nintendo</label>
            <input type="checkbox" class="" name="computador" value='C' <?= isset($_POST['computador']) ? 'checked' : '' ?>>
            <label for="computador">Computador</label>
            <input type="checkbox" class="" name="playstation" value='P' <?= isset($_POST['playstation']) ? 'checked' : '' ?>>
            <label for="playstation">Playstation</label>
            <input type="checkbox" class="" name="xbox" value='X' <?= isset($_POST['xbox']) ? 'checked' : '' ?>>
            <label for="xbox">Xbox</label>
            <input type="checkbox" class="" name="mobile" value='M' <?= isset($_POST['mobile']) ? 'checked' : '' ?>>
            <label for="mobile">Mobile</label>
        </div>

        <div class="w-50 mb-3">
            <select name="faixaEtaria">
                <option value="">--Selecione a Faixa Etária--</option>
                <option value="3" <?= ($faixaEtaria == '3') ? 'selected' : '' ?>>+3 anos</option>
                <option value="7" <?= ($faixaEtaria == '7') ? 'selected' : '' ?>>+7 anos</option>
                <option value="12" <?= ($faixaEtaria == '12') ? 'selected' : '' ?>>+12 anos</option>
                <option value="16" <?= ($faixaEtaria == '16') ? 'selected' : '' ?>>+16 anos</option>
                <option value="18" <?= ($faixaEtaria == '18') ? 'selected' : '' ?>>+18 anos</option>
            </select>
        </div>


        <input type="submit" value="Salvar">
        <input type="reset" value="Limpar">
    </form>
    
    <span id="msg" style="color: red;"><?= $msgErro; ?></span>

        <?php
        $sql = "SELECT * FROM jogos";
        $stm = $conn->prepare($sql);
        $stm->execute();
        $jogos = $stm->fetchAll();
        ?>

    <table border="1">
        <thead>
            <th>ID</th>
            <th>Nome</th>
            <th>Gênero</th> 
            <th>Ano</th>
            <th>Rede</th>
            <th>Preço</th>
            <th>Plataforma</th>
            <th>Faixa Etária</th>
            <th></th>
        </thead>
        <?php foreach ($jogos as $jogo): ?>

            <tr>
                <td> <?= $jogo['id'] ?></td>
                <td> <?= $jogo['nome'] ?> </td>
                <td> <?php
                        switch ($jogo['genero']) {
                            case 'A':
                                echo "Ação";
                                break;

                            case 'S':
                                echo "Simulador";
                                break;

                            case 'R':
                                echo "RPG";
                                break;

                            case 'E':
                                echo "Estratégia";
                                break;

                            case 'O':
                                echo "Outro";
                                break;
                        }
                        ?> </td>

                <td> <?= $jogo['ano'] ?> </td>

                <td> <?php $redes = array();
                foreach (str_split($jogo['rede']) as $r) {
                    switch ($r) {
                        case 'S':
                           array_push($redes, 'Singleplayer');
                            break;
                        
                        case 'O':
                            array_push($redes, 'Online');
                            break;

                        case 'L':
                            array_push($redes, 'Local');
                            break;
                    }
                    
                } echo implode(", ", $redes);?></td>

                <td> <?= "R$". $jogo['preco'] ?></td>

                <td>

                <?php $plataformas = array();
                foreach (str_split($jogo['plataforma']) as $p) {
                    switch ($p) {
                        case 'N':
                           array_push($plataformas, 'Nintendo');
                            break;
                        
                        case 'C':
                            array_push($plataformas, 'Computador');
                            break;

                        case 'P':
                            array_push($plataformas, 'Playstation');
                            break;

                        case 'X':
                            array_push($plataformas, 'Xbox');
                            break;

                        case 'M':
                            array_push($plataformas, 'Mobile');
                            break;
                    }
                    
                } echo implode(", ", $plataformas);?>
                </td>

                <td><?= "+".$jogo['faixa_etaria'] ?></td>

                <td>
                    <a href="jogosDel.php?id=<?= $jogo['id'] ?>" onclick=" return confirm('Deseja mesmo excluir <?= $jogo['nome']?>?')">Excluir</a>
                </td>
            </tr>

        <?php endforeach; ?>
    </table>
</body>
</html>
