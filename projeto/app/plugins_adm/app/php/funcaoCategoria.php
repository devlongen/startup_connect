<?php
//Função para montar a lista de categorias
function optionCategoria(){

    $lista = "";

    include("conexao.php");
    $sql = "SELECT idprojeto, desc_empresa FROM projeto ORDER BY desc_empresa;";        
    $result = mysqli_query($conn,$sql);
    mysqli_close($conn);

    //Validar se tem retorno do BD
    if (mysqli_num_rows($result) > 0) {
        
        foreach ($result as $coluna) {            
            //***Verificar os dados da consulta SQL
            $lista .= '<option value="'.$coluna['idprojeto'].'">'.$coluna['desc_empresa'].'</option>';
        }        
    } 

    return $lista;

}

?>