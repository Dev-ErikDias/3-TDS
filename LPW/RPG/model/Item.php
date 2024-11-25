<?php

class Item{
    private $id;
    private $nome;
    private $bonus;
    private $attack;
    private $defense;
    private $vida;
    private $classe;

    

    /**
     * Get the value of nome
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     */
    public function setNome($nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of bonus
     */
    public function getBonus()
    {
        return $this->bonus;
    }

    /**
     * Set the value of bonus
     */
    public function setBonus($bonus): self
    {
        $this->bonus = $bonus;

        return $this;
    }

    /**
     * Get the value of attack
     */
    public function getAttack()
    {
        return $this->attack;
    }

    /**
     * Set the value of attack
     */
    public function setAttack($attack): self
    {
        $this->attack = $attack;

        return $this;
    }

    /**
     * Get the value of defense
     */
    public function getDefense()
    {
        return $this->defense;
    }

    /**
     * Set the value of defense
     */
    public function setDefense($defense): self
    {
        $this->defense = $defense;

        return $this;
    }

    /**
     * Get the value of vida
     */
    public function getVida()
    {
        return $this->vida;
    }

    /**
     * Set the value of vida
     */
    public function setVida($vida): self
    {
        $this->vida = $vida;

        return $this;
    }

    /**
     * Get the value of classe
     */
    public function getClasse()
    {
        return $this->classe;
    }

    /**
     * Set the value of classe
     */
    public function setClasse($classe): self
    {
        $this->classe = $classe;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }
}

?>