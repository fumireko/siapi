<?php
include "../validar_session.php";  
include "../Config/config_sistema.php";
if (!isset($_SESSION)){
    session_start();
   }
$consultaMat = mysql_query("SELECT 
tb_atendimento.tb_atendimento_id_ano,
tb_atendimento.	tb_atendimento_ano,
tb_atendimento.tb_atendimento_dia,
tb_atendimento.tb_atendimento_hora,
tb_atendimento.tb_atendimento_nome,
tb_atendimento.tb_atendimento_telefone,
tb_atendimento.tb_atendimento_atendimento,
tb_atendimento.tb_atendimento_assunto,
tbcmei.tbcmei_nome,
tb_atendimento.tb_atendimento_descricao,
tb_atendimento.tb_atendimento_status
FROM tb_atendimento
INNER JOIN tbcmei 
ON tb_atendimento.tb_atendimento_departamento = tbcmei.tbcmei_id
ORDER BY tb_atendimento_id") or die('Erro, query falhou');


// Definimos o nome do arquivo que será exportado
$arquivo = 'planilha.xls';
// Criamos uma tabela HTML com o formato da planilha
$html = '';
$html .= '<table>';
$html .= '<tr>';
$html .= '<td><b>N°</b></td>';
$html .= '<td><b>Data</b></td>';
$html .= '<td><b>Hora</b></td>';
$html .= '<td><b>Nome</b></td>';
$html .= '<td><b>Telefone</b></td>';
$html .= '<td><b>Tipo de Atendimento</b></td>';
$html .= '<td><b>Assunto</b></td>';
$html .= '<td><b>Departamento</b></td>';
$html .= '<td><b>Descrição</b></td>';
$html .= '<td><b>Status</b></td>';
$html .= '</tr>';
if(mysql_num_rows($consultaMat) > 0){
    while(list($id, $ano, $dia, $hora, $nome, $telefone, $atendimento, $assunto, $departamentos, $descricao, $status) = mysql_fetch_array($consultaMat)){
        $ordem++;
        //Posiciona a data corretamente
        $dt = implode("/",array_reverse(explode("-",$dia)));

        $html .= '<tr>';
        $html .= '<td>'.$id.'|'.$ano.'</td>';
        $html .= '<td>'.$dt.'</td>';
        $html .= '<td>'.$hora.'</td>';
        $html .= '<td>'.$nome.'</td>';
        $html .= '<td>'.$telefone.'</td>';
        $html .= '<td>'.$atendimento.'</td>';
        $html .= '<td>'.$assunto.'</td>';
        $html .= '<td>'.$departamentos.'</td>';
        $html .= '<td>'.$descricao.'</td>';
        $html .= '<td>'.$status.'</td>';
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