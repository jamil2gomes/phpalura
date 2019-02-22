<?php
function linha($semana){
   $linha="<tr>";
   $style=''; 
   for($i = 0; $i <=6; $i++){
        if(array_key_exists($i,$semana)){
            if(date('d')==$semana[$i]){
                $style = 'font-weight:bold;';
                $linha.="<td style = {$style}>{$semana[$i]}</td>";
            }else{
                $style='';
                $linha.="<td style = {$style}>{$semana[$i]}</td>";}    
        }else{
            $linha.="<td></td>";
        }
   }
   $linha.="</tr>";
   return $linha;
}

function calendario(){
    $calendario = '';
    $dia = 1;
    $semana = [];

    while($dia <= 31){
        array_push($semana, $dia);

        if(count($semana)==7){
            $calendario.= linha($semana);
            $semana = [];
        }
        $dia++;
    }
    $calendario.= linha($semana);
    return $calendario;
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Calendário</title>
    </head>
    <body>  
        <p>Faça  com  que  o  calendário  exiba  o  dia  atual  em  negrito,usando a função  date() .</p>
        <table	border="1">	
            <tbody>
                <tr>
                    <th>Dom</th>
                    <th>Seg</th>
                    <th>Ter</th>								
                    <th>Qua</th>								
                    <th>Qui</th>								
                    <th>Sex</th>								
                    <th>Sáb</th>				
                </tr> 
                <?=calendario()?>
            </tbody>
        </table> 
    <hr>
    <footer>
        Jamil Gomes <?=date('Y')?>
    </footer>
    </body>
</html>
