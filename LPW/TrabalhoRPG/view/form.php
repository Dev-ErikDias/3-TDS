

<!-- Formulário para cadastro/edição de personagem -->
<div class="col-md-6">
    <h1> <?php if(isset($_GET['id_edit'])): ?> Editar <?php else: ?> Cadastrar <?php endif;?> Personagem</h1>
    <form method="POST">
        <?php if (isset($_GET['id_edit'])): ?>
            <input type="hidden" name="id_edit" value="<?php echo $personagem['id']; ?>">
        <?php endif; ?>

        <div class="mb-3">
            <label for="nickName" class="form-label">Nickname:</label>
            <input type="text" name="nickName" id="nickName" class="form-control" value="<?php echo isset($personagem) ? $personagem['nickname'] : ''; ?>">
        </div>

        <div class="mb-3">
            <label for="classe" class="form-label">Classe:</label>
            <select name="classe" id="classe" class="form-select">
                <option value="">Selecione a sua Classe</option>
                <option value="1" <?php echo (isset($personagem) && $personagem['id_classe'] == 1) ? 'selected' : ''; ?>>Mago</option>
                <option value="2" <?php echo (isset($personagem) && $personagem['id_classe'] == 2) ? 'selected' : ''; ?>>Guerreiro</option>
                <option value="3" <?php echo (isset($personagem) && $personagem['id_classe'] == 3) ? 'selected' : ''; ?>>Paladino</option>
                <option value="4" <?php echo (isset($personagem) && $personagem['id_classe'] == 4) ? 'selected' : ''; ?>>Assassino</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="item" class="form-label">Item:</label>
            <select name="item" id="item" class="form-select">
                <option value="">Selecione o seu Item</option>
                <option value="1" <?php echo (isset($personagem) && $personagem['id_item'] == 1) ? 'selected' : ''; ?>>Espada do Guerreiro</option>
                <option value="2" <?php echo (isset($personagem) && $personagem['id_item'] == 2) ? 'selected' : ''; ?>>Cajado do Mago</option>
                <option value="3" <?php echo (isset($personagem) && $personagem['id_item'] == 3) ? 'selected' : ''; ?>>Escudo do Paladino</option>
                <option value="4" <?php echo (isset($personagem) && $personagem['id_item'] == 4) ? 'selected' : ''; ?>>Adaga do Assassino</option>
                <option value="5" <?php echo (isset($personagem) && $personagem['id_item'] == 5) ? 'selected' : ''; ?>>Armadura de Guerreiro</option>
                <option value="6" <?php echo (isset($personagem) && $personagem['id_item'] == 6) ? 'selected' : ''; ?>>Anel do Mago</option>
            </select>
        </div>

        <h3>Distribua os pontos (20) de acordo com a sua preferência</h3>

        <p id="pontosRestantes" class="mb-3">Pontos restantes: <?php if(isset($personagem)): ?> 0 <?php else: ?> 20 <?php endif;?></p>

        <div class="mb-3">
            <label for="vida" class="form-label">Vida:</label>
            <input type="number" name="vida" id="vida" class="form-control" min="0" max="20" value="<?php echo (isset($personagem)) ? $personagem['vida'] : 0; ?>" onchange="atualizarPontos()" oninput="atualizarPontos()">
        </div>

        <div class="mb-3">
            <label for="attack" class="form-label">Ataque:</label>
            <input type="number" name="attack" id="attack" class="form-control" min="0" max="20" value="<?php echo (isset($personagem)) ? $personagem['attack'] : 0; ?>" onchange="atualizarPontos()" oninput="atualizarPontos()">
        </div>

        <div class="mb-3">
            <label for="defense" class="form-label">Defesa:</label>
            <input type="number" name="defense" id="defense" class="form-control" min="0" max="20" value="<?php echo (isset($personagem)) ? $personagem['defense'] : 0; ?>" onchange="atualizarPontos()" oninput="atualizarPontos()">
        </div>

        <div>
            <button type="submit" class="btn btn-primary" name="gravar">Gravar</button>
            <button type="reset" class="btn btn-secondary">Limpar</button>
            <?php if (isset($_GET['id_edit'])): ?>
                <a href="inserir.php" class="btn btn-success">Voltar</a>
            <?php endif; ?>
        </div>
    </form>
</div>

<script>
    const maxPontos = 20;
    const vidaInput = document.getElementById("vida");
    const attackInput = document.getElementById("attack");
    const defenseInput = document.getElementById("defense");
    const pontosRestantesDiv = document.getElementById("pontosRestantes");
    const submitButton = document.getElementById("submitButton");

    // Função para corrigir valores inválidos
    function corrigirValor(inputElement) {
        let value = parseInt(inputElement.value) || 0;
        // Garante que o valor esteja entre 0 e 20
        if (value < 0) {
            value = 0;
        } else if (value > 20) {
            value = 20;
        }
        inputElement.value = value;
    }

    // Função para atualizar os pontos restantes e somar
    function atualizarPontos() {
        corrigirValor(vidaInput);
        corrigirValor(attackInput);
        corrigirValor(defenseInput);

        const vida = parseInt(vidaInput.value) || 0;
        const attack = parseInt(attackInput.value) || 0;
        const defense = parseInt(defenseInput.value) || 0;

        const totalPontos = vida + attack + defense;

        // Verifica se a soma total ultrapassou o limite de pontos
        if (totalPontos > maxPontos) {
            // Ajusta os valores para não ultrapassar o limite total
            const excedente = totalPontos - maxPontos;
            if (vida > excedente) {
                vidaInput.value = vida - excedente;
            } else if (attack > excedente) {
                attackInput.value = attack - excedente;
            } else {
                defenseInput.value = defense - excedente;
            }
        }

        const totalAtualizado = parseInt(vidaInput.value) + parseInt(attackInput.value) + parseInt(defenseInput.value);
        const pontosRestantes = maxPontos - totalAtualizado;
        pontosRestantesDiv.textContent = `Pontos restantes: ${pontosRestantes}`;

        // Habilita o botão se a soma for 20
        if (totalAtualizado === maxPontos) {
            submitButton.disabled = false;
        } else {
            submitButton.disabled = true;
        }
    }

    // Adiciona os event listeners nos campos
    vidaInput.addEventListener("input", atualizarPontos);
    attackInput.addEventListener("input", atualizarPontos);
    defenseInput.addEventListener("input", atualizarPontos);

    // Função para submissão
    submitButton.addEventListener("click", () => {
        const vida = parseInt(vidaInput.value) || 0;
        const attack = parseInt(attackInput.value) || 0;
        const defense = parseInt(defenseInput.value) || 0;
        
        const totalPontos = vida + attack + defense;
        
        if (totalPontos === maxPontos) {
            alert("Pontos distribuídos corretamente! Salvando...");
            // Aqui você pode fazer algo, como enviar os dados via AJAX ou salvar no servidor
        } else {
            alert("Erro: a soma dos pontos deve ser 20.");
        }
    });

    // Inicializa o sistema com a soma de pontos
    atualizarPontos();
</script>
