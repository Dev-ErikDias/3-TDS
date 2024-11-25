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
        $erros = $this->personagemService->validarDados($personagem);
        
        if(count($erros)>0){
            return $erros;
        }

        $this->personagemDao->insert($personagem);
        return array();

        
    }

    public function listar() {
        return $this->personagemDao->list();
    }

    public function buscarPorId($id){
        return $this->personagemDao->findById($id);
    }

    public function atualizar(Personagem $personagem){
        $erros = $this->personagemService->validarDados($personagem);
        if(count($erros) > 0){
            return $erros;  // Retorne os erros encontrados
        }
        $this->personagemDao->update($personagem);  // Atualize o personagem no banco
        return [];  // Caso contrário, retorne um array vazio
    }
    
    public function excluir($id){
        $this->personagemDao->delete($id);
    }
}
?>