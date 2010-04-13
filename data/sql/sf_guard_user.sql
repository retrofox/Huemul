-- phpMyAdmin SQL Dump
-- version 3.2.2.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 13-04-2010 a las 10:20:27
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
-- Estructura de tabla para la tabla `sf_guard_user`
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
-- Volcar la base de datos para la tabla `sf_guard_user`
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
