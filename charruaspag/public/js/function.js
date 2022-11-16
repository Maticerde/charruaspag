desplegables = [];
let desplegado = false;
function desplegar(nodo) {
  desplegables.push(nodo);
  desplegables.forEach((element) => {
    if (document.getElementById(element + "-desp").classList.contains("open")) {
      document.getElementById(element + "-desp").classList.remove("open");
    }
  });
  desplegable = document.getElementById(nodo + "-desp");
  if (desplegado == false) {
    // se da delay al cambiarse de un desplegable a otro, evita el delay cuando es el primero en abrirse
    desplegable.classList.toggle("open");
    desplegado = true;
  } else {
    setTimeout(() => desplegable.classList.toggle("open"), 600);
  }
}

function cerrar_nodo() {
  desplegable.classList.remove("open");
  desplegables.length = 0;
  desplegado = false;
}

searchbar = document.getElementById("keywords").addEventListener('keydown', (functiona) => {
  setTimeout(() => search(), 50);
});

function search() {
  const data = new FormData();
  keywords = document.querySelector("#keywords").value;
  data.set("keyword_post", keywords);

  //ya tengo el dato escrito cuando toco el boton, falta enviar por post a implement para actualizar el select y despues loadear shop nuevamente
  fetch("controllers/IndexVinos_Controller.php", {
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

totalcount = document.getElementById("totalcount");
totalcount.innerText = "TOTAL: $ " + total; // se escribe el valor total

arrow = document.getElementById("arrow");
menu = document.getElementById("menu");
let auxflag = true;

function myScrollFunc() {
  let y = window.scrollY;
  if (y > 1100) {
    arrow.style.top = "60px";
    if (!menu.classList.contains("llevarmenu") && auxflag) {
      menu.style.top = "-57px";
      menu.classList.add("llevarmenu");
      setTimeout(() => menu.style.top = "0px", 100);
    } 
  } else {
    arrow.style.top = "-50px";
    if (menu.classList.contains("llevarmenu") && auxflag) {
      menu.style.top = "-57px";
      setTimeout(() => menu.classList.remove("llevarmenu"), 500);
      setTimeout(() => menu.style.top = "0", 500);
      setTimeout(() => menu.style.top = "", 1000);
      auxflag = false; // previene el inicio de otra animacion hasta que termine la actual
      setTimeout(() => auxflag = true, 1000);
    }
  }
}
window.addEventListener("scroll", myScrollFunc);
window.addEventListener("load", myScrollFunc);
function scrollto() {
  window.scroll({
    top: 0,
    behavior: "smooth",
  });
}
