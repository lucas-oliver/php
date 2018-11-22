-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21-Nov-2018 às 02:23
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pokedex`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `conquistas`
--

CREATE TABLE `conquistas` (
  `insignias` int(11) NOT NULL,
  `fitas` int(11) NOT NULL,
  `simbolos` int(11) NOT NULL,
  `medalhas` int(11) NOT NULL,
  `pokePingPong` int(11) NOT NULL,
  `ligas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pokemon`
--

CREATE TABLE `pokemon` (
  `idPokemon` bigint(20) NOT NULL,
  `nome` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `altura` int(11) NOT NULL,
  `peso` int(11) NOT NULL,
  `sexo` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `tipo2` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `caracteristica` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `pokemon`
--

INSERT INTO `pokemon` (`idPokemon`, `nome`, `altura`, `peso`, `sexo`, `tipo`, `tipo2`, `caracteristica`) VALUES
(3, 'Venusaur', 2, 100, 'macho', 'planta', 'veneno', 'comum'),
(4, 'Charmander', 1, 8, 'femea', 'fogo', '', 'shiny'),
(5, 'Charmeleon', 2, 19, 'femea', 'fogo', '', 'shiny'),
(6, 'Charizard', 3, 90, 'femea', 'fogo', 'voador', 'shiny'),
(7, 'Squirtle', 1, 9, 'macho', 'agua', '', 'comum'),
(8, 'Wartortle', 2, 25, 'macho', 'agua', '', 'comum'),
(9, 'Blastoise', 3, 85, 'macho', 'agua', '', 'comum'),
(10, 'Caterpie', 1, 3, 'femea', 'inseto', '', 'comum'),
(11, 'Metapod', 1, 10, 'macho', 'inseto', '', 'comum'),
(12, 'Butterfree', 1, 32, 'macho', 'inseto', 'voador', 'comum'),
(13, 'Rattata', 1, 4, 'macho', 'noturno', 'normal', 'alola'),
(14, 'Mewtwo', 2, 122, 'macho', 'psiquico', '', 'comum');

-- --------------------------------------------------------

--
-- Estrutura da tabela `treinador`
--

CREATE TABLE `treinador` (
  `idTreinador` bigint(20) NOT NULL,
  `nome` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `idade` int(11) NOT NULL,
  `regiao` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `treinador`
--

INSERT INTO `treinador` (`idTreinador`, `nome`, `idade`, `regiao`) VALUES
(2, 'Red', 11, 'kalos'),
(3, 'Gold', 11, 'johto'),
(4, 'Kris', 11, 'johto'),
(5, 'Brendan', 13, 'hoenn'),
(6, 'May', 13, 'hoenn'),
(7, 'Leaf', 11, 'kalos');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pokemon`
--
ALTER TABLE `pokemon`
  ADD PRIMARY KEY (`idPokemon`);

--
-- Indexes for table `treinador`
--
ALTER TABLE `treinador`
  ADD PRIMARY KEY (`idTreinador`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pokemon`
--
ALTER TABLE `pokemon`
  MODIFY `idPokemon` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `treinador`
--
ALTER TABLE `treinador`
  MODIFY `idTreinador` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
