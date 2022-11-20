
function load_bestsellers() {
  load_bestsellers_info();
  const bestsellers = document.querySelector("#bestsellers");

  bestsellers.innerHTML = "";
  fetch("controllers/BestSellers_Controller.php").then(function (response) {
    return response.text().then(function (text) {
      bestsellers.innerHTML = text;
    });
  });
}

function load_bestsellers_info() {
  const bestsellers_info = document.querySelector("#bestsellers_info");
  const data = new FormData();
  data.set("fetch_aux_info", "fetch_aux_info");

  bestsellers_info.innerHTML = "";
  fetch("controllers/BestSellers_Controller.php", {
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
      bestsellers_info.innerHTML = text;
    })
    .catch(function (err) {
      console.log(err);
    });
}

document.addEventListener("DOMContentLoaded", function (event) {
  load_bestsellers();
});

