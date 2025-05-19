<?php
  include "../validar_session.php";  
  include "../Config/config_sistema.php";
   include "bco_fun2.php";
//$resolucao = ver_res_w();
//$ret_cmei_id = $_GET['id'];
$filename= "controleQR.txt";
/*
// Aqui você abre e lê o arquivo
    $arquivo = fopen ('controleQR.txt', 'r');
    // Aqui você está definindo que a variável é um 'array()'
    $result = array();
    // Você agora irá verificar se existe o arquivo e se o código acim o leu (true|false)
    while(!feof($arquivo)){
        // Aqui foi onde você errou, pois seria '$result[]' e não '$result'
        $result[] = explode("|",fgets($arquivo));
   
}
    // Fechando a leitura do arquivo
    fclose($arquivo);
    // Postando resultados
echo "<br> <br> <br> <center>";
print_r($result);
echo "</center> <br>";
*/
//abrimos o arquivo em leitura
//$arquivo = "/var/www/pasta/arquivo.txt"; // EXEMPLO DE CAMINHO. USE O CAMINHO CORRETO
$arquivo = $filename ;

$fp = fopen($arquivo, "r");

//lemos o arquivo
$texto = fread($fp, filesize($arquivo));

//transformamos as quebras de linha em etiquetas
$texto = nl2br($texto);

//echo $texto;








?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
    <title>CTI Gerados</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Adicionando JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>
    <!-- Adicionando Javascript -->
   
    </head>
<!-- BEGIN BODY -->

<body>
    <!-- aqui começa o menu -->
    <!-- START TOPBAR -->
         
    <?php 
       include "index.php"
    ?> 
         <!-- aqui termina o menu -->
        <!-- MAIN MENU - END -->
        <!--  SIDEBAR - END -->
        <!-- START CONTENT -->
        
        <section id="main-content" class=" ">
                <section class="wrapper main-wrapper" style=''>
                    <div class="clearfix"></div>
                    <h2 class="title pull-left"> <a id="gerarExcel" href="./lissetores.php" class="btn btn-primary">Listar setores</a> </h2></h2>

                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Sistema de Gestão T.I
                                </h2>
                               
                                 </h1>
                                
                             
                                

                            </header>
                            
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                     <label> Verifica Controles CTI Gerados  </label> <br />
                                        <a href="verifica_cti_user.php?tipo=CLAUDIO&col=30" title="Verifica CTI CLAUDIO">CLAUDIO </a> &nbsp &nbsp
                                        <a href="verifica_cti_user.php?tipo=CESAR&col=30" title="Verifica CTI CESAR"> CESAR </a> &nbsp &nbsp
                                        <a href="verifica_cti_user.php?tipo=DOUGLAS&col=30" title="Verifica CTI DOUGLAS"> DOUGLAS </a> &nbsp &nbsp 
                                        <a href="verifica_cti_user.php?tipo=HELENILDO&col=30" title="Verifica CTI HELENILDO">HELENILDO </a> &nbsp &nbsp
                                        <a href="verifica_cti_user.php?tipo=JEAN&col=30" title="Verifica CTI JEAN"> JEAN </a> &nbsp &nbsp
                                        <a href="verifica_cti_user.php?tipo=ESTAGIARIO&col=30" title="Verifica CTI ESTAGIARIOS">ESTAGIARIOS </a><br /><br />
                                        <h4 class="title pull-left"> <?php echo " QR code Gerados GERAL"; ?></h4>                                
                               
                                        <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>


                                        <!-- ********************************************** -->
                                   <div  id="consulta"> 
 
                                 
        
                                        <!-- ********************************************** -->
                                    </div>
                                    <div class="form-group">
                                
                            </div>
                                </div>
                            <form method="post" action="qrimpressao_zebra.php">    
                                  
                                   <input  type="hidden"  id="id_loc"  name="id_loc" type="text" value= "" size = "10" >
                                   <input  type="hidden"  id="id_sec"  name="id_sec" type="text" value= "" size = "10" >
                                    
                                
                                <div>  
                              
                                    
                                    <h5>   <?php echo $texto; ?></h5>                                


                                </div>
                                <div>
                                 
                                 </div>  
                             
                                <br>
                            <div>
                             
                                    <br /> <br /><a href="verifica_cti.php?tipo=1&col=30" title="Verifica CTI Utilizados">Verificar Controles Utilizados em Equipamentos </a><br /><br />
                                 <a href="verifica_qr_cti.php?tipo=1" title="Verifica QR Distribuidos/Utilizados">Visualiza QR Distribuidos por Usuario </a><br /><br />
                                </div>
                              <?php echo " <br> <input type='button' value='Voltar' onclick='javascript: history.go(-1)'  "; ?>
                            </form>
                            </div>
                        </section></div>
                </section>
            </section>
        
        
</body>

</html>
