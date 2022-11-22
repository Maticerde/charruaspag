
arrow = document.getElementById("arrow");
menu = document.getElementById("menu");
let auxflag = true;

function myScrollFunc() {
  let y = window.scrollY;
  if (y > 1100) {
    arrow.style.top = "60px";
    if (!menu.classList.contains("llevarmenu") && auxflag) {
      menu.style.top = "-57px";
      menu.classList.add("llevarmenu");
      setTimeout(() => menu.style.top = "0px", 100);
    } 
  } else {
    arrow.style.top = "-50px";
    if (menu.classList.contains("llevarmenu") && auxflag) {
      menu.style.top = "-57px";
      setTimeout(() => menu.classList.remove("llevarmenu"), 500);
      setTimeout(() => menu.style.top = "0", 500);
      setTimeout(() => menu.style.top = "", 1000);
      auxflag = false; // previene el inicio de otra animacion hasta que termine la actual
      setTimeout(() => auxflag = true, 1000);
    }
  }
}
window.addEventListener("scroll", myScrollFunc);
window.addEventListener("load", myScrollFunc);
function scrollto() {
  window.scroll({
    top: 0,
    behavior: "smooth",
  });
}
function scrolltoBottom() {
  window.scroll({
    top: 100000,
    behavior: "smooth",
  });
}

