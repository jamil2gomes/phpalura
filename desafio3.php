<?php
function linha($semana){
        echo "<tr>";
            for($i = 0; $i <= 6; $i++){
                if(isset($semana[$i])){//é o mesmo que array_key_exists($i,$semana)
                    if ($i == 0){
                        echo "<td><font color='red'>{$semana[$i]}</font></td>";//se o dia for domingo então coloca em vermelho
                    }elseif($i == 6){
                        echo "<td><strong>{$semana[$i]}</strong></td>"; //se for sábado então coloca em negrito
                    }else{
                        echo "<td>{$semana[$i]}</td>";
                    }
                    
                }else{
                    echo "<td></td>";
                }
            }
        echo "</tr>";
    }
    function calendario(){
        $dia = 1;
        $semana = array("");
      
        
        while($dia <= 31){
             array_push($semana, $dia);
           
            if(count($semana) == 7){
               linha($semana);
                $semana = array();  
            }
            $dia++;
        }
        linha($semana);
    }
?> 

<table border="1">
    <tr>
        <th>Dom</th>
        <th>Seg</th>
        <th>Ter</th>
        <th>Qua</th>
        <th>Qui</th>
        <th>Sex</th>
        <th>Sáb</th>
    </tr>
    <?php
        calendario();
    ?> 
</table>