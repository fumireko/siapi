<?php
include "../validar_session.php";  
include "../Config/config_sistema.php";
if (!isset($_SESSION)){
    session_start();
   }
$etapa = $_REQUEST['etapa'];
$consultaMat = mysql_query("SELECT
compra.id, 
compra.id_pedido,
compra.ano_pedido, 
compra.estagio,
compra.item, 
compra.quantidade,
compra.justificativa,
compra.unidade_usuario, 
compra.ação, 
compra.substitui,
compra.solicitacao  
FROM compra 
where estagio = '$etapa' ORDER BY id
") or die('Erro, query falhou');


// Definimos o nome do arquivo que será exportado
$arquivo = 'planilha.xls';
// Criamos uma tabela HTML com o formato da planilha
$html = '';
$html .= '<table>';
$html .= '<tr>';
$html .= '<td><b>Requisicao Nº</b></td>';
$html .= '<td><b>Etapa</b></td>';
$html .= '<td><b>Item</b></td>';
$html .= '<td><b>Quantidade</b></td>';
$html .= '<td><b>Justificativa</b></td>';
$html .= '<td><b>Unidade</b></td>';
$html .= '<td><b>Substituicao ou compra de novo</b></td>';
$html .= '<td><b>Substituicao</b></td>';
$html .= '<td><b>Ja Solicitou</b></td>';
$html .= '</tr>';
if(mysql_num_rows($consultaMat) > 0){
    while(list($id, $num, $ano, $estagio, $item, $quantidade, $justificativa, $unidade_usuario, $ação, $substitui, $solicitacao) = mysql_fetch_array($consultaMat)){
        $ordem++;
        //Posiciona a data corretamente
        $html .= '<tr>';
        $html .= '<td>'.$num.'|'.$ano.'</td>';
        $html .= '<td>'.$estagio.'</td>';
        $html .= '<td>'.$item.'</td>';
        $html .= '<td>'.$quantidade.'</td>';
        $html .= '<td>'.$justificativa.'</td>';
        $html .= '<td>'.$unidade_usuario.'</td>';
        $html .= '<td>'.$ação.'</td>';
        $html .= '<td>'.$substitui.'</td>';
        $html .= '<td>'.$solicitacao.'</td>';
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