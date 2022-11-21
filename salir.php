<?php
session_start();
unset($_SESSION["nombredeusuario"]);
unset($_SESSION["id_cliente"]);
session_destroy();
header('location: ../charruaspag/index.php');