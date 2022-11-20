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

sleep 0.3
echo "==============================================================="
sleep 0.3
echo "Para Continuar selecione una opcion:"
sleep 0.3
echo "==============================================================="
echo ""



opciones=("Instalar Entorno de Trabajo" "Salir")
select opcion in "${opciones[@]}"
do

echo "==============================================================="
echo ""

case $opcion in

"Instalar Entorno de Trabajo") echo "Instalando Entorno"

echo "=================================================="
echo "Actualizando el Entorno"
echo "=================================================="
echo ""
sleep 2
sudo apt-get -y update && sudo apt-get -y upgrade && sudo apt-get -y dist-upgrade

echo "=================================================="
echo "¡Actualizacion completada correctamente!"
echo "=================================================="
echo ""
sleep 2

echo "=================================================="
echo "Instalando paquetes necesarios"
echo "=================================================="
echo ""

sudo apt -y install net-tools
sudo apt -y install nano
sudo apt -y install openssh-server
sudo apt -y install openssh-client
sudo apt -y install mysql-server
sudo apt -y install mysql-client
sudo apt -y install network-manager
sudo apt -y install apache2
sudo apt -y install php8.1

echo "=================================================="
echo "¡Paquetes instalados!"
echo "=================================================="
echo ""
sleep 2


echo "=================================================="
echo "Configurando SSH"
echo "=================================================="
echo ""


echo "Port 2666" >> /etc/ssh/sshd_config
echo "PermitRootLogin yes" >> /etc/ssh/sshd_config

echo "==================================================="
echo "Ingrese nombre y contraseña para la llave (OPCIONAL)"
echo "==========PRESIONE INTRO PARA SALTAR==============="
echo ""

ssh-keygen -t rsa

ls /root/.ssh/

systemctl restart ssh
systemctl restart sshd

cd
cd /home/proyecto/server/script_recovery
mkdir ssh_configuracion
chmod 755 ssh_configuracion

cd ssh_configuracion

touch ssh_config.sh
chmod 755 ssh_config.sh

echo "#!/bin/bash" >> ssh_config

echo "echo "Port 2666" >> /etc/ssh/sshd_config" >> ssh_config.sh
echo "echo "PermitRootLogin yes" >> /etc/ssh/sshd_config" >> ssh_config.sh


echo "ssh-keygen -t rsa" >> ssh_config.sh

echo "ls /root/.ssh/" >> ssh_config.sh


echo "systemctl restart ssh" >> ssh_config.sh
echo "systemctl restart sshd" >> ssh_config.sh


echo "=================================================="
echo "¡Configuracion Completada!"
echo "=================================================="
echo ""
sleep 1

echo "=================================================="
echo "Creando usuarios del sistema "
echo "=================================================="
echo ""

sudo useradd Usuario

sudo useradd Administrador

echo "=================================================="
echo "¡Usuarios Creados!"
echo "=================================================="
echo ""

sleep 2
echo "=================================================="
echo "Creando Archivos de Centro de Computos y respaldos"
echo "=================================================="
echo ""

cd /home

mkdir proyecto
chmod 777 proyecto

cd proyecto

mkdir server
chmod 777 server

cd server

mkdir respaldos
chmod 777 respaldos
mkdir script_recovery
chmod 777 script_recovery

echo "=================================================="
echo "¡Archivos Creados!"
echo "=================================================="
echo ""


sleep 2
echo "=================================================="
echo "Integrando Base de Datos"
echo "=================================================="

cd
cd /home/proyecto


touch Vinos_Charruas.sql
chmod 755 Vinos_Charruas.sql

echo "DROP DATABASE IF EXISTS Vinos_Charruas;" >> Vinos_Charruas.sql
echo "CREATE DATABASE IF NOT EXISTS Vinos_Charruas;" >> Vinos_Charruas.sql

echo "USE Vinos_Charruas;" >> Vinos_Charruas.sql

echo "CREATE TABLE BODEGA(" >> Vinos_Charruas.sql
echo "ID_Bodega int auto_increment," >> Vinos_Charruas.sql
echo "Nombre_Bodega VARCHAR (40)," >> Vinos_Charruas.sql
echo "Email_Bodega VARCHAR (50) not null," >> Vinos_Charruas.sql
echo "Direccion VARCHAR (70)," >> Vinos_Charruas.sql
echo "Pais VARCHAR (25)," >> Vinos_Charruas.sql
echo "Ciudad VARCHAR (25)," >> Vinos_Charruas.sql
echo "Cuenta INT not null," >> Vinos_Charruas.sql
echo "Primary key (ID_Bodega)" >> Vinos_Charruas.sql
echo ");" >> Vinos_Charruas.sql

echo "CREATE TABLE VINOS(" >> Vinos_Charruas.sql
echo "Codigo_Vino int auto_increment," >> Vinos_Charruas.sql
echo "Nombre_Vino VARCHAR (20) not null," >> Vinos_Charruas.sql
echo "Precio DECIMAL not null check(Precio>0)," >> Vinos_Charruas.sql
echo "Bodega_Vino int," >> Vinos_Charruas.sql
echo "Stock INT not null check(Stock>=0)," >> Vinos_Charruas.sql
echo "Crianza VARCHAR (20)," >> Vinos_Charruas.sql
echo "Pais VARCHAR (20)," >> Vinos_Charruas.sql
echo "Region VARCHAR (50)," >> Vinos_Charruas.sql
echo "Cosecha VARCHAR (20)," >> Vinos_Charruas.sql
echo "Descripcion VARCHAR (100)," >> Vinos_Charruas.sql
echo "Primary key (Codigo_Vino)," >> Vinos_Charruas.sql
echo "Foreign key (Bodega_Vino) references BODEGA (ID_Bodega)" >> Vinos_Charruas.sql
echo ");" >> Vinos_Charruas.sql

echo "CREATE TABLE CLIENTES(" >> Vinos_Charruas.sql
echo "Codigo_Cliente int auto_increment," >> Vinos_Charruas.sql
echo "CI_Cliente char (8) not null unique," >> Vinos_Charruas.sql
echo "Nombre_Cliente VARCHAR (20)," >> Vinos_Charruas.sql
echo "Direccion VARCHAR (70)," >> Vinos_Charruas.sql
echo "Ciudad VARCHAR (25)," >> Vinos_Charruas.sql
echo "Email_Cliente VARCHAR (50)," >> Vinos_Charruas.sql
echo "Contrasenia VARCHAR (35) not null," >> Vinos_Charruas.sql
echo "Primary key (Codigo_Cliente)" >> Vinos_Charruas.sql
echo ");" >> Vinos_Charruas.sql

echo "CREATE TABLE TEL_CLIENTE(" >> Vinos_Charruas.sql
echo "Cod_Cliente int," >> Vinos_Charruas.sql
echo "Telefono_Cliente CHAR (9)," >> Vinos_Charruas.sql
echo "Primary key (Cod_CLiente, Telefono_Cliente)," >> Vinos_Charruas.sql
echo "Foreign key (Cod_Cliente) references CLIENTES (Codigo_Cliente)" >> Vinos_Charruas.sql
echo ");" >> Vinos_Charruas.sql

echo "CREATE TABLE TEL_BODEGA(" >> Vinos_Charruas.sql
echo "Cod_Bodega int," >> Vinos_Charruas.sql
echo "Telefono_Bodega CHAR (9)," >> Vinos_Charruas.sql
echo "Primary key (Cod_Bodega, Telefono_Bodega)," >> Vinos_Charruas.sql
echo "Foreign key (Cod_Bodega) references BODEGA (ID_BODEGA)" >> Vinos_Charruas.sql
echo ");" >> Vinos_Charruas.sql

echo "CREATE TABLE EMPLEADOS(" >> Vinos_Charruas.sql
echo "Codigo_Empleado int auto_increment," >> Vinos_Charruas.sql
echo "Nombre_Empleado VARCHAR (20)," >> Vinos_Charruas.sql
echo "CI_Empleado char (8) not null unique," >> Vinos_Charruas.sql
echo "Salario INT not null check(Salario>=0)," >> Vinos_Charruas.sql
echo "Email_Emplaedo VARCHAR (50)," >> Vinos_Charruas.sql
echo "Contasenia VARCHAR (35) not null," >> Vinos_Charruas.sql
echo "Primary key (Codigo_Empleado)" >> Vinos_Charruas.sql
echo ");" >> Vinos_Charruas.sql

echo "CREATE TABLE TEL_EMPLEADO(" >> Vinos_Charruas.sql
echo "Cod_Empleado int," >> Vinos_Charruas.sql
echo "Telefono_Empleado CHAR (9)," >> Vinos_Charruas.sql
echo "Primary key (Cod_Empleado, Telefono_Empleado)," >> Vinos_Charruas.sql
echo "Foreign key (Cod_Empleado) references EMPLEADOS (Codigo_Empleado)" >> Vinos_Charruas.sql
echo ");" >> Vinos_Charruas.sql

echo "CREATE TABLE VENTAS(" >> Vinos_Charruas.sql
echo "Codigo_Venta int auto_increment," >> Vinos_Charruas.sql
echo "Fecha_Venta DATETIME not null," >> Vinos_Charruas.sql
echo "cliente int not null," >> Vinos_Charruas.sql
echo "primary key (Codigo_Venta, Fecha_Venta)," >> Vinos_Charruas.sql
echo "foreign key (cliente) references CLIENTES (Codigo_Cliente)" >> Vinos_Charruas.sql
echo ");" >> Vinos_Charruas.sql

echo "CREATE TABLE DETALLEVENTA(" >> Vinos_Charruas.sql
echo "Cod_Detalle_Ven int auto_increment," >> Vinos_Charruas.sql
echo "Cod_Venta int not null," >> Vinos_Charruas.sql
echo "Vinos_DetalleV int not null," >> Vinos_Charruas.sql
echo "Cantidad_DetalleV int not null check (Cantidad_DetalleV>0)," >> Vinos_Charruas.sql
echo "Costo_DetalleDV decimal not null check(Costo_DetalleDV>0)," >> Vinos_Charruas.sql
echo "Primary key (Cod_Detalle_Ven)," >> Vinos_Charruas.sql
echo "Foreign key (Vinos_DetalleV) references VINOS (Codigo_Vino)," >> Vinos_Charruas.sql
echo "Foreign key (Cod_Venta) references VENTAS (Codigo_Venta)" >> Vinos_Charruas.sql
echo ");" >> Vinos_Charruas.sql

echo "CREATE TABLE COMPRAS(" >> Vinos_Charruas.sql
echo "Codigo_Compra int auto_increment," >> Vinos_Charruas.sql
echo "Fecha_Compra datetime not null," >> Vinos_Charruas.sql
echo "Bodega int not null," >> Vinos_Charruas.sql
echo "Empleado int not null," >> Vinos_Charruas.sql
echo "primary key(Codigo_Compra)," >> Vinos_Charruas.sql
echo "foreign key (Bodega) references BODEGA (ID_Bodega)," >> Vinos_Charruas.sql
echo "foreign key (Empleado) references EMPLEADOS (Codigo_Empleado)" >> Vinos_Charruas.sql
echo ");" >> Vinos_Charruas.sql

echo "CREATE TABLE DETALLECOMPRA(" >> Vinos_Charruas.sql
echo "Cod_Detalle_Com int auto_increment," >> Vinos_Charruas.sql
echo "Cod_Compra int not null," >> Vinos_Charruas.sql
echo "Vinos_DetalleC int not null," >> Vinos_Charruas.sql
echo "Cantidad_DetalleC int not null check(Cantidad_DetalleC>0)," >> Vinos_Charruas.sql
echo "Costo_DetalleC decimal not null check(Costo_DetalleC>0)," >> Vinos_Charruas.sql
echo "Primary key (Cod_Detalle_Com)," >> Vinos_Charruas.sql
echo "Foreign key (Vinos_DetalleC) references VINOS (Codigo_Vino)," >> Vinos_Charruas.sql
echo "Foreign key (Cod_Compra) references COMPRAS (Codigo_Compra)" >> Vinos_Charruas.sql
echo ");" >> Vinos_Charruas.sql

echo "insert into BODEGA (Nombre_Bodega, Email_Bodega, Direccion, Pais, Ciudad, Cuenta) values ('Establecimiento Juanico', 'establecimiento@gmail.com', 'Ruta 5 Km 30', 'Uruguay','Canelones', 27);" >> Vinos_Charruas.sql
echo "insert into BODEGA (Nombre_Bodega, Email_Bodega, Direccion, Pais, Ciudad, Cuenta) values ('Bodega Roses', 'bodegaroses@gmail.com', 'Ruta 6 S/N - Km 30,200', 'Uruguay', 'Canelones', 57);" >> Vinos_Charruas.sql
echo "insert into BODEGA (Nombre_Bodega, Email_Bodega, Direccion, Pais, Ciudad, Cuenta) values ('Concha y Toro', 'conchaytoro@gmail.com', 'Avenida Virginia Subercaseaux 210 9480092 Pirque', 'Chile', 'Santiago',  17);" >> Vinos_Charruas.sql
echo "insert into BODEGA (Nombre_Bodega, Email_Bodega, Direccion, Pais, Ciudad, Cuenta) values ('Bodega Garzon', 'garzon@gmail.com', 'Ruta 9 Km. 175, Garzon 20401', 'Uruguay', 'Maldonado', 37);" >> Vinos_Charruas.sql
echo "insert into BODEGA (Nombre_Bodega, Email_Bodega, Direccion, Pais, Ciudad, Cuenta) values ('Santa Rosa', 'santarosa@gmail.com', '2218 Ruta Cesar Mayo Gutierrez', 'Uruguay', 'Montevideo', 27);" >> Vinos_Charruas.sql

echo "insert into VINOS (Nombre_Vino, Precio, Bodega_Vino, Stock, Crianza, Pais, Region, Cosecha, Descripcion) values ('Santa Teresa', 24, 1, 15, '-', 'Uruguay', 'Canelones', 2022, '-');" >> Vinos_Charruas.sql
echo "insert into VINOS (Nombre_Vino, Precio, Bodega_Vino, Stock, Crianza, Pais, Region, Cosecha, Descripcion) values ('Casillero del Diablo', 50, 3, 5, '-', 'Chile', 'Santiago', 2022, '-');" >> Vinos_Charruas.sql
echo "insert into VINOS (Nombre_Vino, Precio, Bodega_Vino, Stock, Crianza, Pais, Region, Cosecha, Descripcion) values ('Vino Roses', 15, 2, 17, '-', 'Uruguay', 'Canelones', 2022, '-');" >> Vinos_Charruas.sql
echo "insert into VINOS (Nombre_Vino, Precio, Bodega_Vino, Stock, Crianza, Pais, Region, Cosecha, Descripcion) values ('Balasto', 56, 4, 25, '-', 'Uruguay', 'Maldonado', 2022, '-');" >> Vinos_Charruas.sql
echo "insert into VINOS (Nombre_Vino, Precio, Bodega_Vino, Stock, Crianza, Pais, Region, Cosecha, Descripcion) values ('Don Pascual', 22, 1, 12, '-', 'Uruguay', 'Canelones', 2022, '-');" >> Vinos_Charruas.sql

echo "insert into CLIENTES (CI_Cliente, Nombre_Cliente, Direccion, Ciudad, Email_Cliente, Contrasenia) values (54622348, 'Ramon Alvarez', 'Ruta 5 vieja', 'Las Piedras', 'ramon@gmail.com', '4412fafsf2');" >> Vinos_Charruas.sql
echo "insert into CLIENTES (CI_Cliente, Nombre_Cliente, Direccion, Ciudad, Email_Cliente, Contrasenia) values (54642348, 'Gaston Alvarez', 'AV. Italia', 'Montevideo', 'gaston@gmail.com', '4412314fsf2');" >> Vinos_Charruas.sql
echo "insert into CLIENTES (CI_Cliente, Nombre_Cliente, Direccion, Ciudad, Email_Cliente, Contrasenia) values (51232348, 'Gonzalo Alvarez', 'Calle Ancha', 'Canelones', 'gonzalo@gmail.com', '4412f124fds');" >> Vinos_Charruas.sql
echo "insert into CLIENTES (CI_Cliente, Nombre_Cliente, Direccion, Ciudad, Email_Cliente, Contrasenia) values (52621318, 'Matias Alvarez', 'Cuareim', 'Las Piedras', 'matias@gmail.com', '441246f332f2');" >> Vinos_Charruas.sql
echo "insert into CLIENTES (CI_Cliente, Nombre_Cliente, Direccion, Ciudad, Email_Cliente, Contrasenia) values (54622309, 'Sergio Alvarez', 'San Isidro', 'Las Piedras', 'Sergio@gmail.com', '44122f2');" >> Vinos_Charruas.sql

echo "insert into TEL_CLIENTE (Cod_Cliente, Telefono_Cliente) values (1, 099456782);" >> Vinos_Charruas.sql
echo "insert into TEL_CLIENTE (Cod_Cliente, Telefono_Cliente) values (2, 095234789);" >> Vinos_Charruas.sql
echo "insert into TEL_CLIENTE (Cod_Cliente, Telefono_Cliente) values (3, 098237854);" >> Vinos_Charruas.sql
echo "insert into TEL_CLIENTE (Cod_Cliente, Telefono_Cliente) values (4, 093098457);" >> Vinos_Charruas.sql
echo "insert into TEL_CLIENTE (Cod_Cliente, Telefono_Cliente) values (5, 092345724);" >> Vinos_Charruas.sql

echo "insert into TEL_BODEGA (Cod_Bodega, Telefono_Bodega) values (1, 094789345);" >> Vinos_Charruas.sql
echo "insert into TEL_BODEGA (Cod_Bodega, Telefono_Bodega) values (2, 095234873);" >> Vinos_Charruas.sql
echo "insert into TEL_BODEGA (Cod_Bodega, Telefono_Bodega) values (3, 096437623);" >> Vinos_Charruas.sql
echo "insert into TEL_BODEGA (Cod_Bodega, Telefono_Bodega) values (4, 094342387);" >> Vinos_Charruas.sql
echo "insert into TEL_BODEGA (Cod_Bodega, Telefono_Bodega) values (5, 091342343);" >> Vinos_Charruas.sql

echo "insert into EMPLEADOS (Nombre_Empleado, CI_Empleado, Salario, Email_Emplaedo, Contasenia) values ('Juan Carlos Rodrigez', 58240825, 25000, 'juancarlo@gmail.com', 'ewgdgw232523');" >> Vinos_Charruas.sql
echo "insert into EMPLEADOS (Nombre_Empleado, CI_Empleado, Salario, Email_Emplaedo, Contasenia) values ('Ramon Gutierrez', 58212825, 26000, 'ramon@gmail.com', 'ew121441dsg23');" >> Vinos_Charruas.sql
echo "insert into EMPLEADOS (Nombre_Empleado, CI_Empleado, Salario, Email_Emplaedo, Contasenia) values ('Pablo Perez', 58247659, 25000, 'pablo@gmail.com', 'ewdsgsdg32w123');" >> Vinos_Charruas.sql
echo "insert into EMPLEADOS (Nombre_Empleado, CI_Empleado, Salario, Email_Emplaedo, Contasenia) values ('Gonzalo Gimenez', 58128655, 25000, 'gonzalo@gmail.com', 'ewgasdaadsdqadq');" >> Vinos_Charruas.sql
echo "insert into EMPLEADOS (Nombre_Empleado, CI_Empleado, Salario, Email_Emplaedo, Contasenia) values ('Matias Martinez', 52240825, 25000, 'matias@gmail.com', 'ewgdgw23saf3');" >> Vinos_Charruas.sql

echo "insert into TEL_EMPLEADO (Cod_Empleado, Telefono_Empleado) values (1, 093094586);" >> Vinos_Charruas.sql
echo "insert into TEL_EMPLEADO (Cod_Empleado, Telefono_Empleado) values (2, 095234789);" >> Vinos_Charruas.sql
echo "insert into TEL_EMPLEADO (Cod_Empleado, Telefono_Empleado) values (3, 098343267);" >> Vinos_Charruas.sql
echo "insert into TEL_EMPLEADO (Cod_Empleado, Telefono_Empleado) values (4, 096234324);" >> Vinos_Charruas.sql
echo "insert into TEL_EMPLEADO (Cod_Empleado, Telefono_Empleado) values (5, 098355462);" >> Vinos_Charruas.sql

echo "insert into VENTAS (Fecha_Venta, cliente) values ('2022-08-12', 1);" >> Vinos_Charruas.sql
echo "insert into VENTAS (Fecha_Venta, cliente) values ('2022-08-15', 2);" >> Vinos_Charruas.sql
echo "insert into VENTAS (Fecha_Venta, cliente) values ('2022-08-12', 3);" >> Vinos_Charruas.sql
echo "insert into VENTAS (Fecha_Venta, cliente) values ('2022-03-12', 4);" >> Vinos_Charruas.sql
echo "insert into VENTAS (Fecha_Venta, cliente) values ('2022-06-12', 5);" >> Vinos_Charruas.sql

echo "insert into DETALLEVENTA (Cod_Venta, Vinos_DetalleV, Cantidad_DetalleV, Costo_DetalleDV) values (1, 1, 3, 72);" >> Vinos_Charruas.sql
echo "insert into DETALLEVENTA (Cod_Venta, Vinos_DetalleV, Cantidad_DetalleV, Costo_DetalleDV) values (2, 2, 2, 21);" >> Vinos_Charruas.sql
echo "insert into DETALLEVENTA (Cod_Venta, Vinos_DetalleV, Cantidad_DetalleV, Costo_DetalleDV) values (3, 3, 3, 54);" >> Vinos_Charruas.sql
echo "insert into DETALLEVENTA (Cod_Venta, Vinos_DetalleV, Cantidad_DetalleV, Costo_DetalleDV) values (4, 4, 4, 34);" >> Vinos_Charruas.sql
echo "insert into DETALLEVENTA (Cod_Venta, Vinos_DetalleV, Cantidad_DetalleV, Costo_DetalleDV) values (5, 5, 5, 76);" >> Vinos_Charruas.sql

echo "insert into COMPRAS (Fecha_Compra, Bodega, Empleado) values ('2022-08-19', 1, 1);" >> Vinos_Charruas.sql
echo "insert into COMPRAS (Fecha_Compra, Bodega, Empleado) values ('2022-08-22', 2, 2);" >> Vinos_Charruas.sql
echo "insert into COMPRAS (Fecha_Compra, Bodega, Empleado) values ('2022-08-14', 3, 3);" >> Vinos_Charruas.sql
echo "insert into COMPRAS (Fecha_Compra, Bodega, Empleado) values ('2022-04-12', 4, 4);" >> Vinos_Charruas.sql
echo "insert into COMPRAS (Fecha_Compra, Bodega, Empleado) values ('2022-03-12', 5, 5);" >> Vinos_Charruas.sql

echo "insert into DETALLECOMPRA (Cod_Compra, Vinos_DetalleC, Cantidad_DetalleC, Costo_DetalleC) values (1, 1, 3, 78);" >> Vinos_Charruas.sql
echo "insert into DETALLECOMPRA (Cod_Compra, Vinos_DetalleC, Cantidad_DetalleC, Costo_DetalleC) values (2, 2, 2, 21);" >> Vinos_Charruas.sql
echo "insert into DETALLECOMPRA (Cod_Compra, Vinos_DetalleC, Cantidad_DetalleC, Costo_DetalleC) values (3, 3, 3, 54);" >> Vinos_Charruas.sql
echo "insert into DETALLECOMPRA (Cod_Compra, Vinos_DetalleC, Cantidad_DetalleC, Costo_DetalleC) values (4, 4, 4, 34);" >> Vinos_Charruas.sql
echo "insert into DETALLECOMPRA (Cod_Compra, Vinos_DetalleC, Cantidad_DetalleC, Costo_DetalleC) values (5, 5, 5, 76);" >> Vinos_Charruas.sql

mysql -uroot -p123456 < Vinos_Charruas.sql

sleep 1
echo "=================================================="
echo "¡Base de Datos Integrada!"
echo "=================================================="
echo ""


sleep 2
echo "=================================================="
echo "Integrando Scripts de Respaldos"
echo "=================================================="
echo ""


cd /home/proyecto/server/script_recovery
touch script_respaldo.sh
chmod 755 script_respaldo.sh

echo "#!/bin/bash" >> script_respaldo.sh
echo "" >> script_respaldo.sh
echo "clear" >> script_respaldo.sh
echo "" >> script_respaldo.sh
echo "cd /home/proyecto" >> script_respaldo.sh
echo "" >> script_respaldo.sh
echo "cp Vinos_Charruas.sql /home/proyecto/server/respaldos" >> script_respaldo.sh
echo "" >> script_respaldo.sh
echo "cd /home/proyecto/server/respaldos" >> script_respaldo.sh
echo "" >> script_respaldo.sh
echo "tar -czvf Vinos_Charruas-""$""(date +%F_%H_%M).tar.gz *.sql" >> script_respaldo.sh
echo "" >> script_respaldo.sh
echo "rm -rf *.sql" >> script_respaldo.sh
echo "" >> script_respaldo.sh
echo "echo "=====================================" " >> script_respaldo.sh
echo "echo "¡Se ha respladado las Bases de Datos!" " >> script_respaldo.sh
echo "echo "=====================================" " >> script_respaldo.sh

echo "========================================================"
echo "¡Script Integrado!"
echo "========================================================"
echo ""

sleep 2
echo "========================================================"
echo "Preparando Crontab para los Respaldos"
echo "========================================================"
echo ""

echo "0 6 15 * * /home/proyecto/server/script_recovery/script_respaldo.sh" >> /etc/crontab

echo "========================================================"
echo "¡Crontab Preparado!"
echo "========================================================"
echo ""

sleep 2
echo "========================================================"
echo "Integrando Script ABM"
echo "========================================================"
echo ""

cd /home/proyecto/server/script_recovery
mkdir Script_Modular_ABM.sh
cd Script_Modular_ABM.sh

touch Script_Modular_ABM-V2.sh
chmod 755 Script_Modular_ABM-V2.sh

echo "#!/bin/bash" >> Script_Modular_ABM-V2.sh

echo "clear" >> Script_Modular_ABM-V2.sh

echo "sleep 0.3" >> Script_Modular_ABM-V2.sh
echo "echo "================================================================"" >> Script_Modular_ABM-V2.sh
echo "sleep 0.3" >> Script_Modular_ABM-V2.sh

echo "sleep 0.1" >> Script_Modular_ABM-V2.sh
echo "echo ╔═══╦═══╦═══╦═══╦═══╦════╦═══╗╔═══╦═══╦═══╦════╦╗╔╗╔╦═══╦═══╦═══╗" >> Script_Modular_ABM-V2.sh
echo "sleep 0.1" >> Script_Modular_ABM-V2.sh
echo "echo ║╔═╗║╔══╣╔═╗║╔═╗║╔═╗║╔╗╔╗║╔══╝║╔═╗║╔═╗║╔══╣╔╗╔╗║║║║║║╔═╗║╔═╗║╔══╝" >> Script_Modular_ABM-V2.sh
echo "sleep 0.1" >> Script_Modular_ABM-V2.sh
echo "echo ║╚═╝║╚══╣╚══╣║░╚╣║░║╠╝║║╚╣╚══╗║╚══╣║░║║╚══╬╝║║╚╣║║║║║║░║║╚═╝║╚══╗" >> Script_Modular_ABM-V2.sh
echo "sleep 0.1" >> Script_Modular_ABM-V2.sh
echo "echo ║╔╗╔╣╔══╩══╗║║░╔╣╚═╝║░║║░║╔══╝╚══╗║║░║║╔══╝░║║░║╚╝╚╝║╚═╝║╔╗╔╣╔══╝" >> Script_Modular_ABM-V2.sh
echo "sleep 0.1" >> Script_Modular_ABM-V2.sh
echo "echo ║║║╚╣╚══╣╚═╝║╚═╝║╔═╗║░║║░║╚══╗║╚═╝║╚═╝║║░░░░║║░╚╗╔╗╔╣╔═╗║║║╚╣╚══╗" >> Script_Modular_ABM-V2.sh
echo "sleep 0.1" >> Script_Modular_ABM-V2.sh
echo "echo ╚╝╚═╩═══╩═══╩═══╩╝░╚╝░╚╝░╚═══╝╚═══╩═══╩╝░░░░╚╝░░╚╝╚╝╚╝░╚╩╝╚═╩═══╝" >> Script_Modular_ABM-V2.sh

echo "sleep 0.3" >> Script_Modular_ABM-V2.sh
echo "echo "================================================================"" >> Script_Modular_ABM-V2.sh
echo "sleep 0.3" >> Script_Modular_ABM-V2.sh
echo "echo """ >> Script_Modular_ABM-V2.sh

echo "echo "================================================================"" >> Script_Modular_ABM-V2.sh
echo "sleep 0.3" >> Script_Modular_ABM-V2.sh
echo "echo "¿Que desea hacer?"" >> Script_Modular_ABM-V2.sh
echo "sleep 0.3" >> Script_Modular_ABM-V2.sh
echo "echo "================================================================"" >> Script_Modular_ABM-V2.sh
echo "sleep 0.3" >> Script_Modular_ABM-V2.sh
echo "echo """ >> Script_Modular_ABM-V2.sh

echo "opciones=("Usuarios" "Grupos" "Salir")" >> Script_Modular_ABM-V2.sh
echo "select opcion in ""$"{opciones[@]}"" >> Script_Modular_ABM-V2.sh
echo "do" >> Script_Modular_ABM-V2.sh

echo "echo "================================================="" >> Script_Modular_ABM-V2.sh

echo "# PRIMER CASE | USUARIOS, GRUPOS, SALIR #" >> Script_Modular_ABM-V2.sh
echo "case ""$"opcion" in" >> Script_Modular_ABM-V2.sh

echo ""Usuarios") sh ./Script_Modular_Usuarios-V2.sh" >> Script_Modular_ABM-V2.sh
echo ";;" >> Script_Modular_ABM-V2.sh

echo ""Grupos") sh ./Script_Modular_Grupos-V2.sh" >> Script_Modular_ABM-V2.sh
echo ";;" >> Script_Modular_ABM-V2.sh

echo ""Salir")  sh ./Script_Modular_Salir-V2.sh; exit 2" >> Script_Modular_ABM-V2.sh
echo ";;" >> Script_Modular_ABM-V2.sh

echo "*) echo "Opcion no valida."" >> Script_Modular_ABM-V2.sh
echo ";;" >> Script_Modular_ABM-V2.sh


echo         "esac" >> Script_Modular_ABM-V2.sh
echo "echo "------Precione ENTER para continuar-----"" >> Script_Modular_ABM-V2.sh

echo "done" >> Script_Modular_ABM-V2.sh

echo "# | FIN PRIMER CASE Y DEL CODIGO |" >> Script_Modular_ABM-V2.sh

touch Script_Modular_Usuarios-V2.sh
chmod 755 Script_Modular_Usuarios-V2.sh

echo "#!/bin/bash"  >> Script_Modular_Usuarios-V2.sh

echo "# SEGUNDO CASE | CREAR, ELIMINAR, VOLVER #" >> Script_Modular_Usuarios-V2.sh

echo "opciones2=("Crear" "Eliminar" "Volver")" >> Script_Modular_Usuarios-V2.sh
echo "select opcion2 in ""$"{opciones2[@]}"" >> Script_Modular_Usuarios-V2.sh
echo "do" >> Script_Modular_Usuarios-V2.sh

echo "clear" >> Script_Modular_Usuarios-V2.sh

echo "case ""$"opcion2" in" >> Script_Modular_Usuarios-V2.sh

echo ""Crear") echo "Introduzca el nombre del usuario a crear."" >> Script_Modular_Usuarios-V2.sh
echo "read usu" >> Script_Modular_Usuarios-V2.sh
echo "sudo useradd ""$"usu"" >> Script_Modular_Usuarios-V2.sh
echo "echo "Listo"" >> Script_Modular_Usuarios-V2.sh
echo ";;" >> Script_Modular_Usuarios-V2.sh

echo ""Eliminar") echo "Introduzca el nombre de usuario a eliminar."" >> Script_Modular_Usuarios-V2.sh
echo "read del" >> Script_Modular_Usuarios-V2.sh
echo "sudo userdel ""$"del"" >> Script_Modular_Usuarios-V2.sh
echo "echo "Listo"" >> Script_Modular_Usuarios-V2.sh
echo ";;" >> Script_Modular_Usuarios-V2.sh

echo ""Volver") echo "Volviendo.."; break 1" >> Script_Modular_Usuarios-V2.sh
echo ";;" >> Script_Modular_Usuarios-V2.sh

echo "*) echo "Esa opcion no es valida."" >> Script_Modular_Usuarios-V2.sh
echo ";;" >> Script_Modular_Usuarios-V2.sh

echo         "esac" >> Script_Modular_Usuarios-V2.sh

echo "echo "--------ENTER para continuar--------"" >> Script_Modular_Usuarios-V2.sh

echo "done" >> Script_Modular_Usuarios-V2.sh


echo "# FIN SEGUNDO CASE #" >> Script_Modular_Usuarios-V2.sh

touch Script_Modular_Grupos-V2.sh
chmod 755 Script_Modular_Grupos-V2.sh

echo "#!/bin/bash" >> Script_Modular_Grupos-V2.sh

echo "# TERCER CASE | CREAR, ELIMINAR, VOLVER |" >> Script_Modular_Grupos-V2.sh

echo "opciones3=("Crear" "Eliminar" "Volver")" >> Script_Modular_Grupos-V2.sh
echo "select opcion3 in ""$"{opciones3[@]}"" >> Script_Modular_Grupos-V2.sh
echo "do" >> Script_Modular_Grupos-V2.sh

echo "clear" >> Script_Modular_Grupos-V2.sh

echo "case ""$"opcion3" in" >> Script_Modular_Grupos-V2.sh

echo ""Crear") echo "Introduzca el nombre del grupo a crear."" >> Script_Modular_Grupos-V2.sh
echo "read grup" >> Script_Modular_Grupos-V2.sh
echo "sudo groupadd ""$"grup"" >> Script_Modular_Grupos-V2.sh
echo "echo "Listo"" >> Script_Modular_Grupos-V2.sh
echo ";;" >> Script_Modular_Grupos-V2.sh

echo ""Eliminar") echo "Introduzca el nombre del grupo a eliminar."" >> Script_Modular_Grupos-V2.sh
echo "read delgrup" >> Script_Modular_Grupos-V2.sh
echo "sudo groupdel ""$"delgrup"" >> Script_Modular_Grupos-V2.sh
echo "echo "Listo"" >> Script_Modular_Grupos-V2.sh
echo ";;" >> Script_Modular_Grupos-V2.sh

echo ""Volver") echo "Volviendo.."; break 1" >> Script_Modular_Grupos-V2.sh
echo ";;" >> Script_Modular_Grupos-V2.sh

echo "*) echo "Esa opcion no es valida."" >> Script_Modular_Grupos-V2.sh
echo ";;" >> Script_Modular_Grupos-V2.sh

echo         "esac" >> Script_Modular_Grupos-V2.sh
echo "echo "--------ENTER para continuar--------"" >> Script_Modular_Grupos-V2.sh

echo "done" >> Script_Modular_Grupos-V2.sh


echo "# FIN TERCER CASE #" >> Script_Modular_Grupos-V2.sh

touch Script_Modular_Salir-V2.sh
chmod 755 Script_Modular_Salir-V2.sh

echo "#!/bin/bash" >> Script_Modular_Salir-V2.sh

echo "clear" >> Script_Modular_Salir-V2.sh

echo "echo "¡Hasta Luego!"" >> Script_Modular_Salir-V2.sh

echo "exit 1" >> Script_Modular_Salir-V2.sh

echo "========================================================"
echo "¡Script de ABM Modular Integrado!"
echo "========================================================"
echo ""


sleep 1
echo "========================================================"
echo "Integrando Script de Intentos de Login"
echo "========================================================"
echo ""

cd /home/proyecto/server/script_recovery
mkdir Script_Intentos_Login-Modular.sh
cd Script_Intentos_Login-Modular.sh


touch Script_Intentos_Login-Modular.sh
chmod 755 Script_Intentos_Login-Modular.sh


echo "#!/bin/bash" >> Script_Intentos_Login-Modular.sh

echo "clear" >> Script_Intentos_Login-Modular.sh

echo "sleep 0.3" >> Script_Intentos_Login-Modular.sh
echo "echo "================================================================"" >> Script_Intentos_Login-Modular.sh
echo "sleep 0.1" >> Script_Intentos_Login-Modular.sh
echo "echo ╔═══╦═══╦═══╦═══╦═══╦════╦═══╗╔═══╦═══╦═══╦════╦╗╔╗╔╦═══╦═══╦═══╗" >> Script_Intentos_Login-Modular.sh
echo "sleep 0.1" >> Script_Intentos_Login-Modular.sh
echo "echo ║╔═╗║╔══╣╔═╗║╔═╗║╔═╗║╔╗╔╗║╔══╝║╔═╗║╔═╗║╔══╣╔╗╔╗║║║║║║╔═╗║╔═╗║╔══╝" >> Script_Intentos_Login-Modular.sh
echo "sleep 0.1" >> Script_Intentos_Login-Modular.sh
echo "echo ║╚═╝║╚══╣╚══╣║░╚╣║░║╠╝║║╚╣╚══╗║╚══╣║░║║╚══╬╝║║╚╣║║║║║║░║║╚═╝║╚══╗" >> Script_Intentos_Login-Modular.sh
echo "sleep 0.1" >> Script_Intentos_Login-Modular.sh
echo "echo ║╔╗╔╣╔══╩══╗║║░╔╣╚═╝║░║║░║╔══╝╚══╗║║░║║╔══╝░║║░║╚╝╚╝║╚═╝║╔╗╔╣╔══╝" >> Script_Intentos_Login-Modular.sh
echo "sleep 0.1" >> Script_Intentos_Login-Modular.sh
echo "echo ║║║╚╣╚══╣╚═╝║╚═╝║╔═╗║░║║░║╚══╗║╚═╝║╚═╝║║░░░░║║░╚╗╔╗╔╣╔═╗║║║╚╣╚══╗" >> Script_Intentos_Login-Modular.sh
echo "sleep 0.1" >> Script_Intentos_Login-Modular.sh
echo "echo ╚╝╚═╩═══╩═══╩═══╩╝░╚╝░╚╝░╚═══╝╚═══╩═══╩╝░░░░╚╝░░╚╝╚╝╚╝░╚╩╝╚═╩═══╝" >> Script_Intentos_Login-Modular.sh
echo "sleep 0.3" >> Script_Intentos_Login-Modular.sh

echo "sleep 0.3" >> Script_Intentos_Login-Modular.sh
echo "echo "================================================================"" >> Script_Intentos_Login-Modular.sh
echo "sleep 0.3" >> Script_Intentos_Login-Modular.sh
echo "echo "¿Que desea hacer?"" >> Script_Intentos_Login-Modular.sh
echo "sleep 0.3" >> Script_Intentos_Login-Modular.sh
echo "echo "================================================================"" >> Script_Intentos_Login-Modular.sh
echo "sleep 0.3" >> Script_Intentos_Login-Modular.sh
echo "echo """ >> Script_Intentos_Login-Modular.sh

echo "opciones=("Ver_Intentos_de_Login" "Salir")" >> Script_Intentos_Login-Modular.sh
echo "select opcion in ""$"{opciones[@]}"" >> Script_Intentos_Login-Modular.sh
echo "do" >> Script_Intentos_Login-Modular.sh

echo "case ""$"opcion" in" >> Script_Intentos_Login-Modular.sh


echo ""Ver_Intentos_de_Login") sh ./Script_Intentos_Login-Intentos.sh" >> Script_Intentos_Login-Modular.sh
echo ";;" >> Script_Intentos_Login-Modular.sh

echo ""Salir") echo "¡Hasta Luego!"; exit" >> Script_Intentos_Login-Modular.sh
echo ";;" >> Script_Intentos_Login-Modular.sh

echo "*) echo "Opcion no valida."" >> Script_Intentos_Login-Modular.sh

echo	"esac" >> Script_Intentos_Login-Modular.sh
echo "echo "------Precione ENTER para continuar-----"" >> Script_Intentos_Login-Modular.sh
echo "done" >> Script_Intentos_Login-Modular.sh


touch Script_Intentos_Login-Intentos.sh
chmod 755 Script_Intentos_Login-Intentos.sh


echo "#!/bin/bash" >> Script_Intentos_Login-Intentos.sh

echo "clear" >> Script_Intentos_Login-Intentos.sh

echo "echo "================================================================"" >> Script_Intentos_Login-Intentos.sh
echo "echo "Mostrando los ultimos 5 Intentos de Login..."" >> Script_Intentos_Login-Intentos.sh
echo "sleep 0.3" >> Script_Intentos_Login-Intentos.sh
echo "echo "================================================================"" >> Script_Intentos_Login-Intentos.sh
echo "tail -n5 /var/log/auth.log" >> Script_Intentos_Login-Intentos.sh
echo "echo "================================================================"" >> Script_Intentos_Login-Intentos.sh
echo "echo """  >> Script_Intentos_Login-Intentos.sh

echo "========================================================"
echo "¡Script de Intentos de Login Integrado!"
echo "========================================================"
echo ""

# Instalacion y Configuracion de FireWall Aqui 
echo "========================================================"
echo "Instalando y Configuracion de FireWall"
echo "========================================================"
echo ""

sudo apt install ufw
sudo ufw enable


sudo ufw allow OpenSSH
sudo ufw allow ssh


sudo ufw logging on

sudo ufw allow 2666

sudo ufw allow 80
sudo ufw allow http
sudo ufw allow 80/tcp
sudo ufw reload

cd
cd /home/proyecto/server/script_recovery
mkdir Firewall.config
chmod 755 Firewall.config

cd Firewall.config

touch firewall.sh
chmod 755 firewall.sh

echo "#!/bin/bash" >> firewall.sh

echo "clear" >> firewall.sh

echo "sudo apt install ufw" >> firewall.sh
echo "sudo ufw enable" >> firewall.sh


echo "sudo ufw allow OpenSSH" >> firewall.sh
echo "sudo ufw allow ssh" >> firewall.sh


echo "sudo ufw logging on" >> firewall.sh

echo "sudo ufw allow 2666" >> firewall.sh

echo "sudo ufw allow 80" >> firewall.sh
echo "sudo ufw allow http" >> firewall.sh
echo "sudo ufw allow 80/tcp" >> firewall.sh

echo "sudo ufw reload" >> firewall.sh

echo "========================================================"
echo "¡Instalacion y Configuracion de FireWall Completada!"
echo "========================================================"
echo ""

sleep 1
echo "========================================================"
echo "¡Entorno de Trabajo Finalizado!"
echo "========================================================"
echo ""

;;

"Salir") echo "¡Hasta Luego!"; exit
;;

*) echo "Esa opcion no es valida."
;;


	esac
done
