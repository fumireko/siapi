<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";
$ret_id = $_GET['var'];
if (($ret_id == 0) or ($ret_id == "")) 
   {
    $unidade = "Nenhum Equipamento especificado";
    //$ret_sec_id ="0";
    //$ret_cmei_id = "0";
   // echo "<input  type='hidden'  id='nome'  name='nome' type='text' value='" . $unidade . " teste' size = '60' >";
   // echo "<input  type='hidden'  id='id_loc'  name='id_loc' type='text' value='" . $ret_cmei_id . "' size = '60' >";
    //echo "<input  type='hidden'  id='id_sec'  name='id_sec' type='text' value='" . $ret_sec_id . "' size = '60' >";
    //echo "Voce deve selecionar o Local de instalaçao do dispositivo";
   }
else
  {
    $sql1 = "SELECT * FROM tb_processadores  where proc_id ='" . $ret_id . "' ";
    $resultado1 = mysqli_query($conn, $sql1) or die('Erro ao selecionar especialidade: ' . mysqli_error());
    $qtd = mysqli_num_rows($resultado1);  // $option = '';
    if ($qtd == 0)
        $nome_local = "Nenhum local encontrado";
    else
    {
        do {
            $row = mysqli_fetch_assoc($resultado1);
            $descricao = $row['proc_nome'];
        } while ($row = mysqli_fetch_assoc($resultado1));
    }



 }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
    <title>Gerenciamento de Processadores</title>
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
                              <input type="hidden" name="proc_id"  value= "<?php echo $ret_id ?>">  
                              <input type="hidden" name="tipo"  value= "8">                                      
                                 <input type="hidden" name="descricao_ant"  value= "<?php echo $descricao ?>">    
                                <div>  
                             <label>Selecione a Ação a ser executada :  
                                
                                
                                  <select name="acao" >
                                                        <option value="0"></option>
                                                        <option value="1" selected>Alteraçao</option>
                                                        <option value="2">Exclusão</option>                  
                                                        
                                                    </select>
                                 </div>  
                           
                                            <label >Descrição do Processador</label><br />
                                            <input  id="descricao" name="descricao"  size="85" value =  "<?php echo $descricao; ?>" required/>
                          
                                <br />


                                <br>
                            <div>
                            
                                <button id="btn_cadastro_unidade" name="btn_cadastro_unidade" class="btn btn-primary">Executar</button>
                                </div>
                            </form>
                            </div>
                        </section></div>
                </section>
            </section>
        
        
</body>

</html>
