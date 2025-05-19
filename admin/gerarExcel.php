<?php
include "../validar_session.php";  
include "../Config/config_sistema.php";

$consultaEstag = mysql_query("SELECT `tbestagiario_nome`, `tbestagiario_cpf`, `tbestagiario_email`, `tbestagiario_dtnasc`, `tbestagiario_endereco`, `tbestagiario_bairro`, `tbestagiario_cidade`, `tbestagiario_telfixo`, `tbestagiario_telcel`, `tbestagiario_telreca`, `tbestagiario_falarcom`, `descricao_unidade`, `tbestagiario_turnopref`, `tbestagiario_instituicao`, `tbestagiario_nivel`, `tbestagiario_curso`, `tbestagiario_horario`, `tbestagiario_datainiciocurso`, `tbestagiario_datatermcurso`, `tbestagiario_formacaocomple`, `tbestagiario_empresa`, `tbestagiario_cargo`, `tbestagiario_tempexperiencia`, `tbestagiario_empresa1`, `tbestagiario_cargo1`, `tbestagiario_tempexperiencia1`, `tbestagiario_cursosextra`, `tbestagiario_resumodocurriculo`,  `descricao_status`, `obs_estag`
FROM `tbestagiario`
JOIN status_estag ON status_estag.id_status = tbestagiario.tbestagiario_status
JOIN tbunidade ON tbunidade.id_unidade = tbestagiario.tbestagiario_unipref
ORDER BY tbestagiario.tbestagiario_nome") or die('Erro, query falhou');


// Definimos o nome do arquivo que será exportado
$arquivo = 'planilha.xls';
// Criamos uma tabela HTML com o formato da planilha
$html = '';
$html .= '<table>';
$html .= '<tr>';
$html .= '<td><b>CPF</b></td>';
$html .= '<td><b>NOME</b></td>';
$html .= '<td><b>EMAIL</b></td>';
$html .= '<td><b>DATA NASCIMENTO</b></td>';
$html .= '<td><b>ENDERECO</b></td>';
$html .= '<td><b>BAIRRO</b></td>';
$html .= '<td><b>CIDADE</b></td>';
$html .= '<td><b>TELEFONE FIXO</b></td>';
$html .= '<td><b>TELEFONE CELULAR</b></td>';
$html .= '<td><b>TELEFONE RECADOS</b></td>';
$html .= '<td><b>FALAR COM</b></td>';
$html .= '<td><b>UNIDADE DE PREFERENCIA</b></td>';
$html .= '<td><b>TURNO DE PREFERENCIA</b></td>';
$html .= '<td><b>INSTITUICAO DE ENSINO</b></td>';
$html .= '<td><b>NIVEL</b></td>';
$html .= '<td><b>CURSO</b></td>';
$html .= '<td><b>HORARIO</b></td>';
$html .= '<td><b>DATA INICIO CURSO</b></td>';
$html .= '<td><b>DATA FIM CURSO</b></td>';
$html .= '<td><b>FORMACAO COMPLEMENTAR</b></td>';
$html .= '<td><b>ULTIMA EMPRESA</b></td>';
$html .= '<td><b>ULTIMO CARGO</b></td>';
$html .= '<td><b>TEMPO DE EXPERIENCIA</b></td>';
$html .= '<td><b>PENULTIMA EMPRESA</b></td>';
$html .= '<td><b>PENULTIMO CARGO</b></td>';
$html .= '<td><b>TEMPO DE EXPERIENCIA</b></td>';
$html .= '<td><b>CURSOS EXTRAS</b></td>';
$html .= '<td><b>RESUMO CURRICULO</b></td>';
$html .= '<td><b>STATUS</b></td>';
$html .= '<td><b>OBSERVACAO</b></td>';
$html .= '</tr>';
if(mysql_num_rows($consultaEstag) > 0){
    while(list($nme_estag, $cpf_estag, $email_estag, $nasc_estag, $end_estag, $bairro_estag, $cidade_estag, $telfixo_estag, $cel_estag, $telrec_estag, $falarcom_estag ,$descricao_unidade, $turno_preferencia, $instituicao_estag, $nvl_estag, $curso_estag, $horario_curso_estag, $dta_inicio_curso, $dta_fim_curso, $formcomplementar, $exp_empresa1, $exp_cargo1_estag, $exp_tempo1_estag, $exp_empresa2, $exp_cargo2_estag, $exp_tempo2_estag, $cursos_extras, $resumoCV, $descricao_status, $obs_estag) = mysql_fetch_array($consultaEstag)){
        //verifica turno estudo
        if($horario_curso_estag == 1){
            $horario_curso_estag = 'Manha'; 
        }
        else if($horario_curso_estag == 2){
            $horario_curso_estag = 'Tarde';
        }
        else if($horario_curso_estag == 3){
            $horario_curso_estag = 'Noite';
        }
        else{
            $horario_curso_estag = 'Ead';
        }

        //verifica turno preferencia
        if($turno_preferencia == 1){
            $turno_preferencia = 'Manha'; 
        }
        else if($turno_preferencia == 2){
            $turno_preferencia = 'Tarde';
        }
        else if($turno_preferencia == 3){
            $turno_preferencia = 'Noite';
        }

        //verifica nivel
        if($nvl_estag == 1){
            $nvl_estag = 'Medio';
        }
        else if($nvl_estag == 2){
            $nvl_estag = 'Superior';
        }
        else{
            $nvl_estag = 'Pos-graduacao';
        }

        //verifica formacao complementar
        if($formcomplementar == 1){
            $formcomplementar = 'Sim, já possuo magistério concluído. Cursando agora a graduação';
        }
        else{
            $formcomplementar = 'Não cursei o magistério, somente a graduação';
        }
        $html .= '<tr>';
        $html .= '<td>'.$cpf_estag.'</td>';
        $html .= '<td>'.$nme_estag.'</td>';
        $html .= '<td>'.$email_estag.'</td>';
        $html .= '<td>'.$nasc_estag.'</td>';
        $html .= '<td>'.$end_estag.'</td>';
        $html .= '<td>'.$bairro_estag.'</td>';
        $html .= '<td>'.$cidade_estag.'</td>';
        $html .= '<td>'.$telfixo_estag.'</td>';
        $html .= '<td>'.$cel_estag.'</td>';
        $html .= '<td>'.$telrec_estag.'</td>';
        $html .= '<td>'.$falarcom_estag.'</td>';
        $html .= '<td>'.$descricao_unidade.'</td>';
        $html .= '<td>'.$turno_preferencia.'</td>';
        $html .= '<td>'.$instituicao_estag.'</td>';
        $html .= '<td>'.$nvl_estag.'</td>';
        $html .= '<td>'.$curso_estag.'</td>';
        $html .= '<td>'.$horario_curso_estag.'</td>';
        $html .= '<td>'.$dta_inicio_curso.'</td>';
        $html .= '<td>'.$dta_fim_curso.'</td>';
        $html .= '<td>'.$formcomplementar.'</td>';
        $html .= '<td>'.$exp_empresa1.'</td>';
        $html .= '<td>'.$exp_cargo1_estag.'</td>';
        $html .= '<td>'.$exp_tempo1_estag.'</td>';
        $html .= '<td>'.$exp_empresa2.'</td>';
        $html .= '<td>'.$exp_cargo2_estag.'</td>';
        $html .= '<td>'.$exp_tempo2_estag.'</td>';
        $html .= '<td>'.$cursos_extras.'</td>';
        $html .= '<td>'.$resumoCV.'</td>';
        $html .= '<td>'.$descricao_status.'</td>';
        $html .= '<td>'.$obs_estag.'</td>';
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