<?php

$carro1 = array("modelo" => "Polo", "marca" => "Volkswagen", "imagem" => "https://s2-autoesporte.glbimg.com/PqElcjr6WeU0w6wuNrn3o0hb5u4=/0x0:700x420/984x0/smart/filters:strip_icc()/i.s3.glbimg.com/v1/AUTH_cf9d035bf26b4646b105bd958f32089d/internal_photos/bs/2021/Q/a/QCM0QjS0qARtF1zLSj7A/vw-polo-2022.jpg");

$carro2 = array("modelo" => "X6", "marca" => "BMW", "imagem" => "https://www.bmw.com.br/content/dam/bmw/common/all-models/x-series/x6/2023/highlights/bmw-x-series-x6-sp-desktop.jpg");

$carro3 = array("modelo" => "Mustang Shelby", "marca" => "Ford", "imagem" => "https://img.remediosdigitales.com/f0ed7f/ford-mustang-gt-350/450_1000.jpg");

$carro4 = array("modelo" => "Corolla", "marca" => "Toyota", "imagem" => "https://acroadtrip.blob.core.windows.net/catalogo-imagenes/s/RT_V_5f198c2718fb4374894a07d61d75e053.webp");

$carro5 = array("modelo" => "Boxster", "marca" => "Porsche", "imagem" => "https://revistacarro.com.br/wp-content/uploads/2021/01/porsche-boxster-25-anos-3.jpg");

$carros = array($carro1, $carro2, $carro3, $carro4, $carro5);


foreach ($carros as $carro) {
    echo "<div style='border: 1px solid; height: auto; width: 200px;'>";
    echo "Modelo: ". $carro['modelo'];
    echo "<br>Marca: ". $carro['marca'];
    echo "<br><img style = 'width: 100%; height: auto;' src=".$carro['imagem']."><br>";
    echo "</div>";
    echo "<br>";
}
