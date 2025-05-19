<?php
include "../Config/config_sistema.php";
include "bco_fun.php";

if (isset($_GET['par'])) 
     $ret_par = $_GET['par'];
 else
   $ret_par = "0";

if ($ret_par == "0") // pagina em branco sem carregamento de informacoes anteriores 
{

    ?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
   <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Resultados</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
 
 <script src="js/checkbox.js"> </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>


    <title></title>
</head>
<body>
  
                        <form method="post" enctype="multipart/form-data" action="salvaequip2_mult.php">    
                        <input type="hidden" name="origem" size=50 value= "cadastro_m">
                        <input type="hidden" name="rec_user" size=50 value= "Sistema">
                      
                        </BR> </BR> </BR> 
                        <center>  
                              <h2> <?php echo ""; ?></h2> 
                            <h3> <?php echo ""; ?></h3>     <br /></center>
                        <div class="container">
    
                                                       <h2>Cadastro Rapido e Multiplo  de Dispositivos  </h2>       <label  class="control-label">    </label> 
 
                                                          <ul class="nav nav-tabs">
                                                            <li class="active"><a data-toggle="tab" href="#home">Dados Equipamentos</a></li>
                                                            <li><a data-toggle="tab" href="#menu1">Componentes</a></li>
                                                            <li><a data-toggle="tab" href="#menu2">Utilizadores</a></li>
                                                            <li><a data-toggle="tab" href="#menu3">Replicar</a></li>
                                                            </ul>

                                                 <div class="tab-content">
                                                    <div id="home" class="tab-pane fade in active">
                                                        <br />
                                                            
                                                      <div class="container-fluid">
                                                            <div class="form-horizontal meuform">
                                                                <div class="form-group row">
                                                                       <div class="col-md-3">     
                                                                            <label for="coord"> Informe o Tipo de Dispositivo </label>   
                                                                     </div>
                                                                      <div class="form-group row">
                                                                           <div class="col-md-4"> 
                                                                                <select title="Informe o Equipamento  " class="form-control selectClass show-tick show-menu-arrow" id="tipo_equip" name="tipo_equip"  >
                                                                                   <option value="DESKTOP">DESKTOP</option>
                                                                                    <option value="NOTEBOOK" >NOTEBOOK</option>
                                                                                    <option value="CHROMEBOOK">CHROMEBOOK</option>
                                                                                    <option value="TABLET" >TABLET</option>
                                                                                     
                                                                                 </select>
                                                                        
                                                                           </div>
                                                                     </div>
                                                                </div>
                                                                              
                                                                               
                                                                                    <div class="form-group row">
                                                                                           <div class="col-md-2">     
                                                                                                <label class="control-label">Patrimonio Nº</label>
                                                                                                <input class="form-control text-uppercase" id="plaqueta" name="plaqueta" style="background-color:seashell;"   value = "<?php echo "PENDENTE" ?>" required/> 
                                                                                            </div>
                                                                                         
                                                                                              <div class="col-md-2">     
                                                                                                <label class="control-label">Reserva.</label>
                                                                                                 <select title="Informe se o Equipamento sera de reserva " class="form-control selectClass show-tick show-menu-arrow" id="reserva" name="reserva"  >
                                                                                                         <option value="SIM">Sim</option>
                                                                                                        <option value="NAO" selected>Não</option>
                                                                                                </select>
                                                                                            </div>
                                                                                              
                                                                                            

                                                                                            <div class="col-md-2">     
                                                                                                <label class="control-label">Lacre T.I</label>
                                                                                                <input class="form-control text-uppercase" id="lacre" name="lacre"   value="S/Lacre"/>
                                                                                            </div>
               

                                                                                            <div class="col-md-2">
                                                                                                <label class="control-label" title = 'Nome do Equipamento' ><a href=pre_consulta_prop.php>Nome Equipamento </a></label>
                                                                                                <input class="form-control text-uppercase"  id="nome_equip" name="nome_equip"    value="" required   />
                                                                                           </div>
                                                                                         
                                                                                            <div class="col-md-3">
                                                                                             <label class="control-label">Sist. Oper / Arq.</label>
                                                                                             <select title="Selecione uma opção"  style="background-color:#FEFFFC" class="form-control selectClass show-tick show-menu-arrow" id="so_tipo" name="so_tipo" >
                                                                                                <option value=""></option>
                                                                                                    <option value="WINDOWS ANT">Windows Anteriores 32 Bits</option>                
                                                                                                    <option value="WINDOWS XP 32Bits">Windows XP 32 Bits</option>        
                                                                                                    <option value="WINDOWS XP 64Bits">Windows XP 62 Bits</option>            
                                                                                                    <option value="WINDOWS 7 32Bits">Windows 7 32 Bits</option>
                                                                                                    <option value="WINDOWS 7 64Bits">Windows 7 64 Bits</option>
                                                                                                    <option value="WINDOWS 8 32Bits">Windows 8 32 Bits</option>
                                                                                                    <option value="WINDOWS 8 64Bits">Windows 8 64 Bits</option>
                                                                                                    <option value="WINDOWS 10 64Bits"selected >Windows 10 64 Bits</option>
                                                                                                    <option value="WINDOWS 11 64Bits">Windows 11 64 Bits</option>
                                                                                                    <option value="Linux">Linux</option>
                                                                                                    <option value="Android">Android</option>
                                                                                                    <option value="IOS">IOS</option
                                                                                                    <option value="CHROME" >CHROME OS</option>
                                                                                                 </select>
                                                                                                </div>
                                         
                                         
                                    
                                                                                    </div>
                                    


                                                            </div>


                                                                  <div class="form-group row">
                                                                                <div class="col-md-5">
                                                                                        <label class="control-label">Modelo Placa</label>  <a href="caddiversos.php?loc=Liberado&tipo=7" title="Adicionar nova Placa Mãe ">+</a>
                                                                                      <?php
                                                                                      // busca de Placa-Mae Cadastradas
                                                                                      $sql_pl = "SELECT * FROM tb_placa order by p_desc";
                                                                                      $res_pl = mysqli_query($conn, $sql_pl) or die('Erro ao selecionar especialidade: ' . mysql_error());
                                                                                      $optionp = '';
                                                                                      while ($row = mysqli_fetch_array($res_pl)) {
                                                                                          //$optionp .= "<option value = '" . $row['p_id'] . "'>" . mb_strimwidth($row['p_desc'], 0, 81, "...") . "   </option>";
                                                                                          $optionp .= "<option value = '" . mb_strimwidth($row['p_desc'], 0, 81, "...") . "'>" . mb_strimwidth($row['p_desc'], 0, 81, "...") . "   </option>";
                                                                                      }
                                                                                      ?>
                                                                                         <select title="Selecione uma opção"  style="background-color:#FEFFFC" class="form-control selectClass show-tick show-menu-arrow" id="placa" name="placa" >     
                                            
                                                                                                  <?php
                                                                                                  echo "<option value='0'>  </option>";
                                                                                                  echo $optionp;
                                                                                                  ?>        
                                                                                          </select>     

                                                                                </div>
                        


                                     
									                                                <div class="col-md-6">
                                                                                            <label  class="control-label">Modelo Processador</label>  <a href="caddiversos.php?loc=Liberado&tipo=7" title="Adicionar novo Processador ">+</a>
                                                                                           <?php
                                                                                           // busca de Processadores 
                                                                                           $sql_proc = "SELECT * FROM tb_processadores order by proc_nome";
                                                                                           $res_proc = mysqli_query($conn, $sql_proc) or die('Erro ao selecionar especialidade: ' . mysql_error());
                                                                                           $option = '';
                                                                                           while ($row = mysqli_fetch_array($res_proc)) {
                                                                                               $option .= "<option value = '" . mb_strimwidth($row['proc_nome'], 0, 88, "...") . "'>" . mb_strimwidth($row['proc_nome'], 0, 88, "...") . "   </option>";
                                                                                               //$option .= "<option value = '" . $row['proc_id'] . "'>" . mb_strimwidth($row['proc_nome'], 0, 88, "...") . "   </option>";
                                                                                           }
                                                                                           ?>
                                                                                            <select title="Selecione uma opção"  style="background-color:#FEFFFC" class="form-control selectClass show-tick show-menu-arrow" id="processador" name="processador" >           
                                            
                                                                                                      <?php
                                                                                                      echo "<option value='0'>  </option>";
                                                                                                      echo $option;
                                                                                                      ?>        
                                                                                              </select> 
                                                                                     </div>
                                                                                           

                                    
									                               </div>

                                                                                 <div class="form-group row">
               
                                                                                           <div class="col-md-3">
                                                                                                <label  class="control-label">Armaz. Tipo</label>
                                    
										                                                      <select title="Selecione uma opção"  style="background-color:seashell;" class="form-control selectClass show-tick show-menu-arrow" id="arm_tipo" name="arm_tipo" >
                                                                                                  
                                                                                                    <option value="ATA">ATA</option>                
                                                                                                    <option value="SATA">SATA</option>        
                                                                                                    <option value="SATA2">SATA2</option>        
                                                                                                    <option value="NVMe">NVMe</option>
                                                                                                    <option value="NAS">NAS</option>
                                                                                                    <option value="SCSI">SCSI</option>
                                                                                                </select>        
                                                                                          </div>
                                                                                          <div class="col-md-2">
                                                                                                <label  class="control-label">Tamanho HD</label>
                                                                                                <select title="Selecione uma opção"  style="background-color:seashell;" class="form-control selectClass show-tick show-menu-arrow" id="arm_tam" name="arm_tam" >
                                                                                                 
                                                                                                    <option value="Inferiores">Inferior a 120GB</option>
                                                                                                <option value="256GB">256GB</option>
                                                                                                <option value="512GB">512GB</option>
                                                                                                <option value="1TB">1TB</option>
                                                                                                <option value="2TB">2TB</option>
                                                                                                <option value="Acima 2TB">Acima 2TB</option>
                                                                                                </select>        
                                                                                          </div>
                                                                                          <div class="col-md-1">
                                                                                                &nbsp &nbsp 
                                                                                           </div>
                                                                                           <div class="col-md-3">
                                                                                                <label  class="control-label">Armaz.Secundario</label>
                                                                                                <select title="Selecione uma opção"  style="background-color: White" class="form-control selectClass show-tick show-menu-arrow" id="arm_sec" name="arm_sec" >
                                                                                                <option value="VAZIO"></option>
                                                                                                    <option value="SSD">SSD</option>                
                                                                                                    <option value="SSSD2">SSD 2.5</option>        
                                                                                                    <option value="SSDm2">SSD M.2</option>        
                                                                                                    <option value="SSDm">SSD mSATA</option>
                                                                                                    <option value="SSDu2">SSD U.2</option>
                                                                                                </select>        
                                                                                            </div>
                                                                                            <div class="col-md-2">
                                                                                                <label  class="control-label">Tamanho</label>
                                                                                                <select title="Selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="arm_sec_tam" name="arm_sec_tam"  >
                                                                                                 <option value="VAZIO"></option>
                                                                                                 <option value="Inferiores">Inferior a 120GB</option>
                                                                                                <option value="256GB">256GB</option>
                                                                                                <option value="512GB">512GB</option>
                                                                                                <option value="1TB">1TB</option>
                                                                                                <option value="2TB">2TB</option>
                                                                                                <option value="Acima 2TB">Acima 2TB</option>
                                                                                                </select>
                                                                                            </div>
                
                                         
                                                                                  </div>

                                                                                       <div class="form-group row">
               
                                                                                            <div class="col-md-3">
                                                                                                <label  class="control-label">Memoria RAM Tipo</label>
                                                                                                <select title="Selecione uma opção"  style="background-color:seashell;" class="form-control selectClass show-tick show-menu-arrow" id="mem_tipo" name="mem_tipo" >
                                                                                                                                                                                                       <option value="DDR">DDR</option>                
                                                                                                    <option value="DDR2">DDR2</option>        
                                                                                                    <option value="DDR3">DDR3</option>
                                                                                                    <option value="DDR4">DDR4</option>
                                                                                                    <option value="DDR5">DDR5</option>
                                                                                                    <option value="Outro">Outro</option>

                                                                                                </select>        
                                                                                            </div>
                                                                                             <div class="col-md-2">
                                                                                                <label  class="control-label">Memoria RAM Qtd.</label>
                                                                                                <select title="Selecione uma opção"  style="background-color:seashell;" class="form-control selectClass show-tick show-menu-arrow" id="mem_qtd" name="mem_qtd" >
                                                                                              
                                                                                                <option value="Inferior">Inferior a 2GB</option>
                                                                                                <option value="2GB">2GB</option>
                                                                                                <option value="4GB">4GB</option>
                                                                                                <option value="8GB">8GB</option>
                                                                                                <option value="16GB">16GB</option>
                                                                                                <option value="32GB">32GB</option>
                                                                                                <option value="Superior">Superior a 32GB</option>
                                                                                                </select>        
                                                                                            </div>
                                                                                             <div class="col-md-1">
                                                                                                &nbsp &nbsp 
                                                                                                 </div>
                                                                                             <div class="col-md-3">
                                                                                                <label  class="control-label">Slots de Memoria</label>
                                                                                                <select title="Selecione uma opção"  style="background-color:seashell;" class="form-control selectClass show-tick show-menu-arrow" id="slots" name="slots" >
											                                                  
										                                                       <option value="0.zero"></option>
                                                                                                <option value="1">1</option>
                                                                                                <option value="2">2</option>
                                                                                                <option value="3">3</option>
                                                                                                <option value="4">4</option>
                                                                                                </select>        
                                                                                            </div>
                                                                                              <div class="col-md-2">
                                                                                                <label  class="control-label">Slots em uso</label>
                                                                                                <select title="Selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="slots_uso" name="slots_uso"  >
                                                                                                   <option value="0.zero"></option>
                                                                                                <option value="1">1</option>
                                                                                                <option value="2">2</option>
                                                                                                <option value="3">3</option>
                                                                                                <option value="4">4</option>
                                                                                                </select>
                                                                                            </div>
                                         
                                                                                       </div>

                                                                                        <div class="form-group row">
                                                                                             <div class="col-md-6">
                                                                                                <label class="control-label">Aplicativos</label>  &nbsp  &nbsp  &nbsp 
                                                                                                 <input  name="office" id="office" value="Office" type="checkbox" >
                                                                                                   &nbsp <label>Office</label>&nbsp &nbsp &nbsp &nbsp 
                                                                                                   <input  name="cad" id="cad" value="ZW_cad" type="checkbox">
                                                                                                     &nbsp   <label>ZWCad</label>      &nbsp &nbsp 
                                                                                              
                                                                                            </div>  
                                                                                              <div class="col-md-5">  
                                                                                            <label>Outro (s) :</label>  &nbsp  &nbsp  &nbsp 
                                                                                               <input name="app_outros" type="text" id="app_outros"   />
                                                                                            
                                                                                              </div>
                                                                                          
                                     
                                                                                         </div>

                                                                                      
                                                                                       <div class="form-group row">
                                                                                                 <div class="col-md-6">  
                                                                                                    <h3>Informaçoes Referente a Monitor (es)    </h3>
                                                                                                     </div>
                                                                                              <div class="col-md-5">  
                                                                                                    <label> </label>
                                                                                                        <select title="Selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="mon_tipo" name="mon_tipo"  >
                                                                                                           <option value="NENHUM"selected>Nenhum</option>
                                                                                                        </select> 
                                                                                              </div>
                                                                                        </div>


                                                                       </div>
                                                           </div>
                                                       
                                                       
                                                       <div id="menu1" class="tab-pane fade">
                                                                    
                                                                       <div class ="divEsq1">    	       
                                                                    <center> <h3>Componentes Diversos</h3> </center>
                   <div class ="divEsq1">    	       
                                      
                                      <table style="width:85%; border:0px solid #000000;">
	                                        <tr bgcolor="#ededed">
		                                     </tr>
                                                <tr>
	                                                 <td> <label for="name">Videos Disponiveis:</label></td>
                                                    <td><input type="checkbox" name="vga" value="1" /> <label style="padding:0px 0px 0px 0px" >VGA  </label>  </td>                
                                                    <td><input type="checkbox" name="hdmi" value="1" /> <label style="padding:0px 0px 0px 0px" >HDMI  </label>  </td>                
                                                       <td><input type="checkbox" name="dvi" value="1" /> <label style="padding:0px 0px 0px 0px" >DVI  </label>  </td>                
                                                     <td><input type="checkbox" name="display" value="1" /> <label style="padding:0px 0px 0px 0px" >Display  </label>  </td>                
                                                </tr>
                                      </table>  
                                     <br />

                                   <div style="display:flex">
                                        <table style="width:15%; border:0px solid #000000;">
	                                            <tr>
	                                                 <td> <label>Monitor Auxiliar    </label></td>
                                                </tr><tr> 
                                                    <td>  <select title="Selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="mon_tipo" name="mon_tipo"  >
                                                            <option value="NENHUM" selected>Nenhum</option>
                                                        <option value="UNICO">Unico</option>                
                                                         </select> 
                                                     </td>
                                                </tr>
                                         </table>
                                       &nbsp 
                                       <table style="width:10%; border:0px solid #000000;">
	                                            <tr>
	                                                 <td> <label>Marca    </label></td>
                                                </tr><tr> 
                                                    <td>  <input name="mon_mar" type="text" id="mon_mar" style="padding:0px;margin:0px;"  />  </td>
                                                </tr>
                                         </table>
                                   &nbsp 
                                        <table style="width:10%; border:0px solid #000000;">
	                                            <tr>
	                                                 <td> <label>Tamanho   </label></td>
                                                </tr>
                                       <tr> 
                                                    <td>  <input name="mon_pol" type="text" id="mon_pol" style="padding:0px;margin:0px;"  />   </td>
                                                </tr>
                                         </table>
                                       &nbsp 
                                    <table style="width:10%; border:0px solid #000000;">
	                                            <tr>
	                                                 <td> <label>Patrimonio   </label></td>
                                                </tr>
                                       <tr> 
                                                    <td>   <input name="mon_pat" type="text" id="mon_pat" style="padding:0px;margin:0px;"  />    </td>
                                                </tr>
                                         </table>
                                       &nbsp 
                                    <table style="width:10%; border:0px solid #000000;">
	                                            <tr>
	                                                 <td> <label>CTI   </label></td>
                                                </tr>
                                       <tr> 
                                                    <td>    <input name="mon_cti" type="text" id="mon_cti" style="padding:0px;margin:0px;" size="10"  />   </td>
                                                </tr>
                                         </table>
                                       &nbsp 

                                    <table style="width:10%; border:0px solid #000000;">
	                                            <tr>
	                                                 <td> <label>Tipo   </label></td>
                                                </tr>
                                       <tr> 
                                                  <td>  <select title="Selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="mon_cat" name="mon_cat"  >
                                                              <option value="Vazio" default>--------------------------</option>
                                                                <option value="Widescreen">Widescreen</option>     
                                                                <option value="UltraWide">UltraWide</option>                
                                                                <option value="CRT">CRT</option>                    
                                                        </select>
                                                  </td>
                                                </tr>
                                         </table>
                                    </div>
                                    <br />
                                        <table style="width:100%; border:0px solid #000000;">
	                                        <tr bgcolor="#ededed">
		                                     </tr>
                                               <tr>  </tr>  
                                             <tr>
	                                             <td> <label>Obs. Video    </label></td>
                                         </tr>
                                              <tr>
                                             <td><input type="text" name="obsvid" id="obsvid" size="130" value="1" />  </td>
                                                  </tr>
                                        </table>
                                                    <br />
                                              
                                                            <div style="display: flex">  
                                                                 <table style="width: 40%; border: 1px solid #000000;">
	                                                                                    <tr bgcolor="#ededed">
		                                                                                 </tr>
                                                                                            <tr>
	                                                                                            <td> <label for="name">Redes Disponiveis :</label></td>
                                                                                                <td> <input  name="wifi" id="wifi" value="1" type="checkbox" checked> <label style="padding:0px 0px 0px 0px" >WIFI  </label>  </td>                
                                                                                                <td>  <input  name="rj45" id="rj45" value="1" type="checkbox"> <label style="padding:0px 0px 0px 0px" >RJ-45  </label>  </td>                
                                                                                        </tr>
                                                                                  </table>                   	
                       
                                                                           <table style="width:5%; border:1px solid #000000; ">
                              
                                                                           </table>
                       
                                                                                    <table style="width:40%; border:1px solid #000000; ">
	                                                                                    <tr bgcolor="#ededed">
		                                                                                 </tr>
                                                                                            <tr>
	                                                                                            <td> <label for="name">Dados Fonte  :</label></td>
                                                                                                <td> <label for="name"> Volts  :</label> 
                                                                                                <input type="text"  name="fonte_w" id="fonte_w"  style="font-family: 'Arial Black'; font-size: 15px; text-align:center;"  size =5    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />  </td>                
                                                                                                <td>  <label for="name"> Amperes  :</label> 
                                                  	                                            <input type="text"  name="fonte_a" id="fonte_a"  style="font-family: 'Arial Black'; font-size: 15px; text-align:center;"  size =5    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />       </td>                
                                                                                        </tr>
                                                                                  </table>                   	
                                                                        </div>
                                                                       <br />                                
                                                                                 <table style="width:45%; border:0px solid #000000;">
                                        	                                        <tr bgcolor="#ededed">
		                                                                            </tr>
                                                                                    <tr>  </tr>  
                                                                                     <tr>
	                                                                                     <td> <label for="name">Tipo de Plug da Fonte:</label> &nbsp &nbsp  	 </td>
                                                                                         <td> <select title="Selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="plug" name="plug"  >
																					            <option value="" title="5 x 3 mm"> </option>     
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
																		                 </td>
                                                                                      <td> &nbsp &nbsp &nbsp  </td>    
                                                                                        
                                                                                     </tr>
                                                                                  </table>
                                                                                               
                                                                   </div>
                                                             </div>
     
                                                       </div>

                                                        <div id="menu2" class="tab-pane fade">
       
                                                            <div class="infados">  </div> 

      
                                                            <div class="form-group row">
                                                                <br />
                                                                <div class="col-md-3"></div>       
                                                                        <div class="col-md-3">
                                                                             <center>    <label class="control-label">Nº Utilizadores do PC </label></center>
                                                                              <input class="form-control text-uppercase" id="utilizadores_num" name="utilizadores_num"   />
                                                                        </div>
           
                                                                            <div class="col-md-3">
                                                                                <label class="control-label">Local de Cadastro do Dispositivo  </label></center> <br />
                                                                               <input  name="local_cad" id="local_cad" value="1" checked type="radio" >
                                                                                        &nbsp <label>Laboratorio</label>&nbsp &nbsp &nbsp &nbsp 
                                                                               <input  name="local_cad" id="local_cad" value="2" type="radio">
                                                                                        &nbsp   <label>Local</label>      &nbsp &nbsp 
              
                                                                            </div>
           
           
                                                                      <div class="col-md-2"></div>
                                                               </div>


                                                          <div class="form-group row">
                                                                    <div class="col-md-3"></div>       
                                                                    <div class="col-md-6">
                                                               <center>   <label  class="control-label">Nome dos Utilizadores</label> </center>
                                                                     <textarea id="utilizadores_nomes" name="utilizadores_nomes" rows="10" cols="65">
                      
                                                                        </textarea>
                                                                     </div>
                                                                <div class="col-md-2"></div>       
      
                                                          </div>



                                                            
                                        <div class="form-group row">
                                           <div class="col-md-3"></div>       
                                            <div class="col-md-2">
                                               <label class="control-label">Responsavel </label>
                                                       </div>
                                             <div class="col-md-4">
                                              <input class="form-control text-uppercase" id="resp" name="resp"   /> 
                                             </div>
                                            <div class="col-md-2"></div>       
                                       </div>
      
       
                                      <div class="form-horizontal meuform">
                                       <div class="form-group row">
                                               <div class="col-md-3">     
                                              </div>
           
                                           <div class="col-md-6">
                                               <input class="form-control text-uppercase" placeholder="Observaçoes diversas" id="obs" name="obs"  />    
                                           </div>
            
                                         </div>
                                           <div class="col-md-11">

                                             </div>
                                       </div>
                                              <div id="box1a"> </div>
                                              <div id="box2a">  </div>
                                              <div id="box3a"> </div>
                                              <div id="pessoais2">   </div>
                            </div>
                              <div id="menu3" class="tab-pane fade">
                                         <div class="infados">  </div> 

                                            <br />
                                                            <div class="form-group row">
                                                                   <div class="col-md-3"></div>       
                                                                        <div class="col-md-3">
                                                                             <center>    <label class="control-label">Nº de Dispositivos </label></center>
                                                                              <input class="form-control text-uppercase" id="utilizadores_num" name="utilizadores_num"   />
                                                                        </div>
           
                                                                     <div class="col-md-4">
                                                                                <label class="control-label">Local de Cadastro do Dispositivo  </label></center> <br />
                                                                           <?php
                                                                           // busca de locais  Cadastradas
                                                                           $sql = "SELECT * FROM tbcmei order by tbcmei_nome";
                                                                           $resl = mysqli_query($conn, $sql) or die('Erro ao selecionar especialidade: ' . mysql_error());
                                                                           $optionp = '';
                                                                           while ($row = mysqli_fetch_array($resl)) {
                                                                               //$optionp .= "<option value = '" . $row['p_id'] . "'>" . mb_strimwidth($row['p_desc'], 0, 81, "...") . "   </option>";
                                                                               $optionp .= "<option value = '" . $row['tbcmei_id'] . "' title='" . $row['tbcmei_id'] . "' >" . mb_strimwidth($row['tbcmei_nome'], 0, 81, "...") . "   </option>";
                                                                           }
                                                                           ?>
                                                                                  <select title="Selecione uma opção"  style="background-color:#FEFFFC" class="form-control selectClass show-tick show-menu-arrow" id="loc_id" name="loc_id" >     
                                                                                       <?php
                                                                                       echo "<option value='0'>  </option>";
                                                                                       echo $optionp;
                                                                                       ?>        
                                                                                   </select>     
                                                                             </div>
                                                                          <div class="col-md-2"></div>
                                                                     </div>

                                                            
                                        <div class="form-group row">
                                           <div class="col-md-3"></div>       
                                            <div class="col-md-2">
                                               <label class="control-label">Responsavel / Tecnico  </label>
                                                       </div>
                                             <div class="col-md-4">
                                              <input class="form-control text-uppercase" id="resp" name="resp"   /> 
                                             </div>
                                            <div class="col-md-2"></div>       
                                       </div>
       
                                                       <div class="form-group row">
                                                                   <div class="col-md-3"></div>       
                                                                        <div class="col-md-3">
                                                                             <center>  <input type="checkbox" name="equip1" value="1" />   <label class="control-label">* Equip 01  CTI </label></center>
                                                                              <input class="form-control text-uppercase" id="disp1" name="disp1"   />
                                                                        </div>
           
                                                                        <div class="col-md-3">
                                                                             <center>    <label class="control-label">Patrimonio </label></center>
                                                                              <input class="form-control text-uppercase" id="num1" name="num1"   />
                                                                        </div>
                        
                                                                      <div class="col-md-2"></div>
                                                         </div>
                                                         <div class="form-group row">
                                                                   <div class="col-md-3"></div>       
                                                                        <div class="col-md-3">
                                                                             <center>   <center>  <input type="checkbox" name="equip2" value="1" />   <label class="control-label">* Equip 02  CTI </label></center>
                                                                              <input class="form-control text-uppercase" id="disp2" name="disp2"   />
                                                                        </div>
           
                                                                        <div class="col-md-3">
                                                                             <center>    <label class="control-label">Patrimonio </label></center>
                                                                              <input class="form-control text-uppercase" id="num2" name="num2"   />
                                                                        </div>
             
           
                                                                      <div class="col-md-2"></div>
                                                               </div>


                                                            <div class="form-group row">
                                                                   <div class="col-md-3"></div>       
                                                                        <div class="col-md-3">
                                                                             <center>   <center>  <input type="checkbox" name="equip3" value="1" />   <label class="control-label">* Equip 03  CTI </label></center>
                                                                              <input class="form-control text-uppercase" id="disp3" name="disp3"   />
                                                                        </div>
           
                                                                        <div class="col-md-3">
                                                                             <center>    <label class="control-label">Patrimonio </label></center>
                                                                              <input class="form-control text-uppercase" id="num3" name="num3"   />
                                                                        </div>
             
           
                                                                      <div class="col-md-2"></div>
                                                         </div>
                                                         <div class="form-group row">
                                                                   <div class="col-md-3"></div>       
                                                                        <div class="col-md-3">
                                                                             <center>   <center>  <input type="checkbox" name="equip4" value="1" />   <label class="control-label">* Equip 04  CTI </label></center>
                                                                              <input class="form-control text-uppercase" id="disp4" name="disp4"   />
                                                                        </div>
           
                                                                        <div class="col-md-3">
                                                                             <center>    <label class="control-label">Patrimonio </label></center>
                                                                              <input class="form-control text-uppercase" id="num4" name="num4"   />
                                                                        </div>
             
           
                                                                      <div class="col-md-2"></div>
                                                               </div>

                                      <div class="form-horizontal meuform">
                                       <div class="form-group row">
                                  
                                         </div>
                                           <div class="col-md-11">
                                             <center>  <button class="botao submit" type="submit" name="submit">Aplicar</button></center> 
                                                  <br><br>  
                                               <a href="busca_diversos.php?id=0" title="SELECIONAR ">Consulta de Equipamento  </a>  <br /><br />
                                                   <br><br>
                                              <a href="newsfeed.php" title="SELECIONAR ">Pagina Inicial  </a>  <br /><br />

                                             </div>
                                       </div>
                                           
                            </div>
                          </div>
                         </div>
                       </div>
                     </div>
                                               
                                

                       </form>                    
                     </body>
                  </html>                            
                    <?PHP
} 
else // parametro 1 com busca de informacoes anteriores 
{
    if (isset($_GET['cti']))
        $ret_cti = $_GET['cti'];
    else
        $ret_cti = "0";
               // busca de dados do disp Cadastradas
               $sql_pl1 = "SELECT * FROM tbequip where ctrl_ti ='".$ret_cti."'; ";
              // $result = mysqli_query($conn, $sql_pl) or die('Erro ao selecionar especialidade: ' . mysql_error());
              // $result = mysqli_query($conn, 'SELECT * FROM tbequip where ctrl_ti = "' . $ret_cti . '"');
               $result = mysqli_query($conn, $sql_pl1);
                $retorno_checkInEng = mysqli_num_rows($result);
                $row = mysqli_fetch_assoc($result);

    if ($retorno_checkInEng <> 0) {
        do {
            // $row = mysqli_fetch_assoc($result);
            ?>
<!DOCTYPE html>

<html lang="pt" xmlns="http://www.w3.org/1999/xhtml">
<head>
   <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Resultados</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
 
 <script src="js/checkbox.js"> </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>


    <title></title>
</head>
<body>
  
                        <form method="post" enctype="multipart/form-data" action="salvaequip2_mult.php">    
                        <input type="hidden" name="origem" size=50 value= "cadastro_m">
                        <input type="hidden" name="rec_user" size=50 value= "Sistema">
                      
                        </BR> </BR> </BR> 
                        <center>  
                              <h2> <?php echo ""; ?></h2> 
                            <h3> <?php echo ""; ?></h3>     <br /></center>
                        <div class="container">
    
                                                       <h2>Cadastro Rapido e Multiplo  de Dispositivos  </h2>       <label  class="control-label">    </label> 
 
                                                          <ul class="nav nav-tabs">
                                                            <li class="active"><a data-toggle="tab" href="#home">Dados Equipamentos</a></li>
                                                            <li><a data-toggle="tab" href="#menu1">Componentes</a></li>
                                                            <li><a data-toggle="tab" href="#menu2">Utilizadores</a></li>
                                                            <li><a data-toggle="tab" href="#menu3">Replicar</a></li>
                                                            </ul>

                                                 <div class="tab-content">
                                                    <div id="home" class="tab-pane fade in active">
                                                        <br />
                                                            
                                                      <div class="container-fluid">
                                                            <div class="form-horizontal meuform">
                                                                <div class="form-group row">
                                                                       <div class="col-md-3">     
                                                                            <label for="coord"> Informe o Tipo de Dispositivo </label>   
                                                                     </div>
                                                                      <div class="form-group row">
                                                                           <div class="col-md-4"> 
                                                                                <select title="Informe o Equipamento  " class="form-control selectClass show-tick show-menu-arrow" id="tipo_equip" name="tipo_equip"  >
                                                                                   <option value="<?php echo $row['tbequi_tipo']; ?>" > <?php echo $row['tbequi_tipo']; ?> </option>
                                                                                    <option value="DESKTOP">DESKTOP</option>
                                                                                    <option value="NOTEBOOK" >NOTEBOOK</option>
                                                                                    <option value="CHROMEBOOK">CHROMEBOOK</option>
                                                                                    <option value="TABLET" >TABLET</option>
                                                                                     
                                                                                 </select>
                                                                      
                                                                           </div>
                                                                     </div>
                                                                </div>
                                                                              
                                                                               
                                                                                    <div class="form-group row">
                                                                                           <div class="col-md-2">     
                                                                                                <label class="control-label">Patrimonio Nº</label>
                                                                                                <input class="form-control text-uppercase" id="plaqueta" name="plaqueta" style="background-color:seashell;"   value = "<?php echo $row['tbequip_plaqueta']; ?>" required/> 
                                                                                            </div>
                                                                                         
                                                                                              <div class="col-md-2">     
                                                                                                <label class="control-label">Reserva.</label>
                                                                                                 <select title="Informe se o Equipamento sera de reserva " class="form-control selectClass show-tick show-menu-arrow" id="reserva" name="reserva"  >
                                                                                                     <option value="<?php echo $row['tbequip_reserva']; ?>" selected> <?php echo $row['tbequip_reserva']; ?> </option>   
                                                                                                     <option value="SIM">Sim</option>
                                                                                                        <option value="NAO" >Não</option>
                                                                                                </select>
                                                                                            </div>
                                                                                              
                                                                                            

                                                                                            <div class="col-md-2">     
                                                                                                <label class="control-label">Lacre T.I</label>
                                                                                                <input class="form-control text-uppercase" id="lacre" name="lacre"   value="<?php echo $row['tbequip_lacre']; ?>"/>
                                                                                            </div>
               

                                                                                            <div class="col-md-2">
                                                                                                <label class="control-label" title = 'Nome do Equipamento' ><a href=pre_consulta_prop.php>Nome Equipamento </a></label>
                                                                                                <input class="form-control text-uppercase"  id="nome_equip" name="nome_equip"    value="<?php echo $row['tbequi_nome']; ?>" required   />
                                                                                           </div>
                                                                                         
                                                                                            <div class="col-md-3">
                                                                                             <label class="control-label">Sist. Oper / Arq.</label>
                                                                                             <select title="Selecione uma opção"  style="background-color:#FEFFFC" class="form-control selectClass show-tick show-menu-arrow" id="so_tipo" name="so_tipo" >
                                                                                                <option value="<?php echo $row['tbequip_so']; ?>" selected> <?php echo $row['tbequip_so']; ?> </option>   
                                                                                                    <option value="WINDOWS ANT">Windows Anteriores 32 Bits</option>                
                                                                                                    <option value="WINDOWS XP 32Bits">Windows XP 32 Bits</option>        
                                                                                                    <option value="WINDOWS XP 64Bits">Windows XP 62 Bits</option>            
                                                                                                    <option value="WINDOWS 7 32Bits">Windows 7 32 Bits</option>
                                                                                                    <option value="WINDOWS 7 64Bits">Windows 7 64 Bits</option>
                                                                                                    <option value="WINDOWS 8 32Bits">Windows 8 32 Bits</option>
                                                                                                    <option value="WINDOWS 8 64Bits">Windows 8 64 Bits</option>
                                                                                                    <option value="WINDOWS 10 64Bits">Windows 10 64 Bits</option>
                                                                                                    <option value="WINDOWS 11 64Bits">Windows 11 64 Bits</option>
                                                                                                    <option value="Linux">Linux</option>
                                                                                                    <option value="Android">Android</option>
                                                                                                    <option value="IOS">IOS</option
                                                                                                    <option value="CHROME" >CHROME OS</option>
                                                                                                 </select>
                                                                                                </div>
                                         
                                         
                                    
                                                                                    </div>
                                    


                                                            </div>


                                                                  <div class="form-group row">
                                                                                <div class="col-md-5">
                                                                                        <label class="control-label">Modelo Placa</label>  <a href="caddiversos.php?loc=Liberado&tipo=7" title="Adicionar nova Placa Mãe ">+</a>
                                                                                        <?php
                                                                                        $optionp = '';
                                                                                        $optionp .= "<option value = '" . mb_strimwidth($row['tbequi_modplaca'], 0, 81, "...") . "'>" . mb_strimwidth($row['tbequi_modplaca'], 0, 81, "...") . "   </option>";

                                                                                        ?>
                                                                                         <select title="Selecione uma opção"  style="background-color:#FEFFFC" class="form-control selectClass show-tick show-menu-arrow" id="placa" name="placa" >     
                                            
                                                                                                  <?php
                                                                                                  // echo "<option value='0'>  </option>";
                                                                                                  echo $optionp;
                                                                                                  ?>        
                                                                                          </select>     

                                                                                </div>
                        


                                     
									                                                <div class="col-md-6">
                                                                                            <label  class="control-label">Modelo Processador</label>  <a href="caddiversos.php?loc=Liberado&tipo=7" title="Adicionar novo Processador ">+</a>
                                                                                           <?php
                                                                                           // busca de Processadores 
                                                                               
                                                                                           $option = '';

                                                                                           $option .= "<option value = '" . mb_strimwidth($row['tbequi_mod'], 0, 88, "...") . "'>" . mb_strimwidth($row['tbequi_mod'], 0, 88, "...") . "   </option>";
                                                                                           //$option .= "<option value = '" . $row['proc_id'] . "'>" . mb_strimwidth($row['proc_nome'], 0, 88, "...") . "   </option>";
                                                                               
                                                                                           ?>
                                                                                            <select title="Selecione uma opção"  style="background-color:#FEFFFC" class="form-control selectClass show-tick show-menu-arrow" id="processador" name="processador" >           
                                            
                                                                                                      <?php
                                                                                                      //               echo "<option value='0'>  </option>";
                                                                                                      echo $option;
                                                                                                      ?>        
                                                                                              </select> 
                                                                                     </div>
                                                                                           

                                    
									                               </div>

                                                                                 <div class="form-group row">
               
                                                                                           <div class="col-md-3">
                                                                                                <label  class="control-label">Armaz. Tipo</label>
                                    
										                                                      <select title="Selecione uma opção"  style="background-color:seashell;" class="form-control selectClass show-tick show-menu-arrow" id="arm_tipo" name="arm_tipo" >
                                                                                                    <option value="<?php echo $row['tbequi_tparmazenamento']; ?>" selected> <?php echo $row['tbequi_tparmazenamento']; ?> </option>   
                                                                                                    <option value="ATA">ATA</option>                
                                                                                                    <option value="SATA">SATA</option>        
                                                                                                    <option value="SATA2">SATA2</option>        
                                                                                                    <option value="NVMe">NVMe</option>
                                                                                                    <option value="NAS">NAS</option>
                                                                                                    <option value="SCSI">SCSI</option>
                                                                                                </select>        
                                                                                          </div>
                                                                                          <div class="col-md-2">
                                                                                                <label  class="control-label">Tamanho HD</label>
                                                                                                <select title="Selecione uma opção"  style="background-color:seashell;" class="form-control selectClass show-tick show-menu-arrow" id="arm_tam" name="arm_tam" >
                                                                                                   <option value="<?php echo $row['tbequi_armazenamento']; ?>" selected> <?php echo $row['tbequi_armazenamento']; ?> </option>   
                                                                                                    <option value="Inferiores">Inferior a 120GB</option>
                                                                                                <option value="256GB">256GB</option>
                                                                                                <option value="512GB">512GB</option>
                                                                                                <option value="1TB">1TB</option>
                                                                                                <option value="2TB">2TB</option>
                                                                                                <option value="Acima 2TB">Acima 2TB</option>
                                                                                                </select>        
                                                                                          </div>
                                                                                          <div class="col-md-1">
                                                                                                &nbsp &nbsp 
                                                                                           </div>
                                                                                           <div class="col-md-3">
                                                                                                <label  class="control-label">Armaz.Secundario</label>
                                                                                                <select title="Selecione uma opção"  style="background-color: White" class="form-control selectClass show-tick show-menu-arrow" id="arm_sec" name="arm_sec" >
                                                                                                <option value="<?php echo $row['tbequi_arm_sec']; ?>" selected> <?php echo $row['tbequi_arm_sec']; ?> </option>   
                                                                                                    <option value="VAZIO"></option>
                                                                                                    <option value="SSD">SSD</option>                
                                                                                                    <option value="SSSD2">SSD 2.5</option>        
                                                                                                    <option value="SSDm2">SSD M.2</option>        
                                                                                                    <option value="SSDm">SSD mSATA</option>
                                                                                                    <option value="SSDu2">SSD U.2</option>
                                                                                                </select>        
                                                                                            </div>
                                                                                            <div class="col-md-2">
                                                                                                <label  class="control-label">Tamanho</label>
                                                                                                <select title="Selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="arm_sec_tam" name="arm_sec_tam"  >
                                                                                                 <option value="<?php echo $row['tbequi_arm_sectam']; ?>" selected> <?php echo $row['tbequi_arm_sectam']; ?> </option>   
                                                                                                    <option value="VAZIO"></option>
                                                                                                 <option value="Inferiores">Inferior a 120GB</option>
                                                                                                <option value="256GB">256GB</option>
                                                                                                <option value="512GB">512GB</option>
                                                                                                <option value="1TB">1TB</option>
                                                                                                <option value="2TB">2TB</option>
                                                                                                <option value="Acima 2TB">Acima 2TB</option>
                                                                                                </select>
                                                                                            </div>
                
                                         
                                                                                  </div>

                                                                                       <div class="form-group row">
               
                                                                                            <div class="col-md-3">
                                                                                                <label  class="control-label">Memoria RAM Tipo</label>
                                                                                                <select title="Selecione uma opção"  style="background-color:seashell;" class="form-control selectClass show-tick show-menu-arrow" id="mem_tipo" name="mem_tipo" >
                                                                                                     <option value="<?php echo $row['tbequi_modelomemoria']; ?>" selected> <?php echo $row['tbequi_modelomemoria']; ?> </option>                                                                                                       <option value="DDR">DDR</option>                
                                                                                                    <option value="DDR2">DDR2</option>        
                                                                                                    <option value="DDR3">DDR3</option>
                                                                                                    <option value="DDR4">DDR4</option>
                                                                                                    <option value="DDR5">DDR5</option>
                                                                                                    <option value="Outro">Outro</option>

                                                                                                </select>        
                                                                                            </div>
                                                                                             <div class="col-md-2">
                                                                                                <label  class="control-label">Memoria RAM Qtd.</label>
                                                                                                <select title="Selecione uma opção"  style="background-color:seashell;" class="form-control selectClass show-tick show-menu-arrow" id="mem_qtd" name="mem_qtd" >
                                                                                                <option value="<?php echo $row['tbequi_armazenamento']; ?>" selected> <?php echo $row['tbequi_armazenamento']; ?> </option>   
                                                                                                <option value="Inferior">Inferior a 2GB</option>
                                                                                                <option value="2GB">2GB</option>
                                                                                                <option value="4GB">4GB</option>
                                                                                                <option value="8GB">8GB</option>
                                                                                                <option value="16GB">16GB</option>
                                                                                                <option value="32GB">32GB</option>
                                                                                                <option value="Superior">Superior a 32GB</option>
                                                                                                </select>        
                                                                                            </div>
                                                                                             <div class="col-md-1">
                                                                                                &nbsp &nbsp 
                                                                                                 </div>
                                                                                             <div class="col-md-3">
                                                                                                <label  class="control-label">Slots de Memoria</label>
                                                                                                <select title="Selecione uma opção"  style="background-color:seashell;" class="form-control selectClass show-tick show-menu-arrow" id="slots" name="slots" >
											                                                    <option value="<?php echo $row['tbequi_slots']; ?>" selected> <?php echo $row['tbequi_slots']; ?> </option>   
										                                                       <option value="0.zero"></option>
                                                                                                <option value="1">1</option>
                                                                                                <option value="2">2</option>
                                                                                                <option value="3">3</option>
                                                                                                <option value="4">4</option>
                                                                                                </select>        
                                                                                            </div>
                                                                                              <div class="col-md-2">
                                                                                                <label  class="control-label">Slots em uso</label>
                                                                                                <select title="Selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="slots_uso" name="slots_uso"  >
                                                                                                  <option value="<?php echo $row['tbequi_slots_uso']; ?>" selected> <?php echo $row['tbequi_slots_uso']; ?> </option>   
                                                                                                    <option value="0.zero"></option>
                                                                                                <option value="1">1</option>
                                                                                                <option value="2">2</option>
                                                                                                <option value="3">3</option>
                                                                                                <option value="4">4</option>
                                                                                                </select>
                                                                                            </div>
                                         
                                                                                       </div>

                                                                                        <div class="form-group row">
                                                                                             <div class="col-md-6">
                                                                                                <label class="control-label">Aplicativos</label>  &nbsp  &nbsp  &nbsp 
                                                                                                 <input  name="office" id="office" value="Office" type="checkbox" >
                                                                                                   &nbsp <label>Office</label>&nbsp &nbsp &nbsp &nbsp 
                                                                                                   <input  name="cad" id="cad" value="ZW_cad" type="checkbox">
                                                                                                     &nbsp   <label>ZWCad</label>      &nbsp &nbsp 
                                                                                              
                                                                                            </div>  
                                                                                              <div class="col-md-5">  
                                                                                            <label>Outro (s) :</label>  &nbsp  &nbsp  &nbsp 
                                                                                               <input name="app_outros" type="text" id="app_outros"   />
                                                                                            
                                                                                              </div>
                                                                                          
                                     
                                                                                         </div>

                                                                                      
                                                                                       <div class="form-group row">
                                                                                                 <div class="col-md-6">  
                                                                                                    <h3>Informaçoes Referente a Monitor (es)    </h3>
                                                                                                     </div>
                                                                                              <div class="col-md-5">  
                                                                                                    <label> </label>
                                                                                                        <select title="Selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="mon_tipo" name="mon_tipo"  >
                                                                                                           <option value="NENHUM"selected>Nenhum</option>
                                                                                                        </select> 
                                                                                              </div>
                                                                                        </div>


                                                                       </div>
                                                           </div>
                                                       
                                                       
                                                       <div id="menu1" class="tab-pane fade">
                                                                    
                                                                       <div class ="divEsq1">    	       
                                                                    <center> <h3>Componentes Diversos</h3> </center>
                   <div class ="divEsq1">    	       
                                      
                                      <table style="width:85%; border:0px solid #000000;">
	                                        <tr bgcolor="#ededed">
		                                     </tr>
                                                <tr>
	                                                 <td> <label for="name">Videos Disponiveis:</label></td>
                                                    <td><input type="checkbox" name="vga" value="1" /> <label style="padding:0px 0px 0px 0px" >VGA  </label>  </td>                
                                                    <td><input type="checkbox" name="hdmi" value="1" /> <label style="padding:0px 0px 0px 0px" >HDMI  </label>  </td>                
                                                       <td><input type="checkbox" name="dvi" value="1" /> <label style="padding:0px 0px 0px 0px" >DVI  </label>  </td>                
                                                     <td><input type="checkbox" name="display" value="1" /> <label style="padding:0px 0px 0px 0px" >Display  </label>  </td>                
                                                </tr>
                                      </table>  
                                     <br />

                                   <div style="display:flex">
                                        <table style="width:15%; border:0px solid #000000;">
	                                            <tr>
	                                                 <td> <label>Monitor Auxiliar    </label></td>
                                                </tr><tr> 
                                                    <td>  <select title="Selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="mon_tipo" name="mon_tipo"  >
                                                            <option value="NENHUM" selected>Nenhum</option>
                                                        <option value="UNICO">Unico</option>                
                                                         </select> 
                                                     </td>
                                                </tr>
                                         </table>
                                       &nbsp 
                                       <table style="width:10%; border:0px solid #000000;">
	                                            <tr>
	                                                 <td> <label>Marca    </label></td>
                                                </tr><tr> 
                                                    <td>  <input name="mon_mar" type="text" id="mon_mar" style="padding:0px;margin:0px;"  />  </td>
                                                </tr>
                                         </table>
                                   &nbsp 
                                        <table style="width:10%; border:0px solid #000000;">
	                                            <tr>
	                                                 <td> <label>Tamanho   </label></td>
                                                </tr>
                                       <tr> 
                                                    <td>  <input name="mon_pol" type="text" id="mon_pol" style="padding:0px;margin:0px;"  />   </td>
                                                </tr>
                                         </table>
                                       &nbsp 
                                    <table style="width:10%; border:0px solid #000000;">
	                                            <tr>
	                                                 <td> <label>Patrimonio   </label></td>
                                                </tr>
                                       <tr> 
                                                    <td>   <input name="mon_pat" type="text" id="mon_pat" style="padding:0px;margin:0px;"  />    </td>
                                                </tr>
                                         </table>
                                       &nbsp 
                                    <table style="width:10%; border:0px solid #000000;">
	                                            <tr>
	                                                 <td> <label>CTI   </label></td>
                                                </tr>
                                       <tr> 
                                                    <td>    <input name="mon_cti" type="text" id="mon_cti" style="padding:0px;margin:0px;" size="10"  />   </td>
                                                </tr>
                                         </table>
                                       &nbsp 

                                    <table style="width:10%; border:0px solid #000000;">
	                                            <tr>
	                                                 <td> <label>Tipo   </label></td>
                                                </tr>
                                       <tr> 
                                                  <td>  <select title="Selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="mon_cat" name="mon_cat"  >
                                                              <option value="Vazio" default>--------------------------</option>
                                                                <option value="Widescreen">Widescreen</option>     
                                                                <option value="UltraWide">UltraWide</option>                
                                                                <option value="CRT">CRT</option>                    
                                                        </select>
                                                  </td>
                                                </tr>
                                         </table>
                                    </div>
                                    <br />
                                        <table style="width:100%; border:0px solid #000000;">
	                                        <tr bgcolor="#ededed">
		                                     </tr>
                                               <tr>  </tr>  
                                             <tr>
	                                             <td> <label>Obs. Video    </label></td>
                                         </tr>
                                              <tr>
                                             <td><input type="text" name="obsvid" id="obsvid" size="130" value="1" />  </td>
                                                  </tr>
                                        </table>
                                                    <br />
                                              
                                                            <div style="display: flex">  
                                                                 <table style="width: 40%; border: 1px solid #000000;">
	                                                                                    <tr bgcolor="#ededed">
		                                                                                 </tr>
                                                                                            <tr>
	                                                                                            <td> <label for="name">Redes Disponiveis :</label></td>
                                                                                                <td> <input  name="wifi" id="wifi" value="1" type="checkbox" checked> <label style="padding:0px 0px 0px 0px" >WIFI  </label>  </td>                
                                                                                                <td>  <input  name="rj45" id="rj45" value="1" type="checkbox"> <label style="padding:0px 0px 0px 0px" >RJ-45  </label>  </td>                
                                                                                        </tr>
                                                                                  </table>                   	
                       
                                                                           <table style="width:5%; border:1px solid #000000; ">
                              
                                                                           </table>
                       
                                                                                    <table style="width:40%; border:1px solid #000000; ">
	                                                                                    <tr bgcolor="#ededed">
		                                                                                 </tr>
                                                                                            <tr>
	                                                                                            <td> <label for="name">Dados Fonte  :</label></td>
                                                                                                <td> <label for="name"> Volts  :</label> 
                                                                                                <input type="text"  name="fonte_w" id="fonte_w"  style="font-family: 'Arial Black'; font-size: 15px; text-align:center;"  size =5    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />  </td>                
                                                                                                <td>  <label for="name"> Amperes  :</label> 
                                                  	                                            <input type="text"  name="fonte_a" id="fonte_a"  style="font-family: 'Arial Black'; font-size: 15px; text-align:center;"  size =5    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" />       </td>                
                                                                                        </tr>
                                                                                  </table>                   	
                                                                        </div>
                                                                       <br />                                
                                                                                 <table style="width:45%; border:0px solid #000000;">
                                        	                                        <tr bgcolor="#ededed">
		                                                                            </tr>
                                                                                    <tr>  </tr>  
                                                                                     <tr>
	                                                                                     <td> <label for="name">Tipo de Plug da Fonte:</label> &nbsp &nbsp  	 </td>
                                                                                         <td> <select title="Selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="plug" name="plug"  >
																					             <option value="<?php echo $row['tbequip_fonte']; ?>" selected> <?php echo $row['tbequip_fonte']; ?> </option>     
                                                                                             <option value="" title="5 x 3 mm"> </option>     
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
																		                 </td>
                                                                                      <td> &nbsp &nbsp &nbsp  </td>    
                                                                                        
                                                                                     </tr>
                                                                                  </table>
                                                                                               
                                                                   </div>
                                                             </div>
     
                                                       </div>

                                                        <div id="menu2" class="tab-pane fade">    
       
                                                            <div class="infados">  </div> 

      
                                                            <div class="form-group row">
                                                                <br />
                                                                <div class="col-md-3"></div>       
                                                                        <div class="col-md-3">
                                                                             <center>    <label class="control-label">Nº Utilizadores do PC </label></center>
                                                                              <input class="form-control text-uppercase" id="utilizadores_num" name="utilizadores_num"  value="<?php echo $row['tbequip_util_num']; ?>"  />
                                                                        </div>
           
                                                                            <div class="col-md-3">
                                                                                <label class="control-label">Local de Cadastro do Dispositivo  </label></center> <br />
                                                                               <input  name="local_cad" id="local_cad" value="1" checked type="radio" >
                                                                                        &nbsp <label>Laboratorio</label>&nbsp &nbsp &nbsp &nbsp 
                                                                               <input  name="local_cad" id="local_cad" value="2" type="radio">
                                                                                        &nbsp   <label>Local</label>      &nbsp &nbsp 
              
                                                                            </div>
           
           
                                                                      <div class="col-md-2"></div>
                                                               </div>


                                                          <div class="form-group row">
                                                                    <div class="col-md-3"></div>       
                                                                    <div class="col-md-6">
                                                               <center>   <label  class="control-label">Nome dos Utilizadores</label> </center>
                                                                     <textarea id="utilizadores_nomes" name="utilizadores_nomes" rows="10" cols="65">
                                                                        <?php echo $row['tbequip_util_nomes']; ?>
                                                                        </textarea>
                                                                     </div>
                                                                <div class="col-md-2"></div>       
      
                                                          </div>



                                                            
                                        <div class="form-group row">
                                           <div class="col-md-3"></div>       
                                            <div class="col-md-2">
                                               <label class="control-label">Responsavel </label>
                                                       </div>
                                             <div class="col-md-4">
                                              <input class="form-control text-uppercase" id="resp" name="resp" value="<?php echo $row['tbequip_resp']; ?>"  /> 
                                             </div>
                                            <div class="col-md-2"></div>       
                                       </div>
      
       
                                      <div class="form-horizontal meuform">
                                       <div class="form-group row">
                                               <div class="col-md-3">     
                                              </div>
           
                                           <div class="col-md-6">
                                               <input class="form-control text-uppercase" placeholder="Observaçoes diversas" id="obs" name="obs" value="<?php echo $row['tbequi_obs']; ?>"  />    
                                           </div>
            
                                         </div>
                                           <div class="col-md-11">

                                             </div>
                                       </div>
                                              <div id="box1a"> </div>
                                              <div id="box2a">  </div>
                                              <div id="box3a"> </div>
                                              <div id="pessoais2">   </div>
                            </div>
                              <div id="menu3" class="tab-pane fade">
                                         <div class="infados">  </div> 

                                            <br />
                                                            <div class="form-group row">
                                                                   <div class="col-md-3"></div>       
                                                                        <div class="col-md-3">
                                                                             <center>    <label class="control-label">Nº de Dispositivos </label></center>
                                                                              <input class="form-control text-uppercase" id="utilizadores_num" name="utilizadores_num"   />
                                                                        </div>
           
                                                                     <div class="col-md-4">
                                                                                <label class="control-label">Local de Cadastro do Dispositivo  </label></center> <br />
                                                                           <?php
                                                                           // busca de locais  Cadastradas
                                                                           $sql = "SELECT * FROM tbcmei order by tbcmei_nome";
                                                                           $resl = mysqli_query($conn, $sql) or die('Erro ao selecionar especialidade: ' . mysql_error());
                                                                           $optionp = '';
                                                                           while ($row = mysqli_fetch_array($resl)) {
                                                                               //$optionp .= "<option value = '" . $row['p_id'] . "'>" . mb_strimwidth($row['p_desc'], 0, 81, "...") . "   </option>";
                                                                               $optionp .= "<option value = '" . $row['tbcmei_id'] . "' title='" . $row['tbcmei_id'] . "' >" . mb_strimwidth($row['tbcmei_nome'], 0, 81, "...") . "   </option>";
                                                                           }
                                                                           ?>
                                                                                  <select title="Selecione uma opção"  style="background-color:#FEFFFC" class="form-control selectClass show-tick show-menu-arrow" id="loc_id" name="loc_id" >     
                                                                                       <?php
                                                                                       echo "<option value='0'>  </option>";
                                                                                       echo $optionp;
                                                                                       ?>        
                                                                                   </select>     
                                                                             </div>
                                                                          <div class="col-md-2"></div>
                                                                     </div>

                                                            
                                        <div class="form-group row">
                                           <div class="col-md-3"></div>       
                                            <div class="col-md-2">
                                               <label class="control-label">Responsavel / Tecnico  </label>
                                                       </div>
                                             <div class="col-md-4">
                                              <input class="form-control text-uppercase" id="resp" name="resp"   /> 
                                             </div>
                                            <div class="col-md-2"></div>       
                                       </div>
       
                                                       <div class="form-group row">
                                                                   <div class="col-md-3"></div>       
                                                                        <div class="col-md-3">
                                                                             <center>  <input type="checkbox" name="equip1" value="1" />   <label class="control-label">* Equip 01  CTI </label></center>
                                                                              <input class="form-control text-uppercase" id="disp1" name="disp1"   />
                                                                        </div>
           
                                                                        <div class="col-md-3">
                                                                             <center>    <label class="control-label">Patrimonio </label></center>
                                                                              <input class="form-control text-uppercase" id="num1" name="num1"   />
                                                                        </div>
                        
                                                                      <div class="col-md-2"></div>
                                                         </div>
                                                         <div class="form-group row">
                                                                   <div class="col-md-3"></div>       
                                                                        <div class="col-md-3">
                                                                             <center>   <center>  <input type="checkbox" name="equip2" value="1" />   <label class="control-label">* Equip 02  CTI </label></center>
                                                                              <input class="form-control text-uppercase" id="disp2" name="disp2"   />
                                                                        </div>
           
                                                                        <div class="col-md-3">
                                                                             <center>    <label class="control-label">Patrimonio </label></center>
                                                                              <input class="form-control text-uppercase" id="num2" name="num2"   />
                                                                        </div>
             
           
                                                                      <div class="col-md-2"></div>
                                                               </div>


                                                            <div class="form-group row">
                                                                   <div class="col-md-3"></div>       
                                                                        <div class="col-md-3">
                                                                             <center>   <center>  <input type="checkbox" name="equip3" value="1" />   <label class="control-label">* Equip 03  CTI </label></center>
                                                                              <input class="form-control text-uppercase" id="disp3" name="disp3"   />
                                                                        </div>
           
                                                                        <div class="col-md-3">
                                                                             <center>    <label class="control-label">Patrimonio </label></center>
                                                                              <input class="form-control text-uppercase" id="num3" name="num3"   />
                                                                        </div>
             
           
                                                                      <div class="col-md-2"></div>
                                                         </div>
                                                         <div class="form-group row">
                                                                   <div class="col-md-3"></div>       
                                                                        <div class="col-md-3">
                                                                             <center>   <center>  <input type="checkbox" name="equip4" value="1" />   <label class="control-label">* Equip 04  CTI </label></center>
                                                                              <input class="form-control text-uppercase" id="disp4" name="disp4"   />
                                                                        </div>
           
                                                                        <div class="col-md-3">
                                                                             <center>    <label class="control-label">Patrimonio </label></center>
                                                                              <input class="form-control text-uppercase" id="num4" name="num4"   />
                                                                        </div>
             
           
                                                                      <div class="col-md-2"></div>
                                                               </div>

                                      <div class="form-horizontal meuform">
                                       <div class="form-group row">
                                  
                                         </div>
                                           <div class="col-md-11">
                                             <center>  <button class="botao submit" type="submit" name="submit">Aplicar</button></center> 
                                              <br><br>
                                               <a href="busca_diversos.php?id=0" title="SELECIONAR ">Consulta de Equipamento  </a>  <br /><br />
                                                    <br><br>
                                              <a href="newsfeed.php" title="SELECIONAR ">Pagina Inicial  </a>  <br /><br />
                                      
                                           
                                           </div>
                                       </div>
                                           
                            </div>
                          </div>
                         </div>
                       </div>
                     </div>
                                               
                                

                       </form>                    
                     </body>
                  </html>                            
                    <?PHP
        } while ($row = mysqli_fetch_assoc($result)); // fim do while
    }
        ?>        
   
       <?php


}

?>
