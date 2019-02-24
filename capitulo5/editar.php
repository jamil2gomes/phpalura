<?php

require_once 'banco.php';
require_once 'ajudantes.php';

    $exibir_tabela = false;

   

    if(isset($_POST['nome']) && $_POST['nome'] != ''){
        $tarefa=[];
        $tarefa['id'] = $_POST['id'];

        $tarefa['nome'] = $_POST['nome'];

        $tarefa['descricao'] = (isset($_POST['descricao'])) ? $_POST['descricao'] : '';
       
        $tarefa['prazo'] = (isset($_POST['prazo'])) ? traduz_data_para_banco( $_POST['prazo']) : '';
        
        $tarefa['prioridade'] = (isset($_POST['prioridade'])) ? $_POST['prioridade'] : '';
       
        $tarefa['concluida'] = (isset($_POST['concluida']))? 1 : 0;

       editar_tarefa($conexao, $tarefa);
       header('Location: tarefa2.php');
       die();
    }
    $tarefa = buscar_tarefa($conexao, $_GET['id']);

    require 'template2.php';