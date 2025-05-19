<?php
header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=abc.xls");  //File name extension was wrong
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);
// Configurações header para forçar o download
include "../validar_session.php";  
include "../Config/config_sistema.php";
if (!isset($_SESSION)){
    session_start();
   }
$motivo = $_REQUEST['motivo'];
$turma = $_REQUEST['turma'];
//variaveis
$id_cmei = $_REQUEST['id_cmei'];
$ordem=0;
$consultaMat = mysql_query("SELECT  tbequip.tbequip_id, 
tbequip.tbequip_plaqueta, 
tbequip.tbequip_monitor,
tbequip.tbequi_mod,
tbequip.tbequi_modplaca,
tbequip.tbequi_memoria,
tbequip.tbequi_modelomemoria,
tbequip.tbequi_armazenamento,
tbequip.tbequi_tparmazenamento,
tbequip.tbequi_datalanc,
tbequip.tbequi_teclado,
tbequip.tbequi_mouse,
tbequip.tbequi_filtrodelinha,
tbequip.tbequi_tecnico,
tbequip.tbequi_tbcmei_id,
tbcmei.tbcmei_id,
tbcmei.tbcmei_nome
FROM tbequip JOIN tbcmei  
ON tbequip.tbequip_id = tbcmei.tbcmei_id 
ORDER BY tbcmei.tbcmei_id") or die('Erro, query falhou');
// Definimos o nome do arquivo que será exportado
$arquivo = 'planilha.xls';
// Criamos uma tabela HTML com o formato da planilha
$html = '';
$html .= '<table>';
$html .= '<tr>';
$html .= '<td><b>Cod</b></td>';
$html .= '<td><b>Plaqueta</b></td>';
$html .= '<td><b>Nome da mae</b></td>';
$html .= '</tr>';
if(mysql_num_rows($consultaMat) > 0){
    while(list($id_fila, 
    $nm_aluno, 
    $n_mae, 
    $telefone, 
    $celu,
    $celular, 
    $tbaluno_tel,
    $celu,$celular,
    $data, 
    $aluno_turma,  
    $id_fila_aluno, 
    $dtcad, 
    $fila_motivo, 
    $fila_id_cmei, 
    $cmei_id_cmei, 
    $cmei_nome) = mysql_fetch_array($consultaMat)){
        $ordem++;
        //Posiciona a data corretamente
        $dt = implode("/",array_reverse(explode("-",$data)));
        $data_cad = implode("/",array_reverse(explode("-",$dtcad)));
        $html .= '<tr>';
        $html .= '<td>'.$id_fila.'</td>';
        $html .= '<td>'.$nm_aluno.'</td>';
        $html .= '<td>'.$n_mae.'</td>';
        $html .= '</tr>';
    }
}
$html .= '</table>';
// Envia o conteúdo do arquivo
echo $html;
exit;
?>