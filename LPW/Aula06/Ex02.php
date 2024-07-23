<?php

class Livro{

    private $titulo;
    private $autor;
    private $genero;
    private $quantPagina;

    public function __construct($titulo, $autor, $genero, $quantPagina){
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->genero = $genero;
        $this->quantPagina = $quantPagina;
    }


    public function getDados(){
        echo "<td>$this->titulo</td>";
        echo "<td>$this->autor</td>";
        echo "<td>$this->genero</td>";
        echo "<td>$this->quantPagina</td>";
    }

    public function getTitulo()
    {
        return $this->titulo;
    }

    public function setTitulo($titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getAutor()
    {
        return $this->autor;
    }

    public function setAutor($autor): self
    {
        $this->autor = $autor;

        return $this;
    }

    public function getGenero()
    {
        return $this->genero;
    }

    public function setGenero($genero): self
    {
        $this->genero = $genero;

        return $this;
    }

    public function getQuantPagina()
    {
        return $this->quantPagina;
    }

    public function setQuantPagina($quantPagina): self
    {
        $this->quantPagina = $quantPagina;

        return $this;
    }
}

$livro1 = new Livro("Lucíola", "José de Alencar", "Ficção", 144);

$livro2 = new Livro("Vidas Secas", "Graciliano Ramos", "Romance, Ficção", 176);

$livro3 = new Livro("O Cortiço", "Aluísio Azevedo", "Romance, Literatura do naturalismo, Ficção", 354);

$livros = array($livro1, $livro2, $livro3);

echo "<table border='1'>";
echo "<thead>";
echo "<th>Título</th>";
echo "<th>Autor</th>";
echo "<th>Gênero</th>";
echo "<th>Qtd. Páginas</th>";
echo "</thead>";

foreach ($livros as $livro) {
    echo "<tr>";
    $livro->getDados();
    echo "</tr>";

}
echo "</table>";
?>
