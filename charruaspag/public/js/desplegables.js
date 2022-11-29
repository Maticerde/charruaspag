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
