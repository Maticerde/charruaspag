#!/bin/bash

clear

cd /home/proyecto

cp Vinos_Charruas.sql /home/proyecto/server/respaldos

cd /home/proyecto/server/respaldos


tar -czvf Vinos_Charruas-$(date +%F_%H_%M).tar.gz *.sql

rm -rf *.sql

echo ===================================== 
echo ¡Se ha respladado las Bases de Datos! 
echo ===================================== 
