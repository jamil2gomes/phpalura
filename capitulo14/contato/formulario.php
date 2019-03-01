<form method="POST" >
   <input type="hidden" name="id" value="<?=$contato->getId();?>">
    <div class="form-group">
        <label for="nome">Nome</label>

        <?php if ($tem_erros && isset($erros_validacao['nome'])) : ?>
                <span class="erro">
                    <?php echo $erros_validacao['nome']; ?>
                </span>
        <?php endif; ?>

        <input type="text" class="form-control" id="nome" name="nome" value="<?=$contato->getNome();?>">
    </div>

    <div class="form-group">
        <label for="telefone">Telefone</label>

        <?php if ($tem_erros && isset($erros_validacao['telefone'])) :?>
                <span class="erro">
                    <?php echo $erros_validacao['telefone']; ?>
                </span>
        <?php endif; ?>

        <input type="tel" class="form-control" id="telefone" name="telefone" pattern="/\(\d{2}\)\ \d{4}\-\d{4}/" value="<?=$contato->getTelefone();?>" placeholder="(XX)XXXX-XXXX">
    </div>

    <div class="form-group">
        <label for="cep">CEP</label>

        <?php if ($tem_erros && isset($erros_validacao['cep'])) : ?>
                <span class="erro">
                    <?php echo $erros_validacao['cep']; ?>
                </span>
        <?php endif; ?>

        <input type="text" class="form-control" id="cep" name="cep" value="<?=$contato->getCEP();?>" placeholder="XX.XXX-XXX">
    </div>

    <div class="form-group">
        <label for="cpf">CPF</label>

        <?php if ($tem_erros && isset($erros_validacao['cpf'])) : ?>
                <span class="erro">
                    <?php echo $erros_validacao['cpf']; ?>
                </span>
        <?php endif; ?>

        <input type="text" class="form-control" id="cpf" name="cpf" value="<?=$contato->getCPF();?>" placeholder="XXX.XXX.XXX-XX">
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="<?=$contato->getEmail();?>">
    </div>

    <div class="form-group">
        <label for="descricao">Descrição</label>
        <textarea  class="form-control" name="descricao" id="descricao" value="<?=$contato->getDescricao();?>" ></textarea>
    </div>

    <div class="form-group">
        <label for="dataNascimento">Data de Nascimento</label>

        <?php if ($tem_erros && isset($erros_validacao['dataNascimento'])) : ?>
                <span class="erro">
                    <?php echo $erros_validacao['dataNascimento']; ?>
                </span>
        <?php endif;?>

        <input type="text" class="form-control" id="dataNascimento" name="dataNascimento" value="<?=traduz_data_para_exibir($contato->getDtNascimento())?>" placeholder="dd/mm/aaaa">
    </div>

    <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="favorito" name="favorito" value="1"  <?php echo ($contato->getFavorito() == 1) ? 'checked' : '';?>>
      <label class="form-check-label" for="favorito">
        Favorito
      </label>
    </div>
  </div>

   <input type="submit" class="btn btn-success" value="<?php echo ($contato->getId() > 0) ? 'Atualizar' : 'Cadastrar';?>">  
</form><br><br>

