-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2017 a las 05:50:14
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 7.1.7

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

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarEmail` (IN `usu_correo` VARCHAR(30))  BEGIN
SELECT usu_correo, fk_rol_id, usu_num_doc FROM usuario WHERE usu_correo = usu_correo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarId` (IN `usu_num_doc` BIGINT(30))  BEGIN
SELECT usu_correo FROM usuario;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GuardarEmpresa` (IN `emp_nit` BIGINT, IN `emp_nom` VARCHAR(20), IN `emp_dir` VARCHAR(20), IN `emp_desc` TEXT, IN `emp_tel` INT, IN `emp_correo` VARCHAR(20), IN `emp_contra` VARCHAR(20), IN `fk_rol_id` INT)  BEGIN
INSERT INTO empresa(emp_id, emp_nit, emp_nom, emp_dir, emp_desc, emp_tel, emp_correo, emp_contra, fk_rol_id) VALUES (emp_id, emp_nit, emp_nom, emp_dir, emp_desc, emp_tel, emp_correo, emp_contra, fk_rol_id);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Guardarpc` (IN `pc_id` INT, IN `pc_nom` VARCHAR(30), IN `pc_desc` TEXT, IN `pc_mod` VARCHAR(50), IN `fk_tipopc_id` INT, IN `ficha_tecnica` VARCHAR(30))  BEGIN
INSERT INTO pc (pc_id, pc_nom, pc_desc, pc_mod, ficha_tecnica,fk_tipopc_id) VALUES(pc_id, pc_nom, pc_desc, pc_mod, ficha_tecnica,fk_tipopc_id);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GuardarUsuario` (IN `usu_num_doc` BIGINT, `usu_nom` VARCHAR(30), `usu_nom2` VARCHAR(30), `usu_ape` VARCHAR(30), `usu_ape2` VARCHAR(30), `usu_tel` INT, `usu_correo` VARCHAR(30), `usu_nac` DATE, `usu_contra` VARCHAR(20), `fk_rol_id` INT)  BEGIN
INSERT INTO usuario(usu_num_doc, usu_nom, usu_nom2, usu_ape, usu_ape2, usu_tel, usu_correo, usu_nac, usu_contra, fk_rol_id) VALUES (usu_num_doc, usu_nom, usu_nom2, usu_ape, usu_ape2, usu_tel, usu_correo, usu_nac, usu_contra, fk_rol_id);
END$$

DELIMITER ;

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
  `emp_nit` bigint(20) NOT NULL,
  `emp_nom` varchar(20) NOT NULL,
  `emp_dir` varchar(20) NOT NULL,
  `emp_desc` text NOT NULL,
  `emp_tel` int(11) NOT NULL,
  `emp_correo` varchar(20) NOT NULL,
  `emp_contra` varchar(20) NOT NULL,
  `fk_rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`emp_id`, `emp_nit`, `emp_nom`, `emp_dir`, `emp_desc`, `emp_tel`, `emp_correo`, `emp_contra`, `fk_rol_id`) VALUES
(3, 9909251364199, 'pccomponentes', 'cra 47 #47-05', 'empresa dedicada a vender electrodomesticos y demas', 2085072, 'pccomponentes@pc.com', '$2y$10$YYyZrrXAE8w7r', 1);

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
  `fil_nom` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fil_pc`
--

CREATE TABLE `fil_pc` (
  `fk_fil_id` int(11) NOT NULL,
  `fk_pc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `mar_nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`mar_id`, `mar_nombre`) VALUES
(1, 'Lenovo'),
(2, 'Alienware');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mar_pc`
--

CREATE TABLE `mar_pc` (
  `fk_mar_id` int(11) NOT NULL,
  `fk_pc_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mar_pc`
--

INSERT INTO `mar_pc` (`fk_mar_id`, `fk_pc_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mar_pie`
--

CREATE TABLE `mar_pie` (
  `fk_mar_id` int(11) NOT NULL,
  `fk_pi_cod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pc`
--

CREATE TABLE `pc` (
  `pc_id` int(11) NOT NULL,
  `pc_nom` varchar(50) NOT NULL,
  `pc_desc` text NOT NULL,
  `pc_mod` varchar(50) NOT NULL,
  `fk_tipopc_id` int(11) NOT NULL,
  `ficha_tecnica` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pc`
--

INSERT INTO `pc` (`pc_id`, `pc_nom`, `pc_desc`, `pc_mod`, `fk_tipopc_id`, `ficha_tecnica`) VALUES
(1, 'marta', 'marta', 'marta', 1, 'marta');

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
(1, 'admin'),
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
(4, 'netbook');

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
  `usu_nom` varchar(30) NOT NULL,
  `usu_nom2` varchar(30) DEFAULT NULL,
  `usu_ape` varchar(30) NOT NULL,
  `usu_ape2` varchar(30) DEFAULT NULL,
  `usu_tel` int(11) DEFAULT NULL,
  `usu_correo` varchar(30) NOT NULL,
  `usu_nac` date NOT NULL,
  `usu_contra` varchar(20) NOT NULL,
  `fk_rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usu_id`, `usu_num_doc`, `usu_nom`, `usu_nom2`, `usu_ape`, `usu_ape2`, `usu_tel`, `usu_correo`, `usu_nac`, `usu_contra`, `fk_rol_id`) VALUES
(26, 9909251364112, 'sergio', 'esteban', 'cifuentes', 'arango', 2085072, 'scifuentesarango@misena.edu.co', '1999-09-25', '$2y$10$HEIrDcxkqudhu', 2),
(29, 99092513641, 'sergio', 'esteban', 'cifuentes', 'arango', 2085072, 'scifuentesarango@misena.edu.co', '1999-09-25', '$2y$10$SecqbP6A4q5/i', 2);

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
  ADD PRIMARY KEY (`fil_id`);

--
-- Indices de la tabla `fil_pc`
--
ALTER TABLE `fil_pc`
  ADD KEY `fk_fil_id` (`fk_fil_id`),
  ADD KEY `fk_pc_id` (`fk_pc_id`);

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
  ADD PRIMARY KEY (`mar_id`);

--
-- Indices de la tabla `mar_pc`
--
ALTER TABLE `mar_pc`
  ADD KEY `fk_mar_id` (`fk_mar_id`),
  ADD KEY `fk_pc_id` (`fk_pc_id`);

--
-- Indices de la tabla `mar_pie`
--
ALTER TABLE `mar_pie`
  ADD KEY `fk_mar_id` (`fk_mar_id`),
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
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
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
  ADD CONSTRAINT `com_pc_ibfk_2` FOREIGN KEY (`fk_pc_id`) REFERENCES `pc` (`pc_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `com_pc_ibfk_3` FOREIGN KEY (`fk_usu_id`) REFERENCES `usuario` (`usu_id`) ON UPDATE CASCADE;

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
  ADD CONSTRAINT `emp_pc_ibfk_2` FOREIGN KEY (`fk_pc_id`) REFERENCES `pc` (`pc_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `emp_pc_ibfk_3` FOREIGN KEY (`fk_emp_id`) REFERENCES `empresa` (`emp_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `emp_pie`
--
ALTER TABLE `emp_pie`
  ADD CONSTRAINT `emp_pie_ibfk_2` FOREIGN KEY (`fk_pi_cod`) REFERENCES `piezas` (`pi_cod`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `emp_pie_ibfk_3` FOREIGN KEY (`fk_emp_id`) REFERENCES `empresa` (`emp_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fil_pc`
--
ALTER TABLE `fil_pc`
  ADD CONSTRAINT `fil_pc_ibfk_1` FOREIGN KEY (`fk_fil_id`) REFERENCES `filtros` (`fil_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fil_pc_ibfk_2` FOREIGN KEY (`fk_pc_id`) REFERENCES `pc` (`pc_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `gal_pc`
--
ALTER TABLE `gal_pc`
  ADD CONSTRAINT `gal_pc_ibfk_1` FOREIGN KEY (`fk_pc_id`) REFERENCES `pc` (`pc_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `gal_pc_ibfk_2` FOREIGN KEY (`fk_gal_id`) REFERENCES `galeria` (`gal_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `gal_pie`
--
ALTER TABLE `gal_pie`
  ADD CONSTRAINT `gal_pie_ibfk_1` FOREIGN KEY (`fk_gal_id`) REFERENCES `galeria` (`gal_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `gal_pie_ibfk_2` FOREIGN KEY (`fk_pi_cod`) REFERENCES `piezas` (`pi_cod`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `mar_pc`
--
ALTER TABLE `mar_pc`
  ADD CONSTRAINT `mar_pc_ibfk_2` FOREIGN KEY (`fk_pc_id`) REFERENCES `pc` (`pc_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `mar_pc_ibfk_3` FOREIGN KEY (`fk_mar_id`) REFERENCES `marca` (`mar_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `mar_pie`
--
ALTER TABLE `mar_pie`
  ADD CONSTRAINT `mar_pie_ibfk_1` FOREIGN KEY (`fk_pi_cod`) REFERENCES `piezas` (`pi_cod`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `mar_pie_ibfk_2` FOREIGN KEY (`fk_mar_id`) REFERENCES `marca` (`mar_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `pc`
--
ALTER TABLE `pc`
  ADD CONSTRAINT `pc_ibfk_1` FOREIGN KEY (`fk_tipopc_id`) REFERENCES `tipopc` (`tipopc_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `pc_inv`
--
ALTER TABLE `pc_inv`
  ADD CONSTRAINT `pc_inv_ibfk_1` FOREIGN KEY (`fk_pc_id`) REFERENCES `pc` (`pc_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `pc_inv_ibfk_2` FOREIGN KEY (`fk_inv_id`) REFERENCES `inventario` (`inv_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `pc_pie`
--
ALTER TABLE `pc_pie`
  ADD CONSTRAINT `pc_pie_ibfk_1` FOREIGN KEY (`fk_pc_id`) REFERENCES `pc` (`pc_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `pc_pie_ibfk_2` FOREIGN KEY (`fk_pi_cod`) REFERENCES `piezas` (`pi_cod`) ON DELETE NO ACTION ON UPDATE CASCADE;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
