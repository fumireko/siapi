<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script language="javascript">

 function valida(frmPac)
   {
		if (document.getElementById ('ok').checked == false) 
        {
         alert("Assine os termos de ciencia sobre o cadastro!");
         return(false);
		}
		return(true); 
}
</script>

<title>TERMO</title>
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

<form method="post" action="FrmCadAluno.php" name="frmPac" onSubmit="return(valida(this))">
<table width="929" border="0" cellpadding="20" cellspacing="0" class="style3" align="center">
<tr>
  <td height="24" colspan="2" align="center" bgcolor="#383838" style="font-size:16px; color: #FFF; font-weight: bold; font-family: Verdana, Geneva, sans-serif;"><strong>Pr&eacute; cadastramento Escolar para o ano letivo de 2016</strong></td>
</tr>
<tr>
     
      <td width="600" height="233" bgcolor="#E1E1E1"  style="font-size:14px; color: #000; font-weight:!important  font-family: Verdana, Geneva, sans-serif;" ><h4 class="style3"><strong>O Cadastramento Escolar da Rede Municipal de Ensino de Colombo para o ano letivo de 2016, ser&aacute; realizado no per&iacute;odo de 15 de junho a 31 de julho de 2015, para as crian&ccedil;as nascidas em 2010, 2011 e de 1&ordm; de Janeiro a 31 de Mar&ccedil;o de 2012.</strong></h4>
        <h4 class="style3"><strong>De acordo com a Constitui&ccedil;&atilde;o Federal (Emenda Constitucional n&deg; 59/2009), a educa&ccedil;&atilde;o b&aacute;sica obrigat&oacute;ria e gratuita passou a ser dos 4 (quatro) aos 17 (dezessete) anos de idade e a Resolu&ccedil;&atilde;o CNE/CEB n&ordm; 06/2010 artigo 2&ordm;.</strong></h4>
        <h4 class="style3"><strong>Assim, os pais ou respons&aacute;veis interessados dever&atilde;o realizar o cadastramento.</strong></h4>
        <h4><span class="style3"><strong>Este procedimento visa apenas organizar o atendimento n&atilde;o vale como matricula e n&atilde;o descarta o comparacimento ate a unidade de ensino para efetivar a matricula das crian&ccedil;as que ingressar&atilde;o na educa&ccedil;&atilde;o infantil &ndash; pr&eacute;-escola e no 1&ordm; ano do ensino fundamental no ano de 2016.</strong>&nbsp;</span><br />
        </h4>
        <div id="divRvAceiteCad">
          <h4>
            <input type="checkbox" name="ok" id="ok" value="ok" />
            <strong>Declaro que estou ciente das informa&ccedil;&otilde;es acima.</strong></h4>
      </div>        <h4>&nbsp;</h4></td>
    </tr>
    
    
  </table>
  <table width="925" border="0" align="center">
    <tr>
      <td align="center"><input type="submit" value="CADASTRAR" name="cadastrar" /></td>
    </tr>
  
      <td align="center"><div align="center"><br />
      </div>
      <p align="center" class="cinza"> Secretaria Municipal de Tecnologia da Informa&ccedil;&atilde;o</p></td>
    </tr>
  </table>
  <p>&nbsp; </p>
  <div align="center"></div>
</form>
</body>
</html>