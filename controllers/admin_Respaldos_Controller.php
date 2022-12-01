<?php 
// en este archivo se escriben los respaldos

require_once("../models/modeloAdmin.php");
$modelo = new soporteAdmin();
$datos = $modelo->getRespaldoVinos();

foreach ($datos as $row) {
    echo "<section><span>" . $row['Cod_Respado_Vino'] . "</span><span>" . $row['Resp_Nombre_Vino'] . "</span><span>" . $row['Resp_Cod_Vino'] . "</span><span>" . $row['Resp_Precio_Vino'] ."</span><span>" . $row['Resp_Stock_Vino'] ."</span></section>";
}
