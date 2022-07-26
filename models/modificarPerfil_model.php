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
        $sql = "SELECT * FROM CLIENTES";
        foreach ($this->conn->query($sql) as $row) {
            $this->respuesta[] = $row;
        }
        return $this->respuesta;
    }

    public function updateUser($CI_Cliente, $Nombre_Cliente, $Direccion, $Ciudad, $Email_Cliente, $Contrasenia_Cliente) {
    
        $sql = "UPDATE CLIENTES SET Nombre_cliente=?, Direccion=?, Ciudad=?, Email_Cliente=?, Contrasenia_Cliente=? WHERE CI_Cliente=? AND Contrasenia_Cliente=?";
       $this->conn->prepare($sql)->execute([$Nombre_Cliente, $Direccion, $Ciudad, $Email_Cliente, $Contrasenia_Cliente, $CI_Cliente, $Contrasenia_Cliente]);
    }
    
    public function updateAdmin($CI_Empleado, $Nombre_Empleado, $Direccion, $Ciudad, $Email_Empleado, $Contrasenia_Empleado) {
    
        $sql = "UPDATE EMPLEADOS SET Nombre_Empleado=?, Direccion=?, Ciudad=?, Email_Empleado=?, Contrasenia_Empleado=? WHERE CI_Empleado=? AND Contrasenia_Empleado=?";
       $this->conn->prepare($sql)->execute([$Nombre_Empleado, $Direccion, $Ciudad, $Email_Empleado, $Contrasenia_Empleado, $CI_Empleado, $Contrasenia_Empleado]);
    }

}