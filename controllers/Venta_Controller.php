<?php 

if(!empty($_POST["id_cliente_form"])){
    venta_func();
}else 
{
/*redirecciono al panel si es que no se provino con DATA SET via POST desde el*/
Header("Location: ../index.php");
exit();
}


function venta_func() {

    $fecha = date('y/m/d');
    require_once("../models/modeloVentas.php"); 
    $modelo = new soporteVentas();
    $datos = $modelo->Venta($fecha, $_POST["id_cliente_form"]);
    Header("Location: ../index.php");
}