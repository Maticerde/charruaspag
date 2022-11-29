<?php

session_start();
if(isset($_SESSION['nombredeusuario'])){
    // $usuarioingresado = $_SESSION['nombredeusuario'];
    // echo "<h1> bienvenido: $usuarioingresado </h1>";
    header('location: /index.php');
} else{
    header('location: /views/login/index.php');
}