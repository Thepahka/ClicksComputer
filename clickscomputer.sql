-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-05-2018 a las 04:50:48
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarCorEmp` (IN `correo` VARCHAR(100), `id` INT)  BEGIN
UPDATE empresa SET emp_correo = correo WHERE emp_id = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarDescEmp` (IN `descr` TEXT, `id` INT)  BEGIN
UPDATE empresa SET emp_desc = descr WHERE emp_id = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarDirEmp` (IN `dir` VARCHAR(100), IN `id` INT)  BEGIN
UPDATE empresa SET emp_dir = dir WHERE emp_id = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarInfo` (IN `nit` VARCHAR(100), IN `des` VARCHAR(100), IN `dir` VARCHAR(100), IN `cor` VARCHAR(100), IN `tel` INT, IN `contra` VARCHAR(200), IN `id` INT)  BEGIN
UPDATE empresa SET emp_nit = nit, emp_desc = des, emp_dir = dir, emp_correo = cor, emp_tel = tel, emp_contra = contra WHERE emp_id = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarMarcaEmpresa` (IN `nombre` VARCHAR(30), IN `marcaid` INT, IN `empresaid` INT)  BEGIN
UPDATE marca SET mar_nombre = nombre WHERE mar_id = marcaid AND fk_emp_id = empresaid;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarNitEmp` (IN `nit` VARCHAR(50), IN `id` INT)  BEGIN
UPDATE empresa SET emp_nit = nit WHERE emp_id = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarTelEmp` (IN `tel` INT, `id` INT)  BEGIN
UPDATE empresa SET emp_tel = tel WHERE emp_id = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CategoriasExistentes` ()  BEGIN
SELECT DISTINCT fil_id, fil_nom FROM filtros;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarCategoria` (IN `categoria` VARCHAR(30))  BEGIN
SELECT * FROM filtros WHERE categoria = fil_nom;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarCatEmp` (IN `cat` INT)  BEGIN
SELECT * FROM filtros INNER JOIN fil_emp ON fil_emp.fk_fil_id=filtros.fil_id INNER JOIN
empresa ON fil_emp.fk_emp_id=empresa.emp_id WHERE emp_id = cat;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarEmail` (IN `correo` VARCHAR(200))  BEGIN
SELECT usu_correo, usu_contra, fk_rol_id FROM usuario WHERE correo = usu_correo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarEmail2` (IN `correo` VARCHAR(100))  BEGIN 
SELECT emp_correo, emp_contra, fk_rol_id, emp_nom, emp_id, emp_nit FROM empresa WHERE correo = emp_correo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarEmail3` (IN `correo` VARCHAR(100))  NO SQL
BEGIN 
SELECT * FROM egg WHERE correo = egg_correo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarEmail4` (IN `nombre` VARCHAR(100))  NO SQL
BEGIN 
SELECT * FROM egg WHERE nombre = egg_nom;
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarFil` (IN `id` INT)  BEGIN
SELECT * FROM fil_emp INNER JOIN filtros ON filtros.fil_id=fil_emp.fk_fil_id WHERE fk_emp_id = id;
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarMar` (IN `id` INT)  NO SQL
BEGIN
SELECT * FROM mar_emp INNER JOIN marca ON marca.mar_id=mar_emp.fk_mar_id WHERE fk_emp_id = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarMarca` (IN `marca` VARCHAR(50))  BEGIN
SELECT * FROM marca WHERE marca = mar_nombre;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarMarEmp` (IN `mar` INT)  BEGIN
SELECT * FROM marca INNER JOIN mar_emp ON mar_emp.fk_mar_id=marca.mar_id INNER JOIN
empresa ON mar_emp.fk_emp_id=empresa.emp_id WHERE emp_id = mar;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarPc` (IN `id` INT, IN `id2` INT)  BEGIN
SELECT * FROM pc INNER JOIN empresa ON empresa.emp_id=pc.fk_emp_id INNER JOIN marca ON marca.mar_id=pc.fk_mar_id INNER JOIN tipopc ON tipopc.tipopc_id=pc.fk_tipopc_id INNER JOIN filtros ON filtros.fil_id=pc.fk_fil_id WHERE emp_id = id AND pc_id = id2;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarTienda` (IN `nombre` VARCHAR(20))  BEGIN
SELECT emp_nombre FROM empresa WHERE nombre = emp_nombre;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarTiendas` ()  BEGIN
SELECT * FROM empresa;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarTipo` (IN `tipo` VARCHAR(50))  BEGIN
SELECT * FROM tipopc WHERE tipopc_nom = tipo;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultPc` (IN `id` INT)  BEGIN
SELECT * FROM pc INNER JOIN empresa ON empresa.emp_id=pc.fk_emp_id INNER JOIN marca ON marca.mar_id=pc.fk_mar_id INNER JOIN tipopc ON tipopc.tipopc_id=pc.fk_tipopc_id INNER JOIN filtros ON filtros.fil_id=pc.fk_fil_id WHERE emp_id = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Contraseña` (IN `id` INT)  BEGIN
SELECT emp_contra FROM empresa WHERE emp_id = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Correo` (IN `id` INT)  BEGIN
SELECT emp_correo FROM empresa WHERE emp_id = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CosultarTipoEmp` ()  NO SQL
BEGIN
SELECT * FROM tipopc;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DeleteCategoriaEmpresa` (IN `id` INT, IN `id2` INT)  BEGIN
DELETE FROM fil_emp WHERE fk_fil_id = id AND fk_emp_id = id2;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DeleteMarcaEmpresa` (IN `id` INT, IN `id2` INT)  BEGIN
DELETE FROM mar_emp WHERE fk_mar_id = id AND fk_emp_id = id2;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Descripcion` (IN `id` INT)  BEGIN
SELECT emp_desc FROM empresa WHERE emp_id = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Direccion` (IN `id` INT)  BEGIN
SELECT emp_dir FROM empresa WHERE emp_id = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminarCategorias` (IN `id` INT, IN `id2` VARCHAR(255))  BEGIN
DELETE FROM fil_emp WHERE fk_emp_id = id AND fk_fil_id IN(id2);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminarMarcas` (IN `id` INT, IN `id2` INT)  NO SQL
BEGIN
DELETE FROM mar_emp WHERE fk_emp_id = id AND fk_mar_id IN(id2);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminarTodos` ()  BEGIN
  DELETE FROM cli_emp;
  DELETE FROM com_pc;
  DELETE FROM com_pie;
  DELETE FROM emp_pc;
  DELETE FROM emp_pie;
  DELETE FROM fil_emp;
  DELETE FROM gal_pc;
  DELETE FROM gal_pie;
  DELETE FROM pc_inv;
  DELETE FROM pc_pie;
  DELETE FROM pi_inv;
  DELETE FROM inventario;
  DELETE FROM galeria;
  DELETE FROM comentarios;
  DELETE FROM piezas;
  DELETE FROM usuario;
  DELETE FROM pc;
  DELETE FROM marca;
  DELETE FROM filtros;
  DELETE FROM empresa;
  DELETE FROM egg;
  DELETE FROM rol;
  DELETE FROM tipopieza;
  DELETE FROM tipopc;  
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GuardarCategoriaEmpresa` (IN `id` INT, IN `id2` INT)  BEGIN
INSERT INTO fil_emp(fk_fil_id, fk_emp_id) VALUES (id, id2);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GuardarEmpresa` (IN `emp_nit` VARCHAR(50), IN `emp_nom` VARCHAR(20), IN `emp_dir` VARCHAR(20), IN `emp_desc` TEXT, IN `emp_tel` INT, IN `emp_correo` VARCHAR(100), IN `emp_contra` VARCHAR(200), IN `fk_rol_id` INT)  BEGIN
INSERT INTO empresa(emp_nit, emp_nom, emp_dir, emp_desc, emp_tel, emp_correo, emp_contra, fk_rol_id) VALUES (emp_nit, emp_nom, emp_dir, emp_desc, emp_tel, emp_correo, emp_contra, fk_rol_id);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GuardarMarca` (IN `marca` VARCHAR(50))  BEGIN
INSERT INTO marca (mar_nombre) VALUES (marca);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GuardarMarcaEmpresa` (IN `id` INT, IN `id2` INT)  BEGIN
INSERT INTO mar_emp(fk_mar_id, fk_emp_id) VALUES (id, id2);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Guardarpc` (IN `cod` INT, `nom` VARCHAR(100), `des` TEXT, `mo` VARCHAR(50), `mar` INT, `tipo` INT, `fil` INT, `ficha` VARCHAR(100), `precio` INT, `img` VARCHAR(100), `id` INT)  BEGIN
INSERT INTO pc (pc_cod, pc_nom, pc_desc, pc_mod, fk_mar_id, fk_tipopc_id, fk_fil_id, ficha_tecnica, pc_precio, pc_img, fk_emp_id) VALUES (cod, nom, des, mo, mar, tipo, fil, ficha, precio, img, id);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GuardarUsuario` (IN `usu_num_doc` BIGINT, IN `usu_nom` VARCHAR(50), IN `usu_ape` VARCHAR(50), IN `usu_tel` INT, IN `usu_correo` VARCHAR(50), IN `usu_nac` DATE, IN `usu_contra` VARCHAR(100), IN `fk_rol_id` INT)  BEGIN
INSERT INTO usuario(usu_num_doc, usu_nom, usu_ape, usu_tel, usu_correo, usu_nac, usu_contra, fk_rol_id) VALUES (usu_num_doc, usu_nom, usu_ape, usu_tel, usu_correo, usu_nac, usu_contra, fk_rol_id);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `MarcasExistentes` ()  BEGIN
SELECT DISTINCT mar_id, mar_nombre FROM marca;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `NIT` (IN `id` INT)  BEGIN
SELECT emp_nit FROM empresa WHERE emp_id = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Nombre` (IN `id` INT)  BEGIN
SELECT emp_nom FROM empresa WHERE emp_id = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Telefono` (IN `id` INT)  BEGIN
SELECT emp_tel FROM empresa WHERE emp_id = id;
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
-- Estructura de tabla para la tabla `egg`
--

CREATE TABLE `egg` (
  `egg_id` int(11) NOT NULL,
  `egg_nom` varchar(50) NOT NULL,
  `egg_correo` varchar(100) NOT NULL,
  `egg_contra` text,
  `egg_contra2` text NOT NULL,
  `fk_rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `egg`
--

INSERT INTO `egg` (`egg_id`, `egg_nom`, `egg_correo`, `egg_contra`, `egg_contra2`, `fk_rol_id`) VALUES
(1, 'clickscomputeregg', 'clicks-4743@egg.com', '$2y$10$K/moSCxiBST9IWaQrCqbi.yLJIkXMmfqrxcQVPFwLPLmTxkAZuHNO', '$2y$10$cNGGZ46T2ZqiOn7lGAqdQuQ6K7UOnJQC2CStrRt65taCVQqeRVXFO', 4444);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `emp_id` int(11) NOT NULL,
  `emp_nit` varchar(100) NOT NULL,
  `emp_nom` varchar(20) NOT NULL,
  `emp_dir` varchar(100) NOT NULL,
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
(6, '123123-4', 'pccomponentes', '', '', 0, 'pccomponentes@pc.com', '$2y$10$NVmYmMotrVnqEWolXLfLeOKGdxkAbskLpOLwfrNq5TLv8Wgm4u8fO', 1),
(7, '1', 'Alienware Inc', 'b', 'a', 2, 'alienware@gmail.com', '$2y$10$ITUa25KH0eebR2z6UmYeueK9caUQI7MyoM/L2myJyUmIXGBy/8Gp6', 1),
(9, '1', 'bambu corp', 'b', 'a', 2, 'bambu@bambu.com', '$2y$10$DiiS3mnIGre7E.ZLmOR/sebdiwwSumhNGOHQFmbdYdUCh8ouqeORe', 1);

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
  `fk_pi_cod` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `filtros`
--

INSERT INTO `filtros` (`fil_id`, `fil_nom`, `fk_pc_id`, `fk_pi_cod`) VALUES
(14, 'oficina', NULL, NULL),
(15, 'oficina2', NULL, NULL),
(16, 'oficina3', NULL, NULL),
(17, 'oficina4', NULL, NULL),
(18, 'oficina5', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fil_emp`
--

CREATE TABLE `fil_emp` (
  `fk_fil_id` int(11) NOT NULL,
  `fk_emp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fil_emp`
--

INSERT INTO `fil_emp` (`fk_fil_id`, `fk_emp_id`) VALUES
(14, 6),
(14, 6);

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
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `mar_id` int(11) NOT NULL,
  `mar_nombre` varchar(30) NOT NULL,
  `fk_pc_id` int(11) DEFAULT NULL,
  `fk_pi_cod` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`mar_id`, `mar_nombre`, `fk_pc_id`, `fk_pi_cod`) VALUES
(1, 'lenovo', NULL, NULL),
(2, 'msi', NULL, NULL),
(4, 'everex', NULL, NULL),
(5, 'simpletch', NULL, NULL),
(6, 'apple', NULL, NULL),
(7, 'hp', NULL, NULL),
(8, 'samsung', NULL, NULL),
(9, 'dell', NULL, NULL),
(10, 'acer', NULL, NULL),
(11, 'toshiba', NULL, NULL),
(12, 'lenovo', NULL, NULL),
(13, 'asus', NULL, NULL),
(14, 'vaio', NULL, NULL),
(15, 'sony', NULL, NULL),
(16, 'lg', NULL, NULL),
(17, 'alienware', NULL, NULL),
(18, 'compaq', NULL, NULL),
(19, 'panasonic', NULL, NULL),
(20, 'ibm', NULL, NULL),
(21, 'lanix', NULL, NULL),
(22, 'olivetti', NULL, NULL),
(23, 'gateway', NULL, NULL),
(24, 'systemax', NULL, NULL),
(25, 'fujitsu', NULL, NULL),
(26, 'microsoft', NULL, NULL),
(27, 'averatec', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mar_emp`
--

CREATE TABLE `mar_emp` (
  `fk_mar_id` int(11) NOT NULL,
  `fk_emp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mar_emp`
--

INSERT INTO `mar_emp` (`fk_mar_id`, `fk_emp_id`) VALUES
(1, 6),
(2, 6);

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
  `fk_mar_id` int(11) NOT NULL,
  `fk_tipopc_id` int(11) NOT NULL,
  `fk_fil_id` int(11) NOT NULL,
  `ficha_tecnica` varchar(50) NOT NULL,
  `pc_precio` double NOT NULL,
  `pc_img` text NOT NULL,
  `fk_emp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pc`
--

INSERT INTO `pc` (`pc_id`, `pc_cod`, `pc_nom`, `pc_desc`, `pc_mod`, `fk_mar_id`, `fk_tipopc_id`, `fk_fil_id`, `ficha_tecnica`, `pc_precio`, `pc_img`, `fk_emp_id`) VALUES
(11, 1355155, 'pc ', 'pc de uso frecuente', 'x553m3', 2, 3, 16, 'ejemplo.pdf', 1500000, 'ejemplo.jpg', 6),
(12, 987654321, 'pc master reis', 'pal maincra', 'tt45x3', 1, 1, 15, 'iso.pdf', 35000000, 'prueba2.jpg', 6),
(18, 121, 'pc master reis 2', 'pc master reis 3', 'xxxxxxx', 1, 1, 14, 'eliminar.txt', 13000000, 'master reis 2.jpg', 6),
(19, 121212, 'pc pug', 'pici para juegar al pugbgb', '1212bb', 2, 3, 14, 'ejemplo3.pdf', 3500000, 'pug.jpg', 6);

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
(2, 'usuario'),
(4444, 'egg');

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
  `usu_nom` varchar(50) NOT NULL,
  `usu_correo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indices de la tabla `egg`
--
ALTER TABLE `egg`
  ADD PRIMARY KEY (`egg_id`),
  ADD KEY `fk_rol_id` (`fk_rol_id`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `fk_rol_id` (`fk_rol_id`);

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
  ADD KEY `fk_pi_cod` (`fk_pi_cod`);

--
-- Indices de la tabla `fil_emp`
--
ALTER TABLE `fil_emp`
  ADD KEY `fk_fil_id` (`fk_fil_id`),
  ADD KEY `fk_emp_id` (`fk_emp_id`);

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
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`mar_id`),
  ADD KEY `fk_pc_id` (`fk_pc_id`),
  ADD KEY `fk_pi_cod` (`fk_pi_cod`);

--
-- Indices de la tabla `mar_emp`
--
ALTER TABLE `mar_emp`
  ADD KEY `fk_mar_id` (`fk_mar_id`),
  ADD KEY `fk_emp_id` (`fk_emp_id`);

--
-- Indices de la tabla `pc`
--
ALTER TABLE `pc`
  ADD PRIMARY KEY (`pc_id`),
  ADD KEY `fk_tipopc_id` (`fk_tipopc_id`),
  ADD KEY `fk_emp_id` (`fk_emp_id`),
  ADD KEY `fk_mar_id` (`fk_mar_id`),
  ADD KEY `fk_fil_id` (`fk_fil_id`);

--
-- Indices de la tabla `piezas`
--
ALTER TABLE `piezas`
  ADD PRIMARY KEY (`pi_cod`),
  ADD KEY `fk_tipo_id` (`fk_tipo_id`);

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
  ADD PRIMARY KEY (`usu_id`);

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
-- AUTO_INCREMENT de la tabla `egg`
--
ALTER TABLE `egg`
  MODIFY `egg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `filtros`
--
ALTER TABLE `filtros`
  MODIFY `fil_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `mar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `pc`
--
ALTER TABLE `pc`
  MODIFY `pc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `tipopc`
--
ALTER TABLE `tipopc`
  MODIFY `tipopc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
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
-- Filtros para la tabla `egg`
--
ALTER TABLE `egg`
  ADD CONSTRAINT `egg_ibfk_1` FOREIGN KEY (`fk_rol_id`) REFERENCES `rol` (`rol_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD CONSTRAINT `empresa_ibfk_1` FOREIGN KEY (`fk_rol_id`) REFERENCES `rol` (`rol_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

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
  ADD CONSTRAINT `filtros_ibfk_3` FOREIGN KEY (`fk_pi_cod`) REFERENCES `piezas` (`pi_cod`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `fil_emp`
--
ALTER TABLE `fil_emp`
  ADD CONSTRAINT `fil_emp_ibfk_1` FOREIGN KEY (`fk_emp_id`) REFERENCES `empresa` (`emp_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fil_emp_ibfk_2` FOREIGN KEY (`fk_fil_id`) REFERENCES `filtros` (`fil_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

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
  ADD CONSTRAINT `marca_ibfk_3` FOREIGN KEY (`fk_pi_cod`) REFERENCES `piezas` (`pi_cod`);

--
-- Filtros para la tabla `mar_emp`
--
ALTER TABLE `mar_emp`
  ADD CONSTRAINT `mar_emp_ibfk_1` FOREIGN KEY (`fk_mar_id`) REFERENCES `marca` (`mar_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `mar_emp_ibfk_2` FOREIGN KEY (`fk_emp_id`) REFERENCES `empresa` (`emp_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `pc`
--
ALTER TABLE `pc`
  ADD CONSTRAINT `pc_ibfk_1` FOREIGN KEY (`fk_tipopc_id`) REFERENCES `tipopc` (`tipopc_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `pc_ibfk_2` FOREIGN KEY (`fk_emp_id`) REFERENCES `empresa` (`emp_id`),
  ADD CONSTRAINT `pc_ibfk_3` FOREIGN KEY (`fk_mar_id`) REFERENCES `marca` (`mar_id`),
  ADD CONSTRAINT `pc_ibfk_4` FOREIGN KEY (`fk_fil_id`) REFERENCES `filtros` (`fil_id`);

--
-- Filtros para la tabla `piezas`
--
ALTER TABLE `piezas`
  ADD CONSTRAINT `piezas_ibfk_1` FOREIGN KEY (`fk_tipo_id`) REFERENCES `tipopieza` (`tipo_id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
