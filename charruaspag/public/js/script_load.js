function load_shop() {
  // se cargan los bestsellers
  load_bestsellers();
  const market = document.querySelector(".productos-gallery");
  // se inicia load de productos
  market.innerHTML = "";
  fetch("controllers/IndexVinos_Controller.php").then(function (response) {
    return response.text().then(function (text) {
      //alert(text);
      market.innerHTML = text;
    });
  });
}

document.addEventListener("DOMContentLoaded", function (event) {
  load_shop();
});
