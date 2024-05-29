<?php
include("conexao.php");

// Verificar se foi passado o parâmetro idusuario via POST
$idUsuario = isset($_POST["idusuario"]) ? $_POST["idusuario"] : null;

// Verificar se $idUsuario está definido e não vazio
if ($idUsuario !== null && !empty($idUsuario)) {
    // Preparar a consulta DELETE
    $sql = "DELETE FROM usuario WHERE idusuario = '$idUsuario'";

    // Executar a consulta
    $result = mysqli_query($conn, $sql);

    if ($result) {
        mysqli_close($conn);
        header("location: ../usuarios.php");
        exit;
    } else {
        echo "Erro ao executar a consulta: " . mysqli_error($conn);
    }
} else {
    echo "ID do usuário não foi fornecido ou é inválido.";
}

?>
