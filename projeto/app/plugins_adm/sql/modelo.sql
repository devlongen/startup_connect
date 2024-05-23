-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Abr-2024 às 00:06
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: modelo
--

-- --------------------------------------------------------

--
-- Estrutura da tabela categoria
--

CREATE TABLE categoria (
  idCategoria int(11) NOT NULL COMMENT '?',
  Descricao varchar(80) NOT NULL COMMENT '?'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela categoria
--

INSERT INTO categoria (idCategoria, Descricao) VALUES
(1, 'Camisa'),
(2, 'Calça');

-- --------------------------------------------------------

--
-- Estrutura da tabela produto
--

CREATE TABLE produto (
  idProduto int(11) NOT NULL COMMENT '?',
  idCategoria int(11) NOT NULL COMMENT '?',
  Descricao varchar(80) DEFAULT NULL COMMENT '?'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela tipousuario
--

CREATE TABLE tipousuario (
  idTipoUsuario int(11) NOT NULL COMMENT 'PK - Código identificador do tipo de usuário',
  Descricao varchar(50) NOT NULL COMMENT 'Descrição do tipo de usuário',
  Ativo char(1) NOT NULL COMMENT 'Tipo de usuário ativo: S-Sim / N-Não'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='Tabela para armazenar os tipos de usuário';

--
-- Extraindo dados da tabela tipousuario
--

INSERT INTO tipousuario (idTipoUsuario, Descricao, Ativo) VALUES
(1, 'Admin', 'S'),
(2, 'Empresa', 'S'),
(3, 'Comum', 'S');

-- --------------------------------------------------------

--
-- Estrutura da tabela usuarios
--

CREATE TABLE usuarios (
  idUsuario int(11) NOT NULL COMMENT 'PK - Código identificador do usuário',
  idTipoUsuario int(11) NOT NULL COMMENT 'FK - Código identificador do tipo de usuário',
  Login varchar(80) NOT NULL COMMENT 'Login de acesso (e-mail)',
  Senha varchar(32) NOT NULL COMMENT 'Senha md5',
  Nome varchar(80) NOT NULL COMMENT 'Nome do usuário',
  Foto varchar(200) DEFAULT NULL COMMENT 'Imagem do usuário',
  FlgAtivo char(1) NOT NULL COMMENT 'Usuário ativo: S-Sim / N-Não'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela usuarios
--

INSERT INTO usuarios (idUsuario, idTipoUsuario, Login, Senha, Nome, Foto, FlgAtivo) VALUES
(1, 1, 'a@teste.com', '202cb962ac59075b964b07152d234b70', 'Administrador', 'dist/img/4a4d107c7d7cfa34e099dc3484ade755.jpg', 'S'),
(2, 2, 'emp@teste.com', '202cb962ac59075b964b07152d234b70', 'Teste Joao 2', 'dist/img/b9fb9d37bdf15a699bc071ce49baea53.jpg', 'S'),
(4, 1, 'j@teste.com', '202cb962ac59075b964b07152d234b70', 'Joao', 'dist/img/1c56cb9527018d07f5846fc1b8dfa19e.jpg', 'S');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela categoria
--
ALTER TABLE categoria
  ADD PRIMARY KEY (idCategoria);

--
-- Índices para tabela produto
--
ALTER TABLE produto
  ADD PRIMARY KEY (idProduto),
  ADD KEY fk_Categoria (idCategoria);

--
-- Índices para tabela tipousuario
--
ALTER TABLE tipousuario
  ADD PRIMARY KEY (idTipoUsuario);

--
-- Índices para tabela usuarios
--
ALTER TABLE usuarios
  ADD PRIMARY KEY (idUsuario),
  ADD KEY fk_TipoUsuario (idTipoUsuario);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela categoria
--
ALTER TABLE categoria
  MODIFY idCategoria int(11) NOT NULL AUTO_INCREMENT COMMENT '?', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela produto
--
ALTER TABLE produto
  MODIFY idProduto int(11) NOT NULL AUTO_INCREMENT COMMENT '?';

--
-- AUTO_INCREMENT de tabela tipousuario
--
ALTER TABLE tipousuario
  MODIFY idTipoUsuario int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK - Código identificador do tipo de usuário', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela usuarios
--
ALTER TABLE usuarios
  MODIFY idUsuario int(11) NOT NULL AUTO_INCREMENT COMMENT 'PK - Código identificador do usuário', AUTO_INCREMENT=7;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela produto
--
ALTER TABLE produto
  ADD CONSTRAINT produto_ibfk_1 FOREIGN KEY (idCategoria) REFERENCES categoria (idCategoria);

--
-- Limitadores para a tabela usuarios
--
ALTER TABLE usuarios
  ADD CONSTRAINT usuarios_ibfk_1 FOREIGN KEY (idTipoUsuario) REFERENCES tipousuario (idTipoUsuario);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
