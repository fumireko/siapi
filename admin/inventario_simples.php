<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";
   if (!isset($_SESSION)){
    session_start();
   }
   $email_usuario = $_SESSION['email_usuario'];
   $nome_usuario = $_SESSION['nome_usuario'];
   $nivel_usuario = $_SESSION['nivel_usuario'];
// faz consulta no banco de dados
$consulta = mysql_query("SELECT * FROM usuarios where email = '".$email_usuario."'");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR" lang="pt-BR" ng-app="App">


<head>
    <meta name="author" content="Admin" />
    <title>SEMED - Sistema de Gestao Escolar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
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

                    <div class="col-lg-12">
                        <section class="box ">
                            <header class="panel_header">
                                <h2 class="title pull-left">Obras</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <tr> <td> <a id="gerarExcel" href="obras_gerarExcel.php?" class="btn btn-primary">Gerar Relatório</a> </td></tr>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                        <!-- ********************************************** -->
<div  id="consulta">
<?php
  $quantidade = 100000;
  $pagina     = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
  $inicio     = ($quantidade * $pagina) - $quantidade; 
  $sql = "SELECT * FROM inventario_simples WHERE local_inventario_simples = '$tbcmei_nome' ORDER BY id_inventario_simples";
  $sql.=" LIMIT ".$inicio.",". $quantidade;
  $qr  = mysql_query($sql) or die(mysql_error());
  ?>
</p>
<table id="example" class="display" cellspacing="0" width="100%">
											<thead>
                                                <tr>
                                                    <th>Item</th>
                                                    <th>Quantidade</th>
                                                    <th>Condição</th>
                                                    <th>Descrição</th>   
                                                </tr>
                                            </thead>
<tbody>
<?php
                                    
                                $i=0;
                                $ordem=0;
                                while( $ln = mysql_fetch_assoc($qr) )
                                {
                                  $data = $ln['dia_solic'];
                                  $dt = implode("/",array_reverse(explode("-",$data)));
                                  $style = ( $i % 2 == 0 )? "style='background:#eeeeee;'" : "style='background:#CCCCCC;'"
                                ?>
                                        <tr>
                                            <td><?php echo $ln['nome_inventario_simples'];?></td>
                                            <td><?php echo $ln['quantidade_inventario_simples'];?></td>
                                            <td><?php echo $ln['estado_simples'];?></td>
                                            <td><?php echo $ln['descricao_simples'];?></td>
                                        </tr>
                                <?php
                                }    
                                ?>    
                                </tbody>                              
                            </table>

                                        <!-- ********************************************** -->
                                    </div>
                                </div>
                            </div>
                        </section></div>
                </section>
            </section>
        
        
</body>

</html>