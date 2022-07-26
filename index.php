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
  <link href="public/css/carrito.css" rel="stylesheet" type="text/css">
  <link href="public/css/desplegables.css" rel="stylesheet" type="text/css">
  <script src="public/js/script_load.js"></script>

</head>
<div id="menu">
  <section id="panel_menu">
    <div><a style="color: inherit; text-decoration: none;" href="/charruaspag/views/market/market.php">Tienda</a></div>
    <div><a style="cursor: pointer;" onclick="scrolltoBottom();">Contacto</a></div>
    <?php // muestra el email del usuario
      if(isset($_SESSION["nombredeusuario"]))
      {
        echo '<div> <a style="color: inherit; text-decoration: none;" href="/charruaspag/views/modificar_perfil/index.php"> Modificar perfil</a></div>';
        echo '<div> <a style="color: inherit; text-decoration: none;" href="/charruaspag/salir.php"><p1 style="display: inline-block; transform: rotate(180deg); line-height: 0.1vw;">&#10154;</p1> Cerrar Sesión </a></div>';
      }elseif(isset($_SESSION["setAdmin"])) {
        echo '<div> <a style="color: inherit; text-decoration: none;" href="/charruaspag/views/modificar_perfil/index.php"> Modificar perfil</a></div>';
        echo '<div> <a style="color: inherit; text-decoration: none;" href="/charruaspag/views/panel_admin/panel_admin.php"> Panel Admin </a></div>';
        echo '<div> <a style="color: inherit; text-decoration: none;" href="/charruaspag/views/panel_admin/altas_stock.php"> Nueva Compra </a></div>';
        echo '<div> <a style="color: inherit; text-decoration: none;" href="/charruaspag/salir.php"><p1 style="display: inline-block; transform: rotate(180deg); line-height: 0.1vw;">&#10154;</p1> Cerrar Sesión </a></div>';
      } else {
        echo '<div id="usuario_responsive"> <a style="color: inherit; text-decoration: none;" href="/views/login/index.php"> Iniciar Sesión </a></div>';
      }
    ?>
  </section>
  <div id="hamburguer" onclick="desplegarpanel();"><span>&#9776;</span></div>
<img id="cart-icon" src="src/carticon.png"><span id="cart-count"></span></img>
<section id="usuariologeado">
<?php // muestra el email del usuario
      if(isset($_SESSION["nombredeusuario"]))
      {
        echo "¡Bienvenid@, " . $_SESSION["nombredeusuario"] . "!";
      }
      elseif(isset($_SESSION["setAdmin"])) {
        echo "¡Bienvenid@, " . $_SESSION["setAdmin"] . "!";
      }else {
        echo '<div> <a style="color: inherit; text-decoration: none;" href="/charruaspag/views/login/index.php"> Iniciar Sesión </a></div>';
      }
    ?>
  </section>
  <a href="/charruaspag/index.php">
  <section id="charruas-texto"> Charr &nbsp<img src="src/Logo_Vinos_Charuas_V3.png"/>&nbspas </section>
  </a>
</div>
<?php include 'views/desplegables/desplegables.php';?>
<img id="arrow" src="src/house_arrow.png" onclick="scrollto()"/>
<div id="cart">
  <h1 id="carrito-title"> Carrito Charrúas </h1>
  <img id="close_cart" onclick="cartanimation();" src="src/right_arrow.png"></img>
  <section id="carro-content"></section>
  <div id="totalcount"></div>
  <form>
    <input value="<?php if(isset($_SESSION["nombredeusuario"])){ echo $_SESSION["id_cliente"];} ?>"type="number" id="id_cliente_form" name="id_cliente_form" style="display: none">
  </form>
  <section id="cart-buttons">
      <button id="compraboton" <?php 
      if(isset($_SESSION["nombredeusuario"])){
        echo 'onclick="generar_venta(); generar_detalleventa(); vaciarcarrito();"';}
      else {
        if(isset($_SESSION["setAdmin"])){
          echo 'onclick="alertacarrito_admin();"';
        } else {
          echo 'onclick="alertacarrito();"';
        }
      }
      ?>>Comprar</button>
    <button type="button" id="vaciar" onclick="vaciarcarrito();"><p2>Vaciar</p2><img src="src/trashicon.png"/></button>
  </section>
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
<!-- <section id="advertbox-i"> <a href="https://www.google.com.uy/maps/place/La+Casa+Violeta/@-34.8951846,-56.06,17z/data=!4m5!3m4!1s0x959f87968e4b3317:0x842ebec130f23abd!8m2!3d-34.8951662!4d-56.0607054" target="_blank"><img src="src/cubo_cena2_1400x.progressive.jpg"/></a></section>
<section id="advertbox-d"> <a href=""><img src="src/wine-bottle-label-mockup-db.jpg"/></a></section> -->
<div id="boxbs">
  <img id="bsfondo" src="src/wine-splash.png"> </img>
  <span id="bestsellers">
  <script src="public/js/bestsellers_fetch.js"></script>
  </span>
  <div id="arr"> </div>
</div>
<section id="bestsellers_info"></section>
<section id="gallery">
  <div style="position: relative;"><a href="/charruaspag/views/market/market.php"><img id="img1" src="src/7304726.jpg"><div class="gallery_text">Tienda</div></a></div>
  <div style="position: relative;"><img id="img2" src="src/bodega.jpg"><div class="gallery_text">Bodegas</div></div>
  <div style="position: relative;"><img id="img3" src="src/vinocopa.jpg"><div class="gallery_text">Sobre Nosotros</div></div>
  <div style="position: relative;"><img id="img4" src="src/vinorosa.jpg"><div class="gallery_text">Recomendaciones</div></div>

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
  <h1>¡Últimas Oportunidades!</h1>
<section class="productos-gallery"></section>
</section>
<div id="box3">
  <div class="contactobox">
    <a href="/index.php">
    <img class="logo1" src="src/charruas logo.png">
    <p2 id="charruas-texto2"> Charrúas </p2>
    </a>
    <ul>
      <li id="contacto"><a href="mailto:charruas.soporte@gmail.com">Contacto</a></li>
      <li id="fdepago" onclick="desplegar(id)"> Formas de pago </li>
      <li id="poldevolucion" onclick="desplegar(id)"> Política de Devolución </li>
      <li id="polprivacidad" onclick="desplegar(id)"> Políticas de Privacidad </li>
    </ul>
  </div>
</div>
<div id="copyright">
  <section id="copy"> RESCATE SOFTWARE © Todos los derechos reservados.<section>
</div>
<div id="contacto-icons"><a target="_blank" href="https://www.instagram.com/gonzeh2/" ><img src="src/Instagram_icon.png"/></a><a target="_blank" href="https://www.facebook.com/gonzalo.acosta.1088893"><img src="src/Facebook_Logo.png"/></a></div>
<script src="public/js/carrito.js"></script>
<script src="public/js/scroll-function.js"></script>
<script src="public/js/hamburguer.js"></script>
<script src="public/js/desplegables.js"></script>