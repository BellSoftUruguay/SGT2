-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-03-2024 a las 20:07:34
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `sgt`
--
CREATE DATABASE IF NOT EXISTS `sgt` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sgt`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

DROP TABLE IF EXISTS `calificaciones`;
CREATE TABLE `calificaciones` (
  `id` tinyint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `usuario` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `programa` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `calificacion` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `calificaciones`
--

INSERT INTO `calificaciones` (`id`, `created_at`, `updated_at`, `usuario`, `programa`, `calificacion`) VALUES
(5, '2023-10-03 22:07:15', '2023-10-03 22:07:15', 'Chelo', 'Manual', 'Mala'),
(6, '2023-10-03 22:13:19', '2023-10-03 22:13:19', 'Chelo', 'Manual', 'Buena'),
(7, '2023-10-03 22:13:38', '2023-11-23 23:04:51', 'Chelo', 'Manual', 'Excelente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriasusuarios`
--

DROP TABLE IF EXISTS `categoriasusuarios`;
CREATE TABLE `categoriasusuarios` (
  `id` tinyint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `usuario` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `programa` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categoria` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

DROP TABLE IF EXISTS `estados`;
CREATE TABLE `estados` (
  `id` tinyint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `usuario` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `programa` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `created_at`, `updated_at`, `usuario`, `programa`, `estado`) VALUES
(1, '2023-09-12 01:20:12', '2023-09-12 01:20:12', 'Chelo', 'Manual', 'En desarrollo'),
(2, '2023-09-12 01:20:40', '2023-09-12 01:20:40', 'Chelo', 'Manual', 'Abierto'),
(3, '2023-09-12 02:12:20', '2023-09-12 02:12:20', 'Chelo', 'Manual', 'Cerrado'),
(4, '2023-09-12 03:10:50', '2023-09-12 03:10:50', 'Chelo', 'Manual', 'Pendiente'),
(5, '2023-09-12 03:11:05', '2023-09-12 03:11:05', 'Chelo', 'Manual', 'Resuelto'),
(6, '2023-09-12 03:11:12', '2023-09-12 03:11:12', 'Chelo', 'Manual', 'Cancelado'),
(21, '2023-11-11 21:32:33', '2023-11-11 21:32:33', 'Marce', 'MantEstado', 'Cancelado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_04_18_180227_create_calificaciones_table', 1),
(6, '2023_04_18_180243_create_prioridades_table', 1),
(7, '2023_04_18_180252_create_roles_table', 1),
(8, '2023_04_18_180331_create_tipo_tkts_table', 1),
(9, '2023_06_29_172912_create_usuarios', 1),
(10, '2023_09_04_141732_create_estados', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prioridades`
--

DROP TABLE IF EXISTS `prioridades`;
CREATE TABLE `prioridades` (
  `id` tinyint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `usuario` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `programa` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prioridad` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `prioridades`
--

INSERT INTO `prioridades` (`id`, `created_at`, `updated_at`, `usuario`, `programa`, `prioridad`) VALUES
(5, '2023-09-27 01:25:31', '2023-09-27 01:25:31', 'Chelo', 'Manual', 'Baja'),
(6, '2023-09-27 01:25:44', '2023-09-27 01:25:44', 'Chelo', 'Manual', 'Media'),
(7, '2023-09-27 01:25:52', '2023-09-27 01:25:52', 'Chelo', 'Manual', 'Alta'),
(8, '2023-09-27 01:26:00', '2023-11-29 00:12:02', 'Chelo', 'Manual', 'Urgente'),
(9, '2023-09-27 01:27:31', '2023-09-27 01:27:31', 'Chelo', 'Manual', 'Inmediata');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sectores`
--

DROP TABLE IF EXISTS `sectores`;
CREATE TABLE `sectores` (
  `id` tinyint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `usuario` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `programa` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sector` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sectores`
--

INSERT INTO `sectores` (`id`, `created_at`, `updated_at`, `usuario`, `programa`, `sector`) VALUES
(1, '2023-10-03 23:51:52', '2023-10-03 23:51:52', 'chelo', 'Manual', 'Mantenimiento'),
(2, '2023-10-03 23:52:04', '2023-10-03 23:52:04', 'chelo', 'Manual', 'Control de calidad'),
(3, '2023-10-03 23:52:14', '2023-10-03 23:52:14', 'chelo', 'Manual', 'Aseguramiento'),
(4, '2023-10-03 23:52:25', '2023-10-03 23:52:25', 'chelo', 'Manual', 'Dirección Técnica'),
(5, '2023-10-03 23:52:35', '2023-10-03 23:52:35', 'chelo', 'Manual', 'Administración'),
(6, '2023-10-03 23:52:55', '2023-10-03 23:52:55', 'chelo', 'Manual', 'Dirección'),
(7, '2023-10-03 23:53:06', '2023-10-03 23:53:06', 'chelo', 'Manual', 'Ventas Veterinaria'),
(8, '2023-10-03 23:53:19', '2023-10-03 23:53:19', 'chelo', 'Manual', 'Producción'),
(9, '2023-10-03 23:53:32', '2023-10-03 23:53:32', 'chelo', 'Manual', 'Ventas Farma'),
(10, '2023-10-03 23:53:45', '2023-10-03 23:53:45', 'chelo', 'Manual', 'Asesor médico'),
(11, '2023-10-03 23:53:54', '2023-10-03 23:53:54', 'chelo', 'Manual', 'Desarrollo'),
(12, '2023-10-03 23:54:10', '2023-10-03 23:54:10', 'chelo', 'Manual', 'Comercio exterior'),
(13, '2023-10-03 23:54:24', '2023-10-03 23:54:24', 'chelo', 'Manual', 'Marketing'),
(14, '2023-10-03 23:54:34', '2023-10-03 23:54:34', 'chelo', 'Manual', 'Recepción');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE `tickets` (
  `id` tinyint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `usuario` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `programa` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `finicio` date NOT NULL,
  `ffin` date NOT NULL,
  `tipoTktID` tinyint(20) NOT NULL,
  `usuarioID` smallint(6) NOT NULL,
  `sectorID` tinyint(20) NOT NULL,
  `prioridadID` tinyint(20) NOT NULL,
  `estadoID` tinyint(20) NOT NULL,
  `calificacionID` tinyint(2) UNSIGNED NOT NULL DEFAULT 0,
  `asunto` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tickets`
--

INSERT INTO `tickets` (`id`, `created_at`, `updated_at`, `usuario`, `programa`, `finicio`, `ffin`, `tipoTktID`, `usuarioID`, `sectorID`, `prioridadID`, `estadoID`, `calificacionID`, `asunto`, `descripcion`) VALUES
(1, '2023-11-10 21:43:11', '2023-11-10 21:43:11', 'Marce', 'manual', '2023-11-10', '2023-12-10', 2, 5, 1, 2, 1, 1, 'uno cualquera', 'aj sdlfjadlfkj asdfj a;lfdkj as;ldk jfalkjf aslkfj asdkljf alksdjf as.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipostkt`
--

DROP TABLE IF EXISTS `tipostkt`;
CREATE TABLE `tipostkt` (
  `id` tinyint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `usuario` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `programa` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipoTkt` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipostkt`
--

INSERT INTO `tipostkt` (`id`, `created_at`, `updated_at`, `usuario`, `programa`, `tipoTkt`) VALUES
(3, '2023-09-27 01:36:30', '2023-09-27 01:36:30', 'Chelo', 'Manual', 'Software'),
(4, '2023-09-27 01:36:41', '2023-09-27 01:36:41', 'Chelo', 'Manual', 'Hardware');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` tinyint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `programa` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seguridad` tinyint(2) NOT NULL DEFAULT 0,
  `habilitado` tinyint(1) NOT NULL DEFAULT 1,
  `categoriaUsuario` tinyint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `created_at`, `updated_at`, `programa`, `usuario`, `nombre`, `apellido`, `password`, `email`, `seguridad`, `habilitado`, `categoriaUsuario`) VALUES
(4, '2023-10-20 02:03:54', '2023-10-20 02:03:54', 'Manual', 'Demo', 'demostracion', 'demo', '$2y$10$IbyW3VAzg6mUQdsxoOAUcu0KMerkL0LO/PWvgk93AW58/HSVJFGm6', 'ccccc@ssss.com', 3, 1, 9),
(6, NULL, NULL, 'Manual', 'chelo', 'demostracion', 'demo', '$2y$12$oYUephayRG7o8IhxqE0.hOLhN8ix2eXUlP6a7nFPmvyRCgqt1T2e6', 'ccccc@ssss.com', 3, 1, 9);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoriasusuarios`
--
ALTER TABLE `categoriasusuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `prioridades`
--
ALTER TABLE `prioridades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sectores`
--
ALTER TABLE `sectores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipostkt`
--
ALTER TABLE `tipostkt`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `id` tinyint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `categoriasusuarios`
--
ALTER TABLE `categoriasusuarios`
  MODIFY `id` tinyint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` tinyint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `prioridades`
--
ALTER TABLE `prioridades`
  MODIFY `id` tinyint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `sectores`
--
ALTER TABLE `sectores`
  MODIFY `id` tinyint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` tinyint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipostkt`
--
ALTER TABLE `tipostkt`
  MODIFY `id` tinyint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` tinyint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;
