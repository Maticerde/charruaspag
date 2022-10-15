DROP DATABASE IF EXISTS Vinos_Charruas;
CREATE DATABASE
IF NOT EXISTS Vinos_Charruas;

USE Vinos_Charruas;

CREATE TABLE BODEGA
(
    ID_Bodega int
    auto_increment,
Nombre_Bodega VARCHAR
    (40),
Email_Bodega VARCHAR
    (50) not null,
Direccion VARCHAR
    (70),
Pais VARCHAR
    (25),
Ciudad VARCHAR
    (25),
Cuenta INT not null,
Primary key
    (ID_Bodega)
);

    CREATE TABLE VINOS
    (
        Codigo_Vino int
        auto_increment,
Nombre_Vino VARCHAR
        (20) not null,
Precio DECIMAL not null check
        (Precio>0),
Bodega_Vino int,
Stock INT not null check
        (Stock>=0),
Crianza VARCHAR
        (20),
Pais VARCHAR
        (20),
Region VARCHAR
        (50),
Cosecha VARCHAR
        (20),
Descripcion VARCHAR
        (100),
Ubicacion_IMG VARCHAR
        (50),
Primary key
        (Codigo_Vino),
Foreign key
        (Bodega_Vino) references BODEGA
        (ID_Bodega)
);

        CREATE TABLE CLIENTES
        (
            Codigo_Cliente int
            auto_increment,
CI_Cliente char
            (8) not null unique,
Nombre_Cliente VARCHAR
            (20),
Direccion VARCHAR
            (70),
Ciudad VARCHAR
            (25),
Email_Cliente VARCHAR
            (50),
Contrasenia VARCHAR
            (35) not null,
Primary key
            (Codigo_Cliente)
);

            CREATE TABLE TEL_CLIENTE
            (
                Cod_Cliente int,
                Telefono_Cliente CHAR (9),
                Primary key (Cod_CLiente, Telefono_Cliente),
                Foreign key (Cod_Cliente) references CLIENTES (Codigo_Cliente)
            );

            CREATE TABLE TEL_BODEGA
            (
                Cod_Bodega int,
                Telefono_Bodega CHAR (9),
                Primary key (Cod_Bodega, Telefono_Bodega),
                Foreign key (Cod_Bodega) references BODEGA (ID_BODEGA)
            );

            CREATE TABLE EMPLEADOS
            (
                Codigo_Empleado int
                auto_increment,
Nombre_Empleado VARCHAR
                (20),
CI_Empleado char
                (8) not null unique,
Salario INT not null check
                (Salario>=0),
Email_Emplaedo VARCHAR
                (50),
Contasenia VARCHAR
                (35) not null,
Primary key
                (Codigo_Empleado)
);

                CREATE TABLE TEL_EMPLEADO
                (
                    Cod_Empleado int,
                    Telefono_Empleado CHAR (9),
                    Primary key (Cod_Empleado, Telefono_Empleado),
                    Foreign key (Cod_Empleado) references EMPLEADOS (Codigo_Empleado)
                );

                CREATE TABLE VENTAS
                (
                    Codigo_Venta int
                    auto_increment,
Fecha_Venta DATETIME not null,
cliente int not null,
primary key
                    (Codigo_Venta, Fecha_Venta),
foreign key
                    (cliente) references CLIENTES
                    (Codigo_Cliente)
);

                    CREATE TABLE DETALLEVENTA
                    (
                        Cod_Detalle_Ven int
                        auto_increment,
Cod_Venta int not null,
Vinos_DetalleV int not null,
Cantidad_DetalleV int not null check
                        (Cantidad_DetalleV>0),
Costo_DetalleDV decimal not null check
                        (Costo_DetalleDV>0),
Primary key
                        (Cod_Detalle_Ven),
Foreign key
                        (Vinos_DetalleV) references VINOS
                        (Codigo_Vino),
Foreign key
                        (Cod_Venta) references VENTAS
                        (Codigo_Venta)
);

                        CREATE TABLE COMPRAS
                        (
                            Codigo_Compra int
                            auto_increment,
Fecha_Compra datetime not null,
Bodega int not null,
Empleado int not null,
primary key
                            (Codigo_Compra),
foreign key
                            (Bodega) references BODEGA
                            (ID_Bodega),
foreign key
                            (Empleado) references EMPLEADOS
                            (Codigo_Empleado)
);

                            CREATE TABLE DETALLECOMPRA
                            (
                                Cod_Detalle_Com int
                                auto_increment,
Cod_Compra int not null,
Vinos_DetalleC int not null,
Cantidad_DetalleC int not null check
                                (Cantidad_DetalleC>0),
Costo_DetalleC decimal not null check
                                (Costo_DetalleC>0),
Primary key
                                (Cod_Detalle_Com),
Foreign key
                                (Vinos_DetalleC) references VINOS
                                (Codigo_Vino),
Foreign key
                                (Cod_Compra) references COMPRAS
                                (Codigo_Compra)
);

                                insert into BODEGA
                                    (Nombre_Bodega, Email_Bodega, Direccion, Pais, Ciudad, Cuenta)
                                values
                                    ('Establecimiento Juanico', 'establecimiento@gmail.com', 'Ruta 5 Km 30', 'Uruguay', 'Canelones', 27);
                                insert into BODEGA
                                    (Nombre_Bodega, Email_Bodega, Direccion, Pais, Ciudad, Cuenta)
                                values
                                    ('Bodega Roses', 'bodegaroses@gmail.com', 'Ruta 6 S/N - Km 30,200', 'Uruguay', 'Canelones', 57);
                                insert into BODEGA
                                    (Nombre_Bodega, Email_Bodega, Direccion, Pais, Ciudad, Cuenta)
                                values
                                    ('Concha y Toro', 'conchaytoro@gmail.com', 'Avenida Virginia Subercaseaux 210 9480092 Pirque', 'Chile', 'Santiago', 17);
                                insert into BODEGA
                                    (Nombre_Bodega, Email_Bodega, Direccion, Pais, Ciudad, Cuenta)
                                values
                                    ('Bodega Garzon', 'garzon@gmail.com', 'Ruta 9 Km. 175, Garzon 20401', 'Uruguay', 'Maldonado', 37);
                                insert into BODEGA
                                    (Nombre_Bodega, Email_Bodega, Direccion, Pais, Ciudad, Cuenta)
                                values
                                    ('Santa Rosa', 'santarosa@gmail.com', '2218 Ruta Cesar Mayo Gutierrez', 'Uruguay', 'Montevideo', 27);

                                insert into VINOS
                                    (Nombre_Vino, Precio, Bodega_Vino, Stock, Crianza, Pais, Region, Cosecha, Descripcion, Ubicacion_IMG)
                                values
                                    ('Santa Teresa', 24, 1, 15, '-', 'Uruguay', 'Canelones', 2022, '-', 'src/vinos/st1_tienda.png');
                                insert into VINOS
                                    (Nombre_Vino, Precio, Bodega_Vino, Stock, Crianza, Pais, Region, Cosecha, Descripcion, Ubicacion_IMG)
                                values
                                    ('Casillero del Diablo', 50, 3, 5, '-', 'Chile', 'Santiago', 2022, '-', 'src/vinos/cdd1_tienda.png');
                                insert into VINOS
                                    (Nombre_Vino, Precio, Bodega_Vino, Stock, Crianza, Pais, Region, Cosecha, Descripcion, Ubicacion_IMG)
                                values
                                    ('Vino Roses', 15, 2, 17, '-', 'Uruguay', 'Canelones', 2022, '-', 'src/vinos/vr1_tienda.png');
                                insert into VINOS
                                    (Nombre_Vino, Precio, Bodega_Vino, Stock, Crianza, Pais, Region, Cosecha, Descripcion, Ubicacion_IMG)
                                values
                                    ('Balasto', 56, 4, 25, '-', 'Uruguay', 'Maldonado', 2022, '-', 'src/vinos/b1_tienda.png');
                                insert into VINOS
                                    (Nombre_Vino, Precio, Bodega_Vino, Stock, Crianza, Pais, Region, Cosecha, Descripcion, Ubicacion_IMG)
                                values
                                    ('Don Pascual', 22, 1, 12, '-', 'Uruguay', 'Canelones', 2022, '-', 'src/vinos/dp1_tienda.png');

                                insert into CLIENTES
                                    (CI_Cliente, Nombre_Cliente, Direccion, Ciudad, Email_Cliente, Contrasenia)
                                values
                                    (54622348, 'Ramon Alvarez', 'Ruta 5 vieja', 'Las Piedras', 'ramon@gmail.com', '4412fafsf2');
                                insert into CLIENTES
                                    (CI_Cliente, Nombre_Cliente, Direccion, Ciudad, Email_Cliente, Contrasenia)
                                values
                                    (54642348, 'Gaston Alvarez', 'AV. Italia', 'Montevideo', 'gaston@gmail.com', '4412314fsf2');
                                insert into CLIENTES
                                    (CI_Cliente, Nombre_Cliente, Direccion, Ciudad, Email_Cliente, Contrasenia)
                                values
                                    (51232348, 'Gonzalo Alvarez', 'Calle Ancha', 'Canelones', 'gonzalo@gmail.com', '4412f124fds');
                                insert into CLIENTES
                                    (CI_Cliente, Nombre_Cliente, Direccion, Ciudad, Email_Cliente, Contrasenia)
                                values
                                    (52621318, 'Matias Alvarez', 'Cuareim', 'Las Piedras', 'matias@gmail.com', '441246f332f2');
                                insert into CLIENTES
                                    (CI_Cliente, Nombre_Cliente, Direccion, Ciudad, Email_Cliente, Contrasenia)
                                values
                                    (54622309, 'Sergio Alvarez', 'San Isidro', 'Las Piedras', 'Sergio@gmail.com', '44122f2');

                                insert into TEL_CLIENTE
                                    (Cod_Cliente, Telefono_Cliente)
                                values
                                    (1, 099456782);
                                insert into TEL_CLIENTE
                                    (Cod_Cliente, Telefono_Cliente)
                                values
                                    (2, 095234789);
                                insert into TEL_CLIENTE
                                    (Cod_Cliente, Telefono_Cliente)
                                values
                                    (3, 098237854);
                                insert into TEL_CLIENTE
                                    (Cod_Cliente, Telefono_Cliente)
                                values
                                    (4, 093098457);
                                insert into TEL_CLIENTE
                                    (Cod_Cliente, Telefono_Cliente)
                                values
                                    (5, 092345724);

                                insert into TEL_BODEGA
                                    (Cod_Bodega, Telefono_Bodega)
                                values
                                    (1, 094789345);
                                insert into TEL_BODEGA
                                    (Cod_Bodega, Telefono_Bodega)
                                values
                                    (2, 095234873);
                                insert into TEL_BODEGA
                                    (Cod_Bodega, Telefono_Bodega)
                                values
                                    (3, 096437623);
                                insert into TEL_BODEGA
                                    (Cod_Bodega, Telefono_Bodega)
                                values
                                    (4, 094342387);
                                insert into TEL_BODEGA
                                    (Cod_Bodega, Telefono_Bodega)
                                values
                                    (5, 091342343);

                                insert into EMPLEADOS
                                    (Nombre_Empleado, CI_Empleado, Salario, Email_Emplaedo, Contasenia)
                                values
                                    ('Juan Carlos Rodrigez', 58240825, 25000, 'juancarlo@gmail.com', 'ewgdgw232523');
                                insert into EMPLEADOS
                                    (Nombre_Empleado, CI_Empleado, Salario, Email_Emplaedo, Contasenia)
                                values
                                    ('Ramon Gutierrez', 58212825, 26000, 'ramon@gmail.com', 'ew121441dsg23');
                                insert into EMPLEADOS
                                    (Nombre_Empleado, CI_Empleado, Salario, Email_Emplaedo, Contasenia)
                                values
                                    ('Pablo Perez', 58247659, 25000, 'pablo@gmail.com', 'ewdsgsdg32w123');
                                insert into EMPLEADOS
                                    (Nombre_Empleado, CI_Empleado, Salario, Email_Emplaedo, Contasenia)
                                values
                                    ('Gonzalo Gimenez', 58128655, 25000, 'gonzalo@gmail.com', 'ewgasdaadsdqadq');
                                insert into EMPLEADOS
                                    (Nombre_Empleado, CI_Empleado, Salario, Email_Emplaedo, Contasenia)
                                values
                                    ('Matias Martinez', 52240825, 25000, 'matias@gmail.com', 'ewgdgw23saf3');

                                insert into TEL_EMPLEADO
                                    (Cod_Empleado, Telefono_Empleado)
                                values
                                    (1, 093094586);
                                insert into TEL_EMPLEADO
                                    (Cod_Empleado, Telefono_Empleado)
                                values
                                    (2, 095234789);
                                insert into TEL_EMPLEADO
                                    (Cod_Empleado, Telefono_Empleado)
                                values
                                    (3, 098343267);
                                insert into TEL_EMPLEADO
                                    (Cod_Empleado, Telefono_Empleado)
                                values
                                    (4, 096234324);
                                insert into TEL_EMPLEADO
                                    (Cod_Empleado, Telefono_Empleado)
                                values
                                    (5, 098355462);

                                insert into VENTAS
                                    (Fecha_Venta, cliente)
                                values
                                    ('2022-08-12', 1);
                                insert into VENTAS
                                    (Fecha_Venta, cliente)
                                values
                                    ('2022-08-15', 2);
                                insert into VENTAS
                                    (Fecha_Venta, cliente)
                                values
                                    ('2022-08-12', 3);
                                insert into VENTAS
                                    (Fecha_Venta, cliente)
                                values
                                    ('2022-03-12', 4);
                                insert into VENTAS
                                    (Fecha_Venta, cliente)
                                values
                                    ('2022-06-12', 5);

                                insert into DETALLEVENTA
                                    (Cod_Venta, Vinos_DetalleV, Cantidad_DetalleV, Costo_DetalleDV)
                                values
                                    (1, 1, 3, 72);
                                insert into DETALLEVENTA
                                    (Cod_Venta, Vinos_DetalleV, Cantidad_DetalleV, Costo_DetalleDV)
                                values
                                    (2, 2, 2, 21);
                                insert into DETALLEVENTA
                                    (Cod_Venta, Vinos_DetalleV, Cantidad_DetalleV, Costo_DetalleDV)
                                values
                                    (3, 3, 3, 54);
                                insert into DETALLEVENTA
                                    (Cod_Venta, Vinos_DetalleV, Cantidad_DetalleV, Costo_DetalleDV)
                                values
                                    (4, 4, 4, 34);
                                insert into DETALLEVENTA
                                    (Cod_Venta, Vinos_DetalleV, Cantidad_DetalleV, Costo_DetalleDV)
                                values
                                    (5, 5, 5, 76);

                                insert into COMPRAS
                                    (Fecha_Compra, Bodega, Empleado)
                                values
                                    ('2022-08-19', 1, 1);
                                insert into COMPRAS
                                    (Fecha_Compra, Bodega, Empleado)
                                values
                                    ('2022-08-22', 2, 2);
                                insert into COMPRAS
                                    (Fecha_Compra, Bodega, Empleado)
                                values
                                    ('2022-08-14', 3, 3);
                                insert into COMPRAS
                                    (Fecha_Compra, Bodega, Empleado)
                                values
                                    ('2022-04-12', 4, 4);
                                insert into COMPRAS
                                    (Fecha_Compra, Bodega, Empleado)
                                values
                                    ('2022-03-12', 5, 5);

                                insert into DETALLECOMPRA
                                    (Cod_Compra, Vinos_DetalleC, Cantidad_DetalleC, Costo_DetalleC)
                                values
                                    (1, 1, 3, 78);
                                insert into DETALLECOMPRA
                                    (Cod_Compra, Vinos_DetalleC, Cantidad_DetalleC, Costo_DetalleC)
                                values
                                    (2, 2, 2, 21);
                                insert into DETALLECOMPRA
                                    (Cod_Compra, Vinos_DetalleC, Cantidad_DetalleC, Costo_DetalleC)
                                values
                                    (3, 3, 3, 54);
                                insert into DETALLECOMPRA
                                    (Cod_Compra, Vinos_DetalleC, Cantidad_DetalleC, Costo_DetalleC)
                                values
                                    (4, 4, 4, 34);
                                insert into DETALLECOMPRA
                                    (Cod_Compra, Vinos_DetalleC, Cantidad_DetalleC, Costo_DetalleC)
                                values
                                    (5, 5, 5, 76);