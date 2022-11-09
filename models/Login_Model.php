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
            $query = $this->db->connect()->prepare("SELECT * FROM clientes WHERE Email_Cliente = '".$unombre."' AND Contrasenia = '".$upassword."' ");
            $query->bindValue('Email_Cliente', $unombre);
            //$query->execute(['nombre' => $nombre]);
            $query->execute();
            $paswordStr = "";
            while ($row = $query->fetch()) {
                $paswordStr = $row['contrasenia'];
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