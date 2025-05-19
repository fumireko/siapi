<?php
date_default_timezone_set('America/Sao_Paulo');
$date = date('d-m-Y');

$nome_resp = strtoupper($_POST['nome_resp']);
$nome_req = strtoupper($_POST['nome_req']);
$especificacao=$_POST["especificacao"];

if (($nome_resp == "") || ($especificacao ==""))

  {

    echo "<script>alert('Todos os campos devem ser preenchidos para concluir. Volte a tela anterior e finalize por favor.');</script>";

	echo "<script>javascript:history.go(-1)</script>";
	
	exit();

  } 

  $img = $_FILES['blob_timbre'];
  $blob = file_get_contents($img['tmp_name']);
?>



<html>
<head>
<title>www.colombo.pr.gov.br</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
    .img-fluid {
      width: auto;
      max-height: 20em;
    }
    .img-container {
      display: flex;
      align-items: center;
      text-align: center;
    }
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
         <tr class="img-container">
           <td>
           <?php echo '<img class="img-fluid" src="data:image;base64,'.base64_encode($blob).'" alt="Imagem enviada">'; ?>
           </td>
         </tr>
       </table>
 
       <br>
        <br /> 

    <table width="100%"  border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td bgcolor="#F9F9F9"><span class="style9"><span class="style14"><span class="style15A">Ilmo/a Senhor/a Coordenador do Serviço de Inspeção Municipal / Produtos de Origem Animal – SIM/POA</span></span></span></td>
      </tr>
    </table>

    <table>
    <br /> 

      <tr>
        <td bgcolor="#F9F9F9">
          <span class="style9"><span class="style14"><span class="style15A">Eu, </span></span></span>
        </td>
      </tr>
      <tr>
        <td width="20%" bordercolor="#F9F9F9" bgcolor="#F9F9F9"><div align="left" class="style10">Nome do requerente:</div></td>
        <td><input name="nome_resp" type="text" id="nome_resp" size="60" maxlength="100"  onblur="ins_solicitante();"  value="<?= $nome_resp ?>" readonly></td>
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
        <td><input name="especificacao" type="text" id="especificacao" size="60" maxlength="100"  onblur="ins_solicitante();"  value="<?= $especificacao ?>" readonly></td>
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
          <br><br><br>
        </td>
      </tr>
    </table>

    <br>

    

<span class="style3" > <label>Colombo , <?php echo $date; ?>    </label>  </span> 
<br /> <br /> 

<u> <?php echo $nome_req; ?>   </u> <br />
<span class="style3" > <label><strong>Assinatura do requerente</label>  </span> 

<FORM>
     <center>
     <div id="noprint">
<INPUT NAME="print" TYPE="button" VALUE=">>> Imprimir este documento <<<"
ONCLICK="varitext()">
         </div>
         </center>
</FORM>
  
</form>
</body>
</html>
