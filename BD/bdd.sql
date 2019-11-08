-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-11-2019 a las 15:09:25
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_incidencias`
--

CREATE TABLE `tbl_incidencias` (
  `id_incidencias` int(4) NOT NULL,
  `inicio_incidencias` date NOT NULL COMMENT 'Inicio de incidencia',
  `final_incidencias` date DEFAULT NULL COMMENT 'Final de incidencia',
  `informe_incidencias` varchar(300) CHARACTER SET latin1 NOT NULL COMMENT 'Descripción',
  `id_recursos` int(4) NOT NULL COMMENT 'Recurso',
  `id_usuarios` int(4) NOT NULL COMMENT 'Usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_incidencias`
--

INSERT INTO `tbl_incidencias` (`id_incidencias`, `inicio_incidencias`, `final_incidencias`, `informe_incidencias`, `id_recursos`, `id_usuarios`) VALUES
(1, '2019-11-07', '2019-11-07', 'Gerard se ha cargado la pared a patadas', 2, 1),
(2, '2019-11-07', '2019-11-07', 'Huele mal', 4, 1),
(3, '2019-11-07', '2019-11-07', 'Alguien se cago en la pica', 7, 1),
(4, '2019-11-07', '2019-11-07', 'Teclado no va', 6, 1),
(5, '2019-11-07', '2019-11-07', 'hbhihiuhi', 7, 1),
(6, '2019-11-07', '2019-11-07', 'hghgjhg', 14, 1),
(7, '2019-11-07', '2019-11-08', 'rterterte', 1, 1),
(8, '2019-11-08', '2019-11-08', 'tytyty', 1, 1),
(9, '2019-11-08', NULL, 'ftyrtyrty', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_recursos`
--

CREATE TABLE `tbl_recursos` (
  `id_recursos` int(4) NOT NULL,
  `nombre_recursos` varchar(25) NOT NULL COMMENT 'Nombre del recurso',
  `estado_recursos` enum('disponible','ocupado','incidencia') NOT NULL COMMENT 'Estado',
  `id_tiporecursos` int(4) NOT NULL COMMENT 'Tipo'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_recursos`
--

INSERT INTO `tbl_recursos` (`id_recursos`, `nombre_recursos`, `estado_recursos`, `id_tiporecursos`) VALUES
(1, 'Yoga', 'disponible', 1),
(2, 'Baile', 'incidencia', 1),
(3, 'Presentaciones', 'ocupado', 1),
(4, 'Gimnasio', 'disponible', 1),
(5, 'Informatica_1', 'disponible', 1),
(6, 'Informatica_2', 'disponible', 1),
(7, 'Cocina', 'disponible', 1),
(8, 'Despacho_1', 'disponible', 1),
(9, 'Despacho_2', 'disponible', 1),
(10, 'Actos', 'disponible', 1),
(11, 'Reuniones', 'disponible', 1),
(12, 'Proyector_portatil_1', 'disponible', 2),
(13, 'Proyector_portatil_2', 'disponible', 2),
(14, 'Portatil_1', 'disponible', 2),
(15, 'Portatil_2', 'disponible', 2),
(16, 'Portatil_3', 'disponible', 2),
(17, 'Mobil_1', 'disponible', 2),
(18, 'Mobil_2', 'disponible', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_reservas`
--

CREATE TABLE `tbl_reservas` (
  `id_reservas` int(4) NOT NULL,
  `inicio_reservas` datetime DEFAULT NULL COMMENT 'Inicio de reserva',
  `final_reservas` datetime DEFAULT NULL COMMENT 'Final de reserva',
  `id_usuarios` int(4) NOT NULL,
  `id_recursos` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_reservas`
--

INSERT INTO `tbl_reservas` (`id_reservas`, `inicio_reservas`, `final_reservas`, `id_usuarios`, `id_recursos`) VALUES
(53, '2019-11-05 22:17:06', '2019-11-06 00:15:21', 1, 7),
(54, '2019-11-05 22:17:06', '2019-11-06 00:15:33', 1, 10),
(55, '2019-11-05 22:17:06', '2019-11-06 00:15:47', 1, 12),
(56, '2019-11-05 22:17:06', '2019-11-06 00:15:47', 1, 13),
(57, '2019-11-06 00:17:32', '2019-11-08 03:05:30', 1, 1),
(58, '2019-11-06 00:17:32', '2019-11-06 00:58:00', 1, 2),
(61, '2019-11-06 00:19:07', '2019-11-08 03:05:30', 1, 1),
(62, '2019-11-06 00:38:32', '2019-11-08 03:05:30', 1, 1),
(63, '2019-11-06 00:55:41', '2019-11-08 03:05:30', 1, 1),
(64, '2019-11-06 00:55:56', '2019-11-08 03:05:30', 1, 1),
(70, '2019-11-07 23:12:05', '2019-11-08 03:05:30', 1, 1),
(71, '2019-11-08 03:04:54', '2019-11-08 03:05:30', 1, 1),
(72, '2019-11-08 03:05:17', NULL, 1, 3),
(73, '2019-11-08 03:05:23', NULL, 1, 2),
(74, '2019-11-08 03:05:35', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tiporecursos`
--

CREATE TABLE `tbl_tiporecursos` (
  `id_tiporecursos` int(4) NOT NULL,
  `nombre_tiporecursos` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_tiporecursos`
--

INSERT INTO `tbl_tiporecursos` (`id_tiporecursos`, `nombre_tiporecursos`) VALUES
(1, 'Sala'),
(2, 'Objeto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `id_usuarios` int(4) NOT NULL,
  `nombre_usuarios` varchar(25) NOT NULL,
  `pwd_usuarios` varchar(50) NOT NULL,
  `estado_usuarios` varchar(25) NOT NULL,
  `admin_usuarios` int(1) NOT NULL,
  `informatico_usuarios` int(1) NOT NULL,
  `normal_usuarios` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`id_usuarios`, `nombre_usuarios`, `pwd_usuarios`, `estado_usuarios`, `admin_usuarios`, `informatico_usuarios`, `normal_usuarios`) VALUES
(1, 'Gerard', '81dc9bdb52d04dc20036dbd8313ed055', 'enabled', 1, 0, 0),
(2, 'Sergio', '81dc9bdb52d04dc20036dbd8313ed055', 'enabled', 1, 0, 0),
(3, 'Victor', '81dc9bdb52d04dc20036dbd8313ed055', 'enabled', 0, 1, 0),
(4, 'Jesus', '81dc9bdb52d04dc20036dbd8313ed055', 'enabled', 0, 1, 0),
(5, 'Juanma', '81dc9bdb52d04dc20036dbd8313ed055', 'enabled', 0, 0, 1),
(6, 'Daniel', '81dc9bdb52d04dc20036dbd8313ed055', 'enabled', 0, 0, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_incidencias`
--
ALTER TABLE `tbl_incidencias`
  ADD PRIMARY KEY (`id_incidencias`),
  ADD KEY `FK_usuarios_incidencias` (`id_usuarios`),
  ADD KEY `FK_recursos_incidencias` (`id_recursos`);

--
-- Indices de la tabla `tbl_recursos`
--
ALTER TABLE `tbl_recursos`
  ADD PRIMARY KEY (`id_recursos`),
  ADD KEY `FK_tiporecursos_recursos` (`id_tiporecursos`);

--
-- Indices de la tabla `tbl_reservas`
--
ALTER TABLE `tbl_reservas`
  ADD PRIMARY KEY (`id_reservas`),
  ADD KEY `FK_usuarios_reservas` (`id_usuarios`),
  ADD KEY `FK_recursos_reservas` (`id_recursos`);

--
-- Indices de la tabla `tbl_tiporecursos`
--
ALTER TABLE `tbl_tiporecursos`
  ADD PRIMARY KEY (`id_tiporecursos`);

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`id_usuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_incidencias`
--
ALTER TABLE `tbl_incidencias`
  MODIFY `id_incidencias` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tbl_recursos`
--
ALTER TABLE `tbl_recursos`
  MODIFY `id_recursos` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `tbl_reservas`
--
ALTER TABLE `tbl_reservas`
  MODIFY `id_reservas` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de la tabla `tbl_tiporecursos`
--
ALTER TABLE `tbl_tiporecursos`
  MODIFY `id_tiporecursos` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `id_usuarios` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_incidencias`
--
ALTER TABLE `tbl_incidencias`
  ADD CONSTRAINT `FK_recursos_incidencias` FOREIGN KEY (`id_recursos`) REFERENCES `tbl_recursos` (`id_recursos`),
  ADD CONSTRAINT `FK_usuarios_incidencias` FOREIGN KEY (`id_usuarios`) REFERENCES `tbl_usuarios` (`id_usuarios`);

--
-- Filtros para la tabla `tbl_recursos`
--
ALTER TABLE `tbl_recursos`
  ADD CONSTRAINT `FK_tiporecursos_recursos` FOREIGN KEY (`id_tiporecursos`) REFERENCES `tbl_tiporecursos` (`id_tiporecursos`);

--
-- Filtros para la tabla `tbl_reservas`
--
ALTER TABLE `tbl_reservas`
  ADD CONSTRAINT `FK_recursos_reservas` FOREIGN KEY (`id_recursos`) REFERENCES `tbl_recursos` (`id_recursos`),
  ADD CONSTRAINT `FK_usuarios_reservas` FOREIGN KEY (`id_usuarios`) REFERENCES `tbl_usuarios` (`id_usuarios`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
