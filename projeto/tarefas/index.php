<?php

// Incluir as configurações, ajudantes e classes
require "conexao/config.php";
require "conexao/banco.php";
require "helpers/ajudantes.php";
require "models/Tarefa.php";
require "models/Anexo.php";
require "models/TarefaRepositorio.php";

// Criar um objeto da classe RepositorioTarefas
$repositorio_tarefas = new TarefaRepositorio($conexao);

//rota Padrão
$rota = "tarefa";

// Verificar qual arquivo (rota) deve ser usado para tratar a requisição
if (array_key_exists("rota", $_GET)) {
    $rota = (string) $_GET["rota"];
}

// Incluir o arquivo que vai tratar a requisição
if (is_file("controllers/{$rota}.php")) {
    require "controllers/{$rota}.php";
} else {
    echo"Rota não encontrada";
}

