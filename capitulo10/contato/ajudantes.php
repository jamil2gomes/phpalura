<?php

function traduz_data_para_banco($data) {

    if ($data == "" ) {
        return "";
    }

    $dados = explode("/", $data);

    if (count($dados) != 3) {
        return $data;
    }

    $data_mysql = "{$dados[2]}-{$dados[1]}-{$dados[0]}";

    return $data_mysql;
}


function traduz_data_para_exibir($data) {

    if ($data == "" || $data == "0000-00-00") {
        return "";
    }

    $dados = explode("-", $data);

    if (count($dados) != 3) {
        return $data;
    }

    $data_exibir = "{$dados[2]}/{$dados[1]}/{$dados[0]}";

    return $data_exibir;
}


function traduz_favorito($favorito) {
    if($favorito == 1) {
        return 'Sim';
    }
    return 'Não';
}


function tem_post() {
    if (count($_POST) > 0) {
        return true;
    }
    return false;
}

function validar_telefone($telefone) {

    $padrao = '/^\([0-9]{2}\)[0-9]{4}\-[0-9]{4}$/'; // (xx)xxxx-xxxx

    $resultado = preg_match($padrao, $telefone);

    return $resultado;
}


function validar_data($data) {

    $padrao = '/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/'; // dd/mm/aaaa

    $resultado = preg_match($padrao, $data);

    if (! $resultado) {
        return false;
    }

    $dados = explode('/', $data);

    $dia = $dados[0];
    $mes = $dados[1];
    $ano = $dados[2];

    $resultado = checkdate($mes, $dia, $ano);

    return $resultado;
}

function validar_cpf($cpf){
    $padrao = '/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/'; //000.000.000-00
    $resultado = preg_match($padrao, $cpf);
    return $resultado;
}

function validar_cep($cep){
    $padrao = '/^\d{2}\.\d{3}\-\d{3}$/';//00.000-000
    $resultado = preg_match($padrao, $cep);
    return $resultado;

}
