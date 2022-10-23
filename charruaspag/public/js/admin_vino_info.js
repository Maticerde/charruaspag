function escribir_info_vino(codigo_vino, nombre, precio, stock, pais, region, cosecha, bodega, imagen) {
    info = document.querySelectorAll(".info");
    info[0].src = "../../" + imagen;
    info[1].innerText = nombre;
    info[2].innerText = pais;
    info[3].innerText = region;
    info[4].innerText = cosecha;
    info[5].innerText = "$ " + precio;
    info[6].innerText = "Stock: " + stock;
    
}