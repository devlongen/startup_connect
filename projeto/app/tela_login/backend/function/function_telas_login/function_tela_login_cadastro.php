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
    $tipo_usuario = $_POST['tipo_usuario'];
    # Chama a função de inserção no banco de dados
    insert_db($conexao, $nome_cadastro_db, $email_cadastro_db, $senha_cadastro_db, $cpf_cadastro_db, $telefone_cadastro_db, $data_cadastro_db, $tipo_usuario);
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
function insert_db($conexao, $nome_cadastro_db, $email_cadastro_db, $senha_cadastro_db, $cpf_cadastro_db, $telefone_cadastro_db, $data_cadastro_db, $tipo_usuario)
{
    # Criptografa a senha
    $senha_hash = password_hash($senha_cadastro_db, PASSWORD_DEFAULT);
    # Prepara a declaração SQL para inserir os dados
    $stmt = $conexao->prepare("INSERT INTO usuario (nome_usuario, email_usuario, senha_usuario, cpf_usuario, telefone_usuario, data_nascimento_usuario, status_usuario) VALUES (?, ?, ?, ?, ?, ?, ?)");
    # Vincula os parâmetros à declaração SQL
    $stmt->bind_param("sssssss", $nome_cadastro_db, $email_cadastro_db, $senha_hash, $cpf_cadastro_db, $telefone_cadastro_db, $data_cadastro_db, $tipo_usuario);
    # Executa a declaração SQL
    $stmt->execute();
    session_start();
    $_SESSION['usuario'] = array(
        'nome' => $nome_cadastro_db,
        'email' => $email_cadastro_db,
        'usuario' => $tipo_usuario
    );
    header("Location: ../../../../");
}

// Função para verificar o login do usuário
function verify_login_db($conexao, $email_login_db, $senha_login_db)
{
    // Prepara a consulta SQL para selecionar o usuário pelo email
    $stmt = $conexao->prepare("SELECT id_usuario, email_usuario, senha_usuario FROM usuario WHERE email_usuario = ?");
    // Verifica se a preparação da consulta falhou
    if ($stmt === false) {
        echo "Erro ao preparar a consulta SQL: " . $conexao->error;
        return false;
    }

    $id_usuario = "";
    $email_usuario = "";
    $senha_usuario = "";

    // Vincula o parâmetro à consulta SQL
    $stmt->bind_param("s", $email_login_db);
    // Executa a consulta SQL
    if ($stmt->execute()) {
        // Vincula o resultado da consulta a variáveis
        $stmt->bind_result($id_usuario, $email_usuario, $senha_usuario);
        // Obtém o resultado da consulta
        $stmt->fetch();
        // Verifica se o usuário foi encontrado
        if ($email_usuario !== "") {
            // Verifica se a senha fornecida corresponde à senha no banco de dados
            if (password_verify($senha_login_db, $senha_usuario)) {
                // Se a senha estiver correta, cria um cookie de sessão
                $token = gerarToken(); // Função para gerar um token de sessão único
                setcookie('token', $token, time() + (86400 * 30), '/'); // Armazena o cookie por 30 dias

                // Defina a sessão do usuário
                $_SESSION['user_id'] = $id_usuario;
                $_SESSION['email'] = $email_usuario;

                // Redireciona o usuário para a página de perfil, por exemplo
                if ($tipo_usuario == "fundador"){
                    header('Location: fundador.php');
                    exit();
                }else{
                    header('Location: investidor.php ');
                }
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