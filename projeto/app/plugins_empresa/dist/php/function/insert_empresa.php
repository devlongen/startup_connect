<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["cadastro_empresa"])) {
    # Inclui o arquivo de conexão com o banco de dados
    include_once('../../../../conn_db.php');

    $razao = $_POST[''];
    $cnpj = $_POST[''];
    $nome_fantasia = $_POST[''];
    $endereco = $_POST[''];
    $email_corporativo = $_POST[''];
    $meta_total = $_POST[''];

    


    
}
?>