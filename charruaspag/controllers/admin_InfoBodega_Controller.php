<?php

require_once("../models/modeloAdmin.php");
$modelo = new SoporteAdmin();
$datos = $modelo->getBodegas();



//fetch 1
if (isset($_POST["flagform"])) { // esto sirve para poder reutilizar el controlador, ya que dos fetch envían data_POST hacia acá
    foreach ($datos as $row) {
        if ($_POST["idbodega"] == $row['ID_Bodega']) { // solo se escriben los datos de la bodega del vino que clickeamos
            echo '
            <input value=\'' . $row['ID_Bodega'] . '\' type="number" id="in_codigo_bodega" name="in_codigo_bodega" style="display: none">
            <label class="input_label">
            <input value=\'' . $row['Nombre_Bodega'] . '\' class="inputs_mod" type="text" id="in_nombre_bodega" name="in_nombre_bodega" maxlength="40" required>
            <p2 class="input_texto_modb"> Nombre </p2>
          </label>
          <label class="input_label">
            <input  value=\'' . $row['Email_Bodega'] . '\' class="inputs_mod" type="text" id="in_email" name="in_email" maxlength="50" required>
            <p2 class="input_texto_modb"> Email </p2>
          </label>
          <label class="input_label">
            <input value=\'' . $row['Direccion'] . '\'  class="inputs_mod" type="text" id="in_direccion" name="in_direccion" maxlength="70" required>
            <p2 class="input_texto_modb"> Dirección </p2>
          </label>
          <label class="input_label">
            <input value=\'' . $row['Pais'] . '\' class="inputs_mod" type="text" id="in_pais" name="in_pais" "maxlength="25" required>
            <p2 class="input_texto_modb"> País </p2>
          </label>
          <label class="input_label">
            <input value=\'' . $row['Codigo_Postal'] . '\'  class="inputs_mod" type="number" min="0" id="in_postal" name="in_postal" required>
            <p2 class="input_texto_modb"> Codigo Postal </p2>
          </label>
          <label class="input_label">
            <input  value=\'' . $row['Ciudad'] . '\' class="inputs_mod" type="text" id="in_ciudad" name="in_ciudad" maxlength="25" required>
            <p2 class="input_texto_modb"> Ciudad </p2>
          </label>
          <label class="input_label">
            <input class="inputs_mod" type="number" min="0" id="in_telefono" name="in_telefono" readonly="readonly">
            <p2 class="input_texto_modb"> Teléfono </p2>
          </label>
          <label class="input_label">
            <input  value=\'' . $row['Cuenta'] . '\' class="inputs_mod" type="number" min="0" id="in_cuenta" name="in_cuenta" required>
            <p2 class="input_texto_modb"> Cuenta </p2>
          </label>
          ';
        }
    }

//fetch 2
}else {
    foreach ($datos as $row) {
        if ($_POST["idbodega"] == $row['ID_Bodega']) {
            echo "<div id='b_id'> " . $row['ID_Bodega'] . "</div><div id='b_nombre'> " . $row['Nombre_Bodega'] . "</div><section id='upperinfo'><div id='b_pais'>" . $row['Pais'] . "</div><div id='b_ciudad'>" . $row['Ciudad'] . "</div><div id='b_cuenta'> Cuenta: " . $row['Cuenta'] . "</div></section><section id='lowerinfo'><div id='b_direccion'>" . $row['Direccion'] . "</div><div id='b_codpostal'>Cod. Postal: " . $row['Codigo_Postal'] . "</div><div id='b_email'>" . $row['Email_Bodega'] . "</div></section>";
        }
    }
}
