<?php
$bdServidor = '127.0.0.1';
$bdUsuario = 'root';
$bdSenha = 'j4m1l!123';
$bdBanco = 'estacionamento';

$conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco);

if(mysqli_connect_errno($conexao)) {
    echo "Problemas para conectar no banco. Verifique os dados!";
    die();
}

function lista_veiculos($conexao) {
    $sqlBusca = 'SELECT * FROM veiculos';
    $resultado = mysqli_query($conexao, $sqlBusca);
    $veiculos = array();
    while($veiculo = mysqli_fetch_assoc($resultado)) {
        $veiculos[] = $veiculo;
    }
    return $veiculos;
}

function lista_veiculos_por_marca($conexao, $marca){
$sqlBusca = "SELECT * FROM veiculos WHERE marca = '{$marca}'";
    $resultado = mysqli_query($conexao, $sqlBusca);

    $veiculos = array();
    while($veiculo = mysqli_fetch_assoc($resultado)) {
        $veiculos[] = $veiculo;
    }
    return $veiculos;

}

function gravar_veiculo($conexao, $veiculo) {
    $sqlGravar = "
        INSERT INTO veiculos 
        (placa, marca, modelo, hora_entrada, hora_saida)
        VALUES
        (
            '{$veiculo['placa']}',
            '{$veiculo['marca']}',
            '{$veiculo['modelo']}',
            '{$veiculo['hora_entrada']}',
            '{$veiculo['hora_saida']}'
        )
    ";
    mysqli_query($conexao, $sqlGravar);
}