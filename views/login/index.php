<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="/resktsoftware/src/login/img/Logo_Vinos_Charuas_V2.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link href="/resktsoftware/public/css/loginstyle.css" rel="stylesheet" type="text/css">
</head>
<div class="login">
    <section id="panel">
        <a href="http://localhost/resktsoftware/views/login/index.php">
        <img src=/resktsoftware/src/login/img/Logo_Vinos_Charuas_V2.png id="logo">
        <img src=/resktsoftware/src/login/img/Logo_Vinos_Charuas_V3.png id="logo2">
            <p2> Charrúas </p2>
        </a>
        <form method="POST" action="/resktsoftware/controllers/login_controller.php">
            <input type="text" disabled id="mensaje"/>
            <input type="text" name="unombre" placeholder="Email"/>
            <input type="password" name="upassword" placeholder="Contraseña"/>
            <button type="submit_button" id="login_button"> Ingresar </button>
        </form>
        <p onclick="add_user()"> Registrarse </p>
        <p onclick="change_password()"> Olvidaste tu contraseña? </p>
    </section>
        <video autoplay loop muted src="/resktsoftware/src/login/Video/vino_cayendo_en_una_copa.mp4"></video>
    <!-- <script src="/resktsoftware/charruaspag/public/js/loginjs.js"></script> -->
</div>