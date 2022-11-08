<?php

class soporteAdmin {

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

public function getBodegas() {
    $sql = "SELECT * FROM bodega";
    foreach ($this->conn->query($sql) as $row) {
        $this->respuesta[] = $row;
    }
    return $this->respuesta;
}

public function getVinosEnOrden($orden) {

    $sql = "SELECT * FROM vinos ORDER BY $orden";
    foreach ($this->conn->query($sql) as $row) {
        $this->respuesta[] = $row;
    }
    return $this->respuesta;
}

public function setVino($nombre_vino, $precio, $bodega_vino, $stock, $pais, $region, $cosecha, $ubicacion_img) {
    
    $sql = "INSERT INTO vinos (Codigo_Vino, Nombre_Vino, Precio, Bodega_Vino, Stock, Pais, Region, Cosecha, Descripcion, Ubicacion_IMG)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
   $this->conn->prepare($sql)->execute([NULL, $nombre_vino, $precio, $bodega_vino, $stock, $pais, $region, $cosecha, NULL, $ubicacion_img]);
}

public function setBodega($nombre_bodega, $email, $direccion, $pais, $codpostal, $ciudad, $telefono, $cuenta) {
    
    $sql = "INSERT INTO bodega (ID_Bodega, Nombre_Bodega, Email_Bodega, Direccion, Pais, Ciudad, Cuenta, Codigo_Postal)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
   $this->conn->prepare($sql)->execute([NULL, $nombre_bodega, $email, $direccion, $pais, $ciudad, $cuenta, $codpostal]);

      // FALTA INSERT EN TEL_BODEGA
   //$sql = "INSERT INTO tel_bodega (Cod_Bodega, Telefono_Bodega)
   //VALUES (?, ?);";
   //$this->conn->prepare($sql)->execute([]);
}

public function updateVino($nombre_vino, $precio, $bodega_vino, $stock, $pais, $region, $cosecha, $ubicacion_img, $codigo_vino) {
    $sql = "UPDATE vinos SET Nombre_Vino=?, Precio=?, Bodega_Vino=?, Stock=?, Pais=?, Region=?, Cosecha=?, Ubicacion_IMG=? WHERE Codigo_Vino=?;";
    $this->conn->prepare($sql)->execute([$nombre_vino, $precio, $bodega_vino, $stock, $pais, $region, $cosecha, $ubicacion_img, $codigo_vino]);
}
}