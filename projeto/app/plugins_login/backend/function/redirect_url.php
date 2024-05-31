<?php 
// Inicia a sessão
session_start();

// Função para redirecionar usuários que não são Fundadores
function redirect_fundador(){
    // Verifica se o status do usuário não é "Fundador"
    if ($_SESSION['usuario']['status'] != "Fundador"){
        // Redireciona para a página anterior
        header("Location: ../");
        // Encerra a execução do script
        exit();
    }
}

// Função para redirecionar usuários que não são Investidores
function redirect_investidor(){
    // Verifica se o status do usuário não é "Investidor"
    if ($_SESSION['usuario']['status'] != "Investidor"){
        // Redireciona para a página anterior
        header("Location: ../");
        // Encerra a execução do script
        exit();
    }
}

?>
