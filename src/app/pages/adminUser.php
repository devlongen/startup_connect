<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administração de Projetos</title>
  <link rel="stylesheet" href="../lib/plugins/plugins_admStartup/css/styles.css">
</head>
<body>
  <div class="container">
    <header>
      <h1>Administração de Projetos</h1>
    </header>
    <main>
      <div class="project-cards">
        <!-- Card de Projeto -->
        <div class="card" onclick="openProject('Projeto 1')">
          <div class="card-header">Projeto 1</div>
          <div class="card-body">
            <p>Descrição breve do projeto 1.</p>
          </div>
        </div>
        <!-- Card de Projeto -->
        <div class="card" onclick="openProject('Projeto 2')">
          <div class="card-header">Projeto 2</div>
          <div class="card-body">
            <p>Descrição breve do projeto 2.</p>
          </div>
        </div>
        <!-- Adicione mais cards conforme necessário -->
      </div>
    </main>
    <div class="modal" id="projectModal">
      <div class="modal-content">
        <span class="close-btn" onclick="closeModal()">&times;</span>
        <h2>Detalhes do Projeto</h2>
        <div id="projectDetails"></div>
      </div>
    </div>
  </div>
  <script src="../lib\plugins\plugins_admStartup\js\script.js"></script>
</body>
</html>
