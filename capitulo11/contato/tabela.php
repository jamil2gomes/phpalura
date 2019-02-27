<form class="form-inline" method="POST">
  <input type="hidden" class="form-control mb-2 mr-sm-2"  name="favoritos" value="1">
  <input type="submit" class="btn btn-info mb-2" value= "Favoritos">
</form><br>

<div class="row">
        <table class="table table-hover" id="tabela">
            <tr>
                <th class="col">Nome</th>
                <th class="col">Telefone</th>
                <th class="col">Email</th>
                <th class="col">Descrição</th>
                <th class="col">Dt.Nascimento</th>
                <th class="col">Favorito</th>
                <th class="col">CEP</th>
                <th class="col">CPF</th>
                <th class="col">Opções</th>
            </tr>

        <?php if(isset($lista_contatos) && is_array($lista_contatos) && sizeof($lista_contatos) > 0) : ?>
            <?php foreach($lista_contatos as $contato) : ?>
                <tr>
                    <td><a href="contato_detalhes.php?id=<?=$contato['id']?>"><?=$contato['nome']?></a></td>
                    <td><?=$contato['telefone']?></td>
                    <td><?=$contato['email']?></td>
                    <td><?=$contato['descricao']?></td>
                    <td><?=traduz_data_para_exibir($contato['dataNascimento'])?></td>
                    <td><?=traduz_favorito($contato['favorito'])?></td>
                    <td><?=$contato['cep']?></td>
                    <td><?=$contato['cpf']?></td>
                    <td><a class="btn btn-primary" href="editar.php?id=<?=$contato['id']?>">Editar</a>
                        <a  class="btn btn-danger" href="remover.php?id=<?=$contato['id']?>">Deletar</a></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
</div>
</table>