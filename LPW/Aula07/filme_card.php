<?php

echo "<div style='border: solid 1px; width: 300px; margin-top: 20px;'>";
echo "<p>" . $_POST['nome'] . "</p>";
echo "<p>" . $_POST['diretor'] . "</p>";
echo "<p>" . $_POST['ano'] . "</p>";
echo "<img style='width: 100%; height: auto;' src='" . $_POST['link'] . "'><br>";
echo "</div>";

echo "<a href='filme_formulario.php'>Cadastrar outro filme</a>";
