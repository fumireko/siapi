<?php
$nome = strtoupper($_POST['nome']);
$razao = strtoupper($_POST['razao']);
$endereco=$_POST["endereco"];
$compl=$_POST["compl"];
$bairro=$_POST["bairro"];
$cep=$_POST["cep"];
$telefone=$_POST["telefone"];
$email=$_POST["email"];
$website=$_POST["website"];
$radio=$_POST["radio"];
$checkbox1=$_POST["checkbox1"];
$checkbox2=$_POST["checkbox2"];
$checkbox3=$_POST["checkbox3"];
$checkbox4=$_POST["checkbox4"];
$checkbox5=$_POST["checkbox5"];
$checkbox6=$_POST["checkbox6"];
$checkbox7=$_POST["checkbox7"];
$checkbox8=$_POST["checkbox8"];
$outros=$_POST["outros"];
$cnpj=$_POST["cnpj"];
$inscrestadual=$_POST["inscrestadual"];
$m2=$_POST["m2"];
$numfun=$_POST["numfun"];
$cnae=$_POST["cnae"];


$nome_contador=$_POST["nome_contador"];
$cpf_cont=$_POST["cpf_cont"];
$rgcont=$_POST["rgcont"];
$crc=$_POST["crc"];
$end_contador=$_POST["end_contador"];
$cep_contador=$_POST["cep_contador"];
$cidade_contador=$_POST["cidade_contador"];
$bairro_contador=$_POST["bairro_contador"];
$fone_contador=$_POST["fone_contador"];
$fax_contador=$_POST["fax_contador"];
$mail_contador=$_POST["mail_contador"];
$numsala=$_POST["numsala"];




if (($m2 == "") || ($numfun == "") || ($endereco == "") || ($email ==""))

  {

    echo "<script>alert('Todos os campos devem ser preenchidos para concluir. Volte a tela anterior e finalize por favor.');</script>";

	echo "<script>javascript:history.go(-1)</script>";
	
	exit();

  } 


?>








<html>
<head>
<title>www.colombo.pr.gov.br</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style2 {font-size: 12px}
.style3 {
	font-size: 10px;
	font-family: Tahoma, Verdana;
	font-weight: bold;
}
.style8 {font-size: 14px}
.style10 {
	font-family: Tahoma, Verdana;
	font-size: 12px;
}
.style12 {
	color: #FFFFFF;
	font-weight: bold;
	font-family: Tahoma, Verdana;
	font-size: 14px;
}
.style14 {
	font-size: 10px;
	font-weight: bold;
}
.style16 {font-family: Tahoma, Verdana; font-size: 12px; font-weight: bold; }
.style18 {font-size: 18px}
.style19 {font-family: Arial, Helvetica, sans-serif}
-->
</style>

<SCRIPT LANGUAGE="JavaScript">

<!-- Begin
function varitext(text){
text=document
print(text)
}
//  End -->
</script>


</head>

<body><table width="650" border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td align="center" bgcolor="#F6F6F6"><table width="630" border="1" cellpadding="8">
      <tr>
        <td><img src="http://portal.colombo.pr.gov.br/wp-content/themes/Avenue/css/skins/images/red_logo.png" alt="" ></td>
        <td><span class="style18"><strong>SECRETARIA MUNICIPAL DA FAZENDA<br>
              <span class="style10">DEPARTAMENTO DE GEST&Atilde;O TRIBUT&Aacute;RIA </span></strong></span>
          <p class="style19"><span class="style2"><span class="style16"><strong>Requerimento de Altera&ccedil;&atilde;o do alvar&aacute; de licen&ccedil;a de localiza&ccedil;&atilde;o e funcionamento<br>
              <br>
              http://fazenda.colombo.pr.gov.br </strong></span></span></p></td>
      </tr>
  </table></td>
  </tr>
  <tr>
    
  </tr>
  <tr>
    <td align="center" bordercolor="#CCCCCC" bgcolor="#F6F6F6">
    <table width="630" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="middle"><p class="style10"><em>Excelent&iacute;ssimo Senhor Prefeito de Colombo,</em></p>
      <p><em><span class="style10">O abaixo qualificado, por seu respons&aacute;vel, requer &agrave; Vossa Excel&ecirc;ncia, uma vez pagos os emolumentos da Lei, Alvar&aacute; de Licen&ccedil;a de Localiza&ccedil;&atilde;o e Funcionamento.</span></em><br>
      </p>
      </td>
  </tr>
</table>

      <table width="630"  border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td bgcolor="#333333"><span class="style12">EMPRESA</span></td>
        </tr>
      </table>
      <table width="630" border="0" cellspacing="0" cellpadding="7">
        <tr>
          <td bgcolor="#FFFFFF"><p class="style10">Raz&atilde;o Social: <b> <?php echo "$razao"; ?></b></p>
            <p class="style10">CNPJ: <b> <?php echo "$cnpj"; ?></b> | INSCRI&Ccedil;&Atilde;O ESTADUAL: <b><?php echo "$inscrestadual"; ?></b><br>
              <br>
              Endere&ccedil;o: <b> <?php echo "$endereco"; ?></b> | Complemento:  <b> <?php echo "$compl"; ?></b> | Bairro: <b> <?php echo "$bairro"; ?></b> <strong>
          
              </strong> <br>
              <br>
          CEP: <b> <?php echo "$cep"; ?></b> |    Telefone: <b> <?php echo "$telefone"; ?></b><br>
          <br>
          E-mail: <b> <?php echo "$email"; ?></b>  | WebSite: <b> <?php echo "$website"; ?></b></p>
            <table width="100%" border="1" cellpadding="0" cellspacing="0" bordercolor="#999999">
              <tr>
                <td width="24%"><span class="style10">                Tipo de Altera&ccedil;&atilde;o: </span></td>
                <td width="76%"><span class="style10"><b><?php echo "$checkbox1"; ?></b><b> <?php echo "$checkbox2"; ?> <?php echo "$checkbox3"; ?> <?php echo "$checkbox4"; ?> <?php echo "$checkbox5"; ?> <?php echo "$checkbox6"; ?> <?php echo "$checkbox7"; ?> <?php echo "$checkbox8"; ?> <br>
                <?php echo "$outros"; ?></b></span></td>
              </tr>
            </table>
<span class="style10">*Se institui&ccedil;&atilde;o de ensino, n&uacute;mero de salas de aula: <b><?php echo "$numsala"; ?></b><br>
            <br>
            &Aacute;rea Utilizada m&sup2;: <b><?php echo "$m2"; ?></b>| N&uacute;mero de Funcion&aacute;rios</span>: <b><?php echo "$numfun"; ?></b><br>
            <span class="style10">CNAE ATIVIDADE:<b><?php echo "$cnae"; ?></b></span></td>
        </tr>
      </table>
    <table width="630"  border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td bgcolor="#333333"><span class="style12">CONTADOR</span></td>
      </tr>
    </table>
    <table width="630" border="0" cellspacing="0" cellpadding="7">
      <tr>
        <td valign="top" bgcolor="#FFFFFF"><p class="style10">Nome: <b> <?php echo "$nome_contador"; ?></b> </p>
          <p class="style10"> CPF/CNPJ: <b><?php echo "$cpf_cont"; ?></b> | Registro CRC: <b><?php echo "$crc"; ?></b> | RG: <b><?php echo "$rgcont"; ?></b><br>
            <br>
            Endere&ccedil;o: <b> <?php echo "$end_contador"; ?></b>          | Bairro: <b> <?php echo "$bairro_contador"; ?></b> | Cidade: <b> <?php echo "$cidade_contador"; ?></b> | CEP: <b> <?php echo "$cep_contador"; ?></b><br>
            <br>
            Fone: <b> <?php echo "$fone_contador"; ?></b> | E-mail: <b> <?php echo "$mail_contador"; ?></b></p>
          <span class="style10">
          <hr>
          </span>
          <p class="style10">          Declaro serem verdadeiras as informa&ccedil;&otilde;es prestadas e assumo total e inteira responsabilidade pelas mesmas, nos termos da legisla&ccedil;&atilde;o em vigor.            Em caso de domicilio fiscal, declaro estar ciente de n&atilde;o poder exercer a atividade local.
          
          </p>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="53%"><span class="style10">
			 <b> <?php 
			  $data = date("d/m/Y H:i:s ");  
			  echo "Colombo,  ".$data;
			  
			  ?></b></span></td>
              <td width="47%"><div align="center" class="style10"><br>
                _________________________________<br>
                Assinatura do Contador <em>ou</em><br>
                S&oacute;cio Administrador da Empresa</div></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td><div align="center"><span class="style10"><br>
                <br>
                _________________________________<br>
                Nome Leg&iacute;vel</span></div></td>
            </tr>
          </table><hr></td>
      </tr>
    </table>    
    <table width="630" border="0" cellspacing="0" cellpadding="10">
      <tr>
        <td valign="top" bgcolor="#FFFFFF"></td>
      </tr>
    </table>    </td>
  </tr>
  <tr>
    <td><div align="center"><FORM>
<INPUT NAME="print" TYPE="button" VALUE=">>> Imprimir este documento <<<"
ONCLICK="varitext()">

</FORM>
</div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>

</body>
</html>
