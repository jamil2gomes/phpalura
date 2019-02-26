<?php


function traduz_data_para_banco($data) {
    if ($data == "" ) {
        return "";
    }

    $dados = explode("/", $data);//separa a string recebida em um vetor

    $data_banco = "{$dados[2]}-{$dados[1]}-{$dados[0]}"; //aaa/mm/dd

    return $data_banco;
}


function traduz_data_para_exibir($data) {

    if ($data == "" || $data == "0000-00-00") {
        return "";
    }

    $dados = explode("-", $data);

    $data_exibir = "{$dados[2]}/{$dados[1]}/{$dados[0]}"; //dd/mm/aaaa
    return $data_exibir;
}


function traduz_favorito($favorito) {
    if($favorito == 1) {
        return 'Sim';
    }
    return 'Não';
}