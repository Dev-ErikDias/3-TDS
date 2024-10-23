<?php
class Livro {
    // Atributos privados
    private $isbn;
    private $titulo;
    private $autor;
    private $paginas;
    private $editora;


    // Métodos getters
    public function getIsbn() {
        return $this->isbn;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function getAutor() {
        return $this->autor;
    }

    public function getPaginas() {
        return $this->paginas;
    }

    public function getEditora() {
        return $this->editora;
    }

    // Métodos setters
    public function setIsbn($isbn) {
        $this->isbn = $isbn;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setAutor($autor) {
        $this->autor = $autor;
    }

    public function setPaginas($paginas) {
        $this->paginas = $paginas;
    }

    public function setEditora($editora) {
        $this->editora = $editora;
    }
}
?>
