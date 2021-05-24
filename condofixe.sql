-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 13-Jun-2019 às 19:24
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `condofixe`
--
CREATE DATABASE IF NOT EXISTS `condofixe` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `condofixe`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `compra`
--

CREATE TABLE IF NOT EXISTS `compra` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) DEFAULT NULL,
  `condominium` varchar(300) DEFAULT NULL,
  `valor` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `compra`
--

INSERT INTO `compra` (`id`, `name`, `condominium`, `valor`) VALUES
(1, 'CondoFixe', 'Casa da Ariosa', 10000000),
(2, 'Ramaldinho Pereira', 'Rua da Conceição', 25000),
(3, 'Patanisca Alfredo', 'Rua do Arco-Íris', 25000000);

-- --------------------------------------------------------

--
-- Estrutura da tabela `fatura`
--

CREATE TABLE IF NOT EXISTS `fatura` (
  `nome` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `telefone` varchar(300) NOT NULL,
  `datanasc` varchar(300) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fatura`
--

INSERT INTO `fatura` (`nome`, `email`, `telefone`, `datanasc`) VALUES
('Canecas', 'cabeças@gmail.com', '937384253', '1999-02-22'),
('Pereira dos Santos', 'Campeão@fixolas.pt', '92929292929', '2000-02-10'),
('Joao', 'guigamePT@gmail.com', '937384247', '2000-06-12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) DEFAULT NULL,
  `username` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(1, 'Johnnyzao', '123');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
