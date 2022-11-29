function load_shop() {
  // se cargan los bestsellers
  load_bestsellers();
  const market = document.querySelector(".productos-gallery");
  // se inicia load de productos
  market.innerHTML = "";
<<<<<<< HEAD:charruaspag/public/js/script_load.js
  fetch("controllers/IndexVinos_Controller.php").then(function (response) {
=======
  fetch("/charruaspag/controllers/IndexVinos_Controller.php").then(function (response) {
>>>>>>> 1a10f8fb1b8758240a7f7e2108df8c41bd7e8244:public/js/script_load.js
    return response.text().then(function (text) {
      //alert(text);
      market.innerHTML = text;
    });
  });
}

document.addEventListener("DOMContentLoaded", function (event) {
  load_shop();
});
