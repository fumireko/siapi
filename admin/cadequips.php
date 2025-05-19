<?php
   include "../validar_session.php";
   include "../Config/config_sistema.php";
   include "bco_fun.php";
   $erro_ini = "0";
   if (isset($_GET['pat'])) {
       $ret_plaq = $_GET['pat'];
   } else
       $erro_ini = "1";
   if (isset($_GET['loc'])) {
       $ret_cmei_id = $_GET['loc'];
   } else
       $erro_ini = "1";
   if (isset($_GET['sec'])) {
       $ret_sec_id = $_GET['sec'];
   } else
       $erro_ini = "1";
   if (isset($_GET['tipo'])) {
       $ret_tip_id = $_GET['tipo'];
   } else
       $erro_ini = "1";
   
   if ($erro_ini=="1"){
   echo " <br><br><div style="text-align: center"> <p> pagina nao pode ser exibida devido a um erro de parametro! </p></div>";
   
   }
   else // parametros recebidos de maneira correta
   {
       // vinculacao cti , local , sec , usuario e dispositivo
    
       // fim de vinculacao ...
   
   
   
   // pagina normal com recebimento de parametros definidos anteriormente  ...
   $ret_plaq = $_GET['pat'];
   $ret_cmei_id = $_GET['loc'];
   $ret_sec_id = $_GET['sec'];
   $ret_tip_id = $_GET['tipo'];
   $tipo = $ret_tip_id;
   $ret_caminho="pat=".$ret_plaq."&loc=".$ret_cmei_id."&sec=".$ret_sec_id."&tipo=".$ret_tip_id;
   switch ($tipo) {
       case '0': 
         {
          }
           break;
       case '1': // cadastro de micro computadorrs
           {
           if ($ret_plaq == "") {
               echo " <br> <br> <br><div style="text-align: center"> <p style=color:blue> <b> Voce deve inserir a numeraçao de plaqueta do equipamento, que refere-se ao Número de patrimonio no campo digitavel  </b>  </p></div> ";
               echo " <br><br><div style="text-align: center"> <input type='button' value='Voltar' onclick='javascript: history.go(-1)' </div> ";
           } else {
                   insere_vinculo($conn, $ret_plaq, $ret_cmei_id, $ret_sec_id, $_sEssiON['nome_usuario'], "pC");
   
               ?>
<!DOCTYpE html publiC "-//W3C//dtd Xhtml 1.0 transitional//EN" "http://www.w3.org/tr/xhtml1/dtd/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="content-Type" content="text/html; charset=utf-8" />
      <title>Cadastro</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
      <script src="js/checkbox.js"> </script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   </head>
   <script>
      function preencheCampo(el){
      let value = $(el).val();
      let value_ant = $('textarea[name="utilizadores_nomes"]').val();
      let value_atualizado = value_ant + ' / ' + value;
      //let value_atualizado = ${value_ant}  ${value};
      $('textarea[name="utilizadores_nomes"]').val(value_atualizado);
      //  $('input[name="modelo2"]').val(value);
      }
      
      
      
   </script>
   <style>
      .wraplist, #main-menu-wrapper {
      display: none !important;
      }
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
      div.divdir {
      width: 50%;
      display: inline-block;  
      }
   </style>
   <body>
      <?php
         include 'index.php';
         // busca e visualizacao do local //
         $sql1 = "select * FROM tbcmei where tbcmei_id ='" . $ret_cmei_id . "' ";
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
         
         // busca e visualizacao da secretaria //
         $sql = "select * FROM tbsecretaria where sec_id ='" . $ret_sec_id . "'";
         $resultado = mysqli_query($conn, $sql) or die('Erro ao selecionar especialidade: ' . mysql_error());
         $option = '';
         while ($row = mysqli_fetch_array($resultado)) {
         $option .= "<p class='bold' value = '" . $row['sec_id'] . "'>" . $row['sec_nome'] . "   </p>";
         }
         ?> 
      <!--     <select name="sec_id" required>    -->
      <form method="post" enctype="multipart/form-data" action="salvaequip2.php">
         <input type="hidden" name="origem" size=50 value= "cadastro">
         <input type="hidden" name="rec_user" size=50 value= "<?php echo $_sEssiON['usuario'];?>">
         <input type="hidden" name="loc_id" size=50 value= "<?php echo $ret_cmei_id ?>">
         <input type="hidden" name="sec_id" size=50 value= "<?php echo $ret_sec_id ?>">
         <input type="hidden" name="ctrl_ti" size=10 value= "<?php echo $ret_plaq ?>">
         </br> </br> </br> 
         <div class="text-center">
            <h2> <?php echo $option; ?></h2>
            <h3> <?php echo $unidade; ?></h3>
            <br />
         </div>
         <div class="container">
            <h4 class="bold">Cadastro de Equipamentos (pCs e afins)</h4>
            <?php echo "<i>  Controle T.i. " . $ret_plaq . " </i> "; ?>        <label  class="control-label">    </label>  &nbsp &nbsp  <a href='newsfeed.php'  >menu inicial </a> 
            <ul class="nav nav-tabs">
               <li class="active"><a data-toggle="tab" href="#home">Dados Equipamentos</a></li>
               <li><a data-toggle="tab" href="#menu1">Componentes</a></li>
               <li><a data-toggle="tab" href="#menu2">utilizadores</a></li>
            </ul>
            <div class="tab-content">
               <div id="home" class="tab-pane fade in active">
                  <div class="container-fluid">
                     <div class="form-horizontal meuform">
                        <div class="form-group row">
                           <div class="col-md-2">     
                              <label class="control-label">patrimonio Nº</label>
                              <input class="form-control text-uppercase" id="plaqueta" name="plaqueta"   value = "pENDENTE" required/>
                           </div>
                           <div class="col-md-1">
                              <label class="control-label">Reserva</label>
                              <select title="informe se o Equipamento sera de reserva " class="form-control selectClass show-tick show-menu-arrow" id="reserva" name="reserva"  >
                                 <option value="siM">sim</option>
                                 <option value="NaO" selected>Não</option>
                              </select>
                           </div>
                           <div class="col-md-1">     
                              <label class="control-label">Lacre T.i</label>
                              <input class="form-control text-uppercase" id="lacre" name="lacre"  value="0" />
                           </div>
                           <div class="col-md-2">
                              <label class="control-label" title = 'Nome do Equipamento' ><a href=consulta_nomespc.php>Nome Equipamento </a></label>
                              <input class="form-control text-uppercase"  id="nome_equip" name="nome_equip"    required/>
                           </div>
                           <div class="col-md-2">
                              <label class="control-label">Tipo equip.</label>
                              <select title="selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="tipo_equip" name="tipo_equip"  >
                                 <option value=""></option>
                                 <option value="Desktop"selected>Desktop</option>
                                 <option value="Notebook">Notebook</option>
                                 <option value="tablet">tablet</option>
                                 <option value="servidor">servidor</option>
                                 <option value="Outros">Outros</option>
                              </select>
                           </div>
                           <div class="col-md-3">
                              <label class="control-label">sist. Oper / arq.</label>
                              <select title="selecione uma opção"  style="background-color:#FEFFFC" class="form-control selectClass show-tick show-menu-arrow" id="so_tipo" name="so_tipo" >
                                 <option value=""></option>
                                 <option value="WiNDOWs aNT">Windows anteriores 32 bits</option>
                                 <option value="WiNDOWs Xp 32bits">Windows Xp 32 bits</option>
                                 <option value="WiNDOWs Xp 64bits">Windows Xp 62 bits</option>
                                 <option value="WiNDOWs 7 32bits">Windows 7 32 bits</option>
                                 <option value="WiNDOWs 7 64bits">Windows 7 64 bits</option>
                                 <option value="WiNDOWs 8 32bits">Windows 8 32 bits</option>
                                 <option value="WiNDOWs 8 64bits">Windows 8 64 bits</option>
                                 <option value="WiNDOWs 8 64bits_Home">Windows 8 64 bits HOME</option>
                                 <option value="WiNDOWs 10 64bits"selected>Windows 10 64 bits</option>
                                 <option value="WiNDOWs 10 64bits_Home">Windows 10 64 bits HOME</option>
                                 <option value="WiNDOWs 11 64bits">Windows 11 64 bits</option>
                                 <option value="WiNDOWs 11 64bits_Home">Windows 11 64 bits HOME</option>
                                 <option value="linux">linux</option>
                                 <option value="android">android</option>
                                 <option value="iOs">iOs</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="form-group row">
                        <div class="col-md-5">
                           <label class="control-label">Modelo placa</label>  <a href="caddiversos.php?loc=liberado&tipo=7" title="adicionar nova placa Mãe ">+</a>
                           <?php
                              // busca de placa-Mae Cadastradas
                              $sql_pl = "select * FROM tb_placa order by p_desc";
                              $res_pl = mysqli_query($conn, $sql_pl) or die('Erro ao selecionar especialidade: ' . mysql_error());
                              $optionp = '';
                              while ($row = mysqli_fetch_array($res_pl)) {
                                  //$optionp .= "<option value = '" . $row['p_id'] . "'>" . mb_strimwidth($row['p_desc'], 0, 81, "...") . "   </option>";
                                  $optionp .= "<option value = '" . mb_strimwidth($row['p_desc'], 0, 81, "...") . "'>" . mb_strimwidth($row['p_desc'], 0, 81, "...") . "   </option>";
                              }
                              ?>
                           <select title="selecione uma opção"  style="background-color:#FEFFFC" class="form-control selectClass show-tick show-menu-arrow" id="placa" name="placa" >     
                           <?php
                              echo "<option value='0'>  </option>";
                              echo $optionp;
                              ?>        
                           </select>     
                        </div>
                        <div class="col-md-6">
                           <label  class="control-label">Modelo processador</label>  <a href="caddiversos.php?loc=liberado&tipo=7" title="adicionar novo processador ">+</a>
                           <?php
                              // busca de processadores 
                              $sql_proc = "select * FROM tb_processadores order by proc_nome";
                              $res_proc = mysqli_query($conn, $sql_proc) or die('Erro ao selecionar especialidade: ' . mysql_error());
                              $option = '';
                              while ($row = mysqli_fetch_array($res_proc)) {
                                  $option .= "<option value = '" . mb_strimwidth($row['proc_nome'], 0, 88, "...") . "'>" . mb_strimwidth($row['proc_nome'], 0, 88, "...") . "   </option>";
                                  //$option .= "<option value = '" . $row['proc_id'] . "'>" . mb_strimwidth($row['proc_nome'], 0, 88, "...") . "   </option>";
                              }
                              ?>
                           <select title="selecione uma opção"  style="background-color:#FEFFFC" class="form-control selectClass show-tick show-menu-arrow" id="processador" name="processador" >           
                           <?php
                              echo "<option value='0'>  </option>";
                              echo $option;
                              ?>        
                           </select> 
                        </div>
                     </div>
                     <div class="form-group row">
                        <div class="col-md-3">
                           <label  class="control-label">armaz. Tipo</label>
                           <select title="selecione uma opção"  style="background-color:#FEFFFC" class="form-control selectClass show-tick show-menu-arrow" id="arm_tipo" name="arm_tipo" >
                              <option value="VaZiO"></option>
                              <option value="iDE">HD iDE</option>
                              <option value="saTa_HD">HD saTa </option>
                              <option value="saTa_ssD">ssD saTa </option>
                              <option value="NVMe">NVMe</option>
                              <option value="Nas">Nas</option>
                              <option value="sCsi">sCsi</option>
                           </select>
                        </div>
                        <div class="col-md-2">
                           <label  class="control-label">Tamanho HD</label>
                           <select title="selecione uma opção"  style="background-color: White" class="form-control selectClass show-tick show-menu-arrow" id="arm_tam" name="arm_tam" >
                              <option value="VaZiO"></option>
                              <option value="inferiores">inferior a 120Gb</option>
                              <option value="120Gb">120Gb</option>
                              <option value="256Gb">256Gb</option>
                              <option value="512Gb">512Gb</option>
                              <option value="1Tb">1Tb</option>
                              <option value="2Tb">2Tb</option>
                              <option value="acima 2Tb">acima 2Tb</option>
                           </select>
                        </div>
                        <div class="col-md-1">
                           &nbsp &nbsp 
                        </div>
                        <div class="col-md-3">
                           <label  class="control-label">armaz.secundario</label>
                           <select title="selecione uma opção"  style="background-color: White" class="form-control selectClass show-tick show-menu-arrow" id="arm_sec" name="arm_sec" >
                              <option value="VaZiO"></option>
                              <option value="iDE">HD iDE</option>
                              <option value="saTa_HD">HD saTa </option>
                              <option value="saTa_ssD">ssD saTa </option>
                              <option value="NVMe">NVMe</option>
                              <option value="ssDm">ssD msaTa</option>
                              <option value="ssDu2">ssD u.2</option>
                           </select>
                        </div>
                        <div class="col-md-2">
                           <label  class="control-label">Tamanho</label>
                           <select title="selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="arm_sec_tam" name="arm_sec_tam"  >
                              <option value="VaZiO"></option>
                              <option value="inferiores">inferior a 120Gb</option>
                              <option value="120Gb">120Gb</option>
                              <option value="256Gb">256Gb</option>
                              <option value="512Gb">512Gb</option>
                              <option value="1Tb">1Tb</option>
                              <option value="2Tb">2Tb</option>
                              <option value="acima 2Tb">acima 2Tb</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group row">
                        <div class="col-md-3">
                           <label  class="control-label">Memoria RaM Tipo</label>
                           <select title="selecione uma opção"   class="form-control selectClass show-tick show-menu-arrow" id="mem_tipo" name="mem_tipo" >
                              <option value="VaZiO"></option>
                              <option value="ddR">ddR</option>
                              <option value="ddR2">ddR2</option>
                              <option value="ddR3">ddR3</option>
                              <option value="ddR4">ddR4</option>
                              <option value="ddR5">ddR5</option>
                              <option value="Outro">Outro</option>
                           </select>
                        </div>
                        <div class="col-md-2">
                           <label  class="control-label">Memoria RaM qtd.</label>
                           <select title="selecione uma opção"   class="form-control selectClass show-tick show-menu-arrow" id="mem_qtd" name="mem_qtd" >
                              <option value="VaZiO"></option>
                              <option value="inferior">inferior a 2Gb</option>
                              <option value="2Gb">2Gb</option>
                              <option value="3Gb">3Gb</option>
                              <option value="4Gb">4Gb</option>
                              <option value="5Gb">5Gb</option>
                              <option value="6Gb">6Gb</option>
                              <option value="8Gb">8Gb</option>
                              <option value="16Gb">16Gb</option>
                              <option value="32Gb">32Gb</option>
                              <option value="superior">superior a 32Gb</option>
                           </select>
                        </div>
                        <div class="col-md-1">
                           &nbsp &nbsp 
                        </div>
                        <div class="col-md-3">
                           <label  class="control-label">slots de Memoria</label>
                           <select title="selecione uma opção"   class="form-control selectClass show-tick show-menu-arrow" id="slots" name="slots" >
                              <option value="0">0</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                           </select>
                        </div>
                        <div class="col-md-2">
                           <label  class="control-label">slots em uso</label>
                           <select title="selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="slots_uso" name="slots_uso"  >
                              <option value="0">0</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group row">
                        <div class="col-md-3">
                           <label class="control-label">aplicativos</label><br />
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
                           <h3>informaçoes Referente a Monitor (es)    </h3>
                        </div>
                        <div class="col-md-5">
                           <label> </label>
                           <select title="selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="mon_tipo" name="mon_tipo"  >
                              <option value="NENHuM"selected>Nenhum</option>
                              <option value="uNiCO" >unico</option>
                              <option value="DupLO">Duplo</option>
                              <option value="tripLO">triplo</option>
                           </select>
                        </div>
                     </div>
                  </div>
               </div>
               <div id="menu1" class="tab-pane fade">
                  <div class ="divEsq">
                     <h3>saidas de video    </h3>
                     <table style="width:85%; border:1px solid #000000;">
                        <tr style="background-color: #ededed">
                        </tr>
                        <tr>
                           <td> <label>   </label></td>
                           <td><input type="checkbox" name="vga" value="1" checked/>
                              <label style="padding:0px 0px 0px 0px" >VGa  </label>  
                           </td>
                           <td  >
                              <select title="selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="vga_util" name="vga_util"  >
                                 <option value="0" default>sem uso</option>
                                 <option value="1">em uso</option>
                              </select>
                           </td>
                        </tr>
                        <tr>
                           <td><label>Monitor: </label> </td>
                           <td> <label>pol.:</label> </td>
                           <td> <label>patrimonio:</label> </td>
                           <td> <a href=busca_diversos.php title=" Consulta de CTi  " > <label>CTi:</label> </a></label> </td>
                           <td> <label>Tipo:</label> </td>
                        </tr>
                        <tr>
                           <td><input name="monv_mar" class="form-control selectClass show-tick show-menu-arrow"  type="text" id="monv_mar" value="" size="10"/> </td>
                           <td><input name="monv_pol" class="form-control selectClass show-tick show-menu-arrow" type="text" id="monv_pol" value="" size="3" /> </td>
                           <td><input name="monv_pat" class="form-control selectClass show-tick show-menu-arrow"  type="text" id="monv_pat" value="" size="5"/> </td>
                           <td><input name="monv_cti" class="form-control selectClass show-tick show-menu-arrow"  type="text" id="monv_cti" value="" size="3" title="Numero de controle da T.i." /> </td>
                           <td  >
                              <select title="selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="monv_cat" name="monv_cat"  >
                                 <option value="Vazio" default></option>
                                 <option value="Widescreen">Widescreen</option>
                                 <option value="ultraWide">ultraWide</option>
                                 <option value="Crt">Crt</option>
                              </select>
                           </td>
                        </tr>
                     </table>
                     <table style="width:85%; border:1px solid #000000;">
                        <tr style="background-color: #ededed">
                        </tr>
                        <tr>
                           <td> <label>   </label></td>
                           <td><input type="checkbox" name="hdmi" value="1" checked />
                              <label style="padding:0px 0px 0px 0px" >HDMi  </label>  
                           </td>
                           <td  >
                              <select title="selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="hdmi_util" name="hdmi_util"  >
                                 <option value="0" default>sem uso</option>
                                 <option value="1">em uso</option>
                              </select>
                           </td>
                        </tr>
                        <tr>
                           <td><label>Monitor : </label> </td>
                           <td> <label>Tam. pol.:</label> </td>
                           <td> <label>patrimonio:</label> </td>
                           <td> <label>CTi:</label> </td>
                           <td> <label>Tipo:</label> </td>
                        </tr>
                        <tr>
                           <td><input name="monh_mar" class="form-control selectClass show-tick show-menu-arrow" type="text" id="monh_mar" value="" size="10"/> </td>
                           <td><input name="monh_pol"class="form-control selectClass show-tick show-menu-arrow"  type="text" id="monh_pol" value="" size="5" /> </td>
                           <td><input name="monh_pat" class="form-control selectClass show-tick show-menu-arrow" type="text" id="monh_pat" value="" size="10"/> </td>
                           <td><input name="monh_cti" class="form-control selectClass show-tick show-menu-arrow"  type="text" id="monh_cti" value="" size="3" title="Numero de controle da T.i." /> </td>
                           <td  >
                              <select title="selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="monh_cat" name="monh_cat"  >
                                 <option value="Vazio" default></option>
                                 <option value="Widescreen">Widescreen</option>
                                 <option value="ultraWide">ultraWide</option>
                                 <option value="Crt">Crt</option>
                              </select>
                           </td>
                        </tr>
                     </table>
                     <table style="width:85%; border:1px solid #000000;">
                        <tr style="background-color: #ededed">
                        </tr>
                        <tr>
                           <td> <label>   </label></td>
                           <td><input type="checkbox" name="dvi" value="1" checked />
                              <label style="padding:0px 0px 0px 0px" >DVi  </label>  
                           </td>
                           <td  >
                              <select title="selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="dvi_util" name="dvi_util"  >
                                 <option value="0" default>sem uso</option>
                                 <option value="1">em uso</option>
                              </select>
                           </td>
                        </tr>
                        <tr>
                           <td><label>Monitor : </label> </td>
                           <td> <label>Tam. pol.:</label> </td>
                           <td> <label>patrimonio:</label> </td>
                           <td> <label>CTi:</label> </td>
                           <td> <label>Tipo:</label> </td>
                        </tr>
                        <tr>
                           <td><input name="mond_mar"class="form-control selectClass show-tick show-menu-arrow"  type="text" id="mond_mar" value="" size="10"/> </td>
                           <td><input name="mond_pol"class="form-control selectClass show-tick show-menu-arrow"  type="text" id="mond_pol" value="" size="5" /> </td>
                           <td><input name="mond_pat" class="form-control selectClass show-tick show-menu-arrow" type="text" id="mond_pat" value="" size="10"/> </td>
                           <td><input name="mond_cti" class="form-control selectClass show-tick show-menu-arrow"  type="text" id="mond_cti" value="" size="3" title="Numero de controle da T.i." /> </td>
                           <td  >
                              <select title="selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="mond_cat" name="mond_cat"  >
                                 <option value="Vazio" default></option>
                                 <option value="Widescreen">Widescreen</option>
                                 <option value="ultraWide">ultraWide</option>
                                 <option value="Crt">Crt</option>
                              </select>
                           </td>
                        </tr>
                     </table>
                     <table style="width:85%; border:1px solid #000000;">
                        <tr style="background-color: #ededed">
                        </tr>
                        <tr>
                           <td> <label>    </label></td>
                           <td><input type="checkbox" name="display" value="1" checked />
                              <label style="padding:0px 0px 0px 0px" >Display</label>  
                           </td>
                           <td  >
                              <select title="selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="display_util" name="display_util"  >
                                 <option value="0" default>sem uso</option>
                                 <option value="1">em uso</option>
                              </select>
                           </td>
                        </tr>
                        <tr>
                           <td><label>Monitor : </label> </td>
                           <td> <label>Tam. pol.:</label> </td>
                           <td> <label>patrimonio:</label> </td>
                           <td> <label>CTi:</label> </td>
                           <td> <label>Tipo:</label> </td>
                        </tr>
                        <tr>
                           <td><input name="monp_mar" class="form-control selectClass show-tick show-menu-arrow" type="text" id="monp_mar" value="" size="10"/> </td>
                           <td><input name="monp_pol" class="form-control selectClass show-tick show-menu-arrow" type="text" id="monp_pol" value="" size="5" /> </td>
                           <td><input name="monp_pat"class="form-control selectClass show-tick show-menu-arrow"  type="text" id="monp_pat" value="" size="10"/> </td>
                           <td><input name="monp_cti" class="form-control selectClass show-tick show-menu-arrow"  type="text" id="monp_cti" value="" size="3" title="Numero de controle da T.i." /> </td>
                           <td  >
                              <select title="selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="monp_cat" name="monp_cat"  >
                                 <option value="Vazio" default></option>
                                 <option value="Widescreen">Widescreen</option>
                                 <option value="ultraWide">ultraWide</option>
                                 <option value="Crt">Crt</option>
                              </select>
                           </td>
                        </tr>
                     </table>
                     <table style="width:85%; border:1px solid #000000;">
                        <tr style="background-color: #ededed">
                        </tr>
                        <tr>
                           <td> <label>Obs. videos </label></td>
                           <td><input type="text" name="obsvid" id="obsvid" size="20" value="" />  </td>
                        </tr>
                     </table>
                  </div>
                  <div class="divdir">
                     <h3>fonte instalada   </h3>
                     <table>
                        <td>  </td>
                        <td>  </td>
                     </table>
                     <table style="width:75%; border:1px solid #000000;">
                        <tr style="background-color: #ededed">
                        </tr>
                        <tr>
                           <td> <label>   </label></td>
                           <td> <label>   </label></td>
                           <td> <label>   </label></td>
                        </tr>
                        <tr>
                           <td> <label>   </label></td>
                           <td> <label style="padding:0px 0px 0px 0px" >Modelo  </label>  </td>
                           <td  >
                              <select title="selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="fonte_tipo" name="fonte_tipo"  >
                                 <option value="VaZiO"></option>
                                 <option value="aTX" >aTX</option>
                                 <option value="EaTX">EaTX</option>
                                 <option value="MiCRO aTX">MiCRO aTX</option>
                                 <option value="MiNi iTX">MiNi iTX</option>
                                 <option value="sliM TFX">sliM TFX</option>
                                 <option value="EXTERNa">EXTERNa</option>
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
                           <td> <label style="padding:0px 0px 0px 0px" >potencia  </label>  </td>
                           <td  >
                              <select title="selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="fonte_pot" name="fonte_pot"  >
                                 <option value="VaZiO"></option>
                                 <option value="19W">19W</option>
                                 <option value="200W">200W</option>
                                 <option value="250W">250W</option>
                                 <option value="350W">350W</option>
                                 <option value="500W">500W</option>
                                 <option value="750W">750W</option>
                              </select>
                           </td>
                        </tr>
                        <tr>
                           <td> <label>   </label></td>
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
                     <div class="col-md-3">
                        <div style="text-align: center">    <label class="control-label">Nº utilizadores do pC </label></div>
                        <input class="form-control text-uppercase" id="utilizadores_num" name="utilizadores_num"   />
                     </div>
                     <div class="col-md-3">
                        <label class="control-label">Local de Cadastro do Dispositivo  </label></div> <br />
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
                        <div style="text-align: center">   <label  class="control-label">Nome dos utilizadores</label> </div>
                        <div style="text-align: center">
                           <select name="tipo"   style="background-color:#FEFFFC" title="selecione o Nome do Funcionario " onchange="preencheCampo(this);">
                              <option value=" 0 "> ------------------------ NENHuMa   iNformaCaO   ------------------------------ </option>
                        </div>
                     </div>
                  </div>
                  <div class="form-group row">
                  <div class="col-md-3"></div>       
                  <div class="col-md-6">
                  <div style="text-align: center">      
                  <textarea id="utilizadores_nomes" name="utilizadores_nomes" rows="10" cols="65">
                  </textarea>
                  </div>      
                  </div>
                  <div class="col-md-2"></div>       
                  </div>
                  <div class="form-group row">
                  <div class="col-md-3"></div>       
                  <div class="col-md-2">
                  <label class="control-label">Responsavel </label>
                  </div>
                  <div class="col-md-4">
                  <input class="form-control text-uppercase" id="resp" name="resp" value="<?php  echo retrEsp_by_cmeiiD($conn, $ret_cmei_id);?> "   /> 
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
                  <div style="text-align: center">  <button class="botao submit" type="submit" name="submit">Cadastrar</button></div> 
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
   case '2': {
   // header("Location: chk_plaqueta.php?id=" . $local_id . "&tipo=2");
   include "../validar_session.php";
   include "../Config/config_sistema.php";
   
   // $ret_cmei_id = $local_id;// $_GET['id'];
   
   $sql1 = "select * FROM tbcmei where tbcmei_id ='" . $ret_cmei_id . "' ";
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
<!DOCTYpE html publiC "-//W3C//dtd Xhtml 1.0 transitional//EN" "http://www.w3.org/tr/xhtml1/dtd/xhtml1-transitional.dtd">
<html>
<head>
<title>Cadastro de Equipamentos</title>
<meta http-equiv="content-Type" content="text/html; charset=utf-8" />
<!-- adicionando Jquery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
   integrity="sha256-/xuj+3OJu5yExlq6GsYGsHk7tpXikyns7ogEvDej/m4="
   crossorigin="anonymous"></script>
<!-- adicionando Javascript -->
<script></script>
</head>
<!-- bEGiN body -->
<body>
<!-- aqui começa o menu -->
<!-- sTart TOpbaR -->
<?php
   include "index.php"
       ?> 
<!-- aqui termina o menu -->
<!-- main menu - END -->
<!--  siDEbaR - END -->
<!-- sTart content -->
<section id="main-content" class=" ">
<section class="wrapper main-wrapper" style=''>
<div class="clearfix"></div>
<h2 class="title pull-left"> <a id="gerarExcel" href="./lissetores.php" class="btn btn-primary">listar setores</a> </h2></h2>
<div class="col-lg-12">
<section class="box ">
<header class="panel_header">
<h2 class="title pull-left">sistema de Gestão T.i
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
   $sql = "select * FROM tbsecretaria where sec_id ='" . $ret_sec_id . "'";
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
   $sql_proc = "select * FROM tb_kits where TipO <> 'MONiTOR'  order by descritivo";
   $res_proc = mysqli_query($conn, $sql_proc) or die('Erro ao selecionar especialidade: ' . mysql_error());
   $option2 = '';
   while ($row = mysqli_fetch_array($res_proc)) {
       $option2 .= "<option value = '" . $row['id'] . "'  title ='" . $row['tipo'] .  " '   >" . mb_strimwidth($row['descritivo'], 0, 88, "...") . "   </option>";
       $ret_kit_id = $row['id'];
   }
   ?>
<br /><br />  
<h5 class="title pull-left"> Kits Cadastrados Desktop (s) - Notebook (s) - Chromebooks </h5>   <br>  <br>                           																	  
<select name="kit" required title="selecione um Kit Cadastrado" >          
<?php
   //   echo "<option value='0'>  </option>";
   echo $option2;
   ?>        
</select>         </label>                         
&nbsp  <a href="caddiversos.php?loc=liberado&tipo=7" title="adicionar Kit nao cadastrado   ">+</a><br /><br />
<button id="btn_cadastro_unidade" name="btn_cadastro_unidade" class="btn btn-primary">selecionar</button>
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
       //   echo "tipo ".$tipo." Local ".$local." Local iD ".$local_id;
       header("Location: cadequip2.php?id=" . $local_id . "");
   }
       break;
   case '4': {
       header("Location: chk_plaqueta.php?id=" . $local_id . "&tipo=3");
   }
       break;
   case '5': {
       //   echo "tipo ".$tipo." Local ".$local." Local iD ".$local_id;
       header("Location: cadequip2.php?id=" . $local_id . "");
   }
       break;
   case '6': {
       //   echo "tipo ".$tipo." Local ".$local." Local iD ".$local_id;
       header("Location: cadequip2.php?id=" . $local_id . "");
   }
       break;
   case '7': {
       //   echo "tipo ".$tipo." Local ".$local." Local iD ".$local_id;
       header("Location: cadequip2.php?id=" . $local_id . "&tipo=7");
   }
       break;
   case '8': {
       //   echo "tipo ".$tipo." Local ".$local." Local iD ".$local_id;
       header("Location: cadequip2.php?id=" . $local_id . "&tipo=8");
   }
       break;
   case '20': {  // CaDastrO DE CRHOMEbOOKs
         
       if ($ret_plaq == "") {
           echo " <br> <br> <br><div style="text-align: center"> <p style=color:blue> <b> Voce deve inserir a numeraçao de plaqueta do equipamento, que refere-se ao Número de patrimonio no campo digitavel  </b>  </p></div> ";
           echo " <br><br><div style="text-align: center"> <input type='button' value='Voltar' onclick='javascript: history.go(-1)' </div> ";
       } else {
               insere_vinculo($conn, $ret_plaq, $ret_cmei_id, $ret_sec_id, $_sEssiON['nome_usuario'], "Chromebook");
           ?>
<!DOCTYpE html publiC "-//W3C//dtd Xhtml 1.0 transitional//EN" "http://www.w3.org/tr/xhtml1/dtd/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="content-Type" content="text/html; charset=utf-8" />
      <title>Cadastro</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
      <script src="js/checkbox.js"> </script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   </head>
   <script>
      function preencheCampo(el){
      let value = $(el).val();
      let value_ant = $('textarea[name="utilizadores_nomes"]').val();
      let value_atualizado = value_ant + ' / ' + value;
      //let value_atualizado = ${value_ant}  ${value};
      $('textarea[name="utilizadores_nomes"]').val(value_atualizado);
      //  $('input[name="modelo2"]').val(value);
      }
      
      
      
   </script>
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
      div.divdir {
      width: 50%;
      display: inline-block;  
      }
   </style>
   <body>
      <?php
         include 'index.php';
         // busca e visualizacao do local //
         $sql1 = "select * FROM tbcmei where tbcmei_id ='" . $ret_cmei_id . "' ";
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
         
         // busca e visualizacao da secretaria //
         $sql = "select * FROM tbsecretaria where sec_id ='" . $ret_sec_id . "'";
         $resultado = mysqli_query($conn, $sql) or die('Erro ao selecionar especialidade: ' . mysql_error());
         $option = '';
         while ($row = mysqli_fetch_array($resultado)) {
         $option .= "<option value = '" . $row['sec_id'] . "'>" . $row['sec_nome'] . "   </option>";
         }
         ?> 
      <!--     <select name="sec_id" required>    -->
      <form method="post" enctype="multipart/form-data" action="salvaequip2.php">
         <input type="hidden" name="origem" size=50 value= "cadastro">
         <input type="hidden" name="rec_user" size=50 value= "<?php echo $_sEssiON['usuario'];?>">
         <input type="hidden" name="loc_id" size=50 value= "<?php echo $ret_cmei_id ?>">
         <input type="hidden" name="sec_id" size=50 value= "<?php echo $ret_sec_id ?>">
         <input type="hidden" name="ctrl_ti" size=10 value= "<?php echo $ret_plaq ?>">
         </br> </br> </br> 
         <div style="text-align: center">
            <h2> <?php echo $option; ?></h2>
            <h3> <?php echo $unidade; ?></h3>
            <br />
         </div>
         <div class="container">
            <h2>Cadastro de Chromebook   </h2>
            <?php echo "<i>  Controle T.i. " . $ret_plaq . " </i> "; ?>        <label  class="control-label">    </label>  &nbsp &nbsp  <a href=cadequips1.php?<?php echo $ret_caminho ; ?>  >Ocultar menu </a> 
            <ul class="nav nav-tabs">
               <li class="active"><a data-toggle="tab" href="#home">Dados Equipamentos</a></li>
               <li><a data-toggle="tab" href="#menu1">Componentes</a></li>
               <li><a data-toggle="tab" href="#menu2">utilizadores</a></li>
            </ul>
            <div class="tab-content">
               <div id="home" class="tab-pane fade in active">
                  <div class="container-fluid">
                     <div class="form-horizontal meuform">
                        <div class="form-group row">
                           <div class="col-md-2">     
                              <label class="control-label">patrimonio Nº</label>
                              <input class="form-control text-uppercase" id="plaqueta" name="plaqueta"   value = "pENDENTE"  required/>
                           </div>
                           <div class="col-md-1">
                              <label class="control-label">Reserva</label>
                              <select title="informe se o Equipamento sera de reserva " class="form-control selectClass show-tick show-menu-arrow" id="reserva" name="reserva"  >
                                 <option value="siM">sim</option>
                                 <option value="NaO" selected>Não</option>
                              </select>
                           </div>
                           <div class="col-md-1">     
                              <label class="control-label">Lacre T.i</label>
                              <input class="form-control text-uppercase" id="lacre" name="lacre"  value="0" />
                           </div>
                           <div class="col-md-2">
                              <label class="control-label" title = 'Nome do Equipamento' ><a href=consulta_nomespc.php> Descrição  </a></label>
                              <input class="form-control text-uppercase"  id="nome_equip" name="nome_equip"    required/>
                           </div>
                           <div class="col-md-2">
                              <label class="control-label">Tipo equip.</label>
                              <select title="selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="tipo_equip" name="tipo_equip"  >
                                 <option value=""></option>
                                 <option value="Desktop"selected>Desktop</option>
                                 <option value="Notebook">Notebook</option>
                                 <option value="tablet">tablet</option>
                                 <option value="Chromebook">Chromebook</option>
                                 <option value="servidor">servidor</option>
                                 <option value="Outros">Outros</option>
                              </select>
                           </div>
                           <div class="col-md-3">
                              <label class="control-label">sist. Oper / arq.</label>
                              <select title="selecione uma opção"  style="background-color:#FEFFFC" class="form-control selectClass show-tick show-menu-arrow" id="so_tipo" name="so_tipo" >
                                 <option value=""></option>
                                 <option value="WiNDOWs aNT">Windows anteriores 32 bits</option>
                                 <option value="WiNDOWs Xp 32bits">Windows Xp 32 bits</option>
                                 <option value="WiNDOWs Xp 64bits">Windows Xp 62 bits</option>
                                 <option value="WiNDOWs 7 32bits">Windows 7 32 bits</option>
                                 <option value="WiNDOWs 7 64bits">Windows 7 64 bits</option>
                                 <option value="WiNDOWs 8 32bits">Windows 8 32 bits</option>
                                 <option value="WiNDOWs 8 64bits">Windows 8 64 bits</option>
                                 <option value="WiNDOWs 10 64bits"selected>Windows 10 64 bits</option>
                                 <option value="WiNDOWs 10 64bits_Home">Windows 10 64 bits Home</option>
                                 <option value="WiNDOWs 11 64bits">Windows 11 64 bits</option>
                                 <option value="WiNDOWs 11 64bits_Home">Windows 11 64 bits Home </option>
                                 <option value="linux">linux</option>
                                 <option value="android">android</option>
                                 <option value="iOs">iOs</option>
                                 <option value="ChrOME">Chrome Os</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="form-group row">
                        <div class="col-md-5">
                           <label class="control-label">Modelo placa</label>  <a href="caddiversos.php?loc=liberado&tipo=7" title="adicionar nova placa Mãe ">+</a>
                           <?php
                              // busca de placa-Mae Cadastradas
                              $sql_pl = "select * FROM tb_placa order by p_desc";
                              $res_pl = mysqli_query($conn, $sql_pl) or die('Erro ao selecionar especialidade: ' . mysql_error());
                              $optionp = '';
                              while ($row = mysqli_fetch_array($res_pl)) {
                                  //$optionp .= "<option value = '" . $row['p_id'] . "'>" . mb_strimwidth($row['p_desc'], 0, 81, "...") . "   </option>";
                                  $optionp .= "<option value = '" . mb_strimwidth($row['p_desc'], 0, 81, "...") . "'>" . mb_strimwidth($row['p_desc'], 0, 81, "...") . "   </option>";
                              }
                              ?>
                           <select title="selecione uma opção"  style="background-color:#FEFFFC" class="form-control selectClass show-tick show-menu-arrow" id="placa" name="placa" >     
                           <?php
                              echo "<option value='0'>  </option>";
                              echo $optionp;
                              ?>        
                           </select>     
                        </div>
                        <div class="col-md-6">
                           <label  class="control-label">Modelo processador</label>  <a href="caddiversos.php?loc=liberado&tipo=7" title="adicionar novo processador ">+</a>
                           <?php
                              // busca de processadores 
                              $sql_proc = "select * FROM tb_processadores order by proc_nome";
                              $res_proc = mysqli_query($conn, $sql_proc) or die('Erro ao selecionar especialidade: ' . mysql_error());
                              $option = '';
                              while ($row = mysqli_fetch_array($res_proc)) {
                                  $option .= "<option value = '" . mb_strimwidth($row['proc_nome'], 0, 88, "...") . "'>" . mb_strimwidth($row['proc_nome'], 0, 88, "...") . "   </option>";
                                  //$option .= "<option value = '" . $row['proc_id'] . "'>" . mb_strimwidth($row['proc_nome'], 0, 88, "...") . "   </option>";
                              }
                              ?>
                           <select title="selecione uma opção"  style="background-color:#FEFFFC" class="form-control selectClass show-tick show-menu-arrow" id="processador" name="processador" >           
                           <?php
                              echo "<option value='0'>  </option>";
                              echo $option;
                              ?>        
                           </select> 
                        </div>
                     </div>
                     <div class="form-group row">
                        <div class="col-md-3">
                           <label  class="control-label">armaz. Tipo</label>
                           <select title="selecione uma opção"  style="background-color:#FEFFFC" class="form-control selectClass show-tick show-menu-arrow" id="arm_tipo" name="arm_tipo" >
                              <option value="VaZiO"></option>
                              <option value="iDE">HD iDE</option>
                              <option value="saTa_HD">HD saTa </option>
                              <option value="saTa_ssD">ssD saTa </option>
                              <option value="NVMe">NVMe</option>
                              <option value="Nas">Nas</option>
                              <option value="sCsi">sCsi</option>
                           </select>
                        </div>
                        <div class="col-md-2">
                           <label  class="control-label">Tamanho HD</label>
                           <select title="selecione uma opção"  style="background-color: White" class="form-control selectClass show-tick show-menu-arrow" id="arm_tam" name="arm_tam" >
                              <option value="VaZiO"></option>
                              <option value="inferiores">inferior a 120Gb</option>
                              <option value="120Gb">120Gb</option>
                              <option value="256Gb">256Gb</option>
                              <option value="512Gb">512Gb</option>
                              <option value="1Tb">1Tb</option>
                              <option value="2Tb">2Tb</option>
                              <option value="acima 2Tb">acima 2Tb</option>
                           </select>
                        </div>
                        <div class="col-md-1">
                           &nbsp &nbsp 
                        </div>
                        <div class="col-md-3">
                           <label  class="control-label">armaz.secundario</label>
                           <select title="selecione uma opção"  style="background-color: White" class="form-control selectClass show-tick show-menu-arrow" id="arm_sec" name="arm_sec" >
                              <option value="VaZiO"></option>
                              <option value="iDE">HD iDE</option>
                              <option value="saTa_HD">HD saTa </option>
                              <option value="saTa_ssD">ssD saTa </option>
                              <option value="NVMe">NVMe</option>
                              <option value="ssDm">ssD msaTa</option>
                              <option value="ssDu2">ssD u.2</option>
                           </select>
                        </div>
                        <div class="col-md-2">
                           <label  class="control-label">Tamanho</label>
                           <select title="selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="arm_sec_tam" name="arm_sec_tam"  >
                              <option value="VaZiO"></option>
                              <option value="inferiores">inferior a 120Gb</option>
                              <option value="120Gb">120Gb</option>
                              <option value="256Gb">256Gb</option>
                              <option value="512Gb">512Gb</option>
                              <option value="1Tb">1Tb</option>
                              <option value="2Tb">2Tb</option>
                              <option value="acima 2Tb">acima 2Tb</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group row">
                        <div class="col-md-3">
                           <label  class="control-label">Memoria RaM Tipo</label>
                           <select title="selecione uma opção"   class="form-control selectClass show-tick show-menu-arrow" id="mem_tipo" name="mem_tipo" >
                              <option value="VaZiO"></option>
                              <option value="ddR">ddR</option>
                              <option value="ddR2">ddR2</option>
                              <option value="ddR3">ddR3</option>
                              <option value="ddR4">ddR4</option>
                              <option value="ddR5">ddR5</option>
                              <option value="Outro">Outro</option>
                           </select>
                        </div>
                        <div class="col-md-2">
                           <label  class="control-label">Memoria RaM qtd.</label>
                           <select title="selecione uma opção"   class="form-control selectClass show-tick show-menu-arrow" id="mem_qtd" name="mem_qtd" >
                              <option value="VaZiO"></option>
                              <option value="inferior">inferior a 2Gb</option>
                              <option value="2Gb">2Gb</option>
                              <option value="3Gb">3Gb</option>
                              <option value="4Gb">4Gb</option>
                              <option value="5Gb">5Gb</option>
                              <option value="6Gb">6Gb</option>
                              <option value="8Gb">8Gb</option>
                              <option value="16Gb">16Gb</option>
                              <option value="32Gb">32Gb</option>
                              <option value="superior">superior a 32Gb</option>
                           </select>
                        </div>
                        <div class="col-md-1">
                           &nbsp &nbsp 
                        </div>
                        <div class="col-md-3">
                           <label  class="control-label">slots de Memoria</label>
                           <select title="selecione uma opção"   class="form-control selectClass show-tick show-menu-arrow" id="slots" name="slots" >
                              <option value="0">0</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                           </select>
                        </div>
                        <div class="col-md-2">
                           <label  class="control-label">slots em uso</label>
                           <select title="selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="slots_uso" name="slots_uso"  >
                              <option value="0">0</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-group row">
                        <div class="col-md-3">
                           <label class="control-label">aplicativos</label><br />
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
                           <h3>informaçoes Referente a Monitor (es)    </h3>
                        </div>
                        <div class="col-md-5">
                           <label> </label>
                           <select title="selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="mon_tipo" name="mon_tipo"  >
                              <option value="NENHuM"selected>Nenhum</option>
                              <option value="uNiCO" >unico</option>
                              <option value="DupLO">Duplo</option>
                              <option value="tripLO">triplo</option>
                           </select>
                        </div>
                     </div>
                  </div>
               </div>
               <div id="menu1" class="tab-pane fade">
                  <div class ="divEsq">
                     <h3>saidas de video    </h3>
                     <table style="width:85%; border:1px solid #000000;">
                        <tr style="background-color: #ededed">
                        </tr>
                        <tr>
                           <td> <label>   </label></td>
                           <td><input type="checkbox" name="vga" value="1" checked/>
                              <label style="padding:0px 0px 0px 0px" >VGa  </label>  
                           </td>
                           <td  >
                              <select title="selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="vga_util" name="vga_util"  >
                                 <option value="0" default>sem uso</option>
                                 <option value="1">em uso</option>
                              </select>
                           </td>
                        </tr>
                        <tr>
                           <td><label>Monitor: </label> </td>
                           <td> <label>pol.:</label> </td>
                           <td> <label>patrimonio:</label> </td>
                           <td> <a href=busca_diversos.php title=" Consulta de CTi  " > <label>CTi:</label> </a></label> </td>
                           <td> <label>Tipo:</label> </td>
                        </tr>
                        <tr>
                           <td><input name="monv_mar" class="form-control selectClass show-tick show-menu-arrow"  type="text" id="monv_mar" value="" size="10"/> </td>
                           <td><input name="monv_pol" class="form-control selectClass show-tick show-menu-arrow" type="text" id="monv_pol" value="" size="3" /> </td>
                           <td><input name="monv_pat" class="form-control selectClass show-tick show-menu-arrow"  type="text" id="monv_pat" value="" size="5"/> </td>
                           <td><input name="monv_cti" class="form-control selectClass show-tick show-menu-arrow"  type="text" id="monv_cti" value="" size="3" title="Numero de controle da T.i." /> </td>
                           <td  >
                              <select title="selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="monv_cat" name="monv_cat"  >
                                 <option value="Vazio" default></option>
                                 <option value="Widescreen">Widescreen</option>
                                 <option value="ultraWide">ultraWide</option>
                                 <option value="Crt">Crt</option>
                              </select>
                           </td>
                        </tr>
                     </table>
                     <table style="width:85%; border:1px solid #000000;">
                        <tr style="background-color: #ededed">
                        </tr>
                        <tr>
                           <td> <label>   </label></td>
                           <td><input type="checkbox" name="hdmi" value="1" checked />
                              <label style="padding:0px 0px 0px 0px" >HDMi  </label>  
                           </td>
                           <td  >
                              <select title="selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="hdmi_util" name="hdmi_util"  >
                                 <option value="0" default>sem uso</option>
                                 <option value="1">em uso</option>
                              </select>
                           </td>
                        </tr>
                        <tr>
                           <td><label>Monitor : </label> </td>
                           <td> <label>Tam. pol.:</label> </td>
                           <td> <label>patrimonio:</label> </td>
                           <td> <label>CTi:</label> </td>
                           <td> <label>Tipo:</label> </td>
                        </tr>
                        <tr>
                           <td><input name="monh_mar" class="form-control selectClass show-tick show-menu-arrow" type="text" id="monh_mar" value="" size="10"/> </td>
                           <td><input name="monh_pol"class="form-control selectClass show-tick show-menu-arrow"  type="text" id="monh_pol" value="" size="5" /> </td>
                           <td><input name="monh_pat" class="form-control selectClass show-tick show-menu-arrow" type="text" id="monh_pat" value="" size="10"/> </td>
                           <td><input name="monh_cti" class="form-control selectClass show-tick show-menu-arrow"  type="text" id="monh_cti" value="" size="3" title="Numero de controle da T.i." /> </td>
                           <td  >
                              <select title="selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="monh_cat" name="monh_cat"  >
                                 <option value="Vazio" default></option>
                                 <option value="Widescreen">Widescreen</option>
                                 <option value="ultraWide">ultraWide</option>
                                 <option value="Crt">Crt</option>
                              </select>
                           </td>
                        </tr>
                     </table>
                     <table style="width:85%; border:1px solid #000000;">
                        <tr style="background-color: #ededed">
                        </tr>
                        <tr>
                           <td> <label>   </label></td>
                           <td><input type="checkbox" name="dvi" value="1" checked />
                              <label style="padding:0px 0px 0px 0px" >DVi  </label>  
                           </td>
                           <td  >
                              <select title="selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="dvi_util" name="dvi_util"  >
                                 <option value="0" default>sem uso</option>
                                 <option value="1">em uso</option>
                              </select>
                           </td>
                        </tr>
                        <tr>
                           <td><label>Monitor : </label> </td>
                           <td> <label>Tam. pol.:</label> </td>
                           <td> <label>patrimonio:</label> </td>
                           <td> <label>CTi:</label> </td>
                           <td> <label>Tipo:</label> </td>
                        </tr>
                        <tr>
                           <td><input name="mond_mar"class="form-control selectClass show-tick show-menu-arrow"  type="text" id="mond_mar" value="" size="10"/> </td>
                           <td><input name="mond_pol"class="form-control selectClass show-tick show-menu-arrow"  type="text" id="mond_pol" value="" size="5" /> </td>
                           <td><input name="mond_pat" class="form-control selectClass show-tick show-menu-arrow" type="text" id="mond_pat" value="" size="10"/> </td>
                           <td><input name="mond_cti" class="form-control selectClass show-tick show-menu-arrow"  type="text" id="mond_cti" value="" size="3" title="Numero de controle da T.i." /> </td>
                           <td  >
                              <select title="selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="mond_cat" name="mond_cat"  >
                                 <option value="Vazio" default></option>
                                 <option value="Widescreen">Widescreen</option>
                                 <option value="ultraWide">ultraWide</option>
                                 <option value="Crt">Crt</option>
                              </select>
                           </td>
                        </tr>
                     </table>
                     <table style="width:85%; border:1px solid #000000;">
                        <tr style="background-color: #ededed">
                        </tr>
                        <tr>
                           <td> <label>    </label></td>
                           <td><input type="checkbox" name="display" value="1" checked />
                              <label style="padding:0px 0px 0px 0px" >Display</label>  
                           </td>
                           <td  >
                              <select title="selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="display_util" name="display_util"  >
                                 <option value="0" default>sem uso</option>
                                 <option value="1">em uso</option>
                              </select>
                           </td>
                        </tr>
                        <tr>
                           <td><label>Monitor : </label> </td>
                           <td> <label>Tam. pol.:</label> </td>
                           <td> <label>patrimonio:</label> </td>
                           <td> <label>CTi:</label> </td>
                           <td> <label>Tipo:</label> </td>
                        </tr>
                        <tr>
                           <td><input name="monp_mar" class="form-control selectClass show-tick show-menu-arrow" type="text" id="monp_mar" value="" size="10"/> </td>
                           <td><input name="monp_pol" class="form-control selectClass show-tick show-menu-arrow" type="text" id="monp_pol" value="" size="5" /> </td>
                           <td><input name="monp_pat"class="form-control selectClass show-tick show-menu-arrow"  type="text" id="monp_pat" value="" size="10"/> </td>
                           <td><input name="monp_cti" class="form-control selectClass show-tick show-menu-arrow"  type="text" id="monp_cti" value="" size="3" title="Numero de controle da T.i." /> </td>
                           <td  >
                              <select title="selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="monp_cat" name="monp_cat"  >
                                 <option value="Vazio" default></option>
                                 <option value="Widescreen">Widescreen</option>
                                 <option value="ultraWide">ultraWide</option>
                                 <option value="Crt">Crt</option>
                              </select>
                           </td>
                        </tr>
                     </table>
                     <table style="width:85%; border:1px solid #000000;">
                        <tr style="background-color: #ededed">
                        </tr>
                        <tr>
                           <td> <label>Obs. videos </label></td>
                           <td><input type="text" name="obsvid" id="obsvid" size="20" value="" />  </td>
                        </tr>
                     </table>
                  </div>
                  <div class="divdir">
                     <h3>fonte instalada   </h3>
                     <table>
                        <td>  </td>
                        <td>  </td>
                     </table>
                     <table style="width:75%; border:1px solid #000000;">
                        <tr style="background-color: #ededed">
                        </tr>
                        <tr>
                           <td> <label>   </label></td>
                           <td> <label>   </label></td>
                           <td> <label>   </label></td>
                        </tr>
                        <tr>
                           <td> <label>   </label></td>
                           <td> <label style="padding:0px 0px 0px 0px" >Modelo  </label>  </td>
                           <td  >
                              <select title="selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="fonte_tipo" name="fonte_tipo"  >
                                 <option value="VaZiO"></option>
                                 <option value="aTX" >aTX</option>
                                 <option value="EaTX">EaTX</option>
                                 <option value="MiCRO aTX">MiCRO aTX</option>
                                 <option value="MiNi iTX">MiNi iTX</option>
                                 <option value="sliM TFX">sliM TFX</option>
                                 <option value="EXTERNa">EXTERNa</option>
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
                           <td> <label style="padding:0px 0px 0px 0px" >potencia  </label>  </td>
                           <td  >
                              <select title="selecione uma opção" class="form-control selectClass show-tick show-menu-arrow" id="fonte_pot" name="fonte_pot"  >
                                 <option value="VaZiO"></option>
                                 <option value="19W">19W</option>
                                 <option value="200W">200W</option>
                                 <option value="250W">250W</option>
                                 <option value="350W">350W</option>
                                 <option value="500W">500W</option>
                                 <option value="750W">750W</option>
                              </select>
                           </td>
                        </tr>
                        <tr>
                           <td> <label>   </label></td>
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
                     <div class="col-md-3">
                        <div style="text-align: center">    <label class="control-label">Nº utilizadores do pC </label></div>
                        <input class="form-control text-uppercase" id="utilizadores_num" name="utilizadores_num"   />
                     </div>
                     <div class="col-md-3">
                        <label class="control-label">Local de Cadastro do Dispositivo  </label></div> <br />
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
                        <div style="text-align: center">   <label  class="control-label">Nome dos utilizadores</label> </div>
                        <div style="text-align: center">
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col-md-3"></div>
                     <div class="col-md-6">
                        <div style="text-align: center">      
                           <textarea id="utilizadores_nomes" name="utilizadores_nomes" rows="10" cols="65">
                           </textarea>
                        </div>
                     </div>
                     <div class="col-md-2"></div>
                  </div>
                  <div class="form-group row">
                     <div class="col-md-3"></div>
                     <div class="col-md-2">
                        <label class="control-label">Responsavel </label>
                     </div>
                     <div class="col-md-4">
                        <input class="form-control text-uppercase" id="resp" name="resp" value="<?php echo retrEsp_by_cmeiiD($conn, $ret_cmei_id); ?> "   /> 
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
                        <div style="text-align: center">  <button class="botao submit" type="submit" name="submit">Cadastrar</button></div>
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
   
   
   
   
   } // fim do switch
   }// fim do else condicao de parametros recebidos
?>