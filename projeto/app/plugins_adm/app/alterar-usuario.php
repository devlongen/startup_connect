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
        
            

            <form method="POST" action="php/salvarUsuario.php?funcao=A&codigo=<?php echo $_GET['id']; ?>">
            <div class="form-group">
                <label for="iTipoUsuario">Tipo de Usuário:</label>
                <select name="nTipoUsuario" class="form-control" required>
                                      
                </select>
            </div>
            <div class="form-group">
                <label for="iNome">Nome:</label>
                <input type="text" class="form-control" id="iNome" name="nNome" value="<?php echo nomeUsuario($_GET['id']); ?>" maxlength="50" required>
            </div>
            <div class="form-group">
                <label for="iLogin">Login:</label>
                <input type="email" class="form-control" id="iLogin" name="nLogin" value="<?php echo loginUsuario($_GET['id']); ?>" maxlength="50" required>
            </div>
            
            <div class="form-group">
                <label for="iSenha">Senha:</label>
                <input type="text" class="form-control" id="iSenha" name="nSenha" maxlength="20">
            </div>
            
            <div class="form-group">
                <input type="checkbox" id="iAtivo" name="nAtivo" <?php echo ativoUsuario($_GET['id']); ?>>
                <label for="iAtivo">Usuário Ativo</label>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>

        </form>


    </body>

</html>