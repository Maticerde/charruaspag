<?php
session_start();
unset(  
        $_SESSION['nombredeusuario'],  
        $_SESSION['id_cliente'],
        $_SESSION["getCI_cliente"],
        $_SESSION["getDir_cliente"],
        $_SESSION["getCity_cliente"],
        $_SESSION["getMail_cliente"],
        $_SESSION['setAdmin'],
        $_SESSION['id_admin'],
        $_SESSION["getCI_empleado"],
        $_SESSION["getDir_empleado"],
        $_SESSION["getCity_empleado"],
        $_SESSION["getMail_empleado"],
        $_SESSION["getPass"]);
session_destroy();
header('location: /charruaspag/index.php');