const output = document.querySelector("#nombre_imagen");
const output_mod = document.querySelector("#nombre_imagen_mod");
const input = document.querySelector("#in_imagen");
const input_mod = document.querySelector("#in_imagen_mod");

input.addEventListener("change", (event) => {
  if (input.files.length > 0) {
    output.innerHTML = input.files[0].name; // muestra solo el nombre del archivo, no la ruta
  } else {
    output.innerHTML = "Imagen";
  }
});

input_mod.addEventListener("change", (event) => {
  if (input_mod.files.length > 0) {
    output_mod.innerHTML = input_mod.files[0].name; // muestra solo el nombre del archivo de modificacion, no la ruta
  } else {
    output_mod.innerHTML = "Imagen";
  }
});


//funcion slide para ir a usuarios o a productos
userbox = document.querySelector("#text-user");
userbox_preventclick = document.querySelector("#text-user-preventclick");
prodbox = document.querySelector("#text-prod");
prodbox_preventclick = document.querySelector("#text-prod-preventclick");
grid = document.querySelector("#grid-functions");
gridmod = document.querySelector("#grid-mod-functions");
vinoslist = document.querySelector("#vinos-list-label");
info_vino = document.getElementById("info-vino");
info_bodega = document.getElementById("info-bodega");
modvinobox = document.getElementById("modvino-bax");
modbodegabox = document.getElementById("modbodega-bax");


prodbox.style.display = "none";
prodbox.style.opacity = "0";
userbox_preventclick.style.display = "none";
prodbox_preventclick.style.display = "none";

function slide(num) { //esta funcion se encarga de la animacion, tambien previene bugs al darle clicks rapidamente
  if (num == 0) {
    gridmod.classList.toggle("slide");
    grid.classList.toggle("slide");
    vinoslist.classList.toggle("slide");
    info_vino.classList.toggle("slide");
    info_bodega.classList.toggle("slide");
    modvinobox.classList.toggle("slide");
    modbodegabox.classList.toggle("slide");
    prodbox.style.display = "";
    setTimeout(() => (prodbox.style.opacity = "1"), 300);
    userbox.style.opacity = "0";
    userbox_preventclick.style.display = "";
    setTimeout(() => (userbox.style.display = "none"), 300);
    setTimeout(() => (userbox_preventclick.style.display = "none"), 300);
  } else {
    gridmod.classList.toggle("slide");
    grid.classList.toggle("slide");
    vinoslist.classList.toggle("slide");
    info_vino.classList.toggle("slide");
    info_bodega.classList.toggle("slide");
    modvinobox.classList.toggle("slide");
    modbodegabox.classList.toggle("slide");
    userbox.style.display = "";
    setTimeout(() => (userbox.style.opacity = "1"), 300);
    prodbox.style.opacity = "0";
    prodbox_preventclick.style.display = "";
    setTimeout(() => (prodbox.style.display = "none"), 300);
    setTimeout(() => (prodbox_preventclick.style.display = "none"), 300);
  }
}
