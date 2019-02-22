<?php
function linha($semana){
   $linha="<tr>";

   for($i = 0; $i <=6; $i++){
        if(array_key_exists($i,$semana)){
            $linha.="<td>{$semana[$i]}</td>";
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
    </body>
</html>
