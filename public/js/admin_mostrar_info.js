function escribir_info_vino(codigo_vino, nombre, precio, stock, pais_vino, region, cosecha, bodega, imagen) {
    info = document.querySelectorAll(".info");
    info[0].src = "../../" + imagen;
    info[1].innerText = nombre;
    info[2].innerText = pais_vino;
    info[3].innerText = region;
    info[4].innerText = cosecha;
    info[5].innerText = "$ " + precio;
    info[6].innerText = "Stock: " + stock;
}

function escribir_info_bodega(nombre_bodega, email, direccion, pais_bodega, ciudad, cuenta, codpostal) {
    info = document.querySelectorAll(".infob");
    info[0].innerText = nombre_bodega;
    info[1].innerText = pais_bodega;
    info[2].innerText = ciudad;
    info[3].innerText = "Cuenta: " + cuenta;
    info[4].innerText = direccion;
    info[5].innerText = "Cod. Postal: " + codpostal;
    info[6].innerText = email;
}