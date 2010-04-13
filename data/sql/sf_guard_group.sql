-- phpMyAdmin SQL Dump
-- version 3.2.2.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 13-04-2010 a las 10:19:34
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
-- Estructura de tabla para la tabla `sf_guard_group`
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
-- Volcar la base de datos para la tabla `sf_guard_group`
--

INSERT INTO `sf_guard_group` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator group', '2010-04-09 12:52:44', '2010-04-09 12:52:44'),
(2, 'Usuario común', 'Los usuarios de la aplicación son los profesionales que utilizan esta herramienta para poder realizar los trámites.', '2010-04-09 12:52:44', '2010-04-09 12:52:44'),
(3, 'Departamento de Catastro', NULL, '2010-04-09 12:52:44', '2010-04-09 12:52:44'),
(4, 'Departamento de Desarrollo Urbano', '', '2010-04-09 12:52:44', '2010-04-09 14:52:54'),
(5, 'Departamento de Obras Privadas', NULL, '2010-04-09 12:52:44', '2010-04-09 12:52:44'),
(6, 'Observaciones generales', '', '2010-04-09 13:45:40', '2010-04-09 13:45:40');
