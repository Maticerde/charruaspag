// este archivo es un setter, inserta una bodega en la base
<?php

    if(!empty($_POST["in_nombre_bodega"])){
        add_bodega();
        //add_telbodega();
    }else 
{
    /*redirecciono al panel si es que no se provino con DATA SET via POST desde el*/
    header("Location: /views/panel_admin/panel_admin.php ");
    exit();
}

function add_bodega() {
    require_once("../models/modeloAdmin.php");
    $modelo = new SoporteAdmin();
    $datos = $modelo->setBodega(
        $_POST["in_nombre_bodega"],
        $_POST["in_email"],
        $_POST["in_direccion"],
        $_POST["in_pais"],
        $_POST["in_postal"],
        $_POST["in_ciudad"],
        $_POST["in_telefono"],
        $_POST["in_cuenta"]
    );

    header("Location: /views/panel_admin/panel_admin.php ");
}