<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";
include "bco_fun.php";
$ret_id = STRTOUPPER($_GET['tipo']);
$hoje = date("d/m/Y H:i:s ");


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
    <title>Visualizar Alteracoes de Equipamentos</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
                                <h2 class="title pull-left">Sistema de Gestão T.I.
                                </h2>
                                <a href="ret_dados_altd.php?loc=Liberado&tipo=0" title="Ordem de Lançamento ">*</a><br />
                               
                                 </h1>
                                
                                
                            </header>
                            
                          <div class="content-body">
                              <h5 class="title pull-left">Registros  T.I. <  <?php echo $hoje; ?> >  <?php echo " <B> " . ret_desc_ctrl_ti($conn, $ret_id) . "</B>"; ?>          
                                </h5>
                            <br />
                                <h5 class="title pull-left">  <?php echo " <B>CONTROLE T.I.  Nº ".$ret_id."</B>"; ?>   
                                </h5> 
                              
                                  <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                     <!-- ********************************************** -->
                                       <div  id="consulta"> 
                                         <!-- ********************************************** -->
                                       </div>
                                       <div class="form-group">
                                
                                        </div>
                                     </div>
                            
                                 <?php 
                               
                                     if (($ret_id == "GERAL"))
                                     {
                                        // echo " consulta Geral ";
                                 
                                         $query = "select * from tb_registra  ORDER BY id desc";
                                         $dados = mysqli_query($conn, $query);
                                         $resultadoDaInsercao = mysqli_num_rows($dados);
                                         if ($resultadoDaInsercao == '0') {
                                             echo " <br><br><b> Sem Registros de  Alteraçoes no controle  " . $ret_id . " </b>";
                                         } else {
                                             $linha = mysqli_fetch_assoc($dados);
                                             echo "<table>";
                                             echo "<td> CTI  </td>
                                           <td>  &nbsp &nbsp  </td>
                                           <td> Tabela  </td>
                                           <td>  &nbsp &nbsp  </td>
                                           <td> Tab_id </td>
                                           <td>  &nbsp &nbsp  </td>
                                           <td> Campo </td> 
                                           <td>  &nbsp &nbsp  </td>
                                           <td> Dados </td>
                                           <td>  &nbsp &nbsp  </td>
                                           <td> Usuario </td>
                                           <td>  &nbsp &nbsp  </td>
                                           <td> Local   </td> 
                                           <td>  &nbsp &nbsp  </td>
                                           <td> Data  </td> 
                                               <td>  &nbsp &nbsp  </td>
                                           <td>  &nbsp &nbsp  </td>";
                                             echo " <tr> <td>  &nbsp &nbsp  </td>
                                         <td>  &nbsp &nbsp  </td>
                                         <td>  &nbsp &nbsp  </td>
                                         <td>  &nbsp &nbsp  </td>
                                         <td>  &nbsp &nbsp  </td>
                                         <td>  &nbsp &nbsp  </td>
                                         <td>  &nbsp &nbsp  </td>
                                         <td>  &nbsp &nbsp  </td>
                                         <td>  &nbsp &nbsp  </td>
                                         <td>  &nbsp &nbsp  </td>
                                          <td>  &nbsp &nbsp  </td>
                                          <td>  &nbsp &nbsp  </td>
                                          <td>  &nbsp &nbsp  </td>
                                          <td>  &nbsp &nbsp  </td>
                                          <td>  &nbsp &nbsp  </td>
                                            <td>  &nbsp &nbsp  </td>
                                                <td>  &nbsp &nbsp  </td>
                                          </tr>
                                         ";
                                             do {

                                                 // $linha = mysqli_fetch_assoc($dados);
                                                 $ret_id = $linha['id'];
                                                 $ret_ctrl_ti = $linha['ctrl_ti'];
                                                 $ret_tab_id = $linha['tabela_id'];
                                                 $ret_tabela = $linha['tabela'];
                                                 $ret_tab_cpo = $linha['tabela_cpo'];
                                                 $ret_tab_dados = $linha['tabela_dados'];
                                                 $ret_usuario = $linha['usuario'];
                                                 $ret_outros = $linha['outros'];
                                                 $ret_data = $linha['data'];

                                                 if ($ret_tabela == "1") {
                                                     $ret_tabela_desc = "Equip.";
                                                     $pagina = "ret_dados.php?id=" . $ret_ctrl_ti;
                                                     ?>   
                                                     <tr>
                                                     <td><?php echo $ret_ctrl_ti; ?>  </td>
                                                     <td><?php echo "  &nbsp &nbsp  "; ?>  </td>
                                                     <td style="text-align: center"> <?php echo $ret_tabela_desc; ?>  </td>
                                                     <td><?php echo "  &nbsp &nbsp  "; ?>  </td>
                                                     <td><?php echo $ret_tab_id; ?>  </td>
                                                     <td><?php echo "  &nbsp &nbsp  "; ?>  </td>
                                                     <td><?php echo $ret_tab_cpo; ?>  </td>
                                                     <td><?php echo "  &nbsp &nbsp  "; ?>  </td>
                                                     <td><?php echo $ret_tab_dados; ?>  </td>
                                                     <td><?php echo "  &nbsp &nbsp  "; ?>  </td>
                                                     <td> <i> <?php echo $ret_usuario; ?> </i> </td>
                                                     <td><?php echo "  &nbsp &nbsp  "; ?>  </td>
                                                     <td><?php echo $ret_outros; ?>  </td>
                                                     <td><?php echo "  &nbsp &nbsp  "; ?>  </td>
                                                     <td><?php echo $ret_data; ?>  </td>
                                                     <td><?php echo "  &nbsp &nbsp  "; ?>  </td>
                                                     <td> <a href= "<?php echo $pagina; ?>">  <img src="img\pesquisar.png" BORDER='0' WIDTH='15' HEIGHT='15' ALIGN='left'  alt='Tipo' title = "Visualizar Registro" longdesc='a' /> </a> </td>
                                         

                                                 </tr>
                                                <?php


                                                 } else
                                                     if ($ret_tabela == "2") {
                                                         $ret_tabela_desc = "Diversos.";
                                                         $pagina = "ret_dadosd.php?id=" . $ret_tab_id;
                                                         ?>   
                                                     <tr>
                                                     <td><?php echo $ret_ctrl_ti; ?>  </td>
                                                     <td><?php echo "  &nbsp &nbsp  "; ?>  </td>
                                                     <td style="text-align: center"> <?php echo $ret_tabela_desc; ?>  </td>
                                                     <td><?php echo "  &nbsp &nbsp  "; ?>  </td>
                                                     <td><?php echo $ret_tab_id; ?>  </td>
                                                     <td><?php echo "  &nbsp &nbsp  "; ?>  </td>
                                                     <td><?php echo $ret_tab_cpo; ?>  </td>
                                                     <td><?php echo "  &nbsp &nbsp  "; ?>  </td>
                                                     <td><?php echo $ret_tab_dados; ?>  </td>
                                                     <td><?php echo "  &nbsp &nbsp  "; ?>  </td>
                                                     <td> <i> <?php echo $ret_usuario; ?> </i> </td>
                                                     <td><?php echo "  &nbsp &nbsp  "; ?>  </td>
                                                     <td><?php echo $ret_outros; ?>  </td>
                                                     <td><?php echo "  &nbsp &nbsp  "; ?>  </td>
                                                     <td><?php echo $ret_data; ?>  </td>
                                                     <td><?php echo "  &nbsp &nbsp  "; ?>  </td>
                                                     <td> <a href= "<?php echo $pagina; ?>">  <img src="img\pesquisar.png" BORDER='0' WIDTH='15' HEIGHT='15' ALIGN='left'  alt='Tipo' title = "Visualizar Registro" longdesc='a' /> </a> </td>
                                         

                                                 </tr>
                                                <?php






                                                     } else
                                                         if ($ret_tabela == "3") {
                                                             $ret_tabela_desc = "Monitores";
                                                             $pagina = "ret_dadosm.php?id=" . $ret_ctrl_ti;

                                                             ?>   
                                                     <tr>
                                                     <td><?php echo $ret_ctrl_ti; ?>  </td>
                                                     <td><?php echo "  &nbsp &nbsp  "; ?>  </td>
                                                     <td style="text-align: center"> <?php echo $ret_tabela_desc; ?>  </td>
                                                     <td><?php echo "  &nbsp &nbsp  "; ?>  </td>
                                                     <td><?php echo $ret_tab_id; ?>  </td>
                                                     <td><?php echo "  &nbsp &nbsp  "; ?>  </td>
                                                     <td><?php echo $ret_tab_cpo; ?>  </td>
                                                     <td><?php echo "  &nbsp &nbsp  "; ?>  </td>
                                                     <td><?php echo $ret_tab_dados; ?>  </td>
                                                     <td><?php echo "  &nbsp &nbsp  "; ?>  </td>
                                                     <td> <i> <?php echo $ret_usuario; ?> </i> </td>
                                                     <td><?php echo "  &nbsp &nbsp  "; ?>  </td>
                                                     <td><?php echo $ret_outros; ?>  </td>
                                                     <td><?php echo "  &nbsp &nbsp  "; ?>  </td>
                                                     <td><?php echo $ret_data; ?>  </td>
                                                     <td><?php echo "  &nbsp &nbsp  "; ?>  </td>
                                                     <td> <a href= "<?php echo $pagina; ?>">  <img src="img\pesquisar.png" BORDER='0' WIDTH='15' HEIGHT='15' ALIGN='left'  alt='Tipo' title = "Visualizar Registro" longdesc='a' /> </a> </td>
                                         

                                                 </tr>
                                                <?php

                                                         } else {
                                                             $ret_tabela_desc = "Outros";
                                                             $pagina = "busca_diversos.php";
                                                             ?>
                                 
                                                 <tr>
                                                     <td><?php echo $ret_ctrl_ti; ?>  </td>
                                                     <td><?php echo "  &nbsp &nbsp  "; ?>  </td>
                                                     <td style="text-align: center"> <?php echo $ret_tabela_desc; ?>  </td>
                                                     <td><?php echo "  &nbsp &nbsp  "; ?>  </td>
                                                     <td><?php echo $ret_tab_id; ?>  </td>
                                                     <td><?php echo "  &nbsp &nbsp  "; ?>  </td>
                                                     <td><?php echo $ret_tab_cpo; ?>  </td>
                                                     <td><?php echo "  &nbsp &nbsp  "; ?>  </td>
                                                     <td><?php echo $ret_tab_dados; ?>  </td>
                                                     <td><?php echo "  &nbsp &nbsp  "; ?>  </td>
                                                     <td> <i> <?php echo $ret_usuario; ?> </i> </td>
                                                     <td><?php echo "  &nbsp &nbsp  "; ?>  </td>
                                                     <td><?php echo $ret_outros; ?>  </td>
                                                     <td><?php echo "  &nbsp &nbsp  "; ?>  </td>
                                                     <td><?php echo $ret_data; ?>  </td>
                                                     <td><?php echo "  &nbsp &nbsp  "; ?>  </td>
                                                     <td> <a href= "<?php echo $pagina; ?>">  <img src="img\pesquisar.png" BORDER='0' WIDTH='15' HEIGHT='15' ALIGN='left'  alt='Tipo' title = "Visualizar Registro" longdesc='a' /> </a> </td>
                                         

                                                 </tr>
                                                <?php

                                                         }
                                                
                                             } while ($linha = mysqli_fetch_assoc($dados));
                                         }



                                     
                                      }
                                      else   
                                       {
                                         $query = "select * from tb_registra  order by id desc";
                                         $dados = mysqli_query($conn, $query);
                                         $resultadoDaInsercao = mysqli_num_rows($dados);
                                         if ($resultadoDaInsercao == '0') {
                                             echo " <br><br><b> Sem Registros de  Alteraçoes no controle  " . $ret_id . " </b>";
                                         } 
                                         else
                                         {
                                             $linha = mysqli_fetch_assoc($dados);
                                             echo "<table>";
                                             echo "<td> CTI  </td>
                                           <td>  &nbsp &nbsp  </td>
                                           <td> Tabela  </td>
                                           <td>  &nbsp &nbsp  </td>
                                           <td> Tab_id </td>
                                           <td>  &nbsp &nbsp  </td>
                                           <td> Campo </td> 
                                           <td>  &nbsp &nbsp  </td>
                                           <td> Dados </td>
                                           <td>  &nbsp &nbsp  </td>
                                           <td> Usuario </td>
                                           <td>  &nbsp &nbsp  </td>
                                           <td> Local   </td> 
                                           <td>  &nbsp &nbsp  </td>
                                           <td> Data  </td> 
                                               <td>  &nbsp &nbsp  </td>
                                           <td>  &nbsp &nbsp  </td>";
                                             echo " <tr> <td>  &nbsp &nbsp  </td>
                                         <td>  &nbsp &nbsp  </td>
                                         <td>  &nbsp &nbsp  </td>
                                         <td>  &nbsp &nbsp  </td>
                                         <td>  &nbsp &nbsp  </td>
                                         <td>  &nbsp &nbsp  </td>
                                         <td>  &nbsp &nbsp  </td>
                                         <td>  &nbsp &nbsp  </td>
                                         <td>  &nbsp &nbsp  </td>
                                         <td>  &nbsp &nbsp  </td>
                                          <td>  &nbsp &nbsp  </td>
                                          <td>  &nbsp &nbsp  </td>
                                          <td>  &nbsp &nbsp  </td>
                                          <td>  &nbsp &nbsp  </td>
                                          <td>  &nbsp &nbsp  </td>
                                            <td>  &nbsp &nbsp  </td>
                                                <td>  &nbsp &nbsp  </td>
                                          </tr>
                                         ";
                                             do {

                                                 // $linha = mysqli_fetch_assoc($dados);
                                                 $ret_id = $linha['id'];
                                                 $ret_ctrl_ti = $linha['ctrl_ti'];
                                                 $ret_tab_id = $linha['tabela_id'];
                                                 $ret_tabela = $linha['tabela'];
                                                 $ret_tab_cpo = $linha['tabela_cpo'];
                                                 $ret_tab_dados = $linha['tabela_dados'];
                                                 $ret_usuario = $linha['usuario'];
                                                 $ret_outros = $linha['outros'];
                                                 $ret_data = $linha['data'];

                                                 if ($ret_tabela == "1") {
                                                     $ret_tabela_desc = "Equip.";
                                                     $pagina = "ret_dados.php?id=" . $ret_ctrl_ti;
                                                 } else
                                                     if ($ret_tabela == "2") {
                                                         $ret_tabela_desc = "Diversos.";
                                                         $pagina = "ret_dadosd.php?id=" . $ret_tab_id;
                                                     } else
                                                         if ($ret_tabela == "3") {
                                                             $ret_tabela_desc = "Monitores";
                                                             $pagina = "ret_dadosm.php?id=" . $ret_ctrl_ti;
                                                         } else {
                                                             $ret_tabela_desc = "Outros";
                                                             $pagina = "busca_diversos.php";
                                                         }
                                                 ?>
                                 
                                                 <tr>
                                                     <td><?php echo $ret_ctrl_ti; ?>  </td>
                                                     <td><?php echo "  &nbsp &nbsp  "; ?>  </td>
                                                     <td style="text-align: center"> <?php echo $ret_tabela_desc; ?>  </td>
                                                     <td><?php echo "  &nbsp &nbsp  "; ?>  </td>
                                                     <td><?php echo $ret_tab_id; ?>  </td>
                                                     <td><?php echo "  &nbsp &nbsp  "; ?>  </td>
                                                     <td><?php echo $ret_tab_cpo; ?>  </td>
                                                     <td><?php echo "  &nbsp &nbsp  "; ?>  </td>
                                                     <td><?php echo $ret_tab_dados; ?>  </td>
                                                     <td><?php echo "  &nbsp &nbsp  "; ?>  </td>
                                                     <td> <i> <?php echo $ret_usuario; ?> </i> </td>
                                                     <td><?php echo "  &nbsp &nbsp  "; ?>  </td>
                                                     <td><?php echo $ret_outros; ?>  </td>
                                                     <td><?php echo "  &nbsp &nbsp  "; ?>  </td>
                                                     <td><?php echo $ret_data; ?>  </td>
                                                     <td><?php echo "  &nbsp &nbsp  "; ?>  </td>
                                                     <td> <a href= "<?php echo $pagina; ?>">  <img src="img\pesquisar.png" BORDER='0' WIDTH='15' HEIGHT='15' ALIGN='left'  alt='Tipo' title = "Visualizar Registro" longdesc='a' /> </a> </td>
                                         

                                                 </tr>
                                                <?php
                                             } while ($linha = mysqli_fetch_assoc($dados));
                                        // }
                                     }  
                                 }
                                 ?>
                                 </table>
                                
                                
                                
                                
                                
                                
                            <div>
                          
						  </div>
                            </form>
                            </div>
                        </section></div>
                </section>
            </section>
                                             
        
</body>

</html>
