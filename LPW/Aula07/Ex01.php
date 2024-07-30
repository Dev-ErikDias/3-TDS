<?php

class Filme{
    private $titulo;
    private $diretor;
    private $ano;
    private $link;


    public function __construct($titulo, $diretor, $ano, $link){
        $this->titulo = $titulo;
        $this->diretor = $diretor;
        $this->ano = $ano;
        $this->link = $link;
    }

    public function getDados(){
        $text = "$this->titulo<br>";
        $text = $text . "$this->diretor<br>";
        $text = $text . "$this->ano<br>";
        $text = $text . "<img style='width: 250px; height: 300px;' src='$this->link'>";
        return $text;
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

    public function getDiretor()
    {
        return $this->diretor;
    }

    public function setDiretor($diretor): self
    {
        $this->diretor = $diretor;

        return $this;
    }

    public function getAno()
    {
        return $this->ano;
    }

    public function setAno($ano): self
    {
        $this->ano = $ano;

        return $this;
    }

    public function getLink(){
        return $this->link;
    }

    public function setLink($link): self{
        $this->link = $link;

        return $this;
    }
}

$filme1 = new Filme("Pantera Negra", "Ryan Coogler", 2018, "https://donerd.com.br/wp-content/uploads/2022/12/17-Pantera-Negra-2018.png");
$filme2 = new Filme("Herbie: Se meu fusca falasse", "Robert Stevenson", 1968, "https://images.justwatch.com/poster/202829666/s718/se-meu-fusca-falasse.jpg");
$filme3 = new Filme("Transformers: O Último Cavaleiro", "Ryan Coogler", 2017, "https://m.media-amazon.com/images/S/pv-target-images/1cde443e80661dac04a95aedc77ae0b023bfdb31ce0ef489ddbabd0569268cb0.jpg");
$filme4 = new Filme("Tubarão", "Steven Spielberg", 1975, "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcShycDUtB9DXvkjMQ-Ttvn1SbDzIZWhc_MIOg&s");
$filme5 = new Filme("Creed: Nascido para Lutar", "Ryan Coogler", 2015, "https://play-lh.googleusercontent.com/0Cb89vl4oD5gYkkl3JoHWVXx2pj6tBjfscN8ybmzO0g3w1ym-hpHRWj1ThGjP5-zgwOX9X-3fO581sTBT2oN=w240-h480-rw");

$filmes = array($filme1, $filme2, $filme3, $filme4, $filme5);

echo "<div style='display: flex;'>";
foreach ($filmes as $filme) {
    echo "<div style='border: solid 1px; width: 250px; height: 20%; margin-left: 20px;'>";
    echo $filme->getDados();
    echo "</div>";
}
echo "</div>";
?>
