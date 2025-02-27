-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for dbdsg
CREATE DATABASE IF NOT EXISTS `dbdsg` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `dbdsg`;

-- Dumping structure for table dbdsg.order
CREATE TABLE IF NOT EXISTS `order` (
  `id_trx` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL DEFAULT '0',
  `id_produk` int NOT NULL DEFAULT '0',
  `inv_number` varchar(50) NOT NULL DEFAULT '0',
  `qty` varchar(50) NOT NULL DEFAULT '0',
  `is_status` int NOT NULL DEFAULT '0',
  `created` datetime DEFAULT NULL,
  PRIMARY KEY (`id_trx`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table dbdsg.order: ~3 rows (approximately)
DELETE FROM `order`;
INSERT INTO `order` (`id_trx`, `id_user`, `id_produk`, `inv_number`, `qty`, `is_status`, `created`) VALUES
	(1, 1, 3, '20250227102552', '10', 2, '2025-02-27 10:25:52'),
	(2, 1, 3, '20250227102604', '20', 0, '2025-02-27 10:26:04'),
	(3, 1, 3, '20250227103020', '2', 0, '2025-02-27 10:30:20');

-- Dumping structure for table dbdsg.produk
CREATE TABLE IF NOT EXISTS `produk` (
  `id_produk` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `harga` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table dbdsg.produk: ~3 rows (approximately)
DELETE FROM `produk`;
INSERT INTO `produk` (`id_produk`, `id_user`, `nama`, `deskripsi`, `harga`, `created`) VALUES
	(3, 1, 'Laptop', 'Laptop Acer', '2000000', '2025-02-26 19:53:07'),
	(4, 1, 'laptop baru', 'deskripsi baru', '12345', '2025-02-26 19:53:24'),
	(5, 1, 'Laptop', 'Laptop Acer', '2000000', '2025-02-27 02:55:04');

-- Dumping structure for table dbdsg.users
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `apikey` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table dbdsg.users: ~1 rows (approximately)
DELETE FROM `users`;
INSERT INTO `users` (`id_user`, `fullname`, `email`, `password`, `phone`, `apikey`, `created_at`) VALUES
	(1, 'joko', 'joko@mail.com', '$2y$12$XEHVZS5p/qNwNNcot7EJgenPYxrWUgOy5GwijGSmkUu3/WlxJGKO.', '123', 'VBlhNAWToCt7OqDZFP0xjGJRIKmaLbyd', '2025-02-26 17:00:00');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
