<?php
# Verifica se o formulário de cadastro foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["cadastro_db"])) {
    # Inclui o arquivo de conexão com o banco de dados
    include_once('../conn_db.php');
    # Recupera os dados do formulário de cadastro
    $nome_cadastro_db = $_POST['nome_insert_db'];
    $email_cadastro_db = $_POST['email_insert_db'];
    $senha_cadastro_db = $_POST['senha_insert_db'];
    $cpf_cadastro_db = $_POST['cpf_insert_db'];
    $telefone_cadastro_db = $_POST['telefone_insert_db'];
    $data_cadastro_db = $_POST['data_de_nascimento_insert_db'];
    $tipo_usuario_db = $_POST['tipo_usuario_db'];
    # Chama a função de inserção no banco de dados
    insert_db($conexao, $nome_cadastro_db, $email_cadastro_db, $senha_cadastro_db, $cpf_cadastro_db, $telefone_cadastro_db, $data_cadastro_db, $tipo_usuario_db);
}
# Verifica se o formulário de login foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login_db"])) {
    require_once('../conn_db.php');
    # Recupera os dados do formulário de login
    $email_login_db = $_POST['email_login_db'];
    $senha_login_db = $_POST['senha_login_db'];
    # Chama a função para verificar o login
    verify_login_db($conexao, $email_login_db, $senha_login_db);
}

# Função para inserir dados no banco de dados
function insert_db($conexao, $nome_cadastro_db, $email_cadastro_db, $senha_cadastro_db, $cpf_cadastro_db, $telefone_cadastro_db, $data_cadastro_db, $tipo_usuario_db)
{
    # Criptografa a senha
    $senha_hash = password_hash($senha_cadastro_db, PASSWORD_DEFAULT);
    # Prepara a declaração SQL para inserir os dados
    $stmt = $conexao->prepare("INSERT INTO usuario (nome_usuario, email_usuario, senha_usuario, cpf_usuario, telefone_usuario, data_nascimento_usuario, status_usuario) VALUES (?, ?, ?, ?, ?, ?, ?)");
    # Vincula os parâmetros à declaração SQL
    $stmt->bind_param("sssssss", $nome_cadastro_db, $email_cadastro_db, $senha_hash, $cpf_cadastro_db, $telefone_cadastro_db, $data_cadastro_db, $tipo_usuario_db);
    # Executa a declaração SQL
    $stmt->execute();
    session_start();
    $_SESSION['usuario'] = array(
        'nome' => $nome_cadastro_db,
        'email' => $email_cadastro_db,
        'usuario' => $tipo_usuario_db
    );
    header("Location: ../../../../");
}

// Função para verificar o login do usuário
function verify_login_db($conexao, $email_login_db, $senha_login_db)
{
    // Inicia a sessão
    session_start();

    // Prepara a consulta SQL para selecionar o usuário pelo email
    $stmt = $conexao->prepare("SELECT idusuario, email_usuario, senha_usuario, status_usuario FROM usuario WHERE email_usuario = ?");
    // Verifica se a preparação da consulta falhou
    if ($stmt === false) {
        echo "Erro ao preparar a consulta SQL: " . $conexao->error;
        return false;
    }

    // Vincula o parâmetro à consulta SQL
    $stmt->bind_param("s", $email_login_db);
    // Executa a consulta SQL
    if ($stmt->execute()) {
        // Vincula o resultado da consulta a variáveis
        $stmt->bind_result($id_usuario, $email_usuario, $senha_usuario, $tipo_usuario_db);
        // Obtém o resultado da consulta
        $stmt->fetch();
        // Verifica se o usuário foi encontrado
        if ($email_usuario !== null) {
            // Verifica se a senha fornecida corresponde à senha no banco de dados
            if (password_verify($senha_login_db, $senha_usuario)) {
                // Se a senha estiver correta, define a sessão do usuário
                $_SESSION['user_id'] = $id_usuario;
                $_SESSION['email'] = $email_usuario;
                $_SESSION['usuario'] = $tipo_usuario_db;

                // Redireciona o usuário para a página de perfil, por exemplo
                header("Location: ../../../../");
                exit(); // Certifica-se de que o script não continue a ser executado após o redirecionamento
            } else {
                // Senha incorreta
                echo "Senha incorreta";
                return false;
            }
        } else {
            // Usuário não encontrado
            echo "Usuário não encontrado";
            return false;
        }
    } else {
        echo "Erro ao executar a consulta SQL: " . $stmt->error;
        return false;
    }
}