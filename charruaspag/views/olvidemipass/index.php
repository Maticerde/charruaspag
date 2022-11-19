<?php
session_start();
    if(isset($_SESSION["nombredeusuario"])){
        header("location: /charruaspag/index.php");
    }elseif(isset($_SESSION["setAdmin"])){
        header("location: /charruaspag/index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperación de contraseña</title>
    <link>
</head>
<body>
    <div class="container1">
        <a href="http://localhost/charruaspag/index.php">
        <img src=/charruaspag/src/login/img/Logo_Vinos_Charuas_V2.png id="logo">
        <img src=/charruaspag/src/login/img/Logo_Vinos_Charuas_V3.png id="logo2">
            <p2> Charrúas </p2>
        </a>
        <form>
            <p> Para poder recuperar tu contraseña</p>
            <p>Escribe tu correo electronico</p>
            <input type="email" name="recuperarpass" placeholder="Tu correo electronico" required>
            <button type="submit_button" id="missedpass_button"> Ingresar </button>
        </form>
    </div>
    
</body>
</html>