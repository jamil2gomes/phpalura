<?php

function tem_post() {
    if (count($_POST) > 0) {
        return true;
    }
    return false;
}

function validar_placa($placa) {

    $padrao = '/^[a-zA-Z]{3}\-[0-9]{4}$/'; //ABC-1234

    $resultado = preg_match($padrao, $placa);
    
    return $resultado;
}

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
