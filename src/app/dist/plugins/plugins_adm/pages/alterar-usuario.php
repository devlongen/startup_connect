<?php
    include("php/funcoes.php");
?>

<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
		
		<meta charset="UTF-8">
        <title>PHP</title>

    </head>

    <body>
        
            
    <form method="POST" action="php/salvarUsuario.php">
    <input type="hidden" name="funcao" value="A">
    <input type="hidden" name="codigo" value="<?php echo $_GET['id']; ?>">
    <div class="form-group">
       
       
    </div>
    <div class="form-group">
        <label for="iNome">Nome:</label>
        <input type="text" class="form-control" id="iNome" name="nome_usuario" value="<?php echo nomeUsuario($_GET['id']); ?>" maxlength="50" required>
    </div>
    <div class="form-group">
        <label for="iLogin">Login:</label>
        <input type="email" class="form-control" id="iLogin" name="login_usuario" value="<?php echo loginUsuario($_GET['id']); ?>" maxlength="50" required>
    </div>
    <div class="form-group">
        <label for="iSenha">Senha:</label>
        <input type="password" class="form-control" id="iSenha" name="senha_usuario" maxlength="20">
    </div>
    <div class="form-group">
        <input type="checkbox" id="iAtivo" name="ativo_usuario" <?php echo ativoUsuario($_GET['id']); ?>>
        <label for="iAtivo">Usuário Ativo</label>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-success">Salvar</button>
    </div>
</form>


       

    </body>

</html>