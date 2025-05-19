<?php
include "../validar_session.php";
include "../Config/config_sistema.php";
$login = $_SESSION['login_usuario'];
$id_cmei = $_SESSION['unidade_usuario'];
$ordem = $_REQUEST['ordem'];
$tbaluno_id = $_REQUEST['tbaluno_id'];
$consulta = mysql_query("SELECT * FROM tbaluno where tbaluno_id = '".$tbaluno_id."'");
while($linhas = mysql_fetch_object($consulta)) {
$dtn = $linhas->tbaluno_dtnasc;
$dtansc = implode("/",array_reverse(explode("-",$dtn)));
?>
<!DOCTYPE html>
<html>
<head>
        <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
<meta name="author" content="Admin" />
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
<table width="828" border="1" cellspacing="0" align="center">
	<tr>
   		<td colspan="6" align="left" bgcolor="#FFFFFF" style="font-size: 14px; color: #000; font-weight: bold;"> <h5> <img src="../images/Teste.png" width="747" height="124" vspace="0px" hspace="20px"/></h5></td>
  	</tr>
        <tr>
        <td height="24"  colspan="6" bgcolor="#FFFFFF" class="style3" align="center"><strong>DADOS DA CRIANCA<input type="hidden" name ="aluno_id" value="<?PHP echo $linhas->tbaluno_id?>"></strong></td>
    </tr>
   <td height="26"  bgcolor="#FFFFFF" colspan="2" class="style3" align="right">Nome da Crian&ccedil;a:&nbsp;</td>
      <td colspan="5"   bgcolor="#FFFFFF" ><?PHP echo $linhas->tbaluno_nome?></td>
    </tr>
    <tr>
       <td height="24"  bgcolor="#FFFFFF" colspan="2"  class="style3" align="right">Data de Nascimento:&nbsp;</td>
      <td  bgcolor="#FFFFFF" colspan="4"   ><?PHP echo $dtansc?></td>
    </tr>
    <tr>
       <td height="25"  bgcolor="#FFFFFF" colspan="2"  class="style3"  align="right">Nome da M&atilde;e:&nbsp;</td>
       <td  bgcolor="#FFFFFF" colspan="5" ><?PHP echo $linhas->tbaluno_nmae?> </td>
    </tr>
    <tr>
       <td height="25"  bgcolor="#FFFFFF"  colspan="2" class="style3"  align="right">Telefone :</td>
      <td  bgcolor="#FFFFFF" colspan="5"  ><?PHP echo $linhas->tbaluno_tel?> 
       </td>
	<tr>
  <tr>
       <td height="25"  bgcolor="#FFFFFF"  colspan="2" class="style3"  align="right">Celular :</td>
      <td  bgcolor="#FFFFFF" colspan="5"  ><?PHP echo $linhas->celu?> 
     </td>
	<tr>
  <tr>
       <td height="25"  bgcolor="#FFFFFF"  colspan="2" class="style3"  align="right">Celular 2:</td>
      <td  bgcolor="#FFFFFF" colspan="5"  ><?PHP echo $linhas->celular?> 
     </td>
	<tr>
		<td height="22" colspan="8" align="center"  bgcolor="#FFFFFF"  class="style3"><p align="center"><strong>CADASTRO REALIZADO</strong></p></td>
   </tr>
   <tr>
		<td width="65" height="22"  align="center"  bgcolor="#FFFFFF"  class="style3">Ordem </td>
        <td width="130" height="22"  align="center"  bgcolor="#FFFFFF"  class="style3">Data cad</td>
        <td width="336" height="22"  align="center"  bgcolor="#FFFFFF"  class="style3">CMEI</td>
         <td width="162" height="22"  align="center"  bgcolor="#FFFFFF"  class="style3">TP FILA</td>
        <td width="126" height="22"  align="center"  bgcolor="#FFFFFF"  class="style3">Turma</td>
          <?php 
           $sql = "SELECT tbaluno.tbaluno_id,
           tbaluno.tbaluno_nome, 
           tbaluno.tbaluno_dtnasc,
           tbaluno.tbaluno_turma,
           tbaluno.tbaluno_cep,
           tbaluno.tbaluno_status,
           tbfila.tbfila_id, 
           tbfila.tbaluno_tbaluno_id,
           tbfila.tbfila_turma,
           tbfila.tbfila_dtacad,
           tbfila.data_cadalterado,
           tbfila.tbfila_motivo,
           tbfila.tbcmei_tbcmcei_id,
           tbcmei.tbcmei_id, 
           tbfila.tbfila_ord,
           tbcmei.tbcmei_nome
            FROM tbaluno INNER JOIN tbfila 
            ON tbaluno.tbaluno_id = tbfila.tbaluno_tbaluno_id 
            iNNER JOIN tbcmei 
            on tbfila.tbcmei_tbcmcei_id = tbcmei.tbcmei_id 
            where tbaluno.tbaluno_id LIKE '%".$tbaluno_id."%' 
            and tbcmei.tbcmei_id like '%".$id_cmei."%' 
            ORDER BY tbfila_id";
            $qr  = mysql_query($sql) or die(mysql_error());
          
          $i=0; 
          while( $ln = mysql_fetch_assoc($qr) )
        {
          $dtn = $ln['tbfila_dtacad'];
          $dtacad = implode("/",array_reverse(explode("-",$dtn)));
	      $i++;
          $style = ( $i % 2 == 0 )? "style='background:#eeeeee;'" : "style='background:#CCCCCC;'"
        ?>
        </tr>
        <tr>
		    <td width="65" height="24"  align="center"><?php echo $ordem;?></td>
            <td width="130"  align="center"><?php echo $dtacad;?> </td>
            <td width="336"  align="center"><?php echo $ln['tbcmei_nome'];?> </td>
            <td width="162"  align="center"><?php echo $ln['tbfila_motivo'];?> </td>
            <td width="126"  align="center"><?php echo $ln['tbaluno_turma'];?> </td>
        </tr>
      <?php
      }
      ?>   
  <tr>
		<td height="22" colspan="6" align="left"  bgcolor="#FFFFFF" class="accordion-inner">   <h6>&nbsp;</h6>
		  <h6><strong>A matricula no CMEI somente sera realizada mediante a entrega deste comprovante;
Dados incorretos ou incompletos implicarao na perda da vaga, portanto qualquer alteracao dos dados acima, favor comunicar imediatamente o CMEI;
 </span></strong></h6>
	      <h6><strong><span class="unstyled">Sempre que houver alteracao do(s) telefone(s), favor entrar em contato com o CMEI para atualizacao, pois o contato para matricula sera exclusivamente via telefone; </span></strong></h6>
	      <h6><strong><span class="unstyled">Para informacoes sobre a vaga, o responsavel devera estar portando este comprovante de inscricao.
Periodicamente podera ser verificada a lista de espera junto ao CMEI.
          </span><span class="unstyled"></span></strong></h6>
<h6 align="center">&nbsp;</h6>
<h6 align="center">&nbsp;</h6>
<h6 align="center"><strong><span class="unstyled">__________________________________________________________________ </span><span class="unstyled"></span></strong></h6>
<p align="center">Carimbo e Assinatura - CMEI</p>
<h6>&nbsp;</h6> 
        
      </strong></td>
   </tr>      
   </table>
</div> 
<div style="padding: 0px 0 0 140px;">
         
 </div>               
   </div>               
        <?php
}
?>        
<span class="style3"><strong>
        </strong></span>
</body>
</html>