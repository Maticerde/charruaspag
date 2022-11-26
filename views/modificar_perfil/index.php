 <?php
session_start();
if (isset($_SESSION["nombredeusuario"])) {
} elseif (isset($_SESSION["setAdmin"])) {
} else {
    header("location: ../login/index.php");
}
?>
 <!DOCTYPE html>
 <html lang="en">

 <head>
   <link rel="icon" href="/charruaspag/src/login/img/Logo_Vinos_Charuas_V2.png">
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Modificar Perfil</title>
   <link href="/charruaspag/public/css/registerstyle.css" rel="stylesheet" type="text/css">
 </head>
 <div class="login">
   <section id="panel">
     <a href="http://localhost/charruaspag/index.php">
       <img src=/charruaspag/src/login/img/Logo_Vinos_Charuas_V2.png id="logo">
       <img src=/charruaspag/src/login/img/Logo_Vinos_Charuas_V3.png id="logo2">
       <p2> Charrúas </p2>
     </a>
     <p id="nota">Nota: Para modificar el perfil es necesario llenar todos los campos</p>
     <form class="modificarperfil" method="POST" action="../../controllers/ModificarPerfil_Controller.php">
       <input type="text" disabled id="mensaje" />
       <!-- <input type="number" name="ucedula" maxlength="8" placeholder="Documento C. I." required/> -->

       <input
         placeholder="<?php if (isset($_SESSION["nombredeusuario"])) {echo $_SESSION["getCI_cliente"];} elseif (isset($_SESSION["setAdmin"])) {echo $_SESSION["getCI_empleado"];}?>"
         name="mcedula"
         value="<?php if (isset($_SESSION["nombredeusuario"])) {echo $_SESSION["getCI_cliente"];} elseif (isset($_SESSION["setAdmin"])) {echo $_SESSION["getCI_empleado"];}?>"
         readonly />
       <input type="text" name="mdireccion"
         placeholder="<?php if (isset($_SESSION["nombredeusuario"])) {echo $_SESSION["getDir_cliente"];} elseif (isset($_SESSION["setAdmin"])) {echo $_SESSION["getDir_empleado"];}?>"
         value="<?php if (isset($_SESSION["nombredeusuario"])) {echo $_SESSION["getDir_cliente"];} elseif (isset($_SESSION["setAdmin"])) {echo $_SESSION["getDir_empleado"];}?>"
         required />
       <input type="text" name="mciudad"
         placeholder="<?php if (isset($_SESSION["nombredeusuario"])) {echo $_SESSION["getCity_cliente"];} elseif (isset($_SESSION["setAdmin"])) {echo $_SESSION["getCity_empleado"];}?>"
         value="<?php if (isset($_SESSION["nombredeusuario"])) {echo $_SESSION["getCity_cliente"];} elseif (isset($_SESSION["setAdmin"])) {echo $_SESSION["getCity_empleado"];}?>"
         required />
       <input type="text" name="muser"
         placeholder="<?php if (isset($_SESSION["nombredeusuario"])) {echo $_SESSION["nombredeusuario"];} elseif (isset($_SESSION["setAdmin"])) {echo $_SESSION["setAdmin"];}?>"
         value="<?php if (isset($_SESSION["nombredeusuario"])) {echo $_SESSION["nombredeusuario"];} elseif (isset($_SESSION["setAdmin"])) {echo $_SESSION["setAdmin"];}?>"
         required />
       <input type="text" name="mmail"
         placeholder="<?php if (isset($_SESSION["nombredeusuario"])) {echo $_SESSION["getMail_cliente"];} elseif (isset($_SESSION["setAdmin"])) {echo $_SESSION["getMail_empleado"];}?>"
         value="<?php if (isset($_SESSION["nombredeusuario"])) {echo $_SESSION["getMail_cliente"];} elseif (isset($_SESSION["setAdmin"])) {echo $_SESSION["getMail_empleado"];}?>"
         required />
       <input type="password" name="mpassword" placeholder="Confirmar Contraseña" required />
       <button type="submit_button" id="register_button"> Ingresar </button>

     </form>
   </section>
   <video autoplay loop muted src="/charruaspag/src/login/Video/vino_cayendo_en_una_copa.mp4"></video>

 </div>