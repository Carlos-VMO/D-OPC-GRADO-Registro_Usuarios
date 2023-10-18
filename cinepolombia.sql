-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-10-2023 a las 05:53:40
-- Versión del servidor: 10.1.39-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cinepolombia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `tags` varchar(100) NOT NULL,
  `thumbnail` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `post`
--

INSERT INTO `post` (`post_id`, `title`, `description`, `tags`, `thumbnail`, `created_at`) VALUES
(1, 'Pelicula test', 'Fusce tincidunt lorem quis vestibulum porta. Fusce rhoncus at sapien nec posuere. Pellentesque quis ex suscipit, posuere libero ac, laoreet nunc. Ut diam tortor, rutrum in metus ac, semper posuere lorem. Phasellus lorem purus, iaculis sed posuere quis, pharetra ac ligula. Donec lacus lorem, vestibulum sed molestie eget, iaculis vitae purus. Donec aliquam, lectus vel porttitor tristique, lectus metus blandit orci, in pellentesque dui diam eu risus. Praesent eleifend massa velit, id rutrum orci euismod sit amet. Proin accumsan venenatis nunc non pharetra.', 'terror,horror,suspenso', 'carousel-3.jpg', '2023-10-18 02:18:48'),
(20, 'Test publicaciÃ³n editado', 'Nunc pulvinar nulla eros, id dictum leo imperdiet varius. Sed non vehicula felis. Etiam imperdiet arcu neque, eu elementum augue porttitor vitae. Suspendisse non finibus nulla. Nunc ac suscipit odio. Aenean vitae lorem augue. Morbi neque ligula, euismod in cursus a, condimentum at leo. Morbi non mauris neque. Curabitur consequat pellentesque rhoncus. Phasellus facilisis ac nibh vel pretium. editado', 'suspenso,horror,aventura', 'image(1).png', '2023-10-18 03:13:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tag`
--

CREATE TABLE `tag` (
  `tag_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tag`
--

INSERT INTO `tag` (`tag_id`, `name`) VALUES
(10, 'terror'),
(11, 'suspenso'),
(12, 'horror'),
(13, 'aventura'),
(14, 'romance');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_`
--

CREATE TABLE `user_` (
  `user_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `email` varchar(70) NOT NULL,
  `password` varchar(30) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user_`
--

INSERT INTO `user_` (`user_id`, `name`, `surname`, `email`, `password`, `image`) VALUES
(21, 'Carlos editado', 'Pinilla', 'pinillacarlos892@gmail.com', '$2y$10$t4/Mde97Rf2dmf7qn/WJLOl', 'esperado-3.jpg'),
(22, 'Alejo editado', 'Sanchez editado', 'alejo123editado@gmail.com', '$2y$10$6NM969gMLfyZX8CbvLG7LOR', 'carousel-3.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indices de la tabla `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indices de la tabla `user_`
--
ALTER TABLE `user_`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `tag`
--
ALTER TABLE `tag`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `user_`
--
ALTER TABLE `user_`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
