<?php 
    $_SESSION['ultima_atividade'] = time();
    if(isset($_SESSION['ultima_atividade']) && time() - $_SESSION['ultima_atividade'] > 10080) {
        session_unset();
        session_destroy();
    }
?>
