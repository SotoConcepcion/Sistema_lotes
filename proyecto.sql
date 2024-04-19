-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-04-2024 a las 09:58:33
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
-- Base de datos: `proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dimensiones`
--

CREATE TABLE `dimensiones` (
  `Id_dimension` varchar(5) NOT NULL,
  `Medidas` varchar(25) NOT NULL,
  `Precio` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `dimensiones`
--

INSERT INTO `dimensiones` (`Id_dimension`, `Medidas`, `Precio`) VALUES
('1', '1.20 m x 1.80', '1000'),
('2', '1.50 m x 2.00', '1200'),
('3', '0.90 m x 2.40', '900'),
('4', '2.00 m x 2.00', '1500'),
('5', '1.80 m x 3.00', '1350');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `espectacular`
--

CREATE TABLE `espectacular` (
  `Id_espectacular` varchar(5) NOT NULL,
  `Id_usuario` varchar(5) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Marca` varchar(20) NOT NULL,
  `Documento` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estacion`
--

CREATE TABLE `estacion` (
  `Id_estacion` varchar(5) NOT NULL,
  `Id_linea` varchar(5) NOT NULL,
  `Nombre` varchar(20) NOT NULL,
  `Ubicacion` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `estacion`
--

INSERT INTO `estacion` (`Id_estacion`, `Id_linea`, `Nombre`, `Ubicacion`) VALUES
('E10L1', '1', 'Valle De Ecatepec', 'Manzana 040, Potrero Chic'),
('E10L2', '2', 'Bandera Tultitlán', '54948, Av. José López Por'),
('E10L3', '3', 'Palacio Municipal', 'Av. Chimalhuacán 330, Ben'),
('E10L4', '4', 'Servicios Administra', 'Avenida Nacional esquina '),
('E11L1', '1', ' Las Américas', 'San Luis Potosí 68, Jardi'),
('E11L2', '2', 'Bello Horizonte', 'Bello Horizonte, 54948 Bu'),
('E11L3', '3', 'Sor Juana Inés de la', 'Benito Juárez, 57709 Cdad'),
('E11L4', '4', 'Clínica 93', 'Avenida Nacional esquina '),
('E12L1', '1', 'Primero De Mayo', 'Jardines de Morelos 5ta'),
('E12L2', '2', 'Cartagena', 'San Mateo Cuautepec, 5494'),
('E12L3', '3', 'El Castillito', 'Manzana 041, Benito Juáre'),
('E12L4', '4', 'Industrial', 'Esquina Calle Benito Juár'),
('E13L1', '1', 'Hospital Las América', 'Avenida Simon Bolivar 1'),
('E13L2', '2', 'De la Cruz San Mateo', 'San Mateo Cuautepec, 5494'),
('E13L3', '3', 'General Vicente Vill', '57000, Av. Chimalhuacán 1'),
('E13L4', '4', 'La 5ª Aparición', 'Esquina Calle Hidalgo, Ec'),
('E14L1', '1', 'Aquiles Serdán', ' Santa Cruz Venta de Carp'),
('E14L2', '2', 'Fuentes del Valle', 'Manzana 011, San Mateo Cu'),
('E14L3', '3', 'Rayito de Sol', 'Av. Vicente Villada 653, '),
('E14L4', '4', 'Tulpetlac', 'Esquina Calle Independenc'),
('E15L1', '1', 'Jardines De Morelos', 'Jardines de Morelos'),
('E15L2', '2', 'Mariscala Real del B', 'Sta Maria Cuautepec, 5491'),
('E15L3', '3', 'Las Mañanitas', 'Av. Vicente Villada, Beni'),
('E15L4', '4', 'Siervo de la Nación', 'Esquina Calle Zaragoza, E'),
('E16L1', '1', 'Palomas ', 'Av. Central M-IL-4, Llano'),
('E16L2', '2', 'Villas de San José', 'Av. José López Portillo 3'),
('E16L3', '3', 'Rancho Grande', 'Av. Vicente Villada 885, '),
('E16L4', '4', 'Nuevo Laredo', 'Esquina Calle 5 de Mayo, '),
('E17L1', '1', '19 De Septiembre', 'Carril Exclusivo MEXIBUS,'),
('E17L2', '2', 'Santa María', 'Av. José López Portillo 6'),
('E17L3', '3', 'Bordo de Xochiaca', 'Av. Bordo de Xochiaca Man'),
('E17L4', '4', 'Laureles', 'Esquina Calle 16 de Septi'),
('E18L1', '1', ' Central De Abasto', 'Santa Cruz Venta de Carpi'),
('E18L2', '2', 'Coacalco Berriozábal', 'Bosques del Valle, 55700 '),
('E18L3', '3', 'Los Patos', 'Av. del Peñon LT1, Artesa'),
('E18L4', '4', 'La Viga', 'Esquina Calle 20 de Novie'),
('E19L1', '1', 'Las Torres', 'Manzana 005, Sta Maria Ch'),
('E19L2', '2', 'Bosques del Valle', 'Bosques del Valle, 55700 '),
('E19L3', '3', 'Guerrero Chimalli', 'Adolfo Ruiz Cortines Manz'),
('E19L4', '4', 'San Cristóbal', 'Esquina Calle Morelos, Te'),
('E1L1', '1', 'Ciudad Azteca', 'Carlos Hank González 123,'),
('E1L2', '2', 'La Quebrada', 'Vía Gustavo Baz Prada Man'),
('E1L3', '3', 'Pantitlán', 'Amp Adolfo López Mateos, '),
('E1L4', '4', 'Indios Verdes     ', 'Santa Isabel Tola, Gustav'),
('E20L1', '1', 'Hidalgo', '55069, México Pachuca Ave'),
('E20L2', '2', 'Ex Hacienda San Feli', 'Av. José López Portillo 1'),
('E20L3', '3', 'Las Flores', 'Manzana 041, Tlatelco, 56'),
('E20L4', '4', 'Puente de Fierro', 'Esquina Calle Hidalgo, Te'),
('E2L1', '1', 'Quinto Sol', 'Cd Azteca 3ra Secc, 55120'),
('E2L2', '2', 'ERO (Estación Retorn', 'Avenida José López Portil'),
('E2L3', '3', 'Calle 6', 'Av. Chimalhuacán, Maravil'),
('E2L4', '4', 'Periférico', 'Carr. Federal Pachuca - M'),
('E3L1', '1', 'Josefa Ortíz', 'Rio de Luz, 55100 Ecatepe'),
('E3L2', '2', 'Lechería', 'Isidro Fabela, 54959 Cuau'),
('E3L3', '3', 'El Barquito', 'Av. Chimalhuacán, Maravil'),
('E3L4', '4', 'Puente Martin Carrer', 'Martin Carrera, Colinas d'),
('E4L1', '1', 'Industrial', 'Av. Industrias Ecatepec 3'),
('E4L2', '2', 'Vidriera', 'Avenida José López Portil'),
('E4L3', '3', 'Maravillas', 'C. 22, Maravillas, 57410 '),
('E4L4', '4', 'Clínica 76', 'Carr. Federal Pachuca - M'),
('E5L1', '1', 'Unitec  ', 'Av. Carlos Hank González '),
('E5L2', '2', 'Ciudad Labor', 'Av. José López Portillo M'),
('E5L3', '3', 'Vicente Riva Palacio', '57410, Av. Chimalhuacán 1'),
('E5L4', '4', 'Vía Morelos', 'Carr. Federal Pachuca - M'),
('E6L1', '1', 'Torres', ' Xaltipac, 56346 Chimalhu'),
('E6L2', '2', 'Chilpan', 'Av. José López Portillo 5'),
('E6L3', '3', 'Virgencitas', 'Agua Azul, 57300 Cdad. Ne'),
('E6L4', '4', 'Monumento a Morelos', 'Esquina Calle 5 de Febrer'),
('E7L1', '1', 'Zodiaco', 'Esquina Escorpión, Av. Ca'),
('E7L2', '2', 'Recursos Hidráulicos', '54946, Av. José López Por'),
('E7L3', '3', 'Nezahualcóyotl', '57500, Av. Chimalhuacán 2'),
('E7L4', '4', '5 de Febrero', 'Esquina Calle 10 de Mayo'),
('E8L1', '1', 'Adolfo López Mateos ', 'Esquina Vía Adolfo López '),
('E8L2', '2', 'COCEM', 'Cocem, 54913 Buenavista, '),
('E8L3', '3', 'Lago de Chapala', 'Av Chimalhuacán, C. Lago '),
('E8L4', '4', 'Santa Clara', 'Esquina Calle 16 de Septi'),
('E9L1', '1', 'Vocacional 3     ', '55118 Ecatepec de Morelos'),
('E9L2', '2', 'Buenavista', 'Cocem, 54913 Buenavista, '),
('E9L3', '3', 'Adolfo López Mateos', 'Av. Chimalhuacán 282, Ben'),
('E9L4', '4', 'Cerro Gordo', 'Avenida Nacional esquina ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea`
--

CREATE TABLE `linea` (
  `Id_linea` varchar(5) NOT NULL,
  `Nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `linea`
--

INSERT INTO `linea` (`Id_linea`, `Nombre`) VALUES
('1', 'LINEA 1'),
('2', 'LINEA 2'),
('3', 'LINEA 3'),
('4', 'LINEA 4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lote`
--

CREATE TABLE `lote` (
  `Id_lote` int(11) NOT NULL,
  `Nombre_lote` varchar(20) NOT NULL,
  `Id_estacion` varchar(5) NOT NULL,
  `Id_dimension` varchar(5) NOT NULL,
  `Id_status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `lote`
--

INSERT INTO `lote` (`Id_lote`, `Nombre_lote`, `Id_estacion`, `Id_dimension`, `Id_status`) VALUES
(46, 'Andén Izquierdo', 'E17L1', '3', '2R'),
(47, 'Anden Derecho', 'E17L1', '4', '1D'),
(48, 'Tótem Andén Central', 'E17L1', '3', '1D'),
(50, 'Andén Izquierdo', 'E8L1', '3', '1D'),
(51, 'Anden Derecho', 'E8L1', '4', '1D'),
(52, 'Tótem Andén Central', 'E8L1', '2', '1D'),
(55, 'Anden Derecho', 'E14L1', '2', '1D'),
(56, 'Tótem Andén Central', 'E14L1', '4', '1D'),
(57, 'Mupi Entrada Princip', 'E18L1', '2', '1D'),
(58, 'Andén Izquierdo', 'E18L1', '5', '1D'),
(59, 'Anden Derecho', 'E18L1', '4', '1D'),
(60, 'Tótem Andén Central', 'E18L1', '3', '1D'),
(62, 'Andén Izquierdo', 'E1L1', '2', '1D'),
(63, 'Anden Derecho', 'E1L1', '3', '1D'),
(64, 'Tótem Andén Central ', 'E1L1', '5', '1D'),
(66, 'Andén Izquierdo', 'E13L1', '3', '1D'),
(67, 'Anden Derecho', 'E13L1', '1', '1D'),
(68, 'Tótem Andén Central', 'E13L1', '4', '1D'),
(69, 'Mupi Entrada Princip', 'E20L1', '2', '1D'),
(70, 'Andén Izquierdo', 'E20L1', '2', '1D'),
(71, 'Anden Derecho', 'E20L1', '3', '1D'),
(72, 'Mupi Entrada Princip', 'E4L1', '2', '1D'),
(73, 'Anden Izquierdo', 'E4L1', '3', '1D'),
(74, 'Anden Derecho', 'E4L1', '3', '1D'),
(75, 'Tótem Andén Central ', 'E4L1', '5', '1D'),
(76, 'Mupi Entrada Princip', 'E15L1', '1', '1D'),
(77, 'Andén Izquierdo', 'E15L1', '2', '1D'),
(78, 'Anden Derecho', 'E15L1', '5', '1D'),
(79, 'Tótem Andén Central', 'E15L1', '4', '1D'),
(80, 'Mupi Entrada Princip', 'E3L1', '1', '1D'),
(81, 'Anden Izquierdo', 'E3L1', '3', '1D'),
(82, 'Anden Derecho', 'E3L1', '2', '1D'),
(83, 'Tótem Andén Central ', 'E3L1', '5', '1D'),
(84, 'Mupi Entrada Princip', 'E11L1', '3', '1D'),
(85, 'Andén Izquierdo', 'E11L1', '2', '1D'),
(86, 'Anden Derecho', 'E11L1', '4', '1D'),
(87, 'Tótem Andén Central', 'E11L1', '2', '1D'),
(88, 'Mupi Entrada Princip', 'E19L1', '2', '1D'),
(89, 'Andén Izquierdo', 'E19L1', '1', '1D'),
(90, 'Anden Derecho', 'E19L1', '3', '1D'),
(91, 'Tótem Andén Central', 'E19L1', '4', '1D'),
(92, 'Mupi Entrada Princip', 'E12L1', '1', '1D'),
(93, 'Andén Izquierdo', 'E12L1', '2', '1D'),
(94, 'Anden Derecho', 'E12L1', '2', '1D'),
(95, 'Tótem Andén Central', 'E12L1', '3', '1D'),
(96, 'Mupi Entrada Princip', 'E16L1', '1', '1D'),
(97, 'Andén Izquierdo', 'E16L1', '4', '1D'),
(98, 'Anden Derecho', 'E16L1', '1', '1D'),
(99, 'Tótem Andén Central', 'E16L1', '3', '1D'),
(100, 'Mupi Entrada Princip', 'E2L1', '3', '1D'),
(101, 'Anden Izquierdo', 'E2L1', '4', '1D'),
(102, 'Anden Derecho', 'E2L1', '5', '1D'),
(103, 'Tótem Andén Central ', 'E2L1', '2', '1D'),
(104, 'Mupi Entrada Princip', 'E6L1', '2', '1D'),
(105, 'Andén Izquierdo', 'E6L1', '3', '1D'),
(106, 'Anden Derecho', 'E6L1', '3', '1D'),
(107, 'Tótem Andén Central', 'E6L1', '5', '1D'),
(108, 'Mupi Entrada Princip', 'E5L1', '3', '1D'),
(109, 'Anden Izquierdo', 'E5L1', '2', '1D'),
(110, 'Anden Derecho', 'E5L1', '2', '1D'),
(111, 'Tótem Andén Central ', 'E5L1', '1', '1D'),
(112, 'Mupi Entrada Princip', 'E9L1', '2', '1D'),
(113, 'Andén Izquierdo', 'E9L1', '1', '1D'),
(114, 'Anden Derecho', 'E9L1', '4', '1D'),
(115, 'Tótem Andén Central', 'E9L1', '1', '1D'),
(116, 'Mupi Entrada Princip', 'E10L1', '2', '1D'),
(117, 'Andén Izquierdo', 'E10L1', '1', '1D'),
(118, 'Anden Derecho', 'E10L1', '5', '1D'),
(119, 'Tótem Andén Central', 'E10L1', '4', '1D'),
(120, 'Mupi Entrada Princip', 'E7L1', '2', '1D'),
(121, 'Andén Izquierdo', 'E7L1', '3', '1D'),
(122, 'Anden Derecho', 'E7L1', '2', '1D'),
(123, 'Tótem Andén Central', 'E7L1', '3', '1D'),
(124, 'Mupi Entrada Princip', 'E19L2', '3', '1D'),
(125, 'Anden Izquierdo', 'E19L2', '2', '1D'),
(126, 'Anden Derecho', 'E19L2', '3', '1D'),
(127, 'Tótem Andén Central', 'E19L2', '5', '1D'),
(128, 'Mupi Entrada Princip', 'E12L2', '2', '1D'),
(129, 'Anden Izquierdo', 'E12L2', '3', '1D'),
(130, 'Anden Derecho', 'E12L2', '5', '1D'),
(131, 'Tótem Andén Central', 'E12L2', '3', '1D'),
(132, 'Mupi Entrada Princip', 'E11L2', '1', '1D'),
(133, 'Anden Izquierdo', 'E11L2', '3', '1D'),
(134, 'Anden Derecho', 'E11L2', '5', '1D'),
(135, 'Tótem Andén Central', 'E11L2', '3', '1D'),
(136, 'Mupi Entrada Princip', 'E10L2', '1', '1D'),
(137, 'Anden Izquierdo', 'E10L2', '1', '1D'),
(138, 'Anden Derecho', 'E10L2', '3', '1D'),
(139, 'Tótem Andén Central', 'E10L2', '2', '1D'),
(140, 'Mupi Entrada Princip', 'E9L2', '3', '1D'),
(141, 'Anden Izquierdo', 'E9L2', '2', '1D'),
(142, 'Anden Derecho', 'E9L2', '3', '1D'),
(143, 'Tótem Andén Central', 'E9L2', '5', '1D'),
(144, 'Mupi Entrada Princip', 'E6L2', '1', '1D'),
(145, 'Anden Izquierdo', 'E6L2', '1', '1D'),
(146, 'Anden Derecho', 'E6L2', '3', '1D'),
(147, 'Tótem Andén Central', 'E5L2', '2', '1D'),
(148, 'Mupi Entrada Princip', 'E18L2', '3', '1D'),
(149, 'Anden Izquierdo', 'E18L2', '2', '1D'),
(150, 'Anden Derecho', 'E18L2', '3', '1D'),
(151, 'Tótem Andén Central', 'E18L2', '5', '1D'),
(152, 'Mupi Entrada Princip', 'E8L2', '2', '1D'),
(153, 'Anden Izquierdo', 'E8L2', '3', '1D'),
(154, 'Anden Derecho', 'E8L2', '5', '1D'),
(155, 'Tótem Andén Central', 'E8L2', '3', '1D'),
(156, 'Mupi Entrada Princip', 'E16L2', '3', '1D'),
(157, 'Anden Izquierdo', 'E16L2', '2', '1D'),
(158, 'Anden Derecho', 'E16L2', '3', '1D'),
(159, 'Tótem Andén Central', 'E16L2', '5', '1D'),
(160, 'Mupi Entrada Princip', 'E5L2', '2', '1D'),
(161, 'Anden Izquierdo', 'E5L2', '1', '1D'),
(162, 'Anden Derecho', 'E5L2', '4', '1D'),
(163, 'Tótem Andén Central', 'E5L2', '2', '1D'),
(164, 'Mupi Entrada Princip', 'E13L2', '3', '1D'),
(165, 'Anden Izquierdo', 'E13L2', '2', '1D'),
(166, 'Anden Derecho', 'E13L2', '3', '1D'),
(167, 'Tótem Andén Central', 'E13L2', '5', '1D'),
(168, 'Mupi Entrada Princip', 'E15L2', '3', '1D'),
(169, 'Anden Izquierdo', 'E15L2', '2', '1D'),
(170, 'Anden Derecho', 'E15L2', '3', '1D'),
(171, 'Tótem Andén Central', 'E15L2', '5', '1D'),
(172, 'Mupi Entrada Princip', 'E14L2', '3', '1D'),
(173, 'Anden Izquierdo', 'E14L2', '2', '1D'),
(174, 'Anden Derecho', 'E14L2', '3', '1D'),
(175, 'Tótem Andén Central', 'E14L2', '5', '1D'),
(176, 'Mupi Entrada Princip', 'E20L2', '3', '1D'),
(177, 'Anden Izquierdo', 'E20L2', '2', '1D'),
(178, 'Anden Derecho', 'E20L2', '3', '1D'),
(179, 'Tótem Andén Central', 'E20L2', '5', '1D'),
(180, 'Mupi Entrada Princip', 'E2L2', '1', '1D'),
(181, 'Anden Izquierdo', 'E2L2', '2', '1D'),
(182, 'Anden Derecho', 'E2L2', '2', '1D'),
(183, 'Tótem Andén Central', 'E2L2', '3', '1D'),
(184, 'Mupi Entrada Princip', 'E3L2', '1', '1D'),
(185, 'Anden Izquierdo', 'E3L2', '3', '1D'),
(186, 'Anden Derecho', 'E3L2', '3', '1D'),
(187, 'Tótem Andén Central', 'E3L2', '5', '1D'),
(188, 'Mupi Entrada Princip', 'E1L2', '3', '1D'),
(189, 'Anden Izquierdo', 'E1L2', '2', '1D'),
(190, 'Anden Derecho', 'E1L2', '3', '1D'),
(191, 'Tótem Andén Central ', 'E1L2', '5', '1D'),
(192, 'Mupi Entrada Princip', 'E7L2', '1', '1D'),
(193, 'Anden Izquierdo', 'E7L2', '3', '1D'),
(194, 'Anden Derecho', 'E7L2', '5', '1D'),
(195, 'Tótem Andén Central', 'E7L2', '3', '1D'),
(196, 'Mupi Entrada Princip', 'E17L2', '3', '1D'),
(197, 'Anden Izquierdo', 'E17L2', '2', '1D'),
(198, 'Anden Derecho', 'E17L2', '3', '1D'),
(199, 'Tótem Andén Central', 'E17L2', '5', '1D'),
(200, 'Mupi Entrada Princip', 'E4L2', '1', '1D'),
(201, 'Anden Izquierdo', 'E4L2', '3', '1D'),
(202, 'Anden Derecho', 'E4L2', '4', '1D'),
(203, 'Tótem Andén Central', 'E4L2', '4', '1D'),
(204, 'Mupi Entrada Princip', 'E9L3', '4', '1D'),
(205, 'Anden Izquierdo', 'E9L3', '5', '1D'),
(206, 'Anden Derecho', 'E9L3', '1', '1D'),
(207, 'Tótem Andén Central', 'E9L3', '2', '1D'),
(208, 'Mupi Entrada Princip', 'E17L3', '2', '1D'),
(209, 'Anden Izquierdo', 'E17L3', '3', '1D'),
(210, 'Anden Derecho', 'E17L3', '4', '1D'),
(211, 'Tótem Andén Central', 'E17L3', '5', '1D'),
(212, 'Mupi Entrada Princip', 'E2L3', '5', '1D'),
(213, 'Andén Izquierdo', 'E2L3', '4', '1D'),
(214, 'Anden Derecho', 'E2L3', '3', '1D'),
(215, 'Tótem Andén Central ', 'E2L3', '2', '1D'),
(216, 'Mupi Entrada Princip', 'E12L3', '2', '1D'),
(217, 'Anden Izquierdo', 'E12L3', '3', '1D'),
(218, 'Anden Derecho', 'E12L3', '4', '1D'),
(219, 'Tótem Andén Central', 'E12L3', '5', '1D'),
(220, 'Mupi Entrada Princip', 'E3L3', '3', '1D'),
(221, 'Andén Izquierdo', 'E3L3', '4', '1D'),
(222, 'Anden Derecho', 'E3L3', '2', '1D'),
(223, 'Tótem Andén Central ', 'E3L3', '3', '1D'),
(224, 'Mupi Entrada Princip', 'E19L3', '4', '1D'),
(226, 'Anden Derecho', 'E19L3', '1', '1D'),
(227, 'Tótem Andén Central ', 'E19L3', '2', '1D'),
(228, 'Mupi Entrada Princip', 'E6L3', '1', '1D'),
(229, 'Anden Izquierdo', 'E6L3', '2', '1D'),
(230, 'Anden Derecho', 'E6L3', '3', '1D'),
(231, 'Tótem Andén Central', 'E6L3', '4', '1D'),
(233, 'Anden Izquierdo', 'E20L3', '1', '1D'),
(234, 'Anden Derecho', 'E20L3', '2', '1D'),
(235, 'Tótem Andén Central', 'E20L3', '3', '1D'),
(236, 'Mupi Entrada Princip', 'E8L3', '3', '1D'),
(237, 'Anden Izquierdo', 'E8L3', '4', '1D'),
(239, 'Tótem Andén Central', 'E8L3', '1', '1D'),
(240, 'Mupi Entrada Princip', 'E13L3', '3', '1D'),
(241, 'Anden Izquierdo', 'E13L3', '4', '1D'),
(243, 'Tótem Andén Central', 'E13L3', '1', '1D'),
(245, 'Anden Izquierdo', 'E15L3', '1', '1D'),
(246, 'Anden Derecho', 'E15L3', '2', '1D'),
(247, 'Tótem Andén Central', 'E15L3', '3', '1D'),
(249, 'Andén Izquierdo', 'E4L3', '3', '1D'),
(250, 'Anden Derecho', 'E4L3', '3', '1D'),
(251, 'Tótem Andén Central ', 'E4L3', '3', '1D'),
(252, 'Mupi Entrada Princip', 'E7L3', '2', '1D'),
(253, 'Anden Izquierdo', 'E7L3', '3', '1D'),
(254, 'Anden Derecho', 'E7L3', '4', '1D'),
(257, 'Anden Izquierdo', 'E10L3', '1', '1D'),
(258, 'Anden Derecho', 'E10L3', '2', '1D'),
(259, 'Tótem Andén Central', 'E10L3', '3', '1D'),
(260, 'Mupi Entrada Princip', 'E1L3', '1', '1D'),
(261, 'Andén Izquierdo', 'E1L3', '2', '1D'),
(262, 'Anden Derecho', 'E1L3', '2', '1D'),
(263, 'Tótem Andén Central ', 'E1L3', '3', '1D'),
(264, 'Mupi Entrada Princip', 'E16L3', '1', '1D'),
(265, 'Anden Izquierdo', 'E16L3', '2', '1D'),
(266, 'Anden Derecho', 'E16L3', '3', '1D'),
(267, 'Tótem Andén Central', 'E16L3', '4', '1D'),
(269, 'Anden Derecho', 'E14L3', '1', '1D'),
(270, 'Tótem Andén Central', 'E14L3', '2', '1D'),
(271, 'Mupi Entrada Princip', 'E14L3', '4', '1D'),
(272, 'Anden Izquierdo', 'E11L3', '2', '1D'),
(273, 'Anden Derecho', 'E11L3', '3', '1D'),
(274, 'Tótem Andén Central', 'E11L3', '4', '1D'),
(275, 'Mupi Entrada Princip', 'E11L3', '1', '1D'),
(276, 'Mupi Entrada Princip', 'E18L3', '3', '1D'),
(277, 'Anden Izquierdo', 'E18L3', '4', '1D'),
(279, 'Tótem Andén Central', 'E18L3', '1', '1D'),
(280, 'Mupi Entrada Princip', 'E5L3', '3', '1D'),
(281, 'Andén Izquierdo', 'E5L3', '2', '1D'),
(282, 'Anden Derecho', 'E5L3', '3', '1D'),
(283, 'Tótem Andén Central ', 'E5L3', '3', '1D'),
(284, 'Mupi Entrada Princip', 'E4L4', '4', '1D'),
(285, 'Andén Izquierdo', 'E4L4', '2', '1D'),
(286, 'Anden Derecho', 'E4L4', '4', '1D'),
(288, 'Mupi Entrada Princip', 'E1L4', '1', '1D'),
(289, 'Andén Izquierdo', 'E1L4', '2', '1D'),
(290, 'Anden Derecho', 'E1L4', '3', '1D'),
(292, 'Mupi Entrada Princip', 'E2L4', '3', '1D'),
(293, 'Andén Izquierdo', 'E2L4', '4', '1D'),
(294, 'Anden Derecho', 'E2L4', '2', '1D'),
(295, 'Tótem Andén Central ', 'E2L4', '3', '1D'),
(296, 'Mupi Entrada Princip', 'E3L4', '2', '1D'),
(297, 'Andén Izquierdo', 'E3L4', '4', '1D'),
(298, 'Anden Derecho', 'E3L4', '1', '1D'),
(299, 'Tótem Andén Central ', 'E3L4', '3', '1D'),
(300, 'Mupi Entrada Princip', 'E5L4', '1', '1D'),
(301, 'Andén Izquierdo', 'E5L4', '4', '1D'),
(303, 'Tótem Andén Central ', 'E5L4', '3', '1D'),
(304, 'Tótem Andén Central', 'E20L1', '4', '1D'),
(75757575, 'SamsungDD', 'E12L2', '3', '1D');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puesto`
--

CREATE TABLE `puesto` (
  `Id_puesto` varchar(5) NOT NULL,
  `Puesto` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `puesto`
--

INSERT INTO `puesto` (`Id_puesto`, `Puesto`) VALUES
('1', 'Cliente'),
('2', 'Vendedor'),
('3', 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rentas`
--

CREATE TABLE `rentas` (
  `Id_renta` int(5) NOT NULL,
  `Id_usuario` int(5) NOT NULL,
  `Fecha_inicio` date NOT NULL,
  `Fecha_fin` date NOT NULL,
  `nombres_agregados` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `rentas`
--

INSERT INTO `rentas` (`Id_renta`, `Id_usuario`, `Fecha_inicio`, `Fecha_fin`, `nombres_agregados`, `usuario`) VALUES
(38, 1, '2024-03-03', '2024-03-18', 'Andén Izquierdo - 19 De Septiembre, Anden Derecho - 19 De Septiembre', 'JESUSSG');

--
-- Disparadores `rentas`
--
DELIMITER $$
CREATE TRIGGER `actualizar_estado_lotes_despues_renta` AFTER INSERT ON `rentas` FOR EACH ROW BEGIN
    -- Actualizar el estado de los lotes seleccionados a '2R' en la tabla lote
    UPDATE lote
    SET Id_status = '2R'
    WHERE Nombre_lote IN (SELECT TRIM(BOTH ',' FROM TRIM(NEW.nombres_agregados)) AS Nombre_lote);

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE `status` (
  `Id_status` varchar(5) NOT NULL,
  `Estado` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`Id_status`, `Estado`) VALUES
('1D', 'Disponible'),
('2R', 'Rentado'),
('3M', 'Mantenimiento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Id_usuario` int(5) NOT NULL,
  `Nombre` varchar(25) NOT NULL,
  `Apellido_P` varchar(25) NOT NULL,
  `Apellido_M` varchar(25) NOT NULL,
  `Nombre_usuario` varchar(25) NOT NULL,
  `Telefono` bigint(10) NOT NULL,
  `Correo` varchar(20) NOT NULL,
  `Contrasenia` varchar(8) NOT NULL,
  `Empresa` varchar(10) NOT NULL,
  `Id_puesto` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id_usuario`, `Nombre`, `Apellido_P`, `Apellido_M`, `Nombre_usuario`, `Telefono`, `Correo`, `Contrasenia`, `Empresa`, `Id_puesto`) VALUES
(1, 'JesusD', 'santos', 'perez', 'JESUSSG', 5566778899, 'DANIFANTON473@gmail.', '33333333', 'TELCEL', '1'),
(2, 'DANIEL', 'SANTIAGO', 'CRUZ', 'DANNYFANTON', 5571464599, 'DANIFANTON473@gmail.', '12345678', 'COCA-COLA', '1'),
(4, 'DANIEL', 'SANTIAGO', 'CRUZ', 'DANNYFANTON27', 5571464599, 'DANIFANTON473@gmail.', '12345678', 'COCA-COLA', '2'),
(5, 'DANIEL', 'SANTIAGO', 'CRUZ', 'DANNYFANTON28', 5571464599, 'DANIFANTON473@gmail.', '12345678', 'COCA-COLA', '3'),
(6, 'DANIEL', 'SANTIAGO', 'CRUZ', 'DANNYFANTON90', 5571464599, 'DANIFANTON473@gmail.', '12345678', 'COCA-COLA', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `dimensiones`
--
ALTER TABLE `dimensiones`
  ADD PRIMARY KEY (`Id_dimension`);

--
-- Indices de la tabla `espectacular`
--
ALTER TABLE `espectacular`
  ADD PRIMARY KEY (`Id_espectacular`),
  ADD KEY `Id_usuario` (`Id_usuario`);

--
-- Indices de la tabla `estacion`
--
ALTER TABLE `estacion`
  ADD PRIMARY KEY (`Id_estacion`),
  ADD KEY `estacion_ibfk_1` (`Id_linea`),
  ADD KEY `Nombre` (`Nombre`);

--
-- Indices de la tabla `linea`
--
ALTER TABLE `linea`
  ADD PRIMARY KEY (`Id_linea`);

--
-- Indices de la tabla `lote`
--
ALTER TABLE `lote`
  ADD PRIMARY KEY (`Id_lote`),
  ADD KEY `Id_dimension` (`Id_dimension`),
  ADD KEY `Id_status` (`Id_status`),
  ADD KEY `lote_ibfk_3` (`Id_estacion`);

--
-- Indices de la tabla `puesto`
--
ALTER TABLE `puesto`
  ADD PRIMARY KEY (`Id_puesto`);

--
-- Indices de la tabla `rentas`
--
ALTER TABLE `rentas`
  ADD PRIMARY KEY (`Id_renta`),
  ADD KEY `Id_usuario` (`Id_usuario`);

--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`Id_status`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Id_usuario`),
  ADD UNIQUE KEY `Nombre_usuario` (`Nombre_usuario`),
  ADD KEY `usuario_ibfk_2` (`Id_puesto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `lote`
--
ALTER TABLE `lote`
  MODIFY `Id_lote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75757576;

--
-- AUTO_INCREMENT de la tabla `rentas`
--
ALTER TABLE `rentas`
  MODIFY `Id_renta` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id_usuario` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estacion`
--
ALTER TABLE `estacion`
  ADD CONSTRAINT `estacion_ibfk_1` FOREIGN KEY (`Id_linea`) REFERENCES `linea` (`Id_linea`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `lote`
--
ALTER TABLE `lote`
  ADD CONSTRAINT `lote_ibfk_1` FOREIGN KEY (`Id_dimension`) REFERENCES `dimensiones` (`Id_dimension`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lote_ibfk_2` FOREIGN KEY (`Id_status`) REFERENCES `status` (`Id_status`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lote_ibfk_3` FOREIGN KEY (`Id_estacion`) REFERENCES `estacion` (`Id_estacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rentas`
--
ALTER TABLE `rentas`
  ADD CONSTRAINT `rentas_ibfk_3` FOREIGN KEY (`Id_usuario`) REFERENCES `usuario` (`Id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`Id_puesto`) REFERENCES `puesto` (`Id_puesto`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
