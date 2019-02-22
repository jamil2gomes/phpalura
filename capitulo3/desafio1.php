<?php

function saudacao(){
    $hora = date("H");
    if($hora>=12 && $hora<18)
        echo "Boa Tarde!";
    else if($hora>=18 && $hora<24)
        echo "Boa Noite!";
    else
        echo "Bom dia!";
}

?>



<!DOCTYPE html>
<html>
    <head>
        <title>Desenvolvimento Web com PHP e MYSQL</title>
    </head>
    <body>
        <h1>Desafio 1 Capítulo 4</h1>	
        <p>Faça uma página que exiba a hora e a frase "Bom dia", "Boa tarde"  ou  "Boa  noite",
          de  acordo  com  a  hora.  Use  acondicional  if  e a função  date() .</p>
        <hr>
      <p><?=saudacao()?> Hora:<?=date("H:i:s a")?></p>
    <hr>
    <footer>
        Jamil Gomes <?=date('Y')?>
    </footer>
    </body>
</html>