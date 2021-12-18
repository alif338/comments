-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.17-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_comments
CREATE DATABASE IF NOT EXISTS `db_comments` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `db_comments`;

-- Dumping structure for table db_comments.master_media
CREATE TABLE IF NOT EXISTS `master_media` (
  `media_id` int(11) NOT NULL AUTO_INCREMENT,
  `media_nama` varchar(50) DEFAULT '',
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`media_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_comments.master_media: ~2 rows (approximately)
/*!40000 ALTER TABLE `master_media` DISABLE KEYS */;
INSERT INTO `master_media` (`media_id`, `media_nama`, `created`, `updated`) VALUES
	(1, 'Twitter', '2021-12-16 20:45:22', '2021-12-18 11:49:36'),
	(2, 'Instagram', '2021-12-16 20:45:27', '2021-12-18 11:49:38'),
	(3, 'Facebook', '2021-12-16 20:45:14', '2021-12-18 11:49:40'),
	(4, 'Lainnya', '2021-12-18 11:49:47', '2021-12-18 11:49:52');
/*!40000 ALTER TABLE `master_media` ENABLE KEYS */;

-- Dumping structure for table db_comments.master_pic
CREATE TABLE IF NOT EXISTS `master_pic` (
  `pic_id` int(11) NOT NULL AUTO_INCREMENT,
  `pic_nama` varchar(50) DEFAULT '',
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`pic_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_comments.master_pic: ~0 rows (approximately)
/*!40000 ALTER TABLE `master_pic` DISABLE KEYS */;
INSERT INTO `master_pic` (`pic_id`, `pic_nama`, `created`, `updated`) VALUES
	(2, 'Bidang transportasi darat', '2021-12-16 20:45:36', '2021-12-16 20:45:36');
/*!40000 ALTER TABLE `master_pic` ENABLE KEYS */;

-- Dumping structure for table db_comments.trans_aduan
CREATE TABLE IF NOT EXISTS `trans_aduan` (
  `aduan_id` int(11) NOT NULL AUTO_INCREMENT,
  `media_id` int(11) DEFAULT NULL,
  `pic_id` int(11) DEFAULT NULL,
  `aduan_perihal` varchar(100) DEFAULT NULL,
  `aduan_tanggal` date DEFAULT curdate(),
  `aduan_pemohon` enum('Individu','Badan Hukum','Kelompok Orang') DEFAULT 'Individu',
  `aduan_fitur` enum('Kolom Komentar','DM','Media Lainnya') DEFAULT 'Media Lainnya',
  `aduan_gambar` varchar(100) DEFAULT NULL,
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`aduan_id`),
  KEY `FK__master_media` (`media_id`),
  KEY `FK__master_pic` (`pic_id`),
  CONSTRAINT `FK__master_media` FOREIGN KEY (`media_id`) REFERENCES `master_media` (`media_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK__master_pic` FOREIGN KEY (`pic_id`) REFERENCES `master_pic` (`pic_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_comments.trans_aduan: ~0 rows (approximately)
/*!40000 ALTER TABLE `trans_aduan` DISABLE KEYS */;
INSERT INTO `trans_aduan` (`aduan_id`, `media_id`, `pic_id`, `aduan_perihal`, `aduan_tanggal`, `aduan_pemohon`, `aduan_fitur`, `aduan_gambar`, `created`, `updated`) VALUES
	(8, 3, 2, 'sadfasdfasdf', '2021-12-24', 'Badan Hukum', 'Kolom Komentar', NULL, '2021-12-18 12:15:29', '2021-12-18 12:15:29');
/*!40000 ALTER TABLE `trans_aduan` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
