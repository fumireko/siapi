<?php
include "../validar_session.php";
include "../Config/config_sistema.php";

//$c_ep = $_REQUEST['c_ep'];
//echo $c_ep;
//include_once  "./atualiza.php";
?>
<html>
<head>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script src="js/jquery-2.1.4.min.js"></script>
	<script src="js/java_busp2laq.js"></script>
</head>

<form method="post" action="qrimpressao.php">
     <?php
     include "index.php"
         ?> 
<section class="wrapper main-wrapper">
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
        <div class="page-title">
            <div class="pull-left">
                <h1 class="title">Sistema de Gestão </h1>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-lg-12">
        <section class="box ">
            <header class="panel_header">
                <h2 class="title pull-left">TESTE de Emissao QRCode</h2>
            </header>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">        
                    <div id="form">
         <h3 class="title pull-left">Numero de Plaqueta </h3>
  <input type="hidden" name="nome" value="Marcos" class="nome" />
  <input type="text" name="plaqueta" id="plaqueta" value="" class="nome" />


  <input type="submit" name="exibir" value="Gerar QR Code" class="exibir" />         
</div><!--FORM-->
<div id="resultado">
<?php
//include ('conecta_memo.php');
include "../Config/config_sistema.php";
$mysqli = new mysqli($host, $user, $pass, $db1);
$ref = "vazio";
$sql = $mysqli->prepare("select tbequip_id,tbequip_plaqueta,tbequi_tbcmei_id from tbequip where tbequip_plaqueta ='" . $ref . "' ORDER BY tbequip_plaqueta");
$sql->execute();
$sql->bind_result($id,$plaqueta,$local);
//echo "Inicio da visualizaçao <br> ";

echo "
        <table>
            <thead>
                <tr>
                    <th></th>                    
                    <th></th>                    
                </tr>
            </thead>

            <tbody>
    ";

while ($sql->fetch()) {
    echo "
        <tr>
        <td>$plaqueta</td>
        <td> <a href=nota_ind.php?parametro=" . $id . "></a> </td>	              
       
            
</tr>
    ";
}
echo "</tbody>     </table>  <br>  ";
//<img src='img\checar1.png' BORDER='0' WIDTH='25' HEIGHT='25' ALIGN='left'  alt='Tipo' title = 'Visualizar dados'  /> </a>
//echo "FIM  visualizaçao <br> ";
?>
</div>



  
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>
</body>
</form>
</html> 