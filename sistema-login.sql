-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05-Jul-2022 às 22:58
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `solut002_controleprojeto`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `nome_sistema` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `config`
--

INSERT INTO `config` (`id`, `nome_sistema`) VALUES
(1, 'CONTROLE DE PROJETO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `nome` varchar(220) NOT NULL,
  `email` varchar(220) NOT NULL,
  `nivel` varchar(255) NOT NULL,
  `usuario` varchar(220) NOT NULL,
  `id_area` varchar(110) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `senha` varchar(220) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id`, `nome`, `email`, `nivel`, `usuario`, `id_area`, `status`, `senha`) VALUES
(1, 'John Richard', 'john.richard@pvax.com.br', '2', 'john', '4', 'ATIVO', '$2y$10$F0k/Cyxp1ZbQnh9MDjTSiOH9y6kYOjCTuu85v/s69uyuB.Tov7eey'),
(11, 'Ana Paula Fernandes', 'anapaula.cga@pvax.com.br', '1', 'anapaula', '4', 'INATIVO', '$2y$10$vHvqz3H7IZlrZk315Atqse90KfFbPLlNkgM014ADZBeDIkb.JUjmS'),
(4, 'leonardo', 'leonardo@pvax.com.br', '1', 'leonardo', '5', 'INATIVO', '$2y$10$KiZN33vt.uiIcPuxzV3dx.zNFXn0nAJAwdItaq37ltPSPvq.o4FIi'),
(14, 'Leandro', 'leandro.fonseca@pvax.com.br', '2', 'leandro.fonseca', '6', 'INATIVO', '$2y$10$Y9a/jhQa0xPFKXLMZTaFcuJzUIZELzT8iHPfmL7lB4Y7zYFnaJLNm');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login_area`
--

CREATE TABLE `login_area` (
  `id` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `area_permissao` int(30) NOT NULL,
  `permiss_dada_por` varchar(110) NOT NULL,
  `data_permissao` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `login_area`
--

INSERT INTO `login_area` (`id`, `usuario`, `area_permissao`, `permiss_dada_por`, `data_permissao`) VALUES
(10, '4', 2, 'john', '2022-06-20'),
(11, '4', 2, 'john', '2022-06-20'),
(12, '4', 6, 'john', '2022-06-20'),
(13, '4', 4, 'john', '2022-06-20'),
(14, '4', 5, 'john', '2022-06-20'),
(22, '11', 2, 'john', '2022-06-20'),
(23, '11', 5, 'john', '2022-06-20'),
(24, '11', 4, 'john', '2022-06-20'),
(39, '1', 6, 'john', '2022-06-23'),
(40, '1', 5, 'john', '2022-06-23');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `login_area`
--
ALTER TABLE `login_area`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `login_area`
--
ALTER TABLE `login_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
