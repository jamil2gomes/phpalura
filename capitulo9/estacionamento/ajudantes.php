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