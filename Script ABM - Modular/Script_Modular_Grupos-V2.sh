#!/bin/bash

# TERCER CASE | CREAR, ELIMINAR, VOLVER |

opciones3=("Crear" "Eliminar" "Volver")
select opcion3 in "${opciones3[@]}"
do

clear

case $opcion3 in

"Crear") echo "Introduzca el nombre del grupo a crear."
read grup
sudo groupadd $grup
echo "Listo"
;;

"Eliminar") echo "Introduzca el nombre del grupo a eliminar."
read delgrup
sudo groupdel $delgrup
echo "Listo"
;;

"Volver") echo "Volviendo.."; break 1
;;

*) echo "Esa opcion no es valida."
;;

        esac
echo "--------ENTER para continuar--------"

done


# FIN TERCER CASE #

