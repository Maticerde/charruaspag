<?php
session_start();
    if(isset($_SESSION["nombredeusuario"])){
        header("location: /resktsoftware/charruaspag/index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="/charruaspag/src/login/img/Logo_Vinos_Charuas_V2.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="/charruaspag/public/css/loginstyle.css" rel="stylesheet" type="text/css">
</head>
<div class="login">
    <section id="panel">
        <a href="http://localhost/charruaspag/index.php">
        <img src=/resktsoftware/charruaspag/src/login/img/Logo_Vinos_Charuas_V2.png id="logo">
        <img src=/resktsoftware/charruaspag/src/login/img/Logo_Vinos_Charuas_V3.png id="logo2">
            <p2> Charrúas </p2>
        </a>
        <form method="POST" action="/charruaspag/controllers/login_Controller.php">
            <input type="text" disabled id="mensaje"/>
            <input type="text" name="unombre" placeholder="Email" required/>
            <input type="password" name="upass" placeholder="Contraseña" required/>
            <button type="submit_button" id="login_button"> Ingresar </button>
        </form>
        <a id="gotoregister" href="../register/index.php"> Registrarse </a>
        <p onclick="change_password()"> Olvidaste tu contraseña? </p>
    </section>
        <video autoplay loop muted src="/charruaspag/src/login/Video/vino_cayendo_en_una_copa.mp4"></video>
    <!-- <script src="/resktsoftware/charruaspag/public/js/loginjs.js"></script> -->
</div>