<?php
require_once('saveSession.php');
$conn = require_once('../../conn.php');
require_once('redirectUser.php');

$userAcess = $_POST['userAcess'];

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    validationUser($conn, $userAcess);
}

function validationUser($conn, $userAcess) {
    list($email, $password) = $userAcess;

    // Buscar o usuário no banco de dados pelo email
    $sqlSelect = "SELECT passUser, nameUser FROM user WHERE emailUser = ?";
    $stmt = mysqli_prepare($conn, $sqlSelect);

    // Bindando os parâmetros
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    // Obter o resultado
    mysqli_stmt_bind_result($stmt, $storedHash, $name);
    mysqli_stmt_fetch($stmt);

    // Comparar a senha fornecida com o hash armazenado
    if (password_verify($password, $storedHash)) {
        // Login bem-sucedido
        saveSession($name, $email);

        // Fechar a consulta atual ANTES de chamar a próxima função
        mysqli_stmt_close($stmt);

        // Redirecionamento com nova consulta
        rtypeUser($conn, $email);
    } else {
        // Senha incorreta
        echo "Login falhou. Senha incorreta.";
        mysqli_stmt_close($stmt);
    }
}
