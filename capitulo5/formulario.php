

<form>
    <input type="hidden" name="id" value="<?=$tarefa['id']; ?>" />

    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control is-valid"  name="nome"  value="<?=$tarefa['nome']; ?>"  required>
    </div>

    <div class="form-group">
        <label for="prazo">Prazo</label>
        <input type="text" class="form-control is-invalid"   name ="prazo"  value="<?=traduz_data_para_exibir($tarefa['prazo']); ?>"  >
    </div>

    <div class="form-group">
        <label for="descricao">Descrição</label>
        <textarea class="form-control is-invalid" id="validationTextarea" name="descricao"  value="<?=$tarefa['descricao']; ?>" ></textarea>
    </div>

    <fieldset class="form-group">
    <div class="row">
        <legend >Prioridade</legend>
        <div class="col-sm-10">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="prioridade" id="gridRadios1" value="1" <?php echo ($tarefa['prioridade']==1)?'checked':''?>>
            <label class="form-check-label" for="gridRadios1">
            Baixa
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="prioridade" id="gridRadios2" value="2" <?php echo ($tarefa['prioridade']==2)?'checked':'' ?>>
            <label class="form-check-label" for="gridRadios2">
            Média
            </label>
        </div>
        <div class="form-check ">
            <input class="form-check-input" type="radio" name="prioridade" id="gridRadios3" value="3"<?php echo ($tarefa['prioridade']==3)?'checked':'' ?> >
            <label class="form-check-label" for="gridRadios3">
            Alta
            </label>
        </div>
        </div>
    </div>
    </fieldset>

    <div class="form-group">
    <div class="form-check">
        Concluída: <input  type="checkbox" value="1" name="concluida" <?php echo ($tarefa['concluida']==1)?'checked':'' ?>>
    </div>
    </div>
 <input type="submit" class="btn btn-success btn-block" value="<?php echo ($tarefa['id'] > 0) ? 'Atualizar' : 'Cadastrar'; ?>">
</form>
  