<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="icon" href="src\charruas logo.png">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vinos Charrúas</title>
  <link href="style.css" rel="stylesheet" type="text/css">
  <script src="script_load.js"></script>
</head>
<div id="menu">
  <form action="http://localhost/charruaspag/panel_admin.php"><button id="gotoadmin">ADMIN</button></form>
  <form type='submit' id="gotologin" action="http://localhost/login/index.html">
    <button type='submit' id="newsesion">Iniciar sesión</button>
    <button type='submit' id="newsesion2"><img id="newsesion-r" src="src/usericon.png"></button>
  </form>
  <section id="charruas-texto"> Charrúas </section>
</div>

<?php include 'desplegables.php';?>
<div id="arrow" onclick="scrollto()"> &#10151; </div>
<img id="cart-icon" src="src/carticon.png"></img>
<div id="cart">
    <h1 id="carrito-title"> Carrito </h1>
    <img id="vaciar" onclick="vaciarcarrito()" src="src/trashicon.png"></img>
    <section id="carro1"></section>
    <div id="totalcount"></div>
    <button id="compraboton" onclick="generar_compra(); load_shop(); vaciarcarrito();">comprar</button>
  </div>
<section id="texto1"> Un vino, ㅤ una Historia
  <p> “El mejor vino no es necesariamente el más caro, sino el que se comparte.” </p>
</section>
<div id="box1">
  <img id="box1-fondo" src="src/closeup-shot-vineyard.jpg">
</div>
<div id="texto2box">
  <img id="deco-bstext" src="src/deco-bs.png"> </img>
  <p1> Nuestros tres mejores </p1>
</div>
<div id="boxbs">
  <img id="bsdetalle" src="src/wine-sommalier-drawing.png"> </img>
  <img id="bsfondo" src="src/wine-splash.png"> </img>
  <img class="bs" id="bs1" src="src/vinos/amalaya-tinto.png"> </img>
  <img id="bs2" src="src/vinos/kaiken-malbec-ultra.png"> </img>
  <img class="bs" id="bs3" src="src/vinos/zapata-alta-malbec.png"> </img>
  <div id="arr"> </div>
</div>
<div id="longbox">
  <div class="bsinfobox">
    <h4 id="bs1-name"> Amalaya Malbec </h4>
    <h3 id="bs1-price"> $950 </h3>
  </div>
  <div class="bsinfobox">
    <h4 id="bs2-name"> Kaiken Ultra Malbec </h4>
    <h3 id="bs2-price"> $2.490 </h3>
  </div>
  <div class="bsinfobox">
    <h4 id="bs3-name"> Catena Alta Malbec </h4>
    <h3 id="bs3-price"> $1.790 </h3>
  </div>

</div>
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
  <button type="button" onclick="search();" name="search" id="search">
    <p2> &#9906; </p2>
  </button>
  <section class="productos-gallery"></section>
</section>
<div id="box3">
  <div class="contactobox">
    <img class="logo1" src="src/charruas logo.png">
    <p2 id="charruas-texto2"> Charrúas </p2>
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
<?php include 'function.php';?>