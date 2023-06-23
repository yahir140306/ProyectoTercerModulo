-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-06-2023 a las 18:55:16
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
  `nombre` text NOT NULL,
  `sexo` text NOT NULL,
  `peso` float NOT NULL,
  `estatura` float NOT NULL,
  `imc` float NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `imc`
--

INSERT INTO `imc` (`id`, `nombre`, `sexo`, `peso`, `estatura`, `imc`, `fecha`) VALUES
(4, 'Paco', 'hombre', 73, 1.53, 31.1846, '2023-06-18'),
(5, 'Paco', 'hombre', 73, 1.53, 31.1846, '2023-06-18'),
(6, 'Paco', 'hombre', 73, 1.53, 31.1846, '2023-06-18'),
(7, 'Paco', 'hombre', 73, 1.53, 31.1846, '2023-06-18'),
(8, 'Paco', 'hombre', 73, 1.53, 31.1846, '2023-06-18'),
(9, 'Fermina', 'mujer', 78, 1.6, 30.4688, '2023-06-18'),
(10, 'Enok', 'mujer', 85, 1.75, 27.7551, '2023-06-18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productoscomprados`
--

CREATE TABLE `productoscomprados` (
  `id` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` float NOT NULL,
  `precioPorCantidad` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productoscomprados`
--

INSERT INTO `productoscomprados` (`id`, `titulo`, `cantidad`, `precio`, `precioPorCantidad`) VALUES
(1, 'Batidos de reemplazo', 3, 146.6, 439.8),
(2, 'Barritas energeticas', 2, 134.5, 269),
(3, 'Batidos de reemplazo', 2, 146.6, 293.2),
(4, 'Glutamina', 2, 649, 1298),
(5, 'Colageno', 3, 549, 1647),
(6, 'Glutamina', 3, 649, 1947);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `sexo` text NOT NULL,
  `email` text NOT NULL,
  `lugar` text NOT NULL,
  `telefono` int(10) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `sexo`, `email`, `lugar`, `telefono`, `password`) VALUES
(1, 'Paco', 'hombre', 'jajajaja@gmail.com', 'italia', 1234567890, '$2y$10$W0ZDW21p0TDSOy1zGClf0uVnYsCl/MTcBKQjHb4esZUud5DkRK.cG'),
(2, 'AMyahirGC', 'hombre', 'isidrocej@gmail.com', 'italia', 2147483647, '$2y$10$E7hW4P.LD2LxvbyxVFmOMONrYTjgnKD45cQzAPMYgDxTu0q3d4ZTq'),
(3, 'AMyahirGC', 'hombre', 'isidrocej@gmail.com', 'zacualtipan', 2147483647, '$2y$10$TO9TANRT.dJTP443EXcDZuqJBRekc/DaxqzMNyd/L6ZZxEllqFz8S'),
(4, 'Paco', 'hombre', 'isidrocej@gmail.com', 'china', 2147483647, '$2y$10$bFAy2fVpmpMzBcwDXQE5zejYXaK6jLe4lKgWp9uYOwBpW3cMSD6Be'),
(5, 'Panchito', 'hombre', 'miau@gmail.com', 'japon', 234567891, '$2y$10$8HbzRhhxbjgglG5EIrFSZOH4JsDYjYubUvEu7fafCG5tSphuHHe7G'),
(6, 'Panchito', 'hombre', 'nose@gmail.com', 'peru', 1234567890, '$2y$10$K67BfR7HUipHJVAinIinbu4OOieypRPNNgrAzrVTcA72ay.gMyW9u'),
(7, 'nose', 'hombre', 'nose@gmail.com', 'america', 5315461, '$2y$10$VnHPmEZe84Eys.QpFGyC4eCQBNDfP8lmeicYuSJWFrdJ3hfiqiuQ2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `imc`
--
ALTER TABLE `imc`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productoscomprados`
--
ALTER TABLE `productoscomprados`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `productoscomprados`
--
ALTER TABLE `productoscomprados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
