<?php
# Verifica se o formulário de cadastro foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["cadastro_db"])) {
    # Inclui o arquivo de conexão com o banco de dados
    include_once('../../conn_db.php');
    # Recupera os dados do formulário de cadastro
    $nome_cadastro_db = $_POST['nome_insert_db'];
    $email_cadastro_db = $_POST['email_insert_db'];
    $senha_cadastro_db = $_POST['senha_insert_db'];
    $cpf_cadastro_db = $_POST['cpf_insert_db'];
    $telefone_cadastro_db = $_POST['telefone_insert_db'];
    $data_cadastro_db = $_POST['data_de_nascimento_insert_db'];
    # Chama a função de inserção no banco de dados
    insert_db($conexao, $nome_cadastro_db, $email_cadastro_db, $senha_cadastro_db, $cpf_cadastro_db, $telefone_cadastro_db, $data_cadastro_db);
}
# Verifica se o formulário de login foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login_db"])) {
    require_once('../../conn_db.php');
    # Recupera os dados do formulário de login
    $email_login_db = $_POST['email_login_db'];
    $senha_login_db = $_POST['senha_login_db'];
    # Chama a função para verificar o login
    verify_login_db($conexao, $email_login_db, $senha_login_db);
}

# Função para inserir dados no banco de dados
function insert_db($conexao, $nome_cadastro_db, $email_cadastro_db, $senha_cadastro_db, $cpf_cadastro_db, $telefone_cadastro_db, $data_cadastro_db)
{
    # Criptografa a senha
    $senha_hash = password_hash($senha_cadastro_db, PASSWORD_DEFAULT);
    # Prepara a declaração SQL para inserir os dados
    $stmt = $conexao->prepare("INSERT INTO usuario (nome_usuario, email_usuario, senha_usuario, cpf_usuario, telefone_usuario, data_nascimento_usuario) VALUES (?, ?, ?, ?, ?, ?)");
    # Vincula os parâmetros à declaração SQL
    $stmt->bind_param("ssssss", $nome_cadastro_db, $email_cadastro_db, $senha_hash, $cpf_cadastro_db, $telefone_cadastro_db, $data_cadastro_db);
    # Executa a declaração SQL
    $stmt->execute();
    # Redireciona para a tela inicial (se necessário)
    # header("Location:tela inicial salvando login do usuario)
}

// Função para verificar o login do usuário
function verify_login_db($conexao, $email_login_db, $senha_login_db)
{
    // Prepara a consulta SQL para selecionar o usuário pelo email
    $stmt = $conexao->prepare("SELECT email_usuario, senha_usuario FROM usuario WHERE email_usuario = ?");
    // Verifica se a preparação da consulta falhou
    if ($stmt === false) {
        echo "Erro ao preparar a consulta SQL: " . $conexao->error;
        return false;
    }

    $email_usuario = ""; // Inicializa a variável $email_usuario com uma string vazia
    $senha_usuario = ""; // Inicializa a variável $senha_usuario com uma string vazia

    // Vincula o parâmetro à consulta SQL
    $stmt->bind_param("s", $email_login_db);
    // Executa a consulta SQL
    if ($stmt->execute()) {
        // Vincula o resultado da consulta a variáveis
        $stmt->bind_result($email_usuario, $senha_usuario);
        // Obtém o resultado da consulta
        $stmt->fetch();
        // Verifica se o usuário foi encontrado
        if ($email_usuario !== "") {
            // Verifica se a senha fornecida corresponde à senha no banco de dados
            if (password_verify($senha_login_db, $senha_usuario)) {
                return true; // Senha correta, login válido
            } else {
                return false; // Senha incorreta
            }
        } else {
            echo "Usuário não encontrado"; // Usuário não encontrado
            return false;
        }
    } else {
        echo "Erro ao executar a consulta SQL: " . $stmt->error;
        return false;
    }
}
