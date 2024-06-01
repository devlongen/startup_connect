<?php 
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once('conexao_empresa.php');

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

    $fk_idlog_projeto = insert_logprojeto($conexao, $cnpj);
    $fk_idtermo_condicao = insert_termo($conexao, $termo_condicao);
    $fk_idusuario = select_idusuario($conexao);
    insert_empresa($conexao, $razao_social, $cnpj, $email, $nome_fantasia, $endereco, $data_abertura, $patrimonio, $meta_total, $descricao, $fk_idtermo_condicao, $fk_idusuario, $fk_idlog_projeto);
}

function select_idusuario($conexao) {
    $stmt_idusuario = $conexao->prepare("SELECT idusuario FROM usuario WHERE nome_usuario = ?;");
    $stmt_idusuario->bind_param("s", $_SESSION['usuario']['nome']);
    $stmt_idusuario->execute();
    $stmt_idusuario->bind_result($fk_idusuario);
    $stmt_idusuario->fetch();
    $stmt_idusuario->close();

    return $fk_idusuario;
}

function insert_empresa($conexao, $razao_social, $cnpj, $email, $nome_fantasia, $endereco, $data_abertura, $patrimonio, $meta_total, $descricao, $fk_idtermo_condicao, $fk_idusuario, $fk_idlog_projeto) {
    $stmt_empresa = $conexao->prepare("INSERT INTO projeto (razao_social, cnpj_projeto, nome_fantasia, endereco, email_corporativo, data_abertura_empresa, data_abertura_site, patrimonio_oferecido, meta_total, desc_empresa, fk_idtermo_condicao, fk_idusuario, fk_idlog_projeto) VALUES (?, ?, ?, ?, ?, ?, CURRENT_DATE(), ?, ?, ?, ?, ?, ?)");
    $stmt_empresa->bind_param("ssssssddsiii", $razao_social, $cnpj, $nome_fantasia, $endereco, $email, $data_abertura, $patrimonio, $meta_total, $descricao, $fk_idtermo_condicao, $fk_idusuario, $fk_idlog_projeto);
    $stmt_empresa->execute();
    $stmt_empresa->close();
    //header("Location: Redirecionar para alguma página pedindo para aguardar validação da administração")
}

function insert_termo($conexao, $termo_condicao) {
    $stmt_termo = $conexao->prepare("INSERT INTO termo_condicao (status_projeto) VALUES (?)");
    $stmt_termo->bind_param("s", $termo_condicao);
    $stmt_termo->execute();
    $fk_idtermo_condicao = $stmt_termo->insert_id;
    $stmt_termo->close();
    return $fk_idtermo_condicao;
}

function insert_logprojeto($conexao, $cnpj) {
    $stmt_logprojeto = $conexao->prepare("INSERT INTO log_projeto (data_hora_criada, descricao_log, status_log) VALUES (CURRENT_TIMESTAMP(), ?, 'inativo')");
    $stmt_logprojeto->bind_param("s", $cnpj);
    $stmt_logprojeto->execute();
    $fk_idlog_projeto = $stmt_logprojeto->insert_id;
    $stmt_logprojeto->close();
    return $fk_idlog_projeto;
}
?>
