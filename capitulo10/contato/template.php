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
    <p>1.  Faça  um  formulário  que  peça  um  CEP  e  valide  o  valor digitado  usando  o  
    padrão  XXXXX-XXX,  ou  seja,  cinco dígitos, um traço e mais três dígitos</p>
    <p>2.  Faça um formulário que peça um CPF e valide se o valor foidigitado  no  formato 
     correto:  XXX.XXX.XXX-XX  (X  são os números). Use expressões regulares aqui.</p>
    <p>3.  Adicione validação para a lista de contatos que já está sendo feita nos desafios
     há alguns capítulos. Tente validar a entradado  nome,  que  deve  ser  obrigatório,
    do  telefone,  usando  o formato  "(00)0000-0000",  do  e-mail  e  também  da  data  de 
    nascimento.  Aqui  também  vale  tentar  validar  números  detelefones móveis, no formato 
    "(00)00000-0000"</p>
    <p>Desafios referentes ao <strong>Capitulo 10 - Desafio 1, 2 e 3</strong></p>

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