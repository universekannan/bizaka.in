-- MySQL dump 10.13  Distrib 8.0.33, for Linux (x86_64)
--
-- Host: localhost    Database: aaranetwork
-- ------------------------------------------------------
-- Server version	8.0.33-0ubuntu0.22.04.2

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_type`
--

LOCK TABLES `user_type` WRITE;
/*!40000 ALTER TABLE `user_type` DISABLE KEYS */;
INSERT INTO `user_type` VALUES (1,'Admin',1),(2,'Member',1);
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
  `email` varchar(255) NOT NULL,
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `usertype_id` int DEFAULT '0',
  `login_id` int DEFAULT NULL,
  `referral_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,0,'Administrator','administrator@gmail.com',NULL,'12345678','$2y$10$gMKkB0s2IF/iUDcIhThk9esA0QKrU/g3/yQqv4lOtqN/trTrhjOwq',NULL,1,NULL,NULL,'9047736314',NULL,NULL,NULL,'2023-06-25 18:30:20','2023-06-25 18:30:20',1,1,'6499395e27c48'),(2,1,'Sanjay1','s1@gmail.com',NULL,'1','$2y$10$piEExTNuISDaq0z82CNAdeTUYgh9rcRxtRRSNf.3kfQC7T2YwVxFW',NULL,1,NULL,NULL,'9047736311',NULL,NULL,NULL,'2023-06-27 05:58:49',NULL,2,NULL,'649a7a98cf432'),(3,1,'Sanjay2','s2@gmail.com',NULL,'1','$2y$10$hQbH.KXPM2tvMtNvfSgiF.Flp6y0SZUvd8j6atzTmRCWBhV8U./se',NULL,1,NULL,NULL,'9047736312',NULL,NULL,NULL,'2023-06-27 06:00:00',NULL,2,NULL,'649a7ae0c3d3e'),(4,1,'Sanjay3','s3@gmail.com',NULL,'1','$2y$10$fYeVp9/deKI1V7YYggtxg.NYtELgAaKFcVaFNyCU2gN9XtDldVdVq',NULL,1,NULL,NULL,'9047736313',NULL,NULL,NULL,'2023-06-27 06:00:12',NULL,2,NULL,'649a7aec9f178'),(5,1,'sukumar1','a1@gmail.com',NULL,'1','$2y$10$bsyM20Zub9ac9I9bNQvObe0bXtldHSdrof/nJfDdUhxJAiHRkspX.',NULL,1,NULL,NULL,'3333333330',NULL,NULL,NULL,'2023-06-27 06:02:47',NULL,2,NULL,'649a7b8750ce7'),(6,1,'sukumar1','a2@gmail.com',NULL,'1','$2y$10$XxGEwV7BOy9yYm/9C5BfwO4mUc6A6/A.V/ohqwqkoFl4DMpmYcXqG',NULL,1,NULL,NULL,'3333333331',NULL,NULL,NULL,'2023-06-27 06:03:12',NULL,2,NULL,'649a7ba0471f3'),(7,2,'sukumar1','a3@gmail.com',NULL,'1','$2y$10$YWsKoVsL8EffBMcoXngwsOLfFVGflbbJt0mtiRlcE39N2YY/4COka',NULL,1,NULL,NULL,'3333333332',NULL,NULL,NULL,'2023-06-27 06:03:30',NULL,2,NULL,'649a7bb1e624d'),(8,2,'sukumar1','a4@gmail.com',NULL,'1','$2y$10$uk4mi9PHDgx1Y08OccG27eBFmX6PvJHpgjc.qUdtgcK09fr5cv25e',NULL,1,NULL,NULL,'3333333334',NULL,NULL,NULL,'2023-06-27 06:03:47',NULL,2,NULL,'649a7bc374c28'),(9,2,'sukumar5','a5@gmail.com',NULL,'1','$2y$10$55u5JifuaV98Jx4Jdx2akeu2pT7QuEWUdzypGUMQoZnjjFCbWsXfC',NULL,1,NULL,NULL,'3333333335',NULL,NULL,NULL,'2023-06-27 06:04:06',NULL,2,NULL,'649a7bd60cc7d'),(10,9,'Kannan','k1@gmail.com',NULL,'1','$2y$10$LYBsZXcR.m7D9nAfuiWjRubk6LobslCckSm9awxkAhGJsp1DA2bUy',NULL,1,NULL,NULL,'78687687',NULL,NULL,NULL,'2023-06-27 06:05:30',NULL,2,NULL,'649a7c2a60a4e'),(11,2,'Jino','jino@gmail.com',NULL,'1','$2y$10$AHA.8Wr8vXxT34LbfZzAze6JyyoXSPwjmKtKxjYH92dWg.fKIV9Wi',NULL,1,NULL,NULL,'7777777777',NULL,NULL,NULL,'2023-06-27 06:24:32',NULL,2,NULL,'649a80a03fa8a'),(12,2,'Micheal','mich@ggg.com',NULL,'1','$2y$10$esWBqR8usMuxpwVZxxVZ5e5RmmDqH9dx0laAIjz1SZNY.Jed5b0Pq',NULL,1,NULL,NULL,'8888888888',NULL,NULL,NULL,'2023-06-27 06:25:30',NULL,2,NULL,'649a80da27fd7'),(13,3,'Felin','fel@ggg.com',NULL,'1','$2y$10$ZoG4moMtX.JvzBe4Rl6FeeOkg1DuGwflQxC.xEI7ALpifFWPi.I.a',NULL,1,NULL,NULL,'66666666',NULL,NULL,NULL,'2023-06-27 06:26:02',NULL,2,NULL,'649a80fab896d');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-27 12:36:43
