function loadpadmin_vinos() {
  const data = new FormData(document.getElementById("vinos-order"));
  const vinos_list = document.querySelector("#vinos-list");
  fetch("../../controllers/admin_Vinos_Controller.php", {
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
      vinos_list.innerHTML = texto;
    })
    .catch(function (err) {
      console.log(err);
    });
}

document.addEventListener("DOMContentLoaded", function (event) {
  loadpadmin_vinos();
});
