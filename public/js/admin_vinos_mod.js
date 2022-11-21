let global_arguments = [];
function carga_form_modv(
  codigo_vino,
  nombre,
  precio,
  descripcion,
  pais,
  region,
  cosecha,
  bodega,
  imagen
) {
  // paso los argumentos a un array global, para poder ser usados en otra funcion
  global_arguments[0] = nombre;
  global_arguments[1] = precio;
  global_arguments[2] = descripcion;
  global_arguments[3] = pais;
  global_arguments[4] = region;
  global_arguments[5] = cosecha;
  global_arguments[6] = bodega;
  global_arguments[7] = codigo_vino;
  global_arguments[8] = imagen;

  inputs_mod = document.querySelectorAll(".inputs_mod");
  inputs_mod[0].value = nombre;
  inputs_mod[1].value = precio;
  inputs_mod[2].value = descripcion;
  inputs_mod[3].value = pais;
  inputs_mod[4].value = region;
  inputs_mod[5].value = cosecha;
  inputs_mod[6].value = bodega;
  input_codvino = document.getElementById("in_codigo_vino").value = codigo_vino;
}

function validate_submit_modv() {
  // verifico que al menos un dato del vino haya sido cambiado para poder hacer el update.
  if (inputs_mod[0].value == global_arguments[0] &&
    inputs_mod[1].value == global_arguments[1] &&
    inputs_mod[2].value == global_arguments[2] &&
    inputs_mod[3].value == global_arguments[3] &&
    inputs_mod[4].value == global_arguments[4] &&
    inputs_mod[5].value == global_arguments[5] &&
    inputs_mod[6].value == global_arguments[6] &&
    inputs_mod[7].value == "") {
    mensaje = document.getElementById("mensaje_modv").innerText = "No hay cambios en el producto";
    mensaje = document.getElementById("mensaje_modv").classList.toggle("mostrarmensaje");
    prevent_button_click = document.getElementById("modvino-button-preventclick").style.display = "";
    setTimeout(() => mensaje = document.getElementById("mensaje_modv").classList.remove("mostrarmensaje"), 2000);
    setTimeout(() => prevent_button_click = document.getElementById("modvino-button-preventclick").style.display = "none", 2000);
  } else {
    // verifico que no haya ningun campo vacío para poder hacer el update.
    if (inputs_mod[0].value == "" ||
      inputs_mod[1].value == "" ||
      inputs_mod[2].value == "" ||
      inputs_mod[3].value == "" ||
      inputs_mod[4].value == "" ||
      inputs_mod[5].value == "" ||
      inputs_mod[6].value == "") {
      mensaje = document.getElementById("mensaje_modv").innerText = "Existen campos vacíos";
      mensaje = document.getElementById("mensaje_modv").classList.toggle("mostrarmensaje2");
      prevent_button_click = document.getElementById("modvino-button-preventclick").style.display = "";
      setTimeout(() => mensaje = document.getElementById("mensaje_modv").classList.remove("mostrarmensaje2"), 2000);
      setTimeout(() => prevent_button_click = document.getElementById("modvino-button-preventclick").style.display = "none", 2000);
    } else {
      // si no se ingresó una imagen por el input, se llena un input text invisible con el STRING de la ubicación antigua.
      if (inputs_mod[7].value == "") {
        string_imagen = document.getElementById("in_imagenString_mod").value = global_arguments[8];
      }
      document.getElementById("modvino-form").submit(); // en caso de que todo esté en orden, se hace submit del formulario.
    }
  }
}

