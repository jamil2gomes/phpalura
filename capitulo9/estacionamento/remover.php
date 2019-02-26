<?php
include "banco.php";

remover_veiculo($conexao, $_GET['id']);

header('Location: veiculo.php');
die();