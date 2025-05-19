
<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";
   $id_cmei = $_SESSION['unidade_usuario'];
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
                <h1 class="title">Sistema de Gestao Escolar</h1>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

        <section class="box ">
        <header class="panel_header">
                <h2 class="title pull-left">Lista de Grupos<h2>
                     
        </header>
         <!-- Dados do aluno-->
         <?php
            $sql = "SELECT * FROM tbgrupos INNER JOIN tbcmei ON tbgrupos.unidade_id = tbcmei.tbcmei_id INNER JOIN usuarios ON tbgrupos.usuario_id = usuarios.id 
            WHERE unidade_id like '%".$id_cmei."%' ORDER BY id_grupo";/* INNER JOIN gp_membro ON tbgrupos.id_grupo = gp_membro.grupo*/
             $qr  = mysql_query($sql) or die(mysql_error());
             ?> 
              <!--<tr> <td> <a id="gerarExcel" href="atend_gerarExcel.php?departamento=<?php // echo $departamento;?>" class="btn btn-primary">Gerar Relatório</a> </td></tr>-->
              <table class="table table-hover table-bordered display" >

              <thead>
                    <tr>
                       <th>Nome</th>
                       <th>Cmei</th>
                       <th>Usuario</th>
                       <th>Ação</th>
                       <th>Ação</th>
                    </tr>
                         </thead>
                               <?php
                                    
                                $i=0;
                                while( $ln = mysql_fetch_assoc($qr) )
                                {
                                  $style = ( $i % 2 == 0 )? "style='background:#eeeeee;'" : "style='background:#CCCCCC;'"
                                ?>
                                <tbody>
                                        <tr>

                                            <td><?php echo $ln['gp_nome'];?></td>
                                            <td><?php echo $ln['tbcmei_nome'];?></td>
                                            <td><?php echo $ln['nome'];?></td>
                                            <td><a href='gpdetal.php?id_grupo=<?php echo $ln['id_grupo']?>' class='btn btn-primary'>Detalhes</a></td>
                                            <td><a href='cadmembro.php?id_grupo=<?php echo $ln['id_grupo']?>' class='btn btn-primary'>Adicionar membro</a></td>
                                        </tr>
                                </tbody>
                                <?php
                                }    
                                ?>                                   
                            </table>
                    </div>
                </div>
            </div>
            </section>
           </div>
        
</body>

</html>