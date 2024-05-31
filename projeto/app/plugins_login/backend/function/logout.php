<?php 
    session_start();
    $_SESSION['usuario'] = array(
        'nome' => "Usuário",
        'email' => "Faça a sua conta!",
        'status' => "Sem conta"
    );
    header("Location: ../../../")
?>