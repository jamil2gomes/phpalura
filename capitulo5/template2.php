<?php require_once 'tarefa2.php';
      require_once "ajudantes.php";?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gerenciador de tarefas</title>
    <link rel="stylesheet" href="style.css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class ="container">
    <h1>Gerenciador de tarefas</h1>

    <form>
  <div class="form-group">
      <label for="nome">Nome</label>
      <input type="text" class="form-control is-valid"  name="nome"  required>
    </div>

    <div class="form-row">
   
      <label for="prazo">Prazo</label>
      <input type="text" class="form-control is-invalid"   name ="prazo"  >
    </div>
 
    <div class="form-group">
    <label for="descricao">Descrição</label>
    <textarea class="form-control is-invalid" id="validationTextarea" name="descricao"  ></textarea>
    </div>



  <fieldset class="form-group">
    <div class="row">
      <legend >Prioridade</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="prioridade" id="gridRadios1" value="1" checked>
          <label class="form-check-label" for="gridRadios1">
            Baixa
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="prioridade" id="gridRadios2" value="2">
          <label class="form-check-label" for="gridRadios2">
            Média
          </label>
        </div>
        <div class="form-check ">
          <input class="form-check-input" type="radio" name="prioridade" id="gridRadios3" value="3" >
          <label class="form-check-label" for="gridRadios3">
            Alta
          </label>
        </div>
      </div>
    </div>
  </fieldset>

  <div class="form-group">
    <div class="form-check">
      Concluída: <input  type="checkbox" value="sim" name="concluida" >
    </div>
  </div>
  <input type="submit" class="btn btn-success btn-block" value="Salvar">
</form>
    <br><br>
    <hr>

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
        </tr>
    </thead>

       <?php if(isset($lista_tarefas) && is_array($lista_tarefas) && sizeof($lista_tarefas) > 0) : ?>
            <?php foreach($lista_tarefas as $tarefa) : ?>
            
                <tr>
                    <td><?php echo isset($tarefa['nome']) ? $tarefa['nome'] : ''; ?></td>
                    <td><?php echo isset($tarefa['descricao']) ? $tarefa['descricao'] : ''; ?></td>
                    <td><?php echo isset($tarefa['prazo']) ? $tarefa['prazo'] : ''; ?></td>
                    <td><?php echo traduz_prioridade($tarefa['prioridade']); ?></td>
                    <td><?php echo isset($tarefa['concluida']) ? $tarefa['concluida'] : ''; ?></td>
                </tr>

            <?php endforeach; ?>
        <?php endif;?>
    </table>
</div>
</div>
</div>
</body>
</html>