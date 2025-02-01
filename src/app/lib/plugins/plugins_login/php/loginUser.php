<?php
$conn = require_once('../../conn.php');
$userAcess = $_POST['userAcess'];
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    validationUser($conn, $userAcess);
}
function validationUser($conn, $userAcess)
{
    list($email, $password) = $userAcess;

    // Buscar o usuário no banco de dados pelo email
    $sqlSelect = "SELECT passUser FROM user WHERE emailUser = ?";
    $stmt = mysqli_prepare($conn, $sqlSelect);

    // Bindando os parâmetros
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    // Obter o resultado
    mysqli_stmt_bind_result($stmt, $storedHash);
    mysqli_stmt_fetch($stmt);

    // Comparar a senha fornecida com o hash armazenado
    if (password_verify($password, $storedHash)) {
        // Login bem-sucedido
        echo "Login bem-sucedido!";
    } else {
        // Senha incorreta
        echo "Login falhou. Senha incorreta.";
    }

    mysqli_stmt_close($stmt);
}