<?php
// Função para listar todos os produtos
function listaEmpresa() {
    include("conexao.php");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT p.idprojeto, 
                p.razao_social, 
                p.cnpj_projeto, 
                p.nome_fantasia, 
                p.endereco, 
                p.email_corporativo, 
                p.data_abertura_empresa, 
                p.data_abertura_site, 
                p.patrimonio_oferecido, 
                p.meta_total, 
                p.valor_recebido, 
                p.desc_empresa, 
                p.fk_idtermo_condicao, 
                p.fk_idusuario,
                l.status_log
            FROM projeto p
            INNER JOIN log_projeto l ON p.idprojeto = l.idlog_projeto;";

    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    $lista = '';

    // Validar se tem retorno do BD
    if (mysqli_num_rows($result) > 0) {        
        foreach ($result as $coluna) {
            $lista .= 
            '<tr>'
                .'<td>'.$coluna["razao_social"].'</td>'
                .'<td>'.$coluna["cnpj_projeto"].'</td>'
                .'<td>'.$coluna["nome_fantasia"].'</td>'
                .'<td>'.$coluna["email_corporativo"].'</td>'
                .'<td>'.$coluna["data_abertura_empresa"].'</td>'
                .'<td>'.$coluna["meta_total"].'</td>'
                .'<td>'.$coluna["valor_recebido"].'</td>'
                .'<td>'.$coluna["desc_empresa"].'</td>'
                .'<td>'.$coluna["status_log"].'</td>'
                .'<td>'
                    .'<div class="row" align="center">'
                        .'<div class="col-6">'
                            .'<a href="#modalEditProduto'.$coluna["idprojeto"].'" data-toggle="modal">'
                                .'<h6><i class="fas fa-edit text-info" data-toggle="tooltip" title="Alterar produto"></i></h6>'
                            .'</a>'
                        .'</div>'
                        .'<div class="col-6">'
                            .'<a href="#modalDeleteProduto'.$coluna["idprojeto"].'" data-toggle="modal">'
                                .'<h6><i class="fas fa-trash text-danger" data-toggle="tooltip" title="Excluir produto"></i></h6>'
                            .'</a>'
                        .'</div>'
                    .'</div>'
                .'</td>'
            .'</tr>'
            
            .'<div class="modal fade" id="modalEditProduto'.$coluna["idprojeto"].'">'
                .'<div class="modal-dialog">'
                    .'<div class="modal-content">'
                        .'<div class="modal-header bg-info">'
                            .'<h4 class="modal-title">Alterar Produto</h4>'
                            .'<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">'
                                .'<span aria-hidden="true">&times;</span>'
                            .'</button>'
                        .'</div>'
                        .'<div class="modal-body">'
                            .'<form method="POST" action="php/salvarEmpresa.php?funcao=A&codigo='.$coluna["idprojeto"].'" enctype="multipart/form-data">'              
                                .'<div class="row">'
                                    .'<div class="col-12">'
                                        .'<div class="form-group">'
                                            .'<label for="nome_fantasia_alterar">Nome Fantasia:</label>'
                                            .'<input type="text" value="'.$coluna["nome_fantasia"].'" class="form-control" id="iDescricao" name="nome_fantasia_alterar" maxlength="80">'
                                        .'</div>'
                                        .'<div class="form-group">'
                                            .'<label for="email_fantasia_alterar">Email Corporativo:</label>'
                                            .'<input type="text" value="'.$coluna["email_corporativo"].'" class="form-control" id="iDescricao" name="email_fantasia_alterar" maxlength="80">'
                                        .'</div>'
                                        .'<div class="form-group">'
                                            .'<label for="descricao_alterar">Descrição da empresa:</label>'
                                            .'<input type="text" value="'.$coluna["desc_empresa"].'" class="form-control" id="iDescricao" name="descricao_alterar" maxlength="80">'
                                        .'</div>'
                                        .'<div class="form-group">'
                                            .'<label for="valor_alterar">Valor Recebido:</label>'
                                            .'<input type="text" value="'.$coluna["valor_recebido"].'" class="form-control" id="iDescricao" name="valor_alterar" maxlength="80">'
                                        .'</div>'
                                        .'<div class="form-group">'
                                            .'<label for="status_alterar">Status da empresa:</label>'
                                            .'<input type="radio" value="Ativo"  class="form-control" id="iDescricao" name="status_alterar" maxlength="80">'.$coluna["status_log"].''
                                        .'</div>'
                                    .'</div>'
                                .'</div>'
                                .'<div class="modal-footer">'
                                    .'<button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>'
                                    .'<button type="submit" class="btn btn-success">Salvar</button>'
                                .'</div>'
                            .'</form>'
                        .'</div>'
                    .'</div>'
                .'</div>'
            .'</div>'
            
            .'<div class="modal fade" id="modalDeleteProduto'.$coluna["idprojeto"].'">'
                .'<div class="modal-dialog">'
                    .'<div class="modal-content">'
                        .'<div class="modal-header bg-danger">'
                            .'<h4 class="modal-title">Excluir Produto: '.$coluna["idprojeto"].'</h4>'
                            .'<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">'
                                .'<span aria-hidden="true">&times;</span>'
                            .'</button>'
                        .'</div>'
                        .'<div class="modal-body">'
                            .'<form method="POST" action="php/salvarEmpresa.php?funcao=D&codigo='.$coluna["idprojeto"].'" enctype="multipart/form-data">'              
                                .'<div class="row">'
                                    .'<div class="col-12">'
                                        .'<h5>Deseja EXCLUIR essa empresa '.$coluna["razao_social"].'?</h5>'
                                    .'</div>'
                                .'</div>'
                                .'<div class="modal-footer">'
                                    .'<button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>'
                                    .'<button type="submit" class="btn btn-success">Sim</button>'
                                .'</div>'
                            .'</form>'
                        .'</div>'
                    .'</div>'
                .'</div>'
            .'</div>'; 
        }    
    }
    
    return $lista;
}

// Próximo ID do produto
function proxIdProjeto() {
    $id = "";

    include("conexao.php");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT MAX(idprojeto) AS Maior FROM projeto";        
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    // Validar se tem retorno do BD
    if (mysqli_num_rows($result) > 0) {
        $coluna = mysqli_fetch_assoc($result);
        $id = $coluna["Maior"] + 1;
    } 

    return $id;
}

// Função para buscar a descrição do produto
function descrProduto($id) {
    $resp = "";

    include("conexao.php");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT nome_fantasia FROM projeto WHERE idempresa = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    mysqli_close($conn);

    // Validar se tem retorno do BD
    if (mysqli_num_rows($result) > 0) {
        $coluna = mysqli_fetch_assoc($result);
        $resp = $coluna["nome_fantasia"];
    }

    return $resp;
}
?>
