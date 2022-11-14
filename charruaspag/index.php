<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="icon" href="src\charruas logo.png">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vinos Charrúas</title>
  <link href="public/css/style.css" rel="stylesheet" type="text/css">
  <script src="public/js/script_load.js"></script>
  
</head>

<div id="menu">

<section id="usuariologeado">
    <?php // muestra el email del usuario
      if(isset($_SESSION["nombredeusuario"]))
      {
        echo $_SESSION["nombredeusuario"];
      }else {
      echo " ";
      }
    ?>
  </section>

  <?php
if(isset($_SESSION["nombredeusuario"])) { // solamente pueden accerder al panel admin los privilegiados que iniciaron sesion
  echo'
  <form id="gotoadmin" action="http://localhost/charruaspag/views/panel_admin/panel_admin.php">
    <button id="adminref">ADMIN</button>
    <button id="adminref2"><img id="adminref-r" src="src/adminicon.png"/></button>
  </form>';
  echo '
  <form id="gotologin" action="http://localhost/charruaspag/salir.php">
    <button id="newsesion">Cerrar Sesión</button>
    <button id="newsesion2"><img id="newsesion-r" src="src/usericon.png"/></button>
  </form>';
} else {
  echo 
  '<form id="gotologin" action="http://localhost/charruaspag/views/login/index.php">
    <button id="newsesion">Iniciar sesión</button>
    <button id="newsesion2"><img id="newsesion-r" src="src/usericon.png"/></button>
  </form>';
}
  ?>

  <a href="http://localhost/charruaspag/index.php">
  <section id="charruas-texto"> Charr &nbsp<img src="src/Logo_Vinos_Charuas_V3.png"/>&nbspas </section>
  </a>
</div>
<?php include 'views/desplegables/desplegables.php';?>
<img id="arrow" src="src/house_arrow.png" onclick="scrollto()"/>
<img id="cart-icon" src="src/carticon.png"></img>
<div id="cart">
  <h1 id="carrito-title"> Carrito Charrúas </h1>
  <img id="vaciar" onclick="vaciarcarrito();" src="src/trashicon.png"></img>
  <img id="close_cart" onclick="cartanimation();" src="src/right_arrow.png"></img>
  <section id="carro-content"></section>
  <div id="totalcount"></div>
  <button id="compraboton" <?php 
  if(isset($_SESSION["nombredeusuario"])){
    echo 'onclick="generar_compra(); load_shop(); vaciarcarrito(); " '; }
  else {
    echo 'onclick="alertacarrito();"';
  }
  ?>>comprar</button>
</div>
<section id="texto1"> Un vino, ㅤ una Historia
  <p> “El mejor vino no es necesariamente el más caro, sino el que se comparte.” </p>
</section>
<div id="box1">
  <img id="box1-fondo" src="src/closeup-shot-vineyard.jpg">
</div>
<div id="texto2box">
  <p1> Nuestros tres mejores </p1>
</div>
<img id="bsdetalle" src="src/wine-sommalier-drawing.png"> </img>
<img id="deco-bstext" src="src/deco-bs.png"> </img>
<section id="advertbox-i"> <a href="https://www.google.com.uy/maps/place/La+Casa+Violeta/@-34.8951846,-56.06,17z/data=!4m5!3m4!1s0x959f87968e4b3317:0x842ebec130f23abd!8m2!3d-34.8951662!4d-56.0607054" target="_blank"><img src="src/cubo_cena2_1400x.progressive.jpg"/></a></section>
<section id="advertbox-d"> <a href=""><img src="src/wine-bottle-label-mockup-db.jpg"/></a></section>
<div id="boxbs">
  <img id="bsfondo" src="src/wine-splash.png"> </img>
  <span id="bestsellers">
  <script src="public/js/bestsellers_fetch.js"></script>
  </span>
  <div id="arr"> </div>
</div>
<section id="bestsellers_info"></section>
<section id="gallery">
  <img id="img1" src="src/7304726.jpg">
  <img id="img2" src="src/bodega.jpg">
  <img id="img3" src="src/vinocopa.jpg">
  <img id="img4" src="src/vinorosa.jpg">
</section>
<section class="divisor"></section>
<section id="sliderbox">
  <section id="slider">
    <img src="src/sliderpics/slider_1.jpg">
    <img src="src/sliderpics/slider_2.jpg">
    <img src="src/sliderpics/slider_3.jpg">
    <img src="src/sliderpics/slider_1.jpg">
  </section>
</section>
<div id="slidertext"></div>
<section class="gallery-wrapper">
  <input type="text" id="keywords" name="keywords" size="30" maxlength="30" placeholder="Buscar productos">
  </button>
  <section class="productos-gallery"></section>
</section>
<div id="box3">
  <div class="contactobox">
    <a href="http://localhost/charruaspag/index.php">
    <img class="logo1" src="src/charruas logo.png">
    <p2 id="charruas-texto2"> Charrúas </p2>
    </a>
    <ul>
      <li id="contacto" onclick="desplegar(id)"> Contacto </li>
      <li id="fdepago" onclick="desplegar(id)"> Formas de pago </li>
      <li id="poldevolucion" onclick="desplegar(id)"> Política de Devolución </li>
      <li id="polprivacidad" onclick="desplegar(id)"> Políticas de Privacidad </li>
    </ul>
  </div>
</div>
<div id="copyright">
  <section id="copy"> RESCATE SOFTWARE © Todos los derechos reservados.<section>
</div>
<section id="darken"> </section>
<script src="public/js/function.js"></script>