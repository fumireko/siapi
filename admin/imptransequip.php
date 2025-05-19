<?php
include "../validar_session.php";
include "../Config/config_sistema.php";
$login = $_SESSION['login_usuario'];
$id_cmei = $_SESSION['unidade_usuario'];

$tbtrasnfequip_id = $_REQUEST['tbtrasnfequip_id'];
$sql = "SELECT tbequip.tbequip_id,
tbequip.tbequip_plaqueta,
tbequip.tbequip_monitor,
tbequip.tbequi_mod,
tbequip.tbequip_so,
tbequip.tbequi_modplaca,
tbequip.tbequi_memoria,
tbequip.tbequi_modelomemoria,
tbequip.tbequi_armazenamento,
tbequip.tbequi_tparmazenamento,
tbequip.tbequi_teclado,
tbequip.tbequi_mouse,
tbequip.tbequi_filtrodelinha,
tbtrasnfequip.tbtrasnfequip_id,
tbtrasnfequip.tbtrasnfequip_idequip,
tbtrasnfequip.tbtrasnfequip_idunidadeantiga,
tbtrasnfequip.tbtrasnfequip_idunidadenova,
tbtrasnfequip.tbtrasnfequip_dtatransf,
tbtrasnfequip.tbtrasnfequip_login,
tbcmei.tbcmei_id,
tbcmei.tbcmei_nome,
tbcmei.tbcmei_coord
FROM tbequip INNER JOIN tbtrasnfequip 
ON tbequip.tbequip_id = tbtrasnfequip.tbtrasnfequip_idequip  
inner join tbcmei
on tbcmei.tbcmei_id = tbtrasnfequip.tbtrasnfequip_idunidadenova
where tbtrasnfequip.tbtrasnfequip_id = '$tbtrasnfequip_id' ORDER BY tbequip_id";
$qr = mysql_query($sql) or die(mysql_error());
while( $ln = mysql_fetch_assoc($qr) )

{
$codequip = $ln['codequip'];
$dtatransf = $ln['tbtrasnfequip_dtatransf'];
$unidadeantiga = $ln['tbtrasnfequip_idunidadeantiga'];
$cordenadora = $ln['tbcmei_coord'];
$datatransf = implode("/",array_reverse(explode("-",$dtatransf)));

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta name="author" content="Admin" />
<title>EQUIPAMENTOS</title>
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
    <td height="24" colspan="6" bgcolor="#FFFFFF" class="style3" align="center"><strong>COMPROVANTE DE TRANSFERÊNCIA  <?PHP ?> <Area></Area><input type="hidden" name ="aluno_id" value="<?PHP echo $linhas->tbaluno_id?>"></strong></td>
    </tr>
<tr>
    <td height="24" colspan="6" bgcolor="#FFFFFF" class="style3" align="center"><strong>DADOS DO EQUIPAMENTO <Area></Area><input type="hidden" name ="tbequip_id" value="<?PHP echo $linhas->tbequip_id?>"></strong></td>
    </tr>
<tr>
    <td height="28" bgcolor="#FFFFFF" colspan="2" class="style3" align="right">Plaqueta</td>
<td colspan="5" bgcolor="#FFFFFF" ><?PHP echo $ln['tbequip_plaqueta'];?></td>
</tr>
<tr>
    <td height="26" bgcolor="#FFFFFF" colspan="2" class="style3" align="right">Processador:</td>
<td colspan="5" bgcolor="#FFFFFF" ><?PHP echo $ln['tbequi_mod'];?></td>
</tr>
<tr>
    <td height="24" bgcolor="#FFFFFF" colspan="2" class="style3" align="right">Placa mãe:&nbsp;</td>
    <td bgcolor="#FFFFFF" colspan="4" ><?PHP echo $ln['tbequi_modplaca'];?></td>
</tr>
<tr>
    <td height="24" bgcolor="#FFFFFF" colspan="2" class="style3" align="right">Antigo setor:</td>
    <td bgcolor="#FFFFFF" colspan="4" ><?php echo $ln['tbtrasnfequip_idunidadeantiga'];?></td>
</tr>

<tr>
    <td height="24" bgcolor="#FFFFFF" colspan="2" class="style3" align="right">Novo setor:</td>
    <td bgcolor="#FFFFFF" colspan="4" ><?php echo $ln['tbcmei_nome'];?></td>
</tr>

<tr>
    <td height="24" bgcolor="#FFFFFF" colspan="2" class="style3" align="right">Monitor:</td>
    <td bgcolor="#FFFFFF" colspan="4" ><?php echo $ln['tbequip_monitor'];?></td>
</tr>
<tr>
    <td height="24" bgcolor="#FFFFFF" colspan="2" class="style3" align="right">Memoria:</td>
    <td bgcolor="#FFFFFF" colspan="4" ><?php echo $ln['tbequi_memoria'];?> - <?php echo $ln['tbequi_modelomemoria'];?></td>
</tr>

<tr>
    <td height="24" bgcolor="#FFFFFF" colspan="2" class="style3" align="right">Disco:</td>
    <td bgcolor="#FFFFFF" colspan="4" ><?php echo $ln['tbequi_armazenamento'];?> - <?php echo $ln['tbequi_tparmazenamento'];?></td>
</tr>

<tr>
    <td height="24" colspan="6" bgcolor="#FFFFFF" class="style3" align="left"><strong>Acessorios:<br>
        (   ) Cabo VGA;<br>
        (   ) Cabo HDMI;</br>
        (   ) Cabos de energia.</br>
       <Area></Area></strong>
    </td>
</tr>
<?php
}

$sql = "SELECT tbcmei.tbcmei_id,
tbcmei.tbcmei_nome,
tbcmei.tbcmei_coord
FROM tbcmei 
where tbcmei.tbcmei_nome = '$unidadeantiga' ORDER BY tbcmei_id";
$qr = mysql_query($sql) or die(mysql_error());
while( $ln = mysql_fetch_assoc($qr) )

{
$cmei_id = $ln['tbcmei_id'];
$nomecmei = $ln['tbcmei_nome'];
$cordusantiga = $ln['tbcmei_coord'];
}


?>


<td height="22" colspan="6" align="left" bgcolor="#FFFFFF" class="accordion-inner"> <h6>&nbsp;</h6>

    <strong><span class="unstyled"> 
</span><span class="unstyled"></span></strong></h6>

<h6 align="center"><strong><span class="unstyled"><?php echo $cordusantiga;?> </span><span class="unstyled"></span></strong></h6>
<p align="center">ENVIADO - Coordenador(a) </p>

<h6 align="center">&nbsp;</h6>
<h6 align="center"><strong><span class="unstyled"><?php echo $cordenadora;?> </span><span class="unstyled"></span></strong></h6>
<p align="center">RECEBIDO - Coordenador(a) </p>

<h6>&nbsp;</h6> 


<h6> 
    <strong><span class="unstyled">Secretaria de Tecnologia da Informação. 
<h6>

</strong></td>
</tr> 
</table>
</div> 
<div style="padding: 0px 0 0 140px;">
</div> 
</div> 
<span class="style3"><strong>
</strong></span>


</body>
</html>
