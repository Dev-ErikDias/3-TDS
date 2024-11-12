<?php

include_once(__DIR__."/../include/header.php");
include_once(__DIR__."/../../controller/cursoController.php");

$cursoCont = new CursoController();
$cursos = $cursoCont->listar();
//print_r($cursos);
?>


<form id="formAluno" method="post">

    <div>
        <label for="txtNome">Nome</label>
        <input type="text" placeholder="Informe o nome" name="nome" id="textNome" maxlength="70" value="<?= $aluno != null ? $aluno->getNome() : ""?>">
    </div>

    <div>
        <label for="txtIdade">idade</label>
        <input type="number" placeholder="Informe a idade" name="idade" id="textIdade"  value="<?= $aluno != null ? $aluno->getIdade() : ""?>">
    </div>

    <div>
        <label for="selEstrange">Estrangeiro</label>
        <select name="estrang" id="selEstrange">
        <option value="">------Selecione------ </option>
        <option value="T" <?= $aluno != null && $aluno->getEstrangeiro() == 'T' ? 'selected':''?>>Sim</option>
        <option value="F" <?= $aluno != null && $aluno->getEstrangeiro() == 'F' ? 'selected':''?>>Não</option>
        </select>
    </div>

    <div>
        <label for="selCurso">Selecione o Curso</label>
        <select name="selCurso" id="selCurso">
            <option value="">------Selecione------ </option>
            <?php foreach($cursos as $curso):?>
                <option value="<?= $curso->getId()?>"
                <?php if($aluno != null && $aluno->getCurso()!= null && $aluno->getCurso()->getId() == $curso->getId()){
                    echo "selected";
                    }?>>
                    <?= $curso?></option>
            <?php endforeach?>   
        
       
        </select>
    </div>

    <input type="hidden" name="id" value="<?= $aluno != null ? $aluno->getId() : ''?>">

    <div>
        <input type="submit" value="Gravar">
    </div>

    
</form>

<div style='color: red;'>
    <?=$msgErro?>
</div>

<div>
    <a href="listar.php"><-----</a>
</div>





<?php
include_once(__DIR__."/../include/footer.php");
?>
