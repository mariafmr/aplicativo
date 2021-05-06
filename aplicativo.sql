-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-04-2021 a las 06:34:13
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aplicativo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `analysis_titles`
--

CREATE TABLE `analysis_titles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `analysis_titles`
--

INSERT INTO `analysis_titles` (`id`, `title`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Amenazas de tipo natural', '1619635661AmenazasNaturalesBanner.png', '2021-04-28 23:47:42', '2021-04-28 23:47:42'),
(2, 'Amenazas de tipo antrópico', '1619635690AmenazasAntropicasBanner.png', '2021-04-28 23:48:10', '2021-04-28 23:48:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ancient_events`
--

CREATE TABLE `ancient_events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_final` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `eventan_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ancient_events`
--

INSERT INTO `ancient_events` (`id`, `title`, `subtitle`, `content`, `link`, `fecha`, `hora_inicio`, `hora_final`, `created_at`, `updated_at`, `eventan_id`) VALUES
(1, 'Evacuación Universidad Mariana', NULL, '<p>Es importante aclarar que no todas las emergencias requieren activar el plan de evacuaci&oacute;n. Por ejemplo, en caso de una asonada en el exterior de una empresa, lo m&aacute;s conveniente es permanecer en el interior y alejado de las ventanas. Igualmente, en caso de un temblor de baja intensidad no es necesario abandonar el edificio. Por lo tanto el personal debe estar atento a las instrucciones de los brigadistas.</p>', NULL, '2019-06-28', '10:00:00', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archives`
--

CREATE TABLE `archives` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `archives`
--

INSERT INTO `archives` (`id`, `title`, `description`, `path`, `categories_id`, `created_at`, `updated_at`) VALUES
(1, '1619231676_RutaSantaClara (1).PNG', 'hkdshfksd', 'public/storage/yYJmcUfoakUwDUJ0t3MJ6cEOMCV1FqeI0NWcmQML.png', NULL, '2021-04-28 03:01:39', '2021-04-28 03:01:39'),
(2, '1619231676_RutaSantaClara (1).PNG', '', 'public/storage/C44NMYgbfAWOjVqhAY0dJYqazXWkwGzo4RmjXSL7.png', NULL, '2021-04-28 03:01:56', '2021-04-28 03:01:56'),
(3, '1619231676_RutaSantaClara (2).PNG', '', 'public/storage/6RWTGV7tV4qRQM4dSMbGnQjEP6ZsR254NVNhjdAa.png', NULL, '2021-04-28 03:04:51', '2021-04-28 03:04:51'),
(4, '1619231676_RutaSantaClara (1).PNG', '', 'public/storage/pdwe6k6u7OqRKvx5VbnXu05QCnSxVmjkD5MNtxwS.png', NULL, '2021-04-28 03:21:00', '2021-04-28 03:21:00'),
(5, '1619231676_RutaSantaClara (1).PNG', '', 'public/storage/7MEKBgFUi1FRYcy5KbJZSnFFWNYfV10gZHDcs0uE.png', NULL, '2021-04-28 03:21:17', '2021-04-28 03:21:17'),
(6, '1619231676_RutaSantaClara (1).PNG', '', 'public/storage/iUa3JccnBzT9QhuKESEuz8ljcjFX394uMPPsql57.png', NULL, '2021-04-28 03:23:30', '2021-04-28 03:23:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `area` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blocks`
--

CREATE TABLE `blocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `block` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `evacu_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `blocks`
--

INSERT INTO `blocks` (`id`, `block`, `link`, `image`, `content`, `created_at`, `updated_at`, `evacu_id`) VALUES
(1, 'BLOQUE MADRE CARIDAD', 'https://www.umariana.edu.co/visitas360/B-Madre-Caridad-1/', '1619653337mcaridad2.png', '<p>Este bloque est&aacute; ubicado en la parte frontal del acceso principal a la universidad. En &eacute;l se encuentran ubicadas las siguientes dependencias y aulas de clase: Piso Cero: Canal de Radio y Televisi&oacute;n, Archivo Institucional, Ba&ntilde;o, Bodega, Admisiones Registro y Control Acad&eacute;mico, Unidad de Emprendimiento y Esp&iacute;ritu Empresarial, Cafeter&iacute;a. Con una &aacute;rea total de 562.73 Mts2.</p>\r\n\r\n<p><strong>Primer Piso: </strong>Biblioteca, Informaci&oacute;n, Relaciones P&uacute;blicas, Archivo, Secretar&iacute;a General, Capilla San Jos&eacute;, Sala de Profesores Facultad de Humanidades y Ciencias Sociales, Rector&iacute;a, Secretar&iacute;a de Rector&iacute;a, Vicerrector&iacute;a Administrativa y Financiera, Pagadur&iacute;a, Vicerrectoria Acad&eacute;mica, Cartera y Cr&eacute;dito ICETEX, Gesti&oacute;n Humana, Salud Ocupacional, Centro de Investigaciones, Planeaci&oacute;n, Decanatura de Humanidades y Ciencias Sociales, Coordinaci&oacute;n Egresados, Control Interno, Revisor&iacute;a Fiscal, Bater&iacute;as Sanitarias. Con una &aacute;rea total de 1282.67 Mts cuadrados.</p>\r\n\r\n<p><strong>Segundo Piso: </strong>Facultad de Educaci&oacute;n, Sala de Profesores Facultad de Educaci&oacute;n, Oficina Banco de Oferentes, Sala de Profesores de Enfermer&iacute;a y Terapia Ocupacional, Sala M&uacute;ltiple, Fondo de Empleados UNIMAR, Facultad Ciencias Contables Econ&oacute;micas y Administrativas, Secretar&iacute;a Contadur&iacute;a P&uacute;blica, Direcci&oacute;n Programa Contadur&iacute;a P&uacute;blica, Sala de Profesores Contadur&iacute;a P&uacute;blica, Asesor&iacute;a e Investigaci&oacute;n Contadur&iacute;a P&uacute;blica, Direcci&oacute;n Programa Administraci&oacute;n de Negocios Internacionales, Secretar&iacute;a Programa Administraci&oacute;n de Negocios Internacionales, Aulas 202, 203, 204, 205, 206, 207, 208, 209, 210, 211, 212. Bater&iacute;as Sanitarias. Con una &aacute;rea total de 1.294.47 Mts2</p>', '2021-04-29 04:42:18', '2021-04-29 04:42:18', 1),
(2, 'BLOQUE SANTA CLARA', 'https://www.umariana.edu.co/visitas360/B-santaclara-virtual1/', '1619653477santa-clara.png', '<p>Est&aacute; ubicado entre el Bloque Madre Caridad y el Bloque San Francisco, en &eacute;l se encuentran las siguientes dependencias y aulas de clase:</p>\r\n\r\n<p><strong>Piso Cero:</strong> Direcci&oacute;n Servicios Operacionales, Publicaciones, Fotocopiadoras, Almac&eacute;n, Sala de Teatro, Bater&iacute;as Sanitarias. Con una &aacute;rea total de 302 Mts2.</p>\r\n\r\n<p><strong>Primer Piso:</strong> Facultad Ciencias de la Salud, Centro de Educaci&oacute;n para el Trabajo y Desarrollo Humano, Direcci&oacute;n Programa Terapia Ocupacional, Sala de Profesores Terapia Ocupacional, Direcci&oacute;n Programa Auxiliares de Enfermer&iacute;a, Direcci&oacute;n Programa Regencia en Farmacia, Direcci&oacute;n Programa Enfermer&iacute;a, Sala de Profesores Auxiliares de Enfermer&iacute;a, Laboratorio de Enfermer&iacute;a, Laboratorio de Microbiolog&iacute;a y Biolog&iacute;a, Salas de Proyecci&oacute;n 110, 114, 115, Bater&iacute;as Sanitarias. Con una &aacute;rea total de 944 Mts2.</p>\r\n\r\n<p><strong>Segundo Piso:</strong> Centro de Recursos Educativos, Audit&oacute;rium Madre Caridad Brader, Salas de proyecci&oacute;n 202, 203, 204, 205, Bater&iacute;as Sanitarias. Con una &aacute;rea total de 944 Mts2.</p>\r\n\r\n<p>La ubicaci&oacute;n de estas dependencias es adecuada, de f&aacute;cil acceso, permitiendo que los estudiantes y la comunidad universitaria se congreguen tanto en las salas de proyecci&oacute;n, como en el Audit&oacute;rium, recinto que se utiliza como espacio para los eventos culturales,&nbsp;conferencias, foros, ceremonias de grados, eventos de danza y m&uacute;sica, entre otros</p>', '2021-04-29 04:44:38', '2021-04-29 04:44:38', 1),
(3, 'BLOQUE SAN FRANCISCO', 'https://www.umariana.edu.co/visitas360/B-San-Francisco-2/', '1619653648san-francisco2.png', '<p>Se encuentra ubicado entre los bloques San Buenaventura y Maria Inmaculada dispone de cuatro pisos distribuidos de la siguiente manera:</p>\r\n\r\n<p><strong>Piso Cero:</strong> Laboratorio de Fotograf&iacute;a, Sala de Proyecci&oacute;n 004, Aula 005, Planta El&eacute;ctrica, Bater&iacute;as Sanitarias. Con &aacute;rea total de 127 Mts2.</p>\r\n\r\n<p><strong>Primer Piso:</strong> Direcci&oacute;n Programa Fisioterapia, Direcci&oacute;n Programa Radiodiagn&oacute;stico y Radioterapia, Laboratorio de Radiodiagn&oacute;stico, Auditorio Pedro Schumacher, Aulas 102, 103, 105. Con una &aacute;rea total de 336 Mts2.</p>\r\n\r\n<p><strong>Segundo Piso:</strong> Oficina de Asesor&iacute;a, Aulas 202, 203, 204, 205, Direcci&oacute;n Programa Nutrici&oacute;n y Diet&eacute;tica, Bater&iacute;as Sanitarias. Con una &aacute;rea total de 308 Mts2. Tercer Piso: Direcci&oacute;n Programa Psicolog&iacute;a, Sala de Profesores Psicolog&iacute;a, Secretar&iacute;a Programa Psicolog&iacute;a, C&aacute;mara de Gessel, Aula 302, Bater&iacute;as Sanitarias. Con una &aacute;rea total de 308 Mts2</p>', '2021-04-29 04:47:28', '2021-04-29 04:47:28', 1),
(4, 'BLOQUE JESUS DE NAZARETH', 'https://www.umariana.edu.co/visitas360/B-Jesus-Nazareth-1/', '1619653769j-nazareth1.png', '<p>Este Bloque est&aacute; ubicado junto al polideportivo, lo conforman 7 niveles donde se encuentran los siguientes espacios.</p>\r\n\r\n<p><strong>Piso Cero: </strong>Direcci&oacute;n Programa de Derecho, Sala de Profesores Programa de Derecho, Sal&oacute;n de M&uacute;sica, Centro de Asesor&iacute;a Psicol&oacute;gica, Consultorio M&eacute;dico, Bater&iacute;as Sanitarias.</p>\r\n\r\n<p><strong>Primer Piso:</strong> Laboratorio de Actitud F&iacute;sica y Autonom&iacute;a, Laboratorio de Estimulaci&oacute;n y Juegos, Laboratorio de Tecnolog&iacute;a y Rehabilitaci&oacute;n, Pastoral Universitaria, Bienestar Universitario, Auditorio Jes&uacute;s de Nazaret, Bater&iacute;as Sanitarias.</p>\r\n\r\n<p><strong>Segundo Piso:</strong> Aulas 201, 202, 203, 204, 205, 206, 207, 208, 209, Direcci&oacute;n Programa Trabajo Social, Sala de Profesores Trabajo Social, Bater&iacute;as Sanitarias. Tercer Nivel: Aulas 301, 302, 303, 304, 305, 306, 307, 308, 309, 310, Bater&iacute;as Sanitarias. Cuarto Nivel: Aulas 401, 402, 403, 404, 405, 406, 407, 408, 409, 410, Bater&iacute;as Sanitarias. Quinto Nivel: Aulas 501, 502, 503,504, 505, 506, Bater&iacute;as Sanitarias. Sexto Nivel: Cafeter&iacute;a, Aulas 602, 603,604, 605, Bater&iacute;as Sanitarias. S&eacute;ptimo Nivel: Terraza mirador Polideportivo: Canchas deportivas, Coordinaci&oacute;n Deportes, Bodega Con una &aacute;rea total de 1.396.18 Mts2</p>', '2021-04-29 04:49:29', '2021-04-29 04:49:29', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `block_titles`
--

CREATE TABLE `block_titles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `block_titles`
--

INSERT INTO `block_titles` (`id`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Instalaciones Físicas: Universidad Mariana', '<p>La edificaci&oacute;n est&aacute; conformada por seis bloques, distribuidos en el campus universitario arm&oacute;nicamente, con excelente dise&ntilde;o y ventilaci&oacute;n e iluminaci&oacute;n, de f&aacute;cil acceso y ambiente acogedor. El paisaje se ve enriquecido con la majestuosidad del volc&aacute;n Galeras</p>', '2021-04-29 04:40:37', '2021-04-29 04:40:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brigada`
--

CREATE TABLE `brigada` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `celular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cargo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bloque` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brigades`
--

CREATE TABLE `brigades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cellphone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `landline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `charge_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `names_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `brigades`
--

INSERT INTO `brigades` (`id`, `telephone`, `cellphone`, `landline`, `image`, `charge_id`, `created_at`, `updated_at`, `names_id`) VALUES
(1, '7314923', '3148304777', '124', '1619646685rectora.png', 1, '2021-04-29 02:51:25', '2021-04-29 02:51:25', 1),
(2, '7314923', '', '175', '1619646743brigadista.png', 5, '2021-04-29 02:52:23', '2021-04-29 02:52:23', 6),
(3, '7314923', '', '195', '1619646904brigadista3.png', 7, '2021-04-29 02:53:20', '2021-04-29 02:55:04', 7),
(4, '7314923', '', '198', '1619647125doctora.gif', 2, '2021-04-29 02:58:45', '2021-04-29 02:58:45', 2),
(5, '7314923', '3122407386', '214', '1619647173brigadista2.png', 3, '2021-04-29 02:59:33', '2021-04-29 02:59:33', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brigade_titles`
--

CREATE TABLE `brigade_titles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `brigade_titles`
--

INSERT INTO `brigade_titles` (`id`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Brigada de Emergencia', '<p>La Brigada de Emergencias de la Universidad Mariana est&aacute; conformada por grupo de trabajadores que hacen parte de las &aacute;reas de docencia, administrativa y operativa.</p>', '2021-04-29 02:34:55', '2021-04-29 02:34:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brigade_title_principals`
--

CREATE TABLE `brigade_title_principals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `content`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, '2021-04-28 02:57:05', '2021-04-28 02:57:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `charges`
--

CREATE TABLE `charges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `names` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastnames` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `charge` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `charges`
--

INSERT INTO `charges` (`id`, `names`, `lastnames`, `charge`, `area`, `created_at`, `updated_at`) VALUES
(1, 'Amanda Del Pilar', 'Lucero Vallejo', 'Hermana', 'Rectoría', '2021-04-29 02:19:55', '2021-04-29 02:19:55'),
(2, 'María Del Socorro', 'Paredes Caguasango', 'Doctora', 'Vicerrectora Administrativa', '2021-04-29 02:20:24', '2021-04-29 02:20:24'),
(3, 'Lucy Stella', 'Obando', 'Coordinación Oficina de SST', 'Seguridad y Salud en el Trabajo', '2021-04-29 02:21:05', '2021-04-29 02:21:05'),
(4, 'Darío Andrés', 'Pejendino', 'Coordinador de Alturas', 'Mantenimiento', '2021-04-29 02:21:47', '2021-04-29 02:21:47'),
(5, 'Javier', 'Villalba', 'Brigadista', 'Ingeniería Ambiental', '2021-04-29 02:22:37', '2021-04-29 02:22:37'),
(6, 'Fabio Camilo', 'Gómez', 'Brigadista', 'Biblioteca', '2021-04-29 02:24:09', '2021-04-29 02:24:09'),
(7, 'Carlos', 'Insistí', 'Brigadista', 'Redes', '2021-04-29 02:24:45', '2021-04-29 02:24:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `committees`
--

CREATE TABLE `committees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `names` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `charge_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `committee_titles`
--

CREATE TABLE `committee_titles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evacuation_plan_titles`
--

CREATE TABLE `evacuation_plan_titles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `evacuation_plan_titles`
--

INSERT INTO `evacuation_plan_titles` (`id`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Rutas de evacuación', '<p>Los puntos de encuentro se establecen seg&uacute;n la ubicaci&oacute;n de cada Bloque y las diferentes &aacute;reas y dependencias, estos puntos de encuentro deben ser socializados por parte del El brigadista responsable de la Evacuaci&oacute;n.</p>', '2021-04-29 04:55:20', '2021-04-29 04:55:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evacuation_points`
--

CREATE TABLE `evacuation_points` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brigade_id` bigint(20) UNSIGNED NOT NULL,
  `brigade1_id` bigint(20) UNSIGNED NOT NULL,
  `brigade2_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brigade3_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brigade4_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brigade5_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `evacuationti_id` bigint(20) UNSIGNED NOT NULL,
  `block_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `evacuation_points`
--

INSERT INTO `evacuation_points` (`id`, `content`, `title`, `link`, `brigade_id`, `brigade1_id`, `brigade2_id`, `brigade3_id`, `brigade4_id`, `brigade5_id`, `created_at`, `updated_at`, `evacuationti_id`, `block_id`) VALUES
(1, '<p>RIESGOS</p>\r\n\r\n<ul>\r\n	<li>Cilindros de gas existentes en la cafeter&iacute;a principal.</li>\r\n	<li>Cilindros de gas existente en la residencia de las hermanas franciscanas.</li>\r\n	<li>Computadores existentes en cada oficina.</li>\r\n	<li>En archivo institucional central en el cielo raso se evidencia grietas y fisuras que pueden generar colapso de este por humedad y deterioro de estructura existencia de luminaria en mal estado.</li>\r\n	<li>El archivo Central presento inundaci&oacute;n por explosi&oacute;n de tanque de agua existente en la residencias de las Hermanas Franciscanas. El puente o pasillo que conecta la oficina de SST con Icetex no cuenta con buenas columnas resistentes ante un sismo.</li>\r\n	<li>El puente o pasillo que une el bloque Madre Caridad y Santa Clara puede generar un riesgo ante un sismo por estructuras d&eacute;biles.</li>\r\n	<li>En la parte externa de este Bloque hacia la calle existe el riesgo p&uacute;blico por residencia de pol&iacute;tico.</li>\r\n	<li>El techo del pasillo que conecta con gesti&oacute;n humana presenta grietas y averiaciones en la parte superior e inferior con posibilidad de colapsar.</li>\r\n</ul>', 'Plan Operativo de Evacuación Por Bloques', 'https://www.umariana.edu.co/dependencias/Recursos-Educativos/infraestructura.html', 5, 3, 4, 3, 2, 2, '2021-04-29 05:10:18', '2021-04-29 05:15:52', 1, 1),
(2, '<p>RIESGOS</p>\r\n\r\n<ul>\r\n	<li>&Aacute;rea de audiovisuales: existencia de equipos de alta gama y circulaci&oacute;n de personas.</li>\r\n	<li>&Aacute;rea de almac&eacute;n: existencia de sustancias qu&iacute;micas, e inflamables y material particulado.</li>\r\n	<li>&Aacute;rea de Publicaciones: existencia de material particulado.</li>\r\n	<li>&Aacute;rea de Fotocopias: material particulado.</li>\r\n	<li>Maquina el&eacute;ctrica de caf&eacute; al costado de la puerta principal del Bloque, puede generar riesgo de explosi&oacute;n.</li>\r\n</ul>', 'Plan Operativo de Evacuación Por Bloques', 'https://www.umariana.edu.co/dependencias/Recursos-Educativos/infraestructura.html', 3, 5, 4, 1, 2, 5, '2021-04-29 05:20:47', '2021-04-29 05:36:51', 1, 2),
(3, '<p>RIESGOS</p>\r\n\r\n<ul>\r\n	<li>Existencia de computadores</li>\r\n	<li>Pasamano ubicado en el tercer piso a una altura inadecuada.</li>\r\n	<li>Cilindros de gas por la cafeter&iacute;a.</li>\r\n</ul>', 'Plan Operativo de Evacuación Por Bloques', 'https://www.umariana.edu.co/dependencias/Recursos-Educativos/infraestructura.html', 3, 2, 4, 3, 2, 5, '2021-04-29 05:20:47', '2021-04-29 05:37:45', 1, 3),
(4, '<p>RIESGOS</p>\r\n\r\n<ul>\r\n	<li>Fachada en vidrio.</li>\r\n	<li>Gradas no tienen las medidas establecidas.</li>\r\n	<li>Ausencia de pasamanos (donde se sientan los estudiantes) en el corredor de las aulas de los tres pisos</li>\r\n</ul>', 'Plan Operativo de Evacuación Por Bloques', 'https://www.umariana.edu.co/dependencias/Recursos-Educativos/infraestructura.html', 5, 2, 4, 3, 2, 5, '2021-04-29 05:20:47', '2021-04-29 05:35:05', 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evacuation_point_titles`
--

CREATE TABLE `evacuation_point_titles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evacuation_titles`
--

CREATE TABLE `evacuation_titles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `evacuation_titles`
--

INSERT INTO `evacuation_titles` (`id`, `title`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Plan de evacuación', '1619658021Unimar.jpg', '2021-04-29 01:50:22', '2021-04-29 06:00:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `event_titles`
--

CREATE TABLE `event_titles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `event_titles`
--

INSERT INTO `event_titles` (`id`, `title`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Eventos y Noticias', '1619659298EventosBanner.png', '2021-04-29 06:21:39', '2021-04-29 06:21:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageable_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `images`
--

INSERT INTO `images` (`id`, `url`, `imageable_type`, `imageable_id`, `created_at`, `updated_at`) VALUES
(1, '/imagenes/1619655018_MCaridadPunto1.PNG', 'App\\EvacuationPoint', 1, '2021-04-29 05:10:19', '2021-04-29 05:10:19'),
(2, '/imagenes/1619655018_MCaridadPunto2.PNG', 'App\\EvacuationPoint', 1, '2021-04-29 05:10:19', '2021-04-29 05:10:19'),
(3, '/imagenes/1619655018_MCaridadPunto3.PNG', 'App\\EvacuationPoint', 1, '2021-04-29 05:10:19', '2021-04-29 05:10:19'),
(4, '/imagenes/1619655018_MCaridadPunto4.PNG', 'App\\EvacuationPoint', 1, '2021-04-29 05:10:19', '2021-04-29 05:10:19'),
(5, '/imagenes/1619655352_MCaridadPunto1.PNG', 'App\\EvacuationPoint', 1, '2021-04-29 05:15:52', '2021-04-29 05:15:52'),
(6, '/imagenes/1619655352_MCaridadPunto2.PNG', 'App\\EvacuationPoint', 1, '2021-04-29 05:15:52', '2021-04-29 05:15:52'),
(7, '/imagenes/1619655352_MCaridadPunto3.PNG', 'App\\EvacuationPoint', 1, '2021-04-29 05:15:52', '2021-04-29 05:15:52'),
(8, '/imagenes/1619655352_MCaridadPunto4.PNG', 'App\\EvacuationPoint', 1, '2021-04-29 05:15:52', '2021-04-29 05:15:52'),
(9, '/imagenes/1619655417_mcaridad3.png', 'App\\EvacuationPoint', 1, '2021-04-29 05:16:57', '2021-04-29 05:16:57'),
(10, '/imagenes/1619655417_MCaridadPunto1.PNG', 'App\\EvacuationPoint', 1, '2021-04-29 05:16:57', '2021-04-29 05:16:57'),
(11, '/imagenes/1619655417_MCaridadPunto2.PNG', 'App\\EvacuationPoint', 1, '2021-04-29 05:16:57', '2021-04-29 05:16:57'),
(12, '/imagenes/1619655417_MCaridadPunto3.PNG', 'App\\EvacuationPoint', 1, '2021-04-29 05:16:57', '2021-04-29 05:16:57'),
(13, '/imagenes/1619655417_MCaridadPunto4.PNG', 'App\\EvacuationPoint', 1, '2021-04-29 05:16:57', '2021-04-29 05:16:57'),
(14, '/imagenes/1619655647_mcaridad2.png', 'App\\EvacuationPoint', 2, '2021-04-29 05:20:47', '2021-04-29 05:20:47'),
(15, '/imagenes/1619655837_santa-clara-punto1.png', 'App\\EvacuationPoint', 2, '2021-04-29 05:23:57', '2021-04-29 05:23:57'),
(16, '/imagenes/1619656094_san-francisco2.png', 'App\\EvacuationPoint', 3, '2021-04-29 05:28:14', '2021-04-29 05:28:14'),
(17, '/imagenes/1619656094_san-francisco-punto1.png', 'App\\EvacuationPoint', 3, '2021-04-29 05:28:14', '2021-04-29 05:28:14'),
(18, '/imagenes/1619656505_j-nazareth1.png', 'App\\EvacuationPoint', 4, '2021-04-29 05:35:05', '2021-04-29 05:35:05'),
(19, '/imagenes/1619656505_j-nazareth-punto1.png', 'App\\EvacuationPoint', 4, '2021-04-29 05:35:05', '2021-04-29 05:35:05'),
(20, '/imagenes/1619656505_j-nazareth-punto2.png', 'App\\EvacuationPoint', 4, '2021-04-29 05:35:05', '2021-04-29 05:35:05'),
(21, '/imagenes/1619656505_j-nazareth-punto3.png', 'App\\EvacuationPoint', 4, '2021-04-29 05:35:05', '2021-04-29 05:35:05'),
(22, '/imagenes/1619656505_j-nazareth-punto4png.PNG', 'App\\EvacuationPoint', 4, '2021-04-29 05:35:05', '2021-04-29 05:35:05'),
(23, '/imagenes/1619659691_Noticia1.jpg', 'App\\InformationNew', 1, '2021-04-29 06:28:11', '2021-04-29 06:28:11'),
(24, '/imagenes/1619659887_Noticia2.jpg', 'App\\InformationNew', 2, '2021-04-29 06:31:27', '2021-04-29 06:31:27'),
(25, '/imagenes/1619660330_brigada ibarra 105.jpg', 'App\\AncientEvent', 1, '2021-04-29 06:38:50', '2021-04-29 06:38:50'),
(26, '/imagenes/1619660397_brigada ibarra 105.jpg', 'App\\InformationNew', 3, '2021-04-29 06:39:57', '2021-04-29 06:39:57'),
(27, '/imagenes/1619660746_DSCN4986.JPG', 'App\\AncientEvent', 1, '2021-04-29 06:45:47', '2021-04-29 06:45:47'),
(28, '/imagenes/1619660746_DSCN4997.JPG', 'App\\AncientEvent', 1, '2021-04-29 06:45:47', '2021-04-29 06:45:47'),
(29, '/imagenes/1619660746_DSCN5018.JPG', 'App\\AncientEvent', 1, '2021-04-29 06:45:47', '2021-04-29 06:45:47'),
(30, '/imagenes/1619660746_DSCN5037.JPG', 'App\\AncientEvent', 1, '2021-04-29 06:45:47', '2021-04-29 06:45:47'),
(31, '/imagenes/1619661079_DSCN5018.JPG', 'App\\NewEvent', 1, '2021-04-29 06:51:19', '2021-04-29 06:51:19'),
(32, '/imagenes/1619661079_DSCN5037.JPG', 'App\\NewEvent', 1, '2021-04-29 06:51:19', '2021-04-29 06:51:19'),
(33, '/imagenes/1619661567_AmenazasNaturalesBanner.png', 'App\\NewEvent', 2, '2021-04-29 06:59:27', '2021-04-29 06:59:27'),
(34, '/imagenes/1619661567_Aplicativo sst.png', 'App\\NewEvent', 2, '2021-04-29 06:59:27', '2021-04-29 06:59:27'),
(35, '/imagenes/1619661567_AplicativoUnimar.png', 'App\\NewEvent', 2, '2021-04-29 06:59:27', '2021-04-29 06:59:27'),
(36, '/imagenes/1619661703_brigada ibarra 105.jpg', 'App\\InformationNew', 4, '2021-04-29 07:01:44', '2021-04-29 07:01:44'),
(37, '/imagenes/1619661703_Brigada.jpg', 'App\\InformationNew', 4, '2021-04-29 07:01:44', '2021-04-29 07:01:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `image_prins`
--

CREATE TABLE `image_prins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `image_prins`
--

INSERT INTO `image_prins` (`id`, `title`, `subtitle`, `content`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Brigada de Emergencia de la Universidad Mariana', NULL, '<p>Participantes de la brigada de emergencia</p>', '1619566689PrincipalBanner.jpg', '2021-04-28 04:38:09', '2021-04-28 04:38:09'),
(2, 'Sistema de Información', NULL, '<p>&quot;Aplicativo SST&quot; creado para solializar el Plan de Emergencias</p>', '1619566964AplicativoUnimar.png', '2021-04-28 04:40:32', '2021-04-28 04:42:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `information_news`
--

CREATE TABLE `information_news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_final` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `eventnew_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `information_news`
--

INSERT INTO `information_news` (`id`, `title`, `subtitle`, `content`, `link`, `fecha`, `hora_inicio`, `hora_final`, `created_at`, `updated_at`, `eventnew_id`) VALUES
(1, 'Servicio Geológico Colombiano', 'Resultados satisfactorios del ejercicio de intercomparación de isótopos estables en agua líquida IAEA-WICO 2020', '<p>​​El Servicio Geol&oacute;gico Colombiano, a trav&eacute;s de su Laboratorio de An&aacute;lisis de Is&oacute;topos Estables en agua l&iacute;quida (LAIE) de la Direcci&oacute;n de Asuntos Nucleares, particip&oacute; en el Ejercicio de Intercomparaci&oacute;n para la Determinaci&oacute;n de Deuterio (&delta;2H) y Ox&iacute;geno-18 (&delta;18O) en agua l&iacute;quida IAEA-WICO 2020, organizado por el Organismo Internacional de Energ&iacute;a At&oacute;mica &ndash; OIEA.</p>', 'https://www2.sgc.gov.co/Noticias/Paginas/Resultados-satisfactorios-del-ejercicio-de-intercomparacion-de-isotopos-estables-en-agua-liquida-.aspx', NULL, NULL, NULL, '2021-04-29 06:28:11', '2021-04-29 06:28:11', 1),
(2, 'Simulacro por sismo', NULL, '<p>En esta oportunidad no evacuamos a la calle, pero desde casa a lugar de trabajo nos podemos preparar.</p>', 'https://acreditacion.umariana.edu.co/simulacro/', NULL, NULL, NULL, '2021-04-29 06:31:27', '2021-04-29 06:31:27', 1),
(3, 'El Comité Paritario de Seguridad y Salud en el Trabajo COPASST', NULL, '<p>El Comit&eacute; Paritario de Seguridad y Salud en el Trabajo COPASST, es un organismo de promoci&oacute;n y vigilancia de las normas y reglamentos de la seguridad y salud en el Trabajo de la Universidad, la cual debe conformarse cada 2 a&ntilde;os y se rige por la resoluci&oacute;n 2013 de 1986.</p>', 'http://www.umariana.edu.co/images/Gestion-Talento-Humano/comites-sst.pdf', NULL, NULL, NULL, '2021-04-29 06:39:57', '2021-04-29 06:39:57', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `means_titles`
--

CREATE TABLE `means_titles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `means_titles`
--

INSERT INTO `means_titles` (`id`, `title`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Recursos del plan de prevención, preparación y respuesta ante emergencia.', '1619647427RecursosBanner.png', '2021-04-29 01:53:17', '2021-04-29 03:03:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(505, '2014_10_12_000000_create_users_table', 1),
(506, '2019_08_19_000000_create_failed_jobs_table', 1),
(507, '2020_05_21_193825_create_brigada_table', 1),
(508, '2021_01_07_224216_create_threats_sub_titles_table', 1),
(509, '2021_01_08_021847_create_threats_titles_table', 1),
(510, '2021_01_10_211241_create_relief_agency_titles_table', 1),
(511, '2021_01_10_234105_create_relief_agencies_table', 1),
(512, '2021_01_15_203801_create_block_titles_table', 1),
(513, '2021_01_17_004019_create_types_table', 1),
(514, '2021_01_20_192056_create_committee_titles_table', 1),
(515, '2021_01_21_005624_create_brigade_titles_table', 1),
(516, '2021_01_22_205919_create_brigade_title_principals_table', 1),
(517, '2021_01_23_020612_create_means_titles_table', 1),
(518, '2021_01_23_225516_create_evacuation_plan_titles_table', 1),
(519, '2021_01_26_221853_create_charges_table', 1),
(520, '2021_01_26_223206_create_brigades_table', 1),
(521, '2021_01_26_223859_create_committees_table', 1),
(522, '2021_01_27_003509_create_analysis_titles_table', 1),
(523, '2021_01_27_211732_create_phase_titles_table', 1),
(524, '2021_02_02_235028_create_images_table', 1),
(525, '2021_02_04_013106_create_categories_table', 1),
(526, '2021_02_13_231813_create_archives_table', 1),
(527, '2021_02_16_223610_create_talent_titles_table', 1),
(528, '2021_02_16_225149_create_areas_table', 1),
(529, '2021_03_16_200454_create_event_titles_table', 1),
(530, '2021_03_27_004705_create_threats_table', 1),
(531, '2021_04_07_001242_create_evacuation_titles_table', 1),
(532, '2021_04_07_002639_create_blocks_table', 1),
(533, '2021_04_07_010102_create_phases_table', 1),
(534, '2021_04_08_004714_create_new_events_table', 1),
(535, '2021_04_08_004954_create_ancient_events_table', 1),
(536, '2021_04_08_005434_create_information_news_table', 1),
(537, '2021_04_13_200621_create_image_prins_table', 1),
(538, '2021_04_13_201445_create_video_prins_table', 1),
(539, '2021_04_19_162446_create_evacuation_point_titles_table', 1),
(540, '2021_04_19_172014_create_evacuation_points_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `new_events`
--

CREATE TABLE `new_events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_final` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `new_events`
--

INSERT INTO `new_events` (`id`, `title`, `subtitle`, `content`, `link`, `fecha`, `hora_inicio`, `hora_final`, `created_at`, `updated_at`, `event_id`) VALUES
(1, 'Nuevo evento', 'evento', '<p>Nuevo evento</p>', NULL, '2021-04-24', '03:00:00', '04:00:00', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `phases`
--

CREATE TABLE `phases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phase` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `evacuation_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `phases`
--

INSERT INTO `phases` (`id`, `phase`, `content`, `image`, `created_at`, `updated_at`, `evacuation_id`) VALUES
(1, 'Detección del peligro', '<p>Cuando se materializa una amenaza o evento la persona que lo detecta debe informarle al brigadista m&aacute;s cercano de manera confidencial sin generar p&aacute;nico. La detecci&oacute;n tambi&eacute;n puede ser autom&aacute;tica, como es el caso de los detectores de humo que activan el sistema de alarma contra-incendio. En el caso de los terremotos, pues inmediatamente ocurren las personas lo detectan o un puede ser un poco m&aacute;s lenta como el caso de un incendio. Entre m&aacute;s r&aacute;pido se detecte una emergencia, mayor es la probabilidad de controlarla y reducir sus posibles consecuencias, por lo que todo el personal debe estar alerta e informar oportunamente a los brigadistas de forma calmada.</p>', '1619658446Detencion.JPG', '2021-04-29 03:33:51', '2021-04-29 06:07:26', 1),
(2, 'Peligro Inminente', '<p>Por protocolo de este Plan de Prevenci&oacute;n, Preparaci&oacute;n y Respuesta ante Emergencias, siempre que se confirme la alarma contra-incendio se proceder&aacute; a evacuar a todo el personal de la sede. Cuando suena la alarma el personal debe suspender inmediatamente sus actividades, si le es posible debe salvar la informaci&oacute;n, apagar el computador o equipos el&eacute;ctricos. El personal debe llevar consigo su identificaci&oacute;n, celular, dinero y objetos de valor que no sean voluminosos.</p>', '1619658596Peligro.JPG', '2021-04-29 03:34:18', '2021-04-29 06:09:56', 1),
(3, 'Ubicar Rutas de Evacuación y Salidas de Emergencia', '<p>El personal de la Sede Principal de la Universidad Mariana, una vez capacitados en deben ubicarse en sitios estrat&eacute;gicos de evacuaci&oacute;n y provisionarse de la una paleta que se&ntilde;aliza el punto de encuentro. Las rutas de evacuaci&oacute;n son los sitios por donde se va a desplazar el personal, desde el &aacute;rea en donde se encuentran, hasta el punto de encuentro. Estas rutas de evacuaci&oacute;n se las colocara debidamente se&ntilde;alizadas y son publicadas en los mapas de evacuaci&oacute;n de cada piso. Adicionalmente es importante que todo el tiempo las rutas de evacuaci&oacute;n se encuentren despejadas y libres de obst&aacute;culos para facilitar la evacuaci&oacute;n. Es de gran importancia que el personal de vigilancia tambi&eacute;n est&eacute; capacitado en procedimientos de primera respuesta ante emergencias.</p>', '1619658691Rutas.JPG', '2021-04-29 03:38:20', '2021-04-29 06:11:31', 1),
(4, 'Fase de Salida', '<p>Siempre que se active la alarma todo el personal debe evacuar, aunque se trate de simulacros, pues el no hacer caso a las indicaciones puede costarle la vida.</p>\r\n\r\n<ul>\r\n	<li>Conservar siempre la calma.</li>\r\n	<li>En lo posible se debe circular por la derecha.</li>\r\n	<li>No se debe correr, pero si caminar con paso r&aacute;pido para agilizar la evacuaci&oacute;n.</li>\r\n	<li>Identificar a los brigadistas quienes acompa&ntilde;an la evacuaci&oacute;n hasta el punto de encuentro.</li>\r\n	<li>Buscar la salida.</li>\r\n	<li>Seguir las flechas colocadas en la ruta de evacuaci&oacute;n, sin desviarse, sin empujar, pero salir lo m&aacute;s r&aacute;pido posible.</li>\r\n	<li>No se debe gritar, ni hacer ning&uacute;n tipo de comentario alarmante, debe conservarse la disciplina durante la evacuaci&oacute;n.</li>\r\n	<li>Se debe dar prioridad a personas vulnerables (ni&ntilde;os, mujeres embarazadas, discapacitados y ancianos).</li>\r\n	<li>Por ning&uacute;n motivo el personal se puede devolver cuando se ha activado el plan de evacuaci&oacute;n.</li>\r\n	<li>Si alguien cae, debe ser llevado fuera de la ruta de evacuaci&oacute;n e intentar levantarlo, de lo contrario podr&aacute; propiciar ca&iacute;das y amontonamientos.</li>\r\n	<li>Si durante la evacuaci&oacute;n, alguien pierde alg&uacute;n objeto, no debe intentarecuperarlo, debe continuar hasta el punto de encuentro.</li>\r\n	<li>En caso de humo, debe desplazarse agachado.</li>\r\n	<li>Bajar las escaleras con precauci&oacute;n, pelda&ntilde;o por pelda&ntilde;o.</li>\r\n	<li>El desplazamiento en las escaleras se recomienda que se haga por la derecha y evitar apoyarse contra la baranda interior para evitar accidentes.</li>\r\n</ul>', '1619658772Salida.JPG', '2021-04-29 03:42:45', '2021-04-29 06:12:52', 1),
(5, 'Control de Visitantes', '<p>En la SEDE PRINCIPAL DE LA UNIVERSIDAD MARIANA, se tiene control al ingreso de visitantes por parte de la seguridad privada contratada. En caso de emergencia o simulacro los funcionarios que tengan visitante, deben convertirse en sus gu&iacute;as de tal forma que los dirijan con ellos hasta el punto de encuentro.</p>', '1619658915ControlVi.JPG', '2021-04-29 03:43:14', '2021-04-29 06:15:15', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `phase_titles`
--

CREATE TABLE `phase_titles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `phase_titles`
--

INSERT INTO `phase_titles` (`id`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Fases del plan de evacuación', '<p>El plan de evacuaci&oacute;n est&aacute; definido por cinco&nbsp;(5) fases que se encuentran enmarcadas en la relaci&oacute;n cantidad de personas versus tiempo, en donde el tiempo en que se demora la totalidad de las personas en evacuar es determinado por los tiempos transcurridos en cada una de las fases</p>', '2021-04-29 03:33:07', '2021-04-29 03:33:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relief_agencies`
--

CREATE TABLE `relief_agencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `institution` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cellphone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `landline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `relief_agencies`
--

INSERT INTO `relief_agencies` (`id`, `institution`, `telephone`, `cellphone`, `landline`, `created_at`, `updated_at`) VALUES
(1, 'Bomberos Pasto', '7244343', '3152442205', '119', '2021-04-29 02:12:42', '2021-04-29 02:12:42'),
(2, 'Cruz Roja Colombiana Nariño', '7237448', '', '', '2021-04-29 02:12:59', '2021-04-29 02:12:59'),
(3, 'Defensa Civil Colombiana Nariño', '7310230', '3118084438', '144', '2021-04-29 02:13:28', '2021-04-29 02:13:28'),
(4, 'Policía', '7231351', '', '123', '2021-04-29 02:13:54', '2021-04-29 02:13:54'),
(5, 'CAI El Dorado', '7311446', '', '', '2021-04-29 02:14:10', '2021-04-29 02:14:10'),
(6, 'CAI Morasurco', '7310201', '', '123', '2021-04-29 02:14:32', '2021-04-29 02:14:32'),
(7, 'Dirección Municipal de Gestión del Riesgo de Pasto', '7229404', '', '111', '2021-04-29 02:16:24', '2021-04-29 02:16:24'),
(8, 'Hospital Universitario Departamental de Nariño', '7333400', '', '', '2021-04-29 02:17:31', '2021-04-29 02:17:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relief_agency_titles`
--

CREATE TABLE `relief_agency_titles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `relief_agency_titles`
--

INSERT INTO `relief_agency_titles` (`id`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Lista de Organismos de Socorro y Otras Entidades de Apoyo', '<p>Es el listado de los organismos de socorro con los que se debe comunicar el Comit&eacute; Operativo de Emergencia dependiendo de la naturaleza de la amenaza presentada.</p>', '2021-04-29 02:12:01', '2021-04-29 02:12:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talent_titles`
--

CREATE TABLE `talent_titles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `means_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `talent_titles`
--

INSERT INTO `talent_titles` (`id`, `title`, `image`, `content`, `created_at`, `updated_at`, `means_id`) VALUES
(1, 'Talento humano', '1619643752EstructuraOrganica.PNG', '<p>El Talento Humano est&aacute; definido por una estructura org&aacute;nica de personal asignado, con unos niveles jer&aacute;rquicos con roles espec&iacute;ficos como se muestra a continuaci&oacute;n: Para el Plan de Prevenci&oacute;n, Preparaci&oacute;n y Respuesta ante Emergencias, la estructura org&aacute;nica que se maneja es la siguiente:</p>', '2021-04-29 01:54:33', '2021-04-29 02:02:32', 1),
(2, 'Comité de emergencias', '1619643800ComiteEmegencias.png', '<p>Es la estructura responsable de coordinar la ejecuci&oacute;n de las actividades antes, durante y despu&eacute;s de una emergencia o desastre. La creaci&oacute;n y funcionamiento del Comit&eacute; de Emergencia debe contar con la aprobaci&oacute;n y apoyo de la m&aacute;xima jerarqu&iacute;a de la Organizaci&oacute;n, para garantizar el cumplimiento y la efectividad de sus tareas. As&iacute; mismo, las personas que lo integren deben tener poder de decisi&oacute;n y aptitudes que las hagan id&oacute;neas para ocupar estos cargos</p>', '2021-04-29 02:03:20', '2021-04-29 02:03:20', 1),
(3, 'Brigada de Emergencia Sede Principal de la Universidad Mariana', '1619644080BrigadaOrganizacion.PNG', '<p>La Brigada de Emergencia es una organizaci&oacute;n compuesta por un conjunto de personas motivadas, capacitadas y entrenadas, que en raz&oacute;n de su permanencia y nivel de responsabilidad asumen la ejecuci&oacute;n de procedimientos operativos necesarios para prevenir o controlar las emergencias. La Sede Principal de la Universidad Mariana, actualmente cuenta con la conformaci&oacute;n de la Brigada de Emergencias de la Sede, la cual se encuentra capacitada y dotada con uniformes y algunos elementos de emergencias. La organizaci&oacute;n de la Brigada de Emergencias es la siguiente.</p>\r\n\r\n<p>- Jefe o coordinador de Brigada.</p>\r\n\r\n<p>- Persona l&iacute;der o Grupos de Apoyo.</p>\r\n\r\n<p>- Brigadistas</p>\r\n\r\n<p>La estructura de la Brigada de Emergencias que ha dise&ntilde;ado la Organizaci&oacute;n, la cual es liderada por la Hermana Rectora Amanda Del Pilar Lucero Vallejo, con el apoyo del Jefe de Gesti&oacute;n Humana, bajo la Coordinaci&oacute;n del Docente Henry Andrade y poyo de la Coordinaci&oacute;n de la Oficina de Seguridad y Salud en el trabajo, mediante un proceso sistem&aacute;tico de asesor&iacute;a por parte de la Administradora de Riesgos Laborales ARL.</p>', '2021-04-29 02:08:00', '2021-04-29 02:08:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `threats`
--

CREATE TABLE `threats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `threatTitle` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subType` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `analysis_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `threats`
--

INSERT INTO `threats` (`id`, `threatTitle`, `subType`, `content`, `image`, `created_at`, `updated_at`, `type_id`, `analysis_id`) VALUES
(1, 'Sismo / Terremoto', '', '<p>El departamento de Nari&ntilde;o es considerado como una zona de alta sismicidad por la ubicaci&oacute;n geogr&aacute;fica en la que se encuentra el departamento, por lo tanto el municipio de Pasto tambi&eacute;n presenta una alta susceptibilidad s&iacute;smica que relaciona con la probabilidad de sufrir da&ntilde;os en estructuras y en edificaciones. La proximidad al Litoral pac&iacute;fico con el municipio de Pasto y la cercan&iacute;a que tiene esta sede con la zona de amenaza volc&aacute;nica que genera el Volc&aacute;n Galeras y otros volcanes del sur del departamento como Cumbal, Azufral y Cerro Negro que tambi&eacute;n se encuentran activos aunque en grado de alerta baja. Todo lo anterior hace que se considere esta situaci&oacute;n de sismo/terremoto como una amenaza para la sede.</p>', '1619638165Sismos.PNG', '2021-04-28 23:55:54', '2021-04-29 00:29:25', 1, 1),
(2, 'Erupción volcánica', '', '<p>Estando la SEDE PRINCIPA DE LA UNIVERSIDAD MARIANA ubicada en el municipio de Pasto; el cual est&aacute; muy pr&oacute;ximo al Volc&aacute;n Galeras, el cual ha manifestado en los &uacute;ltimos a&ntilde;os un aumento en su actividad volc&aacute;nica, se han clasificado diversas zonas de amenaza, por la ubicaci&oacute;n proximal a este Volc&aacute;n, desde Zona de amenaza alta; la cual esta con las zonas m&aacute;s cercanas al volc&aacute;n, una zona de amenaza media y una zona de amenaza baja. Si bien es cierto el municipio de Pasto y particularmente la SEDE PRINCIPAL DE LA UNIVERSIDAD MARIANA se encuentran dentro de una zona de amenaza media al noroccidente de la capital de Nari&ntilde;o, podr&iacute;a llevar a que las</p>', '1619637376Volcan.PNG', '2021-04-28 23:57:06', '2021-04-29 00:16:16', 1, 1),
(3, 'salto/ Hurto', 'Amenaza de tipo social', '<p>Siendo esta una acci&oacute;n delincuencial que puede perpetrarse a mano armada, extrayendo bienes de la sede o del personal sin que incluso se percaten del hecho de manera inmediata. Aunque la sede se encuentra protegida por la presencia de vigilancia contratada mediante la suposici&oacute;n de un guardia de seguridad, no deja de ser una posibilidad de amenaza el Asalto/hurto</p>', '1619638914Hurto.jpg', '2021-04-29 00:37:27', '2021-04-29 00:41:54', 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `threats_sub_titles`
--

CREATE TABLE `threats_sub_titles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `threats_titles`
--

CREATE TABLE `threats_titles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `threats_titles`
--

INSERT INTO `threats_titles` (`id`, `title`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Identificación de amenazas', '<p>En esta secci&oacute;n se describen las amenazas que se podr&iacute;an presentar en la empresa y en su entorno geogr&aacute;fico.</p>', '2021-04-28 23:52:36', '2021-04-28 23:52:36'),
(2, 'Descripción de las amenazas identificadas', '<p>A continuaci&oacute;n se describe la justificaci&oacute;n del &ldquo;por qu&eacute;&rdquo; las anteriores son consideradas amenazas para las instalaciones de la entidad.</p>', '2021-04-28 23:52:59', '2021-04-28 23:52:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `types`
--

CREATE TABLE `types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `typeThreat` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `types`
--

INSERT INTO `types` (`id`, `typeThreat`, `created_at`, `updated_at`) VALUES
(1, 'Tipo natural', '2021-04-28 23:53:39', '2021-04-28 23:53:39'),
(2, 'Tipo antrópico', '2021-04-28 23:54:23', '2021-04-28 23:54:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `lastname`, `image`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 1, 'admin', 'admin', '1619568524rectora.png', 'admin1@admin.com', NULL, '$2y$10$9.t7Kvxyq4Wh4ZVRDkTELeZu99mtsfF1KdnGUUIHcuUFQ9KsXN9Fe', 'Vl02uiiSxUq2ZpgKcF6lh2uc2Vu4tV87vIVFDNI4ToaVOmiddfnT22DsGkdT', '2021-04-28 05:06:18', '2021-04-28 05:08:44'),
(4, 1, 'admin', 'admin', '1619628429rectora.png', 'admin@admin.com', NULL, '$2y$10$nwC4tazY9FavgpzkhDHRSuu3xApVLB9kkmKC5vuTd0YWM.K4f8WW.', 'TNpRpNnnvQThGKH5paiV57XsepnCpaYNWgth1wh6JAeAjuEY7NlW1BjUNydW', '2021-04-28 21:42:11', '2021-04-28 21:47:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `video_prins`
--

CREATE TABLE `video_prins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `analysis_titles`
--
ALTER TABLE `analysis_titles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ancient_events`
--
ALTER TABLE `ancient_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ancient_events_eventan_id_foreign` (`eventan_id`);

--
-- Indices de la tabla `archives`
--
ALTER TABLE `archives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `archives_categories_id_foreign` (`categories_id`);

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blocks_evacu_id_foreign` (`evacu_id`);

--
-- Indices de la tabla `block_titles`
--
ALTER TABLE `block_titles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `brigada`
--
ALTER TABLE `brigada`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brigada_email_unique` (`email`);

--
-- Indices de la tabla `brigades`
--
ALTER TABLE `brigades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brigades_charge_id_foreign` (`charge_id`),
  ADD KEY `brigades_names_id_foreign` (`names_id`);

--
-- Indices de la tabla `brigade_titles`
--
ALTER TABLE `brigade_titles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `brigade_title_principals`
--
ALTER TABLE `brigade_title_principals`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `charges`
--
ALTER TABLE `charges`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `committees`
--
ALTER TABLE `committees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `committees_charge_id_foreign` (`charge_id`);

--
-- Indices de la tabla `committee_titles`
--
ALTER TABLE `committee_titles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `evacuation_plan_titles`
--
ALTER TABLE `evacuation_plan_titles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `evacuation_points`
--
ALTER TABLE `evacuation_points`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evacuation_points_brigade_id_foreign` (`brigade_id`),
  ADD KEY `evacuation_points_brigade1_id_foreign` (`brigade1_id`),
  ADD KEY `evacuation_points_brigade2_id_foreign` (`brigade2_id`),
  ADD KEY `evacuation_points_brigade3_id_foreign` (`brigade3_id`),
  ADD KEY `evacuation_points_brigade4_id_foreign` (`brigade4_id`),
  ADD KEY `evacuation_points_brigade5_id_foreign` (`brigade5_id`),
  ADD KEY `evacuation_points_evacuationti_id_foreign` (`evacuationti_id`),
  ADD KEY `evacuation_points_block_id_foreign` (`block_id`);

--
-- Indices de la tabla `evacuation_point_titles`
--
ALTER TABLE `evacuation_point_titles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `evacuation_titles`
--
ALTER TABLE `evacuation_titles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `event_titles`
--
ALTER TABLE `event_titles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_imageable_type_imageable_id_index` (`imageable_type`,`imageable_id`);

--
-- Indices de la tabla `image_prins`
--
ALTER TABLE `image_prins`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `information_news`
--
ALTER TABLE `information_news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `information_news_eventnew_id_foreign` (`eventnew_id`);

--
-- Indices de la tabla `means_titles`
--
ALTER TABLE `means_titles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `new_events`
--
ALTER TABLE `new_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `new_events_event_id_foreign` (`event_id`);

--
-- Indices de la tabla `phases`
--
ALTER TABLE `phases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phases_evacuation_id_foreign` (`evacuation_id`);

--
-- Indices de la tabla `phase_titles`
--
ALTER TABLE `phase_titles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `relief_agencies`
--
ALTER TABLE `relief_agencies`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `relief_agency_titles`
--
ALTER TABLE `relief_agency_titles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `talent_titles`
--
ALTER TABLE `talent_titles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `talent_titles_means_id_foreign` (`means_id`);

--
-- Indices de la tabla `threats`
--
ALTER TABLE `threats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `threats_type_id_foreign` (`type_id`),
  ADD KEY `threats_analysis_id_foreign` (`analysis_id`);

--
-- Indices de la tabla `threats_sub_titles`
--
ALTER TABLE `threats_sub_titles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `threats_titles`
--
ALTER TABLE `threats_titles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `video_prins`
--
ALTER TABLE `video_prins`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `analysis_titles`
--
ALTER TABLE `analysis_titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ancient_events`
--
ALTER TABLE `ancient_events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `archives`
--
ALTER TABLE `archives`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `blocks`
--
ALTER TABLE `blocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `block_titles`
--
ALTER TABLE `block_titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `brigada`
--
ALTER TABLE `brigada`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `brigades`
--
ALTER TABLE `brigades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `brigade_titles`
--
ALTER TABLE `brigade_titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `brigade_title_principals`
--
ALTER TABLE `brigade_title_principals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `charges`
--
ALTER TABLE `charges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `committees`
--
ALTER TABLE `committees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `committee_titles`
--
ALTER TABLE `committee_titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `evacuation_plan_titles`
--
ALTER TABLE `evacuation_plan_titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `evacuation_points`
--
ALTER TABLE `evacuation_points`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `evacuation_point_titles`
--
ALTER TABLE `evacuation_point_titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `evacuation_titles`
--
ALTER TABLE `evacuation_titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `event_titles`
--
ALTER TABLE `event_titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `image_prins`
--
ALTER TABLE `image_prins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `information_news`
--
ALTER TABLE `information_news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `means_titles`
--
ALTER TABLE `means_titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=541;

--
-- AUTO_INCREMENT de la tabla `new_events`
--
ALTER TABLE `new_events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `phases`
--
ALTER TABLE `phases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `phase_titles`
--
ALTER TABLE `phase_titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `relief_agencies`
--
ALTER TABLE `relief_agencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `relief_agency_titles`
--
ALTER TABLE `relief_agency_titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `talent_titles`
--
ALTER TABLE `talent_titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `threats`
--
ALTER TABLE `threats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `threats_sub_titles`
--
ALTER TABLE `threats_sub_titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `threats_titles`
--
ALTER TABLE `threats_titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `types`
--
ALTER TABLE `types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `video_prins`
--
ALTER TABLE `video_prins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ancient_events`
--
ALTER TABLE `ancient_events`
  ADD CONSTRAINT `ancient_events_eventan_id_foreign` FOREIGN KEY (`eventan_id`) REFERENCES `event_titles` (`id`);

--
-- Filtros para la tabla `archives`
--
ALTER TABLE `archives`
  ADD CONSTRAINT `archives_categories_id_foreign` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `blocks`
--
ALTER TABLE `blocks`
  ADD CONSTRAINT `blocks_evacu_id_foreign` FOREIGN KEY (`evacu_id`) REFERENCES `evacuation_titles` (`id`);

--
-- Filtros para la tabla `brigades`
--
ALTER TABLE `brigades`
  ADD CONSTRAINT `brigades_charge_id_foreign` FOREIGN KEY (`charge_id`) REFERENCES `charges` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `brigades_names_id_foreign` FOREIGN KEY (`names_id`) REFERENCES `charges` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `committees`
--
ALTER TABLE `committees`
  ADD CONSTRAINT `committees_charge_id_foreign` FOREIGN KEY (`charge_id`) REFERENCES `charges` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `evacuation_points`
--
ALTER TABLE `evacuation_points`
  ADD CONSTRAINT `evacuation_points_block_id_foreign` FOREIGN KEY (`block_id`) REFERENCES `blocks` (`id`),
  ADD CONSTRAINT `evacuation_points_brigade1_id_foreign` FOREIGN KEY (`brigade1_id`) REFERENCES `brigades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evacuation_points_brigade2_id_foreign` FOREIGN KEY (`brigade2_id`) REFERENCES `brigades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evacuation_points_brigade3_id_foreign` FOREIGN KEY (`brigade3_id`) REFERENCES `brigades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evacuation_points_brigade4_id_foreign` FOREIGN KEY (`brigade4_id`) REFERENCES `brigades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evacuation_points_brigade5_id_foreign` FOREIGN KEY (`brigade5_id`) REFERENCES `brigades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evacuation_points_brigade_id_foreign` FOREIGN KEY (`brigade_id`) REFERENCES `brigades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evacuation_points_evacuationti_id_foreign` FOREIGN KEY (`evacuationti_id`) REFERENCES `evacuation_titles` (`id`);

--
-- Filtros para la tabla `information_news`
--
ALTER TABLE `information_news`
  ADD CONSTRAINT `information_news_eventnew_id_foreign` FOREIGN KEY (`eventnew_id`) REFERENCES `event_titles` (`id`);

--
-- Filtros para la tabla `new_events`
--
ALTER TABLE `new_events`
  ADD CONSTRAINT `new_events_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `event_titles` (`id`);

--
-- Filtros para la tabla `phases`
--
ALTER TABLE `phases`
  ADD CONSTRAINT `phases_evacuation_id_foreign` FOREIGN KEY (`evacuation_id`) REFERENCES `evacuation_titles` (`id`);

--
-- Filtros para la tabla `talent_titles`
--
ALTER TABLE `talent_titles`
  ADD CONSTRAINT `talent_titles_means_id_foreign` FOREIGN KEY (`means_id`) REFERENCES `means_titles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `threats`
--
ALTER TABLE `threats`
  ADD CONSTRAINT `threats_analysis_id_foreign` FOREIGN KEY (`analysis_id`) REFERENCES `analysis_titles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `threats_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
