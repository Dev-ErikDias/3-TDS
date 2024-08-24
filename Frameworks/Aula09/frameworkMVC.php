<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Framework MVC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
  <div class="w-25 p-4 shadow rounded-3 bg-white">
    <form action="conexao.php" method="post">
        <fieldset class="mb-3">
            <legend class="mb-3 fw-bold text-center">Arquitetura para Databases</legend>
            <input type="hidden" name="criar" value="1">

            <div class="mb-3">
            <label for="servidor" class="form-label">Servidor</label>
            <input type="text" name="servidor" class="form-control rounded-3" placeholder="Informe o servidor">
            </div>

            <div class="mb-3">
            <label for="banco" class="form-label">Banco de Dados</label>
            <input type="text" name="banco" class="form-control rounded-3" placeholder="Informe o database">
            </div>

            <div class="mb-3">
            <label for="usuario" class="form-label">Usuário do Banco de Dados</label>
            <input type="text" name="usuario" class="form-control rounded-3" placeholder="Informe o usuário">
            </div>

            <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" name="senha" class="form-control rounded-3" placeholder="Informe a senha">
            </div>

            <div class="text-center">
            <input type="submit" value="Criar" class="btn btn-primary w-100">
            </div>
        </fieldset>
    </form>
    <?php
        if(isset($_GET['msg'])){
            switch ($_GET['msg']){
                case 0:
                    $msgClasse = "text-success fw-bold";
                    $msg = "Arquitetura do sistema criada com sucesso!";
                    break;

                case 1:
                    $msgClasse = "text-danger fw-bold";
                    $msg = "ERRO: Problema ao conectar com o Banco!";
                    break;
            }
            echo "<label class='$msgClasse'>$msg</label>";
        }
    ?>
</body>
</html>
