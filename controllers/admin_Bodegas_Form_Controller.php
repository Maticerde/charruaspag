<?php 
// en este archivo se escriben todas las bodegas que tenemos en la base de datos, al llamarse se escriben en el formulario

require_once("../models/modeloAdmin.php");
$modelo = new SoporteAdmin();
$datos = $modelo->getBodegas();
echo "<option value='' disabled selected> </option>";

foreach ($datos as $row) {
    echo "<option value=" . $row['ID_Bodega']. ">" . $row['Nombre_Bodega'] . "</option>";
}