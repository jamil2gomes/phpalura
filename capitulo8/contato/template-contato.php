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

     <p>Atualize  a  função   traduz_data_para_banco()   paratambém trabalhar com a classe
    DateTime , e fazer o retorno usando a função  format() . Continue  a  lista  de  
    contatos  dos  desafios  anteriores,  masagora passando a guardar os dados em um
    banco de dados.Utilize todos os conceitos vistos até aqui, como a separação em 
    arquivos,  o  uso  de  ajudantes  e  o  uso  das  funções mysqli_  do PHP para lidar
    com o banco de dados.</p>
    <p>Esse projeto se refere ao <strong> desafio 1 e 2 do capitulo 8</strong></p>

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