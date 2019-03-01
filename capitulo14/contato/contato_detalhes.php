<?php

include "banco.php";
include "ajudantes.php";
include "classes/Anexo.php";
include "classes/AnexoRepositorio.php";
include "classes/ContatoRepositorio.php";
include "classes/Contato.php";


$tem_erros = false;
$erros_validacao = array();
$repositorio_anexo = new AnexoRepositorio($conexao);
$repositorio = new ContatoRepositorio($conexao);
$contato = $repositorio->buscar($_GET['id']);


if (tem_post()) {

    //upload dos anexos
    $contato_id = $_POST['contato_id'];

    $file = $_FILES["anexo"];

    if (!isset($file)) {
        $tem_erros = true;
        $erros_validacao['anexo'] = 'Você deve selecionar um arquivo para anexar';
    } else {
        if (tratar_anexo($file)) {
            $anexo = new Anexo();
            $anexo->setContato_id($contato_id);
            $anexo->setNome(substr($file['name'],0,-4));
            $anexo->setArquivo( $file['name']);
        } else {
            $tem_erros = true;
            $erros_validacao['anexo'] = 'Envie apenas anexos nos formatos jpg, png ou jpeg';
        }
    }
   
   
    
    if (!$tem_erros) {
       $repositorio_anexo->salvar_anexo($anexo);
    }
}

$anexos =$repositorio_anexo->buscar_anexos($contato->getId());


include "detalhe_contato.php";