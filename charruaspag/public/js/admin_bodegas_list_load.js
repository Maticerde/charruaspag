function load_bodegas() {
  const bodegas = document.querySelector("#in_bodega_vino");
  bodegas.innerHTML = "";
  fetch("../../controllers/admin_Bodegas_Form_Controller.php").then(function (
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
