-- MySQL dump 10.13  Distrib 5.7.37, for Win64 (x86_64)
--
-- Host: localhost    Database: inventario
-- ------------------------------------------------------
-- Server version	5.7.37-log

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
-- Table structure for table `ubicacion`
--

DROP TABLE IF EXISTS `ubicacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ubicacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `centro` varchar(5) DEFAULT NULL,
  `area` varchar(20) DEFAULT NULL,
  `departamento` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ubicacion`
--

LOCK TABLES `ubicacion` WRITE;
/*!40000 ALTER TABLE `ubicacion` DISABLE KEYS */;
INSERT INTO `ubicacion` VALUES (14,'P512','Pdv','Roosvelt'),(16,'P514','Pdv','Caney'),(18,'P515','Pdv','Floresta'),(19,'P505','Pdv','Palmira'),(20,'P508','Pdv','Delicias'),(21,'P509','Pdv','Valle Grande'),(22,'P510','Pdv','Floralia'),(23,'P511','Pdv','Cuidad Jardin'),(24,'P513','Pdv','Santa Elena'),(25,'P516','Pdv','Alameda 1'),(26,'P517','Pdv','Alameda 2'),(27,'P518','Pdv','Pasoancho'),(28,'P519','Pdv','Popayan 1'),(29,'P520','Pdv','Bolivar'),(30,'P557','Pdv','Jamundi'),(31,'P558','Pdv','Compostela'),(32,'P559','Pdv','Esmeralda'),(33,'D503','Logistica','Postventa'),(34,'D503','Comercial','Call Center PDV'),(36,'D503','Comercial','Call Center Mayoreo'),(37,'D503','Administracion','Sistemas'),(38,'D503','Admnistracion','Calidad'),(39,'D503','DirecciÃ³n Comercial','Director '),(40,'D503','Administracion','Contabilidad'),(41,'D503','Administracion','Cartera'),(42,'D503','Administracion','Coordinadora Administrativa'),(43,'D503','Comercial','Almacenes Cali'),(44,'D503','Administracion','Auditoria'),(45,'D503','Administracion','Aux Administrativa PDV Acopi'),(46,'D503','Administracion','Confirmacion'),(47,'D503','Comercial','Grandes Superficies'),(48,'D503','Comercial','Televendedor Supermercados'),(49,'D503','Administracion','Analista de Precios '),(50,'D503','Administracion','Pasante Administrativo'),(51,'D503','Comercial','Representante de Ventas'),(52,'D503','Logistica','Canastillas'),(53,'D503','Logistica','Despachos'),(54,'D503','Logistica','Muelles'),(55,'D503','Administracion','Facturacion'),(56,'D503','Administracion','Tesoreria'),(57,'D503 ','Administracion','Capacitacion'),(58,'D503','Administracion','Sala de Juntas'),(59,'D503','Administracion','Rack 2 bloque'),(60,'D503','Administracion','Rack 1 bloque'),(61,'D503','Administracion','Ups 1 Bloque'),(62,'D503','Seguridad','Porteria'),(65,'D503','Administracion','Gestion Humana'),(66,'D503','Administracion','Sst'),(67,'D503','Administracion','Bienestar'),(68,'D503','Administracion','Enfermeria');
/*!40000 ALTER TABLE `ubicacion` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-20  2:31:50
