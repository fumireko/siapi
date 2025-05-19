<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";
include "bco_fun.php";
$ret_id = $_GET['id'];
//$ret_cod_desc = $_GET['tipo'];

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
                                            $sql1 = "SELECT * FROM tb_monitores where id ='".$ret_id."' ";
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
                                               <?php echo "Controle T.I. não identificado " ?> 
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
                                                   $ret_id = $row['id'];
                                                   $ret_id_equip = $row['id_equip'];
													$ret_ctrl_ti = $row['ctrl_ti'];
												   //$ret_cod_desc = $row['local_id'];
                                                   $ret_plaqueta = $row['mon_plaqueta'];
                                                   $ret_nome = "Monitor";
                                                   $ret_marca = $row['mon_marca'];
                                                   $ret_data = $row['data'];
                                                   $ret_tecnico = $row['usuario'];
                                                   $ret_cmei_id = $row['local_id'];
												   $ret_sec_id = $row['sec_id'];
                                                   $ret_tam = $row['mon_tam'];
                                                   $ret_tipo = $row['mon_tipo'];
                                                    
													$nomeunidade = nomedolocal($conn,$ret_cmei_id);
                                                    $nomesecretaria = nomedesecretaria($conn,$ret_sec_id);
                                                   } while($row = mysqli_fetch_assoc($resultado1));
                                            //    }
                                 

                                   //  echo $ret_cod_desc;
												
												   ?>
																<form method="post" action="smudaequipm.php">
																  <input type="hidden" name="loc_id" size=50 value= "<?php echo $ret_cmei_id ?>">
																 <input type="hidden" name="codequip" size=50 value= "<?php echo $ret_id ?>">
																<input type="hidden" name="ctrl_ti" size=50 value= "<?php echo $ret_ctrl_ti ?>">


																<section class="box ">
																 <header class="panel_header">
																<h2 class="title pull-left"> <?php echo $nomeunidade; ?></h2>                                
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
																				&nbsp <label for="coord">Equipamento : </label>    
																				&nbsp
																				<input id="nome_equip" name="nome_equip" style="background-color:seashell;" type="text" placeholder="Nome do Computador " readonly size = "15" value=" <?php echo $ret_nome; ?>">
																				 &nbsp &nbsp <label >Polegadas : </label>    
																			 <input name="so_arq"  style="background-color:seashell;" type="text" id="so_arq" size="5" value=" <?php echo $ret_tam; ?>" readonly />      
																	   </div>  
																     <br><div>
																  <label >Marca : </label>    
																		&nbsp &nbsp
																	  <input name="so_tipo"  style="background-color:seashell;" type="text" id="so_tipo" size="15" value=" <?php echo $ret_marca; ?>" readonly />      
																	&nbsp	&nbsp &nbsp
																  	  <label >Dt Cad : </label>    
																		&nbsp
																	  <input name="so_tipo"  style="background-color:seashell;" type="text" id="so_tipo" size="8" value=" <?php echo $ret_data; ?>" readonly />      
																		&nbsp &nbsp
																  <label >Usuario : </label> &nbsp   
																		 <input name="so_tipo"  style="background-color:seashell;" type="text" id="so_tipo" size="10" value=" <?php echo $ret_tecnico; ?>" readonly />      
																		&nbsp &nbsp
																 </div>  
															         <br>	 
																	 
																	 <br><div>
																  <label> Local :     </label>
																 	 &nbsp   <input name="placa"  style="background-color:seashell;" type="text" id="placa" size="83" value=" <?php echo $nomeunidade; ?>" readonly />      
																</div>
															        <br>	<div>
																  <label> Secretaria :     </label>
																&nbsp 	<input name="processador" style="background-color:seashell;"  type="text" id="processador" size="78" value=" <?php echo $nomesecretaria; ?>" readonly />                
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
                                              }
													
                                         
                 
        
														?>
																			
																
															