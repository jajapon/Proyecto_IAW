-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-01-2016 a las 23:42:49
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lineadepedido`
--

INSERT INTO `lineadepedido` (`COD_LINEA`, `COD_PEDIDO`, `COD_PROD`, `CANTIDAD`) VALUES
(12, 4, 2, 1),
(13, 5, 2, 3),
(14, 6, 2, 4),
(15, 7, 1, 1),
(16, 7, 2, 2);

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
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `opinion`
--

INSERT INTO `opinion` (`COD_OPINION`, `COD_USU`, `COD_PROD`, `FECHA_OP`, `MENSAJE`) VALUES
(1, 3, 1, '2015-12-30', 'Opinion 1'),
(25, 3, 3, '2016-01-01', 'lkjlkjlkjlk'),
(27, 3, 3, '2016-01-01', 'lkjlkjlkjlk'),
(28, 3, 3, '2016-01-01', 'lkjlkjlkjlk'),
(49, 3, 2, '2016-01-01', 'jknmn,mn'),
(52, 3, 2, '2016-01-01', 'l.kÃ±lk,Ã±lkÃ±k'),
(77, 1, 1, '2016-01-01', 'lkÃ±lk'),
(78, 3, 2, '2016-01-03', 'lkÃ±lk');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `COD_PEDIDO` int(6) NOT NULL,
  `COD_USU` int(6) DEFAULT NULL,
  `FECHA_PED` date DEFAULT NULL,
  `IMPORTE` double(11,2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`COD_PEDIDO`, `COD_USU`, `FECHA_PED`, `IMPORTE`) VALUES
(3, 3, '2016-01-02', 600.00),
(4, 3, '2016-01-03', 99.99),
(5, 3, '2016-01-04', 299.97),
(6, 6, '2016-01-04', 399.96),
(7, 6, '2016-01-04', 259.98);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `COD_PROD` int(8) NOT NULL,
  `MARCA` varchar(50) DEFAULT NULL,
  `MODELO` varchar(50) DEFAULT NULL,
  `DESCRIPCION` varchar(3000) DEFAULT NULL,
  `STOCK` int(8) DEFAULT NULL,
  `IMAGEN` varchar(1000) DEFAULT NULL,
  `PRECIO_UNI` double(11,2) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`COD_PROD`, `MARCA`, `MODELO`, `DESCRIPCION`, `STOCK`, `IMAGEN`, `PRECIO_UNI`) VALUES
(1, 'Huawei', 'T1 7 WIFI', 'jkhkjhkujhjh', 40, './imagenes/productos/4.png', 60.00),
(2, 'Huawei', 'Ascend Y625 Blanco Libre', 'Te presentamos en PcComponentes el Huawei Ascend Y625, un smartphone con pantalla de 5 pulgadas procesdor Quad Core y 1GB de RAM.\r\nConfort en las manos\r\nEl Y625 está diseñado con textura de la lona y se adapta a ser el dispositivo más adecuado y compacto, por lo que es agradable al tacto y fácil de usar.\r\nMás rápido \r\nDisfrute de la velocidad más rápida de la red 3G con velocidad de descarga a 42Mbps - 3 veces más rápido que HSDPA y 21 veces más rápidas que WCDMA - que le permiten navegar por las aplicaciones web y descarga en la velocidad del rayo.\r\nCaptura colores más Realistas \r\nNo te pierdas ni un momento, con la función de captura sin incorporada en la cámara trasera de 8MP con flash LED + cámara frontal de 2MP. La función única nota de audio permite grabar la vida de colores vívidamente con sonido.\r\nAcceso mágico\r\nSólo tiene que tocar y dibujar un camino para bloquear la pantalla, desbloquear y empezar aplicaciones convenientemente. Doble toque para despertar la pantalla, pulse un botón para bloquear y conquistar la pantalla como un rey. También hay 4 direcciones de reconocimiento de gestos: arriba, abajo, izquierda y derecha\r\nPantalla más grande, Mejor con el de 5 pulgadas FWVGA (854 × 480), con una de precisión en la pantalla de  196ppi y el apoyo a 16 millones de colores para un excelente rendimiento de color.También hay mejoras en la visibilidad de la pantalla bajo la luz solar en un 10% con tecnología especializada y pantalla IPS.\r\nEspecificaciones:\r\nPantalla 5,0 pulgadas FWVGA (480 x 854)\r\nProcesador MSM 8212M CPU, 4 x 1.2 GHz\r\nSistema Operartivo Android 4.4\r\nHuawei Emotion UI 2.3 Lite\r\nMemoria\r\nRAM: 1 GB\r\nROM: 4 GB\r\nRedes\r\nUMTS1: 850/1900/2100\r\nUMTS2: 900/2100\r\nGSM / EDGE: 850/900/1800/1900\r\nGPS\r\nGPS / AGPS\r\nConectividad\r\nWifi 802.11b/g/n, soporte WiFi Hotspot, Wifi\r\nSensores G-sensor\r\nCámara\r\nCámara trasera: 8MP FF\r\nFrente Cámara: 2MP\r\nAudio WAV, MP3, AMR, MIDI, Vorbis, AAC, AAC +, FLAC, OGG, PCM\r\nVídeo MP4, H.264, H.263, VC-1, DIVX, XVID, RV, MKV, WebM\r\nIU Emotion EMUI 2.3 Lite\r\nBatería 2000mAh\r\nDimensiones y Peso\r\n142 x 72.6 x 9.6 mm\r\n160 gr', 40, './imagenes/productos/2.png', 99.99),
(3, 'Huawei', 'Ascend Y625 Blanco Libre', 'Te presentamos en PcComponentes el Huawei Ascend Y625, un smartphone con pantalla de 5 pulgadas procesdor Quad Core y 1GB de RAM.\r\nConfort en las manos\r\nEl Y625 está diseñado con textura de la lona y se adapta a ser el dispositivo más adecuado y compacto, por lo que es agradable al tacto y fácil de usar.\r\nMás rápido \r\nDisfrute de la velocidad más rápida de la red 3G con velocidad de descarga a 42Mbps - 3 veces más rápido que HSDPA y 21 veces más rápidas que WCDMA - que le permiten navegar por las aplicaciones web y descarga en la velocidad del rayo.\r\nCaptura colores más Realistas \r\nNo te pierdas ni un momento, con la función de captura sin incorporada en la cámara trasera de 8MP con flash LED + cámara frontal de 2MP. La función única nota de audio permite grabar la vida de colores vívidamente con sonido.\r\nAcceso mágico\r\nSólo tiene que tocar y dibujar un camino para bloquear la pantalla, desbloquear y empezar aplicaciones convenientemente. Doble toque para despertar la pantalla, pulse un botón para bloquear y conquistar la pantalla como un rey. También hay 4 direcciones de reconocimiento de gestos: arriba, abajo, izquierda y derecha\r\nPantalla más grande, Mejor con el de 5 pulgadas FWVGA (854 × 480), con una de precisión en la pantalla de  196ppi y el apoyo a 16 millones de colores para un excelente rendimiento de color.También hay mejoras en la visibilidad de la pantalla bajo la luz solar en un 10% con tecnología especializada y pantalla IPS.\r\nEspecificaciones:\r\nPantalla 5,0 pulgadas FWVGA (480 x 854)\r\nProcesador MSM 8212M CPU, 4 x 1.2 GHz\r\nSistema Operartivo Android 4.4\r\nHuawei Emotion UI 2.3 Lite\r\nMemoria\r\nRAM: 1 GB\r\nROM: 4 GB\r\nRedes\r\nUMTS1: 850/1900/2100\r\nUMTS2: 900/2100\r\nGSM / EDGE: 850/900/1800/1900\r\nGPS\r\nGPS / AGPS\r\nConectividad\r\nWifi 802.11b/g/n, soporte WiFi Hotspot, Wifi\r\nSensores G-sensor\r\nCámara\r\nCámara trasera: 8MP FF\r\nFrente Cámara: 2MP\r\nAudio WAV, MP3, AMR, MIDI, Vorbis, AAC, AAC +, FLAC, OGG, PCM\r\nVídeo MP4, H.264, H.263, VC-1, DIVX, XVID, RV, MKV, WebM\r\nIU Emotion EMUI 2.3 Lite\r\nBatería 2000mAh\r\nDimensiones y Peso\r\n142 x 72.6 x 9.6 mm\r\n160 gr', 40, './imagenes/productos/3.png', 99.99),
(5, 'Huawei', 'Japan Edition', 'saokdpÃ±lkdaÃ±lk oÃ±kasdlÃ±akÃ±dlÃ±k', 40, './imagenes/productos/japanedition.png', 299.99),
(7, 'prueba', 'prueba', '', 10, './imagenes/productos/4.png', 200.00),
(8, 'skjal', 'klasfj', 'iljlkj', 20, './imagenes/productos/1.png', 20.00);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`COD_PROV`, `NOMBRE`, `CIUDAD`, `DIRECCION`, `CP`) VALUES
(1, 'Samsung', 'Korea', 'Korea', 11111),
(2, 'Iphone', 'Korea', 'Korea', 22222),
(3, 'HTC', 'Korea', 'Korea', 33333),
(4, 'Sony Ericson', 'Korea', 'Korea', 44444),
(5, 'Huawei', 'Korea', 'Korea', 55555),
(6, 'LG', 'Korea', 'Korea', 66666);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suministro`
--

CREATE TABLE IF NOT EXISTS `suministro` (
  `COD_SUM` int(8) NOT NULL DEFAULT '0',
  `COD_PROD` int(8) DEFAULT NULL,
  `COD_PROV` int(8) DEFAULT NULL,
  `CANTIDAD` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`COD_USU`, `USERNAME`, `USERPASS`, `ROLE`, `ESTADO`, `EMAIL`, `NOMBRE`, `APELLIDOS`, `DNI`, `FECHA_NAC`, `DIRECCION`, `CP`, `CIUDAD`, `PROVINCIA`, `PAIS`, `TLF`) VALUES
(1, 'jajapon91', '827ccb0eea8a706c4c34a16891f84e7b', 'Admin', 'ON', 'juan.antonio.japon@gmail.com', 'Juan Antonio', 'Japon', 'pdslÃ±fd', '2016-01-07', 'sfklsd', 44444, 'kljkj', 'jkljlkj', 'kllj', 999999999),
(3, 'dromero', '81dc9bdb52d04dc20036dbd8313ed055', 'User', 'OFF', 'davidromero@gmail.com', 'David', 'Romero Ballesta', '12345678D', '2015-12-24', 'c/ Direccion David', 41010, 'Sevilla Este', 'Sevilla', 'EspaÃ±a', 999999999),
(6, 'delasheras', '81dc9bdb52d04dc20036dbd8313ed055', 'User', 'ON', 'delasheras@gmail.com', 'Jose Daniel', 'De las Heras', '12345678D', '2016-01-07', 'lÃ±k,lÃ±klÃ±k', 77777, 'lkjkl', 'lkjkljl', 'ljkljkl', 888888888),
(7, 'adrian', '81dc9bdb52d04dc20036dbd8313ed055', 'User', 'ON', 'adriancasado@gmail.com', 'Adrian', 'Casado', '12345678D', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'juanfran', '81dc9bdb52d04dc20036dbd8313ed055', 'User', 'ON', 'juanfransanc@gmail.com', 'Juanfran', 'Sanchez', '12345678D', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'matito', '81dc9bdb52d04dc20036dbd8313ed055', 'User', 'ON', 'matito@gmail.com', 'Jesus', 'Matito', '12345678D', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'merino', '827ccb0eea8a706c4c34a16891f84e7b', 'User', 'OFF', 'merineitor@gmail.com', 'Antonio', 'Merino', '12345678D', '2015-12-01', 'Merino Street', 41010, 'Sevilla', 'Sevilla', 'EspaÃ±a', 923333333),
(11, 'ajvjimenez', '81dc9bdb52d04dc20036dbd8313ed055', 'User', 'ON', 'ajvjimenez@gmail.com', 'Antonio', 'Jimenez', '12345678D', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'javi', '81dc9bdb52d04dc20036dbd8313ed055', 'User', 'ON', 'javimawy@gmail.com', 'Javi', 'Mawy', '12345678D', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'hola', '81dc9bdb52d04dc20036dbd8313ed055', 'User', 'ON', 'se_betico69@hotmail.com', 'skas', 'lÃ±askfalÃ±sÃ±', 'klÃ±jÃ±lk', '2016-01-13', 'lÃ±klÃ±k', 41010, 'Sevilla', 'Sevilla', 'EspaÃ±a', 99999999);

--
-- Índices para tablas volcadas
--

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
-- AUTO_INCREMENT de la tabla `lineadepedido`
--
ALTER TABLE `lineadepedido`
  MODIFY `COD_LINEA` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `opinion`
--
ALTER TABLE `opinion`
  MODIFY `COD_OPINION` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `COD_PEDIDO` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `COD_PROD` int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `COD_PROV` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `COD_USU` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- Restricciones para tablas volcadas
--

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
