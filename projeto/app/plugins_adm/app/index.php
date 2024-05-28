<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
		
		<meta charset="UTF-8">
        <title>PHP</title>

    </head>

    <body>

        <form method="POST" action="php/validaLogin.php">
        
            <p>
                <label for="iEmail">E-mail: </label>
                <input type="email" id="iEmail" name="nEmail" required>
            </p>

            <p>
                <label for="iSenha">Senha: </label>
                <input type="password" id="iSenha" name="nSenha" required>
            </p>

            <button type="submit">Logar</button>

        </form>

    </body>

</html>