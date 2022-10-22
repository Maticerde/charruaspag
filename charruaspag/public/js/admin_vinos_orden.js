function load_orden(id) {
  let orden = document.getElementById(id);
  orden.classList.toggle("selectorden");
  options = document.querySelectorAll(".ord");

  for (var i = 0; i < options.length; i++) {
    if (options[i].classList.contains("selectorden")) {
      options[i].classList.remove("selectorden");
    }
  }
  orden.classList.toggle("selectorden");

  function vaciarforms() {
    info_vino = document.getElementById("info-vino");
    info_bodega = document.getElementById("info-bodega");
    options = document.querySelectorAll(".options");
    inputs = document.querySelectorAll(".inputs");

    inputs[0].value = "";
    inputs[1].value = "";
    inputs[2].value = "";
    inputs[3].value = "";
    inputs[4].value = "";
    inputs[5].value = "";
    inputs[6].value = "";

    info_vino.classList.remove("info-select");
    info_bodega.classList.remove("info-select");
  }

  vaciarforms();
}

document.addEventListener("DOMContentLoaded", function (event) {
  let orden = document.getElementById("orden1");
  orden.classList.toggle("selectorden");
});
