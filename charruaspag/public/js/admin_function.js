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
prodbox.style.display = "none";
prodbox.style.opacity = "0";

function slide(num) {
  if (num == 0) {
    grid.classList.toggle("slide");
    prodbox.style.display = "";
    setTimeout(() => (prodbox.style.opacity = "1"), 300);
    prodbox.style.display = "";
    userbox.style.opacity = "0";
    setTimeout(() => (userbox.style.display = "none"), 300);
  } else {
    grid.classList.toggle("slide");
    userbox.style.display = "";
    setTimeout(() => (userbox.style.opacity = "1"), 300);
    prodbox.style.opacity = "0";
    setTimeout(() => (prodbox.style.display = "none"), 300);
  }
}

function cargar_forms(
  id,
  codigo_vino,
  nombre,
  precio,
  stock,
  pais,
  region,
  cosecha,
  bodega,
  imagen
) {
  options = document.querySelectorAll(".options");
  option = document.getElementById(id);
  inputs = document.querySelectorAll(".inputs");

  for (var i = 0; i < options.length; i++) {
    if (options[i].classList.contains("selected")) {
      options[i].classList.remove("selected");
    }
  }

  if (
    nombre == inputs[0].value &&
    precio == inputs[1].value &&
    stock == inputs[2].value &&
    pais == inputs[3].value &&
    region == inputs[4].value &&
    cosecha == inputs[5].value &&
    bodega == inputs[6].value
  ) {
    inputs[0].value = "";
    inputs[1].value = "";
    inputs[2].value = "";
    inputs[3].value = "";
    inputs[4].value = "";
    inputs[5].value = "";
    inputs[6].value = "";
    exit();
  } else {
    option.classList.toggle("selected");
  }

  inputs[0].value = nombre;
  inputs[1].value = precio;
  inputs[2].value = stock;
  inputs[3].value = pais;
  inputs[4].value = region;
  inputs[5].value = cosecha;
  inputs[6].value = bodega;
}
