<?php
    session_start();

    include "banco.php";
    include "ajudantes.php";

    $exibir_tabela = false;
    $tem_erros = false;
    $erros_validacao = array();

    if (tem_post()) {
       
        $contato = array();
        
        $contato['id'] = $_POST['id'];

        if (isset($_POST['nome']) && strlen($_POST['nome']) > 0) {
            $contato['nome'] = $_POST['nome'];
        } else {
            $tem_erros = true;
            $erros_validacao['nome'] = 'O nome do contato é obrigatório!';
        }

        if (isset($_POST['telefone']) && strlen($_POST['telefone']) > 0) {
            if (validar_telefone($_POST['telefone'])) {
                $contato['telefone'] = $_POST['telefone'];
            } else {
                $tem_erros = true;
                $erros_validacao['telefone'] = 'O telefone de contato não é válido!';
            }
        }

        if (isset($_POST['cep']) && strlen($_POST['cep']) > 0) {
            if (validar_cep($_POST['cep'])) {
                $contato['cep'] = $_POST['cep'];
            } else {
                $tem_erros = true;
                $erros_validacao['cep'] = 'O cep não é válido! Use o padrão XX.XXX-XXX';
            }
        }

        if (isset($_POST['cpf']) && strlen($_POST['cpf']) > 0) {
            if (validar_cpf($_POST['cpf'])) {
                $contato['cpf'] = $_POST['cpf'];
            } else {
                $tem_erros = true;
                $erros_validacao['cpf'] = 'O cpf não é válido! Use o padrão XXX.XXX.XXX-XX';
            }
        }



         $contato['email'] = (isset($_POST['email'])) ? $_POST['email'] : "";
        
         $contato['descricao'] = (isset($_POST['descricao'])) ? $_POST['descricao'] : "";


        if (isset($_POST['dataNascimento']) && strlen($_POST['dataNascimento']) > 0) {
            if (validar_data($_POST['dataNascimento'])) {
                $contato['dataNascimento'] = traduz_data_para_banco($_POST['dataNascimento']);
            } else {
                $tem_erros = true;
                $erros_validacao['dataNascimento'] = 'A data informada não é válida!';
            }
        } else {
            $contato['dataNascimento'] = '';
        }

        $contato['favorito'] = (isset($_POST['favorito'])) ? 1 : 0;


        
        if (! $tem_erros) {
            editar_contato($conexao, $contato);
            
            header('Location: contato.php#tabela');
            die();
        }
        
    }
    $contato = buscar_contato($conexao, $_GET['id']);
    
    include "template.php";