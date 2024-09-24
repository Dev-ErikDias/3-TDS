<?php
include_once('conexao.php');

if(isset($_GET['id'])){
    $id = $_GET['id'];
    if($id){
        $conn = Conexao::getConexao();
        $sql = "SELECT * FROM jogos WHERE id = ?";
        $stm = $conn->prepare($sql);
        $stm->execute([$id]);
        $jogo = $stm->fetch();

        if ($jogo) {
            // Se o jogo existir, executa o DELETE
            $sql = "DELETE FROM jogos WHERE id = ?";
            $stm = $conn->prepare($sql);
            $stm->execute([$id]);
            header("Location: jogos.php");
        } else {
            // Se o jogo não existir, exibe mensagem de erro
            echo "O ID informado não existe no banco de dados.";
            echo '<a href="jogos.php">Voltar</a>';
        }
    }
}

?>
