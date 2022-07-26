<?php
   class login_model {

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

     public function consulta(){

        
        /*configuracion consulta*/
         $sql = $this->conn->query("SELECT * FROM CLIENTES")->fetchAll();
        
        /*datos POST*/
        $array_dataset = 
        [
            "user" => $_POST["unombre"],
            "pass" => md5($_POST["upass"])
        ];
     
        /*recorro consulta*/
        $log_validate = false;
        foreach ($sql as $row)
        {
            /*escucho coincidencia en usuario y pass*/
            if(strcmp($row['Email_Cliente'], $array_dataset["user"])==0 && strcmp($row['Contrasenia_Cliente'], $array_dataset["pass"])==0){$log_validate = true; 
                $id_cliente             = $row['Codigo_Cliente'];
                $Nom_Cliente            = $row["Nombre_Cliente"]; 
                $getCi_Cliente          = $row["CI_Cliente"];
                $getDireccion_Cliente   = $row["Direccion"];
                $getCiudad_Cliente      = $row["Ciudad"];}
        }

        /*estimo resultado de consulta login*/
        if ($log_validate == true) {
            $consulta_login = "credenciales válidas";
            $_SESSION['nombredeusuario']    = $Nom_Cliente; // guardo en la sesion los datos de la consulta mysql
            $_SESSION['id_cliente']         = $id_cliente;
            $_SESSION["getCI_cliente"]      = $getCi_Cliente;
            $_SESSION["getDir_cliente"]     = $getDireccion_Cliente;
            $_SESSION["getCity_cliente"]    = $getCiudad_Cliente;
            $_SESSION["getMail_cliente"]    = $array_dataset["user"];
            $_SESSION["getPass"]            = $array_dataset["pass"];

            echo $consulta_login;
            //aca se deberia levantar una flag que muestre caracteristicas admin en la pagina principal
            header("Location: /views/login/ingreso.php"); // redirecciono a la pagina intermediaria del login
        
        } else { // en caso de que no haya coincidencia con los datos de la tabla clientes, se buscará en empleados 
            
            // en caso de que no haya coincidencia en los datos no podremos iniciar sesion

            // $consulta_login = "<h3>CREDENCIALES INVÁLIDAS // WORK IN PROGRESS</h3>";
            // echo "$consulta_login";
            // header("Location: /charruaspag/views/login/index.php");

            $sql = $this->conn->query("SELECT * FROM EMPLEADOS")->fetchAll();
            foreach ($sql as $row)
        {
            /*escucho coincidencia en usuario y pass*/
            if(strcmp($row['Email_Empleado'], $array_dataset["user"])==0 && strcmp($row['Contrasenia_Empleado'], $array_dataset["pass"])==0){$log_validate = true;
                $id_empleado            = $row["Codigo_Empleado"];
                $Nom_Empleado           = $row["Nombre_Empleado"];
                $getCI_Empleado         = $row["CI_Empleado"];
                $getDir_Empleado        = $row["Direccion"];
                $getCity_Empleado       = $row["Ciudad"];
            }

            if ($log_validate == true) {
                $consulta_login = "credenciales válidas";
                $_SESSION['setAdmin']               = $Nom_Empleado; // guardo en la sesion los datos de la consulta mysql
                $_SESSION['id_admin']               = $id_empleado;
                $_SESSION["getCI_empleado"]         = $getCI_Empleado;
                $_SESSION["getDir_empleado"]        = $getDir_Empleado;
                $_SESSION["getCity_empleado"]       = $getCity_Empleado;
                $_SESSION["getMail_empleado"]       = $array_dataset["user"];
                $_SESSION["getPass"]                = $array_dataset["pass"];
                echo $consulta_login;
                //aca se deberia levantar una flag que muestre caracteristicas admin en la pagina principal
                header("Location: /charruaspag/views/login/ingresoadmin.php"); // redirecciono a la pagina intermediaria del login
        } else{
            $consulta_login = "<h3>CREDENCIALES INVÁLIDAS // WORK IN PROGRESS</h3>";
            echo "$consulta_login";
            header("Location: /charruaspag/views/login/index.php");
        }
         }
        
      }
    }
   }