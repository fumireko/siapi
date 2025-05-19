<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";
   //Variaveis de sessão
   $funcao_usuario = $_SESSION['funcao_usuario'];
   $tbcmei_nome = $_SESSION['tbcmei_nome'];
   $cod_cmei = $_SESSION['unidade_usuario'];
   $id_cmei = $_POST['id_cmei'];
   $nivel = $_SESSION['nivel_usuario'];
   $funcao_usuario = $_SESSION['funcao_usuario'];
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
                <h2 class="title pull-left">FILA  <?php echo $funcao_usuario?></h2>                    
        </header>
         <!-- Dados do aluno-->
         <div  id="consulta">
            <form id="form1" name="form1" method="post" action="lista_filacaec.php" enctype="multipart/form-data">
            <table>
            <tr> 
                
            <div> 
                <td> STATUS DEVOLUTIVA </td>
            </div>    
                <td style="padding:0 15px;">
                <select class="form-control m-bot15" name="status">
                    <option value=""> Todos</option>
          		    <option value="Inserido lista de espera">Inserido lista de espera</option>
					<option value="Não inserido lista de espera">Não inserido lista de espera</option>
          			<option value="Não será agendado">Não será agendado</option>
                                        
                </select>
                </td>
                <td>
                    <input type="submit" name="btnPESQUISAR" id="btnPESQUISAR" class="btn btn-primary" value="Localizar" />
                </td>
            </tr> 
            </form>
</table>
         <?php
            if ($nivel == 5 or $nivel == 1)
            {
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
            tbcaec.caec_esp,
            tbcaec.dados_usuarios_ID,
            tbfilacaec.tbfilacaec_id,
            tbfilacaec.tbfilacaec_caec_id,
            tbfilacaec.tbfilacaec_status,
            tbfilacaec.tbfilacaec_datacad,
            tbfilacaec.tbfilacaec_dtaconsulta,
            tbfilacaec.tbfilacaec_hraconsulta,	
            tbcmei.tbcmei_id, 
            tbcmei.tbcmei_nome,
            usuarios.id,
            usuarios.funcao
             FROM tbaluno INNER JOIN tbcaec 
             ON tbaluno.tbaluno_id = tbcaec.caec_aluno_id
             iNNER JOIN tbcmei 
             on tbcaec.caec_tbcmei_id = tbcmei.tbcmei_id 
             inner join usuarios
             on tbcaec.dados_usuarios_ID = usuarios.id
             inner join tbfilacaec
             ON tbcaec.caec_id = tbfilacaec.tbfilacaec_caec_id
             where tbcaec.caec_esp like '%".$funcao_usuario."%' 
             and tbfilacaec.tbfilacaec_status like '%".$_REQUEST['status']."%'
             ORDER BY caec_id";
             $qr  = mysql_query($sql) or die(mysql_error());
             ?> 
            

              <table class="table table-hover table-bordered display" >
                <thead>
                    <tr>
                       <th>CodTriagem</th>
                       <th>Nome</th>
                       <th>Ordem</th>
                       <th>Cmei</th>
                       <th>Dt nasc</th>
                       <th>Dt cad</th>
                       <th>Queixa</th>
                       <th>Turma</th>
                       <th>Status devolutiva</th>
                       <th >Agendar</th>
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
                                           <td><?php echo $id_fila;?>         
                                           </td>
                                            <td><?php echo $ln['tbaluno_nome'];?></td>
                                            <td><?php echo $ordem;?></a></td>
                                            <td><?php echo $ln['tbcmei_nome'];?></td>
                                            <td><?php echo $dt;?></td>
                                            <td><?php echo $data_cad;?></td>
                                            <td><?php echo $ln['caec_queixa'];?></td>
                                            <td><?php echo $ln['tbaluno_turma'];?></td>
                                            <td><?php echo $ln['caec_status'];?>  
                                            <td><a href='' class='btn btn-primary'>Agendar</a> 
											</td>
                                        </tr>
                                </tbody>
                                <?php
                               }//fim do if
                            }
                               else //caso o ninvel seja usuario padrao 
                                    {
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
                                        tbcaec.caec_esp,
                                        tbcaec.dados_usuarios_ID,
                                        tbfilacaec.tbfilacaec_id,
                                        tbfilacaec.tbfilacaec_caec_id,
                                        tbfilacaec.tbfilacaec_status,
                                        tbfilacaec.tbfilacaec_datacad,
                                        tbfilacaec.tbfilacaec_dtaconsulta,
                                        tbfilacaec.tbfilacaec_hraconsulta,	
                                        tbcmei.tbcmei_id, 
                                        tbcmei.tbcmei_nome,
                                        usuarios.id,
                                        usuarios.funcao
                                         FROM tbaluno INNER JOIN tbcaec 
                                         ON tbaluno.tbaluno_id = tbcaec.caec_aluno_id
                                         iNNER JOIN tbcmei 
                                         on tbcaec.caec_tbcmei_id = tbcmei.tbcmei_id 
                                         inner join usuarios
                                         on tbcaec.dados_usuarios_ID = usuarios.id
                                         inner join tbfilacaec
                                         ON tbcaec.caec_id = tbfilacaec.tbfilacaec_caec_id
                                         where tbcaec.caec_esp like '%".$funcao_usuario."%' 
                                         and tbcaec.caec_tbcmei_id =  '$cod_cmei'
                                         and tbfilacaec.tbfilacaec_status like '%".$_REQUEST['status']."%'
                                         ORDER BY caec_id";
                                         $qr  = mysql_query($sql) or die(mysql_error());
                                         ?> 
                                          <tr> <td> <a href='' class='btn btn-primary'>Nova busca</a> </td></tr>
                                          <table class="table table-hover table-bordered display" >
                                            <thead>
                                                <tr>
                                                   <th>CodTriagem</th>
                                                   <th>Nome</th>
                                                   <th>Ordem</th>
                                                   <th>Cmei</th>
                                                   <th>Dt nasc</th>
                                                   <th>Dt cad</th>
                                                   <th>Queixa</th>
                                                   <th>Turma</th>
                                                   <th>Status devolutiva</th>
                                                   <th >Agendar</th>
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
                                                                       <td><?php echo $id_fila;?>         
                                                                       </td>
                                                                        <td><?php echo $ln['tbaluno_nome'];?></td>
                                                                        <td><?php echo $ordem;?></a></td>
                                                                        <td><?php echo $ln['tbcmei_nome'];?></td>
                                                                        <td><?php echo $dt;?></td>
                                                                        <td><?php echo $data_cad;?></td>
                                                                        <td><?php echo $ln['caec_queixa'];?></td>
                                                                        <td><?php echo $ln['tbaluno_turma'];?></td>
                                                                        <td><?php echo $ln['caec_status'];?>  
                                                                        <td><a href='' class='btn btn-primary'>Agendar</a> 
                                                                        </td>
                                                                    </tr>
                                                            </tbody>
                                                            <?php
                                                            }
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