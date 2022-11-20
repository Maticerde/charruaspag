function load_shop() {
    const data = new FormData(document.getElementById("vinos-order"));
    const market = document.querySelector(".productos-gallery");
    fetch("../../controllers/MarketVinos_Controller.php", {
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
        market.innerHTML = texto;
      })
      .catch(function (err) {
        console.log(err);
      });
  }
  
  document.addEventListener("DOMContentLoaded", function (event) { //se cargan los productos al iniciar la página
    load_shop();
  });

  searchbar = document.getElementById("keywords").addEventListener('keydown', (e) => { // API búsqueda async
    setTimeout(() => search(), 50);
  });

  function search() {
    const data = new FormData();
    keywords = document.querySelector("#keywords").value;
    data.set("keyword_post", keywords);
  
      //ya tengo el dato escrito cuando toco el boton, falta enviar por post a implement para actualizar el select y despues loadear shop nuevamente
    fetch("../../controllers/MarketVinos_Controller.php", {
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
        //load_shop()
        load_filter_shop(texto);
        //alert(texto);
      })
      .catch(function (err) {
        console.log(err);
      });
  }
  
  function load_filter_shop(filtro) {
    const market = document.querySelector(".productos-gallery");
    market.innerHTML = filtro;
  }
  


  