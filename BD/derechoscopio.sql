-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 15-05-2020 a las 21:39:41
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
(3, 'Usuario', '', 'derechos', 'derechoscopio@gmail.com', '664-000-0000', 'S'),
(4, 'Eduardo Castro', '', 'prueba12', 'prueba@hotmail.com', '664-000-0000', 'A'),
(7, 'Abner Jesus', '', 'prueba12', 'prueba3@gmail.com', '664-000-0000', 'A'),
(8, 'Griselda Jacome', '', 'prueba12', 'prueba4@gmail.com', '664-000-0000', 'A'),
(9, 'Eduardo  Morgado', '', 'prueba12', 'prueba5@hotmail.com', '664-000-0000', 'S');

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
  `hora_llegada` datetime NOT NULL,
  `cita_consulado` datetime NOT NULL,
  `fecha_registro` date NOT NULL,
  PRIMARY KEY (`IDVisi`),
  KEY `IDNacion` (`IDNacion`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `visitante`
--

INSERT INTO `visitante` (`IDVisi`, `Nombre`, `Telefono`, `Fecha_nac`, `IDNacion`, `fecha_llegada`, `hora_llegada`, `cita_consulado`, `fecha_registro`) VALUES
(1, 'Carlos Carlon Gerardo', '33213412', '2017-01-04', 'Mex', '2019-08-12', '2019-08-12 07:06:06', '2020-05-04 08:30:00', '0000-00-00'),
(2, 'Pepe ralo rola', '3321234', '2020-05-03', 'Mex', '2019-12-04', '2019-12-04 09:24:00', '2020-06-01 08:30:00', '0000-00-00'),
(3, 'Jhon Martin Jorge', '3312312', '2019-10-07', 'Mex', '2020-05-03', '2020-05-03 08:19:00', '2020-05-12 08:29:00', '0000-00-00'),
(4, 'Diego Castro Carlon', '31244', '2019-01-08', 'Mex', '2020-03-19', '2020-03-19 07:17:00', '2020-05-02 09:17:00', '0000-00-00'),
(5, 'Tomas Juvera Jacome', '23124132', '2019-07-16', 'Mex', '2020-05-07', '2020-05-07 08:16:00', '2020-05-08 11:30:00', '0000-00-00'),
(6, 'Daniel Hernandez Henandez', '331231', '2019-02-07', 'Mex', '2020-03-10', '2020-03-10 08:22:00', '2020-05-09 10:22:00', '0000-00-00');

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
