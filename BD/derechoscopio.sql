-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 18-05-2020 a las 05:48:11
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `derechoscopio`
--
CREATE DATABASE IF NOT EXISTS `derechoscopio` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `derechoscopio`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descripcion_modificacion`
--

DROP TABLE IF EXISTS `descripcion_modificacion`;
CREATE TABLE IF NOT EXISTS `descripcion_modificacion` (
  `IDDescripcion` int(11) NOT NULL AUTO_INCREMENT,
  `IDModificacion` int(11) NOT NULL,
  `NombreCampo` varchar(30) NOT NULL,
  `IDRegistro` varchar(30) NOT NULL,
  `Antes` varchar(300) NOT NULL,
  `Ahora` varchar(300) NOT NULL,
  PRIMARY KEY (`IDDescripcion`),
  KEY `IDModificacion` (`IDModificacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

DROP TABLE IF EXISTS `estado`;
CREATE TABLE IF NOT EXISTS `estado` (
  `ID` char(1) NOT NULL,
  `Estado` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`ID`, `Estado`) VALUES
('E', 'En espera'),
('F', 'Finalizada'),
('P', 'En progreso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_modificacion`
--

DROP TABLE IF EXISTS `historial_modificacion`;
CREATE TABLE IF NOT EXISTS `historial_modificacion` (
  `IDModificacion` int(11) NOT NULL AUTO_INCREMENT,
  `Fecha` date NOT NULL,
  `Hora` datetime NOT NULL,
  `IDTabla` int(11) NOT NULL,
  `IDUsuario` int(11) NOT NULL,
  PRIMARY KEY (`IDModificacion`),
  KEY `IDTabla` (`IDTabla`),
  KEY `IDUsuario` (`IDUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nacionalidad`
--

DROP TABLE IF EXISTS `nacionalidad`;
CREATE TABLE IF NOT EXISTS `nacionalidad` (
  `IDPais` varchar(3) NOT NULL,
  `Pais` varchar(50) NOT NULL,
  PRIMARY KEY (`IDPais`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nacionalidad`
--

INSERT INTO `nacionalidad` (`IDPais`, `Pais`) VALUES
('Mex', 'Mexico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservacion`
--

DROP TABLE IF EXISTS `reservacion`;
CREATE TABLE IF NOT EXISTS `reservacion` (
  `IDReser` int(11) NOT NULL AUTO_INCREMENT,
  `Creador` int(11) NOT NULL,
  `FechaInicio` date NOT NULL,
  `FechaFin` date NOT NULL,
  `DiasEstima` int(11) NOT NULL,
  `PersonasEstima` int(11) NOT NULL,
  `FechaCreacion` date NOT NULL,
  `TipoHabita` char(1) NOT NULL,
  `Estado` char(1) NOT NULL DEFAULT 'E',
  PRIMARY KEY (`IDReser`),
  KEY `Creador` (`Creador`),
  KEY `TipoHabita` (`TipoHabita`),
  KEY `Estado` (`Estado`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reservacion`
--

INSERT INTO `reservacion` (`IDReser`, `Creador`, `FechaInicio`, `FechaFin`, `DiasEstima`, `PersonasEstima`, `FechaCreacion`, `TipoHabita`, `Estado`) VALUES
(2, 7, '2020-05-06', '2020-05-07', 1, 2, '2020-05-02', 'D', 'E'),
(3, 4, '2020-05-05', '2020-05-08', 3, 3, '2020-05-01', 'T', 'E'),
(4, 4, '2020-05-04', '2020-05-07', 3, 1, '2020-05-01', 'I', 'F'),
(5, 9, '2020-05-05', '2020-05-07', 2, 2, '2020-05-04', 'D', 'F'),
(6, 4, '2020-05-04', '2020-05-06', 2, 3, '2020-05-02', 'T', 'F'),
(7, 4, '2020-05-13', '2020-05-14', 1, 2, '2020-05-05', 'D', 'P'),
(8, 3, '2020-05-04', '2020-05-05', 1, 1, '2020-05-01', 'I', 'P');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla`
--

DROP TABLE IF EXISTS `tabla`;
CREATE TABLE IF NOT EXISTS `tabla` (
  `IDTabla` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`IDTabla`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipohabitacion`
--

DROP TABLE IF EXISTS `tipohabitacion`;
CREATE TABLE IF NOT EXISTS `tipohabitacion` (
  `ID` char(1) NOT NULL,
  `Tipo` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipohabitacion`
--

INSERT INTO `tipohabitacion` (`ID`, `Tipo`) VALUES
('D', 'Doble'),
('I', 'Individual'),
('T', 'Triple');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

DROP TABLE IF EXISTS `tipousuario`;
CREATE TABLE IF NOT EXISTS `tipousuario` (
  `ID` char(1) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `NivelPriv` int(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`ID`, `Nombre`, `NivelPriv`) VALUES
('A', 'Administrador', 2),
('R', 'Recepcionista', 3),
('S', 'Superusuario', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `ID` int(3) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) NOT NULL,
  `Apellidos` varchar(60) NOT NULL,
  `Clave` varchar(50) NOT NULL,
  `Correo` varchar(100) NOT NULL,
  `Telefono` varchar(12) NOT NULL DEFAULT '664-000-0000',
  `TipoUsuario` char(1) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `TipoUsuario` (`TipoUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID`, `Nombre`, `Apellidos`, `Clave`, `Correo`, `Telefono`, `TipoUsuario`) VALUES
(3, 'Usuario', 'Principal', 'derechos', 'derechoscopio@gmail.com', '664-000-0000', 'S'),
(4, 'Eduardo', 'Castro', 'prueba12', 'prueba@hotmail.com', '664-000-0000', 'A'),
(7, 'Abner', 'Jesus', 'prueba12', 'prueba3@gmail.com', '664-000-0000', 'A'),
(8, 'Griselda', 'Jacome', 'prueba12', 'prueba4@gmail.com', '664-000-0000', 'A'),
(9, 'Eduardo', 'Morgado', 'prueba12', 'prueba5@hotmail.com', '664-000-0000', 'S');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitante`
--

DROP TABLE IF EXISTS `visitante`;
CREATE TABLE IF NOT EXISTS `visitante` (
  `IDVisi` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) DEFAULT NULL,
  `Telefono` varchar(13) NOT NULL,
  `Fecha_nac` date NOT NULL,
  `IDNacion` varchar(3) NOT NULL,
  `fecha_llegada` date NOT NULL,
  `hora_llegada` time NOT NULL,
  `cita_consulado` time NOT NULL,
  `fecha_registro` datetime NOT NULL,
  PRIMARY KEY (`IDVisi`),
  KEY `IDNacion` (`IDNacion`)
) ENGINE=InnoDB AUTO_INCREMENT=271 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `visitante`
--

INSERT INTO `visitante` (`IDVisi`, `Nombre`, `Telefono`, `Fecha_nac`, `IDNacion`, `fecha_llegada`, `hora_llegada`, `cita_consulado`, `fecha_registro`) VALUES
(227, 'Jose Maria Calixto Acosta', '686-115-7546', '1954-08-05', 'Mex', '2020-03-02', '08:30:00', '04:30:00', '2020-05-17 21:40:00'),
(228, 'Elenis Margarita Reyes de Calixto', '', '1959-10-05', 'Mex', '2020-03-02', '08:30:00', '04:30:00', '2020-05-17 21:40:00'),
(229, 'Gustavo Adolfo Pino Amador', '934-114-4278', '1979-01-29', 'Mex', '2020-03-04', '13:00:00', '09:00:00', '2020-05-17 21:40:00'),
(230, 'Sonia Maribel Alvarez Barahona', '', '1979-09-29', 'Mex', '2020-03-04', '13:00:00', '09:00:00', '2020-05-17 21:40:00'),
(231, 'Ashly Issayana Pino Alvarez', '', '2010-09-17', 'Mex', '2020-03-04', '13:00:00', '09:00:00', '2020-05-17 21:40:00'),
(232, 'Britany Yulieth Pino Alvarez', '', '2014-03-19', 'Mex', '2020-03-04', '13:00:00', '09:00:00', '2020-05-17 21:40:00'),
(233, 'Marvin de Jesus Ruiz Gadea', '686-107-8695', '1989-02-07', 'Mex', '2020-03-04', '13:00:00', '09:00:00', '2020-05-17 21:40:00'),
(234, 'Ariel Antonio Ruiz Garcia', '', '2010-05-10', 'Mex', '2020-03-04', '13:00:00', '09:00:00', '2020-05-17 21:40:00'),
(235, 'Eduardo Valdemar Ramirez', '993-372-2073', '1988-10-30', 'Mex', '2020-03-05', '13:00:00', '09:00:00', '2020-05-17 21:40:00'),
(236, 'Karen Yaneth Guevara Maldonado', '686-143-5333', '1984-05-29', 'Mex', '2020-03-05', '13:00:00', '09:00:00', '2020-05-17 21:40:00'),
(237, 'Angel David Guevara Maldonado', '', '2009-05-29', 'Mex', '2020-03-05', '13:00:00', '09:00:00', '2020-05-17 21:40:00'),
(238, 'Breny Alcira Alvarado Rodriguez', '686-352-7274', '1993-01-13', 'Mex', '2020-03-05', '13:00:00', '09:00:00', '2020-05-17 21:40:00'),
(239, 'Enis Antonio Isaula Alvarado', '', '2012-07-12', 'Mex', '2020-03-05', '13:00:00', '09:00:00', '2020-05-17 21:40:00'),
(240, 'Katherine Abigail Isaula Alvarado', '', '2018-04-02', 'Mex', '2020-03-05', '13:00:00', '09:00:00', '2020-05-17 21:40:00'),
(241, 'Maria Cristina Mendez Mendez', '963-231-6127', '1982-10-18', 'Mex', '2020-03-05', '13:00:00', '09:00:00', '2020-05-17 21:40:00'),
(242, 'Mayra Yolanda Lopez Mendez', '', '2002-04-18', 'Mex', '2020-03-05', '13:00:00', '09:00:00', '2020-05-17 21:40:00'),
(243, 'Juana Arreaga Bravo', '963-144-6916', '1982-02-02', 'Mex', '2020-03-06', '13:00:00', '09:00:00', '2020-05-17 21:40:00'),
(244, 'Jimy Ortiz Arreaga', '', '2005-01-25', 'Mex', '2020-03-06', '13:00:00', '09:00:00', '2020-05-17 21:40:00'),
(245, 'Angel Arreaga Bravo ', '', '2018-11-11', 'Mex', '2020-03-06', '13:00:00', '09:00:00', '2020-05-17 21:40:00'),
(246, 'Maria Eusebia Monge Serrano ', '686-244-8930', '1959-08-14', 'Mex', '2020-03-09', '13:00:00', '09:00:00', '2020-05-17 21:40:00'),
(247, 'Asli Ariany Matute Gonzalez', '', '2009-11-19', 'Mex', '2020-03-09', '13:00:00', '09:00:00', '2020-05-17 21:40:00'),
(248, 'David Ordonez Ordonez', '686-404-1808', '1993-04-16', 'Mex', '2020-03-12', '07:30:00', '03:30:00', '2020-05-17 21:40:00'),
(249, 'Angel Daniel Ordonez  Taperia', '', '2013-01-20', 'Mex', '2020-03-12', '07:30:00', '03:30:00', '2020-05-17 21:40:00'),
(250, 'Franklyn Alexis Ordonez Taperia', '', '2017-03-25', 'Mex', '2020-03-12', '07:30:00', '03:30:00', '2020-05-17 21:40:00'),
(251, 'Rigoberto Balux Carrillo', '963-109-6025', '1992-10-06', 'Mex', '2020-03-12', '07:30:00', '03:30:00', '2020-05-17 21:40:00'),
(252, 'Hellen Mileidy Balux Suhul ', '', '2016-02-11', 'Mex', '2020-03-12', '07:30:00', '03:30:00', '2020-05-17 21:40:00'),
(253, 'Maria Isabel Taleon Bautista', '963-163-5272', '1991-02-13', 'Mex', '2020-03-12', '07:30:00', '03:30:00', '2020-05-17 21:40:00'),
(254, 'Yesica Suceli Bautista Taleon ', '', '2009-10-05', 'Mex', '2020-03-12', '07:30:00', '03:30:00', '2020-05-17 21:40:00'),
(255, 'Nancy Dotorea Cruz Marroquin De Ortega', '899-542-3574', '1981-02-06', 'Mex', '2020-03-16', '13:00:00', '09:00:00', '2020-05-17 21:40:00'),
(256, 'Deivy Junior Irael Ortega Cruz', '', '2012-11-02', 'Mex', '2020-03-16', '13:00:00', '09:00:00', '2020-05-17 21:40:00'),
(257, 'Linian Elizabeth Navarro de Leon', '686-236-1941', '1979-10-17', 'Mex', '2020-03-19', '16:00:00', '04:30:00', '2020-05-17 21:40:00'),
(258, 'Estiben Ezequiel Herrera Navarro', '686-236-4119', '2006-09-10', 'Mex', '2020-03-19', '16:00:00', '04:30:00', '2020-05-17 21:40:00'),
(259, 'Antony David Herrera Navarro', '', '2010-02-21', 'Mex', '2020-03-19', '16:00:00', '04:30:00', '2020-05-17 21:40:00'),
(260, 'Cristian Osniel Herrera Navarro', '', '2015-06-22', 'Mex', '2020-03-19', '16:00:00', '04:30:00', '2020-05-17 21:40:00'),
(261, 'Fernando Guzman Lopez', '962-288-9961', '1987-05-27', 'Mex', '2020-03-20', '08:30:00', '04:30:00', '2020-05-17 21:40:00'),
(262, 'Dayana Alejandra Guzaman Lopez', '', '2014-09-18', 'Mex', '2020-03-20', '08:30:00', '04:30:00', '2020-05-17 21:40:00'),
(263, 'Petrona Pedro Pedro', '686-472-2355', '1980-03-25', 'Mex', '2020-03-26', '13:00:00', '09:00:00', '2020-05-17 21:40:00'),
(264, 'Emily Rodriguez Pedro', '', '2018-05-01', 'Mex', '2020-03-26', '13:00:00', '09:00:00', '2020-05-17 21:40:00'),
(265, 'Jose MarÃ­a Sunun Velasquez', '686-336-5349', '1966-09-28', 'Mex', '2020-03-26', '13:00:00', '09:00:00', '2020-05-17 21:40:00'),
(266, 'Aura Marina Sunun Larios ', '', '2008-05-09', 'Mex', '2020-03-26', '13:00:00', '09:00:00', '2020-05-17 21:40:00'),
(267, 'Maria Navichoc Ejcalon', '686-259-3122', '1979-11-15', 'Mex', '2020-03-26', '13:00:00', '09:00:00', '2020-05-17 21:40:00'),
(268, 'Yaquelin Ejcalon Navichoc', '', '2005-12-05', 'Mex', '2020-03-26', '13:00:00', '09:00:00', '2020-05-17 21:40:00'),
(269, 'Rutilla Esperanza Cho Tzib de Botzoc ', '686-369-9221', '1982-01-10', 'Mex', '2020-03-26', '13:00:00', '09:00:00', '2020-05-17 21:40:00'),
(270, 'Vilma Angelica Cho Tzib', '', '2004-05-06', 'Mex', '2020-03-26', '13:00:00', '09:00:00', '2020-05-17 21:40:00');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `descripcion_modificacion`
--
ALTER TABLE `descripcion_modificacion`
  ADD CONSTRAINT `descripcion_modificacion_ibfk_1` FOREIGN KEY (`IDModificacion`) REFERENCES `historial_modificacion` (`IDModificacion`);

--
-- Filtros para la tabla `historial_modificacion`
--
ALTER TABLE `historial_modificacion`
  ADD CONSTRAINT `historial_modificacion_ibfk_1` FOREIGN KEY (`IDTabla`) REFERENCES `tabla` (`IDTabla`),
  ADD CONSTRAINT `historial_modificacion_ibfk_2` FOREIGN KEY (`IDUsuario`) REFERENCES `usuario` (`ID`);

--
-- Filtros para la tabla `reservacion`
--
ALTER TABLE `reservacion`
  ADD CONSTRAINT `reservacion_ibfk_1` FOREIGN KEY (`Creador`) REFERENCES `usuario` (`ID`),
  ADD CONSTRAINT `reservacion_ibfk_2` FOREIGN KEY (`TipoHabita`) REFERENCES `tipohabitacion` (`ID`),
  ADD CONSTRAINT `reservacion_ibfk_3` FOREIGN KEY (`Estado`) REFERENCES `estado` (`ID`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`TipoUsuario`) REFERENCES `tipousuario` (`ID`);

--
-- Filtros para la tabla `visitante`
--
ALTER TABLE `visitante`
  ADD CONSTRAINT `visitante_ibfk_1` FOREIGN KEY (`IDNacion`) REFERENCES `nacionalidad` (`IDPais`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
