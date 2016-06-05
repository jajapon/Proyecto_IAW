-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: phonejapan
-- ------------------------------------------------------
-- Server version	5.6.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `caracteristicas`
--

DROP TABLE IF EXISTS `caracteristicas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `caracteristicas` (
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
  KEY `FK_CAR_PROD` (`COD_PROD`),
  CONSTRAINT `FK_CAR_PROD` FOREIGN KEY (`COD_PROD`) REFERENCES `producto` (`COD_PROD`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `cesta`
--

DROP TABLE IF EXISTS `cesta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cesta` (
  `COD_USU` int(6) NOT NULL DEFAULT '0',
  `COD_PROD` int(8) NOT NULL DEFAULT '0',
  `CANTIDAD` int(10) DEFAULT NULL,
  PRIMARY KEY (`COD_USU`,`COD_PROD`),
  KEY `FK_CEST_PROD` (`COD_PROD`),
  CONSTRAINT `FK_CEST_PROD` FOREIGN KEY (`COD_PROD`) REFERENCES `producto` (`COD_PROD`),
  CONSTRAINT `FK_CEST_USU` FOREIGN KEY (`COD_USU`) REFERENCES `usuario` (`COD_USU`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `lineadepedido`
--

DROP TABLE IF EXISTS `lineadepedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lineadepedido` (
  `COD_LINEA` int(8) NOT NULL AUTO_INCREMENT,
  `COD_PEDIDO` int(6) NOT NULL DEFAULT '0',
  `COD_PROD` int(6) NOT NULL DEFAULT '0',
  `CANTIDAD` int(6) DEFAULT NULL,
  PRIMARY KEY (`COD_LINEA`,`COD_PEDIDO`,`COD_PROD`),
  KEY `FK_PED_LP` (`COD_PEDIDO`),
  KEY `FK_PED_P` (`COD_PROD`),
  CONSTRAINT `FK_PED_LP` FOREIGN KEY (`COD_PEDIDO`) REFERENCES `pedido` (`COD_PEDIDO`),
  CONSTRAINT `FK_PED_P` FOREIGN KEY (`COD_PROD`) REFERENCES `producto` (`COD_PROD`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `opinion`
--

DROP TABLE IF EXISTS `opinion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `opinion` (
  `COD_OPINION` int(20) NOT NULL AUTO_INCREMENT,
  `COD_USU` int(6) DEFAULT NULL,
  `COD_PROD` int(8) DEFAULT NULL,
  `FECHA_OP` date DEFAULT NULL,
  `MENSAJE` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`COD_OPINION`),
  KEY `FK_OP_USU` (`COD_USU`),
  KEY `FK_OP_PROD` (`COD_PROD`),
  CONSTRAINT `FK_OP_PROD` FOREIGN KEY (`COD_PROD`) REFERENCES `producto` (`COD_PROD`),
  CONSTRAINT `FK_OP_USU` FOREIGN KEY (`COD_USU`) REFERENCES `usuario` (`COD_USU`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido` (
  `COD_PEDIDO` int(6) NOT NULL AUTO_INCREMENT,
  `COD_USU` int(6) DEFAULT NULL,
  `FECHA_PED` date DEFAULT NULL,
  `IMPORTE` double(11,2) DEFAULT NULL,
  PRIMARY KEY (`COD_PEDIDO`),
  KEY `FK_PED_USU` (`COD_USU`),
  CONSTRAINT `FK_PED_USU` FOREIGN KEY (`COD_USU`) REFERENCES `usuario` (`COD_USU`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `COD_PROD` int(8) NOT NULL AUTO_INCREMENT,
  `MARCA` varchar(50) DEFAULT NULL,
  `MODELO` varchar(50) DEFAULT NULL,
  `STOCK` int(8) DEFAULT NULL,
  `IMAGEN` varchar(1000) DEFAULT NULL,
  `PRECIO_UNI` double(11,2) DEFAULT NULL,
  PRIMARY KEY (`COD_PROD`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proveedor` (
  `COD_PROV` int(4) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(40) DEFAULT NULL,
  `CIUDAD` varchar(40) DEFAULT NULL,
  `DIRECCION` varchar(40) DEFAULT NULL,
  `CP` int(5) DEFAULT NULL,
  PRIMARY KEY (`COD_PROV`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `suministro`
--

DROP TABLE IF EXISTS `suministro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `suministro` (
  `COD_SUM` int(8) NOT NULL AUTO_INCREMENT,
  `COD_PROD` int(8) DEFAULT NULL,
  `COD_PROV` int(8) DEFAULT NULL,
  `CANTIDAD` int(8) DEFAULT NULL,
  `FECHA_SUM` date NOT NULL,
  PRIMARY KEY (`COD_SUM`),
  KEY `FK_SUM_PROD` (`COD_PROD`),
  KEY `FK_SUM_PROV` (`COD_PROV`),
  CONSTRAINT `FK_SUM_PROD` FOREIGN KEY (`COD_PROD`) REFERENCES `producto` (`COD_PROD`),
  CONSTRAINT `FK_SUM_PROV` FOREIGN KEY (`COD_PROV`) REFERENCES `proveedor` (`COD_PROV`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
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
  `THEME` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`COD_USU`),
  UNIQUE KEY `USERNAME` (`USERNAME`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-06-05  9:49:58
