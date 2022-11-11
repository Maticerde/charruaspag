
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

function carga_form_modb(idbodega) {
    // envío por fetch el ID de bodega del vino clickeado a un controlador que iguala esta ID a la bodega correspondiente y devuelve sus datos
    const formulario_modb = document.getElementById("input_grid_modb");
    const data = new FormData();
    data.set("idbodega", idbodega);
    data.set("flagform", "flagform")

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
            formulario_modb.innerHTML = texto;
        })
        .catch(function (err) {
            console.log(err);
        });
}
