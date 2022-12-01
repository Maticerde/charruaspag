  document.addEventListener("DOMContentLoaded", function (event) { //se cargan los productos al iniciar la p�gina
    search_c();
  });

  searchbar_c = document.getElementById("keywords_c").addEventListener('keydown', (e) => { // API b�squeda async
    setTimeout(() => search_c(), 50);
  });

function search_c() {
    const data = new FormData();
    keywords = document.querySelector("#keywords_c").value;
    data.set("keyword_post_c", keywords);
  
      //ya tengo el dato escrito cuando toco el boton, falta enviar por post a implement para actualizar el select y despues loadear shop nuevamente
    fetch("../../controllers/admin_MostrarCompras_Controller.php", {
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
        load_filter_compras(texto);
      })
      .catch(function (err) {
        console.log(err);
      });
  }

  function load_filter_compras(filtro) {
    const compras = document.querySelector("#table-content-compras");
    compras.innerHTML = filtro;
  }



  