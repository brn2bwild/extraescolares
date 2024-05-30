-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 29-05-2024 a las 19:51:07
-- Versión del servidor: 10.11.7-MariaDB-cll-lve
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u151658514_extratec`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activities`
--

CREATE TABLE `activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `activities`
--

INSERT INTO `activities` (`id`, `name`, `capacity`, `user_id`, `created_at`, `updated_at`) VALUES
(5, 'Extraescolar de Taekwondo', 40, 6, '2024-05-02 11:34:31', '2024-05-02 14:01:02'),
(6, 'Extraescolar de Danza', 40, 8, '2024-05-02 14:18:53', '2024-05-02 14:18:53'),
(7, 'Extraescolar de Karate', 40, 9, '2024-05-02 14:20:14', '2024-05-02 14:20:14'),
(8, 'Extraescolar de Voleibol', 40, 11, '2024-05-02 14:26:22', '2024-05-02 14:27:45'),
(9, 'Extraescolar de Fútbol', 40, 10, '2024-05-02 14:27:06', '2024-05-02 14:27:06'),
(10, 'Extraescolar de Música', 40, 12, '2024-05-02 14:28:42', '2024-05-02 14:28:42'),
(11, 'Extraescolar de Baquetbol', 40, 11, '2024-05-02 14:31:21', '2024-05-02 14:31:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activity_period`
--

CREATE TABLE `activity_period` (
  `activity_id` bigint(20) UNSIGNED NOT NULL,
  `period_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `activity_period`
--

INSERT INTO `activity_period` (`activity_id`, `period_id`) VALUES
(5, 2),
(5, 4),
(6, 2),
(6, 4),
(7, 2),
(7, 4),
(8, 2),
(8, 4),
(9, 2),
(9, 4),
(10, 2),
(10, 4),
(11, 2),
(11, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activity_user`
--

CREATE TABLE `activity_user` (
  `activity_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `activity_user`
--

INSERT INTO `activity_user` (`activity_id`, `user_id`) VALUES
(5, 6),
(6, 8),
(7, 9),
(9, 10),
(8, 11),
(10, 12),
(11, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `careers`
--

CREATE TABLE `careers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `careers`
--

INSERT INTO `careers` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'IINF', '2024-04-11 20:39:12', '2024-05-27 11:43:50'),
(2, 'IAGR', '2024-04-17 10:54:05', '2024-05-27 11:44:30'),
(3, 'IADM', '2024-04-17 10:54:07', '2024-05-27 11:44:43'),
(4, 'IIND', '2024-04-17 10:54:34', '2024-05-27 11:44:58'),
(5, 'IBQM', '2024-05-02 13:51:46', '2024-05-27 11:45:15'),
(6, 'IENR', '2024-05-02 13:53:11', '2024-05-27 11:45:56'),
(7, 'IIEM', '2024-05-02 13:54:51', '2024-05-27 11:46:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
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
(5, '2024_02_14_152731_create_careers_table', 1),
(6, '2024_02_14_153050_create_activities_table', 1),
(7, '2024_02_14_155918_create_periods_table', 1),
(8, '2024_02_14_155919_create_students_table', 1),
(9, '2024_03_17_201514_create_permission_tables', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 6),
(1, 'App\\Models\\User', 8),
(1, 'App\\Models\\User', 9),
(1, 'App\\Models\\User', 10),
(1, 'App\\Models\\User', 11),
(1, 'App\\Models\\User', 12),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periods`
--

CREATE TABLE `periods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lapse` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `periods`
--

INSERT INTO `periods` (`id`, `lapse`, `created_at`, `updated_at`) VALUES
(2, 'Agosto 2023 - Junio 2024', '2024-04-11 20:39:12', '2024-05-27 11:47:56'),
(4, 'Agosto 2022 - Junio 2023', '2024-04-17 10:50:30', '2024-05-27 11:48:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'create student', 'web', '2024-04-11 20:39:12', '2024-04-11 20:39:12'),
(2, 'edit student', 'web', '2024-04-11 20:39:12', '2024-04-11 20:39:12'),
(3, 'delete student', 'web', '2024-04-11 20:39:12', '2024-04-11 20:39:12'),
(4, 'validate student', 'web', '2024-04-11 20:39:12', '2024-04-11 20:39:12'),
(5, 'create role', 'web', '2024-04-11 20:39:12', '2024-04-11 20:39:12'),
(6, 'edit role', 'web', '2024-04-11 20:39:12', '2024-04-11 20:39:12'),
(7, 'delete role', 'web', '2024-04-11 20:39:12', '2024-04-11 20:39:12'),
(8, 'create resource', 'web', '2024-04-11 20:39:12', '2024-04-11 20:39:12'),
(9, 'edit resource', 'web', '2024-04-11 20:39:12', '2024-04-11 20:39:12'),
(10, 'delete resource', 'web', '2024-04-11 20:39:12', '2024-04-11 20:39:12'),
(11, 'create teacher', 'web', '2024-04-11 20:39:12', '2024-04-11 20:39:12'),
(12, 'edit teacher', 'web', '2024-04-11 20:39:12', '2024-04-11 20:39:12'),
(13, 'delete teacher', 'web', '2024-04-11 20:39:12', '2024-04-11 20:39:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'teacher', 'web', '2024-04-11 20:39:12', '2024-04-11 20:39:12'),
(2, 'admin', 'web', '2024-04-11 20:39:12', '2024-04-11 20:39:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(2, 1),
(3, 1),
(12, 1),
(13, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `inscription_code` varchar(255) NOT NULL,
  `university_enrollment` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `career_id` bigint(20) UNSIGNED NOT NULL,
  `activity_id` bigint(20) UNSIGNED NOT NULL,
  `period_id` bigint(20) UNSIGNED NOT NULL,
  `illnes` varchar(255) NOT NULL,
  `observations` longtext DEFAULT NULL,
  `grades` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL DEFAULT '{"first_criteria":"0","second_criteria":"0","third_criteria":"0","fourth_criteria":"0","fifth_criteria":"0","sixth_criteria":"0","seventh_criteria":"0"}' CHECK (json_valid(`grades`)),
  `first_validation` tinyint(1) NOT NULL DEFAULT 0,
  `second_validation` tinyint(1) NOT NULL DEFAULT 0,
  `validated_by` varchar(255) DEFAULT NULL,
  `validated_at` timestamp NULL DEFAULT NULL,
  `validation_token` varchar(32) DEFAULT NULL,
  `certificate_downloaded` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `students`
--

INSERT INTO `students` (`id`, `inscription_code`, `university_enrollment`, `name`, `gender`, `career_id`, `activity_id`, `period_id`, `illnes`, `observations`, `grades`, `first_validation`, `second_validation`, `validated_by`, `validated_at`, `validation_token`, `certificate_downloaded`, `created_at`, `updated_at`) VALUES
(8, '070014', '23E30249', 'Marissa Domínguez Perera ', 'f', 3, 6, 2, 'Ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-03 11:26:36', '2024-05-29 13:12:14'),
(9, '070001', '23E30269', 'Viviana Palomeque Cardenas', 'f', 3, 6, 4, 'Ninguno', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-03 11:47:38', '2024-05-07 12:51:58'),
(10, '070009', NULL, 'Marisol Guadalupe Vega Hernández ', 'f', 3, 6, 2, 'Ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-03 12:03:27', '2024-05-03 12:03:27'),
(11, '070062', NULL, 'Yaretzi Tahití ', 'f', 3, 6, 2, 'Ninguno', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-03 12:07:12', '2024-05-03 12:07:12'),
(17, '040006', NULL, 'Angel Gabriel Alvarez Guirao ', 'm', 4, 10, 2, 'Ninguna', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-03 21:18:26', '2024-05-03 21:18:26'),
(18, '040021', NULL, 'Karol Guadalupe García Pérez ', 'f', 4, 10, 2, 'Ninguna', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-05 13:55:05', '2024-05-05 13:55:05'),
(19, '050026', NULL, 'Simon alberto vazquez alvarez ', 'm', 7, 9, 2, 'Ninguna enfermedad ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-06 10:44:27', '2024-05-06 10:44:27'),
(21, '050047', NULL, 'Andrés Amauri Torres Valencia ', 'm', 7, 9, 2, 'No.', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-06 10:54:15', '2024-05-06 10:54:15'),
(22, '050057', NULL, 'Manuel Lorenzo castellanos García ', 'm', 7, 9, 2, 'No', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-06 11:04:43', '2024-05-06 11:04:43'),
(23, '080032', NULL, 'Jahir espinoza Hernández ', 'm', 1, 9, 2, 'ninfuna', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-06 11:18:15', '2024-05-06 11:18:15'),
(24, '100014', NULL, 'Efrey García Cruz ', 'm', 6, 9, 2, 'Ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-06 11:25:01', '2024-05-06 11:25:01'),
(25, '050013', NULL, 'JOHNNY DORIAN CORNELIO MARTINEZ', 'm', 7, 9, 2, 'Ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-06 11:28:54', '2024-05-06 11:28:54'),
(27, '080003', NULL, 'Erick Charly Yahir Perez Mendoza ', 'm', 1, 9, 2, 'Ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-06 12:20:50', '2024-05-06 12:20:50'),
(28, '080046', NULL, 'JESÚS ALONSO ESCOLÁSTICO AGUILERA', 'm', 1, 9, 2, 'Ninguna', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-06 12:29:57', '2024-05-06 12:29:57'),
(29, '050029', NULL, 'José Alexander Alvarado Bocanegra', 'm', 7, 9, 2, 'Ninguna', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-06 14:54:51', '2024-05-06 14:54:51'),
(30, '070029', NULL, 'Victor Gutiérrez Jiménez ', 'm', 3, 9, 2, 'Ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-06 15:54:11', '2024-05-06 15:54:11'),
(31, '050010', NULL, 'Efrain Beltruy Villarreal ', 'm', 7, 9, 2, 'Ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-06 15:59:59', '2024-05-06 15:59:59'),
(32, '060069', NULL, 'Erik Enmanuel Pérez Sánchez ', 'm', 2, 9, 2, 'Ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-06 16:21:11', '2024-05-06 16:21:11'),
(33, '040007', NULL, 'Giovanny Guzmán Velasco ', 'm', 4, 9, 4, 'Ninguno ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-06 16:31:36', '2024-05-06 16:31:36'),
(38, '070058', NULL, 'Angel Miguel Arjona Velazco ', 'm', 3, 9, 2, 'Ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-07 09:39:44', '2024-05-07 09:39:44'),
(43, '060026', '23E30217', 'Yamileth Pérez Sanchez  ', 'f', 2, 5, 2, 'ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-07 11:31:35', '2024-05-17 08:38:01'),
(44, '070055', '23E30265', 'Dulce María López Reyes', 'f', 3, 5, 2, 'No', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-07 11:33:54', '2024-05-17 08:39:36'),
(47, '070012', NULL, 'Brayan Eduardo Alvarado de la Cruz ', 'm', 3, 10, 2, 'Ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-07 14:10:54', '2024-05-07 14:10:54'),
(48, '070021', NULL, 'Angel Tamayo Tamayo', 'm', 3, 7, 2, 'no', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-07 14:52:36', '2024-05-07 14:52:36'),
(50, '040056', NULL, 'José Neftali Molina Pérez', 'm', 1, 10, 2, 'Ninguna', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-07 14:54:41', '2024-05-07 14:54:41'),
(52, '060044', NULL, 'Miguel Andres Mazariego Garcia', 'm', 2, 10, 2, 'No', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-07 14:56:50', '2024-05-07 14:56:50'),
(53, '60044', NULL, 'Miguel Andres Mazariego Garcia', 'm', 2, 10, 2, 'No', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-07 14:58:06', '2024-05-07 14:58:06'),
(54, '060047', NULL, 'Miguel Andres Mazariego Garcia', 'm', 2, 10, 2, 'No', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-07 14:59:54', '2024-05-07 14:59:54'),
(56, '060028', NULL, 'Edgar Pérez Sánchez ', 'm', 2, 9, 2, 'Ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-07 15:01:11', '2024-05-07 15:01:11'),
(59, '060005', NULL, 'Leydi del Carmen Lara Arias', 'f', 2, 8, 2, 'Ninguna', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-07 15:05:40', '2024-05-07 15:05:40'),
(60, '060063', NULL, 'Brayan del Carmen Asencio Rueda ', 'm', 2, 8, 2, 'Ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-07 15:06:11', '2024-05-07 15:06:11'),
(62, '080028', NULL, 'Jesús Antonio García Calcáneo ', 'm', 1, 8, 2, 'Ninguna', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-07 15:08:04', '2024-05-07 15:08:04'),
(63, '040074', NULL, 'Anadely', 'f', 4, 8, 2, 'Ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-07 15:08:46', '2024-05-07 15:08:46'),
(64, '070043', NULL, 'Kevin Antonio Pérez cruz ', 'm', 3, 8, 4, 'Ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-07 15:08:54', '2024-05-07 15:08:54'),
(65, '080050', NULL, 'Angel Acosta Villa ', 'm', 1, 8, 2, 'Ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-07 15:09:48', '2024-05-07 15:09:48'),
(66, '070024', NULL, 'Jorge Andrés Tilán Domínguez ', 'm', 3, 8, 2, 'Ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-07 15:10:12', '2024-05-07 15:10:12'),
(67, '040017', NULL, 'Evelyn Ramos Córdova ', 'f', 4, 8, 2, 'Ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-07 15:11:20', '2024-05-07 15:11:20'),
(68, '040070', NULL, 'Luis Zenón Cruz Sánchez ', 'm', 4, 11, 2, 'No, no parezco de ninguna enfermedad ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-07 15:11:23', '2024-05-07 15:11:23'),
(69, '040014', NULL, 'Evelyn Ramos Córdova ', 'f', 4, 8, 2, 'Ninguna', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-07 15:17:00', '2024-05-07 15:17:00'),
(70, '060050', NULL, 'Jesús Faustino Gonzaléz Pascual ', 'm', 2, 8, 2, 'Nada', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-07 15:17:00', '2024-05-07 15:17:00'),
(71, '060033', NULL, 'José antonio castellanos hernández', 'm', 2, 8, 4, 'No.', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-07 15:18:01', '2024-05-07 15:18:01'),
(72, '7071012002', NULL, 'Kevin Antonio Pérez cruz ', 'm', 3, 8, 2, 'N', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-07 15:19:53', '2024-05-07 15:19:53'),
(73, '080052', NULL, 'Daniel Castellanos Escolástico ', 'm', 1, 11, 2, 'no', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-07 15:20:45', '2024-05-07 15:20:45'),
(74, '070048', NULL, 'Devora sugey acosta olmedo', 'f', 3, 10, 2, 'Ninguna', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-07 15:22:11', '2024-05-07 15:22:11'),
(75, '100008', NULL, 'Jesús Manuel Ramírez Vázquez ', 'm', 6, 10, 2, 'No', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-07 15:25:11', '2024-05-07 15:25:11'),
(76, '80052', NULL, 'Daniel Castellanos Escolástico ', 'm', 1, 11, 2, 'NO', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-07 15:26:15', '2024-05-07 15:26:15'),
(77, '080044', NULL, 'Rosario Sánchez Álvarez ', 'm', 1, 8, 2, 'Ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-07 15:29:43', '2024-05-07 15:29:43'),
(80, '040072', NULL, 'Miguel Ángel García De La Cruz', 'm', 4, 8, 2, 'Ninguna', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-07 15:37:11', '2024-05-07 15:37:11'),
(82, '070017', NULL, 'David Arturo Cárdenas Ferrer ', 'm', 3, 8, 2, 'No', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-07 15:39:39', '2024-05-07 15:39:39'),
(83, '050011', NULL, 'Abel Eduardo Hernández Melo ', 'm', 7, 11, 2, 'Ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-07 15:42:09', '2024-05-07 15:42:09'),
(85, '080020', NULL, 'Paola Alejandra Morales Rios ', 'f', 1, 10, 2, 'Ninguna', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-07 15:52:02', '2024-05-07 15:52:02'),
(87, '080004', NULL, 'Estrella Berenice Alvarez Madrigal ', 'f', 1, 8, 2, 'Ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-07 16:01:19', '2024-05-07 16:01:19'),
(91, '070023', NULL, 'Héctor Manuel Pérez Álvarez ', 'm', 3, 8, 2, 'Ninguna', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-07 17:05:57', '2024-05-07 17:05:57'),
(95, '080034', NULL, 'Rubicel Ennahi Ramírez López ', 'm', 1, 5, 2, 'Ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-07 19:04:20', '2024-05-07 19:04:20'),
(96, '080051', NULL, 'Brandon Osvaldo Pariz Giorgana', 'm', 1, 9, 2, 'Ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-07 19:19:26', '2024-05-07 19:19:26'),
(97, '060074', NULL, 'Angel Ricardo Uco Hernandez ', 'm', 2, 9, 2, 'Ningúna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-07 19:48:57', '2024-05-07 19:48:57'),
(98, '060036', NULL, 'Felipe de Jesús de la Cruz Valencia ', 'm', 2, 7, 2, 'Ninguna', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-07 19:55:43', '2024-05-07 19:55:43'),
(99, '060043', NULL, 'Isaac Arias Méndez ', 'm', 2, 7, 2, 'No', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-07 19:58:35', '2024-05-07 19:58:35'),
(101, '070019', NULL, 'Jonathan Pérez Cornelio ', 'm', 3, 9, 2, 'No', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-07 20:06:24', '2024-05-07 20:06:24'),
(102, '100010', NULL, 'KARLA NALLELI HERNÁNDEZ SÁNCHEZ', 'f', 6, 7, 2, 'Si', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-07 20:06:50', '2024-05-07 20:06:50'),
(103, '080006', NULL, 'Lourdes del Carmen Noriega Nárez ', 'f', 1, 7, 2, 'Discapacidad visual', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-07 20:10:48', '2024-05-07 20:10:48'),
(105, '070038', NULL, 'Yireh Stephanie Figueroa Hernández ', 'f', 3, 7, 2, 'Ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-07 20:20:02', '2024-05-07 20:20:02'),
(106, '070039', NULL, 'Cristofer Angeles Javier ', 'm', 3, 7, 2, 'Ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-07 20:20:54', '2024-05-07 20:20:54'),
(107, '070046', NULL, 'Lucero Alvarez Alvarez ', 'f', 3, 7, 2, 'Ninguna', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-07 20:22:29', '2024-05-07 20:22:29'),
(108, '050035', NULL, 'Brayan Alexander perez Cruz ', 'm', 7, 7, 2, 'Ninguna', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-07 20:24:17', '2024-05-07 20:24:17'),
(110, '080047', NULL, 'Katia Yazmín Sánchez Castellanos ', 'f', 1, 7, 2, 'Ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-07 20:57:47', '2024-05-07 20:57:47'),
(111, '070031', NULL, 'Angel Emanuel Gutiérrez Méndez', 'm', 3, 10, 4, 'no', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-07 21:00:14', '2024-05-07 21:00:14'),
(112, '060067', NULL, 'Henrri Alexander Hernández Flores ', 'm', 2, 10, 2, 'Ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-07 22:04:06', '2024-05-07 22:04:06'),
(113, '050030', NULL, 'Alexis', 'm', 2, 8, 2, 'Ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-07 22:16:38', '2024-05-07 22:16:38'),
(114, '070032', NULL, 'Michel del Carmen Bocanegra Perera ', 'f', 3, 8, 2, 'Ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-07 23:19:09', '2024-05-07 23:19:09'),
(115, '060068', NULL, 'José Andrés De La Cruz Ventura ', 'm', 2, 8, 2, 'Ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-08 00:41:50', '2024-05-08 00:41:50'),
(116, '050023', NULL, 'Ervin Muñoz Rodríguez ', 'm', 7, 7, 2, 'Ninguna', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-08 06:18:10', '2024-05-08 06:18:10'),
(117, '080008', NULL, 'Diego Jesús aquíno flores ', 'm', 1, 7, 2, 'Ninguna', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-08 07:15:14', '2024-05-08 07:15:14'),
(118, '070037', NULL, 'Adrian Osorio Gonzalez ', 'm', 3, 7, 2, 'No', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-08 09:52:47', '2024-05-08 09:52:47'),
(119, '050012', NULL, 'Eduardo De la Cruz Ramírez', 'm', 7, 7, 2, 'Ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-08 09:56:05', '2024-05-08 09:56:05'),
(120, '070011', NULL, 'Jennifer Itzel Javier Morfinez ', 'f', 3, 8, 2, 'No ninguna .', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-08 10:25:00', '2024-05-08 10:25:00'),
(121, '070034', NULL, 'Hernández Arias Yetzia Dayana ', 'f', 3, 5, 2, 'NO', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-08 10:38:46', '2024-05-08 10:38:46'),
(122, '070047', NULL, 'Bethzy Alejandra Estrada Moreno ', 'f', 3, 5, 2, 'No, ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-08 10:59:56', '2024-05-08 10:59:56'),
(123, '070036', NULL, 'Luis Armando Hernandez Villarreal ', 'm', 3, 5, 2, 'No', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-08 11:00:05', '2024-05-08 11:00:05'),
(124, '010003', NULL, 'Cecilia Cristell', 'f', 5, 8, 2, 'No', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-08 11:40:18', '2024-05-08 11:40:18'),
(131, '777777', NULL, 'Diego Alberto Almeida López ', 'm', 2, 5, 2, 'Ningúna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-08 11:46:09', '2024-05-08 11:46:09'),
(132, '101010', NULL, 'Diego Alberto Almeida López ', 'm', 2, 5, 2, 'Ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-08 11:46:56', '2024-05-08 11:46:56'),
(135, '999999', NULL, 'Diego Alberto Almeida López ', 'm', 2, 5, 2, 'ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-08 11:49:36', '2024-05-08 11:49:36'),
(137, '050025', NULL, 'Misael Rodrigo palomeque Landero ', 'm', 7, 7, 2, 'Ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-08 11:55:04', '2024-05-08 11:55:04'),
(138, '050058', NULL, 'Claribel Vidal Junco ', 'f', 7, 7, 2, 'No', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-08 12:00:06', '2024-05-08 12:00:06'),
(139, '654321', NULL, 'Luis Fernando Moreno Rivera ', 'm', 4, 5, 2, 'Ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-08 12:06:05', '2024-05-08 12:06:05'),
(142, '050001', NULL, 'Miguel Alfonso Rivas Pérez ', 'm', 7, 11, 2, 'No', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-08 12:39:34', '2024-05-08 12:39:34'),
(143, '050009', NULL, 'Jesús Gabriel Pérez López ', 'm', 7, 11, 2, 'Ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-08 12:41:51', '2024-05-08 12:41:51'),
(144, '050027', NULL, 'Rogelio ', 'm', 7, 11, 2, 'Ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-08 12:47:03', '2024-05-08 12:47:03'),
(145, '060071', NULL, 'Yerania Cristhell Fonseca Narez ', 'f', 2, 8, 2, 'Ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-08 12:47:33', '2024-05-08 12:47:33'),
(146, '080019', NULL, 'Evelin Arleth Zenteno Gómez', 'f', 1, 5, 2, 'Ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-08 12:47:54', '2024-05-08 12:47:54'),
(147, '230523', NULL, 'Aday Méndez Villarreal ', 'f', 1, 5, 2, 'No', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-08 12:52:41', '2024-05-08 12:52:41'),
(149, '198320', NULL, 'KARELI MÉNDEZ MOLLINEDO ', 'f', 2, 5, 2, 'Ninguno ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-08 13:25:14', '2024-05-08 13:25:14'),
(150, '673979', NULL, 'Luis Felipe Álvarez Mayo ', 'm', 1, 5, 2, 'No', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-08 14:24:27', '2024-05-08 14:24:27'),
(151, '666666', NULL, 'Eliazar Gómez Gómez ', 'm', 4, 5, 2, 'Ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-08 14:31:03', '2024-05-08 14:31:03'),
(152, '874526', NULL, 'ofir lópez lópez', 'f', 2, 5, 2, 'ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-08 14:59:41', '2024-05-08 14:59:41'),
(154, '103624', NULL, 'Bella Angelica Cruz Villegas ', 'f', 2, 5, 2, 'Ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-08 15:35:02', '2024-05-08 15:35:02'),
(156, '050048', NULL, 'Brayan Marin espinosa ', 'm', 7, 5, 2, 'Ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-08 15:41:21', '2024-05-08 15:41:21'),
(157, '198102', NULL, 'Ernesto Mendoza Alvarez ', 'm', 2, 5, 2, 'No ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-08 16:05:59', '2024-05-08 16:05:59'),
(158, '222222', NULL, 'Ernesto Mendoza Alvarez ', 'm', 2, 5, 2, 'ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-08 16:16:31', '2024-05-08 16:16:31'),
(159, '121219', NULL, 'Daniela Guadalupe carrera González ', 'f', 2, 5, 2, 'Ni', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-08 16:33:01', '2024-05-08 16:33:01'),
(160, '070045', NULL, 'Maria Guadalupe Maldonado Ordoñez', 'f', 3, 6, 2, 'No', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-08 16:33:50', '2024-05-08 16:33:50'),
(161, '050046', NULL, 'José Antonio Vázquez Chavarria', 'm', 7, 8, 2, 'No', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-08 16:39:53', '2024-05-08 16:39:53'),
(162, '040038', NULL, 'Ermelinda Gomez Montejo ', 'f', 4, 10, 2, 'Ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-08 17:24:46', '2024-05-08 17:24:46'),
(163, '040016', NULL, 'Celeste Santos González ', 'f', 4, 5, 2, 'Ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-08 17:39:39', '2024-05-08 17:39:39'),
(166, '040082', NULL, 'Miguel Angel Díaz Castellanos ', 'm', 4, 6, 2, 'Ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-08 21:05:58', '2024-05-08 21:05:58'),
(171, '060024', NULL, 'Nallely Melani Ramírez Hernández ', 'f', 2, 8, 2, 'No', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-09 10:26:13', '2024-05-09 10:26:13'),
(172, '070042', NULL, 'Alex Velasco Abelino', 'm', 3, 9, 2, 'Ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-09 10:54:41', '2024-05-09 10:54:41'),
(175, '070003', NULL, 'LORENZO GUILLERMO GOMEZ GOMEZ', 'm', 3, 8, 2, 'ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-09 18:42:18', '2024-05-09 18:42:18'),
(176, '070004', NULL, 'LORENZO GUILLERMO GOMEZ GOMEZ', 'm', 3, 8, 2, 'ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-09 18:44:03', '2024-05-09 18:44:03'),
(177, '022177', NULL, 'LORENZO GUILLERMO GOMEZ GOMEZ', 'm', 3, 8, 2, 'Ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-09 18:47:33', '2024-05-09 18:47:33'),
(180, '07003', NULL, 'LORENZO GUILLERMO GOMEZ GOMEZ', 'm', 3, 8, 2, 'Ninguna', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-11 09:00:23', '2024-05-11 09:00:23'),
(181, '70003', NULL, 'LORENZO GUILLERMO GOMEZ GOMEZ', 'm', 3, 8, 2, 'Ninguna', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-11 09:01:01', '2024-05-11 09:01:01'),
(182, '010015', NULL, 'Mía del Carmen Caraveo Palomeque ', 'f', 5, 8, 2, 'No', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-11 14:27:12', '2024-05-11 14:27:12'),
(183, '080021', NULL, 'Toni Emanuel Alfaro Domínguez ', 'm', 1, 5, 2, 'No', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-12 07:39:04', '2024-05-12 07:39:04'),
(184, '050041', NULL, 'Jorge de los santos Martinez lázaro ', 'm', 7, 10, 2, 'Ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-13 11:24:40', '2024-05-13 11:24:40'),
(186, '050015', NULL, 'JAVIER MORENO HERNÁNDEZ ', 'm', 7, 9, 2, 'No', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-14 06:58:44', '2024-05-14 06:58:44'),
(188, '070049', NULL, 'Eduardo Vázquez mazariego ', 'm', 3, 9, 2, 'No ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-14 18:16:09', '2024-05-14 18:16:09'),
(189, '070035', NULL, 'Hernández Arias Yetzia Dayana ', 'f', 3, 5, 2, 'No', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-14 18:16:16', '2024-05-14 18:16:16'),
(190, '040047', NULL, 'Alejandro Priego Alejo ', 'm', 4, 10, 2, 'No', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-16 11:58:36', '2024-05-16 11:58:36'),
(192, '40017', NULL, 'Maria Fernanda Cruz Arias ', 'f', 4, 8, 2, 'No', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-17 16:00:38', '2024-05-17 16:00:38'),
(193, '080014', NULL, 'Leonel López Pérez ', 'm', 1, 10, 2, 'Ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-17 17:37:43', '2024-05-17 17:37:43'),
(194, '080005', NULL, 'Miguel Angel Alvarez Torres', 'm', 6, 10, 2, 'tendencia a enfermedades respiratorias', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-20 11:19:14', '2024-05-20 11:19:14'),
(196, '050024', NULL, 'Rosber Jhared Altamirano cornelio ', 'm', 7, 10, 4, 'Ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-20 21:23:06', '2024-05-20 21:23:06'),
(197, '070015', NULL, 'Melany Michelle García Gómez ', 'f', 3, 8, 2, 'No padezco de ninguna enfermedad crónica o degenerativa.', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-20 22:32:45', '2024-05-20 22:32:45'),
(198, '060040', NULL, 'Diana Patricia Cazaux Aguilar ', 'f', 2, 10, 2, 'Ninguna ', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-23 10:20:58', '2024-05-23 10:20:58'),
(199, '0880012', NULL, 'Héctor Rafael Martínez Rueda', 'm', 1, 10, 4, 'no', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 0, 0, NULL, NULL, NULL, 0, '2024-05-28 18:00:58', '2024-05-28 18:00:58'),
(200, '32323', '20E30214', 'Daniel Batalla de la Cruz', 'm', 5, 5, 4, 'Ninguna', NULL, '{\"first_criteria\":\"0\",\"second_criteria\":\"0\",\"third_criteria\":\"0\",\"fourth_criteria\":\"0\",\"fifth_criteria\":\"0\",\"sixth_criteria\":\"0\",\"seventh_criteria\":\"0\"}', 1, 1, 'Example Admin User', '2024-05-29 13:17:54', '2iGxCtXcP5eZOeRkTQ6V0q1QXLvUpW8C', 1, '2024-05-29 13:12:27', '2024-05-29 13:18:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Example Admin User', 'admin@example.com', '2024-04-11 20:39:12', '$2y$12$uGLn2qREF.Rto9vuk6Y5k.R0SiWqS0TOJuMwbD6iBJWKlEkQPjhay', 'oVH1ZFjgkgABhxu9KUbVgRUchVp6Mm0ImxijyVFOhMRJZtflIgHc4gUpvfsv', '2024-04-11 20:39:12', '2024-05-02 11:52:05'),
(6, 'Ponciano García Castellanos', 'ponciano.gc@regionsierra.tecnm.mx', NULL, '$2y$12$rJ1G4fbYNEyZBS2s7LY4pumzv597FPInPnctpPmLcGnTsBdMY06lu', NULL, '2024-05-02 11:33:49', '2024-05-02 14:52:27'),
(7, 'Migda Leydi Sánchez Calix', 'extraescolar@regionsierra.tecnm.mx', NULL, '$2y$12$NLz2dM89j/KY/CW5BVunzuf7B/E2mQ4j.hliDon7fhgO9kqLuLK36', '9ucaYuRSDrv8Us1GFDe4vOSdF68QyI2P3eSwWuGrGkkO0qlIWUgYbU4QCWq7', '2024-05-02 11:47:00', '2024-05-02 14:43:53'),
(8, 'Aracely del Carmen Medina Calderón', 'aracely.mc@regionsierra.tecnm.mx', NULL, '$2y$12$cjvXiKtFjsucCLAZQiLbfuzjUfq3MdsJwlwECxdDQ0hP4d3ZNKNzK', 'a30zKFhVdq0pqRfpRcHgdVwSv1DZfsd8U32JHIBzQmLFCzGjBpCZRgAglYgR', '2024-05-02 14:00:01', '2024-05-02 14:00:01'),
(9, 'Roberto Méndez Velázquez', 'roberto.mv@regionsierra.tecnm.mx', NULL, '$2y$12$DhAqRBWA2iITOxgMAIsL3eHm1m/.dldhgEYpyerO2QICcUigMYgoS', NULL, '2024-05-02 14:10:37', '2024-05-02 14:10:37'),
(10, 'Abel Pérez Rodríguez', 'abel.pr@regionsierra.tecnm.mx', NULL, '$2y$12$XyGuJg.lKIEWNDSt7f9Od.DyhHu2x6bCtyAFIwNKabbZbfZ/2lXfS', 'ygmjZkHAdoWmvBXF7Gt2uJvSrLNfY6AuV1bZNVqdMna0uE0Kb1EckWm16r6y', '2024-05-02 14:14:26', '2024-05-02 14:14:26'),
(11, 'Gabriel Osorio Ascencio', 'gabriel.oa@regionsierra.tecnm.mx', NULL, '$2y$12$.h2xP/TaEbJ9EX52wc8s8u0UGVsCN9iMItgVF0ZA6Cyc1JHJpfhIW', NULL, '2024-05-02 14:15:30', '2024-05-02 14:15:30'),
(12, 'Rafael May Segura', 'rafael.ms@regionsierra.tecnm.mx', NULL, '$2y$12$gNsv0xv57VldUk57T0svsO88Yho6D.ON84afv1PyLW5ED72jJtipa', 'LEP2TcqQjuUdyWmDzl7VaYlOn41vR7OVkIIaeL3aJrEBPLVVubSiHTdAQDn2', '2024-05-02 14:17:29', '2024-05-02 14:17:29');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activities_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `activity_period`
--
ALTER TABLE `activity_period`
  ADD KEY `activity_period_activity_id_foreign` (`activity_id`),
  ADD KEY `activity_period_period_id_foreign` (`period_id`);

--
-- Indices de la tabla `activity_user`
--
ALTER TABLE `activity_user`
  ADD KEY `activity_user_activity_id_foreign` (`activity_id`),
  ADD KEY `activity_user_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `careers`
--
ALTER TABLE `careers`
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
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `periods`
--
ALTER TABLE `periods`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_validation_token_unique` (`validation_token`),
  ADD KEY `students_career_id_foreign` (`career_id`),
  ADD KEY `students_activity_id_foreign` (`activity_id`),
  ADD KEY `students_period_id_foreign` (`period_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `activities`
--
ALTER TABLE `activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `careers`
--
ALTER TABLE `careers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `periods`
--
ALTER TABLE `periods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `activity_period`
--
ALTER TABLE `activity_period`
  ADD CONSTRAINT `activity_period_activity_id_foreign` FOREIGN KEY (`activity_id`) REFERENCES `activities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `activity_period_period_id_foreign` FOREIGN KEY (`period_id`) REFERENCES `periods` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `activity_user`
--
ALTER TABLE `activity_user`
  ADD CONSTRAINT `activity_user_activity_id_foreign` FOREIGN KEY (`activity_id`) REFERENCES `activities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `activity_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_activity_id_foreign` FOREIGN KEY (`activity_id`) REFERENCES `activities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_career_id_foreign` FOREIGN KEY (`career_id`) REFERENCES `careers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_period_id_foreign` FOREIGN KEY (`period_id`) REFERENCES `periods` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
