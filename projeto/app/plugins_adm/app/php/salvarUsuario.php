<?php

include('funcoes.php');

$idUsuario = $_POST["idusuario"];
$nome_usuario = $_POST["nome_usuario"];
$cpf_usuario  = $_POST["cpf_usuario"];
$telefone_usuario = $_POST["telefone_usuario"];
$data_nascimento = $_POST["data_nascimento"];
$email_usuario   = $_POST["email_usuario"];
$senha_usuario   = $_POST["senha_usuario"];
$status_usuario  = $_POST["status_usuario"];

// Verifica se o usuário está ativo
$ativo = isset($_POST["nAtivo"]) && $_POST["nAtivo"] == "on" ? "S" : "N";

include("conexao.php");

//Valida a função a ser executada
if(isset($_GET['funcao'])) {
    $funcao = $_GET['funcao'];

    if($funcao == "I") {
        // Busca o próximo ID na tabela
        $idUsuario = proxidusuario();

        // Monta a query SQL para inserção
        $sql = "INSERT INTO usuarios (idusuario, nome_usuario, cpf_usuario, telefone_usuario, data_nascimento_usuario, email_usuario, senha_usuario, status_usuario) "
             . "VALUES ('$idUsuario', '$nome_usuario', '$cpf_usuario', '$telefone_usuario', '$data_nascimento', '$email_usuario', md5('$senha_usuario'), '$ativo')";

    } elseif ($funcao == "A") {
        // Monta a query SQL para atualização
        $setSenha = "";
        if (!empty($senha_usuario)) {
            $setSenha = "senha_usuario = md5('$senha_usuario'),";
        }

        $sql = "UPDATE usuarios SET "
             . "nome_usuario = '$nome_usuario', "
             . "cpf_usuario = '$cpf_usuario', "
             . "telefone_usuario = '$telefone_usuario', "
             . "data_nascimento_usuario = '$data_nascimento', "
             . "email_usuario = '$email_usuario', "
             . "$setSenha "
             . "status_usuario = '$ativo' "
             . "WHERE idusuario = $idUsuario";

    } elseif ($funcao == "D") {
        // Monta a query SQL para exclusão
        $sql = "DELETE FROM usuarios "
             . "WHERE idusuario = $idUsuario";
    }

    // Executa a query SQL
    $result = mysqli_query($conn, $sql);

    // Verifica se a operação foi bem-sucedida
    if ($result) {
        // Verifica se o diretório para as imagens existe, senão cria
        $diretorio = '../dist/img/';
        if (!is_dir($diretorio)) {
            mkdir($diretorio, 0755, true); // Cria o diretório com permissões adequadas
        }

        // Move o arquivo de imagem para o diretório especificado
        $novoNome = basename($_FILES['Foto']['name']);
        move_uploaded_file($_FILES['Foto']['tmp_name'], $diretorio . $novoNome);

        // Caminho da imagem para ser salvo no banco de dados
        $dirImagem = 'dist/img/' . $novoNome;

        // Atualiza o campo de imagem no banco de dados
        $sqlUpdateImagem = "UPDATE usuarios SET Foto = '$dirImagem' WHERE idusuario = $idUsuario";
        $resultUpdateImagem = mysqli_query($conn, $sqlUpdateImagem);

        if ($resultUpdateImagem) {
            mysqli_close($conn);
            header("location: ../usuarios.php"); // Redireciona após operação bem-sucedida
            exit();
        } else {
            echo "Erro ao atualizar imagem: " . mysqli_error($conn); // Exibe erro de atualização de imagem
        }
    } else {
        echo "Erro na operação SQL: " . mysqli_error($conn); // Exibe erro de operação SQL principal
    }
} else {
    echo "Função não especificada."; // Exibe mensagem se a função não estiver especificada na URL
}

mysqli_close($conn); // Fecha a conexão com o banco de dados

?>
