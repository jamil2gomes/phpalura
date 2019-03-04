<?php
    session_start();

    include "banco.php";
    include "ajudantes.php";
    include "classes/Contato.php";
    include "classes/ContatoRepositorio.php";

    $repositorio = new ContatoRepositorio($conexao);
    $contato =  $repositorio->buscar($_GET['id']);

    $exibir_tabela = false;
    $tem_erros = false;
    $erros_validacao = array();

    if (tem_post()) {
       
       
        
        $contato->setId($_POST['id']);

        if (isset($_POST['nome']) && strlen($_POST['nome']) > 0) {
            $contato->setNome($_POST['nome']);
        } else {
            $tem_erros = true;
            $erros_validacao['nome'] = 'O nome do contato é obrigatório!';
        }

        if (isset($_POST['telefone']) && strlen($_POST['telefone']) > 0) {
            if (validar_telefone($_POST['telefone'])) {
                $contato->setTelefone($_POST['telefone']);
            } else {
                $tem_erros = true;
                $erros_validacao['telefone'] = 'O telefone de contato não é válido!';
            }
        }

        if (isset($_POST['cep']) && strlen($_POST['cep']) > 0) {
            if (validar_cep($_POST['cep'])) {
                $contato->setCEP($_POST['cep']);
            } else {
                $tem_erros = true;
                $erros_validacao['cep'] = 'O cep não é válido! Use o padrão XX.XXX-XXX';
            }
        }

        if (isset($_POST['cpf']) && strlen($_POST['cpf']) > 0) {
            if (validar_cpf($_POST['cpf'])) {
                $contato->setCPF($_POST['cpf']);
            } else {
                $tem_erros = true;
                $erros_validacao['cpf'] = 'O cpf não é válido! Use o padrão XXX.XXX.XXX-XX';
            }
        }



         if(isset($_POST['email'])){
             $contato->setEmail($_POST['email']);
          }else{
             $contato->setEmail("");
          } 


          if(isset($_POST['descricao'])){
            $contato->setDescricao($_POST['descricao']);
         }else{
            $contato->setEmail("");
         } 

        if (isset($_POST['dataNascimento']) && strlen($_POST['dataNascimento']) > 0) {
            if (validar_data($_POST['dataNascimento'])) {
                $contato->setDtNascimento(traduz_data_para_banco($_POST['dataNascimento']));
            } else {
                $tem_erros = true;
                $erros_validacao['dataNascimento'] = 'A data informada não é válida!';
            }
        } else {
            $contato->setDtNascimento('');
        }

        if(isset($_POST['favorito'])){
            $contato->setFavorito(1);
         }else{
            $contato->setFavorito(0);
         } 


        
        if (! $tem_erros) {
            $repositorio->atualizar($contato);
            
            header('Location: contato.php#tabela');
            die();
        }
        
    }
    
    include "template.php";