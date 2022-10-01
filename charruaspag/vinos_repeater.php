<?php 
// en este archivo se escriben todas los vinos que tenemos en la base de datos, al llamarse se escriben en los formularios

include 'conexion.php';

$data = $conn->query("SELECT * FROM vinos")->fetchAll(); //consulta pdo

foreach ($data as $row) {
    echo "<span id='option-vino" . $row['Codigo_Vino'] ."' onclick='cargar_forms(" . "id" . ",\"" . $row['Codigo_Vino'] . "\",\"" . $row['Nombre_Vino'] . "\",\"" . $row['Bodega_Vino'] . "\",\"" . $row['Stock'] . "\",\"" . $row['Pais'] . "\",\"" . $row['Region'] . "\",\"" . $row['Cosecha'] . "\",\"" . $row['Ubicacion_IMG'] . "\");'> <section>". $row['Nombre_Vino'] . "</section> <img src=\"" . $row['Ubicacion_IMG'] . "\"></span>";
}