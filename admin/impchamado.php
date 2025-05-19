<?php

include "../validar_session.php";
include "../Config/config_sistema.php";
//include "bco_fun.php";
$id_dados = $_GET['id_dados'];// $_REQUEST['id_dados'];
$consulta = mysqli_query($conn,"SELECT tbldados.id_dados,
tbldados.data,
tbldados.dtaatendido,
tbldados.dtafin,
tbldados.nsolicitante,
tbldados.telefone,
tbldados.id_setor,
tbldados.id_sec ,
tbldados.prob,
tbldados.solucao,
tbldados.status,
tbldados.tecnico,
tbsecretaria.sec_id,
tbsecretaria.sec_nome,
tbcmei.tbcmei_id,
tbcmei.tbcmei_nome
from tbldados 
inner Join tbsecretaria
On tbsecretaria.sec_id = tbldados.id_sec 
Inner Join tbcmei
ON tbcmei.tbcmei_id = tbldados.id_setor  
where id_dados = '".$id_dados."'");

//from tbldados
//where id_dados = '".$id_dados."'");


//while ($linhas = mysqli_fetch_assoc($consulta)){
while($linhas = mysqli_fetch_object($consulta)) {
$dtn = $linhas->data;
$dtab = implode("/",array_reverse(explode("-",$dtn)));

$dtatendido = $linhas->dtaatendido;
$dtat = implode("/",array_reverse(explode("-",$dtatendido)));

$dtafin = $linhas->	dtafin;
$dtafin = implode("/",array_reverse(explode("-",$dtafin)));

?>
<!DOCTYPE html>
<html>
<head>
        <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta name="author" content="Admin" />
        <title>DADOS DO CHAMADO</title>
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
			function TextBoxCaixaAlta_OnKeyUp(fsValor, foForm, foNome) { 
	if (window.event.keyCode >= 65 && window.event.keyCode <= 90){
		x = new String(document.forms[foForm].elements[foNome].value);
		document.forms[foForm].elements[foNome].value = x.toUpperCase();
	}
   }
   function TextBoxCaixaAlta_OnBlur(fsValor, foForm, foNome){ 	
	var tam=0;
	x = new String(document.forms[foForm].elements[foNome].value);
	while (tam != x.length){
		tam = x.length;
		x = x.replace('\'', '');
	}
	document.forms[foForm].elements[foNome].value = x.toUpperCase();
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
       <form onSubmit="" action="SalvaFila.php" method="post" name="cadastro">
            <div style="padding: 0px 0 0 140px; font-size:14px">

                
  <table width="828" border="1" cellspacing="0" align="center" class="style10">
	<tr>
   		<td colspan="6" align="left" bgcolor="#FFFFFF" style="font-size: 14px; color: #000; font-weight: bold;"> <h5> <img src="img/logoti-pmc.png" width="824" height="84" vspace="0px" hspace="20px"/></h5></td>
  	</tr>
     <tr>
        <td height="24"  colspan="6" bgcolor="#FFFFFF"  class="style10" align="center"><strong> DADOS DO CHAMADO
            <input type="hidden" name ="id_dados" value="<?PHP echo $linhas->id_dados ?>"></strong></td>
    </tr>
    <tr>
      <td width="200" height="26" colspan="" align="right"  bgcolor="#FFFFFF" >Solicitante:&nbsp;</td>
      <td colspan="5"   bgcolor="#FFFFFF" ><?PHP echo $linhas->nsolicitante ?></td>
    </tr>
    <tr>
      <td width="200" height="26" colspan="" align="right"  bgcolor="#FFFFFF" >Secretaria:&nbsp;</td>
      <td colspan="5"   bgcolor="#FFFFFF" ><?PHP echo $linhas->sec_nome . "  " . $linhas->id_setor ?></td>
    </tr>
    <tr>
      <td width="200" height="26" colspan="" align="right"  bgcolor="#FFFFFF" >Depto:&nbsp;</td>
      <td colspan="5"   bgcolor="#FFFFFF" ><?PHP echo $linhas->tbcmei_nome ?></td>
    </tr>
    <tr>
       <td height="24"  bgcolor="#FFFFFF" align="right">Data de abertura:&nbsp;</td>
      <td colspan="4"  bgcolor="#FFFFFF"   ><?PHP echo $dtab ?></td>
    </tr>
    <tr>
       <td height="25"  bgcolor="#FFFFFF"   align="right">Data de atendimento:&nbsp;</td>
       <td  bgcolor="#FFFFFF" ><?PHP echo $dtafin ?> </td>
    </tr>
    <tr>
       <td height="25"  bgcolor="#FFFFFF" align="right">Telefone :</td>
      <td width="618" colspan="5"  bgcolor="#FFFFFF"  ><?PHP echo $linhas->telefone ?> </td>
     </tr>
      <tr>
       <td height="25"  bgcolor="#FFFFFF" align="right">Atendente :</td>
      <td width="618" colspan="5"  bgcolor="#FFFFFF"  ><?PHP echo $linhas->tecnico ?>   </td>
     </tr>
     <tr>
	 	<td height="22"  align="center"  bgcolor="#FFFFFF" colspan="3">PROBLEMA </td>
     </tr>
     <tr>
		<td height="24"  align="center" colspan="3"> <textarea  style="width:900px;height:80px;font-size:18px" name="prob"> <?PHP echo $linhas->prob ?> </textarea></td>
       
     </tr>
     <tr>
		<td height="22"  align="center" colspan="3" bgcolor="#FFFFFF"  class="style10">SOLUCAO </td>
     </tr>
     <tr>
		<td height="24"  align="center" colspan="3"><textarea  style="width:900px;height:80px;font-size:18px"" name="solucao"> <?PHP echo $linhas->solucao ?> </textarea></td>
     </tr>
     <tr>
		<td height="22" colspan="6" align="left"  bgcolor="#FFFFFF" class="accordion-inner"> 
		  <h6 class="style10" align="justify"><strong><span class="unstyled">Em razao do recebimento do servico/equipamento mencionado, assumo todas as responsabilidades decorrentes da sua guarda
uso e conservacao, testes nos servicos solicitados/executados sendo eles em inclusao ou remoao de hardwares ou software conforme chamado.
 </span></strong></h6>
	      <h6 class="style10" align="center"><strong><span class="unstyled">Assinado e conferido so tera novo atendido via nova solicitacao </span></strong></h6>
          <br/> <br/><br/>
	      <h6 align="center"><strong><span class="unstyled">__________________________________________________________________ </span><span class="unstyled"></span></strong></h6>
<p align="center">Carimbo e Assinatura - SOLICITANTE</p>
   
        </td>
      </tr>      




   </table>



             </div> 
<div style="padding: 0px 0 0 140px;">
         
 </div>               
   </div>               
        <?php
}
?>        
<span class="style3"><strong>        </strong></span>

</body>
</html>
     