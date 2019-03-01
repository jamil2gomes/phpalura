<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <title>Gerenciador de Contato</title>
</head>
<body>
    <div class = "container">
        <h1>Contato: <?=$contato->getNome();?></h1>
        <p><a class="btn btn-warning btn-sm" href="contato.php">Voltar</a></p><hr>

        <p><strong>Telefone:</strong>
            <?= $contato->getTelefone();?>
        </p>

        <p><strong>Email:</strong>
            <?=$contato->getEmail();?>
        </p>

        <p><strong>Data Nascimento:</strong>
            <?=traduz_data_para_exibir($contato->getDtNascimento())?>
        </p>

        <p><strong>Descrição:</strong>
            <?=$contato->getDescricao();?>
        </p>

        <p>
        <strong>Contato favorito:</strong>
        <?=traduz_favorito($contato->getFavorito()); ?>
        </p>

        <h2>Anexos</h2>
        <!-- lista de anexos -->
       
        <?php if(count($anexos)>0): ?>
          <div class ="row">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="col-sm-8">Foto</th>
                        <th class="col-sm-4">Opções</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($anexos as $anexo):?>
                    <tr>
                    <td><img class="img_table" src="anexos/<?=$anexo->getArquivo();?>"></td>
                        <td><a class = "btn btn-info " href="anexos/<?=$anexo->getArquivo();?>">Download</a>
                        <a class = "btn btn-danger " href="remover_anexo.php?id=<?=$anexo->getId();?>">Remover</a></td>

                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php else: ?>
            <p>Não há fotos para este contato.</p>
        <?php endif;?>


        <form action=""  method="POST"enctype="multipart/form-data">
            <fieldset>
                <legend>Nova Foto</legend>
                <input type="hidden" name="contato_id" value="<?=$contato->getId();?>">

                <label for="">
                    <?php if( $tem_erros && array_key_exists('anexo', $erros_validacao)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?=$erros_validacao['anexo'];?>
                        </div>
                <?php endif; ?>
                 <div class="form-group">
                     <input type="file" class="form-control-file"  accept=".jpg,.png, .jpeg" name="anexo">
                 </div>
                </label>
                <input class = "btn btn-success btn-sm" type="submit" value="Cadastrar">
            </fieldset>
        </form>
    </div>
</body>
</html>