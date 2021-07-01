-- MySQL dump 10.13  Distrib 8.0.25, for Linux (x86_64)
--
-- Host: localhost    Database: devaeyewear
-- ------------------------------------------------------
-- Server version	8.0.25-0ubuntu0.20.04.1

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
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product` (
  `pId` int NOT NULL,
  `pName` varchar(25) NOT NULL,
  `pPPrice` decimal(10,2) NOT NULL,
  `pAPrice` decimal(10,2) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `size` varchar(255) NOT NULL,
  `pImageName` varchar(25) NOT NULL,
  PRIMARY KEY (`pId`),
  KEY `pImageName` (`pImageName`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`pImageName`) REFERENCES `product_images` (`pImageName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'DV6241',10.00,5.00,'Homme','50-50-145','index-1.jpg'),(2,'DV5242',0.00,35.00,'Mix','50-48-146','index-2.jpg'),(3,'DV6243',37.00,27.00,'Homme','30-45-155','index-3.jpg'),(4,'DV5244',28.00,14.00,'Mix','30-41-125','index-4.jpg'),(5,'DV6245',49.00,35.00,'Homme','30-42-135','index-5.jpg'),(6,'DV6246',0.00,32.00,'Femme','30-44-175','index-6.jpg'),(7,'DV6247',31.00,20.00,'Mix','60-45-195','index-7.jpg'),(8,'DV6248',44.00,30.00,'Femme','16-48-165','index-8.jpg'),(9,'DV3249',0.00,45.00,'Homme','24-32-135','index-9.jpg'),(10,'DV0529',32.00,18.00,'Femme','18-51-175','index-10.jpg'),(11,'DV0528',0.00,10.00,'Mix','20-15-162','index-11.jpg'),(12,'DV0527',20.00,16.00,'Femme','30-66-178','index-12.jpg'),(13,'DV0526',38.00,30.00,'Homme','40-22-103','index-13.jpg'),(14,'DV3245',0.00,65.00,'Femme','36-14-174','index-14.jpg'),(15,'DV4244',35.00,25.00,'Homme','50-25-113','index-15.jpg'),(16,'DV2243',63.00,43.00,'Femme','75-25-152','index-16.jpg'),(17,'DV0242',0.00,10.00,'Femme','70-08-125','index-17.jpg'),(18,'DV1241',33.33,22.00,'Mix','30-50-196','index-18.jpg'),(19,'DV6240',0.00,15.50,'Mix','41-14-147','index-19.jpg'),(20,'DV7351',0.00,65.50,'Homme','39-40-192','index-20.jpg'),(21,'DV7812',0.00,14.00,'Mix','24-17-170','index-21.jpg'),(22,'DV4521',35.00,14.00,'Mix','30-15-193','index-22.jpg'),(23,'DV52471',0.00,25.00,'Mix','74-60-175','index-23.jpg'),(24,'Pure Pineapple',35.00,14.00,'Mix','63-95-114','index-24.jpg'),(25,'DV9825',0.00,14.00,'Femme','36-45-164','index-25.jpg');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-07-01 11:21:48
