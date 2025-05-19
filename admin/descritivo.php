<?php
  include "../validar_session.php";  
  include "../Config/config_sistema.php";
  // include "bco_fun2.php";
include "bco_fun.php";


//printa_tela("1525");

/*
$im = imagegrabscreen();
imagepng($im, "myscreenshot.png");
imagedestroy($im);
*/


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
                                         <h4 class="title pull-left"> <?php echo " Descritivos Disponiveis"; ?></h4>                                
                               
                                        <div class="actions panel_actions pull-right">
                                   
                                </div>


                                        <!-- ********************************************** -->
                                   <div  id="consulta"> 
 
                                 
        
                                        <!-- ********************************************** -->
                                    </div>
                                    <div class="form-group">
                                
                            </div>
                                </div>
                            <form method="post" action="#">    
                                  
                                   <input  type="hidden"  id="id_loc"  name="id_loc" type="text" value= "" size = "10" >
                                   <input  type="hidden"  id="id_sec"  name="id_sec" type="text" value= "" size = "10" >
                                    
                                
                                <div>  
                                 <br /> <br /><a href="verifica_txt.php?tipo=1" title="Verifica Acoes Utilizados">Verificar Açoes Executadas em Equipamentos </a><br />
                                         <br /> <br /><a href="verifica_txt.php?tipo=2" title="Verifica QR Codes Gerados">Verificar QR Gerados de Equipamentos </a><br />
                                         <br /> <br /><a href="verifica_txt.php?tipo=3" title="Verifica Correcoes sugestionadas pelos usuarios">Correcoes Sugeridas </a><br />
                                         <br /> <br /><a href="verifica_txt.php?tipo=4" title="Verifica Erros ">Descritivos de Erros </a><br />
                                         <br /> <br /><a href="verifica_txt.php?tipo=5" title="Verifica Erros ">Descritivos de Acessos </a><br />
                                     <br /> <br /><a href="tabelas.php?tipo=5" title="Tabelas ">Tabelas </a><br />
                                     <br /> <br /><a href="cad_multiplos.php?par=0&cti=0" title="Replicar Dispositivos ">Multiplos Cadastro de Unico Dispositivo </a><br />


                                

                                </div>
                                <div>
                                 
                                 </div>  
                             
                                <br>
                            <div>
                               </div>
                              <?php //echo " <br> <input type='button' value='Voltar' onclick='javascript: history.go(-1)'  "; ?>
                            </form>
                            </div>
                        </section></div>
                </section>
            </section>
        
        
</body>

</html>
