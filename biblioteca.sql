-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-01-2018 a las 21:58:24
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento`
--

CREATE TABLE `documento` (
  `codigo` int(11) NOT NULL,
  `titulo` varchar(50) DEFAULT NULL,
  `lugar` varchar(50) DEFAULT NULL,
  `autor` varchar(50) DEFAULT NULL,
  `fechaingreso` date DEFAULT NULL,
  `numpaginas` int(10) DEFAULT NULL,
  `pais` varchar(50) DEFAULT NULL,
  `numero` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `documento`
--

INSERT INTO `documento` (`codigo`, `titulo`, `lugar`, `autor`, `fechaingreso`, `numpaginas`, `pais`, `numero`) VALUES
(24, 'Documento Libro', 'Quitp', 'dddd', '2008-08-08', 80, 'Belgica', 200),
(25, 'Documento Libro', 'Quitp', 'dddd', '2008-08-08', 80, 'Belgica', 200),
(26, 'Documento Libro', 'Quitp', 'dddd', '2008-08-08', 80, 'Belgica', 200),
(27, 'Documento Libro', 'Quitp', 'dddd', '2008-08-08', 80, 'Belgica', 200),
(28, 'Documento Libro', 'Quitp', 'dddd', '2008-08-08', 80, 'Belgica', 200),
(29, 'Documento Libro', 'Quitp', 'dddd', '2008-08-08', 80, 'Belgica', 200),
(30, 'Documento Libro', 'Quitp', 'dddd', '2008-08-08', 80, 'Belgica', 200),
(31, 'Documento Libro', 'Quitp', 'dddd', '2008-08-08', 80, 'Belgica', 200),
(32, 'Documento Libro', 'Quitp', 'dddd', '2008-08-08', 80, 'Belgica', 200),
(33, 'Documento Libro', 'Quitp', 'dddd', '2008-08-08', 80, 'Belgica', 200),
(34, 'Documento Libro', 'Quitp', 'dddd', '2008-08-08', 80, 'Belgica', 200),
(35, 'Documento Libro', 'Quitp', 'dddd', '2008-08-08', 80, 'Belgica', 200),
(36, 'Documento Libro', 'Quitp', 'dddd', '2008-08-08', 80, 'Belgica', 200),
(37, 'Documento Libro', 'Quitp', 'dddd', '2008-08-08', 80, 'Belgica', 200),
(38, 'Documento Libro', 'Quitp', 'dddd', '2008-08-08', 80, 'Belgica', 200),
(39, 'Documento Libro', 'Quitp', 'dddd', '2008-08-08', 80, 'Belgica', 200),
(40, 'Documento Libro', 'Quitp', 'dddd', '2008-08-08', 80, 'Belgica', 200),
(41, 'Documento Libro', 'Quitp', 'dddd', '2008-08-08', 80, 'Belgica', 200),
(42, 'Documento Libro', 'Quitp', 'dddd', '2008-08-08', 80, 'Belgica', 200),
(43, 'Documento Libro', 'Quitp', 'dddd', '2008-08-08', 80, 'Belgica', 200),
(44, 'Documento Libro', 'Quitp', 'dddd', '2008-08-08', 80, 'Belgica', 200),
(45, 'Documento Libro', 'Quitp', 'dddd', '2008-08-08', 80, 'Belgica', 200),
(52, 'aaaa', 'aaaa', 'aaa', '2013-05-15', 123, 'aaaa', 12),
(53, 'aaa', 'aaa', 'aaa', '0000-00-00', 45, 'aaaa', 34);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `codigo` int(11) NOT NULL,
  `edicion` varchar(50) DEFAULT NULL,
  `editorial` varchar(50) DEFAULT NULL,
  `capitulos` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`codigo`, `edicion`, `editorial`, `capitulos`) VALUES
(52, 'sasa', 'asas', '12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revista`
--

CREATE TABLE `revista` (
  `codigo` int(11) NOT NULL,
  `volumen` varchar(50) DEFAULT NULL,
  `fechaEdicion` date DEFAULT NULL,
  `temas` varchar(50) DEFAULT NULL,
  `secciones` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `revista`
--

INSERT INTO `revista` (`codigo`, `volumen`, `fechaEdicion`, `temas`, `secciones`) VALUES
(53, 'aaa', '0000-00-00', 'asas', 'asas');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `documento`
--
ALTER TABLE `documento`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `revista`
--
ALTER TABLE `revista`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `documento`
--
ALTER TABLE `documento`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libro`
--
ALTER TABLE `libro`
  ADD CONSTRAINT `FK_libro` FOREIGN KEY (`codigo`) REFERENCES `documento` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `revista`
--
ALTER TABLE `revista`
  ADD CONSTRAINT `FK_revista` FOREIGN KEY (`codigo`) REFERENCES `documento` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
