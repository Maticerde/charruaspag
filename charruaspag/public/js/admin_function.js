const output = document.querySelector("#nombre_imagen");
const input = document.querySelector("#in_imagen");
const preview = document.querySelector("#preview");
preview.style.display = "none";

input.addEventListener("change", (event) => {
  if (input.files.length > 0) {
    output.innerHTML = input.files[0].name; // muestra solo el nombre del archivo, no la ruta
    preview.src = "src/vinos/" + input.files[0].name; // cambia la imagen de preview
    preview.style.display = "none";
  } else {
    output.innerHTML = "Imagen";
    preview.style.display = "none"; // si se cancela su carga oculta la imagen y cambia el nombre a imagen nuevamente
  }
});

//funcion slide para ir a usuarios o a productos
userbox = document.querySelector("#text-user");
prodbox = document.querySelector("#text-prod");
grid = document.querySelector("#grid-functions");
vinoslist = document.querySelector("#vinos-list-label");
info_vino = document.getElementById("info-vino");
info_bodega = document.getElementById("info-bodega");
prodbox.style.display = "none";
prodbox.style.opacity = "0";

function slide(num) {
  if (num == 0) {
    grid.classList.toggle("slide");
    vinoslist.classList.toggle("slide");
    info_vino.classList.toggle("slide");
    info_bodega.classList.toggle("slide");
    prodbox.style.display = "";
    setTimeout(() => (prodbox.style.opacity = "1"), 300);
    prodbox.style.display = "";
    userbox.style.opacity = "0";
    setTimeout(() => (userbox.style.display = "none"), 300);
  } else {
    grid.classList.toggle("slide");
    vinoslist.classList.toggle("slide");
    info_vino.classList.toggle("slide");
    info_bodega.classList.toggle("slide");
    userbox.style.display = "";
    setTimeout(() => (userbox.style.opacity = "1"), 300);
    prodbox.style.opacity = "0";
    setTimeout(() => (prodbox.style.display = "none"), 300);
  }
}
