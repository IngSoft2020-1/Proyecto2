-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 02-05-2020 a las 08:16:22
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
-- Estructura de tabla para la tabla `reservacion_visitante`
--

DROP TABLE IF EXISTS `reservacion_visitante`;
CREATE TABLE IF NOT EXISTS `reservacion_visitante` (
  `IDReserVisi` int(11) NOT NULL,
  `IDReser` int(11) NOT NULL,
  `IDVisi` int(11) NOT NULL,
  `Llego` tinyint(1) NOT NULL,
  KEY `IDReser` (`IDReser`),
  KEY `IDVisi` (`IDVisi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reservacion_visitante`
--

INSERT INTO `reservacion_visitante` (`IDReserVisi`, `IDReser`, `IDVisi`, `Llego`) VALUES
(1, 2, 2, 1),
(2, 2, 1, 0),
(3, 3, 3, 0),
(4, 3, 4, 0),
(5, 3, 5, 0),
(6, 4, 6, 0),
(7, 5, 1, 0),
(7, 5, 5, 0),
(8, 6, 2, 0),
(9, 6, 3, 1),
(10, 6, 1, 1),
(11, 7, 6, 0),
(12, 7, 5, 0),
(12, 8, 2, 0);

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
  `Nombre` varchar(50) NOT NULL,
  `Ape_Mat` varchar(20) NOT NULL,
  `Ape_Pat` varchar(20) NOT NULL,
  `Telefono` varchar(13) NOT NULL,
  `Fecha_nac` date NOT NULL,
  `Edad` int(11) NOT NULL,
  `IDNacion` varchar(3) NOT NULL,
  PRIMARY KEY (`IDVisi`),
  KEY `IDNacion` (`IDNacion`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `visitante`
--

INSERT INTO `visitante` (`IDVisi`, `Nombre`, `Ape_Mat`, `Ape_Pat`, `Telefono`, `Fecha_nac`, `Edad`, `IDNacion`) VALUES
(1, 'Carlos', 'Gerardo', 'Carlon', '33213412', '2017-01-04', 21, 'Mex'),
(2, 'pepe', 'ralo', 'ola', '3321234', '2020-05-03', 3, 'Mex'),
(3, 'Jhon', 'Martin', 'Jorge', '3312312', '2019-10-07', 2, 'Mex'),
(4, 'Diego', 'Comne', 'Cjaol', '31244', '2019-01-08', 5, 'Mex'),
(5, 'Lomas', 'Juedio', 'James', '23124132', '2019-07-16', 6, 'Mex'),
(6, 'Daniel', 'Ruano', 'Ruano', '331231', '2019-02-07', 2, 'Mex');

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
-- Filtros para la tabla `reservacion_visitante`
--
ALTER TABLE `reservacion_visitante`
  ADD CONSTRAINT `reservacion_visitante_ibfk_1` FOREIGN KEY (`IDReser`) REFERENCES `reservacion` (`IDReser`),
  ADD CONSTRAINT `reservacion_visitante_ibfk_2` FOREIGN KEY (`IDVisi`) REFERENCES `visitante` (`IDVisi`);

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
