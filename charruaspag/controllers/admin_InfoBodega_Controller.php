<?php

require_once("..\models\modeloAdmin.php");
$modelo = new SoporteAdmin();
$datos = $modelo->getBodegas();

foreach ($datos as $row) {
    if ($_POST["idbodega"] == $row['ID_Bodega']) { // solo se escriben los datos de la bodega del vino que clickeamos
        echo "<div id='b_id'> " . $row['ID_Bodega'] . "</div><div id='b_nombre'> " . $row['Nombre_Bodega'] . "</div><section id='upperinfo'><div id='b_pais'>" . $row['Pais'] . "</div><div id='b_ciudad'>" . $row['Ciudad'] . "</div><div id='b_cuenta'> Cuenta: " . $row['Cuenta'] . "</div></section><section id='lowerinfo'><div id='b_direccion'>" . $row['Direccion'] . "</div><div id='b_codpostal'>" . $row['Nombre_Bodega'] . "</div><div id='b_email'>" . $row['Email_Bodega'] . "</div></section>";
    }
}