    <?php

    //Teste de conexão com a base de dados
    /*
    include_once(__DIR__.'/../../util/Connection.php');
    $conn = Connection::getConnection();
    print_r($conn);
    */

    include_once(__DIR__.'/../../controller/alunoController.php');

    $alunoCont = new AlunoController();
    $alunos = $alunoCont->listar();
    print_r($alunos);


    include_once(__DIR__.'/../include/header.php');
    ?>

    <h2>Listagem de Alunos</h2>

    <table border="1">
        <!-- Cabeçalho da tabela !-->

        <thead>
            <th>ID</th>
            <th>Nome</th>
            <th>Idade</th>
            <th>Estrangeiro</th>
            <th>Curso</th>
        </thead>

        <!-- Dados da tabela !-->
    </table>

    <?php
    include_once(__DIR__.'/../include/footer.php');

    ?>
