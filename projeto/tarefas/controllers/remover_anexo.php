<?php

$anexo = $repositorio_tarefas->buscar_anexo($_GET['id']);
$repositorio_tarefas->remover_anexo($anexo->getId());
unlink('anexos/' . $anexo->getArquivo());
header('Location: index.php?rota=detalhes-tarefa&id=' . $anexo->getTarefa_id());