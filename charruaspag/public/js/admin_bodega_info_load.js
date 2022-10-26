
function escribir_info_bodega(idbodega) {
    // envío por fetch el ID de bodega del vino clickeado a un controlador que iguala esta ID a la bodega correspondiente y devuelve sus datos
    const info_bodega = document.getElementById("info-bodega");
    const data = new FormData();
    data.set("idbodega", idbodega);

    fetch("../../controllers/admin_InfoBodega_Controller.php", {
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
            info_bodega.innerHTML = texto;
        })
        .catch(function (err) {
            console.log(err);
        });
}
