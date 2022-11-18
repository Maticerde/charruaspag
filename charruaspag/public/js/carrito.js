let carticon = document.querySelector("#cart-icon");
carticon.addEventListener("click", cartanimation);
let cartcount = document.querySelector("#cart-count");

function cartanimation() { //funcion de despliegue de carrito
    let panel = document.querySelector("#cart").classList.toggle("toggled");
    let arrow = document.querySelector("#arrow").classList.toggle("toggled");
    body = document.querySelector("body").classList.toggle("hide_scrollbar");
    let menu = document.querySelector("#menu").classList.toggle("hide_scrollbar");
    try { //intenta aplicar una clase a un elemento que solo se encuentra en la pagina principal
        let deco = document.querySelector("#deco-bstext").classList.toggle("hide_scrollbar"); 
    } catch (error) {
        // ignoramos el error ya que no nos afecta en nada
    }

    block_scroll();
}

var carrito = [];
var total = 0;
title = document.getElementById("carrito-title").style.display = "none";
totalcount = document.getElementById("totalcount").style.display = "none";
cartbotones = document.getElementById("cart-buttons").style.display = "none";

if ((carrito.length = 1)) {
    carticon.style.opacity = "0.7";
    carticon.style.pointerEvents = "none";
}

function acarrear(cantidad, nombre, precio, stock, imagen, pais) { // funcion de añadido de objetos al carrito
    if (total === 0 && stock > 0) {
        carticon = document.querySelector("#cart-icon").style.pointerEvents = "";
        title = document.getElementById("carrito-title").style.display = "";
        totalcount = document.getElementById("totalcount").style.display = "";
        cartbotones = document.getElementById("cart-buttons").style.display = "";
        cartanimation();
    }

    var agrego = true;

    objeto = {
        name: nombre,
        pais: pais,
        cant: cantidad,
        price: precio,
        stock: stock,
        imagen: imagen,
    };

    if (objeto.stock == 0) {
        agrego = false;
    }
    if (carrito.length > 0) {
        carrito.forEach((element) => {
            // en caso de que haya algo en el carrito recorro los elementos
            if (element.name == objeto.name) {
                // si el objeto seleccionado ya existe en el carrito la flag 'agrego' da falso
                if (element.cant + objeto.cant > element.stock) {
                    // en caso de que la cantidad agregada al carro sea mayor al stock del producto..
                    alert("Ya alcanzó el stock maximo de ese producto");
                } else {
                    if (objeto.cant + element.cant < 1) { // si tenemos un producto con cantidad negativa...
                        let index = carrito.indexOf(element);
                        carrito.splice(index, 1); // eliminamos el producto del carrito
                        cartcount.innerText = (carrito.length - 1);
                        if (carrito.length == 1) {
                            vaciarcarrito(); // si eliminamos el último producto del carrito, se vacía
                            exit();
                        }
                    }
                    carticon = document.querySelector("#cart-icon").classList.toggle("animatecart");
                    setTimeout(() => carticon = document.querySelector("#cart-icon").classList.toggle("animatecart"), 200);
                    // en caso de que no supere el stock
                    total += parseInt(objeto.price) * parseInt(objeto.cant); // el precio de las unidades extra se agregan al total
                    element.cant += objeto.cant; // se agregan las unidades al producto

                }
                agrego = false; // si el objeto seleccionado ya existe en el carrito la flag 'agrego' da falso
            }
        });
    }

    if (agrego) {
        cartcount.innerText = carrito.length;
        cartcount.style.background = "#800b18";
        carticon = document.querySelector("#cart-icon").classList.toggle("animatecart");
        setTimeout(() => carticon = document.querySelector("#cart-icon").classList.toggle("animatecart"), 200);
        // si la flag 'agrego' es verdadero
        carrito.push(objeto); // se agrega al carrito el objeto
        total += parseInt(objeto.price) * parseInt(objeto.cant); // se suma al total el objeto agregado al carrito
    }

    carro = document.getElementById("carro-content");
    carro.innerText = "";

    let aux = 0;
    carrito.forEach((element) => {
        // por cada elemento en el carrito, se agrega una línea con la información del producto
        carro.innerHTML +=
            "<div id='cart-item'><img src=\"" + element.imagen + "\"><div id='cart-restar' onclick='cart_cant_verify(" + -1 + ",\"" + element.name + "\",\"" + element.price + "\",\"" + element.stock + "\",\"" + element.imagen + "\",\"" + element.pais + "\",\"" + aux + "\");'>-</div><input type='number' min='1' max='100' onkeyup=verificar_num(this) value='1' class='cart-cant' id='cart-cant" + aux + "'></input><div id='cart-sumar' onclick='cart_cant_verify(" + 1 + ",\"" + element.name + "\",\"" + element.price + "\",\"" + element.stock + "\",\"" + element.imagen + "\",\"" + element.pais + "\",\"" + aux + "\");'>+</div><p1>" + element.cant + " x $ " + element.price + "</p1><p3>" + element.name + "</p3><p4>" + element.pais + "</p4></div>"
        aux++;
    });

    totalcount = document.getElementById("totalcount");
    totalcount.innerText = "Total: $ " + total; // se escribe el valor total
}

function cart_cant_verify(cantidad, nombre, precio, stock, imagen, pais, num_input) {
    cart_cant_pick = document.querySelector("#cart-cant" + num_input).value;
    if (cantidad > 0) { //si le di al botón +
        acarrear(parseInt(cart_cant_pick), nombre, precio, stock, imagen, pais);
    } else { //si le di al botón -
        acarrear(-(parseInt(cart_cant_pick)), nombre, precio, stock, imagen, pais);
    }

}

function generar_compra() { //funcion que llama a un fetch por cada producto en el carrito
    carrito.forEach((element) => {
        fetch_async_compra(element.name, element.stock, element.cant);
    });
}

function fetch_async_compra(name, stock, cant) { //fetch de envío de datos asíncronos
    const data = new FormData();
    data.set("name", name);
    data.set("stock", stock);
    data.set("cant", cant);

    fetch("controllers/Stock_Controller.php", {
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
            console.log(texto);
            load_shop();
        })
        .catch(function (err) {
            console.log(err);
        });
}

function vaciarcarrito() {
    contador = 0;
    total = 0;
    carrito.length = 1;
    carro.innerText = "";
    totalcount.innerText = "";
    cartcount.innerText = "";
    cartcount.style.background = "none";
    title = document.getElementById("carrito-title").style.display = "none";
    cartbotones = document.getElementById("cart-buttons").style.display = "none";
    carticon = document.querySelector("#cart-icon").style.pointerEvents = "none";
    cartanimation();
}

function alertacarrito() {
    alert("Para comprar productos, primero debes iniciar sesión");
}

function block_scroll() { // bloquea el desplazamiento si nuestro cursor esta en el carrito (solo chrome)
    let cart = document.querySelector('#cart');
    let close_cart = document.querySelector('#close_cart');

    if (cart.classList.contains("toggled")) {
        cart.addEventListener('mouseover', preventScroll => {
            body = document.querySelector("body").classList.toggle("overflowfix");
        });
        cart.addEventListener('mouseout', normallyScroll => {
            body = document.querySelector("body").classList.remove("overflowfix");
        });
    } else {
        close_cart.style.display = "none";

        cart.addEventListener('mouseover', Scroll => {
            body = document.querySelector("body").classList.remove("overflowfix");
        });
        setTimeout(() => close_cart.style.display = "", 500);
    }
}

function verificar_num(input) {
    if (input.value != "") {
        if (parseInt(input.value) < parseInt(input.min)) {
            input.value = input.min;
        }
        if (parseInt(input.value) > parseInt(input.max)) {
            input.value = input.max;
        }
    }
}