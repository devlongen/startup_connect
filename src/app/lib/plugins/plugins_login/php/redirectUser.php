<?php
function rtypeUser($conn, $email): string {
    $sqlSelect = "SELECT statusUser FROM user WHERE emailUser = ?";
    $stmt = mysqli_prepare($conn, $sqlSelect);

    // Vincula o parâmetro do e-mail
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    // Vincula o resultado da consulta
    mysqli_stmt_bind_result($stmt, $statusUser);

    // Busca o resultado
    if (mysqli_stmt_fetch($stmt)) {
        mysqli_stmt_close($stmt);  // Fecha o statement
        if($statusUser === "Admin"){
            header("Location: ../../../../pages/adminUser.php");
            exit();
        }elseif($statusUser === "Fundador"){
            header("Location: ../../../../pages/founderUser.php");
            exit();
        }
        return "Status encontrado com sucesso";      // Retorna o status do usuário
    } else {
        mysqli_stmt_close($stmt);  // Fecha o statement mesmo em erro
        return "Status não encontrado"; // Retorno padrão se o e-mail não for encontrado
    }
}
?>
