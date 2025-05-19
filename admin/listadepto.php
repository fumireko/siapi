<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR" lang="pt-BR" ng-app="App">
<head>
    <meta name="author" content="Admin" />
    <title>SEMED - Sistema de Gestao Escolar</title>
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
                <h1 class="title">Lista de Departamentos</h1>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

        <section class="box ">
        <header class="panel_header">
       
                <h2 class="title pull-left">Lista de Departamentos</h2>
                     
        </header>
        <a id="gerarExcel" href="./#/caddpto" class="btn btn-primary">Novo cadastro</a>  
         <!-- Dados do atendimento-->
           
            <table class="table table-hover table-bordered display" >
            <div  id="consulta">
            <form id="form1" name="form1" method="post" action="atendimentos.php" enctype="multipart/form-data">
            <table>
            <tr> 
            
            </form>
            <?php
            $quantidade = 100000;
            $pagina     = (isset($_GET['pagina'])) ? (int)$_GET['pagina'] : 1;
            $inicio     = ($quantidade * $pagina) - $quantidade; 
            $sql = "SELECT tbcmei.tbcmei_id, tbcmei.tbcmei_nome, 
            tbcmei.interno, tbcmei.tbcmei_local, 
            tbcmei.tbcmei_coord, tbcmei.tbcmei_sec_id,
            tbsecretaria.sec_nome
            from tbcmei inner Join tbsecretaria
            ON tbcmei.tbcmei_sec_id = tbsecretaria.sec_id  order by tbcmei_id ";
            $sql.=" LIMIT ".$inicio.",". $quantidade;
            $qr  = mysql_query($sql) or die(mysql_error());
            ?>
            </p>
            <table id="example" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                       
                       <th>CodCmei</th>
                       <th>Departamento</th>
                       <th>Secretaria</th>
                       <th>Interno</th>
                       <th>Local</th>
                       <th>Coordenador</th>
                      
                       <th>Ação</th>   
                    </tr>
                </thead>
            <tbody>
            <?php
                $i=0;
                $ordem=0;
                while( $ln = mysql_fetch_assoc($qr) )
                {
                $style = ( $i % 2 == 0 )? "style='background:#eeeeee;'" : "style='background:#CCCCCC;'"
            ?>
            <tr>
                <td><?php echo $ln['tbcmei_id'];?></td>
                <td><?php echo $ln['tbcmei_nome'];?></td>
                <td><?php echo $ln['sec_nome'];?></td>
                <td><?php echo $ln['interno'];?></td>
                <td><?php echo $ln['tbcmei_local'];?></td>
                <td><?php echo $ln['tbcmei_coord'];?></td>
               
                <td><a href="../admin/editadpto.php?tbcmei_id=<?php echo $ln['tbcmei_id'];?>">Editar</a></td>
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