<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Projeto</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .header {
            background-color: #06A3DA;
            color: #fff;
            text-align: center;
            padding: 15px 0;
            border-radius: 8px 8px 0 0;
        }

        .header h2 {
            margin: 0;
            font-size: 2.5rem;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .project-details {
            margin-top: 20px;
        }

        .project-details label {
            font-weight: bold;
            color: #06A3DA;
            display: block;
            margin-top: 10px;
        }

        .project-details p {
            margin: 5px 0;
            color: #333;
        }

        .content {
            margin-top: 20px;
            border-top: 1px solid #ccc;
            padding-top: 20px;
        }

        .content label {
            font-weight: bold;
            color: #06A3DA;
            display: block;
            margin-bottom: 10px;
        }

        .content .text {
            color: #333;
            line-height: 1.8;
        }

        .back-btn {
            margin-top: 20px;
            text-align: center;
        }

        .back-btn a {
            background-color: #06A3DA;
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .back-btn a:hover {
            background-color: #005E80;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Detalhes do Projeto</h2>
        </div>

        <div class="project-details">
            <?php
            // Verifica se o parâmetro idprojeto foi enviado via POST
            if (isset($_POST['idprojeto'])) {
                // Sanitize e validar o idprojeto recebido (não esqueça de ajustar conforme necessário)
                $idprojeto = filter_var($_POST['idprojeto'], FILTER_VALIDATE_INT);

                // Incluir o arquivo de conexão com o banco de dados
                include_once("src/php/conexao_projetos.php");

                // Consulta SQL para obter os detalhes do projeto com base no idprojeto
                $sql = "SELECT * FROM projeto WHERE idprojeto = ?";

                // Preparar a consulta
                $stmt = $conexao->prepare($sql);

                // Bind do parâmetro
                $stmt->bind_param("i", $idprojeto);

                // Executar a consulta
                $stmt->execute();

                // Obter o resultado da consulta
                $result = $stmt->get_result();

                // Verificar se há resultados
                if ($result->num_rows > 0) {
                    // Exibir os detalhes do projeto
                    $projeto = $result->fetch_assoc();
            ?>
                    <label>Razão Social:</label>
                    <p><?php echo $projeto['razao_social']; ?></p>

                    <label>CNPJ:</label>
                    <p><?php echo $projeto['cnpj_projeto']; ?></p>

                    <label>Nome Fantasia:</label>
                    <p><?php echo $projeto['nome_fantasia']; ?></p>

                    <label>Endereço:</label>
                    <p><?php echo $projeto['endereco']; ?></p>

                    <label>Email Corporativo:</label>
                    <p><?php echo $projeto['email_corporativo']; ?></p>

                    <label>Data de Abertura da Empresa:</label>
                    <p><?php echo $projeto['data_abertura_empresa']; ?></p>

                    <label>Data de Abertura do Site:</label>
                    <p><?php echo $projeto['data_abertura_site']; ?></p>

                    <label>Patrimônio Oferecido:</label>
                    <p><?php echo $projeto['patrimonio_oferecido']; ?></p>

                    <label>Meta Total:</label>
                    <p><?php echo $projeto['meta_total']; ?></p>

                    <label>Descrição da Empresa:</label>
                    <p><?php echo $projeto['desc_empresa']; ?></p>

                    <label>Valor Recebido:</label>
                    <p><?php echo $projeto['valor_recebido']; ?></p>

                    <!-- Novos campos adicionados -->
                    <div class="content">
                        <label>Introdução:</label>
                        <div class="text"><?php echo $projeto['summernote_introducao']; ?></div>
                    </div>

                    <div class="content">
                        <label>Imagens:</label>
                        <div class="text"><?php echo $projeto['summernote_imagens']; ?></div>
                    </div>

                    <div class="content">
                        <label>Objetivo:</label>
                        <div class="text"><?php echo $projeto['summernote_objetivo']; ?></div>
                    </div>

                    <div class="content">
                        <label>Vídeo:</label>
                        <div class="text"><?php echo $projeto['summernote_video']; ?></div>
                    </div>

                    <div class="back-btn">
                        <a href="javascript:history.back()" class="btn"><i class="fas fa-chevron-left"></i> Voltar</a>
                    </div>
                <?php
                } else {
                    // Caso não haja projeto encontrado com o id informado
                    echo "<p>Nenhum projeto encontrado com o ID: $idprojeto</p>";
                }

                // Fechar a conexão e liberar os recursos
                $stmt->close();
                $conexao->close();
            } else {
                // Caso não seja fornecido um idprojeto via POST
                echo "<p>Nenhum ID de projeto fornecido.</p>";
            }
            ?>
        </div>
    </div>
</body>

</html>
