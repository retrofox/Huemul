-- phpMyAdmin SQL Dump
-- version 3.2.2.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 13-04-2010 a las 10:20:44
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
-- Estructura de tabla para la tabla `sf_guard_user_group`
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
-- Volcar la base de datos para la tabla `sf_guard_user_group`
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

--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `sf_guard_user_group`
--
ALTER TABLE `sf_guard_user_group`
  ADD CONSTRAINT `sf_guard_user_group_group_id_sf_guard_group_id` FOREIGN KEY (`group_id`) REFERENCES `sf_guard_group` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sf_guard_user_group_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`) ON DELETE CASCADE;
