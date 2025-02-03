<?php
session_start();
$emailUser = $_SESSION['userEmail'] ?? null;
$conn = require_once('../../conn.php');

// Verifica se o formulário foi enviado via POST
if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['enterpriseForm'])) {
    $enterpriseData = $_POST['enterpriseForm'];
    startingEnterprise($conn, $enterpriseData, $emailUser);
}

function startingEnterprise($conn, $enterpriseData, $emailUser): void
{
    // Verifica se o e-mail do usuário está disponível
    if (!$emailUser) {
        die("Usuário não autenticado.");
    }

    // Busca o ID do usuário
    $sqlSelect = "SELECT idUser FROM user WHERE emailUser = ?";
    $stmtSelect = mysqli_prepare($conn, $sqlSelect);
    mysqli_stmt_bind_param($stmtSelect, "s", $emailUser);
    mysqli_stmt_execute($stmtSelect);
    mysqli_stmt_bind_result($stmtSelect, $idUser);
    mysqli_stmt_fetch($stmtSelect);
    mysqli_stmt_close($stmtSelect);

    // Verifica se o ID do usuário foi encontrado
    if (!$idUser) {
        die("Usuário não encontrado no banco de dados.");
    }

    // Desestruturação dos dados do formulário
    list($razaoSocial, $cnpjEnterprise, $nameFantasy, $address, $emailEnterprise, $valueStart, $metaTotal, $descEnterprise) = $enterpriseData;

    // Inserção dos dados da empresa
    $sqlInsert = "INSERT INTO enterprise (
        razaoSocial, 
        cnpjEnterprise, 
        nameFantasy, 
        address, 
        emailEnterprise, 
        valueStart, 
        metaTotal, 
        descEnterprise,
        fk_idUser
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $sqlInsert);

    mysqli_stmt_bind_param(
        $stmt,
        "sssssddsi",
        $razaoSocial,
        $cnpjEnterprise,
        $nameFantasy,
        $address,
        $emailEnterprise,
        $valueStart,
        $metaTotal,
        $descEnterprise,
        $idUser
    );

    // Execução do INSERT
    if (mysqli_stmt_execute($stmt)) {
        echo "Empresa cadastrada com sucesso!";
    } else {
        echo "Erro ao cadastrar empresa: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
}
?>