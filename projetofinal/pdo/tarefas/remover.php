<?php
require "banco.php";
require "classes/TarefaRepositorio.php";

$repositorio_tarefas = new TarefaRepositorio($conexao);
$repositorio_tarefas->remover($_GET['id']);

header('Location: tarefa.php#tabela');
die();