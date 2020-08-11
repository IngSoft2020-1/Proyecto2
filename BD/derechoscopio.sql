-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 11-08-2020 a las 06:01:14
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
-- Estructura de tabla para la tabla `costo`
--

DROP TABLE IF EXISTS `costo`;
CREATE TABLE IF NOT EXISTS `costo` (
  `NumPersonas` int(11) DEFAULT NULL,
  `tipohabitacion` varchar(10) DEFAULT NULL,
  `cobro` varchar(10) DEFAULT NULL,
  `Precio` float DEFAULT NULL,
  `PorcentajeDesc` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `costo`
--

INSERT INTO `costo` (`NumPersonas`, `tipohabitacion`, `cobro`, `Precio`, `PorcentajeDesc`) VALUES
(2, 'Sencillo', 'Sencillo', 1035.4, 0.285),
(2, 'Doble', 'doble', 1035.4, 0.25),
(3, 'Doble', 'triple', 1185.84, 0.23),
(4, 'triple', 'cuadruple', 1336.28, 0.23),
(5, 'triple', 'quintuple', 1486.73, 0.23);

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
('ARG', 'Argentina'),
('ATG', 'Antigua y Barbuda'),
('BHS', 'Bahamas'),
('BLM', 'San Bartolome'),
('BLZ', 'Belice'),
('BOL', 'Bolivia'),
('BRA', 'Brasil'),
('BRB', 'Barbados'),
('CHL', 'Chile'),
('COL', 'Colombia'),
('CRI', 'Costa Rica'),
('CUB', 'Cuba'),
('DMA', 'Dominica'),
('ECU', 'Ecuador'),
('GLP', 'Guadalupe'),
('GRD', 'Granada'),
('GTM', 'Guatemala'),
('GUF', 'Guyana Francesa'),
('HND', 'Honduras'),
('HTI', 'Haití'),
('JAM', 'Jamaica'),
('KNA', 'San Cristobal y Nieves'),
('LCA', 'Santa Lucia'),
('MEX', 'Mexico'),
('MTQ', 'Martinica'),
('NIC', 'Nicaragua'),
('PAN', 'Panama'),
('PER', 'Peru'),
('PRI', 'Puerto Rico'),
('PRY', 'Paraguay'),
('RDO', 'Republica Dominicana'),
('SLV', 'El Salvador'),
('SUR', 'Surinam'),
('SXM', 'San Martin'),
('TTO', 'Trinidad y Tobago'),
('URY', 'Uruguay'),
('VCT', 'San Vicente y las Granadinas'),
('VEN', 'Venezuela');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservacion`
--

DROP TABLE IF EXISTS `reservacion`;
CREATE TABLE IF NOT EXISTS `reservacion` (
  `IDReser` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `FechaInicio` date NOT NULL,
  `Fechafin` date NOT NULL,
  `DiasEstima` int(11) NOT NULL,
  `Creacion` date NOT NULL,
  `Habitacion` char(1) NOT NULL,
  `Estado` char(1) NOT NULL,
  `NumHabitacion` varchar(5) NOT NULL,
  PRIMARY KEY (`IDReser`),
  UNIQUE KEY `IDReser` (`IDReser`),
  KEY `FK_EstadoReser` (`Estado`),
  KEY `FK_ReserTHabi` (`Habitacion`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reservacion`
--

INSERT INTO `reservacion` (`IDReser`, `FechaInicio`, `Fechafin`, `DiasEstima`, `Creacion`, `Habitacion`, `Estado`, `NumHabitacion`) VALUES
(1, '2020-08-26', '2020-08-29', 4, '2020-08-10', 'D', 'E', '205');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservacion_visitante`
--

DROP TABLE IF EXISTS `reservacion_visitante`;
CREATE TABLE IF NOT EXISTS `reservacion_visitante` (
  `IDReserVisi` int(11) NOT NULL AUTO_INCREMENT,
  `IDReser` int(11) NOT NULL,
  `IDVisi` int(11) NOT NULL,
  PRIMARY KEY (`IDReserVisi`),
  KEY `FK_ReserID` (`IDReser`),
  KEY `FK_IDVisi` (`IDVisi`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

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
  `ID` char(5) NOT NULL,
  `TipoHabitacion` varchar(5) NOT NULL,
  `Costo` float NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipohabitacion`
--

INSERT INTO `tipohabitacion` (`ID`, `TipoHabitacion`, `Costo`) VALUES
('I', 'Indvi', 100),
('D', 'Doble', 200),
('T', 'Tripl', 300),
('O', 'Otro', 0);

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
(3, 'Usuario', 'Principal', 'nombre', 'derechoscopio@gmail.com', '664-000-0000', 'S'),
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `visitante`
--

INSERT INTO `visitante` (`IDVisi`, `Nombre`, `Telefono`, `Fecha_nac`, `IDNacion`, `fecha_llegada`, `hora_llegada`, `cita_consulado`, `fecha_registro`) VALUES
(1, 'Jaime Carrillo Ramos', '6644953708', '2020-08-02', 'BOL', '2020-08-12', '16:14:00', '11:20:00', '2020-08-10 00:00:00');

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
