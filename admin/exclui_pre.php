<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";
   include "bco_fun2.php";
$resolucao = ver_res_w();
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
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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
<br /><br />
                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Sistema de Gestão T.I
                                </h2>
                               
                                 </h1>
                                
                             
                                

                            </header>
                            
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                         <h4 class="title pull-left"> <?php echo $unidade; ?></h4>                                
                               
                                        <div class="actions panel_actions pull-right">
                                  
                                </div>


                                        <!-- ********************************************** -->
                                   <div  id="consulta"> 
 
                                 
        
                                        <!-- ********************************************** -->
                                    </div>
                                    <div class="form-group">
                                
                            </div>
                                </div>
                            <form method="post" action="direciona.php">    
                                   <input  type="hidden"  id="nome"  name="nome" type="text" value=  "<?php echo "teste"; ?>"  size = "10" >
                                   <input  type="hidden"  id="id_loc"  name="id_loc" type="text" value=  <?php echo $ret_cmei_id; ?>  size = "10" >
                                   <input  type="hidden"  id="id_sec"  name="id_sec" type="text" value=  <?php echo $ret_sec_id; ?>  size = "10" >
                                     <input  type="hidden"  id="tipo"  name="tipo" type="text" value="13"  >
                                
                                <div>  
                          
                                    <input type="radio" id="cti" name="ctrl" checked value="cti">  &nbspCTI &nbsp&nbsp
                                    <input type="radio" id="id" name="ctrl" value="id">&nbsp ID  <br />  <br />

                                    <label>Escolha a Modalidade de Exclusao:  
                                
                                  <select name="tabela" title="Selecione uma opção"  style="background-color:#FEFFFC"  >
                                                        <option value="0"></option>
                                                        <option value="1">Tabela Equipamentos </option>
                                                        <option value="2">Diversos</option>                 
                                                        <option value="3">Monitores</option>                  
                                                        <option value="4">Controle_ti</option>                  
                                                        <option value="5">Extermina</option>
                                                        
                                                        
                                                    </select>
                                    <br /><br />  <label>Digite O Nº CONTROLE CTI ou ID : </label>  
                                    <input  type="text"  id="cti"  name="cti" type="text"  size = "10" > 
                                   <br />  <br /> <label style="color:red" >SENHA DE EXCLUSAO  : </label>  
                                    <input  type="password"  id="senha"  name="senha" type="text"  size = "15" title="NUMEROS "> 
                                </div>  
                               
                                <br> <br>
                            <div>
                            
                                <button id="btn_cadastro_unidade" name="btn_cadastro_unidade" class="btn btn-primary">Executar</button>
                                </div>

                                    <br><br>
                                    <a href="tabelas.php?id=0" title="SELECIONAR ">Tabela </a>  <br /><br />


                            </form>
                            </div>
                        </section></div>
                </section>
            </section>
        
        
</body>

</html>
