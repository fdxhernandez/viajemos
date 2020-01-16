-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.8-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para prueba_viajemos
CREATE DATABASE IF NOT EXISTS `prueba_viajemos` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `prueba_viajemos`;

-- Volcando estructura para tabla prueba_viajemos.ciudades
CREATE TABLE IF NOT EXISTS `ciudades` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL DEFAULT '',
  `coordenadas` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla prueba_viajemos.ciudades: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `ciudades` DISABLE KEYS */;
INSERT INTO `ciudades` (`id`, `nombre`, `coordenadas`) VALUES
	(2450022, 'Miami', '{lat: 25.7825453, lng: -80.2994984}'),
	(2459115, 'New york', '{lat: 40.6976637, lng: -74.119764}'),
	(2466256, 'Orlando', '{lat: 28.4813018, lng: -81.4387899}');
/*!40000 ALTER TABLE `ciudades` ENABLE KEYS */;

-- Volcando estructura para tabla prueba_viajemos.historico
CREATE TABLE IF NOT EXISTS `historico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ciudad` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `humedad` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__ciudades` (`id_ciudad`),
  CONSTRAINT `FK__ciudades` FOREIGN KEY (`id_ciudad`) REFERENCES `ciudades` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla prueba_viajemos.historico: ~34 rows (aproximadamente)
/*!40000 ALTER TABLE `historico` DISABLE KEYS */;
INSERT INTO `historico` (`id`, `id_ciudad`, `fecha`, `humedad`) VALUES
	(2, 2459115, '2020-01-15 23:47:17', 85),
	(3, 2466256, '2020-01-15 23:47:31', 82),
	(4, 2466256, '2020-01-15 23:48:03', 82),
	(5, 2450022, '2020-01-15 23:48:11', 73),
	(6, 2459115, '2020-01-15 23:48:40', 85),
	(7, 2466256, '2020-01-15 23:48:49', 82),
	(8, 2450022, '2020-01-15 23:49:41', 73),
	(9, 2459115, '2020-01-15 23:51:29', 85),
	(10, 2466256, '2020-01-15 23:53:37', 82),
	(11, 2459115, '2020-01-15 23:54:15', 85),
	(12, 2466256, '2020-01-15 23:54:23', 82),
	(13, 2450022, '2020-01-15 23:54:27', 73),
	(14, 2459115, '2020-01-15 23:54:32', 85),
	(15, 2466256, '2020-01-15 23:54:37', 82),
	(16, 2459115, '2020-01-16 00:25:17', 85),
	(17, 2466256, '2020-01-16 00:25:20', 82),
	(18, 2459115, '2020-01-16 00:26:38', 85),
	(19, 2459115, '2020-01-16 00:28:27', 85),
	(20, 2466256, '2020-01-16 00:28:29', 82),
	(21, 2450022, '2020-01-16 00:28:33', 73),
	(22, 2459115, '2020-01-16 00:28:43', 85),
	(23, 2466256, '2020-01-16 00:28:45', 82),
	(24, 2450022, '2020-01-16 00:28:46', 73),
	(25, 2459115, '2020-01-16 00:28:55', 85),
	(26, 2466256, '2020-01-16 00:28:57', 82),
	(27, 2450022, '2020-01-16 00:28:58', 73),
	(28, 2459115, '2020-01-16 00:30:01', 85),
	(29, 2459115, '2020-01-16 00:30:14', 85),
	(30, 2459115, '2020-01-16 00:30:27', 85),
	(31, 2459115, '2020-01-16 00:30:39', 85),
	(32, 2466256, '2020-01-16 00:30:41', 82),
	(33, 2450022, '2020-01-16 00:30:43', 73),
	(34, 2459115, '2020-01-16 00:31:04', 85),
	(35, 2466256, '2020-01-16 00:31:07', 82);
/*!40000 ALTER TABLE `historico` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
