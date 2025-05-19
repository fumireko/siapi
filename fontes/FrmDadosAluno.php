<?php
$dtnasc = $_POST['dtnasc'];

$data_inf4inicio = '2015-04-01';
$data_inf4fim = '2015-12-31';

$data_inf5nicio = '2016-04-01';
$data_inf5fim = '2016-12-31';

if(strtotime($dta_nasc) >= strtotime($data_inf1))
{
	 echo "<script>alert('DADOS SALVOS ALUNO DO INF 1.');</script>";
	 echo "<script>history.go(-1);</script>";
exit;
}

?>

<!DOCTYPE html>
<html>
<head>
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
        <script>
            $(function()
			{
                wscep({map: 'map1',auto:true});
                wsmap('08615-000','555','map2');
            }
			)
			
			function valida(Frmchamado)
  			 {
        		if (Frmchamado.nome.value=="") 
       		 {
         		alert("Por favor, digite um nome!");
         		return(true);
			}
		return(false); 
}
        </script>
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
			<br />
            <form onsubmit="" action="SalvaCad.php" method="post">
<table width="584" border="0" cellspacing="0" class="style3" align="center">

<tr>
     	<td colspan="2" align="center" bgcolor="#383838" style="font-size: 14px; color: #FFF; font-weight: bold;"><h5>Preencha todos os campos abaixo corretamente. O preenchimento incorreto seu pr&eacute; cadastro se invalidar&aacute;.</h5></td>
  </tr>
        <tr>
        <td height="24"  colspan="2 " bgcolor="#F0F0F0" class="style3" align="center"><strong>Dados do(a) Candidato(a)</strong></td>
    </tr>
    <tr>
        <td width="173" height="26" bgcolor="#E1E1E1" class="style3" align="right">Nome da Crian&ccedil;a:&nbsp;*</td>
      <td width="407" bgcolor="#E1E1E1"><input type="text" name="nome" size="70" onblur="TextBoxCaixaAlta_OnBlur(this.value, this.form.name, this.name)" 
      onkeyup="TextBoxCaixaAlta_OnKeyUp(this.value, this.form.name, this.name)"  /></td>
    </tr>
    <tr>
        <td width="173" height="24" bgcolor="#F0F0F0" class="style3" align="right">Data de Nascimento:&nbsp;*</td>
      <td width="407" bgcolor="#F0F0F0"><input type="hidden" name="dtnasc" size="20" value="<?PHP echo $dtnasc?>" /> <?PHP echo $dtnasc?></td>
    </tr>
    <tr>
       <td height="25" bgcolor="#E1E1E1" class="style3"  align="right">Nome da M&atilde;e:&nbsp;*</td>
      <td width="407" bgcolor="#E1E1E1"><input type="text" name="nmae" maxlength="70"  onKeyPress="return txtBoxFormat(document.Form, 'tel', '9999-9999', event);"> </td>
    </tr>
<tr> 
	<td bgcolor="#F0F0F0" class="style3"  align="right">Nome do Pai:</td>
   <td bgcolor="#F0F0F0"><input type="text" name="npai" size="70" onblur="TextBoxCaixaAlta_OnBlur(this.value, this.form.name, this.name)" 
      onkeyup="TextBoxCaixaAlta_OnKeyUp(this.value, this.form.name, this.name)"  /></td>
</tr>

<tr>
       <td height="25" bgcolor="#E1E1E1" class="style3"  align="right">Telefone :</td>
      <td width="407" bgcolor="#E1E1E1"><input type="text" placeholder="Ex. 36661010 ou 99008877" name="tele" maxlength ="8"  onKeyPress="return txtBoxFormat(document.Form, 'tel', '9999-9999', event);"> </td>
    </tr>
<tr> 
	<td bgcolor="#F0F0F0" class="style3"  align="right">Email do respons�vel :</td>
   <td bgcolor="#F0F0F0"><input type="text" name="email" size="70" onblur="TextBoxCaixaAlta_OnBlur(this.value, this.form.name, this.name)" 
      onkeyup="TextBoxCaixaAlta_OnKeyUp(this.value, this.form.name, this.name)"  /></td>
</tr>
<tr>
<td height="22" colspan="2" align="center" bgcolor="#E1E1E1" class="style3"><strong>Endere&ccedil;o</strong></td>
   </tr>
   <tr> 
	<td bgcolor="#F0F0F0" class="style3" align="right">CEP : *</td>
   <td bgcolor="#F0F0F0"><input id="cep" name="cep" type="text" maxlength="9" placeholder="Informe o CEP" /></td>
</tr>
<tr>
       <td height="29" bgcolor="#E1E1E1" class="style3" align="right">Rua :</td>
      <td width="407" bgcolor="#E1E1E1"><input id="rua" name="rua" type="text" placeholder="Nome da Rua / Logradouro" /></td>
    </tr>
    <tr> 
	<td bgcolor="#F0F0F0" class="style3" align="right">N� :</td>
   <td bgcolor="#F0F0F0"><input id="num" name="num" type="text" placeholder="N�mero" /> </td>
</tr>
<tr>
       <td height="29" bgcolor="#E1E1E1" class="style3" align="right">Complemento :</td>
      <td width="407" bgcolor="#E1E1E1"><input id="comp" name="comp" type="text" placeholder="Ex. casa 2" /></td>
    </tr>

<tr>
       <td height="29" bgcolor="#F0F0F0" class="style3" align="right">Bairro :</td>
      <td width="407" bgcolor="#F0F0F0"><input id="bairro" name="bairro" type="text" placeholder="Informe o Bairro" /></td>
    </tr>
    <tr> 
	<td bgcolor="#E1E1E1" class="style3" align="right">Cidade :</td>
   <td bgcolor="#E1E1E1" ><input id="cidade" name="cidade" type="text" placeholder="Informe a Cidade" /></td>
</tr>
<tr>
       <td height="29" bgcolor="#F0F0F0" class="style3" align="right">UF :</td>
      <td width="407" bgcolor="#F0F0F0"><input id="uf" name="uf" type="text" placeholder="Informe a UF" /></td>
    </tr>
    <tr> 
	<td bgcolor="#E1E1E1" class="style3" align="right">Unidade consumidora :</td>
   <td bgcolor="#E1E1E1"><input id="cidade" name="uconsumidora" type="text" placeholder="Unidade consumidora" /></td>
</tr>
    <tr>
       <td height="88" bgcolor="#E1E1E1" class="style3" align="right" colspan="2" background="icons/unidade_consumidora_copel.jpg">&nbsp;</td>
      
    </tr>
    <tr>
<td height="22" colspan="2" align="center" bgcolor="#E1E1E1" class="style3"><strong>Unidades Educacionais pr&oacute;ximas &agrave; resid&ecirc;ncia</strong></td>
   </tr>
   <tr> 
	<td bgcolor="#F0F0F0"  align="right"><span class="style3">Escola 1</span>*:</td>
   <td bgcolor="#F0F0F0" > <select name="escola1" id="escola1" >
   <option value=""> </option>
    <option value="Escola Agripino Jo�o Tosin">Escola Agripino Jo�o Tosin</option>
    <option value="Escola �ngelo Falavinha Dalpr�">Escola �ngelo Falavinha Dalpr�</option>
    <option value="Escola Ant�nio Andr� Johnsson">Escola Ant�nio Andr� Johnsson</option>
    <option value="Escola Ant�nio Cavassin">Escola Ant�nio Cavassin</option>
    <option value="Escola Ant�nio Costa">Escola Ant�nio Costa</option>
    <option value="Escola Arlindo Andretta">Escola Arlindo Andretta</option>
    <option value="Escola Bar�o de Mau�">Escola Bar�o de Mau�</option>
    <option value="Escola CAEDAV">Escola CAEDAV</option>
    <option value="Escola Carlos Fontoura Falavinha">Escola Carlos Fontoura Falavinha</option>
    <option value="Escola Crist�v�o Colombo">Escola Crist�v�o Colombo</option>
    <option value="Escola Dr. Manoel Costacurta">Escola Dr. Manoel Costacurta</option>
    <option value="Escola Elvira Nodari Alberti">Escola Elvira Nodari Alberti</option>
    <option value="Escola Gabriel D`An�ncio Strapasson">Escola Gabriel D`An�ncio Strapasson</option>
    <option value="Escola Heitor Villa Lobos">Escola Heitor Villa Lobos</option>
    <option value="Escola Imbuial da Roseira">Escola Imbuial da Roseira</option>
    <option value="Escola Isolina Ceccon">Escola Isolina Ceccon</option>
    <option value="Escola Jd. Ana Maria">Escola Jd. Ana Maria</option>
    <option value="Escola Jd. das Flores">Escola Jd. das Flores</option>
    <option value="Escola Jd. das Gra�as">Escola Jd. das Gra�as</option>
    <option value="Escola Jd. Guaruj�">Escola Jd. Guaruj�</option>
    <option value="Escola Jd. Palmares">Escola Jd. Palmares</option>
    <option value="Escola Jo�o Batista Stocco">Escola Jo�o Batista Stocco</option>
    <option value="Escola Jo�o Jos� Gasparim">Escola Jo�o Jos� Gasparim</option>
    <option value="Escola John Kennedy">Escola John Kennedy</option>
    <option value="Escola Jos� Frederico Paulo Weigert">Escola Jos� Frederico Paulo Weigert</option>
    <option value="Escola Jovino do Ros�rio">Escola Jovino do Ros�rio</option>
    <option value="Escola Jucondo D`Agostin">Escola Jucondo D`Agostin</option>
    <option value="Escola Juscelino Kubitschek">Escola Juscelino Kubitschek</option>
    <option value="Escola Monteiro Lobato">Escola Monteiro Lobato</option>
    <option value="Escola Nossa Senhora de F�tima">Escola Nossa Senhora de F�tima</option>
    <option value="Escola Pe. �ngelo Alegrini">Escola Pe. �ngelo Alegrini</option>
  </select></td>
  <tr>
       <td height="25" bgcolor="#E1E1E1" class="style3"  align="right">Escola 2 :</td>
      <td width="407" bgcolor="#E1E1E1"> <select name="escola2" id="escola2" >
      <option value=""> </option>
    <option value="Escola Agripino Jo�o Tosin">Escola Agripino Jo�o Tosin</option>
    <option value="Escola �ngelo Falavinha Dalpr�">Escola �ngelo Falavinha Dalpr�</option>
    <option value="Escola Ant�nio Andr� Johnsson">Escola Ant�nio Andr� Johnsson</option>
    <option value="Escola Ant�nio Cavassin">Escola Ant�nio Cavassin</option>
    <option value="Escola Ant�nio Costa">Escola Ant�nio Costa</option>
    <option value="Escola Arlindo Andretta">Escola Arlindo Andretta</option>
    <option value="Escola Bar�o de Mau�">Escola Bar�o de Mau�</option>
    <option value="Escola CAEDAV">Escola CAEDAV</option>
    <option value="Escola Carlos Fontoura Falavinha">Escola Carlos Fontoura Falavinha</option>
    <option value="Escola Crist�v�o Colombo">Escola Crist�v�o Colombo</option>
    <option value="Escola Dr. Manoel Costacurta">Escola Dr. Manoel Costacurta</option>
    <option value="Escola Elvira Nodari Alberti">Escola Elvira Nodari Alberti</option>
    <option value="Escola Gabriel D`An�ncio Strapasson">Escola Gabriel D`An�ncio Strapasson</option>
    <option value="Escola Heitor Villa Lobos">Escola Heitor Villa Lobos</option>
    <option value="Escola Imbuial da Roseira">Escola Imbuial da Roseira</option>
    <option value="Escola Isolina Ceccon">Escola Isolina Ceccon</option>
    <option value="Escola Jd. Ana Maria">Escola Jd. Ana Maria</option>
    <option value="Escola Jd. das Flores">Escola Jd. das Flores</option>
    <option value="Escola Jd. das Gra�as">Escola Jd. das Gra�as</option>
    <option value="Escola Jd. Guaruj�">Escola Jd. Guaruj�</option>
    <option value="Escola Jd. Palmares">Escola Jd. Palmares</option>
    <option value="Escola Jo�o Batista Stocco">Escola Jo�o Batista Stocco</option>
    <option value="Escola Jo�o Jos� Gasparim">Escola Jo�o Jos� Gasparim</option>
    <option value="Escola John Kennedy">Escola John Kennedy</option>
    <option value="Escola Jos� Frederico Paulo Weigert">Escola Jos� Frederico Paulo Weigert</option>
    <option value="Escola Jovino do Ros�rio">Escola Jovino do Ros�rio</option>
    <option value="Escola Jucondo D`Agostin">Escola Jucondo D`Agostin</option>
    <option value="Escola Juscelino Kubitschek">Escola Juscelino Kubitschek</option>
    <option value="Escola Monteiro Lobato">Escola Monteiro Lobato</option>
    <option value="Escola Nossa Senhora de F�tima">Escola Nossa Senhora de F�tima</option>
    <option value="Escola Pe. �ngelo Alegrini">Escola Pe. �ngelo Alegrini</option>
  </select></td>
    </tr>
    <tr> 
	<td bgcolor="#F0F0F0" class="style3"  align="right">Escola 3 :</td>
   <td bgcolor="#F0F0F0"> <select name="escola3" id="escola3" >
   <option value=""> </option>
    <option value="Escola Agripino Jo�o Tosin">Escola Agripino Jo�o Tosin</option>
    <option value="Escola �ngelo Falavinha Dalpr�">Escola �ngelo Falavinha Dalpr�</option>
    <option value="Escola Ant�nio Andr� Johnsson">Escola Ant�nio Andr� Johnsson</option>
    <option value="Escola Ant�nio Cavassin">Escola Ant�nio Cavassin</option>
    <option value="Escola Ant�nio Costa">Escola Ant�nio Costa</option>
    <option value="Escola Arlindo Andretta">Escola Arlindo Andretta</option>
    <option value="Escola Bar�o de Mau�">Escola Bar�o de Mau�</option>
    <option value="Escola CAEDAV">Escola CAEDAV</option>
    <option value="Escola Carlos Fontoura Falavinha">Escola Carlos Fontoura Falavinha</option>
    <option value="Escola Crist�v�o Colombo">Escola Crist�v�o Colombo</option>
    <option value="Escola Dr. Manoel Costacurta">Escola Dr. Manoel Costacurta</option>
    <option value="Escola Elvira Nodari Alberti">Escola Elvira Nodari Alberti</option>
    <option value="Escola Gabriel D`An�ncio Strapasson">Escola Gabriel D`An�ncio Strapasson</option>
    <option value="Escola Heitor Villa Lobos">Escola Heitor Villa Lobos</option>
    <option value="Escola Imbuial da Roseira">Escola Imbuial da Roseira</option>
    <option value="Escola Isolina Ceccon">Escola Isolina Ceccon</option>
    <option value="Escola Jd. Ana Maria">Escola Jd. Ana Maria</option>
    <option value="Escola Jd. das Flores">Escola Jd. das Flores</option>
    <option value="Escola Jd. das Gra�as">Escola Jd. das Gra�as</option>
    <option value="Escola Jd. Guaruj�">Escola Jd. Guaruj�</option>
    <option value="Escola Jd. Palmares">Escola Jd. Palmares</option>
    <option value="Escola Jo�o Batista Stocco">Escola Jo�o Batista Stocco</option>
    <option value="Escola Jo�o Jos� Gasparim">Escola Jo�o Jos� Gasparim</option>
    <option value="Escola John Kennedy">Escola John Kennedy</option>
    <option value="Escola Jos� Frederico Paulo Weigert">Escola Jos� Frederico Paulo Weigert</option>
    <option value="Escola Jovino do Ros�rio">Escola Jovino do Ros�rio</option>
    <option value="Escola Jucondo D`Agostin">Escola Jucondo D`Agostin</option>
    <option value="Escola Juscelino Kubitschek">Escola Juscelino Kubitschek</option>
    <option value="Escola Monteiro Lobato">Escola Monteiro Lobato</option>
    <option value="Escola Nossa Senhora de F�tima">Escola Nossa Senhora de F�tima</option>
    <option value="Escola Pe. �ngelo Alegrini">Escola Pe. �ngelo Alegrini</option>
  </select></td>
  </tr>
    <tr>
       <td height="25" bgcolor="#E1E1E1" class="style3"  align="right">Serie :*</td>
      <td width="407" bgcolor="#E1E1E1"><select name="serie" >
          <option value=""> </option>
          <option value="PRE ESCOLAR 1 - 4 ANOS">PRE ESCOLAR 1 - 4 ANOS</option>
          <option value="PRE ESCOLAR 2 - 5 ANOS">PRE ESCOLAR 2 - 5 ANOS</option>
      </select> </td>
    </tr>
    

</table> 
<table width="516" height="66" border="0" align="center">
    <tr>
      <td width="820" align="center"><input type="submit" value="ENVIA CADASTRO" name="salvar" /></td>
  </tr>
    <tr>
      <td align="center">
      <h6 align="center"  style="color:#CCC;font-style:normal;font-family:'Courier New', Courier, monospace" > Secretaria Municipal de Tecnologia da Informa&ccedil;&atilde;o</h6></td>
    </tr>

</table>               
                
         
</body>
</html>