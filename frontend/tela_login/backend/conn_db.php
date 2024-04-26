<?php 
    // Definição dos dados de conexão com o banco de dados
    $dbHost = 'localhost';        // Endereço do banco de dados
    $dbUser =  'root';             // Usuário do banco de dados
    $dbPassword = '';              // Senha do banco de dados
    $dbDatabase =  'startup_db';  // Nome do banco de dados

    // Tentativa de conexão com o banco de dados
    $conexao = new mysql($dbDatabase, $dbHost, $dbPassword, $dbUser);

    // Verifica se houve erro na conexão
    if ($conexao -> connect_errno){
        echo "Conexão do banco falhou, problema no diretório backend";
    } else {
        echo "Conexão do banco foi feita com sucesso";
    }   
?>
