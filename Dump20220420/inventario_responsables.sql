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
-- Table structure for table `responsables`
--

DROP TABLE IF EXISTS `responsables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `responsables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `cargo` varchar(45) DEFAULT NULL,
  `extencion` varchar(45) DEFAULT NULL,
  `ubicacionResponsables_id` int(11) NOT NULL,
  `equipos_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_responsables_ubicacion_idx` (`ubicacionResponsables_id`),
  KEY `fk_responsables_equipos1_idx` (`equipos_id`),
  CONSTRAINT `fk_responsables_equipos1` FOREIGN KEY (`equipos_id`) REFERENCES `equipos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_responsables_ubicacion` FOREIGN KEY (`ubicacionResponsables_id`) REFERENCES `ubicacion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=183 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `responsables`
--

LOCK TABLES `responsables` WRITE;
/*!40000 ALTER TABLE `responsables` DISABLE KEYS */;
INSERT INTO `responsables` VALUES (45,'Gaby','Herrera','Televendedora','6260',34,13),(47,'Julian','Orrego','Supervisor de Entregas','6229',33,15),(48,'Oscar','Bentancourt Orejuela','Coordinador Postventa','6229',33,16),(49,'Cristian ','Lazo','Supervisor de Entregas','6228',33,17),(50,'Paola','Montezuma','Televendedora','6258',34,18),(51,'Geraldin ','Arango','Televendedora','6263',34,19),(52,'Erica','Castro','Televendedora','6257',34,20),(53,'Dayana','Ruden','Televendedora','6256',34,21),(54,'Jhonny','Franco','Televendedor','6265',34,22),(55,'Kelly','Chica','Televendedora','6399',34,23),(56,'Maira','Castillo','Televendedora','6261',34,24),(57,'Alejandra ','Marin','Televendedora','6314',34,25),(58,'Juan','Arboleda','Televendedora','6259',34,26),(59,'Daniela','Imbachi','Televendedora Mostrador','6264',34,27),(60,'Angie','Asprilla','Televendedora','6262',34,28),(61,'Sandra','Sanchez','Coordinador Call Center Mayoreo','6231',36,30),(62,'Francy Elena','Perez','Televendedora Mayoreo','6236',36,31),(63,'Marilyn','Cabezas','Televendedora Mayoreo','6243',36,32),(64,'Astrid','Zambrano','Televendedora Mayoreo','6235',36,33),(65,'Valentina','Franco','Televendedora Mayoreo','6240',36,36),(66,'Jesus David','Navia NaÃ±ez','Televendedor Mayoreo','6237',36,37),(67,'Leidy','Portilla','Televendedora Mayoreo','6252',36,38),(68,'Angelica','Aldana','Televendedora Mayoreo','6253',36,39),(69,'Carlos ','Bedoya','Televendedora Mayoreo','6254',36,40),(70,'Khaterine','Dominguez Vera','Televendedora Mayoreo','6233',36,41),(71,'Diana','Bolivar','Televendedora Mayoreo','6249',36,42),(72,'Leidy','Diaz','Televendedora Mayoreo','6238',36,43),(73,'Yesica ','Agudelo Villalobos','Televendedora Mayoreo','6247',36,44),(74,'Jheison','Talaga Cordoba','Televendedor Mayoreo','6248',36,45),(75,'Paola','Preciado','Televendedora Mayoreo','6245',36,46),(76,'Maria Tereasa','PeÃ±a','Televendedora Mayoreo','6299',36,47),(77,'Luz Elena','Flores','Televendedora Mayoreo','6266',36,48),(78,'Isabella','Osorio','Televendedora Mayoreo','6300',36,49),(79,'Tatiana','Cortez','Televendedora Mayoreo','6242',36,50),(80,'Jilly','Acosta','Televendedora Mayoreo','6250',36,51),(81,'Daniela','Giraldo Ochoa','Televendedora Mayoreo','6251',36,52),(82,'Kenia','Obando','Televendedora Mayoreo','6241',36,54),(84,'Luis','Hincapie','Coordinador Call Center Mostrador','6226',34,12),(85,'Yady','Mina','Supervisor de Entregas','6229',33,14),(86,'Luis','Ramos','Soporte Usuarios','6220',37,55),(87,'Angela ','Hurtado','Coordinadora de Calidad','6230',38,56),(88,'Alvaro','Lozano','Director Comercial','6214',39,57),(89,'Aura Lucia ','Ortiz','Directora Administrativa Comercial','6227',39,58),(90,'Lida','Paredes','Aux Administrativo','6212',40,60),(91,'Julian David','Ramirez','Aux Cartera','6224',41,61),(92,'Analfie','CastaÃ±o','Coordinadora Administrativa','6213',42,62),(93,'Eliana ','Guevara','Almacenes Cali','6290',43,63),(94,'Angelica','Gomez','Auditora','6298',44,64),(95,'Jhon','Tello','Almacenes Cali','',43,65),(96,'Diana Marcela','Andrade','Aux Administrativa PDV Acopi','6205',45,66),(97,'Karol','LondoÃ±o','Coonfirmacion','6211',46,67),(98,'Jhoana','Aguirre','Jefe Venta Grandes Superficies','6204',47,68),(99,'Jackeline','Torres','Aux Grandes Superficies','6204',47,69),(100,'Yualiana','Preciado','Almacenes Cali','',43,70),(101,'Fabian','Borrero','Televendedor Supermercados','6207',48,71),(102,'Miguel ','Castro','Analista de Precios','6292',49,73),(103,'Leidy','Idalgo Lozano','Televendedor Supermercados','6208',48,74),(104,'Esteban','Calero','Representante de Ventas','',51,75),(105,'Maria Isabel','Caicedo','Representante de Ventas','',51,79),(106,'Rigoberto','MuÃ±oz','Jefe De Ventas Mayoreo','6200',51,80),(107,'Jhoana','Ramirez','Jefe De Ventas Mayoreo','6200',51,81),(108,'Jhon Arley','BolaÃ±os','Representante de Ventas','6203',51,82),(109,'Jeison','Orozco','Representante de Ventas','',51,83),(110,'Jairo','Guzmas','Representante de Ventas','',51,84),(111,'Gerardo ','Hernandez','Representante de Ventas','',51,85),(112,'Yazmin','Reyes','Representante de Ventas','6202',51,86),(113,'Juan Eduardo','Veasquez','Representante de Ventas','',51,87),(114,'Lina ','Gutierrez','Representante de Ventas','',51,88),(115,'Jairo','Torres','Representante de Ventas','',51,89),(116,'Didier','Anacona','Representante de Ventas','',51,90),(117,'Fernando','Guevara','Representante de Ventas','',51,91),(118,'Jessica','Gil','Representante de Ventas','',51,92),(119,'Daniel','Campos','Representante de Ventas','',51,93),(120,'Jeferson','Araujo','Representante de Ventas','',51,94),(121,'Ernesto ','Ramirez','Jefe De Ventas Autoservicio','',51,95),(122,'Fabian','Portilla','Representante de Ventas','',51,96),(123,'Sandra ','BolaÃ±os','Representante de Ventas','',51,98),(124,'Viviana','A','Representante de Ventas','',51,99),(125,'Maria Pilar','Martinez','Representante de Ventas','',51,100),(126,'Alexander','Cifiuentes','Casamachin','6383',52,103),(127,'Gustavo','Espinosa','Supervisor de Despachos','6219',53,105),(128,'Alejandro ','Areas','Auxiliar Inventarios','6219',53,106),(129,'Jose Otoniel','salazar','Coordinador AlmacÃ©n ','6218',53,104),(130,'Cristian','sanchez','Auxiliar de facturacion','6216',55,108),(131,'Luisa','Romero','Aux. Aseguramiento de Calidad ','6230',38,109),(132,'Miguel ','Vaca Bejarano','Aux Tesoreria','6217',56,110),(133,'Isabel','Soto','Auxiliar Tesoreria','6291',56,111),(134,'Jehicoob','Lopez','Pasante Dti','6221',37,113),(135,'Luis','Ramos','Soporte Usuarios','6220',37,114),(136,'Luis','Ramos','Soporte Usuarios','6220',37,114),(137,'Luis','Ramos','Soporte Usuarios','6220',37,115),(138,'Luis','Ramos','Soporte Usuarios','6220',37,116),(139,'Luis','Ramos','Soporte Usuarios','6220',37,117),(140,'Luis','Ramos','Soporte Usuarios','6220',37,118),(141,'Luis','Ramos','Soporte Usuarios','6220',37,119),(142,'Luis','Ramos','Soporte Usuarios','6220',37,120),(143,'Luis','Ramos','Soporte Usuarios','6220',37,121),(144,'Luis','Ramos','Soporte Usuarios','6220',37,122),(145,'Erika','Marin','Gestor PDV','3108222557',20,123),(146,'Erika','Marin','Gestor PDV','3108222557',21,124),(147,'Erika','Marin','Gestor PDV','6273',22,125),(148,'Erika','Marin','Gestor PDV','3108222557',24,129),(149,'Erika','Marin','Gestor PDV','3108222557',18,131),(150,'Erika','Marin','Gestor PDV','3108222557',27,134),(151,'Erika','Marin','Gestor PDV','3108222557',27,134),(152,'Yuri Luceny','Angulo','Gestor PDV','3168786854',23,126),(153,'Yuri Luceny','Angulo','Gestor PDV','3168786854',23,127),(154,'Yuri Luceny','Angulo','Gestor PDV','3168786854',14,128),(155,'Yuri Luceny','Angulo','Gestor PDV','3168786854',16,130),(156,'Yuri Luceny','Angulo','Gestor PDV','3168786854',25,132),(157,'Yuri Luceny','Angulo','Gestor PDV','3168786854',26,133),(158,'Yuri Luceny','Angulo','Gestor PDV','3168786854',30,136),(159,'Yuri Luceny','Angulo','Gestor PDV','3168786854',30,137),(160,'Laura','Palencia','Gestor PDV','3113776584',28,139),(161,'Laura','Palencia','Gestor PDV','3113776584',28,138),(162,'Laura','Palencia','Gestor PDV','3113776584',29,140),(163,'Laura','Palencia','Gestor PDV','3113776584',29,141),(164,'Laura','Palencia','Gestor PDV','3113776584',31,142),(165,'Laura','Palencia','Gestor PDV','3113776584',31,143),(166,'Laura','Palencia','Gestor PDV','3113776584',32,144),(167,'Laura','Palencia','Gestor PDV','3113776584',32,145),(169,'Yudi','','Aux Gestion Humana','6210',65,146),(170,'Catherine ','Andrade','Aux Sst','6206',66,148),(171,'Yudi','','Aux Gestion Humana','6210',65,147),(172,'Catherine ','Andrade','Aux Sst','6206',66,149),(173,'Erika ','Hernandez','Psicologa','6209',67,150),(174,'Erika','Hernandez','Psicologa','6209',67,151),(175,'Catherine ','Andrade','Aux Sst','6206',68,152),(176,'Gerardina ','Diaz','Representante de Ventas','',51,153),(177,'Luis Alfonso ','Camayo','Representante de Ventas','',51,154),(178,'Claudia ','Vivas','Representante de Ventas','',51,155),(179,'Vicky ','Cabrera','Representante de Ventas','',51,156),(180,'Nestor ','Polindara Diaz','Representante de Ventas','',51,157),(181,'Lesly Julieth ','Montero Bravo','Representante de Ventas','',51,158),(182,'Julian ','Serna','Coordinador Ventas Popayan','6208',51,159);
/*!40000 ALTER TABLE `responsables` ENABLE KEYS */;
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
