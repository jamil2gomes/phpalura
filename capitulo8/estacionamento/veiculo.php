<?php 
    session_start();

    include "banco.php";

    if(isset($_GET['placa']) && $_GET['placa'] != "") {
        $veiculo = array();
        $veiculo['placa'] = $_GET['placa'];

       
        $veiculo['marca'] = (isset($_GET['marca']))? $_GET['marca']:"";
        
        $veiculo['modelo'] = (isset($_GET['modelo']))? $_GET['modelo']:"";
       
        $veiculo['hora_entrada'] = (isset($_GET['hora_entrada']))?$_GET['hora_entrada']:"";
      
        $veiculo['hora_saida'] = (isset($_GET['hora_saida']))? $_GET['hora_saida']:"";
       
        gravar_veiculo($conexao, $veiculo);
    }

    if(isset($_GET['marca_procurada']) && $_GET['marca_procurada'] != "") {
        $marca_procurada = $_GET['marca_procurada'];
        
        $lista_veiculos = lista_veiculos_por_marca($conexao,  $marca_procurada);
    }else{
        $lista_veiculos = lista_veiculos($conexao);
    }
  
    
    include "template-veiculo.php";