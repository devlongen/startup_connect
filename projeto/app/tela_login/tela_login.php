<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Tela Login</title>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="backend/function/function_telas_login/function_tela_login_cadastro.php" method="post" name="cadastro_db">
                <h1>Criar uma conta</h1>

                <input type="text" placeholder="Nome" name="nome_insert_db" required="true">
                <input type="email" placeholder="Email" name="email_insert_db" required="true">
                <input type="text" placeholder="CPF" id="" name="cpf_insert_db" required="true" maxlength="11">
                <input type="password" placeholder="Senha" name="senha_insert_db" required="true">
                <input type="text" placeholder="Telefone" name="telefone_insert_db" required="true" maxlength="11">
                <input type="date" name="data_de_nascimento_insert_db" required="true">
                <input type="radio" name="tipo_usuario_db" value="fundador" id="tipo_usuario" required="true">Fundador 
                <input type="radio" name="tipo_usuario_db" value="investidor" id="tipo_usuario" required="true">Investidor 
                <button href="../app/index.php" name="cadastro_db">Criar</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form action="backend/function/function_telas_login/function_tela_login_cadastro.php" method="post" name="login_db">
                <h1>Entrar</h1>
                <input type="email" placeholder="Email" name="email_login_db" required="true">
                <input type="password" placeholder="Senha" name="senha_login_db" required="true">
                <a href="#">Esqueceu sua senha?</a>
                <button name="login_db">Entrar</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Já tem uma conta?</h1>
                    <p>Use seu email e senha para entrar em seu perfil!</p>
                    <button class="hidden" id="login">Entrar</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Crie sua conta!</h1>
                    <p>Registre-se no nosso site para ter acesso mais funcionalidades</p>
                    <button class="hidden" id="register">Criar conta</button>
                </div>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>