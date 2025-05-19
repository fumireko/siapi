<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";
include "bco_fun.php";
$ret_id_cti = $_GET['id'];
$ret_cam_id = substr(ret_caminho_ctrl_ti($conn, $ret_id_cti), 0,1);  // busca o caminho em controle_ti   
$ret_id = substr(ret_caminho_ctrl_ti($conn, $ret_id_cti),1);  // busca o caminho em controle_ti   
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
                                /*                  $query = "select id,ctrl_ti,tab_chave,tab_origem  from tb_controle_ti where ctrl_ti ='" . $ret_id . "'";
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


                                 if (($ret_tipo == "1") and ($ret_id <> "0"))  // acesso a tabela monitores
                                 {
                                 */

                                 if (($ret_id == "0") || ($ret_id == "") || ($ret_cam_id <> "C")) {
                                     $nome_local = "Nenhum local / Equipamento  encontrado com o CTI : " . $ret_id_cti;
                                     echo " <h2> CTI : " . $ret_id_cti . " </h2> <h6>  < Codificacao : -- " . $ret_cam_id . " --  ( " . $ret_id . " ) > </h6>";
                                     echo "<img src='img/dispositivo.jpg' alt='Dispositivo nao Localizado' width='250' height='350'>";

                                 } else
                                  {
                                     $sql1 = "SELECT * FROM tbequip where tbequip_id ='" . $ret_id . "' ";
                                     $resultado1 = mysqli_query($conn, $sql1) or die('Erro ao selecionar especialidade: ' . mysqli_error());
                                     $qtd = mysqli_num_rows($resultado1);  // $option = '';
                                     if (($qtd == 0) || ($ret_id == "0")) {
                                         $nome_local = "Nenhum local / Equipamento  encontrado";
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
                                                                          <img src="img/dispositivo.jpg" alt="Dispositivo nao Localizado" width="200" height="300">
                                                                      </div>                                                 
                                                                          <div>  
                                                                               </br> 
                                                                                  <label for="coord">ID Tab Equip  :</label>    
                                                                                    &nbsp &nbsp
                                                                                   <input id="plaqueta" name="plaqueta"  style="background-color:seashell;" type="text" placeholder="Numero da Plaqueta " readonly size = "15" value=" <?php echo $ret_id_cti; ?> ">
                                                                                    
                                                                             </div>  
                                                                    
                                                                    <br>
                                                                <div>
                                                             
						                                        <a href="busca_diversos.php?tbequip_id= <?php echo $ret_id; ?>" title="Consulta  Dados do Equipamento">Consultar Infs do Equipamento</a><br /><br />
                                                                    </div>
                                                                </form>
                                                                </div>
                                                                </section></div>
                                                                </section>
                                                                </section>
                                             
        
                                                                </body>

                                                                </html>
<?php

                                     } else {
                                         do {
                                             $row = mysqli_fetch_assoc($resultado1);
                                             $ret_idlocal = $row['tbequip_id'];
                                             //$ret_idsec = $row['tbequi'];
                                             $ret_plaqueta = $row['tbequip_plaqueta'];
                                             $ret_nome = $row['tbequi_nome'];
                                             $ret_equi_tipo = $row['tbequi_tipo'];
                                             $ret_monitor = $row['tbequip_monitor'];
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
                                             $ret_status = $row['status'];
                                             $ret_resp = $row['tbequip_resp'];
                                             $ret_cmei_id = $row['tbequi_tbcmei_id'];
                                             $ret_sec_id = $row['tbequip_sec'];
                                             $ret_app = $row['tbequi_app'];
                                             $ret_app_out = $row['tbequi_app_out'];
                                             $ret_proc = $row['tbequi_mod'];
                                             $ret_obs = $row['tbequi_obs'];
                                             $ret_ref = $row['tbequi_ref'];
                                             $ret_vid_uso = $row['tbequip_vid_uso'];
                                             $ret_vid_saidas = $row['tbequip_vid_saidas'];
                                             $ret_lacre = $row['tbequip_lacre'];
                                             $ret_fonte = $row['tbequip_fonte'];
                                             $ret_util_qtd = $row['tbequip_util_num'];
                                             $ret_util_nome = $row['tbequip_util_nomes'];
                                             $ret_ctrl_ti = $row['ctrl_ti'];
                                             $unidade = nomedolocal($conn, $ret_cmei_id);
                                             $codigos = "Cod Cmei : " . $ret_cmei_id . " Cod Sec : " . $ret_sec_id;
                                             $codificacao = "cti" . $ret_ctrl_ti . "-t" . $ret_idlocal . "-l-" . $ret_cmei_id . "-s-" . $ret_sec_id . " " . $ret_cam_id . " status " . $ret_status;
                                         } while ($row = mysqli_fetch_assoc($resultado1));
                                         //}
                                 
                                         ?>
                                            
                                
                                
                                              <form method="post" action="edita.php">
                                              <input type="hidden" name="loc_id" size=50 value= "<?php echo $ret_cmei_id ?>">
                                              <input type="hidden" name="sec_id" size=50 value= "">
                                    
                                            <section class="box ">
                                             <header class="panel_header">
                                            <h2 class="title pull-left"> <?php echo $unidade; ?></h2>                                
                                            <div class="actions panel_actions pull-right">
                                                <h5> 	<?php echo " Codificacao : " . $codificacao . "   </i> "; ?> </h5>
                                            </div>
                                                  </div>
                                                       <div>  
                                                            <?php echo " <i>Controle T.I :" . $ret_ctrl_ti; ?>  
                                               
                                                           </br> 
                                                             <label for="coord">Patrimonio :</label>    
                                                            &nbsp &nbsp
                                                            <input id="plaqueta" name="plaqueta"  style="background-color:seashell;" type="text" placeholder="Numero da Plaqueta " readonly size = "15" value=" <?php echo $ret_plaqueta; ?>">
                                                            &nbsp &nbsp <label for="coord">Nome do Equipamento : </label>   &nbsp  &nbsp
                                                
                                                            <input id="nome_equip" name="nome_equip" style="background-color:seashell;" type="text" placeholder="Nome do Computador " readonly size = "20" value=" <?php echo $ret_nome; ?>">
                                                             &nbsp  <label >Lacre TI : </label>    
                                                 
                                                             <input name="so_arq"  style="background-color:seashell;" type="text" id="so_arq" size="9" value=" <?php echo $ret_lacre; ?>" readonly />      
                                               
                                                   </div>  
                                            <div>
                                              <label  title=" <?php echo $codigos; ?>  " >Tipo equip: </label>    
                                                 &nbsp &nbsp
                                                <input name="tipo_equip"  style="background-color:seashell;" type="text" id="tipo_equip" size="25" value=" <?php echo $ret_equi_tipo; ?>" readonly />      
                                                    &nbsp &nbsp 
                                              <label >Sist. Operacional (SO) : </label>    
                                                    &nbsp &nbsp
                                                  <input name="so_tipo"  style="background-color:seashell;" type="text" id="so_tipo" size="35" value=" <?php echo $ret_so; ?>" readonly />      
                                                    &nbsp &nbsp
                                 
                                            </div>  
                                         <div>
                                              <label> Modelo Placa :     </label> &nbsp &nbsp
                                  
                                               <input name="placa"  style="background-color:seashell;" type="text" id="placa" size="87" value=" <?php echo $ret_mod_placa; ?>" readonly />      
                                      
                                  
                                            </div>

                                            <div>
                                              <label> Processador :     </label> &nbsp &nbsp
                                                <input name="processador" style="background-color:seashell;"  type="text" id="processador" size="87" value=" <?php echo $ret_proc; ?>" readonly  />                
                                    
                                            </div>  
                              
                                            <div>
                                               <label>Armaz. Tipo: </label>                         
                                                 <input name="arm_tipo" style="background-color:seashell;"  type="text" id="arm_tip" size="10" value=" <?php echo $ret_tparmaz; ?>" readonly />                  
                                    
                               
                                                <label>Tamanho: </label>                         
                                                <input name="arm_tam"  style="background-color:seashell;" type="text" id="arm_tam" size="5" value=" <?php echo $ret_armaz; ?>" readonly />
                                                  &nbsp 
                                                <label>Armaz  Secundario: </label> &nbsp &nbsp
                                                 <input name="arm-sec" style="background-color:seashell;"  type="text" id="arm_sec" size="10" value=" <?php echo $ret_arm_sec; ?>" readonly  />                
                               
                                                 &nbsp &nbsp<label>Tamanho: </label> &nbsp &nbsp
                                                <input name="arm_sec_tam" style="background-color:seashell;" type="text" id="arm_sec_tam" size="5" value=" <?php echo $ret_arm_sectam; ?>" readonly />
                                             </div>
                                
                                                 <div>
                                                <label>Memoria Tipo: <label>
                                                <input name="mem_tipo" style="background-color:seashell;"  type="text" id="mem_tipo" size="8" value=" <?php echo $ret_memoria; ?>" readonly />                
                               
                                                <label>Mem.Qtd: 
                                                <input name="mem_qtd"  style="background-color:seashell;" type="text" id="mem_qtd" size="7" value=" <?php echo $ret_memtam; ?>" readonly/></label>
                                    
                                            &nbsp &nbsp   &nbsp &nbsp  <label>Slots de Memoria:
                                                <input name="slots" style="background-color:seashell;" type="text" id="slots" value=" <?php echo $ret_slots; ?>" size="5"  readonly /></label>
                                             &nbsp &nbsp     <label>Slots em Uso &nbsp &nbsp
                                                <input name="slots_uso" style="background-color:seashell;" type="text" id="slots_uso" value=" <?php echo $ret_slots_uso; ?>" size="2"  readonly /></label>
                                       
                                            </div>  
                                                    <div>
                                                      <label  >Saidas de Video  no Dispositivo : &nbsp &nbsp 
                                                      <input name="slots_uso" type="text" id="slots_uso" value="<?php echo $ret_vid_saidas ?>" size="25"  readonly /></label>  
                                                       &nbsp &nbsp &nbsp &nbsp 
                                                       <label>Fonte  :
                                                    &nbsp   <input name="mon1_mar" type="text" id="mon1_mar" value="<?php echo $ret_fonte; ?>" size="25"  readonly /></label> <br /> 
                                                 
                                                 <label style=" color: #B4886b; font-weight: bold; " >Saidas Utilizadas: &nbsp   <?php echo $ret_vid_uso; ?> </label>
                                              </div>  
                               
                              <?php
                              if ($ret_monitor <> "Nenhum") {
                                  $sqlM = "SELECT * FROM tb_monitores where id_equip ='" . $ret_id . "' and status=1 ";
                                  $resultadoM = mysqli_query($conn, $sqlM) or die('Erro ao selecionar especialidade: ' . mysqli_error());
                                  $qtdM = mysqli_num_rows($resultadoM);  // $option = '';
                                  $rowM = mysqli_fetch_assoc($resultadoM);
                                  //  echo $qtdM;
                                  if ($qtdM == 0) {
                                      $tbmonitor = "VAZIO";
                                      ?>
                                                                        <div>  
                                                                           <label> Monitor Nao Vinculado           </label>
                                                    
                                                                        </div>
                                                              <?php
                                  } else {
                                      do {
                                          $ret_mon1_marca = $rowM['mon_marca'];
                                          $ret_mon1_tam = $rowM['mon_tam'];
                                          $ret_mon1_plaqueta = $rowM['mon_plaqueta'];
                                          $ret_mon1_tipo = $rowM['mon_tipo'];
                                          $ret_mon1_saida = $rowM['mon_saida'];
                                          $ret_mon1_ctrl_ti = $rowM['ctrl_ti'];
                                          ?>
                                                                        <div>  
                                                   
                                                                            <label>&nbsp Monitor  :
                                                                           <input name="mon1_mar" type="text" id="mon1_mar" value="<?php echo $ret_mon1_marca; ?>" size="15" style="border:0"; readonly  /></label>
                                                                            <label>Tam.: 
                                                                           <input name="mon1_tam" type="text" id="mon1_tam" value="<?php echo $ret_mon1_tam; ?>" size="1" style="border:0";  readonly /></label>
                                                                           <label>Patrimonio  :
                                                                           <input name="mon1_pat" type="text" id="mon1_pat" value="<?php echo $ret_mon1_plaqueta; ?>" size="10"  style="border:0"; readonly  /></label>
                                                                          <label>Tipo :
                                                                           <input name="mon1_tipo" type="text" id="mon1_tipo" value="<?php echo $ret_mon1_tipo; ?>" size="10" style="border:0";  readonly  />  
                                                                          <?php echo "CTI: " . $ret_mon1_ctrl_ti . " - "; ?> <label>*<?php echo $ret_mon1_saida; ?>* </label>    
                                                                        </div>
                                                                         <?php
                                      } while ($rowM = mysqli_fetch_assoc($resultadoM));
                                  }
                              } else {
                                  ?>
                                                               <div>  
                                                                           <label>Marca Monitor  :
                                                                           <input name="mon1_mar" type="text" id="mon1_mar" value="VAZIO" size="10"  readonly /></label>
                                                                            <label>Tam. Pol.: 
                                                                           <input name="mon1_tam" type="text" id="mon1_tam" value="VAZIO"" size="10"  readonly /></label>
                                                                           <label>Patrimonio :
                                                                           <input name="mon1_pat" type="text" id="mon1_pat" value="VAZIO" size="10"  readonly /></label>
                                                                        <label>Tipo :
                                                                           <input name="mon1_tipo" type="text" id="mon1_tipo" value="VAZIO" size="10"  readonly /></label> 
                                                                        </div>

                                                                  <?php
                              }

                              ?>
                                                                <div>
                                                                   <label>Utilizadores : (<?php echo $ret_util_qtd; ?>) </label> &nbsp &nbsp &nbsp
                                                                   <input name="mon1_mar" type="text" id="mon1_mar" value="<?php echo $ret_util_nome; ?>" size="83"  readonly />
                                                                </div> 
                                                             <div>
                                                                 <label>Aplicativos  :</label>  &nbsp &nbsp &nbsp &nbsp
                                                                 <input name="app_outros" type="text" id="app_outros" value=" <?php echo $ret_app . '   ' . $ret_app_out; ?>" size="85" readonly  /></label>
                                    
                                                            </div>  
                                                        <div>
                                                        <label>Obs:  &nbsp &nbsp
                                                           <input name="obs" type="text" id="obs" size="85" value=" <?php echo $ret_obs; ?>" readonly  /></label>
                                                                  <br />     <label>Responsavel : <?php echo $ret_resp; ?>  </label> &nbsp &nbsp &nbsp
                                                              &nbsp  <?php echo "    <sup> Cadastrado por : " . $ret_tec . "  em  " . $ret_datalanc . "    </sup>"; ?>     &nbsp  &nbsp  
                                    
                                                        </div>
                                
                                                    <div>
                                                    <a href="editaequip_x2.php?tbequip_id= <?php echo $ret_id; ?>" title="Alterar Local do Equipamento">Alterar Local do Equipamento</a><br />
                                                    <a href="editaequip2.php?tbequip_id= <?php echo $ret_id; ?>" title="Alterar Dados do Equipamento">Alterar Dados do Equipamento</a><br />
							                        <a href="busca_diversos.php" title="Alterar Dados do Equipamento">Consultar Infs do Equipamento</a><br />
							                        <a href="qrimpressao_termo.php?var= <?php echo $ret_ctrl_ti; ?>"  title="Termo do Equipamento">Gerar Termo do Equipamento</a>   &nbsp   &nbsp   &nbsp 
                                                    <a href="qrimpressao_ti.php?var= <?php echo $ret_ctrl_ti; ?>"  title="Impressao QR Code">Impressao QRCode</a><br />
						                            <a href="retira_equip.php?cti= <?php echo $ret_ctrl_ti; ?>"  title="Excluir Equipamento">Excluir / Baixar  Equipamento</a><br />
                                                    <a href="ret_dados_alt.php?cti=<?php echo $ret_ctrl_ti; ?>"  title="Historico de equipamento">Historico de alteraçoes</a><br />
                                                    
                                                    </div>
                                                      <?php
                                     }
                                 }
                                 ?>
                          
                                     </form>
                            </div>
                        </section></div>
                </section>
            </section>
                                             
        
</body>

</html>
