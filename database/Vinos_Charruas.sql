DROP DATABASE IF EXISTS Vinos_Charruas;
CREATE DATABASE IF NOT EXISTS Vinos_Charruas;

USE Vinos_Charruas;

CREATE TABLE BODEGA(
ID_Bodega int auto_increment,
Nombre_Bodega VARCHAR (40) not null unique,
Email_Bodega VARCHAR (50) not null,
Direccion VARCHAR (70) not null,
Pais_Bodega VARCHAR (25) not null,
Ciudad VARCHAR (25) not null,
Cuenta INT not null,
Codigo_Postal int not null,
Telefono_Bodega INT (9),
Primary key (ID_Bodega)
);

CREATE TABLE VINOS(
Codigo_Vino int auto_increment,
Nombre_Vino VARCHAR (20) not null unique,
Precio DECIMAL not null check(Precio>0),
Bodega_Vino int not null,
Stock INT default'1' check (Stock>=0),
Pais_Vinos VARCHAR (20) not null,
Region VARCHAR (50) not null,
Cosecha VARCHAR (20) not null,
Descripcion VARCHAR (100),
Ubicacion_IMG VARCHAR (50) not null,
Primary key (Codigo_Vino),
Foreign key (Bodega_Vino) references BODEGA (ID_Bodega)
);

CREATE TABLE CLIENTES(
Codigo_Cliente int auto_increment,
CI_Cliente char (8) not null unique,
Nombre_Cliente VARCHAR (20) not null,
Direccion VARCHAR (70) not null,
Ciudad VARCHAR (25) not null,
Email_Cliente VARCHAR (50) unique not null,
Contrasenia_Cliente VARCHAR (35) not null,
Telefono_Cliente INT (9),
Primary key (Codigo_Cliente)
);

CREATE TABLE EMPLEADOS(
Codigo_Empleado int auto_increment,
Nombre_Empleado VARCHAR (20) not null,
CI_Empleado char (8) not null unique,
Salario INT check(Salario>=0),
Direccion VARCHAR (70) not null,
Ciudad VARCHAR (25) not null,
Email_Empleado VARCHAR (50) unique not null,
Contrasenia_Empleado VARCHAR (35) not null,
Telefono_Empleado INT (9),
Primary key (Codigo_Empleado)
);

CREATE TABLE VENTAS(
Codigo_Venta int auto_increment,
Fecha_Venta DATETIME not null,
cliente int not null,
primary key (Codigo_Venta, Fecha_Venta),
foreign key (cliente) references CLIENTES (Codigo_Cliente)
);

CREATE TABLE DETALLEVENTA(
Cod_Detalle_Ven int auto_increment,
Cod_Venta int not null,
Vinos_DetalleV int not null,
Cantidad_DetalleV int not null check (Cantidad_DetalleV>0),
Costo_DetalleV decimal not null check(Costo_DetalleV>0),
Primary key (Cod_Detalle_Ven),
Foreign key (Vinos_DetalleV) references VINOS (Codigo_Vino),
Foreign key (Cod_Venta) references VENTAS (Codigo_Venta)
);

CREATE TABLE COMPRAS(
Codigo_Compra int auto_increment,
Fecha_Compra datetime not null,
Bodega int not null,
Empleado int not null,
primary key(Codigo_Compra),
foreign key (Bodega) references BODEGA (ID_Bodega),
foreign key (Empleado) references EMPLEADOS (Codigo_Empleado)
);

CREATE TABLE DETALLECOMPRA(
Cod_Detalle_Com int auto_increment,
Cod_Compra int not null,
Vinos_DetalleC int not null,
Cantidad_DetalleC int not null check(Cantidad_DetalleC>0),
Costo_DetalleC decimal not null check(Costo_DetalleC>0),
Primary key (Cod_Detalle_Com),
Foreign key (Vinos_DetalleC) references VINOS (Codigo_Vino),
Foreign key (Cod_Compra) references COMPRAS (Codigo_Compra)
);

CREATE TABLE RESPALDOSVINOS(
Cod_Respado_Vino int auto_increment,
Resp_Cod_Vino int,
Resp_Nombre_Vino VARCHAR (20),
Resp_Precio_Vino DECIMAL,
Resp_Stock_Vino int,
Primary key (Cod_Respado_Vino)
);

CREATE TABLE RESPALDOSBODEGAS(
Cod_Respaldo_Bodega int auto_increment,
Resp_ID_Bodega int,
Resp_Nombre_Bodega VARCHAR (40),
Resp_Cuenta int,
Primary key (Cod_Respaldo_Bodega)
);

CREATE TABLE FALTASTOCK(
Cod_Falta_Stock int auto_increment,
Cod_Vino_Fal_STK int,
Nom_Vino_Fal_STK VARCHAR (40),
Stock_Fal_STK int,
Primary key (Cod_Falta_Stock)
);

CREATE OR REPLACE VIEW Stock AS
SELECT  VINOS.Nombre_Vino AS Nombre, DETALLECOMPRA.Cantidad_DetalleC - DETALLEVENTA.Cantidad_DetalleV AS stock FROM DETALLECOMPRA 
JOIN VINOS ON DETALLECOMPRA.Vinos_DetalleC = VINOS.Codigo_Vino
JOIN DETALLEVENTA ON VINOS.Codigo_Vino = DETALLEVENTA.Cod_Detalle_Ven
GROUP BY VINOS.Codigo_Vino
ORDER BY stock;

CREATE OR REPLACE VIEW Producto_mas_Vendido AS
SELECT VINOS.Codigo_Vino AS Codigo_Vino, VINOS.Nombre_Vino AS Nombre, SUM(DETALLEVENTA.Cantidad_DetalleV) AS Total_de_Ventas FROM DETALLEVENTA
JOIN VINOS ON DETALLEVENTA.Vinos_DetalleV = VINOS.Codigo_Vino
GROUP BY VINOS.Codigo_Vino
ORDER BY Total_de_Ventas DESC;

CREATE OR REPLACE VIEW Producto_menos_Vendido AS
SELECT VINOS.Codigo_Vino AS Codigo_Vino, VINOS.Nombre_Vino AS Nombre, SUM(DETALLEVENTA.Cantidad_DetalleV) AS Total_de_Ventas FROM DETALLEVENTA
JOIN VINOS ON DETALLEVENTA.Vinos_DetalleV = VINOS.Codigo_Vino
GROUP BY VINOS.Codigo_Vino
ORDER BY Total_de_Ventas;

CREATE OR REPLACE VIEW Ganancias AS
Select VINOS.Codigo_Vino AS Codigo_Vino, VINOS.Nombre_Vino AS Nombre, SUM(DETALLEVENTA.Costo_DetalleV) - SUM(DETALLECOMPRA.Costo_DetalleC) AS Ganancias FROM DETALLECOMPRA 
JOIN VINOS ON DETALLECOMPRA.Vinos_DetalleC = VINOS.Codigo_Vino
JOIN DETALLEVENTA ON VINOS.Codigo_Vino = DETALLEVENTA.Cod_Detalle_Ven
GROUP BY VINOS.Codigo_Vino
ORDER BY Ganancias DESC;

drop trigger if exists Stock_ALTAS;
create trigger Stock_ALTAS after insert on DETALLECOMPRA for each row
 update VINOS set Stock = new.Cantidad_DetalleC + Stock
 where VINOS.Codigo_Vino = new.Vinos_DetalleC;
 
drop trigger if exists Stock_BAJAS;
create trigger Stock_BAJAS after insert on DETALLEVENTA for each row
 update VINOS set Stock = Stock - new.Cantidad_DetalleV
 where VINOS.Codigo_Vino = new.Vinos_DetalleV;

delimiter //
create procedure tres_productos_mas_vendidos ()
	begin
		SELECT VINOS.Codigo_Vino AS Codigo_Vino, VINOS.Nombre_Vino AS Nombre, SUM(DETALLEVENTA.Cantidad_DetalleV) AS Total_de_Ventas FROM DETALLEVENTA
		JOIN VINOS ON DETALLEVENTA.Vinos_DetalleV = VINOS.Codigo_Vino
		GROUP BY VINOS.Codigo_Vino
		ORDER BY Total_de_Ventas
		DESC LIMIT 3;
	end//
    
delimiter //
create procedure respaldo_vino ()
	begin
		SELECT * from RESPALDOSVINOS;
	end //
    
delimiter //
create procedure respaldo_bodega ()
	begin
		select * from RESPALDOSBODEGAS;
	end //

insert into BODEGA (Nombre_Bodega, Email_Bodega, Direccion, Pais_Bodega, Ciudad, Cuenta, Codigo_Postal) values ('Establecimiento Juanico', 'establecimiento@gmail.com', 'Ruta 5 Km 30', 'Uruguay', 'Canelones', 27, 90400);
insert into BODEGA (Nombre_Bodega, Email_Bodega, Direccion, Pais_Bodega, Ciudad, Cuenta, Codigo_Postal) values ('Bodega Roses', 'bodegaroses@gmail.com', 'Ruta 6 S/N - Km 30,200', 'Uruguay', 'Canelones', 57, 90000);
insert into BODEGA (Nombre_Bodega, Email_Bodega, Direccion, Pais_Bodega, Ciudad, Cuenta, Codigo_Postal) values ('Concha y Toro', 'conchaytoro@gmail.com', 'Avenida Virginia Subercaseaux 210 9480092 Pirque', 'Chile', 'Santiago', 17, 90000);
insert into BODEGA (Nombre_Bodega, Email_Bodega, Direccion, Pais_Bodega, Ciudad, Cuenta, Codigo_Postal) values ('Bodega Garzon', 'garzon@gmail.com', 'Ruta 9 Km. 175, Garzon 20401', 'Uruguay', 'Maldonado', 37, 90000);
insert into BODEGA (Nombre_Bodega, Email_Bodega, Direccion, Pais_Bodega, Ciudad, Cuenta, Codigo_Postal) values ('Santa Rosa', 'santarosa@gmail.com', '2218 Ruta Cesar Mayo Gutierrez', 'Uruguay', 'Montevideo', 27, 90000);

insert into VINOS (Nombre_Vino, Precio, Bodega_Vino, Pais_Vinos, Region, Cosecha, Descripcion, Ubicacion_IMG) values ('Amalaya Tinto', 24, 1, 'Argentina', 'Mendoza', 2021, '-', 'src/vinos/amalaya-tinto.png');
insert into VINOS (Nombre_Vino, Precio, Bodega_Vino, Pais_Vinos, Region, Cosecha, Descripcion, Ubicacion_IMG) values ('Casillero del Diablo', 50, 3, 'Chile', 'Santiago', 2022, '-', 'src/vinos/cdd1_tienda.png');
insert into VINOS (Nombre_Vino, Precio, Bodega_Vino, Pais_Vinos, Region, Cosecha, Descripcion, Ubicacion_IMG) values ('Vino Roses', 15, 2, 'Uruguay', 'Canelones', 2022, '-', 'src/vinos/vr1_tienda.png');
insert into VINOS (Nombre_Vino, Precio, Bodega_Vino, Pais_Vinos, Region, Cosecha, Descripcion, Ubicacion_IMG) values ('Balasto', 56, 4, 'Uruguay', 'Maldonado', 2022, '-', 'src/vinos/b1_tienda.png');
insert into VINOS (Nombre_Vino, Precio, Bodega_Vino, Pais_Vinos, Region, Cosecha, Descripcion, Ubicacion_IMG) values ('Don Pascual', 22, 1, 'Uruguay', 'Canelones', 2022, '-', 'src/vinos/dp1_tienda.png');

insert into CLIENTES (CI_Cliente, Nombre_Cliente, Direccion, Ciudad, Email_Cliente, Contrasenia_Cliente) values (54622348, 'Ramon Alvarez', 'Ruta 5 vieja', 'Las Piedras', 'ramon@gmail.com', '123');
insert into CLIENTES (CI_Cliente, Nombre_Cliente, Direccion, Ciudad, Email_Cliente, Contrasenia_Cliente) values (54642348, 'Gaston Alvarez', 'AV. Italia', 'Montevideo', 'gaston@gmail.com', '123');
insert into CLIENTES (CI_Cliente, Nombre_Cliente, Direccion, Ciudad, Email_Cliente, Contrasenia_Cliente) values (51232348, 'Gonzalo Alvarez', 'Calle Ancha', 'Canelones', 'gonzalo@gmail.com', '123');
insert into CLIENTES (CI_Cliente, Nombre_Cliente, Direccion, Ciudad, Email_Cliente, Contrasenia_Cliente) values (52621318, 'Matias Alvarez', 'Cuareim', 'Las Piedras', 'matias@gmail.com', '123');
insert into CLIENTES (CI_Cliente, Nombre_Cliente, Direccion, Ciudad, Email_Cliente, Contrasenia_Cliente) values (54622309, 'Sergio Alvarez', 'San Isidro', 'Las Piedras', 'Sergio@gmail.com', '123');

insert into EMPLEADOS (Nombre_Empleado, CI_Empleado, Salario, Email_Empleado, Contrasenia_Empleado) values ('Juan Carlos Rodrigez', 58240825, 25000, 'juancarlo@gmail.com', '234');
insert into EMPLEADOS (Nombre_Empleado, CI_Empleado, Salario, Email_Empleado, Contrasenia_Empleado) values ('Ramon Gutierrez', 58212825, 26000, 'ramon@gmail.com', '234');
insert into EMPLEADOS (Nombre_Empleado, CI_Empleado, Salario, Email_Empleado, Contrasenia_Empleado) values ('Pablo Perez', 58247659, 25000, 'pablo@gmail.com', '234');
insert into EMPLEADOS (Nombre_Empleado, CI_Empleado, Salario, Email_Empleado, Contrasenia_Empleado) values ('Gonzalo Gimenez', 58128655, 25000, 'gonzalo@gmail.com', '234');
insert into EMPLEADOS (Nombre_Empleado, CI_Empleado, Salario, Email_Empleado, Contrasenia_Empleado) values ('Matias Martinez', 52240825, 25000, 'matias@gmail.com', '289dff07669d7a23de0ef88d2f7129e7');

insert into VENTAS (Fecha_Venta, cliente) values ('2022-08-12', 1);
insert into VENTAS (Fecha_Venta, cliente) values ('2022-08-15', 2);
insert into VENTAS (Fecha_Venta, cliente) values ('2022-08-12', 3);
insert into VENTAS (Fecha_Venta, cliente) values ('2022-03-12', 4);
insert into VENTAS (Fecha_Venta, cliente) values ('2022-06-12', 5);

insert into DETALLEVENTA (Cod_Venta, Vinos_DetalleV, Cantidad_DetalleV, Costo_DetalleV) values (1, 1, 1, 79);
insert into DETALLEVENTA (Cod_Venta, Vinos_DetalleV, Cantidad_DetalleV, Costo_DetalleV) values (2, 2, 1, 27);
insert into DETALLEVENTA (Cod_Venta, Vinos_DetalleV, Cantidad_DetalleV, Costo_DetalleV) values (3, 3, 1, 59);
insert into DETALLEVENTA (Cod_Venta, Vinos_DetalleV, Cantidad_DetalleV, Costo_DetalleV) values (4, 4, 1, 35);
insert into DETALLEVENTA (Cod_Venta, Vinos_DetalleV, Cantidad_DetalleV, Costo_DetalleV) values (5, 5, 1, 78);

insert into COMPRAS (Fecha_Compra, Bodega, Empleado) values ('2022-08-19', 1, 1);
insert into COMPRAS (Fecha_Compra, Bodega, Empleado) values ('2022-08-22', 2, 2);
insert into COMPRAS (Fecha_Compra, Bodega, Empleado) values ('2022-08-14', 3, 3);
insert into COMPRAS (Fecha_Compra, Bodega, Empleado) values ('2022-04-12', 4, 4);
insert into COMPRAS (Fecha_Compra, Bodega, Empleado) values ('2022-03-12', 5, 5);

insert into DETALLECOMPRA (Cod_Compra, Vinos_DetalleC, Cantidad_DetalleC, Costo_DetalleC) values (1, 1, 3, 78);
insert into DETALLECOMPRA (Cod_Compra, Vinos_DetalleC, Cantidad_DetalleC, Costo_DetalleC) values (2, 2, 2, 21);
insert into DETALLECOMPRA (Cod_Compra, Vinos_DetalleC, Cantidad_DetalleC, Costo_DetalleC) values (3, 3, 3, 54);
insert into DETALLECOMPRA (Cod_Compra, Vinos_DetalleC, Cantidad_DetalleC, Costo_DetalleC) values (4, 4, 4, 34);
insert into DETALLECOMPRA (Cod_Compra, Vinos_DetalleC, Cantidad_DetalleC, Costo_DetalleC) values (5, 5, 5, 76);

drop trigger if exists Respaldo_Vinos;
create trigger Respaldo_Vinos before update on VINOS for each row
insert into RESPALDOSVINOS (Resp_Cod_Vino , Resp_Nombre_Vino, Resp_Precio_Vino, Resp_Stock_Vino) values (old.Codigo_Vino, old.Nombre_Vino, old.Precio, old.Stock);
 
drop trigger if exists Respaldo_Bodega;
create trigger Respaldo_Bodega before update on BODEGA for each row
insert into RESPALDOSBODEGAS (Resp_ID_Bodega, Resp_Nombre_Bodega, Resp_Cuenta) values (old.ID_Bodega, old.Nombre_Bodega, old.Cuenta);