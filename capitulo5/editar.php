<?php

require_once 'banco.php';
require_once 'ajudantes.php';

    $exibir_tabela = false;

   

    if(isset($_GET['nome']) && $_GET['nome'] != ''){
        $tarefa=[];
        $tarefa['id'] = $_GET['id'];

        $tarefa['nome'] = $_GET['nome'];

        $tarefa['descricao'] = (isset($_GET['descricao'])) ? $_GET['descricao'] : '';
       
        $tarefa['prazo'] = (isset($_GET['prazo'])) ? traduz_data_para_banco( $_GET['prazo']) : '';
        
        $tarefa['prioridade'] = (isset($_GET['prioridade'])) ? $_GET['prioridade'] : '';
       
        $tarefa['concluida'] = (isset($_GET['concluida']))? 1 : 0;

       editar_tarefa($conexao, $tarefa);
       header('Location: tarefa2.php');
       die();
    }
    $tarefa = buscar_tarefa($conexao, $_GET['id']);

    require 'template2.php';