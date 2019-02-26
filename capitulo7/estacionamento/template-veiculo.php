<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <title>Desafio - Lista de Veiculos</title>
</head>
<body>
<div class="container">
    <h1>Gerenciador de Estacionamento</h1>

     <p> Crie  um  banco  chamado  estacionamento   para  cadastraros  veículos  estacionados.
    Neste  banco,  crie  uma  tabelachamada  veiculos  com os campos  id ,  placa ,  marca , 
    modelo ,  hora_entrada  e  hora_saida .  Decida  os  tipos de dados que devem ser usados
    para cada campo. Cadastre alguns veículos e tente fazer pesquisas, como buscar todos os
    veículos  de  uma  marca,  ou  os  veículos  que  saíram  do estacionamento antes das 14h</p>
    <p>Esse projeto se refere ao <strong> desafio 3 do capitulo 7</strong></p>

    <form >
    <div class="form-group">
        <label for="placa">Placa</label>
        <input type="text" class="form-control" id="placa" name="placa" placeholder="ABC-1234" required>
    </div>

    <div class="form-group">
        <label for="marca">Marca</label>
        <input type="text" class="form-control" id="marca" name="marca" placeholder="Toyota">
    </div>

    <div class="form-group">
        <label for="modelo">Modelo</label>
        <input type="text"  class="form-control" name="modelo" id="modelo" placeholder="Yaris">
    </div>

    <div class="form-group">
        <label for="hora_entrada">Horário de Entrada</label>
        <input type="time" class="form-control" id="hora_entrada" name="hora_entrada" placeholder="00:00:00">
    </div>

    <div class="form-group">
        <label for="hora_saida">Horário de Saída</label>
        <input type="time" class="form-control" id="hora_saida" name="hora_saida" placeholder="00:00:00">
    </div>
    

   <input type="submit" class="btn btn-success" value="Cadastrar">  
</form><br><br>
<form class="form-inline">
  <label class="sr-only" for="marca_procurada">Name</label>
  <input type="text" class="form-control mb-2 mr-sm-2" id="marca_procurada" name="marca_procurada" placeholder="Digite Marca desejada aqui.">
  <input type="submit" class="btn btn-info mb-2" value= "Procurar">
</form><br>

    <div class="row">
    <?php if(isset($lista_veiculos) && is_array($lista_veiculos) && sizeof($lista_veiculos) > 0) : ?>
        <table class="table table-hover">
            <tr>
                <th class="col-sm-2">Placa</th>
                <th class="col-sm-2">Marca</th>
                <th class="col-sm-2">Modelo</th>
                <th class="col-sm-3">Hora Entrada</th>
                <th class="col-sm-3">Hora Saída</th>  
            </tr>
                <?php foreach($lista_veiculos as $veiculo) : ?>
                    <tr>
                        <td><?=$veiculo['placa']?></td>
                        <td><?=$veiculo['marca']?></td>
                        <td><?=$veiculo['modelo']?></td>
                        <td><?=$veiculo['hora_entrada']?></td>
                        <td><?=$veiculo['hora_saida']?></td>
                       
                    </tr>
                <?php endforeach; ?>
        <?php else:?>
            <?php echo "<p>Veiculo não encontrado!</p>";?>
    <?php endif; ?>
        </table>
    </div>
</div>
</body>
</html>