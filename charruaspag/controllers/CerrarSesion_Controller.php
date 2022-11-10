<?php

unset($_SESSION["nombredeusuario"]);
session_destroy();
header('location: ../charruaspag/index.php');