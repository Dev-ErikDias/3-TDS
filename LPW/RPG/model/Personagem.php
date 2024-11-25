<?php
require_once(__DIR__."/Item.php");
require_once(__DIR__."/Classe.php");

class Personagem{ 
    private $id;
    private ?string $nickname ;
    private ?Classe $classe; 
    private ?float $vida; 
    private ?Item $item;  
    private ?float $attack;  
    private ?float $defense;  

   
    

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

    /**
     * Get the value of nickname
     */
    public function getNickname(): ?string
    {
        return $this->nickname;
    }

    /**
     * Set the value of nickname
     */
    public function setNickname(?string $nickname): self
    {
        $this->nickname = $nickname;

        return $this;
    }

    /**
     * Get the value of classe
     */
    public function getClasse(): ?Classe
    {
        return $this->classe;
    }

    /**
     * Set the value of classe
     */
    public function setClasse(?Classe $classe): self
    {
        $this->classe = $classe;

        return $this;
    }

    /**
     * Get the value of vida
     */
    public function getVida(): ?float
    {
        return $this->vida;
    }

    /**
     * Set the value of vida
     */
    public function setVida(?float $vida): self
    {
        $this->vida = $vida;

        return $this;
    }

    /**
     * Get the value of item
     */
    public function getItem(): ?Item
    {
        return $this->item;
    }

    /**
     * Set the value of item
     */
    public function setItem(?Item $item): self
    {
        $this->item = $item;

        return $this;
    }

    /**
     * Get the value of attack
     */
    public function getAttack(): ?float
    {
        return $this->attack;
    }

    /**
     * Set the value of attack
     */
    public function setAttack(?float $attack): self
    {
        $this->attack = $attack;

        return $this;
    }

    /**
     * Get the value of defense
     */
    public function getDefense(): ?float
    {
        return $this->defense;
    }

    /**
     * Set the value of defense
     */
    public function setDefense(?float $defense): self
    {
        $this->defense = $defense;

        return $this;
    }
}


?>