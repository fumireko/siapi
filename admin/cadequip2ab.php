<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";

//$ret_cmei_id = $_GET['id'];
//$tipo = $_POST['tipo'];
//$local = $_POST['nome'];
$local_id = $_POST['loc_id'];
$sec_id = $_POST['sec_id'];
$kit_id = $_POST['kit'];
$ret_tipo = $_POST['tipo_id'];
$ret_plaq = $_POST['plaq_id'];
$ret_cmei_id = $local_id;
//echo $ret_cmei_id."  ".$
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>Cadastro</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
 
 <script src="js/checkbox.js"> </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
    .gg {
        width: 100px;
    }
    .ggg {
        width: 200px;
    }
    
    .btn{
                margin-top: 100px;
            }
            .wrapper {
              display: grid;
               grid-template-columns: 200px 200px 200px;
              }

            input[type=text] {
                width: 100%;
                padding: 12px 10px;
                margin: 8px 0;
                box-sizing: border-box;
                /*border: 1px solid #555;*/
                outline: none;
            }

            input[type=text]:focus {
                background-color: lightblue;
                color:black;
            }

            label input{
              float: left;
            }

            div.divEsq {
                width: 49%;  
                display: inline-block;    

            }

            div.divDir {
              width: 50%;
              display: inline-block;  
            }

</style>

<body>
<?php
include 'index.php';
                                // busca e visualizacao do local //
                                 $sql1 = "SELECT * FROM tbcmei where tbcmei_id ='" . $ret_cmei_id . "' ";
                                 $resultado1 = mysqli_query($conn, $sql1) or die('Erro ao selecionar especialidade: ' . mysqli_error());
                                 $qtd = mysqli_num_rows($resultado1);  // $option = '';
                                 if ($qtd == 0)
                                     $nome_local = "Nenhum local encontrado";
                                 else {
                                     do {
                                         $row = mysqli_fetch_assoc($resultado1);
                                         $nome_local = $row['tbcmei_nome'];
                                         $ret_sec_id = $row['tbcmei_sec_id'];
                                         $unidade = $nome_local;
                                         "<input  type='hidden'  id='nome_loc'  name='nome_loc' type='text' value='" . $nome_local . "' size = '60' >";
                                         "<input  type='hidden'  id='id_loc'  name='id_loc' type='text' value='" . $ret_cmei_id . "' size = '60' >";
                                         "<input  type='hidden'  id='id_sec'  name='id_sec' type='text' value='" . $ret_sec_id . "' size = '60' >";
                                     } while ($row = mysqli_fetch_assoc($resultado1));
                                 }

                                    // busca e visualizacao da Secretaria //
                                    $sql = "SELECT * FROM tbsecretaria where sec_id ='" . $ret_sec_id . "'";
                                    $resultado = mysqli_query($conn, $sql) or die('Erro ao selecionar especialidade: ' . mysql_error());
                                    $option = '';
                                    while ($row = mysqli_fetch_array($resultado)) {
                                        $option .= "<option value = '" . $row['sec_id'] . "'>" . $row['sec_nome'] . "   </option>";
                                    }
                                    ?> 
                                         <!--     <select name="sec_id" required>    -->
<form method="post" enctype="multipart/form-data" action="salvaequip2.php">    
<input type="hidden" name="origem" size=50 value= "cadastro">
<input type="hidden" name="rec_user" size=50 value= "<?php echo $_SESSION['usuario'];?>">
<input type="hidden" name="loc_id" size=50 value= "<?php echo $ret_cmei_id ?>">
<input type="hidden" name="sec_id" size=50 value= "<?php echo $ret_sec_id ?>">

</BR> </BR> </BR> 
<center>  
      <h2> <?php echo $option; ?></h2> 
    <h3> <?php echo $unidade; ?></h3>     <br /></center>
<div class="container">
   
      <?php
                               $sql_proc = "SELECT * FROM tb_kits where id='" . $kit_id . "'";
                               $res_proc = mysqli_query($conn, $sql_proc) or die('Erro ao selecionar especialidade: ' . mysql_error());
                               $option2 = '';
                               while ($row = mysqli_fetch_array($res_proc)) {
                                   $ret_placa = $row['placa'];
                                   $ret_processador = $row['processador'];
                                   $ret_mem_tipo = $row['mem_tipo'];
                                   $ret_mem_qtd = $row['mem_tam'];
                                   $ret_slots = $row['slots'];
                                   $ret_arm_tipo = $row['arm_tipo'];
                                   $ret_arm_tam = $row['arm_qtd'];
                                   $ret_descritivo = $row['descritivo'];
								 $ret_monitor = $row['monitor'];
								  $ret_videos = $row['vid_saidas'];

                               }
                               ?>
                            
   
   
<h2>Cadastro de Equipamento ( PCs e Afins)  </h2>   <label  class="control-label">    </label> 
 
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">Dados Equipamentos</a></li>
        <li><a data-toggle="tab" href="#menu1">Componentes</a></li>
        <li><a data-toggle="tab" href="#menu2">Utilizadores</a></li>
        </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
 <label for="coord">  <?php echo $ret_descritivo; ?></label>    <br />  
       
                            <div class="container-fluid">
                                <div class="form-horizontal meuform">
                                    <div class="form-group row">
                                       <div class="col-md-2">     
                                            <label class="control-label">Patrimonio Nº</label>
                                            <input class="form-control text-uppercase" id="plaqueta" name="plaqueta"   value = "<?php echo $ret_plaq; ?>" required/> 
                                        </div>
                                             <div class="col-md-2">     
                                            <label class="control-label">Lacre T.I</label>
                                            <input class="form-control text-uppercase" id="lacre" name="lacre"   required/>
                                        </div>
               

                                        <div class="col-md-2">
                                            <label class="control-label" title = 'Nome do Equipamento' ><a href=pre_consulta_prop.php>Nome Equipamento </a></label>
                                            <input class="form-control text-uppercase"  id="nome_equip" name="nome_equip"    required/>
                                       </div>
                                       <div class="col-md-2">     
                                            <label class="control-label">Tipo equip.</label>
                                           <select title="Selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="tipo_equip" name="tipo_equip"  >
                                                <option value=""></option>
                                                <option value="Desktop"selected>Desktop</option>
                                                <option value="Notebook">Notebook</option>
                                                <option value="Tablet">Tablet</option>
                                                <option value="Servidor">Servidor</option>
                                                <option value="Outros">Outros</option>
                                     </select>
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
                                                <option value="IOS">IOS</option>
                                             </select>
                                            </div>
                                         
                                         
                                    
                                    </div>
                                    


                                    </div>
                                     <div class="form-group row">
                                        <div class="col-md-5">
                                            <label class="control-label">Modelo Placa</label>  <a href="caddiversos.php?loc=Liberado&tipo=7" title="Adicionar nova Placa Mãe ">+</a>
                                            <input name="placa"  style="background-color:seashell;" type="text" id="placa" size="86" value=" <?php echo $ret_placa; ?>"  />      
										</div>
                                     
									
                                        <div class="col-md-6">                                
											<label> Processador :     </label> <a href="caddiversos.php?loc=Liberado&tipo=7" title="Adicionar nova Processador ">+</a>
											<input name="processador" style="background-color:seashell;"  type="text" id="processador" size="87" value=" <?php echo $ret_processador; ?>"  />                
                                        </div>  
                                    
									</div>

                                     <div class="form-group row">
               
                                        <div class="col-md-3">
                                            <label  class="control-label">Armaz. Tipo</label>
                                    
										  <select title="Selecione uma opção"  style="background-color:#FEFFFC" class="form-control selectClass show-tick show-menu-arrow" id="arm_tipo" name="arm_tipo" >
                                                <option value="<?php echo $ret_arm_tipo; ?>" selected> <?php echo $ret_arm_tipo; ?> </option>
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
                                            <select title="Selecione uma opção"  style="background-color: White" class="form-control selectClass show-tick show-menu-arrow" id="arm_tam" name="arm_tam" >
                                               <option value="<?php echo $ret_arm_tam; ?>" selected> <?php echo $ret_arm_tam; ?> </option>
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
                                            <select title="Selecione uma opção"   class="form-control selectClass show-tick show-menu-arrow" id="mem_tipo" name="mem_tipo" >
                                                 <option value="<?php echo $ret_mem_tipo; ?>" selected> <?php echo $ret_mem_tipo; ?> </option>
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
                                            <select title="Selecione uma opção"   class="form-control selectClass show-tick show-menu-arrow" id="mem_qtd" name="mem_qtd" >
                                             <option value="<?php echo $ret_mem_qtd; ?>" selected> <?php echo $ret_mem_qtd; ?> </option>
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
                                            <select title="Selecione uma opção"   class="form-control selectClass show-tick show-menu-arrow" id="slots" name="slots" >
											<option value="<?php echo $ret_slots; ?>" selected> <?php echo $ret_slots; ?> </option>                                           
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
                                         <div class="col-md-3">
                                            <label class="control-label">Aplicativos</label><br />
                                             <input  name="office" id="office" value="Office" type="checkbox" >
                                           &nbsp <label>Office</label>&nbsp &nbsp &nbsp &nbsp 
                                          <input  name="cad" id="cad" value="ZW_cad" type="checkbox">
                                            &nbsp   <label>ZWCad</label>      &nbsp &nbsp 
                                    
                                        </div>        
                                        <div class="col-md-8">
                                        <label>Outro (s) :</label>
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
														<option value="<?php echo $ret_monitor; ?>" selected> <?php echo $ret_monitor; ?> </option>                                                       
													   <option value="NENHUM">Nenhum</option>
                                                        <option value="UNICO">Unico</option>                
                                                        <option value="DUPLO">Duplo</option>        
                                                        <option value="TRIPLO">Triplo</option>
                                                        <option value="OUTROS">OUTROS</option>
                                                       </select> 
                                          </div>
                                  </div>
                              </div>
                            </div>
    <div id="menu1" class="tab-pane fade">
                         <center> <h3>Componentes Diversos</h3> </center>
                   <div class ="divEsq">    	       
                      <h3>Saidas de Video em Uso (<?php echo $ret_videos; ?>)  </h3>                    
                                      <table style="width:85%; border:1px solid #000000;">
	                                        <tr bgcolor="#ededed">
		                                     </tr>
                                                <tr>
	                                             <td> <label>   </label></td>
                                                    <td><input type="checkbox" name="vga" value="1" />
                                                    <label style="padding:0px 0px 0px 0px" >VGA  </label>  </td>                
                                                       <td  >   <select title="Selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="vga_util" name="vga_util"  >
                                                                <option value="Sem Uso" default>Sem Uso</option>
                                                                <option value="Em Uso">Em Uso</option>                
                                                         </select> 
                                                      </td>
                                                </tr>
                                               <tr>
		                                          <td><label>Monitor: </label> </td>
		                                          <td> <label>Pol.:</label> </td>
                                                  <td> <label>Patrimonio:</label> </td>
                                                  <td> <label>Tipo:</label> </td>
                                               </tr>
	                                           <tr>
		                                        <td><input name="monv_mar" class="form-control selectClass show-tick show-menu-arrow"  type="text" id="monv_mar" value="" size="10"/> </td>
                                                <td><input name="monv_pol" class="form-control selectClass show-tick show-menu-arrow" type="text" id="monv_pol" value="" size="3" /> </td>
                                                <td><input name="monv_pat" class="form-control selectClass show-tick show-menu-arrow"  type="text" id="monv_pat" value="" size="5"/> </td>
                                                 <td  >   <select title="Selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="monv_cat" name="monv_cat"  >
                                                              <option value="Vazio" default></option>
                                                                <option value="Widescreen">Widescreen</option>     
                                                                <option value="UltraWide">UltraWide</option>                
                                                                <option value="CRT">CRT</option>                    
                                                     </select> 
                                                      </td>
		                                       </tr>
	                                     </table>  
                         <table style="width:85%; border:1px solid #000000;">
	                                        <tr bgcolor="#ededed">
		                                     </tr>
                                                <tr>
	                                              <td> <label>   </label></td>
                                                    <td><input type="checkbox" name="hdmi" value="1" />
                                                    <label style="padding:0px 0px 0px 0px" >HDMI  </label>  </td>                
                                                 <td  >  <select title="Selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="hdmi_util" name="hdmi_util"  >
                                                                <option value="Sem Uso" default>Sem Uso</option>
                                                                <option value="Em Uso">Em Uso</option>                
                                                         </select> 
                                            </td>
                                                </tr>
                                               <tr>
		                                          <td><label>Monitor : </label> </td>
		                                          <td> <label>Tam. Pol.:</label> </td>
                                                  <td> <label>Patrimonio:</label> </td>
                                                    <td> <label>Tipo:</label> </td>
                                               </tr>
	                                           <tr>
		                                        <td><input name="monh_mar" class="form-control selectClass show-tick show-menu-arrow" type="text" id="monh_mar" value="" size="10"/> </td>
                                                <td><input name="monh_pol"class="form-control selectClass show-tick show-menu-arrow"  type="text" id="monh_pol" value="" size="5" /> </td>
                                                <td><input name="monh_pat" class="form-control selectClass show-tick show-menu-arrow" type="text" id="monh_pat" value="" size="10"/> </td>
		                                        <td  >   <select title="Selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="monh_cat" name="monh_cat"  >
                                                              <option value="Vazio" default></option>
                                                                <option value="Widescreen">Widescreen</option>     
                                                                <option value="UltraWide">UltraWide</option>                
                                                                <option value="CRT">CRT</option>                    
                                                     </select> 
                                                      </td>
                                               </tr>
	                                   
	                                  </table>  
                     
                                      <table style="width:85%; border:1px solid #000000;">
	                                        <tr bgcolor="#ededed">
		                                     </tr>
                                                <tr>
	                                            <td> <label>   </label></td>
                                                    <td><input type="checkbox" name="dvi" value="1" />
                                                    <label style="padding:0px 0px 0px 0px" >DVI  </label>  </td>                
                                                 <td  > <select title="Selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="dvi_util" name="dvi_util"  >
                                                                <option value="Sem Uso" default>Sem Uso</option>
                                                                <option value="Em Uso">Em Uso</option>                
                                                         </select> 
                                            </td>
                                                </tr>
                                               <tr>
		                                          <td><label>Monitor : </label> </td>
		                                          <td> <label>Tam. Pol.:</label> </td>
                                                  <td> <label>Patrimonio:</label> </td>
                                                    <td> <label>Tipo:</label> </td>
                                               </tr>
	                                           <tr>
		                                        <td><input name="mond_mar"class="form-control selectClass show-tick show-menu-arrow"  type="text" id="mond_mar" value="" size="10"/> </td>
                                                <td><input name="mond_pol"class="form-control selectClass show-tick show-menu-arrow"  type="text" id="mond_pol" value="" size="5" /> </td>
                                                <td><input name="mond_pat" class="form-control selectClass show-tick show-menu-arrow" type="text" id="mond_pat" value="" size="10"/> </td>
		                                       <td  >   <select title="Selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="mond_cat" name="mond_cat"  >
                                                              <option value="Vazio" default></option>
                                                                <option value="Widescreen">Widescreen</option>     
                                                                <option value="UltraWide">UltraWide</option>                
                                                                <option value="CRT">CRT</option>                    
                                                     </select> 
                                                      </td>
                                               </tr>
	                                   
	                                  </table>  
                           <table style="width:85%; border:1px solid #000000;">
	                                        <tr bgcolor="#ededed">
		                                     </tr>
                                                <tr>
	                                             <td> <label>    </label></td>
                                                    <td><input type="checkbox" name="display" value="1" />
                                                    <label style="padding:0px 0px 0px 0px" >Display Port </label>  </td>                
                                                 <td  > <select title="Selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="display_util" name="display_util"  >
                                                                <option value="Sem Uso" default>Sem Uso</option>
                                                                <option value="Em Uso">Em Uso</option>                
                                                         </select> 
                                            </td>
                                                </tr>
                                               <tr>
		                                          <td><label>Monitor : </label> </td>
		                                          <td> <label>Tam. Pol.:</label> </td>
                                                  <td> <label>Patrimonio:</label> </td>
                                                    <td> <label>Tipo:</label> </td>
                                               </tr>
	                                           <tr>
		                                        <td><input name="monp_mar" class="form-control selectClass show-tick show-menu-arrow" type="text" id="monp_mar" value="" size="10"/> </td>
                                                <td><input name="monp_tam" class="form-control selectClass show-tick show-menu-arrow" type="text" id="monp_tam" value="" size="5" /> </td>
                                                <td><input name="monp_pat"class="form-control selectClass show-tick show-menu-arrow"  type="text" id="monp_pat" value="" size="10"/> </td>
		                                       <td  >   <select title="Selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="monp_cat" name="monp_cat"  >
                                                              <option value="Vazio" default></option>
                                                                <option value="Widescreen">Widescreen</option>     
                                                                <option value="UltraWide">UltraWide</option>                
                                                                <option value="CRT">CRT</option>                    
                                                     </select> 
                                                      </td>
                                             
                                               </tr>
	                                  </table>  
                                         <table style="width:85%; border:1px solid #000000;">
	                                        <tr bgcolor="#ededed">
		                                     </tr>
                                               <tr>
	                                             <td> <label>Obs. Videos    </label></td>
                                         </tr>
                                              <tr>
                                             <td><input type="text" name="obsvid" id="obsvid" size="20" value="1" />  </td>
                                                  </tr>
                                          </table>
                   </div>
 
                   <div class="divDir">
                         <h3>Fonte Instalada   </h3>                    
                            <table>
                                <td>  </td>
                                <td>  </td>
                           </table>              

                       <table style="width:75%; border:1px solid #000000;">
	                                        <tr bgcolor="#ededed">
		                                     </tr>
                                             <tr>
                                                 <td> <label>   </label></td>
                                                    <td> <label>   </label></td>
                                                    <td> <label>   </label></td>
                                             </tr>      
                                              <tr>
	                                             <td> <label>   </label></td>
                                                  <td> <label style="padding:0px 0px 0px 0px" >Modelo  </label>  </td>                
                                                 <td  >  <select title="Selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="fonte_tipo" name="fonte_tipo"  >
                                                                <option value="VAZIO"></option>          
                                                                <option value="ATX" >ATX</option>
                                                                <option value="EATX">EATX</option>                
                                                                <option value="MICRO ATX">MICRO ATX</option>                
                                                                <option value="MINI ITX">MINI ITX</option>                
                                                                <option value="SLIM TFX">SLIM TFX</option>                
                                                         </select> 
                                                </td>
                                                </tr>
                                                <tr>
                                                    <td> <label>   </label></td>
                                                    <td> <label>   </label></td>
                                                    <td> <label>   </label></td>
                                                </tr>
                                               <tr>
	                                             <td> <label>   </label></td>
                                                  <td> <label style="padding:0px 0px 0px 0px" >Potencia  </label>  </td>                
                                                 <td  >  <select title="Selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="fonte_pot" name="fonte_pot"  >
                                                                <option value="VAZIO"></option>           
                                                                <option value="200W">200W</option>
                                                                <option value="250W">250W</option>                
                                                                <option value="350W">350W</option>                
                                                                <option value="500W">500W</option>                
                                                                <option value="750W">750W</option>                
                                                         </select> 
                                                </td>
                                                </tr>
                                                   <tr> <td> <label>   </label></td>
                                                    <td> <label>   </label></td>
                                                    <td> <label>   </label></td>              
                                                    </tr>
	                                     </table>  
                      
                    </div>
     
   </div>

    <div id="menu2" class="tab-pane fade">
       
        <div class="infados">  </div> 

      
       <div class="form-group row">
           <div class="col-md-3"></div>       
            <div class="col-md-6">
                <center>    <label class="control-label">Nº Utilizadores do PC </label></center>
                    <input class="form-control text-uppercase" id="utilizadores_num" name="utilizadores_num"   />
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
            <div class="col-md-6">
              <center> <label class="control-label">Responsavel pelo Departamento </label></center>
                    <input class="form-control text-uppercase" id="resp" name="resp"   />
             </div>
            <div class="col-md-2"></div>
       </div>

     <div class="form-horizontal meuform">
       <div class="form-group row">
               <div class="col-md-11">     
              <center> <label class="control-label">Obs:</label></center>
                   <input class="form-control text-uppercase"  id="obs" name="obs"  />
               </div>
           
            
         </div>
           <div class="col-md-11">
             <center>  <button class="botao submit" type="submit" name="submit">Cadastrar</button></center> 
             </div>
       </div>
     

       
         <div id="box1a"> </div>
         <div id="box2a">
         
         
         
         
          </div>
         <div id="box3a"> </div>
         
          <div id="pessoais2">   </div>
      </div>
</div>
 </div>
      </div>
</div>
 </div>


  </form>                    

</body>
</html>


