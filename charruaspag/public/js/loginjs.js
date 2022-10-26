// document
//   .getElementById("login_button")
//   .addEventListener("click", function (event) {
//     event.preventDefault();
//     login();
//   });

// let flag_change_pss = false;

// let bd_users = [
//   ["German", "2610"],
//   ["Gonzalo", "3407"],
//   ["Gonzalo", "1010"],
//   ["Matias", "3217"],
// ];

// function login() {
//   let user = document.getElementById("user").value,
//     password = document.getElementById("password").value,
//     user_validate = false;

//   if (
//     user == "" ||
//     user == null ||
//     user == " " ||
//     password == "" ||
//     password == null ||
//     password == " "
//   ) {
//     mensaje("existen campos vacíos.");
//   } else {
//     bd_users.forEach((usuario) => {
//       if (usuario[0] == user && usuario[1] == password) {
//         user_validate = true;
//       }
//     });

//     if (user_validate) {
//       mensaje("credenciales válidas.");
//       return 1;
//     } else {
//       mensaje("credenciales inválidas");
//       return 0;
//     }
//   }
// }

// function mensaje() {
//   document.getElementById("mensaje").value = mensaje;
//   document.getElementById("mensaje").style.opacity = "1";

//   setTimeout(reset_mensaje, 6000);

//   function reset_mensaje() {
//     document.getElementById("mensaje").value = " ";
//     document.getElementById("mensaje").style.opacity = "0";
//   }
// }

// function add_usr() {
//   let user = document.getElementById("user").value,
//     password = document.getElementById("password").value;

//   if (user != "" && password !== "" && (user != null) & (password != null)) {
//     new_user = [usr, psswd];
//     bd_users.push(new_user);
//     mensaje("usuario agregado.");
//     document.getElementById("user").value = "";
//     document.getElementById("password").value = "";
//   } else {
//     mensaje("existen campos incorrectos.");
//   }
// }

// function change_pass() {
//   let user_change;
//   if (!flag_change_pass) {
//     if (login()) {
//       mensaje("ingrese nueva password y presione change.");
//       user_change = document.getElementById("user").value;
//       flag_change_pass = true;
//     }
//   } else {
//     bd_users.forEach((usuario) => {
//       if (usuario[0] == user_change) {
//         usuario[1] = document.getElementById("password").value;
//       }
//       mensaje("password cambiada correctamente.");
//       flag_change_pass = false;
//     });
//   }
// }
