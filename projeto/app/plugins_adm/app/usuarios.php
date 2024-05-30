<?php 
session_start();
include('php/funcoes.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Startup Connect - Usuários</title>

  <!-- CSS -->
  <?php include('partes/css.php'); ?>
  <!-- Fim CSS -->

</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <?php include('partes/navbar.php'); ?>
  <!-- Fim Navbar -->

  <!-- Sidebar -->
  <?php include('partes/sidebar.php'); ?>
  <!-- Fim Sidebar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <!-- Espaço -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="row">
                  <div class="col-9">
                    <h3 class="card-title">Usuários</h3>
                  </div>
                  <div class="col-3" align="right">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#novoUsuarioModal">
                      Novo Usuário
                    </button>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="tabela" class="table table-bordered table-hover">
                  <thead>
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
                  </thead>
                  <tbody>
                    <?php echo listaUsuario(); ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->

      <div class="modal fade" id="novoUsuarioModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h4 class="modal-title">Novo Usuário</h4>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="php/salvarUsuario.php">
          <div class="form-group">
            <label for="nome_usuario">Nome:</label>
            <input type="text" class="form-control" id="iNome" name="nome_usuario" maxlength="50" required>
          </div>
          <div class="form-group">
            <label for="cpf_usuario">CPF:</label>
            <input type="text" class="form-control" id="iCpf" name="cpf_usuario" maxlength="14" required>
          </div>
          <div class="form-group">
            <label for="telefone_usuario">Telefone:</label>
            <input type="text" class="form-control" id="iTelefone" name="telefone_usuario" maxlength="15">
          </div>
          <div class="form-group">
            <label for="data_nascimento_usuario">Data de Nascimento:</label>
            <input type="date" class="form-control" id="iDataNascimento" name="data_nascimento_usuario">
          </div>
          <div class="form-group">
            <label for="email_usuario">Email:</label>
            <input type="email" class="form-control" id="iEmail" name="email_usuario" maxlength="50" required>
          </div>
          <div class="form-group">
            <label for="senha_usuario">Senha:</label>
            <input type="password" class="form-control" id="iSenha" name="senha_usuario" maxlength="20" required>
          </div>
          <div class="form-group">
            <input type="checkbox" id="iAtivo" name="status_usuario">
            <label for="iAtivo">Usuário Ativo</label>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
            <button type="submit" class="btn btn-success">Salvar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- JS -->
<?php include('partes/js.php'); ?>
<!-- Fim JS -->

<script>
  $(function () {
    $('#tabela').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

</body>
</html>
