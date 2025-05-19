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
         
    <?php include "index.php"; ?> 
         <!-- aqui termina o menu -->
        <!-- MAIN MENU - END -->
        <!--  SIDEBAR - END -->
        <!-- START CONTENT -->
        
        <section id="main-content" class=" ">
                <section class="wrapper main-wrapper" style=''>
                    <div class="clearfix"></div>

                    <div class="col-lg-12">
                        <section class="box">
                            <header class="card-header">
                                <h2 class="title">PRE-CADASTRO DE EQUIPAMENTO</h2>
                            </header>
                            
                            <div class="container-fluid" style="padding-bottom: 1em;">
                                <div class="col">
                                    <h4 class="bold text-left"> <?php echo ""; ?></h4>
                                    
                                    
                                        
                                    <a id="gerarExcel" href="./lissetores.php" class="btn btn-primary">Listar setores</a>
                                </div> 
                            </div> 
                            
                            <form method="post" action="conversao_ret_dados.php">    
                                <input  type="hidden"  id="nome"  name="nome" type="text" value=  ""  size = "10" >
                                        
                                <hr>

                                <div class="container-fluid">
                                    <h4 class="bold">CTI (antigo)  :</h4>  
                                    <input type="text" id="cti_ant" name="cti_ant" type="text" size="30" required>
                                   
                                    <h4 class="bold">CTI (atualizado)  :</h4>  
                                    <input type="text" id="cti_atual" name="cti_atual" type="text" size="30" required>
                               
                                    <h4 class="bold">Senha de Liberaçao  :</h4>  
                                    <input type="password" id="pass_liber" name="pass_liber"  size="30" required>
                               
                                    
                                    <div>

                                           <!-- Button -->
                              <div class="form-group">
                              <div align="center"><input type="submit" value="REGISTRAR" name="salvar" class="btn btn-primary" /></div>
                       

<br /> <br />
                                    </div>
                                </div>

                            </form>      
                        </section>
                    </div>
                </section>
        </section>
        
</body>

</html>
