<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <title>Gerenciador de Tarefas</title>
</head>
<body>
    <div class = "container">
        <h1>Tarefa: <?=$tarefa->getNome();?></h1>
        <p><a class="btn btn-warning btn-sm" href="tarefa.php">Voltar</a></p><hr>

        <p><strong>Concluída:</strong>
            <?=traduz_concluida($tarefa->getConcluida())?>
        </p>

        <p><strong>Descrição:</strong>
            <?=$tarefa->getDescricao();?>
        </p>

        <p><strong>Prazo:</strong>
            <?=traduz_data_para_exibir($tarefa->getPrazo())?>
        </p>

        <p><strong>Prioridade:</strong>
            <?=traduz_prioridade($tarefa->getPrioridade())?>
        </p>

        <h2>Anexos</h2>
        <!-- lista de anexos -->
       
        <?php if(count($tarefa->getAnexos())>0): ?>
          <div class ="row">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="col-sm-8">Arquivo</th>
                        <th class="col-sm-4">Opções</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($tarefa->getAnexos() as $anexo):?>
                    <tr>
                        <td><?=$anexo->getNome();?></td>
                        <td><a class = "btn btn-info " href="anexos/<?=$anexo->getArquivo();?>">Download</a>
                        <a class = "btn btn-danger " href="remover_anexo.php?id=<?=$anexo->getId();?>">Remover</a></td>

                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
            <p>Não há anexos para esta tarefa.</p>
        <?php endif;?>


        <form action=""  method="POST"enctype="multipart/form-data">
            <fieldset>
                <legend>Novo Anexo</legend>
                <input type="hidden" name="tarefa_id" value="<?=$tarefa->getId();?>">

                <label for="">
                    <?php if( $tem_erros && array_key_exists('anexo', $erros_validacao)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?=$erros_validacao['anexo'];?>
                        </div>
                <?php endif; ?>
                 <div class="form-group">
                     <input type="file"class="form-control-file"  accept=".zip,.pdf" name="anexo">
                 </div>
                </label>
                <input class = "btn btn-success btn-sm" type="submit" value="Cadastrar">
            </fieldset>
        </form>
    </div>
</body>
</html>