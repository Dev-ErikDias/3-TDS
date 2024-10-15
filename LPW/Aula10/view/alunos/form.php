<?php
include_once(__DIR__.'/../include/header.php');
include_once(__DIR__.'/../../controller/cursoController.php');

$cursoCont = new CursoController();
$cursos = $cursoCont->listar();

?>

<h3>Cadastrar Aluno</h3>

<form id='formAluno' action="inserir.php" method="post">

    <div>
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id='txtNome' placeholder="Informe o nome" maxlength="70">
    </div>

    <div>
        <label for="idade">Idade:</label>
        <input type="number" name="idade" id='txtIdade' placeholder="Informe a idade">
    </div>  

    <div>
        <label for="selEtrang">Estrangeiro:</label>
        <select name="estrang" id="selEstrang">
            <option value="">--Selecione--</option>
            <option value="T">Sim</option>
            <option value="F">Não</option>
        </select>
    </div>

    <div>
        <label for="selCurso">Curso:</label>
        <select name="curso" id="selCurso">
            <option value="">--Selecione--</option>
            <?php foreach($cursos as $c): ?>
                <option value='<?=$c->getId() ?>'><?= $c?></option>
            <?php endforeach; ?>  
        </select>
    </div>

    <div>
        <input type="submit" value="Gravar">
    </div>
</form>

<div>
    <a href="listar.php">Voltar</a>
</div>

<?php
include_once(__DIR__.'/../include/footer.php');
?>
