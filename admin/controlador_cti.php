<?php
   include "bco_fun.php";
//$resolucao = ver_res_w();
////$ret_cmei_id = $_GET['id'];
$cti = $_GET['cti']; // parametro de tipo de busca em controle_ti
$tipo = "1";
//$limite = 30; // qtd de linhas 
if ($tipo == "1") 
{
    include "../validar_session.php";
    include "../Config/config_sistema.php";

    $query = "select * from tb_controle_ti where ctrl_ti = '".$cti."'";
    $dados = mysqli_query($conn, $query);
    $resultadoDaInsercao = mysqli_num_rows($dados);
    $total = mysqli_num_rows($dados);
       //echo "<center>".$total."</center>";
   if ($resultadoDaInsercao == '0') {
        echo "<br> <br> <br>  <center> Nenhum resultado obtido no controle T.I   </center>";
    } else {
      //   $linha = mysqli_fetch_assoc($dados);    
         ?>
                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html>
                    <head>
                    <title>Visualizador simples  de Equipamentos</title>
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
                                        <?php
                                              $i = 0;
                                              //  echo "<center>" . $total . "</center>";
                                                 //  for ($col = 0; $col <= 2; $col++)
                                                   //   {
                                               do{
                                                            $linha = mysqli_fetch_assoc($dados);
                                                             $ret_id = $linha['tab_origem'];
                                                            $ret_status = $linha['status'];
                                                            $ctrl_ti = $linha['ctrl_ti'];
                                                            $ret_tab_origem = $linha['tab_origem'];
                                                            $ret_tab_chave = $linha['tab_chave'];
                                                            $ret_tab_cam = $linha['tab_cam'];
                                                            $ret_dtcad = $linha['dt_cad'];
                                                            $ret_tecnico = $linha['tecnico'];
                                                            $ret_descricao = strtoupper($linha['descricao']);
															$codificacao = "C" . $linha['ctrl_ti'] . " " . $linha['tab_chave'] . "- " . $linha['tab_cam'] ;
                                               } while ($linha = mysqli_fetch_assoc($dados));
                                         ?>
                                   
                                        <a href="ret_dados.php?id= <?php echo $ctrl_ti; ?>" title="Consultar Equipamento" >  Controle CTI </a>     :    
								    <input name="so_tipo"  style="background-color:white;" type="text" id="so_tipo" size="15" value=" <?php echo $ctrl_ti; ?>" readonly />      
										&nbsp	
                                    	  <label >Descrição  : </label>    
										    &nbsp 
									         <input name="so_tipo"  style="background-color: white;" type="text" id="so_tipo" size="15" value=" <?php echo $ret_descricao; ?>" readonly />      
								      &nbsp &nbsp   <label >Dt Cad : </label>    
										&nbsp
									 <input name="so_tipo"  style="background-color:white;" type="text" id="so_tipo" size="20" value=" <?php echo $ret_dtcad; ?>" readonly />      
										&nbsp 
								     <br /> <br />
                                     <?php
                                     $tipo_equip = strtoupper(substr($ret_tab_cam,0,1));
                                       //   echo $tipo_equip;

                                     if($tipo_equip=="C") // busca na tabela equip 
                                     {
                                         $sql = "SELECT * FROM tbequip WHERE tbequip_id = '" . $ret_tab_chave . "' "; //"TEMP LIKE '%".$busca."%' and STATUS=1";
                                         $dados = mysqli_query($conn, $sql) or die(mysqli_error());
                                         $linha = mysqli_fetch_assoc($dados);
                                         $total = mysqli_num_rows($dados);
                                         if ($total == 0) {
                                             $titulo = "\n  " . $total . "  Dados não Localizado (s) em Computadores ".$codificacao;
                                             echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                                         } else
                                         {
                                                     $ret_monitor = $linha['tbequip_monitor'];
                                                     $retloc = $linha['tbequi_tbcmei_id'];
                                                     $retnome = $linha['tbequi_nome'];
                                                     $retID = $linha['tbequip_id'];
                                                     $retplaqueta = $linha['tbequip_plaqueta'];
                                                     $retloc = $linha['tbequi_tbcmei_id'];
                                                     $ret_ctrl_ti = $linha['ctrl_ti'];
                                                     $codificacao = "C" . $linha['ctrl_ti'] . "- D" . $linha['tbequip_id'] . "- L" . $linha['tbequi_tbcmei_id'] . "- S" . $linha['tbequip_sec'];
                                                     $ret_idlocal = $linha['tbequip_id'];
                                                     //$ret_idsec = $linha['tbequi'];
                                                     $ret_plaqueta = $linha['tbequip_plaqueta'];
                                                     $ret_nome = $linha['tbequi_nome'];
                                                     $ret_equi_tipo = $linha['tbequi_tipo'];
                                                     $ret_monitor = $linha['tbequip_monitor'];
                                                     $ret_equi_mod = $linha['tbequi_mod'];
                                                     $ret_so = $linha['tbequip_so'];
                                                     $ret_so_arq = $linha['tbequi_so_arq'];
                                                     $ret_mod_placa = $linha['tbequi_modplaca'];
                                                     $ret_memoria = $linha['tbequi_modelomemoria'];
                                                     $ret_memtam = $linha['tbequi_memoria'];
                                                     $ret_slots = $linha['tbequi_slots'];
                                                     $ret_slots_uso = $linha['tbequi_slots_uso'];
                                                     $ret_modmem = $linha['tbequi_modelomemoria'];
                                                     $ret_armaz = $linha['tbequi_armazenamento'];
                                                     $ret_tparmaz = $linha['tbequi_tparmazenamento'];
                                                     $ret_arm_sec = $linha['tbequi_arm_sec'];
                                                     $ret_arm_sectam = $linha['tbequi_arm_sectam'];
                                                     $ret_datalanc = $linha['tbequi_datalanc'];
                                                     $ret_tec = $linha['tbequi_tecnico'];
                                                     $ret_cmei_id = $linha['tbequi_tbcmei_id'];
                                                     $ret_sec_id = $linha['tbequip_sec'];
                                                     $ret_app = $linha['tbequi_app'];
                                                     $ret_app_out = $linha['tbequi_app_out'];
                                                     $ret_proc = $linha['tbequi_proc'];
                                                     $ret_obs = $linha['tbequi_obs'];
                                                     $ret_ref = $linha['tbequi_ref'];
                                                     $ret_vid_uso = $linha['tbequip_vid_uso'];
                                                     $ret_vid_saidas = $linha['tbequip_vid_saidas'];
                                                     $ret_lacre = $linha['tbequip_lacre'];
                                                     $ret_fonte = $linha['tbequip_fonte'];
                                                     $ret_util_qtd = $linha['tbequip_util_num'];
                                                     $ret_util_nome = $linha['tbequip_util_nomes'];
                                                     $ret_ctrl_ti = $linha['ctrl_ti'];
                                                     $unidade = nomedolocal($conn, $ret_cmei_id);
                                                     $codigos = "Cod Cmei : " . $ret_cmei_id . " Cod Sec : " . $ret_sec_id;
                                                     $codificacao = "cti" . $ret_ctrl_ti . "-t" . $ret_idlocal . "-l-" . $ret_cmei_id . "-s-" . $ret_sec_id;
                                                    ?>
                                                            </br> 
                                                                         <label for="coord">Patrimonio :</label>    
                                                                        &nbsp
                                                                        <input id="plaqueta" name="plaqueta"  style="background-color:white;" type="text" placeholder="Numero da Plaqueta " readonly size = "15" value=" <?php echo $ret_plaqueta; ?>">
                                                                        &nbsp<label for="coord">Nome do Equipamento : </label>  &nbsp
                                                                        <input id="nome_equip" name="nome_equip" style="background-color:white;" type="text" placeholder="Nome do Computador " readonly size = "20" value=" <?php echo $ret_nome; ?>">
                                                                        &nbsp <label >Lacre TI : </label>    
                                                 
                                                                         <input name="so_arq"  style="background-color:white;" type="text" id="so_arq" size="9" value=" <?php echo $ret_lacre; ?>" readonly />      
                                               
                                                               </div>  
                                                        <div>
                                                          <label  title=" <?php echo $codigos; ?>  " >Tipo equip: </label>    
                                                             &nbsp &nbsp
                                                            <input name="tipo_equip"  style="background-color:white;" type="text" id="tipo_equip" size="25" value=" <?php echo $ret_equi_tipo; ?>" readonly />      
                                                                &nbsp &nbsp 
                                                          <label >Sist. Operacional (SO) : </label>    
                                                                
                                                              <input name="so_tipo"  style="background-color:white;" type="text" id="so_tipo" size="35" value=" <?php echo $ret_so; ?>" readonly />      
                                                                                                 
                                                        </div>  
                                                     <div>
                                                          <label> Modelo Placa :     </label> &nbsp &nbsp
                                  
                                                           <input name="placa"  style="background-color:white;" type="text" id="placa" size="88" value=" <?php echo $ret_mod_placa; ?>" readonly />      
                                      
                                  
                                                        </div>

                                                        <div>
                                                          <label> Processador :     </label> &nbsp &nbsp
                                                            <input name="processador" style="background-color:white;"  type="text" id="processador" size="89" value=" <?php echo $ret_proc; ?>" readonly />                
                                    
                                                        </div>  
                              
                                                        <div>
                                                           <label>Armaz. Tipo: </label>     &nbsp &nbsp                       
                                                             <input name="arm_tipo" style="background-color:white;"  type="text" id="arm_tip" size="7" value=" <?php echo $ret_tparmaz; ?>" readonly />                  
                                    
                               
                                                            &nbsp &nbsp   <label>Tamanho: </label>                         
                                                            <input name="arm_tam"  style="background-color:white;" type="text" id="arm_tam" size="7" value=" <?php echo $ret_armaz; ?>" readonly />
                                                              &nbsp &nbsp  
                                                            <label>Armaz  Secundario:   &nbsp &nbsp 
                                                             <input name="arm-sec" style="background-color:white;"  type="text" id="arm_sec" size="7" value=" <?php echo $ret_arm_sec; ?>" readonly />                
                               
                                                            &nbsp<label>Tamanho: </label>
                                                            <input name="arm_sec_tam" style="background-color:white;" type="text" id="arm_sec_tam" size="5" value=" <?php echo $ret_arm_sectam; ?>" readonly  />
                                                         </div>
                                
                                                             <div>
                                                            <label>Memoria Tipo: <label>
                                                            <input name="mem_tipo" style="background-color:white;"  type="text" id="mem_tipo" size="10" value=" <?php echo $ret_memoria; ?>"   readonly  />                
                               
                                                            <label>Mem.Qtd: 
                                                            <input name="mem_qtd"  style="background-color:white;" type="text" id="mem_qtd" size="10" value=" <?php echo $ret_memtam; ?>"   readonly  /></label>
                                    
                                                           &nbsp &nbsp   &nbsp &nbsp  <label>Slots de Memoria:
                                                            <input name="slots" style="background-color:white;" type="text" id="slots" value=" <?php echo $ret_slots; ?>" size="3"  readonly /></label>
                                                              <label>Slots em Uso 
                                                            <input name="slots_uso" style="background-color:white;" type="text" id="slots_uso" value=" <?php echo $ret_slots_uso; ?>" size="2"  readonly  /></label>
                                       
                                                        </div>  
                                                                <div>
                                                             <label>Tipo Monitor :
                                                             <input name="mon_tipo"  type="text" id="mon_tipo" size="8" value=" <?php echo $ret_monitor; ?>" readonly  />               
                                                               <label  >Saidas de Video  : &nbsp 
                                                                  <input name="slots_uso" type="text" id="slots_uso" value="<?php echo $ret_vid_saidas ?>" size="25" readonly  /></label>  
                                                                  &nbsp &nbsp   <label>Fonte  :
                                                                  <input name="mon1_mar" type="text" id="mon1_mar" value="<?php echo $ret_fonte; ?>" size="13" readonly  /></label> <br /> 
                                                 
                                                             <label style=" color: #B4886b; font-weight: bold; " >Saidas Utilizadas: &nbsp   <?php echo $ret_vid_uso; ?>   </label>
                                                          </div>  
                                                           <i> <?php echo $ret_tab_cam; ?></i><br /> <i> <?php echo $codificacao; ?>   <?php echo $ret_tecnico; ?>  </i><br />
                                                          <?php

                                        } while ($linha = mysqli_fetch_assoc($dados));
                                     }
                                   else
                                     {
                                         if ($tipo_equip == "M")// busca na tabela monitores
                                         {
                                             // consulta em outra tabela // monitores 
                                             $sqlm = "SELECT * FROM tb_monitores WHERE id ='" . $ret_tab_chave . "' "; //"TEMP LIKE '%".$busca."%' and STATUS=1";
                                             $dadosm = mysqli_query($conn, $sqlm) or die(mysqli_error());
                                             $linham = mysqli_fetch_assoc($dadosm);
                                             $totalm = mysqli_num_rows($dadosm);
                                             if ($totalm == 0) {
                                                 $titulo = "\n " . $totalm . "  Registro Localizado (s) Monitores ";
                                                 echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                                             } else
                                             {
                                             //    echo "<center>Monitores</center>";
                                                 $retnome = $linham['mon_marca'] . "  " . $linham['mon_tam'] . " Pol " . $linham['mon_tipo'];
                                                 $retID = $linham['id'];
                                                 $retplaqueta = $linham['mon_plaqueta'];
                                                 $retloc = $linham['local_id'];
                                                 $pc_id = $linham['id_equip'];
                                                 $ret_ctrl_ti = $linha['ctrl_ti'];
                                                
                                                 $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                                               
                                                 if ($totalm > 0) {
                                               
                                                     do {
                                                         $ret_status = $linham['status'];
														 $retnome = $linham['mon_marca'] . "  " . $linham['mon_tam'] . " Pol " . $linham['mon_tipo'];
                                                         $retID = $linham['id'];
                                                         $ret_marca = $linham['mon_marca'] ;
                                                         $ret_tam = $linham['mon_tam'] . " Pol ";
													     $ret_tipo = $linham['mon_tipo'];
                                                         $ret_obs = $linham['obs'];
														 $retplaqueta = $linham['mon_plaqueta'];
                                                         $ret_tela = $linham['mon_saida'];
                                                         $ret_ctrl_ti = $linham['ctrl_ti'];
                                                         $retloc = $linham['local_id'];
                                                         $pc_id = $linham['id_equip'];
                                                         $codificacao = "C" . $linham['ctrl_ti'] . "- M" . $linham['id'] . "- L" . $linham['local_id'] . "-E" . $linham['id_equip'];
                                                         $unidade = nomedolocal($conn, $retloc);
                                                       
                                                     } while ($linham = mysqli_fetch_assoc($dadosm));
                                                 }

                                             }
                                              ?>
                                                 <div>
                                                  <label >Marca: </label>    
                                                     &nbsp &nbsp
                                                    <input name="tipo_equip"  style="background-color:white;" type="text" id="tipo_equip" size="20" value=" <?php echo $ret_marca; ?>" readonly  />      
                                                        &nbsp &nbsp 
                                                  <label >Tela tipo  : </label>    
                                                        &nbsp &nbsp
                                                      <input name="so_tipo"  style="background-color:white;" type="text" id="so_tipo" size="20" value=" <?php echo $ret_tipo; ?>" readonly />      
										                &nbsp 
                                                  <label >Tamanho  : </label>    
                                                        &nbsp 
                                                      <input name="so_tipo"  style="background-color:white;" type="text" id="so_tipo" size="5" value=" <?php echo $ret_tam; ?>" readonly />      
                                                        &nbsp &nbsp <br /><br />
                                                       <label >Obs:  : </label>    
                                                        &nbsp &nbsp
                                                      <input name="obs"  style="background-color:white;" type="text" id="obs" size="85" value=" <?php echo $ret_obs; ?>" readonly />      
                                                        &nbsp &nbsp <br /><br />
													     <label >Local:  : </label>    
                                                        &nbsp &nbsp
                                                      <input name="loc"  style="background-color:white;" type="text" id="loc" size="85" value=" <?php echo $unidade; ?>" readonly />      
                                                        &nbsp &nbsp
                                                <?php


                                         } else // busca na tabela diversos
                                         {
                                             $sqld = "SELECT * FROM tb_diversos WHERE id = '" . $ret_tab_chave . "' order by patrimonio"; //"TEMP LIKE '%".$busca."%' and STATUS=1";
                                             $dadosd = mysqli_query($conn, $sqld) or die(mysqli_error());
                                             $linhad = mysqli_fetch_assoc($dadosd);
                                             $totald = mysqli_num_rows($dadosd);
                                             if ($totald == 0) {
                                                 $titulo = "\n " . $totald . "  Registro Localizado (s) em Diversos ";
                                                 echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                                             } else {
                                               //  echo "<center>Diversos</center>";
                                                 $retnome = $linhad['descricao'] . "  " . $linhad['marca'] . "  ";
                                                 $retID = $linhad['id'];
                                                 $retplaqueta = $linhad['patrimonio'];
                                                 $ret_ctrl_ti = $linhad['ctrl_ti'];
                                                 $retloc = $linhad['local_cod'];
                                                 //$pc_id = $linham['id_equip'];
                                                 // $retstatus = $linha['Al_01status'];
                             
                                                 //	  $total = mysqli_num_rows($dados);
                                                 //  echo $total;
                                              //   $titulo = "\n " . $total . " Registro Localizado (s) na busca por " . $busca . "  ";
                                                 // echo "<center> <p style=color:blue> <b>" . nl2br($titulo) . " </b>  </p></center> ";
                                                 if ($totald > 0) {
                                                     //  echo" <strong>Monitores &nbsp &nbsp &nbsp &nbsp Acao  &nbsp&nbsp &nbsp&nbsp    ID    &nbsp&nbsp &nbsp&nbsp      Nome   &nbsp&nbsp  &nbsp&nbsp  &nbsp&nbsp    Patrimonio &nbsp&nbsp  </strong>";               
                                                     do {
                                                         $ret_idlocal = $linhad['id'];
                                                         $ret_cod_desc = $linhad['descricao_cod'];
                                                         $ret_plaqueta = $linhad['patrimonio'];
                                                         $ret_nome = $linhad['descricao'];
                                                         $ret_equi_tipo = $linhad['descricao'];
                                                         $ret_datalanc = $linhad['dt_cad'];
                                                         $ret_tec = $linhad['usuario'];
                                                         $ret_cmei_id = $linhad['local_cod'];
                                                         $ret_obs = $linhad['obs'];
                                                         $ret_ref = $linhad['ref'];
                                                         $ret_marca = $linhad['marca'];
                                                         $ret_tam = $linhad['tam'];
                                                         $ret_posicao = $linhad['posicao'];
                                                         $ret_comps = $linhad['comps'];
                                                         $ret_tipo = $linhad['tipo'];
                                                         $ret_portas = $linhad['portas'];
                                                         $ret_por_total = $linhad['por_total'];
                                                         $ret_por_util = $linhad['por_util'];
                                                         $ret_por_disp = $linhad['por_disp'];
                                                         $ret_rede = $linhad['rede'];
                                                         $ret_ip = $linhad['ip'];
                                                         $ret_gerenciavel = $linhad['gerenciavel'];
                                                         $ret_sec_cod = $linhad['sec_cod'];
                                                         $ret_ctrl_ti = $linhad['ctrl_ti'];
                                                         $ret_resp = $linhad['resp'];
                                                         $unidade = nomedolocal($conn, $ret_cmei_id);
                                                         $secretaria = nomedesecretaria($conn, $ret_sec_cod); 
														 
                                                     } while ($linhad = mysqli_fetch_assoc($dadosd));
                                                 }
                                                
                                             }

                                               echo $ret_cod_desc;
                                                    switch ($ret_cod_desc)
													{
													case '0':
													{
													break; 
													}
													case '1': // patch
													{
													?>
																<form method="post" action="edita.php">
																  <input type="hidden" name="loc_id" size=50 value= "<?php echo $ret_cmei_id ?>">
																  <input type="hidden" name="sec_id" size=50 value= "">
																	
																<section class="box ">
																 <header class="panel_header">
																<h2 class="title pull-left"> <?php echo $unidade; ?></h2>                                
																<div class="actions panel_actions pull-right">
																	<i class="box_toggle fa fa-chevron-down"></i>
																	<i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
																	<i class="box_close fa fa-times"></i>
																</div>
																	  </div>
																		   <div>  
																			<?php echo "<i> Controle T.I. " . $ret_ctrl_ti . " </i> "; ?> 
																			   </br> 
																				 <label for="coord">Patrimonio :</label>    
																				&nbsp
																				<input id="plaqueta" name="plaqueta"  style="background-color:white;" type="text" placeholder="Numero da Plaqueta " readonly size = "15" value=" <?php echo $ret_plaqueta; ?>">
																				&nbsp <label for="coord">Nome do Equipamento : </label>    
																				&nbsp &nbsp
																				<input id="nome_equip" name="nome_equip" style="background-color:white;" type="text" placeholder="Nome do Computador " readonly size = "15" value=" <?php echo $ret_nome; ?>">
																				 &nbsp &nbsp <label >Rede : </label>    
																			 <input name="so_arq"  style="background-color:white;" type="text" id="so_arq" size="9" value=" <?php echo $ret_rede; ?>" readonly />      
																	   </div>  
																<br><div>
																  <label >Portas : </label>    
																		&nbsp &nbsp
																	  <input name="so_tipo"  style="background-color:white;" type="text" id="so_tipo" size="5" value=" <?php echo $ret_portas; ?>" readonly />      
																	&nbsp	&nbsp &nbsp
																  <label >Portas Totais : </label>    
																		&nbsp &nbsp
																	  <input name="so_tipo"  style="background-color:white;" type="text" id="so_tipo" size="5" value=" <?php echo $ret_por_total; ?>" readonly />      
																	&nbsp	&nbsp &nbsp
																  <label >Portas Uso : </label>    
																		&nbsp &nbsp
																	  <input name="so_tipo"  style="background-color:white;" type="text" id="so_tipo" size="5" value=" <?php echo $ret_por_util; ?>" readonly />      
																		&nbsp &nbsp
																  <label >Portas Livres : </label>    
																		&nbsp &nbsp &nbsp
																	  <input name="so_tipo"  style="background-color:white;" type="text" id="so_tipo" size="5" value=" <?php echo $ret_por_disp; ?>" readonly />      
																		&nbsp &nbsp
																 </div>  
															<br><div>
																  <label> Local :     </label>
																 	 &nbsp   <input name="placa"  style="background-color:white;" type="text" id="placa" size="83" value=" <?php echo $unidade; ?>" readonly />      
																</div>
															<br>	<div>
																  <label> Secretaria :     </label>
																&nbsp 	<input name="processador" style="background-color:white;"  type="text" id="processador" size="78" value=" <?php echo $secretaria; ?>" readonly />                
																</div>  
																<br><div>
																  <label> Obs :     </label>
																   <input name="placa"  style="background-color:white;" type="text" id="placa" size="86" value=" <?php echo " Id : ".$ret_id."  -  ".$ret_obs; ?>" readonly />      
																</div>
															<br>					
															  	<a href="#?tbequip_id= <?php echo $ret_id; ?>" title="Alterar Local do Equipamento">Alterar Local do Equipamento</a><br /><br />
															<a href="editaequip2d.php?tbequip_id= <?php echo $ret_id; ?>" title="Alterar Dados do Equipamento">Alterar Dados do Equipamento</a><br /><br />
															<a href="busca_diversos.php?tbequip_id= <?php echo $ret_id; ?>" title="Alterar Dados do Equipamento">Consultar Infs do Equipamento</a><br /><br />                           
														   </div>
															</form>
															</div>
														</section></div>
												</section>
											</section>
										</body>
										</html>
												  <?php
													break; 
														}
														case '2':  // rack
														{
														?>
																<form method="post" action="edita.php">
																  <input type="hidden" name="loc_id" size=50 value= "<?php echo $ret_cmei_id ?>">
																  <input type="hidden" name="sec_id" size=50 value= "">
																	
																<section class="box ">
																 <header class="panel_header">
																<h2 class="title pull-left"> <?php echo $unidade; ?></h2>                                
																<div class="actions panel_actions pull-right">
																	<i class="box_toggle fa fa-chevron-down"></i>
																	<i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
																	<i class="box_close fa fa-times"></i>
																</div>
																	  </div>
																		   <div>  
																			<?php echo "<i> Controle T.I. " . $ret_ctrl_ti . " </i> "; ?> 
																			   </br> 
																				 <label for="coord">Patrimonio :</label>    
																				&nbsp
																				<input id="plaqueta" name="plaqueta"  style="background-color:white;" type="text" placeholder="Numero da Plaqueta " readonly size = "15" value=" <?php echo $ret_plaqueta; ?>">
																				&nbsp <label for="coord">Nome do Equipamento : </label>    
																				&nbsp &nbsp
																				<input id="nome_equip" name="nome_equip" style="background-color:white;" type="text" placeholder="Nome do Computador " readonly size = "15" value=" <?php echo $ret_nome; ?>">
																				 &nbsp &nbsp <label >Rede : </label>    
																			 <input name="so_arq"  style="background-color:white;" type="text" id="so_arq" size="9" value=" <?php echo $ret_rede; ?>" readonly />      
																	   </div>  
																<br><div>
																  <label >Portas : </label>    
																		&nbsp &nbsp
																	  <input name="so_tipo"  style="background-color:#bfced8;" type="text" id="so_tipo" size="5" value=" <?php echo $ret_portas; ?>" readonly />      
																	&nbsp	&nbsp &nbsp
																  <label >Portas Totais : </label>    
																		&nbsp &nbsp
																	  <input name="so_tipo"  style="background-color:#bfced8;" type="text" id="so_tipo" size="5" value=" <?php echo $ret_por_total; ?>" readonly />      
																	&nbsp	&nbsp &nbsp
																  <label >Portas Uso : </label>    
																		&nbsp &nbsp
																	  <input name="so_tipo"  style="background-color:#bfced8;" type="text" id="so_tipo" size="5" value=" <?php echo $ret_por_util; ?>" readonly />      
																		&nbsp &nbsp
																  <label >Portas Livres : </label>    
																		&nbsp &nbsp &nbsp
																	  <input name="so_tipo"  style="background-color:#bfced8;" type="text" id="so_tipo" size="5" value=" <?php echo $ret_por_disp; ?>" readonly />      
																		&nbsp &nbsp
																 </div>  
																 
																 <br><div>
																  <label >Posição : </label>    
																		&nbsp
																	  <input name="so_tipo"  style="background-color:white;" type="text" id="so_tipo" size="10" value=" <?php echo $ret_posicao; ?>" readonly />      
																	&nbsp 
																  <label >Componentes : </label>    
																		&nbsp 
																	  <input name="so_tipo"  style="background-color:white;" type="text" id="so_tipo" size="53" value=" <?php echo $ret_comps; ?>" readonly />      
																	&nbsp	&nbsp &nbsp
																 </div>  
																 
															<br><div>
																  <label> Local :     </label>
																 	 &nbsp   <input name="placa"  style="background-color:white;" type="text" id="placa" size="83" value=" <?php echo $unidade; ?>" readonly />      
																</div>
															<br>	<div>
																  <label> Secretaria :     </label>
																&nbsp 	<input name="processador" style="background-color:white;"  type="text" id="processador" size="78" value=" <?php echo $secretaria; ?>" readonly />                
																</div>  
																<br><div>
																  <label> Obs :     </label>
																   <input name="placa"  style="background-color:white;" type="text" id="placa" size="86" value=" <?php echo " Id : ".$ret_id."  -  ".$ret_obs; ?>" readonly />      
																</div>
															<br>					
														  	<a href="#?ip_id= <?php echo $ret_id; ?>" title="Alterar Local do Equipamento">Alterar Local do Equipamento</a><br /><br />
															<a href="editaequip2d.php?tbequip_id= <?php echo $ret_id; ?>" title="Alterar Dados do Equipamento">Alterar Dados do Equipamento</a><br /><br />
															<a href="busca_diversos.php?tbequip_id= <?php echo $ret_id; ?>" title="Alterar Dados do Equipamento">Consultar Infs do Equipamento</a><br /><br />                           
														   </div>
															</form>
															</div>
														</section></div>
												</section>
											</section>
										</body>
										</html>
												  <?php
														
														break; 
														}
														case '3': // switch
														{
														  ?>
																<form method="post" action="edita.php">
																  <input type="hidden" name="loc_id" size=50 value= "<?php echo $ret_cmei_id ?>">
																  <input type="hidden" name="sec_id" size=50 value= "">
																	
																<section class="box ">
																 <header class="panel_header">
																<h2 class="title pull-left"> <?php echo $unidade; ?></h2>                                
																<div class="actions panel_actions pull-right">
																	<i class="box_toggle fa fa-chevron-down"></i>
																	<i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
																	<i class="box_close fa fa-times"></i>
																</div>
																	  </div>
																		   <div>  
																			<?php echo "<i> Controle T.I. " . $ret_ctrl_ti . " </i> "; ?> 
																			   </br> 
																				 <label for="coord">Patrimonio :</label>    
																				&nbsp
																				<input id="plaqueta" name="plaqueta"  style="background-color:white;" type="text" placeholder="Numero da Plaqueta " readonly size = "15" value=" <?php echo $ret_plaqueta; ?>">
																				&nbsp <label for="coord">Nome do Equipamento : </label>    
																				&nbsp
																				<input id="nome_equip" name="nome_equip" style="background-color:white;" type="text" placeholder="Nome do Computador " readonly size = "15" value=" <?php echo $ret_nome; ?>">
																				 &nbsp &nbsp <label >IP : </label>    
																			 <input name="so_arq"  style="background-color:white;" type="text" id="so_arq" size="12" value=" <?php echo $ret_ip; ?>" readonly />      
																	   </div>  
																<br><div>
																  <label >Gerenciavel : </label>    
																		&nbsp &nbsp
																	  <input name="so_tipo"  style="background-color:white;" type="text" id="so_tipo" size="5" value=" <?php echo $ret_gerenciavel; ?>" readonly />      
																	&nbsp	&nbsp &nbsp
																  <label >Portas Totais : </label>    
																		&nbsp
																	  <input name="so_tipo"  style="background-color:white;" type="text" id="so_tipo" size="5" value=" <?php echo $ret_por_total; ?>" readonly />      
																	&nbsp	&nbsp &nbsp
																  <label >Portas Uso : </label>    
																		&nbsp
																	  <input name="so_tipo"  style="background-color:white;" type="text" id="so_tipo" size="5" value=" <?php echo $ret_por_util; ?>" readonly />      
																		&nbsp &nbsp
																  <label >Portas Livres : </label> &nbsp   
																		 <input name="so_tipo"  style="background-color:white;" type="text" id="so_tipo" size="5" value=" <?php echo $ret_por_disp; ?>" readonly />      
																		&nbsp &nbsp
																 </div>  
															<br><div>
																  <label> Local :     </label>
																 	 &nbsp   <input name="placa"  style="background-color:white;" type="text" id="placa" size="83" value=" <?php echo $unidade; ?>" readonly />      
																</div>
															<br>	<div>
																  <label> Secretaria :     </label>
																&nbsp 	<input name="processador" style="background-color:white;"  type="text" id="processador" size="78" value=" <?php echo $secretaria; ?>" readonly />                
																</div>  
																<br><div>
																  <label> Obs :     </label>
																   <input name="placa"  style="background-color:white;" type="text" id="placa" size="86" value=" <?php echo " Id : ".$ret_id."  -  ".$ret_obs; ?>" readonly />      
																</div>
															<br>					
															  	<a href="editaequipd.php?id= <?php echo $ret_id; ?>" title="Alterar Local do Equipamento">Alterar Local do Equipamento</a><br /><br />
															<a href="editaequip2d.php?tbequip_id= <?php echo $ret_id; ?>" title="Alterar Dados do Equipamento">Alterar Dados do Equipamento</a><br /><br />
															<a href="busca_diversos.php?tbequip_id= <?php echo $ret_id; ?>" title="Alterar Dados do Equipamento">Consultar Infs do Equipamento</a><br /><br />                           
														   </div>
															</form>
															</div>
														</section></div>
												</section>
											</section>
										</body>
										</html>
												  <?php
														  
														  break; 
														}
														case '4':  // tv
														{
														  ?>
																<form method="post" action="edita.php">
																  <input type="hidden" name="loc_id" size=50 value= "<?php echo $ret_cmei_id ?>">
																  <input type="hidden" name="sec_id" size=50 value= "">
																	
																<section class="box ">
																 <header class="panel_header">
																<h2 class="title pull-left"> <?php echo $unidade; ?></h2>                                
																<div class="actions panel_actions pull-right">
																	
																</div>
																  </div>
																	  <div>  
																  			<?php echo "<i> Controle T.I. " . $ret_ctrl_ti." </i> "; ?> 
																		   </br> 
														 				      <label for="coord">Nome do Equipamento : </label>    &nbsp
																			  <input id="nome_equip" name="nome_equip" style="background-color:white;" type="text" placeholder="Nome do Computador " readonly size = "8" value=" <?php echo $ret_nome; ?>"readonly>
																			  &nbsp &nbsp	&nbsp &nbsp  <label >Tamanho (Polegadas) : </label>    
																			  &nbsp
																			 <input name="so_tipo"  style="background-color:white;" type="text" id="so_tipo" size="5" value=" <?php echo $ret_tam; ?>" readonly />      
																      </div>
															
																  <div>
																		 <label >Marca : </label>    
																		  &nbsp <input name="so_arq"  style="background-color:white;" type="text" id="so_arq" size="35" value=" <?php echo $ret_marca; ?>" readonly />      
																		  &nbsp <label for="coord">Patrimonio :</label> &nbsp
																		 <input id="plaqueta" name="plaqueta"  style="background-color:white;" type="text" placeholder="Numero da Plaqueta " readonly size = "7" value=" <?php echo $ret_plaqueta; ?>">
															     </div>  
																<div>
															  	    <label> Responsavel :     </label><br />
																    <input name="placa"  style="background-color:white;" type="text" id="placa" size="65" value=" <?php echo $ret_resp; ?> " readonly />      
																</div>
																	 
																	 <div>
															  	    <label> Obs :     </label><br />
																    <input name="placa"  style="background-color:white;" type="text" id="placa" size="65" value=" <?php echo " Id : ".$ret_id."  -  ".$ret_obs; ?>" readonly />      
																</div>
															
																	 <div>
																	
																     <label> Secretaria :     </label><br />
																     <input name="processador" style="background-color:white;"  type="text" id="processador" size="65" value=" <?php echo $secretaria; ?>" readonly />                
																</div>  
																
																	 <br>					
														  	<a href="editaequip2d_loc.php?tbequip_id= <?php echo $ret_id; ?>" title="Alterar Local do Equipamento">Alterar Local do Equipamento</a><br /><br />
															<a href="editaequip2d.php?tbequip_id= <?php echo $ret_id; ?>" title="Alterar Dados do Equipamento">Alterar Dados do Equipamento</a><br /><br />
															<a href="busca_diversos.php?tbequip_id= <?php echo $ret_ctrl_ti; ?>" title="Alterar Dados do Equipamento">Consultar Infs do Equipamento</a><br /><br />                           
															<a href="qrimpressao_div.php?var= <?php echo $ret_ctrl_ti; ?>"  title="Alterar Dados do Equipamento">Gerar QR Code do Equipamento</a><br /><br />                           														  
														  </div>
															</form>
															</div>
														</section></div>
												</section>
											</section>
										</body>
										</html>
												  <?php  
														  
														  break; 
														}
                                     case '5':  // impressora
                                     {
                                         ?>
																<form method="post" action="edita.php">
																  <input type="hidden" name="loc_id" size=50 value= "<?php echo $ret_cmei_id ?>">
																  <input type="hidden" name="sec_id" size=50 value= "">
																	
																<section class="box ">
																 <header class="panel_header">
																<h2 class="title pull-left"> <?php echo $unidade; ?></h2>                                
																<div class="actions panel_actions pull-right">
																	<i class="box_toggle fa fa-chevron-down"></i>
																	<i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
																	<i class="box_close fa fa-times"></i>
																</div>
																	  </div>
																		   <div>  
																				<?php echo "<i> Controle T.I. " . $ret_ctrl_ti . " </i> "; ?> 
																			   </br> 
																				 <label for="coord">Patrimonio :</label>    
																				&nbsp
																				<input id="plaqueta" name="plaqueta"  style="background-color:white;" type="text" placeholder="Numero da Plaqueta " readonly size = "10" value=" <?php echo $ret_plaqueta; ?>">
																				&nbsp <label for="coord">Nome do Equipamento : </label>    
																				&nbsp
																				<input id="nome_equip" name="nome_equip" style="background-color:white;" type="text" placeholder="Nome do Computador " readonly size = "35" value=" <?php echo $ret_nome; ?>">
																			
																	   </div>  
																<br><div>
																  	 <label >Marca : </label>    
																	  <input name="so_arq"  style="background-color:white;" type="text" id="so_arq" size="35" value=" <?php echo $ret_marca; ?>" readonly />      
																	 
																	 <label >Componentes : </label>    
																		&nbsp &nbsp
																	  
																	 <input name="so_tipo"  style="background-color:white;" type="text" id="so_tipo" size="25" value=" <?php echo $ret_comps; ?>" readonly />      
																		&nbsp	&nbsp  &nbsp
																 																	 
																 </div>  
															<br><div>
																  <label> Local :     </label>
																 	 &nbsp   <input name="placa"  style="background-color:white;" type="text" id="placa" size="83" value=" <?php echo $unidade; ?>" readonly />      
																</div>
															<br>	<div>
																  <label> Secretaria :     </label>
																&nbsp 	<input name="processador" style="background-color:white;"  type="text" id="processador" size="78" value=" <?php echo $secretaria; ?>" readonly />                
																</div>  
																<br><div>
																  <label> Obs :     </label>
																   <input name="placa"  style="background-color:white;" type="text" id="placa" size="86" value=" <?php echo " Id : " . $ret_id . "  -  " . $ret_obs; ?>" readonly />      
																</div>
															<br>					
															  	<a href="#?tbequip_id= <?php echo $ret_id; ?>" title="Alterar Local do Equipamento">Alterar Local do Equipamento</a><br /><br />
															<a href="editaequip2d.php?tbequip_id= <?php echo $ret_id; ?>" title="Alterar Dados do Equipamento">Alterar Dados do Equipamento</a><br /><br />
															<a href="busca_diversos.php?tbequip_id= <?php echo $ret_ctrl_ti; ?>" title="Alterar Dados do Equipamento">Consultar Infs do Equipamento</a><br /><br />                           
															<a href="qrimpressao_div.php?var= <?php echo $ret_ctrl_ti; ?>"  title="Alterar Dados do Equipamento">Gerar QR Code do Equipamento</a><br /><br />                           														  
														  </div>
															</form>
															</div>
														</section></div>
												</section>
											</section>
										</body>
										</html>
												  <?php

                                                  break;
                                     }
                                       }
                                     }
                                     ?>

                                </div>
                                <div>
                                 
                                 </div>  
                             
                                <br>
                            <div>
                            
                           
                                    <br /> <br /><a href="verifica_cti.php?tipo=2" title="Verifica CTI Utilizados">Verificar ultimo Controle Utilizados em Equipamentos </a><br /><br />
                                </div>
                            </form>
                            </div>
                        </section></div>
                </section>
            </section>
        
        
</body>

</html>

      
  <?php      
       // } while ($linha = mysqli_fetch_assoc($dados));
                                     }
    }
}
else
{
    


}


