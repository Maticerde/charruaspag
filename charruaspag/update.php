<?php

    // connect to the bookdb database
    include('conexion.php');

    $name = $_POST['name'];
    $stock = $_POST['stock'];
    $cantidad = $_POST['cant'];

    $nuevostock = $stock - $cantidad;

    $sql = "UPDATE vinos SET Stock=? WHERE Nombre_Vino=?";
    $conn->prepare($sql)->execute([$nuevostock, $name]);

    echo "UPDATE DATABASE realizado con exito.";