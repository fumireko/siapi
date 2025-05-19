<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";
$ret_cmei_id = $_GET['id'];
if (($ret_cmei_id == 0) or ($ret_cmei_id == "")) 
   {
    $unidade = "Nenhum local especificado";
    $ret_sec_id ="0";
    $ret_cmei_id = "0";
   // echo "<input  type='hidden'  id='nome'  name='nome' type='text' value='" . $unidade . " teste' size = '60' >";
   // echo "<input  type='hidden'  id='id_loc'  name='id_loc' type='text' value='" . $ret_cmei_id . "' size = '60' >";
    //echo "<input  type='hidden'  id='id_sec'  name='id_sec' type='text' value='" . $ret_sec_id . "' size = '60' >";
    //echo "Voce deve selecionar o Local de instalaçao do dispositivo";
   }
else
  {
    $sql1 = "SELECT * FROM tbcmei where tbcmei_id ='" . $ret_cmei_id . "' ";
    $resultado1 = mysqli_query($conn, $sql1) or die('Erro ao selecionar especialidade: ' . mysqli_error());
    $qtd = mysqli_num_rows($resultado1);  // $option = '';
    if ($qtd == 0)
        $nome_local = "Nenhum local encontrado";
    else
    {
        do {
            $row = mysqli_fetch_assoc($resultado1);
            $nome_local = $row['tbcmei_nome'];
            $ret_sec_id = $row['tbcmei_sec_id'];
            $unidade = $nome_local;
           echo  "<input  type='hidden'  id='nome'  name='nome' type='text' value='" .$nome_local. " teste' size = '60' >";
           echo   "<input  type='hidden'  id='id_loc'  name='id_loc' type='text' value='" .$ret_cmei_id. "' size = '60' >";
           echo    "<input  type='hidden'  id='id_sec'  name='id_sec' type='text' value='" .$ret_sec_id. "' size = '60' >";


        } while ($row = mysqli_fetch_assoc($resultado1));
    }



 }

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
                            
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                         <h4 class="title pull-left"> </h4>                                
                               
                                        <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>


                                        <!-- ********************************************** -->
                                   <div  id="consulta"> 
 
                                 
        
                                        <!-- ********************************************** -->
                                    </div>
                                    <div class="form-group">
                                
                            </div>
                                </div>
                            <form method="post" action="direciona3.php">    
                                
                                    
                                
                                <div>  
                             <label>Tipo de Dispositivo a ser cadastrado :  
                                </div>
                                <div>
                                  <select name="tipo" title="Selecione o tipo de Componente a ser instalado ">
                                                        <option value="0"></option>
                                                        <option value="1"selected  title="Cadastro de Informaçoes especificas de um grupo de PCs " >Kit(s) - Desktop</option>
                                                        <option value="4"title="Cadastro de Informaçoes especificas de um grupo de Notebooks " >kit(s) - Notebook </option>                  
                                                        <option value="6"selected  title="Cadastro de Informaçoes especificas Chromebooks " > Kit(s) ChromeBooks</option>
                                                        <option value="2" title="Cadastro de Informaçoes especificas de um grupo de Processador " >Processador PC</option>        
                                                        <option value="3"title="Cadastro de Informaçoes especificas de um grupo de Placa Mae(s) ">Placa Mae PC</option>                  
                                                        <option value="5"title="Cadastro de Informaçoes especificas de um grupo de Monitor (es) ">Monitores</option>                  
                                                     
                                                        
                                                    </select>
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
