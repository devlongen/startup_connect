<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>Cadastro da Empresa</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
  
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<div class="container">
  <div class="form">
    <form action="dist/php/function/insert_empresa.php">
      <div class="form-header">
        <div class="title">
          <h1>Cadastro da empresa</h1>
        </div>
      </div>

      <div class="input-group">
        <div class="input-box">
          <label for="razao-social">Razão Social</label>
          <input id="razao-social" type="text" name="razao-social" placeholder="Digite a razão social" required>
        </div>

        <div class="input-box">
          <label for="cnpj">CNPJ</label>
          <input id="cnpj" type="text" name="cnpj" placeholder="Digite o CNPJ" required>
        </div>

        <div class="input-box">
          <label for="email">Email Corporativo</label>
          <input id="email" type="email" name="email" placeholder="Digite seu e-mail corporativo" required>
        </div>

        <div class="input-box">
          <label for="nome-fantasia">Nome Fantasia</label>
          <input id="nome-fantasia" type="text" name="nome-fantasia" placeholder="Digite o nome fantasia" required>
        </div>

        <div class="input-box">
          <label for="endereco">Endereço</label>
          <input id="endereco" type="text" name="endereco" placeholder="Digite o endereço" required>
        </div>

        <div class="input-box">
          <label for="data-abertura">Data de abertura da empresa</label>
          <input id="data-abertura" type="date" name="data-abertura" required>
        </div>

        <div class="input-box">
          <label for="patrimonio">Patrimônio Oferecido</label>
          <input id="patrimonio" type="text" name="patrimonio" placeholder="Digite o patrimônio oferecido" required>
        </div>

        <div class="input-box">
          <label for="meta-total">Meta total</label>
          <input id="meta-total" type="text" name="meta-total" placeholder="Digite a meta total" required>
        </div>

        <div class="col-md-12">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">Summernote</h3>
            </div>
            <div class="card-body">
              <textarea id="summernote">Place <em>some</em> <u>text</u> <strong>here</strong></textarea>
            </div>
            
          </div>
        </div>

  

      </div>
      <div class="input-box">
          <label for="termos-condicao">Aceite os nossos termos de condições do nosso site.</label>
          <input id="termos-condicao" type="checkbox" name="termos-condicao" value="estou de acordo com termos"required>
        </div>
      <div class="continue-button">
        <button type="submit" name="cadastro_empresa_db">Continuar</button>
      </div>
    </form>
  </div>
</div>

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<!-- CodeMirror -->
<script src="../plugins/codemirror/codemirror.js"></script>
<script src="../plugins/codemirror/mode/css/css.js"></script>
<script src="../plugins/codemirror/mode/xml/xml.js"></script>
<script src="../plugins/codemirror/mode/htmlmixed/htmlmixed.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })
</script>
</body>
</html>
