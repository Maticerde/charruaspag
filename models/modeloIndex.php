<?php

class soporteIndex {
    
    private $respuesta;
    private $conn;

    public function __construct() {
        
        $host = "localhost:3306";
        $username = "root";
        $password = "123456";
        $db_name = "Vinos_Charruas";
        
        $this->respuesta = array();
        $this->conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function getBestSellers() {

        $sql = "CALL tres_productos_mas_vendidos";
        foreach ($this->conn->query($sql) as $row) {
            $this->respuesta[] = $row;
        }
        return $this->respuesta;
    }

    public function getVinos($keywords) {

        $sql = "SELECT * FROM VINOS WHERE Nombre_Vino LIKE '%" . $keywords . "%' ORDER BY Stock";
        foreach ($this->conn->query($sql) as $row) {
            $this->respuesta[] = $row;
        }
        return $this->respuesta;
    }

    public function setStock($nombre, $stock, $cantidad) {

        $nuevostock = $stock - $cantidad;
        
        $sql = "UPDATE VINOS SET Stock=? WHERE Nombre_Vino=?";
        $this->conn->prepare($sql)->execute([$nuevostock, $nombre]);

    }
}
