-- MySQL dump 10.13  Distrib 8.0.35, for Linux (x86_64)
--
-- Host: localhost    Database: erp_bizaka
-- ------------------------------------------------------
-- Server version	8.0.35-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payment` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `from_id` varchar(150) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `to_id` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `amount` varchar(45) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `customer_id` int DEFAULT NULL,
  `service_id` int DEFAULT NULL,
  `pay_id` int DEFAULT NULL,
  `service_status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ad_info` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ad_info2` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `time` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `paydate` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `log_id` int DEFAULT NULL,
  `k_status` int DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase`
--

DROP TABLE IF EXISTS `purchase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `purchase` (
  `id` int NOT NULL AUTO_INCREMENT,
  `member_id` int NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `purchase_date` date NOT NULL,
  `added_datetime` datetime NOT NULL,
  `log_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase`
--

LOCK TABLES `purchase` WRITE;
/*!40000 ALTER TABLE `purchase` DISABLE KEYS */;
INSERT INTO `purchase` VALUES (1,10,100.00,'2023-09-23','2023-09-23 12:15:55',1),(2,10,1000.00,'2023-09-25','2023-09-25 17:12:22',1),(3,10,100.00,'2023-10-03','2023-10-03 11:49:53',1),(4,5,200.00,'2023-10-03','2023-10-03 11:52:59',1),(5,7,400.00,'2023-10-03','2023-10-03 11:54:04',1),(6,8,500.00,'2023-10-03','2023-10-03 11:54:39',1),(7,6,1000.00,'2023-10-03','2023-10-03 11:55:31',1);
/*!40000 ALTER TABLE `purchase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `request_payment`
--

DROP TABLE IF EXISTS `request_payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `request_payment` (
  `id` int NOT NULL AUTO_INCREMENT,
  `from_id` int NOT NULL,
  `to_id` int NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `req_time` varchar(20) DEFAULT NULL,
  `req_date` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `req_image` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `request_payment`
--

LOCK TABLES `request_payment` WRITE;
/*!40000 ALTER TABLE `request_payment` DISABLE KEYS */;
INSERT INTO `request_payment` VALUES (1,2,1,100.00,'2023-07-22 16:07:26','2023-07-22','Approved','1.jpg'),(2,4,2,100.00,'2023-07-22 17:13:15','2023-07-22','Approved','2.jpg'),(3,2,1,1000.00,'2023-07-22 17:27:58','2023-07-22','Approved','3.webp'),(4,6,1,100.00,'2023-07-22 17:31:01','2023-07-22','Approved','4.webp'),(5,2,1,100.00,'2023-08-05 15:37:06','2023-08-05','Approved','5.jpg'),(6,2,1,350.00,'2023-08-05 16:37:03','2023-08-05','Approved','6.jpg'),(7,4,2,100.00,'2023-08-05 16:52:00','2023-08-05','Approved','7.psd'),(8,2,1,100.00,'2023-08-05 17:52:31','2023-08-05','Approved','8.jpg'),(9,2,1,100.00,'2023-08-05 17:54:19','2023-08-05','Approved','9.jpg'),(10,4,2,100.00,'2023-08-05 17:55:17','2023-08-05','Approved','10.jpg');
/*!40000 ALTER TABLE `request_payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_type`
--

DROP TABLE IF EXISTS `user_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usertype_name` varchar(20) DEFAULT NULL,
  `status` int DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_type`
--

LOCK TABLES `user_type` WRITE;
/*!40000 ALTER TABLE `user_type` DISABLE KEYS */;
INSERT INTO `user_type` VALUES (1,'Admin',1),(2,'Staff',1);
/*!40000 ALTER TABLE `user_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int DEFAULT '0',
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `plain_password` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `dob` date DEFAULT NULL,
  `status` int DEFAULT '1',
  `maritial_status` varchar(20) DEFAULT NULL,
  `aadhar_no` varchar(20) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `address` varchar(80) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `wallet` varchar(50) DEFAULT '0',
  `upi` varchar(50) DEFAULT NULL,
  `payment_qr_oode` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `joined_date` varchar(20) DEFAULT NULL,
  `usertype_id` int DEFAULT '0',
  `login_id` int DEFAULT NULL,
  `referral_id` varchar(255) DEFAULT NULL,
  `photo` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,0,'Administrator','administrator@gmail.com',NULL,'123','$2y$10$cIrs0d3SNe/KnrQyFHx5P./uLaV3wCjCQnR3dHupI3ayHzXffVp6C',NULL,2,NULL,NULL,'9047736314',NULL,NULL,NULL,'2187',NULL,'1.png','2023-06-25 13:00:20','2023-06-25 13:00:20',NULL,1,1,'',NULL),(5,0,'Anbazhakan N','jino@gmail.com',NULL,'7968','$2y$10$oD6Z7JGc7h1E8Imsm3/7mOGO4B7iuq861UpQ.ml1PPSl8vMcuuru6',NULL,1,NULL,NULL,'9600299799',NULL,'16, Newport street, Nagercoil- 629001',NULL,'0',NULL,NULL,'2023-09-21 09:40:15','2023-10-03 10:38:57',NULL,3,NULL,'1',NULL),(6,0,'Bensigar P','joe@gmail.com',NULL,'1370','$2y$10$jy2B82nRHWuTm28zvqnQb.GAEsYuHkOGToQH83iHJs7TVPdBAq2fu',NULL,1,NULL,NULL,'9489415067',NULL,'Enayam, Kanyakumari',NULL,'0',NULL,NULL,'2023-09-21 09:41:08','2023-10-03 10:40:28',NULL,3,NULL,'5',NULL),(7,0,'Ambli Rajesh','joe@gmail.com',NULL,'7312','$2y$10$tfxguTayggYT2yW5lYwjV.VqHLZPZBKiKIqCeP3O8iSMnuwf2NoTa',NULL,2,NULL,NULL,'7448472587',NULL,'Keezhkulam, Kanyakumari district',NULL,'0',NULL,NULL,'2023-09-21 10:07:31','2023-10-03 11:33:29',NULL,3,NULL,'6',NULL),(8,0,'Sahayaraj','sahayaraj@gmail.com',NULL,'5035','$2y$10$xl5hvx31uADB4OaXKpmYbuYfZjffziFIa58tnMRciZFVO4ivi2j9.',NULL,2,NULL,NULL,'6379009374',NULL,'Colachal, KK dist.',NULL,'0',NULL,NULL,'2023-09-23 05:37:55','2023-10-03 11:35:29',NULL,3,NULL,'7',NULL),(9,0,'Ramya','ramy@gmail.com',NULL,'5866','$2y$10$DW5fnYCK9Bd1asYs3vthjOmON9t00q6tMwiP5F.nx3OVZk3q18b2S',NULL,1,NULL,NULL,'7397112980',NULL,'Konam, KK Dist.',NULL,'0',NULL,NULL,'2023-09-23 05:56:43','2023-10-03 11:37:42',NULL,3,NULL,'8',NULL),(10,0,'Annakili','bensigarp@gmail.com',NULL,'3814','$2y$10$j8OjFieFDlY4sPWsFcbnEu.mA/eyhrERjgOk46NHNwLlFJiMqnpk.',NULL,1,NULL,NULL,'9489514829',NULL,'Enayam, KK Dist.',NULL,'0',NULL,NULL,'2023-09-23 06:45:43','2023-10-03 11:39:44',NULL,3,NULL,'9',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `withdrawal`
--

DROP TABLE IF EXISTS `withdrawal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `withdrawal` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `req_time` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `pay_image` varchar(20) DEFAULT NULL,
  `paid_time` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `withdrawal`
--

LOCK TABLES `withdrawal` WRITE;
/*!40000 ALTER TABLE `withdrawal` DISABLE KEYS */;
INSERT INTO `withdrawal` VALUES (1,2,100.00,'2023-07-21 13:50:58','Completed','1.jpg','2023-07-21 13:51:14'),(2,2,350.00,'2023-07-21 15:06:39','Completed','2.jpg','2023-07-21 15:07:52'),(3,2,100.00,'2023-07-21 15:25:59','Completed','3.jpg','2023-07-21 15:26:42'),(4,2,200.00,'2023-07-21 15:27:24','Completed','4.webp','2023-07-21 15:27:53'),(5,2,100.00,'2023-07-22 14:54:32','Pending',NULL,NULL);
/*!40000 ALTER TABLE `withdrawal` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-02-02  9:04:08
