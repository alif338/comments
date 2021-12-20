-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.17-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

-- Dumping structure for table db_comments.master_media
CREATE TABLE IF NOT EXISTS `master_media` (
  `media_id` int(11) NOT NULL AUTO_INCREMENT,
  `media_nama` varchar(50) DEFAULT '',
  `media_icon` varchar(50) DEFAULT 'fas fa-grip-horizontal',
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`media_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_comments.master_media: ~4 rows (approximately)
/*!40000 ALTER TABLE `master_media` DISABLE KEYS */;
INSERT INTO `master_media` (`media_id`, `media_nama`, `media_icon`, `created`, `updated`) VALUES
	(1, 'Twitter', 'la flaticon-twitter', '2021-12-16 20:45:22', '2021-12-19 11:00:21'),
	(2, 'Instagram', 'la flaticon-instagram', '2021-12-16 20:45:27', '2021-12-19 11:00:18'),
	(3, 'Facebook', 'la flaticon-facebook', '2021-12-16 20:45:14', '2021-12-19 11:00:38'),
	(4, 'Lainnya', 'fas fa-grip-horizontal', '2021-12-18 11:49:47', '2021-12-18 14:04:59');
/*!40000 ALTER TABLE `master_media` ENABLE KEYS */;

-- Dumping structure for table db_comments.master_pic
CREATE TABLE IF NOT EXISTS `master_pic` (
  `pic_id` int(11) NOT NULL AUTO_INCREMENT,
  `pic_nama` varchar(50) DEFAULT '',
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`pic_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_comments.master_pic: ~2 rows (approximately)
/*!40000 ALTER TABLE `master_pic` DISABLE KEYS */;
INSERT INTO `master_pic` (`pic_id`, `pic_nama`, `created`, `updated`) VALUES
	(2, 'Bidang transportasi darat', '2021-12-16 20:45:36', '2021-12-16 20:45:36'),
	(3, 'Dinas Pekerjaan Umum', '2021-12-18 17:15:53', '2021-12-18 17:15:54'),
	(4, 'Bidang Transportasi Kota Bandung', '2021-12-19 09:16:02', '2021-12-19 09:16:02');
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
  `aduan_status` enum('SUDAH DITANGGAPI','BELUM DITANGGAPI') DEFAULT 'BELUM DITANGGAPI',
  `aduan_keterangan` longtext DEFAULT '-',
  `created` datetime DEFAULT current_timestamp(),
  `updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`aduan_id`),
  KEY `FK__master_media` (`media_id`),
  KEY `FK__master_pic` (`pic_id`),
  CONSTRAINT `FK__master_media` FOREIGN KEY (`media_id`) REFERENCES `master_media` (`media_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK__master_pic` FOREIGN KEY (`pic_id`) REFERENCES `master_pic` (`pic_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table db_comments.trans_aduan: ~3 rows (approximately)
/*!40000 ALTER TABLE `trans_aduan` DISABLE KEYS */;
/*!40000 ALTER TABLE `trans_aduan` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
