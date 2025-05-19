<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";
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
<body>
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
                <h2 class="title pull-left">Lista de demandas</h2>
                    
        </header>
         <!-- Dados do atendimento-->
            <tr> 
                <td> <a id="gerarExcel" href="atend_gerarExcel.php?" class="btn btn-primary">Gerar Relatório</a> </td>
                <td> <a id="gerarExcel" href="./#/caddemanda" class="btn btn-primary">Nova demanda</a> </td>
            </tr>
            <table class="table table-hover table-bordered display" >
            <div  id="consulta">
            <form id="form1" name="form1" method="post" action="listademanda.php" enctype="multipart/form-data">
            <table>
            <tr> 
            <div> 
                <td> Demandas </td>
            </div>    
                <td style="padding:0 15px;">
                    <select name="status" >
                        <option value="">Todos </option>
                        <option value="pendente">Pendentes</option>
                        <option value="finalizado">Finalizado</option>
                    </select>
                </td>
                <td>
                    <input type="submit" name="btnPESQUISAR" id="btnPESQUISAR" class="btn btn-primary" value="Localizar" />
                </td>
            </tr> 
            </form>
            <?php
            $quantidade = 100000;
            $pagina     = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
            $inicio     = ($quantidade * $pagina) - $quantidade; 
            $sql = "SELECT * FROM tbdemanda  where demanda_status LIKE '%".$_REQUEST['status']."%' ORDER BY demanda_id";
            $sql.=" LIMIT ".$inicio.",". $quantidade;
            $qr  = mysql_query($sql) or die(mysql_error());
            ?>
            </p>
            <table id="example" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                       <th>N°</th>
                       <th>Nome</th>
                       <th>Data abertura</th>
                       <th>Prazo</th>
                       <th>Data finalizado</th>
                       <th>Tipo doc</th>
                       <th>Documento</th>
                       <th>Obs</th>
                       <th>Status</th>
                       <th>Ação</th>   
                    </tr>
                </thead>
            <tbody>
            <?php
                $i=0;
                $ordem=0;
                while( $ln = mysql_fetch_assoc($qr) )
                {
                    $data_abe = $ln['demanda_data'];
                    $data_prazo = $ln['demanda_dtaprazo'];
                    $data_fim = $ln['demanda_datafim'];
                    $dt = implode("/",array_reverse(explode("-",$data_abe)));
                    $dtprazo = implode("/",array_reverse(explode("-",$data_prazo)));
                    $dtfim = implode("/",array_reverse(explode("-",$data_fim)));
                    $style = ( $i % 2 == 0 )? "style='background:#eeeeee;'" : "style='background:#CCCCCC;'"
            ?>
            <tr>
                <!--
                <form action="infAtendimento.php" method="post">
                    <input type="text" name="tb_atendimento_id" value="<?//php echo $ln['tb_atendimento_id'];?>" hidden>
                    <td><input class="btn btn-primary" type="submit" value="<?//php echo $ln['tb_atendimento_id'];?>"></td>
                </form>
                -->
                <td><a href="../aqui-vai-a-pagina?demanda_id=<?php echo $ln['demanda_id'];?>" rel="tooltip" data-color-class = "primary" data-animate=" animated fadeIn" 
                data-toggle="tooltip" data-original-title="Editar?" 
                data-placement="top"><u class='text-dark'><?php echo $ln['demanda_id'];?></u></a></td>
                <td><?php echo $ln['demanda_nome'];?></td>
                <td><?php echo $dt;?></td>
                <td><?php echo $dtprazo;?></td>
                <td><?php echo $dtfim;?></td>
                <td><?php echo $ln['demanda_tpdoc'];?></td>
                <td><?php echo $ln['demanda_numdoc'];?></td>
                <td><?php echo $ln['demanda_obs'];?></td>
                <td><?php echo $ln['demanda_status'];?></td>
                <td><a href="finalizademanda.php?demanda_id=<?php echo $ln['demanda_id']?>">Finalizar</a></td>
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
            </div>
            </section>
           </div>
        
</body>

</html>
