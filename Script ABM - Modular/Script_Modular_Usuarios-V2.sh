#!/bin/bash

# SEGUNDO CASE | CREAR, ELIMINAR, VOLVER #

opciones2=("Crear" "Eliminar" "Volver")
select opcion2 in "${opciones2[@]}"
do

clear

case $opcion2 in

"Crear") echo "Introduzca el nombre del usuario a crear."
read usu
sudo useradd $usu
echo "Listo"
;;

"Eliminar") echo "Introduzca el nombre de usuario a eliminar."
read del
sudo userdel $del
echo "Listo"
;;

"Volver") echo "Volviendo.."; break 1
;;

*) echo "Esa opcion no es valida."
;;

        esac

echo "--------ENTER para continuar--------"

done


# FIN SEGUNDO CASE #

