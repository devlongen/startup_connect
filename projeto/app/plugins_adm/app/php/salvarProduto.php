<?php

    include('funcoes.php');

    $descricao   = $_POST["nDescricao"];
    $idCategoria = $_POST["nCategoria"];
    $quantidade  = $_POST["nQuantidade"];
    $funcao      = $_GET["funcao"];
    $idProduto   = $_GET["codigo"];

    include("conexao.php");

    //Validar se é Inclusão ou Alteração
    if($funcao == "I"){

        //Busca o próximo ID na tabela
        $idProduto = proxIdProjeto();

        //INSERT
        $sql = "INSERT INTO produto (idprojeto,idCategoria,Descricao,Quantidade) "
                ." VALUES (".$idProduto.","
                .$idCategoria.","
                ."'$descricao',"
                .$quantidade.");";

    }elseif($funcao == "A"){
        //UPDATE
        $sql = "UPDATE produto "
                ." SET idCategoria = ".$idCategoria.", "
                    ." Descricao = '".$descricao."', "
                    ." Quantidade = ".$quantidade
                ." WHERE idprojeto = ".$idprojeto.";";

    }elseif($funcao == "D"){
        //DELETE
        $sql = "DELETE FROM produto "
                ." WHERE idProduto = ".$idprojeto.";";
    }

    $result = mysqli_query($conn,$sql);
    mysqli_close($conn);

    header("location: ../produtos.php");

?>