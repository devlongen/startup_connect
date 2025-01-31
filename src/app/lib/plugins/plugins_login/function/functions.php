<?php
// Inicia uma nova sessão ou resume uma sessão existente
session_start();

class Login_User
{

    // Função para redirecionar usuários com base no status da sessão
    public function Perfil(): never
    {
        if ($_SESSION['usuario']['status'] == "Fundador") {
            header("Location: pages/dashboard_fundador.php");
        } elseif ($_SESSION['usuario']['status'] == "Investidor") {
            header("Location: pages/dashboard_investidor.php");
        } elseif ($_SESSION['usuario']['status'] == "Admin") {
            header("Location: pages/painel.php");
        } else {
            header("Location: pages/tela_login.php");
        }
        // Note que após o header é uma boa prática usar o exit para garantir que o script seja encerrado
        exit();
    }

    // Função para fazer logout e redefinir os dados do usuário na sessão
    public function Logout(): never
    {
        $_SESSION['usuario'] = array(
            'nome' => "Usuário",
            'email' => "Faça a sua conta!",
            'status' => "Sem conta"
        );
        header("Location: ../");
        exit();
    }

    // Função para redirecionar usuários que não são Fundadores
    public function Redirect_fundador(): void
    {
        if ($_SESSION['usuario']['status'] != "Fundador") {
            header("Location: ../");
            exit();
        }
    }

    // Função para redirecionar usuários que não são Investidores
    public function Redirect_investidor(): void
    {
        if ($_SESSION['usuario']['status'] != "Investidor") {
            header("Location: ../");
            exit();
        }
    }
}
?>