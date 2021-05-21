-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-05-2021 a las 12:38:56
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;
--
-- Base de datos: `jamboree`
--
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `canciones`
--
CREATE TABLE `canciones` (
  `Id_Cancion` int(11) NOT NULL,
  `Track` varchar(500) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Etiquetas` varchar(25) COLLATE latin1_spanish_ci DEFAULT NULL,
  `Id_User` int(11) DEFAULT NULL,
  `Nombre` varchar(15) COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1 COLLATE = latin1_spanish_ci;
--
-- Volcado de datos para la tabla `canciones`
--
INSERT INTO `canciones` (
    `Id_Cancion`,
    `Track`,
    `Etiquetas`,
    `Id_User`,
    `Nombre`
  )
VALUES (
    1,
    '{\r\nkick:{001011001010101010010}\r\nclap:{001011001010101010010}\r\nhat:{001011001010101010010}\r\nsnare:{001011001010101010010}\r\n}',
    'rock',
    1,
    'Rockero'
  ),
  (
    2,
    'kick:{001011001010101010010}\r\nkick:{001011001010101010010}\r\nkick:{001011001010101010010}\r\nkick:{001011001010101010010}',
    'edm',
    6,
    'edm'
  ),
  (3, '01010101010101', 'HOLA', 1, 'prueba');
-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `users`
--
CREATE TABLE `users` (
  `Username` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `Contra` varchar(10) COLLATE latin1_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `etiquetas` varchar(25) COLLATE latin1_spanish_ci NOT NULL,
  `Id_User` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1 COLLATE = latin1_spanish_ci;
--
-- Volcado de datos para la tabla `users`
--
INSERT INTO `users` (
    `Username`,
    `Contra`,
    `fecha`,
    `etiquetas`,
    `Id_User`
  )
VALUES (
    'ivan',
    '12345',
    '2015-06-20',
    'rock y maluma',
    1
  ),
  ('said', 'boss', '2021-05-23', 'daddy yanke', 6),
  ('morciele', 'morci', '2021-05-25', 'eee', 7),
  ('pablo', 'pablo', '2021-05-10', 'sdfadf', 8),
  ('p', 'p', '0001-11-11', 'p', 9),
  ('m', 'm', '0005-05-05', 'm', 10);
--
-- Índices para tablas volcadas
--
--
-- Indices de la tabla `canciones`
--
ALTER TABLE `canciones`
ADD PRIMARY KEY (`Id_Cancion`),
  ADD KEY `Username` (`Id_User`);
--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
ADD PRIMARY KEY (`Id_User`),
  ADD UNIQUE KEY `Username` (`Username`);
--
-- AUTO_INCREMENT de las tablas volcadas
--
--
-- AUTO_INCREMENT de la tabla `canciones`
--
ALTER TABLE `canciones`
MODIFY `Id_Cancion` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 4;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
MODIFY `Id_User` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 12;
--
-- Restricciones para tablas volcadas
--
--
-- Filtros para la tabla `canciones`
--
ALTER TABLE `canciones`
ADD CONSTRAINT `Username` FOREIGN KEY (`Id_User`) REFERENCES `users` (`Id_User`);
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;