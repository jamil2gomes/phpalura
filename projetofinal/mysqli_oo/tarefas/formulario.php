
  
            <?php if( $tem_erros && array_key_exists('nome', $erros_validacao)): ?>
                <div class="alert alert-danger" role="alert">
                    <?=$erros_validacao['nome'];?>
                </div>
            <?php endif; ?>
            <?php if( $tem_erros && array_key_exists('prazo', $erros_validacao)): ?>
                <div class="alert alert-danger" role="alert">
                    <?=$erros_validacao['prazo'];?>
                </div>
            <?php endif; ?>
<span>* campo obrigatório</span>     
<form method="POST">
    <input type="hidden" name="id" value="<?=$tarefa->getId(); ?>" />
   
    <div class="form-group">
       
        <label for="nome">Nome *</label>
        
        <input type="text" class="form-control is-valid"  name="nome"  value="<?=$tarefa->getNome(); ?>" >
    </div>

    <div class="form-group">
        <label for="prazo">Prazo</label>
        <input type="text" class="form-control " placeholder="Ex.: dd/mm/aaaa"  name ="prazo"  value="<?=traduz_data_para_exibir($tarefa->getPrazo()); ?>"  >
    </div>

    <div class="form-group">
        <label for="descricao">Descrição</label>
        <textarea class="form-control is-invalid" id="validationTextarea" name="descricao"  value="<?=$tarefa->getDescricao(); ?>" ></textarea>
    </div>

    <fieldset class="form-group">
    <div class="row">
        <legend >Prioridade</legend>
        <div class="col-sm-10">
        <div class="form-check">
            <input class="form-check-input" type="radio" name="prioridade" id="gridRadios1" value="1" <?php echo ($tarefa->getPrioridade()==1)?'checked':''?>>
            <label class="form-check-label" for="gridRadios1">
            Baixa
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="prioridade" id="gridRadios2" value="2" <?php echo ($tarefa->getPrioridade()==2)?'checked':'' ?>>
            <label class="form-check-label" for="gridRadios2">
            Média
            </label>
        </div>
        <div class="form-check ">
            <input class="form-check-input" type="radio" name="prioridade" id="gridRadios3" value="3"<?php echo ($tarefa->getPrioridade()==3)?'checked':'' ?> >
            <label class="form-check-label" for="gridRadios3">
            Alta
            </label>
        </div>
        </div>
    </div>
    </fieldset>

    <div class="form-group">
    <div class="form-check">
        Concluída: <input  type="checkbox" value="1" name="concluida" <?php echo ($tarefa->getConcluida()==1)?'checked':'' ?>>
    </div>
    </div>

 <input type="submit" class="btn btn-success btn-block" value="<?php echo ($tarefa->getId() > 0) ? 'Atualizar' : 'Cadastrar'; ?>">
</form>
