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

$consultaMat = mysql_query("SELECT tbaluno.tbaluno_id,
tbaluno.tbaluno_nome, 
tbaluno.tbaluno_dtnasc,
tbaluno.tbaluno_turma,
tbfila.tbfila_id, 
tbfila.tbaluno_tbaluno_id,
tbfila.tbfila_dtacad,
tbfila.tbfila_motivo,
tbfila.tbcmei_tbcmcei_id,
tbcmei.tbcmei_id 
FROM tbaluno
JOIN tbfila ON tbaluno.tbaluno_id = tbfila.tbaluno_tbaluno_id 
JOIN tbcmei ON tbfila.tbcmei_tbcmcei_id = tbcmei.tbcmei_id 
WHERE tbfila.tbfila_motivo LIKE '%".$motivo."%'
AND tbaluno.tbaluno_turma LIKE '%".$turma."%' 
AND tbcmei.tbcmei_id LIKE '%".$id_cmei."%' 
AND tbfila.tbfila_status ='matriculado'
and tbaluno_status = 'matriculado'
ORDER BY tbfila.tbfila_id") or die('Erro, query falhou');


// Definimos o nome do arquivo que será exportado
$arquivo = 'planilha.xls';
// Criamos uma tabela HTML com o formato da planilha
$html = '';
$html .= '<table>';
$html .= '<tr>';
$html .= '<td><b>Codigo</b></td>';
$html .= '<td><b>Nome</b></td>';
$html .= '<td><b>Ordem</b></td>';
$html .= '<td><b>Data de Nascimento</b></td>';
$html .= '<td><b>Data de Cadastro</b></td>';
$html .= '<td><b>Motivo</b></td>';
$html .= '<td><b>Turma</b></td>';
$html .= '</tr>';
if(mysql_num_rows($consultaMat) > 0){
    while(list($id_aluno, $nm_aluno, $data, $aluno_turma, $id_fila, $id_fila_aluno, $dtcad, $fila_motivo, $fila_id_cmei, $cmei_id_cmei) = mysql_fetch_array($consultaMat)){
        $ordem++;
        //Posiciona a data corretamente
        $dt = implode("/",array_reverse(explode("-",$data)));
        $data_cad = implode("/",array_reverse(explode("-",$dtcad)));

        $html .= '<tr>';
        $html .= '<td>'.$id_fila.'</td>';
        $html .= '<td>'.$nm_aluno.'</td>';
        $html .= '<td>'.$ordem.'</td>';
        $html .= '<td>'.$dt.'</td>';
        $html .= '<td>'.$data_cad.'</td>';
        $html .= '<td>'.$fila_motivo.'</td>';
        $html .= '<td>'.$aluno_turma.'</td>';
        $html .= '</tr>';
    }
}
$html .= '</table>';
// Envia o conteúdo do arquivo
echo $html;
exit;
?>