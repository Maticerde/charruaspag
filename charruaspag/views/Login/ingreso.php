<?php

session_start();
if(isset($_SESSION['nombredeusuario'])){
    // $usuarioingresado = $_SESSION['nombredeusuario'];
    // echo "<h1> bienvenido: $usuarioingresado </h1>";
    header('location: /resktsoftware/charruaspag/index.php');
} else{
    header('location: /resktsoftware/charruaspag/views/login/index.php');
}
