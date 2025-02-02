<?php
require_once('saveSession.php');
require_once('redirectUser.php');
$conn = require_once('../../conn.php');
$userData = $_POST['userData'];
if ($_SERVER['REQUEST_METHOD'] === "POST" and $userData != null) {
    insertUser($conn, $userData);
}
function insertUser($conn, $userData): void
{
    list($name, $email, $password, $tel, $dtNasc, $status) = $userData;
    $password = password_hash($password, PASSWORD_BCRYPT);
    $sqlInsert = "INSERT INTO user (nameUser, emailUser, passUser, telUser, dtnascUser, statusUser) 
                      VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sqlInsert);

    // Bindando as variáveis com os parâmetros da query
    mysqli_stmt_bind_param($stmt, "ssssss", $name, $email, $password, $tel, $dtNasc, $status);

    if (mysqli_stmt_execute($stmt)) {
        rtypeUser($conn,$email);
    } else {
        echo "Erro ao inserir usuário: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
    saveSession($name, $email);
}
