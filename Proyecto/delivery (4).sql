-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-03-2022 a las 06:13:16
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `delivery`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `fecha`) VALUES
(1, 'tornillos', '2022-02-21 04:08:29'),
(2, 'motores', '2022-02-21 04:08:42'),
(3, 'focos', '2022-02-21 04:08:53'),
(4, 'bebidas', '2022-02-21 04:09:22'),
(5, 'toallas', '2022-02-21 04:26:26'),
(6, 'cementos', '2022-02-21 04:26:53'),
(7, 'alfonbras', '2022-02-21 04:38:45'),
(8, 'seviche mixto', '2022-03-08 02:26:51'),
(9, 'seviche sencillo', '2022-03-08 02:27:03'),
(11, 'acido nitrico', '2022-03-15 02:54:55'),
(12, 'coralax', '2022-03-15 03:22:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` text COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish2_ci NOT NULL,
  `log` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `lnt` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `fercha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `telefono`, `direccion`, `log`, `lnt`, `fercha`) VALUES
(1, 'royer maton', '123456', 'ave alemana # 34 casa blanca al lado de una tienda', '', '', '2022-03-23 00:47:33'),
(2, 'WILLIAM TORREZ', '878787', 'fasfdfdsf', '', '', '2022-03-23 04:36:48'),
(3, 'don carlos', '77029720', 'plan 300', '-63.1756706237793', '-17.7603702545166', '2022-03-23 05:07:48'),
(4, 'chuqi', '12344444', 'av busch', '-63.196876525878906', '-17.849206924438477', '2022-03-23 05:09:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `codigo` text COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish2_ci NOT NULL,
  `imagen` text COLLATE utf8_spanish2_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `precio` float NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `id_categoria`, `codigo`, `descripcion`, `imagen`, `stock`, `precio`, `fecha`) VALUES
(1, 1, '101', 'Aspiradora Industrial editada', 'vistas/img/productos/101/541.jpg', 15, 1501, '2022-03-17 04:59:33'),
(2, 1, '102', 'Plato Flotante para Allanadora editada', 'vistas/img/productos/102/913.jpg', 3, 4503, '2022-03-17 05:00:04'),
(3, 1, '103', 'Compresor de Aire para pintura', 'vistas/img/productos/anonymous.png', 20, 3000, '2022-03-14 02:34:43'),
(4, 1, '104', 'Cortadora de Adobe sin Disco ', 'vistas/img/productos/anonymous.png', 20, 4000, '2022-03-14 02:34:48'),
(5, 1, '105', 'nueva prueva domingo1236', 'vistas/img/productos/105/260.jpg', 3, 27, '2022-03-21 02:29:09'),
(6, 2, '106', 'Disco Punta Diamante ', 'vistas/img/productos/anonymous.png', 150, 1100, '2022-03-14 03:07:57'),
(7, 2, '107', 'Extractor de Aire ', 'vistas/img/productos/anonymous.png', 20, 1540, '2022-03-14 02:34:58'),
(8, 2, '108', 'Guada?adora ', 'vistas/img/productos/anonymous.png', 8, 1540, '2022-03-14 03:07:30'),
(9, 2, '109', 'Hidrolavadora El?ctrica ', 'vistas/img/productos/anonymous.png', 20, 2600, '2022-03-14 02:35:05'),
(10, 2, '110', 'Hidrolavadora Gasolina', 'vistas/img/productos/anonymous.png', 20, 2210, '2022-03-14 02:35:08'),
(11, 3, '111', 'Motobomba a Gasolina', 'vistas/img/productos/anonymous.png', 20, 2860, '2022-03-14 02:35:11'),
(12, 3, '112', 'Motobomba El?ctrica', '', 20, 2400, '2022-03-09 02:59:10'),
(13, 3, '113', 'Sierra Circular ', '', 20, 1100, '2022-03-09 02:59:10'),
(14, 3, '114', 'Disco de tugsteno para Sierra circular', '', 20, 4500, '2022-03-09 02:59:10'),
(15, 3, '115', 'Soldador Electrico ', '', 20, 1980, '2022-03-09 02:59:10'),
(16, 3, '116', 'Careta para Soldador', '', 20, 4200, '2022-03-09 02:59:10'),
(17, 3, '117', 'Torre de iluminacion ', '', 20, 1800, '2022-03-09 02:59:10'),
(18, 3, '201', 'Martillo Demoledor de Piso 110V', '', 20, 5600, '2022-03-09 02:59:10'),
(19, 3, '202', 'Muela o cincel martillo demoledor piso', '', 20, 9600, '2022-03-09 02:59:10'),
(20, 4, '203', 'Taladro Demoledor de muro 110V', '', 20, 3850, '2022-03-09 02:59:10'),
(21, 4, '204', 'Muela o cincel martillo demoledor muro', '', 20, 9600, '2022-03-09 02:59:10'),
(22, 5, '205', 'Taladro Percutor 1', '', 20, 8000, '2022-03-14 02:14:28'),
(23, 5, '206', 'Taladro Percutor SDS Plus 110V', '', 20, 3900, '2022-03-09 02:59:10'),
(24, 5, '207', 'Taladro Percutor SDS Max 110V (Mineria)', '', 20, 4600, '2022-03-09 02:59:10'),
(25, 6, '301', 'Andamio colgante', '', 20, 1440, '2022-03-09 02:59:10'),
(26, 7, '302', 'Distanciador andamio colgante', '', 20, 1600, '2022-03-09 02:59:10'),
(27, 8, '303', 'Marco andamio modular ', '', 20, 900, '2022-03-09 02:59:10'),
(28, 8, '304', 'Marco andamio tijera', '', 20, 100, '2022-03-09 02:59:10'),
(29, 8, '305', 'Tijera para andamio', '', 20, 162, '2022-03-09 02:59:10'),
(30, 8, '306', 'Escalera interna para andamio', '', 20, 270, '2022-03-09 02:59:10'),
(31, 8, '307', 'Pasamanos de seguridad', '', 20, 75, '2022-03-09 02:59:10'),
(32, 8, '308', 'Rueda giratoria para andamio', '', 20, 168, '2022-03-09 02:59:10'),
(33, 8, '309', 'Arnes de seguridad', '', 20, 1750, '2022-03-09 02:59:10'),
(34, 8, '310', 'Eslinga para arnes', '', 20, 175, '2022-03-09 02:59:10'),
(35, 8, '311', 'Plataforma Met?lica', '', 20, 420, '2022-03-09 02:59:10'),
(36, 8, '401', 'Planta Electrica Diesel 6 Kva', '', 20, 3500, '2022-03-09 02:59:10'),
(37, 8, '402', 'Planta Electrica Diesel 10 Kva', '', 20, 3550, '2022-03-09 02:59:10'),
(38, 8, '403', 'Planta Electrica Diesel 20 Kva', '', 20, 3600, '2022-03-09 02:59:10'),
(39, 8, '404', 'Planta Electrica Diesel 30 Kva', '', 20, 3650, '2022-03-09 02:59:10'),
(40, 8, '405', 'Planta Electrica Diesel 60 Kva', '', 20, 3700, '2022-03-09 02:59:10'),
(41, 8, '406', 'Planta Electrica Diesel 75 Kva', '', 20, 3750, '2022-03-09 02:59:10'),
(42, 9, '407', 'Planta Electrica Diesel 100 Kva', '', 20, 3800, '2022-03-09 02:59:10'),
(43, 9, '408', 'Planta Electrica Diesel 120 Kva', '', 20, 3850, '2022-03-09 02:59:10'),
(44, 9, '501', 'Escalera de Tijera Aluminio ', '', 20, 350, '2022-03-09 02:59:10'),
(45, 9, '502', 'Extension Electrica ', '', 20, 370, '2022-03-09 02:59:10'),
(46, 9, '503', 'Gato tensor', '', 20, 380, '2022-03-09 02:59:10'),
(47, 9, '504', 'Lamina Cubre Brecha ', '', 20, 380, '2022-03-09 02:59:10'),
(48, 9, '505', 'Llave de Tubo', '', 20, 480, '2022-03-09 02:59:10'),
(49, 9, '506', 'Manila por Metro', '', 20, 600, '2022-03-09 02:59:10'),
(50, 9, '507', 'Polea 2 canales', '', 20, 900, '2022-03-09 02:59:10'),
(51, 9, '508', 'Tensor', '', 20, 100, '2022-03-09 02:59:10'),
(52, 9, '509', 'Bascula ', '', 20, 130, '2022-03-09 02:59:10'),
(53, 9, '510', 'Bomba Hidrostatica', '', 20, 770, '2022-03-09 02:59:10'),
(54, 9, '511', 'Chapeta', '', 20, 660, '2022-03-09 02:59:10'),
(55, 9, '512', 'Cilindro muestra de concreto', '', 20, 400, '2022-03-09 02:59:10'),
(56, 9, '513', 'Cizalla de Palanca', '', 20, 450, '2022-03-09 02:59:10'),
(57, 9, '514', 'Cizalla de Tijera', '', 20, 580, '2022-03-09 02:59:10'),
(58, 9, '515', 'Coche llanta neumatica', '', 20, 420, '2022-03-09 02:59:10'),
(59, 9, '516', 'Cono slump', '', 20, 140, '2022-03-09 02:59:10'),
(60, 9, '517', 'Cortadora de Baldosin', '', 20, 930, '2022-03-09 02:59:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `usuarios` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `usuarios`, `password`, `perfil`, `estado`, `ultimo_login`, `fecha`) VALUES
(1, 'felix', 'admin', 'admin123', 'administrador', 1, '2022-03-22 22:59:14', '2022-03-23 02:59:14'),
(6, 'julio', 'cesar', '123456', 'Vendedor', 0, '0000-00-00 00:00:00', '2022-02-17 05:31:16');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
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
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
