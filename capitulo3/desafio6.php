<?php

function MostreSemanas()
{
    $semanas = "DSTQQSS";

    for( $i = 0; $i < 7; $i++ )
    echo ".$semanas{$i}.";

}

function GetNumeroDias( $mes )
{
    $numero_dias = array(
    ’01’ => 31, ’02’ => 28, ’03’ => 31, ’04’ =>30, ’05’ => 31, ’06’ => 30,
    ’07’ => 31, ’08’ =>31, ’09’ => 30, ’10’ => 31, ’11’ => 30, ’12’ => 31
    );

    if (((date(‘Y’) % 4) == 0 and (date(‘Y’) % 100)!=0) or (date(‘Y’) % 400)==0)
    {
    $numero_dias[’02’] = 29; // altera o numero de dias de fevereiro se o ano for bissexto
    }

    return $numero_dias[$mes];
}

function GetNomeMes( $mes )
{
$meses = array( ’01’ => “Janeiro”, ’02’ => “Fevereiro”, ’03’ => “Março”,
’04’ => “Abril”, ’05’ => “Maio”, ’06’ => “Junho”,
’07’ => “Julho”, ’08’ => “Agosto”, ’09’ => “Setembro”,
’10’ => “Outubro”, ’11’ => “Novembro”, ’12’ => “Dezembro”
);

if( $mes >= 01 && $mes <= 12)
return $meses[$mes];

return "Mês deconhecido";

}

function MostreCalendario( $mes )
{

$numero_dias = GetNumeroDias( $mes ); // retorna o número de dias que tem o mês desejado
$nome_mes = GetNomeMes( $mes );
$diacorrente = 0;

$diasemana = jddayofweek( cal_to_jd(CAL_GREGORIAN, $mes,"01",date('Y')) , 0 ); // função que descobre o dia da semana

echo ";

echo ".$nome_mes.";

MostreSemanas(); // função que mostra as semanas aqui

for( $linha = 0; $linha < 6; $linha++ )
{

echo ";

for( $coluna = 0; $coluna < 7; $coluna++ )
{
echo "<td width = 30 height = 30 ";

if( ($diacorrente == ( date('d') – 1) && date('m') == $mes) )
{
echo " id = 'dia_atual' ";
}
else
{
if(($diacorrente + 1) <= $numero_dias )
{
if( $coluna “;

/* TRECHO IMPORTANTE: A PARTIR DESTE TRECHO É MOSTRADO UM DIA DO CALENDÁRIO (MUITA ATENÇÃO NA HORA DA MANUTENÇÃO) */

if( $diacorrente + 1 <= $numero_dias )
{
if( $coluna < $diasemana && $linha == 0)
{
echo " ";
}
else
{
// echo "”;
echo ".++$diacorrente . ";
}
}
else
{
break;
}

/* FIM DO TRECHO MUITO IMPORTANTE */

echo “”;
}
echo “”;
}

echo “”;
}

function MostreCalendarioCompleto()
{
echo “”;
$cont = 1;
for( $j = 0; $j < 4; $j++ )
{
echo ";
for( $i = 0; $i < 3; $i++ )
{

echo ";
MostreCalendario( ($cont < 10 ) ? "0".$cont : $cont );

$cont++;


}
echo “”;
}
echo “”;
}

MostreCalendario(’05’);
echo “”;
MostreCalendarioCompleto();
?>