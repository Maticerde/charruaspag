<?php

require_once("..\models\modeloAdmin.php");
$modelo = new SoporteAdmin();
$datos = $modelo->getBodegas();

foreach ($datos as $row) {
    if ($_POST["idbodega"] == $row['ID_Bodega']) { // solo se escriben los datos de la bodega del vino que clickeamos
        echo "<div><p1> " . $row['Nombre_Bodega'] . "</p1><br><p1>" . $row['Email_Bodega'] . "</p1><br><p1>" . $row['Direccion'] . "</p1><br><p1>" . $row['Pais'] . "</p1><br><p1>" . $row['Departamento/Provincia'] . "</p1><br><p1>" . $row['Ciudad'] . "</p1><br><p1>" . $row['Cuenta'] . "</p1></div>";
    }
}