<?php
include "banco.php";
include "classes/Contato.php";
include "classes/ContatoRepositorio.php";

$repositorio = new ContatoRepositorio($conexao);
$repositorio->remover($_GET['id']);

header('Location: contato.php#tabela');
die();