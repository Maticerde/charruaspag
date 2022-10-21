function load_shop() {
  const market = document.querySelector(".productos-gallery");
  //  alert("se inicia load de productos");
  market.innerHTML = "";
  fetch("controllers/Market_Controller.php").then(function (response) {
    return response.text().then(function (text) {
      //alert(text);
      market.innerHTML = text;
    });
  });
}

document.addEventListener("DOMContentLoaded", function (event) {
  load_shop();
});
