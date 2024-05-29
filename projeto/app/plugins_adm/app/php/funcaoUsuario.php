<?php
//Função para listar todos os usuários
function listaUsuario(){
    include("conexao.php");
    $sql = "SELECT * FROM usuario ORDER BY idusuario;";
            
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    $lista = '';

    // Verificar se há resultados
    if ($result && mysqli_num_rows($result) > 0) {
        while ($coluna = $result->fetch_assoc()) {
            // Gerar a lista de usuários
            $lista .= 
                '<tr>'
                    .'<td align="center">'.$coluna["idusuario"].'</td>'
                    .'<td>'.$coluna["nome_usuario"].'</td>'
                    .'<td>'.$coluna["cpf_usuario"].'</td>'
                    .'<td>'.$coluna["telefone_usuario"].'</td>'
                    .'<td>'.$coluna["data_nascimento_usuario"].'</td>'
                    .'<td>'.$coluna["email_usuario"].'</td>'
                    .'<td align="center">'
                        .($coluna["idusuario"] == 1 ? 
                            '<h6><i class="fas fa-check-circle text-success"></i></h6>' : 
                            '<h6><i class="fas fa-times-circle text-danger"></i></h6>')
                    .'</td>'
                    .'<td>'
                        .'<div class="row" align="center">'
                            .'<div class="col-6">'
                                .'<a href="#modalEditUsuario'.$coluna["idusuario"].'" data-toggle="modal">'
                                    .'<h6><i class="fas fa-edit text-info" data-toggle="tooltip" title="Alterar usuário"></i></h6>'
                                .'</a>'
                            .'</div>'
                            .'<div class="col-6">'
                                .'<a href="#modalDeleteUsuario'.$coluna["idusuario"].'" data-toggle="modal">'
                                    .'<h6><i class="fas fa-trash text-danger" data-toggle="tooltip" title="Excluir usuário"></i></h6>'
                                .'</a>'
                            .'</div>'
                        .'</div>'
                    .'</td>'
                .'</tr>'
                .'<div class="modal fade" id="modalEditUsuario'.$coluna["idusuario"].'">'
                    .'<div class="modal-dialog modal-lg">'
                        .'<div class="modal-content">'
                            .'<div class="modal-header bg-info">'
                                .'<h4 class="modal-title">Alterar Usuário</h4>'
                                .'<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">'
                                    .'<span aria-hidden="true">&times;</span>'
                                .'</button>'
                            .'</div>'
                            .'<div class="modal-body">'
                                .'<form method="POST" action="php/salvarUsuario.php?funcao=A&codigo='.$coluna["idusuario"].'" enctype="multipart/form-data">'
                                    .'<div class="row">'
                                        .'<div class="col-8">'
                                            .'<div class="form-group">'
                                                .'<label for="iNome">Nome:</label>'
                                                .'<input type="text" value="'.$coluna["nome_usuario"].'" class="form-control" id="iNome" name="nNome" maxlength="50">'
                                            .'</div>'
                                        .'</div>'
                                        .'<div class="col-4">'
                                            .'<div class="form-group">'
                                                .'<label for="iCpf">CPF:</label>'
                                                .'<input type="text" value="'.$coluna["cpf_usuario"].'" class="form-control" id="iCpf" name="nCpf" maxlength="14">'
                                            .'</div>'
                                        .'</div>'
                                        .'<div class="col-6">'
                                            .'<div class="form-group">'
                                                .'<label for="iTelefone">Telefone:</label>'
                                                .'<input type="text" value="'.$coluna["telefone_usuario"].'" class="form-control" id="iTelefone" name="nTelefone" maxlength="15">'
                                            .'</div>'
                                        .'</div>'
                                        .'<div class="col-6">'
                                            .'<div class="form-group">'
                                                .'<label for="iDataNascimento">Data de Nascimento:</label>'
                                                .'<input type="date" value="'.$coluna["data_nascimento_usuario"].'" class="form-control" id="iDataNascimento" name="nDataNascimento">'
                                            .'</div>'
                                        .'</div>'
                                        .'<div class="col-12">'
                                            .'<div class="form-group">'
                                                .'<label for="iEmail">Email:</label>'
                                                .'<input type="email" value="'.$coluna["email_usuario"].'" class="form-control" id="iEmail" name="nEmail" maxlength="50">'
                                            .'</div>'
                                        .'</div>'
                                        .'<div class="col-12">'
                                            .'<div class="form-group">'
                                                .'<label for="iSenha">Senha:</label>'
                                                .'<input type="password" value="" class="form-control" id="iSenha" name="nSenha" maxlength="6">'
                                            .'</div>'
                                        .'</div>'
                                        
                                        .'<div class="col-12">'
                                            .'<div class="form-group">'
                                                .'<input type="checkbox" id="iAtivo" name="nAtivo">'
                                                .'<label for="iAtivo">Usuário Ativo</label>'
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
                .'<div class="modal fade" id="modalDeleteUsuario'.$coluna["idusuario"].'">'
                    .'<div class="modal-dialog">'
                        .'<div class="modal-content">'
                            .'<div class="modal-header bg-danger">'
                                .'<h4 class="modal-title">Excluir Usuário: '.$coluna["idusuario"].'</h4>'
                                .'<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">'
                                    .'<span aria-hidden="true">&times;</span>'
                                .'</button>'
                            .'</div>'
                            .'<div class="modal-body">'
                                .'<form method="POST" action="php/salvarUsuario.php?funcao=D&codigo='.$coluna["idusuario"].'" enctype="multipart/form-data">'
                                    .'<div class="row">'
                                        .'<div class="col-12">'
                                            .'<h5>Deseja EXCLUIR o usuário '.$coluna["nome_usuario"].'?</h5>'
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
    } else {
        $lista = '<tr><td colspan="8" align="center">Nenhum usuário encontrado.</td></tr>';
    }

    return $lista;
}

// Próximo ID do usuário
function proxidusuario(){
    $id = "";

    include("conexao.php");
    $sql = "SELECT MAX(idusuario) AS Maior FROM usuario;";        
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    // Validar se tem retorno do BD
    if ($result && mysqli_num_rows($result) > 0) {
        $array = array();
        
        while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            array_push($array, $linha);
        }
        
        foreach ($array as $coluna) {            
            // Verificar os dados da consulta SQL
            $id = $coluna["Maior"] + 1;
        }        
    } 

    return $id;
}

// Função para buscar o nome do usuário
function nomeUsuario($id){
    $resp = "";

    include("conexao.php");
    $sql = "SELECT nome_usuario FROM usuario WHERE idusuario = $id;";        
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);

    // Validar se tem retorno do BD
    if ($result && mysqli_num_rows($result) > 0) {
        $array = array();
        
        while ($linha = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            array_push($array, $linha);
        }
        
        foreach ($array as $coluna) {            
            // Verificar os dados da consulta SQL
            $resp = $coluna["nome_usuario"];
        }        
    } 

    return $resp;
}

?>

