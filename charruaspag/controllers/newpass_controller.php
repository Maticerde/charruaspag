<?php

if(!empty($_POST["uemail"])){
    newPassword();
}else 
{
/*redirecciono al panel si es que no se provino con DATA SET via POST desde el*/
header("Location: http://localhost/charruaspag/views/passperdida/index.php ");
exit();
}

function newPassword () {
    require_once("../models/newpass_model.php");
    $modelo = new NewPass();
    $datos = $modelo->updatePassword(
        $PEmail_Cliente          = $_POST["uemail"],
        $PContrasenia_Cliente    = md5($_POST["unewpass"])
    );

    echo "UPDATE DATABASE realizado con exito.";
    
}