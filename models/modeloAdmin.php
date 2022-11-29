<?php

class soporteAdmin {

private $respuesta;
private $conn;

public function __construct() {
    
    $host = "localhost:3307";
    $username = "root";
    $password = "";
    $db_name = "Vinos_Charruas";
    
    $this->respuesta = array();
    $this->conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

public function getBodegas() {
    $sql = "SELECT * FROM BODEGA";
    foreach ($this->conn->query($sql) as $row) {
        $this->respuesta[] = $row;
    }
    return $this->respuesta;
}

public function getVinosyBodegaEnOrden($orden) {

    $sql = "SELECT VINOS.*, BODEGA.* FROM VINOS JOIN BODEGA ON VINOS.Bodega_Vino = BODEGA.ID_Bodega ORDER BY $orden";
    foreach ($this->conn->query($sql) as $row) {
        $this->respuesta[] = $row;
    }
    return $this->respuesta;
}

public function getVinosOfBodega($bodega) {

    $sql = "SELECT VINOS.* FROM VINOS JOIN BODEGA ON VINOS.Bodega_Vino = BODEGA.ID_Bodega WHERE VINOS.Bodega_Vino = $bodega";
    foreach ($this->conn->query($sql) as $row) {
        $this->respuesta[] = $row;
    }
    return $this->respuesta;
}

public function setVino($nombre_vino, $precio, $bodega_vino, $descripcion, $pais, $region, $cosecha, $ubicacion_img) {
    
    $sql = "INSERT INTO VINOS (Codigo_Vino, Nombre_Vino, Precio, Bodega_Vino, Stock, Pais_Vinos, Region, Cosecha, Descripcion, Ubicacion_IMG)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
   $this->conn->prepare($sql)->execute([NULL, $nombre_vino, $precio, $bodega_vino, 0, $pais, $region, $cosecha, $descripcion, $ubicacion_img]);
}

public function updateVino($nombre_vino, $precio, $bodega_vino, $descripcion, $pais, $region, $cosecha, $ubicacion_img, $codigo_vino) {
    $sql = "UPDATE VINOS SET Nombre_Vino=?, Precio=?, Bodega_Vino=?, Descripcion=?, Pais_Vinos=?, Region=?, Cosecha=?, Ubicacion_IMG=? WHERE Codigo_Vino=?;";
    $this->conn->prepare($sql)->execute([$nombre_vino, $precio, $bodega_vino, $descripcion, $pais, $region, $cosecha, $ubicacion_img, $codigo_vino]);
}

public function setBodega($nombre_bodega, $email, $direccion, $pais, $codpostal, $ciudad, $telefono, $cuenta) {
    
    $sql = "INSERT INTO BODEGA (ID_Bodega, Nombre_Bodega, Email_Bodega, Direccion, Pais_Bodega, Ciudad, Cuenta, Codigo_Postal, Telefono_Bodega)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";
   $this->conn->prepare($sql)->execute([NULL, $nombre_bodega, $email, $direccion, $pais, $ciudad, $cuenta, $codpostal, $telefono]);
}

public function updateBodega($codigo_bodega, $nombre_bodega, $email, $direccion, $pais, $codpostal, $ciudad, $telefono, $cuenta) {
    $sql = "UPDATE BODEGA SET Nombre_Bodega=?, Email_Bodega=?, Direccion=?, Pais_Bodega=?, Ciudad=?, Cuenta=?, Codigo_Postal=?, Telefono_Bodega=? WHERE ID_Bodega=?;";
    $this->conn->prepare($sql)->execute([$nombre_bodega, $email, $direccion, $pais, $ciudad, $cuenta, $codpostal, $codigo_bodega, $telefono]);
}

}