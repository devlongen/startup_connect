<?php
// Verifica se o conteúdo do Summernote foi enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['content']) && isset($_POST['empresa'])) {
    $content = $_POST['content'];
    $empresa = $_POST['empresa'];

    // Define o diretório onde o arquivo será salvo
    $directory = 'arquivos_summernote' . $empresa . '/';
    if (!is_dir($directory)) {
        mkdir($directory, 0777, true);
    }

    // Cria um nome de arquivo único
    $fileName = $directory . 'projeto_' . time() . '.php';

    // Salva o conteúdo em um arquivo
    file_put_contents($fileName, $content);

    // Responde ao AJAX com uma mensagem de sucesso
    echo 'success';
} else {
    // Responde ao AJAX com uma mensagem de erro
    echo 'error';
}
?>
