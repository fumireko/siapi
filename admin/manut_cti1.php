<?php
  include "../validar_session.php";  
  include "../Config/config_sistema.php";
   include "bco_fun.php";

if (isset($_GET['tipo'])) {
    $ret_tipo = $_GET['tipo'];
} else
    $ret_tipo = "0";     

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


switch ($ret_tipo) {
    case '0':
        {
        echo "Nenhum parametro passado";
        }
        break;
    case '1': // ctis computadores
    {
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
                            
                        <style>
                            div.container {
                                height: 80%;
                                background: -webkit-linear-gradient(top, oldlace 20%, #DFF1F4 100%);
                            }

                            div.titulo {
                                font-size: 2vw;
                                background-color: beige;
                                text-align: center;
                                padding: 3vw;
                                position: relative;
                            }

                            div.op1 {
                                width: 20%;
                                float: left;
                                background-color: oldlace;
                                font-size: 1vw;
                                text-align: center;
                                padding: 2vw 0vw 5vw 0vw;
                                min-width: 20vw;
                            }

                            div.op2 {
                                width: 20%;
                                background-color: lemonchiffon;
                                float: right;
                                margin-right: 0vw;
                                font-size: 1vw;
                                text-align: center;
                                padding: 2vw 0vw 5vw 0vw;
                                min-width: 20vw;
                                float: right;
                            }

                            .clean {
                                clear: both;
                            }


                        </style>


                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                                      
                               
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
                                                                          
                                
                                </div>     
                                <div>  
                                    <div class="container">
    <div class="col-md-12"></div>
    <div class="titulo">Informaçoes de CTI (s) Computadores </div>
    <div class="op1">   <?php
    $item = "1";
    $result = mysqli_query($conn, 'SELECT * FROM tb_controle_ti where tab_origem =   "' . $item . '" and status = 1 order by abs(ctrl_ti) desc ');
    $retorno_checkInEng = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);

    echo "<center><label> CTI Nao Encontrado em TBEQUIP</label> </center><br>";
    echo " <center><textarea rows='20'  cols='25'   name='resultado'>";
    if ($retorno_checkInEng <> 0) {
        do {
            $ret_idloc = $row['tab_chave'];
            $ret_cti = $row['ctrl_ti'];
            $ret_status = $row['status'];
            if (ret_pos_tbequip_by_CTI($conn, $ret_cti) == "0") {
                echo "CTI " . mascara_cti($ret_cti) . " tbequip : " . $ret_idloc . "    ";
            }

        } while ($row = mysqli_fetch_assoc($result));
    }
    echo "</textarea> </center><br>";

    ?>
   </div>
    <div class="op2">
   <?php
   $item = "1";
   $result = mysqli_query($conn, 'SELECT * FROM tb_controle_ti where tab_origem =   "' . $item . '" and status = 1  order by abs(ctrl_ti) desc ');
   $retorno_checkInEng = mysqli_num_rows($result);
   $row = mysqli_fetch_assoc($result);

   echo "<center><label> CTI Encontrado em TBEQUIP</label> </center><br>";
   echo " <center><textarea rows='20'  cols='23'   name='resultado'>";
   if ($retorno_checkInEng <> 0) {
       do {
           $ret_idloc = $row['tab_chave'];
           $ret_cti = $row['ctrl_ti'];
           $ret_status = $row['status'];
           if (ret_pos_tbequip_by_CTI($conn, $ret_cti) == "1") {
               echo "CTI " . mascara_cti($ret_cti) . " tbequip : ".$ret_idloc."  ";
           }

       } while ($row = mysqli_fetch_assoc($result));
   }
   echo "</textarea> </center><br>";

   ?>                                        
                                        
                                        </div>
    <div class="clean"></div>
</div

                              <h5>  </h5>                                


                                </div>
                                <div>
                                 
                                 </div>  
                             
                                <br>
                            <div>
                             
                                 
                                </div>
                                   <a href="manut_cti.php?tipo=1" title="Manutençao de CTI(s)">Manutenção de CTI  </a><br /><br />
                                   <a href="newsfeed.php" title="Inicio">Inicio </a><br /><br />

                              <?php

                             
                              echo " <br> <input type='button' value='Voltar' onclick='javascript: history.go(-1)'  ";
                              ?>
                            
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
    case '2': // ctis diversos
    {
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
                            
                        <style>
                            div.container {
                                height: 80%;
                                background: -webkit-linear-gradient(top, oldlace 20%, #DFF1F4 100%);
                            }

                            div.titulo {
                                font-size: 2vw;
                                background-color: beige;
                                text-align: center;
                                padding: 3vw;
                                position: relative;
                            }

                            div.op1 {
                                width: 20%;
                                float: left;
                                background-color: oldlace;
                                font-size: 1vw;
                                text-align: center;
                                padding: 2vw 0vw 5vw 0vw;
                                min-width: 20vw;
                            }

                            div.op2 {
                                width: 20%;
                                background-color: lemonchiffon;
                                float: right;
                                margin-right: 0vw;
                                font-size: 1vw;
                                text-align: center;
                                padding: 2vw 0vw 5vw 0vw;
                                min-width: 20vw;
                                float: right;
                            }

                            .clean {
                                clear: both;
                            }


                        </style>


                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                                      
                               
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
                                                                          
                                
                                </div>     
                                <div>  
                                    <div class="container">
    <div class="col-md-12"></div>
    <div class="titulo">Informaçoes de CTI (s) Diversos </div>
    <div class="op1">   <?php
    $item = "2";
    $result = mysqli_query($conn, 'SELECT * FROM tb_controle_ti where tab_origem =   "' . $item . '" and status = 1 order by abs(ctrl_ti) desc ');
    $retorno_checkInEng = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);

    echo "<center><label> CTI Nao Encontrado em Diversos</label> </center><br>";
    echo " <center><textarea rows='20'  cols='15'   name='resultado'>";
    if ($retorno_checkInEng <> 0) {
        do {
            $ret_idloc = $row['tab_chave'];
            $ret_cti = $row['ctrl_ti'];
            $ret_status = $row['status'];
            if (ret_pos_div_by_CTI($conn, $ret_cti) == "0") {
                echo "CTI " . mascara_cti($ret_cti) . " / " . $ret_idloc . "    ";
            }

        } while ($row = mysqli_fetch_assoc($result));
    }
    echo "</textarea> </center><br>";

    ?>
   </div>
    <div class="op2">
   <?php
   $item = "2";
   $result = mysqli_query($conn, 'SELECT * FROM tb_controle_ti where tab_origem =   "' . $item . '" and status = 1 order by abs(ctrl_ti) desc ');
   $retorno_checkInEng = mysqli_num_rows($result);
   $row = mysqli_fetch_assoc($result);

   echo "<center><label> CTI Encontrado em Diversos</label> </center><br>";
   echo " <center><textarea rows='20'  cols='15'   name='resultado'>";
   if ($retorno_checkInEng <> 0) {
       do {
           $ret_idloc = $row['tab_chave'];
           $ret_cti = $row['ctrl_ti'];
           $ret_status = $row['status'];
           if (ret_pos_div_by_CTI($conn, $ret_cti) == "1") {
               echo "CTI " . mascara_cti($ret_cti) . " / ".$ret_idloc."  ";
           }

       } while ($row = mysqli_fetch_assoc($result));
   }
   echo "</textarea> </center><br>";

   ?>                                        
                                        
                                        </div>
    <div class="clean"></div>
</div

                              <h5>  </h5>                                


                                </div>
                                <div>
                                 
                                 </div>  
                             
                                <br>
                            <div>
                             
                                 
                                </div>
                                   <a href="manut_cti.php?tipo=1" title="Manutençao de CTI(s)">Manutenção de CTI  </a><br /><br />
                                   <a href="newsfeed.php" title="Inicio">Inicio </a><br /><br />

                              <?php

                             
                              echo " <br> <input type='button' value='Voltar' onclick='javascript: history.go(-1)'  ";
                              ?>
                            
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
    case '3':  // ctis monitores
        {
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
                            
                        <style>
                            div.container {
                                height: 80%;
                                background: -webkit-linear-gradient(top, oldlace 20%, #DFF1F4 100%);
                            }

                            div.titulo {
                                font-size: 2vw;
                                background-color: beige;
                                text-align: center;
                                padding: 3vw;
                                position: relative;
                            }

                            div.op1 {
                                width: 20%;
                                float: left;
                                background-color: oldlace;
                                font-size: 1vw;
                                text-align: center;
                                padding: 2vw 0vw 5vw 0vw;
                                min-width: 20vw;
                            }

                            div.op2 {
                                width: 20%;
                                background-color: lemonchiffon;
                                float: right;
                                margin-right: 0vw;
                                font-size: 1vw;
                                text-align: center;
                                padding: 2vw 0vw 5vw 0vw;
                                min-width: 20vw;
                                float: right;
                            }

                            .clean {
                                clear: both;
                            }


                        </style>


                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                                      
                               
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
                                                                          
                                
                                </div>     
                                <div>  
                                    <div class="container">
    <div class="col-md-12"></div>
    <div class="titulo">Informaçoes de CTI (s) Monitores </div>
    <div class="op1">   <?php
    $item = "3";
    $result = mysqli_query($conn, 'SELECT * FROM tb_controle_ti where tab_origem =   "' . $item . '" and status = 1 order by abs(ctrl_ti) desc ');
    $retorno_checkInEng = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);

    echo "<center><label> CTI Nao Encontrado em Monitores</label> </center><br>";
    echo " <center><textarea rows='20'  cols='15'   name='resultado'>";
    if ($retorno_checkInEng <> 0) {
        do {
            $ret_idloc = $row['tab_chave'];
            $ret_cti = $row['ctrl_ti'];
            $ret_status = $row['status'];
            if (ret_pos_mon_by_CTI($conn, $ret_cti) == "0") {
                echo "CTI " . mascara_cti($ret_cti) . " / " . $ret_idloc . "    ";
            }

        } while ($row = mysqli_fetch_assoc($result));
    }
    echo "</textarea> </center><br>";

    ?>
   </div>
    <div class="op2">
   <?php
   $item = "3";
   $result = mysqli_query($conn, 'SELECT * FROM tb_controle_ti where tab_origem =   "' . $item . '" and status = 1 order by abs(ctrl_ti) desc ');
   $retorno_checkInEng = mysqli_num_rows($result);
   $row = mysqli_fetch_assoc($result);

   echo "<center><label> CTI Encontrado em Monitores</label> </center><br>";
   echo " <center><textarea rows='20'  cols='15'   name='resultado'>";
   if ($retorno_checkInEng <> 0) {
       do {
           $ret_idloc = $row['tab_chave'];
           $ret_cti = $row['ctrl_ti'];
           $ret_status = $row['status'];
           if (ret_pos_mon_by_CTI($conn, $ret_cti) == "1") {
               echo "CTI " . mascara_cti($ret_cti) . " / ".$ret_idloc."  ";
           }

       } while ($row = mysqli_fetch_assoc($result));
   }
   echo "</textarea> </center><br>";

   ?>                                        
                                        
                                        </div>
    <div class="clean"></div>
</div

                              <h5>  </h5>                                


                                </div>
                                <div>
                                 
                                 </div>  
                             
                                <br>
                            <div>
                             
                                 
                                </div>
                                   <a href="manut_cti.php?tipo=1" title="Manutençao de CTI(s)">Manutenção de CTI  </a><br /><br />
                                   <a href="newsfeed.php" title="Inicio">Inicio </a><br /><br />

                              <?php

                             
                              echo " <br> <input type='button' value='Voltar' onclick='javascript: history.go(-1)'  ";
                              ?>
                            
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
}



     