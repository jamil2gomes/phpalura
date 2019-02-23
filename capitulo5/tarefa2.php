<?php
    session_start(); 
    require_once 'banco.php';
    require_once 'ajudantes.php';

    $exibir_tabela = true;

    if(isset($_GET['nome']) && $_GET['nome'] != ''){
        $tarefa = [];
        $tarefa['nome'] =  $_GET['nome'];

        $tarefa['descricao'] = (isset($_GET['descricao']))? $_GET['descricao']: '';
        
        $tarefa['prazo'] = (isset($_GET['prazo'])) ? traduz_data_para_banco( $_GET['prazo']):'';
      
        $tarefa['prioridade'] = isset($_GET['prioridade']) ? $_GET['prioridade'] : '';
        
        $tarefa['concluida'] = (isset($_GET['concluida'])) ? 1 : 0;
       
       gravar_tarefa($conexao,$tarefa);
       header('Location: tarefa2.php');
       die();
    }
    
   $lista_tarefas = buscar_tarefas($conexao);
   
   $tarefa = [
       'id'=> 0,
       'nome'=> '',
       'descricao'  => '',
       'prazo'      => '',
       'prioridade' => 1,
       'concluida'  => ''];

    require_once 'template2.php';

