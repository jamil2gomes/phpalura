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
    <p>1. Adicione  uma  página  para  exibir  os  detalhes  de  cadacontato.</p>
    <p>2. Adicione  o  upload  de  fotos  para  a  lista  de  contatos. Lembre-se  de  validar
      se  o  arquivo  é  uma  imagem,  como jpg , png  etc..</p>
    <p>3. Adicione a foto do contato na página de detalhes."</p>
    <p>4. Adicione uma opção para apagar a foto do contato.</p>
    <p>Desafios referentes ao <strong>Capitulo 11 - Desafio 1, 2, 3 e 4</strong></p>

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