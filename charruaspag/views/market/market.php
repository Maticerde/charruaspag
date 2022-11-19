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
    <section id="texto1"> B o u t i q u e </section>
    <a href="http://localhost/charruaspag/index.php">
      <section id="charruas-texto"> Charrúas </section>
    </a>
    <img id="cart-icon" src="/charruaspag/src/carticon.png"><span id="cart-count"></span></img>
  </div>
  <img id="arrow" src="/charruaspag/src/house_arrow.png" onclick="scrollto()"/>
  <div id="cart">
  <h1 id="carrito-title"> Carrito Charrúas </h1>
  <img id="close_cart" onclick="cartanimation();" src="/charruaspag/src/right_arrow.png"></img>
  <section id="carro-content"></section>
  <div id="totalcount"></div>
  <section id="cart-buttons">
    <button id="compraboton" <?php 
    if(isset($_SESSION["nombredeusuario"])){
      echo 'onclick="generar_compra(); load_shop(); vaciarcarrito(); " '; }
    else {
      echo 'onclick="alertacarrito();"';
    }
    ?>>Comprar</button>
    <button type="button" id="vaciar" onclick="vaciarcarrito();"><p2>Vaciar</p2><img src="/charruaspag/src/trashicon.png"/></button>
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
    <input type="text" id="keywords" name="keywords" size="30" maxlength="30" placeholder="Buscar productos">
    <form id="vinos-order" method="POST">
      <input type="radio" name="orden" onclick="load_shop();" value="Nombre_Vino" checked>
      <p1 class="ord" id="orden1">A &#10132; Z</p1></input>
      <input type="radio" name="orden" onclick="load_shop();" value="Codigo_Vino DESC">
      <p1 class="ord" id="orden2">Recientes</p1></input>
      <input type="radio" name="orden" onclick="load_shop();" value="Codigo_Vino ASC">
      <p1 class="ord" id="orden3">Antiguos</p1></input>
    </form>
    <section class="productos-gallery"></section>
  </section>
  <?php include "../footer.php" ?>
  <?php include '../desplegables/desplegables.php';?>
</section>
</body>
<script src="../../public/js/market_load.js"></script>
<script src="../../public/js/scroll-function.js"></script>
<script src="../../public/js/market_filters.js"></script>
<script src="../../public/js/carrito.js"></script>
<script src="../../public/js/desplegables.js"></script>