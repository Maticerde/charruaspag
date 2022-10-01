<?php
/*me aseguro que existan los recursos por POST, con esto solo se procesa si se proviene del form configurado
 para ello*/
if(!empty($_POST["in_nombre_vino"])){update_vinos();}else 
{
    /*redirecciono a login si es que no se provino con DATA SET via POST desde el*/
    header("Location: http://localhost/charruaspag/panel_admin.php ");
    exit();
}

function update_vinos() {
    include('conexion.php');

    $nombre_vino = $_POST['in_nombre_vino'];
    $precio = $_POST['in_precio'];
    $bodega_vino = $_POST['in_bodega_vino'];
    $stock = $_POST['in_stock'];
    $pais = $_POST['in_pais'];
    $region = $_POST['in_region'];
    $cosecha = $_POST['in_cosecha'];
    $ubicacion_img = "src/vinos/" . $_POST['in_imagen'];

    $sql = "INSERT INTO vinos (Codigo_Vino, Nombre_Vino, Precio, Bodega_Vino, Stock, Crianza, Pais, Region, Cosecha, Descripcion, Ubicacion_IMG)
     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
    $conn->prepare($sql)->execute([NULL, $nombre_vino, $precio, $bodega_vino, $stock, NULL, $pais, $region, $cosecha, NULL, $ubicacion_img]);

    echo "UPDATE DATABASE realizado con exito.";
    echo $ubicacion_img;
    header("Location: http://localhost/charruaspag/panel_admin.php ");
}
