
<div class="row">
    <div class="col-md-12">
      <table class="table table-hover">
      <thead >
          <tr>
              <th class="col">Tarefa</th>
              <th class="col">Descrição</th>
              <th class="col">Prazo</th>
              <th class="col">Prioridade</th>
              <th class="col">Concluída</th>
              <th class="col">Opções</th>
          </tr>
      </thead>

        <?php if(isset($lista_tarefas) && is_array($lista_tarefas) && sizeof($lista_tarefas) > 0) : ?>
              <?php foreach($lista_tarefas as $tarefa) : ?>
              
                  <tr>
                      <td><?php echo isset($tarefa['nome']) ? $tarefa['nome'] : ''; ?></td>
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
  </div>