<?php

session_start();
require "../models/Login_Model.php";

class Login_Controller {

    public function ingresar()
    {

        if(!isset($_POST['row'])){                      //   Si no recibimos ningún valor proveniente del formulario, significa que el usuario recién ingresa.
            $this->view->render('login/index');      //   Por lo tanto le presentamos la pantalla del formulario de ingreso.
      }
        $unombre = $_POST['unombre'];
        $upassword = $_POST['upassword'];
        $exitoLogin = $this->model->ingresar($unombre, $upassword);
        if ($exitoLogin) {

            // no va a ser usado
            // $token = Auth::SignIn([
            //     'id' => 1,
            //     'name' => $unombre,
            //     'role' => 'cliente',
            // ]);
            // $this->view->token = $token;
            // no va a ser usado

            $_SESSION["estalogueado"] = true;
            $_SESSION["nombre"] = $unombre;
            $_SESSION["rol"] = "cliente";
            $this->view->render('login/ingresar');
        } else {
            $this->view->resultadoLogin = "usuario o contraseña incorrectos";
            $this->view->render('login/index');
        }

    }
    public function salir()
    {
        //$_SESSION["estalogueado"] = false;
        unset($_SESSION["estalogueado"]);
        unset($_SESSION["nombre"]);
        session_destroy();
        $this->view->render('index/index');

    }
}