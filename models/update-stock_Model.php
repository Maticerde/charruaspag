<?php

// utiliza los datos de un solo producto, esto quiere decir que se ejecutará varias veces
include 'libs/database.php';
include 'config/config.php';

$name     = $_POST['name'];
$stock    = $_POST['stock'];
$cantidad = $_POST['cant'];

$nuevostock = $stock - $cantidad;

$sql = "UPDATE vinos SET Stock=? WHERE Nombre_Vino=?";
$conn->prepare($sql)->execute([$nuevostock, $name]);

echo "UPDATE DATABASE realizado con exito.";