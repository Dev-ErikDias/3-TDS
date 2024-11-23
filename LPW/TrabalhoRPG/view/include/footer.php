<!-- Lista de personagens cadastrados -->

<div class="col-md-6">
    <h1>Personagens Cadastrados</h1>
    <div class="list-group">
        <?php
        $personagens = $personagemCont->listar();

        foreach($personagens as $personagem):
        ?>
            <div class="list-group-item d-flex justify-content-between align-items-center">
                <h5><?php echo $personagem->getNickname(); ?></h5>
                <div>
                    <a href="editar.php?id_edit=<?php echo $personagem->getId(); ?>" class="btn btn-warning btn-sm">Editar</a>
                    <form method="POST">
                        <input type="hidden" name="id_show" value="<?php echo $personagem->getId(); ?>">
                        <button type="submit" name="visualizar" class="btn btn-info btn-sm">Visualizar</button>
                    </form>
                    <a href="excluir.php?id_del=<?php echo $personagem->getId(); ?>" onclick="return confirm('Deseja mesmo excluir <?php echo $personagem->getNickname(); ?>?');" class="btn btn-danger btn-sm">Excluir</a>    
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
