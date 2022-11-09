-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-11-2022 a las 04:22:02
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vinos_charruas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bodega`
--

CREATE TABLE `bodega` (
  `ID_Bodega` int(11) NOT NULL,
  `Nombre_Bodega` varchar(40) DEFAULT NULL,
  `Email_Bodega` varchar(50) NOT NULL,
  `Direccion` varchar(70) DEFAULT NULL,
  `Pais` varchar(25) DEFAULT NULL,
  `Ciudad` varchar(25) DEFAULT NULL,
  `Cuenta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bodega`
--

INSERT INTO `bodega` (`ID_Bodega`, `Nombre_Bodega`, `Email_Bodega`, `Direccion`, `Pais`, `Ciudad`, `Cuenta`) VALUES
(1, 'Establecimiento Juanico', 'establecimiento@gmail.com', 'Ruta 5 Km 30', 'Uruguay', 'Canelones', 27),
(2, 'Bodega Roses', 'bodegaroses@gmail.com', 'Ruta 6 S/N - Km 30,200', 'Uruguay', 'Canelones', 57),
(3, 'Concha y Toro', 'conchaytoro@gmail.com', 'Avenida Virginia Subercaseaux 210 9480092 Pirque', 'Chile', 'Santiago', 17),
(4, 'Bodega Garzon', 'garzon@gmail.com', 'Ruta 9 Km. 175, Garzon 20401', 'Uruguay', 'Maldonado', 37),
(5, 'Santa Rosa', 'santarosa@gmail.com', '2218 Ruta Cesar Mayo Gutierrez', 'Uruguay', 'Montevideo', 27);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `Codigo_Cliente` int(11) NOT NULL,
  `CI_Cliente` char(8) NOT NULL,
  `Nombre_Cliente` varchar(20) DEFAULT NULL,
  `Direccion` varchar(70) DEFAULT NULL,
  `Ciudad` varchar(25) DEFAULT NULL,
  `Email_Cliente` varchar(50) DEFAULT NULL,
  `Contrasenia` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`Codigo_Cliente`, `CI_Cliente`, `Nombre_Cliente`, `Direccion`, `Ciudad`, `Email_Cliente`, `Contrasenia`) VALUES
(1, '54622348', 'Ramon Alvarez', 'Ruta 5 vieja', 'Las Piedras', 'ramon@gmail.com', '4412fafsf2'),
(2, '54642348', 'Gaston Alvarez', 'AV. Italia', 'Montevideo', 'gaston@gmail.com', '4412314fsf2'),
(3, '51232348', 'Gonzalo Alvarez', 'Calle Ancha', 'Canelones', 'gonzalo@gmail.com', '4412f124fds'),
(4, '52621318', 'Matias Alvarez', 'Cuareim', 'Las Piedras', 'matias@gmail.com', '441246f332f2'),
(5, '54622309', 'Sergio Alvarez', 'San Isidro', 'Las Piedras', 'Sergio@gmail.com', '44122f2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `Codigo_Compra` int(11) NOT NULL,
  `Fecha_Compra` datetime NOT NULL,
  `Bodega` int(11) NOT NULL,
  `Empleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`Codigo_Compra`, `Fecha_Compra`, `Bodega`, `Empleado`) VALUES
(1, '2022-08-19 00:00:00', 1, 1),
(2, '2022-08-22 00:00:00', 2, 2),
(3, '2022-08-14 00:00:00', 3, 3),
(4, '2022-04-12 00:00:00', 4, 4),
(5, '2022-03-12 00:00:00', 5, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallecompra`
--

CREATE TABLE `detallecompra` (
  `Cod_Detalle_Com` int(11) NOT NULL,
  `Cod_Compra` int(11) NOT NULL,
  `Vinos_DetalleC` int(11) NOT NULL,
  `Cantidad_DetalleC` int(11) NOT NULL CHECK (`Cantidad_DetalleC` > 0),
  `Costo_DetalleC` decimal(10,0) NOT NULL CHECK (`Costo_DetalleC` > 0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detallecompra`
--

INSERT INTO `detallecompra` (`Cod_Detalle_Com`, `Cod_Compra`, `Vinos_DetalleC`, `Cantidad_DetalleC`, `Costo_DetalleC`) VALUES
(1, 1, 1, 3, '78'),
(2, 2, 2, 2, '21'),
(3, 3, 3, 3, '54'),
(4, 4, 4, 4, '34'),
(5, 5, 5, 5, '76');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventa`
--

CREATE TABLE `detalleventa` (
  `Cod_Detalle_Ven` int(11) NOT NULL,
  `Cod_Venta` int(11) NOT NULL,
  `Vinos_DetalleV` int(11) NOT NULL,
  `Cantidad_DetalleV` int(11) NOT NULL CHECK (`Cantidad_DetalleV` > 0),
  `Costo_DetalleDV` decimal(10,0) NOT NULL CHECK (`Costo_DetalleDV` > 0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalleventa`
--

INSERT INTO `detalleventa` (`Cod_Detalle_Ven`, `Cod_Venta`, `Vinos_DetalleV`, `Cantidad_DetalleV`, `Costo_DetalleDV`) VALUES
(1, 1, 1, 3, '72'),
(2, 2, 2, 2, '21'),
(3, 3, 3, 3, '54'),
(4, 4, 4, 4, '34'),
(5, 5, 5, 5, '76');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `Codigo_Empleado` int(11) NOT NULL,
  `Nombre_Empleado` varchar(20) DEFAULT NULL,
  `CI_Empleado` char(8) NOT NULL,
  `Salario` int(11) NOT NULL CHECK (`Salario` >= 0),
  `Email_Emplaedo` varchar(50) DEFAULT NULL,
  `Contasenia` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`Codigo_Empleado`, `Nombre_Empleado`, `CI_Empleado`, `Salario`, `Email_Emplaedo`, `Contasenia`) VALUES
(1, 'Juan Carlos Rodrigez', '58240825', 25000, 'juancarlo@gmail.com', 'ewgdgw232523'),
(2, 'Ramon Gutierrez', '58212825', 26000, 'ramon@gmail.com', 'ew121441dsg23'),
(3, 'Pablo Perez', '58247659', 25000, 'pablo@gmail.com', 'ewdsgsdg32w123'),
(4, 'Gonzalo Gimenez', '58128655', 25000, 'gonzalo@gmail.com', 'ewgasdaadsdqadq'),
(5, 'Matias Martinez', '52240825', 25000, 'matias@gmail.com', 'ewgdgw23saf3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tel_bodega`
--

CREATE TABLE `tel_bodega` (
  `Cod_Bodega` int(11) NOT NULL,
  `Telefono_Bodega` char(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tel_bodega`
--

INSERT INTO `tel_bodega` (`Cod_Bodega`, `Telefono_Bodega`) VALUES
(1, '94789345'),
(2, '95234873'),
(3, '96437623'),
(4, '94342387'),
(5, '91342343');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tel_cliente`
--

CREATE TABLE `tel_cliente` (
  `Cod_Cliente` int(11) NOT NULL,
  `Telefono_Cliente` char(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tel_cliente`
--

INSERT INTO `tel_cliente` (`Cod_Cliente`, `Telefono_Cliente`) VALUES
(1, '99456782'),
(2, '95234789'),
(3, '98237854'),
(4, '93098457'),
(5, '92345724');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tel_empleado`
--

CREATE TABLE `tel_empleado` (
  `Cod_Empleado` int(11) NOT NULL,
  `Telefono_Empleado` char(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tel_empleado`
--

INSERT INTO `tel_empleado` (`Cod_Empleado`, `Telefono_Empleado`) VALUES
(1, '93094586'),
(2, '95234789'),
(3, '98343267'),
(4, '96234324'),
(5, '98355462');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `Codigo_Venta` int(11) NOT NULL,
  `Fecha_Venta` datetime NOT NULL,
  `cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`Codigo_Venta`, `Fecha_Venta`, `cliente`) VALUES
(1, '2022-08-12 00:00:00', 1),
(2, '2022-08-15 00:00:00', 2),
(3, '2022-08-12 00:00:00', 3),
(4, '2022-03-12 00:00:00', 4),
(5, '2022-06-12 00:00:00', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vinos`
--

CREATE TABLE `vinos` (
  `Codigo_Vino` int(11) NOT NULL,
  `Nombre_Vino` varchar(20) NOT NULL,
  `Precio` decimal(10,0) NOT NULL CHECK (`Precio` > 0),
  `Bodega_Vino` int(11) DEFAULT NULL,
  `Stock` int(11) NOT NULL CHECK (`Stock` >= 0),
  `Crianza` varchar(20) DEFAULT NULL,
  `Pais` varchar(20) DEFAULT NULL,
  `Region` varchar(50) DEFAULT NULL,
  `Cosecha` varchar(20) DEFAULT NULL,
  `Descripcion` varchar(100) DEFAULT NULL,
  `Ubicacion_IMG` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vinos`
--

INSERT INTO `vinos` (`Codigo_Vino`, `Nombre_Vino`, `Precio`, `Bodega_Vino`, `Stock`, `Crianza`, `Pais`, `Region`, `Cosecha`, `Descripcion`, `Ubicacion_IMG`) VALUES
(1, 'Santa Teresa', '24', 1, 15, '-', 'Uruguay', 'Canelones', '2022', '-', 'src/vinos/st1_tienda.png'),
(2, 'Casillero del Diablo', '50', 3, 5, '-', 'Chile', 'Santiago', '2022', '-', 'src/vinos/cdd1_tienda.png'),
(3, 'Vino Roses', '15', 2, 17, '-', 'Uruguay', 'Canelones', '2022', '-', 'src/vinos/vr1_tienda.png'),
(4, 'Balasto', '56', 4, 25, '-', 'Uruguay', 'Maldonado', '2022', '-', 'src/vinos/b1_tienda.png'),
(5, 'Don Pascual', '22', 1, 12, '-', 'Uruguay', 'Canelones', '2022', '-', 'src/vinos/dp1_tienda.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bodega`
--
ALTER TABLE `bodega`
  ADD PRIMARY KEY (`ID_Bodega`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`Codigo_Cliente`),
  ADD UNIQUE KEY `CI_Cliente` (`CI_Cliente`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`Codigo_Compra`),
  ADD KEY `Bodega` (`Bodega`),
  ADD KEY `Empleado` (`Empleado`);

--
-- Indices de la tabla `detallecompra`
--
ALTER TABLE `detallecompra`
  ADD PRIMARY KEY (`Cod_Detalle_Com`),
  ADD KEY `Vinos_DetalleC` (`Vinos_DetalleC`),
  ADD KEY `Cod_Compra` (`Cod_Compra`);

--
-- Indices de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD PRIMARY KEY (`Cod_Detalle_Ven`),
  ADD KEY `Vinos_DetalleV` (`Vinos_DetalleV`),
  ADD KEY `Cod_Venta` (`Cod_Venta`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`Codigo_Empleado`),
  ADD UNIQUE KEY `CI_Empleado` (`CI_Empleado`);

--
-- Indices de la tabla `tel_bodega`
--
ALTER TABLE `tel_bodega`
  ADD PRIMARY KEY (`Cod_Bodega`,`Telefono_Bodega`);

--
-- Indices de la tabla `tel_cliente`
--
ALTER TABLE `tel_cliente`
  ADD PRIMARY KEY (`Cod_Cliente`,`Telefono_Cliente`);

--
-- Indices de la tabla `tel_empleado`
--
ALTER TABLE `tel_empleado`
  ADD PRIMARY KEY (`Cod_Empleado`,`Telefono_Empleado`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`Codigo_Venta`,`Fecha_Venta`),
  ADD KEY `cliente` (`cliente`);

--
-- Indices de la tabla `vinos`
--
ALTER TABLE `vinos`
  ADD PRIMARY KEY (`Codigo_Vino`),
  ADD KEY `Bodega_Vino` (`Bodega_Vino`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bodega`
--
ALTER TABLE `bodega`
  MODIFY `ID_Bodega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `Codigo_Cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `Codigo_Compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `detallecompra`
--
ALTER TABLE `detallecompra`
  MODIFY `Cod_Detalle_Com` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  MODIFY `Cod_Detalle_Ven` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `Codigo_Empleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `Codigo_Venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `vinos`
--
ALTER TABLE `vinos`
  MODIFY `Codigo_Vino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`Bodega`) REFERENCES `bodega` (`ID_Bodega`),
  ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`Empleado`) REFERENCES `empleados` (`Codigo_Empleado`);

--
-- Filtros para la tabla `detallecompra`
--
ALTER TABLE `detallecompra`
  ADD CONSTRAINT `detallecompra_ibfk_1` FOREIGN KEY (`Vinos_DetalleC`) REFERENCES `vinos` (`Codigo_Vino`),
  ADD CONSTRAINT `detallecompra_ibfk_2` FOREIGN KEY (`Cod_Compra`) REFERENCES `compras` (`Codigo_Compra`);

--
-- Filtros para la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD CONSTRAINT `detalleventa_ibfk_1` FOREIGN KEY (`Vinos_DetalleV`) REFERENCES `vinos` (`Codigo_Vino`),
  ADD CONSTRAINT `detalleventa_ibfk_2` FOREIGN KEY (`Cod_Venta`) REFERENCES `ventas` (`Codigo_Venta`);

--
-- Filtros para la tabla `tel_bodega`
--
ALTER TABLE `tel_bodega`
  ADD CONSTRAINT `tel_bodega_ibfk_1` FOREIGN KEY (`Cod_Bodega`) REFERENCES `bodega` (`ID_Bodega`);

--
-- Filtros para la tabla `tel_cliente`
--
ALTER TABLE `tel_cliente`
  ADD CONSTRAINT `tel_cliente_ibfk_1` FOREIGN KEY (`Cod_Cliente`) REFERENCES `clientes` (`Codigo_Cliente`);

--
-- Filtros para la tabla `tel_empleado`
--
ALTER TABLE `tel_empleado`
  ADD CONSTRAINT `tel_empleado_ibfk_1` FOREIGN KEY (`Cod_Empleado`) REFERENCES `empleados` (`Codigo_Empleado`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`cliente`) REFERENCES `clientes` (`Codigo_Cliente`);

--
-- Filtros para la tabla `vinos`
--
ALTER TABLE `vinos`
  ADD CONSTRAINT `vinos_ibfk_1` FOREIGN KEY (`Bodega_Vino`) REFERENCES `bodega` (`ID_Bodega`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
