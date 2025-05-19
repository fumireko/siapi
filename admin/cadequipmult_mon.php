<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";

$ret_cmei_id = $_GET['loc'];
$ret_ref_id = $_GET['id_ref'];

// facilitador de visualizacao de ultimo cadastrado e sugestao da sequencia
if(isset($_GET['CTI']))
    $cti = $_GET['CTI'];
else
    $cti = 0;

if(isset($_GET['Patrimonio']))
    $pat=$_GET['Patrimonio'];
else
    $pat=0;
  
$msg = "Ultimo Patrimonio :  ".$pat."  Ultimo  CTI : ".$cti;

  $ncti = $cti + 1;
  $npat = $pat + 1;
if ($ret_ref_id == "0") 
{

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
                                            
                                
                                
                                <form method="post" action="salvaequipmult_mon.php">
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
                               <br />
                              
                              <div>
                                  <label >Tipo equip: </label>    
                                     &nbsp &nbsp
                                    <select name="tipo_equip">
                                                <option value=""></option>
                                                <option value="Desktop">Desktop</option>
                                                <option value="Notebook">Notebook</option>
                                                <option value="Tablet">Tablet</option>
                                                <option value="Servidor">Servidor</option>
                                                <option value="Monitor" selected>Monitor</option>
                                     </select>
                                        &nbsp &nbsp
                              
                                    <div>  
                                       <label>Marca Monitor  : 
                                       <input name="mon1_mar" type="text" id="mon1_mar" value="" size="25"   /></label>
                                        <label>Tam. Pol.: 
                                       <input name="mon1_tam" type="text" id="mon1_tam" value="" size="5"   /></label>
                                      
                                         <label>Tipo de Tela  (Pol): </label>                         
                                                                              <select title="Selecione uma opção" id="mon1_cat" name="mon1_cat"  >
                                                                                    <option value="Vazio" default></option>
                                                                                    <option value="Widescreen" selected >Widescreen</option>     
                                                                                    <option value="UltraWide">UltraWide</option>                
                                                                                    <option value="CRT">CRT</option>                    
                                                                                </select> 
                                                                         
                                        
                                </div>  

                                     
                                     
                                     

                                           <div>  
                                                </br> 
                                                 <label for="coord">Plaqueta Numero :</label>    
                                                &nbsp &nbsp
                                                    <input id="num_plaqueta" name="num_plaqueta" type="text" placeholder="Patrimonio " size = "15" value=""  >
                                               
                                                &nbsp &nbsp
                                               <label for="coord">Controle T.I. </label>    
                                                &nbsp &nbsp
                                                <input id="mon1_cti" name="mon1_cti" type="text" placeholder="Controle T.I " size = "10"  value="" />
                                              &nbsp &nbsp <label for="coord">PC CTI : </label>    
                                                &nbsp &nbsp
                                                <input id="pc_id" name="pc_id" type="text" placeholder="Vinculo com PC " size = "5" value="0" >


                                       </div>  
<br />                                      
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
else // para qdo retornar com id de referencia para cadastrar novo equipamento 
{
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
                                            
                                
                                
                                <form method="post" action="salvaequipmult_mon.php">
                                  <input type="hidden" name="loc_id" size=50 value= "<?php echo $ret_cmei_id ?>">
                                  <input type="hidden" name="sec_id" size=50 value= "<?php echo $ret_sec_id ?>">
                                  <input type="hidden" name="tipo_equip" size=50 value= "Monitor">
                                    
                                    <section class="box ">
                                 <header class="panel_header">
                                <h2 class="title pull-left"> <?php echo $unidade; ?></h2>                                
                                <div class="actions panel_actions pull-right">
                                  
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
                                
                              <br />
                                
                                 <?php
                                 //$ret_ref_id = substr(ret_caminho_ctrl_ti($conn, $ret_ref_id), 1);  // busca o caminho em controle_ti   
  
                                 
                                 
                                                    $sqle = "SELECT * FROM tb_monitores where ctrl_ti ='" . $ret_ref_id."'";
                                                    $resultadoe = mysqli_query($conn,$sqle) or die('Erro ao selecionar especialidade: ' .mysql_error());
                                                    //$option = '';
                                                     while($rowe = mysqli_fetch_array($resultadoe))
                                                       { 
                                                         //$r_tipo_equip = $rowe['tbequi_tipo'];
                                                         $r_marca = $rowe['mon_marca'];
                                                         $r_tam = $rowe['mon_tam'];
                                                         $r_tela = $rowe['mon_tipo'];
                                                         

                                                       }                                   
                                                    ?>

                            
                              
                          
                               <div>
                                  <label> Marca Monitor :     
                                    <input id="mon1_mar" name="mon1_mar" style="background-color:seashell;"  type="text"  size = "60" value="<?php echo $r_marca; ?>"  readonly>          
                                   
                                </div>

                                <div>
                                  <label> Tam. Pol :     
                                    <input id="mon1_tam" name="mon1_tam"  style="background-color:seashell;" type="text" value="<?php echo $r_tam; ?> " size = "25" readonly>
                                       </label>                         
                                     &nbsp &nbsp     &nbsp &nbsp      &nbsp 
                                   <label> Tipo Tela : </label>                         
                                     <input id="mon1_cat" style="background-color:seashell;"  name="mon1_cat" type="text"  size = "25" value="<?php echo $r_tela; ?> " readonly  >
                                    
                               </div>

                                       <?php
                                     if (($pat == 0) or ($cti == 0)) {
                                       // echo " <i>  Patrimonio : " . $pat . "    CTI : ".$cti   ."    </i> ";
                                     } else {
                                         echo " <i> <p style=color:RED> " . $msg . "  </i> </p>";
                                    }
                                 ?>
                              
                              
                              
                              
                              
                              
                                       <div>  
                                                </br> 
                                                 <label for="coord">Plaqueta Numero :</label>    
                                                &nbsp 
                                                    <input id="num_plaqueta" name="num_plaqueta" type="text" placeholder="Patrimonio " size = "15"  value="<?php echo $npat; ?>" >
                                               
                                                &nbsp <label for="coord">Controle T.I. </label>    
                                                &nbsp
                                                <input id="mon1_cti" name="mon1_cti" type="text" placeholder="Controle T.I " size = "10" value="<?php echo $ncti; ?>" >
                                              &nbsp  <label for="coord">PC CTI : </label>    
                                                &nbsp 
                                                <input id="pc_id" name="pc_id" type="text" placeholder="Vinculo com PC "  title="Vinculo com PC " size = "5" value="0" >


                                       </div>  

                                <br /> 


                                <div>
                                <label>Obs:
                                  <input name="obs" type="text" id="obs" size="70" /></label>
                                                               
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
