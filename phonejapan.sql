-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-01-2016 a las 22:32:18
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `phonejapan`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `COD_PROD` int(8) NOT NULL,
  `MARCA` varchar(50) DEFAULT NULL,
  `MODELO` varchar(50) DEFAULT NULL,
  `STOCK` int(8) DEFAULT NULL,
  `IMAGEN` varchar(1000) DEFAULT NULL,
  `PRECIO_UNI` double(11,2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`COD_PROD`, `MARCA`, `MODELO`, `STOCK`, `IMAGEN`, `PRECIO_UNI`) VALUES
(1, 'Huawei', 'T1 7 WIFI', 40, './imagenes/productos/3.png', 60.00),
(2, 'Huawei', 'Ascend Y625 Blanco Libre', 40, './imagenes/productos/2.png', 99.99),
(3, 'Huawei', 'Ascend Y625 Blanco Libre', 40, './imagenes/productos/3.png', 99.99),
(5, 'Huawei', 'Japan Edition', 45, './imagenes/productos/japanedition.png', 299.99),
(7, 'prueba', 'prueba', 10, './imagenes/productos/4.png', 200.00),
(8, 'skjal', 'klasfj', 20, './imagenes/productos/1.png', 20.00),
(9, 'Samsung', 'Galaxy S5', 54, './imagenes/productos/japanedition.png', 400.00),
(10, 'Samsung', 'Galaxy S6', 40, './imagenes/productos/japanedition.png', 300.00),
(11, 'Samsung', 'Galaxy S6 Japan3', 41, './imagenes/productos/japanedition.png', 300.00),
(12, 'Samsung', 'Galaxy S6 Japan2', 44, './imagenes/productos/japanedition.png', 300.01),
(13, 'Samsung', 'Galaxy S6 Japan4', 40, './imagenes/productos/japanedition.png', 300.00);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`COD_PROD`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `COD_PROD` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
