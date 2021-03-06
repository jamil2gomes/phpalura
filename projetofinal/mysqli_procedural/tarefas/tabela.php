
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

        <?php if(isset($lista_tarefas) && is_array($lista_tarefas) && sizeof($lista_tarefas) > 0) : ?>
              <?php foreach($lista_tarefas as $tarefa) : ?>
              
                  <tr>
                      <td> <a href="detalhes-tarefa.php?id=<?=$tarefa['id']?>"><?=$tarefa['nome']?></a></td>
                      <td><?php echo isset($tarefa['descricao']) ? $tarefa['descricao'] : ''; ?></td>
                      <td><?php echo traduz_data_para_exibir($tarefa['prazo']); ?></td>
                      <td><?php echo traduz_prioridade($tarefa['prioridade']); ?></td>
                      <td><?php echo traduz_concluida($tarefa['concluida']); ?></td>
                      <td><a class="btn btn-info btn-block"   href="editar.php?id=<?=$tarefa['id'];?>">Editar</a>
                          <a class="btn btn-danger btn-block" href="remover.php?id=<?=$tarefa['id'];?>">Remover</a>
                      </td>
                  </tr>

              <?php endforeach; ?>
          <?php endif;?>
      </table>
</div>