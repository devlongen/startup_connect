<?php
include_once("../../../conn.php");

function getProjetos($conexao)
{
    $projetos = array();

    // Query para selecionar nome_fantasia e desc_empresa da tabela projeto
    $sql = "SELECT p.idprojeto,p.nome_fantasia, p.desc_empresa FROM projeto p JOIN log_projeto lp ON p.fk_idlog_projeto = lp.idlog_projeto WHERE lp.status_log = 'Ativo';";

    $result = $conexao->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $projetos[] = $row; // Adiciona cada linha como um array ao array de projetos
        }
    }

    return $projetos;
}

// Chamada da função para obter os projetos
$projetos = getProjetos($conexao);

// Fechar conexão
$conexao->close();
?>
