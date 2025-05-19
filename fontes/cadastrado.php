<?php
include "../Config/config_sistema.php";
$consulta = mysql_query("SELECT * FROM tbaluno ORDER BY tbaluno_id DESC LIMIT 1");
while($linhas = mysql_fetch_object($consulta)) {
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Cadastro de pacientes</title>
<link href="css/main.css" rel="stylesheet" />
        <style type="text/css">
        asterisco {
	color: #FF0000;
}
        .style3 {	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
}
        </style>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data" name="frm_pac.php">
<table width="925" border="0" align="center" cellpadding="4" cellspacing="4" class="style3" >
<tr>
     	<td height="34" colspan="2" align="left" bgcolor="#CCCCCC" ><h5>&nbsp;</h5>
   	      <h5>Seu cadastro foi realizado com sucesso!</h5>
   	      <h5><strong>O Cadastramento Escolar da Rede Municipal de Ensino de Colombo para o ano letivo de 2016, ser&aacute; realizado no per&iacute;odo de 15 de junho a 31 de julho de 2015, para as crian&ccedil;as nascidas em 2010, 2011 e de 1&ordm; de Janeiro a 31 de Mar&ccedil;o de 2012.</strong></h5>
          <h5><strong>De acordo com a Constitui&ccedil;&atilde;o Federal (Emenda Constitucional n&deg; 59/2009), a educa&ccedil;&atilde;o b&aacute;sica obrigat&oacute;ria e gratuita passou a ser dos 4 (quatro) aos 17 (dezessete) anos de idade e a Resolu&ccedil;&atilde;o CNE/CEB n&ordm; 06/2010 artigo 2&ordm;.</strong></h5>
          <h5><strong>Assim, os pais ou respons&aacute;veis interessados dever&atilde;o realizar o cadastramento.</strong></h5>
          <h5><strong>Este procedimento visa apenas organizar o atendimento n&atilde;o vale como matricula e n&atilde;o descarta o comparacimento ate a unidade de ensino para efetivar a matricula das crian&ccedil;as que ingressar&atilde;o na educa&ccedil;&atilde;o infantil &ndash; pr&eacute;-escola e no 1&ordm; ano do ensino fundamental no ano de 2016.</strong>&nbsp;</h5>
          <div id="divRvAceiteCad">
            <h4>&nbsp;</h4>
            <h4><strong>Declaro que estou ciente das informa&ccedil;&otilde;es acima.</strong></h4>
          </div>
        <p>&nbsp;</p></td>
    </tr>
    <tr>
        <td width="119" bgcolor="#e1e1e1" class="style3" >Cod </td>
      <td width="778" bgcolor="#e1e1e1" class="style4"><?PHP echo $linhas->tbaluno_id?></td>
    </tr>
    <tr>
        <td width="119" bgcolor="#f6f6f6" class="style3" > Nome</td>
      <td width="778" bgcolor="#f6f6f6" class="style4"><?PHP echo $linhas->tbaluno_nome?></td>
    </tr>
    <tr>
        <td bgcolor="#e1e1e1" class="style3" >Data de Nasc</td>
        <td width="778" bgcolor="#e1e1e1"  class="style4"><?PHP echo $linhas->tbaluno_dtnasc?> </td>
    </tr>
    <tr>
        <td bgcolor="#f6f6f6" class="style3" > Nome da m&atilde;e</td>
      <td width="778" bgcolor="#f6f6f6"  class="style4"><?PHP echo $linhas->tbaluno_nmae?> </td>
    </tr>
      <tr>
        <td bgcolor="#e1e1e1" class="style3" >Nome do pai</td>
      <td width="778" bgcolor="#e1e1e1" class="style4"><?PHP echo $linhas->tbaluno_npai?></td>
    </tr>
    <tr>
        <td bgcolor="#f6f6f6" class="style3">Telefone</td>
        <td width="778" bgcolor="#f6f6f6" class="style4"><?PHP echo $linhas->tbaluno_tel?></td>
    </tr>
        <tr>
        <td bgcolor="#e1e1e1" class="style3">Email</td>
      <td width="778" bgcolor="#e1e1e1"  class="style4"><?PHP echo $linhas->tbaluno_email?> </td>
    </tr>
     <tr>
        <td bgcolor="#f6f6f6" class="style3">CEP</td>
        <td width="778" bgcolor="#f6f6f6" class="style4"><?PHP echo $linhas->tbaluno_cep?></td>
    </tr>
    <tr>
        <td bgcolor="#e1e1e1" class="style3">Endere&ccedil;o</td>
      <td width="778" bgcolor="#e1e1e1"  class="style4"><?PHP echo $linhas->tbaluno_end?> - N º<?PHP echo $linhas->tbaluno_num?> - Bairro <?PHP echo $linhas->tbaluno_bairro?> - Complemento - <?PHP echo $linhas->tbaluno_comple?></td>
    </tr>
    <tr>
        <td bgcolor="#f6f6f6" class="style3">Cidade</td>
        <td width="778" bgcolor="#f6f6f6" class="style4"><?PHP echo $linhas->tbaluno_cidade?> </td>
    </tr>
     <tr>
        <td bgcolor="#e1e1e1" class="style3">Escola 1</td>
      <td width="778" bgcolor="#e1e1e1"  class="style4"><?PHP echo $linhas->tbaluno_unipref?> </td>
    </tr>
   <tr>
        <td bgcolor="#f6f6f6" class="style3">Escola 2</td>
        <td width="778" bgcolor="#f6f6f6" class="style4"><?PHP echo $linhas->tbaluno_unipref1?> </td>
    </tr>
    <tr>
        <td bgcolor="#e1e1e1" class="style3">Escola 3</td>
      <td width="778" bgcolor="#e1e1e1"  class="style4"><?PHP echo $linhas->tbaluno_unipref2?> </td>
    </tr>
    <tr>
        <td bgcolor="#f6f6f6" class="style3">Serie</td>
        <td width="778" bgcolor="#f6f6f6" class="style4"><?PHP echo $linhas->tbaluno_serie?> </td>
    </tr>
</table>
   
<div align="center"></div>
    

</form>

<?php
}
?>
