<?php
   

    include "banco.php";
    include "ajudantes.php";
    include "classes/Contato.php";
    include "classes/ContatoRepositorio.php";

    $repositorio = new ContatoRepositorio($conexao);

    $exibir_tabela = true;
    $tem_erros = false;
    $erros_validacao = [];

    $contato = new Contato();
    if (tem_post()) {
        
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
                $erros_validacao['telefone'] = 'O telefone de contato não é válido! Use o padrão (XX)XXXX-XXXX';
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
        
        if(isset($_POST['email'])) {
            $contato->setEmail($_POST['email']);
        }
        else{
            $contato->setEmail("");
        }
        
       if(isset($_POST['descricao'])){
            $contato->setDescricao($_POST['descricao']);
        }
       else{
        $contato->setDescricao("");
    }

       
        if (isset($_POST['dataNascimento']) && strlen($_POST['dataNascimento']) > 0) {
            if (validar_data($_POST['dataNascimento'])) {
               $contato->setDtNascimento( traduz_data_para_banco($_POST['dataNascimento']) );
            } else {
                $tem_erros = true;
                $erros_validacao['dataNascimento'] = 'A data informada não é válida!';
            }
        } else {
           $contato->setDtNascimento('');
        }
        
        if(isset($_POST['favorito'])) {
            $contato->setFavorito(1);
        }
       else{
        $contato->setFavorito(0);
        }
       
       
        
        if(! $tem_erros) {
           
            $repositorio->salvar($contato);
            
            header('Location: contato.php');
            die();
        }
    }

    if (isset($_POST["favoritos"])){
       $lista_contatos = $repositorio->buscaFavoritos();
    }else{
    $lista_contatos = $repositorio->buscar();

    }
   
  
    include "template.php";


