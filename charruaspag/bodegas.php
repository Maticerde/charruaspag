<?php 
// en este archivo se escriben todas las bodegas que tenemos en la base de datos, al llamarse se escriben en los formularios

include 'conexion.php';

$data = $conn->query("SELECT * FROM bodega")->fetchAll(); //consulta pdo

foreach ($data as $row) {
    echo "<option value=" . $row['ID_Bodega']. ">" . $row['Nombre_Bodega'] . "</option>";
}