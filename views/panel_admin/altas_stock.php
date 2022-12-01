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
  <link href="../../public/css/style-admin.css" rel="stylesheet" type="text/css" />
  <script src="../../public/js/admin_vinos_mod.js"></script>
  <script src="../../public/js/admin_bodegas_mod.js"></script>

  <title>Validar Compra</title>
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
        <div class="box" id="detallecompra_box">
        <h3>VALIDAR COMPRA</h3>
        <form action="../../controllers/admin_AltaStock_Controller.php" method="POST" id="compra-form" autocomplete="off">
            <section id="input_grid_compra">
                <label class="input_label">
                    <input type="text" list="in_bodega_vino" id="input_bodega" class="inputs" name="in_bodega_vino" required>
                    <p2 class="input_texto"> ID Bodega </p2>
                    <datalist id="in_bodega_vino">
                        <script src="../../public/js/admin_bodegas_list_load.js"></script>
                    </datalist>
                </label>
                <label class="input_label">
                    <input class="inputs_mod" type="text" list="vino_compra" name="vino_compra" required>
                    <p2 class="input_texto"> ID Vino </p2>
                    <datalist id="vino_compra">
                        <script src="../../public/js/admin_vinos_form_load.js"></script>
                    </datalist>
                </label>
                <label class="input_label">
                    <input class="inputs_mod" type="number" min="0" id="cant_compra" name="cant_compra" required>
                    <p2 class="input_texto"> Cantidad </p2>
                </label>
                <label class="input_label">
                    <input class="inputs_mod" type="text" id="costo_compra" name="costo_compra" maxlength="20" required>
                    <p2 class="input_texto"> Monto Pagado </p2>
                </label>
                <label class="input_label">
                    <input value="<?php echo date('d/m/y');; ?>" class="inputs_mod" type="text" style="border-bottom: 0.155vw solid rgba(255, 255, 255, 0.815);" id="fecha_compra" name="fecha_compra" maxlength="50" readonly>
                    <p2 class="input_texto"> Fecha </p2>
                </label>
                <label class="input_label">
                    <input value="<?php echo "$_SESSION[id_admin]"; ?>"class="inputs_mod" type="text" style="border-bottom: 0.155vw solid rgba(255, 255, 255, 0.815);" min="0" id="empleado_compra" name="empleado_compra" readonly>
                    <p2 class="input_texto"> ID Empleado</p2>
                </label>
            </section>
            <button name="compra-button" id="compra-button"> ENVIAR </button>
        </form>
    </div>
</body>