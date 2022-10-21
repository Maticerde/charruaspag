<?php

if (isset($_POST["keyword_post"])) {
    $keywords = $_POST["keyword_post"];
} else {
    $keywords = '';
}

require_once "..\models\Articulos_Model.php";
$modelo = new soporteIndex();
$datos  = $modelo->getVinos($keywords);

$aux           = 0;
$array_ids     = [];
$array_nombres = [];
$array_precios = [];
$array_stocks  = [];
$array_images  = [];
foreach ($datos as $row) {
    array_push($array_ids, $row['Codigo_Vino']);
    array_push($array_nombres, $row['Nombre_Vino']);
    array_push($array_precios, $row['Precio']);
    array_push($array_stocks, $row['Stock']);
    array_push($array_images, $row['Ubicacion_IMG']);
    $aux++;
}
for ($i = 0; $i < $aux; $i++) {
    if ($array_stocks[$i] == 0) {
        echo "<div id='productos-div-agotado' onclick='acarrear(" . $i . ",\"" . $array_nombres[$i] . "\",\"" . $array_precios[$i] . "\",\"" . $array_stocks[$i] . "\");'><p1> " . $array_nombres[$i] . "</p1><br><p1> $ " . $array_precios[$i] . "</p1><br><p2>Stock: " . $array_stocks[$i] . "</p2><img src=\"" . $array_images[$i] . "\"/></div>";
    } else {
        echo "<div id='productos-div' onclick='acarrear(" . $i . ",\"" . $array_nombres[$i] . "\",\"" . $array_precios[$i] . "\",\"" . $array_stocks[$i] . "\");'><p1> " . $array_nombres[$i] . "</p1><br><p1> $ " . $array_precios[$i] . "</p1><br><p1>Stock: " . $array_stocks[$i] . "</p1><img src=\"" . $array_images[$i] . "\"/></div>";
    }

}