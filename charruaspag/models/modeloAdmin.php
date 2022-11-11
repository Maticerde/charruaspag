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
    $sql = "SELECT * FROM BODEGA";
    foreach ($this->conn->query($sql) as $row) {
        $this->respuesta[] = $row;
    }
    return $this->respuesta;
}

public function getVinosEnOrden($orden) {

    $sql = "SELECT * FROM VINOS ORDER BY $orden";
    foreach ($this->conn->query($sql) as $row) {
        $this->respuesta[] = $row;
    }
    return $this->respuesta;
}

public function setVino($nombre_vino, $precio, $bodega_vino, $stock, $pais, $region, $cosecha, $ubicacion_img) {
    
    $sql = "INSERT INTO VINOS (Codigo_Vino, Nombre_Vino, Precio, Bodega_Vino, Stock, Pais, Region, Cosecha, Descripcion, Ubicacion_IMG)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
   $this->conn->prepare($sql)->execute([NULL, $nombre_vino, $precio, $bodega_vino, $stock, $pais, $region, $cosecha, NULL, $ubicacion_img]);
}

public function setBodega($nombre_bodega, $email, $direccion, $pais, $codpostal, $ciudad, $telefono, $cuenta) {
    
    $sql = "INSERT INTO BODEGA (ID_Bodega, Nombre_Bodega, Email_Bodega, Direccion, Pais, Ciudad, Cuenta, Codigo_Postal)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
   $this->conn->prepare($sql)->execute([NULL, $nombre_bodega, $email, $direccion, $pais, $ciudad, $cuenta, $codpostal]);

      // FALTA INSERT EN TEL_BODEGA
   //$sql = "INSERT INTO tel_bodega (Cod_Bodega, Telefono_Bodega)
   //VALUES (?, ?);";
   //$this->conn->prepare($sql)->execute([]);
}

public function updateVino($nombre_vino, $precio, $bodega_vino, $stock, $pais, $region, $cosecha, $ubicacion_img, $codigo_vino) {
    $sql = "UPDATE VINOS SET Nombre_Vino=?, Precio=?, Bodega_Vino=?, Stock=?, Pais=?, Region=?, Cosecha=?, Ubicacion_IMG=? WHERE Codigo_Vino=?;";
    $this->conn->prepare($sql)->execute([$nombre_vino, $precio, $bodega_vino, $stock, $pais, $region, $cosecha, $ubicacion_img, $codigo_vino]);
}

public function updateBodega($codigo_bodega, $nombre_bodega, $email, $direccion, $pais, $codpostal, $ciudad, $cuenta) {
    $sql = "UPDATE BODEGA SET Nombre_Bodega=?, Email_Bodega=?, Direccion=?, Pais=?, Ciudad=?, Cuenta=?, Codigo_Postal=? WHERE ID_Bodega=?;";
    $this->conn->prepare($sql)->execute([$nombre_bodega, $email, $direccion, $pais, $ciudad, $cuenta, $codpostal, $codigo_bodega]);
}

}