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

sleep 0.3
echo "================================================================"
sleep 0.3
echo "¿Que desea hacer?"
sleep 0.3
echo "================================================================"
sleep 0.3
echo ""

opciones=("Ver Intentos de Login" "Salir")
select opcion in "${opciones[@]}"
do

case $opcion in


"Ver Intentos de Login") sh ./Script_Intentos_Login-Intentos.sh
;;

"Salir") echo "¡Hasta Luego!"; exit
;;

*) echo "Opcion no valida."

	esac
echo "------Precione ENTER para continuar-----"
done


















