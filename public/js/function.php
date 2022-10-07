<script type="text/javascript">
let carticon = document.querySelector("#cart-icon");
carticon.addEventListener("click", cartanimation);

desplegables = [];
desplegado=false;
function desplegar(nodo) {
  desplegables.push(nodo);
  desplegables.forEach(element => {
    if (document.getElementById(element + '-desp').classList.contains('open')) {
      document.getElementById(element + '-desp').classList.remove('open');
  }
  });
  desplegable = document.getElementById(nodo + '-desp');
  if (desplegado==false) { // se da delay al cambiarse de un desplegable a otro, evita el delay cuando es el primero en abrirse
    desplegable.classList.toggle('open');
    desplegado=true;
  }else {
    setTimeout(() =>   desplegable.classList.toggle('open'), 600);
  }

}

function cerrar_nodo() {
  desplegable.classList.remove('open');
  desplegables.length = 0;
  desplegado=false;
}

function cartanimation() { //funcion de despliegue de carrito
  let panel = document.querySelector("#cart").classList.toggle("toggled");
  let carticon = document
    .querySelector("#cart-icon")
    .classList.toggle("toggled");
  let arrow = document.querySelector("#arrow").classList.toggle("toggled");
}

var carrito = [];
var total = 0;
title = document.getElementById("carrito-title").style.display = "none";
totalcount = document.getElementById("totalcount").style.display = "none";
compraboton = document.getElementById("compraboton").style.display = "none";
borrar = document.getElementById("vaciar").style.display = "none";

if (carrito.length = 1) {
  carticon.style.opacity = "0";
  carticon.style.pointerEvents = "none";
}

function acarrear(numprod, nombre, precio, stock) {
  if (total === 0 && stock > 0) {
    cartanimation();
    carticon.style.opacity = "0.8";
    carticon.style.pointerEvents = "";
  }

  var agrego = true;
  title = document.getElementById("carrito-title").style.display = "";
  totalcount = document.getElementById("totalcount").style.display = "";
  borrar = document.getElementById("vaciar").style.display = "";
  compraboton = document.getElementById("compraboton").style.display = "";

  objeto = {
    name: nombre,
    price: precio,
    pais: '',
    cant: 1,
    stock: stock,
  };
  if (stock == 0) {
    agrego = false;
  }
  if (carrito.length > 0) {
    carrito.forEach((element) => {
      // en caso de que haya algo en el carrito recorro los elementos
      if (element.name == objeto.name) {
        // si el objeto seleccionado ya existe en el carrito la flag 'agrego' da falso
        if (element.cant >= element.stock) {
          // en caso de que la cantidad agregada al carro sea mayor al stock del producto..
          alert("Ya alcanzó el stock maximo de ese producto");
        } else {
          // en caso de que no supere el stock
          element.cant++; // se agrega otra unidad al mismo producto
          total += parseInt(objeto.price); // el precio de la unidad extra se agrega al total
        }
        agrego = false; // si el objeto seleccionado ya existe en el carrito la flag 'agrego' da falso
      }
    });
  }

  if (agrego) {
    // si la flag 'agrego' es verdadero
    carrito.push(objeto); // se agrega al carrito el objeto
    total += parseInt(objeto.price); // se suma al total el objeto agregado al carrito
  }

  carro = document.getElementById("carro-content");
  carro.innerText = "";

  carrito.forEach((element) => {
    // por cada elemento en el carrito, se agrega una línea con la información del producto
    carro.innerText += element.cant + "x $USD " + element.price + " | " + element.name + "\n";
  });

  totalcount = document.getElementById("totalcount");
  totalcount.innerText = "TOTAL: $ " + total; // se escribe el valor total
}

function generar_compra() {
  carrito.forEach(element => {
    fetch_async_compra(element.name, element.stock, element.cant);
  });
}


function fetch_async_compra(name, stock, cant) {
  const data = new FormData();
  data.set("name", name);
  data.set("stock", stock);
  data.set("cant", cant);

  fetch("update_stock.php", {
    method: "POST",
    body: data,
    })
    .then(function(response) {
      if (response.ok) {
        return response.text();
      } else {
        throw "Error";
      }
    })
    .then(function(texto) {
      console.log(texto);
      load_shop();
    })
    .catch(function(err) {
      console.log(err);
    });
}

function vaciarcarrito() {
  total = 0;
  carrito.length = 0;
  carro.innerText = "";
  totalcount.innerText = "";
  borrar = document.getElementById("vaciar").style.display = "none";
  title = document.getElementById("carrito-title").style.display = "none";
  compraboton = document.getElementById("compraboton").style.display = "none";
  carticon.style.pointerEvents = "none";
  carticon.style.opacity = "0";
  cartanimation();
}


function search() {
  const data = new FormData();
  keywords = document.querySelector("#keywords").value;
  data.set("keyword_post", keywords);

  //ya tengo el dato escrito cuando toco el boton, falta enviar por post a implement para actualizar el select y despues loadear shop nuevamente
  fetch("implement.php", {
      method: "POST",
      body: data,
    })
    .then(function(response) {
      if (response.ok) {
        return response.text();
      } else {
        throw "Error";
      }
    })
    .then(function(texto) {
      //load_shop()
      load_filter_shop(texto);
      //alert(texto);
    })
    .catch(function(err) {
      console.log(err);
    });
}

function load_filter_shop(filtro) {
  const market = document.querySelector(".productos-gallery");
  market.innerHTML = filtro;
}



totalcount = document.getElementById("totalcount");
totalcount.innerText = "TOTAL: $ " + total; // se escribe el valor total


arrow = document.getElementById("arrow");
arrow.style.display = 'none';


function myScrollFunc() {
  var y = window.scrollY;
  if (y > 1150) {
    arrow.style.display = '';
  } else {
    arrow.style.display = 'none';
  }
}
window.addEventListener("scroll", myScrollFunc);

function scrollto() {
  window.scroll({
    top: 0,
    behavior: "smooth",
  });
}

//function addheight() {
  //tienda = document.querySelector(".productos-gallery");
  //let $productos_render = tienda.childElementCount;

  //let $tienda_height = 0;
  //console.log($productos_render);
  //for ($i = 5; $i < $productos_render; $i+=5) {
  //$tienda_height += 800;
  //console.log($tienda_height);

  //}
  
  //tienda.style.height = $tienda_height + "px";
//}


//setTimeout(() => addheight(), 400);




</script>