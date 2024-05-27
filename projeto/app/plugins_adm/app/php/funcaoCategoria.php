<?php
//Função para montar a lista de categorias
function optionCategoria(){

    $lista = "";

    include("conexao.php");
    $sql = "SELECT idCategoria, Descricao FROM categoria ORDER BY Descricao;";        
    $result = mysqli_query($conn,$sql);
    mysqli_close($conn);

    //Validar se tem retorno do BD
    if (mysqli_num_rows($result) > 0) {
        
        foreach ($result as $coluna) {            
            //***Verificar os dados da consulta SQL
            $lista .= '<option value="'.$coluna['idCategoria'].'">'.$coluna['Descricao'].'</option>';
        }        
    } 

    return $lista;

}

?>