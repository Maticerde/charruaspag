<?php

include "../libs/controller.php";
class Login_Controller extends controller {

    public function __construct()
    {
        parent::__construct();
        $this->view->mensaje        = "";
        // $this->view->resultadoLogin = "";
    }

    public function render()
    {
        $this->view->mensaje = "";
        $this->view->render('login/index');
    }

    public function ingresar()
    {
        $nombre = $_POST['unombre'];
        $pass = $_POST['upassword'];
        $exitoLogin = $this->model->ingresar($nombre, $pass);
        if ($exitoLogin) {
            $token = Auth::SignIn([
                'id' => 1,
                'name' => $nombre,
                'role' => 'cliente',
            ]);
            $this->view->token = $token;
            $_SESSION["estalogueado"] = true;
            $_SESSION["nombre"] = $nombre;
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