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
                <h1 class="title">Sistema de Gestao Escolar</h1>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

        <section class="box ">
        <header class="panel_header">
                <h2 class="title pull-left">Lista de Atendimentos</h2>
                     
        </header>
         <!-- Dados do atendimento-->
            <tr> <td> <a id="gerarExcel" href="atend_gerarExcel.php?" class="btn btn-primary">Gerar Relatório</a> </td></tr>
            <table class="table table-hover table-bordered display" >
            <div  id="consulta">
            <form id="form1" name="form1" method="post" action="atendimentos.php" enctype="multipart/form-data">
            <table>
            <tr> 
            <div> 
                <td> Atendimentos </td>
            </div>    
                <td style="padding:0 15px;">
                    <select name="status" >
                        <option value=""> </option>
                        <option value="aberto">Abertos</option>
                        <option value="execução">Em execução</option>
                        <option value="Finalizado">Finalizado</option>
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
            $sql = "SELECT * FROM tb_atendimento INNER JOIN tbcmei ON tb_atendimento.tb_atendimento_departamento = tbcmei.tbcmei_id where tb_atendimento_status LIKE '%".$_REQUEST['status']."%' ORDER BY tb_atendimento_id";
            $sql.=" LIMIT ".$inicio.",". $quantidade;
            $qr  = mysql_query($sql) or die(mysql_error());
            ?>
            </p>
            <table id="example" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>
                       <th>N°</th>
                       <th>Data</th>
                       <th>Hora</th>
                       <th>Requerente</th>
                       <th>Assunto</th>
                       <th>Departamento</th>
                       <th>Descrição</th>
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
                    $data = $ln['tb_atendimento_dia'];
                    $dt = implode("/",array_reverse(explode("-",$data)));
                    $style = ( $i % 2 == 0 )? "style='background:#eeeeee;'" : "style='background:#CCCCCC;'"
            ?>
            <tr>
                <!--
                <form action="infAtendimento.php" method="post">
                    <input type="text" name="tb_atendimento_id" value="<?//php echo $ln['tb_atendimento_id'];?>" hidden>
                    <td><input class="btn btn-primary" type="submit" value="<?//php echo $ln['tb_atendimento_id'];?>"></td>
                </form>
                -->
                <td><a class="btn btn-primary" href="infAtendimento.php?tb_atendimento_id=<?php echo $ln['tb_atendimento_id']?>"><?php echo $ln['tb_atendimento_id_ano']?>/<?php echo $ln['tb_atendimento_ano'];?></a></td>
                <td><?php echo $dt;?></td>
                <td><?php echo $ln['tb_atendimento_hora'];?></td>
                <td><?php echo $ln['tb_atendimento_nome'];?></td>
                <td><?php echo $ln['tb_atendimento_assunto'];?></td>
                <td><?php echo $ln['tbcmei_nome'];?></td>
                <td><?php echo $ln['tb_atendimento_descricao'];?></td>
                <td><?php echo $ln['tb_atendimento_status'];?></td>
                <td><a href="finAtendimento.php?tb_atendimento_id=<?php echo $ln['tb_atendimento_id']?>">Finalizar</a></td>
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
