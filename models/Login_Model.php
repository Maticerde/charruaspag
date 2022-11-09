<?php

class Login_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

 public function ingresar($unombre, $upassword)
    {

        $tieneAcceso = false;
        try {
            $query = $this->db->connect()->prepare('SELECT * FROM clientes WHERE nombre=:nombre');
            $query->bindValue(':nombre', $unombre);
            //$query->execute(['nombre' => $nombre]);
            $query->execute();
            $paswordStr = "";
            while ($row = $query->fetch()) {
                $paswordStr = $row['password'];
            }
            if ($paswordStr == $upassword) {
                $tieneAcceso = true;
            }
        } catch (PDOException $e) {
            var_dump($e);
        }
        return $tieneAcceso;

    }

}