    <?php 
// en este archivo se escriben los registros de compras

if (isset($_POST["keyword_post_c"])) { // si no hay keywords no se escribe nada
    $keywords = $_POST["keyword_post_c"];
} else {
    $keywords = '';
}

require_once("../models/modeloAdmin.php");
$modelo = new soporteAdmin();
$datos = $modelo->getCompras($keywords);

foreach ($datos as $row) {
    echo "<section><span>" . $row['Codigo_compra'] . "</span><span>" . $row['Fecha_Compra'] . "</span><span>" . $row['ID_Bodega'] . "</span><span>" . $row['Nombre_Bodega'] ."</span><span>" . $row['Codigo_Empleado'] ."</span><span>" . $row['Nombre_Empleado'] ."</span></section>";
}
