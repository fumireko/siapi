<?php
include "../validar_session.php";  
include "../Config/config_sistema.php";
if (!isset($_SESSION)){
    session_start();
   }
$consultaMat = mysql_query("SELECT
solicitacao_servicos.id_solicitacao, 
solicitacao_servicos.id_pedido,
solicitacao_servicos.ano_pedido, 
solicitacao_servicos.num_pedido,
solicitacao_servicos.dia_solic, 
solicitacao_servicos.dia_comeco,
solicitacao_servicos.dia_fim,
solicitacao_servicos.unidade, 
solicitacao_servicos.tipo_servico, 
solicitacao_servicos.categoria,
solicitacao_servicos.status_obra,
solicitacao_servicos.solicitante, 
solicitacao_servicos.email, 
solicitacao_servicos.local_sala, 
solicitacao_servicos.material_disponivel,
solicitacao_servicos.descricao_servico_txt  
FROM solicitacao_servicos 
WHERE categoria = 'Obra'
ORDER BY id_solicitacao") or die('Erro, query falhou');


// Definimos o nome do arquivo que será exportado
$arquivo = 'planilha.xls';
// Criamos uma tabela HTML com o formato da planilha
$html = '';
$html .= '<table>';
$html .= '<tr>';
$html .= '<td><b>N°</b></td>';
$html .= '<td><b>Protocolo</b></td>';
$html .= '<td><b>Dia de Abertura</b></td>';
$html .= '<td><b>Dia do Começo</b></td>';
$html .= '<td><b>Dia do Fim</b></td>';
$html .= '<td><b>Unidade</b></td>';
$html .= '<td><b>Tipo de Serviço</b></td>';
$html .= '<td><b>Categoria</b></td>';
$html .= '<td><b>Status</b></td>';
$html .= '<td><b>Solicitante</b></td>';
$html .= '<td><b>Email</b></td>';
$html .= '<td><b>Local</b></td>';
$html .= '<td><b>Material Disponivel</b></td>';
$html .= '<td><b>Descrição</b></td>';
$html .= '</tr>';
if(mysql_num_rows($consultaMat) > 0){
    while(list($id, $num, $ano, $protocolo, $abertura, $comeco, $fim, $unidade, $tipo, $categoria, $status, $solicitante, $email, $sala, $disponivel, $descrição) = mysql_fetch_array($consultaMat)){
        $ordem++;
        //Posiciona a data corretamente
        $dti = implode("/",array_reverse(explode("-",$abertura)));
        $dtc = implode("/",array_reverse(explode("-",$comeco)));
        $dtf = implode("/",array_reverse(explode("-",$fim)));

        $html .= '<tr>';
        $html .= '<td>'.$num.'|'.$ano.'</td>';
        $html .= '<td>'.$protocolo.'</td>';
        $html .= '<td>'.$dti.'</td>';
        $html .= '<td>'.$dtc.'</td>';
        $html .= '<td>'.$dtf.'</td>';
        $html .= '<td>'.$unidade.'</td>';
        $html .= '<td>'.$tipo.'</td>';
        $html .= '<td>'.$categoria.'</td>';
        $html .= '<td>'.$status.'</td>';
        $html .= '<td>'.$solicitante.'</td>';
        $html .= '<td>'.$email.'</td>';
        $html .= '<td>'.$sala.'</td>';
        $html .= '<td>'.$disponivel.'</td>';
        $html .= '<td>'.$descrição.'</td>';
        $html .= '</tr>';
    }
}
$html .= '</table>';
// Configurações header para forçar o download
header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
header ("Cache-Control: no-cache, must-revalidate");
header ("Pragma: no-cache");
header ("Content-type: application/x-msexcel");
header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
header ("Content-Description: PHP Generated Data" );
// Envia o conteúdo do arquivo
echo $html;
exit;
?>