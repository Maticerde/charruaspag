<?php
    // utiliza los datos de un solo producto, esto quiere decir que se ejecutará varias veces

require_once("../models/modeloIndex.php");
$modelo = new soporteIndex();
$datos = $modelo->setStock($_POST['name'], $_POST['stock'], $_POST['cant']);

