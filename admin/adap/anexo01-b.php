<?php
date_default_timezone_set('America/Sao_Paulo');
$date = date('d-m-Y H:i');

$nome = strtoupper($_POST['fantasia']);
$razao = strtoupper($_POST['razao']);
$endereco=strtoupper($_POST["endereco"]);
$num=$_POST["num"];
$bairro=strtoupper($_POST["bairro"]);
$cep=$_POST["cep"];
$telefone=$_POST["telefone"];
$email=$_POST["email"];
$fin1 = strtoupper($_POST["fin_l1"]);
$fin2 = strtoupper($_POST["fin_l2"]);
$finalidade = $fin1 . "  " . $fin2;
//$website=$_POST["website"];
//$radio=$_POST["radio"];

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

//$outros=$_POST["outros"];
$cnpj=$_POST["cnpj"];
$inscrestadual=$_POST["inscrestadual"];
$caf=strtoupper($_POST["caf"]);
$crmv=strtoupper($_POST["crmv"]);
$resp=strtoupper($_POST["resp"]);


$nome_resp=strtoupper($_POST["nome_resp"]);
$cpf_resp=$_POST["cpf_resp"];
$rg_resp=$_POST["rg_resp"];
//$crc=$_POST["crc"];
$end_resp=strtoupper($_POST["end_resp"]);
$cep_resp=$_POST["cep_resp"];
$cidade_resp=strtoupper($_POST["mun_resp"]);
$bairro_resp=strtoupper($_POST["bairro_resp"]);
$fone_resp=$_POST["fone_resp"];
$num_resp = $_POST["num_resp"];
$mun_resp = strtoupper($_POST["mun_resp"]);
$municipio=strtoupper($_POST["municipio"]);
$uf_resp = strtoupper($_POST["uf_resp"]);
$uf = strtoupper($_POST["uf"]);
$mail_resp=$_POST["mail_resp"];
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
      <p class="style10"><strong>IT04 - ANEXO 01 - MODELO DE REQUERIMENTO DE REGISTRO DE ESTABELECIMENTO  </p>
       
       <CENTER> <p class="style17"><strong>REGISTRO DE ESTABELECIMENTO  </p></CENTER>

      <p><em><span class="style10"> Ilmo/a Senhor/a Respon&aacute;vel pelo Servi&ccedil;o de Inspe&ccedil;ao Municipal.</span></em><br>
        <em><span class="style10">Venho atrav&eacute;s deste, requerer a Vossa Senhoria neste Servi&ccedil;o, o/a </span></em></p>
    </div>
   
      

      <table width="100%" border="0" cellspacing="0" cellpadding="5">
      <tr>
         <td width="210" align="left" bgcolor="#F9F9F9"><span class="style10">
          <label>
          <?php echo $checkbox1 . " " . $checkbox2 . " " . $checkbox3 . " " . $checkbox4 . " " . $checkbox5 . " " . $checkbox6 . " " . $checkbox7 . " " . $checkbox8; ?>
            </label>
         
            </td>
         </tr>
       </table>    


        <br>
    <table width="100%"  border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td bgcolor="#F9F9F9"><span class="style9"><span class="style15A">FINALIDADE / JUSTIFICATIVA:</span></span></td>
      </tr>
    </table>
 
      <table width="100%" border="0" cellspacing="0" cellpadding="5">
      <tr>
       <td width="100%" bgcolor="#F9F9F9"><span class="style10">
         <input name="fin_l1" type="text" id="fin_l1" size="82" maxlength="100" value=" <?php echo $fin1 ?> " readonly >
       </td>
      </tr>
      
      <tr>
      
        <td bgcolor="#F9F9F9"><span class="style10">
          <label></label>
          <input name="fin_l2" type="text" id="fin_l2" size="82" maxlength="100"  value=" <?php echo $fin2 ?> "readonly > 
        </td>
      </tr> 
      <tr>
       <td class="style12">
          Para o estabelecimento identificado abaixo: 
          
        </span></td>
      </tr>
      
    </table>
<br /> 

      <table width="100%"  border="0" cellspacing="0" cellpadding="2">
        <tr>
          <td bgcolor="#F9F9F9"><span class="style14"><span class="style15A">IDENTIFICA&Ccedil;&Atilde;O DO ESTABELECIMENTO</span></span></td>
        </tr>
      </table>
     
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
          <td height="31" valign="top" bordercolor="#F9F9F9" bgcolor="#F9F9F9"><input name="inscrestadual" type="text" id="inscrestadual" size="38" value=" <?php echo $inscrestadual  ?> " readonly></td>
        </tr>
        
           <tr>
          <td width="20%" bordercolor="#F9F9F9" bgcolor="#F9F9F9"><div align="left" class="style12">CAF:</div></td>
          <td width="80%" height="31" valign="top" bordercolor="#F9F9F9" bgcolor="#F9F9F9"><div align="left" class="style10">
            <label>
            <input name="caf" type="text" id="caf" size="60"value=" <?php echo $caf ?> " readonly >
            </label>
          </div></td>
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
          <td bordercolor="#F9F9F9" bgcolor="#F9F9F9"><div align="left" class="style12">Responsavel Tecnico:</div></td>
          <td height="19" valign="top" bordercolor="#F9F9F9" bgcolor="#F9F9F9"><div align="left" class="style10">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="41%" bgcolor="#F9F9F9"><input  name="resp" type="text" id="resp"  size="25" maxlength="100" value=" <?php echo $resp ?> " readonly ></td>
                <td width="59%" bgcolor="#F9F9F9" class="style12" >  &nbsp CRMV-PR :
                  <input name="crmv" type="text" id="crmv" size="20" maxlength="12"  value=" <?php echo $crmv ?> " readonly </td>
              </tr>
            </table>
          </div></td>
        



      </table>

      <table width="630"  border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td height="23" bgcolor="#F6F6F6"><hr></td>
      </tr>
    </table>

    
    <br>
    <table width="100%"  border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td bgcolor="#F9F9F9"><span class="style9"><span class="style15A">IDENTIFICA&Ccedil;&Atilde;O DO PROPRIETARIO / RESPONSAVEL LEGAL</span></span></td>
      </tr>
    </table>
    <table width="100%" border="0" cellspacing="0" cellpadding="5">
      <tr>
        <td width="120" bgcolor="#F9F9F9"><span class="style12">Nome:</span></td>
        <td width="490" bgcolor="#F9F9F9"><span class="style10">
          <label>
          <input name="nome_resp" type="text" id="nome_resp" size="60" maxlength="100" value=" <?php echo $nome_resp ?> " readonly >
          </label>
        </span></td>
      </tr>
     

      <tr>
        <td bgcolor="#F9F9F9"><span class="style12">CPF:</span></td>
        <td bgcolor="#F9F9F9"><span class="style10">
          <label></label>
          <input name="cpf_resp" type="text" id="cpf_resp" size="25" maxlength="100" value=" <?php echo $cpf_resp ?> " readonly > 
        <span class="style12"> &nbsp  &nbsp &nbsp  &nbsp    RG:   &nbsp  &nbsp </span>
          <input name="rg_resp" type="text" id="rg_resp" size="20" maxlength="25" value=" <?php echo $rg_resp ?> " readonly >
        </span></td>
      </tr>
      <tr>
        <td bgcolor="#F9F9F9"><span class="style12">Endere&ccedil;o:</span></td>
        <td bgcolor="#F9F9F9"><span class="style10">
          <input name="end_resp" type="text" id="end_resp" size="40" maxlength="100" value=" <?php echo $end_resp ?> " readonly >
         <span class="style12">  &nbsp N&ordm;:  &nbsp  &nbsp </span>
        <input name="num_resp" type="text" id="num_resp" size="7" maxlength="10" value=" <?php echo $num_resp ?> "readonly >
        </span></td>
      </tr>
   
        <tr>
        <td><span class="style12">Bairro:</span></td>
        <td><span class="style10">
          <input name="bairro_resp" type="text" id="bairro_resp" size="30" maxlength="100" value=" <?php echo $bairro_resp ?> " readonly >
        <span class="style12"> &nbsp  &nbsp  CEP:  &nbsp  &nbsp </span>
   
         <input name="cep_resp" type="text" id="cep_resp" size="16" maxlength="100" value=" <?php echo $cep_resp ?>" readonly>
        </span></td>
      </tr>
     
                 <tr>
        <td bgcolor="#F9F9F9"><span class="style12">Municipio:</span></td>
        <td bgcolor="#F9F9F9"><span class="style10">
          <label></label>
          <input name="mun_resp" type="text" id="mun_resp" size="40" maxlength="100" value=" <?php echo $mun_resp ?> " readonly> 
    <span class="style12">   &nbsp  &nbsp      UF:  &nbsp </span>
          <input name="uf_resp" type="text" id="uf_resp" size="8" maxlength="25" value=" <?php echo $uf_resp ?> " readonly>
        </span></td>
      </tr>

      <tr>
        <td bgcolor="#F9F9F9"><span class="style12">Email:</span></td>
        <td bgcolor="#F9F9F9"><span class="style10">
          <label></label>
          <input name="mail_resp" type="text" id="mail_resp" size="34" maxlength="100" value=" <?php echo $mail_resp ?> " readonly> 
      <span class="style12">  &nbsp     Telefone:  &nbsp </span>
          <input name="fone_resp" type="text" id="fone_resp" size="10" maxlength="25" value=" <?php echo $fone_resp ?> " readonly >
        </span></td>
      </tr>
    </table>
<br />
 
       <table width="100%"  border="0" cellspacing="0" cellpadding="2">
      <tr>
 <td></td>
<td></td>
          <td>  <span class="style3" > <label>Colombo , <?php echo $date; ?>    </label>  </span>  </td>
    </tr>
      <tr>
         <td><p class="style10"><strong>Nestes termos, pede deferimento.  </p> </td>
        <td></td>
         <td>   </td>
      </tr>
  </table>
<br /> 
    <?php echo $nome_resp ?>   
    <p class="style10"><strong>Responsavel pelo Estabelecimento   </p>  
 
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
