<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">   
        <title>Gerenciador de Tarefas</title>
        <link rel="stylesheet" href="tarefa.css">
    </head>
    <body>  
        <h1>Gerenciador de Tarefas</h1>
        <form action="">
            <fieldset>
                <legend>Nome da Tarefa</legend>
                <label for="nome">
                    Tarefa:
                    <input type="text" name="nome">
                </label>
                <input type="submit" value="Cadastrar">
            </fieldset>
        </form>

        <?php 
        
        if (array_key_exists('nome', $_GET)) {
            $_SESSION['lista'][] = $_GET['nome'];
            }
            $lista_tarefas = [];

            if (array_key_exists('lista', $_SESSION)) {
                $lista_tarefas = $_SESSION['lista'];   
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
