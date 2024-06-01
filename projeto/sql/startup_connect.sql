-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 01/06/2024 às 15:44
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
CREATE DATABASE IF NOT EXISTS startup_connect;
USE startup_connect;
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `log_projeto`
--

CREATE TABLE `log_projeto` (
  `idlog_projeto` int(11) NOT NULL,
  `data_hora_criada` datetime DEFAULT NULL,
  `descricao_log` varchar(80) NOT NULL,
  `status_log` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `log_projeto`
--

INSERT INTO `log_projeto` (`idlog_projeto`, `data_hora_criada`, `descricao_log`, `status_log`) VALUES
(1, '2024-05-24 09:43:03', 'Descrição do log', 'ativo'),
(2, NULL, 'asdfasdfasdfasdf', 'qwfasdfasdf'),
(3, '2024-05-31 00:00:00', 'asdfsacasdcas', 'asdsadcasdc'),
(4, '2024-05-31 00:00:00', 'inativo', 'adsfasdfasdfasdfsd'),
(5, '2024-05-31 00:00:00', 'sfdfasdfadfasfd', 'inativo'),
(6, '2024-05-31 00:00:00', 'qsdadasd', 'inativo'),
(7, '2024-05-31 00:00:00', 'qsdadasd', 'inativo'),
(8, '2024-05-31 00:00:00', 'qsdadasd', 'inativo'),
(9, '2024-05-31 00:00:00', 'asdfasdfasdfasdfas', 'inativo'),
(10, NULL, 'Testando o inserção de empresa', 'asdasdasd'),
(11, NULL, 'iagao iago iago', 'iagao'),
(12, '2024-05-31 00:00:00', '12345678910', 'inativo'),
(13, '2024-05-31 21:54:53', '123123123', 'inativo'),
(14, '2024-06-01 10:24:47', '123459999', 'inativo'),
(15, '2024-06-01 10:26:16', '123459999', 'inativo'),
(16, '2024-06-01 10:30:56', '123912399', 'inativo'),
(17, '2024-06-01 10:36:12', '12931929', 'inativo'),
(18, '2024-06-01 10:40:08', '129319239', 'inativo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `projeto`
--

CREATE TABLE `projeto` (
  `idprojeto` int(11) NOT NULL,
  `razao_social` varchar(80) NOT NULL,
  `cnpj_projeto` varchar(450) NOT NULL,
  `nome_fantasia` varchar(45) NOT NULL,
  `endereco` varchar(45) NOT NULL,
  `email_corporativo` varchar(45) NOT NULL,
  `data_abertura_empresa` date DEFAULT NULL,
  `data_abertura_site` date DEFAULT NULL,
  `patrimonio_oferecido` float NOT NULL,
  `meta_total` int(11) NOT NULL,
  `desc_empresa` text NOT NULL,
  `valor_recebido` int(11) DEFAULT NULL,
  `fk_idtermo_condicao` int(11) DEFAULT NULL,
  `fk_idusuario` int(11) DEFAULT NULL,
  `fk_idlog_projeto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `projeto`
--

INSERT INTO `projeto` (`idprojeto`, `razao_social`, `cnpj_projeto`, `nome_fantasia`, `endereco`, `email_corporativo`, `data_abertura_empresa`, `data_abertura_site`, `patrimonio_oferecido`, `meta_total`, `desc_empresa`, `valor_recebido`, `fk_idtermo_condicao`, `fk_idusuario`, `fk_idlog_projeto`) VALUES
(3, 'Razão Social Exemplo Ltda', '12345678000100', 'Nome Fantasia Exemplo', 'Rua Exemplo, 123', 'contato@exemplo.com', '2022-01-01', '2024-05-24', 1000000, 5000000, 'Descrição da empresa', NULL, 1, 1, 1),
(4, 'Minha Empresa Ltda', '12345678901234', 'Empresa Fantástica', 'Rua da Empresa, 123', 'contato@minhaempresa.com', '2024-06-01', '2024-06-01', 500000, 1000000, 'Uma breve descrição da minha empresa', NULL, 5, 1, 6),
(5, 'KKKKKK', '12931929', 'shasuua', 'asuhuda', 'KK@kk', '2004-01-06', '2024-06-01', 123123, 123123, '0', NULL, 19, 1, 17),
(6, 'adasdasd', '129319239', 'ahdasudauiago', 'iagosaudasd', 'aaa@asdasud', '2000-05-02', '2024-06-01', 100000000, 2345, 'INSERT FUNCIONANDO', NULL, 20, 1, 18);

-- --------------------------------------------------------

--
-- Estrutura para tabela `projeto_tipo`
--

CREATE TABLE `projeto_tipo` (
  `id_projeto_tipo` int(11) NOT NULL,
  `status_projeto_tipo` varchar(100) DEFAULT NULL,
  `fk_idprojeto` int(11) DEFAULT NULL,
  `fk_idtipo_projeto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `termo_condicao`
--

CREATE TABLE `termo_condicao` (
  `idtermos_condicao` int(11) NOT NULL,
  `status_projeto` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `termo_condicao`
--

INSERT INTO `termo_condicao` (`idtermos_condicao`, `status_projeto`) VALUES
(1, 'ESTOU DE ACORDO'),
(2, 'teste'),
(3, '1'),
(4, '1'),
(5, '1'),
(6, '1'),
(7, '1'),
(8, '1'),
(9, '1'),
(10, '1'),
(11, '1'),
(12, '1'),
(13, '1'),
(14, '1'),
(15, '1'),
(16, '1'),
(17, '1'),
(18, '1'),
(19, '1'),
(20, '1');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_projeto`
--

CREATE TABLE `tipo_projeto` (
  `idtipo_projeto` int(11) NOT NULL,
  `tipo_projeto` varchar(80) NOT NULL,
  `fk_projeto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nome_usuario` varchar(80) NOT NULL,
  `cpf_usuario` varchar(11) NOT NULL,
  `telefone_usuario` varchar(11) NOT NULL,
  `data_nascimento_usuario` date NOT NULL,
  `email_usuario` varchar(256) NOT NULL,
  `senha_usuario` varchar(256) NOT NULL,
  `status_usuario` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nome_usuario`, `cpf_usuario`, `telefone_usuario`, `data_nascimento_usuario`, `email_usuario`, `senha_usuario`, `status_usuario`) VALUES
(1, 'Iago', '123', '123', '2024-05-02', 'iago@teste.com', '$2y$10$NDhujBAeL.KulIhCneAhY.MMpXUjZuUOHI0KmlS0yRhjGYW7S7uca', 'Fundador'),
(2, 'Iago', '123', '47988071', '2005-12-07', 'iago@mudar', '$2y$10$55.ScEb5OMaGDLYzYnHDteX04h.eHbg1NJIlIx9XrY.ijrrOT2l4q', 'Investidor'),
(3, 'iago', '321', '4781212', '2005-12-26', 'iago@aaa', '$2y$10$PSp5Q6sA4M93X356xrXqR.Tqc5JlwLbZzA9MNx7sONybce1c28H8S', 'Investidor');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `log_projeto`
--
ALTER TABLE `log_projeto`
  ADD PRIMARY KEY (`idlog_projeto`);

--
-- Índices de tabela `projeto`
--
ALTER TABLE `projeto`
  ADD PRIMARY KEY (`idprojeto`),
  ADD KEY `fk_idtermo_condicao` (`fk_idtermo_condicao`),
  ADD KEY `fk_idusuario` (`fk_idusuario`),
  ADD KEY `fk_idlog_projeto` (`fk_idlog_projeto`);

--
-- Índices de tabela `projeto_tipo`
--
ALTER TABLE `projeto_tipo`
  ADD PRIMARY KEY (`id_projeto_tipo`),
  ADD KEY `fk_idprojeto` (`fk_idprojeto`),
  ADD KEY `fk_idtipo_projeto` (`fk_idtipo_projeto`);

--
-- Índices de tabela `termo_condicao`
--
ALTER TABLE `termo_condicao`
  ADD PRIMARY KEY (`idtermos_condicao`);

--
-- Índices de tabela `tipo_projeto`
--
ALTER TABLE `tipo_projeto`
  ADD PRIMARY KEY (`idtipo_projeto`),
  ADD KEY `fk_projeto` (`fk_projeto`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `log_projeto`
--
ALTER TABLE `log_projeto`
  MODIFY `idlog_projeto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `projeto`
--
ALTER TABLE `projeto`
  MODIFY `idprojeto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `projeto_tipo`
--
ALTER TABLE `projeto_tipo`
  MODIFY `id_projeto_tipo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `termo_condicao`
--
ALTER TABLE `termo_condicao`
  MODIFY `idtermos_condicao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `tipo_projeto`
--
ALTER TABLE `tipo_projeto`
  MODIFY `idtipo_projeto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `projeto`
--
ALTER TABLE `projeto`
  ADD CONSTRAINT `projeto_ibfk_1` FOREIGN KEY (`fk_idtermo_condicao`) REFERENCES `termo_condicao` (`idtermos_condicao`),
  ADD CONSTRAINT `projeto_ibfk_2` FOREIGN KEY (`fk_idusuario`) REFERENCES `usuario` (`idusuario`),
  ADD CONSTRAINT `projeto_ibfk_3` FOREIGN KEY (`fk_idlog_projeto`) REFERENCES `log_projeto` (`idlog_projeto`);

--
-- Restrições para tabelas `projeto_tipo`
--
ALTER TABLE `projeto_tipo`
  ADD CONSTRAINT `projeto_tipo_ibfk_1` FOREIGN KEY (`fk_idprojeto`) REFERENCES `projeto` (`idprojeto`),
  ADD CONSTRAINT `projeto_tipo_ibfk_2` FOREIGN KEY (`fk_idtipo_projeto`) REFERENCES `tipo_projeto` (`idtipo_projeto`);

--
-- Restrições para tabelas `tipo_projeto`
--
ALTER TABLE `tipo_projeto`
  ADD CONSTRAINT `tipo_projeto_ibfk_1` FOREIGN KEY (`fk_projeto`) REFERENCES `projeto` (`idprojeto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
