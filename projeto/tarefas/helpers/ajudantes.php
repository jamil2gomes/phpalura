<?php


function tem_post(){
    if (count($_POST) > 0){
        return true;
    }
return false;
}


//1.0 - Conversão dos campos prioridade e concluída de número para texto.
function traduz_prioridade($codigo){
    $prioridade = '';

    switch ($codigo) {
        case 1:
            $prioridade = 'Baixa';
            break;
        case 2:
            $prioridade = 'Média';
            break;
        case 3:
            $prioridade = 'Alta';
            break;
    }
    return $prioridade;
}

function traduz_concluida($concluida){
    if ($concluida == 1) {
        return'Sim';        
    }
    return'Não';
}
// ------------------------FIM 1.0-----------------------------------





// 2.0 - Funções relacionadas as datas
function validar_data($data){

    $padrao = '/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/';
    $resultado = preg_match($padrao, $data);

    if ($resultado == 0) {
       return false;
    }

    $dados = explode('/', $data);

    $dia = $dados[0];
    $mes = $dados[1];
    $ano = $dados[2];

    $resultado = checkdate($mes, $dia, $ano);

    return $resultado;
}


function traduz_data_para_banco($data){
    if($data==""){
        return "";
    }

    $dados = explode("/",$data);

    if (count($dados) != 3) {
        return $data;
    }
    $objeto_data = DateTime::createFromFormat('d/m/Y', $data);
    return $objeto_data->format('Y-m-d');
}


function traduz_data_para_exibir($data){
    if($data == "" || $data =="0000-00-00"){
        return "";
    }

    $dados = explode("-", $data);

    if (count($dados) != 3) {
        return $data;
    }

    $data_exibir = "{$dados[2]}/{$dados[1]}/{$dados[0]}";
    return $data_exibir;
}
//---------------------------FIM 2.0---------------------------------------


//3.0 - Tratamento de arquivos

function tratar_anexo($anexo){
    $padrao = '/^.+(\.pdf|\.zip)$/';
    $resultado = preg_match($padrao, $anexo['name']);

    if ($resultado == 0) {
        return false;
    }

    move_uploaded_file($anexo['tmp_name'],"anexos/{$anexo['name']}");
    return true;
}

//---------------------------FIM 3.0--------------------------------------

