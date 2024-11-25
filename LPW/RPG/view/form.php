<?php ini_set('display_errors', 1);
error_reporting(E_ALL);
?>

<!-- Formulário para 1cadastro/edição de personagem -->
<div class="col-md-6 bg-success bg-gradient p-4 rounded-5 position-absolute w-25">
    <h1> <?php if(isset($_GET['id_edit'])): ?> Editar <?php else: ?> Cadastrar <?php endif;?> Personagem</h1>

    <form method="POST">
        <?php if (isset($_GET['id_edit'])): ?>
            <input type="hidden" name="id_edit" value="<?php echo $personagem->getId(); ?>">
        <?php endif; ?>

        <div class="mb-3">
            <label for="nickName" class="form-label"><i class="fa-solid fa-user"></i> Nickname:</label>
            <input type="text" name="nickName" id="nickName" class="form-control"  value="<?php echo isset($personagem) ? $personagem->getNickname() : ''; ?>" placeholder="Informe seu nickname">
             
        </div>

        <div class="mb-3">
            <label for="classe" class="form-label"><i class="fa-solid fa-user-tie" style="color: #000000;"></i> Classe:</label>
            <select name="classe" id="classe" class="form-select">
            <option value="">Selecione a sua Classe</option>
            <option value="1" <?php echo (isset($personagem) && $personagem->getClasse() && $personagem->getClasse()->getId() == 1) ? 'selected' : ''; ?>>Mago / Habilidade: Ataques causam dano em área e longo alcance</option> <!-- attack: 5.0/defense: 0.0/vida: 0.0 -->
            <option value="2" <?php echo (isset($personagem) && $personagem->getClasse() && $personagem->getClasse()->getId() == 2) ? 'selected' : ''; ?>>Guerreiro / Habilidade: Regenera vida ao causar dano</option> <!-- attack: 4.0/defense: 2.0/vida: 2.0 -->
            <option value="3" <?php echo (isset($personagem) && $personagem->getClasse() && $personagem->getClasse()->getId() == 3) ? 'selected' : ''; ?>>Paladino / Habilidade: Regenera vida dos aliados ao seu redor</option> <!-- attack: 2.0/defense: 5.0/vida: 3.0 -->
            <option value="4" <?php echo (isset($personagem) && $personagem->getClasse() && $personagem->getClasse()->getId() == 4) ? 'selected' : ''; ?>>Assassino / Habilidade: Recebe 15% dos atributos do inimigo abatido</option> <!-- attack: 7.0/defense: 0.0/vida: 0.5 -->
            </select>
        </div>

        <div class="mb-3">
            <label for="item" class="form-label"><i class="fa-solid fa-flask" style="color: #40219c;"></i> Item:</label>
            <select name="item" id="item" class="form-select">
                <option value="7"<?php echo (isset($personagem) && $personagem->getItem() && $personagem->getItem()->getId() ==7) ? 'selected' : ''; ?>>Nenhum item selecionado  / Bonus: 0% / Classe Buffada: nenhuma</option> <!-- attack: 0.0/defense: 0.0/vida: 0.0 -->
                <option value="1" <?php echo (isset($personagem) && $personagem->getItem() && $personagem->getItem()->getId() == 1) ? 'selected' : ''; ?>>Espada do Guerreiro / Bonus: 50% / Classe Buffada: Guerreiro</option> <!-- attack: 3.0/defense: 1.0/vida: 0.0 -->
                <option value="2" <?php echo (isset($personagem) && $personagem->getItem() && $personagem->getItem()->getId() == 2) ? 'selected' : ''; ?>>Cajado do Mago / Bonus: 100% / Classe Buffada: Mago</option> <!-- attack: 4.0/defense: 0.5/vida: 0.0 -->
                <option value="3" <?php echo (isset($personagem) && $personagem->getItem() && $personagem->getItem()->getId() == 3) ? 'selected' : ''; ?>>Escudo do Paladino / Bonus: 80% / Classe Buffada: Paladino</option> <!-- attack: 0.5/defense: 4.0/vida: 1.0 -->
                <option value="4" <?php echo (isset($personagem) && $personagem->getItem() && $personagem->getItem()->getId() == 4) ? 'selected' : ''; ?>>Adaga do Assassino / Bonus: 20% / Classe Buffada: Assassino</option> <!-- attack: 5.0/defense: 0.2/vida: 0.0 -->
                <option value="5" <?php echo (isset($personagem) && $personagem->getItem() && $personagem->getItem()->getId() == 5) ? 'selected' : ''; ?>>Armadura de Guerreiro / Bonus: 30% / Classe Buffada: Guerreiro</option> <!-- attack: 0.0/defense: 3.5/vida: 2.0 -->
                <option value="6" <?php echo (isset($personagem) && $personagem->getItem() && $personagem->getItem()->getId() == 6) ? 'selected' : ''; ?>>Anel do Mago / Bonus: 70% / Classe Buffada: Mago</option> <!-- attack: 2.0/defense: 0.5/vida: 0.5 -->

            </select>
        </div>

        <div class="col-6" >
            <?php if($msgErro): ?>
                <div class="alert alert-danger">
                    <?= $msgErro ?>
                </div>
            <?php endif; ?>
        </div>
        
        <h3>Distribua os pontos entre os atributos</h3>

        <p id="pontosRestantes" class="mb-3">Pontos restantes: <?php if(isset($personagem)): ?> 0 <?php else: ?> 20 <?php endif;?></p>
        
            
        <div class="mb-3">
            <label for="attack" class="form-label"><i class="fa-solid fa-bomb" style="color: #c01111;"></i> Ataque:</label>
            <input type="number" name="attack" id="attack" class="form-control" min="0" max="20" value="<?php echo (isset($personagem)) ? $personagem->getAttack(): 0; ?>" onchange="atualizarPontos()" oninput="atualizarPontos()">
        </div>
        
        <div class="mb-3">
            <label for="defense" class="form-label"><i class="fa-solid fa-shield" style="color: #5b5f67;"></i> Defesa:</label>
            <input type="number" name="defense" id="defense" class="form-control" min="0" max="20" value="<?php echo (isset($personagem)) ? $personagem->getDefense() : 0; ?>" onchange="atualizarPontos()" oninput="atualizarPontos()">
        </div>
        
        <div class="mb-3">
            <label for="vida" class="form-label"><i class="fa-solid fa-heart" style="color: #c01111;"></i> Vida:</label>
            <input type="number" name="vida" id="vida" class="form-control" min="0" max="20" value="<?php echo (isset($personagem)) ? $personagem->getVida() : 0; ?>" onchange="atualizarPontos()" oninput="atualizarPontos()">
        </div>

        <div>
            <button type="submit" class="btn btn-primary" name="gravar" id='submitButton'>Gravar</button>
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