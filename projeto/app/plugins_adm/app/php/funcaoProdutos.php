<?php
//Função para listar todos os usuários
function listaProdutos(){

    include("conexao.php");
    $sql = "SELECT * FROM produto ORDER BY idUsuario;";
            
    $result = mysqli_query($conn,$sql);
    mysqli_close($conn);

    $lista = '';
    $ativo = '';
    $icone = '';

    //Validar se tem retorno do BD
    if (mysqli_num_rows($result) > 0) {
        
        
        foreach ($result as $coluna) {

            //Ativo S ou N
            if($coluna["FlgAtivo"] == 'S'){
                $ativo = 'checked';
                $icone = '<h6><i class="fas fa-check-circle text-success"></i></h6>';
            }else{
                $ativo = '';
                $icone = '<h6><i class="fas fa-times-circle-danger"></i></h6>';
            }
            
            //***Verificar os dados da consulta SQL
            $lista .= 
            '<tr>'
                .'<td align="center">'.$coluna["idUsuario"].'</td>'
                .'<td align="center">'.descrTipoUsuario($coluna["idTipoUsuario"]).'</td>'
                .'<td>'.$coluna["Nome"].'</td>'
                .'<td>'.$coluna["Login"].'</td>'
                //.'<td>'.$coluna["Senha"].'</td>'
                .'<td align="center">'.$icone.'</td>'
                .'<td>'
                    //.'<a href='alterar-usuario.php?id=".$coluna["idUsuario"]."'>Alterar</a>'
                    //.'<a href='php/excluirUsuario.php?id=".md5($coluna["idUsuario"])."'> Excluir</a>'
                    .'<div class="row" align="center">'
                        .'<div class="col-6">'
                            .'<a href="#modalEditUsuario'.$coluna["idUsuario"].'" data-toggle="modal">'
                                .'<h6><i class="fas fa-edit text-info" data-toggle="tooltip" title="Alterar usuário"></i></h6>'
                            .'</a>'
                        .'</div>'

                        .'<div class="col-6">'
                            .'<a href="#modalDeleteUsuario'.$coluna["idUsuario"].'" data-toggle="modal">'
                                .'<h6><i class="fas fa-trash text-danger" data-toggle="tooltip" title="Excluir usuário"></i></h6>'
                            .'</a>'
                        .'</div>'
                    .'</div>'
                .'</td>'
            .'</tr>'
            
            .'<div class="modal fade" id="modalEditUsuario'.$coluna["idUsuario"].'">'
                .'<div class="modal-dialog modal-lg">'
                    .'<div class="modal-content">'
                        .'<div class="modal-header bg-info">'
                        .'<h4 class="modal-title">Alterar Usuário</h4>'
                            .'<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">'
                            .'<span aria-hidden="true">&times;</span>'
                            .'</button>'
                        .'</div>'
                        .'<div class="modal-body">'

                            .'<form method="POST" action="php/salvarUsuario.php?funcao=A&codigo='.$coluna["idUsuario"].'" enctype="multipart/form-data">'
                                .'<div class="row">'
                                    .'<div class="col-8">'
            
                                        .'<div class="form-group">'
                                            .'<label for="iNome">Nome:</label>'
                                             .'<input type="text" value="'.$coluna["Nome"].'" class="form-control" id="iNome" name="nNome" maxlength="50">'
                                        .'</div>'
                                    .'</div>'
                
                                        .' <div class="col-4">'
                                            .'<div class="form-group">'
                
                                                .' <label for="iNome">Tipo de Usuário:</label>'
                                                .'<select name="nTipoUsuario" class="form-control" required>'
                                                .' <option value="'.$coluna["idUsuario"].'">'.descrTipoUsuario($coluna["idTipoUsuario"]).'</option>'
                                                .optionTipoUsuario()
                                                .'</select>'
                                            .' </div>'
                
                                        .'</div>'
                
                                        .'</div>'
                
                                        .'<div class="col-8">'
                                            .'<div class="form-group">'
                                             .' <label for="iLogin">Login:</label>'
                                                .'<input type="email" value="'.$coluna["Login"].'" class="form-control" id="iLogin" name="nLogin" maxlength="50">'
                                            .'</div>'   
                                        .'</div>'
                
                                        .'<div class="col-4">'
                                            .'<div class="form-group">'
                                                .'<label for="iSenha">Senha:</label>'
                                                .' <input type="text" value="" class="form-control" id="iSenha" name="nSenha" maxlength="6">'
                                            .'</div>' 
                                        .'</div>'
                
                                        .'<div class="col-12">'
                                            .'<div class="form-group">'
                                                .' <label for="iFoto">Foto:</label>'
                                                .'<input type="file"  class="form-control" id="iFoto" name="Foto" accept="image/*">'
                                            .'</div>'
                                        .'</div>'
                
                                        .'<div class="col-12">'
                                            .'<div class="form-group">'
                                                .'<input type="checkbox"   id="iAtivo" name="nAtivo" '. $ativo.'>'
                                                .'<label for="iAtivo">Usuário Ativo</label>'
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



            .'<div class="modal fade" id="modalDeleteUsuario'.$coluna["idUsuario"].'">'
                .'<div class="modal-dialog">'
                    .'<div class="modal-content">'
                        .'<div class="modal-header bg-danger">'
                        .'<h4 class="modal-title">Excluir Usuário: '.$coluna["idUsuario"].'</h4>'
                            .'<button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">'
                            .'<span aria-hidden="true">&times;</span>'
                            .'</button>'
                        .'</div>'
                        .'<div class="modal-body">'

                            .'<form method="POST" action="php/salvarUsuario.php?funcao=D&codigo='.$coluna["idUsuario"].'" enctype="multipart/form-data">'
                            
                                .'<div class="row">'
                                    .'<div class="col-12">'
                                        .'<h5>Deseja EXCLUIR o usuário '.$coluna["Nome"].'</h5>'
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