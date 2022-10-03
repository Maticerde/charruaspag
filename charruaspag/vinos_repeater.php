<?php 
// en este archivo se escriben todas los vinos que tenemos en la base de datos, al llamarse se escriben en los formularios

include 'conexion.php';

if (isset($_POST["orden"])) {
    $orden = $_POST["orden"];
} else {
    $orden = 'Nombre_Vino';
}

$data = $conn->query("SELECT * FROM vinos ORDER BY $orden")->fetchAll(); //consulta pdo

foreach ($data as $row) {
    echo "<span class='options' id='option-vino" . $row['Codigo_Vino'] ."' onclick='cargar_forms(" . "id" . ",\"" . $row['Codigo_Vino'] . "\",\"" . $row['Nombre_Vino'] . "\",\"" . $row['Precio'] . "\",\"" . $row['Stock'] . "\",\"" . $row['Pais'] . "\",\"" . $row['Region'] . "\",\"" . $row['Cosecha'] . "\",\"" . $row['Bodega_Vino'] . "\",\"" . $row['Ubicacion_IMG'] ."\");'> <section>". $row['Nombre_Vino'] . "</section> <img src=\"" . $row['Ubicacion_IMG'] . "\"></span>";
}