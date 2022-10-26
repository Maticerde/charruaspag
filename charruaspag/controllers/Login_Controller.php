<?php


function process_login()
{
    require_once ("/../../models/modeloIndex.php");
    
    $array_dataset = 
         [
             "user" => $_POST["unombre"],
             "pass" => $_POST["upassword"],
         ];
         
         /*configuracion consulta*/
  $data = $conn->query("SELECT * FROM clientes")->fetchAll();

  /*recorro consulta*/
  $log_validate = false;
         foreach ($data as $row)
         {
             /*escucho coincidencia en usuario y pass*/
             if(strcmp($row['Email_Cliente'], $array_dataset["user"])==0 && strcmp($row['Contrasenia'], $array_dataset["pass"])==0){$log_validate = true;}
         }

         /*estimo resultado de consulta login*/
         if ($log_validate == true) {
            $consulta_login = "credenciales válidas";
            echo $consulta_login;
            //aca se deberia levantar una flag que muestre caracteristicas admin en la pagina principal
            header("Location: \charruaspag\index.php");
         } else {
            $consulta_login = "<h3>CREDENCIALES INVÁLIDAS // WORK IN PROGRESS</h3>";
            echo "$consulta_login";
            //header("Location: /login/index.html");
         }
}