<?php

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script language="javascript">

 function valida(Frmchamado){
		if (Frmchamado.dtnasc.value =="")
		{
		alert("Digte a data de nscimento da crina�a!")
		return (false);
		}
		data = document.Frmchamado.dtnasc.value;
		data = data.split("/");
		dia = data[0]; 
		m�s = data[1];
		ano = data[2];
		anoAtual = new Date();
        ano = parseInt( ano );
		if (ano != 2010 && ano != 2011)
		{
			alert("A criança deve ter 4 ou 5 anos para esse recadastramento");
			return (false);
		}
		//sdocument.form.txtIdade.value = ano; 
	return(true);
 }
function mascara_data(data){ 
              var mydata = ''; 
              mydata = mydata + data; 
              if (mydata.length == 2){ 
                  mydata = mydata + '/'; 
                  document.forms[0].dtnasc.value = mydata; 
              } 
              if (mydata.length == 5){ 
                  mydata = mydata + '/'; 
                  document.forms[0].dtnasc.value = mydata; 
              } 
              if (mydata.length == 10){ 
                  verifica_data(); 
              } 
          } //
</script>

<title>PR&Egrave; CADASTRO</title>
<style type="text/css">
body p {
	font-family: Verdana, Geneva, sans-serif;
}
body p {
	font-size: 10px;
	font-family: Verdana, Geneva, sans-serif;
	font-weight: normal;
}
.style3 {
	font-family: Verdana, Geneva, sans-serif;
	font-size: 12px;
}
.cinza {
	color: #999;
}
</style>
</head>
<body onload="buscaEstados()">

<form method="post" action="FrmDadosAluno.php" name="Frmchamado" onSubmit="return(valida(this))">
<table width="706" border="0" cellpadding="10" cellspacing="0" class="style3" align="center">
<tr>
  <td height="24" colspan="2" align="center" bgcolor="#383838" style="font-size: 14px; color: #FFF; font-weight: bold; font-family: Verdana, Geneva, sans-serif;">Solcita&ccedil;&atilde;o de pr&eacute; cadastro!</td>
</tr>
<tr>
     	<td height="24" colspan="2" align="left" bgcolor="#383838" style="font-size: 14px; color: #FFF; font-weight: bold;"><p>Preencha todos os campos abaixo corretamente. O preenchimento incorreto ou incompleto invalidar&aacute; seu pr&eacute; cadastro!</p></td>
    </tr>
              <td width="686" bgcolor="#F0F0F0" class="style3" align="center"><h3>DIGITE A DATA DE NASCIMENTO DA CRIAN&Ccedil;A</h3></td>
    </tr>
 
      <td width="686" bgcolor="#F0F0F0" align="center"><p><input type="text" name="dtnasc" maxlength="10" OnKeyUp="mascara_data(this.value);" />
      </p>
        <table>
            <tbody>
              <tr>
                <td align="center">Formato da data:&nbsp;<strong>dd/mm/aaaa</strong></td>
              </tr>
              <tr>
                <td align="center">Exemplo: 25/07/2010</td>
              </tr>
            </tbody>
        </table>
        <p>&nbsp; </p></td>
    </tr>
  </table>
  </p>
  <table width="925" border="0" align="center">
    <tr>
      <td align="center"><input type="submit" value="ENVIA SOLICITAÇÃO" name="salvar" /></td>
    </tr>
    <tr>
      <td align="center">
      <p align="center" class="cinza"> Secretaria Municipal de Tecnologia da Informa&ccedil;&atilde;o</p></td>
    </tr>
    <tr>
      
    </tr>
  </table>
  <p>&nbsp; </p>
  <div align="center"></div>
</form>
</body>
</html>