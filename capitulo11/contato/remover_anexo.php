<?php

include 'banco.php';

$anexo = buscar_anexo($conexao, $_GET['id']);

remover_anexo($conexao, $anexo['id']);
unlink('anexos/'. $anexo['arquivo']);
header('Location: contato_detalhes.php?id='.$anexo['contato_id']);