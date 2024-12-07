-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2024 a las 20:35:35
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ventaexpress`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `nu_cliente` int(11) NOT NULL,
  `nu_producto` int(11) NOT NULL,
  `fe_registro` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `nu_categoria` int(11) NOT NULL,
  `nb_categoria` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`nu_categoria`, `nb_categoria`) VALUES
(28, 'Cocina'),
(24, 'Comida'),
(23, 'Cosmeticos'),
(26, 'Decoración'),
(19, 'Deportes'),
(29, 'Dormitorio'),
(30, 'Escolar'),
(25, 'Gaming'),
(21, 'Herramientas'),
(18, 'Juguetes'),
(27, 'Maquillaje'),
(20, 'Niños'),
(22, 'Tecnología');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `nu_cliente` int(11) NOT NULL,
  `nb_cliente` varchar(50) NOT NULL,
  `nu_cedula` int(11) NOT NULL,
  `co_correo` varchar(35) NOT NULL,
  `co_clave` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`nu_cliente`, `nb_cliente`, `nu_cedula`, `co_correo`, `co_clave`) VALUES
(1, 'Adolfo', 12345678, 'adolfo123@gmail.com', 'inicio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `nu_compra` int(11) NOT NULL,
  `fe_compra` date NOT NULL,
  `nu_cliente` int(11) NOT NULL,
  `in_despacho` char(1) NOT NULL,
  `fe_despacho` date DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `nu_producto` int(11) NOT NULL,
  `nb_producto` varchar(50) NOT NULL,
  `de_producto` text NOT NULL,
  `va_precio` decimal(10,0) NOT NULL,
  `ca_existencia` int(11) NOT NULL,
  `nb_imagen` varchar(35) NOT NULL,
  `nu_categoria` int(11) NOT NULL
) ;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`nu_producto`, `nb_producto`, `de_producto`, `va_precio`, `ca_existencia`, `nb_imagen`, `nu_categoria`) VALUES
(1, 'Destornillador', 'Destornillador marca Philips de base plástica cubierta con resina epóxica y acabados de franja amarilla punta plana de 1cm a base de hierro.', 15, 30, 'destornillador.jpg', 21);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_compra`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `view_compra` (
`nu_compra` int(11)
,`fe_compra` date
,`nu_cliente` int(11)
,`in_despacho` char(1)
,`fe_despacho` date
,`nb_cliente` varchar(50)
,`nu_cedula` int(11)
,`co_correo` varchar(35)
,`co_clave` varchar(35)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_producto`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `view_producto` (
`nu_producto` int(11)
,`nb_producto` varchar(50)
,`de_producto` text
,`va_precio` decimal(10,0)
,`ca_existencia` int(11)
,`nb_imagen` varchar(35)
,`nu_categoria` int(11)
,`nb_categoria` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `view_compra`
--
DROP TABLE IF EXISTS `view_compra`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_compra`  AS SELECT `c`.`nu_compra` AS `nu_compra`, `c`.`fe_compra` AS `fe_compra`, `c`.`nu_cliente` AS `nu_cliente`, `c`.`in_despacho` AS `in_despacho`, `c`.`fe_despacho` AS `fe_despacho`, `x`.`nb_cliente` AS `nb_cliente`, `x`.`nu_cedula` AS `nu_cedula`, `x`.`co_correo` AS `co_correo`, `x`.`co_clave` AS `co_clave` FROM (`compra` `c` join `cliente` `x` on(`c`.`nu_cliente` = `x`.`nu_cliente`)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `view_producto`
--
DROP TABLE IF EXISTS `view_producto`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_producto`  AS SELECT `p`.`nu_producto` AS `nu_producto`, `p`.`nb_producto` AS `nb_producto`, `p`.`de_producto` AS `de_producto`, `p`.`va_precio` AS `va_precio`, `p`.`ca_existencia` AS `ca_existencia`, `p`.`nb_imagen` AS `nb_imagen`, `p`.`nu_categoria` AS `nu_categoria`, `c`.`nb_categoria` AS `nb_categoria` FROM (`producto` `p` join `categoria` `c` on(`p`.`nu_categoria` = `c`.`nu_categoria`)) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`nu_cliente`,`nu_producto`),
  ADD KEY `nu_producto` (`nu_producto`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`nu_categoria`),
  ADD UNIQUE KEY `nb_categoria` (`nb_categoria`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`nu_cliente`),
  ADD UNIQUE KEY `nu_cedula` (`nu_cedula`),
  ADD UNIQUE KEY `co_correo` (`co_correo`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`nu_compra`),
  ADD KEY `nu_cliente` (`nu_cliente`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`nu_producto`),
  ADD UNIQUE KEY `nb_producto` (`nb_producto`,`nu_categoria`),
  ADD KEY `nu_categoria` (`nu_categoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `nu_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `nu_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `nu_compra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `nu_producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`nu_cliente`) REFERENCES `cliente` (`nu_cliente`),
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`nu_producto`) REFERENCES `producto` (`nu_producto`);

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`nu_cliente`) REFERENCES `cliente` (`nu_cliente`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`nu_categoria`) REFERENCES `categoria` (`nu_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
