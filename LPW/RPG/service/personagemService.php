<?php

include_once(__DIR__ . "/../model/Personagem.php");

class PersonagemService {

    public function validarDados(Personagem $personagem) {

        $erros = array();

        if(!$personagem->getNickname())
            array_push($erros, "Informe o nome!");

        if(!$personagem->getClasse())
            array_push($erros, "Informe uma classe!");

        return $erros;
    }

    public function zero($n){
        if($n == 0){
            return 1;
        }

        return $n;
    }



    public function calcularEstatisticas(Personagem $personagem){
        $item =  $personagem->getItem();
        $classe = $personagem->getClasse();

        $vida = ($personagem->getVida()*100) * $this->zero($classe->getVida()) * $this->zero($item->getVida());
        if($vida == 0){
            $vida = 100;
        }
        $attack = ($personagem->getAttack()*10) * $this->zero($classe->getAttack()) * $this->zero($item->getAttack()) ;
        if($attack == 0){
            $attack = 10;
        }
        $defense = ($personagem->getDefense()*10) * $this->zero($classe->getDefense()) * $this->zero($item->getDefense());
        if($defense == 0){
            $defense = 10;
        }

        if($classe->getNome() == $item->getClasse()){
            
         $vida = $vida * $this->zero($item->getBonus()); 
         $attack = $attack * $this->zero($item->getBonus());
         $defense = $defense * $this->zero($item->getBonus());
         $bonus = $item->getBonus();
        }else{
            $bonus = 0.0;
        }
        $personagemArray = [
            'nickname'     => $personagem->getNickname(),    // Nickname do personagem
            'attack'       => $attack,                        // Ataque do personagem
            'defense'      => $defense,                       // Defesa do personagem
            'vida'         => $vida,                          // Vida do personagem
            'habilidade'   => $classe->getHabilidade(),  // Habilidade da classe
            'classe'       => $classe->getNome(),             // Nome da classe
            'classe_attack'=> $classe->getAttack(),           // Ataque da classe
            'classe_defense'=> $classe->getDefense(),         // Defesa da classe
            'classe_vida'  => $classe->getVida(),             // Vida da classe
            'item_classe'  => $item->getClasse(),               // Nome do item
            'item_bonus'   => $bonus,              // Bônus do item
            'item'         => $item->getNome(),               // Nome do item
            'item_attack'  => $item->getAttack(),             // Ataque do item
            'item_defense' => $item->getDefense(),            // Defesa do item
            'item_vida'    => $item->getVida()                // Vida do item
        ];
    
        return $personagemArray;
    }
}