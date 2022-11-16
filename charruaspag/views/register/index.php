<?php
session_start();
    if(isset($_SESSION["nombredeusuario"])){
        header("location: /charruaspag/index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="/charruaspag/src/login/img/Logo_Vinos_Charuas_V2.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <link href="/charruaspag/public/css/registerstyle.css" rel="stylesheet" type="text/css">
</head>
<div class="login">
    <section id="panel">
        <a href="http://localhost/charruaspag/index.php">
        <img src=/charruaspag/src/login/img/Logo_Vinos_Charuas_V2.png id="logo">
        <img src=/charruaspag/src/login/img/Logo_Vinos_Charuas_V3.png id="logo2">
            <p2> Charrúas </p2>
        </a>
        <form method="POST" action="/charruaspag/controllers/Register_Controller.php">
            <input type="text" disabled id="mensaje"/>
            <input type="number" name="ucedula" maxlength="8" placeholder="Documento C. I." required/>
            <input type="text" name="udireccion" placeholder="Dirección" required/>
            <input type="text" name="uciudad" placeholder="Ciudad" required/>
            <input type="text" name="user" placeholder="Nombre" required/>
            <input type="text" name="umail" placeholder="Email" required/>
            <input type="password" name="upassword" placeholder="Contraseña" required/>
            <button type="submit_button" id="register_button"> Registrarse </button>
        </form>
        <a id="redirect_login" href="http://localhost/charruaspag/views/login/index.php"> 
            <p>¿Ya tenes una cuenta?</p>
        </a>
    </section>
        <video autoplay loop muted src="/charruaspag/src/login/Video/vino_cayendo_en_una_copa.mp4"></video>
     <!-- <script src="/charruaspag/public/js/register/registerjs.js"></script> -->
</div>