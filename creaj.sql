-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-09-2021 a las 07:32:26
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `creaj`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lecciones`
--

CREATE TABLE `lecciones` (
  `Lid` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `lecciones`
--

INSERT INTO `lecciones` (`Lid`, `nombre`) VALUES
(1, 'A '),
(2, 'E'),
(3, 'I'),
(4, 'O'),
(5, 'U'),
(6, 'L'),
(7, 'S'),
(8, 'P'),
(9, 'M'),
(10, 'T'),
(11, 'N'),
(12, 'D'),
(13, 'Rf'),
(14, 'RR'),
(15, 'Rs'),
(16, 'C'),
(17, 'Q'),
(18, 'Y'),
(19, 'J'),
(20, 'B'),
(21, 'V'),
(22, 'H'),
(23, 'CeCi'),
(24, 'Z'),
(25, 'LL'),
(26, 'F'),
(27, 'CH'),
(28, 'Ni'),
(29, 'G'),
(30, 'GeGi'),
(31, 'GueGui'),
(32, 'Gue_Gui'),
(33, 'K'),
(34, 'X'),
(35, 'W'),
(36, 'Pl'),
(37, 'Pr'),
(38, 'Tr'),
(39, 'Dr'),
(40, 'Bl'),
(41, 'Br'),
(42, 'Fl'),
(43, 'Fr'),
(44, 'Cl'),
(45, 'Cr'),
(46, 'Gl'),
(47, 'Gr'),
(48, 'Tl'),
(49, 'As'),
(50, 'Al'),
(51, 'An'),
(52, 'Ar'),
(53, 'Am'),
(54, 'Ay'),
(55, 'Ax'),
(56, 'n/a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `NombreUsuario` varchar(100) NOT NULL,
  `CodigoUsuario` int(8) NOT NULL,
  `password` varchar(100) NOT NULL,
  `Grado` varchar(20) NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `puesto` varchar(20) NOT NULL,
  `Leccion` varchar(20) NOT NULL,
  `completas` int(5) NOT NULL,
  `totalCompletas` int(100) NOT NULL,
  `LeccionAsignada` varchar(20) NOT NULL,
  `tiempo` int(100) NOT NULL,
  `seccion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`NombreUsuario`, `CodigoUsuario`, `password`, `Grado`, `IdUsuario`, `puesto`, `Leccion`, `completas`, `totalCompletas`, `LeccionAsignada`, `tiempo`, `seccion`) VALUES
('Coordinadora', 20090002, '83b9db9763a661dc0db08cb76a7c66ad6694c97703752ec77bd08eccbe6cc2d0', 'Coordinadora', 2, 'Coordinadora', '0', 0, 0, '', 0, ''),
('Sibrián Arriola Yahir Stewart', 20090001, 'c230223dd4031407f20797d494d3d20598db1930a852b18c72a6f78f68f69aa0', 'Kinder 6', 3, 'Alumno', '1', 0, 0, '2', 5, 'A'),
('Solano Peña  Francisco Eduardo', 20090019, 'ed3d1f9c41d9490eb71b31ac9a66d03b74112e2a5dfd7a8b0ee58eebed35a44b', 'Kinder 6', 7, 'Alumno', '49', 0, 0, '', 0, 'B'),
('Maestra', 20190363, '51bb2cc5e87423d09bad7c9e74e41ca21d703e9b075048f37451c15c4c3b61d7', 'Maestra', 8, 'Maestra', '0', 0, 0, '', 0, ''),
('Segura Acosta Francisco Alexander', 20190364, '9f2a08fde416cef2158943241fee1dd8f3cca092afddef1d53ae82318e05f63e', 'Kinder 6', 11, 'Alumno', '1', 0, 0, '1', 0, 'A');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `lecciones`
--
ALTER TABLE `lecciones`
  ADD PRIMARY KEY (`Lid`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IdUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `lecciones`
--
ALTER TABLE `lecciones`
  MODIFY `Lid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
