#!/bin/bash
clear

sleep 0.3
echo "==============================================================="
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


echo "==============================================================="
sleep 0.3
echo "¿Que desea hacer?"
sleep 0.3
echo "==============================================================="
sleep 0.3
echo ""

opciones=("Usuarios" "Grupos" "Salir")
select opcion in "${opciones[@]}"
do

echo "================================================="

# PRIMER CASE | USUARIOS, GRUPOS, SALIR #
case $opcion in

"Usuarios") sh ./Script_Modular_Usuarios-V2.sh
;;

"Grupos") sh ./Script_Modular_Grupos-V2.sh
;;

"Salir")  sh ./Script_Modular_Salir-V2.sh; exit 2
;;

*) echo "Opcion no valida."
;;


        esac
echo "------Precione ENTER para continuar-----"

done

# | FIN PRIMER CASE Y DEL CODIGO |













