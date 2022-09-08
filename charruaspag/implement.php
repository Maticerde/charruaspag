<?php

include 'conexion.php';

if (isset($_POST["keyword_post"])) {
    $keywords = $_POST["keyword_post"];
} else {
    $keywords = '';
}

$data          = $conn->query("SELECT * FROM vinos WHERE vinos.Nombre_Vino LIKE '%" . $keywords . "%'")->fetchAll(); //consulta pdo
$aux           = 0;
$array_nombres = [];
$array_precios = [];
$array_stocks  = [];
foreach ($data as $row) {
    array_push($array_nombres, $row['Nombre_Vino']);
    array_push($array_precios, $row['Precio']);
    array_push($array_stocks, $row['Stock']);
    $aux++;

}
for ($i = 0; $i < $aux; $i++) {
    echo "<div onclick='acarrear(" . $i . ",\"" . $array_nombres[$i] . "\",\"" . $array_precios[$i] . "\",\"" . $array_stocks[$i] . "\");'><p1>" . $array_nombres[$i] . "</p1><br><p1> $ " . $array_precios[$i] . "</p1><br><p1>Stock: " . $array_stocks[$i] . "</p1></div>";

}