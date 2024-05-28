-- --------------------------------------------------------
-- Host:                         10.11.11.10
-- Server version:               11.3.2-MariaDB-1:11.3.2+maria~ubu2204 - mariadb.org binary distribution
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Version:             12.6.0.6849
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for mopsimulator
CREATE DATABASE IF NOT EXISTS `mopsimulator` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `mopsimulator`;

-- Dumping structure fomopsimulatorUsersr table mopsimulator.Users
CREATE TABLE IF NOT EXISTS `Users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(50) NOT NULL,
  `Pwd` varchar(50) NOT NULL,
  `MaxScore` int(11) NOT NULL DEFAULT 0,
  `ts` timestamp NOT NULL DEFAULT current_timestamp(),
  `luts` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mopsimulator.Users: ~5 rows (approximately)
INSERT INTO `Users` (`id`, `UserName`, `Pwd`, `MaxScore`, `ts`, `luts`) VALUES
	(25, 'Valaki', '7815696ecbf1c96e6894b779456d330e', 45, '2024-05-21 19:38:37', '2024-05-21 19:51:42'),
	(26, 'Valaki Más', '8ca39209498cc55df0c7a39c6737bacc', 44, '2024-05-21 19:39:18', '2024-05-21 19:51:41'),
	(27, 'Lompos Farkas', '202cb962ac59075b964b07152d234b70', 23, '2024-05-21 19:39:24', '2024-05-21 19:51:40'),
	(28, 'Béla a szomszédból', '76d80224611fc919a5d54f0ff9fba446', 42069, '2024-05-21 19:49:09', '2024-05-21 20:58:21');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
