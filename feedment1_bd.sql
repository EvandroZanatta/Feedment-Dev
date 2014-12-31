-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 24-Jan-2014 às 09:37
-- Versão do servidor: 5.6.12-log
-- versão do PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `feedment1`
--
CREATE DATABASE IF NOT EXISTS `feedment1` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `feedment1`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `assinantes`
--

CREATE TABLE IF NOT EXISTS `assinantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_feed` int(11) NOT NULL,
  `favorito` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `feeds`
--

CREATE TABLE IF NOT EXISTS `feeds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `link` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `descricao` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `categoria` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `foto` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `refresh` int(20) NOT NULL,
  `modulo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `postagens`
--

CREATE TABLE IF NOT EXISTS `postagens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `link` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `descricao` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `time` int(11) NOT NULL,
  `feed` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=131 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `foto` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
