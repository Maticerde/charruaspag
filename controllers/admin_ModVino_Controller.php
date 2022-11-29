<?php

    if(!empty($_POST["in_nombre_vino"])){
        mod_vino();
    }else 
{
    /*redirecciono al panel si es que no se provino con DATA SET via POST desde el*/
    header("Location: /charruaspag/views/panel_admin/panel_admin.php ");
    exit();
}

function mod_vino() {

    require_once("../models/modeloAdmin.php");
    $modelo = new SoporteAdmin();

    if ($_POST["in_imagen_mod"] == "") {
        $datos = $modelo->updateVino(
            $_POST["in_nombre_vino"],
            $_POST["in_precio"],
            $_POST["in_bodega_vino"],
            $_POST["in_descrip"],
            $_POST["in_pais"],
            $_POST["in_region"],
            $_POST["in_cosecha"],
            $_POST["in_imagenString_mod"],
            $_POST["in_codigo_vino"]
        );
    } else {
        $datos = $modelo->updateVino(
            $_POST["in_nombre_vino"],
            $_POST["in_precio"],
            $_POST["in_bodega_vino"],
            $_POST["in_descrip"],
            $_POST["in_pais"],
            $_POST["in_region"],
            $_POST["in_cosecha"],
            "src/vinos/" . $_POST["in_imagen_mod"],
            $_POST["in_codigo_vino"]
        );
    }

    header("Location: /charruaspag/views/panel_admin/panel_admin.php ");
}
