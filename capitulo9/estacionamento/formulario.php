<form method="POST" >
<input type="hidden" name="id" value="<?=$veiculo['id']?>"/>
    <div class="form-group">
        <label for="placa">Placa</label>

        <?php if ($tem_erros && isset($erros_validacao['placa'])) : ?>
                <span>
                    <?php echo $erros_validacao['placa']; ?>
                </span>
        <?php endif;?>

        <input type="text" class="form-control" id="placa" name="placa" placeholder="ABC-1234" value="<?=$veiculo['placa']?>" required>
    </div>

    <div class="form-group">
        <label for="marca">Marca</label>
        <input type="text" class="form-control" id="marca" name="marca" placeholder="Toyota" value="<?=$veiculo['marca']?>">
    </div>

    <div class="form-group">
        <label for="modelo">Modelo</label>
        <input type="text"  class="form-control" name="modelo" id="modelo" placeholder="Yaris" value="<?=$veiculo['modelo']?>">
    </div>

    <div class="form-group">
        <label for="hora_entrada">Horário de Entrada</label>
        <input type="time" class="form-control" id="hora_entrada" name="hora_entrada" placeholder="00:00:00" value="<?=$veiculo['hora_entrada']?>">
    </div>

    <div class="form-group">
        <label for="hora_saida">Horário de Saída</label>
        <input type="time" class="form-control" id="hora_saida" name="hora_saida" placeholder="00:00:00" value="<?=$veiculo['hora_saida']?>">
    </div>
    

   <input type="submit" class="btn btn-success" value="<?php echo ($veiculo['id'] > 0) ? 'Atualizar' : 'Cadastrar'; ?>">  
</form><br><br>
