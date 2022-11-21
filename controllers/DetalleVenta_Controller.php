<?php 

if(!empty($_POST["id_vino"])){
    detalleventa_func();
}else 
{
/*redirecciono al panel si es que no se provino con DATA SET via POST desde el*/
Header("Location: ../index.php");
exit();
}

function detalleventa_func() {
    require_once("../models/modeloVentas.php"); 
    $modelo = new soporteVentas();
    $datos = $modelo->DetalleVenta($_POST["id_vino"], $_POST["cant"], $_POST["price"]);
    Header("Location: ../index.php");
}

