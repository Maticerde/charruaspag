let global_arguments_b = [];
function carga_form_modb(
  bodega,
  nombre_bodega,
  email,
  direccion,
  pais_bodega,
  ciudad,
  cuenta,
  codpostal,
  telefono
) {
  // paso los argumentos a un array global, para poder ser usados en otra funcion
  global_arguments_b[0] = bodega;
  global_arguments_b[1] = nombre_bodega;
  global_arguments_b[2] = email;
  global_arguments_b[3] = direccion;
  global_arguments_b[4] = pais_bodega;
  global_arguments_b[5] = codpostal;
  global_arguments_b[6] = ciudad;
  global_arguments_b[7] = cuenta;
  global_arguments_b[8] = telefono;

  inputs_mod_b = document.querySelectorAll(".inputs_modb");
  inputs_mod_b[0].value = nombre_bodega;
  inputs_mod_b[1].value = email;
  inputs_mod_b[2].value = direccion;
  inputs_mod_b[3].value = pais_bodega;
  inputs_mod_b[4].value = codpostal;
  inputs_mod_b[5].value = ciudad;
  inputs_mod_b[6].value = telefono;
  inputs_mod_b[7].value = cuenta;
  input_codbodega = document.getElementById("in_codigo_bodega").value = bodega;
}

function validate_submit_modb() {
  // verifico que al menos un dato de la bodega haya sido cambiado para poder hacer el update.
  if (inputs_mod_b[0].value == global_arguments_b[1] &&
    inputs_mod_b[1].value == global_arguments_b[2] &&
    inputs_mod_b[2].value == global_arguments_b[3] &&
    inputs_mod_b[3].value == global_arguments_b[4] &&
    inputs_mod_b[4].value == global_arguments_b[5] &&
    inputs_mod_b[5].value == global_arguments_b[6] &&
    inputs_mod_b[6].value == global_arguments_b[8] &&
    inputs_mod_b[7].value == global_arguments_b[7]) {
    mensaje = document.getElementById("mensaje_modb").innerText = "No hay cambios en el producto";
    mensaje = document.getElementById("mensaje_modb").classList.toggle("mostrarmensaje");
    prevent_button_click = document.getElementById("modbodega-button-preventclick").style.display = "";
    setTimeout(() => mensaje = document.getElementById("mensaje_modb").classList.remove("mostrarmensaje"), 2000);
    setTimeout(() => prevent_button_click = document.getElementById("modbodega-button-preventclick").style.display = "none", 2000);
  } else {
    // verifico que no haya ningun campo vacío para poder hacer el update.
    if (inputs_mod_b[0].value == "" ||
      inputs_mod_b[1].value == "" ||
      inputs_mod_b[2].value == "" ||
      inputs_mod_b[3].value == "" ||
      inputs_mod_b[4].value == "" ||
      inputs_mod_b[5].value == "" ||
      inputs_mod_b[6].value == "") {
      mensaje = document.getElementById("mensaje_modb").innerText = "Existen campos vacíos";
      mensaje = document.getElementById("mensaje_modb").classList.toggle("mostrarmensaje2");
      prevent_button_click = document.getElementById("modbodega-button-preventclick").style.display = "";
      setTimeout(() => mensaje = document.getElementById("mensaje_modb").classList.remove("mostrarmensaje2"), 2000);
      setTimeout(() => prevent_button_click = document.getElementById("modbodega-button-preventclick").style.display = "none", 2000);
    } else {
      document.getElementById("modbodega-form").submit(); // en caso de que todo esté en orden, se hace submit del formulario.
    }
  }
}

