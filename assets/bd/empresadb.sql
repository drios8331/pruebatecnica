-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-01-2024 a las 17:53:25
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `empresadb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblconceptos`
--

CREATE TABLE `tblconceptos` (
  `idConcepto` tinyint(2) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tblconceptos`
--

INSERT INTO `tblconceptos` (`idConcepto`, `nombre`, `estado`) VALUES
(1, 'Salario', 1),
(2, 'Arriendo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbldepartamentos`
--

CREATE TABLE `tbldepartamentos` (
  `idDepartamento` tinyint(2) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbldepartamentos`
--

INSERT INTO `tbldepartamentos` (`idDepartamento`, `nombre`, `estado`) VALUES
(12, 'TI', 0),
(13, 'Administrativo', 0),
(14, 'Operaciones', 0),
(15, 'Contabilidad', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblempleados`
--

CREATE TABLE `tblempleados` (
  `idEmpleados` int(45) NOT NULL,
  `documento` int(11) NOT NULL,
  `nombres` varchar(40) NOT NULL,
  `apellidos` varchar(40) NOT NULL,
  `edad` int(2) NOT NULL,
  `fechaDeIngreso` date NOT NULL,
  `salario` int(10) NOT NULL,
  `comentarios` varchar(200) NOT NULL,
  `genero_id` tinyint(1) NOT NULL,
  `departamento_id` tinyint(2) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblgastos`
--

CREATE TABLE `tblgastos` (
  `idGastos` int(45) NOT NULL,
  `año` int(4) NOT NULL,
  `mes` int(2) NOT NULL,
  `ingresos` bigint(20) NOT NULL,
  `gastos` bigint(20) NOT NULL,
  `departamento_id` tinyint(2) NOT NULL,
  `idConcepto` tinyint(2) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblgeneros`
--

CREATE TABLE `tblgeneros` (
  `idGenero` tinyint(1) NOT NULL,
  `nombre` varchar(10) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tblgeneros`
--

INSERT INTO `tblgeneros` (`idGenero`, `nombre`, `estado`) VALUES
(12, 'Masculino', 0),
(13, 'Femenino', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tblconceptos`
--
ALTER TABLE `tblconceptos`
  ADD PRIMARY KEY (`idConcepto`);

--
-- Indices de la tabla `tbldepartamentos`
--
ALTER TABLE `tbldepartamentos`
  ADD PRIMARY KEY (`idDepartamento`);

--
-- Indices de la tabla `tblempleados`
--
ALTER TABLE `tblempleados`
  ADD PRIMARY KEY (`idEmpleados`),
  ADD KEY `genero_id` (`genero_id`),
  ADD KEY `departamento_id` (`departamento_id`);

--
-- Indices de la tabla `tblgastos`
--
ALTER TABLE `tblgastos`
  ADD PRIMARY KEY (`idGastos`),
  ADD KEY `departamento_id` (`departamento_id`),
  ADD KEY `idConcepto` (`idConcepto`);

--
-- Indices de la tabla `tblgeneros`
--
ALTER TABLE `tblgeneros`
  ADD PRIMARY KEY (`idGenero`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tblconceptos`
--
ALTER TABLE `tblconceptos`
  MODIFY `idConcepto` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbldepartamentos`
--
ALTER TABLE `tbldepartamentos`
  MODIFY `idDepartamento` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tblempleados`
--
ALTER TABLE `tblempleados`
  MODIFY `idEmpleados` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tblgastos`
--
ALTER TABLE `tblgastos`
  MODIFY `idGastos` int(45) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblgeneros`
--
ALTER TABLE `tblgeneros`
  MODIFY `idGenero` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tblempleados`
--
ALTER TABLE `tblempleados`
  ADD CONSTRAINT `tblempleados_ibfk_1` FOREIGN KEY (`genero_id`) REFERENCES `tblgeneros` (`idGenero`),
  ADD CONSTRAINT `tblempleados_ibfk_2` FOREIGN KEY (`departamento_id`) REFERENCES `tbldepartamentos` (`idDepartamento`);

--
-- Filtros para la tabla `tblgastos`
--
ALTER TABLE `tblgastos`
  ADD CONSTRAINT `tblgastos_ibfk_1` FOREIGN KEY (`departamento_id`) REFERENCES `tbldepartamentos` (`idDepartamento`),
  ADD CONSTRAINT `tblgastos_ibfk_2` FOREIGN KEY (`idConcepto`) REFERENCES `tblconceptos` (`idConcepto`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
