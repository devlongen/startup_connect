<?php 
include_once("connection.php");

$contador_empresa = count_empresa($conexao);
$contador_investidor = count_investidor($conexao);
$contador_user = count_user($conexao);
function count_empresa($conexao){
   // Preparar a consulta SQL
   $stmt_empresa = $conexao->prepare("SELECT COUNT(*) FROM projeto;");
   
   // Executar a consulta
   $stmt_empresa->execute();
   
   // Vincular o resultado da contagem a uma variável
   $stmt_empresa->bind_result($count_empresa_total);
   $stmt_empresa->fetch();
   
   // Fechar o statement
   $stmt_empresa->close();
   
   // Retornar a contagem
   return $count_empresa_total;
}
function count_investidor($conexao){
   // Preparar a consulta SQL
   $stmt_investidor = $conexao->prepare("SELECT COUNT(*) FROM usuario WHERE status_usuario = 'Investidor'");
   
   // Executar a consulta
   $stmt_investidor->execute();
   
   // Vincular o resultado da contagem a uma variável
   $stmt_investidor->bind_result($count_investidor_total);
   $stmt_investidor->fetch();
   
   // Fechar o statement
   $stmt_investidor->close();
   
   // Retornar a contagem
   return $count_investidor_total;
}
function count_user($conexao){
   // Preparar a consulta SQL
   $stmt_user = $conexao->prepare("SELECT COUNT(*) FROM usuario");

   // Executar a consulta
   $stmt_user->execute();
   
   // Vincular o resultado da contagem a uma variável
   $stmt_user->bind_result($count_user_total);
   $stmt_user->fetch();
   
   // Fechar o statement
   $stmt_user->close();
   
   // Retornar a contagem
   return $count_user_total;
   
}


?>
