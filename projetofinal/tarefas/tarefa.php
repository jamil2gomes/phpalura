<?php
    session_start(); 
    require_once 'banco.php';
    require_once 'ajudantes.php';

    $exibir_tabela = true;
    $tem_erros = false;
    $erros_validacao = [];


    if(tem_post()){
        $tarefa = [];
                       
        if(isset($_POST['nome'])  &&  strlen($_POST['nome']) > 0 ){ //validação do campo nome
            $tarefa['nome'] =  $_POST['nome'];
        }else{
            $tem_erros = true;
            $erros_validacao['nome'] = "O nome da tarefa é obrigatório!";
        }
        
        $tarefa['descricao'] = (isset($_POST['descricao']))? $_POST['descricao']: '';
        
                            
        if(isset($_POST['prazo'])  &&  strlen($_POST['prazo']) > 0 ){ //validação do campo prazo
            if(validar_data( $_POST['prazo'])){
                 $tarefa['prazo'] =  traduz_data_para_banco( $_POST['prazo']);
            }else{
                $tem_erros = true;
                $erros_validacao['prazo'] = "Data no formato errado! dd/mm/aaaa";
            }}else{
                $tarefa['prazo'] = '';
            }

        
        $tarefa['prioridade'] = isset($_POST['prioridade']) ? $_POST['prioridade'] : '';
        
        $tarefa['concluida'] = (isset($_POST['concluida'])) ? 1 : 0;
        
        if(!$tem_erros){
            gravar_tarefa($conexao,$tarefa);

            if (array_key_exists('lembrete', $_POST) && $_POST['lembrete'] == '1'){
                 enviar_email($tarefa);    
            }
            
            header('Location: tarefa.php');
            die();
        }
       
       
    }
    
   $lista_tarefas = buscar_tarefas($conexao);
   
   $tarefa = [
       'id'=> 0,
       'nome'=> '',
       'descricao'  => '',
       'prazo'      => '',
       'prioridade' => 1,
       'concluida'  => ''];

    require_once 'template.php';

