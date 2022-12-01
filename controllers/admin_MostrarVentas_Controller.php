<?php 
// en este archivo se escriben los registros de ventas

if (isset($_POST["keyword_post"])) { // si no hay keywords no se escribe nada
    $keywords = $_POST["keyword_post"];
} else {
    $keywords = '';
}

require_once("../models/modeloAdmin.php");
$modelo = new soporteAdmin();
$datos = $modelo->getVentas($keywords);

foreach ($datos as $row) {
    echo "<section><span>" . $row['Codigo_Venta'] . "</span><span>" . $row['Fecha_Venta'] . "</span><span>" . $row['Codigo_Cliente'] . "</span><span>" . $row['Nombre_Cliente'] ."</span><span>" . $row['CI_Cliente'] ."</span><span>" . $row['Email_Cliente'] ."</span></section>";
}
