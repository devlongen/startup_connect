<?php

include('funcoes.php');

// Inicializa como null caso não seja enviado
$idUsuario = $_POST["idprojeto"] ?? null;
$nome_fantasia = $_POST['nome_fantasia_alterar'] ?? null;
$email_corporativo = $_POST['email_fantasia_alterar'] ?? null;
$desc_empresa = $_POST['descricao_alterar'] ?? null;
$valor_recebido = $_POST['valor_alterar'] ?? null;
$status_log = $_POST['status_alterar'] ?? null;

include("conexao.php");

// Valida a função a ser executada
if (isset($_GET['funcao'])) {
    $funcao = $_GET['funcao'];

    if ($funcao == "A" && $idUsuario !== null) {
        // Monta a query SQL para atualização
        $sql = "UPDATE projeto p
                INNER JOIN log_projeto l ON p.idprojeto = l.idlog_projeto
                SET 
                    p.nome_fantasia = '$nome_fantasia', 
                    p.email_corporativo = '$email_corporativo', 
                    p.desc_empresa = '$desc_empresa', 
                    p.valor_recebido = '$valor_recebido', 
                    l.status_log = '$status_log'
                WHERE p.idprojeto = '$idUsuario';";
    } elseif ($funcao == "D" && $idUsuario !== null) {
        // Monta a query SQL para exclusão
        $sql = "DELETE FROM projeto WHERE idprojeto = '$idUsuario'";
    } else {
        echo "ID do projeto não fornecido ou função inválida.";
        exit();
    }

    // Executa a query
    if (mysqli_query($conn, $sql)) {
        header("Location: ../empresa.php");
        exit();
    } else {
        echo "Erro na execução da query: " . mysqli_error($conn);
    }
} else {
    echo "Função não especificada."; // Exibe mensagem se a função não estiver especificada na URL
}

mysqli_close($conn); // Fecha a conexão com o banco de dados

?>
