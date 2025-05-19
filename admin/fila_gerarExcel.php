<?php
include "../validar_session.php";  
include "../Config/config_sistema.php";
if (!isset($_SESSION)){
    session_start();
   }
$motivo = $_REQUEST['motivo'];
$turma = $_REQUEST['turma'];
$id_cmei = $_SESSION['unidade_usuario'];
$ordem=0;
$inf = array("Infantil 1", "Infantil 2", "Infantil 3", "Infantil 4");
$coluna = 0;
$linha = 0;

function tableCount($linha, $coluna) {
    include "../validar_session.php";  
    include "../Config/config_sistema.php";
    if (!isset($_SESSION)){
        session_start();
    }
    $id_cmei = $_SESSION['unidade_usuario']; 
    $motivo = array("Normal", "Inclusão", "Conselho tutelar", "Servico Social", "Transferencia");
    $turma = array("INF1", "INF2", "INF3", "INF4");
    $result=mysql_query(" SELECT COUNT(tbaluno_turma) as total FROM tbaluno 
    INNER JOIN tbfila 
    ON tbaluno.tbaluno_id = tbfila.tbaluno_tbaluno_id 
    INNER JOIN tbcmei 
    on tbfila.tbcmei_tbcmcei_id = tbcmei.tbcmei_id 
    where tbfila_motivo like '%".$motivo[$coluna]."%' 
    and tbcmei.tbcmei_id like '%".$id_cmei."%' 
    and tbaluno.tbaluno_turma like '%".$turma[$linha]."%' 
    and tbfila_status ='fila' ") or die('Erro, query falhou');
    $data = mysql_fetch_assoc($result);
    $coluna++;
    return $data['total'];
}

// Definimos o nome do arquivo que será exportado
$arquivo = 'planilha.xls';
// Criamos uma tabela HTML com o formato da planilha
$html = '';
$html .= '<table>';
$html .= '<tr>';
$html .= '<td><b>Turma</b></td>';
$html .= '<td><b>Normal</b></td>';
$html .= '<td><b>Inclusão</b></td>';
$html .= '<td><b>Conselho Tutelar</b></td>';
$html .= '<td><b>Serviço social</b></td>';
$html .= '<td><b>Transferencia</b></td>';
$html .= '</tr>';
for ($linha; $linha < 4; $linha++) { 
    $html .= '<tr>';
    $html .= '<td>'.$inf[$linha].'</td>';
    for ($coluna=0; $coluna <= 4; $coluna++) { 
        $a = tableCount($linha, $coluna);
        $html .= '<td>'.$a.'</td>';
    }
    $html .= '</tr>';
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