<?php
 session_start();
# Verifica se o formulário de cadastro foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["cadastro_db"])) {
    # Inclui o arquivo de conexão com o banco de dados
    include_once('../../../conn_db.php');
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
    require_once('../../../conn_db.php');
    # Recupera os dados do formulário de login
    $email_login_db = $_POST['email_login_db'];
    $senha_login_db = $_POST['senha_login_db'];
    # Chama a função para verificar o login
    verify_login_db($conexao, $email_login_db, $senha_login_db);
}

# Função para inserir dados no banco de dados
function insert_db($conexao, $nome_cadastro_db, $email_cadastro_db, $senha_cadastro_db, $cpf_cadastro_db, $telefone_cadastro_db, $data_cadastro_db, $tipo_usuario_db)
{
    // Verifica se o email já existe no banco de dados
    $stmt = $conexao->prepare("SELECT idusuario FROM usuario WHERE email_usuario = ?");
    $stmt->bind_param("s", $email_cadastro_db);
    $stmt->execute();
    $stmt->store_result();

    // Se já existir um registro com o mesmo email, exiba uma mensagem de erro
    if ($stmt->num_rows > 0) {
        echo "Este email já está cadastrado.";
        return false;
    }
    # Criptografa a senha
    $senha_hash = password_hash($senha_cadastro_db, PASSWORD_DEFAULT);
    # Prepara a declaração SQL para inserir os dados
    $stmt = $conexao->prepare("INSERT INTO usuario (nome_usuario, email_usuario, senha_usuario, cpf_usuario, telefone_usuario, data_nascimento_usuario, status_usuario) VALUES (?, ?, ?, ?, ?, ?, ?)");
    # Vincula os parâmetros à declaração SQL
    $stmt->bind_param("sssssss", $nome_cadastro_db, $email_cadastro_db, $senha_hash, $cpf_cadastro_db, $telefone_cadastro_db, $data_cadastro_db, $tipo_usuario_db);
    # Executa a declaração SQL
    $stmt->execute();
    $_SESSION['usuario'] = array(
        'nome' => $nome_cadastro_db,
        'status' => $tipo_usuario_db,
        'email' => $email_cadastro_db
    );
    if ($_SESSION['usuario']['status'] == "Fundador"){
        header("Location: ../../../plugins_empresa/cadastro_empresa.php");
    }else{
        header("Location: ../../../plugins_projeto/projeto.php");
    }
}

// Função para verificar o login do usuário
function verify_login_db($conexao, $email_login_db, $senha_login_db)
{

    // Prepara a consulta SQL para selecionar o usuário pelo email
    $stmt = $conexao->prepare("SELECT idusuario, nome_usuario, email_usuario, senha_usuario, status_usuario FROM usuario WHERE email_usuario = ?");
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
        $stmt->bind_result($id_usuario,$nome_usuario, $email_usuario, $senha_usuario, $tipo_usuario);
        // Obtém o resultado da consulta
        $stmt->fetch();
        // Verifica se o usuário foi encontrado
        if ($email_usuario !== null) {
            // Verifica se a senha fornecida corresponde à senha no banco de dados
            if (password_verify($senha_login_db, $senha_usuario)) {
                // Se a senha estiver correta, define a sessão do usuário
                $_SESSION['usuario'] = array(
                    'id' => $id_usuario,
                    'nome' => $nome_usuario,
                    'status' => $tipo_usuario,
                    'email' => $email_usuario
                );
                if ($_SESSION['usuario']['status'] == "Fundador"){
                    header("Location: ../../../plugins_dashboard\dashboard_fundador.php");
                }else{
                    header("Location: ../../../plugins_dashboard\dashboard_investidor.php");
                }
                exit(); // Certifica-se de que o script não continue a ser executado após o redirecionamento
            } else {
                // Senha incorreta
                notify_user($senha_login_db);
            }
        } else {
            // Usuário não encontrado
            notify_user($email_login_db);
        }
    } else {
        echo "Erro ao executar a consulta SQL: " . $stmt->error;
        return false;
    }
}
function notify_user(){
    return "Este email não existe";
}