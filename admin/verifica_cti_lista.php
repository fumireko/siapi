<?php
  include "../validar_session.php";  
  include "../Config/config_sistema.php";
   include "bco_fun.php";
//$resolucao = ver_res_w();
////$ret_cmei_id = $_GET['id'];
$tipo = $_GET['tipo']; // parametro de tipo de busca em controle_ti
//$col = $_GET['col']; // parametro de tipo de busca em controle_ti
$limite = 30; // qtd de linhas 
$hoje = date("d/m/Y H:i:s ");
$usuario = "Claudio";

switch ($tipo) 
{
    case '0': {
        echo "Erro de identificaçao de tabela !";
        break;
    }
    case '1': {
        $query = "select * from tb_controle_ti where status=1 order by ctrl_ti";
        $dados_cti = mysqli_query($conn, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados_cti);
        $total = mysqli_num_rows($dados_cti);
        echo "<center>" . $total . "</center>";
        if ($resultadoDaInsercao == '0') {
            echo " <center> Nenhum resultado obtido no controle T.I   </center>";
        } else {

            ?>
                                    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                    <html>
                                        <head>
                                        <title>CTI lista</title>
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
                                <a href="buscador_div.php?" title="Consulta de  CTI ">Consulta de  CTI  </a> &nbsp &nbsp    &nbsp &nbsp
                                <a href="verifica_cti_lista.php?tipo=4" title="Consulta de  CTI ">Ordenar Numericamente    </a> &nbsp &nbsp    &nbsp &nbsp
                               <a href="verifica_cti_lista.php?tipo=3" title="Consulta de  CTI ">Ordenar por Descricao   </a>&nbsp &nbsp    &nbsp &nbsp 
                               <a href="verifica_cti_lista.php?tipo=2" title="Consulta de  CTI ">Visualizar CTI Excluidos   </a>    &nbsp &nbsp    &nbsp &nbsp <br />
                                <a href="verifica_cti_lista.php?tipo=5" title="Somente Desktop ">Visualizar Desktop(s)   </a>&nbsp &nbsp    &nbsp &nbsp
                               <a href="verifica_cti_lista.php?tipo=6" title="Somente Notebooks ">Visualizar notebook(s)   </a>&nbsp &nbsp    &nbsp &nbsp
                                <a href="verifica_cti_lista.php?tipo=7" title="Somente Monitores ">Visualizar Monitores (s)   </a>&nbsp &nbsp    &nbsp &nbsp
                               <a href="verifica_cti_lista.php?tipo=8" title="Diversos ">Visualizar Diversos   </a><br /><br />&nbsp &nbsp    &nbsp &nbsp
                                                                      </div>

                                                                    <div>  
                                                        <h3>Informacoes de  Controle CTI  Utilizados </h3> 
                                    <?php
                                    $i = 0;
                                    $linha_cti = mysqli_fetch_assoc($dados_cti);
                                    do {

                                        $i = $i + 1;
                                        $ret_id = $linha_cti['tab_origem'];
                                        $ret_status = $linha_cti['status'];
                                        $ctrl_ti = $linha_cti['ctrl_ti'];
                                        $ret_tab_origem = $linha_cti['tab_origem'];
                                        $ret_tab_chave = $linha_cti['tab_chave'];
                                        $ret_tab_cam = $linha_cti['tab_cam'];
                                        $ret_dtcad = $linha_cti['dt_cad'];
                                        $ret_tecnico = $linha_cti['tecnico'];
                                        $ret_descricao = strtoupper($linha_cti['descricao']);
                                        $vis_cti = mascara_cti($ctrl_ti);
                                        //echo " CTI : " . $vis_cti . "     Status : " . $ret_status . "     " . $ret_descricao . "  <br /> ";
                                        echo $ret_descricao . "      CTI : " . $vis_cti . "      " . resumo_TI($conn, $ctrl_ti) . "     <br /> ";
                                    } while ($linha_cti = mysqli_fetch_assoc($dados_cti));
                                    //echo $i;
                                    ?>

                                </div>
                                <div>
                                 
                                 </div>  
                             
                                <br>
                            <div>
                         

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


        break;
    }
    case '2': {
        $query = "select * from tb_controle_ti where status=0 order by ctrl_ti";
        $dados_cti = mysqli_query($conn, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados_cti);
        $total = mysqli_num_rows($dados_cti);
        //    echo "<center>" . $total . "</center>";
        if ($resultadoDaInsercao == '0') {
            echo " <center> Nenhum resultado obtido no controle T.I   </center>";
        } else {

            ?>
                                    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                    <html>
                                        <head>
                                        <title>CTI lista</title>
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
                                
                                                                        <a href="buscador_div.php?" title="Consulta de  CTI ">Consulta de  CTI  </a> &nbsp &nbsp    &nbsp &nbsp
                                <a href="verifica_cti_lista.php?tipo=1" title="Consulta de  CTI ">Lista  de CTI    </a>      &nbsp &nbsp    &nbsp &nbsp
                                <a href="verifica_cti_lista.php?tipo=3" title="Consulta de  CTI ">Ordenar por Descricao   </a><br /><br />

                                                                    <div>  
                                                        <h3>Informacoes de  Controle CTI Excluidos / não Utilizados </h3> 
                                    <?php
                                    $i = 0;
                                    $linha_cti = mysqli_fetch_assoc($dados_cti);
                                    do {

                                        $i = $i + 1;
                                        $ret_id = $linha_cti['tab_origem'];
                                        $ret_status = $linha_cti['status'];
                                        $ctrl_ti = $linha_cti['ctrl_ti'];
                                        $ret_tab_origem = $linha_cti['tab_origem'];
                                        $ret_tab_chave = $linha_cti['tab_chave'];
                                        $ret_tab_cam = $linha_cti['tab_cam'];
                                        $ret_dtcad = $linha_cti['dt_cad'];
                                        $ret_tecnico = $linha_cti['tecnico'];
                                        $ret_descricao = strtoupper($linha_cti['descricao']);

                                        $vis_cti = mascara_cti($ctrl_ti);
                                        // $codificacao = "C" . $linha['ctrl_ti'] . "- D" . $linha['tab_chave'] . "- L" . $linha['tab_cam'] . "- " . strtoupper($linha['descricao']);
                                        // if (resumo_TI($conn, $ctrl_ti) == "0") {
                                        //remove_TI($Fconexao, $Ftab, $Fjustificativa, $Fid, $Fctrl_ti, $Fhoje, $Fusuario) // remover equip em status = 0 ;
                                        //     $retorno_remocao1 = remove_TI($conn, "0", "correcao", $ret_id, $ctrl_ti, $hoje, $usuario); // remover equip em status = 0 ;
                                        //  $retorno_remocao1 = remove_TI($conn, "0", $ret_just, $ret_id, $ret_ctrl_ti, $hoje, $usuario); // remover equip em status = 0 ;
                                        //  echo "<a href='controlador_cti.php?cti=" . $ctrl_ti . "' title='{$codificacao}' > {$vis_cti} </a>&nbsp      "; // <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";                                                                                 
                                        echo " CTI : " . $vis_cti . "     Status : " . $ret_status . "     " . $ret_descricao . "  <br /> ";
                                        //  echo " CTI : " . $vis_cti . "      " . resumo_TI($conn, $ctrl_ti) . "  Status  " . $retorno_remocao1 . "    <br /> ";
                                        //           echo "<br>";
                                        //}
                                    } while ($linha_cti = mysqli_fetch_assoc($dados_cti));
                                    //  echo $i;
                                    ?>

                                </div>
                                <div>
                                 
                                 </div>  
                             
                                <br>
                            <div>
                                <a href="buscador_div.php?" title="Consulta de  CTI ">Consultas  </a><br /><br />
                            

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



        break;
    }
    case '3': {
         $query = "select * from tb_controle_ti where status=1 order by descricao";
        $dados_cti = mysqli_query($conn, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados_cti);
        $total = mysqli_num_rows($dados_cti);
        //    echo "<center>" . $total . "</center>";
        if ($resultadoDaInsercao == '0') {
            echo " <center> Nenhum resultado obtido no controle T.I   </center>";
        } else {

            ?>
                                    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                    <html>
                                        <head>
                                        <title>CTI lista</title>
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
                                
                                                                        <a href="buscador_div.php?" title="Consulta de  CTI ">Consulta de  CTI  </a> &nbsp &nbsp    &nbsp &nbsp
                                <a href="verifica_cti_lista.php?tipo=1" title="Consulta de  CTI ">Lista  de CTI    </a>      &nbsp &nbsp    &nbsp &nbsp
                                <a href="verifica_cti_lista.php?tipo=3" title="Consulta de  CTI ">Ordenar por Descricao   </a><br /><br />

                                                                    <div>  
                                                        <h3>Informacoes de  Controle CTI  Utilizados </h3> 
                                    <?php
                                    $i = 0;
                                    $linha_cti = mysqli_fetch_assoc($dados_cti);
                                    do {

                                        $i = $i + 1;
                                        $ret_id = $linha_cti['tab_origem'];
                                        $ret_status = $linha_cti['status'];
                                        $ctrl_ti = $linha_cti['ctrl_ti'];
                                        $ret_tab_origem = $linha_cti['tab_origem'];
                                        $ret_tab_chave = $linha_cti['tab_chave'];
                                        $ret_tab_cam = $linha_cti['tab_cam'];
                                        $ret_dtcad = $linha_cti['dt_cad'];
                                        $ret_tecnico = $linha_cti['tecnico'];
                                        $ret_descricao = strtoupper($linha_cti['descricao']);

                                        $vis_cti = mascara_cti($ctrl_ti);
                                        // $codificacao = "C" . $linha['ctrl_ti'] . "- D" . $linha['tab_chave'] . "- L" . $linha['tab_cam'] . "- " . strtoupper($linha['descricao']);
                                        // if (resumo_TI($conn, $ctrl_ti) == "0") {
                                        //remove_TI($Fconexao, $Ftab, $Fjustificativa, $Fid, $Fctrl_ti, $Fhoje, $Fusuario) // remover equip em status = 0 ;
                                        //     $retorno_remocao1 = remove_TI($conn, "0", "correcao", $ret_id, $ctrl_ti, $hoje, $usuario); // remover equip em status = 0 ;
                                        //  $retorno_remocao1 = remove_TI($conn, "0", $ret_just, $ret_id, $ret_ctrl_ti, $hoje, $usuario); // remover equip em status = 0 ;
                                        //  echo "<a href='controlador_cti.php?cti=" . $ctrl_ti . "' title='{$codificacao}' > {$vis_cti} </a>&nbsp      "; // <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";                                                                                 
                                        echo $ret_descricao."     CTI : " . $vis_cti . "     Status : " . $ret_status . "       <br /> ";
                                        //  echo " CTI : " . $vis_cti . "      " . resumo_TI($conn, $ctrl_ti) . "  Status  " . $retorno_remocao1 . "    <br /> ";
                                        //           echo "<br>";
                                        //}
                                    } while ($linha_cti = mysqli_fetch_assoc($dados_cti));
                                    //  echo $i;
                                    ?>

                                </div>
                                <div>
                                 
                                 </div>  
                             
                                <br>
                            <div>
                                <a href="buscador_div.php?" title="Consulta de  CTI ">Consultas  </a><br /><br />
                            

                                </div>
                            </form>
                            </div>
                        </section></div>
                </section>
            </section>
        
        
                </body>

                </html>

      
            <?php

//        }
        


    }

        break;
    }
    case '4': {
        $query = "select * from tb_controle_ti where status=1 order by ctrl_ti";
        $dados_cti = mysqli_query($conn, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados_cti);
        $total = mysqli_num_rows($dados_cti);
        echo "<center>" . $total . "</center>";
        if ($resultadoDaInsercao == '0') {
            echo " <center> Nenhum resultado obtido no controle T.I   </center>";
        } else {

            ?>
                                    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                    <html>
                                        <head>
                                        <title>CTI lista</title>
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
                                <a href="buscador_div.php?" title="Consulta de  CTI ">Consulta de  CTI  </a> &nbsp &nbsp    &nbsp &nbsp
                                <a href="verifica_cti_lista.php?tipo=2" title="Consulta de  CTI ">Visualizar CTI Excluidos   </a>    &nbsp &nbsp    &nbsp &nbsp
                                  <a href="verifica_cti_lista.php?tipo=1" title="Consulta de  CTI ">Visualizar Numericamente    </a> &nbsp &nbsp    &nbsp &nbsp
                               <a href="verifica_cti_lista.php?tipo=3" title="Consulta de  CTI ">Ordenar por Descricao   </a><br /><br />

                                </div>

                                                                    <div>  
                                                        <h3>Informacoes de  Controle CTI  Utilizados </h3> 
                                    <?php
                                    $i = 0;
                                    $linha_cti = mysqli_fetch_assoc($dados_cti);
                                    do {

                                        $i = $i + 1;
                                        $ret_id = $linha_cti['tab_origem'];
                                        $ret_status = $linha_cti['status'];
                                        $ctrl_ti = $linha_cti['ctrl_ti'];
                                        $ret_tab_origem = $linha_cti['tab_origem'];
                                        $ret_tab_chave = $linha_cti['tab_chave'];
                                        $ret_tab_cam = $linha_cti['tab_cam'];
                                        $ret_dtcad = $linha_cti['dt_cad'];
                                        $ret_tecnico = $linha_cti['tecnico'];
                                        $ret_descricao = strtoupper($linha_cti['descricao']);
                                        $vis_cti = mascara_cti($ctrl_ti);
                                        //echo " CTI : " . $vis_cti . "     Status : " . $ret_status . "     " . $ret_descricao . "  <br /> ";
                                        echo "   CTI : " . $vis_cti . "      " . resumo_TI($conn, $ctrl_ti) . "    ( ".$ret_descricao ."  )   <br /> ";
                                    } while ($linha_cti = mysqli_fetch_assoc($dados_cti));
                                    //echo $i;
                                    ?>

                                </div>
                                <div>
                                 
                                 </div>  
                             
                                <br>
                            <div>
                         

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




        break;
    }
    case '5': // desktop
        {
        $query = "select * from tb_controle_ti where status=1 and descricao = 'DESKTOP' order by CTRL_TI";
        $dados_cti = mysqli_query($conn, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados_cti);
        $total = mysqli_num_rows($dados_cti);
        //    echo "<center>" . $total . "</center>";
        if ($resultadoDaInsercao == '0') {
            echo " <center> Nenhum resultado obtido no controle T.I   </center>";
        } else {

            ?>
                                    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                    <html>
                                        <head>
                                        <title>CTI lista</title>
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
                                
                                 <a href="buscador_div.php?" title="Consulta de  CTI ">Consulta de  CTI  </a> &nbsp &nbsp    &nbsp &nbsp
                                <a href="verifica_cti_lista.php?tipo=4" title="Consulta de  CTI ">Ordenar Numericamente    </a> &nbsp &nbsp    &nbsp &nbsp
                               <a href="verifica_cti_lista.php?tipo=3" title="Consulta de  CTI ">Ordenar por Descricao   </a>&nbsp &nbsp    &nbsp &nbsp 
                               <a href="verifica_cti_lista.php?tipo=2" title="Consulta de  CTI ">Visualizar CTI Excluidos   </a>    &nbsp &nbsp    &nbsp &nbsp <br />
                                <a href="verifica_cti_lista.php?tipo=5" title="Somente Desktop ">Visualizar Desktop(s)   </a>&nbsp &nbsp    &nbsp &nbsp
                               <a href="verifica_cti_lista.php?tipo=6" title="Somente Notebooks ">Visualizar notebook(s)   </a>&nbsp &nbsp    &nbsp &nbsp
                                <a href="verifica_cti_lista.php?tipo=7" title="Somente Monitores ">Visualizar Monitores (s)   </a>&nbsp &nbsp    &nbsp &nbsp
                               <a href="verifica_cti_lista.php?tipo=8" title="Diversos ">Visualizar Diversos   </a><br /><br />&nbsp &nbsp    &nbsp &nbsp
                             

                                                                    <div>  
                                                        <h3>Informacoes de  Controle CTI  Utilizados </h3> 
                                    <?php
                                    $i = 0;
                                    $linha_cti = mysqli_fetch_assoc($dados_cti);
                                    do {

                                        $i = $i + 1;
                                        $ret_id = $linha_cti['tab_origem'];
                                        $ret_status = $linha_cti['status'];
                                        $ctrl_ti = $linha_cti['ctrl_ti'];
                                        $ret_tab_origem = $linha_cti['tab_origem'];
                                        $ret_tab_chave = $linha_cti['tab_chave'];
                                        $ret_tab_cam = $linha_cti['tab_cam'];
                                        $ret_dtcad = $linha_cti['dt_cad'];
                                        $ret_tecnico = $linha_cti['tecnico'];
                                        $ret_descricao = strtoupper($linha_cti['descricao']);

                                        $vis_cti = mascara_cti($ctrl_ti);
                                        // $codificacao = "C" . $linha['ctrl_ti'] . "- D" . $linha['tab_chave'] . "- L" . $linha['tab_cam'] . "- " . strtoupper($linha['descricao']);
                                        // if (resumo_TI($conn, $ctrl_ti) == "0") {
                                        //remove_TI($Fconexao, $Ftab, $Fjustificativa, $Fid, $Fctrl_ti, $Fhoje, $Fusuario) // remover equip em status = 0 ;
                                        //     $retorno_remocao1 = remove_TI($conn, "0", "correcao", $ret_id, $ctrl_ti, $hoje, $usuario); // remover equip em status = 0 ;
                                        //  $retorno_remocao1 = remove_TI($conn, "0", $ret_just, $ret_id, $ret_ctrl_ti, $hoje, $usuario); // remover equip em status = 0 ;
                                        //  echo "<a href='controlador_cti.php?cti=" . $ctrl_ti . "' title='{$codificacao}' > {$vis_cti} </a>&nbsp      "; // <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";                                                                                 
                                        echo $ret_descricao . "     CTI : " . $vis_cti . "     Status : " . $ret_status . "       <br /> ";
                                        //  echo " CTI : " . $vis_cti . "      " . resumo_TI($conn, $ctrl_ti) . "  Status  " . $retorno_remocao1 . "    <br /> ";
                                        //           echo "<br>";
                                        //}
                                    } while ($linha_cti = mysqli_fetch_assoc($dados_cti));
                                    //  echo $i;
                                    ?>

                                </div>
                                <div>
                                 
                                 </div>  
                             
                                <br>
                            <div>
                                <a href="buscador_div.php?" title="Consulta de  CTI ">Consultas  </a><br /><br />
                            

                                </div>
                            </form>
                            </div>
                        </section></div>
                </section>
            </section>
        
        
                </body>

                </html>

      
            <?php

            //        }



        }

        break;
    }
    case '6': // notebooks
    {
        $query = "select * from tb_controle_ti where status=1 and descricao = 'NOTEBOOK' order by CTRL_TI";
        $dados_cti = mysqli_query($conn, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados_cti);
        $total = mysqli_num_rows($dados_cti);
        //    echo "<center>" . $total . "</center>";
        if ($resultadoDaInsercao == '0') {
            echo " <center> Nenhum resultado obtido no controle T.I   </center>";
        } else {

            ?>
                                    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                    <html>
                                        <head>
                                        <title>CTI lista</title>
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
                                
                                 <a href="buscador_div.php?" title="Consulta de  CTI ">Consulta de  CTI  </a> &nbsp &nbsp    &nbsp &nbsp
                                <a href="verifica_cti_lista.php?tipo=4" title="Consulta de  CTI ">Ordenar Numericamente    </a> &nbsp &nbsp    &nbsp &nbsp
                               <a href="verifica_cti_lista.php?tipo=3" title="Consulta de  CTI ">Ordenar por Descricao   </a>&nbsp &nbsp    &nbsp &nbsp 
                               <a href="verifica_cti_lista.php?tipo=2" title="Consulta de  CTI ">Visualizar CTI Excluidos   </a>    &nbsp &nbsp    &nbsp &nbsp <br />
                                <a href="verifica_cti_lista.php?tipo=5" title="Somente Desktop ">Visualizar Desktop(s)   </a>&nbsp &nbsp    &nbsp &nbsp
                               <a href="verifica_cti_lista.php?tipo=6" title="Somente Notebooks ">Visualizar notebook(s)   </a>&nbsp &nbsp    &nbsp &nbsp
                                <a href="verifica_cti_lista.php?tipo=7" title="Somente Monitores ">Visualizar Monitores (s)   </a>&nbsp &nbsp    &nbsp &nbsp
                               <a href="verifica_cti_lista.php?tipo=8" title="Diversos ">Visualizar Diversos   </a><br /><br />&nbsp &nbsp    &nbsp &nbsp
                             

                                                                    <div>  
                                                        <h3>Informacoes de  Controle CTI  Utilizados </h3> 
                                    <?php
                                    $i = 0;
                                    $linha_cti = mysqli_fetch_assoc($dados_cti);
                                    do {

                                        $i = $i + 1;
                                        $ret_id = $linha_cti['tab_origem'];
                                        $ret_status = $linha_cti['status'];
                                        $ctrl_ti = $linha_cti['ctrl_ti'];
                                        $ret_tab_origem = $linha_cti['tab_origem'];
                                        $ret_tab_chave = $linha_cti['tab_chave'];
                                        $ret_tab_cam = $linha_cti['tab_cam'];
                                        $ret_dtcad = $linha_cti['dt_cad'];
                                        $ret_tecnico = $linha_cti['tecnico'];
                                        $ret_descricao = strtoupper($linha_cti['descricao']);

                                        $vis_cti = mascara_cti($ctrl_ti);
                                        // $codificacao = "C" . $linha['ctrl_ti'] . "- D" . $linha['tab_chave'] . "- L" . $linha['tab_cam'] . "- " . strtoupper($linha['descricao']);
                                        // if (resumo_TI($conn, $ctrl_ti) == "0") {
                                        //remove_TI($Fconexao, $Ftab, $Fjustificativa, $Fid, $Fctrl_ti, $Fhoje, $Fusuario) // remover equip em status = 0 ;
                                        //     $retorno_remocao1 = remove_TI($conn, "0", "correcao", $ret_id, $ctrl_ti, $hoje, $usuario); // remover equip em status = 0 ;
                                        //  $retorno_remocao1 = remove_TI($conn, "0", $ret_just, $ret_id, $ret_ctrl_ti, $hoje, $usuario); // remover equip em status = 0 ;
                                        //  echo "<a href='controlador_cti.php?cti=" . $ctrl_ti . "' title='{$codificacao}' > {$vis_cti} </a>&nbsp      "; // <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";                                                                                 
                                        echo $ret_descricao . "     CTI : " . $vis_cti . "     Status : " . $ret_status . "       <br /> ";
                                        //  echo " CTI : " . $vis_cti . "      " . resumo_TI($conn, $ctrl_ti) . "  Status  " . $retorno_remocao1 . "    <br /> ";
                                        //           echo "<br>";
                                        //}
                                    } while ($linha_cti = mysqli_fetch_assoc($dados_cti));
                                    //  echo $i;
                                    ?>

                                </div>
                                <div>
                                 
                                 </div>  
                             
                                <br>
                            <div>
                                <a href="buscador_div.php?" title="Consulta de  CTI ">Consultas  </a><br /><br />
                            

                                </div>
                            </form>
                            </div>
                        </section></div>
                </section>
            </section>
        
        
                </body>

                </html>

      
            <?php

            //        }



        }

        break;
    }
    case '7': // monitores
    {
        
        $query = "select * from tb_controle_ti where status=1 and descricao = 'MONITOR' order by CTRL_TI";
        $dados_cti = mysqli_query($conn, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados_cti);
        $total = mysqli_num_rows($dados_cti);
        //    echo "<center>" . $total . "</center>";
        if ($resultadoDaInsercao == '0') {
            echo " <center> Nenhum resultado obtido no controle T.I   </center>";
        } else {

            ?>
                                    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                    <html>
                                        <head>
                                        <title>CTI lista</title>
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
                                
                                 <a href="buscador_div.php?" title="Consulta de  CTI ">Consulta de  CTI  </a> &nbsp &nbsp    &nbsp &nbsp
                                <a href="verifica_cti_lista.php?tipo=4" title="Consulta de  CTI ">Ordenar Numericamente    </a> &nbsp &nbsp    &nbsp &nbsp
                               <a href="verifica_cti_lista.php?tipo=3" title="Consulta de  CTI ">Ordenar por Descricao   </a>&nbsp &nbsp    &nbsp &nbsp 
                               <a href="verifica_cti_lista.php?tipo=2" title="Consulta de  CTI ">Visualizar CTI Excluidos   </a>    &nbsp &nbsp    &nbsp &nbsp <br />
                                <a href="verifica_cti_lista.php?tipo=5" title="Somente Desktop ">Visualizar Desktop(s)   </a>&nbsp &nbsp    &nbsp &nbsp
                               <a href="verifica_cti_lista.php?tipo=6" title="Somente Notebooks ">Visualizar notebook(s)   </a>&nbsp &nbsp    &nbsp &nbsp
                                <a href="verifica_cti_lista.php?tipo=7" title="Somente Monitores ">Visualizar Monitores (s)   </a>&nbsp &nbsp    &nbsp &nbsp
                               <a href="verifica_cti_lista.php?tipo=8" title="Diversos ">Visualizar Diversos   </a><br /><br />&nbsp &nbsp    &nbsp &nbsp
                             

                                                                    <div>  
                                                        <h3>Informacoes de  Controle CTI  Utilizados </h3> 
                                    <?php
                                    $i = 0;
                                    $linha_cti = mysqli_fetch_assoc($dados_cti);
                                    do {

                                        $i = $i + 1;
                                        $ret_id = $linha_cti['tab_origem'];
                                        $ret_status = $linha_cti['status'];
                                        $ctrl_ti = $linha_cti['ctrl_ti'];
                                        $ret_tab_origem = $linha_cti['tab_origem'];
                                        $ret_tab_chave = $linha_cti['tab_chave'];
                                        $ret_tab_cam = $linha_cti['tab_cam'];
                                        $ret_dtcad = $linha_cti['dt_cad'];
                                        $ret_tecnico = $linha_cti['tecnico'];
                                        $ret_descricao = strtoupper($linha_cti['descricao']);

                                        $vis_cti = mascara_cti($ctrl_ti);
                                        // $codificacao = "C" . $linha['ctrl_ti'] . "- D" . $linha['tab_chave'] . "- L" . $linha['tab_cam'] . "- " . strtoupper($linha['descricao']);
                                        // if (resumo_TI($conn, $ctrl_ti) == "0") {
                                        //remove_TI($Fconexao, $Ftab, $Fjustificativa, $Fid, $Fctrl_ti, $Fhoje, $Fusuario) // remover equip em status = 0 ;
                                        //     $retorno_remocao1 = remove_TI($conn, "0", "correcao", $ret_id, $ctrl_ti, $hoje, $usuario); // remover equip em status = 0 ;
                                        //  $retorno_remocao1 = remove_TI($conn, "0", $ret_just, $ret_id, $ret_ctrl_ti, $hoje, $usuario); // remover equip em status = 0 ;
                                        //  echo "<a href='controlador_cti.php?cti=" . $ctrl_ti . "' title='{$codificacao}' > {$vis_cti} </a>&nbsp      "; // <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";                                                                                 
                                        echo $ret_descricao . "     CTI : " . $vis_cti . "     Status : " . $ret_status . "       <br /> ";
                                        //  echo " CTI : " . $vis_cti . "      " . resumo_TI($conn, $ctrl_ti) . "  Status  " . $retorno_remocao1 . "    <br /> ";
                                        //           echo "<br>";
                                        //}
                                    } while ($linha_cti = mysqli_fetch_assoc($dados_cti));
                                    //  echo $i;
                                    ?>

                                </div>
                                <div>
                                 
                                 </div>  
                             
                                <br>
                            <div>
                                <a href="buscador_div.php?" title="Consulta de  CTI ">Consultas  </a><br /><br />
                            

                                </div>
                            </form>
                            </div>
                        </section></div>
                </section>
            </section>
        
        
                </body>

                </html>

      
            <?php

            //        }



        }

        break;
    }

    case '8': // diversos
    {
        $query = "select * from tb_controle_ti where status=1 and tab_origem = '2' order by descricao";
        $dados_cti = mysqli_query($conn, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados_cti);
        $total = mysqli_num_rows($dados_cti);
        //    echo "<center>" . $total . "</center>";
        if ($resultadoDaInsercao == '0') {
            echo " <center> Nenhum resultado obtido no controle T.I   </center>";
        } else {

            ?>
                                    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                    <html>
                                        <head>
                                        <title>CTI lista</title>
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
                                
                                 <a href="buscador_div.php?" title="Consulta de  CTI ">Consulta de  CTI  </a> &nbsp &nbsp    &nbsp &nbsp
                                <a href="verifica_cti_lista.php?tipo=4" title="Consulta de  CTI ">Ordenar Numericamente    </a> &nbsp &nbsp    &nbsp &nbsp
                               <a href="verifica_cti_lista.php?tipo=3" title="Consulta de  CTI ">Ordenar por Descricao   </a>&nbsp &nbsp    &nbsp &nbsp 
                               <a href="verifica_cti_lista.php?tipo=2" title="Consulta de  CTI ">Visualizar CTI Excluidos   </a>    &nbsp &nbsp    &nbsp &nbsp <br />
                                <a href="verifica_cti_lista.php?tipo=5" title="Somente Desktop ">Visualizar Desktop(s)   </a>&nbsp &nbsp    &nbsp &nbsp
                               <a href="verifica_cti_lista.php?tipo=6" title="Somente Notebooks ">Visualizar notebook(s)   </a>&nbsp &nbsp    &nbsp &nbsp
                                <a href="verifica_cti_lista.php?tipo=7" title="Somente Monitores ">Visualizar Monitores (s)   </a>&nbsp &nbsp    &nbsp &nbsp
                               <a href="verifica_cti_lista.php?tipo=8" title="Diversos ">Visualizar Diversos   </a><br /><br />&nbsp &nbsp    &nbsp &nbsp
                             

                                                                    <div>  
                                                        <h3>Informacoes de  Controle CTI  Utilizados </h3> 
                                    <?php
                                    $i = 0;
                                    $linha_cti = mysqli_fetch_assoc($dados_cti);
                                    do {

                                        $i = $i + 1;
                                        $ret_id = $linha_cti['tab_origem'];
                                        $ret_status = $linha_cti['status'];
                                        $ctrl_ti = $linha_cti['ctrl_ti'];
                                        $ret_tab_origem = $linha_cti['tab_origem'];
                                        $ret_tab_chave = $linha_cti['tab_chave'];
                                        $ret_tab_cam = $linha_cti['tab_cam'];
                                        $ret_dtcad = $linha_cti['dt_cad'];
                                        $ret_tecnico = $linha_cti['tecnico'];
                                        $ret_descricao = strtoupper($linha_cti['descricao']);

                                        $vis_cti = mascara_cti($ctrl_ti);
                                        // $codificacao = "C" . $linha['ctrl_ti'] . "- D" . $linha['tab_chave'] . "- L" . $linha['tab_cam'] . "- " . strtoupper($linha['descricao']);
                                        // if (resumo_TI($conn, $ctrl_ti) == "0") {
                                        //remove_TI($Fconexao, $Ftab, $Fjustificativa, $Fid, $Fctrl_ti, $Fhoje, $Fusuario) // remover equip em status = 0 ;
                                        //     $retorno_remocao1 = remove_TI($conn, "0", "correcao", $ret_id, $ctrl_ti, $hoje, $usuario); // remover equip em status = 0 ;
                                        //  $retorno_remocao1 = remove_TI($conn, "0", $ret_just, $ret_id, $ret_ctrl_ti, $hoje, $usuario); // remover equip em status = 0 ;
                                        //  echo "<a href='controlador_cti.php?cti=" . $ctrl_ti . "' title='{$codificacao}' > {$vis_cti} </a>&nbsp      "; // <img src='img/tela.jpg' title='controle interno " . $codificacao . "' height='10' width='10' >  <br /> ";                                                                                 
                                        echo $ret_descricao . "     CTI : " . $vis_cti . "     Status : " . $ret_status . "       <br /> ";
                                        //  echo " CTI : " . $vis_cti . "      " . resumo_TI($conn, $ctrl_ti) . "  Status  " . $retorno_remocao1 . "    <br /> ";
                                        //           echo "<br>";
                                        //}
                                    } while ($linha_cti = mysqli_fetch_assoc($dados_cti));
                                    //  echo $i;
                                    ?>

                                </div>
                                <div>
                                 
                                 </div>  
                             
                                <br>
                            <div>
                                <a href="buscador_div.php?" title="Consulta de  CTI ">Consultas  </a><br /><br />
                            

                                </div>
                            </form>
                            </div>
                        </section></div>
                </section>
            </section>
        
        
                </body>

                </html>

      
            <?php

            //        }



        }

        break;
    }
    case '9': 
    {

        break;
    }


}                   


