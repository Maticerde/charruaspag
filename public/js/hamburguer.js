setTimeout(() => altura = document.querySelector("#panel_menu").clientHeight, 100);
let burger = document.querySelector("#hamburguer");
let panel_menu = document.querySelector("#panel_menu");
setTimeout(() => panel_menu.style.height = "0px", 150);


function desplegarpanel() {
    burger.classList.toggle("girar");

    if (panel_menu.classList.contains("flag")) {
        panel_menu.classList.remove("flag");
        panel_menu.style.height = "0px";
    } else {
        panel_menu.classList.toggle("flag");
        panel_menu.style.height = altura + "px";
    }

}

