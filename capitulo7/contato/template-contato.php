<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <title>Desafio - Lista de contatos</title>
</head>
<body>
<div class="container">
    <h1>Gerenciador de Contatos</h1>

     <p>Crie um banco chamado  contatos  para guardar os dados dos  contatos  do  desafio  
     iniciado  nos  capítulos  anteriores.Qual  tabela  será  necessária  para  este  banco? 
     Quais camposserão necessários para cadastrar os dados que já estão sendocapturados  pelo 
     formulário?  Não  se  esqueça  de  deixar  umcampo  id  para guardar a chave que identi
     ficará um contatocomo único, assim como foi feito para as tarefas. E se estivercom  
     dificuldades,  procure  ajuda  no  fórum  da  Casa  do Código.</p>
    <p>Esse projeto se refere ao <strong> desafio 2 do capitulo 7</strong></p>

    <form >
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" name="nome">
    </div>

    <div class="form-group">
        <label for="telefone">Telefone</label>
        <input type="text" class="form-control" id="telefone" name="telefone">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>

    <div class="form-group">
        <label for="descricao">Descrição</label>
        <textarea  class="form-control" name="descricao" id="descricao" ></textarea>
    </div>

    <div class="form-group">
        <label for="dataNascimento">Data de Nascimento</label>
        <input type="data" class="form-control" id="dataNascimento" name="dataNascimento" placeholder="dd/mm/aaaa">
    </div>

    <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="favorito" name="favorito" value="1">
      <label class="form-check-label" for="favorito">
        Favorito
      </label>
    </div>
  </div>

   <input type="submit" class="btn btn-success" value="Cadastrar">  
</form><br>

    <div class="row">
        <table class="table table-hover">
            <tr>
                <th class="col-sm-2">Nome</th>
                <th class="col-sm-2">Telefone</th>
                <th class="col-sm-2">Email</th>
                <th class="col-sm-2">Descrição</th>
                <th class="col-sm-2">Data Nascimento</th>
                <th class="col-sm-2">Contato Favorito</th>
            </tr>

            <?php if(isset($lista_contato) && is_array($lista_contato) && sizeof($lista_contato) > 0) : ?>
                <?php foreach($lista_contato as $contato) : ?>
                    <tr>
                        <td><?=$contato['nome']?></td>
                        <td><?=$contato['telefone']?></td>
                        <td><?=$contato['email']?></td>
                        <td><?=$contato['descricao']?></td>
                        <td><?=traduz_data_para_exibir($contato['dataNascimento'])?></td>
                        <td><?=traduz_favorito($contato['favorito'])?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </table>
    </div>
</div>
</body>
</html>