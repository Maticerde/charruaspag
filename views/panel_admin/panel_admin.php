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

  <title>Panel Admin</title>
</head>

<body>
  <img id=fondo src="../../src/foto3.jpg">
  <div id="menu">
    <section id="texto1">A d m i n i s t r a c i ó n</section>
    <a href="/index.php">
      <section id="charruas-texto"> Charrúas </section>
    </a>
  </div>
  <section id="text-prod" onclick="slide(1)"><span>&#10132;</span> <p5 id="regresar_Text">A G R E G A R</p5><p5 id="productos_Text">P R O D U C T O S</p5>
    <div id="text-prod-preventclick"
      onclick="event.cancelBubble=true;if (event.stopPropagation) event.stopPropagation();"></div>
  </section>

  <section id="text-user" onclick="slide(0)"><span>&#10132;</span> <p5 class="modificar_Text">M O D I F I C A R</p5><p5 id="usuarios_Text">U S U A R I O S</p5>
    <div id="text-user-preventclick"
      onclick="event.cancelBubble=true;if (event.stopPropagation) event.stopPropagation();"></div>
  </section>
  <a href="/views/panel_admin/altas_stock.php">
    <section id="text-altas-stock"><span>&#10070;</span></section>
  </a>
<section id="grid-mod-functions">
  <div class="box" id="modvino-bax">
    <h3>MODIFICAR PRODUCTO</h3>
    <span id="mensaje_modv"></span>
    <form action="../../controllers/admin_ModVino_Controller.php" method="POST" id="modvino-form">
      <section id="input_grid_modv">
        <input type="number" id="in_codigo_vino" name="in_codigo_vino" style="display: none">
        <input type="text" id="in_imagenString_mod" name="in_imagenString_mod" style="display: none">
        <label class="input_label">
          <input class="inputs_mod" type="text" id="in_nombre_vino" name="in_nombre_vino" maxlength="20" required>
          <p2 class="input_texto_modv"> Nombre </p2>
        </label>
        <label class="input_label">
          <input class="inputs_mod" type="number" min="0" id="in_precio" name="in_precio" required>
          <p2 class="input_texto_modv"> Precio </p2>
        </label>
        <label class="input_label">
          <input class="inputs_mod" type="text" min="0" id="in_descrip" name="in_descrip" required>
          <p2 class="input_texto_modv"> Descripción </p2>
        </label>
        <label class="input_label">
          <input class="inputs_mod" type="text" id="in_pais" name="in_pais" maxlength="20" required>
          <p2 class="input_texto_modv"> País </p2>
        </label>
        <label class="input_label">
          <input class="inputs_mod" type="text" id="in_region" name="in_region" maxlength="50" required>
          <p2 class="input_texto_modv"> Región </p2>
        </label>
        <label class="input_label">
          <input class="inputs_mod" type="number" min="0" id="in_cosecha" name="in_cosecha" required>
          <p2 class="input_texto_modv"> Cosecha </p2>
        </label>
        <label class="input_label">
          <input class="inputs_mod" type="text" list="in_bodega_vino" name="in_bodega_vino" required>
          <p2 class="input_texto_modv"> ID Bodega </p2>
          <datalist id="in_bodega_vino">
          </datalist>
        </label>
        <label id="imagen_label" class="input_label">
          <input class="inputs_mod" type="file" id="in_imagen_mod" name="in_imagen_mod" accept=".png">
          <p2 id="nombre_imagen_mod"> Imagen </p2>
          <img id="preview" src="">
        </label>
      </section>
      <button type="button" name="modvino-button-preventclick" id="modvino-button-preventclick" style="display: none"></button>
      <button type="button" onclick="validate_submit_modv();" name="modvino-button" id="modvino-button"> ENVIAR </button>
    </form>
  </div>

  <div class="box" id="modbodega-bax">
    <h3>MODIFICAR BODEGA</h3>
    <span id="mensaje_modb"></span>
      <form action="../../controllers/admin_ModBodega_Controller.php" method="post" id="modbodega-form">
      <section id="input_grid_modb">
      <input type="number" id="in_codigo_bodega" name="in_codigo_bodega" style="display: none">
          <label class="input_label">
            <input class="inputs_modb" type="text" id="in_nombre_bodega" name="in_nombre_bodega" maxlength="40" required>
            <p2 class="input_texto_modb"> Nombre </p2>
          </label>
          <label class="input_label">
            <input class="inputs_modb" type="text" id="in_email" name="in_email" maxlength="50" required>
            <p2 class="input_texto_modb"> Email </p2>
          </label>
          <label class="input_label">
            <input class="inputs_modb" type="text" id="in_direccion" name="in_direccion" maxlength="70" required>
            <p2 class="input_texto_modb"> Dirección </p2>
          </label>
          <label class="input_label">
            <input class="inputs_modb" type="text" id="in_pais" name="in_pais" maxlength="25" required>
            <p2 class="input_texto_modb"> País </p2>
          </label>
          <label class="input_label">
            <input class="inputs_modb" type="number" min="0" id="in_postal" name="in_postal" required>
            <p2 class="input_texto_modb"> Codigo Postal </p2>
          </label>
          <label class="input_label">
            <input class="inputs_modb" type="text" id="in_ciudad" name="in_ciudad" maxlength="25" required>
            <p2 class="input_texto_modb"> Ciudad </p2>
          </label>
          <label class="input_label">
            <input class="inputs_modb" type="number" min="0" id="in_telefono" name="in_telefono" required>
            <p2 class="input_texto_modb"> Teléfono </p2>
          </label>
          <label class="input_label">
            <input class="inputs_modb" type="number" min="0" id="in_cuenta" name="in_cuenta" required>
            <p2 class="input_texto_modb"> Cuenta </p2>
          </label>
        </section>
        <button type="button" name="modbodega-button-preventclick" id="modbodega-button-preventclick" style="display: none"></button>
        <button type="button" onclick="validate_submit_modb();" name="modbodega-button" id="modbodega-button"> ENVIAR </button>
      </form>
  </div>
</section>

  <div id="vinos-list-label">
    <span id="info-section" onclick="desplegarmod();">
    </span>
    <span id="info-efecto">
    </span>
    <section id="info-vino">
      <img class="info" id="v_img" />
      <div class="info" id="v_nombre"></div>
      <section id="upperinfo">
        <div class="info" id="v_pais"></div>
        <div class="info" id="v_region"></div>
        <div class="info" id="v_cosecha"></div>
      </section>
      <section id="lowerinfo">
        <div class="info" id="v_precio"></div>
        <div class="info" id="v_stock"></div>
      </section>
    </section>
    <section id="info-bodega">
      <div class="infob" id='b_nombre'></div>
      <section id='upperinfo'>
        <div class="infob" id='b_pais'></div>
        <div class="infob" id='b_ciudad'></div>
        <div class="infob" id='b_cuenta'></div>
      </section>
      <section id='lowerinfo'>
        <div class="infob" id='b_direccion'></div>
        <div class="infob" id='b_codpostal'></div>
        <div class="infob" id='b_email'></div>
      </section>
    </section>
    <h1>LISTA DE PRODUCTOS:</h1>
    <section id="vinos-list">
      <script src="../../public/js/admin_vinos_list_function.js"></script>
      <script src="../../public/js/admin_mostrar_info.js"></script>
    </section>
    <form id="vinos-order" method="POST">
      <script src="../../public/js/admin_vinos_orden.js"></script>
      <input type="radio" name="orden" onclick="load_vinos(); load_orden_style('orden1')" value="Nombre_Vino" checked>
      <p1 class="ord" id="orden1">A &#10132; Z</p1></input>
      <input type="radio" name="orden" onclick="load_vinos(); load_orden_style('orden2')" value="Codigo_Vino DESC">
      <p1 class="ord" id="orden2">Recientes</p1></input>
      <input type="radio" name="orden" onclick="load_vinos(); load_orden_style('orden3')" value="Codigo_Vino ASC">
      <p1 class="ord" id="orden3">Antiguos</p1></input>
    </form>
  </div>
  <section id="grid-functions">
    <div class="box" id="addvino-box">
      <h3>AGREGAR PRODUCTO</h3>
      <span id="mensaje"></span>
      <form action="../../controllers/admin_AddVino_Controller.php" method="POST" id="addvino-form" autocomplete="off">
        <section id="input_grid">
          <label class="input_label">
            <input class="inputs" type="text" id="in_nombre_vino" name="in_nombre_vino" maxlength="20" required>
            <p2 class="input_texto"> Nombre </p2>
          </label>
          <label class="input_label">
            <input class="inputs" type="number" min="0" id="in_precio" name="in_precio" required>
            <p2 class="input_texto"> Precio </p2>
          </label>
          <label class="input_label">
            <input class="inputs" type="text" min="0" id="in_descrip" name="in_descrip" required>
            <p2 class="input_texto"> Descripción </p2>
          </label>
          <label class="input_label">
            <input class="inputs" type="text" id="in_pais" name="in_pais" maxlength="20" required>
            <p2 class="input_texto"> País </p2>
          </label>
          <label class="input_label">
            <input class="inputs" type="text" id="in_region" name="in_region" maxlength="50" required>
            <p2 class="input_texto"> Región </p2>
          </label>
          <label class="input_label">
            <input class="inputs" type="number" min="0" id="in_cosecha" name="in_cosecha" required>
            <p2 class="input_texto"> Cosecha </p2>
          </label>
          <label class="input_label">
            <input type="text" list="in_bodega_vino" class="inputs" name="in_bodega_vino" required>
            <p2 class="input_texto"> ID Bodega </p2>
            <datalist id="in_bodega_vino">
              <script src="../../public/js/admin_bodegas_list_load.js"></script>
            </datalist>
          </label>
          <label id="imagen_label" class="input_label">
            <input class="inputs" type="file" id="in_imagen" name="in_imagen" accept=".png" required>
            <p2 id="nombre_imagen"> Imagen </p2>
            <img id="preview" src="">
          </label>
        </section>
        <button name="addvino-button" id="addvino-button"> ENVIAR </button>
      </form>
    </div>
    <div class="box" id="addbodega-box">
      <h3>AGREGAR BODEGA</h3>
      <span id="mensaje"></span>
      <form action="../../controllers/admin_AddBodega_Controller.php" method="post" id="addbodega-form" autocomplete="off">
        <section id="input_grid">
          <label class="input_label">
            <input class="inputs_mod" type="text" id="in_nombre_bodega" name="in_nombre_bodega" maxlength="40" required>
            <p2 class="input_texto"> Nombre </p2>
          </label>
          <label class="input_label">
            <input class="inputs_mod" type="text" id="in_email" name="in_email" maxlength="50" required>
            <p2 class="input_texto"> Email </p2>
          </label>
          <label class="input_label">
            <input class="inputs_mod" type="text" id="in_direccion" name="in_direccion" maxlength="70" required>
            <p2 class="input_texto"> Dirección </p2>
          </label>
          <label class="input_label">
            <input class="inputs_mod" type="text" id="in_pais" name="in_pais" maxlength="25" required>
            <p2 class="input_texto"> País </p2>
          </label>
          <label class="input_label">
            <input class="inputs_mod" type="number" min="0" id="in_postal" name="in_postal" required>
            <p2 class="input_texto"> Codigo Postal </p2>
          </label>
          <label class="input_label">
            <input class="inputs_mod" type="text" id="in_ciudad" name="in_ciudad" maxlength="25" required>
            <p2 class="input_texto"> Ciudad </p2>
          </label>
          <label class="input_label">
            <input class="inputs_mod" type="number" min="0" id="in_telefono" name="in_telefono" required>
            <p2 class="input_texto"> Teléfono </p2>
          </label>
          <label class="input_label">
            <input class="inputs_mod" type="number" min="0" id="in_cuenta" name="in_cuenta" required>
            <p2 class="input_texto"> Cuenta </p2>
          </label>
        </section>
        <button name="addbodega-button" id="addbodega-button"> ENVIAR </button>
      </form>
    </div>
    <div class="box" id="adduser-box">
      <h3> AGREGAR USUARIO </h3>
      <span id="mensaje"></span>
      <form action="/controllers/Register_Controller.php" method="POST" id="adduser-form" autocomplete="off">
        <section id="input_grid">
        <label class="input_label">
            <input class="inputs" type="text" id="nombre_user" name="nombre_user" maxlength="20" required>
            <p2 class="input_texto"> Nombre </p2>
          </label>
          <label class="input_label">
            <input class="inputs" type="number" id="ucedula" name="ucedula" min="1000000" max="99999999" required>
            <p2 class="input_texto"> Cédula </p2>
          </label>
          <label class="input_label">
            <input class="inputs" type="text" id="udireccion" name="udireccion" required>
            <p2 class="input_texto"> Direccion </p2>
          </label>
          <label class="input_label">
            <input class="inputs" type="text" id="uciudad" name="uciudad" required>
            <p2 class="input_texto"> Ciudad </p2>
          </label>
          <label class="input_label">
            <input class="inputs" type="text" id="umail" name="umail" required>
            <p2 class="input_texto"> Email </p2>
          </label>
          <label class="input_label">
            <input class="inputs" type="password" id="upassword" name="upassword" required>
            <p2 class="input_texto"> Contraseña </p2>
          </label>
        </section>
        <button name="adduser-button" id="adduser-button"> ENVIAR </button>
      </form>
    </div>
    <div class="box" id="addadmin-box">
      <h3> AGREGAR ADMINISTRADOR</h3>
      <span id="mensaje"></span>
      <form action="/controllers/Register_Controller.php" method="POST" id="addadmin-form" autocomplete="off">
        <section id="input_grid">
        <label class="input_label">
            <input class="inputs" type="text" id="nombre_admin" name="nombre_admin" maxlength="20" required>
            <p2 class="input_texto"> Nombre </p2>
          </label>
          <label class="input_label">
            <input class="inputs" type="number" id="ucedula" name="ucedula" min="1000000" max="99999999" required>
            <p2 class="input_texto"> Cédula </p2>
          </label>
          <label class="input_label">
            <input class="inputs" type="text" id="udireccion" name="udireccion" required>
            <p2 class="input_texto"> Direccion </p2>
          </label>
          <label class="input_label">
            <input class="inputs" type="text" id="uciudad" name="uciudad" required>
            <p2 class="input_texto"> Ciudad </p2>
          </label>
          <label class="input_label">
            <input class="inputs" type="text" id="umail" name="umail" required>
            <p2 class="input_texto"> Email </p2>
          </label>
          <label class="input_label">
            <input class="inputs" type="password" id="upassword" name="upassword" required>
            <p2 class="input_texto"> Contraseña </p2>
          </label>
        </section>
        <button name="addadmin-button" id="addadmin-button"> ENVIAR </button>
      </form>
    </div>
  </section>
  <script src="../../public/js/admin_function.js"></script>
</body>

</html>