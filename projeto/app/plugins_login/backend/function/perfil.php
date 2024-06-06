<?php
    // Inicia uma nova sessão ou resume uma sessão existente
    session_start();
    
    // Verifica o status do usuário armazenado na sessão
    if ($_SESSION['usuario']['status'] == "Fundador") {
        // Se o status for "Fundador", redireciona para o painel do fundador
        header("Location: ../../../plugins_dashboard/dashboard_fundador.php");
    } elseif ($_SESSION['usuario']['status'] == "Investidor") {
        // Se o status for "Investidor", redireciona para o painel do investidor
        header("Location: ../../../plugins_dashboard/dashboard_investidor.php");
    } elseif ($_SESSION['usuario']['status'] == "Admin") {
        // Se o status for "Admin", redireciona para a página de gerenciamento de usuários
        header("Location: ../../../plugins_adm/app/usuarios.php");
    } else {
        // Se o status for qualquer outro valor, redireciona para a tela de login
        header("Location: ../../tela_login.php");
    }
?>
