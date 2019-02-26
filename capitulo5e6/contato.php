<?php
    session_start();

    if((isset($_GET['nome']) && $_GET['nome'] != '') && (isset($_GET['telefone']) && $_GET['telefone'] != '')){
        $contato = array();
        $contato['nome'] = $_GET['nome'];
        $contato['telefone'] = $_GET['telefone'];

        $contato['email'] = isset($_GET['email'])? $_GET['email']:'';

        $contato['descricao'] = isset($_GET['descricao'])? $_GET['descricao']:'';

        $contato['dtNascimento'] = isset($_GET['dtNascimento'])? $_GET['dtNascimento']:'';

        $contato['favorito'] = isset($_GET['favorito'])? $_GET['favorito']:'Não';
        
        $_SESSION['lista_contato'][] = $contato;
    }


    if(isset($_SESSION['lista_contato'])){
        $lista_contato = $_SESSION['lista_contato'];
    }else{
        $lista_contato = array();
    }

    include "template.php";