<?php

// en este archivo se escribe toda la informacion del cliente que tenemos en la base de datos, al llamarse se escriben en el formulario

require_once("../models/modificarPerfil_model.php");
$modelo = new modificarPerfil_model();
$datos = $modelo->getCliente();


    if(!empty($_POST["mdireccion"])){
        modify_user();
    }else 
{
    /*redirecciono al panel si es que no se provino con DATA SET via POST desde el*/
    header("Location: http://localhost/charruaspag/views/modificar_perfil/index.php ");
    exit();
}

function modify_user() {
    require_once("../models/modificarPerfil_model.php");
    $modelo = new modificarPerfil_model();
    $datos = $modelo->updateUser(
        $CI_Cliente             = $_POST["mcedula"],
        $Nombre_Cliente         = $_POST["muser"],
        $Direccion              = $_POST["mdireccion"],
        $Ciudad                 = $_POST["mciudad"],
        $Email_Cliente          = $_POST["mmail"],
        $Contrasenia_Cliente    = md5($_POST["mpassword"])
    );
    
        echo "UPDATE DATABASE realizado con exito.";
        header("Location: http://localhost/charruaspag/views/login/index.php");
}
