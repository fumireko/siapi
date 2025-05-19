<!DOCTYPE html>
<html>
    <head>
        <title>CEP</title>
        <script src="http://code.jquery.com/jquery-1.7.1.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
        <script src="js/gmaps.js" type="text/javascript"></script>
        <script src="js/cep.js" type="text/javascript"></script>
        <link href="css/main.css" rel="stylesheet" />
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
				
			<br /><br />
                <form onsubmit="return false">
                
<table width="516" border="0" cellspacing="0" class="style3" align="center">
<tr>
  <td height="10" colspan="2" align="center" bgcolor="#383838" style="font-size: 14px; color: #FFF; font-weight: bold; font-family: Verdana, Geneva, sans-serif;"><strong>
    <div id="divTituloCad"><strong>Pr&eacute; cadastramento Escolar para o ano letivo de 2016</strong></div>
  </strong></td>
</tr>
<tr>
     	<td height="68" colspan="2" align="center" bgcolor="#383838" style="font-size: 14px; color: #FFF; font-weight: bold;"><p>Preencha todos os campos abaixo corretamente. O preenchimento incorreto seu pr&eacute; cadastro se invalidar&aacute;.</p></td>
    </tr>
        <tr>
        <td height="39"  colspan="2 " bgcolor="#E1E1E1"class="style3" align="center"><strong>Dados do(a) Candidato(a)</strong></td>
    </tr>
    <tr>
        <td width="154" height="39" bgcolor="#E1E1E1" class="style3" align="right">Nome da Crian&ccedil;a:&nbsp;*</td>
      <td width="358" bgcolor="#E1E1E1"><input type="text" name="nsolicitante" size="70" onblur="TextBoxCaixaAlta_OnBlur(this.value, this.form.name, this.name)" 
      onkeyup="TextBoxCaixaAlta_OnKeyUp(this.value, this.form.name, this.name)"  /></td>
    </tr>
    
    <tr>
        <td width="154" height="33" bgcolor="#F0F0F0" class="style3" align="right">Data de Nascimento:&nbsp;*</td>
      <td width="358" bgcolor="#F0F0F0"><input type="text" name="email" size="70" onblur="TextBoxCaixaAlta_OnBlur(this.value, this.form.name, this.name)" 
      onkeyup="TextBoxCaixaAlta_OnKeyUp(this.value, this.form.name, this.name)"  /></td>
    </tr>
    <tr>
       <td height="29" bgcolor="#E1E1E1" class="style3"  align="right">Nome da M&atilde;e:&nbsp;*</td>
      <td width="358" bgcolor="#E1E1E1"><input type="text" name="telefone" maxlength="9"  onKeyPress="return txtBoxFormat(document.Form, 'tel', '9999-9999', event);"> </td>
    </tr>
    
<tr> 
	<td bgcolor="#F0F0F0" class="style3"  align="right">Nome do Pai:</td>
   <td bgcolor="#F0F0F0"><input type="text" name="nsolicitante2" size="70" onblur="TextBoxCaixaAlta_OnBlur(this.value, this.form.name, this.name)" 
      onkeyup="TextBoxCaixaAlta_OnKeyUp(this.value, this.form.name, this.name)"  /></td>
</tr>
<tr>
<td height="30" colspan="2" align="center" bgcolor="#E1E1E1" class="style3"><strong>Endere&ccedil;o</strong></td>

   </tr>
   <tr> 
	<td bgcolor="#F0F0F0" class="style3" align="right">CEP :</td>
   <td bgcolor="#F0F0F0"><input id="cep" name="cep" type="text" maxlength="9" placeholder="Informe o CEP" /></td>
</tr>
<tr>
       <td height="29" bgcolor="#E1E1E1" class="style3" align="right">Rua :</td>
      <td width="358" bgcolor="#E1E1E1"><input id="rua" name="rua" type="text" placeholder="Nome da Rua / Logradouro" /></td>
    </tr>
    <tr> 
	<td bgcolor="#F0F0F0" class="style3" align="right">Nº :</td>
   <td bgcolor="#F0F0F0"><input id="num" name="num" type="text" placeholder="Número" /></td>
</tr>
<tr>
       <td height="29" bgcolor="#E1E1E1" class="style3" align="right">Bairro :</td>
      <td width="358" bgcolor="#E1E1E1"><input id="bairro" name="bairro" type="text" placeholder="Informe o Bairro" /></td>
    </tr>
    <tr> 
	<td bgcolor="#F0F0F0" class="style3" align="right">Cidade :</td>
   <td bgcolor="#F0F0F0"><input id="cidade" name="cidade" type="text" placeholder="Informe a Cidade" /></td>
</tr>
<tr>
       <td height="29" bgcolor="#E1E1E1" class="style3" align="right">UF :</td>
      <td width="358" bgcolor="#E1E1E1"><input id="uf" name="uf" type="text" placeholder="Informe a UF" /></td>
    </tr>
  </table>
<table width="516" height="66" border="0" align="center">
    <tr>
      <td width="820" align="center"><input type="submit" value="ENVIA SOLICITAÇÃO" name="salvar" /></td>
    </tr>
    <tr>
      <td align="center">
      <p align="center" class="cinza"> Secretaria Municipal de Tecnologia da Informa&ccedil;&atilde;o</p></td>
    </tr>
    <tr>
      
    </tr>
  </table>               
                
         
    </body>
</html>