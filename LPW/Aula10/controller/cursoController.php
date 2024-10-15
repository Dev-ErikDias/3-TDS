<?php
include_once(__DIR__.'/../dao/cursoDAO.php');

class CursoController{

    public function listar(){
        $cursoDao = new CursoDAO();

        return $cursoDao->list();
    }
}

?>
