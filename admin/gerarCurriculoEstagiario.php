<?php
include_once '../vendor/mpdf/mpdf.php';
include "../validar_session.php"; 
include "../Config/config_sistema.php";

$id_estag = $_GET['id_estag'];

$result = mysqli_query($conn,"SELECT `tbestagiario_nome`, `tbestagiario_email`, `tbestagiario_dtnasc`, `tbestagiario_endereco`, `tbestagiario_bairro`, `tbestagiario_cidade`,`tbestagiario_telcel`, `tbestagiario_unipref`, `tbestagiario_turnopref`, `tbestagiario_instituicao`, `tbestagiario_curso`, `tbestagiario_horario`, `tbestagiario_datainiciocurso`, `tbestagiario_datatermcurso`, `tbestagiario_formacaocomple`, `tbestagiario_empresa`, `tbestagiario_cargo`, `tbestagiario_tempexperiencia`, `tbestagiario_empresa1`, `tbestagiario_cargo1`, `tbestagiario_tempexperiencia1`, `tbestagiario_cursosextra`, `tbestagiario_resumodocurriculo` FROM `tbestagiario` WHERE tbestagiario.tbestagiario_id =  $id_estag") or die('Erro, query falhou');

if(mysqli_num_rows($result) > 0){
    while($fetch = mysqli_fetch_row($result)){
        $nme_estag = $fetch[0];
        $email_estag = $fetch[1];
        $nasc_estag = $fetch[2];
        $end_estag = $fetch[3];
        $bairro_estag =  $fetch[4];
        $cidade_estag =  $fetch[5];
        $cel_estag =  $fetch[6];
        $unipref_estag =  $fetch[7];
        $turnopref_estag =  $fetch[8];
        $instituicao_estag =  $fetch[9];
        $curso_estag =  $fetch[10];
        $horario_curso_estag =  $fetch[11];
        $dta_inicio_curso = $fetch[12];
        $dta_fim_curso = $fetch[13];
        $formcomplementar = $fetch[14];
        $exp_empresa1 = $fetch[15];
        $exp_cargo1_estag =  $fetch[16];
        $exp_tempo1_estag =  $fetch[17];
        $exp_empresa2 = $fetch[18];
        $exp_cargo2_estag =  $fetch[19];
        $exp_tempo2_estag =  $fetch[20];
        $cursos_extras =  $fetch[21];
        $resumoCV = $fetch[22];
    }
}

$nasc_estag = implode("/",array_reverse(explode("-",$nasc_estag)));

//verifica unidade de preferencia
if($unipref_estag == 1){
    $unipref_estag = 'CMEI';
}
else if($unipref_estag == 2){
    $unipref_estag = 'Escolas';
}
else{
    $unipref_estag = 'Indiferente';
}

//verifica turno de preferencia
if($turnopref_estag == 1){
    $turnopref_estag = 'Manha';
}
else if($turnopref_estag == 2){
    $turnopref_estag = 'Tarde';
}
else{
    $turnopref_estag = 'Indiferente';
}

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

$html = '
    <div class="curriculo">
        <div class="title">
            <h1 class="nome_estag"> '.$nme_estag.' </h1>
        </div>
        <hr>
        <h2>Dados Pessoais</h2>      
        <p>Data de Nascimento: '.$nasc_estag.' </p>
        <p> '.$end_estag.' - '.$bairro_estag.' - '.$cidade_estag.'</p>
        <p> '.$cel_estag.' -  '.$email_estag.' </p>
        <hr>
        <h2>Preferencias</h2>
        <p>Unidade de preferencia:  '.$unipref_estag.' <br> Turno preferencia: '.$turnopref_estag.' </p>
        <hr>        
        <h2>Formacao</h2>
        <p> '.$instituicao_estag.' -  '.$curso_estag.' -  '.$horario_curso_estag.' </p>
        <p>'.$cursos_extras.'</p>
        <hr>
        <h2>Experiencias</h2>
        <p> '.$exp_empresa1.'  -  '.$exp_cargo1_estag.'  -  '.$exp_tempo1_estag.' </p>
        <p> '.$exp_empresa2.'  -  '.$exp_cargo2_estag.'  -  '.$exp_tempo2_estag.' </p>
        <hr>
        <h2>Resumo</h2>
        <p> '.$resumoCV.' </p>
    </div>';



$mpdf = new mPDF('utf-8', 'A4-R');
$stylesheet = file_get_contents('pdfCurriculo.css'); // external css
$html = utf8_encode($html);
$mpdf->WriteHTML($stylesheet,1);
$mpdf->WriteHTML($html,2);
$mpdf->SetDisplayMode('fullpage');
$mpdf->Output();
exit;
?>
