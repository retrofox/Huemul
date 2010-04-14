-- phpMyAdmin SQL Dump
-- version 3.2.2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 13, 2010 at 09:29 AM
-- Server version: 5.0.75
-- PHP Version: 5.2.6-3ubuntu4.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `huemul`
--

-- --------------------------------------------------------

--
-- Table structure for table `cadastral_data`
--

CREATE TABLE IF NOT EXISTS `cadastral_data` (
  `id` bigint(20) NOT NULL auto_increment,
  `circunscripcion` varchar(10) collate utf8_unicode_ci NOT NULL,
  `seccion` varchar(10) collate utf8_unicode_ci NOT NULL,
  `tipo` varchar(255) collate utf8_unicode_ci NOT NULL,
  `tipo_numero` varchar(10) collate utf8_unicode_ci NOT NULL,
  `partida_nro` varchar(10) collate utf8_unicode_ci default NULL,
  `parcela` varchar(10) collate utf8_unicode_ci NOT NULL,
  `uf` varchar(10) collate utf8_unicode_ci default NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `cadastral_data`
--

INSERT INTO `cadastral_data` (`id`, `circunscripcion`, `seccion`, `tipo`, `tipo_numero`, `partida_nro`, `parcela`, `uf`, `created_at`, `updated_at`) VALUES
(1, '3-1', 'H', 'manzana', '638', '0981292', '12', '15', '2010-04-09 13:02:10', '2010-04-09 13:12:25'),
(2, '3-1', 'H', 'manzana', '638', '0981292', '10', '15', '2010-04-09 13:47:15', '2010-04-09 13:47:15'),
(3, '31', 'M', 'manzana', '591', '', '03', '', '2010-04-12 17:40:44', '2010-04-12 17:40:44');

-- --------------------------------------------------------

--
-- Table structure for table `comunication_item`
--

CREATE TABLE IF NOT EXISTS `comunication_item` (
  `id` bigint(20) NOT NULL auto_increment,
  `revision_item_id` bigint(20) default NULL,
  `author_id` int(11) default NULL,
  `subject` varchar(255) collate utf8_unicode_ci default NULL,
  `message` longtext collate utf8_unicode_ci,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `author_id_idx` (`author_id`),
  KEY `revision_item_id_idx` (`revision_item_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `comunication_item`
--

INSERT INTO `comunication_item` (`id`, `revision_item_id`, `author_id`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 290, 7, 'dgdf', '<p>dsfsdgfdagadg</p>', '2010-04-12 08:39:44', '2010-04-12 08:39:44'),
(2, 290, 7, 'Error al leer este mensaje', '<p>La pagina debe cerrarse</p>\r\n<p>En caso de seguir operando de este modo, comuniquese de forma urgente con el servidor para evitar que el IP caduque definitivamente</p>', '2010-04-12 08:42:12', '2010-04-12 08:42:12');

-- --------------------------------------------------------

--
-- Table structure for table `formu`
--

CREATE TABLE IF NOT EXISTS `formu` (
  `id` bigint(20) NOT NULL auto_increment,
  `user_id` int(11) default NULL,
  `name` varchar(100) collate utf8_unicode_ci NOT NULL,
  `description` longtext collate utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `user_id_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `formu`
--

INSERT INTO `formu` (`id`, `user_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Type A', 'Formulario Base.', '2010-04-09 12:52:44', '2010-04-09 12:52:44'),
(2, NULL, 'PREVIA DE PLANOS', 'PLANOS DE ANTEPROYECTOS DE OBRAS A CONSTRUIR, AMPLIACIONES Y REMODELACIONES', '2010-04-12 09:08:18', '2010-04-12 09:08:18'),
(3, NULL, 'PERMISOS DE CONSTRUCCIÓN', 'PERMISOS DE OBRAS A CONSTRUIR CON PLANOS DE PREVIA REGISTRADA', '2010-04-12 09:09:02', '2010-04-12 09:09:02'),
(4, NULL, 'PERMISOS DE DEMOLICIÓN DE EDIFICIOS EXISTENTES', 'OBRAS A DEMOLER', '2010-04-12 09:10:27', '2010-04-12 09:10:27'),
(5, NULL, 'PLANOS CONFORME A OBRA', 'PLANOS DE OBRAS CONSTRUIDAS CON PERMISO DE CONSTRUCCION', '2010-04-12 09:11:15', '2010-04-12 09:11:15'),
(6, NULL, 'PLANOS DE EMPADRONAMIENTO', 'PLANOS DE OBRAS CONSTRUIDAS SIN PERMISO MUNICIPAL', '2010-04-12 09:13:05', '2010-04-12 09:13:05'),
(7, NULL, 'PLANOS DE MODIFICACION DE PROYECTOS DE OBRAS A CONSTRUIR Y/O CON PERMISO MUNICIPAL DE OBRAS', 'CUANDO SURGEN MODIFICACIONES DE PROYECTOS O AMPLIACIONES DE OBRAS DURANTE LA CONSTRUCCION DE UNA OBRA CON PERMISO MUNICIPAL', '2010-04-12 09:17:14', '2010-04-12 09:18:37'),
(8, NULL, 'FACTIBILIDAD DE USOS Y DESTINOS', 'USOS Y DESTINOS PERMITIDOS SEGÚN ZONIFICACION Y DEMÁS INDICADORES  URBANÍSTICO', '2010-04-12 09:24:29', '2010-04-12 09:28:57');

-- --------------------------------------------------------

--
-- Table structure for table `item`
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
-- Dumping data for table `item`
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

-- --------------------------------------------------------

--
-- Table structure for table `item_formu`
--

CREATE TABLE IF NOT EXISTS `item_formu` (
  `form_id` bigint(20) NOT NULL default '0',
  `item_id` bigint(20) NOT NULL default '0',
  PRIMARY KEY  (`form_id`,`item_id`),
  KEY `item_formu_item_id_item_id` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `item_formu`
--

INSERT INTO `item_formu` (`form_id`, `item_id`) VALUES
(1, 1),
(6, 1),
(1, 2),
(6, 2),
(1, 3),
(6, 3),
(1, 4),
(6, 4),
(1, 5),
(6, 5),
(1, 6),
(6, 6),
(1, 7),
(6, 7),
(1, 8),
(6, 8),
(1, 9),
(6, 9),
(1, 10),
(6, 10),
(1, 11),
(6, 11),
(1, 12),
(6, 12),
(1, 13),
(6, 13),
(1, 14),
(6, 14),
(1, 15),
(6, 15),
(1, 16),
(6, 16),
(1, 17),
(6, 17),
(1, 18),
(6, 18),
(1, 19),
(6, 19),
(1, 20),
(6, 20),
(1, 21),
(6, 21),
(1, 22),
(6, 22),
(1, 23),
(6, 23),
(1, 24),
(6, 24),
(1, 25),
(6, 25),
(1, 26),
(6, 26),
(1, 27),
(6, 27),
(1, 28),
(6, 28),
(1, 29),
(6, 29),
(1, 30),
(6, 30),
(1, 31),
(6, 31),
(1, 32),
(6, 32),
(1, 33),
(6, 33),
(1, 34),
(6, 34),
(1, 35),
(6, 35),
(1, 36),
(6, 36),
(1, 37),
(2, 37),
(6, 37),
(1, 38),
(6, 38),
(1, 39),
(6, 39),
(1, 40),
(6, 40),
(1, 41),
(6, 41),
(1, 42),
(6, 42),
(1, 43),
(6, 43),
(1, 44),
(6, 44),
(1, 45),
(6, 45),
(1, 46),
(6, 46),
(1, 47),
(6, 47),
(1, 48),
(6, 48),
(1, 49),
(6, 49),
(1, 50),
(6, 50),
(1, 51),
(6, 51),
(1, 52),
(6, 52),
(1, 53),
(6, 53),
(1, 54),
(6, 54),
(1, 55),
(6, 55),
(1, 56),
(6, 56),
(1, 57),
(6, 57),
(1, 58),
(6, 58);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(100) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `location`
--


-- --------------------------------------------------------

--
-- Table structure for table `profession`
--

CREATE TABLE IF NOT EXISTS `profession` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(100) collate utf8_unicode_ci NOT NULL,
  `description` longtext collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `profession`
--

INSERT INTO `profession` (`id`, `name`, `description`) VALUES
(1, 'Agrimensor', ''),
(2, 'Ingeniero', ''),
(3, 'Arquitecto', ''),
(4, 'Maestro Mayor de Obras', ''),
(5, 'Tecnico en Construcciones', '');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
  `id` bigint(20) NOT NULL auto_increment,
  `sf_guard_user_id` int(11) default NULL,
  `first_name` varchar(100) collate utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) collate utf8_unicode_ci NOT NULL,
  `profesion_id` bigint(20) default NULL,
  `registration` varchar(40) collate utf8_unicode_ci default NULL,
  `birth_date` date default NULL,
  `documment_type` varchar(255) collate utf8_unicode_ci default 'dni',
  `documment` varchar(12) collate utf8_unicode_ci default NULL,
  `phone` varchar(40) collate utf8_unicode_ci default NULL,
  `movil` varchar(40) collate utf8_unicode_ci default NULL,
  `email` varchar(60) collate utf8_unicode_ci default NULL,
  `addres` varchar(100) collate utf8_unicode_ci default NULL,
  `country` varchar(50) collate utf8_unicode_ci default NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `latitude` float(18,2) default NULL,
  `longitude` float(18,2) default NULL,
  `mugshot` varchar(255) collate utf8_unicode_ci default NULL,
  `mugshot_x1` bigint(20) default NULL,
  `mugshot_y1` bigint(20) default NULL,
  `mugshot_x2` bigint(20) default NULL,
  `mugshot_y2` bigint(20) default NULL,
  PRIMARY KEY  (`id`),
  KEY `sf_guard_user_id_idx` (`sf_guard_user_id`),
  KEY `profesion_id_idx` (`profesion_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `sf_guard_user_id`, `first_name`, `last_name`, `profesion_id`, `registration`, `birth_date`, `documment_type`, `documment`, `phone`, `movil`, `email`, `addres`, `country`, `created_at`, `updated_at`, `latitude`, `longitude`, `mugshot`, `mugshot_x1`, `mugshot_y1`, `mugshot_x2`, `mugshot_y2`) VALUES
(1, 2, 'Roberto Damian', 'Suarez', 3, '', '0000-00-00', 'dni', '26144030', '0299 4778030', '', 'damian.suarez@xifox.net', 'Don Bosco 869', 'Argentina', '2010-04-09 12:52:44', '2010-04-09 13:19:12', NULL, NULL, '8c85d3d71ba3b4818fcd5e747de539f0097a559c.jpg', 28, 7, 370, 349),
(2, 3, 'Alex Claudio Andres', 'Melo', NULL, NULL, '0000-00-00', 'dni', '40123123', '0299 4790580', '299155155155', 'alex.melo@xifox.net', 'belgrano 365', 'Argentina', '2010-04-09 12:52:44', '2010-04-09 12:52:44', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 1, 'Admin', 'admin', NULL, '', '2010-01-01', 'dni', '', '', '', '', '', '', '2010-04-09 13:24:11', '2010-04-09 13:24:11', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 5, 'ROBERTO ANDRES', 'BIANCHI', 3, '', '1958-05-10', 'dni', '12750518', '4485307', '154298958', 'robertoandresbianchi@hotmail.com', 'Illia y Leloir bº Bocahue uf 57', 'NEUQUEN', '2010-04-09 14:17:59', '2010-04-09 14:54:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 6, 'ADRIANA PATRICIA', 'LAURENTE', 3, '', '1958-03-17', 'dni', '12979183', '4772224', '154511397', 'alaurente@infovia.com.ar ', 'CASTAGNINO 1796', 'CIPOLLETTI', '2010-04-09 14:23:32', '2010-04-09 14:23:32', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 7, 'SEBASTIAN', 'PALETTA', 1, 'A-3922-2', '2005-07-11', 'dni', '30351853', '', '155493557', 'spaletta@yahoo.com.ar', 'Castagnino 1791', 'Argentina', '2010-04-09 14:26:21', '2010-04-12 08:32:02', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 8, 'Jorge Humberto', 'Suárez', 2, 'A-3802-2', '2005-10-31', 'dni', '18.514.966', '-', '0299-15504770', 'ingjhsuarez@hotmail.com', 'Capitán Gomez 1333', 'Argentina', '2010-04-12 07:59:25', '2010-04-12 08:03:19', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 9, 'MARIA VERONICA', 'ALI', 3, '', '1972-01-25', 'dni', '', '', '', '', '', '', '2010-04-12 08:26:33', '2010-04-12 08:26:33', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE IF NOT EXISTS `province` (
  `id` bigint(20) NOT NULL auto_increment,
  `name` varchar(100) collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `province`
--


-- --------------------------------------------------------

--
-- Table structure for table `revision`
--

CREATE TABLE IF NOT EXISTS `revision` (
  `id` bigint(20) NOT NULL auto_increment,
  `number` bigint(20) default NULL,
  `parent_id` bigint(20) default NULL,
  `procedure_id` bigint(20) default NULL,
  `revision_state_id` smallint(6) default NULL,
  `creator_id` int(11) default NULL,
  `block` tinyint(1) default '0',
  `description` longtext collate utf8_unicode_ci,
  `file` varchar(255) collate utf8_unicode_ci default NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `creator_id_idx` (`creator_id`),
  KEY `procedure_id_idx` (`procedure_id`),
  KEY `revision_state_id_idx` (`revision_state_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=34 ;

--
-- Dumping data for table `revision`
--

INSERT INTO `revision` (`id`, `number`, `parent_id`, `procedure_id`, `revision_state_id`, `creator_id`, `block`, `description`, `file`, `created_at`, `updated_at`) VALUES
(1, 0, NULL, 1, 1, 2, 1, NULL, NULL, '2010-04-09 13:02:10', '2010-04-09 13:02:10'),
(2, 1, NULL, 1, 5, 2, 1, '<p>Este es mi plano.</p>', '266ce60df8eae2c051a437f37fc127c8a7eef6dd.jpg', '2010-04-09 13:17:20', '2010-04-09 13:43:00'),
(3, 2, 2, 1, 8, 1, 1, NULL, NULL, '2010-04-09 13:43:00', '2010-04-12 08:19:39'),
(4, 0, NULL, 2, 1, 1, 1, NULL, NULL, '2010-04-09 13:47:15', '2010-04-09 13:47:15'),
(5, 1, NULL, 2, 5, 1, 1, '<p>sdfsdf</p>', '863f87c9845eb8d7e9e8959ba40810773f56cfa4.jpg', '2010-04-09 13:47:24', '2010-04-09 13:47:36'),
(6, 2, 5, 2, 8, 1, 1, NULL, NULL, '2010-04-09 13:47:36', '2010-04-12 08:43:00'),
(7, 3, 2, 1, 8, 1, 1, NULL, NULL, '2010-04-12 08:19:39', '2010-04-12 08:22:38'),
(8, 4, 2, 1, 8, 1, 1, NULL, NULL, '2010-04-12 08:22:38', '2010-04-12 08:28:36'),
(9, 5, 2, 1, 8, 7, 1, NULL, NULL, '2010-04-12 08:28:36', '2010-04-12 08:36:29'),
(10, 6, 2, 1, 8, 7, 1, NULL, NULL, '2010-04-12 08:36:29', '2010-04-12 08:43:44'),
(11, 3, 5, 2, 8, 7, 1, NULL, NULL, '2010-04-12 08:43:00', '2010-04-12 08:44:58'),
(12, 7, 2, 1, 8, 7, 1, NULL, NULL, '2010-04-12 08:43:44', '2010-04-12 08:45:27'),
(13, 4, 5, 2, 8, 9, 1, NULL, NULL, '2010-04-12 08:44:58', '2010-04-12 08:45:43'),
(14, 8, 2, 1, 8, 9, 1, NULL, NULL, '2010-04-12 08:45:27', '2010-04-12 09:12:25'),
(15, 5, 5, 2, 8, 9, 0, NULL, NULL, '2010-04-12 08:45:43', '2010-04-12 08:45:43'),
(16, 9, 2, 1, 8, 1, 0, NULL, NULL, '2010-04-12 09:12:25', '2010-04-12 09:12:25'),
(17, 0, NULL, 3, 1, 8, 1, NULL, NULL, '2010-04-12 17:40:44', '2010-04-12 17:40:44'),
(18, 1, NULL, 3, 5, 8, 1, '<p>Plano de Empadronamiento</p>', 'f0a97a65f174f97ed93a7d655a0677bc104b266b.pdf', '2010-04-12 17:43:06', '2010-04-13 07:53:05'),
(19, 2, 18, 3, 7, 1, 1, NULL, NULL, '2010-04-13 07:53:05', '2010-04-13 07:53:24'),
(20, 3, 19, 3, 8, 1, 1, NULL, NULL, '2010-04-13 07:53:33', '2010-04-13 07:53:48'),
(21, 4, 18, 3, 8, 1, 1, NULL, NULL, '2010-04-13 07:53:48', '2010-04-13 07:57:14'),
(22, 5, 18, 3, 8, 1, 1, NULL, NULL, '2010-04-13 07:57:14', '2010-04-13 07:58:52'),
(23, 6, 18, 3, 8, 1, 1, NULL, NULL, '2010-04-13 07:58:52', '2010-04-13 08:00:21'),
(24, 7, 18, 3, 8, 1, 1, NULL, NULL, '2010-04-13 08:00:21', '2010-04-13 08:02:20'),
(25, 8, 18, 3, 8, 1, 1, NULL, NULL, '2010-04-13 08:02:20', '2010-04-13 08:03:01'),
(26, 9, 18, 3, 8, 1, 1, NULL, NULL, '2010-04-13 08:03:01', '2010-04-13 08:04:53'),
(27, 10, 18, 3, 8, 1, 1, NULL, NULL, '2010-04-13 08:04:53', '2010-04-13 08:05:47'),
(28, 11, 18, 3, 8, 1, 1, NULL, NULL, '2010-04-13 08:05:47', '2010-04-13 08:23:23'),
(29, 12, 18, 3, 8, 1, 1, NULL, NULL, '2010-04-13 08:23:23', '2010-04-13 08:23:38'),
(30, 13, 25, 3, 8, 1, 1, NULL, NULL, '2010-04-13 08:23:38', '2010-04-13 08:44:52'),
(31, 14, 18, 3, 8, 1, 1, NULL, NULL, '2010-04-13 08:44:52', '2010-04-13 09:02:02'),
(32, 15, 18, 3, 8, 1, 1, NULL, NULL, '2010-04-13 09:02:02', '2010-04-13 09:02:42'),
(33, 16, 18, 3, 8, 1, 0, NULL, NULL, '2010-04-13 09:02:42', '2010-04-13 09:02:42');

-- --------------------------------------------------------

--
-- Table structure for table `revision_item`
--

CREATE TABLE IF NOT EXISTS `revision_item` (
  `id` bigint(20) NOT NULL auto_increment,
  `item_id` bigint(20) default NULL,
  `revision_id` bigint(20) default NULL,
  `user_id` int(11) default NULL,
  `state` varchar(255) collate utf8_unicode_ci default 'nc',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `myIndexs_idx` (`item_id`,`revision_id`),
  KEY `item_id_idx` (`item_id`),
  KEY `revision_id_idx` (`revision_id`),
  KEY `user_id_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=696 ;

--
-- Dumping data for table `revision_item`
--

INSERT INTO `revision_item` (`id`, `item_id`, `revision_id`, `user_id`, `state`) VALUES
(1, 1, 3, 1, 'nc'),
(2, 2, 3, 1, 'nc'),
(3, 3, 3, 1, 'nc'),
(4, 4, 3, 1, 'nc'),
(5, 5, 3, 1, 'nc'),
(6, 6, 3, 1, 'nc'),
(7, 7, 3, 1, 'nc'),
(8, 8, 3, 1, 'nc'),
(9, 9, 3, 1, 'nc'),
(10, 10, 3, 1, 'nc'),
(11, 11, 3, 1, 'nc'),
(12, 12, 3, 1, 'nc'),
(13, 13, 3, 1, 'nc'),
(14, 14, 3, 1, 'nc'),
(15, 15, 3, 1, 'nc'),
(16, 16, 3, 1, 'nc'),
(17, 17, 3, 1, 'nc'),
(18, 18, 3, 1, 'nc'),
(19, 19, 3, 1, 'nc'),
(20, 20, 3, 1, 'nc'),
(21, 21, 3, 1, 'nc'),
(22, 22, 3, 1, 'nc'),
(23, 23, 3, 1, 'nc'),
(24, 24, 3, 1, 'nc'),
(25, 25, 3, 1, 'nc'),
(26, 26, 3, 1, 'nc'),
(27, 27, 3, 1, 'nc'),
(28, 28, 3, 1, 'nc'),
(29, 29, 3, 1, 'nc'),
(30, 30, 3, 1, 'nc'),
(31, 31, 3, 1, 'nc'),
(32, 32, 3, 1, 'nc'),
(33, 33, 3, 1, 'nc'),
(34, 34, 3, 1, 'nc'),
(35, 35, 3, 1, 'nc'),
(36, 36, 3, 1, 'nc'),
(37, 37, 3, 1, 'nc'),
(38, 38, 3, 1, 'nc'),
(39, 39, 3, 1, 'nc'),
(40, 40, 3, 1, 'nc'),
(41, 41, 3, 1, 'nc'),
(42, 42, 3, 1, 'nc'),
(43, 43, 3, 1, 'nc'),
(44, 44, 3, 1, 'nc'),
(45, 45, 3, 1, 'nc'),
(46, 46, 3, 1, 'nc'),
(47, 47, 3, 1, 'nc'),
(48, 48, 3, 1, 'nc'),
(49, 49, 3, 1, 'nc'),
(50, 50, 3, 1, 'nc'),
(51, 51, 3, 1, 'nc'),
(52, 52, 3, 1, 'nc'),
(53, 53, 3, 1, 'nc'),
(54, 54, 3, 1, 'nc'),
(55, 55, 3, 1, 'nc'),
(56, 56, 3, 1, 'nc'),
(57, 57, 3, 1, 'nc'),
(58, 1, 6, 1, 'nc'),
(59, 2, 6, 1, 'nc'),
(60, 3, 6, 1, 'nc'),
(61, 4, 6, 1, 'nc'),
(62, 5, 6, 1, 'nc'),
(63, 6, 6, 1, 'nc'),
(64, 7, 6, 1, 'nc'),
(65, 8, 6, 1, 'nc'),
(66, 9, 6, 1, 'nc'),
(67, 10, 6, 1, 'nc'),
(68, 11, 6, 1, 'nc'),
(69, 12, 6, 1, 'nc'),
(70, 13, 6, 1, 'nc'),
(71, 14, 6, 1, 'nc'),
(72, 15, 6, 1, 'nc'),
(73, 16, 6, 1, 'nc'),
(74, 17, 6, 1, 'nc'),
(75, 18, 6, 1, 'nc'),
(76, 19, 6, 1, 'nc'),
(77, 20, 6, 1, 'nc'),
(78, 21, 6, 1, 'nc'),
(79, 22, 6, 1, 'nc'),
(80, 23, 6, 1, 'nc'),
(81, 24, 6, 1, 'nc'),
(82, 25, 6, 1, 'nc'),
(83, 26, 6, 1, 'nc'),
(84, 27, 6, 1, 'nc'),
(85, 28, 6, 1, 'nc'),
(86, 29, 6, 1, 'nc'),
(87, 30, 6, 1, 'nc'),
(88, 31, 6, 1, 'nc'),
(89, 32, 6, 1, 'nc'),
(90, 33, 6, 1, 'nc'),
(91, 34, 6, 1, 'nc'),
(92, 35, 6, 1, 'nc'),
(93, 36, 6, 1, 'nc'),
(94, 37, 6, 1, 'nc'),
(95, 38, 6, 1, 'nc'),
(96, 39, 6, 1, 'nc'),
(97, 40, 6, 1, 'nc'),
(98, 41, 6, 1, 'nc'),
(99, 42, 6, 1, 'nc'),
(100, 43, 6, 1, 'nc'),
(101, 44, 6, 1, 'nc'),
(102, 45, 6, 1, 'nc'),
(103, 46, 6, 1, 'nc'),
(104, 47, 6, 1, 'nc'),
(105, 48, 6, 1, 'nc'),
(106, 49, 6, 1, 'nc'),
(107, 50, 6, 1, 'nc'),
(108, 51, 6, 1, 'nc'),
(109, 52, 6, 1, 'nc'),
(110, 53, 6, 1, 'nc'),
(111, 54, 6, 1, 'nc'),
(112, 55, 6, 1, 'nc'),
(113, 56, 6, 1, 'nc'),
(114, 57, 6, 1, 'nc'),
(115, 58, 6, 1, 'nc'),
(116, 1, 7, 1, 'nc'),
(117, 2, 7, 1, 'nc'),
(118, 3, 7, 1, 'nc'),
(119, 4, 7, 1, 'nc'),
(120, 5, 7, 1, 'nc'),
(121, 6, 7, 1, 'nc'),
(122, 7, 7, 1, 'nc'),
(123, 8, 7, 1, 'nc'),
(124, 9, 7, 1, 'nc'),
(125, 10, 7, 1, 'nc'),
(126, 11, 7, 1, 'nc'),
(127, 12, 7, 1, 'nc'),
(128, 13, 7, 1, 'nc'),
(129, 14, 7, 1, 'nc'),
(130, 15, 7, 1, 'nc'),
(131, 16, 7, 1, 'nc'),
(132, 17, 7, 1, 'nc'),
(133, 18, 7, 1, 'nc'),
(134, 19, 7, 1, 'nc'),
(135, 20, 7, 1, 'nc'),
(136, 21, 7, 1, 'nc'),
(137, 22, 7, 1, 'nc'),
(138, 23, 7, 1, 'nc'),
(139, 24, 7, 1, 'nc'),
(140, 25, 7, 1, 'nc'),
(141, 26, 7, 1, 'nc'),
(142, 27, 7, 1, 'nc'),
(143, 28, 7, 1, 'nc'),
(144, 29, 7, 1, 'nc'),
(145, 30, 7, 1, 'nc'),
(146, 31, 7, 1, 'nc'),
(147, 32, 7, 1, 'nc'),
(148, 33, 7, 1, 'nc'),
(149, 34, 7, 1, 'nc'),
(150, 35, 7, 1, 'nc'),
(151, 36, 7, 1, 'nc'),
(152, 37, 7, 1, 'nc'),
(153, 38, 7, 1, 'nc'),
(154, 39, 7, 1, 'nc'),
(155, 40, 7, 1, 'nc'),
(156, 41, 7, 1, 'nc'),
(157, 42, 7, 1, 'nc'),
(158, 43, 7, 1, 'nc'),
(159, 44, 7, 1, 'nc'),
(160, 45, 7, 1, 'nc'),
(161, 46, 7, 1, 'nc'),
(162, 47, 7, 1, 'nc'),
(163, 48, 7, 1, 'nc'),
(164, 49, 7, 1, 'nc'),
(165, 50, 7, 1, 'nc'),
(166, 51, 7, 1, 'nc'),
(167, 52, 7, 1, 'nc'),
(168, 53, 7, 1, 'nc'),
(169, 54, 7, 1, 'nc'),
(170, 55, 7, 1, 'nc'),
(171, 56, 7, 1, 'nc'),
(172, 57, 7, 1, 'nc'),
(173, 58, 7, 1, 'nc'),
(174, 1, 8, 1, 'nc'),
(175, 2, 8, 1, 'nc'),
(176, 3, 8, 1, 'nc'),
(177, 4, 8, 1, 'nc'),
(178, 5, 8, 1, 'nc'),
(179, 6, 8, 1, 'nc'),
(180, 7, 8, 1, 'nc'),
(181, 8, 8, 1, 'nc'),
(182, 9, 8, 1, 'nc'),
(183, 10, 8, 1, 'nc'),
(184, 11, 8, 1, 'nc'),
(185, 12, 8, 1, 'nc'),
(186, 13, 8, 1, 'nc'),
(187, 14, 8, 1, 'nc'),
(188, 15, 8, 1, 'nc'),
(189, 16, 8, 1, 'nc'),
(190, 17, 8, 1, 'nc'),
(191, 18, 8, 1, 'nc'),
(192, 19, 8, 1, 'nc'),
(193, 20, 8, 1, 'nc'),
(194, 21, 8, 1, 'nc'),
(195, 22, 8, 1, 'nc'),
(196, 23, 8, 1, 'nc'),
(197, 24, 8, 1, 'nc'),
(198, 25, 8, 1, 'nc'),
(199, 26, 8, 1, 'nc'),
(200, 27, 8, 1, 'nc'),
(201, 28, 8, 1, 'nc'),
(202, 29, 8, 1, 'nc'),
(203, 30, 8, 1, 'nc'),
(204, 31, 8, 1, 'nc'),
(205, 32, 8, 1, 'nc'),
(206, 33, 8, 1, 'nc'),
(207, 34, 8, 1, 'nc'),
(208, 35, 8, 1, 'nc'),
(209, 36, 8, 1, 'nc'),
(210, 37, 8, 1, 'nc'),
(211, 38, 8, 1, 'nc'),
(212, 39, 8, 1, 'nc'),
(213, 40, 8, 1, 'nc'),
(214, 41, 8, 1, 'nc'),
(215, 42, 8, 1, 'nc'),
(216, 43, 8, 1, 'nc'),
(217, 44, 8, 1, 'nc'),
(218, 45, 8, 1, 'nc'),
(219, 46, 8, 1, 'nc'),
(220, 47, 8, 1, 'nc'),
(221, 48, 8, 1, 'nc'),
(222, 49, 8, 1, 'nc'),
(223, 50, 8, 1, 'nc'),
(224, 51, 8, 1, 'nc'),
(225, 52, 8, 1, 'nc'),
(226, 53, 8, 1, 'nc'),
(227, 54, 8, 1, 'nc'),
(228, 55, 8, 1, 'nc'),
(229, 56, 8, 1, 'nc'),
(230, 57, 8, 1, 'nc'),
(231, 58, 8, 1, 'nc'),
(232, 1, 9, 7, 'nc'),
(233, 2, 9, 7, 'nc'),
(234, 3, 9, 7, 'nc'),
(235, 4, 9, 7, 'nc'),
(236, 5, 9, 7, 'nc'),
(237, 6, 9, 7, 'nc'),
(238, 7, 9, 7, 'nc'),
(239, 8, 9, 7, 'nc'),
(240, 9, 9, 7, 'nc'),
(241, 10, 9, 7, 'nc'),
(242, 11, 9, 7, 'nc'),
(243, 12, 9, 7, 'nc'),
(244, 13, 9, 7, 'nc'),
(245, 14, 9, 7, 'nc'),
(246, 15, 9, 7, 'nc'),
(247, 16, 9, 7, 'nc'),
(248, 17, 9, 7, 'nc'),
(249, 18, 9, 7, 'nc'),
(250, 19, 9, 7, 'nc'),
(251, 20, 9, 7, 'nc'),
(252, 21, 9, 7, 'nc'),
(253, 22, 9, 7, 'nc'),
(254, 23, 9, 7, 'nc'),
(255, 24, 9, 7, 'nc'),
(256, 25, 9, 7, 'nc'),
(257, 26, 9, 7, 'nc'),
(258, 27, 9, 7, 'nc'),
(259, 28, 9, 7, 'nc'),
(260, 29, 9, 7, 'nc'),
(261, 30, 9, 7, 'nc'),
(262, 31, 9, 7, 'nc'),
(263, 32, 9, 7, 'nc'),
(264, 33, 9, 7, 'nc'),
(265, 34, 9, 7, 'nc'),
(266, 35, 9, 7, 'nc'),
(267, 36, 9, 7, 'nc'),
(268, 37, 9, 7, 'nc'),
(269, 38, 9, 7, 'nc'),
(270, 39, 9, 7, 'nc'),
(271, 40, 9, 7, 'nc'),
(272, 41, 9, 7, 'nc'),
(273, 42, 9, 7, 'nc'),
(274, 43, 9, 7, 'nc'),
(275, 44, 9, 7, 'nc'),
(276, 45, 9, 7, 'nc'),
(277, 46, 9, 7, 'nc'),
(278, 47, 9, 7, 'nc'),
(279, 48, 9, 7, 'nc'),
(280, 49, 9, 7, 'nc'),
(281, 50, 9, 7, 'nc'),
(282, 51, 9, 7, 'nc'),
(283, 52, 9, 7, 'nc'),
(284, 53, 9, 7, 'nc'),
(285, 54, 9, 7, 'nc'),
(286, 55, 9, 7, 'nc'),
(287, 56, 9, 7, 'nc'),
(288, 57, 9, 7, 'nc'),
(289, 58, 9, 7, 'nc'),
(290, 1, 10, 7, 'nc'),
(291, 2, 10, 7, 'nc'),
(292, 3, 10, 7, 'nc'),
(293, 4, 10, 7, 'nc'),
(294, 5, 10, 7, 'nc'),
(295, 6, 10, 7, 'nc'),
(296, 7, 10, 7, 'nc'),
(297, 8, 10, 7, 'nc'),
(298, 9, 10, 7, 'nc'),
(299, 10, 10, 7, 'nc'),
(300, 11, 10, 7, 'nc'),
(301, 12, 10, 7, 'nc'),
(302, 13, 10, 7, 'nc'),
(303, 14, 10, 7, 'nc'),
(304, 15, 10, 7, 'nc'),
(305, 16, 10, 7, 'nc'),
(306, 17, 10, 7, 'nc'),
(307, 18, 10, 7, 'nc'),
(308, 19, 10, 7, 'nc'),
(309, 20, 10, 7, 'nc'),
(310, 21, 10, 7, 'nc'),
(311, 22, 10, 7, 'nc'),
(312, 23, 10, 7, 'nc'),
(313, 24, 10, 7, 'nc'),
(314, 25, 10, 7, 'nc'),
(315, 26, 10, 7, 'nc'),
(316, 27, 10, 7, 'nc'),
(317, 28, 10, 7, 'nc'),
(318, 29, 10, 7, 'nc'),
(319, 30, 10, 7, 'nc'),
(320, 31, 10, 7, 'nc'),
(321, 32, 10, 7, 'nc'),
(322, 33, 10, 7, 'nc'),
(323, 34, 10, 7, 'nc'),
(324, 35, 10, 7, 'nc'),
(325, 36, 10, 7, 'nc'),
(326, 37, 10, 7, 'nc'),
(327, 38, 10, 7, 'nc'),
(328, 39, 10, 7, 'nc'),
(329, 40, 10, 7, 'nc'),
(330, 41, 10, 7, 'nc'),
(331, 42, 10, 7, 'nc'),
(332, 43, 10, 7, 'nc'),
(333, 44, 10, 7, 'nc'),
(334, 45, 10, 7, 'nc'),
(335, 46, 10, 7, 'nc'),
(336, 47, 10, 7, 'nc'),
(337, 48, 10, 7, 'nc'),
(338, 49, 10, 7, 'nc'),
(339, 50, 10, 7, 'nc'),
(340, 51, 10, 7, 'nc'),
(341, 52, 10, 7, 'nc'),
(342, 53, 10, 7, 'nc'),
(343, 54, 10, 7, 'nc'),
(344, 55, 10, 7, 'nc'),
(345, 56, 10, 7, 'nc'),
(346, 57, 10, 7, 'nc'),
(347, 58, 10, 7, 'nc'),
(348, 1, 11, 7, 'nc'),
(349, 2, 11, 7, 'nc'),
(350, 3, 11, 7, 'nc'),
(351, 4, 11, 7, 'nc'),
(352, 5, 11, 7, 'nc'),
(353, 6, 11, 7, 'nc'),
(354, 7, 11, 7, 'nc'),
(355, 8, 11, 7, 'nc'),
(356, 9, 11, 7, 'nc'),
(357, 10, 11, 7, 'nc'),
(358, 11, 11, 7, 'nc'),
(359, 12, 11, 7, 'nc'),
(360, 13, 11, 7, 'nc'),
(361, 14, 11, 7, 'nc'),
(362, 15, 11, 7, 'nc'),
(363, 16, 11, 7, 'nc'),
(364, 17, 11, 7, 'nc'),
(365, 18, 11, 7, 'nc'),
(366, 19, 11, 7, 'nc'),
(367, 20, 11, 7, 'nc'),
(368, 21, 11, 7, 'nc'),
(369, 22, 11, 7, 'nc'),
(370, 23, 11, 7, 'nc'),
(371, 24, 11, 7, 'nc'),
(372, 25, 11, 7, 'nc'),
(373, 26, 11, 7, 'nc'),
(374, 27, 11, 7, 'nc'),
(375, 28, 11, 7, 'nc'),
(376, 29, 11, 7, 'nc'),
(377, 30, 11, 7, 'nc'),
(378, 31, 11, 7, 'nc'),
(379, 32, 11, 7, 'nc'),
(380, 33, 11, 7, 'nc'),
(381, 34, 11, 7, 'nc'),
(382, 35, 11, 7, 'nc'),
(383, 36, 11, 7, 'nc'),
(384, 37, 11, 7, 'nc'),
(385, 38, 11, 7, 'nc'),
(386, 39, 11, 7, 'nc'),
(387, 40, 11, 7, 'nc'),
(388, 41, 11, 7, 'nc'),
(389, 42, 11, 7, 'nc'),
(390, 43, 11, 7, 'nc'),
(391, 44, 11, 7, 'nc'),
(392, 45, 11, 7, 'nc'),
(393, 46, 11, 7, 'nc'),
(394, 47, 11, 7, 'nc'),
(395, 48, 11, 7, 'nc'),
(396, 49, 11, 7, 'nc'),
(397, 50, 11, 7, 'nc'),
(398, 51, 11, 7, 'nc'),
(399, 52, 11, 7, 'nc'),
(400, 53, 11, 7, 'nc'),
(401, 54, 11, 7, 'nc'),
(402, 55, 11, 7, 'nc'),
(403, 56, 11, 7, 'nc'),
(404, 57, 11, 7, 'nc'),
(405, 58, 11, 7, 'nc'),
(406, 1, 12, 7, 'nc'),
(407, 2, 12, 7, 'nc'),
(408, 3, 12, 7, 'nc'),
(409, 4, 12, 7, 'nc'),
(410, 5, 12, 7, 'nc'),
(411, 6, 12, 7, 'nc'),
(412, 7, 12, 7, 'nc'),
(413, 8, 12, 7, 'nc'),
(414, 9, 12, 7, 'nc'),
(415, 10, 12, 7, 'nc'),
(416, 11, 12, 7, 'nc'),
(417, 12, 12, 7, 'nc'),
(418, 13, 12, 7, 'nc'),
(419, 14, 12, 7, 'nc'),
(420, 15, 12, 7, 'nc'),
(421, 16, 12, 7, 'nc'),
(422, 17, 12, 7, 'nc'),
(423, 18, 12, 7, 'nc'),
(424, 19, 12, 7, 'nc'),
(425, 20, 12, 7, 'nc'),
(426, 21, 12, 7, 'nc'),
(427, 22, 12, 7, 'nc'),
(428, 23, 12, 7, 'nc'),
(429, 24, 12, 7, 'nc'),
(430, 25, 12, 7, 'nc'),
(431, 26, 12, 7, 'nc'),
(432, 27, 12, 7, 'nc'),
(433, 28, 12, 7, 'nc'),
(434, 29, 12, 7, 'nc'),
(435, 30, 12, 7, 'nc'),
(436, 31, 12, 7, 'nc'),
(437, 32, 12, 7, 'nc'),
(438, 33, 12, 7, 'nc'),
(439, 34, 12, 7, 'nc'),
(440, 35, 12, 7, 'nc'),
(441, 36, 12, 7, 'nc'),
(442, 37, 12, 7, 'nc'),
(443, 38, 12, 7, 'nc'),
(444, 39, 12, 7, 'nc'),
(445, 40, 12, 7, 'nc'),
(446, 41, 12, 7, 'nc'),
(447, 42, 12, 7, 'nc'),
(448, 43, 12, 7, 'nc'),
(449, 44, 12, 7, 'nc'),
(450, 45, 12, 7, 'nc'),
(451, 46, 12, 7, 'nc'),
(452, 47, 12, 7, 'nc'),
(453, 48, 12, 7, 'nc'),
(454, 49, 12, 7, 'nc'),
(455, 50, 12, 7, 'nc'),
(456, 51, 12, 7, 'nc'),
(457, 52, 12, 7, 'nc'),
(458, 53, 12, 7, 'nc'),
(459, 54, 12, 7, 'nc'),
(460, 55, 12, 7, 'nc'),
(461, 56, 12, 7, 'nc'),
(462, 57, 12, 7, 'nc'),
(463, 58, 12, 7, 'nc'),
(464, 1, 13, 9, 'nc'),
(465, 2, 13, 9, 'nc'),
(466, 3, 13, 9, 'nc'),
(467, 4, 13, 9, 'nc'),
(468, 5, 13, 9, 'nc'),
(469, 6, 13, 9, 'nc'),
(470, 7, 13, 9, 'nc'),
(471, 8, 13, 9, 'nc'),
(472, 9, 13, 9, 'nc'),
(473, 10, 13, 9, 'nc'),
(474, 11, 13, 9, 'nc'),
(475, 12, 13, 9, 'nc'),
(476, 13, 13, 9, 'nc'),
(477, 14, 13, 9, 'nc'),
(478, 15, 13, 9, 'nc'),
(479, 16, 13, 9, 'nc'),
(480, 17, 13, 9, 'nc'),
(481, 18, 13, 9, 'nc'),
(482, 19, 13, 9, 'nc'),
(483, 20, 13, 9, 'nc'),
(484, 21, 13, 9, 'nc'),
(485, 22, 13, 9, 'nc'),
(486, 23, 13, 9, 'nc'),
(487, 24, 13, 9, 'nc'),
(488, 25, 13, 9, 'nc'),
(489, 26, 13, 9, 'nc'),
(490, 27, 13, 9, 'nc'),
(491, 28, 13, 9, 'nc'),
(492, 29, 13, 9, 'nc'),
(493, 30, 13, 9, 'nc'),
(494, 31, 13, 9, 'nc'),
(495, 32, 13, 9, 'nc'),
(496, 33, 13, 9, 'nc'),
(497, 34, 13, 9, 'nc'),
(498, 35, 13, 9, 'nc'),
(499, 36, 13, 9, 'nc'),
(500, 37, 13, 9, 'nc'),
(501, 38, 13, 9, 'nc'),
(502, 39, 13, 9, 'nc'),
(503, 40, 13, 9, 'nc'),
(504, 41, 13, 9, 'nc'),
(505, 42, 13, 9, 'nc'),
(506, 43, 13, 9, 'nc'),
(507, 44, 13, 9, 'nc'),
(508, 45, 13, 9, 'nc'),
(509, 46, 13, 9, 'nc'),
(510, 47, 13, 9, 'nc'),
(511, 48, 13, 9, 'nc'),
(512, 49, 13, 9, 'nc'),
(513, 50, 13, 9, 'nc'),
(514, 51, 13, 9, 'nc'),
(515, 52, 13, 9, 'nc'),
(516, 53, 13, 9, 'nc'),
(517, 54, 13, 9, 'nc'),
(518, 55, 13, 9, 'nc'),
(519, 56, 13, 9, 'nc'),
(520, 57, 13, 9, 'nc'),
(521, 58, 13, 9, 'nc'),
(522, 1, 14, 9, 'nc'),
(523, 2, 14, 9, 'nc'),
(524, 3, 14, 9, 'nc'),
(525, 4, 14, 9, 'nc'),
(526, 5, 14, 9, 'nc'),
(527, 6, 14, 9, 'nc'),
(528, 7, 14, 9, 'nc'),
(529, 8, 14, 9, 'nc'),
(530, 9, 14, 9, 'nc'),
(531, 10, 14, 9, 'nc'),
(532, 11, 14, 9, 'nc'),
(533, 12, 14, 9, 'nc'),
(534, 13, 14, 9, 'nc'),
(535, 14, 14, 9, 'nc'),
(536, 15, 14, 9, 'nc'),
(537, 16, 14, 9, 'nc'),
(538, 17, 14, 9, 'nc'),
(539, 18, 14, 9, 'nc'),
(540, 19, 14, 9, 'nc'),
(541, 20, 14, 9, 'nc'),
(542, 21, 14, 9, 'nc'),
(543, 22, 14, 9, 'nc'),
(544, 23, 14, 9, 'nc'),
(545, 24, 14, 9, 'nc'),
(546, 25, 14, 9, 'nc'),
(547, 26, 14, 9, 'nc'),
(548, 27, 14, 9, 'nc'),
(549, 28, 14, 9, 'nc'),
(550, 29, 14, 9, 'nc'),
(551, 30, 14, 9, 'nc'),
(552, 31, 14, 9, 'nc'),
(553, 32, 14, 9, 'nc'),
(554, 33, 14, 9, 'nc'),
(555, 34, 14, 9, 'nc'),
(556, 35, 14, 9, 'nc'),
(557, 36, 14, 9, 'nc'),
(558, 37, 14, 9, 'nc'),
(559, 38, 14, 9, 'nc'),
(560, 39, 14, 9, 'nc'),
(561, 40, 14, 9, 'nc'),
(562, 41, 14, 9, 'nc'),
(563, 42, 14, 9, 'nc'),
(564, 43, 14, 9, 'nc'),
(565, 44, 14, 9, 'nc'),
(566, 45, 14, 9, 'nc'),
(567, 46, 14, 9, 'nc'),
(568, 47, 14, 9, 'nc'),
(569, 48, 14, 9, 'nc'),
(570, 49, 14, 9, 'nc'),
(571, 50, 14, 9, 'nc'),
(572, 51, 14, 9, 'nc'),
(573, 52, 14, 9, 'nc'),
(574, 53, 14, 9, 'nc'),
(575, 54, 14, 9, 'nc'),
(576, 55, 14, 9, 'nc'),
(577, 56, 14, 9, 'nc'),
(578, 57, 14, 9, 'nc'),
(579, 58, 14, 9, 'nc'),
(580, 1, 15, 9, 'nc'),
(581, 2, 15, 9, 'nc'),
(582, 3, 15, 9, 'nc'),
(583, 4, 15, 9, 'nc'),
(584, 5, 15, 9, 'nc'),
(585, 6, 15, 9, 'nc'),
(586, 7, 15, 9, 'nc'),
(587, 8, 15, 9, 'nc'),
(588, 9, 15, 9, 'nc'),
(589, 10, 15, 9, 'nc'),
(590, 11, 15, 9, 'nc'),
(591, 12, 15, 9, 'nc'),
(592, 13, 15, 9, 'nc'),
(593, 14, 15, 9, 'nc'),
(594, 15, 15, 9, 'nc'),
(595, 16, 15, 9, 'nc'),
(596, 17, 15, 9, 'nc'),
(597, 18, 15, 9, 'nc'),
(598, 19, 15, 9, 'nc'),
(599, 20, 15, 9, 'nc'),
(600, 21, 15, 9, 'nc'),
(601, 22, 15, 9, 'nc'),
(602, 23, 15, 9, 'nc'),
(603, 24, 15, 9, 'nc'),
(604, 25, 15, 9, 'nc'),
(605, 26, 15, 9, 'nc'),
(606, 27, 15, 9, 'nc'),
(607, 28, 15, 9, 'nc'),
(608, 29, 15, 9, 'nc'),
(609, 30, 15, 9, 'nc'),
(610, 31, 15, 9, 'nc'),
(611, 32, 15, 9, 'nc'),
(612, 33, 15, 9, 'nc'),
(613, 34, 15, 9, 'nc'),
(614, 35, 15, 9, 'nc'),
(615, 36, 15, 9, 'nc'),
(616, 37, 15, 9, 'nc'),
(617, 38, 15, 9, 'nc'),
(618, 39, 15, 9, 'nc'),
(619, 40, 15, 9, 'nc'),
(620, 41, 15, 9, 'nc'),
(621, 42, 15, 9, 'nc'),
(622, 43, 15, 9, 'nc'),
(623, 44, 15, 9, 'nc'),
(624, 45, 15, 9, 'nc'),
(625, 46, 15, 9, 'nc'),
(626, 47, 15, 9, 'nc'),
(627, 48, 15, 9, 'nc'),
(628, 49, 15, 9, 'nc'),
(629, 50, 15, 9, 'nc'),
(630, 51, 15, 9, 'nc'),
(631, 52, 15, 9, 'nc'),
(632, 53, 15, 9, 'nc'),
(633, 54, 15, 9, 'nc'),
(634, 55, 15, 9, 'nc'),
(635, 56, 15, 9, 'nc'),
(636, 57, 15, 9, 'nc'),
(637, 58, 15, 9, 'nc'),
(638, 1, 16, 1, 'nc'),
(639, 2, 16, 1, 'nc'),
(640, 3, 16, 1, 'nc'),
(641, 4, 16, 1, 'nc'),
(642, 5, 16, 1, 'nc'),
(643, 6, 16, 1, 'nc'),
(644, 7, 16, 1, 'nc'),
(645, 8, 16, 1, 'nc'),
(646, 9, 16, 1, 'nc'),
(647, 10, 16, 1, 'nc'),
(648, 11, 16, 1, 'nc'),
(649, 12, 16, 1, 'nc'),
(650, 13, 16, 1, 'nc'),
(651, 14, 16, 1, 'nc'),
(652, 15, 16, 1, 'nc'),
(653, 16, 16, 1, 'nc'),
(654, 17, 16, 1, 'nc'),
(655, 18, 16, 1, 'nc'),
(656, 19, 16, 1, 'nc'),
(657, 20, 16, 1, 'nc'),
(658, 21, 16, 1, 'nc'),
(659, 22, 16, 1, 'nc'),
(660, 23, 16, 1, 'nc'),
(661, 24, 16, 1, 'nc'),
(662, 25, 16, 1, 'nc'),
(663, 26, 16, 1, 'nc'),
(664, 27, 16, 1, 'nc'),
(665, 28, 16, 1, 'nc'),
(666, 29, 16, 1, 'nc'),
(667, 30, 16, 1, 'nc'),
(668, 31, 16, 1, 'nc'),
(669, 32, 16, 1, 'nc'),
(670, 33, 16, 1, 'nc'),
(671, 34, 16, 1, 'nc'),
(672, 35, 16, 1, 'nc'),
(673, 36, 16, 1, 'nc'),
(674, 37, 16, 1, 'nc'),
(675, 38, 16, 1, 'nc'),
(676, 39, 16, 1, 'nc'),
(677, 40, 16, 1, 'nc'),
(678, 41, 16, 1, 'nc'),
(679, 42, 16, 1, 'nc'),
(680, 43, 16, 1, 'nc'),
(681, 44, 16, 1, 'nc'),
(682, 45, 16, 1, 'nc'),
(683, 46, 16, 1, 'nc'),
(684, 47, 16, 1, 'nc'),
(685, 48, 16, 1, 'nc'),
(686, 49, 16, 1, 'nc'),
(687, 50, 16, 1, 'nc'),
(688, 51, 16, 1, 'nc'),
(689, 52, 16, 1, 'nc'),
(690, 53, 16, 1, 'nc'),
(691, 54, 16, 1, 'nc'),
(692, 55, 16, 1, 'nc'),
(693, 56, 16, 1, 'nc'),
(694, 57, 16, 1, 'nc'),
(695, 58, 16, 1, 'nc');

-- --------------------------------------------------------

--
-- Table structure for table `revision_state`
--

CREATE TABLE IF NOT EXISTS `revision_state` (
  `id` smallint(6) NOT NULL auto_increment,
  `title` varchar(50) collate utf8_unicode_ci NOT NULL,
  `description` varchar(255) collate utf8_unicode_ci default NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `revision_state`
--

INSERT INTO `revision_state` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Inicial', 'Estado Inicial y único de un trámite. Se asigna automáticamente por le Responsable cuando el trámite se ha iniciado.', '2010-04-09 12:52:47', '2010-04-09 12:52:47'),
(2, 'Aprobado', 'Estado Final y único de un trámite. Se asgina por un usuario Administrador cuando el trámita finalmente ha sido aprobado.', '2010-04-09 12:52:47', '2010-04-09 12:52:47'),
(3, 'Anulado', NULL, '2010-04-09 12:52:47', '2010-04-09 12:52:47'),
(4, 'Autorizado', NULL, '2010-04-09 12:52:47', '2010-04-09 12:52:47'),
(5, 'A Revisar', 'Estado pendiente a revisar por parte de la administración de Obras Privadas.', '2010-04-09 12:52:47', '2010-04-09 12:52:47'),
(6, 'Visado', 'Estado visado por parte del Administrador.', '2010-04-09 12:52:47', '2010-04-09 12:52:47'),
(7, 'Corregido', 'Estado creado por el Responsable en respuesta al estado de Visado.', '2010-04-09 12:52:47', '2010-04-09 12:52:47'),
(8, 'En Proceso', 'Este estado se produce en una revision cuando aún se encuentra en proceso de Visado.', '2010-04-09 12:52:47', '2010-04-09 12:52:47');

-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_group`
--

CREATE TABLE IF NOT EXISTS `sf_guard_group` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) default NULL,
  `description` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `sf_guard_group`
--

INSERT INTO `sf_guard_group` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator group', '2010-04-09 12:52:44', '2010-04-09 12:52:44'),
(2, 'Usuario común', 'Los usuarios de la aplicación son los profesionales que utilizan esta herramienta para poder realizar los trámites.', '2010-04-09 12:52:44', '2010-04-09 12:52:44'),
(3, 'Departamento de Catastro', NULL, '2010-04-09 12:52:44', '2010-04-09 12:52:44'),
(4, 'Departamento de Desarrollo Urbano', '', '2010-04-09 12:52:44', '2010-04-09 14:52:54'),
(5, 'Departamento de Obras Privadas', NULL, '2010-04-09 12:52:44', '2010-04-09 12:52:44'),
(6, 'Observaciones generales', '', '2010-04-09 13:45:40', '2010-04-09 13:45:40');

-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_group_permission`
--

CREATE TABLE IF NOT EXISTS `sf_guard_group_permission` (
  `group_id` int(11) NOT NULL default '0',
  `permission_id` int(11) NOT NULL default '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`group_id`,`permission_id`),
  KEY `sf_guard_group_permission_permission_id_sf_guard_permission_id` (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sf_guard_group_permission`
--

INSERT INTO `sf_guard_group_permission` (`group_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2010-04-12 08:19:49', '2010-04-12 08:19:49'),
(2, 1, '2010-04-12 08:22:23', '2010-04-12 08:22:23'),
(2, 2, '2010-04-12 08:54:22', '2010-04-12 08:54:22'),
(3, 1, '2010-04-12 08:22:23', '2010-04-12 08:22:23'),
(4, 1, '2010-04-12 08:22:23', '2010-04-12 08:22:23'),
(5, 1, '2010-04-12 08:22:23', '2010-04-12 08:22:23'),
(6, 1, '2010-04-12 08:22:23', '2010-04-12 08:22:23');

-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_permission`
--

CREATE TABLE IF NOT EXISTS `sf_guard_permission` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) default NULL,
  `description` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `sf_guard_permission`
--

INSERT INTO `sf_guard_permission` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator permission', '2010-04-09 12:52:44', '2010-04-09 12:52:44'),
(2, 'User', 'User permission', '2010-04-09 12:52:44', '2010-04-09 12:52:44');

-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_remember_key`
--

CREATE TABLE IF NOT EXISTS `sf_guard_remember_key` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) default NULL,
  `remember_key` varchar(32) default NULL,
  `ip_address` varchar(50) NOT NULL default '',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`,`ip_address`),
  KEY `user_id_idx` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `sf_guard_remember_key`
--


-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_user`
--

CREATE TABLE IF NOT EXISTS `sf_guard_user` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(128) NOT NULL,
  `algorithm` varchar(128) NOT NULL default 'sha1',
  `salt` varchar(128) default NULL,
  `password` varchar(128) default NULL,
  `is_active` tinyint(1) default '1',
  `is_super_admin` tinyint(1) default '0',
  `last_login` datetime default NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `is_active_idx_idx` (`is_active`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `sf_guard_user`
--

INSERT INTO `sf_guard_user` (`id`, `username`, `algorithm`, `salt`, `password`, `is_active`, `is_super_admin`, `last_login`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'sha1', '9f66d69e39397ca3287c9556f445bfd8', '7c0063bcdea7a5f48c891d65987454280ac5cac3', 1, 1, '2010-04-13 09:01:52', '2010-04-09 12:52:44', '2010-04-13 09:01:52'),
(2, 'damian', 'sha1', '224671cad653d1323d592c77624f77fe', '9b5c9d3d5bb25cd3bae3fbb4aa69fe64793b0fd1', 1, 1, '2010-04-13 09:12:08', '2010-04-09 12:52:44', '2010-04-13 09:12:08'),
(3, 'alex', 'sha1', 'efc1e4678e3a48cf13eb5c3fd147edf8', 'b8ff819aeb6a5bf965fddbb30961d7342faff28f', 1, 0, NULL, '2010-04-09 12:52:44', '2010-04-09 12:52:44'),
(5, 'RABIANCHI', 'sha1', '7b007ae9f14aee456d14d4fe14e7947c', 'fe7c36a2622e68cf0fc7ff281d154ba75e975be5', 1, 0, '2010-04-12 09:19:39', '2010-04-09 14:17:59', '2010-04-12 09:19:39'),
(6, 'APLAURENTE', 'sha1', '4c33f21c5cb2ec7b9922b3edb90b7b74', '5a77dcbebb4b2661bc0b4bc86c92c7dd397e2e90', 1, 0, NULL, '2010-04-09 14:23:32', '2010-04-09 14:54:59'),
(7, 'SEPALETTA', 'sha1', '13874449e73a5b618ab7311c3d34359e', 'fc312d9305127982f14ae6474e6ebcc3d178c2c7', 1, 0, '2010-04-12 08:36:04', '2010-04-09 14:26:21', '2010-04-12 08:36:04'),
(8, 'JHSUAREZ', 'sha1', '2ec025e549ea37b036ab9eaa1e7b5fdf', '7df003ba3b863671c72617253cc02fd022dac51e', 1, 0, '2010-04-12 18:19:36', '2010-04-12 07:59:25', '2010-04-12 18:19:36'),
(9, 'MVALI', 'sha1', '45de706572cec2e55b987740896544f1', 'c8ab51230ef37dfe9b12bbad9281262ea645e57e', 1, 0, '2010-04-12 08:44:12', '2010-04-12 08:26:33', '2010-04-12 08:44:12');

-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_user_group`
--

CREATE TABLE IF NOT EXISTS `sf_guard_user_group` (
  `user_id` int(11) NOT NULL default '0',
  `group_id` int(11) NOT NULL default '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`user_id`,`group_id`),
  KEY `sf_guard_user_group_group_id_sf_guard_group_id` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sf_guard_user_group`
--

INSERT INTO `sf_guard_user_group` (`user_id`, `group_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2010-04-12 08:21:30', '2010-04-12 08:21:30'),
(1, 3, '2010-04-09 13:43:17', '2010-04-09 13:43:17'),
(1, 4, '2010-04-12 09:00:41', '2010-04-12 09:00:41'),
(1, 5, '2010-04-09 13:43:17', '2010-04-09 13:43:17'),
(1, 6, '2010-04-09 13:48:04', '2010-04-09 13:48:04'),
(5, 5, '2010-04-09 14:18:52', '2010-04-09 14:18:52'),
(5, 6, '2010-04-12 09:01:23', '2010-04-12 09:01:23'),
(6, 2, '2010-04-09 14:23:32', '2010-04-09 14:23:32'),
(6, 4, '2010-04-12 08:29:27', '2010-04-12 08:29:27'),
(6, 6, '2010-04-12 08:35:01', '2010-04-12 08:35:01'),
(7, 3, '2010-04-09 14:26:21', '2010-04-09 14:26:21'),
(7, 6, '2010-04-12 09:01:23', '2010-04-12 09:01:23'),
(8, 2, '2010-04-12 07:59:57', '2010-04-12 07:59:57'),
(9, 1, '2010-04-12 08:45:30', '2010-04-12 08:45:30'),
(9, 2, '2010-04-12 08:35:52', '2010-04-12 08:35:52'),
(9, 3, '2010-04-12 08:35:52', '2010-04-12 08:35:52'),
(9, 4, '2010-04-12 08:35:52', '2010-04-12 08:35:52'),
(9, 5, '2010-04-12 08:26:33', '2010-04-12 08:26:33'),
(9, 6, '2010-04-12 08:26:33', '2010-04-12 08:26:33');

-- --------------------------------------------------------

--
-- Table structure for table `sf_guard_user_permission`
--

CREATE TABLE IF NOT EXISTS `sf_guard_user_permission` (
  `user_id` int(11) NOT NULL default '0',
  `permission_id` int(11) NOT NULL default '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`user_id`,`permission_id`),
  KEY `sf_guard_user_permission_permission_id_sf_guard_permission_id` (`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sf_guard_user_permission`
--

INSERT INTO `sf_guard_user_permission` (`user_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2010-04-12 08:19:49', '2010-04-12 08:19:49'),
(5, 1, '2010-04-12 08:40:21', '2010-04-12 08:40:21'),
(6, 1, '2010-04-12 08:28:57', '2010-04-12 08:28:57'),
(6, 2, '2010-04-12 08:54:22', '2010-04-12 08:54:22'),
(7, 1, '2010-04-12 08:27:07', '2010-04-12 08:27:07'),
(8, 2, '2010-04-12 08:54:22', '2010-04-12 08:54:22'),
(9, 1, '2010-04-12 08:26:33', '2010-04-12 08:26:33');

-- --------------------------------------------------------

--
-- Table structure for table `user_procedure`
--

CREATE TABLE IF NOT EXISTS `user_procedure` (
  `user_id` int(11) NOT NULL default '0',
  `procedure_id` bigint(20) NOT NULL default '0',
  PRIMARY KEY  (`user_id`,`procedure_id`),
  KEY `user_procedure_procedure_id__procedure_id` (`procedure_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_procedure`
--

INSERT INTO `user_procedure` (`user_id`, `procedure_id`) VALUES
(2, 1),
(8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `_procedure`
--

CREATE TABLE IF NOT EXISTS `_procedure` (
  `id` bigint(20) NOT NULL auto_increment,
  `cadastral_data_id` bigint(20) default NULL,
  `formu_id` bigint(20) default NULL,
  `dossier` varchar(255) collate utf8_unicode_ci default NULL,
  `is_finished` tinyint(1) default '0',
  `revisions_count` bigint(20) default NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `formu_id_idx` (`formu_id`),
  KEY `cadastral_data_id_idx` (`cadastral_data_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `_procedure`
--

INSERT INTO `_procedure` (`id`, `cadastral_data_id`, `formu_id`, `dossier`, `is_finished`, `revisions_count`, `created_at`, `updated_at`) VALUES
(1, 1, 2, NULL, 0, 10, '2010-04-09 13:02:10', '2010-04-12 09:13:05'),
(2, 2, 4, NULL, 0, 6, '2010-04-09 13:47:15', '2010-04-12 09:13:17'),
(3, 3, 6, NULL, 0, 17, '2010-04-12 17:40:44', '2010-04-13 09:02:42');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comunication_item`
--
ALTER TABLE `comunication_item`
  ADD CONSTRAINT `comunication_item_author_id_sf_guard_user_id` FOREIGN KEY (`author_id`) REFERENCES `sf_guard_user` (`id`),
  ADD CONSTRAINT `comunication_item_revision_item_id_revision_item_id` FOREIGN KEY (`revision_item_id`) REFERENCES `revision_item` (`id`);

--
-- Constraints for table `formu`
--
ALTER TABLE `formu`
  ADD CONSTRAINT `formu_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`);

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`);

--
-- Constraints for table `item_formu`
--
ALTER TABLE `item_formu`
  ADD CONSTRAINT `item_formu_form_id_formu_id` FOREIGN KEY (`form_id`) REFERENCES `formu` (`id`),
  ADD CONSTRAINT `item_formu_item_id_item_id` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`);

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_profesion_id_profession_id` FOREIGN KEY (`profesion_id`) REFERENCES `profession` (`id`),
  ADD CONSTRAINT `profile_sf_guard_user_id_sf_guard_user_id` FOREIGN KEY (`sf_guard_user_id`) REFERENCES `sf_guard_user` (`id`);

--
-- Constraints for table `revision`
--
ALTER TABLE `revision`
  ADD CONSTRAINT `revision_creator_id_sf_guard_user_id` FOREIGN KEY (`creator_id`) REFERENCES `sf_guard_user` (`id`),
  ADD CONSTRAINT `revision_procedure_id__procedure_id` FOREIGN KEY (`procedure_id`) REFERENCES `_procedure` (`id`),
  ADD CONSTRAINT `revision_revision_state_id_revision_state_id` FOREIGN KEY (`revision_state_id`) REFERENCES `revision_state` (`id`);

--
-- Constraints for table `revision_item`
--
ALTER TABLE `revision_item`
  ADD CONSTRAINT `revision_item_item_id_item_id` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `revision_item_revision_id_revision_id` FOREIGN KEY (`revision_id`) REFERENCES `revision` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `revision_item_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`);

--
-- Constraints for table `sf_guard_group_permission`
--
ALTER TABLE `sf_guard_group_permission`
  ADD CONSTRAINT `sf_guard_group_permission_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_group_permission_permission_id_sf_guard_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sf_guard_remember_key`
--
ALTER TABLE `sf_guard_remember_key`
  ADD CONSTRAINT `sf_guard_remember_key_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sf_guard_user_group`
--
ALTER TABLE `sf_guard_user_group`
  ADD CONSTRAINT `sf_guard_user_group_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_user_group_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sf_guard_user_permission`
--
ALTER TABLE `sf_guard_user_permission`
  ADD CONSTRAINT `sf_guard_user_permission_permission_id_sf_guard_permission_id` FOREIGN KEY (`permission_id`) REFERENCES `sf_guard_permission` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_user_permission_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_procedure`
--
ALTER TABLE `user_procedure`
  ADD CONSTRAINT `user_procedure_procedure_id__procedure_id` FOREIGN KEY (`procedure_id`) REFERENCES `_procedure` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_procedure_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `_procedure`
--
ALTER TABLE `_procedure`
  ADD CONSTRAINT `_procedure_cadastral_data_id_cadastral_data_id` FOREIGN KEY (`cadastral_data_id`) REFERENCES `cadastral_data` (`id`),
  ADD CONSTRAINT `_procedure_formu_id_formu_id` FOREIGN KEY (`formu_id`) REFERENCES `formu` (`id`);
