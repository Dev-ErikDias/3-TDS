<?php
require_once(__DIR__.'/../model/Personagem.php'); // Inclua apenas aqui
require_once(__DIR__.'/../service/personagemService.php'); 
require_once(__DIR__.'/../dao/personagemDAO.php');

class PersonagemController {

    private $personagemDao;
    private $personagemService;

    public function __construct() {
        $this->personagemDao = new PersonagemDAO();
        $this->personagemService = new PersonagemService();
    }

    public function inserir(Personagem $personagem) {
        $this->personagemDao->insert($personagem);
        
    }

    public function listar() {
        return $this->personagemDao->list();
    }

    public function buscarPorId($id){
        return $this->personagemDao->findById($id);
    }

    public function atualizar(array $personagem){
        $this->personagemDao->update($personagem);
    }
    
    public function excluir($id){
        $this->personagemDao->delete($id);
    }
}
?>
