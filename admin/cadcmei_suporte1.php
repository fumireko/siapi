<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";
include "bco_fun.php";
$codigo = $_GET['area'];
//echo " <center> <br> Codigo :" . $codigo ." </center>";  
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
    <script>
      
    </script>
    
    <style>

        span1 {
            font-size: 12px;
            font-weight: 600;
            color: teal;
            padding: 8px;
        }

       
        .success {
            background-color: #ffffff;
        }
    </style>
    
    
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
                                
                            </header>
                            
                            <div class="content-body">    <div class="row">
                               <div class="col-md-12 col-sm-12 col-xs-12">
                                           <!-- ********************************************** -->
                                   <div  id="consulta"> 
                                         <!-- ********************************************** -->
                                    </div>
                                   
                                </div>
                             <form method="post" action="salvacmei_suporte.php">
                                       <input type="hidden" name="sec_id" size=50 value= "<?php echo $codigo; ?>">
                                 <div>
                                <div>  
                             <label>  <?php echo nomedesecretaria($conn,$codigo); ?> 
                                </div>
                             <label>Locais Cadastrados</label>  <br />     
                                    <table name="textarea" id="" cols="70" >
                                    <table>
                                      <tr>                                    
                                            <?php 
                             
                                            $sqltb = "SELECT * FROM tbcmei where tbcmei_sec_id ='".$codigo."'  order by tbcmei_nome";
                                            $resultado2 = mysqli_query($conn, $sqltb) or die(mysqli_error());
                                            while($row2 = mysqli_fetch_array($resultado2))
                                             { 
                                               ?>  
                                          	     
                                          <?php  echo "<tr>  <td>	<a href= 'altera_cmei.php?buscar=".$row2['tbcmei_id']." ' title = 'alterar Nome do local ' > ".$row2['tbcmei_id']." </a>   </td>    <td> - <a href= 'altera_cmei_resp.php?buscar=" . $row2['tbcmei_id'] . " ' title = 'Alterar Nome do Responsavel " . $row2['tbcmei_coord'] . "' >  Resp   </a>  - </td>  <td>    </td>   <td> ". $row2['tbcmei_nome']."</td> <td>  <span1 class='success' title ='Responsavel' > ". $row2['tbcmei_coord']." </span1>
  </td> </tr>"  ?> 
                                               <?php 
                                             }
                                            ?>

                                    </table>




                                </div> 
                            <br />
                                   <div>  
                             <label>Nome do Departamento a Cadastrar : 
                                </div>
                                <div>
                                <input id="nome" name="nome" type="text" placeholder="Digite o nome do Departamento" size = "60" required>
                                </div>  
                                
                           <br />

                                <button id="btn_cadastro_unidade" name="btn_cadastro_unidade" class="btn btn-primary">Cadastrar</button>
                                </div>
                            </form>
                            </div>
                        </section></div>
                </section>
            </section>
        
        
</body>

</html>
