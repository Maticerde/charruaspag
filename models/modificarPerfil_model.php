<?php
   class modificarPerfil_model {

    private $respuesta;
    private $conn;
    
    public function __construct() {
        
        $host = "localhost:3307";
        $username = "root";
        $password = "";
        $db_name = "vinos_charruas";
        
        $this->respuesta = array();
        $this->conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getCliente() {
        $sql = "SELECT * FROM clientes";
        foreach ($this->conn->query($sql) as $row) {
            $this->respuesta[] = $row;
        }
        return $this->respuesta;
    }

    public function updateUser($CI_Cliente, $Nombre_Cliente, $Direccion, $Ciudad, $Email_Cliente, $Contrasenia_Cliente) {
    
        $sql = "UPDATE CLIENTES SET Nombre_cliente=?, Direccion=?, Ciudad=?, Email_Cliente=?, Contrasenia_Cliente=? WHERE CI_Cliente=?";
       $this->conn->prepare($sql)->execute([$Nombre_Cliente, $Direccion, $Ciudad, $Email_Cliente, $Contrasenia_Cliente, $CI_Cliente]);
    }

}