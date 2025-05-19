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
       
                <h2 class="title pull-left">Lista de usuários</h2>
                     
        </header>
        <a id="gerarExcel" href="./cadcmei.php" class="btn btn-primary">Novo Setor</a>  
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
            $sql = "SELECT tbcmei_id, tbcmei_nome, 
            tbcmei_tel, tbcmei_coord , tbcmei_cep, tbcmei_end, tbcmei_num, 
            tbcmei_bairro, tbcmei_regiao, tbcmei_sec_id, sec_id, sec_nome
            from tbcmei  
            INNER JOIN tbsecretaria ON tbcmei.tbcmei_sec_id = tbsecretaria.sec_id
            order by tbcmei_nome ";
            $sql.=" LIMIT ".$inicio.",". $quantidade;
            $qr  = mysqli_query($conn,$sql) or die(mysqli_error());
            ?>
            </p>
            <table id="example" class="display" cellspacing="0" width="100%">
                <thead>
                    <tr>                       
                       <th>Cod</th>
                       <th>Departamento</th>
                       <th>Telefone</th>
                       <th>Coordenação</th>
                       <th>CEP</th>
                       <th>Enedreço</th>
                       <th>Numero</th>
                       <th>Bairro</th>
                       <th>Região</th>
                       <th>Ação</th> 
                    </tr>
                </thead>
            <tbody>
            <?php
                $i=0;
                $ordem=0;
                while( $ln = mysqli_fetch_assoc($qr) )
                {
                $style = ( $i % 2 == 0 )? "style='background:#eeeeee;'" : "style='background:#CCCCCC;'"
            ?>
            <tr>
                 <td><?php echo $ln['tbcmei_id'];?></td>
                <td><?php echo $ln['tbcmei_nome'];?></td>
                <td><?php echo $ln['tbcmei_tel'];?></td>
                <td><?php echo $ln['tbcmei_coord'];?></td>

                <td><?php echo $ln['tbcmei_cep'];?></td>
                <td><?php echo $ln['tbcmei_end'];?></td>
                <td><?php echo $ln['tbcmei_num'];?></td>
                <td><?php echo $ln['tbcmei_bairro'];?></td>
                <td><?php echo $ln['tbcmei_regiao'];?></td>





                <td><a href="precadequip.php?id=<?php echo $ln['tbcmei_id'];?>">Selecionar</a> - <a href="editacmei.php?tbcmei_id=<?php echo $ln['tbcmei_id']; ?>">editar</a> </td>
                
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