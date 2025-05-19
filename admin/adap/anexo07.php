
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>ANEXO 07</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
 <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
  <script type="text/javascript" src="js/qunit-1.11.0.js"></script>
  <script src="js/jquery-mask-min.js"></script>    

<style type="text/css">
<!--
.style2 {font-size: 12px}
.style3 {
	font-size: 10px;
	font-family: Tahoma, Verdana;
	font-weight: bold;
}
.style5 {
	font-size: 18px;
	font-family: Arial, Helvetica, sans-serif;
}
.style8 {font-size: 14px}
.style9 {
	color: #FFFFFF;
	font-weight: bold;
	font-size: 12px;
}
.style10 {
	font-family: Tahoma, Verdana;
	font-size: 12px;
}
.style12 {font-family: Tahoma, Verdana; font-size: 12px; font-weight: bold; }
.style14 {
	color: #FFFFFF;
	font-weight: bold;
	font-family: Tahoma, Verdana;
	font-size: 12px;
}
.style15 {color: #FFFFFF; font-weight: bold; font-family: Tahoma, Verdana; font-size: 14px; }
.style15A { color: #000000; font-weight: bold; font-family: Tahoma, Verdana; font-size: 14px; }
.style16 {
	font-size: 9px;
	font-style: italic;
	font-weight: bold;
}
.style17 {font-family: Arial, Helvetica, sans-serif}
.style18 {font-size: 18px}
.style161 {font-family: Tahoma, Verdana; font-size: 12px; font-weight: bold; }
.style19 {font-family: Arial, Helvetica, sans-serif}
span {
	font-size: 9px;
}
.style10 em {
	color: #F00;
}
.style10 em {
	font-weight: bold;
}


-->
</style>


<script language="javascript" type="text/javascript">
function formatar(mascara, documento)
{
  var i = documento.value.length;
  var saida = mascara.substring(0,1);
  var texto = mascara.substring(i)

  if (texto.substring(0,1) != saida)
  {
   documento.value += texto.substring(0,1);
  }
  
}
	function validar() 
{
	var nome = form.nome.value;
	var telefone = form.telefone.value;
	var email = form.email.value;
	var idade = form.idade.value;

	if (nome == "") 
	{
	 alert('Preencha o campo com seu nome!');
	 form.nome.focus();
	 return false;
	}

	if (email == "") 
	{
	 alert('Preencha o campo com seu email!');
	 form.email.focus();
	 return false;
	}

	if (telefone == "") 
	{
	 alert('Preencha o campo com seu telefone!');
	 form.telefone.focus();
	 return false;
	}

	if (idade == "") 
	{
	 alert('Entre com a sua idade!');
	 form.idade.focus();
	 return false;
	}

	
	if (nome.length < 5) 
	{
	 alert('Digite seu nome completo');
	 form.nome.focus();
	 return false;
	}
}

  function ins_solicitante() {
  var n1 = document.getElementById('nome_resp').value;
  document.getElementById('nome_rt').value = n1;
}



</script>
</head>

<body>
<?php
date_default_timezone_set('America/Sao_Paulo');
$date = date('d-m-Y');

?>
<form target="_blank" name="forms" action="anexo07-b.php" method="post" enctype="multipart/form-data">

<table width="514" border="0" cellspacing="0" cellpadding="2">
<td width="816">
  <tr>
    <td align="center" bgcolor="#F6F6F6"><table width="630" border="1" cellpadding="8">
      <tr>
        <td><img src="cabecalho_reg1.png" alt="" ></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td bgcolor="#F6F6F6"></td>
  </tr>
  <tr>
    <td align="center" bordercolor="#CCCCCC" bgcolor="#F6F6F6"><div align="left">
  <CENTER> <p class="style17"><strong>IT04 ANEXO 7 – MODELO REQUERIMENTO DE SOLICITAÇÃO DE VISTORIA PRÉVIA
  TERRENO.</p></CENTER>
     
    </div>
    
  <table>
  <tr>
  <td align="center"><center><p class="style17">
  REQUERIMENTO DE VISTORIA PRÉVIA DO TERRENO</p></center></td>
  </tr>
  </table>

      <table>
        <tr>
          <td width="20%" bordercolor="#F9F9F9" bgcolor="#F9F9F9"><div align="left" class="style10">Timbre da empresa:</div></td>
          <td><input name="blob_timbre" type="file" id="blob_timbre"></td>
        </tr>
      </table>

        <br /> 
        <br>
        <br /> 

    <table width="100%"  border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td bgcolor="#F9F9F9"><span class="style9"><span class="style14"><span class="style15A">Ilmo/a Senhor/a Coordenador do Serviço de Inspeção Municipal / Produtos de Origem Animal – SIM/POA</span></span></span></td>
      </tr>
    </table>

    <table>
    <br /> 
    <br /> 

      <tr>
        <td bgcolor="#F9F9F9">
          <span class="style9"><span class="style14"><span class="style15A">Eu, </span></span></span>
        </td>
      </tr>
      <tr>
        <td width="20%" bordercolor="#F9F9F9" bgcolor="#F9F9F9"><div align="left" class="style10">Nome do requerente:</div></td>
        <td><input name="nome_resp" type="text" id="nome_resp" size="60" maxlength="100"  onblur="ins_solicitante();"  onChange="javascript:this.value=this.value.toUpperCase();"></td>
      </tr>
    </table>

    <br>

    <table width="100%"  border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td bgcolor="#F9F9F9">
          <span class="style9"><span class="style14"><span class="style15A">venho através deste, requerer VISTORIA PRÉVIA para a possível instalação de um(a):</span></span></span>
        </td>
      </tr>
    </table>

    <br>  

    <table>
      <tr>
        <td width="20%" bordercolor="#F9F9F9" bgcolor="#F9F9F9"><div align="left" class="style10">Especificação da indústria:</div></td>
        <td><input name="especificacao" type="text" id="especificacao" size="60" maxlength="100"  onblur="ins_solicitante();"  onChange="javascript:this.value=this.value.toUpperCase();"></td>
      </tr>
    </table>
    
  <br /> 

    <table width="100%"  border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td bgcolor="#F9F9F9">
          <span class="style9"><span class="style14"><span class="style15A">Declaração:</span></span></span>
        </td>
      </tr>
      <tr>
        <td bgcolor="#F9F9F9">
          <span class="style9"><span class="style14"><span class="style15A">Concordo em acatar todas as exigências constantes das Normas e Regulamentos do Serviço de Inspeção Municipal/Produtos de Origem Animal- SIM/POA, bem como, as editadas pela Consórcio Metropolitano de Serviços do Paraná - COMESP.</span></span></span>
        </td>
      </tr>
    </table>

    <br>

    <table>
      <tr>
        <td bgcolor="#F9F9F9">
          <span class="style9"><span class="style14"><span class="style15A">Declaro para os devidos fins e efeitos legais que as informações acima descritas são verdadeiras e que todos os documentos ora anexados são verídicos e conferem com os originais.</span></span></span>
        </td>
      </tr>
    </table>

    <br>

    <table width="100%"  border="0" cellspacing="0" cellpadding="2" style="border: 1px solid black">
      <tr>
        <td bgcolor="#F9F9F9">
          <span class="style9"><span class="style14"><span class="style15A">Carimbo da empresa:</span></span></span>
          <br><br><br><br><br>
          <br>
        </td>
      </tr>
    </table>

    <br>

<span class="style3" > <label>Colombo , <?php echo $date; ?>    </label>  </span> 
<br /> <br /> <br />

    <input name="nome_req" type="text" id="nome_req" size="40" maxlength="25"><br />
<span class="style3" > <label><strong>Assinatura do requerente</label>  </span> 



       <p>
          <input type="submit" name="Submit" value="GERAR ARQUIVO PARA IMPRESS&Atilde;O" onClick="return validar()">
       </p>
  
</form>
</body>
</html>
