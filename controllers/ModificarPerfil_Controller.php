<?php
session_start();
// en este archivo se escribe toda la informacion del cliente que tenemos en la base de datos, al llamarse se escriben en el formulario

require_once("../models/modificarPerfil_model.php");
$modelo = new modificarPerfil_model();
$datos = $modelo->getCliente();

    $confirmarpass = false;
    if(strcmp(md5($_POST["mpassword"]), $_SESSION["getPass_cliente"])==0 ){$confirmarpass = true;
        modify_user();
    }else 
{
        /*Si la contraseña es incorrecta*/
            $confirmarpass = "<h3>Contraseña Incorrecta</h3>";
            echo $confirmarpass;
            echo '<a href="../index.php" >Inicio</>';
            //header("Location: /charruaspag/index.php");
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
        header("location: ../index.php");
}
