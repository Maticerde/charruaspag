// este archivo es un setter, inserta un vino en la base
<?php

    if(!empty($_POST["in_nombre_vino"])){
        add_vino();
    }else 
{
    /*redirecciono al panel si es que no se provino con DATA SET via POST desde el*/
    header("Location: /views/panel_admin/panel_admin.php ");
    exit();
}

function add_vino() {
    require_once("../models/modeloAdmin.php");
    $modelo = new SoporteAdmin();
    $datos = $modelo->setVino(
        $_POST["in_nombre_vino"],
        $_POST["in_precio"],
        $_POST["in_bodega_vino"],
        $_POST["in_descrip"],
        $_POST["in_pais"],
        $_POST["in_region"],
        $_POST["in_cosecha"],
        "src/vinos/" . $_POST["in_imagen"]
    );
    
        header("Location: /views/panel_admin/panel_admin.php ");
}


