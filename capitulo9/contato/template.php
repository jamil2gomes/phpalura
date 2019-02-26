<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <title>Desafio - Lista de contatos</title>
</head>
<body>
  
<div class="container">
    <h1>Gerenciador de contatos</h1>
    <p>1. Adicione  uma  opção  para  editar  e  outra  para  remover  os contatos da lista de contatos.<br>
       2.  Adicione uma opção para listar apenas os contatos favoritos.</p>
    <p>Desafios referentes ao <strong>Capitulo 9 - Desafio 1 e 2</strong></p>

<?php 
    include "formulario.php";
?>

<?php
    if($exibir_tabela) :
        include "tabela.php";
    endif;
?>
</div>
</body>
</html>