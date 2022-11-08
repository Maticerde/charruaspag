<?php

require_once 'entidades/market.php';

class Articulos_Model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getVinos($keywords)
    {

        $sql = "SELECT * FROM vinos WHERE Nombre_Vino LIKE '%" . $keywords . "%'";
        foreach ($this->conn->query($sql) as $row) {
            $this->respuesta[] = $row;
        }
        return $this->respuesta;
    }

    public function setStock($nombre, $stock, $cantidad)
    {

        $nuevostock = $stock - $cantidad;

        $sql = "UPDATE vinos SET Stock=? WHERE Nombre_Vino=?";
        $this->conn->prepare($sql)->execute([$nuevostock, $nombre]);

    }
}