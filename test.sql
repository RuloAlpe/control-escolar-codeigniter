-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.6.17 - MySQL Community Server (GPL)
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para test
CREATE DATABASE IF NOT EXISTS `test` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `test`;

-- Volcando estructura para tabla test.alumnos
CREATE TABLE IF NOT EXISTS `alumnos` (
  `matricula` varchar(4) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla test.alumnos: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `alumnos` DISABLE KEYS */;
INSERT INTO `alumnos` (`matricula`, `nombre`, `fecha`) VALUES
	('19ue', 'Karla Gonzalez', '2018-12-06 18:13:41'),
	('qa11', 'Jose Gonzalez', '2018-12-06 14:03:20'),
	('qa12', 'Ana Lopez', '2018-12-06 15:03:20');
/*!40000 ALTER TABLE `alumnos` ENABLE KEYS */;

-- Volcando estructura para tabla test.asignaciones
CREATE TABLE IF NOT EXISTS `asignaciones` (
  `matricula` varchar(4) NOT NULL,
  `clave_materia` int(4) unsigned NOT NULL,
  KEY `FK__alumnos` (`matricula`),
  KEY `FK__materias` (`clave_materia`),
  CONSTRAINT `FK__alumnos` FOREIGN KEY (`matricula`) REFERENCES `alumnos` (`matricula`) ON UPDATE CASCADE,
  CONSTRAINT `FK__materias` FOREIGN KEY (`clave_materia`) REFERENCES `materias` (`clave_materia`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla test.asignaciones: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `asignaciones` DISABLE KEYS */;
INSERT INTO `asignaciones` (`matricula`, `clave_materia`) VALUES
	('qa11', 1234),
	('qa11', 1235);
/*!40000 ALTER TABLE `asignaciones` ENABLE KEYS */;

-- Volcando estructura para tabla test.materias
CREATE TABLE IF NOT EXISTS `materias` (
  `clave_materia` int(4) unsigned NOT NULL,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`clave_materia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla test.materias: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `materias` DISABLE KEYS */;
INSERT INTO `materias` (`clave_materia`, `nombre`) VALUES
	(1234, 'Historia'),
	(1235, 'Calculo'),
	(12346, 'Fisica'),
	(12347, 'Español');
/*!40000 ALTER TABLE `materias` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
