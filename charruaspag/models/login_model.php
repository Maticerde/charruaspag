<?php
   class login_model {

    private $respuesta;
    private $conn;
    
    public function __construct() {
        
        $host = "localhost:3306";
        $username = "root";
        $password = "";
        $db_name = "vinos_charruas";
        
        $this->respuesta = array();
        $this->conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

     public function consulta(){

           /*configuracion consulta*/
         $sql = $this->conn->query("SELECT * FROM clientes")->fetchAll();
        
        /*datos POST*/
        $array_dataset = 
        [
            "user" => $_POST["unombre"],
            "pass" => $_POST["upassword"],
        ];
     
        /*recorro consulta*/
        $log_validate = false;
        foreach ($sql as $row)
        {
            /*escucho coincidencia en usuario y pass*/
            if(strcmp($row['Email_Cliente'], $array_dataset["user"])==0 && strcmp($row['Contrasenia'], $array_dataset["pass"])==0){$log_validate = true;}
        }

        /*estimo resultado de consulta login*/
        if ($log_validate == true) {
            $consulta_login = "credenciales válidas";
            echo $consulta_login;
            //aca se deberia levantar una flag que muestre caracteristicas admin en la pagina principal
            header("Location:\resktsoftware\charruaspag\index.php");
         } else {
            $consulta_login = "<h3>CREDENCIALES INVÁLIDAS // WORK IN PROGRESS</h3>";
            echo "$consulta_login";
            //header("Location: /login/index.html");
         }
      }

   }