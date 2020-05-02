-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 02-05-2020 a las 01:59:00
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `derechoscopio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descripcion_modificacion`
--

CREATE TABLE IF NOT EXISTS `descripcion_modificacion` (
  `IDDescripcion` int(11) NOT NULL AUTO_INCREMENT,
  `IDModificacion` int(11) NOT NULL,
  `NombreCampo` varchar(30) NOT NULL,
  `IDRegistro` varchar(30) NOT NULL,
  `Antes` varchar(300) NOT NULL,
  `Ahora` varchar(300) NOT NULL,
  PRIMARY KEY (`IDDescripcion`),
  KEY `IDModificacion` (`IDModificacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
  `ID` char(1) NOT NULL,
  `Estado` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_modificacion`
--

CREATE TABLE IF NOT EXISTS `historial_modificacion` (
  `IDModificacion` int(11) NOT NULL AUTO_INCREMENT,
  `Fecha` date NOT NULL,
  `Hora` datetime NOT NULL,
  `IDTabla` int(11) NOT NULL,
  `IDUsuario` int(11) NOT NULL,
  PRIMARY KEY (`IDModificacion`),
  KEY `IDTabla` (`IDTabla`),
  KEY `IDUsuario` (`IDUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nacionalidad`
--

CREATE TABLE IF NOT EXISTS `nacionalidad` (
  `IDPais` varchar(3) NOT NULL,
  `Pais` varchar(50) NOT NULL,
  PRIMARY KEY (`IDPais`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservacion`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservacion_visitante`
--

CREATE TABLE IF NOT EXISTS `reservacion_visitante` (
  `IDReserVisi` int(11) NOT NULL,
  `IDReser` int(11) NOT NULL,
  `IDVisi` int(11) NOT NULL,
  `Llego` tinyint(1) NOT NULL,
  KEY `IDReser` (`IDReser`),
  KEY `IDVisi` (`IDVisi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla`
--

CREATE TABLE IF NOT EXISTS `tabla` (
  `IDTabla` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`IDTabla`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipohabitacion`
--

CREATE TABLE IF NOT EXISTS `tipohabitacion` (
  `ID` char(1) NOT NULL,
  `Tipo` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
