// este archivo es un setter, inserta un nuevo usuario en la base
<?php

    if(isset($_POST["ucedula"])){

        if (isset($_POST["nombre_admin"])) {
            new_admin();
        } else {
            new_user();
        }
        

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
        $Nombre_Cliente = $_POST["nombre_user"],
        $Direccion      = $_POST["udireccion"],
        $Ciudad         = $_POST["uciudad"],
        $Email_Cliente  = $_POST["umail"],
        $Contrasenia    = md5($_POST["upassword"])
    );
    
        header("Location: http://localhost/charruaspag/views/login/index.php");
}

function new_admin() {

    require_once("../models/register_model.php");
    $modelo = new register_model();
    $datos = $modelo->setAdmin(
        $CI_Empleado     = $_POST["ucedula"],
        $Nombre_Empleado = $_POST["nombre_admin"],
        $Direccion      = $_POST["udireccion"],
        $Ciudad         = $_POST["uciudad"],
        $Email_Empleado  = $_POST["umail"],
        $Contrasenia    = md5($_POST["upassword"])
    );
    
        header("Location: http://localhost/charruaspag/views/panel_admin/panel_admin.php");
}
