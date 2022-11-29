<?php

$keywords = '';
require_once("../models/modeloIndex.php");
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
    if ($row['Stock']!=0) {
        array_push($array_ids, $row['Codigo_Vino']);
        array_push($array_nombres, $row['Nombre_Vino']);
        array_push($array_precios, $row['Precio']);
        array_push($array_stocks, $row['Stock']);
        array_push($array_paises, $row['Pais_Vinos']);
        array_push($array_regiones, $row['Region']);
        array_push($array_images, $row['Ubicacion_IMG']);
        $aux++; 
    }
}
$aux > 5 ? $aux = 5 : $aux; // se muestran maximo 5 vinos
for ($i = 0; $i < $aux; $i++) {
    if ($array_stocks[$i]<=5) {
        echo "<div id='productos-div-lowstock' onclick='acarrear(" . 1 . ",\"" . $array_nombres[$i] . "\",\"" . $array_precios[$i] . "\",\"" . $array_stocks[$i] . "\",\"" . $array_images[$i] . "\",\"" . $array_paises[$i] . "\",\"" . $array_ids[$i] . "\");'><img src=\"" . $array_images[$i] . "\"/><p0> " . $array_nombres[$i] . "</p0><br><p1> " . $array_regiones[$i] . " •</p1><p1> " . $array_paises[$i] . "</p1><br><p2> $ " . $array_precios[$i] . "</p2><br><p3>Stock: " . $array_stocks[$i] . "</p3></div>";
    } else {
        echo "<div id='productos-div' onclick='acarrear(" . 1 . ",\"" . $array_nombres[$i] . "\",\"" . $array_precios[$i] . "\",\"" . $array_stocks[$i] . "\",\"" . $array_images[$i] . "\",\"" . $array_paises[$i] . "\",\"" . $array_ids[$i] . "\");'><img src=\"" . $array_images[$i] . "\"/><p0> " . $array_nombres[$i] . "</p0><br><p1> " . $array_regiones[$i] . " •</p1><p1> " . $array_paises[$i] . "</p1><br><p2> $ " . $array_precios[$i] . "</p2><br><p3>Stock: " . $array_stocks[$i] . "</p3></div>";
    }
}