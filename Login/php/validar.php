<?php
// $usuario = $_POST['unombre'];
// $pass = $_POST['upassword'];
// if(empty($usuario) || empty($pass)){
// header("Location: index.html");
// exit();
// }

// require 'connect.php';
// // mysql_connect('localhost','root','db_login') or die("Error al conectar " . mysql_error());
// // mysql_select_db('db_login') or die ("Error al seleccionar la Base de datos: " . mysql_error());
// $data = $conn->query("SELECT * FROM usuarios")->fetchAll(); //consula pdo
// $result = mysql_query("SELECT * from usuarios where Username='" . $usuario . "'");
// if($row = mysql_fetch_array($result)){
// if($row['Password'] == $pass){
// session_start();
// $_SESSION['usuario'] = $usuario;
// header("Location: php/contenido.php");
// }else{
// header("Location: index.html");
// exit();
// }
// }else{
// header("Location: index.html");
// exit();
// }

 /*me aseguro que existan los recursos por POST, con esto solo se procesa si se proviene del form configurado
     para ello*/
     if(!empty($_POST["unombre"]) && !empty( $_POST["upassword"]) && isset($_POST["unombre"]) && isset($_POST["upassword"])){process_login();}else 
     {
         /*redirecciono a login si es que no se provino con DATA SET via POST desde el*/
         header("Location: http://localhost/PHP%20devs/PDO/login%20example/login.php");
         exit();
     }
     
     function process_login()
     {
         include("connect.php");
 
         /*datos POST*/
         $array_dataset = 
         [
             "user" => $_POST["unombre"],
             "pass" => $_POST["upassword"],
         ];
 
         /*configuracion consulta*/
         $data = $conn->query("SELECT * FROM usuarios")->fetchAll();
     
         /*recorro consulta*/
         $log_validate = false;
         foreach ($data as $row)
         {
             /*escucho coincidencia en usuario y pass*/
             if(strcmp($row['user'], $array_dataset["user"])==0 && strcmp($row['pass'], $array_dataset["pass"])==0){$log_validate = true;}
         }
 
         /*estimo resultado de consulta login*/
         $consulta_login = ($log_validate == true)? "credenciales válidas" : "credenciales inválidas";
         echo $consulta_login;
     };
?>