-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-07-2025 a las 18:17:24
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `base_posta`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `IdCita` int(11) NOT NULL,
  `Fecha` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `Dia` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `NombreDoctor` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `Especialidad` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `HoradeAtencion` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `Aviso` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `NombredelPaciente` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `NumDocumento` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cita`
--

INSERT INTO `cita` (`IdCita`, `Fecha`, `Dia`, `NombreDoctor`, `Especialidad`, `HoradeAtencion`, `Aviso`, `NombredelPaciente`, `NumDocumento`) VALUES
(1, '2025-07-11', 'Viernes', 'Dr. Luis Pérez', 'Cardiología', '08:00', 'Confirmado', 'Ana Torres', '12345678'),
(2, '2025-07-12', 'Sábado', 'Dra. María Gómez', 'Pediatría', '09:30', 'Pendiente', 'Carlos Ruiz', '87654321'),
(3, '2025-07-13', 'Domingo', 'Dr. Jorge Rivas', 'Dermatología', '10:15', 'Cancelado', 'Lucía Mendoza', '10293847'),
(4, '2025-07-14', 'Lunes', 'Dra. Elena Salas', 'Ginecología', '11:45', 'Confirmado', 'Raúl Fernández', '56473829'),
(5, '2025-07-15', 'Martes', 'Dr. Pablo Vega', 'Neurología', '13:00', 'Reprogramado', 'María López', '01928374'),
(6, '2025-07-16', 'Miércoles', 'Dra. Teresa León', 'Oftalmología', '14:30', 'Confirmado', 'José Castillo', '84736251'),
(7, '2025-07-17', 'Jueves', 'Dr. Ricardo Soto', 'Traumatología', '16:00', 'Pendiente', 'Andrea Núñez', '73625184'),
(8, '2025-07-18', 'Viernes', 'Dra. Carmen Díaz', 'Psiquiatría', '08:45', 'Confirmado', 'Diego Ramos', '56473810'),
(9, '2025-07-19', 'Sábado', 'Dr. Mario Ruiz', 'Urología', '10:30', 'Cancelado', 'Verónica Chávez', '38291047'),
(10, '2025-07-20', 'Domingo', 'Dra. Laura Ponce', 'Reumatología', '12:00', 'Confirmado', 'Luis Espinoza', '29384756');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctores`
--

CREATE TABLE `doctores` (
  `IdDoc` int(50) NOT NULL,
  `DNI` int(11) DEFAULT NULL,
  `NombreDoc` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `Especialidad` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `Telefono` int(50) NOT NULL,
  `horasdeTrabajo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `DiasdeTrabajo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `contraseña` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `doctores`
--

INSERT INTO `doctores` (`IdDoc`, `DNI`, `NombreDoc`, `Especialidad`, `Telefono`, `horasdeTrabajo`, `DiasdeTrabajo`, `contraseña`) VALUES
(1, 45612378, 'Dr. Luis Pérez', 'Cardiología', 987654321, '08:00-14:00', 'Lunes-Viernes', 'cardio123'),
(2, 47859613, 'Dra. María Gómez', 'Pediatría', 912345678, '09:00-13:00', 'Martes-Sábado', 'pediatra456'),
(3, 49653127, 'Dr. Jorge Rivas', 'Dermatología', 923456789, '10:00-16:00', 'Lunes-Jueves', 'derma789'),
(4, 50321478, 'Dra. Elena Salas', 'Ginecología', 934567891, '11:00-17:00', 'Miércoles-Viernes', 'gine1234'),
(5, 51234987, 'Dr. Pablo Vega', 'Neurología', 945678912, '07:30-13:30', 'Lunes-Sábado', 'neuro4567'),
(6, 52346789, 'Dra. Teresa León', 'Oftalmología', 956789123, '08:00-12:00', 'Martes-Jueves', 'oftalmo321'),
(7, 53498712, 'Dr. Ricardo Soto', 'Traumatología', 967891234, '14:00-20:00', 'Lunes-Viernes', 'trauma654'),
(8, 54673829, 'Dra. Carmen Díaz', 'Psiquiatría', 978912345, '09:00-15:00', 'Lunes-Miércoles', 'psiqui789'),
(9, 55981347, 'Dr. Mario Ruiz', 'Urología', 989123456, '10:30-17:30', 'Martes-Viernes', 'uro963'),
(10, 56743289, 'Dra. Laura Ponce', 'Reumatología', 990234567, '08:30-14:30', 'Miércoles-Sábado', 'reuma852');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id` int(11) NOT NULL,
  `NombreApe` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `TipoDocumento` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `NumDocumento` int(50) NOT NULL,
  `FechaNacimiento` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `Celular` int(50) NOT NULL,
  `Correo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `TipoSeguro` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `Contraseña` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id`, `NombreApe`, `TipoDocumento`, `NumDocumento`, `FechaNacimiento`, `Celular`, `Correo`, `TipoSeguro`, `Contraseña`) VALUES
(1, 'Luis del Piero Angeles Mendoza', 'DNI', 71418624, '2004-07-20', 987709074, 'luis20angeles08@gmail.com', 'SIS', '203006'),
(2, 'Jarol Arriea', 'DNI', 71427186, '05/09/2004', 967743623, 'srrietaramirezjarol9', 'SIS', '123456789'),
(3, 'Ana Torres', 'DNI', 12345678, '1990-03-12', 987654321, 'ana.torres@gmail.com', 'SIS', 'ana123'),
(4, 'Carlos Ruiz', 'DNI', 87654321, '1985-07-22', 912345678, 'carlos.ruiz@hotmail.com', 'ESSALUD', 'ruiz456'),
(5, 'Lucía Mendoza', 'DNI', 10293847, '1992-11-05', 923456789, 'lucia.mendoza@yahoo.com', 'SIS', 'lucia789'),
(6, 'Raúl Fernández', 'DNI', 56473829, '1978-09-30', 934567891, 'raul.f@hotmail.com', 'ESSALUD', 'raulpass'),
(7, 'María López', 'DNI', 1928374, '2000-01-15', 945678912, 'maria.lopez@gmail.com', 'EPS', 'ml1234'),
(8, 'José Castillo', 'DNI', 84736251, '1988-06-10', 956789123, 'jose.castillo@gmail.com', 'SIS', 'josepass'),
(9, 'Andrea Núñez', 'DNI', 73625184, '1995-04-18', 967891234, 'andrea.nunez@outlook.com', 'ESSALUD', 'andreapw'),
(10, 'Diego Ramos', 'DNI', 56473810, '1983-12-01', 978912345, 'diego.ramos@gmail.com', 'EPS', 'diego123'),
(11, 'Verónica Chávez', 'DNI', 38291047, '1999-08-25', 989123456, 'vero.chavez@gmail.com', 'SIS', 'verochz'),
(12, 'Luis Espinoza', 'DNI', 29384756, '1975-10-09', 990234567, 'luis.espinoza@yahoo.com', 'ESSALUD', 'luispass');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarioadmin`
--

CREATE TABLE `usuarioadmin` (
  `Nombre` varchar(11) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `Contraseña` varchar(11) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `Tipo_doc` varchar(11) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `NumDoc` int(11) DEFAULT NULL,
  `Correo` varchar(11) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `usuarioadmin`
--

INSERT INTO `usuarioadmin` (`Nombre`, `Contraseña`, `Tipo_doc`, `NumDoc`, `Correo`) VALUES
('Luis', '123456', 'DNI', 71418624, 'luis20angel');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacunas`
--

CREATE TABLE `vacunas` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(512) NOT NULL,
  `Fabricante` varchar(512) NOT NULL,
  `Vacu_disp` int(255) NOT NULL,
  `FechaCad` date NOT NULL,
  `doctor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vacunas`
--

INSERT INTO `vacunas` (`id`, `Nombre`, `Fabricante`, `Vacu_disp`, `FechaCad`, `doctor_id`) VALUES
(1, 'CardioVax', 'Pfizer', 2, '2026-03-01', 1),
(2, 'HeartShield', 'Moderna', 8, '2025-12-01', 1),
(3, 'AstraCard', 'AstraZeneca', 4, '2026-05-15', 1),
(4, 'CovHeart', 'Sinopharm', 6, '2025-11-20', 1),
(5, 'TetraCard', 'Sanofi', 1, '2026-09-30', 1),
(6, 'Infanrix', 'GSK', 3, '2026-08-15', 2),
(7, 'Varivax', 'Merck', 5, '2027-03-10', 2),
(8, 'MMR II', 'Merck', 3, '2026-04-25', 2),
(9, 'Hiberix', 'GSK', 9, '2025-12-30', 2),
(10, 'Rotateq', 'MSD', 4, '2026-01-20', 2),
(11, 'SkinGuard', 'Pfizer', 10, '2027-02-28', 3),
(12, 'VZVax', 'Sanofi', 6, '2026-10-15', 3),
(13, 'PapilVax', 'GSK', 7, '2026-06-12', 3),
(14, 'DermaShield', 'Moderna', 2, '2025-11-01', 3),
(15, 'TetraDerma', 'Sinovac', 1, '2025-12-01', 3),
(16, 'Gardasil 9', 'MSD', 7, '2027-04-01', 4),
(17, 'Cervarix', 'GSK', 5, '2026-07-01', 4),
(18, 'RubVax', 'Merck', 1, '2026-09-09', 4),
(19, 'Vaxigrip', 'Sanofi', 2, '2025-10-01', 4),
(20, 'GynoProtect', 'Pfizer', 5, '2025-11-30', 4),
(21, 'NeuroVax', 'Moderna', 10, '2026-03-03', 5),
(22, 'Meningitec', 'Pfizer', 3, '2026-06-06', 5),
(23, 'NeuroShield', 'Sanofi', 6, '2025-12-31', 5),
(24, 'BrainVax', 'GSK', 1, '2026-05-05', 5),
(25, 'NeuroCov', 'Sinovac', 9, '2025-10-10', 5),
(26, 'VisionGuard', 'Pfizer', 8, '2026-08-18', 6),
(27, 'EyeSafe', 'Sanofi', 2, '2026-01-01', 6),
(28, 'OptiVax', 'Moderna', 1, '2026-04-22', 6),
(29, 'ConjuntaVax', 'Sinopharm', 4, '2025-11-11', 6),
(30, 'RetinoGuard', 'GSK', 9, '2026-06-01', 6),
(31, 'FracturaVax', 'AstraZeneca', 6, '2026-05-10', 7),
(32, 'TetraTrauma', 'Sanofi', 4, '2026-12-12', 7),
(33, 'InjuryShield', 'Moderna', 8, '2025-09-09', 7),
(34, 'OsteoVax', 'Pfizer', 2, '2026-02-02', 7),
(35, 'JointGuard', 'GSK', 3, '2026-07-07', 7),
(36, 'NeuroMood', 'Pfizer', 1, '2026-08-08', 8),
(37, 'PsyVax', 'Moderna', 4, '2025-12-12', 8),
(38, 'MoodProtect', 'Sanofi', 5, '2026-01-15', 8),
(39, 'MentalGuard', 'GSK', 6, '2026-03-03', 8),
(40, 'PsyShield', 'Sinopharm', 10, '2025-11-20', 8),
(41, 'UroVaxom', 'AstraZeneca', 11, '2026-04-04', 9),
(42, 'BladderProtect', 'Pfizer', 4, '2025-12-30', 9),
(43, 'RenalVax', 'Moderna', 1, '2026-02-14', 9),
(44, 'UrinVax', 'Sanofi', 3, '2026-06-06', 9),
(45, 'ProstaShield', 'GSK', 2, '2026-09-09', 9),
(46, 'JointVax', 'Pfizer', 1, '2026-08-01', 10),
(47, 'ReumaGuard', 'Sanofi', 5, '2025-11-11', 10),
(48, 'AntiInflam', 'Moderna', 6, '2026-05-25', 10),
(49, 'BoneCare', 'GSK', 8, '2026-10-10', 10),
(50, 'ArthroVax', 'Sinovac', 7, '2026-01-01', 10);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`IdCita`);

--
-- Indices de la tabla `doctores`
--
ALTER TABLE `doctores`
  ADD PRIMARY KEY (`IdDoc`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vacunas`
--
ALTER TABLE `vacunas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_doctor` (`doctor_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `IdCita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `doctores`
--
ALTER TABLE `doctores`
  MODIFY `IdDoc` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `vacunas`
--
ALTER TABLE `vacunas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `vacunas`
--
ALTER TABLE `vacunas`
  ADD CONSTRAINT `fk_doctor` FOREIGN KEY (`doctor_id`) REFERENCES `doctores` (`IdDoc`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
