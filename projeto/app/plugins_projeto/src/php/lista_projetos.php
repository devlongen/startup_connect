<?php 
    include_once("../../../conn_db.php")


function lista_projetos(){
    $stmt = $conexao->prepare("SELECT nome_fantasia FROM projeto")
}


?>