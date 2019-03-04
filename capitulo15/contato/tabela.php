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

            <?php foreach($lista_contatos as $contato) : ?>
                <tr>
                    <td><a href="contato_detalhes.php?id=<?=$contato->getId();?>"><?=htmlentities($contato->getNome());?></a></td>
                    <td><?=htmlentities($contato->getTelefone());?></td>
                    <td><?=htmlentities($contato->getEmail());?></td>
                    <td><?=htmlentities($contato->getDescricao());?></td>
                    <td><?=traduz_data_para_exibir($contato->getDtNascimento())?></td>
                    <td><?=traduz_favorito($contato->getFavorito())?></td>
                    <td><?=htmlentities($contato->getCEP());?></td>
                    <td><?=htmlentities($contato->getCPF());?></td>
                    <td><a class="btn btn-primary" href="editar.php?id=<?=$contato->getId();?>">Editar</a>
                        <a  class="btn btn-danger" href="remover.php?id=<?=$contato->getId();?>">Deletar</a></td>
                </tr>
            <?php endforeach; ?>
       
</div>
</table>