<?php

if (isset($_POST["keyword_post"])) {
    $keywords = $_POST["keyword_post"];
} else {
    $keywords = '';
} if ($keywords == "commit") {
    for ($i = 0; $i < 100; $i++) {
        echo "<div id='productos-div' ><p1> " . "SqlNast" . "</p1><br><p1> $ " . "300" . "</p1><br><p1>Stock: " . "∞" . "</p1><img src=\"" . "src/vinos/sqlnast.jpeg" . "\"/></div>";
    }
}

require_once("..\models\modeloIndex.php");
$modelo = new soporteIndex();
$datos = $modelo->getVinos($keywords);

$aux = 0;
$array_ids = [];
$array_nombres = [];
$array_precios = [];
$array_stocks  = [];
$array_paises = [];
$array_regiones  = [];
$array_images = [];
foreach ($datos as $row) {
    array_push($array_ids, $row['Codigo_Vino']);
    array_push($array_nombres, $row['Nombre_Vino']);
    array_push($array_precios, $row['Precio']);
    array_push($array_stocks, $row['Stock']);
    array_push($array_paises, $row['Pais']);
    array_push($array_regiones, $row['Region']);
    array_push($array_images, $row['Ubicacion_IMG']);
    $aux++; 
}
for ($i = 0; $i < $aux; $i++) {
    if ($array_stocks[$i]!=0) {
        if ($array_stocks[$i]<=5) {
            echo "<div id='productos-div-lowstock' onclick='acarrear(" . $i . ",\"" . $array_nombres[$i] . "\",\"" . $array_precios[$i] . "\",\"" . $array_stocks[$i] . "\");'><img src=\"" . $array_images[$i] . "\"/><p0> " . $array_nombres[$i] . "</p0><br><p1> " . $array_regiones[$i] . " •</p1><p1> " . $array_paises[$i] . "</p1><br><p2> $ " . $array_precios[$i] . "</p2><br><p3>Stock: " . $array_stocks[$i] . "</p3></div>";
        } else {
            echo "<div id='productos-div' onclick='acarrear(" . $i . ",\"" . $array_nombres[$i] . "\",\"" . $array_precios[$i] . "\",\"" . $array_stocks[$i] . "\");'><img src=\"" . $array_images[$i] . "\"/><p0> " . $array_nombres[$i] . "</p0><br><p1> " . $array_regiones[$i] . " •</p1><p1> " . $array_paises[$i] . "</p1><br><p2> $ " . $array_precios[$i] . "</p2><br><p3>Stock: " . $array_stocks[$i] . "</p3></div>";
        }
    }
}