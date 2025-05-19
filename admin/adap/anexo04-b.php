<?php
date_default_timezone_set('America/Sao_Paulo');
$date = date('d-m-Y');

$nome = strtoupper($_POST['fantasia']);
$razao = strtoupper($_POST['razao']);
$endereco=strtoupper($_POST["endereco"]);
$num=$_POST["num"];
$bairro=strtoupper($_POST["bairro"]);
$cep=$_POST["cep"];
$telefone=$_POST["telefone"];
$email=$_POST["email"];
$rt = strtoupper($_POST["nome_rt"]);
$re = strtoupper($_POST["nome_re"]);

if (isset($_POST['checkbox1'])) {
    $checkbox1 = $_POST["checkbox1"];
} else
    $checkbox1 = "";

if (isset($_POST['checkbox2'])) {
    $checkbox2 = $_POST["checkbox2"];
} else
    $checkbox2 = "";
if (isset($_POST['checkbox3'])) {
    $checkbox3 = $_POST["checkbox3"];
} else
    $checkbox3 = "";
if (isset($_POST['checkbox4'])) {
    $checkbox4 = $_POST["checkbox4"];
} else
    $checkbox4 = "";
if (isset($_POST['checkbox5'])) {
    $checkbox5 = $_POST["checkbox5"];
} else
    $checkbox5 = "";

if (isset($_POST['checkbox6'])) {
    $checkbox6 = $_POST["checkbox6"];
} else
    $checkbox6 = "";

if (isset($_POST['checkbox7'])) {
    $checkbox7 = $_POST["checkbox7"];
} else
    $checkbox7 = "";


if (isset($_POST['checkbox8'])) {
    $checkbox8 = $_POST["checkbox8"];
} else
    $checkbox8 = "";

$cnpj=$_POST["cnpj"];
$inscrestadual=$_POST["inscrestadual"];

$municipio=strtoupper($_POST["municipio"]);

$uf = strtoupper($_POST["uf"]);

$fone=$_POST["telefone"];


if (($endereco == "") || ($email ==""))

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
    .style2 {
        font-size: 12px
    }

    .style3 {
        font-size: 10px;
        font-family: Tahoma, Verdana;
        font-weight: bold;
    }

    .style5 {
        font-size: 18px;
        font-family: Arial, Helvetica, sans-serif;
    }

    .style8 {
        font-size: 14px
    }

    .style9 {
        color: #FFFFFF;
        font-weight: bold;
        font-size: 12px;
    }

    .style10 {
        font-family: Tahoma, Verdana;
        font-size: 12px;
    }

    .style12 {
        font-family: Tahoma, Verdana;
        font-size: 12px;
        font-weight: bold;
    }

    .style14 {
        color: #FFFFFF;
        font-weight: bold;
        font-family: Tahoma, Verdana;
        font-size: 12px;
    }

    .style15 {
        color: #FFFFFF;
        font-weight: bold;
        font-family: Tahoma, Verdana;
        font-size: 14px;
    }

    .style15A {
        color: #000000;
        font-weight: bold;
        font-family: Tahoma, Verdana;
        font-size: 14px;
    }

    .style16 {
        font-size: 9px;
        font-style: italic;
        font-weight: bold;
    }

    .style17 {
        font-family: Arial, Helvetica, sans-serif
    }

    .style18 {
        font-size: 18px
    }

    .style161 {
        font-family: Tahoma, Verdana;
        font-size: 12px;
        font-weight: bold;
    }

    .style19 {
        font-family: Arial, Helvetica, sans-serif
    }

    span {
        font-size: 9px;
    }

    .style10 em {
        color: #F00;
    }

    .style10 em {
        font-weight: bold;
    }

    @media print {
        #noprint {
            display: none;
        }

        body {
            background: #fff;
        }
    }

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

<body>

<table width="514" border="0" cellspacing="0" cellpadding="2"><br>
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
     <br /><CENTER> <p class="style17"><strong>IT04 - ANEXO 04 - DECLARA&Ccedil;&Atilde;O DE PROCED&Ecirc;NCIA DA &Aacute;GUA DE ABASTECIMENTO </p>  </CENTER>
            <br /> 
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


        <br />
<table width="100%"  border="0" cellspacing="0" cellpadding="3">
        <tr>
          <td width="20%" bordercolor="#F9F9F9" bgcolor="#F9F9F9"><div align="left" class="style12">Raz&atilde;o Social:</div></td>
          <td width="80%" height="31" valign="top" bordercolor="#F9F9F9" bgcolor="#F9F9F9"><div align="left" class="style10">
            <label>
            <input name="razao" type="text" id="razao" size="60" value=" <?php echo $razao ?> " readonly >
            </label>
          </div></td>
        </tr>
           <tr>
          <td width="20%" bordercolor="#F9F9F9" bgcolor="#F9F9F9"><div align="left" class="style12">Nome Fantasia:</div></td>
          <td width="80%" height="31" valign="top" bordercolor="#F9F9F9" bgcolor="#F9F9F9"><div align="left" class="style10">
            <label>
            <input name="fantasia" type="text" id="fantasia" size="60" value=" <?php echo $nome ?>" readonly>
            </label>
          </div></td>
        </tr>


        <tr>
          <td bordercolor="#F9F9F9" bgcolor="#F9F9F9"><span class="style12">CNPJ:</span></td>
          <td height="31" valign="top" bordercolor="#F9F9F9" bgcolor="#F9F9F9"><span class="style10">
            <input name="cnpj" type="text" id="cnpj" size="38" maxlength="18" value=" <?php echo $cnpj ?> " readonly>
            &nbsp  &nbsp  </td>
        </tr>
        <tr>
          <td bordercolor="#F9F9F9" bgcolor="#F9F9F9"><span class="style12">Inscri&ccedil;&atilde;o Estadual:</span></td>
          <td height="31" valign="top" bordercolor="#F9F9F9" bgcolor="#F9F9F9"><input name="inscrestadual" type="text" id="inscrestadual" size="38" value=" <?php echo $inscrestadual ?> " readonly></td>
        </tr>
          
      
          <tr>
          <td bordercolor="#F9F9F9" bgcolor="#F9F9F9"><div align="left" class="style12">Endere&ccedil;o:</div></td>
          <td height="19" valign="top" bordercolor="#F9F9F9" bgcolor="#F9F9F9"><div align="left" class="style10">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="41%" bordercolor="#F9F9F9" bgcolor="#F9F9F9"><input  name="endereco" type="text" id="endereco"  size="45" maxlength="100" value=" <?php echo $endereco ?> " readonly></td>
                <td width="59%" bordercolor="#F9F9F9" bgcolor="#F9F9F9"class="style12">  &nbsp N&ordm;: 
                  <input name="num" type="text" id="num" size="5" maxlength="100" value=" <?php echo $num ?> " readonly  ></td>
              </tr>
            </table>
          </div></td>
        </tr>
          
                 
        <tr>
          <td bordercolor="#F9F9F9" bgcolor="#F9F9F9"><div align="left" class="style12">Bairro:</div></td>
          <td height="19" valign="top" bordercolor="#F9F9F9" bgcolor="#F9F9F9"><div align="left" class="style10">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="41%" bordercolor="#F9F9F9" bgcolor="#F9F9F9"><input  name="bairro" type="text" id="bairro" size="35"  maxlength="100"  value=" <?php echo $bairro ?> " readonly ></td>
                <td width="59%" bordercolor="#F9F9F9" bgcolor="#F9F9F9"class="style12"> &nbsp  &nbsp  CEP: &nbsp  &nbsp
                     <input name="cep" type="text" id="cep" size="9" maxlength="10"  value=" <?php echo $cep ?> " readonly >
           </div></td>
                    
                    
              </tr>
            </table>
          </div></td>
        </tr>
       
       <tr>
          <td bordercolor="#F9F9F9" bgcolor="#F9F9F9"><div align="left" class="style12">Municipio:</div></td>
          <td height="19" valign="top" bordercolor="#F9F9F9" bgcolor="#F9F9F9"><div align="left" class="style10">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="41%" bordercolor="#F9F9F9" bgcolor="#F9F9F9"><input  name="municipio" type="text" id="municipio"  size="45" maxlength="100" value=" <?php echo $municipio ?> " readonly></td>
                <td width="59%" bordercolor="#F9F9F9" bgcolor="#F9F9F9" class="style12" >  &nbsp UF :
                  <input name="uf" type="text" id="uf" size="3" maxlength="100" value=" <?php echo $uf ?> " readonly></td>
              </tr>
            </table>
          </div></td>
        </tr>
       
    
       <tr>
          <td bordercolor="#F9F9F9" bgcolor="#F9F9F9"><div align="left" class="style12">Email:</div></td>
          <td height="19" valign="top" bordercolor="#F9F9F9" bgcolor="#F9F9F9"><div align="left" class="style10">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="41%" bordercolor="#F9F9F9" bgcolor="#F9F9F9"><input  name="email" type="text" id="email"  size="30" maxlength="100" value=" <?php echo $email ?> " readonly ></td>
                <td width="59%" bordercolor="#F9F9F9" bgcolor="#F9F9F9"class="style12" >  &nbsp Telefone :
                  <input name="telefone" type="text" id="telefone" size="15" maxlength="12" value=" <?php echo $fone ?> " readonly </td>
              </tr>
            </table>
          </div></td>
        </tr>
    
    <tr>
          <td bordercolor="#F9F9F9" bgcolor="#F9F9F9"></td>
          <td height="19" valign="top" bordercolor="#F9F9F9" bgcolor="#F9F9F9"><div align="left" class="style10">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="41%" bgcolor="#F9F9F9"></td>
                <td width="59%" bgcolor="#F9F9F9" class="style12" >
                  </td>
              </tr>
            </table>
          </div></td>
   

      </table>
<br />

 
    <table width="100%"  border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td><p class="style10"><strong> E comprometo-me a estar ciente e cumprir todas as legisla&ccedil;oes vigentes, a fim de evitar san&ccedil;oes legais previstas.  </p> </td>
        <td>  &nbsp   &nbsp  </td></td>
        <td></td>
       </tr>
    </table>
    <table width="100%"  border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td>  &nbsp   &nbsp  &nbsp   &nbsp  </td>
          <td>  &nbsp   &nbsp  &nbsp   &nbsp </td>
          <td>  <span class="style3" > Colombo, <?php echo $date; ?>  </span>  &nbsp   &nbsp </td>
         </tr>
    </table>

<br /> 


       <table width="100%"  border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td>  <u>  <?php echo $rt; ?>  </u>   </td>
        <td></td>
        <td>   <u> <?php echo $re; ?>   </u>   </td>
      </tr>
      <tr>
        <td> <strong>Responsavel Tecnico    </td>
        <td></td>
        <td>  <strong>Responsavel pelo Estabelecimento     </td>
      </tr>
  </table>

    <br />
 
 <FORM>
       <center>
     <div id="noprint">
<INPUT NAME="print" TYPE="button" VALUE=">>> Imprimir este documento <<<"
ONCLICK="varitext()">
         </div>
         </center>


</FORM>
</div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>

</body>
</html>
