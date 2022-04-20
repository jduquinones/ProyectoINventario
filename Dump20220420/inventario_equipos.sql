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
-- Table structure for table `equipos`
--

DROP TABLE IF EXISTS `equipos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
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
  `idUbicacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_equipos_ubicacion1_idx` (`idUbicacion`),
  CONSTRAINT `fk_equipos_ubicacion1` FOREIGN KEY (`idUbicacion`) REFERENCES `ubicacion` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=161 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipos`
--

LOCK TABLES `equipos` WRITE;
/*!40000 ALTER TABLE `equipos` DISABLE KEYS */;
INSERT INTO `equipos` VALUES (12,'Computador','ee5519537d6dbf995db3c96f66dd6909.jpg','192.168.21.108','Windows 10','S1H070L6','Office 365','N/A','Lenovo','10TP','C003CP01',34),(13,'Computador','bfd9c8f59caaca8579ba5de91f3bb400.jpg','192.168.21.184','Windows 10','S1H0707Q','Open Office','N/A','Lenovo','10TP','C003CP02',34),(14,'Computador','959fd714e9ef4b325b205c6cae0a97f3.jpg','192.168.21.88','Windows 10','S1H0722M','Open Office','N/A','Lenovo','10TP','C003EN01',33),(15,'Computador','8d59af2881e44e929552c3a83348d670.jpg','192.168.21.89','Windows 10','S1H071V3','Open Office','N/A','Lenovo','10TP','C003EN02',33),(16,'Computador','5d1e399307c31924422f678c76121778.jpg','192.168.21.136','Windows 10','S1H055R4','Office 365','N/A','Lenovo','10TP','C003EN03',33),(17,'Computador','2e6e5fb3d4056b8729f01968c4a743c8.jpg','192.168.21.87','Windows 10','S1H07207','Wps','N/A','Lenovo','10TP','C003EN04',33),(18,'Computador','3a4845014692b45a3e30ebad25a6a816.jpg',' 192.168.21.170','Windows 10','S1H07086','Open Office','N/A','Lenovo','10TP','C003CP03',34),(19,'Computador','6547d5cdbfb7a97cc9dc88f45ecbee57.jpg','192.168.21.174','Windows 10','S1H07081','Open Office','N/A','Lenovo','10TP','C003CP04',34),(20,'Computador','f912ef34a786a503308657e0ab1134a3.jpg','192.168.21.172','Windows 10','S1H070L9','Open Office','N/A','Lenovo','10TP','C003CP05',34),(21,'Computador','9fe31e8afd24e6ef42ec706c1722266b.jpg','192.168.21.169','Windows 10','S1H06ZWM','Open Office','N/A','Lenovo','10TP','C003CP06',34),(22,'Computador','2d73c33cd65d35f1207ee99c6ec6a7c1.jpg','192.168.21.185','Windows 10','S1H07080','Open Office','N/A','Lenovo','10TP','C003CP07',34),(23,'Computador','6c43381b4e57ecc6fa853d6e285e9a3d.jpg','192.168.21.173','Windows 10','S1H070KU','Open Office','N/A','Lenovo','10TP','C003CP08',34),(24,'Computador','441ff86e3873833004083201961cd330.jpg','192.168.21.152','Windows 10','S1H0707P','Open Office','N/A','Lenovo','10TP','C003CP09',34),(25,'Computador','0936971887171906cdc3c32d40212505.jpg','192.168.21.109','Windows 10','S1H0707X','Open Office','N/A','Lenovo','10TP','C003CP10',34),(26,'Computador','9ea06e098ff1bba4d9ae04bf0e75bac6.jpg','192.168.21.182','Windows 10','S1H06ZWL','Open Office','N/A','Lenovo','10TP','C003CP11',34),(27,'Computador','2793db3d92057dd12e36254425a303c3.jpg','192.168.21.183','Windows 10','S1H07079','Open Office','N/A','Lenovo','10TP','C003CP12',34),(28,'Computador','02bd77667356c32d328a36da5b02e8be.jpg','192.168.21.171','Windows 10','S1H07078','Open Office','N/A','Lenovo','10TP','C003CP13',34),(29,'Computador','f63ed4f873c1beffa10231f8ff6cac94.jpg','192.168.21.107','Windows 10','S1H071V8','Open Office','N/A','Lenovo','10TP','C003CP14',34),(30,'Computador','9937f621143408068505040fdd008063.jpg','192.168.21.65','Windows 10','S1H05T0U','Open Office','N/A','Lenovo','10TP','C003CM01',36),(31,'Computador','ca42e7b270a06203c82945080d01466c.jpg','192.168.21.155','Windows 10','S1H078TF','Open Office','N/A','Lenovo','10TP','C003CM02',36),(32,'Computador','09601327ddacbb566b1a53b1bf3a5fb3.jpg','192.168.21.160','Windows 10','S1H070RV','Open Office','N/A','Lenovo','10TP','C003CM03',36),(33,'Computador','251ab4f485e1d69d81f694a5349a10ad.jpg','192.168.21.175','Windows 10','S1H070KL','Open Office','N/A','Lenovo','10TP','C003CM04',36),(34,'Computador','18fc5d00f90c176a17f3e65825a7606d.jpg','192.168.21.153','Windows 10','MP24XZ6S','Open Office','N/A','Lenovo','V30a-22IIL','C003CM05',36),(35,'Computador','3b9ad4023481bac156a1e2194faddfa1.jpg','192.168.21.159','Windows 10','S1H06ZWW','Open Office','N/A','Lenovo','10TP','C003CM06',36),(36,'Computador','37080aae208eda3a02342036b4ce10cb.jpg','192.168.21.157','Windows 10','S1H078BQ','Open Office','N/A','Lenovo','10TP','C003CM07',36),(37,'Computador','26233b5cb0230f2b0020a26b143b9346.jpg','192.168.21.156','Windows 10','S1H074PV','Open Office','N/A','Lenovo','10TP','C003CM08',36),(38,'Computador','75e8b2caecc9498f0d6df8d6ed24f070.jpg','192.168.21.165','Windows 10','S1H070L2','Open Office','N/A','Lenovo','10TP','C003CM09',36),(39,'Computador','0472ea4bde1c2fa8b74428e7e3772373.jpg','192.168.21.218','Windows 10','S1H078TN','Open Office','N/A','Lenovo','10TP','C003CM10',36),(40,'Computador','bad3a72d840c4f0410327faff5f88b00.jpg','192.168.21.167','Windows 10','S1H0790M','Open Office','N/A','Lenovo','10TP','C003CM11',36),(41,'Computador','0aafb2ef27d43044b7bcffde2fa71b93.jpg','192.168.21.161','Windows 10','S1H078E6','Open Office','N/A','Lenovo','10TP','C003CM12',36),(42,'Computador','26d078d449b68ce6b4545bd2375b508a.jpg','192.168.21.164','Windows 10','S1H070KZ','Open Office','N/A','Lenovo','10TP','C003CM13',36),(43,'Computador','2a2c67d7712a2da2859688a61a0e719c.jpg','192.168.21.154','Windows 10','S1H0704Q','Open Office','N/A','Lenovo','10TP','C003CM14',36),(44,'Computador','aa7d8dd71013682c0cdb0198aa052c1a.jpg','192.168.21.162','Windows 10','S1H0707N','Open Office','N/A','Lenovo','10TP','C003CM15',36),(45,'Computador','e67f07feb3b5492bb987c9382d194131.jpg','192.168.21.163','Windows 10','S1H078BW','Open Office','N/A','Lenovo','10TP','C003CM16',36),(46,'Computador','a540f3a2c3fe9001a71242a94b660d57.jpg','192.168.21.178','Windows 10','S1H070KM','Open Office','N/A','Lenovo','10TP','C003CM17',36),(47,'Computador','3515fb07220f73d7d11cb86bceaedee9.jpg','192.168.21.166','Windows 10','S1H07087','Open Office','N/A','Lenovo','10TP','C003CM18',36),(48,'Computador','e9d36674536f42a796c1d71b5932fda5.jpg','192.168.21.168','Windows 10','S1H078BT','Open Office','N/A','Lenovo','10TP','C003CM19',36),(49,'Computador','aec003c3d8c4d8de304838ec3682f6ea.jpg','192.168.21.86','Windows 10','S1H0707Z','Open Office','N/A','Lenovo','10TP','C003CM20',36),(50,'Computador','7e82019904cf9eb1303c795217a8d841.jpg','192.168.21.252','Windows 10','S1H06YSL','Open Office','N/A','Lenovo','10TP','C003CM21',36),(51,'Computador','92452822ea5020d5f6eb0c8442f2ba6e.jpg','192.168.21.179','Windows 10','S1H070S9','Open Office','N/A','Lenovo','10TP','C003CM22',36),(52,'Computador','c420fd90c099b42ac20d692c30d5784a.jpg','192.168.21.180','Windows 10','S1H06ZXJ','Open Office','N/A','Lenovo','10TP','C003CM23',36),(53,'Computador','5727b94f28b58f7b56174654387987d1.jpg','192.168.21.176','Windows 10','S1H070L5','Open Office','N/A','Lenovo','10TP','C003CM24',36),(54,'Computador','eb70cb5184809ec8d22b8016a66970db.jpg','192.168.21.158','Windows 10','S1H070KH','Open Office','N/A','Lenovo','10TP','C003CM25',36),(55,'Computador','d6764f341912a4a8e843e7e1c621caa7.jpg','192.168.21.17','Windows 10','S1H055QR','Office 365','N/A','Lenovo','10TP','C003SI01',37),(56,'Computador','d02aea8e5945d16f98454e109f16b474.jpg','192.168.21.135','Windows 10','S1H05526','Open Office','N/A','Lenovo','10TP','C003CA01',38),(57,'Computador','24d2e0068c39ad4b01a74f2b1c86c878.jpg','192.168.21.29','Windows 10','S1H04RL0','Office 365','N/A','Lenovo','10TP','C003AD01',39),(58,'Computador','98b68f113fa57e3312710114029b4035.jpg','192.168.21.137','Windows 10','S1H0707S','Office 365','N/A','Lenovo','10TP','C003AD02',39),(59,'Computador','0db9107a8db9e2c5c3d2ce56f13e691a.jpg','192.168.21.105','Windows 10','MP1VZFM7','Office 365','N/A','Lenovo','10TP','C003AD03',39),(60,'Computador','c284c164d10705c7ebbf896bfbad2c9c.jpg','192.168.21.144','Windows 10','S1H055RG','Office 365','N/A','Lenovo','10TP','C003AD04',39),(61,'Computador','cf7af64889dce83248c172b30acee5ec.jpg','192.168.21.22','Windows 10','S1H055R6','Office 365','N/A','Lenovo','10TP','C003AD05',41),(62,'Computador','85050a2a532a85989632a03ee5a52b89.jpg','192.168.21.140','Windows 10','S1H078ZT','Office 365','N/A','Lenovo','10TP','C003AD06',42),(63,'Computador','723464fca7f5d8c13bd3c1feee7ef3fb.jpg','192.168.21.66','Windows 10','MP1VZFQ3','Open Office','N/A','Lenovo','10TP','C003AD07',43),(64,'Computador','f0ba755cbbeb5d1366f91a0e6ea57811.jpg','192.168.21.149','Windows 10','MP1VZHTA','Office 365','N/A','Lenovo','10TP','C003AD08',44),(65,'Computador','b74363cddd1c2bdec4a6042073aa834b.jpg','192.168.21.63','Windows 10','MP1VZHYM','Open Office','N/A','Lenovo','10TP','C003AD09',43),(66,'Computador','590e3e36b85fa4b51de6100661906ef7.jpg','192.168.21.28','Windows 10','S1H055QY','Open Office','N/A','Lenovo','10TP','C003AD10',45),(67,'Computador','6b21a648343b06b6734af68d3aa04a43.jpg',' 192.168.21.143','Windows 10','S1H0707K','Office 365','N/A','Lenovo','10TP','C003AD11',46),(68,'Computador','d53d0eae7726754b5b8172c6560b764c.jpg','192.168.21.147','Windows 10','MP1VZFQD','Office 365','N/A','Lenovo','10TP','C003AD12',47),(69,'Computador','a9dae06b6ab1dae313b1f14272f771a4.jpg','192.168.21.148','Windows 10','S1H04RHW','Office 365','N/A','Lenovo','10TP','C003AD13',47),(70,'Computador','1062e34248032a9ed8f38ec4a2301b40.jpg','192.168.21.64','Windows 10','MP1VZHZA','Open Office','N/A','Lenovo','10TP','C003AD14',43),(71,'Computador','f603daab93db2c15b447410d7af64566.jpg','192.168.21.67','Windows 10','MP1VZFQF','Open Office','N/A','Lenovo','10TP','C003AD15',48),(72,'Computador','0906d186f09b5c32399125944dadce98.jpg','192.168.21.72','Windows 10','S1H05T3L','Open Office','N/A','Lenovo','10TP','C003AD16',50),(73,'Computador','fe34c5074a70e80909d9e2fd59cc6d12.jpg','192.168.21.53','Windows 10','MP1VZFQG','Office 365','N/A','Lenovo','10TP','C003AD17',49),(74,'Computador','f3fdf6de870db9aa38f899081fc8be19.jpg','192.168.21.68','Windows 10','MP1VZHZM','Open Office','N/A','Lenovo','10TP','C003VE01',51),(75,'Computador','a6cc1a1d0d249abe6487804c91b46ada.jpg','192.168.21.61','Windows 10','MP1W416X','Open Office','N/A','Lenovo','10TP','C003VE02',51),(76,'Computador','e2b19c0afc782b8a44c30eabd8815bce.jpg','192.168.21.60','Windows 10','MP1VZFNY','Open Office','N/A','Lenovo','11FV','C003VE03',51),(77,'Computador','29c2bb60afbffcf9e22eb65e912acdf5.jpg','192.168.21.59','Windows 10','MP1VZFQQ','Open Office','','Lenovo','11FV','C003VE04',51),(78,'Computador','c0530fe66100680f83e2099ac9aa129e.jpg','192.168.21.57','Windows 10','MP1VZHZD','Open Office','N/A','Lenovo','11FV','C003VE05',51),(79,'Computador','3d58a829956af1d074c6b58c4721acd8.jpg','192.168.21.56','Windows 10','MP1VZHZ2','Open Office','N/A','Lenovo','11FV','C003VE06',51),(80,'Computador','6845eec72bd685fdf83ab1a0b7e38602.jpg','192.168.21.52','Windows 10','MP1VZFPD','Open Office','N/A','Lenovo','11FV','C003VE07',51),(81,'Computador','a1de327be4430ad5620ef581f4a0fbb3.jpg','192.168.21.55','Windows 10','MP1VZFNL','Open Office','N/A','Lenovo','11FV','C003VE08',51),(82,'Computador','ce1e9f28d6f22ef86dc1080ac8a249ac.jpg','192.168.21.45','Windows 10','MP1VZFN1','Open Office','N/A','Lenovo','11FV','C003VE09',51),(83,'Computador','7bfdb1d7450ecfe6214fa6265da3d2fa.jpg','192.168.21.46','Windows 10','MP1W3XPC','Open Office','N/A','Lenovo','11FV','C003VE10',51),(84,'Computador','7c5397274984d4eb05e5142dbb8fedd3.jpg','192.168.21.47','Windows 10','MP1VZFMZ','Open Office','N/A','Lenovo','11FV','C003VE11',51),(85,'Computador','b49305af9a14744f44f36c1ac7df336d.jpg','192.168.21.38','Windows 10','MP1VZFRH','Open Office','N/A','Lenovo','11FV','C003VE12',51),(86,'Computador','31eefb57708890bff2a09f42499d1ab5.jpg','192.168.21.39','Windows 10','MP1VZFQ5','Open Office','N/A','Lenovo','11FV','C003VE13',51),(87,'Computador','cfc993ed3e8c1b8d8939649e0ab006ca.jpg','192.168.21.40','Windows 10','MP1VZFRZ','Open Office','N/A','Lenovo','11FV','C003VE14',51),(88,'Computador','811614644663775010f766a37dbcdf9e.jpg','192.168.21.48','Windows 10','MP1VZFPF','Open Office','N/A','Lenovo','11FV','C003VE15',51),(89,'Computador','f9c1e461661cfc946da99f6197513772.jpg','192.168.21.49','Windows 10','MP1VZJ14','Open Office','N/A','Lenovo','11FV','C003VE16',51),(90,'Computador','5b579b1c0758d6af17e116a1a4f41d82.jpg','192.168.21.50','Windows 10','MP1VZD8S','Open Office','N/A','Lenovo','11FV','C003VE17',51),(91,'Computador','448b95f3a8bd914a8d215b8f0c316d88.jpg','192.168.21.51','Windows 10','MP1VZFMQ','Open Office','N/A','Lenovo','11FV','C003VE18',51),(92,'Computador','46ecc46c59abb089de31a95b61bc79c0.jpg','192.168.21.44','Windows 10','MP1VZJ03','Open Office','','Lenovo','11FV','C003VE19',51),(93,'Computador','5ed14f0538cec152265bf7b5fb7d9b66.jpg','192.168.21.43','Windows 10','MP1VZHZ9','Open Office','N/A','Lenovo','11FV','C003VE20',51),(94,'Computador','babaa780f3770c4cd606a12a6aa8712f.jpg','192.168.21.42','Windows 10','MP1VZFMY','Open Office','N/A','Lenovo','11FV','C003VE21',51),(95,'Computador','9638b3d0a50b2efaa67f99e0f65e71a7.jpg','192.168.21.41','Windows 10','MP1VZD91','Open Office','N/A','Lenovo','11FV','C003VE22',51),(96,'Computador','165e0cde92140ac8f52ffe6963ca9c24.jpg','192.168.21.34','Windows 10','MP1VZHZZ','Open Office','N/A','Lenovo','11FV','C003VE23',51),(97,'Computador','0f4c23f19abaab42549c6c8d7d717c3c.jpg','192.168.21.35','Windows 10','MP1W3XYS','Open Office','N/A','Lenovo','11FV','C003VE24',51),(98,'Computador','11243d1e9b420f1931b5dc46e0502e5d.jpg','192.168.21.36','Windows 10','MP1VZFQL','Open Office','N/A','Lenovo','11FV','C003VE25',51),(99,'Computador','1abf5901b86a8a0397bb36016d02eaae.jpg','192.168.21.37','Windows 10','MP1VZHZ8','Open Office','N/A','Lenovo','11FV','C003VE26',51),(100,'Computador','ca79a98646da615d6dc23caf6de8eac9.jpg','192.168.21.31','Windows 10','MP1VZFQA','Open Office','N/A','Lenovo','11FV','C003VE27',51),(101,'Computador','aa966b0680cabc48b44712a59cbe3def.jpg','192.168.21.69','Windows 10','S1H06YRF','Open Office','N/A','Lenovo','11FV','C003VE28',51),(102,'Computador','7d635b5312a9e29662adaa5edb50aa69.jpg','192.168.21.58','Windows 10','MP1VZ28M','Open Office','N/A','Lenovo','11FV','C003VE29',51),(103,'Computador','26ac420599c5bccaf69c855bb62427d5.jpg','192.168.21.80','Windows 10','S1H071VV','Open Office','N/A','Lenovo','10TP','C003DE01',52),(104,'Computador','e8ed0fc5d5e763fe3acc4236eaa5ad32.jpg','192.168.21.95','Windows 10','MP1W3YJN','Open Office','N/A','Lenovo','10TP','C003DE02',53),(105,'Computador','9e0fa77e9bfe43c0391b7393a239d38e.jpg','192.168.21.85','Windows 10','MP1VZ6PQ','Open Office','N/A','Lenovo','10TP','C003DE03',53),(106,'Computador','e9a241d080482b130b4a662d871b5bea.jpg','192.168.21.84','Windows 10','MP1VZFN4','Open Office','N/A','Lenovo','10TP','C003DE04',53),(107,'Computador','2d64890e696c6d4611d43a9b96caab15.jpg','192.168.21.83','Windows 10','S1H07085','Office 365','N/A','Lenovo','10TP','C003DE05',53),(108,'Computador','97feb4b0b2941f3973697c3f3df08e34.jpg','192.168.21.82','Windows 10','MP1VZHZL','Office 365','N/A','Lenovo','10TP','C003DE06',55),(109,'Computador','74744a354e01fb97000cf42e59e92646.jpg','192.168.21.138','Windows 10','S1H070LA','Open Office','N/A','Lenovo','11FV','C003CA02',38),(110,'Computador','96635f49ca935b72259ef438167186c2.jpg','192.168.21.24','Windows 10','S1H055QV','Office 365','N/A','Lenovo','10TP','C003TE01',56),(111,'Computador','71fd1ea9aa89be70ccd54504eb12ea50.jpg','192.168.21.23','Windows 10','S1H055R3','Open Office','N/A','Lenovo','10TP','C003TE02',56),(112,'Computador','acc9a9b7d64ff5d734444de121ef2c5e.jpg','192.168.21.17','Windows 10','S1H055QR','Office 365','N/A','Lenovo','10TP','C003SI01',37),(113,'Computador','99440b0903cf2b41d0c77927a7c6c880.jpg','192.168.21.232','Windows 10','S1H04RH6','Wps','N/A','Lenovo','10TP','C003SI02',37),(114,'Computador','3bb45e971a2f47e8d123739115f5be33.jpg','192.168.21.197','Windows 10','S1H0707T','Open Office','N/A','Lenovo','10TP','C003SI03',37),(115,'Computador','ceae353fcb1e252883728e70472cc349.jpg','192.168.21.198','Windows 10','S1H055QK','Office 365','N/A','Lenovo','11FV','C003SI04',58),(116,'Portatil','d121ec2b90e0eae29a431738b3ecf0e7.jpg','10.41.2.6','Windows 8','2CE4130HBQ','Office 365','N/A','HP','Split X2','',37),(117,'Portatil','bfd518081bf62f1e6f44aa4ce3b232e2.jpg','','Windows 8 Pro','HY37Z22','Office 365','3404','Dell','Vostro 5470','',37),(118,'Computador','a614c52f0ac6671abe1775290c2c5af8.jpg','192.168.21.10','Windows 7','03310','N/A','03310','N/A','N/A','',37),(119,'Computador','3f847e08e13cb20dfa43e985c69fdd0c.jpg','192.168.21.237','Linux','MX24210079','N/A','3824','HP','Proliant Ml310e','',37),(120,'Computador','bce76c4ed1969e4de2468c0ce7f75754.jpg','192.168.21.100','Windows 2012','MX242000GZ','N/A','3275','HP','Proliant Ml310e','',37),(121,'Computador','9a0a420d7694eebada429beab9bb21aa.jpg','192.168.21.5','Linux','MX240800S1','N/A','10582','HP','Proliant Ml110','',37),(122,'Computador','6017151d5edfdb4b1c5964df7a30cc6f.jpg','192.168.21.250','Windows 2012','MX244500S3','N/A','','HP','Proliant Ml310e','',37),(123,'Computador','b071c175676c3a542d4dbe9a96e8e08c.jpg','192.168.60.200','Windows 10','S1H05T1E','Open Office','N/A','Lenovo','10TP','C011PV01',20),(124,'Computador','2f317718d53339d75d1e4ebd20e371a0.jpg','192.168.162.141','Windows 10','S1H05T0X','Open Office','N/A','Lenovo','10TP','C018PV01',21),(125,'Computador','724d6824c295477f271c2ccf264da5c7.jpg','192.168.162.29','Windows 10','S1H05T1S','Open Office','N/A','Lenovo','10TP','C027PV01',22),(126,'Computador','bfd454bc379426c3a489900c3f4a83b7.jpg','192.168.161.220','Windows 10','S1H05T13','Open Office','N/A','Lenovo','10TP','P511PVC01',23),(127,'Computador','f4667aa065cadbbca6448a8587462001.jpg','192.168.161.219','Windows 10','S1H05T1A','Open Office','N/A','Lenovo','10TP','P511PV02',23),(128,'Computador','a531b7465174ec4d46e109cdfbe3a8e7.jpg','192.168.161.106','Windows 10','S1H05T3H','Open Office','N/A','Lenovo','10TP','C013PV01',14),(129,'Computador','3f54f5f69c5cf42310883dab72919184.jpg','192.168.161.189','Windows 10','S1H05T3F','Open Office','N/A','Lenovo','10TP','C028PV01',24),(130,'Computador','b9929ac5a99608ba84521dfef5b2cdf1.jpg','192.168.162.76','Windows 10','S1H05T18','Open Office','N/A','Lenovo','10TP','C083PV01',16),(131,'Computador','4c0233c2921cfcb2e5911d0f429c15d2.jpg','192.168.162.46','Windows 10','S1H05T10','Open Office','N/A','Lenovo','10TP','C034PV01',18),(132,'Computador','ae26afe3166af3d173d766c29d9d73ac.jpg','192.168.161.125','Windows 10','S1H05T1L','Open Office','N/A','Lenovo','10TP','C015PV01',25),(133,'Computador','0535281f4dfd98a4b54aea8df16d256c.jpg','192.168.191.142','Windows 10','S1H05T0T','Open Office','N/A','Lenovo','10TP','C033PV01',26),(134,'Computador','2ad1819386202831f0c3bd1b87fe5b1d.jpg','192.168.163.221','Windows 10','S1H05T3C','Open Office','N/A','Lenovo','10TP','C088PV01',27),(135,'Computador','5c8e66c4100f1830beb730a249f763bd.jpg','192.168.163.220','Windows 10','S1H05T1B','Open Office','N/A','Lenovo','10TP','C088PV02',27),(136,'Computador','389758936b6eac0e3a0d17a77f4b44df.jpg','192.168.39.142','Windows 10','PC0QSKJP','Open Office','N/A','Lenovo','10TP','C557PV01',30),(137,'Computador','b8ff8cb9cbc9a2854d1b354528c8e0e2.jpg','192.168.39.141','Windows 10','PC0QSKGJ','Open Office','N/A','Lenovo','10TP','C557PV02',30),(138,'Computador','7871e094858f97f2c167b86d9838c9ae.jpg','192.168.25.20','Windows 10','S1H05T16','Open Office','N/A','Lenovo','10TP','P519PV01',28),(139,'Computador','2b035ece4e4fee22a9336f687a5c5c34.jpg','192.168.25.21','Windows 10','S1H05T3E','Open Office','N/A','Lenovo','10TP','C036PV02',28),(140,'Computador','a8fb088def9297bcc5950ba8ef79f26e.jpg','192.168.163.236','Windows 10','S1H05T34','Open Office','N/A','Lenovo','10TP','C039PV01',29),(141,'Computador','43aa8e20266d7b500f754cf686b53d30.jpg','192.168.163.237','Windows 10','S1H05T12','Open Office','N/A','Lenovo','10TP','C039PV02',29),(142,'Computador','fc4fb14ad9af46ef0e896a0aee53712d.jpg','192.168.39.153','Windows 10','S1H05XCF','Open Office','N/A','HP','10TP','C558PV01',31),(143,'Computador','adac362836f7c36a06ffcc3c661a72cd.jpg','192.168.39.156','Windows 10','S1H05XC4','Open Office','N/A','Lenovo','10TP','C558PV02',31),(144,'Computador','c44fe55c495a4700db347e128045663c.jpg','192.168.164.2','Windows 10','S1H05XC5','Open Office','N/A','Lenovo','10TP','C559PV01',32),(145,'Computador','349cc2ffe778d0ec965d1c62a19beb53.jpg','192.168.164.3','Windows 10','S1H05XCW','Open Office','N/A','Lenovo','10TP','C559PV02',32),(146,'Computador','c5773e652dd6e5c38370cbc040bdef34.jpg','192.168.21.142','Windows 10','S1H0707F','Office 365','N/A','Lenovo','10TP','C003GH01',65),(147,'Computador','1745f4c9acb1f4fb553847bc8741e463.jpg','192.168.21.141','Windows 10','S1H055QC','Open Office','N/A','Lenovo','10TP','C003GH02',65),(148,'Computador','38f098099e9a7bf74efa286e36aa6bbe.jpg','192.168.21.132','Windows 10','S1H055QX','Open Office','N/A','Lenovo','10TP','C003GH03',66),(149,'Computador','d42997d78472952971266c3030cbf9c8.jpg','192.168.21.134','Windows 10','S1H071V1','Wps','N/A','Lenovo','10TP','C003GH04',66),(150,'Computador','7fac81d91f22f8b2bd1da1b54f6e2a71.jpg','192.168.21.145','Windows 10','S1H055QM','Office 365','N/A','Lenovo','10TP','C003GH05',67),(151,'Computador','69f7aa11d37e90102d9831248cc4d026.jpg','192.168.21.100','Windows 10','S1H05T11','Wps','N/A','Lenovo','10TP','C003GH06',66),(152,'Computador','c02835449c609f405a196ec36157a635.jpg','192.168.21.133','Windows 10','S1H071VM','Wps','N/A','Lenovo','10TP','C003GH07',68),(153,'Computador','ae9e40f1d05047cf72891186f2cc2963.jpg','','Windows 10','S1H0551L','Open Office','N/A','Lenovo','10TP','C003VE41',32),(154,'Computador','9c7535130e700c2580585c65ad54bc7e.jpg','192.168.164.55','Windows 10','S1H0551G','Open Office','N/A','Lenovo','10TP','C003VE42',32),(155,'Computador','c801534564f7a9596053493a02d72533.jpg','192.168.164.58','Windows 10','S1H055R9','Open Office','N/A','Lenovo','10TP','C003VE46',32),(156,'Computador','ddc9db9c890779e6875d6076a27198f8.jpg','192.168.164.56','Windows 10','S1H055RA','Open Office','N/A','Lenovo','10TP','C003VE47',32),(157,'Computador','83f61d6beaf091d40eb141553e3dcc62.jpg','192.168.164.57','Windows 10','S1H055R2','Open Office','N/A','Lenovo','10TP','C003VE44',32),(158,'Computador','ffcecdf1c4ac08d4d0e732157a8895a2.jpg','192.168.164.53','Windows 10','S1H0552J','Open Office','N/A','Lenovo','10TP','C003VE45',32),(159,'Computador','e72bc719b2c933c5eea6702d728b3a3f.jpg','192.168.164.54','Windows 10','S1H055QW','Office 365','N/A','Lenovo','10TP','C003VE43',32),(160,'Computador','d920966cba1be68e0a2062d0e7941ff1.jpg','','Windows 10','S1H06UTR','Open Office','N/A','Lenovo','10TP','C003VE44',32);
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

-- Dump completed on 2022-04-20  2:31:50
