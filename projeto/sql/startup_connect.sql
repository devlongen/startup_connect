-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 20/05/2024 às 02:51
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
-- Banco de dados: `startup_connect`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `log_projeto`
--

CREATE TABLE `log_projeto` (
  `idlog_projeto` int(11) NOT NULL,
  `data_hora_acessada` datetime NOT NULL,
  `descricao_log` varchar(80) NOT NULL,
  `status_log` varchar(20) NOT NULL,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `valor_recebido` int(11) NOT NULL,
  `fk_idtermo_condicao` int(11) DEFAULT NULL,
  `fk_idusuario` int(11) DEFAULT NULL,
  `fk_idlog_projeto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 'Iago', '123', '123', '2024-05-02', 'iago@teste.com', '$2y$10$NDhujBAeL.KulIhCneAhY.MMpXUjZuUOHI0KmlS0yRhjGYW7S7uca', 'Fundador');

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
  MODIFY `idlog_projeto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `projeto`
--
ALTER TABLE `projeto`
  MODIFY `idprojeto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `projeto_tipo`
--
ALTER TABLE `projeto_tipo`
  MODIFY `id_projeto_tipo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `termo_condicao`
--
ALTER TABLE `termo_condicao`
  MODIFY `idtermos_condicao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tipo_projeto`
--
ALTER TABLE `tipo_projeto`
  MODIFY `idtipo_projeto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
