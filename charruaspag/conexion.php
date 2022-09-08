<?php
//CONEXION PDO

    $host = "localhost:3307";
    $username = "root";
    $password = "";
    $db_name = "vinos_charruas";
    

$conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//--FIN CONEXION PDO

?>