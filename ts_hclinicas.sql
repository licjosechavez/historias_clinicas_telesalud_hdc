-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 29-04-2021 a las 08:37:47
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
-- Estructura de tabla para la tabla `int_cardiologica`
--

CREATE TABLE `int_cardiologica` (
  `id_int_cardiologica` int(11) NOT NULL,
  `id_int_cl_medica` int(11) NOT NULL,
  `motivo_consulta_car` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `app_car` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `bajo_control_medico_car` varchar(2) COLLATE utf8_spanish2_ci NOT NULL,
  `medico_cabecera_car` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `estudios_complementarios` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `conducta_seguir` varchar(300) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `int_cl_medica`
--

CREATE TABLE `int_cl_medica` (
  `id_int_cl_medica` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL,
  `estado_clinico_actual` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `medicacion_cl_medica` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `estudios_realizados` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `consulta_medica_breve` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `requiere_interconsulta` varchar(2) COLLATE utf8_spanish2_ci NOT NULL,
  `consignar_especialidad` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `requiere_laboratorio` varchar(2) COLLATE utf8_spanish2_ci NOT NULL,
  `consignar_laboratorio` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `requiere_consulta_posterior` varchar(2) COLLATE utf8_spanish2_ci NOT NULL,
  `seguimiento` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_intervencion_cl_medica` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `int_cl_medica`
--

INSERT INTO `int_cl_medica` (`id_int_cl_medica`, `id_paciente`, `estado_clinico_actual`, `medicacion_cl_medica`, `estudios_realizados`, `consulta_medica_breve`, `requiere_interconsulta`, `consignar_especialidad`, `requiere_laboratorio`, `consignar_laboratorio`, `requiere_consulta_posterior`, `seguimiento`, `fecha_intervencion_cl_medica`) VALUES
(96, 34, 'estad', 'medic', 'estu', 'cons brev', 'Si', 'PSICOLOGICA', 'Si', 'labo', 'Si', 'segui', '2021-04-17 13:54:57'),
(97, 33, '', '', '', '', 'Si', 'PSICOLOGICA', 'Si', '', 'Si', '', '2021-04-17 14:06:42'),
(99, 35, 'ni', 'ini', 'ni', 'ni', 'Si', 'PSICOLOGICA', 'Si', 'nini', 'No', 'nini', '2021-04-20 14:20:37'),
(102, 34, 'ppppppp', 'ppppppp', 'pppppppp', 'ppppppppp', 'Si', 'PSICOLOGICA', 'Si', 'pppppp', 'No', 'ppppppppp', '2021-04-19 10:48:19'),
(103, 34, '', '', '', 'sdf', 'Si', 'PSICOLOGICA', 'Si', 'sdf', 'Si', 'sdf', '2021-04-19 10:53:05'),
(105, 33, 'gdf', 'dfg', 'dfg', 'dfg', 'No', '', 'No', '', 'No', 'dfg', '2021-04-19 11:36:00'),
(106, 36, 'el paciente tatat', 'toma ever', 'ser hizo tal estudio', 'bre ve desc', 'Si', 'PSICOLOGICA', 'No', '', 'Si', 'se hara seg slsds s sd sd ', '2021-04-20 15:41:39'),
(107, 24, 'xcv', 'xcv', 'xcv', 'xcv', 'Si', 'PSICOLOGICA', 'No', '', 'Si', 'xcv', '2021-04-20 15:59:00'),
(108, 28, 'mm', 'm', 'mmmmm', 'mmmmm', 'Si', 'PSICOLOGICA', 'Si', 'mmmm', 'Si', 'mmmmmmmm', '2021-04-20 16:17:33'),
(109, 37, 'qqqqqq', 'qqqqq', 'qqqqqqqq', 'qqqqqqqqqqqq', 'Si', 'PSICOLOGICA', 'No', '', 'Si', 'qqqqqqqqq', '2021-04-20 16:20:03'),
(110, 37, 'EEEEE', 'EEEEE', 'EEE', 'EEE', 'Si', 'PSICOLOGICA', 'No', '', 'Si', 'SEEEE', '2021-04-20 16:31:55'),
(111, 38, 'FFFFFF', 'FFFFFFFFFF F', 'FFFFFFFFF', 'FFFFFFFFFFFFFF', 'No', 'PSICOLOGICA', 'Si', 'FFFFFFF', 'No', 'FFFFFFFFFFFFFF', '2021-04-21 00:18:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `int_psicologica`
--

CREATE TABLE `int_psicologica` (
  `id_int_psicologica` int(11) NOT NULL,
  `id_int_cl_medica` int(11) NOT NULL,
  `sintomatologia_ps` varchar(2) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `modalidad_ps` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `grupo_familiar` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `requiere_interconsulta_ps` varchar(2) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `consignar_especialidad_ps` varchar(200) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `requiere_art_institucion` varchar(2) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `consignar_institucion` varchar(150) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `breve_resenia_int_ps` varchar(300) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `seguimiento_ps` varchar(300) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecha_int_ps` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` varchar(20) COLLATE utf8_spanish2_ci DEFAULT 'NA'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `int_psicologica`
--

INSERT INTO `int_psicologica` (`id_int_psicologica`, `id_int_cl_medica`, `sintomatologia_ps`, `modalidad_ps`, `grupo_familiar`, `requiere_interconsulta_ps`, `consignar_especialidad_ps`, `requiere_art_institucion`, `consignar_institucion`, `breve_resenia_int_ps`, `seguimiento_ps`, `fecha_int_ps`, `estado`) VALUES
(8, 96, 'Si', 'LLAMADO TELEFONICO', 'asd ', 'Si', 'psiq', 'Si', 'assda', 'asd ', 'asd ', '2020-03-06 03:00:00', 'A'),
(9, 97, 'Si', 'PRESENCIAL', 'sdf', 'Si', 'sdf', 'Si', '', 'df', 'sdfsdf', '2020-03-01 03:00:00', 'A'),
(10, 97, 'Si', 'PRESENCIAL', 'sdf', 'Si', 'sdf', 'Si', '', 'df', 'sdfsdf', '2020-03-01 03:00:00', 'A'),
(11, 99, 'Si', 'VIDEOLLAMADA', 'asd', 'No', '', 'Si', 'asasd', 'asd', 'asdasd', '2020-03-18 03:00:00', 'A'),
(13, 102, 'Si', 'VIDEOLLAMADA', 'mmmm', 'Si', 'mmm', 'No', '', 'mmmmmmmmm', 'mmmmmmmmm', '2020-03-20 03:00:00', 'A'),
(15, 106, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-20 15:59:00', 'NA'),
(16, 108, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-20 16:17:33', 'NA'),
(17, 109, 'Si', 'PRESENCIAL', 'adad as dasd ', 'No', '', 'Si', 'instituto tal', 'asd asd ', 'as dasd a d', '2021-04-20 03:00:00', 'A'),
(18, 110, 'Si', 'PRESENCIAL', 'FDFDF', 'Si', 'FFGFGFG', 'Si', 'INSTITUT', 'FGFG', 'FGFG', '2020-03-11 03:00:00', 'A'),
(19, 111, 'Si', 'VIDEOLLAMADA', 'fffff f f f ', 'Si', 'fff f f', 'Si', 'ffff', ' f f f f f', 'f f f f f f', '2020-03-11 03:00:00', 'A');

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
(25, 30920242, 'CHAVEZ AGUILAR', 'JOSE ANTONIO', '3821400010', 't10_chavez@gmail.com', 'Esperanza s/nZ', '36', 'APOS', 'LIC. EN SISTEMAS ', '2021-04-06', 'lun a vie 13 a 19', 'Si', 'Si', 'DR. CARLOS OLIVERA', 'Si', 'FIEBRE, DOLOR DE CABEZA', 'Si', 'DR. CARLOS LLANOS', 'Si', 'IVERMECTIna plus', 'Si', 'Si', 'A'),
(26, 299787, 'MONTIEL', 'LUCAS', '654321', 'G@GMAIL.COM', 'LAPRIDA 156', '25', 'SUMAR', 'ETUDIANTES ', '2020-03-28', 'MARTES POR LA TARDE', 'Si', 'Si', 'OMAR PARADA', 'No', '', 'Si', 'DR. CARLOS OLIVERA', 'Si', 'IVERMICINA 400 MG', 'No', 'Si', 'A'),
(27, 29971921, 'VERA', 'LUIS', '38046587', 'luks@gmial.com', 'ASDAS', '37', 'APOS', 'LIC. EN SISTEMAS', '2020-03-19', 'ASDASD', 'Si', 'Si', 'DR. CAMPOS', 'No', '', 'Si', 'DR. CARLOS LLANOS', 'No', '', 'Si', 'No', 'B'),
(28, 23456, 'TINELLI', 'MARCELO', '2234234', 't10_chavezZ@gmail.com', 'SDFSDF S SDF ', '52', 'GALENO', 'ASASD', '2020-03-19', 'SDFSD', 'Si', 'Si', 'DR. CARLOS OLIVERA', 'Si', 'SDFSDF', 'No', 'DR. CARLOS LLANOSZ', 'Si', 'SDSDF', 'No', 'Si', 'A'),
(31, 777777, 'ronaldo', 'cristina', '', '', '', '36', 'DASUTEN', 'asd', '2020-03-01', '', 'Si', 'No', '', 'No', '', 'No', '', 'No', '', 'Si', 'Si', 'B'),
(32, 29456789, 'VERA', 'LUIS', '3804457898', 'LUIS@gmail.com', 'ORTIZ DE OCAMPO 666', '38', 'OBRA SOCIAL SIN CONVENIO', 'LICENCIADO EN SISTEMAS', '2020-04-04', 'MARTES 15 HS.', 'No', 'Si', 'DR. CAMPOS', 'No', '', 'No', '', 'Si', 'EVERMICNINA', 'Si', 'Si', 'A'),
(33, 36124879, 'Girotti', 'Emmanuel', '234234', 'girotti@gmail.com', 'dfg', '21', 'GALENO', 'Deportista', '2020-03-26', 'fdg', 'Si', 'Si', 'dfg', 'Si', 'dfgdfg', 'No', '', 'Si', 'dfgdfgdf', 'No', 'No', 'A'),
(34, 30920245, 'Chavez', 'Sergio', '654987', 'sergio@GMAIL.COM', 'Esperanza s/n', '39', 'APOS', 'Educacion', '2020-03-13', 'asd', 'Si', 'Si', 'DR. CARLOS OLIVERAZ', 'No', 'sinto', 'No', 'profe', 'No', 'medic', 'Si', 'Si', 'A'),
(35, 555555, 'Gonzalez', 'Nicolas', '38046587', 'niko@gmail.com', 'asas', '50', 'GALENO', 'Medico', '2020-03-21', 'asdsad', 'No', 'No', '', 'No', '', 'Si', 'DR. CARLOS LLANOS', 'No', '', 'Si', 'No', 'A'),
(36, 30921242, 'Chavez ', 'Jose Antonio', '3821400010', 't10_chavez@gmail.com', 'Esperanza s/n', '37', 'OSUNLAR', 'LIC. EN SISTEMAS  ', '2020-10-12', 'lun a vie 13 a 19', 'No', 'Si', 'DR. CARLOS OLIVERA', 'No', '', 'Si', 'DR. CARLOS LLANOS', 'No', '', 'Si', 'No', 'A'),
(37, 123456789, 'Quiroga', 'Daniel', '34234234', 'quirog.dan@GMAIL.COM', 'Pairda 658', '75', 'PAMI', 'Medico', '2020-03-28', 'lun a vie 13 a 19', 'Si', 'Si', 'DR. CARLOS OLIVERA', 'Si', 'asaasdasd', 'No', '', 'No', '', 'Si', 'Si', 'A'),
(38, 3650347, 'CARRIZO', 'LOURDES FLORENCIA ANDREA', '03804105915', 'ffg@g.com', 'Esperanza s/n', '27', 'APOS', 'MEDICA ', '2020-03-26', 'lun a vie 13 a 19', 'Si', 'Si', 'AS', 'Si', 'ASD', 'Si', 'ASD', 'Si', 'ASD', 'No', 'No', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_apellido` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `usuario` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_apellido`, `usuario`, `password`, `tipo_usuario`) VALUES
(3, 'Administrador web', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1),
(4, 'Psicología', 'psicologia', '567781f4371429041125ad9ffafa526eeec88fce', 2),
(5, 'Clínica Médica', 'clmedica', '128de7a3f2d9a071c31bc86c6bd80bdd107eab30', 1),
(6, 'Cardiología', 'cardiologia', 'd86bfc0f9f6b6212981e828849d7a5717cd642a1', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `int_cardiologica`
--
ALTER TABLE `int_cardiologica`
  ADD PRIMARY KEY (`id_int_cardiologica`),
  ADD KEY `id_int_cl_medica` (`id_int_cl_medica`);

--
-- Indices de la tabla `int_cl_medica`
--
ALTER TABLE `int_cl_medica`
  ADD PRIMARY KEY (`id_int_cl_medica`),
  ADD KEY `id_paciente` (`id_paciente`);

--
-- Indices de la tabla `int_psicologica`
--
ALTER TABLE `int_psicologica`
  ADD PRIMARY KEY (`id_int_psicologica`),
  ADD KEY `id_int_cl_medica` (`id_int_cl_medica`);

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
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `int_cardiologica`
--
ALTER TABLE `int_cardiologica`
  MODIFY `id_int_cardiologica` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `int_cl_medica`
--
ALTER TABLE `int_cl_medica`
  MODIFY `id_int_cl_medica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT de la tabla `int_psicologica`
--
ALTER TABLE `int_psicologica`
  MODIFY `id_int_psicologica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `int_cardiologica`
--
ALTER TABLE `int_cardiologica`
  ADD CONSTRAINT `int_cardiologica_ibfk_1` FOREIGN KEY (`id_int_cl_medica`) REFERENCES `int_cl_medica` (`id_int_cl_medica`);

--
-- Filtros para la tabla `int_cl_medica`
--
ALTER TABLE `int_cl_medica`
  ADD CONSTRAINT `int_cl_medica_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `paciente` (`id_paciente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `int_psicologica`
--
ALTER TABLE `int_psicologica`
  ADD CONSTRAINT `int_psicologica_ibfk_1` FOREIGN KEY (`id_int_cl_medica`) REFERENCES `int_cl_medica` (`id_int_cl_medica`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
