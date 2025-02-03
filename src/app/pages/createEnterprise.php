<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro de Empresa</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Arial, sans-serif;
    }

    body {
      background-color: #f4f8fb;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      padding: 20px;
    }

    .form-container {
      background-color: #ffffff;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
      max-width: 500px;
      width: 100%;
      border-top: 5px solid #007bff;
    }

    .form-container h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #007bff;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
      color: #333;
      font-weight: bold;
    }

    .form-group input, 
    .form-group textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 8px;
      outline: none;
      transition: border-color 0.3s;
    }

    .form-group input:focus, 
    .form-group textarea:focus {
      border-color: #007bff;
    }

    .btn-submit {
      background-color: #007bff;
      color: white;
      border: none;
      padding: 12px 20px;
      border-radius: 8px;
      width: 100%;
      cursor: pointer;
      font-size: 1rem;
      transition: background-color 0.3s;
    }

    .btn-submit:hover {
      background-color: #0056b3;
    }

    .error-message {
      color: red;
      font-size: 0.9rem;
      margin-top: 5px;
    }
  </style>
</head>
<body>
  <div class="form-container">
    <h2>Cadastro de Empresa</h2>
    <form id="enterpriseForm" name="enterpriseForm" action="../lib/plugins/plugins_enterprise/php/startingEnterprise.php" method="POST">
      <div class="form-group">
        <label for="razaoSocial">Razão Social</label>
        <input type="text" id="razaoSocial" name="razaoSocial" required>
      </div>

      <div class="form-group">
        <label for="cnpjEnterprise">CNPJ</label>
        <input type="text" id="cnpjEnterprise" name="cnpjEnterprise" maxlength="14" required>
      </div>

      <div class="form-group">
        <label for="nameFantasy">Nome Fantasia</label>
        <input type="text" id="nameFantasy" name="nameFantasy" required>
      </div>

      <div class="form-group">
        <label for="address">Endereço</label>
        <input type="text" id="address" name="address" required>
      </div>

      <div class="form-group">
        <label for="emailEnterprise">E-mail</label>
        <input type="email" id="emailEnterprise" name="emailEnterprise" required>
      </div>

      <div class="form-group">
        <label for="valueStart">Valor Inicial</label>
        <input type="number" id="valueStart" name="valueStart" min="0" step="0.01" required>
      </div>

      <div class="form-group">
        <label for="metaTotal">Meta Total</label>
        <input type="number" id="metaTotal" name="metaTotal" min="0" step="0.01" required>
      </div>

      <div class="form-group">
        <label for="descEnterprise">Descrição da Empresa</label>
        <textarea id="descEnterprise" name="descEnterprise" rows="4" required></textarea>
      </div>

      <button type="submit" class="btn-submit">Cadastrar Empresa</button>
    </form>
  </div>
</body>
</html>
