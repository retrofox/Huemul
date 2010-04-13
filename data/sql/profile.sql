-- phpMyAdmin SQL Dump
-- version 3.2.2.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 13-04-2010 a las 10:19:12
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
-- Estructura de tabla para la tabla `profile`
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
-- Volcar la base de datos para la tabla `profile`
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

--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_profesion_id_profession_id` FOREIGN KEY (`profesion_id`) REFERENCES `profession` (`id`),
  ADD CONSTRAINT `profile_sf_guard_user_id_sf_guard_user_id` FOREIGN KEY (`sf_guard_user_id`) REFERENCES `sf_guard_user` (`id`);
