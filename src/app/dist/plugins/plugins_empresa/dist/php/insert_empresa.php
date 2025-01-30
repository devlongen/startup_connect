<?php
// Inicia uma nova sessão ou resume uma sessão existente
session_start();

// Verifica se a requisição é do tipo POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Inclui o arquivo de conexão com o banco de dados
    include_once('conexao_empresa.php');

    // Obtém os dados do formulário via método POST
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
    $summernote_introducao = $_POST['summernote'];
    $summernote_imagens = $_POST['summernote2'];
    $summernote_objetivo = $_POST['summernote3'];
    $summernote_video = $_POST['summernote4'];

    // Insere um registro na tabela log_projeto e obtém o ID gerado
    $fk_idlog_projeto = insert_logprojeto($conexao, $cnpj);

    // Insere um registro na tabela termo_condicao e obtém o ID gerado
    $fk_idtermo_condicao = insert_termo($conexao, $termo_condicao);

    // Obtém o ID do usuário atualmente logado
    $fk_idusuario = select_idusuario($conexao);

    // Insere um registro na tabela projeto (empresa)
    insert_empresa($conexao, $razao_social, $cnpj, $nome_fantasia, $endereco, $email, $data_abertura, $patrimonio, $meta_total, $descricao, $summernote_introducao, $summernote_imagens, $summernote_objetivo, $summernote_video, $fk_idtermo_condicao, $fk_idusuario, $fk_idlog_projeto);
}

// Função para obter o ID do usuário atualmente logado
function select_idusuario($conexao)
{
    $stmt_idusuario = $conexao->prepare("SELECT idusuario FROM usuario WHERE nome_usuario = ?");
    $stmt_idusuario->bind_param("s", $_SESSION['usuario']['nome']);
    $stmt_idusuario->execute();
    $stmt_idusuario->bind_result($fk_idusuario);
    $stmt_idusuario->fetch();
    $stmt_idusuario->close();

    return $fk_idusuario;
}

// Função para inserir um registro na tabela projeto (empresa)function insert_empresa($conexao, $razao_social, $cnpj, $nome_fantasia, $endereco, $email, $data_abertura, $patrimonio, $meta_total, $descricao, $summernote_introducao, $summernote_imagens, $summernote_objetivo, $summernote_video, $fk_idtermo_condicao, $fk_idusuario, $fk_idlog_projeto)
function insert_empresa($conexao, $razao_social, $cnpj, $nome_fantasia, $endereco, $email, $data_abertura, $patrimonio, $meta_total, $descricao, $summernote_introducao, $summernote_imagens, $summernote_objetivo, $summernote_video, $fk_idtermo_condicao, $fk_idusuario, $fk_idlog_projeto)
{
    $stmt_empresa = $conexao->prepare("INSERT INTO projeto 
        (razao_social, cnpj_projeto, nome_fantasia, endereco, email_corporativo, 
        data_abertura_empresa, data_abertura_site, patrimonio_oferecido, meta_total, 
        desc_empresa, summernote_introducao, summernote_imagens, summernote_objetivo, 
        summernote_video, fk_idtermo_condicao, fk_idusuario, fk_idlog_projeto) 
        VALUES (?, ?, ?, ?, ?, ?, NOW(), ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

    if (!$stmt_empresa) {
        die('Erro na preparação da declaração SQL: ' . $conexao->error);
    }

    // Bind dos parâmetros
    $stmt_empresa->bind_param(
        "ssssssddsssssiii",
        $razao_social,
        $cnpj,
        $nome_fantasia,
        $endereco,
        $email,
        $data_abertura,
        $patrimonio,
        $meta_total,
        $descricao,
        $summernote_introducao,
        $summernote_imagens,
        $summernote_objetivo,
        $summernote_video,
        $fk_idtermo_condicao,
        $fk_idusuario,
        $fk_idlog_projeto
    );

    // Execução da query
    if (!$stmt_empresa->execute()) {
        die('Erro na execução da declaração SQL: ' . $stmt_empresa->error);
    }

    // Fechar statement
    $stmt_empresa->close();

    // Redirecionamento para uma página de sucesso ou aguardo de validação
    header("Location: ../../pagina_espera.php");
}




// Função para inserir um registro na tabela termo_condicao
function insert_termo($conexao, $termo_condicao)
{
    $stmt_termo = $conexao->prepare("INSERT INTO termo_condicao (status_projeto) VALUES (?)");
    $stmt_termo->bind_param("s", $termo_condicao);
    $stmt_termo->execute();
    $fk_idtermo_condicao = $stmt_termo->insert_id;
    $stmt_termo->close();
    return $fk_idtermo_condicao;
}

// Função para inserir um registro na tabela log_projeto
function insert_logprojeto($conexao, $cnpj)
{
    $stmt_logprojeto = $conexao->prepare("INSERT INTO log_projeto (data_hora_criada, descricao_log, status_log) VALUES (CURRENT_TIMESTAMP(), ?, 'Inativo')");
    $stmt_logprojeto->bind_param("s", $cnpj);
    $stmt_logprojeto->execute();
    $fk_idlog_projeto = $stmt_logprojeto->insert_id;
    $stmt_logprojeto->close();
    return $fk_idlog_projeto;
}
?>
