<?php

session_start();  // crea una sesion o reanuda la actual basada en un identificador de sesion mediante 
                  //la peticion POST
if(isset($_SESSION['nombredeusuario'])){
   header('location: /index.php');
}  elseif(isset($_SESSION["setAdmin"])) {
   header('location: /index.php');
}
require('../models/Login_Model.php');
/*me aseguro que existan los recursos por POST, con esto solo se procesa si se proviene del form configurado
     para ello*/
     if(!empty($_POST["unombre"]) && !empty( $_POST["upass"]) && isset($_POST["unombre"]) && isset($_POST["upass"])){process_login();}else 
     {
        /*redirecciono a login si es que no se provino con DATA SET via POST desde el*/
         header('location: /views/login/index.php');
         exit();
     }
     
     
     function process_login()
     {
        
        $modelo = new login_model();
        $datos = $modelo-> consulta();
        
     }
     
     header('Location: /views/login/index.php');