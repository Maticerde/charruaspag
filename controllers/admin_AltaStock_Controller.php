<?php 

if(isset($_POST["in_bodega_vino"])){
    compra_func();
    detallecompra_func();
}else 
{
/*redirecciono al panel si es que no se provino con DATA SET via POST desde el*/
Header("Location: ../index.php");
exit();
}

function compra_func() {
    $fecha = date('y/m/d');
    require_once("../models/modeloCompras.php"); 
    $modelo = new soporteCompras();
    $datos = $modelo->Compra($fecha, $_POST["in_bodega_vino"], $_POST["empleado_compra"]);
    Header("Location: ../index.php");
}

function detallecompra_func() {
    require_once("../models/modeloCompras.php"); 
    $modelo = new soporteCompras();
    $datos = $modelo->DetalleCompra($_POST["vino_compra"], $_POST["cant_compra"], $_POST["costo_compra"]);
    Header("Location: ../index.php");
}