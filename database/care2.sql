-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-11-2019 a las 22:31:04
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `care2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acceso`
--

CREATE TABLE IF NOT EXISTS `acceso` (
`id` bigint(20) NOT NULL,
  `menu_id` bigint(20) DEFAULT NULL,
  `usuario_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `acceso`
--

INSERT INTO `acceso` (`id`, `menu_id`, `usuario_id`) VALUES
(1, 1, 2),
(2, 4, 2),
(3, 2, 2),
(4, 5, 2),
(5, 7, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aula`
--

CREATE TABLE IF NOT EXISTS `aula` (
`id` bigint(20) NOT NULL,
  `Nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `fechaRegistro` datetime NOT NULL,
  `estado` smallint(6) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `aula`
--

INSERT INTO `aula` (`id`, `Nombre`, `Descripcion`, `fechaRegistro`, `estado`) VALUES
(1, 'AULA A1', 'aula A1', '2018-10-16 00:00:00', 1),
(2, 'AULA A2', 'Aula A2', '2018-10-09 00:00:00', 1),
(3, 'AULA A3', 'Aula A3', '2018-10-16 00:00:00', 1),
(4, 'AULA A4', 'NINGUNA', '2019-06-22 00:00:00', 1),
(5, 'AULA A5', 'NINGUNA', '2019-06-22 00:00:00', 1),
(6, 'AULA A6', 'NINGUNA', '2019-06-22 00:00:00', 1),
(7, 'AULA A7', 'NINGUNA', '2019-06-22 00:00:00', 1),
(8, 'AULA A8', 'NINGUNA', '2019-06-22 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE IF NOT EXISTS `cargo` (
  `id` bigint(20) NOT NULL,
  `descripcion` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id`, `descripcion`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'CAJERO'),
(3, 'SECRETARIO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cierre_sesion`
--

CREATE TABLE IF NOT EXISTS `cierre_sesion` (
`id` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `sesion_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cierre_sesion`
--

INSERT INTO `cierre_sesion` (`id`, `fecha`, `sesion_id`) VALUES
(1, '2019-06-11 21:02:18', 1),
(2, '2019-06-12 21:39:44', 1),
(3, '2019-06-12 21:41:46', 2),
(4, '2019-06-12 22:06:03', 3),
(5, '2019-06-12 22:16:44', 4),
(6, '2019-06-13 01:03:33', 5),
(7, '2019-06-15 18:18:35', 6),
(8, '2019-06-16 16:40:04', 7),
(9, '2019-06-16 16:57:54', 8),
(10, '2019-06-16 21:14:21', 9),
(11, '2019-06-16 22:11:37', 10),
(12, '2019-06-20 12:08:58', 11),
(13, '2019-06-20 12:32:09', 12),
(14, '2019-06-20 12:52:03', 13),
(15, '2019-06-21 13:13:51', 14),
(16, '2019-06-21 14:06:21', 15),
(17, '2019-06-21 14:11:32', 16),
(18, '2019-06-22 17:36:30', 17),
(19, '2019-06-27 00:12:31', 18),
(20, '2019-06-27 23:08:37', 19),
(21, '2019-07-01 19:15:09', 20),
(22, '2019-07-14 13:23:13', 21),
(23, '2019-07-14 13:27:51', 22),
(24, '2019-07-14 13:28:21', 23),
(25, '2019-07-14 13:30:41', 24),
(26, '2019-07-21 17:11:25', 25),
(27, '2019-07-21 18:38:26', 26),
(28, '2019-07-22 20:57:10', 27),
(29, '2019-09-03 22:47:14', 28),
(30, '2019-09-19 16:52:13', 29),
(31, '2019-09-20 15:39:34', 30),
(32, '2019-09-21 14:21:13', 31),
(33, '2019-10-06 16:13:21', 32),
(34, '2019-10-24 14:46:46', 33),
(35, '2019-10-24 20:36:13', 34),
(36, '2019-10-25 19:36:06', 35),
(37, '2019-10-26 10:46:03', 36),
(38, '2019-10-26 13:13:37', 37),
(39, '2019-10-26 13:21:19', 38),
(40, '2019-10-28 12:25:25', 39),
(41, '2019-10-28 14:40:02', 40),
(42, '2019-10-28 15:16:02', 41),
(43, '2019-10-28 15:18:26', 42),
(44, '2019-10-28 15:37:53', 43),
(45, '2019-10-28 20:20:32', 44),
(46, '2019-10-28 20:33:28', 45),
(47, '2019-10-28 20:56:07', 46),
(48, '2019-10-29 02:45:48', 47),
(49, '2019-10-29 16:43:07', 48),
(50, '2019-10-30 15:12:21', 49),
(51, '2019-10-30 15:14:13', 50),
(52, '2019-10-30 17:04:12', 51),
(53, '2019-10-31 13:18:25', 52),
(54, '2019-11-01 11:42:09', 53),
(55, '2019-11-01 12:11:56', 54),
(56, '2019-11-01 15:56:04', 55),
(57, '2019-11-01 17:30:57', 56);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido`
--

CREATE TABLE IF NOT EXISTS `contenido` (
`id` bigint(20) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `fechaRegistro` datetime NOT NULL,
  `estado` smallint(6) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `contenido`
--

INSERT INTO `contenido` (`id`, `nombre`, `fechaRegistro`, `estado`) VALUES
(1, 'nivel Basico', '2018-10-10 00:00:00', 1),
(2, 'Nivel Intermedio', '2018-10-10 00:00:00', 1),
(3, 'Nivel Avanzado', '2018-10-10 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
`id` bigint(20) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `fechaInicio` datetime NOT NULL,
  `fechaFin` datetime NOT NULL,
  `fechaRegistro` datetime NOT NULL,
  `fechaModificacion` datetime NOT NULL,
  `estado` smallint(6) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id`, `nombre`, `descripcion`, `fechaInicio`, `fechaFin`, `fechaRegistro`, `fechaModificacion`, `estado`) VALUES
(1, 'ESTADISTICAS I', 'CLASES DE NIVELACION', '2018-12-31 00:00:00', '2019-01-31 00:00:00', '2018-11-25 15:33:04', '0000-00-00 00:00:00', 1),
(2, 'ALGORITMOS', 'CURSO DE ALGORITMO', '2018-12-31 00:00:00', '2017-12-31 00:00:00', '2018-11-25 22:46:58', '0000-00-00 00:00:00', 1),
(3, 'PROGRAMACION', 'CURSO DE JAVA CON VECTORES', '2018-11-29 00:00:00', '2018-11-27 00:00:00', '2018-11-29 06:15:53', '0000-00-00 00:00:00', 1),
(4, 'CALCULO I', 'MATEMATICAS INTERMEDIA', '2019-11-01 00:00:00', '2019-12-01 00:00:00', '2019-11-01 16:02:42', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursocontenido`
--

CREATE TABLE IF NOT EXISTS `cursocontenido` (
`id` bigint(20) NOT NULL,
  `CursoId` bigint(20) NOT NULL,
  `ContenidoId` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cursocontenido`
--

INSERT INTO `cursocontenido` (`id`, `CursoId`, `ContenidoId`) VALUES
(1, 4, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inicio_sesion`
--

CREATE TABLE IF NOT EXISTS `inicio_sesion` (
`id` int(11) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `usuario_id` bigint(20) DEFAULT NULL,
  `impresora_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inicio_sesion`
--

INSERT INTO `inicio_sesion` (`id`, `fecha`, `usuario_id`, `impresora_id`) VALUES
(1, '2019-06-12 21:35:05', 1, NULL),
(2, '2019-06-12 21:40:07', 1, NULL),
(3, '2019-06-12 21:45:33', 1, NULL),
(4, '2019-06-12 22:06:34', 2, NULL),
(5, '2019-06-12 22:16:50', 1, NULL),
(6, '2019-06-15 17:57:15', 1, NULL),
(7, '2019-06-16 11:19:26', 1, NULL),
(8, '2019-06-16 16:44:40', 1, NULL),
(9, '2019-06-16 17:15:47', 1, NULL),
(10, '2019-06-16 21:24:27', 1, NULL),
(11, '2019-06-20 09:27:09', 1, NULL),
(12, '2019-06-20 12:09:13', 1, NULL),
(13, '2019-06-20 12:34:32', 1, NULL),
(14, '2019-06-20 12:58:29', 1, NULL),
(15, '2019-06-21 13:21:26', 1, NULL),
(16, '2019-06-21 14:08:28', 1, NULL),
(17, '2019-06-21 18:49:03', 1, NULL),
(18, '2019-06-27 00:04:49', 1, NULL),
(19, '2019-06-27 22:10:37', 1, NULL),
(20, '2019-07-01 13:17:27', 1, NULL),
(21, '2019-07-14 12:45:39', 1, NULL),
(22, '2019-07-14 13:23:19', 1, NULL),
(23, '2019-07-14 13:27:56', 1, NULL),
(24, '2019-07-14 13:28:33', 1, NULL),
(25, '2019-07-21 17:00:15', 1, NULL),
(26, '2019-07-21 17:11:32', 1, NULL),
(27, '2019-07-22 20:56:05', 1, NULL),
(28, '2019-07-22 23:35:08', 1, NULL),
(29, '2019-09-06 21:32:14', 1, NULL),
(30, '2019-09-20 14:28:24', 1, NULL),
(31, '2019-09-20 15:41:37', 1, NULL),
(32, '2019-09-22 12:22:06', 1, NULL),
(33, '2019-10-23 19:02:18', 1, NULL),
(34, '2019-10-24 14:53:37', 1, NULL),
(35, '2019-10-24 23:00:31', 1, NULL),
(36, '2019-10-26 10:27:07', 1, NULL),
(37, '2019-10-26 11:01:58', 1, NULL),
(38, '2019-10-26 13:18:28', 1, NULL),
(39, '2019-10-28 12:01:25', 1, NULL),
(40, '2019-10-28 14:09:36', 1, NULL),
(41, '2019-10-28 14:48:11', 1, NULL),
(42, '2019-10-28 15:16:07', 1, NULL),
(43, '2019-10-28 15:18:34', 1, NULL),
(44, '2019-10-28 20:16:17', 1, NULL),
(45, '2019-10-28 20:20:41', 1, NULL),
(46, '2019-10-28 20:33:37', 1, NULL),
(47, '2019-10-29 02:40:07', 1, NULL),
(48, '2019-10-29 11:30:46', 1, NULL),
(49, '2019-10-29 20:03:58', 1, NULL),
(50, '2019-10-30 15:12:27', 1, NULL),
(51, '2019-10-30 15:14:19', 1, NULL),
(52, '2019-10-31 11:41:58', 1, NULL),
(53, '2019-10-31 15:41:34', 1, NULL),
(54, '2019-11-01 11:53:27', 1, NULL),
(55, '2019-11-01 15:49:51', 1, NULL),
(56, '2019-11-01 15:56:17', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
`id` bigint(20) NOT NULL,
  `parent` bigint(20) DEFAULT NULL,
  `name` text,
  `icon` text,
  `slug` text,
  `number` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id`, `parent`, `name`, `icon`, `slug`, `number`) VALUES
(1, NULL, 'REGISTROS', 'fa fa-address-book', 'Item-1', 1),
(2, NULL, 'CONFIGURACION', 'fa fa-building-o', 'Item-1', 8),
(3, NULL, 'REPORTES', 'fa fa-area-chart', 'Item-1', 7),
(4, 1, 'Nueva Persona', 'fa fa-circle-o', 'persona', 1),
(5, 2, 'Usuario', 'fa fa-circle-o', 'usuario', 2),
(6, 3, 'Rep. Persona', 'fa fa-circle-o', 'reporte/reporte_persona', 1),
(7, 2, 'Negocio', 'fa fa-circle-o', 'sucursal', 2),
(8, 10, 'Nuevo Curso', 'fa fa-circle-o', 'curso', 2),
(9, 10, 'Gestión de Curso', 'fa fa-circle-o', 'PersonaCurso', 2),
(10, NULL, 'CURSO', 'fa fa-graduation-cap', 'Item-1', 2),
(11, 10, 'Consulta Curso', 'fa fa-circle-o', 'ConsultarCurso', 3),
(12, NULL, 'BACKUP', 'fa fa-download', 'Item-1', 9),
(13, 12, 'Generar Backup', 'fa fa-circle-o', 'backup/database_backup', 1),
(14, NULL, 'PAGOS', 'fa fa-paypal', 'Item-1', 6),
(15, 14, 'Gestión de Pagos', 'fa fa-circle-o', 'pago/listar', 1),
(16, 3, 'Rep. Curso', 'fa fa-circle-o', 'reporte/reporte_curso', 2),
(17, 3, 'Rep. Pagos', 'fa fa-circle-o', 'reporte/reporte_pagos', 3),
(18, 14, 'Historial Pagos', 'fa fa-circle-o', 'historial_pago', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE IF NOT EXISTS `pago` (
`id` int(11) NOT NULL,
  `curso_id` int(11) NOT NULL,
  `forma_pago` text NOT NULL,
  `banco` text NOT NULL,
  `nro_cuenta` text NOT NULL,
  `nro_cheque` text NOT NULL,
  `fecha_pago` datetime NOT NULL,
  `monto` float NOT NULL,
  `saldo` float NOT NULL,
  `estado` text NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`id`, `curso_id`, `forma_pago`, `banco`, `nro_cuenta`, `nro_cheque`, `fecha_pago`, `monto`, `saldo`, `estado`, `fecha_registro`) VALUES
(1, 3, 'forma_pago_efectivo', '', '', '', '2019-10-30 12:11:01', 1000, 0, 'Debe', '2019-10-30 12:11:01'),
(2, 2, 'forma_pago_efectivo', '', '', '', '2019-10-30 12:11:35', 1000, 0, 'Debe', '2019-10-30 12:11:35'),
(3, 3, 'forma_pago_efectivo', '', '', '', '2019-10-30 00:00:00', 100, 100, 'Debe', '2019-10-30 00:00:00'),
(4, 2, 'forma_pago_efectivo', '', '', '', '2019-10-30 00:00:00', 300, 300, 'Debe', '2019-10-30 00:00:00'),
(5, 3, 'forma_pago_efectivo', '', '', '', '2019-10-30 00:00:00', 900, 900, 'Cancelado', '2019-10-30 00:00:00'),
(6, 2, 'forma_pago_efectivo', '', '', '', '2019-10-30 00:00:00', 100, 100, 'Debe', '2019-10-30 00:00:00'),
(7, 2, 'forma_pago_efectivo', '', '', '', '2019-10-30 00:00:00', 600, 600, 'Cancelado', '2019-10-30 00:00:00'),
(8, 1, 'forma_pago_cheque', '', '', '', '2019-10-30 16:59:01', 800, 0, 'Debe', '2019-10-30 16:59:01'),
(9, 1, 'forma_pago_efectivo', '', '', '', '2019-11-01 00:00:00', 50, 50, 'Debe', '2019-11-01 00:00:00'),
(10, 4, 'forma_pago_tarjeta', '', '', '', '2019-11-01 16:03:32', 300, 0, 'Debe', '2019-11-01 16:03:32'),
(11, 4, 'forma_pago_efectivo', '', '', '', '2019-11-01 00:00:00', 50, 50, 'Debe', '2019-11-01 00:00:00'),
(12, 3, 'forma_pago_efectivo', '', '', '', '2019-11-01 17:01:42', 500, 0, 'Debe', '2019-11-01 17:01:42');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `pagos`
--
CREATE TABLE IF NOT EXISTS `pagos` (
`cod_persona_curso` bigint(20)
,`codigo_persona` bigint(20)
,`ci` text
,`telefono` int(11)
,`forma_pago` text
,`cursoid` bigint(20)
,`id` int(11)
,`persona` mediumtext
,`fecha_servicio` date
,`monto` float
,`saldo` double
,`pagado` double
,`curso` text
,`estado` text
);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE IF NOT EXISTS `persona` (
`id` bigint(20) NOT NULL,
  `ci` text COLLATE utf8_spanish_ci NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `apellidoPaterno` text COLLATE utf8_spanish_ci NOT NULL,
  `apellidoMaterno` text COLLATE utf8_spanish_ci NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `genero` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(11) NOT NULL,
  `correo` text COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` smallint(6) NOT NULL,
  `fechaRegistro` datetime NOT NULL,
  `fechaModificacion` datetime NOT NULL,
  `rol_id` bigint(20) NOT NULL,
  `sucursal_id` bigint(20) NOT NULL,
  `usuario_id` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `ci`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `fechaNacimiento`, `genero`, `telefono`, `correo`, `direccion`, `estado`, `fechaRegistro`, `fechaModificacion`, `rol_id`, `sucursal_id`, `usuario_id`) VALUES
(1, '78754645', 'FLAVIA', 'SALAZAR', 'ORTIZ', '2019-09-20', 'FEMENINO', 78454544, 'FLAVIA@GMAIL.COM', 'CALLE 4 ESQUINA LOS PINOS', 1, '2019-09-20 20:24:31', '0000-00-00 00:00:00', 3, 1, 1),
(2, '4544654421', 'ROMULO', 'JUAREZ', 'CHAVEZ', '2019-09-20', 'MASCULINO', 65465421, 'ROMULO@GMAIL.COM', 'CALLE EL PANTANAL N.55', 1, '2019-09-20 20:25:20', '0000-00-00 00:00:00', 2, 1, 1),
(3, '123154544', 'NOELIA', 'PAREDES', 'FLORES', '2019-09-20', 'FEMENINO', 78785454, 'NOELIA@GMAIL.COM', 'AV. BRASIL CALLE 78', 1, '2019-09-20 20:33:12', '0000-00-00 00:00:00', 3, 1, 1),
(4, '664547123', 'ALBERTO', 'FLORES', 'PEREZ', '1990-10-30', 'MASCULINO', 754211214, 'ALBERTO@GMAIL.COM', 'AV. VIRGEN DE LUJAN CALLE 41', 1, '2019-10-30 10:42:30', '0000-00-00 00:00:00', 2, 1, 1),
(5, '561234575', 'RAQUEL', 'CHAVEZ', 'MENDOZA', '1980-10-30', 'FEMENINO', 645123154, 'RAQUEL@GMAIL.COM', 'CALLE 23 N.45', 1, '2019-10-30 11:05:13', '0000-00-00 00:00:00', 2, 1, 1),
(6, '88454621', 'MELANY', 'JIMENEZ', 'ORTUBE', '1990-10-30', 'FEMENINO', 78454521, 'MELANY@GMAIL.COM', 'AV. MUTUALISTA CALLE 22', 1, '2019-10-30 11:08:13', '0000-00-00 00:00:00', 3, 1, 1),
(7, '747421124', 'OSCAR', 'SANCHEZ', 'TORREZ', '1999-10-30', 'MASCULINO', 74544211, 'OSCAR@GMAIL.COM', 'BARRIO EL BIBOSI CALLE 9', 1, '2019-10-30 11:21:41', '0000-00-00 00:00:00', 3, 1, 1),
(8, '78454612', 'MELISSA', 'CESPEDES', 'QUINTEROS', '2000-10-30', 'FEMENINO', 75412122, 'MELISSA@GMAIL.COM', 'AV. BENI ESQUINA LOS TUSEQUIS', 1, '2019-10-30 11:22:24', '0000-00-00 00:00:00', 3, 1, 1),
(9, '22336544', 'BRENDA', 'VARGAS', 'SOZA', '2005-11-01', 'FEMENINO', 69875213, 'SAMARA@GMAIL.COM', 'CALLE PEJI 59', 1, '2019-11-01 15:58:43', '0000-00-00 00:00:00', 3, 1, 1),
(10, '322154544', 'ALVARO', 'CESPEDES', 'MANRIQUE', '2019-11-01', 'MASCULINO', 784541222, 'ALVARO@GMAIL.COM', 'CALLE FELICIANA RODRIGUEZ N.75', 1, '2019-11-01 16:00:23', '2019-11-01 16:01:31', 2, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personacurso`
--

CREATE TABLE IF NOT EXISTS `personacurso` (
`id` bigint(20) NOT NULL,
  `CursoId` bigint(20) NOT NULL,
  `PersonaId` bigint(20) NOT NULL,
  `turno_id` bigint(20) NOT NULL,
  `nota` text COLLATE utf8_spanish_ci NOT NULL,
  `fechaRegistro` datetime NOT NULL,
  `aula_id` bigint(20) NOT NULL,
  `FechaInicio` datetime NOT NULL,
  `FechaFin` datetime NOT NULL,
  `estado` smallint(6) NOT NULL,
  `Subtotal` int(11) NOT NULL,
  `Descuento` int(11) NOT NULL,
  `Total` int(11) NOT NULL,
  `CantidadHora` int(11) NOT NULL,
  `DocenteId` bigint(20) NOT NULL,
  `usuario_id` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `personacurso`
--

INSERT INTO `personacurso` (`id`, `CursoId`, `PersonaId`, `turno_id`, `nota`, `fechaRegistro`, `aula_id`, `FechaInicio`, `FechaFin`, `estado`, `Subtotal`, `Descuento`, `Total`, `CantidadHora`, `DocenteId`, `usuario_id`) VALUES
(1, 3, 1, 3, '\r\n                                    ', '2019-10-30 12:11:01', 8, '2019-10-30 00:00:00', '2019-10-30 00:00:00', 1, 1000, 0, 1000, 10, 4, 1),
(2, 2, 1, 1, '\r\n                                    ', '2019-10-30 12:11:35', 6, '2019-10-30 00:00:00', '2019-10-30 00:00:00', 1, 1000, 0, 1000, 10, 5, 1),
(3, 1, 6, 2, '\r\n                                    ', '2019-10-30 16:59:01', 3, '2019-10-30 00:00:00', '2019-10-30 00:00:00', 1, 800, 0, 800, 5, 5, 1),
(4, 4, 9, 3, '\r\n                                    ', '2019-11-01 16:03:32', 6, '2019-11-01 00:00:00', '2019-11-01 00:00:00', 1, 300, 0, 300, 5, 10, 1),
(5, 3, 9, 1, '\r\n                                    ', '2019-11-01 17:01:42', 4, '2019-11-01 00:00:00', '2019-11-01 00:00:00', 1, 500, 0, 500, 5, 5, 1);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `personaestudiante`
--
CREATE TABLE IF NOT EXISTS `personaestudiante` (
`id` bigint(20)
,`ci` text
,`nombre` text
,`apellidoPaterno` text
,`apellidoMaterno` text
,`rol` text
);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personaprofesion`
--

CREATE TABLE IF NOT EXISTS `personaprofesion` (
`Id` bigint(20) NOT NULL,
  `PersonaId` bigint(20) NOT NULL,
  `ProfesionId` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `personaprofesion`
--

INSERT INTO `personaprofesion` (`Id`, `PersonaId`, `ProfesionId`) VALUES
(1, 1, 1),
(2, 3, 1),
(10, 12, 2),
(11, 12, 3),
(12, 13, 4),
(13, 14, 1),
(14, 15, 1),
(15, 16, 1),
(16, 17, 1),
(17, 18, 1),
(18, 19, 1),
(19, 20, 1),
(20, 21, 2),
(21, 22, 4),
(22, 23, 1),
(23, 24, 1),
(24, 25, 1),
(25, 26, 1),
(26, 1, 1),
(27, 2, 2),
(28, 3, 1),
(29, 4, 2),
(30, 4, 3),
(31, 5, 3),
(32, 6, 1),
(33, 7, 1),
(34, 8, 1),
(35, 9, 1),
(36, 10, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesion`
--

CREATE TABLE IF NOT EXISTS `profesion` (
`id` bigint(20) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` smallint(6) NOT NULL,
  `fechaNacimiento` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `profesion`
--

INSERT INTO `profesion` (`id`, `nombre`, `descripcion`, `estado`, `fechaNacimiento`) VALUES
(1, 'No cuenta', '', 1, '2018-10-16 00:00:00'),
(2, 'ing. sistema', '', 1, '2018-10-08 00:00:00'),
(3, 'lic. contaduria', '', 1, '2018-10-08 00:00:00'),
(4, 'ing. civil', '', 1, '2018-10-08 00:00:00'),
(5, 'ing. comercial', '', 1, '2018-10-08 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
`id` bigint(20) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `fechaRegistro` datetime NOT NULL,
  `estado` smallint(6) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `nombre`, `fechaRegistro`, `estado`) VALUES
(1, 'ADMINISTRATIVO', '2019-06-12 00:00:00', 1),
(2, 'DOCENTE', '2019-06-12 00:00:00', 1),
(3, 'ESTUDIANTE', '2019-06-12 00:00:00', 1),
(4, 'CAJERO', '2019-06-21 00:00:00', 1),
(5, 'SECRETARIO', '2019-10-28 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE IF NOT EXISTS `servicio` (
`id` int(11) NOT NULL,
  `NombreServicio` text NOT NULL,
  `FechaRegistro` datetime NOT NULL,
  `Estado` smallint(6) NOT NULL,
  `Tipo_servicio_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`id`, `NombreServicio`, `FechaRegistro`, `Estado`, `Tipo_servicio_id`) VALUES
(1, 'CURSOS DE NIVELACIÓN', '2019-07-21 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE IF NOT EXISTS `sucursal` (
`id` bigint(20) NOT NULL,
  `nit` text,
  `nombre_empresa` text,
  `sucursal` text,
  `estado` smallint(6) DEFAULT NULL,
  `direccion` text,
  `telefono` text,
  `email` text,
  `nombre_impuesto` text
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`id`, `nit`, `nombre_empresa`, `sucursal`, `estado`, `direccion`, `telefono`, `email`, `nombre_impuesto`) VALUES
(1, '12124445', 'CARE', 'CENTRO DE ALTO RENDIMIENTO ESTUDIANTIL', 1, 'AV. HERNANDO ZANABRIA', '70208802', 'care2@gmail.com', 'casa matriz'),
(2, '12124547', 'CARE1', 'CARE1', 1, 'AV. MEXICO N-456', '62021407', 'care@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposervicio`
--

CREATE TABLE IF NOT EXISTS `tiposervicio` (
`id` int(11) NOT NULL,
  `Nombre` text NOT NULL,
  `FechaRegistro` datetime NOT NULL,
  `Estado` tinyint(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tiposervicio`
--

INSERT INTO `tiposervicio` (`id`, `Nombre`, `FechaRegistro`, `Estado`) VALUES
(1, 'CURSO', '2019-07-21 00:00:00', 1),
(2, 'AYUDANTIA', '2019-07-21 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turno`
--

CREATE TABLE IF NOT EXISTS `turno` (
`id` bigint(20) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `fechaRegistro` datetime NOT NULL,
  `estado` smallint(6) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `turno`
--

INSERT INTO `turno` (`id`, `nombre`, `descripcion`, `fechaRegistro`, `estado`) VALUES
(1, 'MAÑANA', 'turno mañana', '2018-10-16 00:00:00', 1),
(2, 'TARDE', 'turno tarde', '2018-10-16 00:00:00', 1),
(3, 'NOCHE', 'Turno noche', '2018-10-16 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`id` bigint(20) NOT NULL,
  `ci` text,
  `nombre_usuario` text,
  `telefono` text,
  `cargo` bigint(20) DEFAULT NULL,
  `usuario` text,
  `clave` text,
  `activo` smallint(6) DEFAULT NULL,
  `estado` smallint(6) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `ci`, `nombre_usuario`, `telefono`, `cargo`, `usuario`, `clave`, `activo`, `estado`) VALUES
(1, '1', 'admin', NULL, 1, 'admin', '$2y$10$6K0iEkAf6OIZr4f.0ndoK.0mQV6U3CyqrU3HuPXpTh5T4b8ltsG/.', 0, 1),
(2, '11386006', 'MARIA', '697844544', 2, 'maria', '$2y$10$1eJ2pncsSb6SyFTRysOv4uevCyHidhoAdGJmU4aHxydoFSyCy8V6W', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_sucursal`
--

CREATE TABLE IF NOT EXISTS `usuario_sucursal` (
  `usuario_id` bigint(20) DEFAULT NULL,
  `sucursal_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario_sucursal`
--

INSERT INTO `usuario_sucursal` (`usuario_id`, `sucursal_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vi_cursos`
--
CREATE TABLE IF NOT EXISTS `vi_cursos` (
`telefono` int(11)
,`alumno` mediumtext
,`curso` text
,`aula` text
,`FechaInicio` date
,`fechafin` date
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vi_historial_pago`
--
CREATE TABLE IF NOT EXISTS `vi_historial_pago` (
`id` bigint(20)
,`estudiante` mediumtext
,`ci_estudiante` text
,`curso` text
,`monto` float
,`saldo` float
,`fecha_pago` date
,`forma_pago` text
,`estado` text
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vi_personas`
--
CREATE TABLE IF NOT EXISTS `vi_personas` (
`id` bigint(20)
,`direccion` text
,`correo` text
,`telefono` int(11)
,`ci` text
,`nombre` mediumtext
,`estado` smallint(6)
,`rol` text
,`rol_id` bigint(20)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vi_persona_docente`
--
CREATE TABLE IF NOT EXISTS `vi_persona_docente` (
`id` bigint(20)
,`ci` text
,`docente` mediumtext
,`fechanacimiento` date
,`rol` text
,`telefono` int(11)
,`correo` text
);
-- --------------------------------------------------------

--
-- Estructura para la vista `pagos`
--
DROP TABLE IF EXISTS `pagos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pagos` AS select `pc`.`id` AS `cod_persona_curso`,`p`.`id` AS `codigo_persona`,`p`.`ci` AS `ci`,`p`.`telefono` AS `telefono`,`pg`.`forma_pago` AS `forma_pago`,`pc`.`CursoId` AS `cursoid`,`pg`.`id` AS `id`,concat(`p`.`nombre`,' ',`p`.`apellidoPaterno`,' ',`p`.`apellidoMaterno`) AS `persona`,cast(`pc`.`FechaInicio` as date) AS `fecha_servicio`,`pg`.`monto` AS `monto`,sum(`pg`.`saldo`) AS `saldo`,(`pg`.`monto` - sum(`pg`.`saldo`)) AS `pagado`,`cu`.`nombre` AS `curso`,max(`pg`.`estado`) AS `estado` from (((`persona` `p` join `personacurso` `pc` on((`pc`.`PersonaId` = `p`.`id`))) join `pago` `pg` on((`pg`.`curso_id` = `pc`.`CursoId`))) join `curso` `cu` on((`cu`.`id` = `pc`.`CursoId`))) group by `pc`.`id`,`p`.`id`;

-- --------------------------------------------------------

--
-- Estructura para la vista `personaestudiante`
--
DROP TABLE IF EXISTS `personaestudiante`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `personaestudiante` AS select `p`.`id` AS `id`,`p`.`ci` AS `ci`,`p`.`nombre` AS `nombre`,`p`.`apellidoPaterno` AS `apellidoPaterno`,`p`.`apellidoMaterno` AS `apellidoMaterno`,`r`.`nombre` AS `rol` from (`persona` `p` join `rol` `r` on((`r`.`id` = `p`.`rol_id`))) where (`r`.`id` = 3);

-- --------------------------------------------------------

--
-- Estructura para la vista `vi_cursos`
--
DROP TABLE IF EXISTS `vi_cursos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vi_cursos` AS select `p`.`telefono` AS `telefono`,concat(`p`.`nombre`,' ',`p`.`apellidoPaterno`,' ',`p`.`apellidoMaterno`) AS `alumno`,`c`.`nombre` AS `curso`,`a`.`Nombre` AS `aula`,cast(`pc`.`FechaInicio` as date) AS `FechaInicio`,cast(`pc`.`FechaFin` as date) AS `fechafin` from (((`personacurso` `pc` join `persona` `p` on((`pc`.`PersonaId` = `p`.`id`))) join `curso` `c` on((`pc`.`CursoId` = `c`.`id`))) join `aula` `a` on((`pc`.`aula_id` = `a`.`id`)));

-- --------------------------------------------------------

--
-- Estructura para la vista `vi_historial_pago`
--
DROP TABLE IF EXISTS `vi_historial_pago`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vi_historial_pago` AS select `p`.`id` AS `id`,concat(`pe`.`nombre`,' ',`pe`.`apellidoPaterno`,' ',`pe`.`apellidoMaterno`) AS `estudiante`,`pe`.`ci` AS `ci_estudiante`,`c`.`nombre` AS `curso`,`pg`.`monto` AS `monto`,`pg`.`saldo` AS `saldo`,cast(`pg`.`fecha_pago` as date) AS `fecha_pago`,`pg`.`forma_pago` AS `forma_pago`,`pg`.`estado` AS `estado` from (((`personacurso` `p` join `curso` `c` on((`c`.`id` = `p`.`CursoId`))) join `pago` `pg` on((`pg`.`curso_id` = `c`.`id`))) join `persona` `pe` on((`pe`.`id` = `p`.`PersonaId`)));

-- --------------------------------------------------------

--
-- Estructura para la vista `vi_personas`
--
DROP TABLE IF EXISTS `vi_personas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vi_personas` AS select `p`.`id` AS `id`,`p`.`direccion` AS `direccion`,`p`.`correo` AS `correo`,`p`.`telefono` AS `telefono`,`p`.`ci` AS `ci`,concat(`p`.`nombre`,' ',`p`.`apellidoPaterno`,' ',`p`.`apellidoMaterno`) AS `nombre`,`p`.`estado` AS `estado`,`r`.`nombre` AS `rol`,`p`.`rol_id` AS `rol_id` from (`persona` `p` join `rol` `r` on((`r`.`id` = `p`.`rol_id`)));

-- --------------------------------------------------------

--
-- Estructura para la vista `vi_persona_docente`
--
DROP TABLE IF EXISTS `vi_persona_docente`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vi_persona_docente` AS select `p`.`id` AS `id`,`p`.`ci` AS `ci`,concat(`p`.`nombre`,' ',`p`.`apellidoPaterno`,' ',`p`.`apellidoMaterno`) AS `docente`,`p`.`fechaNacimiento` AS `fechanacimiento`,`r`.`nombre` AS `rol`,`p`.`telefono` AS `telefono`,`p`.`correo` AS `correo` from (`persona` `p` join `rol` `r` on((`r`.`id` = `p`.`rol_id`))) where (`r`.`id` = 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acceso`
--
ALTER TABLE `acceso`
 ADD PRIMARY KEY (`id`), ADD KEY `menu_id` (`menu_id`), ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `aula`
--
ALTER TABLE `aula`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cierre_sesion`
--
ALTER TABLE `cierre_sesion`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contenido`
--
ALTER TABLE `contenido`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cursocontenido`
--
ALTER TABLE `cursocontenido`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inicio_sesion`
--
ALTER TABLE `inicio_sesion`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personacurso`
--
ALTER TABLE `personacurso`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personaprofesion`
--
ALTER TABLE `personaprofesion`
 ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `profesion`
--
ALTER TABLE `profesion`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tiposervicio`
--
ALTER TABLE `tiposervicio`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `turno`
--
ALTER TABLE `turno`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acceso`
--
ALTER TABLE `acceso`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `aula`
--
ALTER TABLE `aula`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `cierre_sesion`
--
ALTER TABLE `cierre_sesion`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT de la tabla `contenido`
--
ALTER TABLE `contenido`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `cursocontenido`
--
ALTER TABLE `cursocontenido`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `inicio_sesion`
--
ALTER TABLE `inicio_sesion`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `personacurso`
--
ALTER TABLE `personacurso`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `personaprofesion`
--
ALTER TABLE `personaprofesion`
MODIFY `Id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT de la tabla `profesion`
--
ALTER TABLE `profesion`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tiposervicio`
--
ALTER TABLE `tiposervicio`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `turno`
--
ALTER TABLE `turno`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
