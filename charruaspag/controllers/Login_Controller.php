<?php

require_once('..\models\login_model.php');
/*me aseguro que existan los recursos por POST, con esto solo se procesa si se proviene del form configurado
     para ello*/
     if(!empty($_POST["unombre"]) && !empty( $_POST["upassword"]) && isset($_POST["unombre"]) && isset($_POST["upassword"])){process_login();}else 
     {
         /*redirecciono a login si es que no se provino con DATA SET via POST desde el*/
         header("Location: index.html");
         exit();
     }
     
     
     function process_login()
     {
        $modelo = new login_model();
        $datos = $modelo-> consulta();
 
     };