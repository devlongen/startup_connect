<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css"> 
    <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css"> 
    <!-- <link rel="stylesheet" href="../plugins/bootstrap/css/bootstrap.min.css"> -->
  
    

    
    <title>Formulário</title>
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

                <div class="gender-inputs">
                    <div class="gender-title">
                        <h6>Gênero</h6>
                    </div>

                    <div class="gender-group">
                        <div class="gender-input">
                            <input id="female" type="radio" name="gender">
                            <label for="female">Feminino</label>
                        </div>

                        <div class="gender-input">
                            <input id="male" type="radio" name="gender">
                            <label for="male">Masculino</label>
                        </div>

                        <div class="gender-input">
                            <input id="others" type="radio" name="gender">
                            <label for="others">Outros</label>
                        </div>

                        <div class="gender-input">
                            <input id="none" type="radio" name="gender">
                            <label for="none">Prefiro não dizer</label>
                        </div>
                    </div>
                </div>

              

                <div class="continue-button">
                    <button><a href="#">Continuar</a> </button>
                </div>
            </form>
        </div>
    </div>
    

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Summernote -->
    <script src="../plugins/summernote/summernote-bs4.min.js"></script>
    

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