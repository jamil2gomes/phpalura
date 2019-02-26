<?php 
    session_start();

    include "banco.php";
    include "ajudantes.php";

    $exibir_tabela = true;
    $tem_erros = false;
    $erros_validacao = array();

    if(tem_post()) {
       
        $veiculo = array();
    
        if (isset($_POST['placa']) && strlen($_POST['placa']) > 0) {
            if (validar_placa($_POST['placa'])) {
                $veiculo['placa'] = $_POST['placa'];
            } else {
                $tem_erros = true;
                $erros_validacao['placa'] = 'A placa informada é inválida!';
            }
        } else {
            $tem_erros = true;
            $erros_validacao['placa'] = 'A placa informada é inválida!';
        }
        

        $veiculo['marca'] = (isset($_POST['marca'])) ? $_POST['marca'] : "";
       
    
        $veiculo['modelo'] = (isset($_POST['modelo'])) ? $_POST['modelo'] : "";
      
    
        $veiculo['hora_entrada'] = (isset($_POST['hora_entrada'])) ? $_POST['hora_entrada'] : "";
       

        $veiculo['hora_saida'] = (isset($_POST['hora_saida'])) ? $_POST['hora_saida'] : "";
      
        
        if (! $tem_erros) {
            gravar_veiculo($conexao, $veiculo);
            
            header('Location: veiculo.php');
            die();
        }

    }

    if(isset($_GET['marca_procurada']) && $_GET['marca_procurada'] != "") {
        $marca_procurada = $_GET['marca_procurada'];
        
        $lista_veiculos = lista_veiculos_por_marca($conexao,  $marca_procurada);
    }else{
        $lista_veiculos = lista_veiculos($conexao);
    }


    $veiculo = array(
        'id' => 0,
        'placa' => (isset($_POST['placa'])) ? $_POST['placa'] : '',
        'marca' => (isset($_POST['marca'])) ? $_POST['marca'] : '',
        'modelo' => (isset($_POST['modelo'])) ? $_POST['modelo'] : '',
        'hora_entrada' => (isset($_POST['hora_entrada'])) ? $_POST['hora_entrada'] : '',
        'hora_saida' => (isset($_POST['hora_saida'])) ? $_POST['hora_saida'] : ''
    );
    
    include "template-veiculo.php";