<?php
include "banco.php";
include "ajudantes.php";

$tem_erros = false;
$erros_validacao = array();

if (tem_post()) {

    //upload dos anexos
    $contato_id = $_POST['contato_id'];

    $file = $_FILES["anexo"];

    if (!isset($file)) {
        $tem_erros = true;
        $erros_validacao['anexo'] = 'Você deve selecionar um arquivo para anexar';
    } else {
        if (tratar_anexo($file)) {
            $anexo = array();
            $anexo['contato_id'] = $contato_id;
            $anexo['nome'] = $file['name'];
            $anexo['arquivo'] = $file['name'];
        } else {
            $tem_erros = true;
            $erros_validacao['anexo'] = 'Envie apenas anexos nos formatos jpg, png ou jpeg';
        }
    }
    if (!$tem_erros) {
        gravar_anexo($conexao, $anexo);
    }
}

$contato = buscar_contato($conexao, $_GET['id']);
$anexos = buscar_anexos($conexao, $_GET['id']);

include "detalhe_contato.php";