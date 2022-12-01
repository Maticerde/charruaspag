<?php
session_start();
if(empty($_SESSION['setAdmin'])){
    header('location: /views/login/index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="icon" href="../../src/charruas logo.png">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, minimum-scale=1">
  <link href="../../public/css/style-admin-registros.css" rel="stylesheet" type="text/css" />
  <script src="../../public/js/admin_vinos_mod.js"></script>
  <script src="../../public/js/admin_bodegas_mod.js"></script>

  <title>Registros</title>
</head>

<body>
    <img id=fondo src="../../src/foto3.jpg">
    <div id="menu">
        <section id="texto1">A d m i n i s t r a c i ó n</section>
        <a href="/index.php">
            <section id="charruas-texto"> Charrúas </section>
        </a>
    </div>
    <a href="/views/panel_admin/panel_admin.php">
        <section id="text-inicio"><span>&#10094;</span></section>
    </a>

    <section id="gallery">
        <section class="table-box" id="table-ventas">
            <h1>REGISTRO DE VENTAS</h1>
            <input type="text" id="keywords" name="keywords" size="19" maxlength="19" placeholder="Buscar" autocomplete="off">
            <section class="table-content" id="table-content"></section>
        </section>
        <section class="table-box" id="table-compras">
            <h1>REGISTRO DE COMPRAS</h1>
            <input type="text" id="keywords_c" name="keywords_c" size="19" maxlength="19" placeholder="Buscar" autocomplete="off">
            <section class="table-content" id="table-content-compras"></section>
        </section>
        <section class="table-box" id="table-cambios">
            <h1>REGISTRO DE CAMBIOS</h1>
            <section class="table-content" id="table-content-cambios"></section>
        </section>
    </section>
    <script src="/public/js/admin_getventas_list.js"></script>
    <script src="/public/js/admin_getcompras_list.js"></script>
    <script src="/public/js/admin_getrespaldos_list.js"></script>
</body>