function respaldos_list() {
    const ventas = document.querySelector("#table-content-cambios");
    ventas.innerHTML = "";
    fetch("controllers/IndexVinos_Controller.php").then(function (response) {
      return response.text().then(function (text) {
        ventas.innerHTML = text;
      });
    });
  }
  
  document.addEventListener("DOMContentLoaded", function (event) {
    respaldos_list();
  });
  

  function load_filter_ventas(respaldos) {
    const ventas = document.querySelector("#table-content-cambios");
    ventas.innerHTML = respaldos;
  }
