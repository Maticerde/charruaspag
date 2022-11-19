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


opciones=("Configurar Firewall" "Salir")
select opcion in "${opciones[@]}"
do

case $opcion in

"Ver Intentos de Login")

sudo apt install ufw
sudo ufw enable


sudo ufw allow OpenSSH
sudo ufw allow ssh


sudo ufw logging on

sudo ufw allow 2666

sudo ufw allow 80
sudo ufw allow http
sudo ufw allow 80/tcp
;;


"Salir") echo "¡Hasta Luego!"; exit
;;

*) echo "Opcion no valida."

	esac
echo "------Precione ENTER para continuar-----"
done

