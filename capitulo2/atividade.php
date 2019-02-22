<?php
    echo "Hoje é dia " . date('d/m/Y'); 
    echo " agora são " . date('H:i:s'); 
    echo "<br>";
    echo "Hoje é dia " . date('d/m/y'); 
    echo " agora são " . date('h:i:s'); 
    echo "<br>";

    $dia = date('w'); //pega o número correspondente ao dia da semana (week)

    switch($dia){
        case 0:
            echo "Domingo!";
            break;
        case 1: 
            echo "Segunda!";
            break;
        case 2:
            echo "Terça!";
            break;
        case 3:
            echo "Quarta!";
            break;
        case 4:
            echo "Quinta!";
            break;
        case 5:
            echo "Sexta!";
            break;
        case 6:
            echo "Sábado!";
            break;
        default:
            echo "Erro";
    }
    echo "<br><hr><br>";

    echo "Faltam " . (6 - $dia) . " dias para o sábado. #Sabadou";

    echo "<br><hr><br>";

    $meses = array('Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro');
    $mes = date('m');
   
    echo $meses[--$mes];
?> 