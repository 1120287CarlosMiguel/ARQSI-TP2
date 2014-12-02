-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 02-Dez-2014 às 12:56
-- Versão do servidor: 5.5.40-0ubuntu0.14.04.1
-- versão do PHP: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `LojaPHP`
--
CREATE DATABASE IF NOT EXISTS `LojaPHP` DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci;
USE `LojaPHP`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Album`
--

CREATE TABLE IF NOT EXISTS `Album` (
  `AlbumID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(50) COLLATE latin1_general_ci NOT NULL DEFAULT 'Nome Desconhecido',
  `Price` float unsigned NOT NULL DEFAULT '0',
  `Quantidade` int(11) NOT NULL,
  `Artista` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'Artista Desconhecido',
  `Genero` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'Sem Genero',
  `ImageURL` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`AlbumID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `Album`
--

INSERT INTO `Album` (`AlbumID`, `Title`, `Price`, `Quantidade`, `Artista`, `Genero`, `ImageURL`) VALUES
(1, 'Thriller', 10.99, 3, 'Michael Jackson', 'Pop', 'http://upload.wikimedia.org/wikipedia/en/5/55/Michael_Jackson_-_Thriller.png'),
(2, 'The Dark Side of the Moon', 15, 10, 'Pink Floyd', 'Soul', 'http://upload.wikimedia.org/wikipedia/en/3/3b/Dark_Side_of_the_Moon.png'),
(3, 'Back in Black', 5.55, 15, 'AC/DC', 'Rock', 'http://upload.wikimedia.org/wikipedia/commons/b/be/Acdc_backinblack_cover.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `EditoraOrder`
--

CREATE TABLE IF NOT EXISTS `EditoraOrder` (
  `EditoraOrderID` int(11) NOT NULL AUTO_INCREMENT,
  `Editora` varchar(20) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`EditoraOrderID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `EditoraOrderDetail`
--

CREATE TABLE IF NOT EXISTS `EditoraOrderDetail` (
  `DetailID` int(11) NOT NULL AUTO_INCREMENT,
  `EditoraOrderID` int(11) NOT NULL,
  `AlbumID` int(11) NOT NULL,
  PRIMARY KEY (`DetailID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- RELATIONS FOR TABLE `EditoraOrderDetail`:
--   `AlbumID`
--       `Album` -> `AlbumID`
--   `EditoraOrderID`
--       `EditoraOrder` -> `EditoraOrderID`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `Order`
--

CREATE TABLE IF NOT EXISTS `Order` (
  `OrderID` int(11) NOT NULL AUTO_INCREMENT,
  `PrecoTotal` float NOT NULL,
  `UtilizadorID` varchar(20) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`OrderID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- RELATIONS FOR TABLE `Order`:
--   `UtilizadorID`
--       `User` -> `UserID`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `OrderDetail`
--

CREATE TABLE IF NOT EXISTS `OrderDetail` (
  `OrderDetailID` int(11) NOT NULL AUTO_INCREMENT,
  `OrderID` int(11) NOT NULL,
  `AlbumID` int(11) NOT NULL,
  `Quantidade` int(11) NOT NULL,
  `Price` float NOT NULL,
  PRIMARY KEY (`OrderDetailID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- RELATIONS FOR TABLE `OrderDetail`:
--   `AlbumID`
--       `Album` -> `AlbumID`
--   `OrderID`
--       `Order` -> `OrderID`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `UserID` varchar(20) COLLATE latin1_general_ci NOT NULL COMMENT 'Username',
  `Password` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `Name` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `LastName` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `Permissions` int(11) NOT NULL COMMENT 'Nivel de Utilizador',
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
