<?php

$path = $_POST['con'];
$file = 'FWK.php';

//Lê o conteudo atual do arquivo
$currentContent = file_get_contents($file);

//Cria o novo conteúdo com $path na primeira linha
$newContent = "<?php". PHP_EOL . "require_once('" . $path . "');" . PHP_EOL . $currentContent;

//Salva o novo conteúdo no arquivo
file_put_contents($file, $newContent);
echo "Framework configurado com sucesso!";
?>
