-- Criar o banco de dados se não existir e usá-lo
CREATE DATABASE IF NOT EXISTS startup_connect;
USE startup_connect;

-- Tabela de termos e condições
CREATE TABLE IF NOT EXISTS termo_condicao (
    idtermos_condicao INT NOT NULL AUTO_INCREMENT, -- ID do termo de condição
    status_projeto VARCHAR(45) NOT NULL, -- Status do projeto
    PRIMARY KEY (idtermos_condicao) -- Chave primária
);

-- Tabela de log de projetos
CREATE TABLE IF NOT EXISTS log_projeto (
    idlog_projeto INT NOT NULL AUTO_INCREMENT, -- ID do log do projeto
    data_hora_acessada DATETIME NOT NULL, -- Data e hora de acesso
    descricao_log VARCHAR(80) NOT NULL, -- Descrição do log
    status_log VARCHAR(20) NOT NULL, -- Status do log
    idusuario INT NOT NULL, -- ID do usuário associado ao log
    PRIMARY KEY (idlog_projeto) -- Chave primária
);

-- Tabela de usuários
CREATE TABLE IF NOT EXISTS usuario (
    idusuario INT NOT NULL AUTO_INCREMENT, -- ID do usuário
    nome_usuario VARCHAR(80) NOT NULL, -- Nome do usuário
    cpf_usuario VARCHAR(11) NOT NULL, -- CPF do usuário
    telefone_usuario VARCHAR(11) NOT NULL, -- Telefone do usuário
    data_nascimento_usuario DATE NOT NULL, -- Data de nascimento do usuário
    genero_usuario VARCHAR(10) NOT NULL, -- Gênero do usuário
    email_usuario VARCHAR(256) NOT NULL, -- E-mail do usuário
    senha_usuario VARCHAR(256) NOT NULL, -- Senha do usuário
    status_usuario VARCHAR(30) NOT NULL, -- Status que usuário pertence
    PRIMARY KEY (idusuario) -- Chave primária
);

-- Tabela de projetos
CREATE TABLE IF NOT EXISTS projeto (
    idprojeto INT NOT NULL AUTO_INCREMENT, -- ID do projeto
    razao_social VARCHAR(80) NOT NULL, -- Razão social do projeto
    cnpj_projeto VARCHAR(450) NOT NULL, -- CNPJ do projeto
    nome_fantasia VARCHAR(45) NOT NULL, -- Nome fantasia do projeto
    endereco VARCHAR(45) NOT NULL, -- Endereço do projeto
    email_corporativo VARCHAR(45) NOT NULL, -- E-mail corporativo do projeto
    data_abertura_empresa DATE, -- Data de abertura da empresa
    data_abertura_site DATE, -- Data de abertura do site
    patrimonio_oferecido FLOAT NOT NULL, -- Patrimônio oferecido pelo projeto
    meta_total INT NOT NULL, -- Meta total do projeto
    valor_recebido INT NOT NULL, -- Valor recebido pelo projeto
    fk_idtermo_condicao INT, -- Chave estrangeira para o termo de condição
    fk_idusuario INT, -- Chave estrangeira para o usuário
    fk_idlog_projeto INT, -- Chave estrangeira para o log do projeto
    PRIMARY KEY (idprojeto), -- Chave primária
    FOREIGN KEY (fk_idtermo_condicao) REFERENCES termo_condicao(idtermos_condicao), -- Chave estrangeira da tabela termo_condicao
    FOREIGN KEY (fk_idusuario) REFERENCES usuario(idusuario), -- Chave estrangeira da tabela usuario
    FOREIGN KEY (fk_idlog_projeto) REFERENCES log_projeto(idlog_projeto) -- Chave estrangeira da tabela log_projeto
);

-- Tabela de tipos de projeto
CREATE TABLE IF NOT EXISTS tipo_projeto (
    idtipo_projeto INT NOT NULL AUTO_INCREMENT, -- ID do tipo de projeto
    tipo_projeto VARCHAR(80) NOT NULL, -- Tipo de projeto
    fk_projeto INT, -- Chave estrangeira para o projeto
    PRIMARY KEY (idtipo_projeto), -- Chave primária
    FOREIGN KEY (fk_projeto) REFERENCES projeto(idprojeto) -- Chave estrangeira da tabela projeto
);

-- Tabela de projetos e tipos associados
CREATE TABLE IF NOT EXISTS projeto_tipo (
    id_projeto_tipo INT NOT NULL AUTO_INCREMENT, -- ID do projeto e tipo associado
    status_projeto_tipo VARCHAR(100), -- Status do projeto e tipo associado
    fk_idprojeto INT, -- Chave estrangeira para o projeto
    fk_idtipo_projeto INT, -- Chave estrangeira para o tipo de projeto
    PRIMARY KEY (id_projeto_tipo), -- Chave primária
    FOREIGN KEY (fk_idprojeto) REFERENCES projeto(idprojeto), -- Chave estrangeira da tabela projeto
    FOREIGN KEY (fk_idtipo_projeto) REFERENCES tipo_projeto(idtipo_projeto) -- Chave estrangeira da tabela tipo_projeto
);
