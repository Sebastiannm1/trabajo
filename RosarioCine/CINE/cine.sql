-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-10-2023 a las 21:50:29
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cine`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `clave` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `usuario`, `nombre`, `apellido`, `clave`) VALUES
(45, 'sebastianmerlo', 'sebastian', 'Merlo', '12345678'),
(49, '', '$2y$10$y9APahNIpOZ1s8xLNnqXe.oO03yIDZ9pTVLdE0x3uh6JQQV2Y2tyG', '', '0'),
(50, 'ejemplo', '$2y$10$.wQmYrzOyIqadEBwCTi6FuBeZozT9YeEFGDg.E4Z.vlujArD5AzHm', 'Fulano ', '0'),
(51, 'ejemplo1', '$2y$10$Wi4Rfok8iLVfyCcsYSZyh.K2StxMv80AUJ3iXfE8VrbyJeav3Gtpm', 'Fulano ', '0'),
(52, 'ejemplo2', '$2y$10$RVc3rltfrc.2aEWxDe5xNeIGV.nbqQ1NQ6xtZqgyYTXNBgrAyFio.', 'Fulano ', '0'),
(53, 'ejemplo3', 'Fulano ', 'tal', '0'),
(54, 'ejemplo4', 'Fulano ', 'tal', '$2y$10$Nktz9ieZpQxDeHxWpQq2UuoDAa9zCMMc4ipd5xAHqwXcTABOVfEB6'),
(55, 'ejemplo5', 'Fulano ', 'Fulano', '$2y$10$gYxR47le2SD3FRh1RCMstO1de2pXnPAwo0zMwTpbMuIHUKK9E4SCi'),
(56, 'ejemplo5', 'Fulano ', 'Fulano', '$2y$10$M9Ndb43fRfVHkvYblecfqO0jlxjoC94WaCXxA9O.iJgStBZws0JmG'),
(57, 'hola', 'hola', 'hola', '$2y$10$EPEuMITf3PRu9fM3xWaumOSYjIuXSTnwxrGSKHaUKrqv0ReeBCq.2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nom_categoria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nom_categoria`) VALUES
(1, 'Acción'),
(2, 'Comedia'),
(3, 'Drama'),
(4, 'Aventura'),
(5, 'Animación'),
(6, 'Fantasia'),
(7, 'Suspenso'),
(8, 'Terror'),
(9, 'Misterio'),
(10, 'Superhéroes'),
(11, 'Musical');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `id_pelicula` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `trama` varchar(255) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `publico` varchar(255) NOT NULL,
  `origen` varchar(255) NOT NULL,
  `duracion` int(11) NOT NULL,
  `idioma` varchar(255) NOT NULL,
  `director` varchar(255) NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`id_pelicula`, `nombre`, `trama`, `id_categoria`, `publico`, `origen`, `duracion`, `idioma`, `director`, `precio`) VALUES
(12, 'Barbie', 'Después de ser expulsada de Barbieland por no ser una muñeca de aspecto perfecto Barbie parte hacia el mundo humano para encontrar la verdadera felicidad.', 11, 'Después de ser expulsada de Barbieland por no ser una muñeca de aspecto perfecto Barbie parte hacia el mundo humano para encontrar la verdadera felicidad.', 'Después de ser expulsada de Barbieland por no ser una muñeca de aspecto perfecto Barbie parte hacia el mundo humano para encontrar la verdadera felicidad.', 0, '13', '0', 114.00),
(13, 'Oppenheimer', 'Durante la Segunda Guerra Mundial el teniente general Leslie Groves designa al físico J. Robert Oppenheimer para un grupo de trabajo que está desarrollando el Proyecto Manhattan cuyo objetivo consiste en fabricar la primera bomba atomica.', 3, '+14', 'Estados Unidos', 180, 'Subtitulada', 'Christopher Nolan', 2200.88),
(14, 'Cacería en Venecia', 'En la década de 1940 en la Venecia de la posguerra el célebre detective belga Hércules Poirot se ve obligado a abandonar el retiro profesional para investigar el asesinato cometido durante una sesión de espiritismo en la que él mismo participaba.', 7, '+12', 'Reino Unido', 103, 'Castellano', 'Kenneth Branagh', 2000.88),
(15, 'La Monja II', 'Francia, 1956. El asesinato de un sacerdote provoca que un mal demoníaco se extienda sin control. La hermana Irene deberá enfrentarse, de nuevo, a la monja satánica Valak.', 8, '+13', 'Estados Unidos', 109, 'Castellano', 'Michael Chaves', 1900.88),
(16, 'Wonka', 'La historia se centra en el joven Willy Wonka y en cómo conoció a los Oompa-Loompas en una de sus primeras aventuras.', 6, 'Todo Público', 'Reino Unido', 150, 'Subtitulada', 'Paul King', 3000.88),
(17, 'Wish: el poder de los deseos', 'En el Reino de Rosas, ubicado en la Península Ibérica, una chica de 17 años llamada Asha siente una oscuridad que nadie más siente, lo que la lleva a una súplica apasionada a las estrellas en un momento de necesidad.', 6, 'Todo Público', 'Estados Unidos', 92, 'Castellano', 'Chris Buck', 3000.88),
(18, 'Blue Beetle', 'una antigua reliquia extraterrestre ,elige al estudiante Jaime Reyes como el huésped simbiótico en cuyo cuerpo resguardarse. A partir de ese momento, Jaime desarrolla una armadura que le otorga poderes increíbles e impredecibles.', 4, 'Todo Público', 'Estados Unidos', 127, 'Español', 'Ángel Manuel Soto', 2000.88),
(19, 'Misión Imposible 7:Sentencia mortal-Parte 1', 'Ethan debe detener a una inteligencia artificial que todas las potencias mundiales codician, la cual se ha vuelto tan poderosa que se rebeló contra sus creadores y ahora es una amenaza en sí misma.', 1, '+13', 'Estados Unidos', 163, 'Subtitulada', 'Christopher McQuarrie', 3000.88),
(20, 'Elementos', 'En una ciudad en la que los elementos de fuego, agua, tierra y aire viven en distritos separados una chica de fuego y un chico de agua descubren que, aunque la sociedad les diga lo contrario, tienen muchas cosas en común.', 4, 'Todo Público', 'Estados Unidos', 110, 'Castellano', 'Peter Sohn', 2100.88),
(21, 'La Sirenita', 'Una joven sirena que anhela conocer el mundo que se extiende donde acaba el mar emerge a la superficie y se enamora del príncipe Eric. Sin embargo, la única manera de estar con él exige hacer un pacto con Úrsula, la perversa bruja del mar.', 5, 'Una joven sirena que anhela conocer el mundo que se extiende donde acaba el mar emerge a la superficie y se enamora del príncipe Eric. Sin embargo, la única manera de estar con él exige hacer un pacto con Úrsula, la perversa bruja del mar.', '..', 18, '0', '0', 135.00),
(22, 'Misántropo', 'La joven, talentosa pero traumatizada agente de policía Eleanor ayuda al FBI a localizar a un francotirador que está perpetrando asesinatos en masa en Baltimore. La mente atormentada de Eleanor es la única que puede predecir sus movimientos.', 1, 'La joven, talentosa pero traumatizada agente de policía Eleanor ayuda al FBI a localizar a un francotirador que está perpetrando asesinatos en masa en Baltimore. La mente atormentada de Eleanor es la única que puede predecir sus movimientos.', 'La joven', 18, '0', '117', 0.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyeccion`
--

CREATE TABLE `proyeccion` (
  `id_proyeccion` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `id_pelicula` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proyeccion`
--

INSERT INTO `proyeccion` (`id_proyeccion`, `fecha`, `id_pelicula`) VALUES
(34, '2023-10-05 19:00:00', 12),
(35, '2023-10-10 15:30:00', 13),
(36, '2023-10-15 18:15:00', 14),
(37, '2023-10-20 20:30:00', 15),
(38, '2023-10-25 16:45:00', 16),
(39, '2023-10-30 14:00:00', 17),
(40, '2023-10-08 17:30:00', 18),
(41, '2023-10-12 19:45:00', 19),
(42, '2023-10-16 14:15:00', 20),
(43, '2023-10-22 21:00:00', 21),
(44, '2023-10-28 18:30:00', 22);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`id_pelicula`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `proyeccion`
--
ALTER TABLE `proyeccion`
  ADD PRIMARY KEY (`id_proyeccion`),
  ADD KEY `id_pelicula` (`id_pelicula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `id_pelicula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `proyeccion`
--
ALTER TABLE `proyeccion`
  MODIFY `id_proyeccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD CONSTRAINT `pelicula_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);

--
-- Filtros para la tabla `proyeccion`
--
ALTER TABLE `proyeccion`
  ADD CONSTRAINT `proyeccion_ibfk_1` FOREIGN KEY (`id_pelicula`) REFERENCES `pelicula` (`id_pelicula`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
