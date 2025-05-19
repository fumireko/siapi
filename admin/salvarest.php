<?php
include "conn2.php";
$dtcad = date("Y-m-d");


$nome = $_POST['nome_estag'];
$area = $_POST['unidade_preferencia'];
$turno = $_POST['turno_preferencia'];
$obs_esc = $_POST['obs1_estag'];
$cpf = $_POST['cpf_estag'];

$dtnasc = $_POST['nasc_estag'];
$status = "1";
//$datan = implode("-",array_reverse(explode("/",$dtcad)));


$email = $_POST['email_estag'];
$endereco = $_POST['end_estag'];
$bairro = $_POST['bairro_estag'];
$cidade = $_POST['cidade_estag'];
$tel_fixo = $_POST['fixo_estag'];
$tel_cel = $_POST['cel_estag'];
$tel_rec = $_POST['recado_estag'];
$tel_ctto = $_POST['falar_com_estag'];

$instituicao = $_POST['inst_ens_estag'];
$nivel = $_POST['nvl_estag'];

 // trtamento de  campos  ocultos Medio e Tecnico
$curso_tp_medio = $_POST['tipo_medio'];
$curso_tp_tecnico = $_POST['tipo_tecnico'];
$curso_tp_tecnico2 = $_POST['outro_tec_estag'];
$curso_form_compl = $_POST['form_complementar'];
 // fim //


$curso = $_POST['curso_estag'];
$horario = $_POST['hr_aula_estag'];
$curso_ini = $_POST['dta_ini_estag'];
$curso_fim = $_POST['dta_fim_estag'];

$emp_ult = $_POST['empresa_ult_estag'];
$emp_ult_cargo = $_POST['cargo_ult_estag'];
$emp_ult_temp = $_POST['exp_ult_estag'];

$emp_penult = $_POST['empresa_penult_estag'];
$emp_penult_cargo = $_POST['cargo_penult_estag'];
$emp_penult_temp = $_POST['exp_penult_estag'];

$cursos_ext = $_POST['cursos_extras_estag'];
$resumo = $_POST['cv_estag'];
$observacoes = $_POST['obs_estag'];


//echo $nome."','".$cpf."','".$dtcad."','".$email."','".$dtnasc."','".$endereco."','".$bairro."','".$cidade."','".$tel_fixo."','".$tel_cel."','".$tel_rec."','".$tel_ctto."','".$area."','".$turno."','".$instituicao."','".$nivel."','".$curso."','".$curso_tp_medio."','".$curso_tp_tecnico."','".$horario."','".$curso_ini."','".$curso_fim."','".$curso_form_compl."','".$emp_ult."','".$emp_ult_cargo."','".$emp_ult_temp."','".$emp_penult."','".$emp_penult_cargo."','".$emp_penult_temp."','".$cursos_ext."','".$resumo."','".$observacoes."')"; 



$sqlinsert = "INSERT INTO `tbestagiario`(`tbestagiario_nome`, `tbestagiario_cpf`, `tbestagio_dtacad`, `tbestagiario_email`, `tbestagiario_dtnasc`, `tbestagiario_endereco`,`tbestagiario_bairro`, `tbestagiario_cidade`, `tbestagiario_telfixo`, `tbestagiario_telcel`, `tbestagiario_telreca`, `tbestagiario_falarcom`,`tbestagiario_unipref`, `tbestagiario_turnopref`, `tbestagiario_instituicao`, `tbestagiario_nivel`, `tbestagiario_curso`, `tipo_medio`, `tipo_tecnico`,`tbestagiario_horario`, `tbestagiario_datainiciocurso`, `tbestagiario_datatermcurso`, `tbestagiario_formacaocomple`, `tbestagiario_empresa`, `tbestagiario_cargo`,`tbestagiario_tempexperiencia`, `tbestagiario_empresa1`, `tbestagiario_cargo1`, `tbestagiario_tempexperiencia1`, `tbestagiario_cursosextra`,`tbestagiario_resumodocurriculo`,`obs_estag`,`tbestagiario_status`)
VALUES ('".$nome."','".$cpf."','".$dtcad."','".$email."','".$dtnasc."','".$endereco."','".$bairro."','".$cidade."','".$tel_fixo."','".$tel_cel."','".$tel_rec."','".$tel_ctto."','".$area."','".$turno."','".$instituicao."','".$nivel."','".$curso."','".$curso_tp_medio."','".$curso_tp_tecnico."','".$horario."','".$curso_ini."','".$curso_fim."','".$curso_form_compl."','".$emp_ult."','".$emp_ult_cargo."','".$emp_ult_temp."','".$emp_penult."','".$emp_penult_cargo."','".$emp_penult_temp."','".$cursos_ext."','".$resumo."','".$observacoes."','".$status."')";

mysqli_query($conn,$sqlinsert) or die("Nao foi possivel inserir os dados"); //Ou vai..., ou racha.
echo "<script>alert('Curriculo para Estagio Cadastrado .');</script>";
echo "<center> <br><br> ";
echo "<a href= '../index.php'> ** Acesso ao Sistema **</a>  <br />  <br />";
echo "</center>";
//header("Location:cadestag.php");

exit;
?>

