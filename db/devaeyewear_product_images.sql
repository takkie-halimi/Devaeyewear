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
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_images` (
  `pImageName` varchar(25) NOT NULL,
  `p_img1` varchar(25) DEFAULT NULL,
  `p_img2` varchar(25) DEFAULT NULL,
  `p_img3` varchar(25) DEFAULT NULL,
  `p_img4` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`pImageName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_images`
--

LOCK TABLES `product_images` WRITE;
/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;
INSERT INTO `product_images` VALUES ('index-1.jpg','product-1.jpg','product-2.jpg','product-3.jpg','product-4.jpg'),('index-10.jpg','product-1.jpg','product-2.jpg','product-3.jpg','product-4.jpg'),('index-11.jpg','product-1.jpg','product-2.jpg','product-3.jpg','product-4.jpg'),('index-12.jpg','product-1.jpg','product-2.jpg','product-3.jpg','product-4.jpg'),('index-13.jpg','product-1.jpg','product-2.jpg','product-3.jpg','product-4.jpg'),('index-14.jpg','product-1.jpg','product-2.jpg','product-3.jpg','product-4.jpg'),('index-15.jpg','product-1.jpg','product-2.jpg','product-3.jpg','product-4.jpg'),('index-16.jpg','product-1.jpg','product-2.jpg','product-3.jpg','product-4.jpg'),('index-17.jpg','product-1.jpg','product-2.jpg','product-3.jpg','product-4.jpg'),('index-18.jpg','product-1.jpg','product-2.jpg','product-3.jpg','product-4.jpg'),('index-19.jpg','product-1.jpg','product-2.jpg','product-3.jpg','product-4.jpg'),('index-2.jpg','product-1.jpg','product-2.jpg','product-3.jpg','product-4.jpg'),('index-20.jpg','product-1.jpg','product-2.jpg','product-3.jpg','product-4.jpg'),('index-21.jpg','product-1.jpg','product-2.jpg','product-3.jpg','product-4.jpg'),('index-22.jpg','product-1.jpg','product-2.jpg','product-3.jpg','product-4.jpg'),('index-23.jpg','product-1.jpg','product-2.jpg','product-3.jpg','product-4.jpg'),('index-24.jpg','product-1.jpg','product-2.jpg','product-3.jpg','product-4.jpg'),('index-25.jpg','product-1.jpg','product-2.jpg','product-3.jpg','product-4.jpg'),('index-3.jpg','product-1.jpg','product-2.jpg','product-3.jpg','product-4.jpg'),('index-4.jpg','product-1.jpg','product-2.jpg','product-3.jpg','product-4.jpg'),('index-5.jpg','product-1.jpg','product-2.jpg','product-3.jpg','product-4.jpg'),('index-6.jpg','product-1.jpg','product-2.jpg','product-3.jpg','product-4.jpg'),('index-7.jpg','product-1.jpg','product-2.jpg','product-3.jpg','product-4.jpg'),('index-8.jpg','product-1.jpg','product-2.jpg','product-3.jpg','product-4.jpg'),('index-9.jpg','product-1.jpg','product-2.jpg','product-3.jpg','product-4.jpg');
/*!40000 ALTER TABLE `product_images` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-07-01 11:21:47
