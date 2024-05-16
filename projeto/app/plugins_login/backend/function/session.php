<?php 
    include_once('insert_&&_verify.php');

    session_start();
    $nome_sessao = "Iago";
    $status_sessao = "Fundador";
    $_SESSION['usuario'] = array(
        'nome' => $nome_sessao,
        'status' => $status_sessao
    );
?>