<?php
    session_start(); 
    require_once 'banco.php';
    require_once 'ajudantes.php';

    if(isset($_GET['nome']) && $_GET['nome'] != ''){
        $tarefa = array();
        $tarefa['nome'] = $_GET['nome'];

        if(isset($_GET['descricao'])){
            $tarefa['descricao'] = $_GET['descricao'];
        }else{
            $tarefa['descricao'] = '';
        }

        if(isset($_GET['prazo'])){
            $tarefa['prazo'] =traduz_data_para_banco( $_GET['prazo']);;
        }else{
            $tarefa['prazo'] = '';
        }

        if(isset($_GET['prioridade'])){
            $tarefa['prioridade'] = $_GET['prioridade'];
        }else{
            $tarefa['prioridade'] = '';
        }

        if(isset($_GET['concluida'])){
            $tarefa['concluida'] = $_GET['concluida'];
        }else{
            $tarefa['concluida'] = 'não';
        }

       gravar_tarefa($conexao,$tarefa);
    }
    
   $lista_tarefas = buscar_tarefas($conexao);

