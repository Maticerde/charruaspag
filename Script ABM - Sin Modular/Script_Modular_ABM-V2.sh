#!/bin/bash
clear

sleep 0.3
echo "================================================================"
sleep 0.1
echo ╔═══╦═══╦═══╦═══╦═══╦════╦═══╗╔═══╦═══╦═══╦════╦╗╔╗╔╦═══╦═══╦═══╗
sleep 0.1
echo ║╔═╗║╔══╣╔═╗║╔═╗║╔═╗║╔╗╔╗║╔══╝║╔═╗║╔═╗║╔══╣╔╗╔╗║║║║║║╔═╗║╔═╗║╔══╝
sleep 0.1
echo ║╚═╝║╚══╣╚══╣║░╚╣║░║╠╝║║╚╣╚══╗║╚══╣║░║║╚══╬╝║║╚╣║║║║║║░║║╚═╝║╚══╗
sleep 0.1
echo ║╔╗╔╣╔══╩══╗║║░╔╣╚═╝║░║║░║╔══╝╚══╗║║░║║╔══╝░║║░║╚╝╚╝║╚═╝║╔╗╔╣╔══╝
sleep 0.1
echo ║║║╚╣╚══╣╚═╝║╚═╝║╔═╗║░║║░║╚══╗║╚═╝║╚═╝║║░░░░║║░╚╗╔╗╔╣╔═╗║║║╚╣╚══╗
sleep 0.1
echo ╚╝╚═╩═══╩═══╩═══╩╝░╚╝░╚╝░╚═══╝╚═══╩═══╩╝░░░░╚╝░░╚╝╚╝╚╝░╚╩╝╚═╩═══╝

sleep 0.3
echo "================================================================"
sleep 0.3
echo "¿Que desea hacer?"
sleep 0.3
echo "================================================================"
sleep 0.3
echo ""

opciones=("Usuarios" "Grupos" "Salir")
select opcion in "${opciones[@]}"
do

echo "================================================="

# PRIMER CASE | USUARIOS, GRUPOS, SALIR #
case $opcion in

# SEGUNDO CASE | CREAR, ELIMINAR, VOLVER #
"Usuarios") echo "Gestionar Usuarios."
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
;;

# FIN SEGUNDO CASE #

# TERCER CASE | CREAR, ELIMINAR, VOLVER |

"Grupos") echo "Gestionar Grupos."
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
;;

# FIN TERCER CASE #

"Salir") echo "¡Hasta Luego!"; exit
;;

*) echo "Opcion no valida."
;;


        esac
echo "------Precione ENTER para continuar-----"
done

# | FIN PRIMER CASE Y DEL CODIGO |













