<?php
    session_start();
    include("php/funcoes.php");    
?>

<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
		
		<meta charset="UTF-8">
        <title>PHP</title>

    </head>

    <body>
        
        <?php echo montaMenu(); ?>
        
        <p>
            <?php if($_SESSION['idusuario'] == 1){ ?>

                <a href="novo-usuario.php">Novo Usuário</a>

            <?php } ?>
        </p>

        <table border='1'>
            <tr>
                       <th>ID</th>
                      <th>Nome</th>
                      <th>CPF</th>
                      <th>Telefone</th>
                      <th>Data/nascimento</th>
                      <th>E-mail</th>
                      <th>Senha</th>
                      <th>Status</th>
                      <th>Ativo</th>                
                      <th>Ações</th>
            </tr>
        
            <?php echo listaUsuario(); ?>

        </table>

    </body>

</html>