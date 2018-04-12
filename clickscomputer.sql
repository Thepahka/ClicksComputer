-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-04-2018 a las 04:41:14
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clickscomputer`
--
CREATE DATABASE IF NOT EXISTS `clickscomputer` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `clickscomputer`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cli_emp`
--

CREATE TABLE `cli_emp` (
  `fk_emp_id` int(11) NOT NULL,
  `fk_usu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `com_id` int(11) NOT NULL,
  `com_desc` text NOT NULL,
  `calificacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `com_pc`
--

CREATE TABLE `com_pc` (
  `fk_pc_id` int(11) NOT NULL,
  `fk_com_id` int(11) NOT NULL,
  `fk_usu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `com_pie`
--

CREATE TABLE `com_pie` (
  `fk_pi_cod` int(11) NOT NULL,
  `fk_com_id` int(11) NOT NULL,
  `fk_usu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `emp_id` int(11) NOT NULL,
  `emp_nit` varchar(50) NOT NULL,
  `emp_nom` varchar(20) NOT NULL,
  `emp_dir` varchar(20) NOT NULL,
  `emp_desc` text NOT NULL,
  `emp_tel` int(11) NOT NULL,
  `emp_correo` varchar(50) NOT NULL,
  `emp_contra` varchar(200) NOT NULL,
  `fk_rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`emp_id`, `emp_nit`, `emp_nom`, `emp_dir`, `emp_desc`, `emp_tel`, `emp_correo`, `emp_contra`, `fk_rol_id`) VALUES
(6, '123456789', 'pccomponentes', 'cra 47 #47-05', 'empresa dedicada a vender pc\'s y demas electrdomesticos', 2085072, 'pccomponentes@pc.com', '$2y$10$rHicc76sKBezaPc/dvraTO51CPmdqEHA379LYLGamfBKy4AWiIwD.', 1),
(7, '987654321', 'Alienware Inc', 'cra 32 #09', 'empresa vendedora de pc\'s gamer de alto rendimiento', 2085072, 'adminalien@alienware.com', '$2y$10$ITUa25KH0eebR2z6UmYeueK9caUQI7MyoM/L2myJyUmIXGBy/8Gp6', 1),
(9, '1036687877', 'bambu corp', 'otra ves bambu #56', 'trabajamos con bambu :)', 2085072, 'bambu@bambu.com', '$2y$10$DiiS3mnIGre7E.ZLmOR/sebdiwwSumhNGOHQFmbdYdUCh8ouqeORe', 1),
(10, '2312312312312321', 'pacha\'s corp', 'cra jabon #jabon', 'somos una empresa de jabones', 1212121, 'jabon@jabon.com', '$2y$10$yt/gfUdACrC2tb.Js9KJTOjQYqhGu/rr9FALm8KRrgJ50l/mRg5pW', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emp_pc`
--

CREATE TABLE `emp_pc` (
  `fk_emp_id` int(11) NOT NULL,
  `fk_pc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `emp_pie`
--

CREATE TABLE `emp_pie` (
  `fk_emp_id` int(11) NOT NULL,
  `fk_pi_cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `filtros`
--

CREATE TABLE `filtros` (
  `fil_id` int(11) NOT NULL,
  `fil_nom` varchar(30) NOT NULL,
  `fk_pc_id` int(11) DEFAULT NULL,
  `fk_emp_id` int(11) DEFAULT NULL,
  `fk_pi_cod` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `filtros`
--

INSERT INTO `filtros` (`fil_id`, `fil_nom`, `fk_pc_id`, `fk_emp_id`, `fk_pi_cod`) VALUES
(8, 'jabon', NULL, 9, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria`
--

CREATE TABLE `galeria` (
  `gal_id` int(11) NOT NULL,
  `gal_img` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gal_pc`
--

CREATE TABLE `gal_pc` (
  `fk_gal_id` int(11) NOT NULL,
  `fk_pc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gal_pie`
--

CREATE TABLE `gal_pie` (
  `fk_gal_id` int(11) NOT NULL,
  `fk_pi_cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `inv_id` int(11) NOT NULL,
  `inv_pre_uni` int(11) NOT NULL,
  `inv_pre_total` int(11) NOT NULL,
  `inv_fecha` date NOT NULL,
  `inv_cant` int(11) NOT NULL,
  `inv_val_compra` int(11) NOT NULL,
  `inv_val_venta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `mar_id` int(11) NOT NULL,
  `mar_nombre` varchar(30) NOT NULL,
  `fk_pc_id` int(11) DEFAULT NULL,
  `fk_emp_id` int(11) DEFAULT NULL,
  `fk_pi_cod` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pc`
--

CREATE TABLE `pc` (
  `pc_id` int(11) NOT NULL,
  `pc_cod` bigint(20) NOT NULL,
  `pc_nom` varchar(50) NOT NULL,
  `pc_desc` text NOT NULL,
  `pc_mod` varchar(50) NOT NULL,
  `fk_tipopc_id` int(11) NOT NULL,
  `ficha_tecnica` varchar(50) NOT NULL,
  `pc_precio` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pc`
--

INSERT INTO `pc` (`pc_id`, `pc_cod`, `pc_nom`, `pc_desc`, `pc_mod`, `fk_tipopc_id`, `ficha_tecnica`, `pc_precio`) VALUES
(1, 1, 'marta', 'marta', 'marta', 1, 'marta', 5),
(3, 2, 'asdsa', 'asdsad', 'ada', 3, 'sprint review n2.docx', 12500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pc_inv`
--

CREATE TABLE `pc_inv` (
  `fk_pc_id` int(11) NOT NULL,
  `fk_inv_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pc_pie`
--

CREATE TABLE `pc_pie` (
  `fk_pc_id` int(11) NOT NULL,
  `fk_pi_cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `piezas`
--

CREATE TABLE `piezas` (
  `pi_cod` int(11) NOT NULL,
  `pi_nom` varchar(50) NOT NULL,
  `pi_desc` text NOT NULL,
  `fk_tipo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pi_inv`
--

CREATE TABLE `pi_inv` (
  `fk_inv_id` int(11) NOT NULL,
  `fk_pi_cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `rol_id` int(11) NOT NULL,
  `rol_nom` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`rol_id`, `rol_nom`) VALUES
(1, 'Tienda'),
(2, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipopc`
--

CREATE TABLE `tipopc` (
  `tipopc_id` int(11) NOT NULL,
  `tipopc_nom` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipopc`
--

INSERT INTO `tipopc` (`tipopc_id`, `tipopc_nom`) VALUES
(1, 'de mesa'),
(2, 'portatil'),
(3, 'todo en uno'),
(4, 'netbook               ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipopieza`
--

CREATE TABLE `tipopieza` (
  `tipo_id` int(11) NOT NULL,
  `tipo_nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usu_id` int(11) NOT NULL,
  `usu_num_doc` bigint(20) NOT NULL,
  `usu_nom` varchar(50) NOT NULL,
  `usu_ape` varchar(50) NOT NULL,
  `usu_tel` int(11) DEFAULT NULL,
  `usu_correo` varchar(50) NOT NULL,
  `usu_nac` date NOT NULL,
  `usu_contra` varchar(200) NOT NULL,
  `fk_rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usu_id`, `usu_num_doc`, `usu_nom`, `usu_ape`, `usu_tel`, `usu_correo`, `usu_nac`, `usu_contra`, `fk_rol_id`) VALUES
(6, 99092513641, 'Sergio Esteban', 'Cifuentes Arango', 2085072, 'scifuentesarango@misena.edu.co', '1999-09-25', '$2y$10$2d/hEWpslV7QaBe2LnivYOJzC/cJ4tA/ZsGvQ7eUgG4hpxKUaa7CC', 2),
(7, 12121212, '121212', '121212', 1212121, '121212@12121.com', '1999-09-25', '$2y$10$N7MBceg3OhEwaImyEe1QBOtLVZoN9GPYx/94ZRyk6G931jam4CTGe', 2),
(8, 0, '333', '333', 333333333, '1@2.com', '2018-09-06', '$2y$10$u6ufWLBHXKhIkGflfw6jleurPeTLHy.Lo8s43xsY8Qa9ReJhB0Mf6', 2),
(10, 123123123123, 'asddsad', '1231313213', 13123123, 'adsadsad@aadssda.com', '1999-09-25', '$2y$10$HIC.uwANqDLSullgr4DS9uTWCuGB39Y5IIpfk0NQg8FyA5BdHEgtq', 2),
(11, 333409849131208394, 'sadadas', 'adasdasdasd', 2147483647, 'dq@ads.com', '1999-09-25', '$2y$10$H43bvkKMliSRlUwlNki6KOhLnsw1ub6cKjbRUcOuwlyNa40JLaY2C', 2),
(12, 3123123123123213, 'sdadasdad', 'sadasdasdasd', 2147483647, '123123131@sadasd.com', '0000-00-00', '$2y$10$R0PpwnXQm9B3hzWpx2xdquV.7bkMdrGDtuoR3GirsAID3za7VGf96', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cli_emp`
--
ALTER TABLE `cli_emp`
  ADD KEY `fk_emp_id` (`fk_emp_id`),
  ADD KEY `fk_usu_id` (`fk_usu_id`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`com_id`);

--
-- Indices de la tabla `com_pc`
--
ALTER TABLE `com_pc`
  ADD KEY `fk_pc_id` (`fk_pc_id`),
  ADD KEY `fk_com_id` (`fk_com_id`),
  ADD KEY `fk_usu_id` (`fk_usu_id`);

--
-- Indices de la tabla `com_pie`
--
ALTER TABLE `com_pie`
  ADD KEY `fk_pi_cod` (`fk_pi_cod`),
  ADD KEY `fk_com_id` (`fk_com_id`),
  ADD KEY `fk_usu_id` (`fk_usu_id`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `fk_rol_id` (`fk_rol_id`);

--
-- Indices de la tabla `emp_pc`
--
ALTER TABLE `emp_pc`
  ADD KEY `fk_emp_id` (`fk_emp_id`),
  ADD KEY `fk_pc_id` (`fk_pc_id`);

--
-- Indices de la tabla `emp_pie`
--
ALTER TABLE `emp_pie`
  ADD KEY `fk_emp_id` (`fk_emp_id`),
  ADD KEY `fk_pi_cod` (`fk_pi_cod`);

--
-- Indices de la tabla `filtros`
--
ALTER TABLE `filtros`
  ADD PRIMARY KEY (`fil_id`),
  ADD KEY `fk_pc_id` (`fk_pc_id`),
  ADD KEY `fk_emp_id` (`fk_emp_id`),
  ADD KEY `fk_pi_cod` (`fk_pi_cod`);

--
-- Indices de la tabla `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`gal_id`);

--
-- Indices de la tabla `gal_pc`
--
ALTER TABLE `gal_pc`
  ADD KEY `fk_gal_id` (`fk_gal_id`),
  ADD KEY `fk_pc_id` (`fk_pc_id`);

--
-- Indices de la tabla `gal_pie`
--
ALTER TABLE `gal_pie`
  ADD KEY `fk_gal_id` (`fk_gal_id`),
  ADD KEY `fk_pi_cod` (`fk_pi_cod`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`inv_id`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`mar_id`),
  ADD KEY `fk_pc_id` (`fk_pc_id`),
  ADD KEY `fk_emp_id` (`fk_emp_id`),
  ADD KEY `fk_pi_cod` (`fk_pi_cod`);

--
-- Indices de la tabla `pc`
--
ALTER TABLE `pc`
  ADD PRIMARY KEY (`pc_id`),
  ADD KEY `fk_tipopc_id` (`fk_tipopc_id`);

--
-- Indices de la tabla `pc_inv`
--
ALTER TABLE `pc_inv`
  ADD KEY `fk_pc_id` (`fk_pc_id`),
  ADD KEY `fk_inv_id` (`fk_inv_id`);

--
-- Indices de la tabla `pc_pie`
--
ALTER TABLE `pc_pie`
  ADD KEY `fk_pc_id` (`fk_pc_id`),
  ADD KEY `fk_pi_cod` (`fk_pi_cod`);

--
-- Indices de la tabla `piezas`
--
ALTER TABLE `piezas`
  ADD PRIMARY KEY (`pi_cod`),
  ADD KEY `fk_tipo_id` (`fk_tipo_id`);

--
-- Indices de la tabla `pi_inv`
--
ALTER TABLE `pi_inv`
  ADD KEY `fk_inv_id` (`fk_inv_id`),
  ADD KEY `fk_pi_cod` (`fk_pi_cod`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`rol_id`);

--
-- Indices de la tabla `tipopc`
--
ALTER TABLE `tipopc`
  ADD PRIMARY KEY (`tipopc_id`);

--
-- Indices de la tabla `tipopieza`
--
ALTER TABLE `tipopieza`
  ADD PRIMARY KEY (`tipo_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usu_id`),
  ADD KEY `fk_rol_id` (`fk_rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `com_pc`
--
ALTER TABLE `com_pc`
  MODIFY `fk_com_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `com_pie`
--
ALTER TABLE `com_pie`
  MODIFY `fk_com_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `filtros`
--
ALTER TABLE `filtros`
  MODIFY `fil_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `mar_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pc`
--
ALTER TABLE `pc`
  MODIFY `pc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipopc`
--
ALTER TABLE `tipopc`
  MODIFY `tipopc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cli_emp`
--
ALTER TABLE `cli_emp`
  ADD CONSTRAINT `cli_emp_ibfk_2` FOREIGN KEY (`fk_usu_id`) REFERENCES `usuario` (`usu_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cli_emp_ibfk_3` FOREIGN KEY (`fk_emp_id`) REFERENCES `empresa` (`emp_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `com_pc`
--
ALTER TABLE `com_pc`
  ADD CONSTRAINT `com_pc_ibfk_1` FOREIGN KEY (`fk_com_id`) REFERENCES `comentarios` (`com_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `com_pc_ibfk_3` FOREIGN KEY (`fk_usu_id`) REFERENCES `usuario` (`usu_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `com_pc_ibfk_4` FOREIGN KEY (`fk_pc_id`) REFERENCES `pc` (`pc_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `com_pie`
--
ALTER TABLE `com_pie`
  ADD CONSTRAINT `com_pie_ibfk_1` FOREIGN KEY (`fk_com_id`) REFERENCES `comentarios` (`com_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `com_pie_ibfk_2` FOREIGN KEY (`fk_pi_cod`) REFERENCES `piezas` (`pi_cod`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `com_pie_ibfk_3` FOREIGN KEY (`fk_usu_id`) REFERENCES `usuario` (`usu_id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `empresa_ibfk_1` FOREIGN KEY (`fk_rol_id`) REFERENCES `rol` (`rol_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `emp_pc`
--
ALTER TABLE `emp_pc`
  ADD CONSTRAINT `emp_pc_ibfk_3` FOREIGN KEY (`fk_emp_id`) REFERENCES `empresa` (`emp_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `emp_pc_ibfk_4` FOREIGN KEY (`fk_pc_id`) REFERENCES `pc` (`pc_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `emp_pie`
--
ALTER TABLE `emp_pie`
  ADD CONSTRAINT `emp_pie_ibfk_2` FOREIGN KEY (`fk_pi_cod`) REFERENCES `piezas` (`pi_cod`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `emp_pie_ibfk_3` FOREIGN KEY (`fk_emp_id`) REFERENCES `empresa` (`emp_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `filtros`
--
ALTER TABLE `filtros`
  ADD CONSTRAINT `filtros_ibfk_1` FOREIGN KEY (`fk_pc_id`) REFERENCES `pc` (`pc_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `filtros_ibfk_2` FOREIGN KEY (`fk_emp_id`) REFERENCES `empresa` (`emp_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `filtros_ibfk_3` FOREIGN KEY (`fk_pi_cod`) REFERENCES `piezas` (`pi_cod`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `gal_pc`
--
ALTER TABLE `gal_pc`
  ADD CONSTRAINT `gal_pc_ibfk_2` FOREIGN KEY (`fk_gal_id`) REFERENCES `galeria` (`gal_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `gal_pc_ibfk_3` FOREIGN KEY (`fk_pc_id`) REFERENCES `pc` (`pc_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `gal_pie`
--
ALTER TABLE `gal_pie`
  ADD CONSTRAINT `gal_pie_ibfk_1` FOREIGN KEY (`fk_gal_id`) REFERENCES `galeria` (`gal_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `gal_pie_ibfk_2` FOREIGN KEY (`fk_pi_cod`) REFERENCES `piezas` (`pi_cod`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `marca`
--
ALTER TABLE `marca`
  ADD CONSTRAINT `marca_ibfk_1` FOREIGN KEY (`fk_pc_id`) REFERENCES `pc` (`pc_id`),
  ADD CONSTRAINT `marca_ibfk_2` FOREIGN KEY (`fk_emp_id`) REFERENCES `empresa` (`emp_id`),
  ADD CONSTRAINT `marca_ibfk_3` FOREIGN KEY (`fk_pi_cod`) REFERENCES `piezas` (`pi_cod`);

--
-- Filtros para la tabla `pc`
--
ALTER TABLE `pc`
  ADD CONSTRAINT `pc_ibfk_1` FOREIGN KEY (`fk_tipopc_id`) REFERENCES `tipopc` (`tipopc_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `pc_inv`
--
ALTER TABLE `pc_inv`
  ADD CONSTRAINT `pc_inv_ibfk_2` FOREIGN KEY (`fk_inv_id`) REFERENCES `inventario` (`inv_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `pc_inv_ibfk_3` FOREIGN KEY (`fk_pc_id`) REFERENCES `pc` (`pc_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `pc_pie`
--
ALTER TABLE `pc_pie`
  ADD CONSTRAINT `pc_pie_ibfk_2` FOREIGN KEY (`fk_pi_cod`) REFERENCES `piezas` (`pi_cod`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `pc_pie_ibfk_3` FOREIGN KEY (`fk_pc_id`) REFERENCES `pc` (`pc_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `piezas`
--
ALTER TABLE `piezas`
  ADD CONSTRAINT `piezas_ibfk_1` FOREIGN KEY (`fk_tipo_id`) REFERENCES `tipopieza` (`tipo_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `pi_inv`
--
ALTER TABLE `pi_inv`
  ADD CONSTRAINT `pi_inv_ibfk_1` FOREIGN KEY (`fk_inv_id`) REFERENCES `inventario` (`inv_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `pi_inv_ibfk_2` FOREIGN KEY (`fk_pi_cod`) REFERENCES `piezas` (`pi_cod`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`fk_rol_id`) REFERENCES `rol` (`rol_id`) ON DELETE NO ACTION ON UPDATE CASCADE;
--
-- Base de datos: `factura`
--
CREATE DATABASE IF NOT EXISTS `factura` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `factura`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallecotizacion`
--

CREATE TABLE `detallecotizacion` (
  `codproducto` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `vlrunidad` double NOT NULL,
  `vlrbruto` double NOT NULL,
  `descuento` int(11) NOT NULL,
  `subtotal` double NOT NULL,
  `codcotizacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `iddetallecotizacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detallecotizacion`
--

INSERT INTO `detallecotizacion` (`codproducto`, `cantidad`, `vlrunidad`, `vlrbruto`, `descuento`, `subtotal`, `codcotizacion`, `iddetallecotizacion`) VALUES
('54150', 1, 210000, 210000, 45, 115500, 'C-1', 17),
('54152', 2, 100000, 200000, 10, 180000, 'C-2', 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cliente`
--

CREATE TABLE `tbl_cliente` (
  `nitcliente` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `correo` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `contacto` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_cliente`
--

INSERT INTO `tbl_cliente` (`nitcliente`, `nombre`, `direccion`, `telefono`, `correo`, `contacto`) VALUES
('prueba', 'cliente de prueba', 'rioengro', '777777', 'cliente@gmail.com', 'Cliente el Interesado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cotizacion`
--

CREATE TABLE `tbl_cotizacion` (
  `codcotizacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nitcliente` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `solicita` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `codigo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `observaciones` varchar(1000) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_cotizacion`
--

INSERT INTO `tbl_cotizacion` (`codcotizacion`, `nitcliente`, `fecha`, `solicita`, `codigo`, `observaciones`, `estado`) VALUES
('C-1', 'prueba', '2018-03-08', 'aDD', '777', 'aDD', 'Inactiva'),
('C-2', 'prueba', '2018-03-08', 'SADSADASFF', '777', 'FDFSDFDSF', 'Inactiva');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_empresa`
--

CREATE TABLE `tbl_empresa` (
  `nit` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `razon_social` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nom_ccial` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ciudad` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `rep_legal` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `id_rep` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `e_mail` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `web` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_regimen` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `logo` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_empresa`
--

INSERT INTO `tbl_empresa` (`nit`, `razon_social`, `nom_ccial`, `telefono`, `direccion`, `ciudad`, `rep_legal`, `id_rep`, `e_mail`, `web`, `tipo_regimen`, `logo`) VALUES
('111', 'Empresa Pruebas', 'Empresa Pruebas', '1234567', 'Rionegro', 'Rionegro', 'Cesar Moreno', '15440851', 'pruebas@gmail.com', 'www.pruebas.com', 'comun', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_producto`
--

CREATE TABLE `tbl_producto` (
  `codproducto` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nit` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `vlrunitario` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_producto`
--

INSERT INTO `tbl_producto` (`codproducto`, `nit`, `descripcion`, `cantidad`, `vlrunitario`) VALUES
('54150', '111', 'RELE ALTDR P/BOMBA 110/220VAC MAC3 ENTREGA: 2 DIAS HABILES', 50, 210000),
('54151', '111', 'PRODUCTO DE PRUEBA', 20, 50000),
('54152', '111', 'OTRO PRODUCTO DE PRUEBA', 10, 100000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detallecotizacion`
--
ALTER TABLE `detallecotizacion`
  ADD PRIMARY KEY (`iddetallecotizacion`),
  ADD KEY `codproducto` (`codcotizacion`),
  ADD KEY `codcotizacion_2` (`codcotizacion`),
  ADD KEY `codproducto_2` (`codproducto`);

--
-- Indices de la tabla `tbl_cliente`
--
ALTER TABLE `tbl_cliente`
  ADD PRIMARY KEY (`nitcliente`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indices de la tabla `tbl_cotizacion`
--
ALTER TABLE `tbl_cotizacion`
  ADD PRIMARY KEY (`codcotizacion`),
  ADD KEY `nitcliente` (`nitcliente`),
  ADD KEY `codigo` (`codigo`),
  ADD KEY `codigo_2` (`codigo`);

--
-- Indices de la tabla `tbl_empresa`
--
ALTER TABLE `tbl_empresa`
  ADD PRIMARY KEY (`nit`);

--
-- Indices de la tabla `tbl_producto`
--
ALTER TABLE `tbl_producto`
  ADD PRIMARY KEY (`codproducto`),
  ADD UNIQUE KEY `descripcion` (`descripcion`),
  ADD KEY `nit` (`nit`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detallecotizacion`
--
ALTER TABLE `detallecotizacion`
  MODIFY `iddetallecotizacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detallecotizacion`
--
ALTER TABLE `detallecotizacion`
  ADD CONSTRAINT `detallecotizacion_ibfk_1` FOREIGN KEY (`codproducto`) REFERENCES `tbl_producto` (`codproducto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detallecotizacion_ibfk_2` FOREIGN KEY (`codcotizacion`) REFERENCES `tbl_cotizacion` (`codcotizacion`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_cotizacion`
--
ALTER TABLE `tbl_cotizacion`
  ADD CONSTRAINT `tbl_cotizacion_ibfk_1` FOREIGN KEY (`nitcliente`) REFERENCES `tbl_cliente` (`nitcliente`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_producto`
--
ALTER TABLE `tbl_producto`
  ADD CONSTRAINT `tbl_producto_ibfk_1` FOREIGN KEY (`nit`) REFERENCES `tbl_empresa` (`nit`) ON UPDATE CASCADE;
--
-- Base de datos: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(11) NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

--
-- Volcado de datos para la tabla `pma__designer_settings`
--

INSERT INTO `pma__designer_settings` (`username`, `settings_data`) VALUES
('root', '{\"snap_to_grid\":\"off\",\"relation_lines\":\"true\",\"angular_direct\":\"direct\"}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Volcado de datos para la tabla `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"clickscomputer\",\"table\":\"empresa\"},{\"db\":\"clickscomputer\",\"table\":\"filtros\"},{\"db\":\"clickscomputer\",\"table\":\"marca\"},{\"db\":\"clickscomputer\",\"table\":\"usuario\"}]');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float UNSIGNED NOT NULL DEFAULT '0',
  `y` float UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

--
-- Volcado de datos para la tabla `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'clickscomputer', 'empresa', '{\"sorted_col\":\"`empresa`.`emp_dir` ASC\"}', '2018-04-12 02:13:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Volcado de datos para la tabla `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2018-02-26 01:09:08', '{\"lang\":\"es\",\"collation_connection\":\"utf8mb4_unicode_ci\"}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indices de la tabla `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indices de la tabla `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indices de la tabla `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indices de la tabla `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indices de la tabla `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indices de la tabla `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indices de la tabla `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indices de la tabla `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indices de la tabla `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indices de la tabla `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indices de la tabla `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indices de la tabla `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indices de la tabla `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indices de la tabla `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Base de datos: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
