function load_orden_style(id) {
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
    
    addvinobox = document.getElementById("addvino-box")
    addbodegabox = document.getElementById("addbodega-box");
    modbodegabox = document.getElementById("modbodega-bax");

    inputs[0].value = "";
    inputs[1].value = "";
    inputs[2].value = "";
    inputs[3].value = "";
    inputs[4].value = "";
    inputs[5].value = "";
    inputs[6].value = "";

    info_vino.classList.remove("info-select");
    info_bodega.classList.remove("info-select");
    info_wrapper.style.display = "none";
    info_efecto.style.display = ""
      setTimeout(() => modvinobox.classList.remove("desplegar2"), 100);
      setTimeout(() => modbodegabox.classList.remove("desplegar2"), 100);
      setTimeout(() => addvinobox.classList.remove("desplegar"), 1000);
      setTimeout(() => addbodegabox.classList.remove("desplegar"), 1000);

  }
    vaciarforms();
}

function load_vinos() { // este fetch carga asíncronamente la lista de vinos cargados
  const data = new FormData(document.getElementById("vinos-order"));
  const vinos_list = document.querySelector("#vinos-list");
  fetch("../../controllers/admin_VinosList_Controller.php", {
    method: "POST",
    body: data,
  })
    .then(function (response) {
      if (response.ok) {
        return response.text();
      } else {
        throw "Error";
      }
    })
    .then(function (texto) {
      vinos_list.innerHTML = texto;
    })
    .catch(function (err) {
      console.log(err);
    });
}

document.addEventListener("DOMContentLoaded", function (event) {
  let orden1 = document.getElementById("orden1");
  orden1.classList.toggle("selectorden");
  load_vinos();
});
