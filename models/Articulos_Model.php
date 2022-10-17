<?php

class Articulos_Models extends Model
{
    public function getVinos($keywords)
    {

        $sql = "SELECT * FROM vinos WHERE Nombre_Vino LIKE '%" . $keywords . "%'";
        foreach ($this->conn->query($sql) as $row) {
            $this->respuesta[] = $row;
        }
        return $this->respuesta;
    }
}