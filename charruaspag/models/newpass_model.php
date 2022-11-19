<?php
class NewPass {

    public function __construct() {
        
        $host = "localhost:3306";
        $username = "root";
        $password = "";
        $db_name = "vinos_charruas";
        
        $this->respuesta = array();
        $this->conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function updatePassword($PEmail_Cliente, $PContrasenia_Cliente) {
        $sql = "UPDATE clientes SET CI_Cliente=?, Nombre_Cliente=?, Direccion=?, Ciudad=?, Email_Cliente=?, Contrasenia=? WHERE Email_Cliente=?;";
    $this->conn->prepare($sql)->execute([$PEmail_Cliente, $PContrasenia_Cliente]);
    }
}