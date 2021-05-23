
--
-- Table structure for table `balance`
--
DROP TABLE IF EXISTS `balance`;
CREATE TABLE `balance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `user_id_UNIQUE` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `balance`
--
LOCK TABLES `balance` WRITE;
INSERT INTO `balance` VALUES (7,1,8000123,'2021-02-01 08:24:28','2021-02-01 08:24:28');
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--
LOCK TABLES `migrations` WRITE;
INSERT INTO `migrations` VALUES (1,'2021_05_20_000000_create_users_table',1),(2,'2021_05_20_100000_create_password_resets_table',1);
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--
LOCK TABLES `password_resets` WRITE;
UNLOCK TABLES;

--
-- Table structure for table `topup`
--
DROP TABLE IF EXISTS `topup`;
CREATE TABLE `topup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topup`
--
LOCK TABLES `topup` WRITE;
INSERT INTO `topup` VALUES (15,12000000,'2021-02-01 08:24:28','2021-02-01 08:24:28',1),(16,123,'2021-02-01 08:24:38','2021-02-01 08:24:38',1),(17,1000000,'2021-02-01 08:38:00','2019-02-01 08:38:00',1),(18,1000000,'2021-02-01 08:39:12','2021-02-01 08:39:12',1);
UNLOCK TABLES;

--
-- Table structure for table `transfer`
--
DROP TABLE IF EXISTS `transfer`;
CREATE TABLE `transfer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `receiver` varchar(45) NOT NULL,
  `rekening` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transfer`
--
LOCK TABLES `transfer` WRITE;
INSERT INTO `transfer` VALUES (1,1,'Steve Jobs',123456,5000000,'2021-02-01 08:55:27','2021-02-01 08:55:27');
UNLOCK TABLES;

--
-- Table structure for table `users`
--
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--
LOCK TABLES `users` WRITE;
INSERT INTO `users` VALUES (1,'teste','teste@teste.com',NULL,'$2y$10$q1xe1eOSCx2HDWcSj8LtlOekUZjMadlSar2UyjUqLWWv8dravlraa','WEXJM9TcXvTimR5cz8ktyvV7Y0LGy1rRb7GrO63jHpHiMbD5rmf79DXd2u1F','2021-01-31 21:12:00','2021-01-31 21:12:00');
UNLOCK TABLES;

--
-- Table structure for table `withdraw`
--
DROP TABLE IF EXISTS `withdraw`;
CREATE TABLE `withdraw` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `withdraw`
--
LOCK TABLES `withdraw` WRITE;

INSERT INTO `withdraw` VALUES (1,12000000,1,'2021-02-01 08:37:31','2021-02-01 08:37:31'),(2,13000000,1,'2021-02-01 08:38:31','2021-02-01 08:38:31'),(3,1000000,1,'2021-02-01 08:39:22','2021-02-01 08:39:22');
UNLOCK TABLES;

