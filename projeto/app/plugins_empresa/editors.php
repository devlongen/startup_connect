<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/style.css"> 
  <title>AdminLTE 3 | Editors</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
  <!-- CodeMirror -->
  <link rel="stylesheet" href="../plugins/codemirror/codemirror.css">
  <link rel="stylesheet" href="../plugins/codemirror/theme/monokai.css">
  <!-- SimpleMDE -->
  <link rel="stylesheet" href="../plugins/simplemde/simplemde.min.css">
</head>
<body>

<div class="container">
        <!-- <div class="form-image">
            <img src="assets/img//undraw_shopping_re_3wst.svg" alt="">
        </div> -->
        <div class="card-body">
              
        </div>

        <div class="form">
            <form action="#">
                <div class="form-header">
                    <div class="title">
                        <h1>Cadastro da empresa</h1>
                    </div>

                </div>

                <div class="input-group">
                    <div class="input-box">
                        <label for="firstname">Razão Social</label>
                        <input id="firstname" type="text" name="firstname" placeholder="Digite seu primeiro nome" required>
                    </div>


                    <div class="input-box">
                        <label for="lastname">CNPJ</label>
                        <input id="lastname" type="text" name="lastname" placeholder="Digite seu sobrenome" required>
                    </div>
                    <div class="input-box">
                        <label for="email">Email Corporativo</label>
                        <input id="email" type="email" name="email" placeholder="Digite seu e-mail" required>
                    </div>

                    <div class="input-box">
                        <label for="number">Nome Fantasia</label>
                        <input id="number" type="tel" name="number" placeholder="(xx) xxxx-xxxx" required>
                    </div>

                    <div class="input-box">
                        <label for="password">Endereço</label>
                        <input id="password" type="password" name="password" placeholder="Digite sua senha" required>
                    </div>

                    <div class="input-box">
                        <label for="password">Data de abertura da empresa</label>
                        <input id="password" type="password" name="password" placeholder="Digite sua senha" required>
                    </div>

                    <div class="input-box">
                        <label for="password">Data de abertura da empresa</label>
                        <input id="password" type="password" name="password" placeholder="Digite sua senha" required>
                    </div>

                    <div class="input-box">
                        <label for="password">Patrimônio Oferecido</label>
                        <input id="password" type="password" name="password" placeholder="Digite sua senha" required>
                    </div>

                    <div class="input-box">
                        <label for="password">Meta total</label>
                        <input id="password" type="password" name="password" placeholder="Digite sua senha" required>
                    </div>


                    <div class="col-md-12">
                            <div class="card card-outline card-info">
                                <div class="card-header">
                                <h3 class="card-title">
                                    Summernote
                                </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                <textarea id="summernote">
                                    Place <em>some</em> <u>text</u> <strong>here</strong>
                                </textarea>
                                </div>
                                <div class="card-footer">
                                    Visit <a href="https://github.com/summernote/summernote/">Summernote</a> documentation for more examples and information about the plugin.
                                </div>
                            </div>
                    </div>
              

                </div>

                
                    <!-- Main content -->
      <section class="content">
        <div class="row">
            <div class="col-md-12">
              <div class="card card-outline card-info">
                
                <!-- /.card-header -->
                <div class="card-body">
                  <textarea id="summernote">
                    Place <em>some</em> <u>text</u> <strong>here</strong>
                  </textarea>
                </div>  
        </div>
        </div>



                </div>

              

                <div class="continue-button">
                    <button><a href="#">Continuar</a> </button>
                </div>
            </form>
        </div>
    </div>

  

    
        <!-- /.col-->
      

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

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
