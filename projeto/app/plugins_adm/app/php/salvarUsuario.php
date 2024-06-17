<?php

include('funcoes.php');

// Recebe o ID do usuário
$idUsuario = $_GET["codigo"] ?? null; // Inicializa como null caso não seja enviado
$nome_usuario = $_POST["nome_alterar"] ?? "";
$cpf_usuario  = $_POST["cpf_alterar"] ?? "";
$telefone_usuario = $_POST["telefone_alterar"] ?? "";
$data_nascimento = $_POST["data_nascimento_alterar"] ?? "";
$email_usuario   = $_POST["email_alterar"] ?? "";
$status_usuario  = $_POST["nAtivo_alterar"] ?? "";

include("conexao.php");

// Valida a função a ser executada
if (isset($_GET['funcao'])) {
    $funcao = $_GET['funcao'];
    if ($funcao == "A") {
        // Monta a query SQL para atualização com prepared statements
        $sql = "UPDATE usuario SET nome_usuario = ?, cpf_usuario = ?, telefone_usuario = ?, data_nascimento_usuario = ?, email_usuario = ? WHERE idusuario = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'sssssi', $nome_usuario, $cpf_usuario, $telefone_usuario, $data_nascimento, $email_usuario, $idUsuario);
    } elseif ($funcao == "D") {
        // Antes de deletar o usuário, remova ou atualize as referências na tabela projeto
        $updateSql = "UPDATE projeto SET fk_idusuario = NULL WHERE fk_idusuario = ?";
        $stmt = mysqli_prepare($conn, $updateSql);
        mysqli_stmt_bind_param($stmt, 'i', $idUsuario);
        if (!mysqli_stmt_execute($stmt)) {
            echo "Erro ao atualizar a tabela projeto: " . mysqli_stmt_error($stmt);
            exit();
        }

        // Monta a query SQL para exclusão com prepared statements
        $sql = "DELETE FROM usuario WHERE idusuario = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $idUsuario);
    }

    // Executa a query
    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../usuarios.php");
        exit();
    } else {
        echo "Erro na execução da query: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
} else {
    echo "Função não especificada."; // Exibe mensagem se a função não estiver especificada na URL
}

mysqli_close($conn); // Fecha a conexão com o banco de dados

?>
