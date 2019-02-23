<?php

$bdServidor = '127.0.0.1';
$bdUsuario = 'root';
$bdSenha = 'j4m1l!123';
$bdBanco = 'tarefas';

$conexao = mysqli_connect($bdServidor,$bdUsuario,$bdSenha,$bdBanco);

if(mysqli_connect_errno($conexao)){
    echo "Problema ao conectar no banco. Erro: ";
    echo mysqli_connect_error();
    die();
}

function buscar_tarefas($conexao){
    $sql = "SELECT * FROM tarefa";

    $resultado = mysqli_query($conexao, $sql);

    $tarefas =[];
    while ($tarefa = mysqli_fetch_assoc($resultado)) {
        $tarefas[]=$tarefa;
    }
    return $tarefas;
}

function gravar_tarefa($conexao,$tarefa){
    $sql = "INSERT INTO tarefa (nome, descricao, prioridade, prazo, concluida)
    VALUES (
                '{$tarefa['nome']}',
                '{$tarefa['descricao']}',
                {$tarefa['prioridade']},
                '{$tarefa['prazo']}',
                {$tarefa['concluida']}
            )";

    mysqli_query($conexao,$sql);
}

function buscar_tarefa($conexao, $id){
    $sql = 'SELECT * FROM tarefa WHERE id ='.$id;
    $resultado = mysqli_query($conexao, $sql);
    return mysqli_fetch_assoc($resultado);

}

function editar_tarefa($conexao, $tarefa){
    $sql = "UPDATE tarefa SET 
    nome = '{$tarefa['nome']}',
    descricao = '{$tarefa['descricao']}',
    prioridade = {$tarefa['prioridade']},
    prazo = '{$tarefa['prazo']}',
    concluida = {$tarefa['concluida']}
    WHERE id = {$tarefa['id']}";

    mysqli_query($conexao, $sql);
}

function remover_tarefa($conexao, $id){
    $sql = "DELETE FROM tarefas WHERE id = {$id}";
    mysqli_query($conexao, $sqlRemover);
}