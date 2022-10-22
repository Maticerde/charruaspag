<?php

class soporteIndex {
    
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

    public function getVinos($keywords) {

        $sql = "SELECT * FROM vinos WHERE Nombre_Vino LIKE '%" . $keywords . "%'";
        foreach ($this->conn->query($sql) as $row) {
            $this->respuesta[] = $row;
        }
        return $this->respuesta;
    }

    public function setStock($nombre, $stock, $cantidad) {

        $nuevostock = $stock - $cantidad;
        
        $sql = "UPDATE vinos SET Stock=? WHERE Nombre_Vino=?";
        $this->conn->prepare($sql)->execute([$nuevostock, $nombre]);

    }
}
