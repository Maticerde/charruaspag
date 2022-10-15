<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="../../src/charruas logo.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, minimum-scale=1">
    <link href="../../public/css/style-admin.css" rel="stylesheet" type="text/css"/>

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
   <section id="grid-functions">
      <div class="box" id="addvino-box">
         <section id="divisor">
         <img id="vaciar" onclick="" src="../../src/trashicon.png"></img>
         <form id="vinos-order" method="POST">
            <input type="radio" name="orden" onclick="loadpadmin_vinos()" value="Nombre_Vino" checked>A &#10132; Z</input>
            <input type="radio" name="orden" onclick="loadpadmin_vinos()" value="Codigo_Vino DESC">Recientes</input>
            <input type="radio" name="orden" onclick="loadpadmin_vinos()" value="Codigo_Vino ASC">Antiguos</input>
         </form>
         <h3 onclick="box_open('addvino-box')">AGREGAR PRODUCTO</h3>
         <span id="message"></span>
         <form action="../../controllers/admin_AddVino_Controller.php" method="post" id="addvino-form">
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
                  <select class="inputs" id="in_bodega_vino" name="in_bodega_vino" required>
                     <script src="../../public/js/admin_bodegas_load.js"></script>
                  </select>
                  <p2 class="input_texto"> Bodega </p2>
               </label>
               <label id="imagen_label" class="input_label">
                  <input class="inputs" type="file" id="in_imagen" name="in_imagen" required>
                  <p2 id="nombre_imagen"> Imagen </p2>
                  <img id="preview" src="">
               </label>
            </section>
            <button name="addvino-button" id="addvino-button"> ENVIAR </button>
         </form>
         </section>  
         <section id="vinos-list">
         <script src="../../public/js/admin_vinos_load.js"></script>
         </section>
      </div>
      <div class="box" id="modvino-box">
         <h3>MODIFICAR PRODUCTO</h3>
         
         
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