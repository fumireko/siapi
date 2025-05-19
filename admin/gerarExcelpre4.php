<?php
header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=Pre4.xls");  //File name extension was wrong
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

$consultaMat = mysql_query("select * from tbrecad where tbrec_dtanasc between '2016-04-01' and '2017-03-31'") or die('Erro, query falhou');


// Definimos o nome do arquivo que será exportado
$arquivo = 'planilha.xls';
// Criamos uma tabela HTML com o formato da planilha
$html = '';
$html .= '<table>';
$html .= '<tr>';
$html .= '<td><b>tbrec_id</b></td>';
$html .= '<td><b>tbrec_nome</b></td>';
$html .= '<td><b>tbrec_cpfcrianca</b></td>';
$html .= '<td><b>tbrec_dtanasc</b></td>';
$html .= '<td><b>tbrec_serie</b></td>';
$html .= '<td><b>tbrec_dtacad</b></td>';
$html .= '<td><b>tbrec_nmae</b></td>';
$html .= '<td><b>tbrec_npai</b></td>';
$html .= '<td><b>tbrec_tel</b></td>';
$html .= '<td><b>tbrec_celular</b></td>';
$html .= '<td><b>tbrec_email</b></td>';

$html .= '<td><b>tbrec_cep</b></td>';
$html .= '<td><b>tbrec_rua</b></td>';
$html .= '<td><b>tbrec_num</b></td>';
$html .= '<td><b>tbrec_comple</b></td>';
$html .= '<td><b>tbrec_bairro</b></td>';
$html .= '<td><b>tbrec_cidade</b></td>';
$html .= '<td><b>tbrec_estado</b></td>';

$html .= '<td><b>tbrec_opc1</b></td>';
$html .= '<td><b>tbrec_opc2</b></td>';
$html .= '<td><b>tbrec_opc3</b></td>';

$html .= '</tr>';
if(mysql_num_rows($consultaMat) > 0){
    while(list($tbrec_id, $tbrec_nome, $tbrec_cpfcrianca, $tbrec_dtanasc, $tbrec_serie, 
    $tbrec_dtacad, $tbrec_nmae, $tbrec_npai, $tbrec_tel, $tbrec_celular,
    $tbrec_email, $tbrec_cep, $tbrec_rua,$tbrec_num, $tbrec_comple,$tbrec_bairro,$tbrec_cidade,
    $tbrec_estado ,$tbrec_opc1,$tbrec_opc2,$tbrec_opc3) = mysql_fetch_array($consultaMat)){
        $ordem++;
        //Posiciona a data corretamente
        $dtnasc = implode("/",array_reverse(explode("-",$tbrec_dtanasc)));
        $data_cad = implode("/",array_reverse(explode("-",$tbrec_dtacad)));
        $datamat = implode("/",array_reverse(explode("-",$tb_fila_dtmatricula)));

        $html .= '<tr>';
        $html .= '<td>'.$tbrec_id.'</td>';
        $html .= '<td>'.$tbrec_nome.'</td>';
        $html .= '<td>'.$tbrec_cpfcrianca.'</td>';
        $html .= '<td>'.$dtnasc.'</td>';
        $html .= '<td>'.$tbrec_serie.'</td>';
        $html .= '<td>'.$data_cad.'</td>';
        $html .= '<td>'.$tbrec_nmae.'</td>';
        $html .= '<td>'.$tbrec_npai.'</td>';
        $html .= '<td>'.$tbrec_tel.'</td>';
        $html .= '<td>'.$tbrec_celular.'</td>';

        $html .= '<td>'.$tbrec_email.'</td>';
        $html .= '<td>'.$tbrec_cep.'</td>';
        $html .= '<td>'.$tbrec_rua.'</td>';
        $html .= '<td>'.$tbrec_num.'</td>';
        $html .= '<td>'.$tbrec_comple.'</td>';
        $html .= '<td>'.$tbrec_bairro.'</td>';
        $html .= '<td>'.$tbrec_cidade.'</td>';
        $html .= '<td>'.$tbrec_estado.'</td>';

        $html .= '<td>'.$tbrec_opc1.'</td>';
        $html .= '<td>'.$tbrec_opc2.'</td>';
        $html .= '<td>'.$tbrec_opc3.'</td>';
       
        $html .= '</tr>';
    }
}
$html .= '</table>';
// Envia o conteúdo do arquivo
echo $html;
exit;
?>