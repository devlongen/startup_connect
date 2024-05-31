<?php
    session_start();
    if($_SESSION['usuario']['status'] == "Fundador"){
        header("Location: ../../../plugins_dashboard/dashboard_fundador.php");
    } elseif($_SESSION['usuario']['status'] == "Investidor"){
        header("Location: ../../../plugins_dashboard/dashboard_investidor.php");
    } elseif($_SESSION['usuario']['status'] == "Admin"){
        header("Location: ../../../plugins_adm/app/usuarios.php");
    } else {
        header("Location: ../../tela_login.php");
    }
?>