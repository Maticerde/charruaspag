  document.addEventListener("DOMContentLoaded", function (event) { //se cargan los productos al iniciar la página
    search();
  });

  searchbar = document.getElementById("keywords").addEventListener('keydown', (e) => { // API búsqueda async
    setTimeout(() => search(), 50);
  });

function search() {
    const data = new FormData();
    keywords = document.querySelector("#keywords").value;
    data.set("keyword_post", keywords);
  
      //ya tengo el dato escrito cuando toco el boton, falta enviar por post a implement para actualizar el select y despues loadear shop nuevamente
    fetch("../../controllers/admin_MostrarVentas_Controller.php", {
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
        load_filter_ventas(texto);
      })
      .catch(function (err) {
        console.log(err);
      });
  }

  function load_filter_ventas(filtro) {
    const ventas = document.querySelector("#table-content");
    ventas.innerHTML = filtro;
  }



  