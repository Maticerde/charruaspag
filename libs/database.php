<?php

 // class Database
//{

    // private $host;
    // private $port;
    // private $db;
    // private $user;
    // private $password;
    // private $charset;

    // public function __construct()
    // {
    //     $this->host = constant('HOST');
    //     $this->port = constant('PORT');
    //     $this->db = constant('DB');
    //     $this->user = constant('USER');
    //     $this->password = constant('PASSWORD');
    //     $this->charset = constant('CHARSET');
    // }

    // public function connect()
    // {

    //     try {

    //         $conn = "mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->db . ";charset=" . $this->charset;
    //         $options = [
    //             PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    //             PDO::ATTR_EMULATE_PREPARES => false,
    //         ];
    //         $pdo = new PDO($connection, $this->user, $this->password, $options);

    //         return $pdo;

    //     } catch (PDOException $e) {
    //         print_r('Error connection: ' . $e->getMessage());
    //     }
    // }
        
    //CONEXION PDO

    $host = "localhost";
    $port = "3306";
    $username = "root";
    $password = "";
    $db_name = "vinos_charruas";
    

$conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//--FIN CONEXION PDO

//}
?>