<?php

if (isset($_POST["orden"])) {
    $orden = $_POST["orden"];
} else {
    $orden = 'Nombre_Vino';
}

require_once("..\models\modelo.php");
$modelo = new SoporteAdmin();
$datos = $modelo->getVinosEnOrden($orden);

foreach ($datos as $row) {
    echo "<span class='options' id='option-vino" . $row['Codigo_Vino'] ."' onclick='cargar_forms(" . "id" . ",\"" . $row['Codigo_Vino'] . "\",\"" . $row['Nombre_Vino'] . "\",\"" . $row['Precio'] . "\",\"" . $row['Stock'] . "\",\"" . $row['Pais'] . "\",\"" . $row['Region'] . "\",\"" . $row['Cosecha'] . "\",\"" . $row['Bodega_Vino'] . "\",\"" . $row['Ubicacion_IMG'] ."\");'> <section>". $row['Nombre_Vino'] . "</section> <img src=\"../../" . $row['Ubicacion_IMG'] . "\"></span>";
}