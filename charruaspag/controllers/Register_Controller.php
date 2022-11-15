// este archivo es un setter, inserta un nuevo usuario en la base
<?php

    if(!empty($_POST["ucedula"])){
        new_user();
    }else 
{
    /*redirecciono al panel si es que no se provino con DATA SET via POST desde el*/
    header("Location: http://localhost/charruaspag/views/register/index.php ");
    exit();
}

function new_user() {
    require_once("../models/register_model.php");
    $modelo = new register_model();
    $datos = $modelo->setUser(
        $CI_Cliente     = $_POST["ucedula"],
        $Nombre_Cliente = $_POST["udireccion"],
        $Direccion      = $_POST["uciudad"],
        $Ciudad         = $_POST["user"],
        $Email_Cliente  = $_POST["umail"],
        $Contrasenia    = md5($_POST["upassword"])
    );
    
        echo "UPDATE DATABASE realizado con exito.";
        header("Location: http://localhost/charruaspag/views/login/index.php");
}


