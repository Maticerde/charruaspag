<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="icon" href="../../src/charruas logo.png">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, minimum-scale=1">
  <link href="../../public/css/style-market.css" rel="stylesheet" type="text/css"/>
  <link href="../../public/css/carrito.css" rel="stylesheet" type="text/css">
  <link href="../../public/css/desplegables.css" rel="stylesheet" type="text/css"/>

  <title>Tienda Charrúas</title>
</head>

<body>
  <div id="menu">
  <section id="panel_menu">
    <div><a style="color: inherit; text-decoration: none;" href="/index.php">Inicio</a></div>
    <div><a style="cursor: pointer;" onclick="scrolltoBottom();">Contacto</a></div>
    <?php // muestra el email del usuario
      if(isset($_SESSION["nombredeusuario"]))
      {
        echo '<div> <a style="color: inherit; text-decoration: none;" href="/views/modificar_perfil/index.php"> Modificar perfil</a></div>';
        echo '<div> <a style="color: inherit; text-decoration: none;" href="/salir.php"><p1 style="display: inline-block; transform: rotate(180deg); line-height: 0.1vw;">&#10154;</p1> Cerrar Sesión </a></div>';
      }elseif(isset($_SESSION["setAdmin"])) {
        echo '<div> <a style="color: inherit; text-decoration: none;" href="/views/modificar_perfil/index.php"> Modificar perfil</a></div>';
        echo '<div> <a style="color: inherit; text-decoration: none;" href="/views/panel_admin/panel_admin.php"> <p1 style="color: rgba(130, 10, 10, 0.879);">*</p1>Panel Admin </a></div>';
        echo '<div> <a style="color: inherit; text-decoration: none;" href="/views/panel_admin/altas_stock.php"> <p1 style="color: rgba(130, 10, 10, 0.879);">*</p1>Validar Compra </a></div>';
        echo '<div> <a style="color: inherit; text-decoration: none;" href="/views/panel_admin/registros.php"> <p1 style="color: rgba(130, 10, 10, 0.879);">*</p1>Registros </a></div>';
        echo '<div> <a style="color: inherit; text-decoration: none;" href="/salir.php"><p1 style="display: inline-block; transform: rotate(180deg); line-height: 0.1vw;">&#10154;</p1> Cerrar Sesión </a></div>';
      }else {
        echo '<div id="usuario_responsive"> <a style="color: inherit; text-decoration: none;" href="/views/login/index.php"> Iniciar Sesión </a></div>';
      }
    ?>
  </section>
  <div id="hamburguer" onclick="desplegarpanel();"><span>&#9776;</span></div>
    <section id="texto1"> B o u t i q u e </section>
    <a href="/index.php">
      <section id="charruas-texto"> Charrúas </section>
    </a>
    <img id="cart-icon" src="/src/carticon.png"><span id="cart-count"></span></img>
    <section id="usuariologeado">
      <?php // muestra el email del usuario
      if(isset($_SESSION["nombredeusuario"]))
      {
        echo "¡Bienvenid@, " . $_SESSION["nombredeusuario"] . "!";
      }
      elseif(isset($_SESSION["setAdmin"])) {
        echo "¡Bienvenid@, " . $_SESSION["setAdmin"] . "!";
      }else {
        echo '<div> <a style="color: inherit; text-decoration: none;" href="/views/login/index.php"> Iniciar Sesión </a></div>';
      }
    ?>
  </section>
  <?php
if(isset($_SESSION["nombredeusuario"])) { // si el cliente inició sesion, aparecerá el apartado de cerrar sesión
  echo '
  <form id="gotologin" action="/salir.php">
    <button id="newsesion">Cerrar Sesión</button>
  </form>';
} 
  ?>
  </div>
  <img id="arrow" src="/src/house_arrow.png" onclick="scrollto()"/>
  <div id="cart">
  <h1 id="carrito-title"> Carrito Charrúas </h1>
  <img id="close_cart" onclick="cartanimation();" src="/src/right_arrow.png"></img>
  <section id="carro-content"></section>
  <div id="totalcount"></div>
   <form>
    <input value="<?php if(isset($_SESSION["nombredeusuario"])){ echo $_SESSION["id_cliente"];} ?>"type="number" id="id_cliente_form" name="id_cliente_form" style="display: none">
  </form>
  <section id="cart-buttons">
    <button id="compraboton" <?php 
    if(isset($_SESSION["nombredeusuario"])){
      echo 'onclick="generar_venta(); generar_detalleventa(); vaciarcarrito();"'; }
    else {
      echo 'onclick="alertacarrito();"';
    }
    ?>>Comprar</button>
    <button type="button" id="vaciar" onclick="vaciarcarrito();"><p2>Vaciar</p2><img src="/src/trashicon.png"/></button>
  </section>
</div>
<section id="main-grid">
  <section id="filter-section">
    <div id="paises-filter"> 
      <h1>Países</h1>
      <section id="paises-list"></section>
    </div>
    <div id="bodegas-filter">
      <h1>Bodegas</h1>
      <section id="bodegas-list"></section>
    </div>
    <div id="regiones-filter">
      <h1>Regiones</h1>
      <section id="regiones-list"></section>
    </div>
  </section>
  <section id="market-section">
    <input type="text" id="keywords" name="keywords" size="30" maxlength="30" placeholder="Buscar productos" autocomplete="off">
    <form id="vinos-order" method="POST">
      <input type="radio" name="orden" onclick="load_shop();" value="Nombre_Vino" checked>
      <p1 class="ord" id="orden1">A &#10132; Z</p1></input>
      <input type="radio" name="orden" onclick="load_shop();" value="Precio DESC">
      <p1 class="ord" id="orden2">> Precio</p1></input>
      <input type="radio" name="orden" onclick="load_shop();" value="Precio ASC">
      <p1 class="ord" id="orden3">< Precio</p1></input>
    </form>
    <section class="productos-gallery"></section>
  </section>
  <?php include "../footer.php" ?>
  <?php include '../desplegables/desplegables.php';?>
</section>
<div id="contacto-icons"><a target="_blank" href="https://www.instagram.com/gonzeh2/" ><img src="/src/Instagram_icon.png"/></a><a target="_blank" href="https://www.facebook.com/gonzalo.acosta.1088893"><img src="/src/Facebook_Logo.png"/></a></div>
</body>
<script src="../../public/js/market_load.js"></script>
<script src="../../public/js/market_filters.js"></script>
<script src="../../public/js/carrito.js"></script>
<script src="../../public/js/hamburguer.js"></script>
<script src="../../public/js/scroll-function.js"></script>
<script src="../../public/js/desplegables.js"></script>