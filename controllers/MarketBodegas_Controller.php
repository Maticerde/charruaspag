<?php 
// en este archivo se escriben todas las bodegas que tenemos en la base de datos, al llamarse se escriben en el panel de filtros

require_once("../models/modeloMarket.php");
$modelo = new soporteMarket();
$datos = $modelo->getBodegasName();

foreach ($datos as $row) {
    echo "<option value=" . $row['Nombre_Bodega']. ">" . $row['Nombre_Bodega'] . " (" . $row['TOTALVINOS'] . ") " . "</option>";
}
