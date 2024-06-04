<?php
//Função para listar todos os produtos
function listaProduto(){

    include("conexao.php");
    $sql = "SELECT idprojeto, "
        . "razao_social, "
        . "cnpj_projeto, "
        . "cat.nome_fantasia, "
        . "endereco, "
        . "email_corporativo, "
        . "data_abertura_empresa, "
        . "data_abertura_site, "
        . "patrimonio_oferecido, "
        . "meta_total, "
        . "valor_recebido, "
        . "desc_empresa, "
        . "data_hora_criada, "
        . "status_log "
    . "FROM projeto "
     
    $result = mysqli_query($conn,$sql);
    mysqli_close($conn);

    $lista = '';

    //Validar se tem retorno do BD
    if (mysqli_num_rows($result) > 0) {        
        
        foreach ($result as $coluna) {

            //***Verificar os dados da consulta SQL
            $lista .= 
            '<tr>'
                .'<td>'.$coluna["idprojeto"].'</td>'
                .'<td>'.$coluna["Projeto"].'</td>'
                .'<td>'.$coluna["Categoria"].'</td>'
                .'<td>'.$coluna["Quantidade"].'</td>'
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

                            .'<form method="POST" action="php/salvarProduto.php?funcao=A&codigo='.$coluna["idprojeto"].'" enctype="multipart/form-data">'              
                
                                .'<div class="row">'
                                    .'<div class="col-12">'
                                        .'<div class="form-group">'
                                            .'<label for="iDescricao">Descrição:</label>'
                                            .'<input type="text" value="'.$coluna["Projeto"].'" class="form-control" id="iDescricao" name="nDescricao" maxlength="80">'
                                        .'</div>'
                                    .'</div>'
                    
                                    .'<div class="col-8">'
                                        .'<div class="form-group">'
                                            .'<label for="iCategoria">Categoria:</label>'
                                            .'<select name="nCategoria" id="iCategoria" class="form-control" required>'
                                                .'<option value="'.$coluna["idCategoria"].'">'.$coluna["Categoria"].'</option>'
                                                .optionCategoria()
                                            .'</select>'
                                        .'</div>'
                                    .'</div>'
                    
                                    .'<div class="col-4">'
                                        .'<div class="form-group">'
                                            .'<label for="iQuantidade">Quantidade:</label>'
                                            .'<input type="number" value="'.$coluna["Quantidade"].'" class="form-control" id="iQuantidade" name="nQuantidade" min="0">'
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

                            .'<form method="POST" action="php/salvarProduto.php?funcao=D&codigo='.$coluna["idprojeto"].'" enctype="multipart/form-data">'              

                                .'<div class="row">'
                                    .'<div class="col-12">'
                                        .'<h5>Deseja EXCLUIR o produto '.$coluna["Projeto"].'?</h5>'
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

//Próximo ID do produto
function proxIdProjeto(){

    $id = "";

    include("conexao.php");
    $sql = "SELECT MAX(idprojeto) AS Maior FROM produto;";        
    $result = mysqli_query($conn,$sql);
    mysqli_close($conn);

    //Validar se tem retorno do BD
    if (mysqli_num_rows($result) > 0) {
                
        $array = array();
        
        while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            array_push($array,$linha);
        }
        
        foreach ($array as $coluna) {            
            //***Verificar os dados da consulta SQL
            $id = $coluna["Maior"] + 1;
        }        
    } 

    return $id;
}

//Função para buscar a categoria de um produto
function categoriaProduto($id){

    $resp = "";

    include("conexao.php");
    $sql = "SELECT idTipoUsuario FROM usuarios WHERE idUsuario = $id;";        
    $result = mysqli_query($conn,$sql);
    mysqli_close($conn);

    //Validar se tem retorno do BD
    if (mysqli_num_rows($result) > 0) {
                
        $array = array();
        
        while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            array_push($array,$linha);
        }
        
        foreach ($array as $coluna) {            
            //***Verificar os dados da consulta SQL
            if($coluna["idTipoUsuario"] == 1){
                //Admin
                $resp = '<option value="1">Admin</option>'
                        .'<option value="2">Empresa</option>'
                        .'<option value="3">Comum</option>';
            }else if($coluna["idTipoUsuario"] == 2){
                //Empresa
                $resp = '<option value="2">Empresa</option>'
                        .'<option value="1">Admin</option>'
                        .'<option value="3">Comum</option>';
            }else{
                //Comum
                $resp = '<option value="3">Comum</option>'
                        .'<option value="1">Admin</option>'
                        .'<option value="2">Empresa</option>';
            }
        }        
    } 

    return $resp;
}

//Função para buscar a descrição do produto
function descrProduto($id){

    $resp = "";

    include("conexao.php");
    $sql = "SELECT Nome FROM usuarios WHERE idUsuario = $id;";        
    $result = mysqli_query($conn,$sql);
    mysqli_close($conn);

    //Validar se tem retorno do BD
    if (mysqli_num_rows($result) > 0) {
                
        $array = array();
        
        while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            array_push($array,$linha);
        }
        
        foreach ($array as $coluna) {            
            //***Verificar os dados da consulta SQL
            $resp = $coluna["Nome"];
        }        
    } 

    return $resp;
}

?>