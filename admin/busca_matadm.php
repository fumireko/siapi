
<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";
   //Variaveis de sessão
   $tbcmei_nome = $_SESSION['tbcmei_nome'];
    $nivel = $_SESSION['nivel_usuario'];
   $id_cmei = $_POST['id_cmei'];
   //variaves de busca
   $motivo = $_POST['motivo'];
   $turma = $_POST['turma'];
   $dta_nasc_busca = $_POST['dta_nasc_busca'];
   $dt = implode("-",array_reverse(explode("/",$dta_nasc_busca)));
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
                <h2 class="title pull-left">Natricular</h2>
                     
        </header>
         <!-- Dados do aluno-->
         <?php
            $sql = "SELECT tbaluno.tbaluno_id,
            tbaluno.tbaluno_nome, 
            tbaluno.tbaluno_dtnasc,
            tbaluno.tbaluno_turma,
            tbaluno.tbaluno_cep,
            tbaluno.tbaluno_status,
            tbfila.tbfila_id, 
            tbfila.tbaluno_tbaluno_id,
            tbfila.tbfila_turma,
            tbfila.tbfila_dtacad,
            tbfila.data_cadalterado,
            tbfila.tbfila_motivo,
            tbfila.tbcmei_tbcmcei_id,
            tbcmei.tbcmei_id, 
            tbfila.tbfila_ord,
            tbcmei.tbcmei_nome
             FROM tbaluno INNER JOIN tbfila 
             ON tbaluno.tbaluno_id = tbfila.tbaluno_tbaluno_id 
             iNNER JOIN tbcmei 
             on tbfila.tbcmei_tbcmcei_id = tbcmei.tbcmei_id 
             where tbfila_motivo LIKE '%".$_REQUEST['motivo']."%' 
             and tbaluno_turma like '%".$_REQUEST['turma']."%' 
			 and tbcmei_id like '%".$_REQUEST['id_cmei']."%'
             and tbfila_status ='fila'
             and tbaluno_status = 'pendente'
             ORDER BY tbfila_id";
             $qr  = mysql_query($sql) or die(mysql_error());
             ?> 
              <tr> <td> <a href='./#/matricularadm' class='btn btn-primary'>Nova busca</a> </td></tr>
              <tr> <td> <a id="gerarExcel" href="mat_gerarExcel.php?motivo=<?php echo $motivo;?>&turma=<?php echo $turma;?>" class="btn btn-primary">Gerar Relatório</a> </td></tr>
              <table class="table table-hover table-bordered display" >

              <thead>
                    <tr>
                       <th>Codigo</th>
                       <th>Nome</th>
                       <th>CMEI</th>
                       <th>Ordem</th>
                       <th>Dt nasc</th>
                       <th>Dt cad</th>
                       <th>Motivo</th>
                       <th>Turma</th>
                       <th>Acão</th>
                     </tr>
                         </thead>
                               <?php
                                    
                                $i=0;
                                $ordem=0;
                                while( $ln = mysql_fetch_assoc($qr) )
                                {
                                  $ordem++;
                                  $i++;
                                  $data = $ln['tbaluno_dtnasc'];
                                  $dtcad = $ln['tbfila_dtacad'];
                                  $id_fila = $ln['tbfila_id'];
                                  $id = $ln['tbaluno_id'];
                                  $dt = implode("/",array_reverse(explode("-",$data)));
                                  $data_cad = implode("/",array_reverse(explode("-",$dtcad)));
                                  $style = ( $i % 2 == 0 )? "style='background:#eeeeee;'" : "style='background:#CCCCCC;'"
                                ?>
                                <tbody>
                                        <tr>
                                           <td align ="center"> <a href="../admin/alterafila.php?tbfila_id=<?php echo $id_fila;?>&ordem=<?php echo $ordem;?>"><?php echo $id_fila;?></a>         
                                           </td>
                                            <td><?php echo $ln['tbaluno_nome'];?></td>
                                            <td><?php echo $ln['tbcmei_nome'];?></td>
                                            <td><a href="../admin/impfila.php?tbaluno_id=<?php echo $ln['tbaluno_id'];?>&ordem=<?php echo $ordem;?>"target="_blanck"><?php echo $ordem;?></a></td>
                                            <td><?php echo $dt;?></td>
                                            <td><?php echo $data_cad;?></td>
                                            <td><?php echo $ln['tbfila_motivo'];?></td>
                                            <td><?php echo $ln['tbaluno_turma'];?></td>
                                                                             
                                            <td><a href='confrmatricula.php?tbfila_id=<?php echo $id_fila;?>&ordem=<?php echo $ordem;?>' class='btn btn-primary'>Matricular</a>
											
											<?php
												if ($nivel == 1)  
												{
												echo "<a href='remove_fila.php?tbfila_id=$id_fila' class='btn btn-primary'>Remover</a>";
												}
											?>  
											</td>
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