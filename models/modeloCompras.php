<?php

class soporteCompras {
    
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

    public function Compra($fecha, $bodega, $id_empleado) {
    
        $sql = "INSERT INTO COMPRAS (Codigo_Compra, Fecha_Compra, Bodega, Empleado)
        VALUES (?, ?, ?, ?);";
       $this->conn->prepare($sql)->execute([NULL, $fecha, $bodega, $id_empleado]);
    }

    public function DetalleCompra($id_vino, $cant, $costo) {
        usleep(300000);
        $sql = "INSERT INTO DETALLECOMPRA (Cod_Detalle_Com, Cod_Compra, Vinos_DetalleC, Cantidad_DetalleC, Costo_DetalleC)
        SELECT NULL, max(Codigo_Compra), $id_vino, $cant, $costo FROM COMPRAS;";
        $this->conn->prepare($sql)->execute();
    }
}

