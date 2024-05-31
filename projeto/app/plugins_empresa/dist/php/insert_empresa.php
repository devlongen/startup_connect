<?php 
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Inclui o arquivo de conexão com o banco de dados
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
    // Verifica se a sessão do usuário está iniciada
    //select_idusuario($conexao);
    insert_termo($conexao, $termo_condicao);
    // insert_logprojeto($conexao, $descricao, $nome_fantasia);
    // insert_empresa($conexao, $razao_social, $cnpj, $email, $nome_fantasia, $endereco, $data_abertura, $patrimonio, $meta_total, $descricao, $termo_condicao, $fk_idusuario, $fk_idlog_projeto);
}

// function insert_empresa($conexao, $razao_social, $cnpj, $email, $nome_fantasia, $endereco, $data_abertura, $patrimonio, $meta_total, $descricao, $termo_condicao, $fk_idusuario, $fk_idlog_projeto) {
//     // Preparar a declaração SQL com placeholders
//     $stmt = $conexao->prepare("INSERT INTO projeto (razao_social, cnpj_projeto, nome_fantasia, endereco, email_corporativo, data_abertura_empresa, data_abertura_site, patrimonio_oferecido, meta_total, desc_empresa, fk_idtermo_condicao, fk_idusuario, fk_idlog_projeto) 
//                                VALUES (?, ?, ?, ?, ?, ?, CURRENT_DATE(), ?, ?, ?, ?, ?, ?)");
//     $stmt->bind_param("ssssssssssss", $razao_social, $cnpj, $nome_fantasia, $endereco, $email, $data_abertura, $patrimonio, $meta_total, $descricao, $termo_condicao, $fk_idusuario, $fk_idlog_projeto);
//     $stmt->execute();
//     // Fechar a declaração preparada
//     $stmt->close();
// }

function insert_termo($conexao, $termo_condicao) {
    $stmt = $conexao->prepare("INSERT INTO termo_condicao (status_projeto) VALUES (?)");
    $stmt->bind_param("s", $termo_condicao);
    $stmt->execute();
    $stmt->close();

    echo $termo_condicao;
}

// function insert_logprojeto($conexao, $descricao, $nome_fantasia) {
//     $stmt = $conexao->prepare("INSERT INTO log_projeto (descricao_log, status_log) VALUES (?, ?)");
//     $stmt->bind_param("ss", $descricao, $nome_fantasia);
//     $stmt->execute();

//     // Obter o ID do último registro inserido
//     $fk_idlog_projeto = $conexao->insert_id;

//     if ($fk_idlog_projeto === 0) {
//         die("Erro ao inserir registro na tabela 'log_projeto'.");
//     }

//     $stmt->close();
// }
// function select_idusuario($conexao){
//     $stmt = $conexao->prepare("SELECT idusuario,nome_usuario FROM usuario;")
//     $stmt-> bind_param("ss",$id_db,$nome_db);
//     $stmt-> execute();
//     $stmt->close();

//     if($nome_db == $_SESSION['usuario']['nome']){
//         $fk_idusuario = $id_db
//     }else{
//         echo "Nome do banco não bate com nome da sessão;"
//     }
// }
?>
