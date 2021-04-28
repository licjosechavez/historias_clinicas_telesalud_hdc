-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 07-04-2021 a las 19:14:02
-- Versión del servidor: 5.7.31-0ubuntu0.18.04.1
-- Versión de PHP: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ts_hclinicas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `int_cl_medica`
--

CREATE TABLE `int_cl_medica` (
  `id_int_cl_medica` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `estado_clinico_actual` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `medicacion` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `estudios_realizados` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `consulta_medica_breve` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `requiere_interconsulta` varchar(2) COLLATE utf8_spanish2_ci NOT NULL,
  `consignar_especialidad` varchar(2) COLLATE utf8_spanish2_ci NOT NULL,
  `requiere_laboratorio` varchar(2) COLLATE utf8_spanish2_ci NOT NULL,
  `consignar_laboratorio` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `requiere_consulta_posterior` varchar(2) COLLATE utf8_spanish2_ci NOT NULL,
  `seguimiento` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_intervencion_cl_medica` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `int_cl_medica`
--

INSERT INTO `int_cl_medica` (`id_int_cl_medica`, `id_paciente`, `estado_clinico_actual`, `medicacion`, `estudios_realizados`, `consulta_medica_breve`, `requiere_interconsulta`, `consignar_especialidad`, `requiere_laboratorio`, `consignar_laboratorio`, `requiere_consulta_posterior`, `seguimiento`, `fecha_intervencion_cl_medica`) VALUES
(1, 25, 'fgfgh', 'fghfghfgh', 'fghfgh', 'fghfgh', 'Si', 'Si', 'Si', 'hgjghj', 'Si', '', '2021-04-07 19:53:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id_paciente` int(11) NOT NULL,
  `dni` int(11) NOT NULL,
  `apellido` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `tel_cel` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `direccion` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `edad` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `obra_social` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ocupacion` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecha_alta` date NOT NULL,
  `disp_horaria` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estuvo_internado` varchar(2) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `bajo_seguimiento` varchar(2) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `bajo_seguimiento_profesional` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `sintomatologia` varchar(2) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `consignar_sintomatologia` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `bajo_control` varchar(2) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `bajo_control_profesional` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `medicacion` varchar(2) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `consignar_medicacion` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `familiar_covid` varchar(2) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `movilidad` varchar(2) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estado` varchar(1) COLLATE utf8_spanish2_ci DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id_paciente`, `dni`, `apellido`, `nombre`, `tel_cel`, `email`, `direccion`, `edad`, `obra_social`, `ocupacion`, `fecha_alta`, `disp_horaria`, `estuvo_internado`, `bajo_seguimiento`, `bajo_seguimiento_profesional`, `sintomatologia`, `consignar_sintomatologia`, `bajo_control`, `bajo_control_profesional`, `medicacion`, `consignar_medicacion`, `familiar_covid`, `movilidad`, `estado`) VALUES
(23, 30920125, 'Chavez', 'Martin', '380465', 'ms_chavez@hotmail.com', 'Santa Fe 1256', '38', 'SANCOR', 'Lic. en Bioimagenes', '2020-03-11', 'viernes a las 18 hs', 'Si', '', '', '', '', 'No', '', '', '', '', '', 'A'),
(24, 33654987, 'FONZALIDA', 'MATEO SALVADOR', '380465987', 'MATEO@GMAIL.COM', 'Esperanza s/n', '7', 'APOS', 'ESTUDIANTE', '2020-04-24', 'lun a vie 13 a 18', 'No', 'No', 'DR. CAMPOS', 'Si', 'SintomatologÃ­a...ALGUNA ...', 'Si', 'DR. PARCO PARISI', 'No', 'MEDICACION INGRESADA', 'Si', 'No', 'A'),
(25, 30920242, 'CHAVEZ AGUILAR', 'JOSE ANTONIO', '3821400010', 't10_chavez@gmail.com', 'Esperanza s/nZ', '36', 'APOS', 'LIC. EN SISTEMAS ', '2021-04-06', 'lun a vie 13 a 19', 'Si', 'Si', 'DR. CARLOS OLIVERA', 'Si', 'FIEBRE, DOLOR DE CABEZA', 'Si', 'DR. CARLOS LLANOS', 'Si', 'IVERMECTIna plus', 'Si', 'Si', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre_apellido` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `username` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_apellido`, `username`, `password`) VALUES
(1, 'José Chavez', 'jchavez', 'jchavez');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `int_cl_medica`
--
ALTER TABLE `int_cl_medica`
  ADD PRIMARY KEY (`id_int_cl_medica`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id_paciente`),
  ADD UNIQUE KEY `dni` (`dni`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `int_cl_medica`
--
ALTER TABLE `int_cl_medica`
  MODIFY `id_int_cl_medica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `int_cl_medica`
--
ALTER TABLE `int_cl_medica`
  ADD CONSTRAINT `int_cl_medica_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
