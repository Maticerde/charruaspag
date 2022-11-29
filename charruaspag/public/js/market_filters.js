
function load_paises() {
  const paises = document.querySelector("#paises-list");
  paises.innerHTML = "";
  fetch("../../controllers/MarketPaises_Controller.php").then(function (
    response
  ) {
    return response.text().then(function (text) {
      paises.innerHTML = text;
    });
  });
}
  
document.addEventListener("DOMContentLoaded", function (event) {
  load_paises();
});
  
function load_bodegas() {
  const bodegas = document.querySelector("#bodegas-list");
  bodegas.innerHTML = "";
  fetch("../../controllers/MarketBodegas_Controller.php").then(function (
    response
  ) {
    return response.text().then(function (text) {
      bodegas.innerHTML = text;
    });
  });
}

document.addEventListener("DOMContentLoaded", function (event) {
load_bodegas();
});

function load_regiones() {
  const regiones = document.querySelector("#regiones-list");
  regiones.innerHTML = "";
  fetch("../../controllers/MarketRegiones_Controller.php").then(function (
    response
  ) {
    return response.text().then(function (text) {
      regiones.innerHTML = text;
    });
  });
}

document.addEventListener("DOMContentLoaded", function (event) {
load_regiones();
});
