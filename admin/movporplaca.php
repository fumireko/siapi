<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";
   $email_usuario = $_SESSION['email_usuario'];
   $tbequip_id = $_REQUEST['tbequip_id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR" lang="pt-BR" ng-app="App">
<head>
    <meta name="author" content="Admin" />
    <title>SISTEMA DE GESTÃO T.I</title>
<style>
        @import url('https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300');
    .titulos{
        font-size: 2rem;
        font-family: 'Open Sans Condensed', sans-serif;
        color: rgba(31, 181, 172, 1.0);
        text-align: center;
    }
    .titulos:after, .titulos:before {
        content: '';
        display: block;
        width: 80px;
        height: 3px;
        background: rgba(31, 181, 172, 1.0);
        margin: auto;
    }
    </style>  
</head>
<!-- BEGIN BODY -->
<body >
    <!-- aqui começa o menu -->
    <!-- START TOPBAR -->
    <?php 
       include "index.php"
    ?> 
        <!-- aqui termina o menu -->
         <div id="main-content">

        <section class="wrapper main-wrapper">
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
        <div class="page-title">
            <div class="pull-left">
            <h1 class="title">SISTEMA DE GESTÃO T.I</h1>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
        <section class="box ">
        <header class="panel_header">
                <h2 class="title pull-left">Movimento desse equipamento</h2>
                
       </header>
         <!-- Dados do atendimento-->
            <table class="table table-hover table-bordered display" >
            <div  id="consulta">
            <form id="form1" name="form1" method="post" action="movequipamento.php" enctype="multipart/form-data">
            <table>
            
            </form>
            <?php
             $quantidade = 100000;
             $pagina     = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
             $inicio     = ($quantidade * $pagina) - $quantidade;
             $get= "&regiao=".$_REQUEST['regiao'];
            if($_REQUEST['regiao'] ){
              $sql = "SELECT tbequip.tbequip_id,
              tbequip.tbequip_plaqueta,
              tbequip.tbequip_monitor,
              tbequip.tbequi_mod,
              tbequip.tbequip_so,
              tbequip.tbequi_modplaca,
              tbequip.tbequi_memoria,
              tbequip.tbequi_modelomemoria,
              tbequip.tbequi_armazenamento,
              tbequip.tbequi_tparmazenamento,
              tbequip.tbequi_teclado,
              tbequip.tbequi_mouse,
              tbequip.tbequi_filtrodelinha,
              tbtrasnfequip.tbtrasnfequip_id,
              tbtrasnfequip.tbtrasnfequip_idequip,
              tbtrasnfequip.tbtrasnfequip_idunidadeantiga,
              tbtrasnfequip.tbtrasnfequip_idunidadenova,
              tbtrasnfequip.tbtrasnfequip_dtatransf,
              tbtrasnfequip.tbtrasnfequip_login, where tbcmei.tbcmei_id = '".$_REQUEST['regiao']."'
              tbcmei.tbcmei_id,
              tbcmei.tbcmei_nome
              FROM tbequip INNER JOIN tbtrasnfequip 
              ON tbequip.tbequip_id = tbtrasnfequip.tbtrasnfequip_idequip  
              inner join tbcmei
              on tbcmei.tbcmei_id = tbtrasnfequip.tbtrasnfequip_idunidadenova
              where tbequip.tbequip_id = '".$tbequip_id."'
  	          ORDER BY tbequip_id";
              $sql.=" LIMIT ".$inicio.",". $quantidade;
             }else{
  		         $sql = "SELECT tbequip.tbequip_id,
                   tbequip.tbequip_plaqueta,
                   tbequip.tbequip_monitor,
                   tbequip.tbequi_mod,
                   tbequip.tbequip_so,
                   tbequip.tbequi_modplaca,
                   tbequip.tbequi_memoria,
                   tbequip.tbequi_modelomemoria,
                   tbequip.tbequi_armazenamento,
                   tbequip.tbequi_tparmazenamento,
                   tbequip.tbequi_teclado,
                   tbequip.tbequi_mouse,
                   tbequip.tbequi_filtrodelinha,
                   tbtrasnfequip.tbtrasnfequip_id,
                   tbtrasnfequip.tbtrasnfequip_idequip,
                   tbtrasnfequip.tbtrasnfequip_idunidadeantiga,
                   tbtrasnfequip.tbtrasnfequip_idunidadenova,
                   tbtrasnfequip.tbtrasnfequip_dtatransf,
                   tbtrasnfequip.tbtrasnfequip_login,
                   tbcmei.tbcmei_id,
                   tbcmei.tbcmei_nome
                   FROM tbequip INNER JOIN tbtrasnfequip 
                   ON tbequip.tbequip_id = tbtrasnfequip.tbtrasnfequip_idequip  
                   inner join tbcmei 
                   on tbcmei.tbcmei_id = tbtrasnfequip.tbtrasnfequip_idunidadenova 
                   where tbequip.tbequip_id = '".$tbequip_id."'
                   ORDER BY tbequip_id LIMIT ". $inicio.','. $quantidade;
  		        }//Executa o SQL
  	            $qr  = mysql_query($sql) or die(mysql_error());
            ?>
            <table id="example" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                    <th>Codigo</th>
                       <th>Plaqueta</th>
                       <th>Desc Proc</th>
                       <th>Desc Placa</th>
                       <th>Antigo Setor</th>
                       <th>Novo Setor</th>
                       <th>Monitor</th>
                       <th>Memoria</th>
                       <th>Tipo de memoria</th>
                       <th>Espaço em disco</th>
                       <th>Tipo de disco</th>
                       <th>Estado teclado</th>
                       <th>Estado mouse</th>   
                       <th>Estado filtro</th> 
                       <th>Ação</th>  
            
                    </tr>
                </thead>
            <tbody>
            <?php
                $i=0;
                $ordem=0;
                while( $ln = mysql_fetch_assoc($qr) )
                {
                    $data_lanc = $ln['tbequi_datalanc'];
                    $dtlanc = implode("/",array_reverse(explode("-",$data_lanc)));
                    $style = ( $i % 2 == 0 )? "style='background:#eeeeee;'" : "style='background:#CCCCCC;'"
            ?>
            <tr>
                <td><?php echo $ln['tbequip_id'];?></td>
                
                 <td><a href="movporplaca.php?tbequip_id=<?php echo $ln['tbequip_id'];?>" rel="tooltip" data-color-class = "primary" data-animate=" animated fadeIn" 
                 data-toggle="tooltip" data-original-title="Historico?" 
                 data-placement="top"><u class='text-dark'><?php echo $ln['tbequip_plaqueta'];?></u></a></td>
                <td><?php echo $ln['tbequi_mod'];?></td>
                <td><?php echo $ln['tbequi_modplaca'];?></td>
                <td><?php echo $ln['tbtrasnfequip_idunidadeantiga'];?></td>
                <td><?php echo $ln['tbcmei_nome'];?></td>
                <td><?php echo $ln['tbequip_monitor'];?></td>
                <td><?php echo $ln['tbequi_memoria'];?></td>
                <td><?php echo $ln['tbequi_modelomemoria'];?></td>
                <td><?php echo $ln['tbequi_armazenamento'];?></td>
                <td><?php echo $ln['tbequi_tparmazenamento'];?></td>
                <td><?php echo $ln['tbequi_teclado'];?></td>
                <td><?php echo $ln['tbequi_mouse'];?></td>
                <td><?php echo $ln['tbequi_filtrodelinha'];?></td>
                <td><a href="del_equip.php?tbequip_id=<?php echo $ln['tbequip_id']?>">Imprimir</a></td>
            </tr>
            <?php
            }    
            ?>    
            </tbody>                              
        </table>
        </div>
                    </div>
                </div>
            </div>
            </section>
           </div>
        
</body>

</html>
