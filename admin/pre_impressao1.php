<?php
  include "../validar_session.php";  
  include "../Config/config_sistema.php";
   include "bco_fun2.php";
$resolucao = ver_res_w();
//$ret_cmei_id = $_GET['id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
    <title>Cadastro de Equipamentos</title>
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
                                         <h4 class="title pull-left"> <?php echo " Gerar QR code"; ?></h4>                                
                               
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
                            <form method="post" action="qrimpressao_zebra_v2.php">    
                                  
                                
                                <div>  
                             <label>Impressao em Impressora ZEBRA :  </label>  &nbsp  &nbsp
                                    <a href="pre_impressaoqr.php" title="Gera QRCode para impressao em Impressora ZEBRA">Clique Aqui  </a>  <br />
                             <label>Impressao em Impressora Papel A4  :  </label>  &nbsp  &nbsp
                                    <a href="pre_impressaoqr2.php" title="Gera QRCode para impressao em Impressora com papel A4">Clique Aqui  </a>  <br />
                              <br />
                              <label>Impressao de QrCode ja Existente :  </label>  &nbsp  &nbsp
                                    <a href="pre_impressaoqr3.php" title="Gera QRCode ja em utilizaçao">Clique Aqui  </a>  <br />
                              <br />
           


                                </div>
                                <div>
                                 
                                 </div>  
                             
                                <br>
                            <div>
                            
                            
                                    <br /> <br /><a href="verifica_cti.php?tipo=1" title="Verifica CTI Utilizados">Verificar Controles Utilizados em Equipamentos </a><br /><br />
                                 <a href="verifica_qr_cti.php?tipo=1" title="Verifica QR Distribuidos/Utilizados">Visualiza QR Distribuidos por Usuario </a><br /><br />
                                   <a href="reserva_cti_consulta3.php?page=1" title="Verifica CTI RESERVADO para utilizaçao">Visualiza RESERVA de CTI  </a><br /><br />
                                </div>
                            </form>
                            </div>
                        </section></div>
                </section>
            </section>
        
        
</body>

</html>
