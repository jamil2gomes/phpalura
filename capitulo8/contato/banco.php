<?php

$bdServidor = '127.0.0.1';
$bdUsuario = 'root';
$bdSenha = 'j4m1l!123';
$bdBanco = 'contatos';


$conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco);

if (mysqli_connect_errno($conexao)) {
    echo "Problemas para conectar no banco. Verifique os dados!";
    die();
}


function buscar_contatos($conexao){

    $sql= 'SELECT * FROM contatos';
    $resultado = mysqli_query($conexao, $sql);
    $contatos = array();
    while ($contato = mysqli_fetch_assoc($resultado)) {
        $contatos[] = $contato;
    }
    return $contatos;
}


function gravar_contato($conexao, $contato) {
    $sql = "
        INSERT INTO contatos
        (nome, telefone, email, descricao, dataNascimento, favorito)
        VALUES(
        '{$contato['nome']}',
        '{$contato['telefone']}',
        '{$contato['email']}',
        '{$contato['descricao']}',
        '{$contato['dataNascimento']}',
        '{$contato['favorito']}'
        )
    ";
    mysqli_query($conexao, $sql);
}