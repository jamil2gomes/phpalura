<?php
 require_once 'config.php';


$conexao = mysqli_connect(BD_SERVIDOR, BD_USUARIO, BD_SENHA, BD_BANCO);

if(mysqli_connect_errno($conexao)){
    echo "Problema ao conectar no banco. Erro: ";
    echo mysqli_connect_error();
    die();
}

//FUNCIONALIDADES DAS TAREFAS
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
    $sql = "DELETE FROM tarefa WHERE id = {$id}";
    mysqli_query($conexao, $sql);
}
//--------------------FIM FUNCIONALIDADES DAS TAREFAS--------------------------

// Funcionalidades do ANEXO
function gravar_anexo($conexao, $anexo){

    $sql = "INSERT INTO anexos (tarefa_id, nome, arquivo)
            VALUES
                    ({$anexo['tarefa_id']},
                    '{$anexo['nome']}',
                    '{$anexo['arquivo']}'
                    )";
     mysqli_query($conexao, $sql);
}

function buscar_anexos($conexao, $tarefa_id){
    $sql = "SELECT * FROM anexos WHERE tarefa_id = {$tarefa_id}";
    $resultado = mysqli_query($conexao, $sql);

    $anexos = [];

    while ($anexo = mysqli_fetch_assoc($resultado)) {
        $anexos[] = $anexo;
    }

    return $anexos;
}

function buscar_anexo($conexao, $id){
    $sql = 'SELECT * FROM anexos WHERE id ='.$id;
    $resultado = mysqli_query($conexao, $sql);
    return mysqli_fetch_assoc($resultado);

}

function remover_anexo($conexao, $id){
    $sql = "DELETE FROM anexos WHERE id = {$id}";
    mysqli_query($conexao, $sql);
}