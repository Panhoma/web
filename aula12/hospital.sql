-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19/11/2024 às 19:49
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `hospital`
--
CREATE DATABASE IF NOT EXISTS `hospital` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `hospital`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `administracoes`
--

DROP TABLE IF EXISTS `administracoes`;
CREATE TABLE `administracoes` (
  `id` int(11) NOT NULL,
  `receita_id` int(11) NOT NULL,
  `data_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `administracoes`
--

INSERT INTO `administracoes` (`id`, `receita_id`, `data_registro`) VALUES
(1, 3, '2024-11-19 18:46:09');

-- --------------------------------------------------------

--
-- Estrutura para tabela `enfermeiros`
--

DROP TABLE IF EXISTS `enfermeiros`;
CREATE TABLE `enfermeiros` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `coren` varchar(20) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `enfermeiros`
--

INSERT INTO `enfermeiros` (`id`, `nome`, `coren`, `usuario`, `senha`) VALUES
(1, 'Pedro Garcia', '1234', 'Pedrinho', '$2y$10$91y2iAwVEE1iPGluXlI5peM7V.M0vnpsOOM9fQIMJG9sNIpU.IjEK');

-- --------------------------------------------------------

--
-- Estrutura para tabela `medicos`
--

DROP TABLE IF EXISTS `medicos`;
CREATE TABLE `medicos` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `especialidade` varchar(100) DEFAULT NULL,
  `crm` varchar(20) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `medicos`
--

INSERT INTO `medicos` (`id`, `nome`, `especialidade`, `crm`, `usuario`, `senha`) VALUES
(1, 'José Carlos', 'Odonto', '12345', 'Carlinhos', '$2y$10$jIHTecmin4XyQFLDRfWGRurWHnnhLPOA1bAbPj7evIkZnVA3aotMC');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pacientes`
--

DROP TABLE IF EXISTS `pacientes`;
CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `leito` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pacientes`
--

INSERT INTO `pacientes` (`id`, `nome`, `leito`) VALUES
(6, 'Leonardo', '10'),
(7, 'Maria', '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `receitas`
--

DROP TABLE IF EXISTS `receitas`;
CREATE TABLE `receitas` (
  `id` int(11) NOT NULL,
  `paciente_id` int(11) NOT NULL,
  `medicamento` varchar(100) NOT NULL,
  `data_admin` date NOT NULL,
  `hora_admin` time NOT NULL,
  `dose` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `receitas`
--

INSERT INTO `receitas` (`id`, `paciente_id`, `medicamento`, `data_admin`, `hora_admin`, `dose`) VALUES
(3, 6, 'Ibuprofeno', '2024-11-21', '17:43:00', '200mg'),
(4, 7, 'Calmante', '2024-11-20', '10:40:00', '15ml');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `administracoes`
--
ALTER TABLE `administracoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receita_id` (`receita_id`);

--
-- Índices de tabela `enfermeiros`
--
ALTER TABLE `enfermeiros`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coren` (`coren`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Índices de tabela `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `crm` (`crm`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Índices de tabela `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `receitas`
--
ALTER TABLE `receitas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paciente_id` (`paciente_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administracoes`
--
ALTER TABLE `administracoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `enfermeiros`
--
ALTER TABLE `enfermeiros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `medicos`
--
ALTER TABLE `medicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `receitas`
--
ALTER TABLE `receitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `administracoes`
--
ALTER TABLE `administracoes`
  ADD CONSTRAINT `administracoes_ibfk_1` FOREIGN KEY (`receita_id`) REFERENCES `receitas` (`id`) ON DELETE CASCADE;

--
-- Restrições para tabelas `receitas`
--
ALTER TABLE `receitas`
  ADD CONSTRAINT `receitas_ibfk_1` FOREIGN KEY (`paciente_id`) REFERENCES `pacientes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
