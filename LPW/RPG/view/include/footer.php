    <!-- Lista de personagens cadastrados -->
    <div class="col-md-6 p-4 rounded-4 ms-auto bg-warning bg-gradient">
        <h1>Personagens Cadastrados</h1>
        <div class="list-group gap-1">
            <?php
            $personagens = $personagemCont->listar();

            foreach ($personagens as $index => $personagem):
                $psg = clone $personagem;
               
            ?>
                <div class="list-group-item d-flex justify-content-between align-items-center">
                    <h5><?php echo $personagem->getNickname(); ?></h5>
                    <div>
                        <!-- Botão para abrir o colapso -->
                        <button class="btn btn-info btn-sm" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo $index; ?>" aria-expanded="false" aria-controls="collapse-<?php echo $index; ?>">
                            Visualizar
                        </button>
                        <a href="editar.php?id_edit=<?php echo $personagem->getId(); ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="excluir.php?id_del=<?php echo $personagem->getId(); ?>" onclick="return confirm('Deseja mesmo excluir <?php echo $personagem->getNickname(); ?>?');" class="btn btn-danger btn-sm">Excluir</a>
                    </div>
                </div>
                <!-- Conteúdo colapsável -->
                <?php
                $personagemArray = $personagemService->calcularEstatisticas($psg); // Usa o método que retorna um array associativo com estatísticas
                ?>
                <div id="collapse-<?php echo $index; ?>" class="collapse mt-1">
                    <div class="card card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><strong><i class="fa-solid fa-user"></i> Nick:</strong> <?php echo $personagemArray['nickname']; ?></p>
                                <p><strong><i class="fa-solid fa-heart" style="color: #c01111;"></i> Vida:</strong> <?php echo $personagemArray['vida']; ?></p>
                                <p><strong><i class="fa-solid fa-bomb" style="color: #c01111;"></i> Ataque:</strong> <?php echo $personagemArray['attack']; ?></p>
                                <p><strong><i class="fa-solid fa-shield" style="color: #5b5f67;"></i> Defesa:</strong> <?php echo $personagemArray['defense']; ?></p>
                            </div>
                            <div class="col-md-6">
                                <!-- Novos atributos ao lado -->
                                <p><strong><i class="fa-solid fa-user-tie" style="color: #74C0FC;"></i> Classe:</strong> <?php echo $personagemArray['classe']; ?></p>
                                <p><strong><i class="fa-solid fa-star" style="color: #FFD43B;"></i> Habilidade:</strong> <?php echo $personagemArray['habilidade']; ?></p>
                                <p><strong><i class="fa-solid fa-flask" style="color: #40219c;"></i> Item:</strong> <?php echo $personagemArray['item']; ?></p>
                                <p><strong><i class="fa-solid fa-crosshairs" style="color: #c01111;"></i> Bônus de Classe:</strong> <?php echo $personagemArray['item_bonus']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
