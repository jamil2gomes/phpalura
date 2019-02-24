<?php
    session_start(); 
    require_once 'banco.php';
    require_once 'ajudantes.php';

    $exibir_tabela = true;

    if(isset($_POST['nome']) && $_POST['nome'] != ''){
        $tarefa = [];
        $tarefa['nome'] =  $_POST['nome'];

        $tarefa['descricao'] = (isset($_POST['descricao']))? $_POST['descricao']: '';
        
        $tarefa['prazo'] = (isset($_POST['prazo'])) ? traduz_data_para_banco( $_POST['prazo']):'';
      
        $tarefa['prioridade'] = isset($_POST['prioridade']) ? $_POST['prioridade'] : '';
        
        $tarefa['concluida'] = (isset($_POST['concluida'])) ? 1 : 0;
       
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

