<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";
include "bco_fun.php";
$ret_id = $_GET['id']; // parametro de busca em controle_ti

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
                                     
                                 
                                 if(($ret_tipo=="3")and($ret_id<>"0"))  // acesso a tabela monitores
                                 {
                                     $sql1 = "SELECT * FROM tb_monitores where id ='" . $ret_id . "' ";
                                     $resultado1 = mysqli_query($conn, $sql1) or die('Erro ao selecionar especialidade: ' . mysqli_error());
                                     $qtd = mysqli_num_rows($resultado1);  // $option = '';
                                     if ($qtd == 0) {
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
                                     } else 
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
                                             $unidade = nomedolocal($conn, $ret_idlocal);
                                             $codificacao = "cti" . $ret_ctrl_ti . "-t" . $ret_id . "-l-" . $ret_idlocal . "-s-" . $ret_idsec;
                                         } while ($row = mysqli_fetch_assoc($resultado1));
                                     }
                                     ?>
                                  <form method="post" action="salvaequip_div.php">
                                  <input type="hidden" name="loc_id" size=50 value= "<?php echo $ret_idlocal ?>">
                                  <input type="hidden" name="sec_id" size=50 value= "<?php echo $ret_idsec ?>">
                                  <input type="hidden" name="ctrl_ti" size=50 value= "<?php echo $ctrl_ti ?>">
                                  <input type="hidden" name="modalidade" size=50 value= "15">  
                                   <input type="hidden" name="id_equip_pc_ant" size=50 value= "<?php echo $ret_id_equip ?>">  
                                  <input type="hidden" name="id_monitor"  value= "<?php echo $ret_id ?>">  
                                <section class="box ">
                                 <header class="panel_header">
                                <h2 class="title pull-left"> <?php echo $unidade; ?></h2>                                
                                <div class="actions panel_actions pull-right">
                                       <h5> 	<?php echo " Codificacao : " . $codificacao . "   </i> "; ?> </h5>
                                </div>
                                      </div>
                                           <div>  
                                                <?php echo" <i>Controle T.I :". $ret_ctrl_ti. "       -    Cadastrado por : ".$ret_tecnico ."  em  ".$ret_data.  "    </i>"; ?>  
                                               </br> 
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
                                        &nbsp &nbsp

                               <?php
                         
                               if (($ret_id_equip == "") || ($ret_id_equip == "0")) {
                                   ?> 
									   </div>  
										  <br> <br> <div>
										  <label> Nenhum Vinculo a um  Computador   < <?php echo $ret_id_equip; ?> > 	</label>	<br />
                                      <label> Vinculo do Computador  :  </label> 
                                           &nbsp &nbsp <input name="novo_pc"  style="background-color:#E4F4F5;" type="text" id="novo_pc" size="10" value="" title="Numero do CTI do novo Computador" />    &nbsp &nbsp
									 &nbsp &nbsp &nbsp &nbsp  <button class="botao submit" type="submit" name="submit">Executar</button>
                                    

									</div>  
							   <?php
                               } else {
                                   $sqlM = "SELECT * FROM tbequip where tbequip_id ='" . $ret_id_equip . "' ";
                                   $resultadoM = mysqli_query($conn, $sqlM) or die('Erro ao selecionar especialidade: ' . mysqli_error());
                                   $qtdM = mysqli_num_rows($resultadoM);  // $option = '';
                                   $rowM = mysqli_fetch_assoc($resultadoM);
                                   //  echo $qtdM;
                                   if ($qtdM == 0) {
                                       ?>	</div>  
										  <br> <br> <div>
										  <label> Vinculado ao Computador  : < CTI  <?php echo $ret_id_equip; ?> >   </label> &nbsp &nbsp   <a href="ret_dados_id.php?id= <?php echo $ret_id_equip; ?>" title="Visualizar Equipamento">Visualizar</a><br />
										  <input name="placa"  style="background-color:FAD8D8;" type="text" id="placa" size="96" value=" Equipamento (PC) não  Encontrado <?php echo $ret_id_equip; ?>"  />      
										</div>                                     
									<?php
                                   } else {
                                       do {
                                           $ret_mon_pct = $rowM['tbequip_monitor'];
                                           $ret_mon_PC_plaqueta = $rowM['tbequip_plaqueta'];
                                           $ret_mon_cti = $rowM['ctrl_ti'];
                                           $ret_mon_PC_id = $rowM['tbequip_id'];
                                           $ret_mon_PC_resp = $rowM['tbequip_resp'];
                                           $resumo = "Equipamento com Controle de T.I. ( CTI ) : " . $ret_mon_cti  . "    e  Patrimonio  identificaçao  :  " . $ret_mon_PC_plaqueta ;
                                       } while ($rowM = mysqli_fetch_assoc($resultadoM));
                                       ?>                             
                                       	</div>  
										  <br> <br> <div>
										  <label> Vinculado ao Computador  :    &nbsp &nbsp   <?php echo $resumo; ?>"      </label> <br /> <br />
                                          <label style="color:red">  Tirar Vinculo do Computador  :  </label> 
                                           &nbsp &nbsp <input name="novo_pc"  style="background-color:#E4F4F5;" type="text" id="novo_pc" size="10" value="  <?php echo $ret_mon_cti; ?>"   " title="Numero do CTI a ser retirado do Computador" />    &nbsp &nbsp
									 &nbsp &nbsp &nbsp &nbsp  <button class="botao submit" type="submit" name="submit" style="color:red">Executar</button>
                                    
                                     <br>
                                     </div>                                     
							            <?php
                                   }
                               }
                                 }
                              ?>
                                <br> <div>
                                                               
                                </div>
                                <br>
                            <div>
                            <a href="editaequipm.php?id= <?php echo $ret_id; ?>&tipo='1'" title="Alterar Local do Equipamento">Alterar Local do Equipamento</a><br /><br />
                            <a href="editaequip2m.php?tbequip_id= <?php echo $ret_id; ?>" title="Alterar Dados do Equipamento">Alterar Dados do Equipamento</a><br /><br />
							<a href="busca_diversos.php?tbequip_id= <?php echo $ret_id; ?>" title="Alterar Dados do Equipamento">Consultar Infs do Equipamento</a><br /><br />                           
							<a href="qrimpressao_m.php?var= <?php echo $ret_id; ?>"  title="Alterar Dados do Equipamento">Gerar QR Code do Equipamento</a><br /><br />                           						  
						  </div>
                            </form>
                            </div>
                        </section></div>
                </section>
            </section>
                                             
        
</body>

</html>
