-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.22-0ubuntu0.17.10.1 - (Ubuntu)
-- Server OS:                    Linux
-- HeidiSQL Version:             9.5.0.5278
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for truetaste_db
CREATE DATABASE IF NOT EXISTS `truetaste_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `truetaste_db`;

-- Dumping structure for table truetaste_db.contact_us
CREATE TABLE IF NOT EXISTS `contact_us` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table truetaste_db.contact_us: ~5 rows (approximately)
/*!40000 ALTER TABLE `contact_us` DISABLE KEYS */;
INSERT INTO `contact_us` (`id`, `name`, `email`, `message`, `created_at`, `status`) VALUES
	(1, 'test', 'test@gmail.com', 'test', '2018-07-14 13:17:54', '1'),
	(2, 'test', 'test@gmail.com', 'test', '2018-07-14 13:20:22', '1'),
	(3, 'Cosmos Dsilva', 'cosmosdsilva93@gmail.com', 'lalalalala', '2018-07-14 13:34:32', '1'),
	(4, 'cosmos', 'cosmosdsilva93@gmail.com', 'test', '2018-07-16 04:09:29', '1'),
	(5, 'Cosmos', 'cosmosdsilva93@gmail.com', 'test today', '2018-07-16 06:45:20', '1'),
	(6, 'Zymeth', 'cosmosdsilva93@gmail.com', 'hello world', '2018-07-16 07:21:17', '1');
/*!40000 ALTER TABLE `contact_us` ENABLE KEYS */;

-- Dumping structure for table truetaste_db.menu
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table truetaste_db.menu: ~4 rows (approximately)
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`id`, `category`, `item`, `price`, `created_at`, `updated_at`, `status`) VALUES
	(1, 1, 'scrambled Eggs in Puff', 16, '2018-07-15 19:28:00', NULL, '1'),
	(2, 1, 'scrambled Eggs in Puff Pastry', 14, '2018-07-15 19:28:00', NULL, '1'),
	(3, 2, 'scrambled Eggs in Puff', 10, '2018-07-15 19:31:16', NULL, '1'),
	(4, 3, 'scrambled Eggs in Puff Pastry', 19, '2018-07-15 19:31:16', NULL, '1'),
	(5, 1, 'Chicken Croissant', 2, '2018-07-17 04:49:57', NULL, '1'),
	(6, 1, 'Chicken Croissant', 2, '2018-07-17 04:50:21', NULL, '0'),
	(7, 1, 'Chicken Croissant', 2, '2018-07-17 04:51:01', NULL, '0'),
	(8, 1, 'pasta', 10, '2018-07-17 05:24:58', '2018-07-17 06:09:32', '1'),
	(9, 2, 'Nonsense', 1, '2018-07-17 06:18:07', NULL, '0');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;

-- Dumping structure for table truetaste_db.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `items` varchar(255) DEFAULT NULL,
  `total_amount` double DEFAULT NULL,
  `transaction_id` varchar(100) DEFAULT NULL,
  `currency_code` varchar(50) DEFAULT NULL,
  `status` enum('1','0') DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=199 DEFAULT CHARSET=latin1;

-- Dumping data for table truetaste_db.orders: ~14 rows (approximately)
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`id`, `name`, `email`, `items`, `total_amount`, `transaction_id`, `currency_code`, `status`, `created_at`) VALUES
	(178, 'Cosmos', 'cosmosdsilva93@gmail.com', '1-3|3-1|4-1', 77, NULL, 'USD', '0', '2018-07-16 06:30:04'),
	(179, 'Cosmos', 'cosmosdsilva93@gmail.com', '1-3|3-1|4-1', 77, NULL, 'USD', '0', '2018-07-16 06:30:04'),
	(180, 'Cosmos', 'cosmosdsilva93@gmail.com', '1-3|3-1|4-1', 77, NULL, 'USD', '0', '2018-07-16 06:30:04'),
	(181, 'Cosmos', 'cosmosdsilva93@gmail.com', '1-3|3-1|4-1', 77, NULL, 'USD', '0', '2018-07-16 06:30:04'),
	(182, 'Cosmos', 'cosmosdsilva93@gmail.com', '1-3|3-1|4-1', 77, NULL, 'USD', '0', '2018-07-16 06:30:05'),
	(183, 'Cosmos', 'cosmosdsilva93@gmail.com', '1-3|3-1|4-1', 77, NULL, 'USD', '0', '2018-07-16 06:30:05'),
	(184, 'Cosmos', 'cosmosdsilva93@gmail.com', '1-3|3-1|4-1', 77, NULL, 'USD', '0', '2018-07-16 06:30:05'),
	(185, 'Cosmos', 'cosmosdsilva93@gmail.com', '1-3|3-1|4-1', 77, NULL, 'USD', '0', '2018-07-16 06:32:35'),
	(186, 'Cosmos', 'cosmosdsilva93@gmail.com', '1-3|3-1|4-1', 77, NULL, 'USD', '0', '2018-07-16 06:38:01'),
	(187, 'Cosmos', 'cosmosdsilva93@gmail.com', '1-3|3-1|4-1', 77, NULL, 'USD', '0', '2018-07-16 06:42:20'),
	(188, 'Cosmos', 'cosmosdsilva93@gmail.com', '1-3|3-1|4-1', 77, NULL, 'USD', '0', '2018-07-16 06:56:11'),
	(189, 'Zymeth', 'cosmosdsilva93@gmail.com', '4-1', 19, NULL, 'USD', '0', '2018-07-16 07:27:48'),
	(191, 'Cosmos', 'cosmosdsilva93@gmail.com', '4-1', 19, NULL, 'USD', '0', '2018-07-16 07:43:17'),
	(192, 'HashBrown', 'hashy@gmail.com', '1-2|2-1', 46, '0XV685617Y742325D', 'USD', '1', '2018-07-16 08:14:54'),
	(193, 'Cosmos', 'cosmosdsilva93@gmail.com', '1-2|4-1', 51, '7HN54880V10335842', 'USD', '1', '2018-07-16 11:12:37'),
	(194, 'Cosmos', 'cosmosdsilva93@gmail.com', '1-3|2-2', 76, '0XV685617Y742325D', 'USD', '1', '2018-07-16 11:22:50'),
	(195, 'Cosmos', 'cosmosdsilva93@gmail.com', '4-1', 19, '8X109990L7225694A', 'USD', '1', '2018-07-17 07:13:55');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Dumping structure for table truetaste_db.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `is_verified` enum('1','0') NOT NULL DEFAULT '0',
  `admin_login` enum('1','0') NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table truetaste_db.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `status`, `is_verified`, `admin_login`, `created_at`) VALUES
	(1, 'Admin', 'Admin', 'truetaste2018@gmail.com', 'e6e061838856bf47e1de730719fb2609', '1', '0', '1', '2018-04-30 00:00:00');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
