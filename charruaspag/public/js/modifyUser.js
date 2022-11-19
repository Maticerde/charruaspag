function escribir_info_user(CI_Cliente, direccion, ciudad, nombre, email, contrasenia) {
    info = document.querySelectorAll(".modificarperfil");
    info[0].innerText = CI_Cliente;
    info[1].innerText = direccion;
    info[2].innerText = ciudad;
    info[3].innerText = nombre;
    info[4].innerText = email;
    info[5].innerText = contrasenia;
}