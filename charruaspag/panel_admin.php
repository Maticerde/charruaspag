<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="src\charruas logo.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style-admin.css" rel="stylesheet" type="text/css">
    <title>Panel Admin</title>
</head>
<body>
<img id=fondo src="src/sun-setting-vineyard-mountains.jpg">
    <div id="menu">
    <section id="texto1">A d m i n i s t r a c i ó n</section>
        <a href="http://localhost/charruaspag/index.php">
            <section id="charruas-texto"> Charrúas </section>
        </a>
    </div>
    <section id="grid-functions">
        <div id="addvino-box">
            <h3>AGREGAR PRODUCTO</h3>
            <form id="addvino-form">
                <section id="input_grid">
            <label class="input_label">
                <input type="text" id="in_nombre_vino" required>
                <p2 class="input_texto"> Nombre del Vino </p2>
            </label>
            <label class="input_label">
                <input type="number" id="in_precio" required>
                <p2 class="input_texto"> Precio </p2>
            </label>
                <label class="input_label">
                <input type="number" id="in_stock" required>
                <p2 class="input_texto"> Stock </p2>
            </label>
            <label class="input_label">
                <input type="text" id="in_pais" required>
                <p2 class="input_texto"> País </p2>
            </label>
            <label class="input_label">
                <input type="text" id="in_region" required>
                <p2 class="input_texto"> Región </p2>
            </label>
            <label class="input_label">
                <input type="number" id="in_cosecha" required>
                <p2 class="input_texto"> Cosecha </p2>
            </label>
            <label class="input_label">
                <select name="bodega" id="in_bodega_vino" required>
                <option value="" disabled selected></option>
                <?php include 'bodegas.php' ?>
                </select>
                <p2 class="input_texto"> Bodega </p2>
            </label>
            <label id="imagen_label" class="input_label">
                <input type="file" id="in_imagen" required>
                <p2 id="imagen_texto"> Imagen </p2>
                <img id="preview" src="">
            </label></section>
    </form>
</div>
        <div id="modvino-box"> <h3>MODIFICAR PRODUCTO</h3></div>
        <!-- <div id="user-box"></div>
        <div id="tbd-box"></div> -->
    </section>
</body>
</html>

<script>

const output = document.querySelector("#imagen_texto");
const input = document.querySelector("#in_imagen");

input.addEventListener('change', (event) => {
    if (input.files.length > 0 ) {
        output.innerHTML = input.files[0].name;
    }else {
        output.innerHTML = "Imagen";
    }
})
</script>