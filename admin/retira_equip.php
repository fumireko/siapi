<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";
include "bco_fun.php";
$ret_id = $_GET['cti']; // parametro de busca em controle_ti

   ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
    <title>Exclusao  de Equipamentos</title>
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

<style>
    .button {
        background-color: #04AA6D; /* Green */
        border: none;
        color: white;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
    }
    .button3 {
        background-color: #f44336;
    }
    /* Red */
    .button3 {
        padding: 32px 16px;
    }
    .button {
        transition-duration: 0.4s;
    }

        .button:hover {
            background-color: #04AA6D; /* Green */
            color: white;
        }

    .div2 {
        display: inline-grid;
        width: 20%;
        margin-right: 2%;
        margin-top: 0px;
        text-align: justify;
        line-height: 130%;
        color: #2E2E2E;
        font-family: Arial;
        font-size: 14pt;
    }

    .div1 {
        display: inline-grid;
        float: left;
        width: 25%;
        margin: auto auto auto 2%;
        line-height: 170%;
        text-align: left;
        font-family: Arial;
        font-size: 11pt;
        font-style: italic;
        font-weight: bold;
        color: #2E2E2E;
        padding-bottom: 10px;
        padding-top: 30px;
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
                    <h3 class="title pull-left"> EXCLUSAO DE EQUIPAMENTO  </h3>

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
                                 // inicio da checagem com base no controle T.I
                                 $query = "select id,ctrl_ti,tab_chave,tab_origem  from tb_controle_ti where ctrl_ti ='" . $ret_id . "'";
                                 $dados = mysqli_query($conn, $query);
                                 $resultadoDaInsercao = mysqli_num_rows($dados);
                                 if ($resultadoDaInsercao == '0') {
                                     echo " <center> Nenhum resultado obtido no controle T.I nº :" . $ret_id."  </center>";
                                 }
                                else
                                 if ($resultadoDaInsercao == '1')
                                 {
                                      $linha = mysqli_fetch_assoc($dados);
                                      $ret_tipo = $linha['tab_origem'];
                                      $ctrl_ti = $linha['ctrl_ti'];
                                      $ret_id = $linha['tab_chave'];
                                 } else
                                     $ret_id = "0";
                                 //  fim da checagem comum a todas as tabelas pelo controle TI ...   
                                 
                                 if(($ret_tipo=="3")and($ret_id<>"0"))  // acesso a tabela monitores
                                 {
                                     $sql1 = "SELECT * FROM tb_monitores where id ='" . $ret_id . "' ";
                                     $resultado1 = mysqli_query($conn, $sql1) or die('Erro ao selecionar especialidade: ' . mysqli_error());
                                     $qtd = mysqli_num_rows($resultado1);  // $option = '';
                                     if ($qtd == 0) 
                                     {
                                         $nome_local = "Nenhum local encontrado";
                                         $ret = "VAZIO";
                                         ?>
                                            <form method="post" action="retira_equip_exclusao.php">
                                              <input type="hidden" name="loc_id" size=50 value= "<?php echo $nome_local ?>">
                                              <input type="hidden" name="sec_id" size=50 value= "">
                                              <input type="hidden" name="ctrl_ti" size=50 value= "<?php echo $ctrl_ti ?>">
                                                <input type="hidden" name="tabela" size=50 value= "<?php echo $ret_tipo ?>">
                                                <input type="hidden" name="chave" size=50 value= "<?php echo $ret_id ?>">

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
                                                <label >Tipo equip: </label>    
                                                   <input name="tipo_equip"  style="background-color:seashell;" type="text" id="tipo_equip" size="25" value=" <?php echo $ret; ?>"  />      
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
                                     }
                                     else 
                                     {
                                         do {
                                             $row = mysqli_fetch_assoc($resultado1);
                                             $ret_id = $row['id'];
                                             $ret_idlocal = $row['local_id'];
                                             $ret_idsec = $row['sec_id'];
                                             $ret_plaqueta = $row['mon_plaqueta'];
                                             $ret_nome = $row['mon_marca'];
                                             $ret_desc = "Monitor ";
                                             $ret_tam = $row['mon_tam'];
                                             $ret_id_equip = $row['id_equip'];
                                             $ret_tipo = $row['mon_tipo'];
                                             $ret_data = $row['data'];
                                             $ret_saida = $row['mon_saida'];
                                             $ret_tecnico = $row['usuario'];
                                             $ret_ctrl_ti = $row['ctrl_ti'];
                                             $ret_ref = $row['ref'];
                                             $ret_obs = $row['obs'];
                                             $unidade = nomedolocal($conn, $ret_idlocal);
                                             $codificacao = "cti" . $ret_ctrl_ti . "-t" . $ret_id . "-l-" . $ret_idlocal . "-s-" . $ret_idsec;
                                         } while ($row = mysqli_fetch_assoc($resultado1));
                                     }
                                     ?>
                                        
                                                <form method="post" action="retira_equip_exclusao.php">
                                                <input type="hidden" name="loc_id" size=50 value= "<?php echo $ret_idlocal; ?>">
                                               <input type="hidden" name="sec_id" size=50 value= "<?php echo $ret_idsec; ?>">
                                               <input type="hidden" name="ctrl_ti" size=50 value= "<?php echo $ret_ctrl_ti; ?>">
                                               <input type="hidden" name="tabela" size=50 value= "<?php echo "3"; ?>">
                                               <input type="hidden" name="chave" size=50 value= "<?php echo $ret_id; ?>"> 

                                        <section class="box ">
                                         <header class="panel_header">
                                        <h2 class="title pull-left"> <?php echo $unidade; ?></h2>                                
                                        <div class="actions panel_actions pull-right">
                                               <h5> 	<?php echo " Codificacao : " . $codificacao . "   </i> "; ?> </h5>
                                          </div>
                                              </div>
                                                   <div>  
                                                        <?php echo" <i>Controle T.I :". $ret_ctrl_ti. "       -    Cadastrado por : ".$ret_tecnico ."  em  ".$ret_data.  "    </i>"; ?>  
                                                       </br> </br> 
                                                         <label for="coord">Patrimonio :</label>    
                                                        &nbsp &nbsp
                                                        <input id="plaqueta" name="plaqueta"  style="background-color:seashell;" type="text" placeholder="Numero da Plaqueta " readonly size = "15" value=" <?php echo $ret_plaqueta; ?>">
                                                        &nbsp &nbsp <label for="coord">Nome do Equipamento : </label>    
                                                        &nbsp &nbsp
                                                        <input id="nome_equip" name="nome_equip" style="background-color:seashell;" type="text" placeholder="Nome do Computador " readonly size = "30" value=" <?php echo $ret_desc . "   " . $ret_nome; ?>">
                                                 
                                            </div>  
                                               <br> 
								                   <div>
                                              <label >Tipo equip: </label>    
                                                 &nbsp &nbsp
                                                <input name="tipo_equip"  style="background-color:seashell;" type="text" id="tipo_equip" size="10" value=" <?php echo $ret_desc; ?>" readonly />      
                                                    &nbsp &nbsp 
                                              <label >Tela tipo  : </label>    
                                                    &nbsp &nbsp
                                                  <input name="so_tipo"  style="background-color:seashell;" type="text" id="so_tipo" size="20" value=" <?php echo $ret_tipo; ?>" readonly />      
										            &nbsp &nbsp &nbsp &nbsp 
                                              <label >Tamanho  : </label>    
                                                    &nbsp &nbsp
                                                  <input name="so_tipo"  style="background-color:seashell;" type="text" id="so_tipo" size="5" value=" <?php echo $ret_tam; ?>" readonly />      
                                                    &nbsp &nbsp <br /><br />
                                                   <label >Obs:  : </label>    
                                                    &nbsp &nbsp
                                                  <input name="obs"  style="background-color:seashell;" type="text" id="obs" size="85" value=" <?php echo $ret_obs; ?>" readonly />      
                                                    &nbsp &nbsp

                                                      <?php
                         
                                                           if (($ret_id_equip == "") || ($ret_id_equip == "0")) {
                                                               ?> 
									                               </div>  
										                            <div>
										                              <label> Nenhum Vinculo a um  Computador   < <?php echo $ret_id_equip; ?> > 	</label>	 <br>
									                            </div>  
							                               <?php
                                                           }
                                                           else
                                                           {
                                                               $sqlM = "SELECT * FROM tbequip where tbequip_id ='" . $ret_id_equip . "' ";
                                                               $resultadoM = mysqli_query($conn, $sqlM) or die('Erro ao selecionar especialidade: ' . mysqli_error());
                                                               $qtdM = mysqli_num_rows($resultadoM);  // $option = '';
                                                               $rowM = mysqli_fetch_assoc($resultadoM);
                                                               //  echo $qtdM;
                                                               if ($qtdM == 0) {
                                                                   ?>	</div>  
										                         <div>
										                              <label> Vinculado ao Computador  : < CTI  <?php echo $ret_id_equip; ?> >   </label> &nbsp &nbsp <br>
										                              <input name="placa"  style="background-color: seashell;" type="text" id="placa" size="96" value=" Equipamento (PC) não  Encontrado <?php echo $ret_id_equip; ?>"  />      
										                            </div>                                     
									                            <?php
                                                               } else
                                                               {
                                                                   do {
                                                                       $ret_mon_pct = $rowM['tbequip_monitor'];
                                                                       $ret_mon_PC_plaqueta = $rowM['tbequip_plaqueta'];
                                                                       $ret_mon_cti = $rowM['ctrl_ti'];
                                                                       $ret_mon_PC_id = $rowM['tbequip_id'];
                                                                       $ret_mon_PC_resp = $rowM['tbequip_resp'];
                                                                       $resumo = "Equipamento de Plaqueta de identificaçao : " . $ret_mon_PC_plaqueta . "   CTI :  " . $ret_mon_cti . "   " . $ret_mon_pct . "   Resp.:  " . $ret_mon_PC_resp;
                                                                   } while ($rowM = mysqli_fetch_assoc($resultadoM));
                                                                   ?>                             
                                       	                            </div>  
										                
                                                                     <div>
										                           <label> Vinculado ao Computador  :     </label> &nbsp &nbsp   <a href="ret_dados_id.php?id= <?php echo $ret_id_equip; ?>" title="Visualizar Equipamento">Visualizar</a>   
                                                                   <br>
                                                                 <br>
										                              <input name="placa"  style="background-color: seashell;" type="text" id="placa" size="96" value="<?php echo $resumo; ?>"  />      
										                            </div>                                     
							                                                                                                  
                                             
                                                                    <?php
                                                                }
                                                           }
                                                           ?>
                                                          <br />                          
                                                           <label style="color:red"> Justificativa de Exclusao :     </label>  &nbsp &nbsp                     
                                                            <br />                                      
                                                             <div class="div1">
										                        <textarea id="just" name="just" rows="3" cols="63" placeholder="Justificativa para a Exclusao do equipamento " title="Justificativa para a Exclusao do equipamento "   required>
                                                                </textarea>  
                                                            </div> 
                                             
                                                            <div class="div2">
                                                              &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp  <button class="button button3">Excluir</button>
                                                           </div>           
                                                    <?php
                                                                 
                                 }
                                 else
                                 {
                                        if(($ret_tipo=="2")and($ret_id<>"0"))  // acesso a tabela diversos  
                                        {
                                              $sql1 = "SELECT * FROM tb_diversos where id ='".$ret_id."' ";
                                              $resultado1 = mysqli_query($conn,$sql1) or die('Erro ao selecionar especialidade: ' .mysqli_error());
                                              $qtd = mysqli_num_rows($resultado1);  // $option = '';
                                             if ($qtd == 0) 
                                              {
                                                    $nome_local = "Nenhum local encontrado  ".$ret_id;
                                                    $ret = "VAZIO";
                                             echo $nome_local;
                                             }
                                            else // mostra registro
                                            {
                                                 do
                                                 {
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
														switch ($ret_cod_desc)
														{
															case '0':
																{
																break; 
																}
																case '1': // patch
																{
																	?>
																			<form method="post" action="retira_equip_exclusao.php">
                                                <input type="hidden" name="loc_id" size=50 value= "<?php echo $ret_cmei_id; ?>">
                                               <input type="hidden" name="sec_id" size=50 value= "<?php echo $ret_sec_cod; ?>">
                                               <input type="hidden" name="ctrl_ti" size=50 value= "<?php echo $ret_ctrl_ti; ?>">
                                               <input type="hidden" name="tabela" size=50 value= "<?php echo "2"; ?>">
                                               <input type="hidden" name="chave" size=50 value= "<?php echo $ret_idlocal; ?>"> 
																	
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
																			   <input name="placa"  style="background-color:seashell;" type="text" id="placa" size="86" value=" <?php echo " CoDIdigo Interno (D): ".$ret_id."  -  ".$ret_obs; ?>" readonly />      
																			</div>
																<br />                          
                                                           <label style="color:red"> Justificativa de Exclusao :     </label>  &nbsp &nbsp                     
                                                            <br />                                      
                                                             <div class="div1">
										                        <textarea id="just" name="just" rows="3" cols="63" placeholder="Justificativa para a Exclusao do equipamento " title="Justificativa para a Exclusao do equipamento "   required>
                                                                </textarea>  
                                                            </div> 
                                             
                                                            <div class="div2">
                                                              &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp  <button class="button button3">Excluir</button>
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
																				<form method="post" action="retira_equip_exclusao.php">
                                                                                <input type="hidden" name="loc_id" size=50 value= "<?php echo $ret_cmei_id; ?>">
                                                                               <input type="hidden" name="sec_id" size=50 value= "<?php echo $ret_sec_cod; ?>">
                                                                               <input type="hidden" name="ctrl_ti" size=50 value= "<?php echo $ret_ctrl_ti; ?>">
                                                                               <input type="hidden" name="tabela" size=50 value= "<?php echo "2"; ?>">
                                                                               <input type="hidden" name="chave" size=50 value= "<?php echo $ret_idlocal; ?>"> 
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
																			   <input name="placa"  style="background-color:seashell;" type="text" id="placa" size="86" value=" <?php echo "  CoDIdigo Interno (D) : ".$ret_id."  -  ".$ret_obs; ?>" readonly />      
																			</div>
																		
															<br />                          
                                                           <label style="color:red"> Justificativa de Exclusao :     </label>  &nbsp &nbsp                     
                                                            <br />                                      
                                                             <div class="div1">
										                        <textarea id="just" name="just" rows="3" cols="63" placeholder="Justificativa para a Exclusao do equipamento " title="Justificativa para a Exclusao do equipamento "   required>
                                                                </textarea>  
                                                            </div> 
                                             
                                                            <div class="div2">
                                                              &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp  <button class="button button3">Excluir</button>
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
																			<form method="post" action="retira_equip_exclusao.php">
                                                                            <input type="hidden" name="loc_id" size=50 value= "<?php echo $ret_cmei_id; ?>">
                                                                           <input type="hidden" name="sec_id" size=50 value= "<?php echo $ret_sec_cod; ?>">
                                                                           <input type="hidden" name="ctrl_ti" size=50 value= "<?php echo $ret_ctrl_ti; ?>">
                                                                           <input type="hidden" name="tabela" size=50 value= "<?php echo "2"; ?>">
                                                                           <input type="hidden" name="chave" size=50 value= "<?php echo $ret_idlocal; ?>"> 
																	
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
																			  <label> Local :     </label>
																 				 &nbsp   <input name="placa"  style="background-color:seashell;" type="text" id="placa" size="83" value=" <?php echo $unidade; ?>" readonly />      
																			</div>
																		<br>	<div>
																			  <label> Secretaria :     </label>
																			&nbsp 	<input name="processador" style="background-color:seashell;"  type="text" id="processador" size="78" value=" <?php echo $secretaria; ?>" readonly />                
																			</div>  
																			<br><div>
																			  <label> Obs :     </label>
																			   <input name="placa"  style="background-color:seashell;" type="text" id="placa" size="86" value=" <?php echo "  CoDIdigo Interno (D) : ".$ret_id."  -  ".$ret_obs; ?>" readonly />      
																			</div>
																		    
                                                            <br />                          
                                                           <label style="color:red"> Justificativa de Exclusao :     </label>  &nbsp &nbsp                     
                                                            <br />                                      
                                                             <div class="div1">
										                        <textarea id="just" name="just" rows="3" cols="63" placeholder="Justificativa para a Exclusao do equipamento " title="Justificativa para a Exclusao do equipamento "   required>
                                                                </textarea>  
                                                            </div> 
                                             
                                                            <div class="div2">
                                                              &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp  <button class="button button3">Excluir</button>
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
																			<form method="post" action="retira_equip_exclusao.php">
                                                                                <input type="hidden" name="loc_id" size=50 value= "<?php echo $ret_cmei_id; ?>">
                                                                               <input type="hidden" name="sec_id" size=50 value= "<?php echo $ret_sec_cod; ?>">
                                                                               <input type="hidden" name="ctrl_ti" size=50 value= "<?php echo $ret_ctrl_ti; ?>">
                                                                               <input type="hidden" name="tabela" size=50 value= "<?php echo "2"; ?>">
                                                                               <input type="hidden" name="chave" size=50 value= "<?php echo $ret_idlocal; ?>"> 
																	
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
																				<input name="placa"  style="background-color:seashell;" type="text" id="placa" size="65" value=" <?php echo "  CoDIdigo Interno (D) : ".$ret_id."  -  ".$ret_obs; ?>" readonly />      
																			</div>
															
																				 <div>
																	
																				 <label> Secretaria :     </label><br />
																				 <input name="processador" style="background-color:seashell;"  type="text" id="processador" size="65" value=" <?php echo $secretaria; ?>" readonly />                
																			</div>  
																
																       <br />                          
                                                           <label style="color:red"> Justificativa de Exclusao :     </label>  &nbsp &nbsp                     
                                                            <br />                                      
                                                             <div class="div1">
										                        <textarea id="just" name="just" rows="3" cols="63" placeholder="Justificativa para a Exclusao do equipamento " title="Justificativa para a Exclusao do equipamento "   required>
                                                                </textarea>  
                                                            </div> 
                                             
                                                            <div class="div2">
                                                              &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp  <button class="button button3">Excluir</button>
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
																		<form method="post" action="retira_equip_exclusao.php">
                                                                            <input type="hidden" name="loc_id" size=50 value= "<?php echo $ret_cmei_id; ?>">
                                                                           <input type="hidden" name="sec_id" size=50 value= "<?php echo $ret_sec_cod; ?>">
                                                                           <input type="hidden" name="ctrl_ti" size=50 value= "<?php echo $ret_ctrl_ti; ?>">
                                                                           <input type="hidden" name="tabela" size=50 value= "<?php echo "2"; ?>">
                                                                           <input type="hidden" name="chave" size=50 value= "<?php echo $ret_idlocal; ?>"> 
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
																			   <input name="placa"  style="background-color:seashell;" type="text" id="placa" size="86" value=" <?php echo "  CoDIdigo Interno (D) : " . $ret_id . "  -  " . $ret_obs; ?>" readonly />      
																			</div>
  
																			<br />                          
                                                                              <label style="color:red"> Justificativa de Exclusao :     </label>  &nbsp &nbsp                     
                                                                                <br />                                      
                                                                                  <div class="div1">
										                                         <textarea id="just" name="just" rows="3" cols="63" placeholder="Justificativa para a Exclusao do equipamento " title="Justificativa para a Exclusao do equipamento "   required>
                                                                               </textarea>  
                                                                                 </div> 
                                             
                                                            <div class="div2">
                                                              &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp  <button class="button button3">Excluir</button>
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
																	  break;
															        }
                                                        } // fim do switch
                                            } // fim do if mostra regitstro
                                         		
                                        } // fim do if acessa diversos
										else // ultimo else
                                          {
                                             if (($ret_tipo == "1") and ($ret_id <> "0"))  // acesso a tabela tb_equips
                                               {
                                                         $sql1 = "SELECT * FROM tbequip where tbequip_id ='" . $ret_id . "' ";
                                                         $resultado1 = mysqli_query($conn, $sql1) or die('Erro ao selecionar especialidade: ' . mysqli_error());
                                                         $qtd = mysqli_num_rows($resultado1);  // $option = '';
                                                            if ($qtd == 0) {
                                                                $nome_local = "Nenhum local encontrado";
                                                                $ret = "VAZIO";
                                                                }
                                                            else // mostra resgistros
                                                            {
                                                                     do {
                                                                         $row = mysqli_fetch_assoc($resultado1);
                                                                         $ret_idlocal = $row['tbequip_id'];
                                                                         //$ret_idsec = $row['tbequi'];
                                                                         $ret_plaqueta = $row['tbequip_plaqueta'];
                                                                         $ret_nome = $row['tbequi_nome'];
                                                                         $ret_equi_tipo = $row['tbequi_tipo'];
                                                                         $ret_monitor = $row['tbequip_monitor'];
                                                                         $ret_monitor_obs = $row['tbequip_monitor_obs'];
                                                                         $ret_equi_mod = $row['tbequi_mod'];
                                                                         $ret_so = $row['tbequip_so'];
                                                                         $ret_so_arq = $row['tbequi_so_arq'];
                                                                         $ret_mod_placa = $row['tbequi_modplaca'];
                                                                         $ret_memoria = $row['tbequi_modelomemoria'];
                                                                         $ret_memtam = $row['tbequi_memoria'];
                                                                         $ret_slots = $row['tbequi_slots'];
                                                                         $ret_slots_uso = $row['tbequi_slots_uso'];
                                                                         $ret_modmem = $row['tbequi_modelomemoria'];
                                                                         $ret_armaz = $row['tbequi_armazenamento'];
                                                                         $ret_tparmaz = $row['tbequi_tparmazenamento'];
                                                                         $ret_arm_sec = $row['tbequi_arm_sec'];
                                                                         $ret_arm_sectam = $row['tbequi_arm_sectam'];
                                                                         $ret_datalanc = $row['tbequi_datalanc'];
                                                                         $ret_tec = $row['tbequi_tecnico'];
                                                                         $ret_cmei_id = $row['tbequi_tbcmei_id'];
                                                                         $ret_sec_id = $row['tbequip_sec'];
                                                                         $ret_app = $row['tbequi_app'];
                                                                         $ret_app_out = $row['tbequi_app_out'];
                                                                         $ret_proc = $row['tbequi_proc'];
                                                                         $ret_obs = $row['tbequi_obs'];
                                                                         $ret_ref = $row['tbequi_ref'];
                                                                         $ret_vid_uso = $row['tbequip_vid_uso'];
                                                                         $ret_vid_saidas = $row['tbequip_vid_saidas'];
                                                                         $ret_lacre = $row['tbequip_lacre'];
                                                                         $ret_fonte = $row['tbequip_fonte'];
                                                                         $ret_util_qtd = $row['tbequip_util_num'];
                                                                         $ret_util_nome = $row['tbequip_util_nomes'];
                                                                         $ret_ctrl_ti = $row['ctrl_ti'];
                                                                        $ret_monitores =  mostra_monitores($conn,$ret_idlocal)."  ".somente_numeros($ret_monitor_obs);
                                                                         $unidade = nomedolocal($conn, $ret_cmei_id);
                                                                         $codigos = "Cod Cmei : " . $ret_cmei_id . " Cod Sec : " . $ret_sec_id;
                                                                         $codificacao = "cti" . $ret_ctrl_ti . "-t" . $ret_idlocal . "-l-" . $ret_cmei_id . "-s-" . $ret_sec_id;
                                                                     } while ($row = mysqli_fetch_assoc($resultado1));
                                                                    ?>
                                                                       
                                                    					<form method="post" action="retira_equip_exclusao.php">
                                                                        <input type="hidden" name="loc_id" size=50 value= "<?php echo $ret_cmei_id; ?>">
                                                                       <input type="hidden" name="sec_id" size=50 value= "<?php echo $ret_sec_id; ?>">
                                                                       <input type="hidden" name="ctrl_ti" size=50 value= "<?php echo $ret_ctrl_ti; ?>">
                                                                       <input type="hidden" name="tabela" size=50 value= "<?php echo "1"; ?>">
                                                                       <input type="hidden" name="chave" size=50 value= "<?php echo $ret_idlocal; ?>"> 
                                    
                                                                <section class="box ">
                                                                 <header class="panel_header">
                                                                <h2 class="title pull-left"> <?php echo $unidade; ?></h2>                                
                                                                <div class="actions panel_actions pull-right">
                                                                    <h5> 	<?php echo " Codificacao : ".$codificacao."   </i> "; ?> </h5>
                                                                </div>
                                                                      </div>
                                                                           <div>  
                                                                                <?php echo " <i>Controle T.I :" . $ret_ctrl_ti . "       -    Cadastrado por : " . $ret_tec . "  em  " . $ret_datalanc . "    </i>"; ?>  
                                               
                                                                               </br> 
                                                                                 <label for="coord">Patrimonio :</label>    
                                                                                &nbsp &nbsp
                                                                                <input id="plaqueta" name="plaqueta"  style="background-color:seashell;" type="text" placeholder="Numero da Plaqueta " readonly size = "15" value=" <?php echo $ret_plaqueta; ?>">
                                                                                &nbsp &nbsp <label for="coord">Nome do Equipamento : </label>    
                                                                                &nbsp &nbsp
                                                                                <input id="nome_equip" name="nome_equip" style="background-color:seashell;" type="text" placeholder="Nome do Computador " readonly size = "20" value=" <?php echo $ret_nome; ?>">
                                                                                 &nbsp &nbsp <label >Lacre TI : </label>    
                                                 
                                                                                 <input name="so_arq"  style="background-color:seashell;" type="text" id="so_arq" size="9" value=" <?php echo $ret_lacre; ?>"  />      
                                               
                                                                       </div>  
                                                                <div>
                                                                  <label  title=" <?php echo $codigos; ?>  " >Tipo equip: </label>    
                                                                     &nbsp &nbsp
                                                                    <input name="tipo_equip"  style="background-color:seashell;" type="text" id="tipo_equip" size="25" value=" <?php echo $ret_equi_tipo; ?>"  />      
                                                                        &nbsp &nbsp 
                                                                  <label >Sist. Operacional (SO) : </label>    
                                                                        &nbsp &nbsp
                                                                      <input name="so_tipo"  style="background-color:seashell;" type="text" id="so_tipo" size="35" value=" <?php echo $ret_so; ?>"  />      
                                                                        &nbsp &nbsp
                                 
                                                                </div>  
                                                             <div>
                                                                  <label> Modelo Placa :     </label>
                                  
                                                                   <input name="placa"  style="background-color:seashell;" type="text" id="placa" size="86" value=" <?php echo $ret_mod_placa; ?>"  />      
                                      
                                  
                                                                </div>

                                                                <div>
                                                                  <label> Processador :     </label>
                                                                    <input name="processador" style="background-color:seashell;"  type="text" id="processador" size="87" value=" <?php echo $ret_proc; ?>"  />                
                                    
                                                                </div>  
                                                                <div>
                                                                  <label> Monitor   </label>                
                                    
                                                                </div>  
                                                                
                                                                
                                                                
                                                                
                                                                <br />                          
                                                           <label style="color:red"> Justificativa de Exclusao :     </label>  &nbsp &nbsp                     
                                                            <br />                                      
                                                             <div class="div1">
										                        <textarea id="just" name="just" rows="3" cols="63" placeholder="Justificativa para a Exclusao do equipamento " title="Justificativa para a Exclusao do equipamento "   required>
                                                                </textarea>  
                                                            </div> 
                                             
                                                            <div class="div2">
                                                              &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp  <button class="button button3">Excluir</button>
                                                           </div>           	
                                                                
                                                                <?php




                                                            } // fim do mostra registros



                                                } // fim do acessa equips
											   else
                                                 echo "Referencias nao validadas  ";


                                           }// fim do ultimo else



                                 } 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 
                                 ?>
                                                            <br> <div>
                                                               
                                                            </div>
                                                            <br>
                                                  
                                             
                                             
                                             
                                             
                                             
                                             
                                             
                                             
                                             
                                             
                                             </form>
                                              </div>
                                            </section></div>
                                           </section>
                                        </section>
                                     </body>
                                   </html>
