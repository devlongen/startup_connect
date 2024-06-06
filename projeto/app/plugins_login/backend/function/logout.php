<?php 
    // Inicia uma nova sessão ou resume uma sessão existente
    session_start();
    
    // Define um array associativo na variável de sessão 'usuario'
    // contendo informações do usuário como nome, email e status
    $_SESSION['usuario'] = array(
        'nome' => "Usuário", // Define o nome do usuário como "Usuário"
        'email' => "Faça a sua conta!", // Define o email do usuário como "Faça a sua conta!"
        'status' => "Sem conta" // Define o status do usuário como "Sem conta"
    );
    
    // Redireciona o navegador para o diretório três níveis acima do atual
    header("Location: ../../../");
    // Note que após o header é uma boa prática usar o exit para garantir que o script seja encerrado
    exit();
?>
