<?php

    if(isset($_POST["bodega"])){
        getvinos();
    }else 
{
    header("Location: /views/panel_admin/altas_stock.php");
    exit();
}



 function getvinos() {
 require_once("../models/modeloAdmin.php");
  $modelo = new SoporteAdmin();
  $datos = $modelo->getVinosOfBodega($_POST["bodega"]);
  echo "<option value='' disabled selected> </option>";
  
  foreach ($datos as $row) {
  echo "<option value=" . $row['Codigo_Vino']. ">" . $row['Nombre_Vino'] . "</option>";
  }
  
}
 
 
