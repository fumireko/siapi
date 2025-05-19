<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";
  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
    <title>Cadastro de departamentos</title>
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

                                        <!-- ********************************************** -->
                                   <div  id="consulta"> 
 
                                 
        
                                        <!-- ********************************************** -->
                                    </div>
                                    <div class="form-group">
                                
                            </div>
                                </div>
                             <form method="GET" action="cadcmei_suporte1.php">
                             <div>  
                                <div>  
                             <label>Nome da Secretaria: 
                                </div>
                                <div>
                                <?php 
                                    $sql = "SELECT * FROM tbsecretaria order by sec_nome";
                                
                                    $resultado = mysqli_query($conn, $sql) or die(mysqli_error());
                                    //$linhad = mysqli_fetch_assoc($dadosd);
                                    //$totald = mysqli_num_rows($dadosd);
                                    
                                //$resultado = mysql_query($sql) or die('Erro ao selecionar especialidade: ' .mysql_error());
                                    $option = '';
                                    while($row = mysqli_fetch_array($resultado))
                                     { 
                                       $option .= "<option value = '".$row['sec_id']."' TITLE= '" . $row['sec_id'] . "' >".$row['sec_nome']."  </option>";
                                     }                                   
                                ?>
                               <select name="area" id="area" >    
                                    
                                    <?php
                                    //    echo "<option value='0'></option>";
                                        echo $option;
                                  
                                        ?>        
                                    </select>
                                    <?php
                                 //   header("Location: cadcmei_suporte1.php");
                                ?>
                                    </div> 
                            <br /><br />
                                <button id="btn_cadastro_unidade" name="btn_cadastro_unidade" value="1" class="btn btn-primary">Selecionar</button>
                                </div>
                            </form>
                            </div>
                        </section></div>
                </section>
            </section>
        
    <script type="text/javascript">
$(document).ready(function(){
    $('#area').change(function(){
        $('#curso').load('cadcmei_suporte1.php?area='+$('#area').val() );
 
    });
});

function update() {
var select = document.getElementById('area');
var option = select.options[select.selectedIndex];	
document.getElementById('valuecod').value = option.value;
document.getElementById('valuesec').value = option.text;
//document.getElementById('text').value = option.text;

}

</script>

        
</body>

</html>
