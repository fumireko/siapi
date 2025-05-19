<?php
//include "../validar_session.php";
include "../Config/config_sistema.php";
include "bco_fun.php";

$nome_usuario = $_SESSION['nome_usuario'];


// recebe dados do formulario de cadastro de componentes   caddiversos

$tipo = $_POST['tipo'];

//echo "tipo de Dispositivo  " . $tipo . " Local " . $local . " Local ID " . $local_id;
//if (($local =="Nenhum local especificado")or($local =="") or ($local == "0"))
  //  {
  //  echo "tipo de Dispositivo  " . $tipo . " Local " . $local . " Local ID " . $local_id;
   // header("Location: precadequip.php?id=0");
    
    //}
//else
    {


            // verifica e direciona para o formulario correto

            switch ($tipo) 
            {
                case '0': 
                {
                    header("Location: chk_plaqueta.php?id=". $local_id ."&tipo=0");
                }
                    break;
                case '1': 
                 {
                 //   cadastro de Kits prontos de PCs 
                    ?>
                                        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                        <html>
                                            <head>
                                            <title>Cadastro de Kits PC</title>
                                            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                                            <!-- Adicionando JQuery -->
                                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                                                    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
                                                    crossorigin="anonymous"></script>
                                            <!-- Adicionando Javascript -->
                                            <script>
                                            </script>
                                            </head>

                                            <style>
                                                .tabela, th, td {
                                                    border-collapse: collapse;
                                                    padding: 10px;
                                                    text-align: left;
                                                    border: 1px solid rgb(160 160 160);
                                                }

                                            table.sss2 {    
                                                font-family: arial;
                                                padding: 4px; 
                                                text-align: center;
                                                float:right;    
                                                border: 1px solid;
                                                border-spacing: inherit;
                                            }
                                                th {
                                                    background-color: lightgray;
                                                }

                                            

                                            tr {
                                                background: white;    
                                            }         
                                            </style>

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
                            
                                                                  <div class="content-body">
                                                                    <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12">

                                                                             <!-- ********************************************** -->
                                                                               <div  id="consulta"> 
                                                                                 <!-- ********************************************** -->
                                                                               </div>
                                                                               <div class="form-group">
                                
                                                                                </div>
                                                                             </div>
                            
                                
                                                                        <form method="post" action="salvaequip_div.php">
                                                                         <input type="hidden" name="modalidade" id="modalidade"  value= "1">
                                                                            
                                                                         

                                                                            <section class="box ">
                                                                         <header class="panel_header">
                                                                        
                                                                        <div class="actions panel_actions pull-right">
                                                                            <i class="box_toggle fa fa-chevron-down"></i>
                                                                            <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                                                            <i class="box_close fa fa-times"></i>
                                                                        </div>
                                                                       <div>
                                                                             <h1>Cadastro de Kits PCs  </h1>
                                                                             <table class="tabela" >
                                                                                <tr>
                                                                                  <th></th>
                                                                                  <th>Descrição</th>
                                                                                  <th>- Memoria -</th>
                                                                                  <th>- Armazenamento -</th>
                                                                                  <th>- Slots -</th>
                                                                                </tr>
                                                                                 <?php
                                                                                 $sql_tipo = "SELECT * FROM tb_kits order by descritivo";
                                                                                    $resulta = $conn->query($sql_tipo);
                                                                                 if ($resulta->num_rows > 0) {
                                                                                     while ($row = $resulta->fetch_assoc()) {
                                                                                         $ret_id = $row['id'];
                                                                                         $ret_descritivo = $row['descritivo'];
                                                                                         $ret_modelo = $row['modelo'];
                                                                                         $ret_placa = $row['placa'];
                                                                                         $ret_marca = $row['marca'];
                                                                                         $ret_tipo = $row['tipo'];
                                                                                         $ret_processador = $row['processador'];
                                                                                         $ret_mem_tipo = $row['mem_tipo'];
                                                                                         $ret_mem_tam = $row['mem_tam'];
                                                                                         $ret_slots = $row['slots'];
                                                                                         $ret_so = $row['so'];
                                                                                         $ret_arm_tipo = $row['arm_tipo'];
                                                                                         $ret_arm_qtd = $row['arm_qtd'];
                                                                                         echo '<tr>';
                                                                                         echo '<td style= text-align:center>  </td>';
                                                                                         echo '<td>' . $ret_descritivo . '</td>';
                                                                                         echo '<td style= text-align:center>' . $ret_mem_tipo . '</td>';
                                                                                         echo '<td style= text-align:center>' . $ret_arm_tipo . '</td>';
                                                                                         echo '<td style= text-align:center>' . $ret_slots . '</td>';
                                                                                         echo '</tr>';
                                                                                     
                                                                                     }
                                                                                 }
                                                                                ?>
                                                                               <label for="name"> Descrição :</label>
                                                                                <input type="text" name="descricao" id="descricao"  style="font-family: 'Arial Black'; font-size: 15px; text-align:center;"  size =35   value= "" > <br />
                                                                                <label for="name">Marca:</label>
                                                                                 <input type="text" name="marca" id="marca"  style="font-family: 'Arial Black'; font-size: 15px; text-align:center;"  size =15   value= "" > 
                                                                                 <label for="name">Modelo:</label>
                                                                                 <input type="text" name="modelo" id="modelo"   style="font-family: 'Arial Black'; font-size: 15px; text-align:center;"  size =15   value= "" > <br />
                                                                                 <input type="hidden" name="tipo" id="tipo"  style="font-family: 'Arial Black'; font-size: 15px; text-align:center;"  size =35   value= "DESKTOP" > 
																					
                                                                                <label for="name"> Placa Mãe :</label><br>
																			   <?php
																				  // busca de Placa-Mae Cadastradas
																				  $sql_pl = "SELECT * FROM tb_placa order by p_desc";
																				  $res_pl = mysqli_query($conn, $sql_pl) or die('Erro ao selecionar especialidade: ' . mysql_error());
																				  $optionp = '';
																				  while ($row = mysqli_fetch_array($res_pl)) {
																					  //$optionp .= "<option value = '" . $row['p_id'] . "'>" . mb_strimwidth($row['p_desc'], 0, 81, "...") . "   </option>";
																					  $optionp .= "<option value = '" . mb_strimwidth($row['p_desc'], 0, 85, "...") . "'title ='".$row['p_desc']."' >" . mb_strimwidth($row['p_desc'], 0, 56, "...") . "   </option>";
																				  }
																				  ?>
																					 <select title="Selecione uma opção"  id="placa" name="placa" >     
																					
																							  <?php
																							  echo "<option value='0'>  </option>";
																							  echo $optionp;
																							  ?>        
																					  </select>     
																			   <br>
                                                                               <label for="name"> Processador :</label><br>
                                                                                 <?php
																				   // busca de Processadores 
																				   $sql_proc = "SELECT * FROM tb_processadores order by proc_nome";
																				   $res_proc = mysqli_query($conn, $sql_proc) or die('Erro ao selecionar especialidade: ' . mysql_error());
																				   $option = '';
																				   while ($row = mysqli_fetch_array($res_proc)) {
																					   $option .= "<option value = '" . mb_strimwidth($row['proc_nome'], 0, 65, "...") . "' title ='".$row['proc_nome']."'>" . mb_strimwidth($row['proc_nome'], 0, 65, "...") . "   </option>";
																					   //$option .= "<option value = '" . $row['proc_id'] . "'>" . mb_strimwidth($row['proc_nome'], 0, 88, "...") . "   </option>";
																				   }
																				   ?>
																					<select title="Selecione uma opção"   id="proc" name="proc" >           
																					
																							  <?php
																							  echo "<option value='0'>  </option>";
																							  echo $option;
																							  ?>        
																							</select> 
																				 
                                                                              <br>
																			  <label for="name">Memoria Tipo:</label>&nbsp  
                                                                                 <select title="Selecione uma opção"    id="mem_tipo" name="mem_tipo" >
																				   <option value="VAZIO"></option>
																					<option value="DDR">DDR</option>                
																					<option value="DDR2">DDR2</option>        
																					<option value="DDR3">DDR3</option>
																					<option value="DDR4">DDR4</option>
																					<option value="DDR5">DDR5</option>
																					<option value="Outro">Outro</option>
																				</select> &nbsp &nbsp 
																				
                                                                                 <label for="name">Memoria Qtd:</label> &nbsp 
																					<select title="Selecione uma opção"    id="mem_qtd" name="mem_qtd" >
																							<option value="VAZIO"></option>
																							<option value="Inferior">Inferior a 2GB</option>
																							<option value="2GB">2GB</option>
																							<option value="4GB">4GB</option>
																							<option value="8GB">8GB</option>
																							<option value="16GB">16GB</option>
																							<option value="32GB">32GB</option>
																							<option value="Superior">Superior a 32GB</option>
																				</select>    
<BR>																				
                                                                                 <label for="name">Slots:</label>
                                                                                <select title="Selecione uma opção"    id="slots" name="slots" >
																					<option value="0.zero"></option>
																					<option value="1">1</option>
																					<option value="2">2</option>
																					<option value="3">3</option>
																					<option value="4">4</option>
																					</select>   &nbsp &nbsp       
                                                                                    <label for="name">Slots uso:</label>
                                                                                  <select title="Selecione uma opção"  id="slots_uso" name="slots_uso" disabled >
																				   <option value="0.zero"></option>
																				<option value="1">1</option>
																				<option value="2">2</option>
																				<option value="3">3</option>
																				<option value="4">4</option>
																				</select> &nbsp &nbsp &nbsp 
																				   <label for="name">SO:</label> &nbsp &nbsp 
																						<select title="Selecione uma opção"   id="so_tipo" name="so_tipo" >
																							<option value=""></option>
																						<option value="WINDOWS ANT">Windows Anteriores 32 Bits</option>                
																						<option value="WINDOWS XP 32Bits">Windows XP 32 Bits</option>        
																						<option value="WINDOWS XP 64Bits">Windows XP 62 Bits</option>            
																						<option value="WINDOWS 7 32Bits">Windows 7 32 Bits</option>
																						<option value="WINDOWS 7 64Bits">Windows 7 64 Bits</option>
																						<option value="WINDOWS 8 32Bits">Windows 8 32 Bits</option>
																						<option value="WINDOWS 8 64Bits">Windows 8 64 Bits</option>
																						<option value="WINDOWS 10 64Bits"selected>Windows 10 64 Bits</option>
																						<option value="WINDOWS 11 64Bits">Windows 11 64 Bits</option>
																						<option value="Linux">Linux</option>
																						<option value="Android">Android</option>
																						<option value="IOS">IOS</option>
																					 </select>
																														
																				<br />
                                                                                   <label for="name">Armazenamento:</label> &nbsp 
                                                                                <select title="Selecione uma opção"   id="arm_tipo" name="arm_tipo" >
																					<option value="VAZIO"></option>
																					<option value="ATA">ATA</option>                
																					<option value="SATA">SATA</option>        
																					<option value="SATA2">SATA2</option>        
																					<option value="NVMe">NVMe</option>
																					<option value="NAS">NAS</option>
																					<option value="SCSI">SCSI</option>
																				</select>
																				 <label for="name">Armazenamento Qtd:</label> &nbsp 
                                                                                <select title="Selecione uma opção"  id="arm_tam" name="arm_tam" >
																				  <option value="VAZIO"></option>
																					<option value="Inferiores">Inf. a 120GB</option>
																				<option value="256GB">256GB</option>
																				<option value="512GB">512GB</option>
																				<option value="1TB">1TB</option>
																				<option value="2TB">2TB</option>
																				<option value="Acima 2TB">Acima 2TB</option>
																				</select>        
																					<br>
																				<label  class="control-label">Armaz.Secundario</label>
																				<select title="Selecione uma opção"   id="arm_sec" name="arm_sec" disabled >
																				<option value="VAZIO"></option>
																					<option value="SSD">SSD</option>                
																					<option value="SSSD2">SSD 2.5</option>        
																					<option value="SSDm2">SSD M.2</option>        
																					<option value="SSDm">SSD mSATA</option>
																					<option value="SSDu2">SSD U.2</option>
																				</select>        
																			
																			 &nbsp &nbsp 
																				<label  class="control-label">Tamanho</label> &nbsp 
																				<select title="Selecione uma opção"  id="arm_sec_tam" name="arm_sec_tam" disabled >
																				 <option value="VAZIO"></option>
																				 <option value="Inferiores">Inferior a 120GB</option>
																				<option value="256GB">256GB</option>
																				<option value="512GB">512GB</option>
																				<option value="1TB">1TB</option>
																				<option value="2TB">2TB</option>
																				<option value="Acima 2TB">Acima 2TB</option>
																				</select>
																				<br>				
																				<label for="name">Informações referente a Monitor(es):</label> &nbsp &nbsp 
                                                                                <select title="Selecione uma opção"  id="mon_tipo" name="mon_tipo"  >
																					<option value="NENHUM">Nenhum Monitor </option>
																					<option value="UNICO" selected>Unico</option>                
																					<option value="DUPLO">Duplo</option>        
																					<option value="TRIPLO">Triplo</option>
																					<option value="OUTROS">OUTROS</option>
																				   </select> 
																				<BR>
																				
																				<label for="name">Saidas Video:</label>
																			   &nbsp    &nbsp 
																				 <input  name="vga" id="vga" value="1" type="checkbox" >
																			   &nbsp<label>VGA</label>&nbsp &nbsp
																			  <input  name="hdmi" id="hdmi" value="1" type="checkbox">
																				&nbsp   <label>HDMI</label> &nbsp &nbsp 
                                                                              	 <input  name="dvi" id="dvi" value="1" type="checkbox" >
																			   &nbsp <label>DVI</label>&nbsp &nbsp 
																			  <input  name="display" id="display" value="1" type="checkbox">
																				&nbsp   <label>DISPLAY PORT</label> &nbsp &nbsp                                         
																				  <br />

                                                                                  <div>  
                                                                                     </div>      
                                                                                 
                                                                                 </div>
                                                                      
                                                                                
                                                                      <br /><br />              
                                                              
                                                                 
                                                                  </div>
                                                        
                                                                  </div>
                                                                    </form>
                                                                    </div>
                                                                </section>
                                                    </div>
                                                        </section>
                                             <button id="btn_cadastro_unidade" name="btn_cadastro_unidade" class="btn btn-primary">Cadastrar</button>   <br />     
                                            </section>
        
        
                                        </body>

                                        </html>

                    
                  <?PHP 
                 }
                 break;
            case '2': 
                 { //   cadastro de Processadores 
            ?>
                                        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                        <html>
                                            <head>
                                            <title>Cadastro de Processadores</title>
                                            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                                            <!-- Adicionando JQuery -->
                                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                                                    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
                                                    crossorigin="anonymous"></script>
                                            <!-- Adicionando Javascript -->
                                            <script>
                                            </script>
                                            </head>

                                            <style>
                                                .tabela, th, td {
                                                    border-collapse: collapse;
                                                    padding: 10px;
                                                    text-align: left;
                                                    border: 1px solid rgb(160 160 160);
                                                }

                                            table.sss2 {    
                                                font-family: arial;
                                                padding: 4px; 
                                                text-align: center;
                                                float:right;    
                                                border: 1px solid;
                                                border-spacing: inherit;
                                            }
                                                th {
                                                    background-color: lightgray;
                                                }

                                            

                                            tr {
                                                background: white;    
                                            }         
                                            </style>

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
                            
                                                                  <div class="content-body">
                                                                    <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12">

                                                                             <!-- ********************************************** -->
                                                                               <div  id="consulta"> 
                                                                                 <!-- ********************************************** -->
                                                                               </div>
                                                                               <div class="form-group">
                                
                                                                                </div>
                                                                             </div>
                            
                                
                                                                        <form method="post" action="salvaequip_div.php">
                                                                         <input type="hidden" name="modalidade" id="modalidade"  value= "2">
                                                                            
                                                                         

                                                                            <section class="box ">
                                                                         <header class="panel_header">
                                                                        
                                                                        <div class="actions panel_actions pull-right">
                                                                            <i class="box_toggle fa fa-chevron-down"></i>
                                                                            <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                                                            <i class="box_close fa fa-times"></i>
                                                                        </div>
                                                                       <div>
                                                                             <h1>Cadastro de Processadores  </h1>
                                                                             <table class="tabela" >
                                                                                <tr>
                                                                                  <th style= text-align:center> ------</th>
                                                                                   <th style= text-align:center> ------</th>
                                                                                    <th style= text-align:center> Descrição</th>
                                                                                </tr>
                                                                                 <?php
                                                                                 $sql_tipo = "SELECT * FROM tb_processadores order by proc_nome";
                                                                                 $resulta = $conn->query($sql_tipo);
                                                                                 if ($resulta->num_rows > 0) {
                                                                                     while ($row = $resulta->fetch_assoc()) {
                                                                                         $ret_id = $row['proc_id'];
                                                                                         $ret_descritivo = $row['proc_nome'];
                                                                                         
                                                                                         echo '<tr>';
                                                                                        
                                                                                         echo "<td style= text-align:center> <a href='geren_proc.php?var=$ret_id' title = 'Gerenciar '> *  </td>";
                                                                                         echo '<td></td>';
                                                                                         echo '<td style= text-align:center> ' . $ret_descritivo . '</td>';
                                                                                        
                                                                                         echo '</tr>';

                                                                                     }
                                                                                 }
                                                                                 ?>
                                                                               <label for="name"> Descrição :</label><br />
                                                                                <input type="text" name="descricao" id="descricao"  style="font-family: 'Arial Black'; font-size: 15px; text-align:center;"  size =70   value= "" > <br />
                                                                                   <br />

                                                                                  <div>  
                                                                                     </div>      
                                                                                 
                                                                                 </div>
                                                                      
                                                                                
                                                                      <br /><br />              
                                                              
                                                                 
                                                                  </div>
                                                        
                                                                  </div>
                                                                    </form>
                                                                    </div>
                                                                </section>
                                                    </div>
                                                        </section>
                                             <button id="btn_cadastro_unidade" name="btn_cadastro_unidade" class="btn btn-primary">Cadastrar</button>   <br />     
                                            </section>
        
        
                                        </body>

                                        </html>

                    
                  <?PHP
        }
            break;
        case '3':
                 {
            ?>
                                        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                        <html>
                                            <head>
                                            <title>Cadastro de Placa Mãe</title>
                                            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                                            <!-- Adicionando JQuery -->
                                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                                                    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
                                                    crossorigin="anonymous"></script>
                                            <!-- Adicionando Javascript -->
                                            <script>
                                            </script>
                                            </head>

                                            <style>
                                                .tabela, th, td {
                                                    border-collapse: collapse;
                                                    padding: 10px;
                                                    text-align: left;
                                                    border: 1px solid rgb(160 160 160);
                                                }

                                            table.sss2 {    
                                                font-family: arial;
                                                padding: 4px; 
                                                text-align: center;
                                                float:right;    
                                                border: 1px solid;
                                                border-spacing: inherit;
                                            }
                                                th {
                                                    background-color: lightgray;
                                                }

                                            

                                            tr {
                                                background: white;    
                                            }         
                                            </style>

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
                            
                                                                  <div class="content-body">
                                                                    <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12">

                                                                             <!-- ********************************************** -->
                                                                               <div  id="consulta"> 
                                                                                 <!-- ********************************************** -->
                                                                               </div>
                                                                               <div class="form-group">
                                
                                                                                </div>
                                                                             </div>
                            
                                
                                                                        <form method="post" action="salvaequip_div.php">
                                                                         <input type="hidden" name="modalidade" id="modalidade"  value= "3">
                                                                            
                                                                         

                                                                            <section class="box ">
                                                                         <header class="panel_header">
                                                                        
                                                                        <div class="actions panel_actions pull-right">
                                                                            <i class="box_toggle fa fa-chevron-down"></i>
                                                                            <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                                                            <i class="box_close fa fa-times"></i>
                                                                        </div>
                                                                       <div>
                                                                             <h1>Cadastro de Placa Mãe  </h1>
                                                                             <table class="tabela" >
                                                                                <tr>
                                                                                 
                                                                                  <th style= text-align:center >Descrição</th>
                                                                                 
                                                                                </tr>
                                                                                 <?php
                                                                                 $sql_tipo = "SELECT * FROM tb_placa order by p_desc";
                                                                                 $resulta = $conn->query($sql_tipo);
                                                                                 if ($resulta->num_rows > 0) {
                                                                                     while ($row = $resulta->fetch_assoc()) {
                                                                                         $ret_id = $row['p_id'];
                                                                                         $ret_descritivo = $row['p_desc'];
                                                                                         
                                                                                         echo '<tr>';
                                                                                         echo "<td style= text-align:center> <a href='geren_placa.php?var=$ret_id' title = 'Gerenciar '> *  </td>";
                                                                                         
                                                                                         echo '<td style= text-align:center>  ' . $ret_descritivo . '</td>';
                                                                                         
                                                                                         echo '</tr>';

                                                                                     }
                                                                                 }
                                                                                 ?>
                                                                               <br /><br />
                                                                                 <label for="name"> Descrição :</label><br />

                                                                                <input type="text" name="descricao" id="descricao"  style="font-family: 'Arial Black'; font-size: 15px; text-align:center;"  size =65   value= "" > <br />
                                                                                        
                                                                                   <br />

                                                                                  <div>  
                                                                                     </div>      
                                                                                 
                                                                                 </div>
                                                                      
                                                                                
                                                                      <br /><br />              
                                                              
                                                                 
                                                                  </div>
                                                        
                                                                  </div>
                                                                    </form>
                                                                    </div>
                                                                </section>
                                                    </div>
                                                        </section>
                                             <button id="btn_cadastro_unidade" name="btn_cadastro_unidade" class="btn btn-primary">Cadastrar</button>   <br />     
                                            </section>
        
        
                                        </body>

                                        </html>

                    
                  <?PHP
        }
            break;
     case '4': {
                        //          echo "4"; cadastro kit Notebook
                 //   cadastro de Kits prontos de PCs 
                    ?>
                                        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                        <html>
                                            <head>
                                            <title>Cadastro de Notebook</title>
                                            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                                            <!-- Adicionando JQuery -->
                                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                                                    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
                                                    crossorigin="anonymous"></script>
                                            <!-- Adicionando Javascript -->
                                            <script>
                                           
                                            
                                            </script>
                                            </head>

                                            <style>
                                                .tabela, th, td {
                                                    border-collapse: collapse;
                                                    padding: 10px;
                                                    text-align: left;
                                                    border: 1px solid rgb(160 160 160);
                                                }

                                            table.sss2 {    
                                                font-family: arial;
                                                padding: 4px; 
                                                text-align: center;
                                                float:right;    
                                                border: 1px solid;
                                                border-spacing: inherit;
                                            }
                                                th {
                                                    background-color: lightgray;
                                                }

                                            

                                            tr {
                                                background: white;    
                                            }




                                                /* Popup container */
                                                .popup {
                                                    position: relative;
                                                    display: inline-block;
                                                    cursor: pointer;
                                                }

                                                    /* The actual popup (appears on top) */
                                                    .popup .popuptext {
                                                        visibility: hidden;
                                                        width: 160px;
                                                        background-color: #555;
                                                        color: #fff;
                                                        text-align: center;
                                                        border-radius: 6px;
                                                        padding: 8px 0;
                                                        position: absolute;
                                                        z-index: 1;
                                                        bottom: 125%;
                                                        left: 50%;
                                                        margin-left: -80px;
                                                    }

                                                        /* Popup arrow */
                                                        .popup .popuptext::after {
                                                            content: "";
                                                            position: absolute;
                                                            top: 100%;
                                                            left: 50%;
                                                            margin-left: -5px;
                                                            border-width: 5px;
                                                            border-style: solid;
                                                            border-color: #555 transparent transparent transparent;
                                                        }

                                                    /* Toggle this class when clicking on the popup container (hide and show the popup) */
                                                    .popup .show {
                                                        visibility: visible;
                                                        -webkit-animation: fadeIn 1s;
                                                        animation: fadeIn 1s
                                                    }

                                                /* Add animation (fade in the popup) */
                                                @-webkit-keyframes fadeIn {
                                                    from {
                                                        opacity: 0;
                                                    }

                                                    to {
                                                        opacity: 1;
                                                    }
                                                }

                                                @keyframes fadeIn {
                                                    from {
                                                        opacity: 0;
                                                    }

                                                    to {
                                                        opacity: 1;
                                                    }
                                                }
                                            
                                          




                                            </style>

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
                                                           <div class="content-body">
                                                                    <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                  <!-- ********************************************** -->
                                                                               <div  id="consulta"> 
                                                                                 <!-- ********************************************** -->
                                                                               </div>
                                                                               <div class="form-group">
                                                                              </div>
                                                                             </div>
                                                     
                                                                        <form method="post" action="salvaequip_div.php">
                                                                         <input type="hidden" name="modalidade" id="modalidade"  value= "12">
                                                                         <section class="box ">
                                                                         <header class="panel_header">
                                                                    
                                                                        <div class="actions panel_actions pull-right">
                                                                            <i class="box_toggle fa fa-chevron-down"></i>
                                                                            <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                                                            <i class="box_close fa fa-times"></i>
                                                                        </div>
                                                                       <div>
                                                                             <h1>Cadastro de  Notebooks </h1>
                                                                             <table class="tabela" >
                                                                                <tr>
                                                                                  <th></th>
                                                                                  <th></th>
                                                                                  <th>Descrição</th>
                                                                                  <th>- Memoria -</th>
                                                                                  <th>- Armazenamento -</th>
                                                                                  <th>- Slots -</th>
                                                                                </tr>
                                                                                 <?php
                                                                                 $sql_tipo = "SELECT * FROM tb_kits order by descritivo";
                                                                                    $resulta = $conn->query($sql_tipo);
                                                                                 if ($resulta->num_rows > 0) {
                                                                                     while ($row = $resulta->fetch_assoc()) {
                                                                                         $ret_id = $row['id'];
                                                                                         $ret_descritivo = $row['descritivo'];
                                                                                         $ret_modelo = $row['modelo'];
                                                                                         $ret_placa = $row['placa'];
                                                                                         $ret_marca = $row['marca'];
                                                                                         $ret_tipo = $row['tipo'];
                                                                                         $ret_processador = $row['processador'];
                                                                                         $ret_mem_tipo = $row['mem_tipo'];
                                                                                         $ret_mem_tam = $row['mem_tam'];
                                                                                         $ret_slots = $row['slots'];
                                                                                         $ret_so = $row['so'];
                                                                                         $ret_arm_tipo = $row['arm_tipo'];
                                                                                         $ret_arm_qtd = $row['arm_qtd'];
                                                                                        
                                                                                         if ($ret_tipo=="NOTEBOOK"){
                                                                                             $imagem = "img/notebook.png";
                                                                                         }
                                                                                         else
                                                                                             $imagem = "img/desktop.png";
                                                                                         





                                                                                         echo '<tr>';
                                                                                         echo '<td style= text-align:center>  </td>';
                                                                                         echo '<td style= text-align:center> &nbsp   <img src= '.$imagem.'  title='.$ret_tipo.' width="25" height="30"> &nbsp   </td>';
                                                                                         echo '<td> &nbsp   ' . $ret_descritivo . ' &nbsp    </td>';
                                                                                         echo '<td style= text-align:center>' . $ret_mem_tipo . '</td>';
                                                                                         echo '<td style= text-align:center>' . $ret_arm_tipo . '</td>';
                                                                                         echo '<td style= text-align:center>' . $ret_slots . '</td>';
                                                                                         echo '</tr>';
                                                                                     
                                                                                     }
                                                                                 }
                                                                                ?>
                                                                               <label for="name"> Descrição :</label>
                                                                                <input type="text" name="descricao" id="descricao"  style="font-family: 'Arial Black'; font-size: 15px; text-align:center;"  size =35   value= "" > <br />
                                                                                <label for="name">Marca:</label>
                                                                                 <input type="text" name="marca" id="marca"  style="font-family: 'Arial Black'; font-size: 15px; text-align:center;"  size =15   value= "" > 
                                                                                 <label for="name">Modelo:</label>
                                                                                 <input type="text" name="modelo" id="modelo"   style="font-family: 'Arial Black'; font-size: 15px; text-align:center;"  size =15   value= "" > <br />
                                                                              
                                                                               <input type="hidden" name="tipo" id="tipo"  style="font-family: 'Arial Black'; font-size: 15px; text-align:center;"  size =35   value= "NOTEBOOK" > 
                             
                                                                               <label for="name"> Placa Mãe :</label><br>
																			   <?php
																				  // busca de Placa-Mae Cadastradas
																				  $sql_pl = "SELECT * FROM tb_placa order by p_desc";
																				  $res_pl = mysqli_query($conn, $sql_pl) or die('Erro ao selecionar especialidade: ' . mysql_error());
																				  $optionp = '';
																				  while ($row = mysqli_fetch_array($res_pl)) {
																					  //$optionp .= "<option value = '" . $row['p_id'] . "'>" . mb_strimwidth($row['p_desc'], 0, 81, "...") . "   </option>";
																					  $optionp .= "<option value = '" . mb_strimwidth($row['p_desc'], 0, 85, "...") . "'title ='".$row['p_desc']."' >" . mb_strimwidth($row['p_desc'], 0, 56, "...") . "   </option>";
																				  }
																				  ?>
																					 <select title="Selecione uma opção"  id="placa" name="placa" >     
																					
																							  <?php
																							  echo "<option value='0'>  </option>";
																							  echo $optionp;
																							  ?>        
																					  </select>     
																			   <br>
                                                                               <label for="name"> Processador :</label><br>
                                                                                 <?php
																				   // busca de Processadores 
																				   $sql_proc = "SELECT * FROM tb_processadores order by proc_nome";
																				   $res_proc = mysqli_query($conn, $sql_proc) or die('Erro ao selecionar especialidade: ' . mysql_error());
																				   $option = '';
																				   while ($row = mysqli_fetch_array($res_proc)) {
																					   $option .= "<option value = '" . mb_strimwidth($row['proc_nome'], 0, 65, "...") . "' title ='".$row['proc_nome']."'>" . mb_strimwidth($row['proc_nome'], 0, 65, "...") . "   </option>";
																					   //$option .= "<option value = '" . $row['proc_id'] . "'>" . mb_strimwidth($row['proc_nome'], 0, 88, "...") . "   </option>";
																				   }
																				   ?>
																					<select title="Selecione uma opção"   id="proc" name="proc" >           
																					
																							  <?php
																							  echo "<option value='0'>  </option>";
																							  echo $option;
																							  ?>        
																							</select> 
																				 
                                                                              <br> <br>
																			  <label for="name">Memoria Tipo:</label>&nbsp  
                                                                                 <select title="Selecione uma opção"    id="mem_tipo" name="mem_tipo" >
																				   <option value="VAZIO"></option>
																					<option value="DDR">DDR</option>                
																					<option value="DDR2">DDR2</option>        
																					<option value="DDR3">DDR3</option>
																					<option value="DDR4">DDR4</option>
																					<option value="DDR5">DDR5</option>
																					<option value="Outro">Outro</option>
																				</select> &nbsp &nbsp 
																				
                                                                                 <label for="name">Memoria Qtd:</label> &nbsp 
																					<select title="Selecione uma opção"    id="mem_qtd" name="mem_qtd" >
																							<option value="VAZIO"></option>
																							<option value="Inferior">Inferior a 2GB</option>
																							<option value="2GB">2GB</option>
																							<option value="4GB">4GB</option>
																							<option value="8GB">8GB</option>
																							<option value="16GB">16GB</option>
																							<option value="32GB">32GB</option>
																							<option value="Superior">Superior a 32GB</option>
																				</select>    
<BR>																				
                                                                            	   <label for="name">Sistema Operacional ( S.O. ):</label> &nbsp &nbsp 
																						<select title="Selecione uma opção"   id="so_tipo" name="so_tipo" >
																							<option value=""></option>
																						<option value="WINDOWS ANT">Windows Anteriores 32 Bits</option>                
																						<option value="WINDOWS XP 32Bits">Windows XP 32 Bits</option>        
																						<option value="WINDOWS XP 64Bits">Windows XP 62 Bits</option>            
																						<option value="WINDOWS 7 32Bits">Windows 7 32 Bits</option>
																						<option value="WINDOWS 7 64Bits">Windows 7 64 Bits</option>
																						<option value="WINDOWS 8 32Bits">Windows 8 32 Bits</option>
																						<option value="WINDOWS 8 64Bits">Windows 8 64 Bits</option>
																						<option value="WINDOWS 10 64Bits"selected>Windows 10 64 Bits</option>
																						<option value="WINDOWS 11 64Bits">Windows 11 64 Bits</option>
																						<option value="Linux">Linux</option>
																						<option value="Android">Android</option>
																						<option value="IOS">IOS</option>
																					 </select>
																														
																				<br />
                                                                                   <label for="name">Armazenamento:</label> &nbsp 
                                                                                <select title="Selecione uma opção"   id="arm_tipo" name="arm_tipo" >
																					<option value="VAZIO"></option>
																					<option value="ATA">ATA</option>                
																					<option value="SATA">SATA</option>        
																					<option value="SATA2">SATA2</option>        
																					<option value="NVMe">NVMe</option>
																					<option value="NAS">NAS</option>
																					<option value="SCSI">SCSI</option>
																				</select>
																				 <label for="name">Armazenamento Qtd:</label> &nbsp 
                                                                                <select title="Selecione uma opção"  id="arm_tam" name="arm_tam" >
																				  <option value="VAZIO"></option>
																					<option value="Inferiores">Inf. a 120GB</option>
																				<option value="256GB">256GB</option>
																				<option value="512GB">512GB</option>
																				<option value="1TB">1TB</option>
																				<option value="2TB">2TB</option>
																				<option value="Acima 2TB">Acima 2TB</option>
																				</select>        
																					<br>
																				<label  class="control-label">Armaz.Secundario</label>
																				<select title="Selecione uma opção"   id="arm_sec" name="arm_sec" disabled >
																				<option value="VAZIO"></option>
																					<option value="SSD">SSD</option>                
																					<option value="SSSD2">SSD 2.5</option>        
																					<option value="SSDm2">SSD M.2</option>        
																					<option value="SSDm">SSD mSATA</option>
																					<option value="SSDu2">SSD U.2</option>
																				</select>        
																			
																			 &nbsp &nbsp 
																				<label  class="control-label">Tamanho</label> &nbsp 
																				<select title="Selecione uma opção"  id="arm_sec_tam" name="arm_sec_tam" disabled >
																				 <option value="VAZIO"></option>
																				 <option value="Inferiores">Inferior a 120GB</option>
																				<option value="256GB">256GB</option>
																				<option value="512GB">512GB</option>
																				<option value="1TB">1TB</option>
																				<option value="2TB">2TB</option>
																				<option value="Acima 2TB">Acima 2TB</option>
																				</select>
																				<br>				

                                                                                <label for="name">Tela:</label> &nbsp &nbsp  	
                                                                                <select title="Selecione uma opção"  id="tela" name="tela"  >
																					<option value="MONO">MONOCROMATICO </option>
                                                                                    <option value="CRT">CRT </option>
                                                                                    <option value="PLASMA">PLASMA </option>
                                                                                    <option value="LCD">LCD </option>
																					<option value="LED" selected>LED</option>                
																					<option value="OLED">OLED</option>        
																					<option value="QLED">QLED</option>
																					<option value="NQLED">NQLED</option>
																				   </select> 
																			   &nbsp &nbsp  <label for="name">Resolução:</label> &nbsp &nbsp 
                                                                                 <select title="Selecione uma opção"  id="res" name="res"  >
																					<option value="480P" title="Definiçao Padrao 640p x 480p ">VGA ou SD </option>
                                                                                    <option value="720P" title="Alta Definição 1280p x 720p">HD </option>
                                                                                    <option value="1080P" title="Total Alta Definiçãp HD 1920p x 1080p ">FHD </option>
                                                                                    <option value="2160P" title="Ultra Alta Definição 4k">UHD </option>
                                                                                                                                                             
																				   </select> 
																				<BR> <BR />
																		<label for="name">Saidas Video:</label>
																			   &nbsp    &nbsp 
																				 <input  name="vga" id="vga" value="1" type="checkbox" >
																			   &nbsp<label>VGA</label>&nbsp &nbsp
																			  <input  name="hdmi" id="hdmi" value="1" type="checkbox">
																				&nbsp   <label>HDMI</label> &nbsp &nbsp 
                                                                              	 <input  name="dvi" id="dvi" value="1" type="checkbox" >
																			   &nbsp <label>DVI</label>&nbsp &nbsp 
																			  <input  name="display" id="display" value="1" type="checkbox">
																				&nbsp   <label>DISPLAY PORT</label> &nbsp &nbsp                                         
																				  <br />

                                                                            		<label for="name">Rede:</label>
																			   &nbsp    &nbsp 
																				 <input  name="wifi" id="wifi" value="1" type="checkbox" >
																			   &nbsp<label>WIFI</label>&nbsp &nbsp
																			  <input  name="rj45" id="rj45" value="1" type="checkbox">
																				&nbsp   <label>RJ45</label> &nbsp &nbsp 
                            												  <br />
                                                                             <label for="name"> Dados Fonte  :</label> 		&nbsp 		&nbsp 		&nbsp 
                                                                                <label for="name"> Volts  :</label>		&nbsp 
                                                                             	&nbsp <input type="text"  name="fonte_w" id="fonte_w"  style="font-family: 'Arial Black'; font-size: 15px; text-align:center;"  size =5    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                                                                 &nbsp  <label for="name"> Amperes  :</label>		&nbsp 
                                                                              	<input type="text"  name="fonte_a" id="fonte_a"  style="font-family: 'Arial Black'; font-size: 15px; text-align:center;"  size =5    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                                                                 <BR />
                                                                                 <BR />


                                                                             <label for="name">tipo de Plug da Fonte:</label> &nbsp &nbsp  	
                                                                                <select title="Selecione uma opção"  id="plug" name="plug"  >
																					<option value="H1" title="5 x 3 mm">Plug H1 </option>
                                                                                    <option value="H2"title="4 x 1,3 mm">Plug H2 </option>
                                                                                    <option value="H3"title="5,5 x 1,7 mm">Plug H3 </option>
                                                                                    <option value="H4"title="7,4 x 5 mm">Plug H4 </option>
                                                                                    <option value="H5"title="4,8 x 1,7 mm">Plug H5 </option>
                                                                                    <option value="H6"title="4,5 x 3 mm">Plug H6 </option>
                                                                                    <option value="H7"title="3 x 1 mm">Plug H7 </option>
                                                                                    <option value="H8"title="7,4 x 5 mm">Plug H8 </option>
                                                                                    <option value="H9"title="4,5 x 3 mm">Plug H9 </option>
																				    <option value="H10"title="4 x 1,7 mm">Plug H10 </option>   
                                                                                    <option value="Mac1"title="MacBook Apple">Pino MagSafe1 </option>
                                                                                    <option value="Mac2"title="MacBook Apple">Pino MagSafe2 </option>
                                                                                     <option value="USB-A1"title="Quatro pinos design retangular">USB Tipo A </option>
                                                                                      <option value="USB-A2"title="Cinco pinos de contatos formato de trapézio">USB Mini A </option>
                                                                                      <option value="USB-A3"title="Cinco pinos de contato design retangular e fino.">USB Micro A </option>
                                                                                    <option value="USB-B1"title="Quatro pinos internamente 2 de cada lado abertura quadrada">USB Tipo B </option>
                                                                                      <option value="USB-B2"title="Cinco contatos para transferência de dados retangular">USB Mini B </option>
                                                                                      <option value="USB-B3"title="cinco pinos internamente Trapezio">USB Micro B </option>
                                                                                    <option value="H9"title="Arredondado nas laterais e achatado nas extremidades, 12 pinus de cada lado , Simetrico">USB - C </option>
                                                                                   </select> 
																		&nbsp&nbsp	 
                                                                                  <div class="popup" onclick="myFunction()">Tipos de Conectores
                                                                                      <span class="popuptext" id="myPopup">
                                                                                      <img src="img/plug1.jpg" alt="HTML tutorial" style="width:720px;height:720px;"> </span>
                                                                                 </div>

                                                                                 <script>
                                                                                    // When the user clicks on <div>, open the popup
                                                                                    function myFunction() {
                                                                                      var popup = document.getElementById("myPopup");
                                                                                      popup.classList.toggle("show");
                                                                                    }
                                                                                    </script>





                                                                                  <div>  
                                                                                     </div>      
                                                                                 
                                                                                 </div>
                                                                      
                                                                                
                                                                      <br /><br />              
                                                              
                                                                 
                                                                  </div>
                                                        
                                                                  </div>
                                                                    </form>
                                                                    </div>
                                                                </section>
                                                    </div>
                                                        </section>
                                             <button id="btn_cadastro_unidade" name="btn_cadastro_unidade" class="btn btn-primary">Cadastrar</button>   <br />     
                                            </section>
        
        
                                        </body>

                                        </html>

                    
                  <?PHP 
                 }
          break;
    case '5':
        { // cadastros de kits monitores 
         //   include "../validar_session.php";
          //  include "../Config/config_sistema.php";

            if (isset($_GET['ID_PC'])) {
                $id_equip = $_GET['ID_PC'];// id index exists
            } else {
                $id_equip = "";// id index no exists
            }
            // $ret_cmei_id = $local_id;// $_GET['id'];
           
            ?>
         
                                        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                        <html>
                                            <head>
                                            <title>Cadastro direto de Monitores </title>
                                            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                                            <!-- Adicionando JQuery -->
                                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                                                    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
                                                    crossorigin="anonymous"></script>
                                            <!-- Adicionando Javascript -->
                                            <script>
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
                                                         

                                                            <div class="col-lg-12">
                                                                <section class="box ">
                                                                    <header class="panel_header">
                                                                        <h2 class="title pull-left">Sistema de Gestão T.I
                                                                        </h2>
                                                                         </h1>
                                
                                                                    </header>
                                                              <div class="content-body">
                                                                    <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12">

                                                                             <!-- ********************************************** -->
                                                                               <div  id="consulta"> 
                                                                            <!-- ********************************************** -->
                                                                               </div>
                                                                               <div class="form-group">
                                
                                                                                </div>
                                                                             </div>
                                                            
                                                                        <form method="post" action="salvaequip_div.php">
                                                                          <input type="hidden" name="tipo" size=50 value= "<?php echo "MONITOR" ?>">
                                                                          <input type="hidden" name="modalidade" size=50 value= "<?php echo "14" ?>">
                                                                        <section class="box ">
                                                                         <header class="panel_header">
                                                                        <h2 class="title pull-left"> <?php echo "Kits Monitores"; ?></h2>                                
                                                                        <div class="actions panel_actions pull-right">
                                                                            <i class="box_toggle fa fa-chevron-down"></i>
                                                                            <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                                                            <i class="box_close fa fa-times"></i>
                                                                        </div>
                                                                              </div>
                                                                                    
                                                                 <br />
                                                                  <div>
                                                                          <label>Monitores ja Cadastrados : </label>                         
                                                                          <?php
                                                                          $sql = "SELECT * FROM tb_kits where tipo ='MONITOR' ORDER BY descritivo";
                                                                          $resultado = mysqli_query($conn, $sql) or die('Erro ao selecionar especialidade: ' . mysql_error());
                                                                          $option = '';
                                                                          while ($row = mysqli_fetch_array($resultado)) {
                                                                              $option .= "<option value = '" . $row['id'] . "'>" . $row['descritivo'] . "   </option>";
                                                                          }
                                                                          ?>
                                                                                               <select name="sec_id" title="Visualize o (s)  Monitor (es) ja cadastrado(s) " >          
                                                                                              <?php
                                                                                              echo "<option value='0'>  </option>";
                                                                                              echo $option;
                                                                                              ?>        
                                                                                           </select> 
                                                                                              
                                                                                      <br />
                                                                  
                                                                  
                                                                  
                                                                  
                                                                  
                                                                  
                                                                  </div> 
                                                                  
                                                                    <br />   <br /> 
                                                                  
                                                                  <div>
                                                                          <label>Tamanho  (Pol): </label>                         
                                                                            <input name="mon_tam"  style="background-color:seashell;" type="text" id="mon_tam" size="5" value="" />                             
                                                                           &nbsp <label>Tipo de Tela  (Pol): </label>  &nbsp                       
                                                                           &nbsp   <select title="Selecione uma opção" id="mon_cat" name="mon_cat"  >
                                                                                    <option value="Vazio" default></option>
                                                                                    <option value="Widescreen" selected >Widescreen</option>     
                                                                                    <option value="UltraWide">UltraWide</option>                
                                                                                    <option value="CRT">CRT</option>                    
                                                                                </select> 
                                                                       </div>  
                                                            
                                                                  <div>
                                                                          <label> Marca : </label> 
                                                                            <input id="mon_mar" name="mon_mar" style="background-color:seashell;"  type="text"  size = "20 value=""> 
                                                                      
                                                                            <label> Modelo: </label> 
                                                                            <input id="mon_mod" name="mon_mod" style="background-color:seashell;"  type="text"  size = "16 value=""> <br />         
                                                                      
                                                                        </div> 
                                                                         

                                                                   <div>
                                                                          <label> Obs:     
                                                                            <input id="mon_obs" name="mon_obs" style="background-color:seashell;"  type="text"  size = "45 value=""> <br />         
                                                                        </div>


                                                                <br /><br />              
                                                                <button id="btn_cadastro_unidade" name="btn_cadastro_unidade" class="btn btn-primary">Cadastrar</button>
                                                                  </div>
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
        case '6': {
            //          echo "4"; cadastro Chromebook kit
            //   cadastro de Kits prontos de PCs 
            ?>
                                        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                        <html>
                                            <head>
                                            <title>Cadastro de Chromebook</title>
                                            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                                            <!-- Adicionando JQuery -->
                                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                                                    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
                                                    crossorigin="anonymous"></script>
                                            <!-- Adicionando Javascript -->
                                            <script>
                                           
                                            
                                            </script>
                                            </head>

                                            <style>
                                                .tabela, th, td {
                                                    border-collapse: collapse;
                                                    padding: 10px;
                                                    text-align: left;
                                                    border: 1px solid rgb(160 160 160);
                                                }

                                            table.sss2 {    
                                                font-family: arial;
                                                padding: 4px; 
                                                text-align: center;
                                                float:right;    
                                                border: 1px solid;
                                                border-spacing: inherit;
                                            }
                                                th {
                                                    background-color: lightgray;
                                                }

                                            

                                            tr {
                                                background: white;    
                                            }




                                                /* Popup container */
                                                .popup {
                                                    position: relative;
                                                    display: inline-block;
                                                    cursor: pointer;
                                                }

                                                    /* The actual popup (appears on top) */
                                                    .popup .popuptext {
                                                        visibility: hidden;
                                                        width: 160px;
                                                        background-color: #555;
                                                        color: #fff;
                                                        text-align: center;
                                                        border-radius: 6px;
                                                        padding: 8px 0;
                                                        position: absolute;
                                                        z-index: 1;
                                                        bottom: 125%;
                                                        left: 50%;
                                                        margin-left: -80px;
                                                    }

                                                        /* Popup arrow */
                                                        .popup .popuptext::after {
                                                            content: "";
                                                            position: absolute;
                                                            top: 100%;
                                                            left: 50%;
                                                            margin-left: -5px;
                                                            border-width: 5px;
                                                            border-style: solid;
                                                            border-color: #555 transparent transparent transparent;
                                                        }

                                                    /* Toggle this class when clicking on the popup container (hide and show the popup) */
                                                    .popup .show {
                                                        visibility: visible;
                                                        -webkit-animation: fadeIn 1s;
                                                        animation: fadeIn 1s
                                                    }

                                                /* Add animation (fade in the popup) */
                                                @-webkit-keyframes fadeIn {
                                                    from {
                                                        opacity: 0;
                                                    }

                                                    to {
                                                        opacity: 1;
                                                    }
                                                }

                                                @keyframes fadeIn {
                                                    from {
                                                        opacity: 0;
                                                    }

                                                    to {
                                                        opacity: 1;
                                                    }
                                                }
                                            
                                          




                                            </style>

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
                                                           <div class="content-body">
                                                                    <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                  <!-- ********************************************** -->
                                                                               <div  id="consulta"> 
                                                                                 <!-- ********************************************** -->
                                                                               </div>
                                                                               <div class="form-group">
                                                                              </div>
                                                                             </div>
                                                     
                                                                        <form method="post" action="salvaequip_div.php">
                                                                         <input type="hidden" name="modalidade" id="modalidade"  value= "20">
                                                                         <section class="box ">
                                                                         <header class="panel_header">
                                                                    
                                                                        <div class="actions panel_actions pull-right">
                                                                            <i class="box_toggle fa fa-chevron-down"></i>
                                                                            <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                                                            <i class="box_close fa fa-times"></i>
                                                                        </div>
                                                                       <div>
                                                                             <h1>Cadastro de  Chromebooks </h1>
                                                                             <table class="tabela" >
                                                                                <tr>
                                                                                  <th></th>
                                                                                  <th></th>
                                                                                  <th>Descrição</th>
                                                                                  <th>- Memoria -</th>
                                                                                  <th>- Armazenamento -</th>
                                                                                  <th>- Slots -</th>
                                                                                </tr>
                                                                                 <?php
                                                                                 $sql_tipo = "SELECT * FROM tb_kits order by descritivo";
                                                                                 $resulta = $conn->query($sql_tipo);
                                                                                 if ($resulta->num_rows > 0) {
                                                                                     while ($row = $resulta->fetch_assoc()) {
                                                                                         $ret_id = $row['id'];
                                                                                         $ret_descritivo = $row['descritivo'];
                                                                                         $ret_modelo = $row['modelo'];
                                                                                         $ret_placa = $row['placa'];
                                                                                         $ret_marca = $row['marca'];
                                                                                         $ret_tipo = $row['tipo'];
                                                                                         $ret_processador = $row['processador'];
                                                                                         $ret_mem_tipo = $row['mem_tipo'];
                                                                                         $ret_mem_tam = $row['mem_tam'];
                                                                                         $ret_slots = $row['slots'];
                                                                                         $ret_so = $row['so'];
                                                                                         $ret_arm_tipo = $row['arm_tipo'];
                                                                                         $ret_arm_qtd = $row['arm_qtd'];

                                                                                         if ($ret_tipo == "NOTEBOOK") {
                                                                                             $imagem = "img/notebook.png";
                                                                                         } else
                                                                                             $imagem = "img/desktop.png";






                                                                                         echo '<tr>';
                                                                                         echo '<td style= text-align:center>  </td>';
                                                                                         echo '<td style= text-align:center> &nbsp   <img src= ' . $imagem . '  title=' . $ret_tipo . ' width="25" height="30"> &nbsp   </td>';
                                                                                         echo '<td> &nbsp   ' . $ret_descritivo . ' &nbsp    </td>';
                                                                                         echo '<td style= text-align:center>' . $ret_mem_tipo . '</td>';
                                                                                         echo '<td style= text-align:center>' . $ret_arm_tipo . '</td>';
                                                                                         echo '<td style= text-align:center>' . $ret_slots . '</td>';
                                                                                         echo '</tr>';

                                                                                     }
                                                                                 }
                                                                                 ?>
                                                                              &nbsp  <label for="name"> Descrição :</label>    &nbsp &nbsp
                                                                                <input type="text" name="descricao" id="descricao"  style="font-family: 'Arial Black'; font-size: 15px; text-align:center;"  size =37   value= "" > <br />
                                                                               &nbsp  <label for="name">Marca:</label>    &nbsp 
                                                                                 <input type="text" name="marca" id="marca"  style="font-family: 'Arial Black'; font-size: 15px; text-align:center;"  size =15   value= "" > 
                                                                                &nbsp 
                                                                                 <label for="name">Modelo:</label>    &nbsp 
                                                                                 <input type="text" name="modelo" id="modelo"   style="font-family: 'Arial Black'; font-size: 15px; text-align:center;"  size =15   value= "" > <br />
                                                                              
                                                                               <input type="hidden" name="tipo" id="tipo"  style="font-family: 'Arial Black'; font-size: 15px; text-align:center;"  size =35   value= "NOTEBOOK" > 
                             
                                                                              &nbsp  <label for="name"> Placa Mãe :</label><br>
																			   <?php
                                                                               // busca de Placa-Mae Cadastradas
                                                                               $sql_pl = "SELECT * FROM tb_placa order by p_desc";
                                                                               $res_pl = mysqli_query($conn, $sql_pl) or die('Erro ao selecionar especialidade: ' . mysql_error());
                                                                               $optionp = '';
                                                                               while ($row = mysqli_fetch_array($res_pl)) {
                                                                                   //$optionp .= "<option value = '" . $row['p_id'] . "'>" . mb_strimwidth($row['p_desc'], 0, 81, "...") . "   </option>";
                                                                                   $optionp .= "<option value = '" . mb_strimwidth($row['p_desc'], 0, 85, "...") . "'title ='" . $row['p_desc'] . "' >" . mb_strimwidth($row['p_desc'], 0, 56, "...") . "   </option>";
                                                                               }
                                                                               ?>
																				 &nbsp	 <select title="Selecione uma opção"  id="placa" name="placa" >     
																					
																							  <?php
                                                                                              echo "<option value='0'>  </option>";
                                                                                              echo $optionp;
                                                                                              ?>        
																					  </select>     
																			   <br>
                                                                              &nbsp  <label for="name"> Processador :</label><br>
                                                                                 <?php
                                                                                 // busca de Processadores 
                                                                                 $sql_proc = "SELECT * FROM tb_processadores order by proc_nome";
                                                                                 $res_proc = mysqli_query($conn, $sql_proc) or die('Erro ao selecionar especialidade: ' . mysql_error());
                                                                                 $option = '';
                                                                                 while ($row = mysqli_fetch_array($res_proc)) {
                                                                                     $option .= "<option value = '" . mb_strimwidth($row['proc_nome'], 0, 65, "...") . "' title ='" . $row['proc_nome'] . "'>" . mb_strimwidth($row['proc_nome'], 0, 65, "...") . "   </option>";
                                                                                     //$option .= "<option value = '" . $row['proc_id'] . "'>" . mb_strimwidth($row['proc_nome'], 0, 88, "...") . "   </option>";
                                                                                 }
                                                                                 ?>
																				 &nbsp	<select title="Selecione uma opção"   id="proc" name="proc" >           
																					
																							  <?php
                                                                                              echo "<option value='0'>  </option>";
                                                                                              echo $option;
                                                                                              ?>        
																							</select> 
																				 
                                                                              <br> <br>
																			 &nbsp  <label for="name">Memoria Tipo:</label>&nbsp  
                                                                                 <select title="Selecione uma opção"    id="mem_tipo" name="mem_tipo" >
																				   <option value="VAZIO"></option>
																					<option value="DDR">DDR</option>                
																					<option value="DDR2">DDR2</option>        
																					<option value="DDR3">DDR3</option>
																					<option value="DDR4">DDR4</option>
																					<option value="DDR5">DDR5</option>
																					<option value="Outro">Outro</option>
																				</select> &nbsp &nbsp 
																				   &nbsp &nbsp
                                                                                 <label for="name">Memoria Qtd:</label> &nbsp 
																					<select title="Selecione uma opção"    id="mem_qtd" name="mem_qtd" >
																							<option value="VAZIO"></option>
																							<option value="Inferior">Inferior a 2GB</option>
																							<option value="2GB">2GB</option>
																							<option value="4GB">4GB</option>
																							<option value="8GB">8GB</option>
																							<option value="16GB">16GB</option>
																							<option value="32GB">32GB</option>
																							<option value="Superior">Superior a 32GB</option>
																				</select>    
                                                                                <BR> 
                                                                                  &nbsp  <label for="name">Sistema Operacional ( S.O. ) :</label> &nbsp &nbsp 
																						<select title="Selecione uma opção"   id="so_tipo" name="so_tipo" >
																							<option value=""></option>
																						<option value="WINDOWS ANT">Windows Anteriores 32 Bits</option>                
																						<option value="WINDOWS XP 32Bits">Windows XP 32 Bits</option>        
																						<option value="WINDOWS XP 64Bits">Windows XP 62 Bits</option>            
																						<option value="WINDOWS 7 32Bits">Windows 7 32 Bits</option>
																						<option value="WINDOWS 7 64Bits">Windows 7 64 Bits</option>
																						<option value="WINDOWS 8 32Bits">Windows 8 32 Bits</option>
																						<option value="WINDOWS 8 64Bits">Windows 8 64 Bits</option>
																						<option value="WINDOWS 10 64Bits"selected>Windows 10 64 Bits</option>
																						<option value="WINDOWS 11 64Bits">Windows 11 64 Bits</option>
																						<option value="Linux">Linux</option>
																						<option value="Android">Android</option>
																						<option value="IOS">IOS</option>
                                                                                       	<option value="CHROME OS">CHROME OS</option>
																					 </select>
																														
																				<br />
                                                                                &nbsp    <label for="name">Armazenamento:</label> &nbsp 
                                                                                <select title="Selecione uma opção"   id="arm_tipo" name="arm_tipo" >
																					<option value="VAZIO"></option>
																					<option value="ATA">ATA</option>                
																					<option value="SATA">SATA</option>        
																					<option value="SATA2">SATA2</option>        
																					<option value="NVMe">NVMe</option>
																					<option value="NAS">NAS</option>
																					<option value="SCSI">SCSI</option>
																				</select>    &nbsp &nbsp
																				 <label for="name">Armazenamento Qtd:</label> &nbsp 
                                                                                <select title="Selecione uma opção"  id="arm_tam" name="arm_tam" >
																				  <option value="VAZIO"></option>
																					<option value="Inferiores">Inf. a 120GB</option>
																				<option value="256GB">256GB</option>
																				<option value="512GB">512GB</option>
																				<option value="1TB">1TB</option>
																				<option value="2TB">2TB</option>
																				<option value="Acima 2TB">Acima 2TB</option>
																				</select>        
																					<br>
																			 &nbsp	<label  class="control-label">Armaz.Secundario</label>
																				<select title="Selecione uma opção"   id="arm_sec" name="arm_sec" disabled >
																				<option value="VAZIO"></option>
																					<option value="SSD">SSD</option>                
																					<option value="SSSD2">SSD 2.5</option>        
																					<option value="SSDm2">SSD M.2</option>        
																					<option value="SSDm">SSD mSATA</option>
																					<option value="SSDu2">SSD U.2</option>
																				</select>        
																			
																			 &nbsp &nbsp 
																				<label  class="control-label">Tamanho</label> &nbsp 
																				<select title="Selecione uma opção"  id="arm_sec_tam" name="arm_sec_tam" disabled >
																				 <option value="VAZIO"></option>
																				 <option value="Inferiores">Inferior a 120GB</option>
																				<option value="256GB">256GB</option>
																				<option value="512GB">512GB</option>
																				<option value="1TB">1TB</option>
																				<option value="2TB">2TB</option>
																				<option value="Acima 2TB">Acima 2TB</option>
																				</select>
																				<br>				

                                                                                &nbsp <label for="name">Tela:</label> &nbsp &nbsp  	
                                                                                <select title="Selecione uma opção"  id="tela" name="tela"  >
																					<option value="MONO">MONOCROMATICO </option>
                                                                                    <option value="CRT">CRT </option>
                                                                                    <option value="PLASMA">PLASMA </option>
                                                                                    <option value="LCD">LCD </option>
																					<option value="LED" selected>LED</option>                
																					<option value="OLED">OLED</option>        
																					<option value="QLED">QLED</option>
																					<option value="NQLED">NQLED</option>
																				   </select> 
																			   &nbsp &nbsp  <label for="name">Resolução:</label> &nbsp &nbsp 
                                                                                 <select title="Selecione uma opção"  id="res" name="res"  >
																					<option value="480P" title="Definiçao Padrao 640p x 480p ">VGA ou SD </option>
                                                                                    <option value="720P" title="Alta Definição 1280p x 720p">HD </option>
                                                                                    <option value="1080P" title="Total Alta Definiçãp HD 1920p x 1080p ">FHD </option>
                                                                                    <option value="2160P" title="Ultra Alta Definição 4k">UHD </option>
                                                                                                                                                             
																				   </select> 
																				  <br />

                                                                            	 &nbsp	<label for="name">Rede:</label>
																			   &nbsp    &nbsp 
																				 <input  name="wifi" id="wifi" value="1" type="checkbox" >
																			   &nbsp<label>WIFI</label>&nbsp &nbsp
																			  <input  name="rj45" id="rj45" value="1" type="checkbox">
																				&nbsp   <label>RJ45</label> &nbsp &nbsp 
                            												  <br />
                                                                            &nbsp  <label for="name"> Dados Fonte  :</label> 		&nbsp 		&nbsp 		&nbsp 
                                                                                <label for="name"> Volts  :</label>		&nbsp 
                                                                             	&nbsp <input type="text"  name="fonte_w" id="fonte_w"  style="font-family: 'Arial Black'; font-size: 15px; text-align:center;"  size =5    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                                                         &nbsp     &nbsp    &nbsp  <label for="name"> Amperes  :</label>		&nbsp 
                                                                              	<input type="text"  name="fonte_a" id="fonte_a"  style="font-family: 'Arial Black'; font-size: 15px; text-align:center;"  size =5    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />
                                                                                 <BR />
                                                                                 


                                                                             &nbsp <label for="name">Tipo de Plug da Fonte:</label> &nbsp &nbsp  	
                                                                                <select title="Selecione uma opção"  id="plug" name="plug"  >
																					<option value="H1" title="5 x 3 mm">Plug H1 </option>
                                                                                    <option value="H2"title="4 x 1,3 mm">Plug H2 </option>
                                                                                    <option value="H3"title="5,5 x 1,7 mm">Plug H3 </option>
                                                                                    <option value="H4"title="7,4 x 5 mm">Plug H4 </option>
                                                                                    <option value="H5"title="4,8 x 1,7 mm">Plug H5 </option>
                                                                                    <option value="H6"title="4,5 x 3 mm">Plug H6 </option>
                                                                                    <option value="H7"title="3 x 1 mm">Plug H7 </option>
                                                                                    <option value="H8"title="7,4 x 5 mm">Plug H8 </option>
                                                                                    <option value="H9"title="4,5 x 3 mm">Plug H9 </option>
																				    <option value="H10"title="4 x 1,7 mm">Plug H10 </option>   
                                                                                    <option value="Mac1"title="MacBook Apple">Pino MagSafe1 </option>
                                                                                    <option value="Mac2"title="MacBook Apple">Pino MagSafe2 </option>
                                                                                     <option value="USB-A1"title="Quatro pinos design retangular">USB Tipo A </option>
                                                                                      <option value="USB-A2"title="Cinco pinos de contatos formato de trapézio">USB Mini A </option>
                                                                                      <option value="USB-A3"title="Cinco pinos de contato design retangular e fino.">USB Micro A </option>
                                                                                    <option value="USB-B1"title="Quatro pinos internamente 2 de cada lado abertura quadrada">USB Tipo B </option>
                                                                                      <option value="USB-B2"title="Cinco contatos para transferência de dados retangular">USB Mini B </option>
                                                                                      <option value="USB-B3"title="cinco pinos internamente Trapezio">USB Micro B </option>
                                                                                    <option value="H9"title="Arredondado nas laterais e achatado nas extremidades, 12 pinus de cada lado , Simetrico">USB - C </option>
                                                                                   </select> 
																		&nbsp&nbsp	 
                                                                                  <div class="popup" onclick="myFunction()">Tipos de Conectores
                                                                                      <span class="popuptext" id="myPopup">
                                                                                      <img src="img/plug1.jpg" alt="HTML tutorial" style="width:720px;height:720px;"> </span>
                                                                                 </div>

                                                                                 <script>
                                                                                    // When the user clicks on <div>, open the popup
                                                                                    function myFunction() {
                                                                                      var popup = document.getElementById("myPopup");
                                                                                      popup.classList.toggle("show");
                                                                                    }
                                                                                    </script>

                                                                                  <div>  
                                                                                     </div>      
                                                                                 
                                                                                 </div>
                                                                      
                                                                                
                                                                      <br /><br />              
                                                              
                                                                 
                                                                  </div>
                                                        
                                                                  </div>
                                                                    </form>
                                                                    </div>
                                                                </section>
                                                    </div>
                                                        </section>
                                             <button id="btn_cadastro_unidade" name="btn_cadastro_unidade" class="btn btn-primary">Cadastrar</button>   <br />     
                                            </section>
        
        
                                        </body>

                                        </html>

                    
                  <?PHP
        }
            break;



        case '7': {
            //       alteracao de placa mae          echo "5";
           $descricao_ant = $descricao = $_POST['descricao_ant'];
            $placa_id = $_POST['placa_id'];
            $acao = $_POST['acao'];
            $descricao = $_POST['descricao'];

            if ($acao == "1") {
                $desc_acao = "Alteraçao";
                echo " <center> tipo :   " . $desc_acao . " placa mae id :" . $placa_id;
                echo "<br> Ação  : " . $acao . "   <br> Descricao da Placa : " . $descricao . " <br> </center>";
                // header("Location: cadequip2.php?par=outros");

                $sql = (" UPDATE `tb_placa`  SET  `p_desc` ='". $descricao."'  WHERE `tb_placa`.`p_id` = '".$placa_id."'");
                $consulta = mysqli_query($conn, $sql);

                $campo = "Placa";
                $dados = $descricao_ant . " --> " . $descricao;
                $ctrl_ti = 0;
                $outros = "Placa mae";
                $retorno = registra_alt($conn, $ctrl_ti, $placa_id, "4", $campo, $dados, $outros, $nome_usuario);



            } else {
                if ($acao == "2")
                  {
                    $desc_acao = "Exclusão";
                    echo " <center> tipo :   " . $desc_acao . " placa mae id :" . $placa_id;
                    echo "<br> Ação  : " . $acao . "   <br> Descricao da Placa : " . $descricao . " <br> </center>";
                    // header("Location: cadequip2.php?par=outros");

                    $sql = (" DELETE FROM `tb_placa` WHERE p_id = '$placa_id'");
                    $consulta = mysqli_query($conn, $sql);      
                
                
                }
                else
                    $desc_acao = "Nao Informado ";
             }
            
             ?>
           <center>
              	<br /><br />
				<a href="caddiversos.php?loc=Liberado&tipo=7" title="Alterar Dados do Equipamento">Gerenciar outra Placa Mãe</a><br /><br />
				<a href="busca_diversos.php?tbequip_id= <?php echo $ret_id; ?>" title="Alterar Dados do Equipamento">Consultar Infs do Equipamento</a><br /><br />                           
                <a href="newsfeed.php?id= <?php echo $ret_id; ?>" title="Alterar Local do Equipamento">Inicio </a><br /><br />
               </center>
            <?php
            }
            break;
        case '8': {
            //       alteracao de processador        echo "";
            $descricao_ant = $descricao = $_POST['descricao_ant'];
            $proc_id = $_POST['proc_id'];
            $acao = $_POST['acao'];
            $descricao = $_POST['descricao'];

            if ($acao == "1") {
                $desc_acao = "Alteraçao";
                echo " <center> tipo :   " . $desc_acao . " processador id :" . $proc_id;
                echo "<br> Ação  : " . $acao . "   <br> Descricao  : " . $descricao . " <br> </center>";
                // header("Location: cadequip2.php?par=outros");
                $sql = " UPDATE  `tb_processadores` SET `proc_nome` = '".$descricao."'  WHERE `tb_processadores`.`proc_id` = '".$proc_id."'";
               // $sql = ("UPDATE tb_processadores SET proc_nome = '$descricao' where proc_id = '$proc_id'");

                $campo = "Processador";
                $dados = $descricao_ant . " --> " . $descricao;
                $ctrl_ti = 0;
                $outros = "Processador";
                $retorno = registra_alt($conn, $ctrl_ti, $proc_id, "5", $campo, $dados, $outros, $nome_usuario);



                $consulta = mysqli_query($conn, $sql);
            } else
            {
                if ($acao == "2") {
                    $desc_acao = "Exclusão";
                    echo " <center> tipo :   " . $desc_acao . " processador id :" . $proc_id;
                    echo "<br> Ação  : " . $acao . "   <br> Descricao  : " . $descricao . " <br> </center>";
                    // header("Location: cadequip2.php?par=outros");
                    $sql = (" DELETE FROM `tb_processadores` WHERE proc_id = '$proce_id'");
                    $consulta = mysqli_query($conn, $sql);
                }
                  else
                    $desc_acao = "Nao Informado ";
              }
              ?>
           <center>
              	<br /><br />
				<a href="caddiversos.php?loc=Liberado&tipo=7" title="Alterar Dados do Equipamento">Gerenciar outro Processador</a><br /><br />
				<a href="busca_diversos.php?tbequip_id= <?php echo $ret_id; ?>" title="Alterar Dados do Equipamento">Consultar Infs do Equipamento</a><br /><br />                           
                <a href="newsfeed.php?id= <?php echo $ret_id; ?>" title="Alterar Local do Equipamento">Inicio </a><br /><br />
               </center>
            <?php
                  
                  
                  }
            break;


    }
    }
//    header("Location: cadequip2.php?par=computador");



	//header("Location: index.php?par=Erro_qr0");

?>

