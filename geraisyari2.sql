-- MySQL dump 10.13  Distrib 8.0.20, for Linux (x86_64)
--
-- Host: localhost    Database: geraisyari
-- ------------------------------------------------------
-- Server version	8.0.20-0ubuntu0.20.04.1

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
-- Table structure for table `available_colors`
--

DROP TABLE IF EXISTS `available_colors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `available_colors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `real_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `available_colors`
--

LOCK TABLES `available_colors` WRITE;
/*!40000 ALTER TABLE `available_colors` DISABLE KEYS */;
INSERT INTO `available_colors` VALUES (1,'Merah','red',NULL,NULL),(2,'Marun','maroon',NULL,NULL),(3,'Pink','fuchsia',NULL,NULL),(4,'Ungu','purple',NULL,NULL),(5,'Biru','blue',NULL,NULL),(6,'Biru Muda','lightblue',NULL,NULL),(7,'Biru Donker','navy',NULL,NULL),(8,'Cokelat','brown',NULL,NULL),(9,'Krem','orange disabled',NULL,NULL),(10,'Kuning','yellow',NULL,NULL),(11,'Hijau','green',NULL,NULL),(12,'Hijau Tua','olive',NULL,NULL),(13,'Hitam','black',NULL,NULL),(14,'Putih','black',NULL,NULL);
/*!40000 ALTER TABLE `available_colors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `available_materials`
--

DROP TABLE IF EXISTS `available_materials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `available_materials` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `model_id` int NOT NULL,
  `material_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `available_materials`
--

LOCK TABLES `available_materials` WRITE;
/*!40000 ALTER TABLE `available_materials` DISABLE KEYS */;
/*!40000 ALTER TABLE `available_materials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colors`
--

DROP TABLE IF EXISTS `colors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `colors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colors`
--

LOCK TABLES `colors` WRITE;
/*!40000 ALTER TABLE `colors` DISABLE KEYS */;
/*!40000 ALTER TABLE `colors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deliveries`
--

DROP TABLE IF EXISTS `deliveries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `deliveries` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kind` enum('in','out') COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_start` date NOT NULL,
  `date_finish` date DEFAULT NULL,
  `status` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deliveries`
--

LOCK TABLES `deliveries` WRITE;
/*!40000 ALTER TABLE `deliveries` DISABLE KEYS */;
/*!40000 ALTER TABLE `deliveries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventory_out`
--

DROP TABLE IF EXISTS `inventory_out`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inventory_out` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `production_id` bigint NOT NULL,
  `material_color_id` bigint NOT NULL,
  `stock_out` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventory_out`
--

LOCK TABLES `inventory_out` WRITE;
/*!40000 ALTER TABLE `inventory_out` DISABLE KEYS */;
/*!40000 ALTER TABLE `inventory_out` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `production_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `worker_id` int NOT NULL,
  `manual_worker_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manual_worker_jobdesk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fee` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `material_colors`
--

DROP TABLE IF EXISTS `material_colors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `material_colors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material_colors`
--

LOCK TABLES `material_colors` WRITE;
/*!40000 ALTER TABLE `material_colors` DISABLE KEYS */;
INSERT INTO `material_colors` VALUES (1,1,'Merah',97,NULL,'2020-07-09 03:16:14'),(2,1,'Biru',45,NULL,'2020-07-12 23:47:55'),(3,1,'Hitam',-14,NULL,'2020-07-12 19:24:54'),(4,1,'Hijau',123,NULL,NULL),(5,1,'Krem',93,NULL,NULL),(6,1,'Ungu',51,NULL,NULL),(7,2,'Biru',38,NULL,NULL),(8,2,'Merah',12,NULL,NULL),(9,2,'Hitam',72,NULL,NULL),(10,2,'Hijau',18,NULL,NULL),(11,2,'Krem',94,NULL,NULL),(12,2,'Ungu',61,NULL,NULL);
/*!40000 ALTER TABLE `material_colors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materials`
--

DROP TABLE IF EXISTS `materials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `materials` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materials`
--

LOCK TABLES `materials` WRITE;
/*!40000 ALTER TABLE `materials` DISABLE KEYS */;
INSERT INTO `materials` VALUES (1,'kain arab motif','10000',NULL,NULL),(2,'shifron arab motif','12000',NULL,NULL),(3,'frula','15000',NULL,NULL),(4,'madam queen','18000',NULL,NULL);
/*!40000 ALTER TABLE `materials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (22,'2014_10_12_000000_create_users_table',1),(23,'2014_10_12_100000_create_password_resets_table',1),(24,'2019_08_19_000000_create_failed_jobs_table',1),(25,'2020_07_03_145133_create_productions_table',1),(26,'2020_07_03_145314_create_materials_table',1),(27,'2020_07_03_185103_create_orders_table',1),(28,'2020_07_03_185141_create_order_details_table',1),(29,'2020_07_03_185206_create_sizings_table',1),(30,'2020_07_03_185303_create_resellers_table',1),(31,'2020_07_03_191519_create_available_colors_table',1),(32,'2020_07_03_193547_create_models_table',1),(33,'2020_07_03_193604_create_available_materials_table',1),(34,'2020_07_03_194339_create_tailors_table',1),(35,'2020_07_03_194412_create_deliveries_table',1),(36,'2020_07_03_211223_create_colors_table',1),(37,'2020_07_03_211844_create_material_colors_table',1),(39,'2020_07_04_153821_create_store_inventory_table',2),(40,'2020_07_05_015749_add_description_to_orders_and_remove_from_details',3),(41,'2020_07_05_025319_add_status_to_orders',4),(42,'2020_07_05_045210_add_order_date_to_orders_table',5),(43,'2020_07_06_071407_add_kind_to_orders',6),(44,'2020_07_07_221705_add_notes_to_productions',7),(45,'2020_07_08_001607_add_custom_sizings_to_store_inventory_and_order_details',8),(47,'2020_07_09_072614_create_inventory_out_table',9),(48,'2020_07_20_005931_create_jobs_table',10),(49,'2020_07_20_034409_update_orders_table',11),(50,'2020_07_20_035644_create_pricing_and_payments_table',12);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `models`
--

DROP TABLE IF EXISTS `models`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `models` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kind` enum('clothes','hijab','etc') COLLATE utf8mb4_unicode_ci NOT NULL,
  `kind_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `has_niqab` tinyint(1) NOT NULL DEFAULT '0',
  `base_price` int NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `models_code_unique` (`code`),
  UNIQUE KEY `models_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `models`
--

LOCK TABLES `models` WRITE;
/*!40000 ALTER TABLE `models` DISABLE KEYS */;
INSERT INTO `models` VALUES (1,'GAM001','GAM001.jpg','Gamis Pria','etc','Gamis',0,75000,'Gamis pria trendy. keren abis akh~!',NULL,NULL),(2,'FK001-DRS','FK001.jpg','FK series Fatimah','clothes',NULL,0,150000,'FK series Fatimah bahan shifon arab',NULL,NULL),(3,'FK001-HJB','FK001.jpg','FK series Fatimah Hijab','hijab',NULL,0,50000,'FK series Fatimah bahan shifon arab',NULL,NULL),(4,'FK002-DRS','FK002.jpg','FK series Amir','clothes',NULL,0,175000,'FK  Amir',NULL,NULL),(5,'FK002-HJB','FK002.jpg','FK series Amir Hijab','hijab',NULL,1,50000,'FK series Amir bahan shifon arab',NULL,NULL);
/*!40000 ALTER TABLE `models` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_details`
--

DROP TABLE IF EXISTS `order_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_details` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int NOT NULL,
  `model_id` int NOT NULL,
  `material_id` int NOT NULL,
  `color` int NOT NULL,
  `niqab` tinyint(1) NOT NULL DEFAULT '0',
  `pet` tinyint(1) NOT NULL DEFAULT '0',
  `size` enum('S','M','L','XL','XXL','XXXL','custom') COLLATE utf8mb4_unicode_ci NOT NULL,
  `has_custom_sizing` tinyint(1) NOT NULL DEFAULT '0',
  `quantity` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_details`
--

LOCK TABLES `order_details` WRITE;
/*!40000 ALTER TABLE `order_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic` int NOT NULL,
  `kind` enum('new','resew') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `order_date` date NOT NULL DEFAULT '2020-07-05',
  `order_finished` date DEFAULT NULL,
  `reseller` tinyint(1) NOT NULL DEFAULT '0',
  `reseller_id` int DEFAULT NULL,
  `client_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `production_status` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `orders_code_unique` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (0,'O0000',0,'new','2020-07-05',NULL,0,NULL,'Stok Toko',NULL,'','0',NULL,NULL);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pricing_and_payments`
--

DROP TABLE IF EXISTS `pricing_and_payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pricing_and_payments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `base_price` bigint NOT NULL DEFAULT '0',
  `discount` bigint NOT NULL DEFAULT '0',
  `tax` bigint NOT NULL DEFAULT '0',
  `delivery_fee` bigint NOT NULL DEFAULT '0',
  `payment_status` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `down_payment` bigint NOT NULL DEFAULT '0',
  `paid` bigint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pricing_and_payments`
--

LOCK TABLES `pricing_and_payments` WRITE;
/*!40000 ALTER TABLE `pricing_and_payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `pricing_and_payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productions`
--

DROP TABLE IF EXISTS `productions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic` int NOT NULL,
  `handler` int DEFAULT NULL,
  `kind` enum('new','resew') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `status` enum('0','1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_in` date DEFAULT NULL,
  `date_out` date DEFAULT NULL,
  `tailor` int DEFAULT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci,
  `delivery_in_id` int DEFAULT NULL,
  `delivery_out_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `productions_code_unique` (`code`),
  UNIQUE KEY `productions_delivery_in_id_unique` (`delivery_in_id`),
  UNIQUE KEY `productions_delivery_out_id_unique` (`delivery_out_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productions`
--

LOCK TABLES `productions` WRITE;
/*!40000 ALTER TABLE `productions` DISABLE KEYS */;
/*!40000 ALTER TABLE `productions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resellers`
--

DROP TABLE IF EXISTS `resellers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `resellers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `resellers_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resellers`
--

LOCK TABLES `resellers` WRITE;
/*!40000 ALTER TABLE `resellers` DISABLE KEYS */;
INSERT INTO `resellers` VALUES (1,'Agen Beras Plastik','agenberasterplastix@gmail.com',8318,'jl. kenangan',NULL,NULL,NULL),(2,'Agen Minyak Terpercaya','agenminyakterpercaya@gmail.com',12323,'jl. batuk pilek',NULL,NULL,NULL);
/*!40000 ALTER TABLE `resellers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sizings`
--

DROP TABLE IF EXISTS `sizings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sizings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int NOT NULL,
  `dress_length` int DEFAULT NULL,
  `hijab_length` int DEFAULT NULL,
  `face_width` int DEFAULT NULL,
  `neck_width` int DEFAULT NULL,
  `waist_width` int DEFAULT NULL,
  `breast_width` int DEFAULT NULL,
  `hip_width` int DEFAULT NULL,
  `brisket_width` int DEFAULT NULL,
  `brisket_length` int DEFAULT NULL,
  `shoulder_width` int DEFAULT NULL,
  `armpit_width` int DEFAULT NULL,
  `arm_width` int DEFAULT NULL,
  `arm_length` int DEFAULT NULL,
  `elbow_width` int DEFAULT NULL,
  `wrist_width` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sizings`
--

LOCK TABLES `sizings` WRITE;
/*!40000 ALTER TABLE `sizings` DISABLE KEYS */;
INSERT INTO `sizings` VALUES (1,2,180,60,30,20,80,60,80,80,12,23,26,20,50,123,10,NULL,NULL),(2,7,118,122,129,128,NULL,229,NULL,NULL,NULL,651,538,NULL,70,226,NULL,'2020-07-07 18:33:28','2020-07-07 18:33:28'),(3,12,14,70,29,53,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-07-07 19:10:39','2020-07-07 19:10:39'),(4,9,342,237,23,NULL,32,NULL,NULL,NULL,NULL,34,NULL,NULL,77,NULL,NULL,'2020-07-07 19:21:59','2020-07-07 19:21:59'),(5,10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,10,NULL,NULL,'2020-07-08 17:16:20','2020-07-08 17:16:20'),(6,12,1202,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-07-08 20:23:39','2020-07-08 20:23:39'),(7,14,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,20,NULL,NULL,NULL,NULL,NULL,'2020-07-12 19:48:27','2020-07-12 19:48:27'),(8,15,10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-07-12 23:24:12','2020-07-12 23:24:12');
/*!40000 ALTER TABLE `sizings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `store_inventory`
--

DROP TABLE IF EXISTS `store_inventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `store_inventory` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `production_id` int NOT NULL,
  `model_id` int NOT NULL,
  `material_id` int NOT NULL,
  `color` int NOT NULL,
  `niqab` tinyint(1) NOT NULL DEFAULT '0',
  `pet` tinyint(1) NOT NULL DEFAULT '0',
  `size` enum('S','M','L','XL','XXL','XXXL','custom') COLLATE utf8mb4_unicode_ci NOT NULL,
  `has_custom_sizing` tinyint(1) NOT NULL DEFAULT '0',
  `quantity` int NOT NULL DEFAULT '1',
  `notes` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `store_inventory`
--

LOCK TABLES `store_inventory` WRITE;
/*!40000 ALTER TABLE `store_inventory` DISABLE KEYS */;
/*!40000 ALTER TABLE `store_inventory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tailors`
--

DROP TABLE IF EXISTS `tailors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tailors` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tailors`
--

LOCK TABLES `tailors` WRITE;
/*!40000 ALTER TABLE `tailors` DISABLE KEYS */;
INSERT INTO `tailors` VALUES (1,'mang supra',838,NULL,NULL),(2,'bang supri',828,NULL,NULL),(3,'kang supro',821,NULL,NULL);
/*!40000 ALTER TABLE `tailors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('owner','production','admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Owner','owner@gmail.com',NULL,'$2y$10$ICVj2qHqt3UNPc065Ncje.TEEmR.uyiATkm2dGFVvRs9/UJ.QQVfK','owner',838,NULL,NULL,NULL),(2,'Admin Gudang 1','admingudang1@gmail.com',NULL,'$2y$10$Jif9fHj0b1hq9HqcyZty0O.1HAQl9ZzRPDJ3aXVWskdIdVEu/F.o2','admin',828,NULL,NULL,NULL),(3,'Admin Produksi 1','adminproduksi@gmail.com',NULL,'$2y$10$ZeeYslR4O.Br4B5yyDdIzeKtWzCfySNXUj6RWmI.t2oESTh8R7eFO','production',821,NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `workers`
--

DROP TABLE IF EXISTS `workers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `workers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jobdesk` enum('penjahit','pemotong','penggosok','QC') COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `workers`
--

LOCK TABLES `workers` WRITE;
/*!40000 ALTER TABLE `workers` DISABLE KEYS */;
/*!40000 ALTER TABLE `workers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-07-20 18:10:48
