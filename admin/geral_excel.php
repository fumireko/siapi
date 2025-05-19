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
tbaluno.tbaluno_status,
tbfila.tbfila_id, 
tbfila.tbaluno_tbaluno_id,
tbfila.tbfila_dtacad,
tbfila.tbfila_motivo,
tbfila.tbfila_status,
tbfila.tbcmei_tbcmcei_id,
tbcmei.tbcmei_id,
tbcmei.tbcmei_nome,
tbfila.tbfila_status,
tbfila.tbfila_dtamat
FROM tbaluno
JOIN tbfila ON tbaluno.tbaluno_id = tbfila.tbaluno_tbaluno_id 
JOIN tbcmei ON tbfila.tbcmei_tbcmcei_id = tbcmei.tbcmei_id
WHERE tbfila.tbfila_dtacad BETWEEN '2015-01-01' AND '2028-12-31'
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
$html .= '<td><b>Cmei Nome</b></td>';
$html .= '<td><b>Data de Nascimento</b></td>';
$html .= '<td><b>Data de Cadastro</b></td>';
$html .= '<td><b>Motivo</b></td>';
$html .= '<td><b>Turma</b></td>';
$html .= '<td><b>Aluno Status</b></td>';
$html .= '<td><b>Fila Status</b></td>';
$html .= '<td><b>Fila Status</b></td>';
$html .= '</tr>';
if(mysql_num_rows($consultaMat) > 0){
    while(list($id_aluno, $nm_aluno, $data, $aluno_turma, $tb_alunostatus, 
    $id_fila, $id_fila_aluno, $dtcad, $fila_motivo, $fila_id_cmei, $fila_status,
    $cmei_id_cmei, $cmei_nome,$tb_fila_status,$tb_fila_dtmatricula) = mysql_fetch_array($consultaMat)){
        $ordem++;
        //Posiciona a data corretamente
        $dt = implode("/",array_reverse(explode("-",$data)));
        $data_cad = implode("/",array_reverse(explode("-",$dtcad)));
        $datamat = implode("/",array_reverse(explode("-",$tb_fila_dtmatricula)));

        $html .= '<tr>';
        $html .= '<td>'.$id_fila.'</td>';
        $html .= '<td>'.$nm_aluno.'</td>';
        $html .= '<td>'.$ordem.'</td>';
        $html .= '<td>'.$cmei_nome.'</td>';
        $html .= '<td>'.$dt.'</td>';
        $html .= '<td>'.$data_cad.'</td>';
        $html .= '<td>'.$fila_motivo.'</td>';
        $html .= '<td>'.$aluno_turma.'</td>';
        $html .= '<td>'.$tb_alunostatus.'</td>';
        $html .= '<td>'.$tb_fila_status.'</td>';
        $html .= '<td>'.$datamat.'</td>';
        $html .= '</tr>';
    }
}
$html .= '</table>';
// Envia o conteúdo do arquivo
echo $html;
exit;
?>
