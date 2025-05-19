<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";
   include "bco_fun.php";

$ret_plaq = $_GET['pat']; // RECEBE NUM DE PATRIMONIO 
$existe = ret_ctrl_ti($conn, $ret_plaq);
if ($existe=="1")// existe ja 1 registro
{
    echo " <br> <br> <center><b>   Como Informado anteriormente , ja existe um registo de controle de T.I com o numero " . $ret_plaq . " Verifique se a informaçao foi digitada corretamente !  <b> </center>  ";
    echo " <br> <br><center> <input type='button' value='Voltar' onclick='javascript: history.go(-1)' </center> ";
} 
else // ta liberado a inserçao nesse ctrl_ti
{

    if (($ret_plaq == NULL)) {
        echo "<BR><BR> <CENTER> Plaqueta de Patrimonio Informado de maneira INCORRETA !  </CENTER> <BR><BR> ";
        echo " <center> <input type='button' value='Voltar' onclick='javascript: history.go(-1)' </center> ";
    } else {
        $ret_cmei_id = $_GET['loc'];
        $ret_sec_id = $_GET['sec'];
        $ret_tip_id = $_GET['tipo'];
        $tipo = $ret_tip_id;
        switch ($tipo) {
            case '0': {
            }
                break;
            case '1': {
                if ($ret_plaq == "") {
                    echo " <center> <p style=color:blue> <b> Voce deve inserir um numero de Patrimonio no campo NUMERO DE PATRIMONIO  </b>  </p></center> ";
                    echo " <center> <input type='button' value='Voltar' onclick='javascript: history.go(-1)' </center> ";
                } else {

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
    <script src="js/java_busplaq.js"></script>
    <!-- Adicionando Javascript -->
    <script>


        $(document).ready(function () {

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
                                 ?>
                                
                                <form method="post" action="salvaequip.php">
                                  <input type="hidden" name="loc_id" size=50 value= "<?php echo $ret_cmei_id ?>">
                                  <input type="hidden" name="sec_id" size=50 value= "<?php echo $ret_sec_id ?>">
                                  <input type="hidden" name="modalidade" size=50 value= "<?php echo $tipo ?>">
                                    
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
                                                   <?php
                                                   $sql = "SELECT * FROM tbsecretaria where sec_id ='" . $ret_sec_id . "'";
                                                   $resultado = mysqli_query($conn, $sql) or die('Erro ao selecionar especialidade: ' . mysql_error());
                                                   $option = '';
                                                   while ($row = mysqli_fetch_array($resultado)) {
                                                       $option .= "<option value = '" . $row['sec_id'] . "'>" . $row['sec_nome'] . "   </option>";
                                                   }
                                                   ?>
                                                  <!--     <select name="sec_id" required>          
                                                      <?php
                                                      //   echo "<option value='0'>  </option>";
                                                      //      echo $option;
                                                      ?>        
                                                   </select> 
                                                      -->
                                              <h4 class="title pull-left"> <?php echo $option; ?></h4> 
                                              <br />
                                              </div> 
                              <div>  
                                                </br> 
                                                 <label for="coord">Plaqueta Numero :</label>    
                                                &nbsp &nbsp
                                                <input id="plaqueta" name="plaqueta" type="text" placeholder="Numero da Plaqueta " size = "25" value= "<?php echo "PENDENTE" ?>">
                                                &nbsp &nbsp <label for="coord">Nome do Equipamento : </label>    
                                                &nbsp &nbsp
                                                <input id="nome_equip" name="nome_equip" type="text" placeholder="Nome do Computador " size = "25" required>
                                       </div>  
                              <div>
                                  <label >Tipo equip: </label>    
                                     &nbsp &nbsp
                                    <select name="tipo_equip">
                                                <option value=""></option>
                                                <option value="Desktop"selected>Desktop</option>
                                                <option value="Notebook">Notebook</option>
                                                <option value="Tablet">Tablet</option>
                                                <option value="Servidor">Servidor</option>
                                               </select>
                                        &nbsp &nbsp
                                  <label >Sist. Operacional (SO) : </label>    
                                        &nbsp &nbsp
                                    <select name="so_tipo">
                                                <option value=""></option>
                                                <option value="WINDOWS ANT">Windows Anteriores</option>                
                                                <option value="WINDOWS XP">Windows XP</option>        
                                                <option value="WINDOWS 7">Windows 7</option>
                                                <option value="WINDOWS 8">Windows 8</option>
                                                <option value="WINDOWS 8 64Bits_Home">Windows 8 64 Bits HOME</option>
                                                <option value="WINDOWS 10 64Bits"selected>Windows 10 64 Bits</option>
                                                <option value="WINDOWS 10 64Bits_Home"selected>Windows 10 64 Bits HOME</option>
                                                <option value="WINDOWS 11 64Bits">Windows 11 64 Bits</option>
                                                <option value="WINDOWS 11 64Bits_Home">Windows 11 64 Bits HOME</option>
                                                <option value="Linux">Linux</option>
                                                <option value="Android">Android</option>
                                                <option value="IOS">IOS</option>
                                     </select>
                                        &nbsp &nbsp
                                  <label >SO Arquitetura : </label>    
                                        &nbsp &nbsp
                                    <select name="so_arq">
                                                <option value=""></option>
                                                <option value="32Bits">32 Bits</option>                
                                                <option value="64Bits"selected>64 Bits</option>        
                                                <option value="Outros">Outros</option>
                                                

                                     </select>
                                </div>  
                               <div>
                                  <label> Modelo Placa :     
                                                  <?php

                                                  $sql_pl = "SELECT * FROM tb_placa order by p_desc";
                                                  $res_pl = mysqli_query($conn, $sql_pl) or die('Erro ao selecionar especialidade: ' . mysql_error());
                                                  $optionp = '';
                                                  while ($row = mysqli_fetch_array($res_pl)) {
                                                      $optionp .= "<option value = '" . $row['p_id'] . "'>" . mb_strimwidth($row['p_desc'], 0, 81, "...") . "   </option>";

                                                  }
                                                  ?>
                                                   <select name="placa" required maxlength="85" >          
                                                      <?php
                                                      //   echo "<option value='0'>  </option>";
                                                      echo $optionp;
                                                      ?>        
                                                    </select>         </label>  
                                   <a href="" title="Adicionar nova Placa Mãe ">+</a>
                                </div>
                                <div>
                                  <label> Processador :     
                                                  <?php
                                                  $sql_proc = "SELECT * FROM tb_processadores order by proc_nome";
                                                  $res_proc = mysqli_query($conn, $sql_proc) or die('Erro ao selecionar especialidade: ' . mysql_error());
                                                  $option = '';
                                                  while ($row = mysqli_fetch_array($res_proc)) {
                                                      $option .= "<option value = '" . $row['proc_id'] . "'>" . mb_strimwidth($row['proc_nome'], 0, 88, "...") . "   </option>";
                                                  }
                                                  ?>
                                                   <select name="processador" required  >          
                                                      <?php
                                                      //   echo "<option value='0'>  </option>";
                                                      echo $option;
                                                      ?>        
                                                    </select>         </label>                         
                                  <a href="" title="Adicionar novo Processador ">+</a>
                                </div>  
                                <div>
                                   <label>Armaz. Tipo: </label>                         
                                      <select name="arm_tipo">
                                            <option value="VAZIO"></option>
                                                <option value="IDE">HD IDE</option>                
                                                <option value="SATA_HD">HD SATA </option>        
                                                <option value="SATA_SSD">SSD SATA </option>        
                                                <option value="NVMe">NVMe</option>
                                                <option value="NAS">NAS</option>
                                                <option value="SCSI">SCSI</option>
                                     </select>
                                    <label>Tamanho: </label>                         
                                    <input name="arm_tam" type="text" id="arm_tam" size="5" required />
                                      &nbsp &nbsp  &nbsp &nbsp
                                    <label>Armaz  Secundario:
                                      <select name="arm_sec">
                                               <option value="VAZIO"></option>
                                                <option value="IDE">HD IDE</option>                
                                                <option value="SATA_HD">HD SATA </option>        
                                                <option value="SATA_SSD">SSD SATA </option>        
                                                <option value="NVMe">NVMe</option>
                                                <option value="SSDm">SSD mSATA</option>
                                                <option value="SSDu2">SSD U.2</option>
                                     </select>
                                   &nbsp<label>Tamanho: </label>
                                    <input name="arm_sec_tam" type="text" id="arm_sec_tam" size="5"  />
                                 </div>
                                    <div>
                                    <label>Memoria Tipo: <label>
                                      <select name="mem_tipo">
                                                <option value=""></option>
                                                <option value="DDR">DDR</option>                
                                                <option value="DDR2">DDR2</option>        
                                                <option value="DDR3">DDR3</option>
                                                <option value="DDR4">DDR4</option>
                                                <option value="DDR5">DDR5</option>

                                     </select>
                               
                                    <label>Mem.Qtd: 
                                    <input name="mem_qtd" type="text" id="mem_qtd" size="10" required /></label>
                                   &nbsp &nbsp  <label>Slots de Memoria:
                                    <input name="slots" type="text" id="slots" value="" size="5"   /></label>
                                      <label>Slots em Uso 
                                    <input name="slots_uso" type="text" id="slots_uso" value="" size="5"   /></label>
                                </div>  
                                        <div>
                                   <label>Tipo Monitor : </label>
                                      <select name="mon_tipo">
                                                <option value=""></option>
                                                <option value="Unico">Unico</option>                
                                                <option value="Duplo">Duplo</option>        
                                                <option value="Outros">Outros</option>
                                      </select>
                                </div>  
                                <div>  
                                       <label>Marca Monitor (1) : 
                                       <input name="mon1_mar" type="text" id="mon1_mar" value="" size="10"  required /></label>
                                        <label>Tam. Pol.: 
                                       <input name="mon1_tam" type="text" id="mon1_tam" value="" size="10"  required /></label>
                                       <label>Patrimonio do Monitor (1) :
                                       <input name="mon1_pat" type="text" id="mon1_pat" value="" size="10"  required /></label>
                                </div>  
                                    <div>
                                         <label>Marca Monitor (2) :
                                       <input name="mon2_mar" type="text" id="mon2_mar" value="" size="10"  /></label>
                                        <label>Tam. Pol.: 
                                       <input name="mon2_tam" type="text" id="mon2_tam" value="" size="10"   /></label>
                                       <label>Patrimonio do Monitor (1) :
                                       <input name="mon2_pat" type="text" id="mon2_pat" value="" size="10"   /></label>
                                            </div>  
                                <div>
                                         <label>Aplicativos  :</label>  &nbsp &nbsp &nbsp  
                                          <input  name="office" id="office" value="Office" type="checkbox" >
                                           &nbsp <label>Office</label>&nbsp &nbsp &nbsp &nbsp 
                                          <input  name="autocad" id="autocad" value="AutoCad" type="checkbox">
                                         &nbsp   <label>AutoCad</label>      &nbsp &nbsp 
                                    
                                    <label>Outro (s) :
                                         <input name="app_outros" type="text" id="app_outros" value="" size="38"  /></label>
                                    </div>  
                                 <div>
                                <label>Obs:
                                  <input name="obs" type="text" id="obs" size="80" /></label>
                                </div>
                                <br>
                            <div>
                              <button  type="submit" id="btn_cadastro_unidade" name="btn_cadastro_unidade" class="btn btn-primary">Cadastrar</button>
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
            }
                break;
            case '2': {
                // header("Location: chk_plaqueta.php?id=" . $local_id . "&tipo=2");
                include "../validar_session.php";
                include "../Config/config_sistema.php";

                // $ret_cmei_id = $local_id;// $_GET['id'];

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
                ?>
                                


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
                            
                                
                                                                  <form method="post" action="cadequip2a.php">
                                                                         <input type="hidden" name="loc_id" size=50 value= "<?php echo $ret_cmei_id ?>">
                                                                         <input type="hidden" name="sec_id" size=50 value= "<?php echo $ret_sec_id ?>">
                                                                         <input type="hidden" name="tipo_id" size=50 value= "<?php echo $ret_tip_id ?>">
                                                                      <input type="hidden" name="plaq_id" size=50 value= "<?php echo $ret_plaq ?>">
                                                                      <input type="hidden" name="modalidade" size=50 value= "<?php echo $tipo ?>">
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
                              
                                                                                           <?php
                                                                                           $sql = "SELECT * FROM tbsecretaria where sec_id ='" . $ret_sec_id . "'";
                                                                                           $resultado = mysqli_query($conn, $sql) or die('Erro ao selecionar especialidade: ' . mysql_error());
                                                                                           $option = '';
                                                                                           while ($row = mysqli_fetch_array($resultado)) {
                                                                                               $option .= "<option value = '" . $row['sec_id'] . "'>" . $row['sec_nome'] . "   </option>";
                                                                                           }
                                                                                           ?>
                                                                                          <!--     <select name="sec_id" required>          
                                                                                              <?php
                                                                                              //   echo "<option value='0'>  </option>";
                                                                                              //      echo $option;
                                                                                              ?>        
                                                                                           </select> 
                                                                                              -->
                                                                                      <h4 class="title pull-left"> <?php echo $option; ?></h4> 
                                                                                      <br />
                                                                                      </div> 
                                                                                        <?php
                                                                                        $sql_proc = "SELECT * FROM tb_kits order by descritivo";
                                                                                        $res_proc = mysqli_query($conn, $sql_proc) or die('Erro ao selecionar especialidade: ' . mysql_error());
                                                                                        $option2 = '';
                                                                                        while ($row = mysqli_fetch_array($res_proc)) {
                                                                                            $option2 .= "<option value = '" . $row['id'] . "'>" . mb_strimwidth($row['descritivo'], 0, 88, "...") . "   </option>";
                                                                                            $ret_kit_id = $row['id'];
                                                                                        }
                                                                                        ?>
                                                                      <br /><br />              
                                                                      <select name="kit" required  >          
                                                                                      <?php
                                                                                      //   echo "<option value='0'>  </option>";
                                                                                      echo $option2;
                                                                                      ?>        
                                                                                     </select>         </label>                         
                                                                                    <a href="" title="Adicionar novo Processador ">+</a><br /><br />
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
            case '3': {
                //   echo "tipo ".$tipo." Local ".$local." Local ID ".$local_id;
                header("Location: cadequip2.php?id=" . $local_id . "");
            }
                break;
            case '4': { // cadastro de tv apos checagem do patrmonio
                // header("Location: chk_plaqueta.php?id=" . $local_id . "&tipo=2");
                include "../validar_session.php";
                include "../Config/config_sistema.php";

                // $ret_cmei_id = $local_id;// $_GET['id'];

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
                ?>
                                


                                        ?>
                                        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                        <html>
                                            <head>
                                            <title>Cadastro de Equipamentos  TV </title>
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
                                                                         <input type="hidden" name="loc_id" size=50 value= "<?php echo $ret_cmei_id ?>">
                                                                         <input type="hidden" name="sec_id" size=50 value= "<?php echo $ret_sec_id ?>">
                                                                         <input type="hidden" name="tipo_id" size=50 value= "<?php echo $ret_tip_id ?>">
                                                                      <input type="hidden" name="ctrl_ti" size=50 value= "<?php echo $ret_plaq ?>">
                                                                      <input type="hidden" name="modalidade" size=50 value= "<?php echo $tipo ?>">
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
                              
                                                                                           <?php
                                                                                           $sql = "SELECT * FROM tbsecretaria where sec_id ='" . $ret_sec_id . "'";
                                                                                           $resultado = mysqli_query($conn, $sql) or die('Erro ao selecionar especialidade: ' . mysql_error());
                                                                                           $option = '';
                                                                                           while ($row = mysqli_fetch_array($resultado)) {
                                                                                               $option .= "<option value = '" . $row['sec_id'] . "'>" . $row['sec_nome'] . "   </option>";
                                                                                           }
                                                                                           ?>
                                                                                          <!--     <select name="sec_id" required>          
                                                                                              <?php
                                                                                              //   echo "<option value='0'>  </option>";
                                                                                              //      echo $option;
                                                                                              ?>        
                                                                                           </select> 
                                                                                              -->
                                                                                      <h4 class="title pull-left"> <?php echo $option; ?></h4> 
                                                                                      <br />
                                                                                      </div> 
                                                                       
                                                                      <br />
                                                                      <div>
                                                                            <?php echo "<i style='color: green; font-family: Monaco; ' >  Controle T.I. " . $ret_plaq . " </i> "; ?> <br />
                                                                          
                                                                           <label>Plaq.  Patrimonio da TV:     </label>
                                                                           &nbsp  &nbsp  <input id="patrimonio" name="patrimonio"  style="background-color:seashell;" type="text" value="<?php echo strtoupper($ret_plaq); ?> " size = "15" >
                                                                                                        
                                    
                                                                        </div>  
                                                                        <div>
                                                                          <label> Marca / Modelo  :     
                                                                            <input id="marca" name="marca" style="background-color:seashell;"  type="text"  size = "30" value="">          
                                                                           &nbsp &nbsp  &nbsp &nbsp<label>Tamanho (Pol): </label>                         
                                                                            <input name="tam"  style="background-color:seashell;" type="text" id="tam" size="5" value="" />
                                                                      
                                                                        </div>
                                                                        <div>
                                                                            <label>Nome Responsavel :
                                                                             <input id="resp" name="resp" style="background-color:seashell;"  type="text" value="<?php echo retRESP_by_cmeiID($conn, $ret_cmei_id); ?> "  size = "52" required>
                                                                        </div>    
                                                                      
                                                                      <div>
                                                                            <label>Obs:
                                                                             <input id="obs" name="obs" style="background-color:seashell;"  type="text" value="" size = "65" required>
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
            case '5': { // cadastro de switch  apos checagem do patrmonio
                // header("Location: chk_plaqueta.php?id=" . $local_id . "&tipo=2");
                include "../validar_session.php";
                include "../Config/config_sistema.php";

                // $ret_cmei_id = $local_id;// $_GET['id'];

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
                ?>
         
                                        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                        <html>
                                            <head>
                                            <title>Cadastro de Switch </title>
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
                                                                         <input type="hidden" name="loc_id" size=50 value= "<?php echo $ret_cmei_id ?>">
                                                                         <input type="hidden" name="sec_id" size=50 value= "<?php echo $ret_sec_id ?>">
                                                                         <input type="hidden" name="tipo_id" size=50 value= "<?php echo $ret_tip_id ?>">
                                                                      <input type="hidden" name="ctrl_ti" size=50 value= "<?php echo $ret_plaq ?>">
                                                                      <input type="hidden" name="modalidade" size=50 value= "<?php echo $tipo ?>">
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
                              
                                                                                           <?php
                                                                                           $sql = "SELECT * FROM tbsecretaria where sec_id ='" . $ret_sec_id . "'";
                                                                                           $resultado = mysqli_query($conn, $sql) or die('Erro ao selecionar especialidade: ' . mysql_error());
                                                                                           $option = '';
                                                                                           while ($row = mysqli_fetch_array($resultado)) {
                                                                                               $option .= "<option value = '" . $row['sec_id'] . "'>" . $row['sec_nome'] . "   </option>";
                                                                                           }
                                                                                           ?>
                                                                                          <!--     <select name="sec_id" required>          
                                                                                              <?php
                                                                                              //   echo "<option value='0'>  </option>";
                                                                                              //      echo $option;
                                                                                              ?>        
                                                                                           </select> 
                                                                                              -->
                                                                                      <h4 class="title pull-left"> <?php echo $option; ?></h4> 
                                                                                      <br />
                                                                                      </div> 
                                                                       

                                                                      <br />
                                                                      <div>
                                                                        <?php echo "<i style='color: green; font-family: Monaco; ' >  Controle T.I. " . $ret_plaq . " </i> "; ?> <br />
                                                                          <label> Patrimonio do SWITCH:     </label>
                                                                         &nbsp  &nbsp  &nbsp  &nbsp  <input id="patrimonio" name="patrimonio"  style="background-color:seashell;" type="text" value="<?php echo strtoupper($ret_plaq); ?> " size = "15" >
                                                                              &nbsp   &nbsp  &nbsp<label>POE : &nbsp &nbsp
                                                                             <select name="poe" title="Selecione uma opção"  style="background-color:#FEFFFC"  >
                                                                                <option value="SIM">Sim</option>
                                                                                <option value="NAO" selected>Não</option>
                                                                                
                                                                           </select>    </label>
                            
                                    
                                                                        </div>  
                                                                        <div>
                                                                          <label> Marca / Modelo  :     
                                                                            <input id="marca" name="marca" style="background-color:seashell;"  type="text"  size = "20" value="">          
                                                                            &nbsp
                                                                            <label> Gerenciavel  :     
                                                                           <select name="gerenciavel">
                                                                                <option value=""></option>
                                                                                <option value="SIM">Sim</option>                
                                                                                <option value="NAO" selected >Não</option>        
                                                                           </select> </label>
                                                                       </div>
                                                                 


                                                                  <div>
                                                                          
                                                                     <script> 
                                                                                function calcular() {
                                                                                  var n1 = parseInt(document.getElementById('portas_tot').value, 10);
                                                                                  var n2 = parseInt(document.getElementById('portas_uso').value, 10);
                                                                                  //document.getElementById('portas_livre').innerHTML = n1 - n2;
                                                                                    document.getElementById('portas_livre').value = n1 - n2;
                                                                                }
                                                                    </script>

                                                                      <label>Portas  (total): </label>                         
                                                                            <input name="portas_tot"  style="background-color:seashell;" type="text" id="portas_tot" size="2" value="" />
                                                                           
                                                                      <label> Portas Utilizadas  :     
                                                                            <input id="portas_uso" name="portas_uso" style="background-color:seashell;"  type="text"  size = "2" value="" onblur="calcular()" >          
                                                                      &nbsp &nbsp<label>Portas Disponiveis </label>                         
                                                                            <input name="portas_livre"  style="background-color:seashell;" type="text" id="portas_livre" size="2" value="" /> 
                                                                      </div>

                                                                         <div>
                                                                      <label>Rack ( identificaçao ): </label>                         
                                                                            <input name="rack_id"  style="background-color:seashell;" type="text" id="portas_tot" size="5" value="" />
                                                                
                                                                             
                                                                            &nbsp     <label>Obs:   &nbsp 
                                                                             <input id="obs" name="obs" style="background-color:seashell;"  type="text" value="" size = "25" >
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
            case '6': { // cadastro de impressoras  apos checagem do patrmonio
                // header("Location: chk_plaqueta.php?id=" . $local_id . "&tipo=2");
                include "../validar_session.php";
                include "../Config/config_sistema.php";

                // $ret_cmei_id = $local_id;// $_GET['id'];

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
                ?>
         
                                        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                        <html>
                                            <head>
                                            <title>Cadastro de Impressoras </title>
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
                                                                         <input type="hidden" name="loc_id" size=50 value= "<?php echo $ret_cmei_id ?>">
                                                                         <input type="hidden" name="sec_id" size=50 value= "<?php echo $ret_sec_id ?>">
                                                                         <input type="hidden" name="tipo_id" size=50 value= "<?php echo $ret_tip_id ?>">
                                                                      <input type="hidden" name="ctrl_ti" size=50 value= "<?php echo $ret_plaq ?>">
                                                                      <input type="hidden" name="modalidade" size=50 value= "<?php echo $tipo ?>">
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
                              
                                                                                           <?php
                                                                                           $sql = "SELECT * FROM tbsecretaria where sec_id ='" . $ret_sec_id . "'";
                                                                                           $resultado = mysqli_query($conn, $sql) or die('Erro ao selecionar especialidade: ' . mysql_error());
                                                                                           $option = '';
                                                                                           while ($row = mysqli_fetch_array($resultado)) {
                                                                                               $option .= "<option value = '" . $row['sec_id'] . "'>" . $row['sec_nome'] . "   </option>";
                                                                                           }
                                                                                           ?>
                                                                                          <!--     <select name="sec_id" required>          
                                                                                              <?php
                                                                                              //   echo "<option value='0'>  </option>";
                                                                                              //      echo $option;
                                                                                              ?>        
                                                                                           </select> 
                                                                                              -->
                                                                                      <h4 class="title pull-left"> <?php echo $option; ?></h4> 
                                                                                      <br />
                                                                                      </div> 
                                                                       
                                                                      <br />
                                                                      <div>
                                                                            <?php echo "<i style='color: green; font-family: Monaco; ' >  Controle T.I. " . $ret_plaq . " </i> "; ?> <br />
                                                                        
                                                                          <div>
                                                                          <label> Impressora   &nbsp  
                                                                          </div>  

                                                                          <div>
                                                                          <label> Marca / Modelo  :   &nbsp  
                                                                            <input id="marca" name="marca" style="background-color:seashell;"  type="text"  size = "35" value="">          
                                                                       
                                                                        </div>  
                                                                          <label> Patrimonio : </label>
                                                                           &nbsp  &nbsp  <input id="patrimonio" name="patrimonio"  style="background-color:seashell;" type="text" value="<?php echo strtoupper($ret_plaq); ?> " size = "10" required>
                                                                        &nbsp  &nbsp &nbsp
                                                                          &nbsp  &nbsp &nbsp<label>Conexão  :  </label>                         
                                                                           &nbsp  &nbsp &nbsp  <input name="porta"  style="background-color:seashell;" type="text" id="porta" size="10" value="USB" />
                                                                       </div>
                                                                      
                                                                  <div>
                                                                  
                                                                      <table>
                                                                         <tr>
                                                                               <td> &nbsp &nbsp  </td>
                                                                             <td><input type="checkbox" name="componente1" value="1"> </td>
                                                                             <td><label>Mono </label> </td>
                                                                              <td> &nbsp &nbsp  </td>
                                                                         </tr>
                                                                           <tr>
                                                                               <td> &nbsp &nbsp  </td>
                                                                               <td><input type="checkbox" name="componente2" value="1"> &nbsp </td>
                                                                             <td><label>Colorida </label> </td>
                                                                            <td> &nbsp &nbsp  </td>
                                                                           </tr>
                                                                           <tr>
                                                                                <td> &nbsp &nbsp  </td>
                                                                               <td><input type="checkbox" name="componente3" value="1"> &nbsp </td>
                                                                             <td><label>Scanner   </label> </td>
                                                                             <td> &nbsp &nbsp  </td>
                                                                           </tr>
                                                                            <tr>
                                                                                <td> &nbsp &nbsp  </td>
                                                                                <td><input type="checkbox" name="componente4" value="1"> &nbsp </td>
                                                                             <td><label>Copiadora   </label> </td>
                                                                             <td> &nbsp &nbsp  </td>
                                                                           </tr>
                                                                     </table>
                                                                  
                                                                          </div>
<br />                                                                  
                                                                  
                                                                  <div>
                                                                            <label>Obs:
                                                                    &nbsp &nbsp <input id="obs" name="obs" style="background-color:seashell;"  type="text" value="" size = "45" required>
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
            case '7': { // cadastro de tv apos checagem do patrmonio
                // header("Location: chk_plaqueta.php?id=" . $local_id . "&tipo=2");
                include "../validar_session.php";
                include "../Config/config_sistema.php";

                // $ret_cmei_id = $local_id;// $_GET['id'];

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
                ?>
         
                                        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                        <html>
                                            <head>
                                            <title>Cadastro de Equipamentos  TV </title>
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
                                                            
                                                                  <form method="post" action="#">
                                                                         <input type="hidden" name="loc_id" size=50 value= "<?php echo $ret_cmei_id ?>">
                                                                         <input type="hidden" name="sec_id" size=50 value= "<?php echo $ret_sec_id ?>">
                                                                         <input type="hidden" name="tipo_id" size=50 value= "<?php echo $ret_tip_id ?>">
                                                                      <input type="hidden" name="ctrl_ti" size=50 value= "<?php echo $ret_plaq ?>">
                                                                      <input type="hidden" name="modalidade" size=50 value= "<?php echo $tipo ?>">
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
                              
                                                                                           <?php
                                                                                           $sql = "SELECT * FROM tbsecretaria where sec_id ='" . $ret_sec_id . "'";
                                                                                           $resultado = mysqli_query($conn, $sql) or die('Erro ao selecionar especialidade: ' . mysql_error());
                                                                                           $option = '';
                                                                                           while ($row = mysqli_fetch_array($resultado)) {
                                                                                               $option .= "<option value = '" . $row['sec_id'] . "'>" . $row['sec_nome'] . "   </option>";
                                                                                           }
                                                                                           ?>
                                                                                          <!--     <select name="sec_id" required>          
                                                                                              <?php
                                                                                              //   echo "<option value='0'>  </option>";
                                                                                              //      echo $option;
                                                                                              ?>        
                                                                                           </select> 
                                                                                              -->
                                                                                      <h4 class="title pull-left"> <?php echo $option; ?></h4> 
                                                                                      <br />
                                                                                      </div> 
                                                                       
                                                                      <br />
                                                                      <div>
                                                                           <?php echo "<i style='color: green; font-family: Monaco; ' >  Controle T.I. " . $ret_plaq . " </i> "; ?> <br />
                                                                          <label> Nome da Rede WIFI :     </label>
                                                                           &nbsp  &nbsp  <input id="processador" name="processador"  style="background-color:seashell;" type="text" value="<?php echo strtoupper($ret_plaq); ?> " size = "15" required>
                                                                                                        
                                    
                                                                        </div>  
                                                                        <div>
                                                                          <label> Marca / Modelo  :     
                                                                            <input id="placa" name="placa" style="background-color:seashell;"  type="text"  size = "35" value="">          
                                                                           &nbsp  &nbsp &nbsp<label>Senha: </label>                         
                                                                            <input name="tam"  style="background-color:seashell;" type="text" id="tam" size="10" value="" />
                                                                       </div>
                                                                        <div>
                                                                            <label>Obs:
                                                                             <input id="obs" name="obs" style="background-color:seashell;"  type="text" value="" size = "75" required>
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
            case '8': { // cadastro direto  de monitores 
                // header("Location: chk_plaqueta.php?id=" . $local_id . "&tipo=2");
                include "../validar_session.php";
                include "../Config/config_sistema.php";

                if (isset($_GET['ID_PC'])) {
                    $id_equip = $_GET['ID_PC'];// id index exists
                } else {
                    $id_equip = "";// id index no exists
                }

                // $ret_cmei_id = $local_id;// $_GET['id'];

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
                insere_vinculo($conn, $ret_plaq, $ret_cmei_id, $ret_sec_id, $_SESSION['nome_usuario'], "Monitor");
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
                                                function preencheCampo_mon(el)
                                                     {
                                                    let value = $(el).val();
                                                    let value_0 = "--------------------------------------------------------------------------------------------";
                                                      //  document.getElementById('mon1_mar').disabled = false;
                                                         $('input[name="id_mon"]').val(value);
                                                         $('input[name="mon1_tam"]').val(value_0);
                                                    $('input[name="mon1_mar"]').val(value_0);
                                                         $("#mon1_mar").prop("disabled", true); 
                                                    $("#mon1_tam").prop("disabled", true); 
                                                }

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
                                                            
                                                                  <form method="post" action="salvaequip_div.php">
                                                                         <input type="hidden" name="loc_id" size=50 value= "<?php echo $ret_cmei_id ?>">
                                                                         <input type="hidden" name="sec_id" size=50 value= "<?php echo $ret_sec_id ?>">
                                                                         <input type="hidden" name="tipo_id" size=50 value= "<?php echo $ret_tip_id ?>">
                                                                        <input type="hidden" name="ctrl_ti" size=50 value= "<?php echo $ret_plaq ?>">
                                                                      <input type="hidden" name="modalidade" size=50 value= "<?php echo $tipo ?>">
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
                              
                                                                                           <?php
                                                                                           $sql = "SELECT * FROM tbsecretaria where sec_id ='" . $ret_sec_id . "'";
                                                                                           $resultado = mysqli_query($conn, $sql) or die('Erro ao selecionar especialidade: ' . mysql_error());
                                                                                           $option = '';
                                                                                           while ($row = mysqli_fetch_array($resultado)) {
                                                                                               $option .= "<option value = '" . $row['sec_id'] . "'>" . $row['sec_nome'] . "   </option>";
                                                                                           }
                                                                                           ?>
                                                                                          <!--     <select name="sec_id" required>          
                                                                                              <?php
                                                                                              //   echo "<option value='0'>  </option>";
                                                                                              //      echo $option;
                                                                                              ?>        
                                                                                           </select> 
                                                                                              -->
                                                                                      <h4 class="title pull-left"> <?php echo $option; ?></h4> 
                                                                                      <br />
                                                                                      </div> 
                                                                       
                                                                      <br />
                                                                      <div>
                                                                            <?php echo "<i style='color: green; font-family: Monaco; ' >  Controle T.I. " . $ret_plaq . " </i> "; ?> <br />
                                                                          
         
 


                                                                          <div>  
                                                                                        <label> Selecione o Monitor :     </label>    &nbsp   &nbsp  &nbsp   &nbsp
                                                                                           <?php
                                                                                           $sql = "SELECT * FROM tb_kits where tipo ='MONITOR' ORDER BY descritivo";
                                                                                           $resultado = mysqli_query($conn, $sql) or die('Erro ao selecionar especialidade: ' . mysql_error());
                                                                                           $option = '';
                                                                                           while ($row = mysqli_fetch_array($resultado)) {
                                                                                               $option .= "<option value = '" . $row['id'] . "'>" . $row['descritivo'] . "   </option>";
                                                                                           }
                                                                                           ?>
                                                                                               <select name="sec_id" title="Selecione o Monitor caso ja esteja  cadastrado ou insira  manualmente os dados " onchange="preencheCampo_mon(this);">          
                                                                                              <?php
                                                                                                 echo "<option value='0'>  </option>";
                                                                                                    echo $option;
                                                                                              ?>        
                                                                                           </select> 
                                                                                               <input id="id_mon" name="id_mon" style="background-color:white; color:wheat;"  type="hidden"  value="0"title="0 (zero) para nenhum vinculo com um Monitor" size = "5" readonly>                
                                                                                      <br />
                                                                                      </div> 
                                                                       
                                                                          <br />

                                                                           <div>
                                                                          <label> Marca / Modelo  :     
                                                                            <input id="mon1_mar" name="mon1_mar" style="background-color:seashell;"  type="text"  size = "38 value=""> <br />         
                                                                        </div> 

                                                                           <label>Tipo de Tela  (Pol): </label>      &nbsp &nbsp                    
                                                                              <select title="Selecione uma opção" id="mon_cat" name="mon_cat"  >
                                                                                    <option value="Vazio" default></option>
                                                                                    <option value="Widescreen" selected >Widescreen</option>     
                                                                                    <option value="UltraWide">UltraWide</option>                
                                                                                    <option value="CRT">CRT</option>                    
                                                                                </select> 

                                                                        &nbsp &nbsp      <label>Tamanho  (Pol): </label>   &nbsp &nbsp                       
                                                                            <input name="mon1_tam"  style="background-color:seashell;" type="text" id="mon1_tam" size="5" value="" />                             
                                    
                                                                        </div>  
                                                                       
                                                                            <div> 
                                                                          
                                                                       </div>
                                                                  
                                                                        <div>
                                                                       <label> Patrimonio : </label>&nbsp 
                                                                            <input id="mon1_pat" name="mon1_pat"  style="background-color:seashell;" type="text" value="" size = "7" >
                                                                            <label>CTI PC : </label>
                                                                             <input id="id_pc" name="id_pc" style="background-color:seashell;"  type="text" value="0" title="0 (zero) para nenhum vinculo com um Computador " size = "5" required>
                                                                         
                                                                            &nbsp  <label>Saida :</label>
                                                                           <select title="Selecione a opção utilizada de saida de video "  id="mon_saida" name="mon_saida" style="background-color:seashell;"  >
                                                                              <option value="VGA" default>VGA</option>
                                                                                <option value="HDMI">HDMI</option>     
                                                                                <option value="DVI">Dvi</option>                
                                                                                <option value="DISPLAY PORT">Display Port</option>                    
                                                                           </select>
                                                                       
                                                                                                            
                                                                           
                                                                         
                                                                       </div>

                                                                   <div>
                                                                          <label> Obs:   </label> &nbsp &nbsp &nbsp   
                                                                            <input id="mon1_obs" name="mon1_obs" style="background-color:seashell;"  type="text"  size = "51 value=""> <br />         
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
            case '9': { // cadastro direto  de Tablets 
                // header("Location: chk_plaqueta.php?id=" . $local_id . "&tipo=2");
                include "../validar_session.php";
                include "../Config/config_sistema.php";

                // $ret_cmei_id = $local_id;// $_GET['id'];

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
                insere_vinculo($conn, $ret_plaq, $ret_cmei_id, $ret_sec_id, $_SESSION['nome_usuario'], "Tablet");
                ?>
         
                                        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//PT" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                        <html>
                                            <head>
                                            <title>Cadastro direto de Tablets </title>
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
                                                                         <input type="hidden" name="loc_id" size=50 value= "<?php echo $ret_cmei_id ?>">
                                                                         <input type="hidden" name="sec_id" size=50 value= "<?php echo $ret_sec_id ?>">
                                                                         <input type="hidden" name="tipo_id" size=50 value= "<?php echo $ret_tip_id ?>">
                                                                      <input type="hidden" name="ctrl_ti" size=50 value= "<?php echo $ret_plaq ?>">
                                                                      <input type="hidden" name="modalidade" size=50 value= "<?php echo $tipo ?>">
                                                                            <section class="box ">
                                                                         <header class="panel_header">
                                                                        <h2 class="title pull-left"> <?php echo $unidade; ?></h2>  <br />
                                                                           
                                                                        <div class="actions panel_actions pull-right">
                                                                            <i class="box_toggle fa fa-chevron-down"></i>
                                                                            <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                                                            <i class="box_close fa fa-times"></i>
                                                                        </div>
                                                                              </div>
                                                                    <?php echo "<i style='color: green; font-family: Monaco; ' >  Controle T.I. " . $ret_plaq . " </i> "; ?> <br />
                                                                  <div>  
                              
                                                                                           <?php
                                                                                           $sql = "SELECT * FROM tbsecretaria where sec_id ='" . $ret_sec_id . "'";
                                                                                           $resultado = mysqli_query($conn, $sql) or die('Erro ao selecionar especialidade: ' . mysql_error());
                                                                                           $option = '';
                                                                                           while ($row = mysqli_fetch_array($resultado)) {
                                                                                               $option .= "<option value = '" . $row['sec_id'] . "'>" . $row['sec_nome'] . "   </option>";
                                                                                           }
                                                                                           ?>
                                                                                          <!--     <select name="sec_id" required>          
                                                                                              <?php
                                                                                              //   echo "<option value='0'>  </option>";
                                                                                              //      echo $option;
                                                                                              ?>        
                                                                                           </select> 
                                                                                              -->
                                                                                      <h4 class="title pull-left"> <?php echo $option; ?></h4> 
                                                                                      <br />
                                                                                      </div> 
                                                                       
                                                                      <br />
                                                                      <div>
                                                                          <label> Patrimonio do Tablet :     </label>
                                                                          <input id="pat" name="pat"  style="background-color:seashell;" type="text" value="<?php echo strtoupper($ret_plaq); ?> " size = "30" >
                                                                                                        
                                    
                                                                        </div>  
                                                                        <div>
                                                                          <label> Marca / Modelo  :     
                                                                             &nbsp   &nbsp    <input id="mar" name="mar" style="background-color:seashell;"  type="text"  size = "30" value=""> <br />         
                                                                        </div> 
                                                                            <div> 
                                                                            <label>Tamanho  (Pol): </label>                         
                                                                           &nbsp <input name="tam"  style="background-color:seashell;" type="text" id="tam" size="10" value="" />
                                                                      
                                                                            &nbsp   &nbsp   <label>SO: </label>                         
                                                                             &nbsp  &nbsp <input name="so"  style="background-color:seashell;" type="text" id="so" size="15" value="" />
                                                                       </div>

                                                                        <div>
                                                                            <label>Obs :
                                                                             &nbsp   &nbsp  <input id="obs" name="obs" style="background-color:seashell;"  type="text" value="" size = "40" required>
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
            case '10': { // cadastro direto  de Racks 
                // header("Location: chk_plaqueta.php?id=" . $local_id . "&tipo=2");
                include "../validar_session.php";
                include "../Config/config_sistema.php";

                // $ret_cmei_id = $local_id;// $_GET['id'];

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
                ?>
         
                                        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                        <html>
                                            <head>
                                            <title>Cadastro Racks </title>
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
                                                                         <input type="hidden" name="loc_id" size=50 value= "<?php echo $ret_cmei_id ?>">
                                                                         <input type="hidden" name="sec_id" size=50 value= "<?php echo $ret_sec_id ?>">
                                                                         <input type="hidden" name="tipo_id" size=50 value= "<?php echo $ret_tip_id ?>">
                                                                      <input type="hidden" name="ctrl_ti" size=50 value= "<?php echo $ret_plaq ?>">
                                                                      <input type="hidden" name="modalidade" size=50 value= "<?php echo $tipo ?>">
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
                              
                                                                                           <?php
                                                                                           $sql = "SELECT * FROM tbsecretaria where sec_id ='" . $ret_sec_id . "'";
                                                                                           $resultado = mysqli_query($conn, $sql) or die('Erro ao selecionar especialidade: ' . mysql_error());
                                                                                           $option = '';
                                                                                           while ($row = mysqli_fetch_array($resultado)) {
                                                                                               $option .= "<option value = '" . $row['sec_id'] . "'>" . $row['sec_nome'] . "   </option>";
                                                                                           }
                                                                                           ?>
                                                                                          <!--     <select name="sec_id" required>          
                                                                                              <?php
                                                                                              //   echo "<option value='0'>  </option>";
                                                                                              //      echo $option;
                                                                                              ?>        
                                                                                           </select> 
                                                                                              -->
                                                                                      <h4 class="title pull-left"> <?php echo $option; ?></h4> 
                                                                                      <br />
                                                                                      </div> 
                                                                       
                                                                      <br />
                                                                      <div>
                                                                         <?php echo "<i style='color: green; font-family: Monaco; ' >  Controle T.I. " . $ret_plaq . " </i> "; ?> <br />
                                                                          <label> Marca/Modelo:&nbsp     
                                                                            <input id="marca" name="marca" style="background-color:seashell;"  type="text"  size = "30" value="Geral">
                                                                        
                                                                          
                                                                                                        
                                    
                                                                        </div>  
                                                                        <div>
                                                                          <label> Patrimonio do Rack : </label> &nbsp
                                                                          <input id="pat" name="pat"  style="background-color:seashell;" type="text" value="<?php echo strtoupper($ret_plaq); ?> " size = "10" >
                                                                        
                                                                            
                                                                  
                                                                            <label>Tamanho : </label> &nbsp                       
                                                                              <select name="tam" title="Selecione uma opção"  style="background-color:#FEFFFC"  >
                                                                                <option value="0"></option>
                                                                                <option value="2U">2U</option>
                                                                                <option value="3U">3U</option> 
                                                                                <option value="4U">4U</option>                    
                                                                                <option value="5U">5U</option>                  
                                                                                <option value="6U">6U</option> 
                                                                                <option value="8U">8U</option>                    
                                                                                <option value="10U">10U</option>                  
                                                                                <option value="12U">12U</option> 
                                                                                <option value="16U">16U</option>                    
                                                                                <option value="20U">20U</option> 
                                                                                <option value="24U">24U</option>                    
                                                                                <option value="28U">28U</option>                  
                                                                                <option value="32U">32U</option> 
                                                                                <option value="36U">36U</option>                    
                                                                                <option value="40U">40U</option>                  
                                                                                <option value="44U" selected>44U</option>                  
                                                                            </select>
                                                                      </div>
                                                                  
                                                                  <div>
                                                                           <label> Profundidade : 
                                                                            <input id="prof" name="prof" style="background-color:seashell;"  type="text"  size = "5" value=""> 
                                                                         
                                                                           &nbsp  &nbsp  &nbsp  <label>Estilo  : </label> &nbsp &nbsp
                                                                             <select name="tipo" title="Selecione uma opção"  style="background-color:#FEFFFC"  >
                                                                                <option value="0"></option>
                                                                                <option value="PAREDE" selected>Parede</option>
                                                                                <option value="PISO">Piso</option>                  
                                                                           </select>
                                                                              <br />     <label> Localizaçao:  &nbsp &nbsp     
                                                                            <input id="localizacao" name="localizacao" style="background-color:seashell;"  type="text"  size = "32" value="Sala Secretaria "> <br />         


                                                                   </div>
                                                                       <div>
                                                                          <label> Compontentes :     </label> <br />
                                                                     <table>
                                                                         <tr>
                                                                             <td><input type="checkbox" name="componente1" value="1"> </td>
                                                                             <td><label>Patch Panel </label> </td>
                                                                              <td> &nbsp &nbsp  </td>
                                                                             <td> Portas </td>
                                                                             <td> &nbsp <input id="porta_patch" name="porta_patch"  style="background-color:seashell;" type="text" value="" size = "5" ></td>
                                                                            <td> &nbsp &nbsp  </td>
                                                                             <td> Qtd </td>
                                                                             <td> &nbsp <input id="qtd_patch" name="qtd_patch"  style="background-color:seashell;" type="text" value="" size = "5" ></td>
                                                                         </tr>
                                                                           <tr>
                                                                             <td><input type="checkbox" name="componente2" value="1"> &nbsp </td>
                                                                             <td><label>Switch </label> </td>
                                                                            <td> &nbsp &nbsp  </td>
                                                                               <td> Portas </td>
                                                                               <td> &nbsp <input id="porta_switch" name="porta_switch"  style="background-color:seashell;" type="text" value="" size = "5" ></td>
                                                                           <td> &nbsp &nbsp  </td>
                                                                             <td> Qtd </td>
                                                                             <td> &nbsp <input id="qtd_switch" name="qtd_switch"  style="background-color:seashell;" type="text" value="" size = "5" ></td>
                                                                           </tr>
                                                                           <tr>
                                                                             <td><input type="checkbox" name="componente3" value="1"> &nbsp </td>
                                                                             <td><label>Hub   </label> </td>
                                                                             <td> &nbsp &nbsp  </td>
                                                                               <td> Portas </td>
                                                                               <td> &nbsp <input id="porta_hub" name="porta_hub"  style="background-color:seashell;" type="text" value="" size = "5" ></td>
                                                                          <td> &nbsp &nbsp  </td>
                                                                             <td> Qtd </td>
                                                                             <td> &nbsp <input id="qtd_hub" name="qtd_hub"  style="background-color:seashell;" type="text" value="" size = "5" ></td>
                                                                           </tr>
                                                                            <tr>
                                                                             <td><input type="checkbox" name="componente4" value="1"> &nbsp </td>
                                                                             <td><label>Filtro de Linha   </label> </td>
                                                                             <td> &nbsp &nbsp  </td>
                                                                               <td> Portas </td>
                                                                               <td> &nbsp <input id="porta_fil" name="porta_fil"  style="background-color:seashell;" type="text" value="" size = "5" ></td>
                                                                          <td> &nbsp &nbsp  </td>
                                                                             <td> Qtd </td>
                                                                             <td> &nbsp <input id="qtd_fil" name="qtd_fil"  style="background-color:seashell;" type="text" value="" size = "5" ></td>
                                                                           </tr>


                                                                     </table>
                                                                           
                                                                       </div>  
                                                                       <br />
                                                                   <label>Obs :   </label>  &nbsp &nbsp  
                                                                    &nbsp <input id="obs" name="obs"  style="background-color:seashell;" type="text" value="" size = "45" >
                                                                  
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
            case '11': { // cadastro direto  de Patch Panels 
                // header("Location: chk_plaqueta.php?id=" . $local_id . "&tipo=2");
                include "../validar_session.php";
                include "../Config/config_sistema.php";

                // $ret_cmei_id = $local_id;// $_GET['id'];

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
                ?>
         
                                        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                        <html>
                                            <head>
                                            <title>Cadastro direto de Patch Panel </title>
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
                                                                         <input type="hidden" name="loc_id" size=50 value= "<?php echo $ret_cmei_id ?>">
                                                                         <input type="hidden" name="sec_id" size=50 value= "<?php echo $ret_sec_id ?>">
                                                                         <input type="hidden" name="tipo_id" size=50 value= "<?php echo $ret_tip_id ?>">
                                                                      <input type="hidden" name="ctrl_ti" size=50 value= "<?php echo $ret_plaq ?>">
                                                                      <input type="hidden" name="modalidade" size=50 value= "<?php echo $tipo ?>">
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
                              
                                                                                           <?php
                                                                                           $sql = "SELECT * FROM tbsecretaria where sec_id ='" . $ret_sec_id . "'";
                                                                                           $resultado = mysqli_query($conn, $sql) or die('Erro ao selecionar especialidade: ' . mysql_error());
                                                                                           $option = '';
                                                                                           while ($row = mysqli_fetch_array($resultado)) {
                                                                                               $option .= "<option value = '" . $row['sec_id'] . "'>" . $row['sec_nome'] . "   </option>";
                                                                                           }
                                                                                           ?>
                                                                                          <!--     <select name="sec_id" required>          
                                                                                              <?php
                                                                                              //   echo "<option value='0'>  </option>";
                                                                                              //      echo $option;
                                                                                              ?>        
                                                                                           </select> 
                                                                                              -->
                                                                                      <h4 class="title pull-left"> <?php echo $option; ?></h4> 
                                                                                      <br />
                                                                                      </div> 
                                                                       
                                                                      <br />
                                                                      <div>
                                                                             <?php echo "<i style='color: green; font-family: Monaco; ' >  Controle T.I. " . $ret_plaq . " </i> "; ?> <br />
                                                                          <label> Patrimonio do Patch Panel :     </label>
                                                                             &nbsp    &nbsp  &nbsp  <input id="pat" name="pat"  style="background-color:seashell;" type="text" value="<?php echo strtoupper($ret_plaq); ?> " size = "31" >
                                                                         
                                                                         
                                    
                                                                        </div>  
                                                                        <div>
                                                                          <label> Marca / Modelo  :     
                                                                            <input id="marca" name="marca" style="background-color:seashell;"  type="text"  size = "40" value="Geral"> <br />         
                                                                        </div> 
                                                                            <div> 
                                                                            
                                                                            <label>Tipo  : </label> &nbsp &nbsp
                                                                             <select name="tipo" title="Selecione uma opção"  style="background-color:#FEFFFC"  >
                                                                                <option value="0"></option>
                                                                                <option value="MODULAR" selected>Modular</option>
                                                                                <option value="ANGULAR">Angular</option>                  
                                                                                <option value="OUTROS">Outros</option>
                                                                                </select>

                                                                         
                                                                          
                                                                            &nbsp    &nbsp <label>Portas  : </label> &nbsp &nbsp
                                                                             <select name="portas" title="Selecione uma opção"  style="background-color:#FEFFFC"  >
                                                                                <option value="0"></option>
                                                                                <option value="12">12</option>
                                                                                <option value="24" selected >24</option>                  
                                                                                <option value="48">48</option>                  
                                                                                <option value="OUTROS">Outros</option>
                                                                                </select>

                                                                        
                                                                          
                                                                        &nbsp   <label>Rede : </label> &nbsp 
                                                                             <select name="rede" title="Selecione uma opção"  style="background-color:#FEFFFC"  >
                                                                                <option value="0"></option>
                                                                                <option value="CAT5">Cat5</option>
                                                                                <option value="CAT5e">Cat5e</option>                  
                                                                                <option value="CAT6">Cat6</option>                  
                                                                                <option value="CAT6a">Cat6a</option>                  
                                                                                <option value="OPTICA">Fibra Optica</option>                  
                                                                                 <option value="OUTROS">Outros</option>
                                                                                </select>

                                                                         </div>
                                                                  
                                                                  
                                                                  <div>
                                                                      <label>Obs :   </label>  &nbsp 
                                                                       &nbsp <input id="obs" name="obs"  style="background-color:seashell;" type="text" value="" size = "52" >
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
            case '12': {
                if ($ret_plaq == "") {
                    echo " <br> <br> <br><center> <p style=color:blue> <b> Voce deve inserir a numeraçao de plaqueta do equipamento, que refere-se ao Número de Patrimonio no campo digitavel  </b>  </p></center> ";
                    echo " <br><br><center> <input type='button' value='Voltar' onclick='javascript: history.go(-1)' </center> ";
                } else {
                    insere_vinculo($conn, $ret_plaq, $ret_cmei_id, $ret_sec_id, $_SESSION['nome_usuario'], "NOTEBOOK");
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
<input type="hidden" name="origem" size=50 value= "cadastro_n">
<input type="hidden" name="rec_user" size=50 value= "<?php echo $_SESSION['usuario']; ?>">
<input type="hidden" name="loc_id" size=50 value= "<?php echo $ret_cmei_id ?>">
<input type="hidden" name="sec_id" size=50 value= "<?php echo $ret_sec_id ?>">
<input type="hidden" name="ctrl_ti" size=10 value= "<?php echo $ret_plaq ?>">
 <input type="hidden" name="tipo_equip" size=10 value= "Notebook">

</BR> </BR> </BR> 
<center>  
      <h2> <?php echo $option; ?></h2> 
    <h3> <?php echo $unidade; ?></h3>     <br /></center>
<div class="container">
   
<h2>Cadastro de Notebook  </h2>     <?php echo "<i style='color: green; font-family: Monaco; ' >  Controle T.I. " . $ret_plaq . " </i> "; ?> <br />
 
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">Dados Equipamentos</a></li>
        <li><a data-toggle="tab" href="#menu1">Componentes</a></li>
        <li><a data-toggle="tab" href="#menu2">Utilizadores</a></li>
        </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
   
       
                            <div class="container-fluid">
                                <div class="form-horizontal meuform">
                                    <div class="form-group row">
                                       <div class="col-md-2">     
                                            <label class="control-label">Patrimonio Nº</label>
                                            <input class="form-control text-uppercase" id="plaqueta" name="plaqueta"   value =  <?php echo "PENDENTE"; ?> required/>
                                        </div>
                                       <div class="col-md-2">     
                                            <label class="control-label">Reserva</label>
                                           <select title="Selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="reserva" name="reserva"  >
                                                <option value="SIM">Sim</option>
                                                <option value="NAO" SELECTED>Não</option>
                                                
                                     </select>
                                        </div>
                                        
                                        <div class="col-md-2">     
                                            <label class="control-label">Lacre T.I</label>
                                            <input class="form-control text-uppercase" id="lacre" name="lacre" value="Sem Lacre"  />
                                        </div>
               

                                        <div class="col-md-2">
                                            <label class="control-label" title = 'Nome do Equipamento' ><a href=consultas_nomespc.php>Nome Equipamento </a></label>
                                            <input class="form-control text-uppercase"  id="nome_equip" name="nome_equip"    required/>
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
                                                <option value="WINDOWS 8 64Bits">Windows 8 64 Bits </option>   
                                                <option value="WINDOWS 8 64Bits_Home">Windows 8 64 Bits HOME</option>   
                                                <option value="WINDOWS 10 64Bits"selected>Windows 10 64 Bits</option>
                                                <option value="WINDOWS 10 64Bits_Home"selected>Windows 10 64 Bits HOME</option>
                                                <option value="WINDOWS 11 64Bits">Windows 11 64 Bits</option>
                                                <option value="WINDOWS 11 64Bits_Home">Windows 11 64 Bits HOME</option>
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
                                            <select title="Selecione uma opção"  style="background-color:#FEFFFC" class="form-control selectClass show-tick show-menu-arrow" id="arm_tipo" name="arm_tipo" >
                                               <option value="VAZIO"></option>
                                                <option value="IDE">HD IDE</option>                
                                                <option value="SATA_HD">HD SATA </option>        
                                                <option value="SATA_SSD">SSD SATA </option>        
                                                <option value="NVMe">NVMe</option>
                                                <option value="NAS">NAS</option>
                                                <option value="SCSI">SCSI</option> 
                                            </select>        
                                        </div>
                                         <div class="col-md-2">
                                            <label  class="control-label">Tamanho HD</label>
                                            <select title="Selecione uma opção"  style="background-color: White" class="form-control selectClass show-tick show-menu-arrow" id="arm_tam" name="arm_tam" >
                                              <option value="VAZIO"></option>
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
                                               <option value="VAZIO"></option>
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
                                            <option value="VAZIO"></option>
                                            <option value="Inferior">Inferior a 2GB</option>
                                            <option value="2GB">2GB</option>
                                            <option value="3GB">3GB</option>
                                            <option value="4GB">4GB</option>
                                            <option value="5GB">5GB</option>
                                            <option value="6GB">6GB</option>
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
                                 
                              </div>
                            </div>
                 <div id="menu1" class="tab-pane fade">
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
                        <script>
       function preencheCampo(el){
      let value = $(el).val();
       let value_nada = "______";
       let value_zero = "0";
       let value_vazio = " - ";
     if (value == "NENHUM")
           {
               $('input[name="mon_mar"]').val(value_nada);
               $('input[name="mon_pol"]').val(value_nada);
               $('input[name="mon_tam"]').val(value_nada);
               $('input[name="mon_pat"]').val(value_nada);
               $('input[name="mon_cti"]').val(value_zero);
           }
    
  }
     </script>

                                   <div style="display:flex">
                                        <table style="width:15%; border:0px solid #000000;">
	                                            <tr>
	                                                 <td> <label>Monitor Auxiliar    </label></td>
                                                </tr><tr> 
                                                    <td>  <select title="Selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" onchange="preencheCampo(this);" id="mon_tipo" name="mon_tipo"   >
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
                                                    <td>    <input name="mon_cti" type="text" id="mon_cti" style="padding:0px;margin:0px;" size="10" value="0"  required />   </td>
                                                </tr>
                                         </table>
                                       &nbsp 

                                    <table style="width:10%; border:0px solid #000000;">
	                                            <tr>
	                                                 <td> <label>Tipo   </label></td>
                                                </tr>
                                       <tr> 
                                                  <td>  <select title="Selecione uma opção"  id="mon_cat" name="mon_cat"  >
                                                              <option value="Vazio" default>--------------------------</option>
                                                                <option value="Widescreen">Widescreen</option>     
                                                                <option value="UltraWide">UltraWide</option>                
                                                                <option value="CRT">CRT</option>                    
                                                        </select>
                                                  </td>
                                                </tr>
                                         </table>
                                            &nbsp 
                                       <table style="width:10%; border:0px solid #000000;">
	                                            <tr>
	                                                 <td> <label>Video em uso   </label></td>
                                                </tr>
                                       <tr> 
                                                  <td>  <select title="SAIDA DE VIDEO UTILIZADO PELO MONITOR"  id="mon_saida" name="mon_saida"  >
                                                              <option value="VGA" default>VGA</option>
                                                                <option value="HDMI">HDMI</option>     
                                                                <option value="DVI">DVI</option>                
                                                                <option value="DISPLAY">DISPLAY PORT  </option>                    
                                                        </select>
                                                  </td>
                                                </tr>
                                         </table>
                                   
                                   
                                   </div>

                                         <table style="width:85%; border:0px solid #000000;">
	                                        <tr bgcolor="#ededed">
		                                     </tr>
                                               <tr>  </tr>  
                                             <tr>
	                                             <td> <label>Obs. Video    </label></td>
                                         </tr>
                                              <tr>
                                             <td><input type="text" name="obsvid" id="obsvid" size="20" value="" />  </td>
                                                  </tr>
                                          </table>
                                        <br />
                     <div style="display: flex">  
                     <table style="width: 40%; border: 1px solid #000000;">
	                                        <tr bgcolor="#ededed">
		                                     </tr>
                                                <tr>
	                                                <td> <label for="name">Redes Disponiveis :</label></td>
                                                    <td> <input  name="wifi" id="wifi" value="1" type="checkbox" > <label style="padding:0px 0px 0px 0px" >WIFI  </label>  </td>                
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
                                                  	<input type="text"  name="fonte_a" id="fonte_a"  style="font-family: 'Arial Black'; font-size: 15px; text-align:center;"  size =5     />       </td>                
                                            </tr>
                                      </table>                   	
                            </div>
                           <br />  <br /> <br />                               
                                                                                <label for="name">Tipo de Plug da Fonte:</label> &nbsp &nbsp  	
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
                   
                   </div>
   </div>

    <div id="menu2" class="tab-pane fade">
      
      <div class="infados">  </div> 
              
        <div class="form-group row">
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
                 <textarea id="utilizadores_nomes" name="utilizadores_nomes" rows="10" cols="75">
                      
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
              <input class="form-control text-uppercase" id="resp" name="resp" value="<?php echo retRESP_by_cmeiID($conn, $ret_cmei_id); ?> "   /> 
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
<?php
                }
            }
                break;
            case '16': { // cadastro de Acess Point
                // header("Location: chk_plaqueta.php?id=" . $local_id . "&tipo=2");
                include "../validar_session.php";
                include "../Config/config_sistema.php";

                // $ret_cmei_id = $local_id;// $_GET['id'];

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
                ?>
                                


                                        ?>
                                        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                        <html>
                                            <head>
                                            <title>Cadastro de Equipamentos  AP </title>
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
                                                                         <input type="hidden" name="loc_id" size=50 value= "<?php echo $ret_cmei_id ?>">
                                                                         <input type="hidden" name="sec_id" size=50 value= "<?php echo $ret_sec_id ?>">
                                                                         <input type="hidden" name="tipo_id" size=50 value= "<?php echo $ret_tip_id ?>">
                                                                      <input type="hidden" name="ctrl_ti" size=50 value= "<?php echo $ret_plaq ?>">
                                                                      <input type="hidden" name="modalidade" size=50 value= "<?php echo $tipo ?>">
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
                              
                                                                                           <?php
                                                                                           $sql = "SELECT * FROM tbsecretaria where sec_id ='" . $ret_sec_id . "'";
                                                                                           $resultado = mysqli_query($conn, $sql) or die('Erro ao selecionar especialidade: ' . mysql_error());
                                                                                           $option = '';
                                                                                           while ($row = mysqli_fetch_array($resultado)) {
                                                                                               $option .= "<option value = '" . $row['sec_id'] . "'>" . $row['sec_nome'] . "   </option>";
                                                                                           }
                                                                                           ?>
                                                                                          <!--     <select name="sec_id" required>          
                                                                                              <?php
                                                                                              //   echo "<option value='0'>  </option>";
                                                                                              //      echo $option;
                                                                                              ?>        
                                                                                           </select> 
                                                                                              -->
                                                                                      <h4 class="title pull-left"> <?php echo $option; ?></h4> 
                                                                                      <br />
                                                                                      </div> 
                                                                       
                                                                      <br />
                                                                      <div>
                                                                            <?php echo "<i style='color: green; font-family: Monaco; ' >  Controle T.I. " . $ret_plaq . " </i> "; ?> <br />
                                                                          <h3>Cadastro Acess Point</h3>
                                                                           <label>Plaq.  Patrimonio :     </label>
                                                                           &nbsp  &nbsp  <input id="patrimonio" name="patrimonio"  style="background-color:seashell;" type="text" value="<?php echo strtoupper($ret_plaq); ?> " size = "15" >
                                                                                                        
                                    
                                                                        </div>  
                                                                        <div>
                                                                          <label> Marca / Modelo  :     
                                                                            <input id="marca" name="marca" style="background-color:seashell;"  type="text"  size = "50" value="">          
                                                                          
                                                                      
                                                                        </div>
                                                                        <div>
                                                                            <label>Nome Responsavel :
                                                                             <input id="resp" name="resp" style="background-color:seashell;"  type="text" value="" size = "47" required>
                                                                        </div>    
                                                                      
                                                                      <div>
                                                                            <label>Obs:
                                                                             <input id="obs" name="obs" style="background-color:seashell;"  type="text" value="" size = "61" required>
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
            case '17': { // cadastro de Nobreaks
                // header("Location: chk_plaqueta.php?id=" . $local_id . "&tipo=2");
                include "../validar_session.php";
                include "../Config/config_sistema.php";

                // $ret_cmei_id = $local_id;// $_GET['id'];

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
                ?>
                                


                                        ?>
                                        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                        <html>
                                            <head>
                                            <title>Cadastro de Equipamentos  Nobreak </title>
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
                                                                         <input type="hidden" name="loc_id" size=50 value= "<?php echo $ret_cmei_id ?>">
                                                                         <input type="hidden" name="sec_id" size=50 value= "<?php echo $ret_sec_id ?>">
                                                                         <input type="hidden" name="tipo_id" size=50 value= "<?php echo $ret_tip_id ?>">
                                                                      <input type="hidden" name="ctrl_ti" size=50 value= "<?php echo $ret_plaq ?>">
                                                                      <input type="hidden" name="modalidade" size=50 value= "<?php echo $tipo ?>">
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
                              
                                                                                           <?php
                                                                                           $sql = "SELECT * FROM tbsecretaria where sec_id ='" . $ret_sec_id . "'";
                                                                                           $resultado = mysqli_query($conn, $sql) or die('Erro ao selecionar especialidade: ' . mysql_error());
                                                                                           $option = '';
                                                                                           while ($row = mysqli_fetch_array($resultado)) {
                                                                                               $option .= "<option value = '" . $row['sec_id'] . "'>" . $row['sec_nome'] . "   </option>";
                                                                                           }
                                                                                           ?>
                                                                                          <!--     <select name="sec_id" required>          
                                                                                              <?php
                                                                                              //   echo "<option value='0'>  </option>";
                                                                                              //      echo $option;
                                                                                              ?>        
                                                                                           </select> 
                                                                                              -->
                                                                                      <h4 class="title pull-left"> <?php echo $option; ?></h4> 
                                                                                      <br />
                                                                                      </div> 
                                                                       
                                                                      <br />
                                                                      <div>
                                                                            <?php echo "<i style='color: green; font-family: Monaco; ' >  Controle T.I. " . $ret_plaq . " </i> "; ?> <br />
                                                                          <h3>Cadastro Nobreak</h3>
                                                                           <label>Plaq.  Patrimonio :     </label>
                                                                           &nbsp  &nbsp  <input id="patrimonio" name="patrimonio"  style="background-color:seashell;" type="text" value="<?php echo strtoupper($ret_plaq); ?> " size = "15" >
                                                                                                        
                                    
                                                                        </div>  
                                                                        <div>
                                                                          <label> Marca / Modelo  :     
                                                                            <input id="marca" name="marca" style="background-color:seashell;"  type="text"  size = "50" value="">          
                                                                         </div>
                                                                       
                                                                       <div>
                                                                            <label>Tensao :
                                                                             <input id="tensao" name="tensao" style="background-color:seashell;"  type="text" value="" size = "10" title="Tensao  " >
                                                                          &nbsp <label>Tomadas :
                                                                            &nbsp   <input id="tomadas" name="tomadas" style="background-color:seashell;"  type="text" value="" size = "10" title="Quantidade de tomadas" >
                                                                          &nbsp  <label>Potencia:
                                                                            &nbsp   <input id="pot" name="pot" style="background-color:seashell;"  type="text" value="" size = "10" title="Potencia " >
                                                                                
                                                                                </div>    
                                                                   
                                                                      <div>
                                                                            <label>Obs :</label> <br>
                                                                             <input id="obs" name="obs" style="background-color:seashell;"  type="text" value="" size = "71" required>
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
            case '18': { // cadastro de Modulos de Baterias
                // header("Location: chk_plaqueta.php?id=" . $local_id . "&tipo=2");
                include "../validar_session.php";
                include "../Config/config_sistema.php";

                // $ret_cmei_id = $local_id;// $_GET['id'];

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
                ?>
                                


                                        ?>
                                        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                        <html>
                                            <head>
                                            <title>Cadastro de Modulo de Bateria </title>
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
                                                                         <input type="hidden" name="loc_id" size=50 value= "<?php echo $ret_cmei_id ?>">
                                                                         <input type="hidden" name="sec_id" size=50 value= "<?php echo $ret_sec_id ?>">
                                                                         <input type="hidden" name="tipo_id" size=50 value= "<?php echo $ret_tip_id ?>">
                                                                      <input type="hidden" name="ctrl_ti" size=50 value= "<?php echo $ret_plaq ?>">
                                                                      <input type="hidden" name="modalidade" size=50 value= "<?php echo $tipo ?>">
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
                              
                                                                                           <?php
                                                                                           $sql = "SELECT * FROM tbsecretaria where sec_id ='" . $ret_sec_id . "'";
                                                                                           $resultado = mysqli_query($conn, $sql) or die('Erro ao selecionar especialidade: ' . mysql_error());
                                                                                           $option = '';
                                                                                           while ($row = mysqli_fetch_array($resultado)) {
                                                                                               $option .= "<option value = '" . $row['sec_id'] . "'>" . $row['sec_nome'] . "   </option>";
                                                                                           }
                                                                                           ?>
                                                                                          <!--     <select name="sec_id" required>          
                                                                                              <?php
                                                                                              //   echo "<option value='0'>  </option>";
                                                                                              //      echo $option;
                                                                                              ?>        
                                                                                           </select> 
                                                                                              -->
                                                                                      <h4 class="title pull-left"> <?php echo $option; ?></h4> 
                                                                                      <br />
                                                                                      </div> 
                                                                       
                                                                      <br />
                                                                      <div>
                                                                            <?php echo "<i style='color: green; font-family: Monaco; ' >  Controle T.I. " . $ret_plaq . " </i> "; ?> <br />
                                                                          <h3>Cadastro Modulo de Bateria para Nobreak</h3>
                                                                           <label>Plaq.  Patrimonio :     </label>
                                                                           &nbsp  &nbsp  <input id="patrimonio" name="patrimonio"  style="background-color:seashell;" type="text" value="<?php echo strtoupper($ret_plaq); ?> " size = "15" >
                                                                                                        
                                    
                                                                        </div>  
                                                                        <div>
                                                                          <label> Marca / Modelo  :     
                                                                            <input id="marca" name="marca" style="background-color:seashell;"  type="text"  size = "50" value="Modulo de Baterias">          
                                                                          
                                                                      
                                                                        </div>
                                                                        <div>
                                                                            <label>Capacidade :
                                                                             <input id="cap" name="cap" style="background-color:seashell;"  type="text" value="" size = "10" title="Quantidade de  Baterias " >
                                                                          &nbsp <label>Tipo :
                                                                            &nbsp   <input id="tipo" name="tipo" style="background-color:seashell;"  type="text" value="" size = "10" title="Aberto ou Fechado" >
                                                                          &nbsp  <label>Tensao:
                                                                            &nbsp   <input id="tam" name="tam" style="background-color:seashell;"  type="text" value="" size = "10" title="Quantidade de Volts Ex. 240V" >
                                                                                
                                                                                </div>    
                                                                    
                                                                        <div>
                                                                            <label>Obs :
                                                                             <input id="obs" name="obs" style="background-color:seashell;"  type="text" value="" size = "57" >
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
            case '19': { // cadastro de Controlador de wi-fi
                // header("Location: chk_plaqueta.php?id=" . $local_id . "&tipo=2");
                include "../validar_session.php";
                include "../Config/config_sistema.php";

                // $ret_cmei_id = $local_id;// $_GET['id'];

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
                ?>
                                


                                        ?>
                                        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                        <html>
                                            <head>
                                            <title>Cadastro de Controlador Wi-fi </title>
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
                                                                         <input type="hidden" name="loc_id" size=50 value= "<?php echo $ret_cmei_id ?>">
                                                                         <input type="hidden" name="sec_id" size=50 value= "<?php echo $ret_sec_id ?>">
                                                                         <input type="hidden" name="tipo_id" size=50 value= "<?php echo $ret_tip_id ?>">
                                                                      <input type="hidden" name="ctrl_ti" size=50 value= "<?php echo $ret_plaq ?>">
                                                                      <input type="hidden" name="modalidade" size=50 value= "<?php echo $tipo ?>">
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
                              
                                                                                           <?php
                                                                                           $sql = "SELECT * FROM tbsecretaria where sec_id ='" . $ret_sec_id . "'";
                                                                                           $resultado = mysqli_query($conn, $sql) or die('Erro ao selecionar especialidade: ' . mysql_error());
                                                                                           $option = '';
                                                                                           while ($row = mysqli_fetch_array($resultado)) {
                                                                                               $option .= "<option value = '" . $row['sec_id'] . "'>" . $row['sec_nome'] . "   </option>";
                                                                                           }
                                                                                           ?>
                                                                                          <!--     <select name="sec_id" required>          
                                                                                              <?php
                                                                                              //   echo "<option value='0'>  </option>";
                                                                                              //      echo $option;
                                                                                              ?>        
                                                                                           </select> 
                                                                                              -->
                                                                                      <h4 class="title pull-left"> <?php echo $option; ?></h4> 
                                                                                      <br />
                                                                                      </div> 
                                                                       
                                                                      <br />
                                                                      <div>
                                                                            <?php echo "<i style='color: green; font-family: Monaco; ' >  Controle T.I. " . $ret_plaq . " </i> "; ?> <br />
                                                                          <h3>Cadastro de Controlador WI-FI </h3>
                                                                           <label>Plaq.  Patrimonio :     </label>
                                                                           &nbsp  &nbsp  <input id="patrimonio" name="patrimonio"  style="background-color:seashell;" type="text" value="<?php echo strtoupper($ret_plaq); ?> " size = "15" >
                                                                                                        
                                    
                                                                        </div>  
                                                                        <div>
                                                                          <label> Marca / Modelo  :     
                                                                            <input id="marca" name="marca" style="background-color:seashell;"  type="text"  size = "47" value="">          
                                                                          
                                                                      
                                                                        </div>
                                                                    
                                                                        <div>
                                                                            <label>Obs :
                                                                             <input id="obs" name="obs" style="background-color:seashell;"  type="text" value="" size = "57" >
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


        }

    }
}
?>

   