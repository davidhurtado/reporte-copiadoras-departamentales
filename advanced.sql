-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-07-2016 a las 18:26:20
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `advanced`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_copiadora`
--

CREATE TABLE `asignacion_copiadora` (
  `id_departamento` int(11) NOT NULL,
  `id_copiadora` int(11) NOT NULL,
  `serie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asignacion_copiadora`
--

INSERT INTO `asignacion_copiadora` (`id_departamento`, `id_copiadora`, `serie`) VALUES
(2, 2, '098765'),
(1, 3, '12345'),
(3, 3, '123456'),
(1, 2, '1234567'),
(2, 1, '123456789'),
(3, 1, '1qwqwq'),
(1, 2, 'abc123'),
(3, 2, 'asqwqdq');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '2', 1466440458),
('reportar', '10', 1466707374),
('reportar', '3', 1466466794),
('reportar', '4', 1466466785),
('reportar', '5', 1466466824),
('reportar', '6', 1466466861),
('reportar', '7', 1466466896),
('reportar', '8', 1466466942),
('reportar', '9', 1466466968),
('superadmin', '1', 1465708890),
('superadmin', '2', 1466440799);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, 'administra el back', NULL, NULL, 1464934406, 1465679810),
('reportar', 2, 'reporta los daños de las copiadoras', NULL, NULL, 1466466690, 1466466690),
('superadmin', 1, 'super administrador del sitio', NULL, NULL, 1464934382, 1465098305);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('superadmin', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `copiadoras`
--

CREATE TABLE `copiadoras` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `copiadoras`
--

INSERT INTO `copiadoras` (`id`, `nombre`) VALUES
(3, 'Cannon MP250'),
(1, 'Epson L200'),
(2, 'HP');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id`, `nombre`) VALUES
(3, 'Diseño Grafico'),
(1, 'Financiero'),
(4, 'Lenguistica'),
(2, 'Sistemas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1464887861),
('m140209_132017_init', 1464887867),
('m140403_174025_create_account_table', 1464887869),
('m140504_113157_update_tables', 1464887875),
('m140504_130429_create_token_table', 1464887877),
('m140506_102106_rbac_init', 1464889484),
('m140830_171933_fix_ip_field', 1464887879),
('m140830_172703_change_account_table_name', 1464887880),
('m141222_110026_update_ip_field', 1464887881),
('m141222_135246_alter_username_length', 1464887882),
('m150614_103145_update_social_account_table', 1464887885),
('m150623_212711_fix_username_notnull', 1464887885);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profile`
--

CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `profile`
--

INSERT INTO `profile` (`user_id`, `name`, `public_email`, `gravatar_email`, `gravatar_id`, `location`, `website`, `bio`) VALUES
(1, 'Administrador', 'admin@davidhurtado.tk', 'admin@davidhurtado.tk', 'a17dd825a06c1584ae66550494701e64', 'Ecuador', 'http://www.davidhurtado.tk', 'Tengo 20 años.\r\nEstudio en la PUCESE.\r\n#ProgramarEstiloDeVida'),
(2, 'David Alfredo Hurtado Chichande', 'david.hurtado.chichande@gmail.com', '', 'd41d8cd98f00b204e9800998ecf8427e', 'Esmeraldas - Ecuador', 'http://ecuafull.tk', 'Amante a la programación web :)'),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte_fallos`
--

CREATE TABLE `reporte_fallos` (
  `id` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `id_copiadora` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `serie` varchar(30) NOT NULL,
  `respuesta` varchar(200) NOT NULL,
  `fecha_enviado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_atendido` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reporte_fallos`
--

INSERT INTO `reporte_fallos` (`id`, `id_departamento`, `id_copiadora`, `descripcion`, `estado`, `serie`, `respuesta`, `fecha_enviado`, `fecha_atendido`) VALUES
(3, 1, 3, 'No imprime', 1, '12345', 'cargada', '2016-06-23 21:19:39', '2016-06-24 17:25:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `social_account`
--

CREATE TABLE `social_account` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `token`
--

CREATE TABLE `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `token`
--

INSERT INTO `token` (`user_id`, `code`, `created_at`, `type`) VALUES
(1, '28SVI1odN9-SiXXPCoNXAeAFXomLd2yP', 1465171341, 1),
(1, 'LH3e2Tnwv9nsPzy3ub_O2K3xtomNU7V6', 1464888385, 0),
(3, 'dXOCTA-k_Q3Dzlx-ss2H4WmvTSY7xavk', 1466441444, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`, `status`) VALUES
(1, 'superadmin', 'admin@davidhurtado.tk', '$2y$12$jbfNVm9EqhSSYghCaR3swuMHFcHHb0c5uLTBVcmY8B5LpO5C2cOZu', 'gzFRgMGlc-n5xyVWuSD9GlC8yDfvZu3p', 1464889498, NULL, NULL, '127.0.0.1', 1464888385, 1465686615, 0, 0),
(2, 'marc', 'marc@gmail.com', '$2y$12$jbfNVm9EqhSSYghCaR3swuMHFcHHb0c5uLTBVcmY8B5LpO5C2cOZu', 'F9VofLHVC0IowQGOK3eywr_4IXG1JFUY', 1464933864, NULL, NULL, '127.0.0.1', 1464933865, 1465252622, 0, 0),
(3, 'user_financiero', 'financiero@gmail.com', '$2y$12$soOsy7mqoAA4Hk0uEI5Rhut00Cn2rk8lwzLg07MamV8T46o5YBM4C', 'CNpswRLPLfEQh6xnGT9s-ijj5AgmLpm7', 1466443342, NULL, NULL, '::1', 1466441444, 1466467463, 0, 0),
(4, 'user_sistemas', 'sistemas@gmail.com', '$2y$12$uLE6Gskvf0V3vAY00/hQ2eBW21oN.AkJNdtVBJnHtOx/G2EMQ0W4i', 'tZQNRJRhTLqNHxH7KIbXiLyZTJnpVmMR', 1466466777, NULL, NULL, '::1', 1466466778, 1466466778, 0, 0),
(5, 'user_contabilidad', 'contabilidad@gmail.com', '$2y$12$0GG8.SPATqz7k4/u/TruL.hZhkoQ6fHMeaWKadu8FPSJw9/z3SM7G', 'W5ffnE9Rc7VM6SN7k_OpjWRHrSUtAV-3', 1466466818, NULL, NULL, '::1', 1466466818, 1466466818, 0, 0),
(6, 'user_lenguistica', 'lenguistica@gmail.com', '$2y$12$UXwSIxTVLc0D62K/J1GppOxQjRlQ/t74KASC9HfSlptpq7WQ/Xh2C', '8XIWVulJCGaAoP3pIGOMT22r4RTtiEKJ', 1466466848, NULL, NULL, '::1', 1466466848, 1466466848, 0, 0),
(7, 'user_administracion', 'administracion@gmail.com', '$2y$12$ygOtSKuzweg6ixPLIxluruRSyCwX4..cxpbrzqn2Cs5Dd/urI0Ll2', 'b8FLTxvNxoUposakH0Xj8sDwwXOwqCc8', 1466466888, NULL, NULL, '::1', 1466466889, 1466466889, 0, 0),
(8, 'user_enfermeria', 'enfermeria@gmail.com', '$2y$12$/wAqY1I3Cag2OQJvD37j6eRMpzUS1VUaHal5U9v8L52r2pO3vrK/i', 'iqNleCzGjR2UtbovHbZPHGiIHstnoBDL', 1466466934, NULL, NULL, '::1', 1466466934, 1466466934, 0, 0),
(9, 'user_ambiental', 'ambiental@gmail.com', '$2y$12$/fUGql6mas3qgQZ4BU0afeMegOHjYyh8QUwC1afZzhGocsNk7aaye', '32o1JBmKrWDSIo0RY_DOF4fOZqtZsVBY', 1466466963, NULL, NULL, '::1', 1466466963, 1466466963, 0, 0),
(10, 'user_diseno', 'diseno@gmail.com', '$2y$12$ePJiQeh86Qcd/th9aECMdeFjNUsBItl6QT35BbjdTd14kxrYHD53i', 'hPcMePqjYPhHBZLW0dB3g3-Hra4fDDEO', 1466707366, NULL, NULL, '::1', 1466707366, 1466707366, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_departamento`
--

CREATE TABLE `usuarios_departamento` (
  `id_usuario` int(11) NOT NULL,
  `id_departamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios_departamento`
--

INSERT INTO `usuarios_departamento` (`id_usuario`, `id_departamento`) VALUES
(3, 1),
(4, 2),
(6, 4),
(10, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignacion_copiadora`
--
ALTER TABLE `asignacion_copiadora`
  ADD UNIQUE KEY `serie` (`serie`);

--
-- Indices de la tabla `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indices de la tabla `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indices de la tabla `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indices de la tabla `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indices de la tabla `copiadoras`
--
ALTER TABLE `copiadoras`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`);

--
-- Indices de la tabla `reporte_fallos`
--
ALTER TABLE `reporte_fallos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `social_account`
--
ALTER TABLE `social_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_unique` (`provider`,`client_id`),
  ADD UNIQUE KEY `account_unique_code` (`code`),
  ADD KEY `fk_user_account` (`user_id`);

--
-- Indices de la tabla `token`
--
ALTER TABLE `token`
  ADD UNIQUE KEY `token_unique` (`user_id`,`code`,`type`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_unique_email` (`email`),
  ADD UNIQUE KEY `user_unique_username` (`username`);

--
-- Indices de la tabla `usuarios_departamento`
--
ALTER TABLE `usuarios_departamento`
  ADD UNIQUE KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `copiadoras`
--
ALTER TABLE `copiadoras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `reporte_fallos`
--
ALTER TABLE `reporte_fallos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `social_account`
--
ALTER TABLE `social_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `social_account`
--
ALTER TABLE `social_account`
  ADD CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
