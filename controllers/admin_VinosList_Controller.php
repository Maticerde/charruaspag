<?php

if (isset($_POST["orden"])) {
    $orden = $_POST["orden"];
} else {
    $orden = 'Nombre_Vino';
}

require_once("../models/modeloAdmin.php");
$modelo = new SoporteAdmin();
$datos = $modelo->getVinosyBodegaEnOrden($orden);

foreach ($datos as $row) {
    echo "<span class='options' id='option-vino" . $row['Codigo_Vino'] ."' onclick='select_vino(" . "id" . ",\"" . $row['Codigo_Vino'] . "\",\"" . $row['Nombre_Vino'] . "\",\"" . $row['Precio'] . "\",\"" . $row['Stock'] . "\",\"" . $row['Pais_Vinos'] . "\",\"" . $row['Region'] . "\",\"" . $row['Cosecha'] . "\",\"" . $row['Bodega_Vino'] . "\",\"" . $row['Ubicacion_IMG'] . "\",\"" . $row['Nombre_Bodega'] . "\",\"" . $row['Email_Bodega'] . "\",\"" . $row['Direccion'] . "\",\"" . $row['Pais_Bodega'] . "\",\"" . $row['Ciudad'] . "\",\"" . $row['Cuenta'] . "\",\"" . $row['Codigo_Postal'] . "\",\"" . $row['Descripcion'] . "\",\"" . $row['Telefono_Bodega'] ."\");'> <section>". $row['Nombre_Vino'] . "</section> <img src=\"../../" . $row['Ubicacion_IMG'] . "\"></span>";
}