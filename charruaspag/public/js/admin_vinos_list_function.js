function load_vinos() { // este fetch carga asíncronamente la lista de vinos cargados
  const data = new FormData(document.getElementById("vinos-order"));
  const vinos_list = document.querySelector("#vinos-list");
  fetch("../../controllers/admin_Vinos_Controller.php", {
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
  load_vinos();
});

function select_vino(
    id,
    codigo_vino,
    nombre,
    precio,
    stock,
    pais,
    region,
    cosecha,
    bodega,
    imagen
  ) {

  
    
    info_vino = document.getElementById("info-vino");
    info_bodega = document.getElementById("info-bodega");
    options = document.querySelectorAll(".options");
    option = document.getElementById(id);
    inputs = document.querySelectorAll(".inputs");
    
    let ultimaopcion;
    let primeraflag = true;
    for (var i = 0; i < options.length; i++) {
      if (options[i].classList.contains("selected")) {
        ultimaopcion = options[i].id;
        options[i].classList.remove("selected");
        info_vino.classList.remove("info-select");
        info_bodega.classList.remove("info-select");
        primeraflag = false;
      }
    }
  
    if (ultimaopcion!==id) { // si no dimos click dos veces en el mismo vino, el infovino y infobodega hace animacion de ida y vuelta
  
      if (primeraflag == true) {
        info_vino.classList.toggle("info-select");
        info_bodega.classList.toggle("info-select");
        escribir_info_vino(codigo_vino, nombre, precio, stock, pais, region, cosecha, bodega, imagen)
        escribir_info_bodega(bodega);
      } else {
        setTimeout(() => info_vino.classList.toggle("info-select"), 400);
        setTimeout(() => info_bodega.classList.toggle("info-select"), 400);
        setTimeout(() => escribir_info_vino(codigo_vino, nombre, precio, stock, pais, region, cosecha, bodega, imagen), 400);
        setTimeout(() => escribir_info_bodega(bodega), 400);
      }
    }
      
      if (nombre == inputs[0].value &&
      precio == inputs[1].value &&
      stock == inputs[2].value &&
      pais == inputs[3].value &&
      region == inputs[4].value &&
      cosecha == inputs[5].value &&
      bodega == inputs[6].value
      ) {
        inputs[0].value = "";
        inputs[1].value = "";
        inputs[2].value = "";
        inputs[3].value = "";
        inputs[4].value = "";
        inputs[5].value = "";
        inputs[6].value = "";
    } else {
  
      inputs[0].value = nombre;
      inputs[1].value = precio;
      inputs[2].value = stock;
      inputs[3].value = pais;
      inputs[4].value = region;
      inputs[5].value = cosecha;
      inputs[6].value = bodega;
  
      option.classList.toggle("selected");
    }
    
  }