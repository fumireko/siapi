<?php
  include "../validar_session.php";  
  include "../Config/config_sistema.php";
   include "bco_fun2.php";
//$resolucao = ver_res_w();
//$ret_cmei_id = $_GET['id'];

//$filename= "correcao.txt";
/*
// Aqui você abre e lê o arquivo
    $arquivo = fopen ('controleQR.txt', 'r');
    // Aqui você está definindo que a variável é um 'array()'
    $result = array();
    // Você agora irá verificar se existe o arquivo e se o código acim o leu (true|false)
    while(!feof($arquivo)){
        // Aqui foi onde você errou, pois seria '$result[]' e não '$result'
        $result[] = explode("|",fgets($arquivo));
   
}
    // Fechando a leitura do arquivo
    fclose($arquivo);
    // Postando resultados
echo "<br> <br> <br> <center>";
print_r($result);
echo "</center> <br>";
*/
//abrimos o arquivo em leitura
//$arquivo = "/var/www/pasta/arquivo.txt"; // EXEMPLO DE CAMINHO. USE O CAMINHO CORRETO
//$arquivo = $filename ;

//$fp = fopen($arquivo, "r");

//lemos o arquivo
//$texto = fread($fp, filesize($arquivo));

//transformamos as quebras de linha em etiquetas
//$texto = nl2br($texto);

//echo $texto;








?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
    <title>Correcoes</title>
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

                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Sistema de Gestão T.I
                                </h2>
                               
                                 </h1>
                                
                             
                                

                            </header>
                            
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                         <h4 class="title pull-left"> <?php echo " Manutençao CTIs"; ?></h4>                                
                               
                                        <div class="actions panel_actions pull-right">
                                   
                                </div>


                                        <!-- ********************************************** -->
                                   <div  id="consulta"> 
 
                                 
        
                                        <!-- ********************************************** -->
                                    </div>
                                    <div class="form-group">
                                
                            </div>
                                </div>
                            <form method="post" action="#">    
                                  
                                   <input  type="hidden"  id="id_loc"  name="id_loc" type="text" value= "" size = "10" >
                                   <input  type="hidden"  id="id_sec"  name="id_sec" type="text" value= "" size = "10" >
                                    
                                
                                <div>  
                              <h5>  </h5>                                


                                </div>
                                <div>
                                 
                                 </div>  
                             
                                <br>
                            <div>
                             
                                 
                                </div>
                                   <a href="manut_cti1.php?tipo=1" title="Manutençao de CTI(s)">Confere CTI de Duas Tabelas (Controle e Equip) </a><br /><br />
                                  <a href="manut_cti1.php?tipo=3" title="Manutençao de CTI(s)">Confere CTI de Duas Tabelas (Controle e Monitores) </a><br /><br />
                                  <a href="manut_cti1.php?tipo=2" title="Manutençao de CTI(s)">Confere CTI de Duas Tabelas (Controle e Diversos) </a><br /><br />
                                  <a href="newsfeed.php" title="Inicio">Inicio </a><br /><br />

                              <?php echo " <br> <input type='button' value='Voltar' onclick='javascript: history.go(-1)'  "; ?>
                            </form>
                            </div>
                        </section></div>
                </section>
            </section>
        
        
</body>

</html>
