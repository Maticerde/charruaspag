<?php
include "../libs/controller.php";

class Market_Controller extends controller {

    public function __construct()
    {
        parent::__construct();
        $this->view->mensaje        = "";
        // $this->view->resultadoLogin = "";
    }

    public function render()
    {
        // $this->view->mensaje = "cargado";
        // $this->view->render('market/index');
    }

    public function getVinos()
    {

        if (isset($_POST["keyword_post"])) {
            $keywords = $_POST["keyword_post"];
        } else {
            $keywords = '';
        } if ($keywords == "commit") {
            for ($i = 0; $i < 100; $i++) {
                echo "<div id='productos-div' ><p1> " . "SqlNast" . "</p1><br><p1> $ " . "300" . "</p1><br><p1>Stock: " . "∞" . "</p1><img src=\"" . "src/vinos/sqlnast.jpeg" . "\"/></div>";
            }
        }

// require_once("..\models\Articulos_Model.php");
// $modelo = new soporteIndex();
// $datos  = $modelo->getVinos($keywords);

$aux           = 0;
$array_ids     = [];
$array_nombres = [];
$array_precios = [];
$array_stocks  = [];
$array_images  = [];
foreach ($datos as $row) {
    array_push($array_ids, $row['Codigo_Vino']);
    array_push($array_nombres, $row['Nombre_Vino']);
    array_push($array_precios, $row['Precio']);
    array_push($array_stocks, $row['Stock']);
    array_push($array_images, $row['Ubicacion_IMG']);
    $aux++;
}
for ($i = 0; $i < $aux; $i++) {
    if ($array_stocks[$i] == 0) {
        echo "<div id='productos-div-agotado' onclick='acarrear(" . $i . ",\"" . $array_nombres[$i] . "\",\"" . $array_precios[$i] . "\",\"" . $array_stocks[$i] . "\");'><p1> " . $array_nombres[$i] . "</p1><br><p1> $ " . $array_precios[$i] . "</p1><br><p2>Stock: " . $array_stocks[$i] . "</p2><img src=\"" . $array_images[$i] . "\"/></div>";
    } else {
        echo "<div id='productos-div' onclick='acarrear(" . $i . ",\"" . $array_nombres[$i] . "\",\"" . $array_precios[$i] . "\",\"" . $array_stocks[$i] . "\");'><p1> " . $array_nombres[$i] . "</p1><br><p1> $ " . $array_precios[$i] . "</p1><br><p1>Stock: " . $array_stocks[$i] . "</p1><img src=\"" . $array_images[$i] . "\"/></div>";
    }

}
}
}