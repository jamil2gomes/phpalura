<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Gerenciador de tarefas</title>
  <link rel="stylesheet" href="style.css">
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>
  <body>
    <div class ="container">
      <h1>Gerenciador de tarefas</h1>
      <hr>
      <!-- Exibe Formulário -->
      <?php require_once'formulario.php'; ?>
      <br><br>
      <!-- Exibe Tabela -->
      <?php if ($exibir_tabela) : ?>            
        <?php require'tabela.php'; ?>
      <?php endif; ?>
      
    </div>
  </body>
</html>