
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>ANEXO 04</title>
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
<form target="_blank" name="forms" action="anexo04-b.php" method="post" >

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
  <CENTER> <p class="style10"><strong>IT04 - ANEXO 04 - DECLARA&Ccedil;&Atilde;O DE PROCED&Ecirc;NCIA DA &Aacute;GUA DE ABASTECIMENTO </p>  </CENTER>
     
    </div>
   
  
        <br>
            <br /> <br />

         <table width="100%"  border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td> <span class="style15A">Declaro para fins  &nbsp de  &nbsp obten&ccedil;ao do registro  &nbsp  do  &nbsp  estabelecimento,  &nbsp  que  &nbsp  a  &nbsp  instala&ccedil;&atilde;o  &nbsp  do </span>  </td>
        </tr> <tr>
          <td> <span class="style15A"> sistema de abastecimento  &nbsp / &nbsp   tratamento de &aacute;gua,  destinadas a produ&ccedil;&atilde;o, segue  todas as  </span> </td>
         </tr> <tr>
             <td>  <span class="style15A">normas  &nbsp  ou  &nbsp  dispostos legais. E garante as  &nbsp  vaz&ocirc;es da &aacute;gua &nbsp e  &nbsp  purezas  &nbsp   compat&iacute;veis  &nbsp  as  </span> </td>
        </tr> <tr>
             <td> <span class="style15A">necessidades operacionais da empresa:  </span>  </td>
      </tr>
     
  </table>






      <br /> <br />

      <table width="100%"  border="0" cellspacing="0" cellpadding="3">
        <tr>
          <td width="20%" bordercolor="#F9F9F9" bgcolor="#F9F9F9"><div align="left" class="style10">Raz&atilde;o Social:</div></td>
          <td width="80%" height="31" valign="top" bordercolor="#F9F9F9" bgcolor="#F9F9F9"><div align="left" class="style10">
            <label>
            <input name="razao" type="text" id="razao" size="60"  onChange="javascript:this.value=this.value.toUpperCase();">
            </label>
          </div></td>
        </tr>
           <tr>
          <td width="20%" bordercolor="#F9F9F9" bgcolor="#F9F9F9"><div align="left" class="style10">Nome Fantasia:</div></td>
          <td width="80%" height="31" valign="top" bordercolor="#F9F9F9" bgcolor="#F9F9F9"><div align="left" class="style10">
            <label>
            <input name="fantasia" type="text" id="fantasia" size="60"  onChange="javascript:this.value=this.value.toUpperCase();">
            </label>
          </div></td>
        </tr>


        <tr>
          <td bordercolor="#F9F9F9" bgcolor="#F9F9F9"><span class="style10">CNPJ:</span></td>
          <td height="31" valign="top" bordercolor="#F9F9F9" bgcolor="#F9F9F9"><span class="style10">
            <input name="cnpj" type="text" id="cnpj" size="38" maxlength="18" >
            &nbsp  &nbsp  <span class="style16">Digite somente n&uacute;meros.</span></span></td>
        </tr>
        <tr>
          <td bordercolor="#F9F9F9" bgcolor="#F9F9F9"><span class="style10">Inscri&ccedil;&atilde;o Estadual:</span></td>
          <td height="31" valign="top" bordercolor="#F9F9F9" bgcolor="#F9F9F9"><input name="inscrestadual" type="text" id="inscrestadual" size="38" onBlur="upperMe2()"></td>
        </tr>
        
              <tr>
          <td bordercolor="#F9F9F9" bgcolor="#F9F9F9"><div align="left" class="style10">Endere&ccedil;o:</div></td>
          <td height="19" valign="top" bordercolor="#F9F9F9" bgcolor="#F9F9F9"><div align="left" class="style10">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="41%" bordercolor="#F9F9F9" bgcolor="#F9F9F9"><input  name="endereco" type="text" id="endereco"  size="45" maxlength="100" onChange="javascript:this.value=this.value.toUpperCase();"></td>
                <td width="59%" bordercolor="#F9F9F9" bgcolor="#F9F9F9">  &nbsp N&ordm;:
                  <input name="num" type="text" id="num" size="5" maxlength="100" ></td>
              </tr>
            </table>
          </div></td>
        </tr>
          
                 
        <tr>
          <td bordercolor="#F9F9F9" bgcolor="#F9F9F9"><div align="left" class="style10">Bairro:</div></td>
          <td height="19" valign="top" bordercolor="#F9F9F9" bgcolor="#F9F9F9"><div align="left" class="style10">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="41%" bordercolor="#F9F9F9" bgcolor="#F9F9F9"><input  name="bairro" type="text" id="bairro" size="35"  maxlength="100" onChange="javascript:this.value=this.value.toUpperCase();"></td>
                <td width="59%" bordercolor="#F9F9F9" bgcolor="#F9F9F9"> &nbsp  &nbsp  CEP:
                     <input name="cep" type="text" id="cep" size="9" maxlength="10"  onKeyPress="formatar('##.###-###', this)">
            <span class="style16">somente n&uacute;meros</span></div></td>
                    
                    
              </tr>
            </table>
         
      
      </div></td>
        </tr>
       
       <tr>
          <td bordercolor="#F9F9F9" bgcolor="#F9F9F9"><div align="left" class="style10">Municipio:</div></td>
          <td height="19" valign="top" bordercolor="#F9F9F9" bgcolor="#F9F9F9"><div align="left" class="style10">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="41%" bordercolor="#F9F9F9" bgcolor="#F9F9F9"><input  name="municipio" type="text" id="municipio"  size="45" maxlength="100" onChange="javascript:this.value=this.value.toUpperCase();"></td>
                <td width="59%" bordercolor="#F9F9F9" bgcolor="#F9F9F9">  &nbsp UF :
                  <input name="uf" type="text" id="uf" size="3" maxlength="100" onChange="javascript:this.value=this.value.toUpperCase();"></td>
              </tr>
            </table>
          </div></td>
        </tr>
       
    
       <tr>
          <td bordercolor="#F9F9F9" bgcolor="#F9F9F9"><div align="left" class="style10">Email:</div></td>
          <td height="19" valign="top" bordercolor="#F9F9F9" bgcolor="#F9F9F9"><div align="left" class="style10">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="41%" bordercolor="#F9F9F9" bgcolor="#F9F9F9"><input  name="email" type="text" id="email"  size="30" maxlength="100"  ></td>
                <td width="59%" bordercolor="#F9F9F9" bgcolor="#F9F9F9">  &nbsp Telefone :
                  <input name="telefone" type="text" id="telefone" size="15" maxlength="12" </td>
              </tr>
            </table>
          </div></td>
        </tr>
    
    <tr>
          <td bordercolor="#F9F9F9" bgcolor="#F9F9F9"></td>
          <td height="19" valign="top" bordercolor="#F9F9F9" bgcolor="#F9F9F9">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="41%" bgcolor="#F9F9F9"></td>
                <td width="59%" bgcolor="#F9F9F9"> </td>
              </tr>
            </table>
          </td>

      </table>

       <table width="100%"  border="0" cellspacing="0" cellpadding="2">
      <tr>
 <td></td>
<td></td>
          <td>    </td>
    </tr>
      <tr>
         <td><p class="style10"><strong> E comprometo-me a estar ciente e cumprir todas as legisla&ccedil;oes vigentes, a fim de evitar san&ccedil;oes legais previstas.  </p> </td>
        <td></td>
         <td>  </td>
      </tr>
  </table>
<span class="style3" > <label>Colombo , <?php echo $date; ?>    </label>  </span> 
<br /> <br />

       <table width="100%"  border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td>   <input name="nome_rt" type="text" id="nome_rt" size="40" maxlength="25">   </td>
        <td></td>
        <td>   <input name="nome_re" type="text" id="nome_re" size="40" maxlength="25">    </td>
      </tr>
      <tr>
        <td> <strong>Responsavel Tecnico    </td>
        <td></td>
        <td>  <strong>Responsavel pelo Estabelecimento     </td>
      </tr>
  </table>


    
    <p>
        <input type="submit" name="Submit" value="GERAR ARQUIVO PARA IMPRESS&Atilde;O" onClick="return validar()">
        </p>
  
</form>
</body>
</html>
