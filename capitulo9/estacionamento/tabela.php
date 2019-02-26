<form class="form-inline">
  <input type="text" class="form-control mb-2 mr-sm-2" id="data_procurada" name="data_procurada" placeholder="dd/mm/aaaa">
  <input type="submit" class="btn btn-info mb-2" value= "Filtrar">
</form><br>
    <div class="row">
    <?php if(isset($lista_veiculos) && is_array($lista_veiculos) && sizeof($lista_veiculos) > 0) : ?>
        <table class="table table-hover">
            <tr>
                <th class="col-sm-2">Placa</th>
                <th class="col-sm-2">Marca</th>
                <th class="col-sm-2">Modelo</th>
                <th class="col-sm-1">Hora Entrada</th>
                <th class="col-sm-1">Hora Saída</th>
                <th class="col-sm-2">Data</th>
                <th class="col-sm-2">Opções</th>  
            </tr>
                <?php foreach($lista_veiculos as $veiculo) : ?>
                    <tr>
                        <td><?=$veiculo['placa']?></td>
                        <td><?=$veiculo['marca']?></td>
                        <td><?=$veiculo['modelo']?></td>
                        <td><?=$veiculo['hora_entrada']?></td>
                        <td><?=$veiculo['hora_saida']?></td>
                        <td><?=traduz_data_para_exibir($veiculo['data'])?></td>
                        <td><a class="btn btn-primary" href="editar.php?id=<?=$veiculo['id']?>">Editar</a>
                        <a class="btn btn-danger" href="remover.php?id=<?=$veiculo['id']?>">Deletar</a></td>
                       
                    </tr>
                <?php endforeach; ?>
        <?php else:?>
            <?php echo "<p>Veiculo não encontrado!</p>";?>
    <?php endif; ?>
        </table>
    </div>