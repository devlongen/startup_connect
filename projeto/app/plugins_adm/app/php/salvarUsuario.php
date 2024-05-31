<?php

include('funcoes.php');


// NÃO ESTÁ RECEBENDO ID
$idUsuario = $_POST["idusuario"] ?? null; // Inicializa como null caso não seja enviado
$nome_usuario = $_POST["nome_alterar"] ?? "";
$cpf_usuario  = $_POST["cpf_alterar"] ?? "";
$telefone_usuario = $_POST["telefone_alterar"] ?? "";
$data_nascimento = $_POST["data_nascimento_alterar"] ?? "";
$email_usuario   = $_POST["email_alterar"] ?? "";
$status_usuario  = $_POST["nAtivo_alterar"] ?? "";

include("conexao.php");

// Valida a função a ser executada
if(isset($_GET['funcao'])) {
    $funcao = $_GET['funcao'];
    if ($funcao == "A") {
        // Monta a query SQL para atualização
        var_dump($idUsuario);
        die();
        $sql = "UPDATE usuario SET "
             . "nome_usuario = '$nome_usuario', "
             . "cpf_usuario = '$cpf_usuario', "
             . "telefone_usuario = '$telefone_usuario', "
             . "data_nascimento_usuario = '$data_nascimento', "
             . "email_usuario = '$email_usuario' "
             . "WHERE idusuario = '$idUsuario'";
    } elseif ($funcao == "D") {
        // Monta a query SQL para exclusão
        $sql = "DELETE FROM usuario "
             . "WHERE idusuario = '$idUsuario'";
    }

    // Executa a query
    if(mysqli_query($conn, $sql)) {
        header("Location: ../usuarios.php");
        exit();
    } else {
        echo "Erro na execução da query: " . mysqli_error($conn);
    }
} else {
    echo "Função não especificada."; // Exibe mensagem se a função não estiver especificada na URL
}

mysqli_close($conn); // Fecha a conexão com o banco de dados

?>
