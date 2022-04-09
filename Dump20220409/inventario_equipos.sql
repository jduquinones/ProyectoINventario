-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: localhost    Database: inventario
-- ------------------------------------------------------
-- Server version	5.7.37-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `equipos`
--

DROP TABLE IF EXISTS `equipos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `equipos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(20) DEFAULT NULL,
  `imagen` varchar(60) DEFAULT NULL,
  `ip` varchar(15) DEFAULT NULL,
  `sistemaOperativo` varchar(15) DEFAULT NULL,
  `serial` varchar(30) DEFAULT NULL,
  `ofimatica` varchar(15) DEFAULT NULL,
  `activo` varchar(8) DEFAULT NULL,
  `marca` varchar(20) DEFAULT NULL,
  `modelo` varchar(15) DEFAULT NULL,
  `nombreEquipo` varchar(15) DEFAULT NULL,
  `idEquipos` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_equipos_ubicacion1_idx` (`idEquipos`),
  CONSTRAINT `fk_equipos_ubicacion1` FOREIGN KEY (`idEquipos`) REFERENCES `ubicacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipos`
--

LOCK TABLES `equipos` WRITE;
/*!40000 ALTER TABLE `equipos` DISABLE KEYS */;
INSERT INTO `equipos` VALUES (11,'Computador','asf','192.168.60.200','Windows 10','S1H05T1E','Open Office','N/A','Lenovo','10TP','Desktop',10),(12,'Computador','asf','192.168.162.141','Windows 10','S1H05T0X','Open Office','N/A','Lenovo','10TP','Desktop',11),(14,'Computador','asf','192.168.162.220','Windows 10','S1H05T13','Open Office','N/A','Lenovo','10TP','Desktop',13),(15,'Computador','asf','192.168.162.219','Windows 10','S1H05T1A','Open Office','N/A','Lenovo','10TP','Desktop',13),(18,'Computador','eadaf6a2834038e24afc30cc6b38410a.jpg','192.168.162.29','Windows 10','S1H05T1S','Open Office','N/A','Lenovo','10TP','Desktop',12),(19,'Computador','571ddfb474c83e79533f7704e07a64f6.jpg','192.168.161.106','Windows 10','S1H05T3H','Open Office','N/A','Lenovo','10TP','Desktop',NULL);
/*!40000 ALTER TABLE `equipos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-09  3:36:53
