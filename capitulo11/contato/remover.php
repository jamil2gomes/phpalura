<?php
include "banco.php";

remover_contato($conexao, $_GET['id']);
header('Location: contato.php#tabela');