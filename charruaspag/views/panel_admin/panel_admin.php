<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="../../src/charruas logo.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, minimum-scale=1">
    <link href="../../public/css/style-admin.css" rel="stylesheet" type="text/css"/>
    <script src="../../public/js/admin_bodega_info_load.js"></script>

    <title>Panel Admin</title>
</head>
<body>
   <img id=fondo src="../../src/foto3.jpg">
   <div id="menu">
      <section id="texto1">A d m i n i s t r a c i ó n</section>
      <a href="http://localhost/charruaspag/index.php">
         <section id="charruas-texto"> Charrúas </section>
      </a>
   </div>
   <section id="text-prod" onclick="slide(1)"><span>&#10132;</span> P R O D U C T O S</section>
   <section id="text-user" onclick="slide(0)"><span>&#10132;</span> U S U A R I O S</section>
   <div id="vinos-list-label">
   <section id="info-vino">vino xd</section>
   <section id="info-bodega">

   </section>
      <h1>LISTA DE PRODUCTOS:</h1>
      <section id="vinos-list">
      <script src="../../public/js/admin_vinos_list_function.js"></script>
      <script src="../../public/js/admin_vinos_delete.js"></script>
      </section>
      <form id="vinos-order" method="POST">
         <script src="../../public/js/admin_vinos_orden.js"></script>
         <input type="radio" name="orden" onclick="load_vinos(); load_orden('orden1')" value="Nombre_Vino" checked><p1 class="ord" id="orden1">A &#10132; Z</p1></input>
         <input type="radio" name="orden" onclick="load_vinos(); load_orden('orden2')" value="Codigo_Vino DESC"><p1 class="ord" id="orden2">Recientes</p1></input>
         <input type="radio" name="orden" onclick="load_vinos(); load_orden('orden3')" value="Codigo_Vino ASC"><p1 class="ord" id="orden3">Antiguos</p1></input>
      </form>
   </div>
   <section id="grid-functions">
      <div class="box" id="addvino-box">
         <img id="vaciar" onclick="" src="../../src/trashicon.png"></img>
         <h3>AGREGAR PRODUCTO</h3>
         <span id="message"></span>
         <form action="../../controllers/admin_AddVino_Controller.php" method="POST" id="addvino-form">
            <section id="input_grid">
               <label class="input_label">
                  <input class="inputs" type="text" id="in_nombre_vino" name="in_nombre_vino" required>
                  <p2 class="input_texto"> Nombre </p2>
               </label>
               <label class="input_label">
                  <input class="inputs" type="number" id="in_precio" name="in_precio" required>
                  <p2 class="input_texto"> Precio </p2>
               </label>
               <label class="input_label">
                  <input class="inputs" type="number" id="in_stock" name="in_stock" required>
                  <p2 class="input_texto"> Stock </p2>
               </label>
               <label class="input_label">
                  <input class="inputs" type="text" id="in_pais" name="in_pais" required>
                  <p2 class="input_texto"> País </p2>
               </label>
               <label class="input_label">
                  <input class="inputs" type="text" id="in_region" name="in_region" required>
                  <p2 class="input_texto"> Región </p2>
               </label>
               <label class="input_label">
                  <input class="inputs" type="number" id="in_cosecha" name="in_cosecha" required>
                  <p2 class="input_texto"> Cosecha </p2>
               </label>
               <label class="input_label">
                  <input type="text" list="in_bodega_vino" class="inputs" name="in_bodega_vino" required>
                  <p2 class="input_texto"> ID Bodega </p2>
                  <datalist id="in_bodega_vino">
                     <script src="../../public/js/admin_bodegas_form_load.js"></script>
                  </datalist>
               </label>
               <label id="imagen_label" class="input_label">
                  <input class="inputs" type="file" id="in_imagen" name="in_imagen" required>
                  <p2 id="nombre_imagen"> Imagen </p2>
                  <img id="preview" src="">
               </label>
            </section>
            <button name="addvino-button" id="addvino-button"> ENVIAR </button>
         </form>
      </div>
      <div class="box" id="modvino-box">
         <img id="vaciar" onclick="" src="../../src/trashicon.png"></img>
         <h3>AGREGAR BODEGA</h3>
         <span id="message"></span>
         <form action="../../controllers/admin_ModVino_Controller.php" method="post" id="modvino-form">
            <section id="input_grid">
               <label class="input_label">
                  <input class="inputs_mod" type="text" id="in_nombre_vino" name="in_nombre_vino" required>
                  <p2 class="input_texto"> Nombre </p2>
               </label>
               <label class="input_label">
                  <input class="inputs_mod" type="number" id="in_precio" name="in_precio" required>
                  <p2 class="input_texto"> Email </p2>
               </label>
               <label class="input_label">
                  <input class="inputs_mod" type="number" id="in_stock" name="in_stock" required>
                  <p2 class="input_texto"> Dirección </p2>
               </label>
               <label class="input_label">
                  <input class="inputs_mod" type="text" id="in_pais" name="in_pais" required>
                  <p2 class="input_texto"> País </p2>
               </label>
               <label class="input_label">
                  <input class="inputs_mod" type="text" id="in_region" name="in_region" required>
                  <p2 class="input_texto"> Departamento/Provincia </p2>
               </label>
               <label class="input_label">
                  <input class="inputs_mod" type="number" id="in_cosecha" name="in_cosecha" required>
                  <p2 class="input_texto"> Ciudad </p2>
               </label>
               <label class="input_label">
                  <input class="inputs_mod" type="number" id="in_cosecha" name="in_cosecha" required>
                  <p2 class="input_texto"> Teléfono </p2>
               </label>
               <label class="input_label">
                  <input class="inputs_mod" type="text" id="in_cosecha" name="in_cosecha" required>
                  <p2 class="input_texto"> Cuenta </p2>
               </label>
            </section>
            <button name="modvino-button" id="modvino-button"> ENVIAR </button>
         </form>
      </div>
      <div class="box" id="user-box">
      <h3> AGREGAR USUARIO </h3>
      </div>
      
         <div class="box" id="tbd-box">
         <h3>MODIFICAR USUARIO</h3>
         </div>
   </section>
   <script src="../../public/js/admin_function.js"></script>
</body>
</html>