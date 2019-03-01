<?php

include 'banco.php';
require "classes/Anexo.php";
require "classes/TarefaRepositorio.php";
$repositorio_tarefas = new TarefaRepositorio($conexao);
$anexo = $repositorio_tarefas->buscar_anexo($_GET['id']);
$repositorio_tarefas->remover_anexo($anexo->getId());
unlink('anexos/' . $anexo->getArquivo());
header('Location: detalhes-tarefa.php?id=' . $anexo->getTarefa_id());