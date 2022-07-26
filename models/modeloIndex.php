<?php

class soporteIndex {
    
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

    public function getBestSellers() {

        $sql = "SELECT VINOS.*, SUM(DETALLEVENTA.Cantidad_DetalleV) AS Total_de_Ventas FROM DETALLEVENTA
		JOIN VINOS ON DETALLEVENTA.Vinos_DetalleV = VINOS.Codigo_Vino
		GROUP BY VINOS.Codigo_Vino
		ORDER BY Total_de_Ventas
		DESC LIMIT 3;";
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
