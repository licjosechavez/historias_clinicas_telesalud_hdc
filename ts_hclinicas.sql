-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 21-05-2021 a las 10:09:54
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
  `motivo_consulta_car` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `app_car` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `bajo_control_medico_car` varchar(2) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `medico_cabecera_car` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estudios_complementarios` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `consignar_estudios_car` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `conducta_seguir` varchar(300) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecha_int_car` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado_car` varchar(20) COLLATE utf8_spanish2_ci DEFAULT 'NA'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `int_cardiologica`
--

INSERT INTO `int_cardiologica` (`id_int_cardiologica`, `id_int_cl_medica`, `motivo_consulta_car`, `app_car`, `bajo_control_medico_car`, `medico_cabecera_car`, `estudios_complementarios`, `consignar_estudios_car`, `conducta_seguir`, `fecha_int_car`, `estado_car`) VALUES
(1, 170, ' asd a', ' asd a', 'Si', 'jhkhjk', 'Si', 'hjkhjkh', 'jkhjk', '2020-03-29 03:00:00', 'A'),
(2, 171, 'oooo', 'oooo', 'Si', 'oooo', 'Si', 'ooooooo', 'o', '2020-03-21 03:00:00', 'A'),
(3, 172, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-04 10:58:19', 'NA'),
(4, 173, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-04 11:01:14', 'NA'),
(5, 175, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-04 11:03:54', 'NA'),
(6, 176, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-04 11:04:38', 'NA'),
(7, 181, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-04 11:12:31', 'NA'),
(8, 183, 'ca', 'ca', 'Si', 'ca', 'Si', 'ca', 'ca', '2020-03-26 03:00:00', 'A');

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
(168, 35, 'el estado es', 'ibu 600 ', 'se realizo los', 'el pacientes ttaata', 'No', '', 'Si', 'sf sdf sdf ', 'Si', 'debera seguir con tat tal', '2021-05-02 14:45:19'),
(169, 28, 'asda sd ', 'hjkhj', 'yrtrt', 'vbnbvnv', 'Si', 'PSICOLOGICA', 'Si', ' dfg ', 'No', 'df gdf g', '2021-05-02 14:47:27'),
(170, 26, 'bn', 'bnbnbn', 'bnbnb', 'bnbn bn ', 'Si', 'CARDIOLOGICA', 'Si', 'bn  bn ', 'No', 'bn b ', '2021-05-02 14:48:25'),
(171, 32, 'sdf', 'sdf', 'sdf', 'sdf', 'Si', 'PSICOLOGICA,CARDIOLOGICA', 'Si', 'sdf', 'No', 'sdf', '2021-05-02 14:52:05'),
(172, 35, 'presta', 'esta tomando tatat', 'orina sanfÂ¿gre', 'asd as asd asd ', 'Si', 'PSICOLOGICA,CARDIOLOGICA', 'Si', 'asda d', 'Si', ' asd asd ad', '2021-05-04 10:58:19'),
(173, 38, 'dfg', 'dfg', 'dfg', 'dfg', 'Si', 'PSICOLOGICA,CARDIOLOGICA', 'No', '', 'No', 'dfg', '2021-05-04 11:01:14'),
(174, 33, 'df', 'dfg', 'dfg', 'dfg', 'Si', 'PSICOLOGICA', 'No', '', 'No', 'dfg', '2021-05-04 11:03:13'),
(175, 23, 'dfg', 'dfg', 'dfg', 'dfg', 'Si', 'CARDIOLOGICA', 'Si', 'dfg', 'No', 'dfg', '2021-05-04 11:03:54'),
(176, 36, 'dfg', 'dfg', 'dfg', 'dfg', 'Si', 'PSICOLOGICA,CARDIOLOGICA', 'Si', 'dfg', 'Si', 'dfg', '2021-05-04 11:04:38'),
(180, 34, 'asd', 'asd', 'asd', 'asd', 'No', '', 'Si', 'asd', 'Si', 'asd', '2021-05-04 11:11:42'),
(181, 38, 'asd', 'asd', 'asd', 'ad', 'Si', 'PSICOLOGICA,CARDIOLOGICA', 'Si', 'asd', 'No', 'asd', '2021-05-04 11:12:31'),
(182, 40, 'prueba', ' asdasd ', 'asd ', ' asd', 'Si', 'PSICOLOGICA', 'Si', 'zxzx z zxc zxc ', 'No', 'zxczxc', '2021-05-13 20:36:56'),
(183, 40, 'ca', 'ca', 'ca', 'ca', 'Si', 'CARDIOLOGICA', 'Si', 'ca', 'No', 'car', '2021-05-13 20:37:30');

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
(1, 169, 'Si', 'LLAMADO TELEFONICO', 'asd asd asd ', 'Si', ' asd a ssss', 'No', '', ' asd asd ', ' asd asd ', '2020-03-26 03:00:00', 'A'),
(3, 171, 'Si', 'PRESENCIAL', 'SDFSF', 'Si', 'SFDSDF', 'Si', 'sdf', 'sdf', 'sdf', '2021-05-03 13:18:44', 'A'),
(4, 172, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-04 10:58:19', 'NA'),
(6, 173, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-04 11:01:14', 'NA'),
(7, 174, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-04 11:03:13', 'NA'),
(8, 176, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-04 11:04:38', 'NA'),
(9, 181, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-04 11:12:31', 'NA'),
(10, 182, 'Si', 'LLAMADO TELEFONICO', 'pp', 'Si', 'pp', 'Si', 'pp', 'pp', 'pp', '2020-03-18 03:00:00', 'A');

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
(25, 30920242, 'CHAVEZ AGUILAR', 'JOSE ANTONIO', '3821400010', 't10_chavez@gmail.com', 'Esperanza s/nZ', '36', 'APOS', 'LIC. EN SISTEMAS ', '2021-04-06', 'lun a vie 13 a 19', 'Si', 'Si', 'DR. CARLOS OLIVERA', 'Si', 'FIEBRE, DOLOR DE CABEZA', 'Si', 'DR. CARLOS LLANOS', 'Si', 'IVERMECTIna plus', 'Si', 'Si', 'B'),
(26, 299787, 'MONTIEL', 'LUCAS', '654321', 'G@GMAIL.COM', 'LAPRIDA 156', '25', 'SUMAR', 'ETUDIANTES ', '2020-03-28', 'MARTES POR LA TARDE', 'Si', 'Si', 'OMAR PARADA', 'No', '', 'Si', 'DR. CARLOS OLIVERA', 'Si', 'IVERMICINA 400 MG', 'No', 'Si', 'A'),
(27, 29971921, 'VERA', 'LUIS', '38046587', 'luks@gmial.com', 'ASDAS', '37', 'APOS', 'LIC. EN SISTEMAS', '2020-03-19', 'ASDASD', 'Si', 'Si', 'DR. CAMPOS', 'No', '', 'Si', 'DR. CARLOS LLANOS', 'No', '', 'Si', 'No', 'B'),
(28, 23456, 'TINELLIs', 'MARCELO', '2234234', 't10_chavezZ@gmail.com', 'SDFSDF S SDF ', '52', 'GALENO', 'ASASD ', '2020-03-19', 'SDFSD', 'Si', 'Si', 'DR. CARLOS OLIVERA', 'Si', 'SDFSDF', 'No', 'DR. CARLOS LLANOSZ', 'Si', 'SDSDF', 'No', 'Si', 'A'),
(31, 777777, 'ronaldo', 'cristina', '', '', '', '36', 'DASUTEN', 'asd', '2020-03-01', '', 'Si', 'No', '', 'No', '', 'No', '', 'No', '', 'Si', 'Si', 'B'),
(32, 29456789, 'VERA', 'LUIS', '3804457898', 'LUIS@gmail.com', 'ORTIZ DE OCAMPO 666', '38', 'OBRA SOCIAL SIN CONVENIO', 'LICENCIADO EN SISTEMAS', '2020-04-04', 'MARTES 15 HS.', 'No', 'Si', 'DR. CAMPOS', 'No', '', 'No', '', 'Si', 'EVERMICNINA', 'Si', 'Si', 'A'),
(33, 36124879, 'Girotti', 'Emmanuel', '234234', 'girotti@gmail.com', 'dfg', '21', 'GALENO', 'Deportista', '2020-03-26', 'fdg', 'Si', 'Si', 'dfg', 'Si', 'dfgdfg', 'No', '', 'Si', 'dfgdfgdf', 'No', 'No', 'A'),
(34, 30920245, 'Chavez', 'Sergio', '654987', 'sergio@GMAIL.COM', 'Esperanza s/n', '39', 'APOS', 'Educacion', '2020-03-13', 'asd', 'Si', 'Si', 'DR. CARLOS OLIVERAZ', 'No', 'sinto', 'No', 'profe', 'No', 'medic', 'Si', 'Si', 'A'),
(35, 555555, 'Gonzalez', 'Nicolas', '38046587', 'niko@gmail.com', 'asas', '50', 'GALENO', 'Medico', '2020-03-21', 'asdsad', 'No', 'No', '', 'No', '', 'Si', 'DR. CARLOS LLANOS', 'No', '', 'Si', 'No', 'A'),
(36, 30921242, 'Chavez ', 'Jose Antonio', '3821400010', 't10_chavez@gmail.com', 'Esperanza s/n', '37', 'OSUNLAR', 'LIC. EN SISTEMAS  ', '2020-10-12', 'lun a vie 13 a 19', 'No', 'Si', 'DR. CARLOS OLIVERA', 'No', '', 'Si', 'DR. CARLOS LLANOS', 'No', '', 'Si', 'No', 'A'),
(37, 123456789, 'Quiroga', 'Daniel', '34234234', 'quirog.dan@GMAIL.COM', 'Pairda 658', '75', 'PAMI', 'Medico', '2020-03-28', 'lun a vie 13 a 19', 'Si', 'Si', 'DR. CARLOS OLIVERA', 'Si', 'asaasdasd', 'No', '', 'No', '', 'Si', 'Si', 'A'),
(38, 3650347, 'CARRIZO chavez', 'LOURDES FLORENCIA ANDREA', '03804105915', 'ffg@g.com', 'Esperanza s/n', '27', 'APOS', 'MEDICA   ', '2020-03-26', 'lun a vie 13 a 19', 'Si', 'Si', 'AS', 'Si', 'ASD', 'No', '', 'No', 'ASD', 'No', 'No', 'A'),
(39, 321654987, 'Niz', 'Juan P', '3804654987', 'jpniz@gmail.com', 'sadf', '23', 'GALENO', 'Lic. en Sistemas', '2020-03-19', 'lun a vie 13 a 18', 'Si', 'Si', 'asd', 'Si', 'asdasd', 'Si', 'asdasd', 'Si', 'asdasd', 'No', 'No', 'A'),
(40, 32145897, 'Chavez', 'Pedro alfonso', '23234', 'pedro_chavez@gmail.com', '654k', '40', 'IPAUSS', 'Futbolista', '2020-03-28', 'lun a vie 13 a 19', 'No', 'Si', 'DR. CAMPOS', 'No', '', 'Si', 'DR. CARLOS LLANOS', 'No', '', 'Si', 'Si', 'A'),
(41, 32165498, 'ALVAREZ', 'JUAN', '380415687', 'JULI@gmail.com', 'Esperanza 15587', '21', 'SUMAR', 'BANCARIO ', '2020-03-18', 'lunes a viernes de 8 a 19', 'Si', 'Si', 'DR. CARLOS OLIVERAZ', 'Si', 'ASDAS ASD ', 'No', 'FSDF', 'Si', 'IVERMITCA PLUS', 'No', 'Si', 'A');

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
  MODIFY `id_int_cardiologica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `int_cl_medica`
--
ALTER TABLE `int_cl_medica`
  MODIFY `id_int_cl_medica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;
--
-- AUTO_INCREMENT de la tabla `int_psicologica`
--
ALTER TABLE `int_psicologica`
  MODIFY `id_int_psicologica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
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
