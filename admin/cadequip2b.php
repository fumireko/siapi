<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";

$ret_cmei_id = $_GET['id']; 
   
   ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
    <title>Cadastro de Equipamentos</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Adicionando JQuery -->
    
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>
              <script src="js/jquery-2.1.4.min.js"></script>
	
   
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
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
                                            $sql1 = "SELECT * FROM tbcmei where tbcmei_id ='".$ret_cmei_id."' ";
                                            $resultado1 = mysqli_query($conn,$sql1) or die('Erro ao selecionar especialidade: ' .mysqli_error());
                                            $qtd = mysqli_num_rows($resultado1);  // $option = '';
                                          if ($qtd == 0)
                                               $nome_local= "Nenhum local encontrado";
                                            else
                                            {
                                                do{
                                                   $row = mysqli_fetch_assoc($resultado1);
                                                   $nome_local = $row['tbcmei_nome'];
                                                   $ret_sec_id = $row['tbcmei_sec_id'];
                                                    $unidade = $nome_local;
                                                    "<input  type='hidden'  id='nome_loc'  name='nome_loc' type='text' value='".$nome_local."' size = '60' >";
                                                    "<input  type='hidden'  id='id_loc'  name='id_loc' type='text' value='" . $ret_cmei_id . "' size = '60' >";
                                                   "<input  type='hidden'  id='id_sec'  name='id_sec' type='text' value='" . $ret_sec_id . "' size = '60' >";
                                                   } while($row = mysqli_fetch_assoc($resultado1));
                                                }
                                                ?>
                                            
                                
                                
                                <form method="post" action="salvaequip.php">
                                  <input type="hidden" name="loc_id" size=50 value= "<?php echo $ret_cmei_id ?>">
                                  <input type="hidden" name="sec_id" size=50 value= "<?php echo $ret_sec_id ?>">
                                    
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
                                                    $sql = "SELECT * FROM tbsecretaria where sec_id ='" . $ret_sec_id."'";
                                                    $resultado = mysqli_query($conn,$sql) or die('Erro ao selecionar especialidade: ' .mysql_error());
                                                    $option = '';
                                                     while($row = mysqli_fetch_array($resultado))
                                                       { 
                                                         $option .= "<option value = '".$row['sec_id']."'>".$row['sec_nome']. "   </option>";
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
                                 <div id="resultado">
                                    <?php
                                    //include ('conecta_memo.php');
                                    //   include "../Config/config_sistema.php";
                                    $mysqli = new mysqli($host, $user, $pass, $db1);
                                    $ref = "vazio..";
                                    $sql = $mysqli->prepare("select tbequip_id,tbequip_plaqueta,tbequi_tbcmei_id from tbequip where tbequip_plaqueta ='" . $ref . "' ORDER BY tbequip_plaqueta");
                                    $sql->execute();
                                    $sql->bind_result($id, $plaqueta, $local);
                                    //echo "Inicio da visualizaçao <br> ";
                                    
                                    echo "
                                            <table>
                                                <thead>
                                                    <tr>
                                                        <th></th>                    
                                                        <th></th>                    
                                                    </tr>
                                                </thead>

                                                <tbody>
                                        ";

                                    while ($sql->fetch()) {
                                        echo "
                                            <tr>
                                            <td>$plaqueta</td>
                                            <td> <a href=nota_ind.php?parametro=" . $id . "></a> </td>	              
       
            
                                    </tr>
                                        ";
                                    }
                                    echo "</tbody>     </table>  <br>  ";
                                    //<img src='img\checar1.png' BORDER='0' WIDTH='25' HEIGHT='25' ALIGN='left'  alt='Tipo' title = 'Visualizar dados'  /> </a>
                                    //echo "FIM  visualizaçao <br> ";
                                    ?>
                              </div>
                 
                              
                              <div>  
                                                </br> 
                                                 <label for="coord">Plaqueta Numero :</label>    
                                                &nbsp &nbsp
                                                <input id="plaqueta" name="plaqueta" type="text" placeholder="Numero da Plaqueta " size = "25" required>
                                                &nbsp &nbsp <label for="coord">Nome do Equipamento : </label>    
                                                &nbsp &nbsp
                                                <input id="nome_equip" name="nome_equip" type="text" placeholder="Nome do Computador " size = "25" required>
                                             
                                       </div>  
                                
                              
                              
                              
                              <div>
                                  <label >Tipo equip: </label>    
                                     &nbsp &nbsp
                                    <select name="tipo_equip">
                                                <option value=""></option>
                                                <option value="Desktop">Desktop</option>
                                                <option value="Notebook">Notebook</option>
                                                <option value="Tablet">Tablet</option>
                                                <option value="Servidor">Servidor</option>
                                                <option value="Outros">Outros</option>
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
                                                <option value="WINDOWS 10">Windows 10</option>
                                                <option value="WINDOWS 11">Windows 11</option>
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
                                                <option value="64Bits">64 Bits</option>        
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
                                                      $optionp .= "<option value = '" . $row['p_id'] . "'>" . mb_strimwidth($row['p_desc'], 0, 81, "..."). "   </option>";
                                                      
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
                                                      $option .= "<option value = '" . $row['proc_id'] . "'>" . mb_strimwidth($row['proc_nome'],0,88,"..."). "   </option>";
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
                                                <option value=""></option>
                                                <option value="ATA">ATA</option>                
                                                <option value="SATA">SATA</option>        
                                                <option value="SATA2">SATA2</option>        
                                                <option value="NVMe">NVMe</option>
                                                <option value="NAS">NAS</option>

                                                <option value="SCSI">SCSI</option>
                                     </select>
                               
                                    <label>Tamanho: </label>                         
                                    <input name="arm_tam" type="text" id="arm_tam" size="5" required />
                                      &nbsp &nbsp  &nbsp &nbsp
                                    <label>Armaz  Secundario:
                                      <select name="arm_sec">
                                                <option value=""></option>
                                                <option value="SSD">SSD</option>                
                                                <option value="SSSD2">SSD 2.5</option>        
                                                <option value="SSDm2">SSD M.2</option>        
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
                            
                                <button  type="submit" id="btn_cadastro_unidade" name="btn_cadastro_unidade" value="Submit" class="btn btn-primary">Cadastrar</button>
                                </div>
                            <button type="submit" form="form1" value="Submit">Submit</button>
                              </form>
                            </div>
                        </section></div>
                </section>
            </section>
        
        
</body>

</html>
