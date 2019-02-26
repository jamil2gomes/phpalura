<?php
    session_start();

    include 'banco.php';
    include 'ajudantes.php';



    if((isset($_GET['nome']) && $_GET['nome'] != '') && (isset($_GET['telefone']) && $_GET['telefone'] != '')){
        $contato = array();
        $contato['nome'] = $_GET['nome'];
        $contato['telefone'] = $_GET['telefone'];

        $contato['email'] = isset($_GET['email'])? $_GET['email']:'';

        $contato['descricao'] = isset($_GET['descricao'])? $_GET['descricao']:'';

        $contato['dataNascimento'] = (isset($_GET['dataNascimento']))? traduz_data_para_banco($_GET['dataNascimento']):'';

        $contato['favorito'] = (isset($_GET['favorito']))? $_GET['favorito']:0;
        
        gravar_contato($conexao,$contato);
    }


    $lista_contato = buscar_contatos($conexao);

    include "template-contato.php";