-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               11.8.4-MariaDB - MariaDB Server
-- Server OS:                    Win64
-- HeidiSQL Version:             12.13.0.7147
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table cafe_db.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table cafe_db.admin: ~1 rows (approximately)
INSERT INTO `admin` (`id`, `username`, `password`) VALUES
	(2, 'a', '202cb962ac59075b964b07152d234b70');

-- Dumping structure for table cafe_db.laporan
CREATE TABLE IF NOT EXISTS `laporan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_meja` int(11) DEFAULT NULL,
  `nama_pelanggan` varchar(100) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `tanggal_transaksi` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table cafe_db.laporan: ~13 rows (approximately)
INSERT INTO `laporan` (`id`, `nomor_meja`, `nama_pelanggan`, `no_hp`, `total`, `tanggal_transaksi`) VALUES
	(9, 1, 'Andi', '081234567890', 45000, '2026-01-03 15:34:39'),
	(10, 2, 'Budi', '081345678901', 32000, '2026-01-03 15:34:39'),
	(11, 3, 'Citra', '081456789012', 58000, '2026-01-03 15:34:39'),
	(12, 4, 'Dewi', '081567890123', 67000, '2026-01-01 15:34:39'),
	(13, 5, 'Eko', '081678901234', 29000, '2025-12-30 15:34:39'),
	(14, 6, 'Fajar', '081789012345', 72000, '2025-12-24 15:34:39'),
	(15, 7, 'Gita', '081890123456', 61000, '2025-12-19 15:34:39'),
	(16, 8, 'Hana', '081901234567', 88000, '2025-12-03 15:34:39'),
	(17, 9, 'Ilham', '081012345678', 53000, '2025-12-03 15:34:39'),
	(18, 10, 'Joko', '081112223334', 46000, '2025-11-03 15:34:39'),
	(21, 1, 'Kiwil', '0895385909547', 80000, '2026-01-03 17:26:08'),
	(22, 3, 'Ervan', '08343899843', 58000, '2026-01-03 17:36:52'),
	(23, 1, 'NIGGA', '08122335645', 106000, '2026-01-04 09:23:35');

-- Dumping structure for table cafe_db.meja
CREATE TABLE IF NOT EXISTS `meja` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_meja` int(10) NOT NULL,
  `qr_file` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `status` enum('kosong','terpakai') DEFAULT 'kosong',
  PRIMARY KEY (`id`),
  UNIQUE KEY `nomor_meja` (`nomor_meja`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table cafe_db.meja: ~0 rows (approximately)
INSERT INTO `meja` (`id`, `nomor_meja`, `qr_file`, `created_at`, `status`) VALUES
	(1, 1, 'meja-1.png', '2026-01-04 02:34:48', 'kosong');

-- Dumping structure for table cafe_db.menu
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(100) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `status` enum('tersedia','habis') NOT NULL DEFAULT 'tersedia',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table cafe_db.menu: ~3 rows (approximately)
INSERT INTO `menu` (`id`, `nama_menu`, `harga`, `foto`, `status`) VALUES
	(1, 'Kopi', 10000, '1767440997_338126751.jpg', 'tersedia'),
	(2, 'Teh', 8000, '1767441069_1795840615.jpg', 'tersedia'),
	(3, 'Roti', 12000, '1767441060_641830228.jpeg', 'tersedia');

-- Dumping structure for table cafe_db.pesanan
CREATE TABLE IF NOT EXISTS `pesanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomor_meja` int(11) DEFAULT NULL,
  `menu` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `nama_pelanggan` varchar(100) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `status` enum('dipesan','disajikan','lunas') DEFAULT 'dipesan',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table cafe_db.pesanan: ~0 rows (approximately)

-- Dumping structure for table cafe_db.pesanan_detail
CREATE TABLE IF NOT EXISTS `pesanan_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pesanan_id` int(11) DEFAULT NULL,
  `nama_menu` varchar(100) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table cafe_db.pesanan_detail: ~0 rows (approximately)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
