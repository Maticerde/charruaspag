<?php
session_start();
// en este archivo se escribe toda la informacion del cliente que tenemos en la base de datos, al llamarse se escriben en el formulario

require_once("../models/modificarPerfil_model.php");
$modelo = new modificarPerfil_model();
$datos = $modelo->getCliente();

    $confirmarpass = false;
    if(strcmp(md5($_POST["mpassword"]), $_SESSION["getPass"])==0 ){
    $confirmarpass = true;
    if(isset($_SESSION['setAdmin'])) {
      modify_admin();
    }else {
      modify_user();
    }
    }else 
{
        /*Si la contrase�a es incorrecta*/
            $confirmarpass = "<h3>Contrase�a Incorrecta</h3>";
            echo $confirmarpass;
            echo '<a href="../index.php" >Inicio</>';
            header("Location: /charruaspag/views/modificar_perfil/index.php");
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

function modify_admin() {
    require_once("../models/modificarPerfil_model.php");

    $modelo = new modificarPerfil_model();
    $datos = $modelo->updateAdmin(
        $CI_Empleado             = $_POST["mcedula"],
        $Nombre_Empleado         = $_POST["muser"],
        $Direccion               = $_POST["mdireccion"],
        $Ciudad                  = $_POST["mciudad"],
        $Email_Empleado          = $_POST["mmail"],
        $Contrasenia_Empleado    = md5($_POST["mpassword"])
    );
        header("location: ../index.php");
}