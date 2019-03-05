
<div class="row">
      <table class="table table-hover" id="tabela">
      <thead >
          <tr>
              <th class="col-sm-2">Tarefa</th>
              <th class="col-sm-2">Descrição</th>
              <th class="col-sm-2">Prazo</th>
              <th class="col-sm-2">Prioridade</th>
              <th class="col-sm-2">Concluída</th>
              <th class="col-sm-2">Opções</th>
          </tr>
      </thead>

       
              <?php foreach($tarefas as $tarefa) : ?>
                  <tr>
                      <td> <a href="index.php?rota=detalhes-tarefa&id=<?=$tarefa->getId()?>"><?=htmlentities($tarefa->getNome());?></a></td>
                      <td><?=htmlentities($tarefa->getDescricao()); ?></td>
                      <td><?=traduz_data_para_exibir($tarefa->getPrazo()); ?></td>
                      <td><?=traduz_prioridade($tarefa->getPrioridade()); ?></td>
                      <td><?=traduz_concluida($tarefa->getConcluida()); ?></td>
                      <td><a class="btn btn-info btn-block"   href="index.php?rota=editar&id=<?=$tarefa->getId()?>">Editar</a>
                          <a class="btn btn-danger btn-block" href="index.php?rota=remover&id=<?=$tarefa->getId()?>">Remover</a>
                      </td>
                  </tr>
              <?php endforeach; ?>
      </table>
</div>