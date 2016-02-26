-- phpMyAdmin SQL Dump
-- version 4.0.10.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.2.0.2:3306
-- Tiempo de generación: 26-02-2016 a las 11:09:43
-- Versión del servidor: 5.5.45
-- Versión de PHP: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `phonejapan`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CARACTERISTICAS`
--

CREATE TABLE IF NOT EXISTS `CARACTERISTICAS` (
  `COD_CARAC` int(6) NOT NULL AUTO_INCREMENT,
  `COD_PROD` int(6) DEFAULT NULL,
  `PANTALLA` varchar(60) DEFAULT NULL,
  `RESOLUCION` varchar(60) DEFAULT NULL,
  `RAM` varchar(60) DEFAULT NULL,
  `MINTERNA` varchar(60) DEFAULT NULL,
  `PROCESADOR` varchar(200) DEFAULT NULL,
  `SO` varchar(60) DEFAULT NULL,
  `FRONTAL` varchar(60) DEFAULT NULL,
  `TRASERA` varchar(60) DEFAULT NULL,
  `SIM` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`COD_CARAC`),
  KEY `FK_CAR_PROD` (`COD_PROD`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Volcado de datos para la tabla `CARACTERISTICAS`
--

INSERT INTO `CARACTERISTICAS` (`COD_CARAC`, `COD_PROD`, `PANTALLA`, `RESOLUCION`, `RAM`, `MINTERNA`, `PROCESADOR`, `SO`, `FRONTAL`, `TRASERA`, `SIM`) VALUES
(19, 1, '4,5 pulgadas', '480 x 800 pÃ­xeles', '512Mb', '4GB', '1,2Ghz, 2 nÃºcleos', 'Android 4.19', '2Mpx', '5Mpx', 'Micro-SIM'),
(20, 2, '5.1 pulgadas', '2560 x 1440 pÃ­xeles (576 ppi)', '3 GB', '32 GB', 'QUAD-CORE 1.5 GHz Cortex-A53 , QUAD-CORE 2.1 GHz Cortex-A57', 'Android 5.0.2', '5 Mpx', '16 Mpx', 'Nano-SIM'),
(21, 3, '5.1 pulgadas', '2560 x 1440 pÃ­xeles (576 ppi)', '3 GB', '32 GB', 'QUAD-CORE 1.5 GHz Cortex-A53 , QUAD-CORE 2.1 GHz Cortex-A57', 'Android 5.0.2', '5 Mpx', '16 Mpx', 'Nano-SIM'),
(22, 4, '5 pulgadas', '720 x 1280 pixels', '1,5GB', '1,5Gb', 'QUAD CORE 1.2 GHz. Qualcomm MSM8916 Snapdragon 410', 'Android 5.1 Lollipop', '5 Mpx', '13 Mpx', 'Micro SIM + Micro SIM'),
(23, 5, '5 pulgadas', '480 x 854 pÃ­xeles', '512Mb', '4GB', 'QUAD-CORE 1,3 GHz. Mediatek', 'Android 4.4', '0,3 Mpx', '5 Mpx', 'Micro-SIM'),
(24, 6, '5 pulgadas', '540 x 960 pÃ­xeles', '1 GB', '4 GB', 'QUAD CORE 1,3 GHz. MediaTek', 'Android 4.4.2', '2 Mpx', '5 Mpx', 'SIM'),
(25, 7, '5 pulgadas', '1280x720', '2 GB', '16 GB', 'OCTA CORE 1,2 GHZ', 'Android 5.0', '5 Mpx', '13 Mpx', 'Nano-SIM y Micro-SIM'),
(26, 8, '5 pulgadas', '480 x 854', '1 GB', '8 GB', 'QUAD-CORE 1.2GHZ', 'Android 4.4 KitKat', '8 Mpx', '8 Mpx', 'Micro SIM'),
(27, 9, '5 pulgadas', '1280x720', '2 GB', '16 GB', 'OCTA CORE 1,2 GHZ', 'Android 5.0', '5 Mpx', '13 Mpx', 'Nano-SIM y Micro-SIM'),
(28, 10, '4,5 pulgadas', '540 x 960 - 244.77 ppi', '1 GB', '8GB', 'Quad Core Cortex A53 MediaTek MT6735M', 'Android 5.0.1 Lollipop', '8 Mpx', '8 Mpx', 'Micro SIM'),
(29, 11, '4,5 pulgadas', '854x480 pixeles', '1 GB', '8 Gb', 'QUAD CORE 1,2 GHZ', 'Android 5.0.1 Lollipop', '*', '5 Mpx', 'Micro SIM'),
(30, 12, '4,5 pulgadas', '960x540', '512Mb', '16 GB', 'QUAD CORE 1GHZ. ARM Cortex-A53 MediaTek MT6735M', 'Android 5.1.1 Lollipop', '5 Mpx', '8 Mpx', 'Micro SIM'),
(31, 13, '5 pulgadas', '8', '1 GB', '8 GB', 'QUAD CORE 1GHZ. ARM Cortex-A53 MediaTek MT6735P', 'Android 5.1', '2 Mpx', '13 Mpx', 'Micro-SIM'),
(32, 14, '5,5 Pulgadas', '1920x1080', '3 GB', '32 GB', 'OCTA CORE 1,5 GHZ. Qualcomm Snapdragon 616 MSM8952', 'Android 5.1.1 Lollipop', '5 Mpx', '14 Mpx', 'Nano-SIM'),
(33, 15, '5,2 pulgadas', '1080x1920', '3 GB', '8 GB', 'Quad Core 2.5GHz', 'Android 4.4.4 KitKat', '5 Mpx', '20,7 Mpx', 'Micro SIM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CESTA`
--

CREATE TABLE IF NOT EXISTS `CESTA` (
  `COD_USU` int(6) NOT NULL DEFAULT '0',
  `COD_PROD` int(8) NOT NULL DEFAULT '0',
  `CANTIDAD` int(10) DEFAULT NULL,
  PRIMARY KEY (`COD_USU`,`COD_PROD`),
  KEY `FK_CEST_PROD` (`COD_PROD`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `LINEADEPEDIDO`
--

CREATE TABLE IF NOT EXISTS `LINEADEPEDIDO` (
  `COD_LINEA` int(8) NOT NULL AUTO_INCREMENT,
  `COD_PEDIDO` int(6) NOT NULL DEFAULT '0',
  `COD_PROD` int(6) NOT NULL DEFAULT '0',
  `CANTIDAD` int(6) DEFAULT NULL,
  PRIMARY KEY (`COD_LINEA`,`COD_PEDIDO`,`COD_PROD`),
  KEY `FK_PED_LP` (`COD_PEDIDO`),
  KEY `FK_PED_P` (`COD_PROD`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Volcado de datos para la tabla `LINEADEPEDIDO`
--

INSERT INTO `LINEADEPEDIDO` (`COD_LINEA`, `COD_PEDIDO`, `COD_PROD`, `CANTIDAD`) VALUES
(27, 1, 10, 1),
(28, 1, 11, 1),
(29, 1, 15, 1),
(30, 2, 2, 2),
(31, 2, 10, 1),
(32, 2, 14, 2),
(33, 3, 10, 2),
(34, 4, 14, 1),
(35, 5, 14, 2),
(36, 6, 7, 2),
(37, 7, 7, 2),
(38, 8, 6, 2),
(39, 8, 14, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `OPINION`
--

CREATE TABLE IF NOT EXISTS `OPINION` (
  `COD_OPINION` int(20) NOT NULL AUTO_INCREMENT,
  `COD_USU` int(6) DEFAULT NULL,
  `COD_PROD` int(8) DEFAULT NULL,
  `FECHA_OP` date DEFAULT NULL,
  `MENSAJE` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`COD_OPINION`),
  KEY `FK_OP_USU` (`COD_USU`),
  KEY `FK_OP_PROD` (`COD_PROD`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=122 ;

--
-- Volcado de datos para la tabla `OPINION`
--

INSERT INTO `OPINION` (`COD_OPINION`, `COD_USU`, `COD_PROD`, `FECHA_OP`, `MENSAJE`) VALUES
(86, 6, 15, '2016-01-15', 'Este movil funciona de maravilla, 0 problemas hasta el momento usandolo. Gracias por todo PhoneJapan. Buen trato al cliente'),
(87, 6, 11, '2016-01-15', 'Este producto va de maravilla, lo recomiendo'),
(89, 7, 14, '2016-01-15', 'Producto en optimas condiciones. lo recomiendo'),
(90, 7, 2, '2016-01-15', 'Funciona de maravilla, no he tenido problemas hasta el momento'),
(101, 6, 14, '2016-02-23', 'ds'),
(102, 6, 14, '2016-02-23', 'dsiou'),
(104, 7, 1, '2016-02-23', 'safsafa'),
(105, 7, 1, '2016-02-23', 'iklosjifasdklÃ±fjs'),
(106, 7, 1, '2016-02-23', 'jejeje'),
(107, 7, 1, '2016-02-23', '<?php\necho "mal"\n?>'),
(108, 7, 1, '2016-02-23', 'holaaa'),
(109, 7, 1, '2016-02-23', '<?php\necho "mal"\n?>'),
(110, 7, 1, '2016-02-23', '<?php\necho $_SESSION["user];\n?>'),
(111, 7, 1, '2016-02-23', '<?php\necho "<h1>hello</h1>;\n?>'),
(112, 7, 1, '2016-02-23', '<?php\necho "<h1>hello</h1>";\n?>'),
(113, 7, 1, '2016-02-23', '<?php\nprint(<h1>hello</h1>);\n?>'),
(114, 7, 1, '2016-02-23', '<?php\nprint("<h1>hello</h1>");\n?>'),
(115, 7, 1, '2016-02-23', '<?php\nprintf("<h1>hello</h1>");\n?>'),
(116, 7, 1, '2016-02-23', '<?php\n5+5\n?>'),
(117, 7, 1, '2016-02-23', '<?php\necho 10+19\n?>'),
(118, 7, 1, '2016-02-23', '<?php\necho 10+19;\n?>'),
(119, 7, 1, '2016-02-23', '<?php\necho 5*6;\n?>'),
(120, 10, 7, '2016-02-24', 'kjlkj'),
(121, 26, 10, '2016-02-26', 'Producto en optimas condiciones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PEDIDO`
--

CREATE TABLE IF NOT EXISTS `PEDIDO` (
  `COD_PEDIDO` int(6) NOT NULL AUTO_INCREMENT,
  `COD_USU` int(6) DEFAULT NULL,
  `FECHA_PED` date DEFAULT NULL,
  `IMPORTE` double(11,2) DEFAULT NULL,
  PRIMARY KEY (`COD_PEDIDO`),
  KEY `FK_PED_USU` (`COD_USU`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `PEDIDO`
--

INSERT INTO `PEDIDO` (`COD_PEDIDO`, `COD_USU`, `FECHA_PED`, `IMPORTE`) VALUES
(1, 6, '2016-01-15', 767.00),
(2, 7, '2016-01-15', 2217.00),
(3, 12, '2016-01-15', 358.00),
(4, 11, '2016-01-16', 329.00),
(5, 6, '2016-02-23', 658.00),
(6, 7, '2016-02-23', 398.00),
(7, 10, '2016-02-24', 398.00),
(8, 25, '2016-02-24', 1185.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PRODUCTO`
--

CREATE TABLE IF NOT EXISTS `PRODUCTO` (
  `COD_PROD` int(8) NOT NULL AUTO_INCREMENT,
  `MARCA` varchar(50) DEFAULT NULL,
  `MODELO` varchar(50) DEFAULT NULL,
  `STOCK` int(8) DEFAULT NULL,
  `IMAGEN` varchar(1000) DEFAULT NULL,
  `PRECIO_UNI` double(11,2) DEFAULT NULL,
  PRIMARY KEY (`COD_PROD`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `PRODUCTO`
--

INSERT INTO `PRODUCTO` (`COD_PROD`, `MARCA`, `MODELO`, `STOCK`, `IMAGEN`, `PRECIO_UNI`) VALUES
(1, 'Samsung', 'Galaxy J1', 50, './imagenes/productos/samsung_galaxy_s6.png', 99.00),
(2, 'Samsung', 'Galaxy S6 G920 Negro', 48, './imagenes/productos/samsung_galaxy_s6_690.png', 690.00),
(3, 'Samsung', 'Galaxy S6 G920 Blanco', 50, './imagenes/productos/samsung_galaxy_s6_690_blanco.png', 690.00),
(4, 'Samsung', 'Galaxy J5 Blanco', 50, './imagenes/productos/SAMSUNG GALAXY J5 BLANCO.png', 219.00),
(5, 'Kazam', 'Trooper 450 Negro', 50, './imagenes/productos/KAZAM TROOPER 450 NEGRO.PNG', 99.00),
(6, 'ZTE', 'Blade L3 Blanco', 48, './imagenes/productos/ZTE BLADE L3 BLANCO.png', 99.00),
(7, 'Huawei', 'P8 LITE', 46, './imagenes/productos/HUAWEI P8 LITE.png', 199.00),
(8, 'Huawei', 'Y625 Negro', 50, './imagenes/productos/HUAWEI Y625 NEGRO.PNG', 119.00),
(9, 'Huawei', 'P8 LITE Blanco', 50, './imagenes/productos/HUAWEI P8 LITE BLANCO.png', 199.00),
(10, 'BQ', 'Aquaris M4,5 QHD 4G (8+1GB) Blanco', 46, './imagenes/productos/BQ AQUARIS M4,5 QHD 4G (8+1GB) BLANCO.png', 179.00),
(11, 'LG', 'Leon 4G Titanio', 49, './imagenes/productos/LG LEON 4G TITANIO.PNG', 159.00),
(12, 'BQ ', 'Aquaris A4.5 QHD 4G (16+1GB) Blanco', 100, './imagenes/productos/BQ AQUARIS A4.5 QHD 4G (16+1GB) BLANCO.png', 179.00),
(13, 'ZTE ', 'Blade A452 Dorado', 50, './imagenes/productos/ZTE BLADE A452 DORADO.png', 149.00),
(14, 'Huawei', 'G8 Silver', 42, './imagenes/productos/HUAWEI G8 SILVER.png', 329.00),
(15, 'Sony', 'Xperia  Z3', 49, './imagenes/productos/29907_spc_220_330_qhigh_product.PNG', 429.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PROVEEDOR`
--

CREATE TABLE IF NOT EXISTS `PROVEEDOR` (
  `COD_PROV` int(4) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(40) DEFAULT NULL,
  `CIUDAD` varchar(40) DEFAULT NULL,
  `DIRECCION` varchar(40) DEFAULT NULL,
  `CP` int(5) DEFAULT NULL,
  PRIMARY KEY (`COD_PROV`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `PROVEEDOR`
--

INSERT INTO `PROVEEDOR` (`COD_PROV`, `NOMBRE`, `CIUDAD`, `DIRECCION`, `CP`) VALUES
(9, 'Samsung', 'Korea', 'Korea', 44444),
(10, 'Kazam', 'Korea', 'Korea', 55555),
(11, 'ZTE', 'Korea', 'Korea', 11111),
(12, 'Huawei', 'Korea', 'Korea', 11111),
(13, 'LG', 'Korea', 'Korea', 11111),
(14, 'BQ', 'Korea', 'Korea', 34445),
(15, 'Sony', 'Korea', 'Korea', 44444);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `SUMINISTRO`
--

CREATE TABLE IF NOT EXISTS `SUMINISTRO` (
  `COD_SUM` int(8) NOT NULL AUTO_INCREMENT,
  `COD_PROD` int(8) DEFAULT NULL,
  `COD_PROV` int(8) DEFAULT NULL,
  `CANTIDAD` int(8) DEFAULT NULL,
  `FECHA_SUM` date NOT NULL,
  PRIMARY KEY (`COD_SUM`),
  KEY `FK_SUM_PROD` (`COD_PROD`),
  KEY `FK_SUM_PROV` (`COD_PROV`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Volcado de datos para la tabla `SUMINISTRO`
--

INSERT INTO `SUMINISTRO` (`COD_SUM`, `COD_PROD`, `COD_PROV`, `CANTIDAD`, `FECHA_SUM`) VALUES
(11, 1, 9, 50, '2016-01-15'),
(12, 2, 9, 50, '2016-01-15'),
(13, 3, 9, 50, '2016-01-15'),
(14, 4, 9, 50, '2016-01-15'),
(15, 5, 10, 50, '2016-01-15'),
(16, 6, 11, 50, '2016-01-15'),
(17, 7, 12, 50, '2016-01-15'),
(18, 8, 12, 50, '2016-01-15'),
(19, 9, 12, 50, '2016-01-15'),
(20, 10, 14, 50, '2016-01-15'),
(21, 11, 13, 50, '2016-01-15'),
(23, 13, 11, 50, '2016-01-15'),
(24, 14, 12, 50, '2016-01-15'),
(25, 12, 14, 50, '2016-01-15'),
(26, 15, 15, 50, '2016-01-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `USUARIO`
--

CREATE TABLE IF NOT EXISTS `USUARIO` (
  `COD_USU` int(6) NOT NULL AUTO_INCREMENT,
  `USERNAME` varchar(60) DEFAULT NULL,
  `USERPASS` varchar(60) DEFAULT NULL,
  `ROLE` varchar(20) DEFAULT NULL,
  `ESTADO` varchar(30) DEFAULT NULL,
  `EMAIL` varchar(500) DEFAULT NULL,
  `NOMBRE` varchar(80) DEFAULT NULL,
  `APELLIDOS` varchar(80) DEFAULT NULL,
  `DNI` varchar(9) DEFAULT NULL,
  `FECHA_NAC` date DEFAULT NULL,
  `DIRECCION` varchar(200) DEFAULT NULL,
  `CP` int(5) DEFAULT NULL,
  `CIUDAD` varchar(60) DEFAULT NULL,
  `PROVINCIA` varchar(60) DEFAULT NULL,
  `PAIS` varchar(60) DEFAULT NULL,
  `TLF` int(9) DEFAULT NULL,
  PRIMARY KEY (`COD_USU`),
  UNIQUE KEY `USERNAME` (`USERNAME`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Volcado de datos para la tabla `USUARIO`
--

INSERT INTO `USUARIO` (`COD_USU`, `USERNAME`, `USERPASS`, `ROLE`, `ESTADO`, `EMAIL`, `NOMBRE`, `APELLIDOS`, `DNI`, `FECHA_NAC`, `DIRECCION`, `CP`, `CIUDAD`, `PROVINCIA`, `PAIS`, `TLF`) VALUES
(1, 'jajapon91', '81dc9bdb52d04dc20036dbd8313ed055', 'Admin', 'ON', 'juan.antonio.japon@gmail.com', 'Juan Antonio', 'Japon', 'pdslÃ±fd', '2016-01-07', 'sfklsd', 44444, 'kljkj', 'jkljlkj', 'kllj', 999999999),
(3, 'dromero', '81dc9bdb52d04dc20036dbd8313ed055', 'Admin', 'ON', 'davidmalive@gmail.com', 'David', 'Romero Ballesta', '12345678D', '2015-12-24', 'c/ Direccion David', 41010, 'Sevilla Este', 'Sevilla', 'EspaÃ±a', 999999999),
(6, 'delasheras', '81dc9bdb52d04dc20036dbd8313ed055', 'User', 'ON', 'delasheras@gmail.com', 'Jose Daniel', 'De las Heras', '12345678D', '2016-01-07', 'lÃ±k,lÃ±klÃ±k', 77777, 'lkjkl', 'lkjkljl', 'ljkljkl', 645555666),
(7, 'adrian', '81dc9bdb52d04dc20036dbd8313ed055', 'User', 'ON', 'adriancasado@gmail.com', 'Adrian', 'Casado', '12345678D', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'juanfran', '81dc9bdb52d04dc20036dbd8313ed055', 'User', 'ON', 'juanfransanc@gmail.com', 'Juanfran', 'Sanchez', '12345678D', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'matito', '81dc9bdb52d04dc20036dbd8313ed055', 'User', 'ON', 'matito@gmail.com', 'Jesus', 'Matito', '12345678D', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'merino', '827ccb0eea8a706c4c34a16891f84e7b', 'User', 'OFF', 'merineitor@gmail.com', 'Antonio', 'Merino', '12345678D', '2015-12-01', 'Merino Street', 41010, 'Sevilla', 'Sevilla', 'EspaÃ±a', 923333333),
(11, 'ajvjimenez', '81dc9bdb52d04dc20036dbd8313ed055', 'User', 'ON', 'ajvjimenez@gmail.com', 'Antonio', 'Jimenez', '12345678D', '1991-01-15', 'C/ Alfareria 1ÂºB', 41010, 'Sevilla', 'Sevilla', 'EspaÃ±a', 999999999),
(12, 'javi', '81dc9bdb52d04dc20036dbd8313ed055', 'User', 'ON', 'javimawy@gmail.com', 'Javi', 'Mawy', '12345678D', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'Noelia', '81dc9bdb52d04dc20036dbd8313ed055', 'User', 'ON', 'noelia@gmail.com', 'Noelia', 'Marin Carrasco', NULL, '2016-01-13', NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'carolyne', '81dc9bdb52d04dc20036dbd8313ed055', 'User', 'ON', 'carolynenicole@hotmail.com', 'Carolyne', 'Nicole', NULL, '2016-01-12', NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'jduser', '81dc9bdb52d04dc20036dbd8313ed055', 'User', 'ON', 'pekechis@gmail.com', 'Juan Diego', 'Perez', NULL, '1988-02-09', NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'jdadmin', '81dc9bdb52d04dc20036dbd8313ed055', 'Admin', 'ON', 'pekechis_admin@gmail.com', 'Juan Diego', 'Perez', '77777777D', '1988-01-05', 'IES Triana', 41020, 'Sevilla', 'Sevilla', 'EspaÃ±a', 644555333);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `CARACTERISTICAS`
--
ALTER TABLE `CARACTERISTICAS`
  ADD CONSTRAINT `FK_CAR_PROD` FOREIGN KEY (`COD_PROD`) REFERENCES `PRODUCTO` (`COD_PROD`);

--
-- Filtros para la tabla `CESTA`
--
ALTER TABLE `CESTA`
  ADD CONSTRAINT `FK_CEST_PROD` FOREIGN KEY (`COD_PROD`) REFERENCES `PRODUCTO` (`COD_PROD`),
  ADD CONSTRAINT `FK_CEST_USU` FOREIGN KEY (`COD_USU`) REFERENCES `USUARIO` (`COD_USU`);

--
-- Filtros para la tabla `LINEADEPEDIDO`
--
ALTER TABLE `LINEADEPEDIDO`
  ADD CONSTRAINT `FK_PED_LP` FOREIGN KEY (`COD_PEDIDO`) REFERENCES `PEDIDO` (`COD_PEDIDO`),
  ADD CONSTRAINT `FK_PED_P` FOREIGN KEY (`COD_PROD`) REFERENCES `PRODUCTO` (`COD_PROD`);

--
-- Filtros para la tabla `OPINION`
--
ALTER TABLE `OPINION`
  ADD CONSTRAINT `FK_OP_PROD` FOREIGN KEY (`COD_PROD`) REFERENCES `PRODUCTO` (`COD_PROD`),
  ADD CONSTRAINT `FK_OP_USU` FOREIGN KEY (`COD_USU`) REFERENCES `USUARIO` (`COD_USU`);

--
-- Filtros para la tabla `PEDIDO`
--
ALTER TABLE `PEDIDO`
  ADD CONSTRAINT `FK_PED_USU` FOREIGN KEY (`COD_USU`) REFERENCES `USUARIO` (`COD_USU`);

--
-- Filtros para la tabla `SUMINISTRO`
--
ALTER TABLE `SUMINISTRO`
  ADD CONSTRAINT `FK_SUM_PROD` FOREIGN KEY (`COD_PROD`) REFERENCES `PRODUCTO` (`COD_PROD`),
  ADD CONSTRAINT `FK_SUM_PROV` FOREIGN KEY (`COD_PROV`) REFERENCES `PROVEEDOR` (`COD_PROV`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
