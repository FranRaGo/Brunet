-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 11-07-2025 a las 11:00:59
-- Versión del servidor: 8.0.35
-- Versión de PHP: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `brunet_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`) VALUES
(1, 'A la Brasa'),
(2, 'Entrantes'),
(3, 'Platos Tradicionales'),
(4, 'Vinos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
--

CREATE TABLE `menus` (
  `id` int NOT NULL,
  `precio` varchar(10) NOT NULL,
  `max_personas` int NOT NULL,
  `categoria` varchar(20) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `menus`
--

INSERT INTO `menus` (`id`, `precio`, `max_personas`, `categoria`, `nombre`) VALUES
(1, '19,55', 8, 'diario', ''),
(4, '20', 4, 'grupo', 'EntreSemana');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_platos`
--

CREATE TABLE `menu_platos` (
  `id` int NOT NULL,
  `comentario` varchar(20) NOT NULL,
  `categoria` int DEFAULT NULL,
  `plato_id` int NOT NULL,
  `menu_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `menu_platos`
--

INSERT INTO `menu_platos` (`id`, `comentario`, `categoria`, `plato_id`, `menu_id`) VALUES
(18, 'hol', 3, 35, 1),
(19, '', 2, 25, 1),
(21, '+1€', 1, 26, 1),
(22, '+1€', 1, 26, 1),
(25, '+3€', 1, 25, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `platos`
--

CREATE TABLE `platos` (
  `id` int NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio` decimal(6,2) DEFAULT NULL,
  `categoria_id` int DEFAULT NULL,
  `sugerencia` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `platos`
--

INSERT INTO `platos` (`id`, `nombre`, `precio`, `categoria_id`, `sugerencia`) VALUES
(1, 'Ensalada de temporada', 9.95, 2, 1),
(2, 'Ensalada de queso de cabra y frutos secos', 9.50, 2, NULL),
(3, 'Ensalada de tomate, cebolla tierna, anchoas y aceitunas', 12.75, 2, NULL),
(4, 'Xató', 12.80, 2, NULL),
(5, 'Esqueixada de bacalao', 11.90, 2, NULL),
(6, 'Tostada con escalivada y anchoas', 9.30, 2, NULL),
(7, 'Jamón ibérico cortado a mano', 16.90, 2, NULL),
(8, 'Queso manchego curado', 9.75, 2, NULL),
(9, 'Canelones de asado caseros', 9.35, 2, NULL),
(10, 'Macarrones a la boloñesa', 9.60, 2, NULL),
(11, 'Escalivada con anchoas', 9.50, 2, NULL),
(12, 'Croquetas caseras de carne asada', 7.90, 2, NULL),
(13, 'Alcachofas rebozadas', 7.80, 2, NULL),
(14, 'Cazuelita de escalivada con queso de cabra', 8.90, 2, NULL),
(15, 'Berenjenas con miel', 8.85, 2, NULL),
(16, 'Patatas bravas', 6.95, 2, NULL),
(17, 'Cabrito empanado', 22.90, 3, NULL),
(18, 'Albóndigas con setas', 13.70, 3, NULL),
(19, 'Ternera con setas', 14.95, 3, NULL),
(20, 'Carrilleras ibéricas deshuesadas', 13.70, 3, NULL),
(21, 'Callos y morro', 13.90, 3, NULL),
(22, 'Brandada de bacalao', 16.90, 3, NULL),
(23, 'Calamares pequeños con cebolla confitada', 10.90, 3, NULL),
(24, 'Caracoles en salsa', 13.90, 3, NULL),
(25, 'Entrecot de ternera (aprox. 375g)', 19.90, 1, 0),
(26, 'Entrecot de vaca (aprox. 400g)', 19.90, 1, NULL),
(27, 'Chuletón de vaca (aprox. 1kg)', 47.00, 1, NULL),
(28, 'Hamburguesa de buey con foie y reducción de Pedro Ximénez', 14.90, 1, NULL),
(29, 'Solomillo con escalivada y espárragos', 23.00, 1, NULL),
(30, 'Solomillo con foie', 26.90, 1, NULL),
(31, 'Manitas de cerdo', 12.80, 1, NULL),
(32, 'Butifarra ibérica con alubias del ganxet', 10.50, 1, NULL),
(33, 'Surtido de butifarras con alubias', 14.45, 1, NULL),
(34, 'Pollo a la brasa (muslo o pechuga)', 9.50, 1, NULL),
(35, 'Conejo a la brasa (muslo o paletilla)', 9.95, 1, NULL),
(36, 'Cordero a la brasa (costilla, medallón y muslo)', 14.50, 1, NULL),
(37, 'Costillas de cordero con pimientos', 15.90, 1, NULL),
(38, 'Patatas', 2.00, 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id` int NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `zona` enum('comedor','terraza') NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `personas` int NOT NULL,
  `turno` enum('mañana','tarde','noche') NOT NULL,
  `menu_escogido` varchar(100) DEFAULT NULL,
  `token_cancelacion` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoraciones`
--

CREATE TABLE `valoraciones` (
  `id` int NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `comentario` text NOT NULL,
  `puntuacion` int DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menu_platos`
--
ALTER TABLE `menu_platos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_plato` (`plato_id`),
  ADD KEY `fk_menu_platos` (`menu_id`);

--
-- Indices de la tabla `platos`
--
ALTER TABLE `platos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `menu_platos`
--
ALTER TABLE `menu_platos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `platos`
--
ALTER TABLE `platos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `valoraciones`
--
ALTER TABLE `valoraciones`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `menu_platos`
--
ALTER TABLE `menu_platos`
  ADD CONSTRAINT `fk_menu_platos` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_plato` FOREIGN KEY (`plato_id`) REFERENCES `platos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `platos`
--
ALTER TABLE `platos`
  ADD CONSTRAINT `platos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
