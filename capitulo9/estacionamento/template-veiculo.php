<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <title>Desafio - Lista de Veiculos</title>
</head>
<body>
<div class="container">
    <h1>Gerenciador de Estacionamento</h1>

     <p> 3.  Adicione  opções  para  remover  os  dados  dos  veículos cadastrados no banco de
      dados do estacionamento.<br>
         4. Faça uma opção no desafio do estacionamento para mostrar os 
       veículos  que  entraram  no  estacionamento  em  umadeterminada data.</p>
    <p>Esse projeto se refere ao <strong> desafio 3 e 4 do capitulo 9</strong></p>

  <?php
    include "formulario.php";

    if($exibir_tabela) :
         include "tabela.php";
    endif;
?>

</div>
</body>
</html>