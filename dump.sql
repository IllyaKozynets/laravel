-- --------------------------------------------------------
-- Сервер:                       127.0.0.1
-- Версія сервера:               10.1.13-MariaDB - mariadb.org binary distribution
-- ОС сервера:                   Win32
-- HeidiSQL Версія:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for football
CREATE DATABASE IF NOT EXISTS `football` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `football`;

-- Dumping structure for таблиця football.matches
CREATE TABLE IF NOT EXISTS `matches` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `team_one_id` int(10) unsigned NOT NULL,
  `team_two_id` int(10) unsigned NOT NULL,
  `result` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_notified` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `matches_team_one_id_foreign` (`team_one_id`),
  KEY `matches_team_two_id_foreign` (`team_two_id`),
  CONSTRAINT `matches_team_one_id_foreign` FOREIGN KEY (`team_one_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE,
  CONSTRAINT `matches_team_two_id_foreign` FOREIGN KEY (`team_two_id`) REFERENCES `teams` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table football.matches: ~0 rows (приблизно)
/*!40000 ALTER TABLE `matches` DISABLE KEYS */;
INSERT INTO `matches` (`id`, `team_one_id`, `team_two_id`, `result`, `date`, `created_at`, `updated_at`, `is_notified`) VALUES
	(1, 2, 4, 'null', '2017-06-28 19:00:00', '2017-06-27 20:27:08', '2017-06-27 21:36:25', 0),
	(2, 2, 4, '2:2', '2017-05-30 17:00:00', '2017-06-27 23:07:32', '2017-06-27 23:07:32', 0),
	(3, 4, 6, 'null', '2017-06-30 21:00:00', '2017-06-27 23:07:45', '2017-06-27 23:07:45', 0),
	(4, 7, 3, '3:0', '2017-05-28 10:00:00', '2017-06-27 23:08:03', '2017-06-27 23:08:03', 0);
/*!40000 ALTER TABLE `matches` ENABLE KEYS */;

-- Dumping structure for таблиця football.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table football.migrations: ~5 rows (приблизно)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2013_06_23_132136_teams', 1),
	(2, '2014_10_12_000000_create_users_table', 1),
	(3, '2014_10_12_100000_create_password_resets_table', 1),
	(4, '2017_06_23_132653_matches', 1),
	(5, '2017_06_27_171702_add_notify_field', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for таблиця football.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table football.password_resets: ~0 rows (приблизно)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for таблиця football.teams
CREATE TABLE IF NOT EXISTS `teams` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `points` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table football.teams: ~0 rows (приблизно)
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
INSERT INTO `teams` (`id`, `name`, `points`, `created_at`, `updated_at`) VALUES
	(2, 'Сталь', 21, '2017-06-27 20:25:40', '2017-06-27 20:25:40'),
	(3, 'Азот', 6, '2017-06-27 20:25:56', '2017-06-27 20:25:56'),
	(4, 'Шахтер', 13, '2017-06-27 20:26:08', '2017-06-27 20:26:08'),
	(5, 'Заря', 5, '2017-06-27 23:06:23', '2017-06-27 23:06:23'),
	(6, 'Днепр', 15, '2017-06-27 23:06:36', '2017-06-27 23:06:36'),
	(7, 'Динамо Киев', 17, '2017-06-27 23:06:52', '2017-06-27 23:06:52');
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;

-- Dumping structure for таблиця football.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `subscription_id` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table football.users: ~1 rows (приблизно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_admin`, `subscription_id`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'illya', 'illyakozynets@gmail.com', '$2y$10$V8wl8ZVRBGHGKW1ig3Cdae3FmfBA9alh8.j5aanXbhSiBAZw1X/h6', '1', 2, '1HFtWWyazATMQy6irf0CLAtzXz1oXvQ5XqTnuWUdO7FA9qAhjBtJi0cROv9W', '2017-06-27 20:24:51', '2017-06-27 20:32:40'),
	(2, 'illya', 'adam_iake@mail.ru', '$2y$10$ZG30OYvD4JvZQJQRODSg1.knCf.jxnZ6aIRwN6HzhFfM07xAF7MCW', '0', 3, 'T3GINbsPQL8ZJRbG2TEtWWTGeJfHgw1oCEcmpP4fNNmEeYd88eIG16jZg4V6', '2017-06-27 20:57:08', '2017-06-27 21:35:37');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
