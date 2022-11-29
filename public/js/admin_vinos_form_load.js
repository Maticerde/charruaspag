  
  document.querySelector("#input_bodega").addEventListener('keydown', (e) => { // API búsqueda async
      setTimeout(() => load_VinosOfBodega(), 50);
  });

function load_VinosOfBodega() {
    let bodega_value = document.querySelector("#input_bodega").value;
    if(bodega_value == '') {
    bodega_value = 0;
    }
    const vinos_form = document.querySelector("#vino_compra");
    const data = new FormData();
    data.set("bodega", bodega_value);
  
    vinos_form.innerHTML = "";
    fetch("../../controllers/admin_Vinos_Form_Controller.php", {
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
      .then(function (text) {
        vinos_form.innerHTML = text;
      })
      .catch(function (err) {
        console.log(err);
      });
  }

  document.addEventListener("DOMContentLoaded", function (event) {
    load_VinosOfBodega();
  });
  