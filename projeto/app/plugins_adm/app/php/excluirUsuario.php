<?php
    include("conexao.php");

    $idUsuario = $_GET['id'];

    $sql = "DELETE FROM Usuarios "
            ." WHERE md5(idusuario) = '".$idusuario."';";
    $result = mysqli_query($conn,$sql);
    mysqli_close($conn);

    header("location: ../lista-usuario.php");

?>