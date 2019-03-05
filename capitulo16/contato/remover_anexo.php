<?php

include 'banco.php';
include 'classes/Anexo.php';
include 'classes/AnexoRepositorio.php';


$repositorio = new AnexoRepositorio($conexao);
$anexo = $repositorio->buscar_anexo($_GET['id']);

$repositorio->remover_anexo($anexo->getId());

unlink('anexos/'. $anexo->getArquivo());
header('Location: contato_detalhes.php?id='.$anexo->getContato_id());