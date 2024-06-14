-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Jun-2024 às 02:31
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

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
-- Estrutura da tabela `log_projeto`
--

CREATE TABLE `log_projeto` (
  `idlog_projeto` int(11) NOT NULL,
  `data_hora_criada` datetime DEFAULT NULL,
  `descricao_log` varchar(80) NOT NULL,
  `status_log` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `log_projeto`
--

INSERT INTO `log_projeto` (`idlog_projeto`, `data_hora_criada`, `descricao_log`, `status_log`) VALUES
(1, '2024-05-24 09:43:03', 'Descrição do log', 'ativo'),
(2, NULL, 'asdfasdfasdfasdf', 'qwfasdfasdf'),
(3, '2024-05-31 00:00:00', 'asdfsacasdcas', 'asdsadcasdc'),
(4, '2024-05-31 00:00:00', 'inativo', 'adsfasdfasdfasdfsd'),
(5, '2024-05-31 00:00:00', 'sfdfasdfadfasfd', 'inativo'),
(6, '2024-05-31 00:00:00', 'qsdadasd', 'Ativo'),
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
(18, '2024-06-01 10:40:08', '129319239', 'inativo'),
(19, '2024-06-03 19:26:48', '2222222222', 'inativo'),
(20, '2024-06-03 19:32:39', '2222222222', 'inativo'),
(21, '2024-06-03 19:41:48', '2222222222', 'inativo'),
(22, '2024-06-03 20:33:38', '2222222222', 'inativo'),
(23, '2024-06-03 20:49:53', '2222222222', 'inativo'),
(24, '2024-06-03 20:56:51', '2222222222', 'inativo'),
(25, '2024-06-03 21:02:58', '2222222222', 'inativo'),
(26, '2024-06-13 19:22:06', 'cccc', 'Inativo'),
(27, '2024-06-13 19:23:38', 'cccc', 'Inativo'),
(28, '2024-06-13 19:43:41', 'cccc', 'Inativo'),
(29, '2024-06-13 19:44:30', 'cccc', 'Inativo'),
(30, '2024-06-13 19:45:18', 'cccc', 'Inativo'),
(31, '2024-06-13 19:46:34', 'cccc', 'Inativo'),
(32, '2024-06-13 19:52:12', 'cccc', 'Inativo'),
(33, '2024-06-13 19:52:14', 'cccc', 'Inativo'),
(34, '2024-06-13 19:52:18', 'cccc', 'Inativo'),
(35, '2024-06-13 19:52:21', 'cccc', 'Inativo'),
(36, '2024-06-13 19:53:14', '123123123', 'Inativo'),
(37, '2024-06-13 19:54:47', '123123123', 'Inativo'),
(38, '2024-06-13 19:55:17', '1231231', 'Inativo'),
(39, '2024-06-13 19:59:45', '1231231', 'Inativo'),
(40, '2024-06-13 19:59:48', '1231231', 'Inativo'),
(41, '2024-06-13 20:00:47', '1231231', 'Inativo'),
(42, '2024-06-13 20:01:15', '1231231', 'Inativo'),
(43, '2024-06-13 20:01:21', '1231231', 'Inativo'),
(44, '2024-06-13 20:01:54', '1231231', 'Inativo'),
(45, '2024-06-13 20:03:11', '1231231', 'Inativo'),
(46, '2024-06-13 20:04:10', '1231231', 'Inativo'),
(47, '2024-06-13 20:06:34', '1231231', 'Inativo'),
(48, '2024-06-13 20:06:37', '1231231', 'Inativo'),
(49, '2024-06-13 20:07:52', '1231231', 'Inativo'),
(50, '2024-06-13 20:07:54', '1231231', 'Inativo'),
(51, '2024-06-13 20:10:48', '1231231', 'Inativo'),
(52, '2024-06-13 20:12:29', '123456789', 'Inativo'),
(53, '2024-06-13 20:16:39', '123456', 'Inativo'),
(54, '2024-06-13 20:19:35', '178237831', 'Inativo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `projeto`
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
  `summernote_introducao` text NOT NULL,
  `summernote_imagens` text NOT NULL,
  `summernote_objetivo` text NOT NULL,
  `summernote_video` text NOT NULL,
  `fk_idtermo_condicao` int(11) DEFAULT NULL,
  `fk_idusuario` int(11) DEFAULT NULL,
  `fk_idlog_projeto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `projeto`
--

INSERT INTO `projeto` (`idprojeto`, `razao_social`, `cnpj_projeto`, `nome_fantasia`, `endereco`, `email_corporativo`, `data_abertura_empresa`, `data_abertura_site`, `patrimonio_oferecido`, `meta_total`, `desc_empresa`, `valor_recebido`, `summernote_introducao`, `summernote_imagens`, `summernote_objetivo`, `summernote_video`, `fk_idtermo_condicao`, `fk_idusuario`, `fk_idlog_projeto`) VALUES
(3, 'Razão Social Exemplo Ltda', '12345678000100', 'Nome Fantasia Exemplo', 'Rua Exemplo, 123', 'contato@exemplo.com', '2022-01-01', '2024-05-24', 1000000, 5000000, 'Descrição da empresa', NULL, '', '', '', '', 1, 1, 1),
(4, 'Minha Empresa Ltda', '12345678901234', 'Empresa Fantástica', 'Rua da Empresa, 123', 'contato@minhaempresa.com', '2024-06-01', '2024-06-01', 500000, 1000000, 'Uma breve descrição da minha empresa', NULL, '', '', '', '', 5, 1, 6),
(5, 'KKKKKK', '12931929', 'shasuua', 'asuhuda', 'KK@kk', '2004-01-06', '2024-06-01', 123123, 123123, '0', NULL, '', '', '', '', 19, 1, 17),
(6, 'adasdasd', '129319239', 'ahdasudauiago', 'iagosaudasd', 'aaa@asdasud', '2000-05-02', '2024-06-01', 100000000, 2345, 'INSERT FUNCIONANDO', 0, '', '', '', '', 20, 1, 18),
(7, 'cavalo', '2222222222', 'cavalo', 'rua n sei aonde', 'cav@teste.com', '2024-06-12', '2024-06-03', 1000, 2000, 'empresa de cavalo', NULL, '', '', '', '', 21, 4, 19),
(8, 'cavalo', '2222222222', 'cavalo', 'rua n sei aonde', 'cav@teste.com', '2024-06-19', '2024-06-03', 1000, 2000, 'empresa de cavalo', NULL, '', '', '', '', 22, 4, 20),
(9, 'cavalo', '2222222222', 'cavalo', 'rua n sei aonde', 'cav@teste.com', '2024-06-02', '2024-06-03', 1000, 2000, 'empresa de cavalo', NULL, '', '', '', '', 23, 4, 21),
(10, 'cavalo', '2222222222', 'cavalo', 'rua n sei aonde', 'cav@teste.com', '2024-06-01', '2024-06-03', 1000, 2000, 'empresa de cavalo', NULL, '', '', '', '', 24, 4, 22),
(11, 'cavalo', '2222222222', 'cavalo', 'rua n sei aonde', 'cav@teste.com', '2024-06-01', '2024-06-03', 1000, 2000, 'empresa de cavalo', NULL, '', '', '', '', 25, 4, 23),
(12, 'cavalo', '2222222222', 'cavalo', 'rua n sei aonde', 'cav@teste.com', '2024-06-01', '2024-06-03', 1000, 2000, 'empresa de cavalo', NULL, '', '', '', '', 26, 4, 24),
(13, 'cavalo', '2222222222', 'cavalo', 'rua n sei aonde', 'cav@teste.com', '2024-06-02', '2024-06-03', 1000, 2000, 'empresa de cavalo', NULL, '', '', '', '', 27, 4, 25),
(14, 'Empresa Exemplo Ltda', '12.345.678/0001-99', 'Exemplo Fantasia', 'Rua Exemplo, 123', 'exemplo@empresa.com', '2024-01-01', '2024-06-13', 500000, 1000000, 'Descrição da empresa exemplo', NULL, 'Introdução do Summernote Exemplo', 'Imagens do Summernote Exemplo', 'Objetivo do Summernote Exemplo', 'Vídeo do Summernote Exemplo', 1, 1, 1),
(15, 'asdasd', '1231231', 'asdasdasd', 'asdasdasd', 'asdasdasd@asdasd', '2024-06-12', '2024-06-13', 123, 123, 'asdasdcsdasda', NULL, 'Faça a susadfasdfa introdução', 'Imagens da sugasasdga Startup', 'O objetivo do sadgasgproduto e suas qualidades.', '0', 53, 4, 51),
(16, 'testando', '123456789', 'asidsdaiia', 'asdsdiasdi', 'teste@teste', '2024-06-12', '2024-06-13', 1000, 10000, 'asdasdasdasdasdasdasd', NULL, 'teste', '<i>teste</i>', '<b>sadfsadf</b>', '0', 54, 4, 52),
(17, 'elyan', '123456', 'elyanfantasia', 'elyanquemoralogoali', 'elyan@corporas', '2003-02-01', '2024-06-13', 10000, 1202, 'ashusauh', NULL, '<b>Faça a sua introdução</b>', '<u>Imagens da sua Startup</u>', '<b>O objetivo do seu produto e suas qualidades.</b>', '0', 55, 4, 53),
(18, 'caralho', '178237831', 'ashuahu', 'asdhasdhu', 'testando@testando', '2005-02-01', '2024-06-13', 10000, 2000, 'sacuhashuc', NULL, '<i>Faça a sua introdução</i>', '<u>Imagens da sua Startup</u>', '<i>O objetivo do seu produto e suas qualidades.</i>', '<b>Acrescente um video complementar!</b>', 56, 4, 54);

-- --------------------------------------------------------

--
-- Estrutura da tabela `projeto_tipo`
--

CREATE TABLE `projeto_tipo` (
  `id_projeto_tipo` int(11) NOT NULL,
  `status_projeto_tipo` varchar(100) DEFAULT NULL,
  `fk_idprojeto` int(11) DEFAULT NULL,
  `fk_idtipo_projeto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `termo_condicao`
--

CREATE TABLE `termo_condicao` (
  `idtermos_condicao` int(11) NOT NULL,
  `status_projeto` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `termo_condicao`
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
(20, '1'),
(21, '1'),
(22, '1'),
(23, '1'),
(24, '1'),
(25, '1'),
(26, '1'),
(27, '1'),
(28, '1'),
(29, '1'),
(30, '1'),
(31, '1'),
(32, '1'),
(33, '1'),
(34, '1'),
(35, '1'),
(36, '1'),
(37, '1'),
(38, '1'),
(39, '1'),
(40, '1'),
(41, '1'),
(42, '1'),
(43, '1'),
(44, '1'),
(45, '1'),
(46, '1'),
(47, '1'),
(48, '1'),
(49, '1'),
(50, '1'),
(51, '1'),
(52, '1'),
(53, '1'),
(54, '1'),
(55, '1'),
(56, '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_projeto`
--

CREATE TABLE `tipo_projeto` (
  `idtipo_projeto` int(11) NOT NULL,
  `tipo_projeto` varchar(80) NOT NULL,
  `fk_projeto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nome_usuario`, `cpf_usuario`, `telefone_usuario`, `data_nascimento_usuario`, `email_usuario`, `senha_usuario`, `status_usuario`) VALUES
(1, 'Iago', '123', '123', '2024-05-02', 'iago@teste.com', '$2y$10$NDhujBAeL.KulIhCneAhY.MMpXUjZuUOHI0KmlS0yRhjGYW7S7uca', 'Fundador'),
(2, 'Iago', '123', '47988071', '2005-12-07', 'iago@mudar', '$2y$10$55.ScEb5OMaGDLYzYnHDteX04h.eHbg1NJIlIx9XrY.ijrrOT2l4q', 'Investidor'),
(3, 'iago', '321', '4781212', '2005-12-26', 'iago@aaa', '$2y$10$PSp5Q6sA4M93X356xrXqR.Tqc5JlwLbZzA9MNx7sONybce1c28H8S', 'Investidor'),
(4, 'elyan', '888.888.888', '444444444', '2005-12-24', 'elyan@teste.com', '$2y$10$QKFMikrZl2/6S5CJd/C7recIO.JhQsVUycA/dxeeki1h4yboNrf1C', 'Fundador'),
(5, 'elyan', '888.888.888', '77777777', '2005-12-24', 'elyann@teste.com', '$2y$10$nq8rTznuSj8ZVsRokmEd8.ihPBoKGUzBhYVHfnELuTkoj2nNgjV/K', 'Fundador'),
(6, 'elyan', '888.888.888', '88888888', '2005-12-24', 'ellyan@teste.com', '$2y$10$j.7S7YzDXJzI5PYiFNSNwuTmHH9ccy68YXcKYb5OpSw/8RlHE.BNG', 'Fundador'),
(7, 'Admin', '123.456.789', '22347237427', '2005-12-10', 'admin@startupconnect.br', '$2y$10$xOfZRqRokxAztHhbUaLExOtofb.ylOZjXy1CJS9wsHk1jjp2kmyoi', 'Admin'),
(8, 'teste', '123.123.192', '24382147831', '2005-12-17', 'teste@iago', '$2y$10$Sb4BKIj5iwswHx95N2/6Ge9J3WTVwaExaDkYtKoAgSrUrsXQnvJ1S', 'Fundador');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `log_projeto`
--
ALTER TABLE `log_projeto`
  ADD PRIMARY KEY (`idlog_projeto`);

--
-- Índices para tabela `projeto`
--
ALTER TABLE `projeto`
  ADD PRIMARY KEY (`idprojeto`),
  ADD KEY `fk_idtermo_condicao` (`fk_idtermo_condicao`),
  ADD KEY `fk_idusuario` (`fk_idusuario`),
  ADD KEY `fk_idlog_projeto` (`fk_idlog_projeto`);

--
-- Índices para tabela `projeto_tipo`
--
ALTER TABLE `projeto_tipo`
  ADD PRIMARY KEY (`id_projeto_tipo`),
  ADD KEY `fk_idprojeto` (`fk_idprojeto`),
  ADD KEY `fk_idtipo_projeto` (`fk_idtipo_projeto`);

--
-- Índices para tabela `termo_condicao`
--
ALTER TABLE `termo_condicao`
  ADD PRIMARY KEY (`idtermos_condicao`);

--
-- Índices para tabela `tipo_projeto`
--
ALTER TABLE `tipo_projeto`
  ADD PRIMARY KEY (`idtipo_projeto`),
  ADD KEY `fk_projeto` (`fk_projeto`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `log_projeto`
--
ALTER TABLE `log_projeto`
  MODIFY `idlog_projeto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de tabela `projeto`
--
ALTER TABLE `projeto`
  MODIFY `idprojeto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `projeto_tipo`
--
ALTER TABLE `projeto_tipo`
  MODIFY `id_projeto_tipo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `termo_condicao`
--
ALTER TABLE `termo_condicao`
  MODIFY `idtermos_condicao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de tabela `tipo_projeto`
--
ALTER TABLE `tipo_projeto`
  MODIFY `idtipo_projeto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `projeto`
--
ALTER TABLE `projeto`
  ADD CONSTRAINT `projeto_ibfk_1` FOREIGN KEY (`fk_idtermo_condicao`) REFERENCES `termo_condicao` (`idtermos_condicao`),
  ADD CONSTRAINT `projeto_ibfk_2` FOREIGN KEY (`fk_idusuario`) REFERENCES `usuario` (`idusuario`),
  ADD CONSTRAINT `projeto_ibfk_3` FOREIGN KEY (`fk_idlog_projeto`) REFERENCES `log_projeto` (`idlog_projeto`);

--
-- Limitadores para a tabela `projeto_tipo`
--
ALTER TABLE `projeto_tipo`
  ADD CONSTRAINT `projeto_tipo_ibfk_1` FOREIGN KEY (`fk_idprojeto`) REFERENCES `projeto` (`idprojeto`),
  ADD CONSTRAINT `projeto_tipo_ibfk_2` FOREIGN KEY (`fk_idtipo_projeto`) REFERENCES `tipo_projeto` (`idtipo_projeto`);

--
-- Limitadores para a tabela `tipo_projeto`
--
ALTER TABLE `tipo_projeto`
  ADD CONSTRAINT `tipo_projeto_ibfk_1` FOREIGN KEY (`fk_projeto`) REFERENCES `projeto` (`idprojeto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
