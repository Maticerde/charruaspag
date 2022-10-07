<?php

//define('URL', 'http://localhost/mvc/');
define('URL', 'http://' . $_SERVER['HTTP_HOST'] . '/charruaspag/');

//CONEXION PDO

    $host = "localhost";
    $port = "3306";
    $username = "root";
    $password = "";
    $db_name = "vinos_charruas";
    

$conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//--FIN CONEXION PDO

?>