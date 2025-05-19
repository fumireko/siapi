<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";
   include "bco_fun.php";
$resolucao = ver_res_w();
$unidade = " DEPARTAMENTO DE TECNOLOGIA ";
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
   <script>
       function preencheCampo(el){
    let value = $(el).val();
    let value_ant = $('textarea[name="modelo"]').val();
    let value_atualizado = value_ant + ' / ' + value;
    //let value_atualizado = ${value_ant}  ${value};
    $('textarea[name="modelo"]').val(value_atualizado);
     $('input[name="modelo2"]').val(value);
}



   </script>
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
                                         <h4 class="title pull-left"> <?php echo $unidade; ?></h4>                                
                               
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
                            <form method="post" action="direciona.php">    
                                    
                                
                                <div>  
                              
                                    <?php
                                    $ctrl_ti = " 505  ";
                                    $tipo_equip = " DESKTOP  ";
                                    $plaqueta = " 123456  ";
                                    $nome_pc= " WKS1001  ";
                                    $id_loc = " 210  ";
                                    $id_sec = " 33  ";
                                    $lacre= " 505L  ";
                                    $reserva= " NAO  ";
                                     $so= " WINDOWS 11 64 BITS  ";
                                     $placamae = " ASUS ROCK C2466 T47  ";
                                     $processador = " CORE I5  Geracao 7  ";
                                     $arm_tipo= " SSD ";
                                     $arm_tam= " 256 Gb  ";
                                     $arm_sectipo= " teste  ";
                                     $arm_sectam = " teste  ";
                                    $mem_tipo= " DDR3  ";
                                    $mem_tam= " 8Gb  ";
                                    $mem_slot = " 2  ";
                                    $mem_slot_uso = " 1  ";
                                    $monitor_tipo= " UNICO  ";
                                    $mon_qtd= " 1 ";
                                    $monitor_resumo= " teste  ";
                                    $video_saida = " VGA / HDMI /DVI  ";
                                    $video_portas_uso = " VGA Em uso ";
                                    $fonte_inst= " mini ATX  250W  ";
                                    
                                     $app_outros = " teste  ";
                                     $app= " Office  ";
                                     $app1= " ZWCad  ";
                                     $obs= " teste  "; 
                                     $hoje= " 22/08/2024  ";
                                     $util_qtd = " 1  ";
                                     $util_nomes= " CLAUDIO  ";
                                    $responsavel = " teste  ";
                                    
                                    


                                    
                                    
                                    
                                    echo "<center> <br> ";
                                echo "<h3>Descritivo do Dispositivo </h3><br>";
                                echo  "Tipo Dispositivo <B> ". $tipo_equip ." </B> Controle CTI : <B>" . $ctrl_ti . "</B> <br> ";
                                echo ' Patrimonio plaqueta :<B> ' . $plaqueta . '</B> <br> Nome_equip <B> :' . $nome_pc . ' </B> <BR>';
                                echo ' <I> local id <b> ' . $id_loc . ' </b> '.  nomedolocal($conn, $id_loc).'  <br> sec id <b> ' . $id_sec . '</b>    '. nomedesecretaria($conn, $id_sec).' </I> <br>    Lacre da TI <B>' . $lacre . '</B>   Reserva: <B> ' . $reserva . '</B> <br>';
                                echo '<br>Sistema Operacional : ' . $so . '<br> Placa Mae ' . $placamae . ' <br> Processador ' . $processador . '<br>  Armazenamento  tipo ' . $arm_tipo . ' HD Tam ' . $arm_tam . ' Arn_sec ' . $arm_sectipo . ' arm_sec_tam ' . $arm_sectam . ' <br>';
                                echo 'Memoria_tipo ' . $mem_tipo . ' * Mem_qtd ' . $mem_tam . ' * Slots ' . $mem_slot . ' *Slots_uso ' . $mem_slot_uso . "<br>";
                                echo '<br>Monitor tipo ' . $monitor_tipo . '   Qtd Monitores  ' . $mon_qtd;
                                echo '<br> Infs Monitor  ' . $monitor_resumo;
                                echo '<br>  Saidas Videos  : ' . $video_saida . '  <br>  Videos em uso    ' . $video_portas_uso;
                                echo '<br>  fonte     ' . $fonte_inst;
                                //echo ' <br><br>App_outros ' . $app_outros . ' Aplicativos registrados  ' . $app . '  ' . $app1 . '<br> Obs ' . $obs . '  ' . $hoje . '<br> parametro de referencia  ' . $ref_equip;
                                echo ' <br><br>App_outros ' . $app_outros . ' Aplicativos registrados  ' . $app . '  ' . $app1 . '<br> Obs ' . $obs . '  ' . $hoje . '<br>';
                                echo '<br> Utilizadores do Equipamento  qtd :    ' . $util_qtd . '  <br> Nome dos Utilizadores   ' . $util_nomes;
                                echo '<br>';
                                echo '<br> Responsavel Equipamento:    ' . $responsavel . '  <br> ';
                                echo "</center>";
                                ?>


                             </div>



                                <br>
                            <div>
                            
                                <button id="btn_cadastro_unidade" name="btn_cadastro_unidade" class="btn btn-primary">Cadastrar</button>
                                </div>
                            </form>
                            </div>
                        </section></div>
                </section>
            </section>
        
        
</body>

</html>
