-- phpMyAdmin SQL Dump
-- version 3.2.2.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 13-04-2010 a las 10:18:52
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
-- Estructura de tabla para la tabla `item_formu`
--

CREATE TABLE IF NOT EXISTS `item_formu` (
  `form_id` bigint(20) NOT NULL default '0',
  `item_id` bigint(20) NOT NULL default '0',
  PRIMARY KEY  (`form_id`,`item_id`),
  KEY `item_formu_item_id_item_id` (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcar la base de datos para la tabla `item_formu`
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

--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `item_formu`
--
ALTER TABLE `item_formu`
  ADD CONSTRAINT `item_formu_form_id_formu_id` FOREIGN KEY (`form_id`) REFERENCES `formu` (`id`),
  ADD CONSTRAINT `item_formu_item_id_item_id` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`);
