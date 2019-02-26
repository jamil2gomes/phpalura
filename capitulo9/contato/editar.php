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