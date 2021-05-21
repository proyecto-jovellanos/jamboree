MiguelMorci #5050
Korshenn — 01 / 05 / 2021 no se como se hace MiguelMorci — 02 / 05 / 2021 si alguno quiere darle estoy por aqui MiguelMorci — 02 / 05 / 2021 https: / / sorgalla.com / jcarousel / jCarousel - Riding carousels with jQuery jCarousel - Riding carousels with jQuery jCarousel is a jQuery plugin for controlling a list of items in horizontal
or vertical order.It provides a full - featured
and flexible toolset for navigating any HTML based content in a carousel - like fashion.Korshenn — 02 / 05 / 2021 Tipo de archivo adjunto: archive Snares.rar 533.61 KB MiguelMorci — 02 / 05 / 2021 Ty Korshenn — 02 / 05 / 2021 Tipo de archivo adjunto: archive Kicks.rar 925.00 KB Tipo de archivo adjunto: archive Percussion.rar 211.89 KB MiguelMorci — 02 / 05 / 2021 me falta algo de platos y claps Korshenn — 02 / 05 / 2021 Tipo de archivo adjunto: archive Claps.rar 695.90 KB Tipo de archivo adjunto: archive Hats.rar 569.84 KB MiguelMorci — 02 / 05 / 2021 grande said Korshenn — 06 / 05 / 2021 -- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-05-2021 a las 20:03:26
Expandir jamboree.sql 2 KB MiguelMorci — 06 / 05 / 2021 Habemus bbdd ? Korshenn — 06 / 05 / 2021 tendremos que autentificar con la base de datos pero sencilla un user useame y contraseña para tener la autentificacion good MiguelMorci — 06 / 05 / 2021 Dabuti Iván ? Como ves que vayamos haciendo los modelos entidad relación ? MiguelMorci — 07 / 05 / 2021 Dudas para PABLO.Al registrar,
enviar correo al ususairo de confirmación ? IVANGOMEZ2001__ESP — 08 / 05 / 2021 @import url(
  'https://fonts.googleapis.com/css2?family=Cormorant:wght@700&display=swap'
);
@import url(
  'https://fonts.googleapis.com/css2?family=Nunito&display=swap'
);
@title: Cormorant,
serif;
@text: Nunito,
sans - serif;
@sombreado: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
Expandir less.txt 7 KB MiguelMorci — 08 / 05 / 2021 Que es eso ? IVANGOMEZ2001__ESP — 08 / 05 / 2021 es para said MiguelMorci — 08 / 05 / 2021 Me ha salido lo de coger los botones pulsados y meterlos para Json chavaless :eggplant: Os ayudo con algo ? ivi1234 — 08 / 05 / 2021 Q guay Vamos a intentar lo del carrusel MiguelMorci — 08 / 05 / 2021 puedo ponerme en el directo ? ivi1234 — 08 / 05 / 2021 Said no te escucho Como quieras IVANGOMEZ2001__ESP — 08 / 05 / 2021 < link rel = "stylesheet/less" href = "audioteca.less" > < script src = "less.min.js" type = "text/javascript" > < / script > ivi1234 — 08 / 05 / 2021 Chavales me voy a mangare IVANGOMEZ2001__ESP — 08 / 05 / 2021 < script src = "http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js%22%3E</script>
<script src=" http: / / ajax.googleapis.com / ajax / libs / jquery / 1.10.2 / jquery.min.js %22 %3E < / script > Korshenn — 17 / 05 / 2021 Jamboree se trata de una página web que actúa como foro musical y estudio musical teniendo as í una plataforma que permite a los usuarios trabajar únicamente en la página web.Esta página Web está estructurada inicialmente como una propia red social donde el usuario deberá iniciar sesión o registrarse si no lo está.Una vez esté consiga acceder a la página web tendrá la opción de elegir si va a escuchar música o si va a crear música dependiendo de lo que quiera.En el primer caso si el usuario únicamente quiere escuchar música entrara al foro para ver las creaciones de los diversos usuarios y teniendo este la capacidad de elegir por etiquetas el estilo de música que desee escuchar.En el caso de de quiera crear música el usuario o ya sea seguir alguna cancion que tenga sin terminar podrá elegir la opción de ir a su librería y cargar algún archivo o ir al estudio y empezar de 0.MiguelMorci — 17 / 05 / 2021 Subid las cosillas q hagáis hoy porfi Y as í le meto mano yo a la doc y tal Como lo lleváis ? Korshenn — 17 / 05 / 2021 ya esta lo de la docu ivi1234 — 17 / 05 / 2021 El modelo está ivi1234 — 17 / 05 / 2021 La docu la hago en un ratillo MiguelMorci — 17 / 05 / 2021 Nice MiguelMorci — ayer a las 19 :32 Tipo de archivo adjunto: archive Miguel_Angel_Morcillo_Gutierro.zip 7.67 KB Korshenn — ayer a las 19 :48 window.onload = function() { fetch('server.php', { method: 'POST' }).then(res = > { return res.json() }).then(resp = > console.log(resp)) console.log('hola') } < ? php include("db.php");
$consulta = "SELECT * FROM canciones";
$resultado = mysqli_query($conexion, $consulta);
$resultado = json_encode($resultado);
echo $resultado;
? > IVANGOMEZ2001__ESP — ayer a las 19 :56 Documentación Jamboree Tipo de archivo adjunto: document Documentacion_Jamboree.docx 229.86 KB MiguelMorci — ayer a las 19 :57 vale OJO acabo de hacer pull request,
con el fetch ya hecho Korshenn — hoy a las 11 :34 -- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-05-2021 a las 11:34:07
Expandir jamboree_3.sql 4 KB -- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-05-2021 a las 11:34:07
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.4
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
  `Name` varchar(15) COLLATE latin1_spanish_ci DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1 COLLATE = latin1_spanish_ci;
--
-- Volcado de datos para la tabla `canciones`
--
INSERT INTO `canciones` (
    `Id_Cancion`,
    `Track`,
    `Etiquetas`,
    `Id_User`,
    `Name`
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
  );
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
  ('p', 'p', '0001-11-11', 'p', 9);
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
  AUTO_INCREMENT = 3;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
MODIFY `Id_User` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 10;
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
jamboree_3.sql 4 KB