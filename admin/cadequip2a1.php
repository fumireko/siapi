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
<html>
    <head>
    <title>Cadastro de Equipamentos</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Adicionando JQuery -->
        <script src="js/jquery-2.1.4.min.js"></script>
	<script src="js/java_busplaq.js"></script>
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


                               }
                               ?>
                              
                                                  
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
                                                <label for="coord">  <?php echo $ret_descritivo; ?></label>    <br />
                                                   <label for="coord">Plaqueta Numero :</label>    
                                                &nbsp &nbsp
                                                <input id="plaqueta" name="plaqueta" type="text" placeholder="Numero da Plaqueta " size = "25" value= <?php echo $ret_plaq; ?> readonly  >
                                                &nbsp &nbsp <label for="coord">Nome do Equipamento : </label>    
                                                &nbsp &nbsp
                                                <input id="nome_equip" name="nome_equip" type="text" placeholder="Nome do Pc " size = "25" required>
                                                                                             
                                               </div>  
                                
                           

                               
                              <div>
                                  <label >Tipo equip: </label>    
                                     &nbsp &nbsp
                                    <select name="tipo_equip" style="background-color:seashell;" >
                                                <option value=""></option>
                                                <option value="Desktop" selected>Desktop</option>
                                                <option value="Notebook">Notebook</option>
                                                <option value="Tablet">Tablet</option>
                                                <option value="Servidor">Servidor</option>
                                                <option value="Outros">Outros</option>
                                     </select>
                                        &nbsp &nbsp
                                  <label >Sist. Operacional (SO) : </label>    
                                        &nbsp &nbsp
                                    <select name="so_tipo" style="background-color:seashell;" >
                                                <option value=""></option>
                                                <option value="WINDOWS ANT">Windows Anteriores</option>                
                                                <option value="WINDOWS XP">Windows XP</option>        
                                                <option value="WINDOWS 7">Windows 7</option>
                                                <option value="WINDOWS 8">Windows 8</option>
                                                <option value="WINDOWS 10" selected>Windows 10</option>
                                                <option value="WINDOWS 11">Windows 11</option>
                                                <option value="Linux">Linux</option>
                                                <option value="Android">Android</option>
                                                <option value="IOS">IOS</option>

                                     </select>
                                        &nbsp &nbsp
                                  <label >SO Arquitetura : </label>    
                                        &nbsp &nbsp
                                    <select name="so_arq" style="background-color:seashell;" >
                                                <option value=""></option>
                                                <option value="32Bits">32 Bits</option>                
                                                <option value="64Bits"selected>64 Bits</option>        
                                                <option value="Outros">Outros</option>
                                                

                                     </select>
                                </div>  

                               <div>
                                  <label> Modelo Placa :     </label>
                                  
                                   <input name="placa"  style="background-color:seashell;" type="text" id="placa" size="86" value=" <?php echo $ret_placa; ?>"  />      
                                      
                                  
                                </div>

                                <div>
                                  <label> Processador :     </label>
                                    <input name="processador" style="background-color:seashell;"  type="text" id="processador" size="87" value=" <?php echo $ret_processador; ?>"  />                
                                    
                                </div>  
                                <div>
                                   <label>Armaz. Tipo: </label>                         
                                    <input name="arm_tipo"  style="background-color:seashell;" type="text" id="arm_tipo" size="15" value=" <?php echo $ret_arm_tipo; ?>"  />      
                                   <label>Tamanho: </label>                         
                                    <input name="arm_tam" style="background-color:seashell;"  type="text" id="arm_tam" size="5" value=" <?php echo $ret_arm_tam; ?>"  />      
                                     &nbsp  &nbsp &nbsp
                                    <label>Armaz  Secundario:
                                      <select name="arm_sec">
                                                <option value="Nenhum">Nenhum</option>
                                                <option value="SSD">SSD</option>                
                                                <option value="SSSD2">SSD 2.5</option>        
                                                <option value="SSDm2">SSD M.2</option>        
                                                <option value="SSDm">SSD mSATA</option>
                                                <option value="SSDu2">SSD U.2</option>
                                     </select>
                               
                                    &nbsp<label>Tamanho: </label>
                                    <input name="arm_sec_tam"   type="text" id="arm_sec_tam" size="5"  />
                                 </div>
                                
                                     <div>
                                    <label>Memoria Tipo: <label>
                                     <input name="mem_tipo" style="background-color:seashell;" type="text" id="mem_tipo" size="10" value=" <?php echo $ret_mem_tipo; ?>"  />                
                                        
                                    <label>Mem.Qtd: 
                                    <input name="mem_qtd" style="background-color:seashell;" type="text" id="mem_qtd" size="10" value=" <?php echo $ret_mem_qtd; ?>"  />                
                                    
                                  &nbsp  <label>Slots de Memoria:
                                    <input name="slots" style="background-color:seashell;"  type="text" id="slots" value=" <?php echo $ret_slots; ?>" size="3"  required /></label>
                                      <label>Slots em Uso 
                                    <input name="slots_uso" style="background-color:seashell;" type="text" id="slots_uso" value=" <?php echo $ret_slots; ?>" size="3"   /></label>
                                       
                                </div>  
                                <div>
                                   <label>Tipo Monitor :
                                      <select name="mon_tipo">
                                                <option value=""></option>
                                                <option value="Unico">Unico</option>                
                                                <option value="Duplo">Duplo</option>        
                                                <option value="Outros">Outros</option>
                                      </select>
                                </div>  
                              
							  
							  
							  
							  
							  
							  
							  
                                <div>
                                         <label>Aplicativos  :</label>  &nbsp &nbsp &nbsp  
                                          <input  name="office" id="office" value="office" type="checkbox" >
                                           &nbsp <label>Office</label>&nbsp &nbsp &nbsp &nbsp 
                                          <input  name="autocad" id="autocad" value="autoCad" type="checkbox">
                                         &nbsp   <label>AutoCad</label>      &nbsp &nbsp 
                                    
                                    <label>Outro (s) :
                                         <input name="app_outros" type="text" id="app_outros" value="" size="38"   /></label>
                                    
                                    </div>  



                                <div>
                                <label>Obs:
                                  <input name="obs" type="text" id="obs" size="80" /></label>
                                                               
                                </div>
                                <br>
                            <div>
                            
                                <button id="btn_cadastro_unidade" name="btn_cadastro_unidade" class="btn btn-primary">Cadastrar</button>
                                </div>
                            </form>
                            </div>
                        </section></div>
                </section>
            </section>
        
        
</body>

</html>
