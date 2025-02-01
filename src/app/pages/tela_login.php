<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../lib/plugins/plugins_login/style.css">
    <title>Tela Login</title>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="../lib/plugins/plugins_login/php/registerUser.php" method="post" name="userData">
                <h1>Criar uma conta</h1>
                <input type="text" placeholder="Nome" name="userData[]" required="true">
                <input type="email" placeholder="Email" name="userData[]" required="true"
                    oninput="validacaoEmail(this)">
                <input type="password" placeholder="Senha" name="userData[]" required="true" minlength="8">
                <input type="number" placeholder="Telefone" name="userData[]" required="true"
                    oninput="limitCharacters(this, 11)">
                <input type="date" max="2005-12-31" name="userData[]" required="true">
                <input type="radio" name="userData[5]" value="Fundador" id="tipo_usuario" required="true">Fundador
                <input type="radio" name="userData[5]" value="Investidor" id="tipo_usuario" required="true">Investidor
                <button type="submit">Criar</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form action="../lib/plugins/plugins_login/php/loginUser.php" method="post" name="userAcess">
                <h1>Entrar</h1>
                <input type="email" placeholder="Email" name="userAcess[]" required="true">
                <input type="password" placeholder="Senha" name="userAcess[]" required="true">
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
    <script src="../lib/plugins/plugins_login/script.js"></script>
</body>

</html>