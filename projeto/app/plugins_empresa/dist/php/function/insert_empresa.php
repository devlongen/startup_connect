<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["cadastro_empresa_db"])) {
    // Inclui o arquivo de conexão com o banco de dados
    include_once('../../../../conn_db.php');

    $razao_social = $_POST['razao-social'];
    $cnpj = $_POST['cnpj'];
    $email = $_POST['email'];
    $nome_fantasia = $_POST['nome-fantasia'];
    $endereco = $_POST['endereco'];
    $data_abertura = $_POST['data-abertura'];
    $patrimonio = $_POST['patrimonio'];
    $meta_total = $_POST['meta-total'];
    $descricao = $_POST['desc-startup'];
    $termo_condicao = $_POST['termos-condicao'];

    // Verifica se a sessão do usuário está iniciada
    session_start();
    $fk_idusuario = $_SESSION['usuario']['id'];
    $fk_idlog_projeto = 0;

    insert_termo($conexao, $termo_condicao);
    insert_logprojeto($conexao, $descricao, $nome_fantasia);
    insert_empresa($conexao, $razao_social, $cnpj, $email, $nome_fantasia, $endereco, $data_abertura, $patrimonio, $meta_total, $descricao, $termo_condicao, $fk_idusuario, $fk_idlog_projeto);
}

function insert_empresa($conexao, $razao_social, $cnpj, $email, $nome_fantasia, $endereco, $data_abertura, $patrimonio, $meta_total, $descricao, $termo_condicao, $fk_idusuario, $fk_idlog_projeto) {
    // Preparar a declaração SQL com placeholders
    $stmt = $conexao->prepare("INSERT INTO projeto (razao_social, cnpj_projeto, nome_fantasia, endereco, email_corporativo, data_abertura_empresa, data_abertura_site, patrimonio_oferecido, meta_total, desc_empresa, fk_idtermo_condicao, fk_idusuario, fk_idlog_projeto) 
                               VALUES (?, ?, ?, ?, ?, ?, CURRENT_DATE(), ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssss", $razao_social, $cnpj, $nome_fantasia, $endereco, $email, $data_abertura, $patrimonio, $meta_total, $descricao, $termo_condicao, $fk_idusuario, $fk_idlog_projeto);
    $stmt->execute();
    // Fechar a declaração preparada
    $stmt->close();
}

function insert_termo($conexao, $termo_condicao) {
    $stmt = $conexao->prepare("INSERT INTO termo_condicao (status_projeto) VALUES (?)");
    $stmt->bind_param("s", $termo_condicao);
    $stmt->execute();

    $last_insert_id = $conexao->insert_id;

    if ($last_insert_id === 0) {
        die("Erro ao inserir registro na tabela 'termo_condicao'.");
    }

    $fk_idtermo_condicao = $last_insert_id;
    $stmt->close();
}

function insert_logprojeto($conexao, $descricao, $nome_fantasia) {
    $stmt = $conexao->prepare("INSERT INTO log_projeto (descricao_log, status_log) VALUES (?, ?)");
    $stmt->bind_param("ss", $descricao, $nome_fantasia);
    $stmt->execute();
    $stmt->close();
}
?>
