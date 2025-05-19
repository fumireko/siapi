<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";
   if (!isset($_SESSION)){
    session_start();
   }
   $email_usuario = $_SESSION['email_usuario'];
   $nome_usuario = $_SESSION['nome_usuario'];
   $nivel_usuario = $_SESSION['nivel_usuario'];
   $dia = date("Y-m-d");
   $hoje = strtotime($dia);
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
    .irregular{
        background-color: #c80000 !important; 
        color: white;
    }
    .regular{
        background-color: #00b71e !important;
        color: white;
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
                                <h2 class="title pull-left">Pequenos Reparos/Chamado</h2>
                                <div class="actions panel_actions pull-right">
                                    <i class="box_toggle fa fa-chevron-down"></i>
                                    <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                    <i class="box_close fa fa-times"></i>
                                </div>
                            </header>
                            <tr> <td> <a id="gerarExcel" href="chamado_gerarExcel.php?" class="btn btn-primary">Gerar Relatório</a> </td></tr>
                            <div class="content-body">    <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <!-- ********************************************** -->
<div  id="consulta">
<?php
  $quantidade = 100000;
  $pagina     = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
  $inicio     = ($quantidade * $pagina) - $quantidade; 
  $sql = "SELECT * FROM cmei_validacao ORDER BY cmei";
  $sql.=" LIMIT ".$inicio.",". $quantidade;
  $qr  = mysql_query($sql) or die(mysql_error());
  ?>
</p>
<table id="example" class="display" cellspacing="0" width="100%">
											<thead>
                                                <tr>
                                                <th>CMEI</th>
                                                <th>NRE</th>
                                                <th>Bombeiros</th>
                                                <th>Vigilância Sanitária</th>
                                                <th>SEMED</th>  
                                                </tr>
                                            </thead>
<tbody>
<?php                  
                                $i=0;
                                $ordem=0;
                                while( $ln = mysql_fetch_assoc($qr) )
                                {
                                    //vigilancia
                                    $caixa_da_agua = $ln['caixa_da_agua'];
                                    $dedetizacao = $ln['dedetizacao'];
                                    //Bombeiros
                                    $projeto = $ln['projeto'];
                                    $central_glp = $ln['central_glp'];
                                    $hidrantes = $ln['hidrantes'];
                                    $extintores = $ln['extintores'];
                                    $sinalizacao = $ln['sinalizacao'];
                                    $brigada_de_incendio = $ln['brigada_de_incendio'];
                                    $iluminacao = $ln['iluminacao'];
                                    $guarda_corpo = $ln['guarda_corpo'];
                                    $corrimao = $ln['corrimao'];
                                    //SEMED
                                    $atas = $ln['atas'];
                                    $conselho = $ln['conselho'];
                                    //Núcleo Regional da Área Norte
                                    $credenciamento = $ln['credenciamento'];
                                    $infantil = $ln['infantil'];
                                    $fundamental = $ln['fundamental'];
                                    //cmei
                                    $cmei = $ln['cmei'];
                                    $id = $ln['id'];
                                  $style = ( $i % 2 == 0 )? "style='background:#eeeeee;'" : "style='background:#CCCCCC;'"
                                ?>
                                        <?php
                                        //Bombeiros
                                        $search = "SELECT * FROM arquivo_cmei Where cmei = '$cmei' AND id_tipo_arquivo ='18' ORDER BY id DESC LIMIT 1";
                                        $result = mysql_query($search);
                                        while( $ln = mysql_fetch_assoc($result) )
                                         {
                                            $diaB = $ln['validade'];
                                            $dia_bombeiros = strtotime($diaB);
                                         }
                                         //Vigilancia
                                        $search = "SELECT * FROM arquivo_cmei Where cmei = '$cmei' AND id_tipo_arquivo ='19' ORDER BY id DESC LIMIT 1";
                                        $result = mysql_query($search);
                                        while( $ln = mysql_fetch_assoc($result) )
                                         {
                                            $diaV = $ln['validade'];
                                            $dia_vigilancia = strtotime($diaV);
                                         }
                                         //SEMED
                                        $search = "SELECT * FROM arquivo_cmei Where cmei = '$cmei' AND id_tipo_arquivo ='13' ORDER BY id DESC LIMIT 1";
                                        $result = mysql_query($search);
                                        while( $ln = mysql_fetch_assoc($result) )
                                         {
                                            $diaC = $ln['validade'];
                                            $dia_conselho = strtotime($diaC);
                                         }
                                        $search = "SELECT * FROM arquivo_cmei Where cmei = '$cmei' AND id_tipo_arquivo ='14' ORDER BY id DESC LIMIT 1";
                                        $result = mysql_query($search);
                                        while( $ln = mysql_fetch_assoc($result) )
                                         {
                                            $diaAt = $ln['validade'];
                                            $dia_atas = strtotime($diaAt);
                                         }
                                         //Nucle Regional da Area Nortes
                                        $search = "SELECT * FROM arquivo_cmei Where cmei = '$cmei' AND id_tipo_arquivo ='15' ORDER BY id DESC LIMIT 1";
                                        $result = mysql_query($search);
                                        while( $ln = mysql_fetch_assoc($result) )
                                         {
                                            $diaCr = $ln['validade'];
                                            $dia_credenciamento = strtotime($diaCr);
                                         }
                                        $search = "SELECT * FROM arquivo_cmei Where cmei = '$cmei' AND id_tipo_arquivo ='16' ORDER BY id DESC LIMIT 1";
                                        $result = mysql_query($search);
                                        while( $ln = mysql_fetch_assoc($result) )
                                         {
                                            $diaIn = $ln['validade'];
                                            $dia_Infantil = strtotime($diaIn);
                                         }
                                        $search = "SELECT * FROM arquivo_cmei Where cmei = '$cmei' AND id_tipo_arquivo ='17' ORDER BY id DESC LIMIT 1";
                                        $result = mysql_query($search);
                                        while( $ln = mysql_fetch_assoc($result) )
                                         {
                                            $diaF = $ln['validade'];
                                            $dia_Fundamental = strtotime($diaF);
                                         }
                                        ?>
                                        <tr>
                                            <td><a class="btn btn-primary" href="updateCmei.php?id=<?php echo $id;?>"><?php echo $cmei;?></a></td>
                                            <!-- Núcleo Regional da Área Norte -->
                                            <?php if($credenciamento == 'não' || $infantil == 'não' || $fundamental == 'não' || $hoje > $dia_credenciamento || $hoje > $dia_Infantil || $hoje > $dia_Fundamental){
                                                echo "<td class='irregular'>Irregular</td>";
                                            }
                                            else{
                                                echo "<td class='regular'>Regular</td>";
                                            }
                                            ?>
                                            <!-- Bombeiros -->
                                            <?php if($projeto == 'não' || $central_glp == 'não' || $hidrantes == 'não' || $extintores == 'não' || $sinalizacao == 'não' || $brigada_de_incendio == 'não' || $iluminacao == 'não' || $guarda_corpo == 'não' || $corrimao == 'não' || $hoje > $dia_bombeiros){
                                                echo "<td class='irregular'>Irregular</td>";
                                            }
                                            else{
                                                echo "<td class='regular'>Regular</td>";
                                            }?>
                                            <!-- vigilancia-->
                                            <?php if($caixa_da_agua == 'não' || $dedetizacao == 'não' || $hoje > $dia_vigilancia){
                                                echo "<td class='irregular'>Irregular</td>";
                                            }
                                            else{
                                                echo "<td class='regular'>Regular</td>";
                                            }
                                            ?>
                                            <!-- SEMED -->
                                            <?php if($atas == 'não' || $conselho == 'não' || $hoje > $dia_conselho || $hoje > $dia_atas){
                                                echo "<td class='irregular'>Irregular</td>";
                                            }
                                            else{
                                                echo "<td class='regular'>Regular</td>";
                                            }
                                            ?>
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