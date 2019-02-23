-- MySQL dump 10.13  Distrib 5.6.23, for Win64 (x86_64)
--
-- Host: localhost    Database: cms
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.21-MariaDB

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
-- Table structure for table `enquiries`
--

DROP TABLE IF EXISTS `enquiries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enquiries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `comment` text NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enquiries`
--

LOCK TABLES `enquiries` WRITE;
/*!40000 ALTER TABLE `enquiries` DISABLE KEYS */;
INSERT INTO `enquiries` VALUES (1,'Gaurav','Dhiman','gauravd08@gmail.com','9855122888','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',NULL,'2019-01-07 00:52:31','2019-01-07 00:52:31'),(2,'Sunil','Kumar','sunil@gmail.com','9814123423','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',NULL,'2019-01-07 00:52:55','2019-01-07 00:52:55');
/*!40000 ALTER TABLE `enquiries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faq_categories`
--

DROP TABLE IF EXISTS `faq_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faq_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faq_categories`
--

LOCK TABLES `faq_categories` WRITE;
/*!40000 ALTER TABLE `faq_categories` DISABLE KEYS */;
INSERT INTO `faq_categories` VALUES (12,'Privacy policy','2018-12-26 23:08:08','2018-12-26 23:08:08'),(14,'our mission','2018-12-26 23:10:09','2018-12-26 23:10:09'),(15,'new category','2018-12-26 23:11:54','2018-12-26 23:11:54');
/*!40000 ALTER TABLE `faq_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faqs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `faq_category_id` int(11) NOT NULL,
  `question` varchar(2000) NOT NULL,
  `answer` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faqs`
--

LOCK TABLES `faqs` WRITE;
/*!40000 ALTER TABLE `faqs` DISABLE KEYS */;
INSERT INTO `faqs` VALUES (5,12,'About us','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed eiusmod tempor incididunt labore dolore magna aliqua enim minim veniam quis nostrud.','2018-12-26 23:08:39','2018-12-26 23:08:39'),(7,14,'we are heroes','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed eiusmod tempor incididunt labore dolore magna aliqua enim minim veniam quis nostrud.','2018-12-26 23:10:29','2018-12-26 23:10:29');
/*!40000 ALTER TABLE `faqs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `graphics`
--

DROP TABLE IF EXISTS `graphics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `graphics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `caption` varchar(200) DEFAULT NULL,
  `link` varchar(2000) DEFAULT NULL,
  `link_text` varchar(100) DEFAULT NULL,
  `display_order` int(11) DEFAULT NULL,
  `is_active` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `graphics`
--

LOCK TABLES `graphics` WRITE;
/*!40000 ALTER TABLE `graphics` DISABLE KEYS */;
INSERT INTO `graphics` VALUES (1,1,'We Combine Business with Finance','1.jpg','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.','','cilck here',NULL,1,'2019-01-05 01:18:24','2019-01-05 01:18:24'),(2,1,'Make Combine Business with Paris','2.jpg','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.','','For more',NULL,1,'2019-01-05 01:21:14','2019-01-05 01:21:14');
/*!40000 ALTER TABLE `graphics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (6,'2018_12_17_111915_create_pages_table',2),(8,'2018_12_17_121821_create_page_sections_table',3),(10,'2018_12_26_062305_create_faq_categories_table',4),(12,'2018_12_26_094511_add_faq_category_id_to_faqs',5),(14,'2018_12_28_093652_add_image_to_testimonials_table',6),(16,'2018_12_29_111824_add_is_active_to_testimonials',7),(17,'2019_01_04_115540_add_designation_to_teams_table',8),(18,'2019_01_05_063817_add_link_text_to_graphics',9),(19,'2014_10_12_000000_create_users_table',10),(20,'2014_10_12_100000_create_password_resets_table',10),(21,'2018_12_17_055419_entrust_setup_tables',10);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modules`
--

DROP TABLE IF EXISTS `modules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modules`
--

LOCK TABLES `modules` WRITE;
/*!40000 ALTER TABLE `modules` DISABLE KEYS */;
INSERT INTO `modules` VALUES (1,'Home Menus','<li class=\"nav-item\"><a class=\"nav-link\" href=\"/\">Home</a></li>\r\n                            <li class=\"nav-item\"><a class=\"nav-link\" href=\"/company/\">Company</a></li> \r\n                            <li class=\"nav-item\"><a class=\"nav-link\" href=\"/about/\">About</a></li> \r\n                            <li class=\"nav-item\"><a class=\"nav-link\" href=\"/testimonial\">Testimonial</a></li>\r\n                            <li class=\"nav-item\"><a class=\"nav-link\" href=\"/contact\">Contact</a></li>\r\n                            <li class=\"nav-item\"><a class=\"nav-link\" href=\"/faq\">FAQ</a></li>','2019-01-25 01:23:54'),(2,'Footer About','<div class=\"single-footer-widget\">\r\n                                <h6 class=\"footer_title\">About Biznance</h6>\r\n                                <p>The world has become so fast paced that people don’t want to stand by reading a page of information, they would much rather look at a presentation and understand the message. It has come to a point where images and videos are</p>\r\n                            </div>','2019-01-25 00:22:10'),(3,'Footer Navigation','<div class=\"single-footer-widget\">\r\n                                <h6 class=\"footer_title\">Navigation Links</h6>\r\n                                <div class=\"row\">\r\n                                    <div class=\"col-4\">\r\n                                        <ul class=\"list\">\r\n                                            <li><a href=\"/\">Home</a></li>\r\n                                            <li><a href=\"/company\">Company</a></li>\r\n                                            <li><a href=\"/about\">About</a></li>\r\n                                            <li><a href=\"/testimonial\">Testimonial</a></li>\r\n                                        </ul>\r\n                                    </div>\r\n                                    <div class=\"col-4\">\r\n                                        <ul class=\"list\">\r\n                                            <li><a href=\"/contact\">Contact</a></li>\r\n                                            <li><a href=\"/faq\">FAQ</a></li>\r\n                                            <li style=\"width: 90px;\"><a href=\"/privacy\">Privacy Policy</a></li>\r\n                                        </ul>\r\n                                    </div>										\r\n                                </div>							\r\n                            </div>','2019-01-25 00:23:19'),(4,'Footer Newsletter','<h6 class=\"footer_title\">Newsletter</h6>\r\n                           <p>For business professionals caught between high OEM price and mediocre print and graphic output, </p>','2019-01-25 00:23:29');
/*!40000 ALTER TABLE `modules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page_images`
--

DROP TABLE IF EXISTS `page_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(2000) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `page_images_fk0` (`page_id`),
  CONSTRAINT `page_images_fk0` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page_images`
--

LOCK TABLES `page_images` WRITE;
/*!40000 ALTER TABLE `page_images` DISABLE KEYS */;
INSERT INTO `page_images` VALUES (1,2,'1.jpg',NULL,'2018-12-21 06:30:00'),(2,1,'2.jpg',NULL,'2018-12-21 06:30:00'),(3,1,'3.jpg',NULL,'2018-12-21 06:30:00'),(4,1,'4.jpg',NULL,'2018-12-21 06:30:00'),(5,3,'5.png',NULL,'2018-12-21 06:30:00');
/*!40000 ALTER TABLE `page_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page_sections`
--

DROP TABLE IF EXISTS `page_sections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page_sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  `section_name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `page_sections_fk0` (`page_id`),
  CONSTRAINT `page_sections_fk0` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page_sections`
--

LOCK TABLES `page_sections` WRITE;
/*!40000 ALTER TABLE `page_sections` DISABLE KEYS */;
INSERT INTO `page_sections` VALUES (1,2,'section-1','<div class=\"mission_text\">\r\n                                <h4>Road to Success</h4>\r\n                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed eiusmod tempor incididunt labore dolore magna aliqua enim minim veniam quis nostrud.</p>\r\n                             </div>','2018-12-23 17:00:31'),(2,2,'section-2','<div class=\"mission_text\">\r\n								<h4>About Our Mission</h4>\r\n								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed eiusmod tempor incididunt labore dolore magna aliqua enim minim veniam quis nostrud.</p>\r\n							</div>','2018-12-23 17:00:41'),(3,1,'section-1','\r\n                            <div class=\"mission_text\">\r\n                                <h4>Road to Success</h4>\r\n                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed eiusmod tempor incididunt labore dolore magna aliqua enim minim veniam quis nostrud.</p>\r\n                             </div>\r\n                            ','2018-12-21 01:00:00'),(4,1,'section-2','\r\n                            <div class=\"mission_text\">\r\n								<h4>About Our Mission</h4>\r\n								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed eiusmod tempor incididunt labore dolore magna aliqua enim minim veniam quis nostrud.</p>\r\n							</div>\r\n                            ','2018-12-21 01:00:00'),(5,1,'section-3','\r\n                            <div class=\"mission_text\">\r\n                                <h4>Road to Success</h4>\r\n                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed eiusmod tempor incididunt labore dolore magna aliqua enim minim veniam quis nostrud.</p>\r\n                            </div>\r\n                            ','2018-12-21 01:00:00'),(6,1,'section-4','\r\n                            <div class=\"mission_text\">\r\n                                <h4>Road to Success</h4>\r\n                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed eiusmod tempor incididunt labore dolore magna aliqua enim minim veniam quis nostrud.</p>\r\n                            </div>\r\n                            ','2018-12-21 01:00:00'),(7,3,'section-1','\r\n                            <h4 class=\"company-content-1\">We create brand new corportate identities</h4>\r\n                            <p class=\"company-content-2\">We Build Technologies that touches lives. True faith of triumph comes, working with an associate you trust, to provide the insight, support and proficiency that will boost your business ahead..</p>\r\n                            ','2018-12-21 06:30:00'),(8,3,'section-2','\r\n                            <p class=\"company-content-3\">Voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>\r\n                            ','2018-12-21 06:30:00'),(9,4,'section-1','<h3 class=\"wthree w3-agileits agileits-w3layouts agile w3-agile\">Privacy Policy</h3>\r\n                            <div class=\"banner-bottom-grid1 privacy1-grid\">\r\n                                <ul>\r\n                                    <li>Profile <span>Excepteur sint occaecat cupidatat non proident, sunt in\r\n                                            culpa qui officia deserunt mollit anim id est laborum.</span></li>\r\n                                </ul>\r\n                                <ul>\r\n                                    <li>Search <span>Excepteur sint occaecat cupidatat non proident, sunt in\r\n                                            culpa qui officia deserunt mollit anim id est laborum.</span></li>\r\n                                </ul>\r\n                                <ul>\r\n                                    <li>News Feed <span>Excepteur sint occaecat cupidatat non proident, sunt in\r\n                                            culpa qui officia deserunt mollit anim id est laborum.</span></li>\r\n                                </ul>\r\n                                <ul>\r\n                                    <li>Applications <span>Excepteur sint occaecat cupidatat non proident, sunt in\r\n                                            culpa qui officia deserunt mollit anim id est laborum.</span></li>\r\n                                </ul>\r\n                            </div>','2019-01-22 06:41:09'),(10,4,'section-2','<h3 class=\"terms-conditions-head\">Terms &amp; Conditions</h3>\r\n                                <div class=\"banner-bottom-grid1 privacy2-grid\">\r\n                                    <div class=\"privacy2-grid1\">\r\n                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>\r\n                                        <div class=\"privacy2-grid1-sub\">\r\n                                            <h5>1. sint occaecat cupidatat non proident, sunt</h5>\r\n                                            <p>Excepteur sint occaecat cupidatat non proident, sunt in\r\n                                                    culpa qui officia deserunt mollit anim id est laborum.</p>\r\n                                        </div>\r\n                                        <div class=\"privacy2-grid1-sub\">\r\n                                            <h5>2. perspiciatis unde omnis iste natus error</h5>\r\n                                            <p>Excepteur sint occaecat cupidatat non proident, sunt in\r\n                                                    culpa qui officia deserunt mollit anim id est laborum.</p>\r\n                                        </div>\r\n                                        <div class=\"privacy2-grid1-sub\">\r\n                                            <h5>3. natus error sit voluptatem accusant</h5>\r\n                                            <p>Excepteur sint occaecat cupidatat non proident, sunt in\r\n                                                    culpa qui officia deserunt mollit anim id est laborum.</p>\r\n                                        </div>\r\n                                        <div class=\"privacy2-grid1-sub\">\r\n                                            <h5>4. occaecat cupidatat non proident, sunt in</h5>\r\n                                            <p>Excepteur sint occaecat cupidatat non proident, sunt in\r\n                                                    culpa qui officia deserunt mollit anim id est laborum.</p>\r\n                                        </div>\r\n                                        <div class=\"privacy2-grid1-sub\">\r\n                                            <h5>5. deserunt mollit anim id est laborum</h5>\r\n                                            <p>Excepteur sint occaecat cupidatat non proident, sunt in\r\n                                                    culpa qui officia deserunt mollit anim id est laborum.</p>\r\n                                        </div>\r\n                                    </div>\r\n                                </div>','2019-01-22 06:41:17');
/*!40000 ALTER TABLE `page_sections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(2000) DEFAULT NULL,
  `meta_description` text,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES (1,'Home','home','default meta title','default meta keyword','default meta description','2019-01-04 04:25:52'),(2,'About','about','about meta title','about meta keyword','about meta description','2019-01-25 00:19:04'),(3,'Company','company',NULL,NULL,NULL,'2018-08-18 06:30:00'),(4,'Privacy','privacy',NULL,NULL,NULL,'2018-08-18 06:30:00');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portfolios`
--

DROP TABLE IF EXISTS `portfolios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `portfolios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `link` varchar(2000) DEFAULT NULL,
  `short_description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portfolios`
--

LOCK TABLES `portfolios` WRITE;
/*!40000 ALTER TABLE `portfolios` DISABLE KEYS */;
INSERT INTO `portfolios` VALUES (2,'Trinetra','2.jpg','http:www/google.com','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.','2019-01-05 02:15:05','2019-01-05 05:17:10'),(3,'CMS','3.jpg','http:www/google.com','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.','2019-01-05 02:16:18','2019-01-05 05:17:18'),(5,'ecommerce','5.jpg','http:www/google.com','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.','2019-01-05 02:31:13','2019-01-05 05:17:25'),(6,'ecommerce 2','6.jpg','http:www/google.com','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.','2019-01-05 02:35:42','2019-01-05 05:17:32'),(7,'Trinetra 2','7.jpg','http:www/google.com','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.','2019-01-05 02:36:46','2019-01-05 05:17:39'),(8,'Magento','8.jpg','http:www/google.com','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.','2019-01-05 02:37:47','2019-01-05 05:17:45');
/*!40000 ALTER TABLE `portfolios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` VALUES (1,1);
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','Project Admin','User is the owner of a given project','2019-01-08 01:30:01','2019-01-08 01:30:01'),(2,'member','Frontend User','User is allowed to purchase items from frontend','2019-01-08 01:30:34','2019-01-08 01:30:34');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_email` varchar(100) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `default_meta_title` varchar(2000) DEFAULT NULL,
  `default_meta_keyword` text,
  `default_meta_description` text,
  `facebook_link` varchar(255) DEFAULT NULL,
  `twitter_link` varchar(255) DEFAULT NULL,
  `google_link` varchar(255) DEFAULT NULL,
  `pinterest_link` varchar(255) DEFAULT NULL,
  `youtube_link` varchar(255) DEFAULT NULL,
  `instagram_link` varchar(255) DEFAULT NULL,
  `copy_write` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'techformation.gaurav@gmail.com','techformation.gaurav@gmail.com','9855122888','default title','default meta keywords','default meta description','https://www.facebook.com/','https://www.twitter.com/','https://www.google.com/','https://www.pinterest.com/','https://www.youtube.com/','https://www.instagram.com/','Copyright ©2019 All rights reserved','2019-01-07 23:32:05');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscriptions`
--

DROP TABLE IF EXISTS `subscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscriptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `is_opted_out` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscriptions`
--

LOCK TABLES `subscriptions` WRITE;
/*!40000 ALTER TABLE `subscriptions` DISABLE KEYS */;
INSERT INTO `subscriptions` VALUES (1,'techformation.gaurav@gmail.com',NULL,'2019-01-24 05:35:40'),(2,'techformation.gaurav@gmail.com1',NULL,'2019-01-24 06:27:44'),(3,'gauravd08@gmail.com',NULL,'2019-01-25 00:15:51'),(4,'sdg@gmail.com',NULL,'2019-01-25 02:18:12'),(5,'plant@admin.com',NULL,'2019-01-25 02:18:21'),(6,'ssssss@c.com',NULL,'2019-02-17 11:26:16'),(7,'de@gmail.com',NULL,'2019-02-17 11:26:23');
/*!40000 ALTER TABLE `subscriptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `display_name` varchar(255) NOT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `about` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `display_order` int(11) DEFAULT NULL,
  `is_active` int(1) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teams`
--

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
INSERT INTO `teams` VALUES (4,'AKon','Web Developer','Hi, I am web developer at Xyz.','4.jpg',NULL,1,'2019-01-04 22:26:57','2019-01-04 22:26:58'),(5,'eva','Designer','hi, am designer at xyz.','5.jpg',NULL,1,'2019-01-04 22:27:28','2019-01-04 22:27:28'),(6,'erc','analyst','Hi, am QA at xyz.','6.jpg',NULL,1,'2019-01-04 22:28:17','2019-01-04 22:28:17'),(7,'peter','Lead','Hi, am Lead at XYZ.','7.jpg',NULL,1,'2019-01-04 22:29:12','2019-01-04 22:29:12');
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `client_name` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `designation` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `is_active` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonials`
--

LOCK TABLES `testimonials` WRITE;
/*!40000 ALTER TABLE `testimonials` DISABLE KEYS */;
INSERT INTO `testimonials` VALUES (16,'client1','16.jpg','designation1','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore',1,'2018-12-29 06:39:54','2019-01-03 04:47:05'),(17,'client2','17.jpg','designation2','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore',1,'2018-12-29 06:40:05','2018-12-29 07:06:24'),(18,'client3','18.jpg','designation3','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',1,'2018-12-29 06:40:18','2019-01-04 01:14:55'),(19,'client5','19.jpg','designation4','Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',1,'2018-12-29 06:40:32','2019-01-04 01:15:29');
/*!40000 ALTER TABLE `testimonials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin@gmail.com','$2y$10$tKF1PDPaWsp/3o8QvESOKuhdCqLpNkHJvlgA7ZWXPPaKNAwRIP6Ny',NULL,'2019-01-08 01:31:52','2019-01-08 01:31:52');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'cms'
--

--
-- Dumping routines for database 'cms'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-02-23 20:35:00
