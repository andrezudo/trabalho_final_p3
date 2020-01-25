-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Jan-2020 às 20:49
-- Versão do servidor: 10.4.8-MariaDB
-- versão do PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `syscob`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ta_atletas`
--

CREATE TABLE `ta_atletas` (
  `id` int(11) NOT NULL,
  `id_competicao` int(11) DEFAULT NULL,
  `atleta` varchar(100) NOT NULL,
  `tempo` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ta_atletas`
--

INSERT INTO `ta_atletas` (`id`, `id_competicao`, `atleta`, `tempo`) VALUES
(3, 1, 'André', 12),
(6, 4, 'Zé', 20),
(7, 4, 'João', 9),
(8, 4, 'Alex', 13),
(9, 4, 'Alex', 13.4),
(10, 5, 'André', 12),
(11, 5, 'André Luis', 12.2),
(12, 5, 'Zé', 111),
(13, 6, 'Zé', 10),
(14, 6, 'André', 9),
(15, 7, 'André', 12),
(16, 7, 'Djalma', 9),
(17, 7, 'João', 12.2),
(18, 7, 'Bolt', 8.9),
(19, 8, 'André', 12),
(20, 8, 'André', 11),
(21, 12, 'André', 12),
(22, 12, 'João', 9);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ta_cem_metros`
--

CREATE TABLE `ta_cem_metros` (
  `id` int(11) NOT NULL,
  `competicao` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ta_cem_metros`
--

INSERT INTO `ta_cem_metros` (`id`, `competicao`) VALUES
(1, 'teste'),
(2, 'teste 2'),
(3, 'teste 3'),
(4, 'teste 4'),
(5, 'Semifinal'),
(6, 'Final'),
(7, 'Eliminatória'),
(8, 'teste'),
(9, 'Semifinal 2'),
(10, 'Semifinal 2'),
(11, 'Semifinal 2'),
(12, 'Semifinal 2');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `ta_atletas`
--
ALTER TABLE `ta_atletas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_competicao_id` (`id_competicao`);

--
-- Índices para tabela `ta_cem_metros`
--
ALTER TABLE `ta_cem_metros`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `ta_atletas`
--
ALTER TABLE `ta_atletas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `ta_cem_metros`
--
ALTER TABLE `ta_cem_metros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `ta_atletas`
--
ALTER TABLE `ta_atletas`
  ADD CONSTRAINT `FK_competicao_id` FOREIGN KEY (`id_competicao`) REFERENCES `ta_cem_metros` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
