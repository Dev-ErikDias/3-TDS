<?php
include(__DIR__.'/../util/Connection.php');
include_once(__DIR__.'/../model/Personagem.php');

class PersonagemDao{
    private $conn;

    public function __construct(){
        $this->conn = Connection::getConnection();
    }

    public function insert(Personagem $personagem) {
        $sql = 'INSERT INTO personagem (nickname, vida, attack, defense, id_classe, id_item) VALUES (?, ?, ?, ?, ?, ?)';
        $stm = $this->conn->prepare($sql);
        $stm->execute([
            $personagem->getNickname(),
            $personagem->getVida(),
            $personagem->getAttack(),
            $personagem->getDefense(),
            $personagem->getClasse()->getId(),
            $personagem->getItem()->getId()
        ]);
    }

    public function list() {
        $sql = "SELECT 
        p.id AS id, 
        p.nickname AS nickname, 
        p.vida AS vida, 
        p.attack AS attack, 
        p.defense AS defense, 
        c.id AS id_classe, 
        c.nome AS nome_classe, 
        c.attack AS attack_classe, 
        c.defense AS defense_classe, 
        c.vida AS vida_classe, 
        c.habilidade AS habilidade_classe, 
        i.id AS id_item, 
        i.nome AS nome_item, 
        i.bonus AS bonus_item, 
        i.attack AS attack_item, 
        i.defense AS defense_item,
        i.vida AS vida_item
        FROM personagem p
        JOIN classe c ON p.id_classe = c.id
        JOIN item i ON p.id_item = i.id
        ORDER BY p.id ASC";

        $stm = $this->conn->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();

        $personagens = $this->mapPersonagens($result);
        return $personagens;
    }

    public function findById($id){
        $sql = "SELECT 
            p.id AS id, 
            p.nickname AS nickname, 
            p.vida AS vida, 
            p.attack AS attack, 
            p.defense AS defense, 
            c.id AS id_classe, 
            c.nome AS nome_classe, 
            c.attack AS attack_classe, 
            c.defense AS defense_classe, 
            c.vida AS vida_classe, 
            c.habilidade AS habilidade_classe, 
            i.id AS id_item, 
            i.nome AS nome_item, 
            i.bonus AS bonus_item, 
            i.attack AS attack_item, 
            i.defense AS defense_item,
            i.vida AS vida_item
            FROM personagem p
            JOIN classe c ON p.id_classe = c.id
            JOIN item i ON p.id_item = i.id
            WHERE p.id = $id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        // Retorna o personagem com todos os dados
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update(array $personagem){
        $sql = "UPDATE personagem SET nickname = ?, id_classe = ?, id_item = ?, vida = ?, attack = ?, defense = ? WHERE id = ?";
        
        $stm = $this->conn->prepare($sql);

        $stm->execute([
            $personagem['nickName'],
            $personagem['classe'],
            $personagem['item'],
            $personagem['vida'],
            $personagem['attack'],
            $personagem['defense'],
            $personagem['id_edit']
        ]);

    }

    public function delete($id){
        $sql = "DELETE FROM personagem WHERE id = ?";

        $stm = $this->conn->prepare($sql);
        $stm->execute(array($id));
    }



    private function mapPersonagens(array $result) {
        $personagens = array();

        foreach($result as $reg) {
            $personagem = new Personagem();
            $personagem->setId($reg['id']);
            $personagem->setNickname($reg['nickname']);
            $personagem->setVida($reg['vida']);  
            $personagem->setAttack($reg['attack']);
            $personagem->setDefense($reg['defense']);
            
            $classe = new Classe();
            $classe->setId($reg['id_classe']);
            $classe->setNome($reg['nome_classe']);
            $classe->setAttack($reg['attack_classe']);
            $classe->setDefense($reg['defense_classe']);
            $classe->setVida($reg['vida_classe']);
            $classe->setHabilidade($reg['habilidade_classe']);

            $item = new Item();
            $item->setId($reg['id_item']);
            $item->setNome($reg['nome_item']); // Nome do item, como "Espada do Guerreiro"
            $item->setBonus($reg['bonus_item']); // O bônus do item
            $item->setAttack($reg['attack_item']);
            $item->setDefense($reg['defense_item']);
            $item->setVida($reg['vida_item']);

            $personagem->setClasse($classe);
            $personagem->setItem($item);
            
            array_push($personagens, $personagem);
        }

        return $personagens;        
    }
}

?>
