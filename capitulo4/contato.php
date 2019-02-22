<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">   
        <title>Gerenciador de Contatos</title>
        <link rel="stylesheet" href="tarefa.css">
    </head>
    <body>  
        <h1>Gerenciador de Contatos</h1>
        <form action="">
            <fieldset>
                <legend>Contato</legend>
                <label for="nome">
                    Nome:
                    <input type="text" name="nome">
                </label>
                <label for="email">
                    Email:
                    <input type="email" name="email">
                </label>
                <label for="telefone">
                    Telefone:
                    <input type="tel" name="telefone" >
                </label>
                <input type="submit" value="Cadastrar">
            </fieldset>
        </form>

        <?php 
        
        if (array_key_exists('nome', $_GET) && array_key_exists('email', $_GET) && array_key_exists('telefone', $_GET)) {
            $_SESSION['contato'][] = $_GET['nome'];
            $_SESSION['contato'][] = $_GET['email'];
            $_SESSION['contato'][] = $_GET['telefone'];
            }
            $lista_tarefas = [];

            if (array_key_exists('contato', $_SESSION)) {
                $lista_tarefas = $_SESSION['contato'];   
             }
        ?>
<hr>
    <table>    
        <tr>        
            <th>Nome</th>    
        </tr>    
        <?php foreach ($lista_tarefas as $tarefa) : ?>
            <tr>           
            <td><?=$tarefa?></td>
           </tr>    
        <?php endforeach; ?>
    </table>
    </body>
</html>
