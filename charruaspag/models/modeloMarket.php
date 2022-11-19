<?php

class soporteMarket {
    
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

    public function getVinosMarket($keywords, $orden) {

        $sql = "SELECT * FROM VINOS WHERE Nombre_Vino LIKE '%" . $keywords . "%' ORDER BY $orden";
        foreach ($this->conn->query($sql) as $row) {
            $this->respuesta[] = $row;
        }
        return $this->respuesta;
    }

    public function getPaisesName() {
        $sql = "SELECT Pais_Vinos, COUNT(Codigo_Vino) AS TOTALVINOS FROM VINOS GROUP BY Pais_Vinos";
        foreach ($this->conn->query($sql) as $row) {
            $this->respuesta[] = $row;
        }
        return $this->respuesta;
    }

    public function getBodegasName() {
        $sql = "SELECT Nombre_Bodega, Bodega_Vino, COUNT(Nombre_Vino) AS TOTALVINOS FROM BODEGA JOIN VINOS on ID_Bodega = Bodega_Vino GROUP BY Nombre_Bodega;";
        foreach ($this->conn->query($sql) as $row) {
            $this->respuesta[] = $row;
        }
        return $this->respuesta;
    }

    public function getRegionesName() {
        $sql = "SELECT Region, COUNT(Codigo_Vino) AS TOTALVINOS FROM VINOS GROUP BY Region";
        foreach ($this->conn->query($sql) as $row) {
            $this->respuesta[] = $row;
        }
        return $this->respuesta;
    }
    
}
