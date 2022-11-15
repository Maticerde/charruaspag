<?php
   class register_model {

    private $respuesta;
    private $conn;
    
    public function __construct() {
        
        $host = "localhost:3306";
        $username = "root";
        $password = "";
        $db_name = "vinos_charruas";
        
        $this->respuesta = array();
        $this->conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function setUser($CI_Cliente, $Nombre_Cliente, $Direccion, $Ciudad, $Email_Cliente, $Contrasenia) {
    
        $sql = "INSERT INTO CLIENTES (Codigo_Cliente, CI_Cliente, Nombre_Cliente, Direccion, Ciudad, Email_Cliente, Contrasenia)
        VALUES (?, ?, ?, ?, ?, ?, ?);";
       $this->conn->prepare($sql)->execute([NULL, $CI_Cliente, $Nombre_Cliente, $Direccion, $Ciudad, $Email_Cliente, $Contrasenia]);
    }
}