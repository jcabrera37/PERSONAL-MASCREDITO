-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-08-2022 a las 10:15:13
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `id_bitacora` int(11) NOT NULL,
  `oficina` varchar(100) NOT NULL,
  `responsable` varchar(100) NOT NULL,
  `fecha_hora` datetime NOT NULL DEFAULT current_timestamp(),
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`id_bitacora`, `oficina`, `responsable`, `fecha_hora`, `descripcion`) VALUES
(64, 'sede 1', 'mario@gmail.com', '2022-08-20 10:22:21', 'Borro cliente con codigo: 2'),
(65, 'sede 1', 'mario@gmail.com', '2022-08-20 10:23:08', 'se registro la sede: sede 1'),
(66, 'sede 1', 'mario@gmail.com', '2022-08-20 10:24:05', 'se creo el usuario: pedrito@gmail.com'),
(67, 'sede 1', 'pedrito@gmail.com', '2022-08-20 10:25:49', 'Cración del clinete con codigo: 2'),
(68, 'sede 1', 'pedrito@gmail.com', '2022-08-20 10:26:27', 'Creo nueva solicitud para el usuario: 2'),
(69, 'sede 1', 'pedrito@gmail.com', '2022-08-20 10:31:46', 'se desembolso el registro con id: 1'),
(70, 'sede 1', 'pedrito@gmail.com', '2022-08-20 10:32:04', 'se transfirio al cliente: '),
(71, 'sede 1', 'pedrito@gmail.com', '2022-08-20 10:33:01', 'se registro un nuevo pago del cliente: 2'),
(72, 'sede 1', 'pedrito@gmail.com', '2022-08-20 10:35:17', 'se registro un nuevo gasto: luz'),
(73, 'sede 1', 'pedrito@gmail.com', '2022-08-20 10:35:22', 'se elimino el gasto: 3'),
(74, 'sede 1', 'pedrito@gmail.com', '2022-08-20 10:41:46', 'se registro un nuevo pago del cliente: 2'),
(75, 'sede 1', 'pedrito@gmail.com', '2022-08-20 23:23:08', 'Creo nueva solicitud para el usuario: 2'),
(76, 'sede 1', 'pedrito@gmail.com', '2022-08-20 23:29:40', 'se coloco en activo al cliente: 2'),
(77, 'sede 1', 'pedrito@gmail.com', '2022-08-20 23:31:18', 'se registro un nuevo pago del cliente: 2'),
(78, 'sede 1', 'pedrito@gmail.com', '2022-08-20 23:51:18', 'se creo el usuario: luisa@gmail.com'),
(79, 'sede 1', 'luisa@gmail.com', '2022-08-20 23:54:21', 'se desembolso el registro con id: 2'),
(80, 'sede 1', 'pedrito@gmail.com', '2022-08-20 23:15:29', 'Cración del clinete con codigo: 3'),
(81, 'sede 1', 'pedrito@gmail.com', '2022-08-20 23:17:56', 'Cración del clinete con codigo: 4'),
(82, 'sede 1', 'pedrito@gmail.com', '2022-08-20 23:20:03', 'Cración del clinete con codigo: 5'),
(83, 'sede 1', 'pedrito@gmail.com', '2022-08-20 23:20:14', 'Borro cliente con codigo: 5'),
(84, 'sede 1', 'pedrito@gmail.com', '2022-08-20 23:20:39', 'Creo nueva solicitud para el usuario: 4'),
(85, 'sede 1', 'pedrito@gmail.com', '2022-08-20 23:21:13', 'se coloco en activo al cliente: 4'),
(86, 'sede 1', 'pedrito@gmail.com', '2022-08-20 23:22:41', 'mando a lista negra cliente con codigo: 4'),
(87, 'sede 1', 'pedrito@gmail.com', '2022-08-20 23:23:06', 'se coloco en inactivo al usuario: 4'),
(88, 'sede 1', 'pedrito@gmail.com', '2022-08-20 23:28:31', 'se coloco en activo al cliente: 4'),
(89, 'sede 1', 'pedrito@gmail.com', '2022-08-20 23:29:58', 'se coloco en activo al cliente: 4'),
(90, 'sede 1', 'pedrito@gmail.com', '2022-08-20 23:32:49', 'se registro un nuevo pago del cliente: 4'),
(91, 'sede 1', 'pedrito@gmail.com', '2022-08-21 01:00:35', 'se creo el usuario: admin2'),
(92, 'sede 1', 'pedrito@gmail.com', '2022-08-21 01:01:49', 'se creo el usuario: admin1'),
(93, 'sede 1', 'admin1', '2022-08-21 01:04:22', 'se registro la sede: eeee eee eeeeee eeee eee');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capital`
--

CREATE TABLE `capital` (
  `trial_id_capital_1` int(11) NOT NULL,
  `monto_inicial` varchar(100) DEFAULT NULL,
  `fecha` char(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `capital`
--

INSERT INTO `capital` (`trial_id_capital_1`, `monto_inicial`, `fecha`) VALUES
(1, '2000', '2022-08-20 10:23:08'),
(2, '10000', '2022-08-21 01:04:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `primer_nombre` varchar(100) DEFAULT NULL,
  `trial_segundo_nombre_3` varchar(100) DEFAULT NULL,
  `trial_primer_apellido_4` varchar(100) DEFAULT NULL,
  `segundo_apellido` varchar(100) DEFAULT NULL,
  `dpi` varchar(100) DEFAULT NULL,
  `estado_civil` varchar(100) DEFAULT NULL,
  `profesion_oficio` varchar(100) DEFAULT NULL,
  `genero` varchar(100) DEFAULT NULL,
  `trial_fecha_nacimiento_10` datetime DEFAULT NULL,
  `trial_telefono_11` varchar(100) DEFAULT NULL,
  `departamento` varchar(100) DEFAULT NULL,
  `municipio` varchar(100) DEFAULT NULL,
  `trial_domicilio_14` varchar(100) DEFAULT NULL,
  `nis` varchar(100) DEFAULT NULL,
  `propiedad` varchar(100) DEFAULT NULL,
  `estado` varchar(100) NOT NULL,
  `edad` int(11) NOT NULL,
  `observaciones` varchar(100) DEFAULT NULL,
  `usuario` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `primer_nombre`, `trial_segundo_nombre_3`, `trial_primer_apellido_4`, `segundo_apellido`, `dpi`, `estado_civil`, `profesion_oficio`, `genero`, `trial_fecha_nacimiento_10`, `trial_telefono_11`, `departamento`, `municipio`, `trial_domicilio_14`, `nis`, `propiedad`, `estado`, `edad`, `observaciones`, `usuario`) VALUES
(2, 'luis', 'manolo', 'perez', 'paz', '0000 00000 0000', 'solter@', 'profe', 'Masculino', '1998-01-12 00:00:00', '90290223', 'suchi', 'mazate', 'la paz', '2902930', '1', 'activo', 20, 'nada', 'pedrito@gmail.com'),
(3, 'María ', 'Pedro', 'López', 'Martinez', '12345678901234', 'soltero', 'Ingeniero en sistemas', 'Femenino', '1994-11-18 00:00:00', '45698756', 'Suchitepéquez', 'Mazatenango', 'djksfbjkdr kjsbfkjrbkje34  4535  -34534-344 jbksfde', '1234567890', '1', 'creado', 65, 'nmbschd kshbdhchjd habdaecbhdc', ''),
(4, 'Raul', 'Juan', 'Alguno', 'Martinez', '2795992691001', 'casada', 'Ingeniero en sistemas', 'Masculino', '1982-11-17 00:00:00', '45789632', 'Retalhuleu', 'Retalhuleu', 'djksfbjkdr kjsbfkjrbkje34  4535  -34534-344 jbksfde', '1456789654', '2', 'activo', 45, 'jdcjkads cksdbcjba asdbcjhbad ahwebjdjwae ywegdywae', 'pedrito@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuotas`
--

CREATE TABLE `cuotas` (
  `id_cuotas` int(11) NOT NULL,
  `trial_id_interes_2` int(11) DEFAULT NULL,
  `trial_fecha_3` datetime DEFAULT NULL,
  `detalle` char(100) DEFAULT NULL,
  `cantidad` float NOT NULL,
  `estado` varchar(100) NOT NULL,
  `id_solicitud` int(100) DEFAULT NULL,
  `numero_cuota` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cuotas`
--

INSERT INTO `cuotas` (`id_cuotas`, `trial_id_interes_2`, `trial_fecha_3`, `detalle`, `cantidad`, `estado`, `id_solicitud`, `numero_cuota`) VALUES
(520, 1, '2022-08-21 00:00:00', '40', 1440, 'cancelado', 1, 1),
(521, 1, '2022-08-22 00:00:00', '40', 1440, 'cancelado', 1, 2),
(522, 1, '2022-08-23 00:00:00', '40', 1440, 'cancelado', 1, 3),
(523, 1, '2022-08-24 00:00:00', '40', 1440, 'creado', 1, 4),
(524, 1, '2022-08-25 00:00:00', '40', 1440, 'creado', 1, 5),
(525, 1, '2022-08-26 00:00:00', '40', 1440, 'creado', 1, 6),
(526, 1, '2022-08-27 00:00:00', '40', 1440, 'creado', 1, 7),
(527, 1, '2022-08-28 00:00:00', '40', 1440, 'creado', 1, 8),
(528, 1, '2022-08-29 00:00:00', '40', 1440, 'creado', 1, 9),
(529, 1, '2022-08-30 00:00:00', '40', 1440, 'creado', 1, 10),
(530, 1, '2022-08-31 00:00:00', '40', 1440, 'creado', 1, 11),
(531, 1, '2022-09-01 00:00:00', '40', 1440, 'creado', 1, 12),
(532, 1, '2022-09-02 00:00:00', '40', 1440, 'creado', 1, 13),
(533, 1, '2022-09-03 00:00:00', '40', 1440, 'creado', 1, 14),
(534, 1, '2022-09-04 00:00:00', '40', 1440, 'creado', 1, 15),
(535, 1, '2022-09-05 00:00:00', '40', 1440, 'creado', 1, 16),
(536, 1, '2022-09-06 00:00:00', '40', 1440, 'creado', 1, 17),
(537, 1, '2022-09-07 00:00:00', '40', 1440, 'creado', 1, 18),
(538, 1, '2022-09-08 00:00:00', '40', 1440, 'creado', 1, 19),
(539, 1, '2022-09-09 00:00:00', '40', 1440, 'creado', 1, 20),
(540, 1, '2022-09-10 00:00:00', '40', 1440, 'creado', 1, 21),
(541, 1, '2022-09-11 00:00:00', '40', 1440, 'creado', 1, 22),
(542, 1, '2022-09-12 00:00:00', '40', 1440, 'creado', 1, 23),
(543, 1, '2022-09-13 00:00:00', '40', 1440, 'creado', 1, 24),
(544, 1, '2022-09-14 00:00:00', '40', 1440, 'creado', 1, 25),
(545, 1, '2022-09-15 00:00:00', '40', 1440, 'creado', 1, 26),
(546, 1, '2022-09-16 00:00:00', '40', 1440, 'creado', 1, 27),
(547, 1, '2022-09-17 00:00:00', '40', 1440, 'creado', 1, 28),
(548, 1, '2022-09-18 00:00:00', '40', 1440, 'creado', 1, 29),
(549, 1, '2022-09-19 00:00:00', '40', 1440, 'creado', 1, 30),
(550, 1, '2022-09-20 00:00:00', '40', 1440, 'creado', 1, 31),
(551, 1, '2022-09-21 00:00:00', '40', 1440, 'creado', 1, 32),
(552, 1, '2022-09-22 00:00:00', '40', 1440, 'creado', 1, 33),
(553, 1, '2022-09-23 00:00:00', '40', 1440, 'creado', 1, 34),
(554, 1, '2022-09-24 00:00:00', '40', 1440, 'creado', 1, 35),
(555, 1, '2022-09-25 00:00:00', '40', 1440, 'creado', 1, 36),
(556, 2, '2022-08-22 00:00:00', '6000', 126000, 'creado', 2, 1),
(557, 2, '2022-08-23 00:00:00', '6000', 126000, 'creado', 2, 2),
(558, 2, '2022-08-24 00:00:00', '6000', 126000, 'creado', 2, 3),
(559, 2, '2022-08-25 00:00:00', '6000', 126000, 'creado', 2, 4),
(560, 2, '2022-08-26 00:00:00', '6000', 126000, 'creado', 2, 5),
(561, 2, '2022-08-27 00:00:00', '6000', 126000, 'creado', 2, 6),
(562, 2, '2022-08-28 00:00:00', '6000', 126000, 'creado', 2, 7),
(563, 2, '2022-08-29 00:00:00', '6000', 126000, 'creado', 2, 8),
(564, 2, '2022-08-30 00:00:00', '6000', 126000, 'creado', 2, 9),
(565, 2, '2022-08-31 00:00:00', '6000', 126000, 'creado', 2, 10),
(566, 2, '2022-09-01 00:00:00', '6000', 126000, 'creado', 2, 11),
(567, 2, '2022-09-02 00:00:00', '6000', 126000, 'creado', 2, 12),
(568, 2, '2022-09-03 00:00:00', '6000', 126000, 'creado', 2, 13),
(569, 2, '2022-09-04 00:00:00', '6000', 126000, 'creado', 2, 14),
(570, 2, '2022-09-05 00:00:00', '6000', 126000, 'creado', 2, 15),
(571, 2, '2022-09-06 00:00:00', '6000', 126000, 'creado', 2, 16),
(572, 2, '2022-09-07 00:00:00', '6000', 126000, 'creado', 2, 17),
(573, 2, '2022-09-08 00:00:00', '6000', 126000, 'creado', 2, 18),
(574, 2, '2022-09-09 00:00:00', '6000', 126000, 'creado', 2, 19),
(575, 2, '2022-09-10 00:00:00', '6000', 126000, 'creado', 2, 20),
(576, 2, '2022-09-11 00:00:00', '6000', 126000, 'creado', 2, 21),
(577, 3, '2022-08-22 00:00:00', '180', 3780, 'creado', 3, 1),
(578, 3, '2022-08-23 00:00:00', '180', 3780, 'creado', 3, 2),
(579, 3, '2022-08-24 00:00:00', '180', 3780, 'creado', 3, 3),
(580, 3, '2022-08-25 00:00:00', '180', 3780, 'creado', 3, 4),
(581, 3, '2022-08-26 00:00:00', '180', 3780, 'creado', 3, 5),
(582, 3, '2022-08-27 00:00:00', '180', 3780, 'creado', 3, 6),
(583, 3, '2022-08-28 00:00:00', '180', 3780, 'creado', 3, 7),
(584, 3, '2022-08-29 00:00:00', '180', 3780, 'creado', 3, 8),
(585, 3, '2022-08-30 00:00:00', '180', 3780, 'creado', 3, 9),
(586, 3, '2022-08-31 00:00:00', '180', 3780, 'creado', 3, 10),
(587, 3, '2022-09-01 00:00:00', '180', 3780, 'creado', 3, 11),
(588, 3, '2022-09-02 00:00:00', '180', 3780, 'creado', 3, 12),
(589, 3, '2022-09-03 00:00:00', '180', 3780, 'creado', 3, 13),
(590, 3, '2022-09-04 00:00:00', '180', 3780, 'creado', 3, 14),
(591, 3, '2022-09-05 00:00:00', '180', 3780, 'creado', 3, 15),
(592, 3, '2022-09-06 00:00:00', '180', 3780, 'creado', 3, 16),
(593, 3, '2022-09-07 00:00:00', '180', 3780, 'creado', 3, 17),
(594, 3, '2022-09-08 00:00:00', '180', 3780, 'creado', 3, 18),
(595, 3, '2022-09-09 00:00:00', '180', 3780, 'creado', 3, 19),
(596, 3, '2022-09-10 00:00:00', '180', 3780, 'creado', 3, 20),
(597, 3, '2022-09-11 00:00:00', '180', 3780, 'creado', 3, 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `desembolso`
--

CREATE TABLE `desembolso` (
  `id_desembolso` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `trial_id_detalle_desembolso_3` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT current_timestamp(),
  `estado` varchar(100) NOT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `operador_autorizador` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `desembolso`
--

INSERT INTO `desembolso` (`id_desembolso`, `id_cliente`, `trial_id_detalle_desembolso_3`, `fecha`, `estado`, `fecha_fin`, `operador_autorizador`) VALUES
(1, 2, 1, '2022-08-20 10:31:46', 'realizado', '2022-09-25 00:00:00', NULL),
(2, 2, 2, '2022-08-20 23:54:21', 'realizado', '2022-09-11 00:00:00', 'luisa@gmail.com'),
(3, 4, 3, '2022-08-20 23:20:39', 'pendiente', '2022-09-11 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallemorosidad`
--

CREATE TABLE `detallemorosidad` (
  `trial_id_detalle_morosidad_1` int(11) NOT NULL,
  `id_detalle_prestamos` int(11) DEFAULT NULL,
  `trial_cantidad_3` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_cliente_empleado`
--

CREATE TABLE `detalle_cliente_empleado` (
  `id_detalle_cliente_empleado` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_empleado` int(11) DEFAULT NULL,
  `trial_id_negocio_4` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_cliente_empleado`
--

INSERT INTO `detalle_cliente_empleado` (`id_detalle_cliente_empleado`, `id_cliente`, `id_empleado`, `trial_id_negocio_4`) VALUES
(1, 2, 1, NULL),
(2, 3, 1, NULL),
(3, 4, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_garantia`
--

CREATE TABLE `detalle_garantia` (
  `trial_id_detalle_garantia_1` int(11) DEFAULT NULL,
  `id_garantia` int(11) DEFAULT NULL,
  `id_solicitud` int(11) DEFAULT NULL,
  `trial_observacion_4` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_prestamo`
--

CREATE TABLE `detalle_prestamo` (
  `id_detalle_prestamo` int(11) NOT NULL,
  `monto_solicitado` varchar(100) DEFAULT NULL,
  `cuotas` varchar(100) DEFAULT NULL,
  `trial_fecha_4` datetime DEFAULT NULL,
  `estado` char(20) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_solicitud` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_prestamo`
--

INSERT INTO `detalle_prestamo` (`id_detalle_prestamo`, `monto_solicitado`, `cuotas`, `trial_fecha_4`, `estado`, `id_cliente`, `id_solicitud`) VALUES
(1, '1000', '36', '2022-08-20 10:26:27', 'creado', 2, 1),
(2, '100000', '21', '2022-08-20 23:23:08', 'creado', 2, 2),
(3, '3000', '21', '2022-08-20 23:20:39', 'creado', 4, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_sede_capital`
--

CREATE TABLE `detalle_sede_capital` (
  `id_detalle_sede_capital` int(11) NOT NULL,
  `id_sede` int(11) DEFAULT NULL,
  `id_capital` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_sede_capital`
--

INSERT INTO `detalle_sede_capital` (`id_detalle_sede_capital`, `id_sede`, `id_capital`) VALUES
(1, 1, 1),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_solicitud`
--

CREATE TABLE `detalle_solicitud` (
  `id_detalle_solicitud` int(11) NOT NULL,
  `trial_id_solicitud_2` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `id_empleado` int(100) DEFAULT NULL,
  `observaciones` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_solicitud`
--

INSERT INTO `detalle_solicitud` (`id_detalle_solicitud`, `trial_id_solicitud_2`, `id_cliente`, `fecha_inicio`, `fecha_fin`, `id_empleado`, `observaciones`) VALUES
(1, 1, 2, '2022-08-20 00:00:00', '2022-09-25 00:00:00', 1, ''),
(2, 2, 2, '2022-08-21 00:00:00', '2022-09-11 00:00:00', 1, 'segunda solicitud'),
(3, 3, 4, '2022-08-21 00:00:00', '2022-09-11 00:00:00', 1, 'hbsdhcbshd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_usuario_sede`
--

CREATE TABLE `detalle_usuario_sede` (
  `id_detalle_usuario_sede` int(11) NOT NULL,
  `id_sede` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_usuario_sede`
--

INSERT INTO `detalle_usuario_sede` (`id_detalle_usuario_sede`, `id_sede`, `id_usuario`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `trial_id_empleado_1` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `cargo` varchar(100) DEFAULT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  `dpi` varchar(100) DEFAULT NULL,
  `fecha_nacimiento` datetime DEFAULT NULL,
  `sexo` varchar(100) DEFAULT NULL,
  `trial_estado_civil_9` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`trial_id_empleado_1`, `nombre`, `apellido`, `cargo`, `telefono`, `dpi`, `fecha_nacimiento`, `sexo`, `trial_estado_civil_9`) VALUES
(1, 'pedrito', 'paz', 'administrador', '20933222', '0902 23332 2222', '1998-03-22 00:00:00', 'masculino', 'soltero'),
(2, 'Luisa', 'perez', 'administrador', '20022300', '0001 00001 0001', '1998-01-19 00:00:00', 'femenino', 'soltero'),
(3, 'admin2', 'admin2', 'Asesor', '12345678', '12345678901234', '2022-08-09 00:00:00', 'femenino', 'Soltera'),
(4, 'admin1', 'Admin1', 'administrador', '58963245', '12345678978945', '1989-07-12 00:00:00', 'femenino', 'Soltero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `garantia`
--

CREATE TABLE `garantia` (
  `id_garantia` int(11) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `serie` varchar(100) DEFAULT NULL,
  `modelo` varchar(100) DEFAULT NULL,
  `trial_valor_5` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gasto`
--

CREATE TABLE `gasto` (
  `id_gasto` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `tipo` varchar(100) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `cantidad` decimal(10,2) DEFAULT NULL,
  `rubro` varchar(100) DEFAULT NULL,
  `observaciones` varchar(100) DEFAULT NULL,
  `id_empleado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `id_detalle_sede_empleado`
--

CREATE TABLE `id_detalle_sede_empleado` (
  `trial_id_setalle_sede_empleado_1` int(11) NOT NULL,
  `id_sede` int(11) DEFAULT NULL,
  `id_empleado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `id_detalle_sede_empleado`
--

INSERT INTO `id_detalle_sede_empleado` (`trial_id_setalle_sede_empleado_1`, `id_sede`, `id_empleado`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `interes`
--

CREATE TABLE `interes` (
  `trial_id_interes_1` int(11) NOT NULL,
  `trial_id_detalle_prestamo_2` int(11) DEFAULT NULL,
  `cantidad` varchar(100) DEFAULT NULL,
  `trial_fecha_4` char(100) DEFAULT NULL,
  `porcentaje` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `interes`
--

INSERT INTO `interes` (`trial_id_interes_1`, `trial_id_detalle_prestamo_2`, `cantidad`, `trial_fecha_4`, `porcentaje`) VALUES
(1, 1, '440', '2022-08-20 10:26:27', '44'),
(2, 2, '26000', '2022-08-20 23:23:08', '26'),
(3, 3, '780', '2022-08-20 23:20:39', '26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `negocio`
--

CREATE TABLE `negocio` (
  `id_negocio` int(11) NOT NULL,
  `nombre` char(50) DEFAULT NULL,
  `direccion` char(50) DEFAULT NULL,
  `trial_telefono_4` varchar(100) DEFAULT NULL,
  `trial_tiempo_laborando_5` varchar(100) DEFAULT NULL,
  `id_referencia_cliente` int(11) DEFAULT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `negocio`
--

INSERT INTO `negocio` (`id_negocio`, `nombre`, `direccion`, `trial_telefono_4`, `trial_tiempo_laborando_5`, `id_referencia_cliente`, `id_cliente`) VALUES
(1, 'don pepe', '10001', '2909022', '4', NULL, 2),
(2, 'no se pero este es un ejemploooo jjjjj', '10 avenida 234 jnsdc jksdc', '78756321', '3 años', NULL, 3),
(3, 'no se pero este es un ejemploooo jjjjj', '10 avenida 234 jnsdc jksdc', '45698745', '8', NULL, 4),
(4, 'hdsbhwesb ehbdheb', ';sd,se,  frdniunvdfjk inrfoivdrnoigdf', '85647896', 'nbdkfjerjk ', NULL, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos_historial`
--

CREATE TABLE `pagos_historial` (
  `id_pago` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `mora` decimal(10,2) NOT NULL,
  `monto_atrasado` decimal(10,2) NOT NULL,
  `pago_atrasado` decimal(10,2) NOT NULL,
  `saldo_actual` decimal(10,2) NOT NULL,
  `monto` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pagos_historial`
--

INSERT INTO `pagos_historial` (`id_pago`, `id_empleado`, `id_cliente`, `fecha`, `mora`, `monto_atrasado`, `pago_atrasado`, `saldo_actual`, `monto`) VALUES
(5, 1, 2, '2022-08-20 00:00:00', '0.00', '0.00', '0.00', '0.00', '60.00'),
(6, 1, 2, '2022-08-20 00:00:00', '0.00', '0.00', '0.00', '0.00', '60.00'),
(7, 1, 2, '2022-08-20 00:00:00', '0.00', '0.00', '0.00', '0.00', '100.00'),
(8, 1, 4, '2022-08-18 00:00:00', '50.00', '200.00', '200.00', '10000.00', '5000.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `referencias_clientes`
--

CREATE TABLE `referencias_clientes` (
  `id_referencia_cliente` int(11) NOT NULL,
  `nombre` char(50) DEFAULT NULL,
  `trial_parentesco_3` char(50) DEFAULT NULL,
  `trial_direccion_4` char(50) DEFAULT NULL,
  `trial_observaciones_5` char(50) DEFAULT NULL,
  `id_cliente` int(11) NOT NULL,
  `telefono` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `referencias_clientes`
--

INSERT INTO `referencias_clientes` (`id_referencia_cliente`, `nombre`, `trial_parentesco_3`, `trial_direccion_4`, `trial_observaciones_5`, `id_cliente`, `telefono`) VALUES
(1, 'juan', '1', '1', 'nada', 2, '1'),
(2, 'pedro', '1', '1', 'nada', 2, '1'),
(3, 'julia', '3', '3', 'nada', 2, '3'),
(4, 'ASA', 'hermano', '10 cakke zona 5 reu', 'nmbschd kshbdhchjd habdaecbhdc', 3, '78965412'),
(5, 'jsassss', 'sadsdsdc', '3 calle 4-40 retalhuleu', 'nmbschd kshbdhchjd habdaecbhdc', 3, '56897456'),
(6, 'jnsfvjkndf', 'jkncjds jcndsncjksd jscjsdl', 'dkmckd kdncjkld  jsdncjklsd ndjcns', 'nmbschd kshbdhchjd habdaecbhdc', 3, '45698745'),
(7, 'ASA', 'dsn cds', '10 cakke zona 5 reu fvdf sdcsd', 'jdcjkads cksdbcjba asdbcjhbad ahwebjdjwae ywegdywa', 4, '78965412'),
(8, 'jsassss', 'njdsnjdsnkdsjbfkj', '3 calle 4-40 retalhuleu', 'jdcjkads cksdbcjba asdbcjhbad ahwebjdjwae ywegdywa', 4, '85698745'),
(9, 'sddsf dfvgf sdfgf', 'gddfg fgfgf dfgdhgg', 'dfds 25 dfjdfj 78-225 sdhbhsdc hsdbhs', 'jdcjkads cksdbcjba asdbcjhbad ahwebjdjwae ywegdywa', 4, '45698745'),
(10, 'juan', 'vecino', '10 calle zona  2 4-34 retahuleu, retahuleu', 'bsdchbds hjdsbcbds hjbsdjcjh', 5, '78965412'),
(11, 'sdsd', 'sdfdvfd', 'vd 32-43 dfdff fbfbf dfgdf dfgd', 'bsdchbds hjdsbcbds hjbsdjcjh', 5, '85698745'),
(12, 'sddsf dfvgf sdfgf', 'b jkdbcjkr', 'dfds 25 dfjdfj 78-225 sdhbhsdc hsdbhs', 'bsdchbds hjdsbcbds hjbsdjcjh', 5, '45698745');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE `sede` (
  `trial_id_sede_1` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `trial_telefono_4` varchar(100) DEFAULT NULL,
  `observaciones` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sede`
--

INSERT INTO `sede` (`trial_id_sede_1`, `nombre`, `direccion`, `trial_telefono_4`, `observaciones`) VALUES
(1, 'sede 1', 'mazate', '23222222', 'primera sede'),
(2, 'eeee eee eeeeee eeee eee', '10 calle zona 1 3-45  mazatenango, such', '58963245', 'xadew wede refre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `trial_id_solicitud_1` int(11) NOT NULL,
  `id_detalle_solicitud` int(11) DEFAULT NULL,
  `estado` varchar(100) NOT NULL,
  `sede` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`trial_id_solicitud_1`, `id_detalle_solicitud`, `estado`, `sede`) VALUES
(1, NULL, 'cancelado', 'sede 1'),
(2, NULL, 'activo', 'sede 1'),
(3, NULL, 'pendiente', 'sede 1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sysdiagrams`
--

CREATE TABLE `sysdiagrams` (
  `name` varchar(128) NOT NULL,
  `trial_principal_id_2` int(11) NOT NULL,
  `trial_diagram_id_3` int(11) NOT NULL,
  `trial_version_4` int(11) DEFAULT NULL,
  `trial_definition_5` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `contrasena` varchar(100) DEFAULT NULL,
  `fecha_creacion` char(100) DEFAULT NULL,
  `id_empleado` int(11) NOT NULL,
  `tipo_usuario` varchar(100) NOT NULL,
  `sede` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `usuario`, `contrasena`, `fecha_creacion`, `id_empleado`, `tipo_usuario`, `sede`) VALUES
(1, 'pedrito@gmail.com', '123', '2022-08-20 10:24:05', 1, 'administrador', '1'),
(2, 'luisa@gmail.com', '123', '2022-08-20 23:51:18', 2, 'administrador', '1'),
(3, 'admin2', '1234', '2022-08-21 01:00:35', 3, 'asesor', '1'),
(4, 'admin1', 'admi1', '2022-08-21 01:01:49', 4, 'administrador', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`id_bitacora`);

--
-- Indices de la tabla `capital`
--
ALTER TABLE `capital`
  ADD PRIMARY KEY (`trial_id_capital_1`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `cuotas`
--
ALTER TABLE `cuotas`
  ADD PRIMARY KEY (`id_cuotas`),
  ADD KEY `fk_cuotas_interes` (`trial_id_interes_2`);

--
-- Indices de la tabla `desembolso`
--
ALTER TABLE `desembolso`
  ADD PRIMARY KEY (`id_desembolso`),
  ADD KEY `fk_desembolso_cliente` (`id_cliente`),
  ADD KEY `fk_desembolso_detalle_prestamo` (`trial_id_detalle_desembolso_3`);

--
-- Indices de la tabla `detallemorosidad`
--
ALTER TABLE `detallemorosidad`
  ADD PRIMARY KEY (`trial_id_detalle_morosidad_1`),
  ADD KEY `fk_detallemorosidad_detalle_prestamo` (`id_detalle_prestamos`);

--
-- Indices de la tabla `detalle_cliente_empleado`
--
ALTER TABLE `detalle_cliente_empleado`
  ADD PRIMARY KEY (`id_detalle_cliente_empleado`),
  ADD KEY `fk_detalle_cliente_empleado_empleado` (`id_empleado`),
  ADD KEY `fk_detalle_cliente_empleado_negocio` (`trial_id_negocio_4`),
  ADD KEY `fk_detalle_cliente_empleado_cliente` (`id_cliente`);

--
-- Indices de la tabla `detalle_garantia`
--
ALTER TABLE `detalle_garantia`
  ADD KEY `fk_detalle_garantia_garantia` (`id_garantia`),
  ADD KEY `fk_detalle_garantia_solicitud` (`id_solicitud`);

--
-- Indices de la tabla `detalle_prestamo`
--
ALTER TABLE `detalle_prestamo`
  ADD PRIMARY KEY (`id_detalle_prestamo`);

--
-- Indices de la tabla `detalle_sede_capital`
--
ALTER TABLE `detalle_sede_capital`
  ADD PRIMARY KEY (`id_detalle_sede_capital`),
  ADD KEY `fk_detalle_sede_capital_capital` (`id_capital`),
  ADD KEY `fk_detalle_sede_capital_sede` (`id_sede`);

--
-- Indices de la tabla `detalle_solicitud`
--
ALTER TABLE `detalle_solicitud`
  ADD PRIMARY KEY (`id_detalle_solicitud`),
  ADD KEY `fk_detalle_solicitud_solicitud` (`trial_id_solicitud_2`),
  ADD KEY `fk_detalle_solicitud_cliente` (`id_cliente`);

--
-- Indices de la tabla `detalle_usuario_sede`
--
ALTER TABLE `detalle_usuario_sede`
  ADD PRIMARY KEY (`id_detalle_usuario_sede`),
  ADD KEY `fk_detalle_usuario_sede_sede` (`id_sede`),
  ADD KEY `fk_detalle_usuario_sede_usuario` (`id_usuario`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`trial_id_empleado_1`);

--
-- Indices de la tabla `garantia`
--
ALTER TABLE `garantia`
  ADD PRIMARY KEY (`id_garantia`);

--
-- Indices de la tabla `gasto`
--
ALTER TABLE `gasto`
  ADD PRIMARY KEY (`id_gasto`);

--
-- Indices de la tabla `id_detalle_sede_empleado`
--
ALTER TABLE `id_detalle_sede_empleado`
  ADD PRIMARY KEY (`trial_id_setalle_sede_empleado_1`),
  ADD KEY `fk_id_detalle_sede_empleado_empleado` (`id_empleado`),
  ADD KEY `fk_id_detalle_sede_empleado_sede` (`id_sede`);

--
-- Indices de la tabla `interes`
--
ALTER TABLE `interes`
  ADD PRIMARY KEY (`trial_id_interes_1`),
  ADD KEY `fk_interes_detalle_prestamo` (`trial_id_detalle_prestamo_2`);

--
-- Indices de la tabla `negocio`
--
ALTER TABLE `negocio`
  ADD PRIMARY KEY (`id_negocio`),
  ADD KEY `fk_negocio_referencias_clientes` (`id_referencia_cliente`);

--
-- Indices de la tabla `pagos_historial`
--
ALTER TABLE `pagos_historial`
  ADD PRIMARY KEY (`id_pago`);

--
-- Indices de la tabla `referencias_clientes`
--
ALTER TABLE `referencias_clientes`
  ADD PRIMARY KEY (`id_referencia_cliente`);

--
-- Indices de la tabla `sede`
--
ALTER TABLE `sede`
  ADD PRIMARY KEY (`trial_id_sede_1`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`trial_id_solicitud_1`);

--
-- Indices de la tabla `sysdiagrams`
--
ALTER TABLE `sysdiagrams`
  ADD PRIMARY KEY (`trial_diagram_id_3`),
  ADD UNIQUE KEY `uk_principal_name` (`trial_principal_id_2`,`name`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `id_bitacora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT de la tabla `cuotas`
--
ALTER TABLE `cuotas`
  MODIFY `id_cuotas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=598;

--
-- AUTO_INCREMENT de la tabla `gasto`
--
ALTER TABLE `gasto`
  MODIFY `id_gasto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pagos_historial`
--
ALTER TABLE `pagos_historial`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `sysdiagrams`
--
ALTER TABLE `sysdiagrams`
  MODIFY `trial_diagram_id_3` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cuotas`
--
ALTER TABLE `cuotas`
  ADD CONSTRAINT `fk_cuotas_interes` FOREIGN KEY (`trial_id_interes_2`) REFERENCES `interes` (`trial_id_interes_1`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `desembolso`
--
ALTER TABLE `desembolso`
  ADD CONSTRAINT `fk_desembolso_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_desembolso_detalle_prestamo` FOREIGN KEY (`trial_id_detalle_desembolso_3`) REFERENCES `detalle_prestamo` (`id_detalle_prestamo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detallemorosidad`
--
ALTER TABLE `detallemorosidad`
  ADD CONSTRAINT `fk_detallemorosidad_detalle_prestamo` FOREIGN KEY (`id_detalle_prestamos`) REFERENCES `detalle_prestamo` (`id_detalle_prestamo`);

--
-- Filtros para la tabla `detalle_cliente_empleado`
--
ALTER TABLE `detalle_cliente_empleado`
  ADD CONSTRAINT `fk_detalle_cliente_empleado_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detalle_cliente_empleado_empleado` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`trial_id_empleado_1`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detalle_cliente_empleado_negocio` FOREIGN KEY (`trial_id_negocio_4`) REFERENCES `negocio` (`id_negocio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_garantia`
--
ALTER TABLE `detalle_garantia`
  ADD CONSTRAINT `fk_detalle_garantia_garantia` FOREIGN KEY (`id_garantia`) REFERENCES `garantia` (`id_garantia`),
  ADD CONSTRAINT `fk_detalle_garantia_solicitud` FOREIGN KEY (`id_solicitud`) REFERENCES `solicitud` (`trial_id_solicitud_1`);

--
-- Filtros para la tabla `detalle_sede_capital`
--
ALTER TABLE `detalle_sede_capital`
  ADD CONSTRAINT `fk_detalle_sede_capital_capital` FOREIGN KEY (`id_capital`) REFERENCES `capital` (`trial_id_capital_1`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detalle_sede_capital_sede` FOREIGN KEY (`id_sede`) REFERENCES `sede` (`trial_id_sede_1`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_solicitud`
--
ALTER TABLE `detalle_solicitud`
  ADD CONSTRAINT `fk_detalle_solicitud_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detalle_solicitud_solicitud` FOREIGN KEY (`trial_id_solicitud_2`) REFERENCES `solicitud` (`trial_id_solicitud_1`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_usuario_sede`
--
ALTER TABLE `detalle_usuario_sede`
  ADD CONSTRAINT `fk_detalle_usuario_sede_sede` FOREIGN KEY (`id_sede`) REFERENCES `sede` (`trial_id_sede_1`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detalle_usuario_sede_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `id_detalle_sede_empleado`
--
ALTER TABLE `id_detalle_sede_empleado`
  ADD CONSTRAINT `fk_id_detalle_sede_empleado_empleado` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`trial_id_empleado_1`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_detalle_sede_empleado_sede` FOREIGN KEY (`id_sede`) REFERENCES `sede` (`trial_id_sede_1`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `interes`
--
ALTER TABLE `interes`
  ADD CONSTRAINT `fk_interes_detalle_prestamo` FOREIGN KEY (`trial_id_detalle_prestamo_2`) REFERENCES `detalle_prestamo` (`id_detalle_prestamo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
