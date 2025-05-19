<?php
include "../validar_session.php";
include "../Config/config_sistema.php";
$login = $_SESSION['login_usuario'];
$id_cmei = $_SESSION['unidade_usuario'];
$tbaluno_id = $_REQUEST['tbaluno_id'];
$nome_usuario = $_REQUEST['nome_usuario'];
$id_fila = $_REQUEST['id_fila'];
$sql = "SELECT tbaluno.tbaluno_id,
tbaluno.tbaluno_nome, 
tbaluno.tbaluno_nmae, 
tbaluno.tbaluno_dtnasc,
tbaluno.tbaluno_turma,
tbaluno.tbaluno_cep,
tbaluno.tbaluno_status,
tbcaec.caec_id,
tbcaec.caec_professor,
tbcaec.caec_ass_semed,
tbcaec.caec_dataenvio,
tbcaec.caec_tbcmei_id,
tbcaec.caec_aluno_id,
tbcaec.caec_queixa,
tbcaec.caec_status,
tbcaec.caec_hora,
tbcaec.caec_datatriagem,
tbcaec.caec_esp,
tbcaec.caec_profissional,
tbcaec.dados_usuarios_ID,
tbcmei.tbcmei_id, 
tbcmei.tbcmei_nome,
usuarios.id,
usuarios.funcao
 FROM tbaluno INNER JOIN tbcaec 
 ON tbaluno.tbaluno_id = tbcaec.caec_aluno_id
 iNNER JOIN tbcmei 
 on tbcaec.caec_tbcmei_id = tbcmei.tbcmei_id 
 inner join usuarios
 on tbcaec.dados_usuarios_ID = usuarios.id
 where tbcaec.caec_id = '".$id_fila."' 
 ORDER BY caec_id";

$qr = mysql_query($sql) or die(mysql_error());
while( $ln = mysql_fetch_assoc($qr) )

{
$cod = $ln['caec_id'];
$dtn = $ln['tbaluno_dtnasc'];
$dtdev = $ln['caec_datadev'];
$dtatri = $ln['caec_datatriagem'];

$dtansc = implode("/",array_reverse(explode("-",$dtn)));
$datadevolutiva = implode("/",array_reverse(explode("-",$dtdev)));
$datatriagem = implode("/",array_reverse(explode("-",$dtatri)));

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta name="author" content="Admin" />
<title>DADOS DO ALUNO</title>
<script src="http://code.jquery.com/jquery-1.7.1.min.js" type="text/javascript"></script>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
<script src="js/gmaps.js" type="text/javascript"></script>
<script src="js/cep.js" type="text/javascript"></script>
<link href="css/main.css" rel="stylesheet" />
<style type="text/css">
asterisco {
color: #FF0000;
}
</style>
</head>
<body>
<script type="text/javascript">
//boo-box
bb_bid = "1675837";
bb_lang = "pt-BR";
bb_name = "custom";
bb_limit = "8";
bb_format = "bbb";
</script>
<form onSubmit="" action="SalvaFila.php" method="post" name="cadastro">
<div style="padding: 0px 0 0 140px; font-size:14px">
<table width="750" border="1" cellspacing="0" align="center">
    <tr>
    <td colspan="6" align="left" bgcolor="#FFFFFF" style="font-size: 14px; color: #000; font-weight: bold;"> <h5> <img src="../images/logocolombo.png" width="200" height="124" vspace="0px" hspace="20px"/></h5></td>
</tr>
<tr>
    <td height="24" colspan="6" bgcolor="#FFFFFF" class="style3" align="center"><strong>AGENDAMENTO TRIAGEM – <?PHP echo $ln['caec_esp'] ?> <Area></Area><input type="hidden" name ="aluno_id" value="<?PHP echo $linhas->tbaluno_id?>"></strong></td>
    </tr>
<tr>
    <td height="24" colspan="6" bgcolor="#FFFFFF" class="style3" align="center"><strong>DADOS DA CRIANÇA <Area></Area><input type="hidden" name ="aluno_id" value="<?PHP echo $linhas->tbaluno_id?>"></strong></td>
    </tr>
<tr>
<tr>
    <td height="26" bgcolor="#FFFFFF" colspan="2" class="style3" align="right">Educando(a):</td>
<td colspan="5" bgcolor="#FFFFFF" ><?PHP echo $ln['tbaluno_nome'];?></td>
</tr>
    <td height="26" bgcolor="#FFFFFF" colspan="2" class="style3" align="right">Unidade de Ensino:</td>
<td colspan="5" bgcolor="#FFFFFF" ><?PHP echo $ln['tbcmei_nome'];?></td>
</tr>
<tr>
    <td height="26" bgcolor="#FFFFFF" colspan="2" class="style3" align="right">Responsável(eis):</td>
<td colspan="5" bgcolor="#FFFFFF" ><?PHP echo $ln['tbaluno_nmae'];?></td>
</tr>
<tr>
    <td height="24" bgcolor="#FFFFFF" colspan="2" class="style3" align="right">Data de Nascimento:&nbsp;</td>
    <td bgcolor="#FFFFFF" colspan="4" ><?php echo $dtansc;?></td>
</tr>
<tr>
    <td height="24" bgcolor="#FFFFFF" colspan="2" class="style3" align="right">Escola/Cmei:</td>
    <td bgcolor="#FFFFFF" colspan="4" ><?php echo $ln['tbcmei_nome'];?></td>
</tr>

<tr>
    <td height="24" bgcolor="#FFFFFF" colspan="2" class="style3" align="right">Profissional:</td>
    <td bgcolor="#FFFFFF" colspan="4" ><?php echo $ln['caec_profissional'];?></td>
</tr>

<tr>
    <td height="24" bgcolor="#FFFFFF" colspan="2" class="style3" align="right">Data:</td>
    <td bgcolor="#FFFFFF" colspan="4" ><?php echo $datatriagem ?> </td>
</tr>

<tr>
    <td height="24" bgcolor="#FFFFFF" colspan="2" class="style3" align="right">Horario:</td>
    <td bgcolor="#FFFFFF" colspan="4" ><?php echo $ln['caec_hora']; ?></td>
</tr>

<tr>
   
</tr>
<td height="22" colspan="6" align="left" bgcolor="#FFFFFF" class="accordion-inner"> <h6>&nbsp;</h6>
<h6>
    <strong>Endereço do CAEC: Avenida São Gabriel, nº2765, Bairro São Gabriel, Colombo/PR;
    </span></strong></h6>
<h6>
    <strong><span class="unstyled">Tel.:41 3666-0390    A falta ao primeiro atendimento tem como consequência a perda da vaga. </span></strong></h6>
<h6>
    <strong><span class="unstyled">A escola deve entregar este agendamento para a Familia e arquiva a outra via na pasta do aluno. 
<h6>
    <strong><span class="unstyled"> 
</span><span class="unstyled"></span></strong></h6>
<h6 align="center">&nbsp;</h6>
<h6 align="center">&nbsp;</h6>
<h6 align="center"><strong><span class="unstyled">__________________________________________________________________ </span><span class="unstyled"></span></strong></h6>
<p align="center">Carimbo e Assinatura - UNIDADE ESCOLAR</p>
<h6>&nbsp;</h6> 
</strong></td>
</tr> 
</table>
</div> 
<div style="padding: 0px 0 0 140px;">
</div> 
</div> 
<span class="style3"><strong>
</strong></span>
<?php
}
?>

</body>
</html>
