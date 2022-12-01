<?php

class soporteVentas {
    
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

    public function Venta($fecha, $id_cliente) {
    
        $sql = "INSERT INTO VENTAS (Codigo_Venta, Fecha_Venta, cliente)
        VALUES (?, ?, ?);";
       $this->conn->prepare($sql)->execute([NULL, $fecha, $id_cliente]);
    }

    public function DetalleVenta($id_vino, $cant, $costo) {
        usleep(300000);
        $sql = "INSERT INTO DETALLEVENTA (Cod_Detalle_Ven, Cod_Venta, Vinos_DetalleV, Cantidad_DetalleV, Costo_DetalleV)
        SELECT NULL, count(Codigo_Venta), $id_vino, $cant, $costo FROM VENTAS;";
        $this->conn->prepare($sql)->execute();
    }
}

