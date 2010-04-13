-- phpMyAdmin SQL Dump
-- version 3.2.2.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 13-04-2010 a las 10:18:37
-- Versión del servidor: 5.0.75
-- Versión de PHP: 5.2.6-3ubuntu4.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `huemul`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `id` bigint(20) NOT NULL auto_increment,
  `group_id` int(11) default NULL,
  `title` varchar(100) collate utf8_unicode_ci NOT NULL,
  `description` longtext collate utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `group_id_idx` (`group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=59 ;

--
-- Volcar la base de datos para la tabla `item`
--

INSERT INTO `item` (`id`, `group_id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 3, 'croquis de ubicacion', '', '2010-04-09 12:52:44', '2010-04-09 12:52:44'),
(2, 3, 'datos catastrales', '', '2010-04-09 12:52:44', '2010-04-09 12:52:44'),
(3, 3, 'medidas de la parcela', '', '2010-04-09 12:52:44', '2010-04-09 12:52:44'),
(4, 3, 'superficie de la parcela', '', '2010-04-09 12:52:44', '2010-04-09 12:52:44'),
(5, 3, 'distancia a esquina (encuentro de lineas municipales)', '', '2010-04-09 12:52:44', '2010-04-09 12:52:44'),
(6, 3, 'indicar el norte', '', '2010-04-09 12:52:44', '2010-04-09 12:52:44'),
(7, 3, 'nombre, numero y ancho de calles', '', '2010-04-09 12:52:44', '2010-04-09 12:52:44'),
(8, 3, 'silueta de superficie', '', '2010-04-09 12:52:44', '2010-04-09 12:52:44'),
(9, 3, 'comprobante de propiedad', '', '2010-04-09 12:52:44', '2010-04-09 12:52:44'),
(10, 3, 'ochava', '', '2010-04-09 12:52:44', '2010-04-09 12:52:44'),
(11, 3, 'restricciones al dominio', '', '2010-04-09 12:52:44', '2010-04-09 12:52:44'),
(12, 4, 'destino', '', '2010-04-09 12:52:44', '2010-04-09 12:52:44'),
(13, 4, 'compatible SI - NO', '', '2010-04-09 12:52:44', '2010-04-09 12:52:44'),
(14, 4, 'restricciones', '', '2010-04-09 12:52:44', '2010-04-09 12:52:44'),
(15, 4, 'retiro de linea municipal', '', '2010-04-09 12:52:44', '2010-04-09 12:52:44'),
(16, 4, 'estacionamientos', '', '2010-04-09 12:52:44', '2010-04-09 12:52:44'),
(17, 4, 'limite de altura', '', '2010-04-09 12:52:44', '2010-04-09 12:52:44'),
(18, 5, 'caratula reglamentaria', '', '2010-04-09 12:52:44', '2010-04-09 12:52:44'),
(19, 5, 'planta general. - (escala: 1:50 en presentacion definitiva)', '', '2010-04-09 12:52:44', '2010-04-09 12:52:44'),
(20, 5, 'niveles', '', '2010-04-09 12:52:44', '2010-04-09 12:52:44'),
(21, 5, 'cotas', '', '2010-04-09 12:52:44', '2010-04-09 12:52:44'),
(22, 5, 'L.M. - E.M.', '', '2010-04-09 12:52:44', '2010-04-09 12:52:44'),
(23, 5, 'tanque de reserva - proyeccion y capacidad - separacion de E.M.', '', '2010-04-09 12:52:44', '2010-04-09 12:52:44'),
(24, 5, 'designacion y numeracion de locales', '', '2010-04-09 12:52:44', '2010-04-09 12:52:44'),
(25, 5, 'indicacion de cortes', '', '2010-04-09 12:52:44', '2010-04-09 12:52:44'),
(26, 5, 'patios', '', '2010-04-09 12:52:45', '2010-04-09 12:52:45'),
(27, 5, 'cerco tipo de altura', '', '2010-04-09 12:52:45', '2010-04-09 12:52:45'),
(28, 5, 'vereda', '', '2010-04-09 12:52:45', '2010-04-09 12:52:45'),
(29, 5, 'desagüe cloacal primario', '', '2010-04-09 12:52:45', '2010-04-09 12:52:45'),
(30, 5, 'desagües pluviales', '', '2010-04-09 12:52:45', '2010-04-09 12:52:45'),
(31, 5, 'planta de techos', '', '2010-04-09 12:52:45', '2010-04-09 12:52:45'),
(32, 5, 'ochava regalmentaria', '', '2010-04-09 12:52:45', '2010-04-09 12:52:45'),
(33, 5, 'cortes (transversal y longitudinal)', '', '2010-04-09 12:52:45', '2010-04-09 12:52:45'),
(34, 5, 'alturas', '', '2010-04-09 12:52:45', '2010-04-09 12:52:45'),
(35, 5, 'espesor de entrepisos', '', '2010-04-09 12:52:45', '2010-04-09 12:52:45'),
(36, 5, 'niveles', '', '2010-04-09 12:52:45', '2010-04-09 12:52:45'),
(37, 5, 'carpinterias', '', '2010-04-09 12:52:45', '2010-04-09 12:52:45'),
(38, 5, 'materiales de cubierta', '', '2010-04-09 12:52:45', '2010-04-09 12:52:45'),
(39, 5, 'cielorrasos', '', '2010-04-09 12:52:45', '2010-04-09 12:52:45'),
(40, 5, 'pisos y contrapisos', '', '2010-04-09 12:52:45', '2010-04-09 12:52:45'),
(41, 5, 'fachadas', '', '2010-04-09 12:52:45', '2010-04-09 12:52:45'),
(42, 5, 'materiales de terminacion de muros', '', '2010-04-09 12:52:45', '2010-04-09 12:52:45'),
(43, 5, 'carpinterias', '', '2010-04-09 12:52:45', '2010-04-09 12:52:45'),
(44, 5, 'matriales terminacion cubiertas', '', '2010-04-09 12:52:45', '2010-04-09 12:52:45'),
(45, 5, 'tipo y altura de cerco lateral y de frente', '', '2010-04-09 12:52:45', '2010-04-09 12:52:45'),
(46, 5, 'planilla de iluminacion y ventilacion', '', '2010-04-09 12:52:45', '2010-04-09 12:52:45'),
(47, 5, 'grafismo de obra', '', '2010-04-09 12:52:45', '2010-04-09 12:52:45'),
(48, 5, 'a demoler (linea de trazos, muros llenos en amarrilo)', '', '2010-04-09 12:52:45', '2010-04-09 12:52:45'),
(49, 5, 'a construir (linea continua, muros llenos en rojo)', '', '2010-04-09 12:52:45', '2010-04-09 12:52:45'),
(50, 5, 'a empadronar (muros sin llenar)', '', '2010-04-09 12:52:45', '2010-04-09 12:52:45'),
(51, 5, 'con antecedentes municipales (rayado oblicuo)', '', '2010-04-09 12:52:45', '2010-04-09 12:52:45'),
(52, 5, 'con antecedentes municipales sin construir (rayado oblicuo y muros llenos en rojo)', '', '2010-04-09 12:52:45', '2010-04-09 12:52:45'),
(53, 5, 'en balance de superficies indicar ...', 'en balance de superficies indicar desglosado segun categorias: A) Viviendas-locales comerciales. B)depositos. C) Piscina o instalaciones libres de parte cubierta...y', '2010-04-09 12:52:45', '2010-04-09 12:52:45'),
(54, 5, 'proyecto y/o instalacion contra incendio probado por cuerpo de bomberos', '', '2010-04-09 12:52:45', '2010-04-09 12:52:45'),
(55, 5, 'factibilidad de servicio Eléctrico - gas - agua - cloacas', '', '2010-04-09 12:52:45', '2010-04-09 12:52:45'),
(56, 5, 'detalle de escalera - escalera 1:25 plantas y cortes', '', '2010-04-09 12:52:45', '2010-04-09 12:52:45'),
(57, 5, 'informe técnico resolución 841/01', '', '2010-04-09 12:52:45', '2010-04-09 12:52:45'),
(58, 6, 'Factibilidad de servicio eléctrico', 'xscsdv', '2010-04-09 13:46:41', '2010-04-09 13:46:41');

--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`);
