-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 23-11-2022 a las 02:28:12
-- Versión del servidor: 10.3.34-MariaDB-0ubuntu0.20.04.1
-- Versión de PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Vinos_Charruas`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `respaldo_bodega` ()  begin
		select * from RESPALDOSBODEGAS;
	end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `respaldo_vino` ()  begin
		SELECT * from RESPALDOSVINOS;
	end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `tres_productos_mas_vendidos` ()  begin
		SELECT VINOS.*, SUM(DETALLEVENTA.Cantidad_DetalleV) AS Total_de_Ventas FROM DETALLEVENTA
		JOIN VINOS ON DETALLEVENTA.Vinos_DetalleV = VINOS.Codigo_Vino
		GROUP BY VINOS.Codigo_Vino
		ORDER BY Total_de_Ventas
		DESC LIMIT 3;
	end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `BODEGA`
--

CREATE TABLE `BODEGA` (
  `ID_Bodega` int(11) NOT NULL,
  `Nombre_Bodega` varchar(40) NOT NULL,
  `Email_Bodega` varchar(50) NOT NULL,
  `Direccion` varchar(70) NOT NULL,
  `Pais_Bodega` varchar(25) NOT NULL,
  `Ciudad` varchar(25) NOT NULL,
  `Cuenta` int(11) NOT NULL,
  `Codigo_Postal` int(11) NOT NULL,
  `Telefono_Bodega` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `BODEGA`
--

INSERT INTO `BODEGA` (`ID_Bodega`, `Nombre_Bodega`, `Email_Bodega`, `Direccion`, `Pais_Bodega`, `Ciudad`, `Cuenta`, `Codigo_Postal`, `Telefono_Bodega`) VALUES
(1, 'Establecimiento Juanico', 'establecimiento@gmail.com', 'Ruta 5 Km 30', 'Uruguay', 'Canelones', 27, 90400, NULL),
(2, 'Bodega Roses', 'bodegaroses@gmail.com', 'Ruta 6 S/N - Km 30,200', 'Uruguay', 'Canelones', 57, 90000, NULL),
(3, 'Concha y Toro', 'conchaytoro@gmail.com', 'Avenida Virginia Subercaseaux 210 9480092 Pirque', 'Chile', 'Santiago', 17, 90000, NULL),
(4, 'Bodega Garzon', 'garzon@gmail.com', 'Ruta 9 Km. 175, Garzon 20401', 'Uruguay', 'Maldonado', 37, 90000, NULL),
(5, 'Santa Rosa', 'santarosa@gmail.com', '2218 Ruta Cesar Mayo Gutierrez', 'Uruguay', 'Montevideo', 27, 90000, NULL),
(6, 'Amalaya', 'amalya@outlook.com', '25 de Mayo y Cafayate', 'Argentina', 'Salta', 189023, 4427, 540115901),
(7, 'Kaiken', 'kaiken@hotmail.com', 'R. Sáenz Peña 5516', 'Argentina', 'Mendoza', 902476, 78000, 54926135),
(8, 'Herederos del Marqués', 'tienda@marquesderiscal.com', 'C/Torrea 1, 0134', 'España', 'Valladolid', 659033, 80000, 349456060);

--
-- Disparadores `BODEGA`
--
DELIMITER $$
CREATE TRIGGER `Respaldo_Bodega` BEFORE UPDATE ON `BODEGA` FOR EACH ROW insert into RESPALDOSBODEGAS (Resp_ID_Bodega, Resp_Nombre_Bodega, Resp_Cuenta) values (old.ID_Bodega, old.Nombre_Bodega, old.Cuenta)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CLIENTES`
--

CREATE TABLE `CLIENTES` (
  `Codigo_Cliente` int(11) NOT NULL,
  `CI_Cliente` char(8) NOT NULL,
  `Nombre_Cliente` varchar(20) NOT NULL,
  `Direccion` varchar(70) NOT NULL,
  `Ciudad` varchar(25) NOT NULL,
  `Email_Cliente` varchar(50) NOT NULL,
  `Contrasenia_Cliente` varchar(35) NOT NULL,
  `Telefono_Cliente` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `CLIENTES`
--

INSERT INTO `CLIENTES` (`Codigo_Cliente`, `CI_Cliente`, `Nombre_Cliente`, `Direccion`, `Ciudad`, `Email_Cliente`, `Contrasenia_Cliente`, `Telefono_Cliente`) VALUES
(1, '54622348', 'Ramon Alvarez', 'Ruta 5 vieja', 'Las Piedras', 'ramon@gmail.com', '123', NULL),
(2, '54642348', 'Gaston Alvarez', 'AV. Italia', 'Montevideo', 'gaston@gmail.com', '123', NULL),
(3, '51232348', 'Gonzalo Alvarez', 'Calle Ancha', 'Canelones', 'gonzalo@gmail.com', '123', NULL),
(4, '52621318', 'Matias Alvarez', 'Cuareim', 'Las Piedras', 'matias@gmail.com', '123', NULL),
(5, '54622309', 'Sergio Alvarez', 'San Isidro', 'Las Piedras', 'Sergio@gmail.com', '123', NULL),
(6, '55777939', 'Diego', 'No', 'Santa Lucía', 'diegoacunaowo@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL),
(7, '5325252', 'pisa uva', 'Vista Linda', 'San Francisco', 'vamosalchico@gmail.com', 'bfc9d2313a42bb458d22613ef091f0af', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `COMPRAS`
--

CREATE TABLE `COMPRAS` (
  `Codigo_Compra` int(11) NOT NULL,
  `Fecha_Compra` datetime NOT NULL,
  `Bodega` int(11) NOT NULL,
  `Empleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `COMPRAS`
--

INSERT INTO `COMPRAS` (`Codigo_Compra`, `Fecha_Compra`, `Bodega`, `Empleado`) VALUES
(1, '2022-11-23 00:00:00', 1, 1),
(2, '2022-11-23 00:00:00', 4, 1),
(3, '2022-11-23 00:00:00', 3, 1),
(4, '2022-11-23 00:00:00', 1, 2),
(5, '2022-11-23 00:00:00', 1, 2),
(6, '2022-11-23 00:00:00', 2, 2),
(7, '2022-11-23 00:00:00', 1, 2),
(8, '2022-11-23 00:00:00', 3, 2),
(9, '2022-11-23 00:00:00', 3, 2),
(10, '2022-11-23 00:00:00', 4, 2),
(11, '2022-11-23 00:00:00', 6, 2),
(12, '2022-11-23 00:00:00', 7, 2),
(13, '2022-11-23 00:00:00', 7, 2),
(14, '2022-11-23 00:00:00', 8, 2),
(15, '2022-11-23 00:00:00', 8, 2),
(16, '2022-11-23 00:00:00', 8, 2),
(17, '2022-11-23 00:00:00', 8, 2),
(18, '2022-11-23 00:00:00', 8, 2),
(19, '2022-11-23 00:00:00', 1, 2),
(20, '2022-11-23 00:00:00', 1, 5),
(21, '2022-11-23 00:00:00', 1, 5),
(22, '2022-11-23 00:00:00', 2, 5),
(23, '2022-11-23 00:00:00', 3, 5),
(24, '2022-11-23 00:00:00', 3, 5),
(25, '2022-11-23 00:00:00', 4, 5),
(26, '2022-11-23 00:00:00', 6, 5),
(27, '2022-11-23 00:00:00', 6, 5),
(28, '2022-11-23 00:00:00', 7, 5),
(29, '2022-11-23 00:00:00', 7, 5),
(30, '2022-11-23 00:00:00', 7, 5),
(31, '2022-11-23 00:00:00', 8, 5),
(32, '2022-11-23 00:00:00', 8, 5),
(33, '2022-11-23 00:00:00', 8, 5),
(34, '2022-11-23 00:00:00', 8, 5),
(35, '2022-11-23 00:00:00', 8, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DETALLECOMPRA`
--

CREATE TABLE `DETALLECOMPRA` (
  `Cod_Detalle_Com` int(11) NOT NULL,
  `Cod_Compra` int(11) NOT NULL,
  `Vinos_DetalleC` int(11) NOT NULL,
  `Cantidad_DetalleC` int(11) NOT NULL CHECK (`Cantidad_DetalleC` > 0),
  `Costo_DetalleC` decimal(10,0) NOT NULL CHECK (`Costo_DetalleC` > 0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `DETALLECOMPRA`
--

INSERT INTO `DETALLECOMPRA` (`Cod_Detalle_Com`, `Cod_Compra`, `Vinos_DetalleC`, `Cantidad_DetalleC`, `Costo_DetalleC`) VALUES
(1, 1, 5, 25, '333333'),
(2, 2, 4, 20, '4000'),
(3, 3, 2, 20, '3000'),
(4, 4, 1, 30, '1125'),
(5, 5, 5, 30, '2250'),
(6, 6, 3, 30, '249'),
(7, 7, 5, 30, '306'),
(8, 8, 2, 30, '449'),
(9, 9, 34, 30, '350'),
(10, 10, 4, 30, '250'),
(11, 11, 48, 30, '450'),
(12, 12, 49, 30, '1800'),
(13, 13, 50, 30, '850'),
(14, 14, 51, 30, '6100'),
(15, 15, 52, 30, '850'),
(16, 16, 53, 30, '3000'),
(17, 17, 54, 30, '1190'),
(18, 18, 55, 30, '2421'),
(19, 19, 1, 20, '1'),
(20, 20, 1, 50, '10000'),
(21, 21, 5, 50, '10000'),
(22, 22, 3, 50, '10000'),
(23, 23, 2, 50, '10000'),
(24, 24, 34, 50, '10000'),
(25, 25, 4, 50, '10000'),
(26, 26, 34, 50, '10000'),
(27, 27, 48, 50, '10000'),
(28, 28, 49, 50, '10000'),
(29, 29, 50, 50, '10000'),
(30, 30, 56, 50, '10000'),
(31, 31, 51, 50, '10000'),
(32, 32, 52, 50, '10000'),
(33, 33, 53, 50, '10000'),
(34, 34, 54, 50, '10000'),
(35, 35, 55, 50, '10000');

--
-- Disparadores `DETALLECOMPRA`
--
DELIMITER $$
CREATE TRIGGER `Stock_ALTAS` AFTER INSERT ON `DETALLECOMPRA` FOR EACH ROW update VINOS set Stock = new.Cantidad_DetalleC + Stock
 where VINOS.Codigo_Vino = new.Vinos_DetalleC
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `DETALLEVENTA`
--

CREATE TABLE `DETALLEVENTA` (
  `Cod_Detalle_Ven` int(11) NOT NULL,
  `Cod_Venta` int(11) NOT NULL,
  `Vinos_DetalleV` int(11) NOT NULL,
  `Cantidad_DetalleV` int(11) NOT NULL CHECK (`Cantidad_DetalleV` > 0),
  `Costo_DetalleV` decimal(10,0) NOT NULL CHECK (`Costo_DetalleV` > 0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `DETALLEVENTA`
--

INSERT INTO `DETALLEVENTA` (`Cod_Detalle_Ven`, `Cod_Venta`, `Vinos_DetalleV`, `Cantidad_DetalleV`, `Costo_DetalleV`) VALUES
(1, 1, 5, 1, '22'),
(2, 2, 5, 1, '22'),
(3, 3, 5, 1, '22'),
(4, 4, 5, 2, '22'),
(5, 5, 4, 5, '56'),
(6, 5, 5, 5, '22'),
(7, 6, 2, 5, '50'),
(8, 7, 3, 30, '239'),
(9, 7, 48, 30, '450'),
(10, 7, 55, 30, '2421'),
(11, 7, 49, 30, '1800'),
(12, 7, 50, 30, '850'),
(13, 7, 51, 30, '6100'),
(14, 7, 53, 30, '3000'),
(15, 7, 4, 45, '250'),
(16, 7, 54, 30, '1190'),
(17, 7, 5, 30, '306'),
(18, 7, 2, 30, '449'),
(19, 7, 52, 30, '850'),
(20, 7, 1, 30, '1125'),
(21, 7, 34, 30, '350'),
(22, 8, 2, 15, '449'),
(23, 8, 5, 45, '306'),
(24, 9, 1, 3, '1125'),
(25, 10, 1, 2, '1125'),
(26, 11, 1, 1, '1125'),
(27, 12, 1, 3, '1125'),
(28, 13, 1, 1, '1125');

--
-- Disparadores `DETALLEVENTA`
--
DELIMITER $$
CREATE TRIGGER `Stock_BAJAS` AFTER INSERT ON `DETALLEVENTA` FOR EACH ROW update VINOS set Stock = Stock - new.Cantidad_DetalleV
 where VINOS.Codigo_Vino = new.Vinos_DetalleV
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `EMPLEADOS`
--

CREATE TABLE `EMPLEADOS` (
  `Codigo_Empleado` int(11) NOT NULL,
  `Nombre_Empleado` varchar(20) NOT NULL,
  `CI_Empleado` char(8) NOT NULL,
  `Salario` int(11) DEFAULT NULL CHECK (`Salario` >= 0),
  `Direccion` varchar(70) NOT NULL,
  `Ciudad` varchar(25) NOT NULL,
  `Email_Empleado` varchar(50) NOT NULL,
  `Contrasenia_Empleado` varchar(35) NOT NULL,
  `Telefono_Empleado` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `EMPLEADOS`
--

INSERT INTO `EMPLEADOS` (`Codigo_Empleado`, `Nombre_Empleado`, `CI_Empleado`, `Salario`, `Direccion`, `Ciudad`, `Email_Empleado`, `Contrasenia_Empleado`, `Telefono_Empleado`) VALUES
(1, 'Nast Admin', '54410560', NULL, 'Mikasa', 'Canelones', 'nast@gmail.com', '289dff07669d7a23de0ef88d2f7129e7', NULL),
(2, 'Diego Admin', '43333333', NULL, 'santa lucia esquina algo', 'Santa Lucía', 'diego@gmail.com', '289dff07669d7a23de0ef88d2f7129e7', NULL),
(3, 'Matias Admin', '6666666', NULL, 'nose', 'Cerrillos', 'matias@gmail.com', '289dff07669d7a23de0ef88d2f7129e7', NULL),
(4, 'Gonzalo Admin', '3333333', NULL, 'Los Ceibos', 'Aguas Corrientes', 'gonzalo@gmail.com', '289dff07669d7a23de0ef88d2f7129e7', NULL),
(5, 'German Admin', '2222222', NULL, 'Camino Molinari', 'Juanicó', 'german@gmail.com', '289dff07669d7a23de0ef88d2f7129e7', NULL),
(6, 'Docente X', '11111111', NULL, '-', 'Canelones', 'docentes@gmail.com', '202cb962ac59075b964b07152d234b70', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `FALTASTOCK`
--

CREATE TABLE `FALTASTOCK` (
  `Cod_Falta_Stock` int(11) NOT NULL,
  `Cod_Vino_Fal_STK` int(11) DEFAULT NULL,
  `Nom_Vino_Fal_STK` varchar(40) DEFAULT NULL,
  `Stock_Fal_STK` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `Ganancias`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `Ganancias` (
`Codigo_Vino` int(11)
,`Nombre` varchar(20)
,`Ganancias` decimal(33,0)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `Producto_mas_Vendido`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `Producto_mas_Vendido` (
`Codigo_Vino` int(11)
,`Nombre` varchar(20)
,`Total_de_Ventas` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `Producto_menos_Vendido`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `Producto_menos_Vendido` (
`Codigo_Vino` int(11)
,`Nombre` varchar(20)
,`Total_de_Ventas` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `RESPALDOSBODEGAS`
--

CREATE TABLE `RESPALDOSBODEGAS` (
  `Cod_Respaldo_Bodega` int(11) NOT NULL,
  `Resp_ID_Bodega` int(11) DEFAULT NULL,
  `Resp_Nombre_Bodega` varchar(40) DEFAULT NULL,
  `Resp_Cuenta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `RESPALDOSVINOS`
--

CREATE TABLE `RESPALDOSVINOS` (
  `Cod_Respado_Vino` int(11) NOT NULL,
  `Resp_Cod_Vino` int(11) DEFAULT NULL,
  `Resp_Nombre_Vino` varchar(20) DEFAULT NULL,
  `Resp_Precio_Vino` decimal(10,0) DEFAULT NULL,
  `Resp_Stock_Vino` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `RESPALDOSVINOS`
--

INSERT INTO `RESPALDOSVINOS` (`Cod_Respado_Vino`, `Resp_Cod_Vino`, `Resp_Nombre_Vino`, `Resp_Precio_Vino`, `Resp_Stock_Vino`) VALUES
(1, 1, 'Amalaya Tinto', '24', 1),
(2, 2, 'Casillero del Diablo', '50', 1),
(3, 3, 'Vino Roses', '15', 1),
(4, 4, 'Balasto', '56', 1),
(5, 5, 'Don Pascual', '22', 1),
(6, 5, 'Don Pascual', '22', 0),
(7, 5, 'Don Pascual', '22', 25),
(8, 5, 'Don Pascual', '22', 24),
(9, 5, 'Don Pascual', '22', 23),
(10, 5, 'Don Pascual', '22', 22),
(11, 4, 'Balasto', '56', 0),
(12, 4, 'Balasto', '56', 20),
(13, 5, 'Don Pascual', '22', 20),
(14, 2, 'Casillero del Diablo', '50', 0),
(15, 2, 'Casillero del Diablo', '50', 20),
(17, 53, 'Barón de Chirel', '3000', 7),
(18, 51, 'Frank Gehry', '6100', 0),
(19, 53, 'Barón de Chirel', '3000', 7),
(20, 50, 'Kaiken Indómito', '850', 5),
(21, 54, 'FincaTorrea', '1190', 0),
(22, 34, 'Amalaya Blanco', '350', 0),
(23, 1, 'Amalaya Tinto', '24', 0),
(24, 53, 'Barón de Chirel', '3000', 0),
(25, 5, 'Don Pascual', '22', 15),
(26, 54, 'Finca Torrea', '1190', 0),
(27, 50, 'Kaiken Indómito', '850', 0),
(28, 55, 'Marqués Riscal 150°', '2421', 0),
(29, 3, 'Vino Roses', '15', 0),
(30, 1, 'Amalaya Tinto', '24', 0),
(31, 1, 'Amalaya Tinto', '1125', 0),
(32, 5, 'Don Pascual', '22', 15),
(33, 5, 'Don Pascual', '2250', 15),
(34, 3, 'Vino Roses', '15', 0),
(35, 3, 'Vino Roses', '239', 0),
(36, 5, 'Don Pascual', '2250', 45),
(37, 5, 'Don Pascual', '306', 45),
(38, 2, 'Casillero del Diablo', '50', 15),
(39, 2, 'Casillero del Diablo', '449', 15),
(40, 34, 'Amalaya Blanco', '350', 0),
(41, 4, 'Balasto', '56', 15),
(42, 4, 'Balasto', '250', 15),
(43, 48, 'Valle Calchaquí', '450', 0),
(44, 49, 'Kaiken Ultra', '1800', 0),
(45, 50, 'Kaiken Indómito', '850', 0),
(46, 51, 'Frank Gehry', '6100', 0),
(47, 52, 'Arienzo', '850', 0),
(48, 53, 'Barón de Chirel', '3000', 0),
(49, 54, 'Finca Torrea', '1190', 0),
(50, 55, 'Marqués Riscal 150°', '2421', 0),
(51, 56, 'Zapata Alta Malbec', '1200', 0),
(52, 3, 'Vino Roses', '239', 30),
(53, 48, 'Valle Calchaquí', '450', 30),
(54, 55, 'Marqués Riscal 150°', '2421', 30),
(55, 49, 'Kaiken Ultra', '1800', 30),
(56, 50, 'Kaiken Indómito', '850', 30),
(57, 51, 'Frank Gehry', '6100', 30),
(58, 53, 'Barón de Chirel', '3000', 30),
(59, 4, 'Balasto', '250', 45),
(60, 54, 'Finca Torrea', '1190', 30),
(61, 5, 'Don Pascual', '306', 75),
(62, 2, 'Casillero del Diablo', '449', 45),
(63, 52, 'Arienzo', '850', 30),
(64, 1, 'Amalaya Tinto', '1125', 30),
(65, 34, 'Amalaya Blanco', '350', 30),
(66, 2, 'Casillero del Diablo', '449', 15),
(67, 5, 'Don Pascual', '306', 45),
(68, 1, 'Amalaya Tinto', '1125', 0),
(69, 1, 'Amalaya Tinto', '1125', 20),
(70, 1, 'Amalaya Tinto', '1125', 17),
(71, 1, 'Amalaya Tinto', '1125', 15),
(72, 1, 'Amalaya Tinto', '1125', 14),
(73, 1, 'Amalaya Tinto', '1125', 11),
(74, 1, 'Amalaya Tinto', '1125', 10),
(75, 5, 'Don Pascual', '306', 0),
(76, 3, 'Vino Roses', '239', 0),
(77, 2, 'Casillero del Diablo', '449', 0),
(78, 34, 'Amalaya Blanco', '350', 0),
(79, 4, 'Balasto', '250', 0),
(80, 34, 'Amalaya Blanco', '350', 50),
(81, 34, 'Amalaya Blanco', '350', 50),
(82, 48, 'Valle Calchaquí', '450', 0),
(83, 49, 'Kaiken Ultra', '1800', 0),
(84, 50, 'Kaiken Indómito', '850', 0),
(85, 56, 'Zapata Alta Malbec', '1200', 0),
(86, 51, 'Frank Gehry', '6100', 0),
(87, 52, 'Arienzo', '850', 0),
(88, 53, 'Barón de Chirel', '3000', 0),
(89, 54, 'Finca Torrea', '1190', 0),
(90, 55, 'Marqués Riscal 150°', '2421', 0);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `Stock`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `Stock` (
`Nombre` varchar(20)
,`stock` bigint(12)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `VENTAS`
--

CREATE TABLE `VENTAS` (
  `Codigo_Venta` int(11) NOT NULL,
  `Fecha_Venta` datetime NOT NULL,
  `cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `VENTAS`
--

INSERT INTO `VENTAS` (`Codigo_Venta`, `Fecha_Venta`, `cliente`) VALUES
(1, '2022-11-23 00:00:00', 6),
(2, '2022-11-23 00:00:00', 6),
(3, '2022-11-23 00:00:00', 6),
(4, '2022-11-23 00:00:00', 6),
(5, '2022-11-23 00:00:00', 6),
(6, '2022-11-23 00:00:00', 6),
(9, '2022-11-23 00:00:00', 6),
(10, '2022-11-23 00:00:00', 6),
(11, '2022-11-23 00:00:00', 6),
(12, '2022-11-23 00:00:00', 6),
(13, '2022-11-23 00:00:00', 6),
(7, '2022-11-23 00:00:00', 7),
(8, '2022-11-23 00:00:00', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `VINOS`
--

CREATE TABLE `VINOS` (
  `Codigo_Vino` int(11) NOT NULL,
  `Nombre_Vino` varchar(20) NOT NULL,
  `Precio` decimal(10,0) NOT NULL CHECK (`Precio` > 0),
  `Bodega_Vino` int(11) NOT NULL,
  `Stock` int(11) DEFAULT 1 CHECK (`Stock` >= 0),
  `Pais_Vinos` varchar(20) NOT NULL,
  `Region` varchar(50) NOT NULL,
  `Cosecha` varchar(20) NOT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  `Ubicacion_IMG` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `VINOS`
--

INSERT INTO `VINOS` (`Codigo_Vino`, `Nombre_Vino`, `Precio`, `Bodega_Vino`, `Stock`, `Pais_Vinos`, `Region`, `Cosecha`, `Descripcion`, `Ubicacion_IMG`) VALUES
(1, 'Amalaya Tinto', '1125', 1, 60, 'Argentina', 'Mendoza', '2021', '-', 'src/vinos/amalaya-tinto.png'),
(2, 'Casillero del Diablo', '449', 3, 50, 'Chile', 'Santiago', '2022', '-', 'src/vinos/cdd1_tienda.png'),
(3, 'Vino Roses', '239', 2, 50, 'Uruguay', 'Canelones', '2022', '-', 'src/vinos/vr1_tienda.png'),
(4, 'Balasto', '250', 4, 50, 'Uruguay', 'Maldonado', '2022', '15', 'src/vinos/b1_tienda.png'),
(5, 'Don Pascual', '306', 1, 50, 'Uruguay', 'Canelones', '2022', '45', 'src/vinos/dp1_tienda.png'),
(34, 'Amalaya Blanco', '350', 6, 100, 'Argentina', 'Salta', '2021', '-', 'src/vinos/amalaya-blanco-1.png'),
(48, 'Valle Calchaquí', '450', 6, 50, 'Argentina', 'Salta', '2018', '-', 'src/vinos/malbec-bodega-amalaya.png'),
(49, 'Kaiken Ultra', '1800', 7, 50, 'Argentina', 'Mendoza', '2021', '-', 'src/vinos/kaiken-malbec-ultra.png'),
(50, 'Kaiken Indómito', '850', 7, 50, 'Argentina', 'Mendoza', '2020', '-', 'src/vinos/6304e778ebd65.png'),
(51, 'Frank Gehry', '6100', 8, 50, 'España', 'Madrid', '2012', '-', 'src/vinos/FrankGehry Selection2012.png'),
(52, 'Arienzo', '850', 8, 50, 'España', 'Madrid', '2019', '-', 'src/vinos/arienzo-detalle2x.png'),
(53, 'Barón de Chirel', '3000', 8, 50, 'España', 'Madrid', '2020', '-', 'src/vinos/BaróndeChirel.png'),
(54, 'Finca Torrea', '1190', 8, 50, 'España', 'Madrid', '2020', '-', 'src/vinos/FincaTorrea.png'),
(55, 'Marqués Riscal 150°', '2421', 8, 50, 'España', 'Madrid', '2016', '-', 'src/vinos/MarquésdeRiscal150Aniversario.png'),
(56, 'Zapata Alta Malbec', '1200', 7, 50, 'Argentina', 'Mendoza', '2020', '0', 'src/vinos/zapata-alta-malbec.png');

--
-- Disparadores `VINOS`
--
DELIMITER $$
CREATE TRIGGER `Respaldo_Vinos` BEFORE UPDATE ON `VINOS` FOR EACH ROW insert into RESPALDOSVINOS (Resp_Cod_Vino , Resp_Nombre_Vino, Resp_Precio_Vino, Resp_Stock_Vino) values (old.Codigo_Vino, old.Nombre_Vino, old.Precio, old.Stock);
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura para la vista `Ganancias`
--
DROP TABLE IF EXISTS `Ganancias`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `Ganancias`  AS  select `VINOS`.`Codigo_Vino` AS `Codigo_Vino`,`VINOS`.`Nombre_Vino` AS `Nombre`,sum(`DETALLEVENTA`.`Costo_DetalleV`) - sum(`DETALLECOMPRA`.`Costo_DetalleC`) AS `Ganancias` from ((`DETALLECOMPRA` join `VINOS` on(`DETALLECOMPRA`.`Vinos_DetalleC` = `VINOS`.`Codigo_Vino`)) join `DETALLEVENTA` on(`VINOS`.`Codigo_Vino` = `DETALLEVENTA`.`Cod_Detalle_Ven`)) group by `VINOS`.`Codigo_Vino` order by sum(`DETALLEVENTA`.`Costo_DetalleV`) - sum(`DETALLECOMPRA`.`Costo_DetalleC`) desc ;

-- --------------------------------------------------------

--
-- Estructura para la vista `Producto_mas_Vendido`
--
DROP TABLE IF EXISTS `Producto_mas_Vendido`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `Producto_mas_Vendido`  AS  select `VINOS`.`Codigo_Vino` AS `Codigo_Vino`,`VINOS`.`Nombre_Vino` AS `Nombre`,sum(`DETALLEVENTA`.`Cantidad_DetalleV`) AS `Total_de_Ventas` from (`DETALLEVENTA` join `VINOS` on(`DETALLEVENTA`.`Vinos_DetalleV` = `VINOS`.`Codigo_Vino`)) group by `VINOS`.`Codigo_Vino` order by sum(`DETALLEVENTA`.`Cantidad_DetalleV`) desc ;

-- --------------------------------------------------------

--
-- Estructura para la vista `Producto_menos_Vendido`
--
DROP TABLE IF EXISTS `Producto_menos_Vendido`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `Producto_menos_Vendido`  AS  select `VINOS`.`Codigo_Vino` AS `Codigo_Vino`,`VINOS`.`Nombre_Vino` AS `Nombre`,sum(`DETALLEVENTA`.`Cantidad_DetalleV`) AS `Total_de_Ventas` from (`DETALLEVENTA` join `VINOS` on(`DETALLEVENTA`.`Vinos_DetalleV` = `VINOS`.`Codigo_Vino`)) group by `VINOS`.`Codigo_Vino` order by sum(`DETALLEVENTA`.`Cantidad_DetalleV`) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `Stock`
--
DROP TABLE IF EXISTS `Stock`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `Stock`  AS  select `VINOS`.`Nombre_Vino` AS `Nombre`,`DETALLECOMPRA`.`Cantidad_DetalleC` - `DETALLEVENTA`.`Cantidad_DetalleV` AS `stock` from ((`DETALLECOMPRA` join `VINOS` on(`DETALLECOMPRA`.`Vinos_DetalleC` = `VINOS`.`Codigo_Vino`)) join `DETALLEVENTA` on(`VINOS`.`Codigo_Vino` = `DETALLEVENTA`.`Cod_Detalle_Ven`)) group by `VINOS`.`Codigo_Vino` order by `DETALLECOMPRA`.`Cantidad_DetalleC` - `DETALLEVENTA`.`Cantidad_DetalleV` ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `BODEGA`
--
ALTER TABLE `BODEGA`
  ADD PRIMARY KEY (`ID_Bodega`),
  ADD UNIQUE KEY `Nombre_Bodega` (`Nombre_Bodega`);

--
-- Indices de la tabla `CLIENTES`
--
ALTER TABLE `CLIENTES`
  ADD PRIMARY KEY (`Codigo_Cliente`),
  ADD UNIQUE KEY `CI_Cliente` (`CI_Cliente`),
  ADD UNIQUE KEY `Email_Cliente` (`Email_Cliente`);

--
-- Indices de la tabla `COMPRAS`
--
ALTER TABLE `COMPRAS`
  ADD PRIMARY KEY (`Codigo_Compra`),
  ADD KEY `Bodega` (`Bodega`),
  ADD KEY `Empleado` (`Empleado`);

--
-- Indices de la tabla `DETALLECOMPRA`
--
ALTER TABLE `DETALLECOMPRA`
  ADD PRIMARY KEY (`Cod_Detalle_Com`),
  ADD KEY `Vinos_DetalleC` (`Vinos_DetalleC`),
  ADD KEY `Cod_Compra` (`Cod_Compra`);

--
-- Indices de la tabla `DETALLEVENTA`
--
ALTER TABLE `DETALLEVENTA`
  ADD PRIMARY KEY (`Cod_Detalle_Ven`),
  ADD KEY `Vinos_DetalleV` (`Vinos_DetalleV`),
  ADD KEY `Cod_Venta` (`Cod_Venta`);

--
-- Indices de la tabla `EMPLEADOS`
--
ALTER TABLE `EMPLEADOS`
  ADD PRIMARY KEY (`Codigo_Empleado`),
  ADD UNIQUE KEY `CI_Empleado` (`CI_Empleado`),
  ADD UNIQUE KEY `Email_Empleado` (`Email_Empleado`);

--
-- Indices de la tabla `FALTASTOCK`
--
ALTER TABLE `FALTASTOCK`
  ADD PRIMARY KEY (`Cod_Falta_Stock`);

--
-- Indices de la tabla `RESPALDOSBODEGAS`
--
ALTER TABLE `RESPALDOSBODEGAS`
  ADD PRIMARY KEY (`Cod_Respaldo_Bodega`);

--
-- Indices de la tabla `RESPALDOSVINOS`
--
ALTER TABLE `RESPALDOSVINOS`
  ADD PRIMARY KEY (`Cod_Respado_Vino`);

--
-- Indices de la tabla `VENTAS`
--
ALTER TABLE `VENTAS`
  ADD PRIMARY KEY (`Codigo_Venta`,`Fecha_Venta`),
  ADD KEY `cliente` (`cliente`);

--
-- Indices de la tabla `VINOS`
--
ALTER TABLE `VINOS`
  ADD PRIMARY KEY (`Codigo_Vino`),
  ADD UNIQUE KEY `Nombre_Vino` (`Nombre_Vino`),
  ADD KEY `Bodega_Vino` (`Bodega_Vino`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `BODEGA`
--
ALTER TABLE `BODEGA`
  MODIFY `ID_Bodega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `CLIENTES`
--
ALTER TABLE `CLIENTES`
  MODIFY `Codigo_Cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `COMPRAS`
--
ALTER TABLE `COMPRAS`
  MODIFY `Codigo_Compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `DETALLECOMPRA`
--
ALTER TABLE `DETALLECOMPRA`
  MODIFY `Cod_Detalle_Com` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `DETALLEVENTA`
--
ALTER TABLE `DETALLEVENTA`
  MODIFY `Cod_Detalle_Ven` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `EMPLEADOS`
--
ALTER TABLE `EMPLEADOS`
  MODIFY `Codigo_Empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `FALTASTOCK`
--
ALTER TABLE `FALTASTOCK`
  MODIFY `Cod_Falta_Stock` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `RESPALDOSBODEGAS`
--
ALTER TABLE `RESPALDOSBODEGAS`
  MODIFY `Cod_Respaldo_Bodega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `RESPALDOSVINOS`
--
ALTER TABLE `RESPALDOSVINOS`
  MODIFY `Cod_Respado_Vino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `VENTAS`
--
ALTER TABLE `VENTAS`
  MODIFY `Codigo_Venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `VINOS`
--
ALTER TABLE `VINOS`
  MODIFY `Codigo_Vino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `COMPRAS`
--
ALTER TABLE `COMPRAS`
  ADD CONSTRAINT `COMPRAS_ibfk_1` FOREIGN KEY (`Bodega`) REFERENCES `BODEGA` (`ID_Bodega`),
  ADD CONSTRAINT `COMPRAS_ibfk_2` FOREIGN KEY (`Empleado`) REFERENCES `EMPLEADOS` (`Codigo_Empleado`);

--
-- Filtros para la tabla `DETALLECOMPRA`
--
ALTER TABLE `DETALLECOMPRA`
  ADD CONSTRAINT `DETALLECOMPRA_ibfk_1` FOREIGN KEY (`Vinos_DetalleC`) REFERENCES `VINOS` (`Codigo_Vino`),
  ADD CONSTRAINT `DETALLECOMPRA_ibfk_2` FOREIGN KEY (`Cod_Compra`) REFERENCES `COMPRAS` (`Codigo_Compra`);

--
-- Filtros para la tabla `DETALLEVENTA`
--
ALTER TABLE `DETALLEVENTA`
  ADD CONSTRAINT `DETALLEVENTA_ibfk_1` FOREIGN KEY (`Vinos_DetalleV`) REFERENCES `VINOS` (`Codigo_Vino`),
  ADD CONSTRAINT `DETALLEVENTA_ibfk_2` FOREIGN KEY (`Cod_Venta`) REFERENCES `VENTAS` (`Codigo_Venta`);

--
-- Filtros para la tabla `VENTAS`
--
ALTER TABLE `VENTAS`
  ADD CONSTRAINT `VENTAS_ibfk_1` FOREIGN KEY (`cliente`) REFERENCES `CLIENTES` (`Codigo_Cliente`);

--
-- Filtros para la tabla `VINOS`
--
ALTER TABLE `VINOS`
  ADD CONSTRAINT `VINOS_ibfk_1` FOREIGN KEY (`Bodega_Vino`) REFERENCES `BODEGA` (`ID_Bodega`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
