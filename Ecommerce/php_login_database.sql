-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-06-2023 a las 09:07:03
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
-- Base de datos: `php_login_database`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imc`
--

CREATE TABLE `imc` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `sexo` text NOT NULL,
  `peso` float NOT NULL,
  `estatura` float NOT NULL,
  `imc` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `imc`
--

INSERT INTO `imc` (`id`, `nombre`, `sexo`, `peso`, `estatura`, `imc`) VALUES
(1, 'Yahir', 'hombre', 80, 1.7, 27.6817),
(2, 'AMyahirGC', 'hombre', 80, 1.7, 27.6817),
(3, 'Fermina', 'mujer', 80, 1.7, 27.6817);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `lugar` varchar(200) NOT NULL,
  `telefono` int(10) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `sexo`, `email`, `lugar`, `telefono`, `password`) VALUES
(5, 'AMyahirGC', 'hombre', 'isidrocej@gmail.com', 'zacualtipan', 2147483647, '$2y$10$tmBCWrUVi4mFxSca8B2MpeO6vRXdzeer/Nl851BkRHgTtZK3gGtz6'),
(6, 'AMyahirGC', 'hombre', 'isidrocej@gmail.com', 'zacualtipan', 2147483647, '$2y$10$1iUgeiHepJRsSc6x7s0JXuSKTgP09ZoICbOd1SF/we7dcCJnNIk6O'),
(7, 'AMyahirGC', 'hombre', 'isidrocej@gmail.com', 'zacualtipan', 2147483647, '$2y$10$q63m7bgqTe7YMYI2Sb7I5uIscqt.tklHX9BYhtS0wTtH5EGnSpc/2'),
(8, 'AMyahirGC', 'hombre', 'isidrocej@gmail.com', 'zacualtipan', 2147483647, '$2y$10$ac7MaTc5aeI/NV.SKBFjduw0vO8VzJTv6QNQicw.U8ILls5rvMIna');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `imc`
--
ALTER TABLE `imc`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `imc`
--
ALTER TABLE `imc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
