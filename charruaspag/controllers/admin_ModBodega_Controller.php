<?php

    if(!empty($_POST["in_nombre_bodega"])){
        mod_bodega();
    }else 
{
    /*redirecciono al panel si es que no se provino con DATA SET via POST desde el*/
    header("Location: http://localhost/charruaspag/views/panel_admin/panel_admin.php ");
    exit();
}

function mod_bodega() {
    require_once("../models/modeloAdmin.php");
    $modelo = new SoporteAdmin();

    if ($_POST["in_imagen_mod"] == "") {
        $datos = $modelo->updateBodega(
            $_POST["in_codigo_bodega"],
            $_POST["in_nombre_bodega"],
            $_POST["in_email"],
            $_POST["in_direccion"],
            $_POST["in_pais"],
            $_POST["in_postal"],
            $_POST["in_ciudad"],
            $_POST["in_cuenta"],
        );
    }
    
    header("Location: http://localhost/charruaspag/views/panel_admin/panel_admin.php ");
}