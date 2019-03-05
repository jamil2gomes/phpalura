<?php

$tem_erros = false;
$erros_validacao = [];

if (tem_post()) {
    // upload dos anexos
    $tarefa_id = $_POST['tarefa_id'];

        if(! array_key_exists('anexo', $_FILES)){
            $tem_erros = true;
            $erros_validacao['anexo'] ='Você deve selecionar um arquivo para anexar';
        }
        else{
                $dados_anexo  = $_FILES['anexo'];

                if (tratar_anexo($dados_anexo)) {
                   $anexo = new Anexo();
                   $anexo->setTarefa_id($tarefa_id);
                   $anexo->setNome( substr($dados_anexo['name'],0,-4) ); //nome do arquivo menos a extensão
                   $anexo->setArquivo($dados_anexo['name']);//nome do arquivo com a extensao
                 
                }else{
                    $tem_erros = true;
                    $erros_validacao['anexo'] ='Envie anexos nos formatos zip ou pdf';
                }
            }

    if(! $tem_erros) { 
       $repositorio_tarefas->salvar_anexo($anexo);
    }
}

$tarefa = $repositorio_tarefas->buscar($_GET['id']);

require __DIR__ . "/../views/template_detalhe_tarefa.php";