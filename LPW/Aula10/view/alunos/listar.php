
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

for ($i = 0; $i < count($alunos); $i++) {
    for ($j = $i + 1; $j < count($alunos); $j++) {
        $orderBy = $_GET['list'] ?? 'id'; // Se $_GET['list'] não estiver definido, ordena por 'id'

        switch ($orderBy) {
            case 'course':
                $ver = $alunos[$i]->getCurso() > $alunos[$j]->getCurso();
                break;
            case 'age':
                $ver = $alunos[$i]->getIdade() > $alunos[$j]->getIdade();
                break;
            case 'id':
            default:
                $ver = $alunos[$i]->getId() > $alunos[$j]->getId();
                break;
        }

        if($ver){
            $aux = $alunos[$i];
            $alunos[$i] = $alunos[$j];
            $alunos[$j] = $aux;
        }
    }
}


include_once(__DIR__.'/../include/header.php');
?>

<h2>Listagem de Alunos</h2>

<div>
    <form method="get" action="">
        <button type="submit" name="list" value="id">Ordenar por ID</button>
        <button type="submit" name="list" value="course">Ordenar por Curso</button>
        <button type="submit" name="list" value="age">Ordenar por Idade</button>
    </form>
</div>

<a href="inserir.php">Inserir aluno</a>

<table border="1">
    <!-- Cabeçalho da tabela !-->

    <thead>
        <th>ID</th>
        <th>Nome</th>
        <th>Idade</th>
        <th>Estrangeiro</th>
        <th>Curso</th>
        <th>Ações</th>
    </thead>

    <!-- Dados da tabela !-->
        <?php foreach($alunos as $a): ?> 

        <tr>
            <td><?= $a->getId();?></td>
            <td><?= $a->getNome();?></td>
            <td><?= $a->getIdade();?></td>
            <td><?= $a->getEstrangeiroText();?></td>
            <td><?= $a->getCurso();?></td>
            <td> <a href="excluir.php?id=<?= $a->getId()?>" onclick=" return confirm('Deseja mesmo excluir <?= $a->getNome()?>?')"> <img src="__DIR__/../../../img/btn_excluir.png" alt=""></a> 
            <a href="alterar.php?id=<?= $a->getId()?>"> <img src="__DIR__/../../../img/btn_editar.png" alt=""></a> </td>
        </tr>

    <?php endforeach; ?>    
</table>

<?php
include_once(__DIR__.'/../include/footer.php');
?>
