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
        $_POST["ucedula"],
        $_POST["udireccion"],
        $_POST["uciudad"],
        $_POST["user"],
        $_POST["umail"],
        $_POST["upassword"]
    );
    
        echo "UPDATE DATABASE realizado con exito.";
        header("Location: http://localhost/charruaspag/views/login/index.php");
}


