<?php
session_start();
    if(isset($_SESSION["nombredeusuario"])){
        header("location: /index.php");
    }elseif(isset($_SESSION["setAdmin"])){
        header("location: /index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="/src/login/img/Logo_Vinos_Charuas_V2.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="/public/css/loginstyle.css" rel="stylesheet" type="text/css">
</head>
<div class="login">
    <section id="panel">
        <a href="/index.php">
        <img src=/src/login/img/Logo_Vinos_Charuas_V2.png id="logo">
        <img src=/src/login/img/Logo_Vinos_Charuas_V3.png id="logo2">
            <p2> Charrúas </p2>
        </a>
        <form method="POST" action="/controllers/Login_Controller.php">
            <input type="text" disabled id="mensaje"/>
            <input type="email" name="unombre" placeholder="Email" required/>
            <input type="password" name="upass" placeholder="Contraseña" required/>
            <button type="submit_button" id="login_button"> Ingresar </button>
        </form>
        <a id="gotoregister" href="../register/index.php"> 
            <p>Registrarse</p> 
        </a>
    </section>
        <video autoplay loop muted src="/src/login/video/viña_video.mp4"></video>
    <!-- <script src="/public/js/loginjs.js"></script> -->
</div>