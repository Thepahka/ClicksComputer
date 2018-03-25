-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-03-2018 a las 20:32:54
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarMarcaEmpresa` (IN `nombre` VARCHAR(30), IN `marcaid` INT, IN `empresaid` INT)  BEGIN
UPDATE marca SET mar_nombre = nombre WHERE mar_id = marcaid AND fk_emp_id = empresaid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarCategoria` (IN `categoria` VARCHAR(30))  BEGIN
SELECT * FROM filtros WHERE categoria = fil_nom;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarCatEmp` (IN `cat` INT)  BEGIN
SELECT * FROM filtros INNER JOIN empresa ON filtros.fk_emp_id=empresa.emp_id WHERE emp_id = cat;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarEmail` (IN `correo` VARCHAR(200))  BEGIN
SELECT usu_correo, usu_contra, fk_rol_id FROM usuario WHERE correo = usu_correo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarEmail2` (IN `correo` VARCHAR(100))  BEGIN 
SELECT emp_correo, emp_contra, fk_rol_id, emp_nom, emp_id FROM empresa WHERE correo = emp_correo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarEmpEmail` (IN `correo` VARCHAR(200))  BEGIN
SELECT emp_correo FROM empresa WHERE correo = emp_correo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarEmpEmail2` (IN `correo` VARCHAR(100))  BEGIN
SELECT usu_correo FROM usuario WHERE correo = usu_correo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarEmpId` (IN `nit` BIGINT)  BEGIN
SELECT emp_nit FROM empresa WHERE nit = emp_nit;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarEmpId2` (IN `id` BIGINT)  BEGIN
SELECT usu_num_doc FROM usuario WHERE id = usu_num_doc;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarId` (IN `documento` BIGINT(30))  BEGIN
SELECT usu_num_doc FROM usuario WHERE documento = usu_num_doc;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarId2` (IN `id` BIGINT)  BEGIN
SELECT emp_nit FROM empresa WHERE id = emp_nit;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarIdEmpresa` (IN `empresa` VARCHAR(50))  BEGIN
SELECT emp_id FROM empresa WHERE emp_correo = empresa;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarMarca` (IN `marca` VARCHAR(50))  BEGIN
SELECT * FROM marca WHERE marca = mar_nombre;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarMarEmp` (IN `mar` INT)  BEGIN
SELECT * FROM marca INNER JOIN empresa ON marca.fk_emp_id=empresa.emp_id WHERE emp_id = mar;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarPc` (IN `computador` VARCHAR(30))  BEGIN 
SELECT * FROM pc WHERE computador = pc_cod;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarTienda` (IN `nombre` VARCHAR(20))  BEGIN
SELECT emp_nombre FROM empresa WHERE nombre = emp_nombre;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarTipo` (IN `tipo` VARCHAR(50))  BEGIN
SELECT * FROM tipopc WHERE tipopc_nom = tipo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DeleteCategoriaEmpresa` (IN `categoriaid` INT, `empid` INT)  BEGIN
DELETE FROM filtros WHERE fil_id = categoriaid AND fk_emp_id = empid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DeleteMarcaEmpresa` (IN `marcaid` INT, `empid` INT)  BEGIN 
DELETE FROM marca WHERE mar_id = marcaid AND fk_emp_id = empid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GuardarCategoriaEmpresa` (IN `nombre` VARCHAR(30), IN `emp_id` INT)  BEGIN
INSERT INTO filtros(fil_nom, fk_pc_id, fk_emp_id, fk_pi_cod) VALUES (nombre, NULL, emp_id, NULL);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GuardarEmpresa` (IN `emp_nit` BIGINT, IN `emp_nom` VARCHAR(20), IN `emp_dir` VARCHAR(20), IN `emp_desc` TEXT, IN `emp_tel` INT, IN `emp_correo` VARCHAR(100), IN `emp_contra` VARCHAR(200), IN `fk_rol_id` INT)  BEGIN
INSERT INTO empresa(emp_nit, emp_nom, emp_dir, emp_desc, emp_tel, emp_correo, emp_contra, fk_rol_id) VALUES (emp_nit, emp_nom, emp_dir, emp_desc, emp_tel, emp_correo, emp_contra, fk_rol_id);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GuardarMarca` (IN `marca` VARCHAR(50))  BEGIN
INSERT INTO marca (mar_nombre) VALUES (marca);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GuardarMarcaEmpresa` (IN `nombre` VARCHAR(30), IN `emp_id` INT)  BEGIN
INSERT INTO marca(mar_nombre, fk_pc_id, fk_emp_id, fk_pi_cod) VALUES (nombre, NULL, emp_id, NULL);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Guardarpc` (IN `pc_cod` BIGINT, IN `pc_nom` VARCHAR(30), IN `pc_desc` TEXT, IN `pc_mod` VARCHAR(50), IN `fk_tipopc_id` INT, IN `ficha_tecnica` VARCHAR(30), IN `pc_precio` BIGINT)  BEGIN
INSERT INTO pc (pc_cod, pc_nom, pc_desc, pc_mod, ficha_tecnica,fk_tipopc_id, pc_precio) VALUES(pc_cod, pc_nom, pc_desc, pc_mod, ficha_tecnica,fk_tipopc_id, pc_precio);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GuardarUsuario` (IN `usu_num_doc` BIGINT, IN `usu_nom` VARCHAR(50), IN `usu_ape` VARCHAR(50), IN `usu_tel` INT, IN `usu_correo` VARCHAR(50), IN `usu_nac` DATE, IN `usu_contra` VARCHAR(100), IN `fk_rol_id` INT)  BEGIN
INSERT INTO usuario(usu_num_doc, usu_nom, usu_ape, usu_tel, usu_correo, usu_nac, usu_contra, fk_rol_id) VALUES (usu_num_doc, usu_nom, usu_ape, usu_tel, usu_correo, usu_nac, usu_contra, fk_rol_id);
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
  `emp_correo` varchar(50) NOT NULL,
  `emp_contra` varchar(200) NOT NULL,
  `fk_rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`emp_id`, `emp_nit`, `emp_nom`, `emp_dir`, `emp_desc`, `emp_tel`, `emp_correo`, `emp_contra`, `fk_rol_id`) VALUES
(6, 123456789, 'pccomponentes', 'cra 47 #47-05', 'empresa dedicada a vender pc\'s y demas electrdomesticos', 2085072, 'pccomponentes@pc.com', '$2y$10$rHicc76sKBezaPc/dvraTO51CPmdqEHA379LYLGamfBKy4AWiIwD.', 1),
(7, 987654321, 'Alienware Inc', 'cra 32 #09', 'empresa vendedora de pc\'s gamer de alto rendimiento', 2085072, 'adminalien@alienware.com', '$2y$10$ITUa25KH0eebR2z6UmYeueK9caUQI7MyoM/L2myJyUmIXGBy/8Gp6', 1),
(9, 1036687877, 'bambu corp', 'cra bambu # bambu', 'empresa dedicada a todo lo que tiene que ver con bambú', 1234567, 'bambu@bambu.com', '$2y$10$DiiS3mnIGre7E.ZLmOR/sebdiwwSumhNGOHQFmbdYdUCh8ouqeORe', 1);

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
(8, 0, '333', '333', 333333333, '1@2.com', '2018-09-06', '$2y$10$u6ufWLBHXKhIkGflfw6jleurPeTLHy.Lo8s43xsY8Qa9ReJhB0Mf6', 2);

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
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `filtros`
--
ALTER TABLE `filtros`
  MODIFY `fil_id` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
