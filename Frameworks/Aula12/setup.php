<?php
$url = "http://localhost/fwk/FwkSis.zip";

//Caminho onde o arquivo será alvo
$localFile = getcwd() . '/fwkTemp.zip';

//Baixa o arquivo ZIP
$content = file_get_contents($url);
if($content === FALSE){
    die("Erro ao baixar o arquivo ZIP");
}

//Salva o arquivo ZIP localmente
file_put_contents($localFile, $content);

//Descompacta o arquivo ZIP
$zip = new ZipArchive;
if($zip->open($localFile) === TRUE){
    //Define o diretório de destino para a extração
    $dir = dirname(__FILE__);
    mkdir($dir. '/fwkSis');
    $extractPath = $dir . "/fwkSis";

    //Extrai os arquivos
    $zip->extractTo($extractPath);
    $zip->close();

    echo "Arquivo ZIP baixado e descompactado com sucesso!";
}else{
    die("Erro ao descompactar o arquivo ZIP!");
}
header("Location: fwkSis/configBD.html");
?>
