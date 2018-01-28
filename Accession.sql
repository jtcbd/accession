-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.19 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table accession.accessions
CREATE TABLE IF NOT EXISTS `accessions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `accession_no_from` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accession_no_to` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_number_of_object` int(11) NOT NULL,
  `collection_date` timestamp NULL DEFAULT NULL,
  `file_no` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `made_of_collection` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `input_price` double(8,2) NOT NULL,
  `insurance_value` double(8,2) DEFAULT NULL,
  `description_of_object` text COLLATE utf8mb4_unicode_ci,
  `classification_of_object` int(10) unsigned NOT NULL,
  `measurement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provenance_and_acquisition_history` text COLLATE utf8mb4_unicode_ci,
  `period` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Personal_info` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `propsed_price` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_museum` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table accession.accessions: ~0 rows (approximately)
DELETE FROM `accessions`;
/*!40000 ALTER TABLE `accessions` DISABLE KEYS */;
INSERT INTO `accessions` (`id`, `accession_no_from`, `accession_no_to`, `total_number_of_object`, `collection_date`, `file_no`, `made_of_collection`, `input_price`, `insurance_value`, `description_of_object`, `classification_of_object`, `measurement`, `provenance_and_acquisition_history`, `period`, `Personal_info`, `propsed_price`, `branch_museum`, `status`, `created_at`, `updated_at`) VALUES
	(1, '635354636', '635354639', 4, '2018-01-01 00:00:00', '3456', 'purchase', 50000.00, 500.00, 'aoehfasnsdkfh sahfo sedfio asfpj  afo dfjsaof sf odsapfj  lkhljkl.', 2, '2345', 'dasfsadfdsfdsfsfds', '3', 'fasdfdsfds', '45000', 'Branch 1', 1, '2018-01-28 10:17:26', '2018-01-28 10:22:04');
/*!40000 ALTER TABLE `accessions` ENABLE KEYS */;

-- Dumping structure for table accession.approvals
CREATE TABLE IF NOT EXISTS `approvals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `accession_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table accession.approvals: ~0 rows (approximately)
DELETE FROM `approvals`;
/*!40000 ALTER TABLE `approvals` DISABLE KEYS */;
INSERT INTO `approvals` (`id`, `accession_id`, `role_id`, `status`, `notes`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 3, 'অনুমোদনের জন্য সুপারিশ করা হলো', '2018-01-28 10:18:37', '2018-01-28 10:18:37'),
	(2, 1, 2, 3, 'অনুমোদনের জন্য সুপারিশ করা হলো', '2018-01-28 10:20:23', '2018-01-28 10:20:23'),
	(3, 1, 3, 3, 'অনুমোদনের জন্য সুপারিশ করা হলো', '2018-01-28 10:21:30', '2018-01-28 10:21:30'),
	(4, 1, 4, 3, 'অনুমোদনের জন্য সুপারিশ করা হলো', '2018-01-28 10:22:04', '2018-01-28 10:22:04');
/*!40000 ALTER TABLE `approvals` ENABLE KEYS */;

-- Dumping structure for table accession.classifications
CREATE TABLE IF NOT EXISTS `classifications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_bn` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table accession.classifications: ~0 rows (approximately)
DELETE FROM `classifications`;
/*!40000 ALTER TABLE `classifications` DISABLE KEYS */;
INSERT INTO `classifications` (`id`, `title_en`, `title_bn`, `created_at`, `updated_at`) VALUES
	(1, 'Classification 1', 'শ্রেণীবিভাগ ১', '2018-01-28 16:14:56', '2018-01-28 16:14:56'),
	(2, 'Classification 2', 'শ্রেণীবিভাগ ২', '2018-01-28 16:14:56', '2018-01-28 16:14:56'),
	(3, 'Classification 3', 'শ্রেণীবিভাগ ৩', '2018-01-28 16:14:56', '2018-01-28 16:14:56');
/*!40000 ALTER TABLE `classifications` ENABLE KEYS */;

-- Dumping structure for table accession.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table accession.migrations: ~6 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2017_09_17_051503_create_roles_table', 1),
	(4, '2017_09_17_061923_create_accessions_table', 1),
	(5, '2017_09_21_051909_create_classifications_table', 1),
	(6, '2017_09_24_122035_create_approvals_table', 1),
	(7, '2018_01_28_100545_create_sessions_table', 2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table accession.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table accession.password_resets: ~0 rows (approximately)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table accession.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table accession.roles: ~0 rows (approximately)
DELETE FROM `roles`;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `text`, `created_at`, `updated_at`) VALUES
	(1, 'Registration Officer', 'রেজিস্ট্রেশন অফিসার', '2017-12-27 07:29:25', '2017-12-27 07:29:25'),
	(2, 'Dept/Branch Museum Head', 'বিভাগ/শাখা জাদুঘর প্রধান', '2018-01-28 15:52:21', '2018-01-28 15:52:22'),
	(3, 'Accounts Section', 'হিসাব শাখা', '2018-01-28 15:52:58', '2018-01-28 15:52:58'),
	(4, 'Director General', 'মহাপরিচালক', '2018-01-28 15:53:19', '2018-01-28 15:53:19');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table accession.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table accession.users: ~0 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Officer Name', 'officer@example.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, '5aHnBO7MyByr0XwjczApzmty8CjYtSVDMZVMv4TGUlfcBMAHavEmm9mu6Unc', '2018-01-28 16:02:54', '2018-01-28 16:02:54'),
	(2, 'Dept head Name', 'depthead@example.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 2, 'LVQaaC8jKcPrhgEGb4cu3G1IeboYCHFqPqx0RoXB7DK0v6Q2Bs5MbqHPJPdV', '2018-01-28 16:02:54', '2018-01-28 16:02:54'),
	(3, 'Accountant Name', 'accountant@example.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 3, '8zMD9DPdGBcTAq63VkWWcGDPwuJYeKIrjJpTMxdFJpWke3CqSG2aUWkAXvi1', '2018-01-28 16:02:54', '2018-01-28 16:02:54'),
	(4, 'Director General', 'dg@example.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 4, NULL, '2018-01-28 16:02:54', '2018-01-28 16:02:54');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
