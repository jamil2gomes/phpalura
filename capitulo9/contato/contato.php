<?php
    session_start();

    include "banco.php";
    include "ajudantes.php";

    $exibir_tabela = true;
    $tem_erros = false;
    $erros_validacao = [];


    if (tem_post()) {
        
        $contato = array(); 

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
        
        if(! $tem_erros) {
            gravar_contato($conexao, $contato);
            
            header('Location: contato.php');
            die();
        }
    }

    if (isset($_POST["favoritos"])){
        $lista_contatos = buscar_favoritos($conexao);
    }else{
        $lista_contatos = buscar_contatos($conexao);

    }
   
    //Limpando os campos do formulario
    $contato = array(
        'id' => 0,
        'nome' => (isset($_POST['nome'])) ? $_POST['nome'] : '',
        'telefone' => (isset($_POST['telefone'])) ? $_POST['telefone'] : '',
        'email' => (isset($_POST['email'])) ? $_POST['email'] : '',
        'descricao' => (isset($_POST['descricao'])) ? $_POST['descricao'] : '',
        'dataNascimento' => (isset($_POST['dataNascimento'])) ? $_POST['dataNascimento'] : '',
        'favorito' => (isset($_POST['favorito'])) ? $_POST['favorito'] : ''
    );
    
    include "template.php";


