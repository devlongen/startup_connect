<?php include_once("../dist/plugins/plugins_projeto/src/php/lista_projetos.php");?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../dist/plugins/plugins_projeto/src/styles/styles.css">
    <link rel="stylesheet" href="../dist/plugins/plugins_projeto/src/styles/navbar.css">
    <link rel="stylesheet" href="../dist/plugins/plugins_projeto/src/styles/menu.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <title>Categoria de Projetos</title>
</head>

<body>
    <nav class="navbar">
        <ul>
            <!-- Seu menu aqui -->
        </ul>
    </nav>

    <div class="aba-pesquisa">
        <input type="text" class="aba-pesquisa__input" placeholder="Pesquisar...">
        <img src="../dist/plugins/plugins_projeto/src/images/lupa (1).png" alt="Ícone de pesquisa" class="aba-pesquisa__lupa">
    </div>

    <section id="menu">
        <h2 class="section-title">Projetos</h2>
        <h3 class="section-subtitle">Fique por dentro das Novidades</h3>
        <a href="../"><h3 class="botao_home">Voltar para o inicio!</h3></a>

        <div id="dishes">
            <?php foreach ($projetos as $projeto):?>
                <div class="dish">
                    <div class="dish-heart">
                        <i class=""></i>
                    </div>
                    <img src="../dist/plugins/plugins_projeto/src/images/1.png" class="dish-image" alt="Imagem do projeto">
                    <h3 class="dish-title"><?php echo $projeto['nome_fantasia']; ?></h3>
                    <span class="dish-description"><?php echo $projeto['desc_empresa']; ?></span>
                    <div class="dish-price">
                        <h4> </h4>
                    <form action="pagina_destino.php" method="post">
                        <input type="hidden" name="idprojeto" value="<?php echo $projeto['idprojeto']; ?>">
                        <button type="submit" class="btn-default">
                            <i>SAIBA MAIS</i>
                        </button>
                    </form>
                    </div>
                </div>
            <?php endforeach;?>
        </div>

    </section>

</body>

</html>
