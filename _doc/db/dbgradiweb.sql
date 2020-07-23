-- phpMyAdmin SQL Dump
-- version 4.2.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-07-2020 a las 20:27:28
-- Versión del servidor: 5.7.19
-- Versión de PHP: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `dbgradiweb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
`id` bigint(20) NOT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `tipo_documento_id` int(11) DEFAULT NULL,
  `documento` int(11) DEFAULT NULL,
  `telefono` varchar(30) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombres`, `tipo_documento_id`, `documento`, `telefono`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Luis Avila', 5, 1234567, '3023322989', 'gustavoavilabar@gmail.com', '2020-07-22 05:00:00', '2020-07-23 07:19:49'),
(15, 'Gustavo Jimenez', 5, 6547885, NULL, NULL, '2020-07-23 18:13:18', '2020-07-23 18:13:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes_vehiculos`
--

CREATE TABLE IF NOT EXISTS `clientes_vehiculos` (
  `cliente_id` bigint(20) DEFAULT NULL,
  `vehiculo_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes_vehiculos`
--

INSERT INTO `clientes_vehiculos` (`cliente_id`, `vehiculo_id`) VALUES
(1, 1),
(15, 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `email_settings`
--

CREATE TABLE IF NOT EXISTS `email_settings` (
`id` int(11) NOT NULL,
  `active` tinyint(1) DEFAULT '0',
  `authenticate` tinyint(1) DEFAULT NULL,
  `smtp_secure` varchar(255) DEFAULT NULL,
  `host` varchar(255) DEFAULT NULL,
  `port` int(11) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `email_settings`
--

INSERT INTO `email_settings` (`id`, `active`, `authenticate`, `smtp_secure`, `host`, `port`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'tls', 'in-v3.mailjet.com', 587, '8d2baff76d4108f85ee8f7a23764d1f4', 'bb8c5ef501d9fcc2fc8dc1320ffd6515', '2018-11-13 12:13:34', '2020-06-25 05:38:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE IF NOT EXISTS `marcas` (
`id` int(11) NOT NULL,
  `marca` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `marca`, `created_at`, `updated_at`) VALUES
(1, 'Kia', '2020-07-22 05:00:00', '2020-07-22 05:00:00'),
(2, 'Land Rover', '2020-07-22 05:00:00', '2020-07-22 05:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sistema`
--

CREATE TABLE IF NOT EXISTS `sistema` (
`id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `mata_descripcion` text,
  `meta_keywords` text,
  `logo` varchar(255) DEFAULT NULL,
  `favicon` varchar(255) DEFAULT NULL,
  `script_header` text,
  `script_footer` text,
  `from` varchar(80) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sistema`
--

INSERT INTO `sistema` (`id`, `nombre`, `mata_descripcion`, `meta_keywords`, `logo`, `favicon`, `script_header`, `script_footer`, `from`, `created_at`, `updated_at`) VALUES
(1, 'Parqueaderos 4 ruedas', NULL, NULL, 'logo.png', 'favicon.png', NULL, NULL, 'gustavoavilabar@gmail.com', NULL, '2020-07-22 05:28:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE IF NOT EXISTS `tipos` (
`id` int(11) NOT NULL,
  `tipo` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipos`
--

INSERT INTO `tipos` (`id`, `tipo`, `created_at`, `updated_at`) VALUES
(1, 'Cupé ', '2020-07-22 05:00:00', '2020-07-22 05:00:00'),
(2, 'Roadster', '2020-07-22 05:00:00', '2020-07-22 05:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_documentos`
--

CREATE TABLE IF NOT EXISTS `tipos_documentos` (
`id` int(11) NOT NULL,
  `tipo_documento` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipos_documentos`
--

INSERT INTO `tipos_documentos` (`id`, `tipo_documento`, `created_at`, `updated_at`) VALUES
(5, 'C.C', '2020-07-22 21:54:01', '2020-07-22 21:54:01'),
(6, 'T.I', '2020-07-22 21:54:01', '2020-07-22 21:54:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `nombres` varchar(100) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `user` varchar(45) DEFAULT NULL,
  `url` varchar(45) DEFAULT NULL,
  `password` varchar(80) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `telefono` varchar(30) DEFAULT NULL,
  `token` varchar(250) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `estado` enum('activo','inactivo') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombres`, `email`, `user`, `url`, `password`, `foto`, `telefono`, `token`, `remember_token`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Luis Ávila B.', 'gustavoavilabar@gmail.com', 'luis', 'luis', '$2y$10$NGUKfuIsNUL0N0/eu.CcZ.sCWlQMC.GzXc2dmLZsctIO/nqVdcQI2', 'luis_lg_aZdNQC420200722010419.png', '3023322989', 'lTyo7mDJvLaFIkBm5jPiGYrqKmMXjVRF8vMP8E1ceKBQ9hp7svxdJgRJqDAI', 'lTyo7mDJvLaFIkBm5jPiGYrqKmMXjVRF8vMP8E1ceKBQ9hp7svxdJgRJqDAI', 'activo', '2020-07-21 05:00:00', '2020-07-22 06:07:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE IF NOT EXISTS `vehiculos` (
`id` bigint(20) NOT NULL,
  `placa` varchar(15) DEFAULT NULL,
  `marca_id` int(11) DEFAULT NULL,
  `tipo_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id`, `placa`, `marca_id`, `tipo_id`, `created_at`, `updated_at`) VALUES
(1, 'ABH123', 1, 1, '2020-07-22 05:00:00', '2020-07-22 05:00:00'),
(19, 'LKJ123', 1, 1, '2020-07-23 18:13:18', '2020-07-23 18:13:18');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_clientes_tipos_documentos1_idx` (`tipo_documento_id`);

--
-- Indices de la tabla `clientes_vehiculos`
--
ALTER TABLE `clientes_vehiculos`
 ADD KEY `fk_clientes_vehiculos_vehiculos1_idx` (`vehiculo_id`), ADD KEY `fk_clientes_vehiculos_clientes1` (`cliente_id`);

--
-- Indices de la tabla `email_settings`
--
ALTER TABLE `email_settings`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
 ADD PRIMARY KEY (`email`), ADD KEY `index_email` (`email`);

--
-- Indices de la tabla `sistema`
--
ALTER TABLE `sistema`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos`
--
ALTER TABLE `tipos`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos_documentos`
--
ALTER TABLE `tipos_documentos`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
 ADD PRIMARY KEY (`id`), ADD KEY `fk_vehiculos_marcas_idx` (`marca_id`), ADD KEY `fk_vehiculos_tipos1_idx` (`tipo_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `email_settings`
--
ALTER TABLE `email_settings`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `sistema`
--
ALTER TABLE `sistema`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `tipos`
--
ALTER TABLE `tipos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipos_documentos`
--
ALTER TABLE `tipos_documentos`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
ADD CONSTRAINT `fk_clientes_tipos_documentos1` FOREIGN KEY (`tipo_documento_id`) REFERENCES `tipos_documentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `clientes_vehiculos`
--
ALTER TABLE `clientes_vehiculos`
ADD CONSTRAINT `fk_clientes_vehiculos_clientes1` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_clientes_vehiculos_vehiculos1` FOREIGN KEY (`vehiculo_id`) REFERENCES `vehiculos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
ADD CONSTRAINT `fk_vehiculos_marcas` FOREIGN KEY (`marca_id`) REFERENCES `marcas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_vehiculos_tipos1` FOREIGN KEY (`tipo_id`) REFERENCES `tipos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
