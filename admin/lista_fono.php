
<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";
   //Variaveis de sessão
   
   $tbcmei_nome = $_SESSION['tbcmei_nome'];
   $cod_cmei = $_SESSION['unidade_usuario'];
   $id_cmei = $_POST['id_cmei'];
   $nivel = $_SESSION['nivel_usuario'];
   //variaves de busca
   $motivo = $_POST['motivo'];
   $turma = $_POST['turma'];
   //$status = 'matriculado';
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
                <h1 class="title">Sistema de Gestao T.I - Triagem</h1>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

        <section class="box ">
        <header class="panel_header">
                <h2 class="title pull-left">LISTA PARA TRIAGEM Fonoaudiologia</h2>                    
        </header>
         <!-- Dados do aluno-->
         <?php
            $sql = "SELECT tbaluno.tbaluno_id,
            tbaluno.tbaluno_nome, 
            tbaluno.tbaluno_dtnasc,
            tbaluno.tbaluno_turma,
            tbaluno.tbaluno_cep,
            tbaluno.tbaluno_status,
            tbcaec.caec_id,
            tbcaec.caec_professor,
            tbcaec.caec_ass_semed,
            tbcaec.caec_dataenvio,
            tbcaec.caec_tbcmei_id,
            tbcaec.caec_aluno_id,
            tbcaec.caec_queixa,
            tbcaec.caec_status,
            tbcmei.tbcmei_id, 
            tbcmei.tbcmei_nome
             FROM tbaluno INNER JOIN tbcaec 
             ON tbaluno.tbaluno_id = tbcaec.caec_aluno_id
             iNNER JOIN tbcmei 
             on tbcaec.caec_tbcmei_id = tbcmei.tbcmei_id
             WHERE tbcaec.caec_esp like '%Fonoaudiologia%'
             ORDER BY caec_id";
             $qr  = mysql_query($sql) or die(mysql_error());
             ?> 
              <tr> 
                  <td> 
                      <a href='' class='btn btn-primary'>Nova busca</a> 
                </td>
              </tr>
              
              <table class="table table-hover table-bordered display" >
             
              <thead>
                    <tr>
                       <th>Codigo</th>
                       <th>Nome</th>
                       <th>Ordem</th>
                       <th>Cmei</th>
                       <th>Dt nasc</th>
                       <th>Dt cad</th>
                       <th>Queixa</th>
                       <th>Turma</th>
                        
                       <th colspan = "2">Status</th>
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
                                  $dtcad = $ln['caec_dataenvio'];
                                  $id_fila = $ln['caec_id'];
                                  $id = $ln['tbaluno_id'];
                                  $dt = implode("/",array_reverse(explode("-",$data)));
                                  $data_cad = implode("/",array_reverse(explode("-",$dtcad)));
                                  $style = ( $i % 2 == 0 )? "style='background:#eeeeee;'" : "style='background:#CCCCCC;'"
                                ?>
                                <tbody>
                                        <tr>
                                           <td><?php echo $id_fila;?>  </a>         
                                           </td>
                                            <td><?php echo $ln['tbaluno_nome'];?></td>
                                            <td><a href="./dadodevolutiva.php?id_fila=<?php echo $id_fila;?>&ordem=<?php echo $ordem;?>"target="_blanck"><?php echo $ordem;?></a></td>
                                            <td><?php echo $ln['tbcmei_nome'];?></td>
                                            <td><?php echo $dt;?></td>
                                            <td><?php echo $data_cad;?></td>
                                            <td><?php echo $ln['caec_queixa'];?></td>
                                            <td><?php echo $ln['tbaluno_turma'];?></td>
                                            <td><?php echo $ln['caec_status'];?>  
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