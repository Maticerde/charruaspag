<?php

if (isset($_POST["keyword_post"])) { // si no hay keywords no se escribe nada
    $keywords = $_POST["keyword_post"];
} else {
    $keywords = '';
} if ($keywords == "commit") {
    for ($i = 0; $i < 100; $i++) {
        echo "<div id='productos-div' ><p1> " . "SqlNast" . "</p1><br><p1> $ " . "300" . "</p1><br><p1>Stock: " . "∞" . "</p1><img src=\"" . "../../src/vinos/sqlnast.jpeg" . "\"/></div>";
    }
}

if (isset($_POST["orden"])) { //si no hay orden se asigna a-z
    $orden = $_POST["orden"];
} else {
    $orden = 'Nombre_Vino';
}


require_once("../models/modeloMarket.php");
$modelo = new soporteMarket();
$datos = $modelo->getVinosMarket($keywords, $orden);

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
        array_push($array_images, "../../" . $row['Ubicacion_IMG']);
        $aux++; 
    }
}
 // se muestran todos los vinos
for ($i = 0; $i < $aux; $i++) {
    if ($array_stocks[$i]<=5) {
        echo "<div id='productos-div-lowstock' onclick='acarrear(". 1 . ",\"" . $array_nombres[$i] . "\",\"" . $array_precios[$i] . "\",\"" . $array_stocks[$i] . "\",\"" . $array_images[$i] . "\",\"" . $array_paises[$i] . "\",\"" . $array_ids[$i] . "\");'><img src=\"" . $array_images[$i] . "\"/><p0> " . $array_nombres[$i] . "</p0><br><p1> " . $array_regiones[$i] . " •</p1><p1> " . $array_paises[$i] . "</p1><br><h2> $ " . $array_precios[$i] . "</h2><br></div>";
    } else {
        echo "<div id='productos-div' onclick='acarrear(". 1 . ",\"" . $array_nombres[$i] . "\",\"" . $array_precios[$i] . "\",\"" . $array_stocks[$i] . "\",\"" . $array_images[$i] . "\",\"" . $array_paises[$i] . "\",\"" . $array_ids[$i] . "\");'><img src=\"" . $array_images[$i] . "\"/><p0> " . $array_nombres[$i] . "</p0><br><p1> " . $array_regiones[$i] . " •</p1><p1> " . $array_paises[$i] . "</p1><br><h2> $ " . $array_precios[$i] . "</h2></div>";
    }
}