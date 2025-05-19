<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";
include "bco_fun.php";
$ret_id = $_GET['id']; 
   
   ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
    <title>Cadastro de Equipamentos</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Adicionando JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>
    <!-- Adicionando Javascript -->
    <script>
        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#ibge").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");
                        $("#ibge").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });

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
                            
                                 <?php 
                                            $sql1 = "SELECT * FROM tb_diversos where id ='".$ret_id."' ";
                                            $resultado1 = mysqli_query($conn,$sql1) or die('Erro ao selecionar especialidade: ' .mysqli_error());
                                            $qtd = mysqli_num_rows($resultado1);  // $option = '';
                                 if ($qtd == 0) 
                                 {
                                     $nome_local = "Nenhum local encontrado";
                                     $ret = "VAZIO";
                                     ?>
                                                         
                                
                                <form method="post" action="edita.php">
                                  <input type="hidden" name="loc_id" size=50 value= "<?php echo $nome_local ?>">
                                  <input type="hidden" name="sec_id" size=50 value= "">
                                    
                                    <section class="box ">
                                 <header class="panel_header">
                                <h2 class="title pull-left"> <?php echo $nome_local; ?></h2>                                
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                                      </div>
                                           <div>  
                                               <?php echo "Controle T.I. ".$ret; ?> 
											   </br> 
                                                 <label for="coord">Patrimonio :</label>    
                                                &nbsp &nbsp
                                                <input id="plaqueta" name="plaqueta"  style="background-color:seashell;" type="text" placeholder="Numero da Plaqueta " readonly size = "15" value=" <?php echo $ret; ?> ">
                                                &nbsp &nbsp <label for="coord">Nome do Equipamento : </label>    
                                                &nbsp &nbsp
                                                <input id="nome_equip" name="nome_equip" style="background-color:seashell;" type="text" placeholder="Nome do Computador " readonly size = "20" value=" <?php echo $ret; ?>">
                                                 &nbsp &nbsp <label >Lacre TI : </label>    
                                                 
                                                 <input name="so_arq"  style="background-color:seashell;" type="text" id="so_arq" size="9" value=" <?php echo $ret; ?>"  />      
                                               
                                       </div>  
                                <div>
                                  <label >Tipo equip: </label>    
                                     &nbsp &nbsp
                                    <input name="tipo_equip"  style="background-color:seashell;" type="text" id="tipo_equip" size="25" value=" <?php echo $ret; ?>"  />      
                                        &nbsp &nbsp 
                                  <label >Sist. Operacional (SO) : </label>    
                                        &nbsp &nbsp
                                      <input name="so_tipo"  style="background-color:seashell;" type="text" id="so_tipo" size="35" value=" <?php echo $ret; ?>"  />      
                                        &nbsp &nbsp
                                 
                                </div>  
                             <div>
                                  <label> Modelo Placa :     </label>
                                  
                                   <input name="placa"  style="background-color:seashell;" type="text" id="placa" size="86" value=" <?php echo $ret; ?>"  />      
                                      
                                  
                                </div>

                                <div>
                                  <label> Processador :     </label>
                                    <input name="processador" style="background-color:seashell;"  type="text" id="processador" size="87" value=" <?php echo $ret; ?>"  />                
                                    
                                </div>  
                              
                                <div>
                                   <label>Armaz. Tipo: </label>                         
                                     <input name="arm_tipo" style="background-color:seashell;"  type="text" id="arm_tip" size="10" value=" <?php echo $ret; ?>"  />                  
                                    
                               
                                    <label>Tamanho: </label>                         
                                    <input name="arm_tam"  style="background-color:seashell;" type="text" id="arm_tam" size="5" value=" <?php echo $ret; ?>" />
                                      &nbsp &nbsp  &nbsp &nbsp
                                    <label>Armaz  Secundario:
                                     <input name="arm-sec" style="background-color:seashell;"  type="text" id="arm_sec" size="10" value=" <?php echo $ret; ?>"  />                
                               
                                    &nbsp<label>Tamanho: </label>
                                    <input name="arm_sec_tam" style="background-color:seashell;" type="text" id="arm_sec_tam" size="5" value=" <?php echo $ret; ?>" />
                                 </div>
                                
                                     <div>
                                    <label>Memoria Tipo: <label>
                                    <input name="mem_tipo" style="background-color:seashell;"  type="text" id="mem_tipo" size="10" value=" <?php echo $ret; ?>"  />                
                               
                                    <label>Mem.Qtd: 
                                    <input name="mem_qtd"  style="background-color:seashell;" type="text" id="mem_qtd" size="10" value=" <?php echo $ret; ?>" /></label>
                                    
                                   &nbsp &nbsp  <label>Slots de Memoria:
                                    <input name="slots" style="background-color:seashell;" type="text" id="slots" value=" <?php echo $ret; ?>" size="5"  required /></label>
                                      <label>Slots em Uso 
                                    <input name="slots_uso" style="background-color:seashell;" type="text" id="slots_uso" value=" <?php echo $ret; ?>" size="2"  required /></label>
                                       
                                </div>  
                                        <div>
                                     <label>Tipo Monitor :
                                     <input name="mon_tipo"  type="text" id="mon_tipo" size="8" value=" <?php echo $ret; ?>"  />               
                                       <label  >Saidas de Video  : &nbsp 
                                          <input name="slots_uso" type="text" id="slots_uso" value="<?php echo $ret ?>" size="25"  required /></label>  
                                          <label>Fonte  :
                                          <input name="mon1_mar" type="text" id="mon1_mar" value="<?php echo $ret; ?>" size="20"  required /></label> <br /> 
                                                 
                                     <label style=" color: #B4886b; font-weight: bold; " >Saidas Utilizadas: &nbsp   <?php echo $ret; ?> </label>
                                  </div>  
                               
                                                               <div>  
                                                   <label>Marca Monitor  :
                                                   <input name="mon1_mar" type="text" id="mon1_mar" value="VAZIO" size="10"  required /></label>
                                                    <label>Tam. Pol.: 
                                                   <input name="mon1_tam" type="text" id="mon1_tam" value="VAZIO"" size="10"  required /></label>
                                                   <label>Patrimonio :
                                                   <input name="mon1_pat" type="text" id="mon1_pat" value="VAZIO" size="10"  required /></label>
                                                <label>Tipo :
                                                   <input name="mon1_tipo" type="text" id="mon1_tipo" value="VAZIO" size="10"  required /></label> 
                                                </div>

                             
                                        <div>
                                           <label>Utilizadores : (<?php echo $ret; ?>) </label> &nbsp
                                           <input name="mon1_mar" type="text" id="mon1_mar" value="<?php echo $ret; ?>" size="78"   />
                                        </div> 
                                     <div>
                                         <label>Aplicativos  :</label>  &nbsp &nbsp
                                         <input name="app_outros" type="text" id="app_outros" value=" <?php echo $ret; ?>" size="80"  /></label>
                                    
                                    </div>  
                                <div>
                                <label>Obs:  &nbsp 
                                   <input name="obs" type="text" id="obs" size="83" value=" <?php echo $ret; ?>" /></label>
                                                               
                                </div>
                                <br>
                            <div>
                            <a href="editaequip.php?tbequip_id= <?php echo $ret_id; ?>" title="Alterar Local do Equipamento">Alterar Local do Equipamento</a><br /><br />
                            <a href="editaequip2.php?tbequip_id= <?php echo $ret_id; ?>" title="Alterar Dados do Equipamento">Alterar Dados do Equipamento</a><br /><br />
						    <a href="corretor_manual2.php?tbequip_id= <?php echo $ret_id; ?>" title="Alterar Dados do Equipamento">Consultar Infs do Equipamento</a><br /><br />
                                </div>
                            </form>
                            </div>
                            </section></div>
                            </section>
                            </section>
                                             
        
                            </body>

                            </html>
<?php
                     }else
                                            {
                                                do{
                                                   $row = mysqli_fetch_assoc($resultado1);
                                                   $ret_idlocal = $row['id'];
                                                   $ret_cod_desc = $row['descricao_cod'];
                                                   $ret_plaqueta = $row['patrimonio'];
                                                   $ret_nome = $row['descricao'];
                                                   $ret_equi_tipo = $row['descricao'];
                                                   $ret_datalanc = $row['dt_cad'];
                                                   $ret_tec = $row['usuario'];
                                                   $ret_cmei_id = $row['local_cod'];
                                                   $ret_obs = $row['obs'];
                                                   $ret_ref = $row['ref'];
                                                    $ret_marca = $row['marca'];
                                                    $ret_tam = $row['tam'];
                                                    $ret_posicao = $row['posicao'];
                                                    $ret_comps = $row['comps'];
                                                    $ret_tipo = $row['tipo'];
                                                    $ret_portas = $row['portas'];
													$ret_por_total = $row['por_total'];
													$ret_por_util = $row['por_util'];
													$ret_por_disp = $row['por_disp'];
													$ret_rede = $row['rede'];
													$ret_ip = $row['ip'];
													$ret_gerenciavel = $row['gerenciavel'];
													$ret_sec_cod = $row['sec_cod'];
                                                    $ret_ctrl_ti = $row['ctrl_ti'];
                                                    $ret_resp = $row['resp'];
													$unidade = nomedolocal($conn,$ret_cmei_id);
                                                    $secretaria = nomedesecretaria($conn,$ret_sec_cod);
                                                   } while($row = mysqli_fetch_assoc($resultado1));
                                            //    }
                                                
																					 
												
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
																				<input id="plaqueta" name="plaqueta"  style="background-color:seashell;" type="text" placeholder="Numero da Plaqueta " readonly size = "15" value=" <?php echo $ret_plaqueta; ?>">
																				&nbsp <label for="coord">Nome do Equipamento : </label>    
																				&nbsp &nbsp
																				<input id="nome_equip" name="nome_equip" style="background-color:seashell;" type="text" placeholder="Nome do Computador " readonly size = "15" value=" <?php echo $ret_nome; ?>">
																				 &nbsp &nbsp <label >Rede : </label>    
																			 <input name="so_arq"  style="background-color:seashell;" type="text" id="so_arq" size="9" value=" <?php echo $ret_rede; ?>" readonly />      
																	   </div>  
																<br><div>
																  <label >Portas : </label>    
																		&nbsp &nbsp
																	  <input name="so_tipo"  style="background-color:seashell;" type="text" id="so_tipo" size="5" value=" <?php echo $ret_portas; ?>" readonly />      
																	&nbsp	&nbsp &nbsp
																  <label >Portas Totais : </label>    
																		&nbsp &nbsp
																	  <input name="so_tipo"  style="background-color:seashell;" type="text" id="so_tipo" size="5" value=" <?php echo $ret_por_total; ?>" readonly />      
																	&nbsp	&nbsp &nbsp
																  <label >Portas Uso : </label>    
																		&nbsp &nbsp
																	  <input name="so_tipo"  style="background-color:seashell;" type="text" id="so_tipo" size="5" value=" <?php echo $ret_por_util; ?>" readonly />      
																		&nbsp &nbsp
																  <label >Portas Livres : </label>    
																		&nbsp &nbsp &nbsp
																	  <input name="so_tipo"  style="background-color:seashell;" type="text" id="so_tipo" size="5" value=" <?php echo $ret_por_disp; ?>" readonly />      
																		&nbsp &nbsp
																 </div>  
															<br><div>
																  <label> Local :     </label>
																 	 &nbsp   <input name="placa"  style="background-color:seashell;" type="text" id="placa" size="83" value=" <?php echo $unidade; ?>" readonly />      
																</div>
															<br>	<div>
																  <label> Secretaria :     </label>
																&nbsp 	<input name="processador" style="background-color:seashell;"  type="text" id="processador" size="78" value=" <?php echo $secretaria; ?>" readonly />                
																</div>  
																<br><div>
																  <label> Obs :     </label>
																   <input name="placa"  style="background-color:seashell;" type="text" id="placa" size="86" value=" <?php echo " Id : ".$ret_id."  -  ".$ret_obs; ?>" readonly />      
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
																				<input id="plaqueta" name="plaqueta"  style="background-color:seashell;" type="text" placeholder="Numero da Plaqueta " readonly size = "15" value=" <?php echo $ret_plaqueta; ?>">
																				&nbsp <label for="coord">Nome do Equipamento : </label>    
																				&nbsp &nbsp
																				<input id="nome_equip" name="nome_equip" style="background-color:seashell;" type="text" placeholder="Nome do Computador " readonly size = "15" value=" <?php echo $ret_nome; ?>">
																				 &nbsp &nbsp <label >Rede : </label>    
																			 <input name="so_arq"  style="background-color:seashell;" type="text" id="so_arq" size="9" value=" <?php echo $ret_rede; ?>" readonly />      
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
																	  <input name="so_tipo"  style="background-color:seashell;" type="text" id="so_tipo" size="10" value=" <?php echo $ret_posicao; ?>" readonly />      
																	&nbsp 
																  <label >Componentes : </label>    
																		&nbsp 
																	  <input name="so_tipo"  style="background-color:seashell;" type="text" id="so_tipo" size="53" value=" <?php echo $ret_comps; ?>" readonly />      
																	&nbsp	&nbsp &nbsp
																 </div>  
																 
															<br><div>
																  <label> Local :     </label>
																 	 &nbsp   <input name="placa"  style="background-color:seashell;" type="text" id="placa" size="83" value=" <?php echo $unidade; ?>" readonly />      
																</div>
															<br>	<div>
																  <label> Secretaria :     </label>
																&nbsp 	<input name="processador" style="background-color:seashell;"  type="text" id="processador" size="78" value=" <?php echo $secretaria; ?>" readonly />                
																</div>  
																<br><div>
																  <label> Obs :     </label>
																   <input name="placa"  style="background-color:seashell;" type="text" id="placa" size="86" value=" <?php echo " Id : ".$ret_id."  -  ".$ret_obs; ?>" readonly />      
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
																<form method="post" action="smudaequipd.php">
																  <input type="hidden" name="loc_id" size=50 value= "<?php echo $ret_cmei_id ?>">
																 <input type="hidden" name="codequip" size=50 value= "<?php echo $ret_id ?>">
																<input type="hidden" name="ctrl_ti" size=50 value= "<?php echo $ret_ctrl_ti ?>">


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
																				<input id="plaqueta" name="plaqueta"  style="background-color:seashell;" type="text" placeholder="Numero da Plaqueta " readonly size = "15" value=" <?php echo $ret_plaqueta; ?>">
																				&nbsp <label for="coord">Nome do Equipamento : </label>    
																				&nbsp
																				<input id="nome_equip" name="nome_equip" style="background-color:seashell;" type="text" placeholder="Nome do Computador " readonly size = "15" value=" <?php echo $ret_nome; ?>">
																				 &nbsp &nbsp <label >IP : </label>    
																			 <input name="so_arq"  style="background-color:seashell;" type="text" id="so_arq" size="12" value=" <?php echo $ret_ip; ?>" readonly />      
																	   </div>  
																<br><div>
																  <label >Gerenciavel : </label>    
																		&nbsp &nbsp
																	  <input name="so_tipo"  style="background-color:seashell;" type="text" id="so_tipo" size="5" value=" <?php echo $ret_gerenciavel; ?>" readonly />      
																	&nbsp	&nbsp &nbsp
																  <label >Portas Totais : </label>    
																		&nbsp
																	  <input name="so_tipo"  style="background-color:seashell;" type="text" id="so_tipo" size="5" value=" <?php echo $ret_por_total; ?>" readonly />      
																	&nbsp	&nbsp &nbsp
																  <label >Portas Uso : </label>    
																		&nbsp
																	  <input name="so_tipo"  style="background-color:seashell;" type="text" id="so_tipo" size="5" value=" <?php echo $ret_por_util; ?>" readonly />      
																		&nbsp &nbsp
																  <label >Portas Livres : </label> &nbsp   
																		 <input name="so_tipo"  style="background-color:seashell;" type="text" id="so_tipo" size="5" value=" <?php echo $ret_por_disp; ?>" readonly />      
																		&nbsp &nbsp
																 </div>  
															<br><div>
																  <label> Obs :     </label>
																   <input name="placa"  style="background-color:seashell;" type="text" id="placa" size="86" value=" <?php echo " Id : " . $ret_id . "  -  " . $ret_obs; ?>" readonly />      
																</div>
																	 
																	 
																	 <br><div>
																  <label> Local :     </label>
																 	 &nbsp   <input name="placa"  style="background-color:seashell;" type="text" id="placa" size="83" value=" <?php echo $unidade; ?>" readonly />      
																</div>
															<br>	<div>
																  <label> Secretaria :     </label>
																&nbsp 	<input name="processador" style="background-color:seashell;"  type="text" id="processador" size="78" value=" <?php echo $secretaria; ?>" readonly />                
																</div>  
																
															<br>					
															     <div class="form-group">
																    <div class="col-md-4">
																	 <label class="col-md-4 control-label" for="telefone">Novo Local: : </label>
																		<select class="form-control m-bot15" name="novaunidade_id">
																				  <option value="">Geral</option>
																				  <?php
																				  $sql = "SELECT * FROM  tbcmei order by tbcmei_nome";
																				  $resultado = mysqli_query($conn, $sql) or die('Erro ao selecionar especialidade: ' . mysqli_error());
																				  while ($row = mysqli_fetch_array($resultado)) {
																					  $selected = ($row['tbcmei_id'] == $_POST['tbcmei_nome']) ? 'selected' : '';
																					  ?>
																			        <option value="<?php echo $row['tbcmei_id']; ?>"<?php echo $selected; ?>>
																			        <?php echo $row['tbcmei_nome']; ?></option>
																		       	<?php
																				  }
																				  ?>
             														</select>
																			</div>	
																	</div>
																				  <!-- Text input-->
																				  <!-- Button -->
																					  <div class="form-group">
																					  <div><input type="submit" value="ALTERAR LOCAL" name="salvar" class="btn btn-primary" /></div>
																			 </div>
																
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
																			  <input id="nome_equip" name="nome_equip" style="background-color:seashell;" type="text" placeholder="Nome do Computador " readonly size = "8" value=" <?php echo $ret_nome; ?>"readonly>
																			  &nbsp &nbsp	&nbsp &nbsp  <label >Tamanho (Polegadas) : </label>    
																			  &nbsp
																			 <input name="so_tipo"  style="background-color:seashell;" type="text" id="so_tipo" size="5" value=" <?php echo $ret_tam; ?>" readonly />      
																      </div>
															
																  <div>
																		 <label >Marca : </label>    
																		  &nbsp <input name="so_arq"  style="background-color:seashell;" type="text" id="so_arq" size="35" value=" <?php echo $ret_marca; ?>" readonly />      
																		  &nbsp <label for="coord">Patrimonio :</label> &nbsp
																		 <input id="plaqueta" name="plaqueta"  style="background-color:seashell;" type="text" placeholder="Numero da Plaqueta " readonly size = "7" value=" <?php echo $ret_plaqueta; ?>">
															     </div>  
																<div>
															  	    <label> Responsavel :     </label><br />
																    <input name="placa"  style="background-color:seashell;" type="text" id="placa" size="65" value=" <?php echo $ret_resp; ?> " readonly />      
																</div>
																	 
																	 <div>
															  	    <label> Obs :     </label><br />
																    <input name="placa"  style="background-color:seashell;" type="text" id="placa" size="65" value=" <?php echo " Id : ".$ret_id."  -  ".$ret_obs; ?>" readonly />      
																</div>
															
																	 <div>
																	
																     <label> Secretaria :     </label><br />
																     <input name="processador" style="background-color:seashell;"  type="text" id="processador" size="65" value=" <?php echo $secretaria; ?>" readonly />                
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
																				<input id="plaqueta" name="plaqueta"  style="background-color:seashell;" type="text" placeholder="Numero da Plaqueta " readonly size = "10" value=" <?php echo $ret_plaqueta; ?>">
																				&nbsp <label for="coord">Nome do Equipamento : </label>    
																				&nbsp
																				<input id="nome_equip" name="nome_equip" style="background-color:seashell;" type="text" placeholder="Nome do Computador " readonly size = "35" value=" <?php echo $ret_nome; ?>">
																			
																	   </div>  
																<br><div>
																  	 <label >Marca : </label>    
																	  <input name="so_arq"  style="background-color:seashell;" type="text" id="so_arq" size="35" value=" <?php echo $ret_marca; ?>" readonly />      
																	 
																	 <label >Componentes : </label>    
																		&nbsp &nbsp
																	  
																	 <input name="so_tipo"  style="background-color:seashell;" type="text" id="so_tipo" size="25" value=" <?php echo $ret_comps; ?>" readonly />      
																		&nbsp	&nbsp  &nbsp
																 																	 
																 </div>  
															<br><div>
																  <label> Local :     </label>
																 	 &nbsp   <input name="placa"  style="background-color:seashell;" type="text" id="placa" size="83" value=" <?php echo $unidade; ?>" readonly />      
																</div>
															<br>	<div>
																  <label> Secretaria :     </label>
																&nbsp 	<input name="processador" style="background-color:seashell;"  type="text" id="processador" size="78" value=" <?php echo $secretaria; ?>" readonly />                
																</div>  
																<br><div>
																  <label> Obs :     </label>
																   <input name="placa"  style="background-color:seashell;" type="text" id="placa" size="86" value=" <?php echo " Id : " . $ret_id . "  -  " . $ret_obs; ?>" readonly />      
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
																			
																
															