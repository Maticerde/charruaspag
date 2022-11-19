<?php

require_once("../models/modeloIndex.php");
$modelo = new soporteIndex();
$datos = $modelo->getBestSellers();

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
if ($aux < 3) {
    exit();
}
if (isset($_POST["fetch_aux_info"])) {
    echo "<div id='bs1-info'><h4 id='bs1-name'>" . $array_nombres[0] . "</h4><h3 id='bs1-price' onclick='acarrear(" . 0 . ",\"" . $array_nombres[0] . "\",\"" . $array_precios[0] . "\",\"" . $array_stocks[0] . "\");'>$ " . $array_precios[0] . "</h3></div>";
    echo "<div id='bs2-info'><h4 id='bs2-name'>" . $array_nombres[1] . "</h4><h3 id='bs2-price' onclick='acarrear(" . 1 . ",\"" . $array_nombres[1] . "\",\"" . $array_precios[1] . "\",\"" . $array_stocks[1] . "\");'>$ " . $array_precios[1] . "</h3></div>";
    echo "<div id='bs3-info'><h4 id='bs3-name'>" . $array_nombres[2] . "</h4><h3 id='bs3-price' onclick='acarrear(" . 2 . ",\"" . $array_nombres[2] . "\",\"" . $array_precios[2] . "\",\"" . $array_stocks[2] . "\");'>$ " . $array_precios[2] . "</h3></div>";
} else {
    echo "<img class='bs' id='bs1' src=\"" . $array_images[0] . "\">";
    echo "<img id='bs2' src=\"" . $array_images[1] . "\">";
    echo "<img class='bs' id='bs3' src=\"" . $array_images[2] . "\">";
}