-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-01-2016 a las 08:05:31
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
-- Estructura de tabla para la tabla `caracteristicas`
--

CREATE TABLE IF NOT EXISTS `caracteristicas` (
  `COD_CARAC` int(6) NOT NULL,
  `COD_PROD` int(6) DEFAULT NULL,
  `PANTALLA` varchar(60) DEFAULT NULL,
  `RESOLUCION` varchar(60) DEFAULT NULL,
  `RAM` varchar(60) DEFAULT NULL,
  `MINTERNA` varchar(60) DEFAULT NULL,
  `PROCESADOR` varchar(200) DEFAULT NULL,
  `SO` varchar(60) DEFAULT NULL,
  `FRONTAL` varchar(60) DEFAULT NULL,
  `TRASERA` varchar(60) DEFAULT NULL,
  `SIM` varchar(60) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `caracteristicas`
--

INSERT INTO `caracteristicas` (`COD_CARAC`, `COD_PROD`, `PANTALLA`, `RESOLUCION`, `RAM`, `MINTERNA`, `PROCESADOR`, `SO`, `FRONTAL`, `TRASERA`, `SIM`) VALUES
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
-- Estructura de tabla para la tabla `cesta`
--

CREATE TABLE IF NOT EXISTS `cesta` (
  `COD_USU` int(6) NOT NULL DEFAULT '0',
  `COD_PROD` int(8) NOT NULL DEFAULT '0',
  `CANTIDAD` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineadepedido`
--

CREATE TABLE IF NOT EXISTS `lineadepedido` (
  `COD_LINEA` int(8) NOT NULL,
  `COD_PEDIDO` int(6) NOT NULL DEFAULT '0',
  `COD_PROD` int(6) NOT NULL DEFAULT '0',
  `CANTIDAD` int(6) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lineadepedido`
--

INSERT INTO `lineadepedido` (`COD_LINEA`, `COD_PEDIDO`, `COD_PROD`, `CANTIDAD`) VALUES
(27, 1, 10, 1),
(28, 1, 11, 1),
(29, 1, 15, 1),
(30, 2, 2, 2),
(31, 2, 10, 1),
(32, 2, 14, 2),
(33, 3, 10, 2),
(34, 4, 14, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opinion`
--

CREATE TABLE IF NOT EXISTS `opinion` (
  `COD_OPINION` int(20) NOT NULL,
  `COD_USU` int(6) DEFAULT NULL,
  `COD_PROD` int(8) DEFAULT NULL,
  `FECHA_OP` date DEFAULT NULL,
  `MENSAJE` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `opinion`
--

INSERT INTO `opinion` (`COD_OPINION`, `COD_USU`, `COD_PROD`, `FECHA_OP`, `MENSAJE`) VALUES
(86, 6, 15, '2016-01-15', 'Este movil funciona de maravilla, 0 problemas hasta el momento usandolo. Gracias por todo PhoneJapan. Buen trato al cliente'),
(87, 6, 11, '2016-01-15', 'Este producto va de maravilla, lo recomiendo'),
(88, 6, 10, '2016-01-15', 'Necesitabaaa este producto, va de maravilla'),
(89, 7, 14, '2016-01-15', 'Producto en optimas condiciones. lo recomiendo'),
(90, 7, 2, '2016-01-15', 'Funciona de maravilla, no he tenido problemas hasta el momento'),
(92, 7, 10, '2016-01-15', 'No te motives, este japon es un caso haciendo cosas jajaja'),
(94, 3, 10, '2016-01-15', 'Como sigais hablando mal de japon os borro la cuenta y ya no volveis a entrar aqui x,DDD JAPON CABROOON SALUDAA A LA AFICION!!'),
(95, 1, 10, '2016-01-15', 'Que mamoooones sois jajaja\n'),
(96, 10, 10, '2016-01-15', 'Japooon me tienes que ayudar con lo de tito nicoo que voy mas perdio que el barco del arrooo!'),
(97, 12, 10, '2016-01-15', 'Japon que te acabo de hacer un SQL Injectioon '),
(98, 22, 10, '2016-01-15', 'jaapon necesito ayudaa, podrias pasarme todo el proyecto? para verlo y eso (luego lo entrego tal y como esta)'),
(99, 7, 10, '2016-01-15', 'esto esta to maal, el proximo dia te voy a petar la pagina jajajaj'),
(100, 23, 10, '2016-01-15', 'Ayyyyy japooon pero k vieeen echaa staaaa. Jose daniiieee k me avurroooo ablamee por waaa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `COD_PEDIDO` int(6) NOT NULL,
  `COD_USU` int(6) DEFAULT NULL,
  `FECHA_PED` date DEFAULT NULL,
  `IMPORTE` double(11,2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`COD_PEDIDO`, `COD_USU`, `FECHA_PED`, `IMPORTE`) VALUES
(1, 6, '2016-01-15', 767.00),
(2, 7, '2016-01-15', 2217.00),
(3, 12, '2016-01-15', 358.00),
(4, 11, '2016-01-16', 329.00);

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`COD_PROD`, `MARCA`, `MODELO`, `STOCK`, `IMAGEN`, `PRECIO_UNI`) VALUES
(1, 'Samsung', 'Galaxy J1', 50, './imagenes/productos/samsung_galaxy_s6.png', 99.00),
(2, 'Samsung', 'Galaxy S6 G920 Negro', 48, './imagenes/productos/samsung_galaxy_s6_690.png', 690.00),
(3, 'Samsung', 'Galaxy S6 G920 Blanco', 50, './imagenes/productos/samsung_galaxy_s6_690_blanco.png', 690.00),
(4, 'Samsung', 'Galaxy J5 Blanco', 50, './imagenes/productos/SAMSUNG GALAXY J5 BLANCO.png', 219.00),
(5, 'Kazam', 'Trooper 450 Negro', 50, './imagenes/productos/KAZAM TROOPER 450 NEGRO.PNG', 99.00),
(6, 'ZTE', 'Blade L3 Blanco', 50, './imagenes/productos/ZTE BLADE L3 BLANCO.png', 99.00),
(7, 'Huawei', 'P8 LITE', 50, './imagenes/productos/HUAWEI P8 LITE.png', 199.00),
(8, 'Huawei', 'Y625 Negro', 50, './imagenes/productos/HUAWEI Y625 NEGRO.PNG', 119.00),
(9, 'Huawei', 'P8 LITE Blanco', 50, './imagenes/productos/HUAWEI P8 LITE BLANCO.png', 199.00),
(10, 'BQ', 'Aquaris M4,5 QHD 4G (8+1GB) Blanco', 46, './imagenes/productos/BQ AQUARIS M4,5 QHD 4G (8+1GB) BLANCO.png', 179.00),
(11, 'LG', 'Leon 4G Titanio', 49, './imagenes/productos/LG LEON 4G TITANIO.PNG', 159.00),
(12, 'BQ ', 'Aquaris A4.5 QHD 4G (16+1GB) Blanco', 100, './imagenes/productos/BQ AQUARIS A4.5 QHD 4G (16+1GB) BLANCO.png', 179.00),
(13, 'ZTE ', 'Blade A452 Dorado', 50, './imagenes/productos/ZTE BLADE A452 DORADO.png', 149.00),
(14, 'Huawei', 'G8 Silver', 47, './imagenes/productos/HUAWEI G8 SILVER.png', 329.00),
(15, 'Sony', 'Xperia  Z3', 49, './imagenes/productos/29907_spc_220_330_qhigh_product.PNG', 429.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE IF NOT EXISTS `proveedor` (
  `COD_PROV` int(4) NOT NULL,
  `NOMBRE` varchar(40) DEFAULT NULL,
  `CIUDAD` varchar(40) DEFAULT NULL,
  `DIRECCION` varchar(40) DEFAULT NULL,
  `CP` int(5) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`COD_PROV`, `NOMBRE`, `CIUDAD`, `DIRECCION`, `CP`) VALUES
(9, 'Samsung', 'Korea', 'Korea', 44444),
(10, 'Kazam', 'Korea', 'Korea', 55555),
(11, 'ZTE', 'Korea', 'Korea', 11111),
(12, 'Huawei', 'Korea', 'Korea', 11111),
(13, 'LG', 'Korea', 'Korea', 11111),
(14, 'BQ', 'Korea', 'Korea', 34445),
(15, 'Sony', 'Korea', 'Korea', 44444);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suministro`
--

CREATE TABLE IF NOT EXISTS `suministro` (
  `COD_SUM` int(8) NOT NULL,
  `COD_PROD` int(8) DEFAULT NULL,
  `COD_PROV` int(8) DEFAULT NULL,
  `CANTIDAD` int(8) DEFAULT NULL,
  `FECHA_SUM` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `suministro`
--

INSERT INTO `suministro` (`COD_SUM`, `COD_PROD`, `COD_PROV`, `CANTIDAD`, `FECHA_SUM`) VALUES
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
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `COD_USU` int(6) NOT NULL,
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
  `TLF` int(9) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`COD_USU`, `USERNAME`, `USERPASS`, `ROLE`, `ESTADO`, `EMAIL`, `NOMBRE`, `APELLIDOS`, `DNI`, `FECHA_NAC`, `DIRECCION`, `CP`, `CIUDAD`, `PROVINCIA`, `PAIS`, `TLF`) VALUES
(1, 'jajapon91', '81dc9bdb52d04dc20036dbd8313ed055', 'Admin', 'ON', 'juan.antonio.japon@gmail.com', 'Juan Antonio', 'Japon', 'pdslÃ±fd', '2016-01-07', 'sfklsd', 44444, 'kljkj', 'jkljlkj', 'kllj', 999999999),
(3, 'dromero', '81dc9bdb52d04dc20036dbd8313ed055', 'Admin', 'ON', 'davidmalive@gmail.com', 'David', 'Romero Ballesta', '12345678D', '2015-12-24', 'c/ Direccion David', 41010, 'Sevilla Este', 'Sevilla', 'EspaÃ±a', 999999999),
(6, 'delasheras', '81dc9bdb52d04dc20036dbd8313ed055', 'User', 'ON', 'delasheras@gmail.com', 'Jose Daniel', 'De las Heras', '12345678D', '2016-01-07', 'lÃ±k,lÃ±klÃ±k', 77777, 'lkjkl', 'lkjkljl', 'ljkljkl', 645555666),
(7, 'adrian', '81dc9bdb52d04dc20036dbd8313ed055', 'User', 'ON', 'adriancasado@gmail.com', 'Adrian', 'Casado', '12345678D', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'juanfran', '81dc9bdb52d04dc20036dbd8313ed055', 'User', 'ON', 'juanfransanc@gmail.com', 'Juanfran', 'Sanchez', '12345678D', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'matito', '81dc9bdb52d04dc20036dbd8313ed055', 'User', 'ON', 'matito@gmail.com', 'Jesus', 'Matito', '12345678D', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'merino', '827ccb0eea8a706c4c34a16891f84e7b', 'User', 'ON', 'merineitor@gmail.com', 'Antonio', 'Merino', '12345678D', '2015-12-01', 'Merino Street', 41010, 'Sevilla', 'Sevilla', 'EspaÃ±a', 923333333),
(11, 'ajvjimenez', '81dc9bdb52d04dc20036dbd8313ed055', 'User', 'ON', 'ajvjimenez@gmail.com', 'Antonio', 'Jimenez', '12345678D', '1991-01-15', 'C/ Alfareria 1ÂºB', 41010, 'Sevilla', 'Sevilla', 'EspaÃ±a', 999999999),
(12, 'javi', '81dc9bdb52d04dc20036dbd8313ed055', 'User', 'ON', 'javimawy@gmail.com', 'Javi', 'Mawy', '12345678D', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'Noelia', '81dc9bdb52d04dc20036dbd8313ed055', 'User', 'ON', 'noelia@gmail.com', 'Noelia', 'Marin Carrasco', NULL, '2016-01-13', NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'carolyne', '81dc9bdb52d04dc20036dbd8313ed055', 'User', 'ON', 'carolynenicole@hotmail.com', 'Carolyne', 'Nicole', NULL, '2016-01-12', NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `caracteristicas`
--
ALTER TABLE `caracteristicas`
  ADD PRIMARY KEY (`COD_CARAC`),
  ADD KEY `FK_CAR_PROD` (`COD_PROD`);

--
-- Indices de la tabla `cesta`
--
ALTER TABLE `cesta`
  ADD PRIMARY KEY (`COD_USU`,`COD_PROD`),
  ADD KEY `FK_CEST_PROD` (`COD_PROD`);

--
-- Indices de la tabla `lineadepedido`
--
ALTER TABLE `lineadepedido`
  ADD PRIMARY KEY (`COD_LINEA`,`COD_PEDIDO`,`COD_PROD`),
  ADD KEY `FK_PED_LP` (`COD_PEDIDO`),
  ADD KEY `FK_PED_P` (`COD_PROD`);

--
-- Indices de la tabla `opinion`
--
ALTER TABLE `opinion`
  ADD PRIMARY KEY (`COD_OPINION`),
  ADD KEY `FK_OP_USU` (`COD_USU`),
  ADD KEY `FK_OP_PROD` (`COD_PROD`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`COD_PEDIDO`),
  ADD KEY `FK_PED_USU` (`COD_USU`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`COD_PROD`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`COD_PROV`);

--
-- Indices de la tabla `suministro`
--
ALTER TABLE `suministro`
  ADD PRIMARY KEY (`COD_SUM`),
  ADD KEY `FK_SUM_PROD` (`COD_PROD`),
  ADD KEY `FK_SUM_PROV` (`COD_PROV`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`COD_USU`),
  ADD UNIQUE KEY `USERNAME` (`USERNAME`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `caracteristicas`
--
ALTER TABLE `caracteristicas`
  MODIFY `COD_CARAC` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT de la tabla `lineadepedido`
--
ALTER TABLE `lineadepedido`
  MODIFY `COD_LINEA` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT de la tabla `opinion`
--
ALTER TABLE `opinion`
  MODIFY `COD_OPINION` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `COD_PEDIDO` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `COD_PROD` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `COD_PROV` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `suministro`
--
ALTER TABLE `suministro`
  MODIFY `COD_SUM` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `COD_USU` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `caracteristicas`
--
ALTER TABLE `caracteristicas`
  ADD CONSTRAINT `FK_CAR_PROD` FOREIGN KEY (`COD_PROD`) REFERENCES `producto` (`COD_PROD`);

--
-- Filtros para la tabla `cesta`
--
ALTER TABLE `cesta`
  ADD CONSTRAINT `FK_CEST_PROD` FOREIGN KEY (`COD_PROD`) REFERENCES `producto` (`COD_PROD`),
  ADD CONSTRAINT `FK_CEST_USU` FOREIGN KEY (`COD_USU`) REFERENCES `usuario` (`COD_USU`);

--
-- Filtros para la tabla `lineadepedido`
--
ALTER TABLE `lineadepedido`
  ADD CONSTRAINT `FK_PED_LP` FOREIGN KEY (`COD_PEDIDO`) REFERENCES `pedido` (`COD_PEDIDO`),
  ADD CONSTRAINT `FK_PED_P` FOREIGN KEY (`COD_PROD`) REFERENCES `producto` (`COD_PROD`);

--
-- Filtros para la tabla `opinion`
--
ALTER TABLE `opinion`
  ADD CONSTRAINT `FK_OP_PROD` FOREIGN KEY (`COD_PROD`) REFERENCES `producto` (`COD_PROD`),
  ADD CONSTRAINT `FK_OP_USU` FOREIGN KEY (`COD_USU`) REFERENCES `usuario` (`COD_USU`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `FK_PED_USU` FOREIGN KEY (`COD_USU`) REFERENCES `usuario` (`COD_USU`);

--
-- Filtros para la tabla `suministro`
--
ALTER TABLE `suministro`
  ADD CONSTRAINT `FK_SUM_PROD` FOREIGN KEY (`COD_PROD`) REFERENCES `producto` (`COD_PROD`),
  ADD CONSTRAINT `FK_SUM_PROV` FOREIGN KEY (`COD_PROV`) REFERENCES `proveedor` (`COD_PROV`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
