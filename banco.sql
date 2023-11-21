-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 16-Nov-2023 às 14:51
-- Versão do servidor: 5.7.11
-- PHP Version: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banco`
--
CREATE DATABASE IF NOT EXISTS `banco` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `banco`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `idCliente` int(11) NOT NULL,
  `idGerente` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `email` varchar(140) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `cartao` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`idCliente`, `idGerente`, `nome`, `cpf`, `email`, `telefone`, `cartao`) VALUES
(1, 1, 'Gabriel Pec', '071.906.339-60', 'peczin@gmail.com', '(47) 98419-7654', 12346),
(3, 2, 'Dassa', '071.071.071-07', 'dassa@gmail', '(47) 8 8484-8484', 12347),
(4, 3, 'Lucy', '071.071.071-07', 'lucu@gmail.com', '(47) 8 8484-8484', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `gerentes`
--

DROP TABLE IF EXISTS `gerentes`;
CREATE TABLE `gerentes` (
  `idGerente` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `email` varchar(140) NOT NULL,
  `senha` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `gerentes`
--

INSERT INTO `gerentes` (`idGerente`, `nome`, `email`, `senha`) VALUES
(1, 'Fellas', 'fellas@gmail.com', 'Vasco'),
(2, 'Payet', 'root', 'root'),
(3, 'Vegetti', 'pirata@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indexes for table `gerentes`
--
ALTER TABLE `gerentes`
  ADD PRIMARY KEY (`idGerente`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `gerentes`
--
ALTER TABLE `gerentes`
  MODIFY `idGerente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
