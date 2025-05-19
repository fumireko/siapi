<?php
  include "../validar_session.php";  
  include "../Config/config_sistema.php";
   include "bco_fun.php";
//$resolucao = ver_res_w();
////$ret_cmei_id = $_GET['id'];
$tipo = $_GET['tipo']; // parametro de tipo de busca em controle_ti


if ($tipo == "1") {
    $query = "select * from tbequip where status='1' order by ctrl_ti";
    $dados = mysqli_query($conn, $query);
    $resultadoDaInsercao = mysqli_num_rows($dados);
    $total = mysqli_num_rows($dados);
    echo "<center>" . $total . "</center>";
    if ($resultadoDaInsercao == '0') {
        echo " <center> Nenhum resultado obtido no controle T.I   </center>";
    } else {
        //   $linha = mysqli_fetch_assoc($dados);    
        ?>
                                    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                    <html>
                                        <head>
                                        <title>Ver Sequencial </title>
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
                                                     

                                                        <div class="col-lg-12">
                                                            <section class="box ">
                                                                <header class="panel_header">
                                                                    <h2 class="title pull-left">Sistema de Gestão T.I
                                                                    </h2>
                               
                                                                     </h1>
                        
                                                                </header>
                            
                                                                <div class="content-body">    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                                            <div class="actions panel_actions pull-right">     </div>
                                                                        </div>
                                                                <form method="post" action="qrimpressao_zebra.php">    
                                  
                                                                       <input  type="hidden"  id="id_loc"  name="id_loc" type="text" value= "" size = "10" >
                                                                       <input  type="hidden"  id="id_sec"  name="id_sec" type="text" value= "" size = "10" >
                                
                                                                    <div>  
                                                        <h3>Sequencial Computadores   Tipo 1 </h3> 
                                    <?php
                                    $esp = "  - - - -  ";
                                    echo "<strong>";
                                    echo "  CTI     " . $esp;
                                    echo "  Patrimonio    " . $esp;
                                    echo "  Local   <br> ";
                                    echo "</strong>";
                                    $i = 0;

                                    $linha = mysqli_fetch_assoc($dados);
                                    //  echo "<center>" . $total . "</center>";
                                    //  for ($col = 0; $col <= 2; $col++)
                                    //   {
                                    do {

                                        $ret_id = $linha['tbequip_id'];
                                        $ret_status = $linha['status'];
                                        $ctrl_ti = $linha['ctrl_ti'];
                                        $ret_plaqueta = mb_strimwidth($linha['tbequip_plaqueta'], 0, 6, "");
                                        ;
                                        $ret_local = $linha['tbequi_tbcmei_id'];
                                        //   $linha = mysqli_fetch_assoc($dados);
                                        $ctrl_ti = $linha['ctrl_ti'];
                                        $vis_cti = mascara_cti($ctrl_ti);
                                        //           $codificacao = "C" . $linha['ctrl_ti'] . "- D" . $linha['tab_chave'] . "- L" . $linha['tab_cam'] . "- " . strtoupper($linha['descricao']) . " - " . $ret_status;
                                        if ($vis_cti <> "")
                                            echo $vis_cti  . $esp . "   " . $ret_plaqueta .$esp . "   " . nomedolocal($conn, $ret_local) . " (" .$ret_local.    ")<br>";
                                    } while ($linha = mysqli_fetch_assoc($dados));

                                    ///echo "<br>";
                                    //$queryb = "Select Max(ctrl_ti) as ctrl_ti,id from tb_controle_ti";
                            


                                    //Select Max(ctrl_ti) from controle_ti
                            
                                    /*   for ($x = 0; $x <= 10; $x++) 
                                    {
                                        for ($y = 0; $y <= 10; $y++) 
                                        {
                                            echo $x. ",". $y . " ";
                                        }
                                        echo "<br>";
                                      }
                                    /*/
                                    ?>
                                </div>
                                <div>
                                 </div>  
                                <br>
                            <div>
                                <a href="verifica_cti.php?tipo=2&col=10" title="Verifica CTI nao Utilizados">Verificar Controle NÃO  Utilizados em Equipamentos </a><br /><br />
                                <a href="exibe_exc.php?tipo=1&col=10" title="Verifica CTI nao Utilizados">Verificar Controles EXCLUIDOS  em Equipamentos </a><br /><br />
                                   <a href="verifica_cti_lista.php?tipo=1&col=10" title="Verifica CTI nao Utilizados">Verificar lista  de  Equipamentos </a><br /><br />
                                </div>
                            </form>
                            </div>
                        </section></div>
                </section>
            </section>
        
                </body>

                </html>
            <?php
    }
} else {
    if ($tipo == "2") {
        $query = "select * from tb_diversos where status='1' order by ctrl_ti";
        $dados = mysqli_query($conn, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        $total = mysqli_num_rows($dados);
        echo "<center>" . $total . "</center>";
        if ($resultadoDaInsercao == '0') {
            echo " <center> Nenhum resultado obtido no controle T.I   </center>";
        } else {
            //   $linha = mysqli_fetch_assoc($dados);    
            ?>
                                                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                                <html>
                                                    <head>
                                                    <title>Ver Sequencial </title>
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
                                                                                        <div class="actions panel_actions pull-right">     </div>
                                                                                    </div>
                                                                            <form method="post" action="qrimpressao_zebra.php">    
                                  
                                                                                   <input  type="hidden"  id="id_loc"  name="id_loc" type="text" value= "" size = "10" >
                                                                                   <input  type="hidden"  id="id_sec"  name="id_sec" type="text" value= "" size = "10" >
                                
                                                                                <div>  
                                                                    <h3>Sequencial Diversos  Tipo 2 </h3> 
                                                <?php
                                                $esp = " - - - - ";
                                                echo "<strong>";
                                                echo "  CTI     " . $esp;
                                                echo "  Patrimonio    " . $esp;
                                                echo "  Local   <br> ";
                                                echo "</strong>";
                                                $i = 0;

                                                $linha = mysqli_fetch_assoc($dados);
                                                //  echo "<center>" . $total . "</center>";
                                                //  for ($col = 0; $col <= 2; $col++)
                                                //   {
                                                do {

                                                    $ret_id = $linha['id'];
                                                    $ret_status = $linha['status'];
                                                    $ctrl_ti = $linha['ctrl_ti'];
                                                    $ret_plaqueta = mb_strimwidth($linha['patrimonio'], 0, 6, "");
                                                    ;
                                                    $ret_local = $linha['local_cod'];
                                                    //   $linha = mysqli_fetch_assoc($dados);
                                                    $ctrl_ti = $linha['ctrl_ti'];
                                                    $vis_cti = mascara_cti($ctrl_ti);
                                                    //           $codificacao = "C" . $linha['ctrl_ti'] . "- D" . $linha['tab_chave'] . "- L" . $linha['tab_cam'] . "- " . strtoupper($linha['descricao']) . " - " . $ret_status;
                                                    if ($vis_cti <> "")
                                                        echo "$vis_cti " . $esp . "   " . $ret_plaqueta . $esp . "   " . nomedolocal($conn, $ret_local) . "<br>";
                                                } while ($linha = mysqli_fetch_assoc($dados));

                                                ///echo "<br>";
                                                //$queryb = "Select Max(ctrl_ti) as ctrl_ti,id from tb_controle_ti";
                                    


                                                //Select Max(ctrl_ti) from controle_ti
                                    
                                                /*   for ($x = 0; $x <= 10; $x++) 
                                                {
                                                    for ($y = 0; $y <= 10; $y++) 
                                                    {
                                                        echo $x. ",". $y . " ";
                                                    }
                                                    echo "<br>";
                                                  }
                                                /*/
                                                ?>
                                            </div>
                                            <div>
                                             </div>  
                                            <br>
                                        <div>
                                            <a href="verifica_cti.php?tipo=2&col=10" title="Verifica CTI nao Utilizados">Verificar Controle NÃO  Utilizados em Equipamentos </a><br /><br />
                                            <a href="exibe_exc.php?tipo=1&col=10" title="Verifica CTI nao Utilizados">Verificar Controles EXCLUIDOS  em Equipamentos </a><br /><br />
                                               <a href="verifica_cti_lista.php?tipo=1&col=10" title="Verifica CTI nao Utilizados">Verificar lista  de  Equipamentos </a><br /><br />
                                            </div>
                                        </form>
                                        </div>
                                    </section></div>
                            </section>
                        </section>
        
                            </body>

                            </html>
                        <?php
        }
    } // fim do tipo 2
    else {
        if ($tipo == "3") // diversos 
        {
            $query = "select * from tb_monitores where status='1' order by ctrl_ti";
            $dados = mysqli_query($conn, $query);
            $resultadoDaInsercao = mysqli_num_rows($dados);
            $total = mysqli_num_rows($dados);
            echo "<center>" . $total . "</center>";
            if ($resultadoDaInsercao == '0') {
                echo " <center> Nenhum resultado obtido no controle T.I   </center>";
            } else {
                //   $linha = mysqli_fetch_assoc($dados);    
                ?>
                                                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                                <html>
                                                    <head>
                                                    <title>Ver Sequencial </title>
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
                                                                                        <div class="actions panel_actions pull-right">     </div>
                                                                                    </div>
                                                                            <form method="post" action="qrimpressao_zebra.php">    
                                  
                                                                                   <input  type="hidden"  id="id_loc"  name="id_loc" type="text" value= "" size = "10" >
                                                                                   <input  type="hidden"  id="id_sec"  name="id_sec" type="text" value= "" size = "10" >
                                
                                                                                <div>  
                                                                    <h3>Sequencial Monitores Tipo 3 </h3> 
                                                <?php
                                                $esp = " - - - - ";
                                                echo "<strong>";
                                                echo "  CTI     " . $esp;
                                                echo "  Patrimonio    " . $esp;
                                                echo "  Local   <br> ";
                                                echo "</strong>";
                                                $i = 0;

                                                $linha = mysqli_fetch_assoc($dados);
                                                //  echo "<center>" . $total . "</center>";
                                                //  for ($col = 0; $col <= 2; $col++)
                                                //   {
                                                do {

                                                    $ret_id = $linha['id'];
                                                    $ret_status = $linha['status'];
                                                    $ctrl_ti = $linha['ctrl_ti'];
                                                    $ret_plaqueta = mb_strimwidth($linha['mon_plaqueta'], 0, 6, "");
                                                    $ret_local = $linha['local_id'];
                                                    //   $linha = mysqli_fetch_assoc($dados);
                                                    $ctrl_ti = $linha['ctrl_ti'];
                                                    $vis_cti = mascara_cti($ctrl_ti);
                                                    //           $codificacao = "C" . $linha['ctrl_ti'] . "- D" . $linha['tab_chave'] . "- L" . $linha['tab_cam'] . "- " . strtoupper($linha['descricao']) . " - " . $ret_status;
                                                    if ($vis_cti <> "")
                                                        echo "$vis_cti " . $esp . "   " . $ret_plaqueta . $esp . "   " . nomedolocal($conn, $ret_local) . "<br>";
                                                } while ($linha = mysqli_fetch_assoc($dados));

                                                ///echo "<br>";
                                                //$queryb = "Select Max(ctrl_ti) as ctrl_ti,id from tb_controle_ti";
                                


                                                //Select Max(ctrl_ti) from controle_ti
                                
                                                /*   for ($x = 0; $x <= 10; $x++) 
                                                {
                                                    for ($y = 0; $y <= 10; $y++) 
                                                    {
                                                        echo $x. ",". $y . " ";
                                                    }
                                                    echo "<br>";
                                                  }
                                                /*/
                                                ?>
                                            </div>
                                            <div>
                                             </div>  
                                            <br>
                                        <div>
                                            <a href="verifica_cti.php?tipo=2&col=10" title="Verifica CTI nao Utilizados">Verificar Controle NÃO  Utilizados em Equipamentos </a><br /><br />
                                            <a href="exibe_exc.php?tipo=1&col=10" title="Verifica CTI nao Utilizados">Verificar Controles EXCLUIDOS  em Equipamentos </a><br /><br />
                                               <a href="verifica_cti_lista.php?tipo=1&col=10" title="Verifica CTI nao Utilizados">Verificar lista  de  Equipamentos </a><br /><br />
                                            </div>
                                        </form>
                                        </div>
                                    </section></div>
                            </section>
                        </section>
        
                            </body>

                            </html>
                        <?php
            }


        } else // tipo 4 GERAL 
        {
            $esp = " - - - - ";
            echo "<strong>";
            echo "  CTI     " . $esp;
            echo "  Patrimonio    " . $esp;
            echo "  Local   <br> ";
            echo "</strong>";

            $query = "select * from tb_controle_ti where status='1' order by ctrl_ti";
            $dados = mysqli_query($conn, $query);
            $resultadoDaInsercao = mysqli_num_rows($dados);
            $total = mysqli_num_rows($dados);
            echo "<center>" . $total . "</center>";


            if ($resultadoDaInsercao == '0') {
                echo " <center> Nenhum resultado obtido no controle T.I   </center>";
            } else {
                //   $linha = mysqli_fetch_assoc($dados);    
                ?>
                                                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                                <html>
                                                    <head>
                                                    <title>Ver Sequencial </title>
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
                                                                                        <div class="actions panel_actions pull-right">     </div>
                                                                                    </div>
                                                                            <form method="post" action="qrimpressao_zebra.php">    
                                  
                                                                                   <input  type="hidden"  id="id_loc"  name="id_loc" type="text" value= "" size = "10" >
                                                                                   <input  type="hidden"  id="id_sec"  name="id_sec" type="text" value= "" size = "10" >
                                
                                                                                <div>  
                                                                    <h3>Sequencial Controle TI   </h3> 
                                                <?php
                                                $esp = " - - - - ";
                                                echo "<strong>";
                                                echo "  CTI     " . $esp;
                                                echo "  Patrimonio    " . $esp;
                                                echo "  Local   <br> ";
                                                echo "</strong>";
                                                $i = 0;

                                                $linha = mysqli_fetch_assoc($dados);
                                                do {

                                                    $ret_id = $linha['id'];
                                                    $ret_status = $linha['status'];
                                                    $ctrl_ti = $linha['ctrl_ti'];
                                                    $descricao = $linha['descricao'];
                                                    $tab_origem = $linha['tab_origem'];

                                                    //  $ret_plaqueta = mb_strimwidth($linha['mon_plaqueta'], 0, 6, "");
                                                    //   $ret_local = $linha['local_id'];
                                                    $ret_plaqueta = ret_plaqueta_bycti($conn, $ctrl_ti);

                                                    //   $linha = mysqli_fetch_assoc($dados);
                                                    //$ctrl_ti = $linha['ctrl_ti'];
                                                    $vis_cti = mascara_cti($ctrl_ti);
                                                    //           $codificacao = "C" . $linha['ctrl_ti'] . "- D" . $linha['tab_chave'] . "- L" . $linha['tab_cam'] . "- " . strtoupper($linha['descricao']) . " - " . $ret_status;
                                                    if ($vis_cti <> "")
                                                        echo "$vis_cti " . $esp . "   " . $ret_plaqueta .  "<br>";
                                                } while ($linha = mysqli_fetch_assoc($dados));
                                                ///echo "<br>";
                                                //$queryb = "Select Max(ctrl_ti) as ctrl_ti,id from tb_controle_ti";
                                


                                                //Select Max(ctrl_ti) from controle_ti
                                
                                                /*   for ($x = 0; $x <= 10; $x++) 
                                                {
                                                    for ($y = 0; $y <= 10; $y++) 
                                                    {
                                                        echo $x. ",". $y . " ";
                                                    }
                                                    echo "<br>";
                                                  }
                                                /*/
                                                ?>
                                            </div>
                                            <div>
                                             </div>  
                                            <br>
                                        <div>
                                            <a href="verifica_cti.php?tipo=2&col=10" title="Verifica CTI nao Utilizados">Verificar Controle NÃO  Utilizados em Equipamentos </a><br /><br />
                                            <a href="exibe_exc.php?tipo=1&col=10" title="Verifica CTI nao Utilizados">Verificar Controles EXCLUIDOS  em Equipamentos </a><br /><br />
                                               <a href="verifica_cti_lista.php?tipo=1&col=10" title="Verifica CTI nao Utilizados">Verificar lista  de  Equipamentos </a><br /><br />
                                            </div>
                                        </form>
                                        </div>
                                    </section></div>
                            </section>
                        </section>
        
                            </body>

                            </html>
                        <?php







            }// fim do ultimo else     
        }
    }
}


