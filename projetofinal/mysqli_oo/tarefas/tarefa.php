<?php
    session_start(); 
    require_once 'banco.php';
    require_once 'ajudantes.php';
    require 'classes/Tarefa.php';
    require 'classes/TarefaRepositorio.php';

    $repositorio = new TarefaRepositorio($conexao);

    $exibir_tabela = true;
    $tem_erros = false;
    $erros_validacao = [];

    $tarefa = new Tarefa();
   

    if(tem_post()){
                      
        if(isset($_POST['nome'])  &&  strlen($_POST['nome']) > 0 ){ //validação do campo nome
            $tarefa->setNome($_POST['nome']);
        }else{
            $tem_erros = true;
            $erros_validacao['nome'] = "O nome da tarefa é obrigatório!";
        }

        if (isset($_POST['descricao'])) {
            $tarefa->setDescricao($_POST['descricao']);
        }else{
            $tarefa->setDescricao('');
        }
        
                              
        if(isset($_POST['prazo'])  &&  strlen($_POST['prazo']) > 0 ){ //validação do campo prazo
            if(validar_data( $_POST['prazo'])){
                 $tarefa->setPrazo(traduz_data_para_banco($_POST['prazo']));
            }else{
                $tem_erros = true;
                $erros_validacao['prazo'] = "Data no formato errado! dd/mm/aaaa";
            }
        }else{
            $tarefa->setPrazo('');
        }

        if(isset($_POST['prioridade'])){
            $tarefa->setPrioridade($_POST['prioridade']);
        }

        if(isset($_POST['concluida'])){
            $tarefa->setConcluida(1);
        } else{
            $tarefa->setConcluida(0);
        }
      
        if(!$tem_erros){
            
            $repositorio->salvar($tarefa);
            
            header('Location: tarefa.php');
            die();
        }
       
       
    }
    
   $tarefas = $repositorio->buscar();

   
   
    require_once 'template.php';

