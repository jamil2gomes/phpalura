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
        <h1>Tarefa: <?=$tarefa['nome']?></h1>
        <p><a class="btn btn-warning btn-sm" href="tarefa.php">Voltar</a></p><hr>

        <p><strong>Concluída:</strong>
            <?=traduz_concluida($tarefa['concluida'])?>
        </p>

        <p><strong>Descrição:</strong>
            <?=$tarefa['descricao']?>
        </p>

        <p><strong>Prazo:</strong>
            <?=traduz_data_para_exibir($tarefa['prazo'])?>
        </p>

        <p><strong>Prioridade:</strong>
            <?=traduz_prioridade($tarefa['prioridade'])?>
        </p>

        <h2>Anexos</h2>
        <!-- lista de anexos -->
       
        <?php if(count($anexos)>0): ?>
          <div class ="row">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="col-sm-8">Arquivo</th>
                        <th class="col-sm-4">Opções</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($anexos as $anexo):?>
                    <tr>
                        <td><?=$anexo['nome']?></td>
                        <td><a class = "btn btn-info " href="anexos/<?=$anexo['arquivo']?>">Download</a>
                        <a class = "btn btn-danger " href="remover_anexo.php?id=<?=$anexo['id']?>">Remover</a></td>

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
                <input type="hidden" name="tarefa_id" value="<?=$tarefa['id']?>">

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