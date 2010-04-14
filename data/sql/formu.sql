-- phpMyAdmin SQL Dump
-- version 3.2.2.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 13-04-2010 a las 10:18:08
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
-- Estructura de tabla para la tabla `formu`
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
-- Volcar la base de datos para la tabla `formu`
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

--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `formu`
--
ALTER TABLE `formu`
  ADD CONSTRAINT `formu_user_id_sf_guard_user_id` FOREIGN KEY (`user_id`) REFERENCES `sf_guard_user` (`id`);
