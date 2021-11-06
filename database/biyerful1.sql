-- MariaDB dump 10.19  Distrib 10.4.21-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: biyerful
-- ------------------------------------------------------
-- Server version	10.4.21-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `subject_user_id` int(11) DEFAULT NULL,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `likes`
--

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
INSERT INTO `likes` VALUES (13,16,14,'ignore'),(105,14,16,'like');
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(250) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `username` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `slug` varchar(1000) NOT NULL,
  `profession` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (13,'Jena Farrell Jena Farrell',83,'','$2y$10$MPW0tp/Pt0hC8H3szgu7Sez4/EawlB5.tOU9RNBEZ9a37CB1Hg/M.','cagulogise','xogomu@mailinator.com','1636212422.png','Jena-Farrell-Jena-Farrell',''),(14,'Gwendolyn Hopper Gwendolyn Hopper',53,'female','$2y$10$KAuyvWYa7iSklyp9baDb8ed9h6o5oFS.ypdKJnFsdKhInMjcGnFNW','shuvo','zetufaw@mailinator.com','1636212791.png','Gwendolyn-Hopper-Gwendolyn-Hopper',''),(15,'Brennan Welch Brennan Welch',63,'female','$2y$10$aDnpOF41f8/oBCRj3YqaAOIP8OpnKiHNlNBiguKpcG0COgrxYXoiK','rijuxy','lytahodazo@mailinator.com','1636212809.png','Brennan-Welch-Brennan-Welch',''),(16,'Sandra Clements Sandra Clements',79,'male','$2y$10$upX3Tb/dX6Ze16dItxKlX.Lu7wVS8Uf0ZhC5Do5dJxyaGD83GUTUe','dajuwy','xepix@mailinator.com','1636212821.png','Sandra-Clements-Sandra-Clements',''),(17,'cghjfgjhgcfjgh cghjfgjhgcfjgh',0,'','$2y$10$tjYvBHFTfNR/b6VdpAjhQeB67yvb1e1Shrf8r/OiTyfiqC0s9Apsa','shuvo','','1636214709.png','cghjfgjhgcfjgh-cghjfgjhgcfjgh','');
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

-- Dump completed on 2021-11-07  0:17:40
