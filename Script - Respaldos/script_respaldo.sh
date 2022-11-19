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

opciones=("Realizar Respaldo" "Salir")
select opcion in "${opciones[@]}"
do

case $opcion in

"Realizar Respaldo") 
cd /home/proyecto

cp Vinos_Charruas.sql /home/proyecto/server/respaldos

cd /home/proyecto/server/respaldos


tar -czvf Vinos_Charruas-$(date +%F_%H_%M).tar.gz *.sql

rm -rf *.sql

echo ===================================== 
echo ¡Se ha respladado las Bases de Datos! 
echo ===================================== 
;;

"Salir") echo "¡Hasta Luego!"; exit
;;

*) echo "Opcion no valida."

	esac
echo "------Precione ENTER para continuar-----"
done
