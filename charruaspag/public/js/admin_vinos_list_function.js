info_wrapper = document.getElementById("info-section");
info_efecto = document.getElementById("info-efecto");
info_wrapper.style.display = "none";
info_efecto.style.display = "none";

function select_vino( // esta funcion maneja la lista de vinos, lo que sucede cuando clickeamos en un vino y el la carga de formularios
  id,
  codigo_vino,
  nombre_vino,
  precio,
  stock,
  pais_vino,
  region,
  cosecha,
  bodega,
  imagen,
  nombre_bodega,
  email,
  direccion,
  pais_bodega,
  ciudad,
  cuenta,
  codpostal,
  descripcion,
  telefono
) {
  info_vino = document.getElementById("info-vino");
  info_bodega = document.getElementById("info-bodega");
  options = document.querySelectorAll(".options");
  option = document.getElementById(id);
  inputs = document.querySelectorAll(".inputs");
  addbodegabox = document.getElementById("addbodega-box");
  modbodegabox = document.getElementById("modbodega-bax");
  modtext = document.querySelector(".modificar_Text");



  let ultimaopcion;
  let primeraflag = true;
  for (var i = 0; i < options.length; i++) {
    if (options[i].classList.contains("selected")) {
      ultimaopcion = options[i].id;
      options[i].classList.remove("selected");
      info_vino.classList.remove("info-select");
      info_bodega.classList.remove("info-select");
      primeraflag = false;
    }
  }

  if (ultimaopcion !== id) {
    modtext.classList.toggle("aparecer");
    // si no dimos click dos veces en el mismo vino entra acá
    if (primeraflag == true) {
      //si es el primer click, las animaciones son instantaneas
      option.classList.toggle("selected");
      info_vino.classList.toggle("info-select");
      info_bodega.classList.toggle("info-select");
      escribir_info_vino(
        codigo_vino,
        nombre_vino,
        precio,
        stock,
        pais_vino,
        region,
        cosecha,
        bodega,
        imagen
      );
      carga_form_modv(
        codigo_vino,
        nombre_vino,
        precio,
        descripcion,
        pais_vino,
        region,
        cosecha,
        bodega,
        imagen
      );
      escribir_info_bodega(
        nombre_bodega,
        email,
        direccion,
        pais_bodega,
        ciudad,
        cuenta,
        codpostal
      );
      carga_form_modb(
        bodega,
        nombre_bodega,
        email,
        direccion,
        pais_bodega,
        ciudad,
        cuenta,
        codpostal,
        telefono
      );
      setTimeout(() => (info_wrapper.style.display = ""), 400);
      setTimeout(() => (info_efecto.style.display = ""), 400);
    } else {
      modtext.classList.toggle("aparecer");
      //si no es el primer click, las animaciones van con delay para que no se solapen
      option.classList.toggle("selected");
      setTimeout(() => info_vino.classList.toggle("info-select"), 400);
      setTimeout(() => info_bodega.classList.toggle("info-select"), 400);
      setTimeout(
        () =>
          carga_form_modv(
            codigo_vino,
            nombre_vino,
            precio,
            stock,
            pais_vino,
            region,
            cosecha,
            bodega,
            imagen
          ), 450);
      setTimeout(
        () =>
          escribir_info_vino(
            codigo_vino,
            nombre_vino,
            precio,
            stock,
            pais_vino,
            region,
            cosecha,
            bodega,
            imagen
          ), 450);

      setTimeout(() => carga_form_modb(
        bodega,
        nombre_bodega,
        email,
        direccion,
        pais_bodega,
        ciudad,
        cuenta,
        codpostal
      ), 450);
      setTimeout(() => escribir_info_bodega(
        nombre_bodega,
        email,
        direccion,
        pais_bodega,
        ciudad,
        cuenta,
        codpostal
      ), 450);
      if (modvinobox.classList.contains("desplegar2")) {
        // si la seccion de modificaciones está desplegada cuando clickeamos dos vinos diferentes, hace una breve animación
        modvinobox.classList.remove("desplegar2");
        modbodegabox.classList.remove("desplegar2");
        setTimeout(() => modvinobox.classList.toggle("desplegar2"), 500);
        setTimeout(() => modbodegabox.classList.toggle("desplegar2"), 500);
      }
    }
  } else {
    try {
      modtext.classList.remove("aparecer");
      info_wrapper.style.display = "none";
      if (!modvinobox.classList.contains("desplegar2")) {
        addvinobox.classList.toggle("desplegar");
        addbodegabox.classList.toggle("desplegar");
        setTimeout(() => modvinobox.classList.toggle("desplegar2"), 900);
        setTimeout(() => modbodegabox.classList.toggle("desplegar2"), 900);
      }
      modvinobox.classList.remove("desplegar2");
      modbodegabox.classList.remove("desplegar2");
      setTimeout(() => addvinobox.classList.remove("desplegar"), 900);
      setTimeout(() => addbodegabox.classList.remove("desplegar"), 900);
      primeraflag = true;
    } catch (error) {
      // Da un error necesario para funcionar 
    }

  }
}

function desplegarmod() {
  // cuenta clicks para una animacion sin solapamientos
  addvinobox = document.getElementById("addvino-box");
  addbodegabox = document.getElementById("addbodega-box");
  modbodegabox = document.getElementById("modbodega-bax");

  if (!addvinobox.classList.contains("desplegar")) {
    addvinobox.classList.toggle("desplegar");
    addbodegabox.classList.toggle("desplegar");
    setTimeout(() => modvinobox.classList.toggle("desplegar2"), 900);
    setTimeout(() => modbodegabox.classList.toggle("desplegar2"), 900);
  } else {
    if (!modvinobox.classList.contains("desplegar2")) {
      addvinobox.classList.toggle("desplegar");
      addbodegabox.classList.toggle("desplegar");
      setTimeout(() => modvinobox.classList.toggle("desplegar2"), 900);
      setTimeout(() => modbodegabox.classList.toggle("desplegar2"), 900);
    }
    modvinobox.classList.remove("desplegar2");
    modbodegabox.classList.remove("desplegar2");
    setTimeout(() => addvinobox.classList.remove("desplegar"), 900);
    setTimeout(() => addbodegabox.classList.remove("desplegar"), 900);
  }
}
