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
   $datainicial =  $_POST['data_inicial'];
   $datafinal =  $_POST['data_final'];

   ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR" lang="pt-BR" ng-app="App">
<head>
    <meta name="author" content="Admin" />
    <title>SMTI - Sistema de Gestao T.I</title>
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
            <h2 class="title pull-left">LISTA  <?php echo $funcao_usuario?></h2>      
         </header>
         <!-- Dados do aluno-->  
         <form id="form1" name="form1" method="post" action = "agenda_diaria.php" enctype="multipart/form-data">
            <table> 
            <tr> 
                
            <div> 
                <td > <font color="Gray"><b>DATA</b></font> </td>
            </div>    
                <td style="padding:0 15px;">
                <input id="dta_nasc" name="data_inicial" type="date" value="<?php echo $datainicial; ?>" class="form-control input-md" required>
                       </td>
                <tr>
                <td> <font color="Gray"><b>DATA</b></font> </td>
            </div>    
                <td style="padding:0 15px;">
                <input id="dta_nasc" name="data_final" type="date" value="<?php echo $datafinal; ?>"  class="form-control input-md" required>
                       </td>
                
            </tr> 
             <tr>
             <td colspan="2" align="center">
                    <input type="submit" name="btnPESQUISAR" id="btnPESQUISAR" class="btn btn-primary" value="Filtrar" />
                </td>   
            </tr>
            </form>               
         <?php
            if ($nivel == 1 or $nivel == 5) 
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
            tbcaec.caec_numsere,
            tbcaec.caec_queixa,
            tbcaec.caec_status_agenda,
            tbcaec.caec_status,
            tbcaec.caec_hora,
            tbcaec.caec_datatriagem,
            tbcaec.caec_esp,
            tbcaec.dados_usuarios_ID,
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
             where tbcaec.caec_esp like '%".$funcao_usuario."%' 
             and tbcaec.caec_status_agenda = 'Agendado'
             and tbcaec.caec_datatriagem BETWEEN '$datainicial' and '$datafinal'
             ORDER BY caec_hora";
             $qr  = mysql_query($sql) or die(mysql_error());
             ?> 
              <tr></tr>
              <table class="table table-hover table-bordered display" >
             
              <thead>
                    <tr>
                       <th>Codigo</th>
                       <th>Nome</th>
                       <th>Ordem</th>
                       <th>CGM</th>
                       <th>Cmei</th>
                       <th>Dt cad</th>
                       <th>Horario</th>
                       <th>Dt triagem</th>
                       <th>Especialidade</th>
                       <th>Queixa</th>
                            
                        
                       <th colspan = "2">Status triagem</th>
                     </tr>
                         </thead>
                               <?php
                                $i=0;
                                $ordem=0;
                                while( $ln = mysql_fetch_assoc($qr) )
                                {
                                  $ordem++;
                                  $i++;
                                  $dtatriagem = $ln['caec_datatriagem'];
                                  $dtcad = $ln['caec_dataenvio'];
                                  $id_fila = $ln['caec_id'];
                                  $status = $ln['caec_status_agenda'];
                                  $id = $ln['tbaluno_id'];
                                  $dt = implode("/",array_reverse(explode("-",$data)));
                                  $data_cad = implode("/",array_reverse(explode("-",$dtcad)));
                                  $data_triagem = implode("/",array_reverse(explode("-",$dtatriagem)));
                                  $style = ( $i % 2 == 0 )? "style='background:#eeeeee;'" : "style='background:#CCCCCC;'"
                                ?>
                                <tbody>
                                        <tr>
                                            <td>
                                            <?php if ($nivel == 5)
                                            {
                                                echo "<a href='./frmtriar.php?id_fila=$id_fila' class='btn btn-primary'>$id_fila</a>";   
                                                                                        
                                            }  
                                            else
                                                    if ($nivel == 1) 
												{
                                                    echo "<a href='./frmtriar.php?id_fila=$id_fila'>$id_fila</a>";     
												
                                                }
                                                else
                                                    if ($nivel == 3) 
												{
                                                    echo "$id_fila";        
												
                                                }
                                            ?>
                                           </td>
                                            <td><?php echo $ln['tbaluno_nome'];?></td>
                                            <td><?php echo $ordem;?></a></td>
                                            <td><?php echo $ln['caec_numsere'];?></td>
                                            <td><?php echo $ln['tbcmei_nome'];?></td>
                                            <td><?php echo $data_cad;?></td>
                                            <td><?php echo $ln['caec_hora'];?></td>
                                            <td><?php echo $data_triagem;?></td>
                                            <td><?php echo $ln['caec_esp'];?></td>
                                            <td><?php echo $ln['caec_queixa'];?></td>
                                           
                                            </td>
                                            <td><?php  echo "<a class='btn btn-primary'>$status</a>"; 
                                            
                                            ?>  
											</td>
                                        </tr>
                                </tbody>
                                <?php
                               }
                            }	
                            else
                                
                                {
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
                                        tbcaec.caec_numsere,
                                        tbcaec.caec_queixa,
                                        tbcaec.caec_status,
                                        tbcaec.caec_status_agenda,
                                        tbcaec.caec_esp,
                                        tbcaec.dados_usuarios_ID,
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
                                         where tbcaec.caec_esp like '%".$funcao_usuario."%' 
                                         and tbcaec.caec_tbcmei_id = '".$cod_cmei."'
                                         and tbcaec.caec_status_agenda = 'Agendado'
                                         and tbcaec.caec_datatriagem BETWEEN '$datainicial' and '$datafinal'
                                         ORDER BY caec_hora";
                                         $qr  = mysql_query($sql) or die(mysql_error());
                                         ?> 
                                          <tr> <td> <a href='' class='btn btn-primary'>Nova busca</a> </td></tr>
                                          <table class="table table-hover table-bordered display" >
                                         
                                          <thead>
                                                <tr>
                                                 <th>Codigo</th>
                                                 <th>Nome</th>
                                                 <th>Ordem</th>
                                                 <th>CGM</th>
                                                 <th>Cmei</th>
                                                 <th>Dt cad</th>
                                                <th>Horario</th>
                                                <th>Dt triagem</th>
                                                <th>Especialidade</th>
                                                <th>Queixa</th>
                                                <th colspan = "2">Status triagem</th>
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
                                                              $status = $ln['caec_status_agenda'];
                                                              $id = $ln['tbaluno_id'];
                                                              $dt = implode("/",array_reverse(explode("-",$data)));
                                                              $data_cad = implode("/",array_reverse(explode("-",$dtcad)));
                                                              $style = ( $i % 2 == 0 )? "style='background:#eeeeee;'" : "style='background:#CCCCCC;'"
                                                            ?>
                                                            <tbody>
                                                                    <tr>
                                                                        <td>
                                                                        <?php if ($nivel == 5)
                                                                        {
                                                                         echo "<a href='./frmtriar.php?id_fila=$id_fila' class='btn btn-primary'>$id_fila</a>";   
                                                                                                                    
                                                                        }  
                                                                        else
                                                                                if ($nivel == 1) 
                                                                            {
                                                                                echo "<a href='./frmtriar.php?id_fila=$id_fila' class='btn btn-primary'>$id_fila</a>";        
                                                                            
                                                                            }
                                                                            else
                                                                                if ($nivel == 3) 
                                                                            {
                                                                                echo "$id_fila";        
                                                                            
                                                                            }
                                                                        ?>
                                                                       </td>
                                                                       <td><?php echo $ln['tbaluno_nome'];?></td>
                                                                         <td><?php echo $ordem;?></a></td>
                                                                         <td><?php echo $ln['caec_numsere'];?></td>
                                                                         <td><?php echo $ln['tbcmei_nome'];?></td>
                                                                         <td><?php echo $data_cad;?></td>
                                                                         <td><?php echo $ln['caec_hora'];?></td>
                                                                         <td><?php echo $data_triagem;?></td>
                                                                         <td><?php echo $ln['caec_esp'];?></td>
                                                                        <td><?php echo $ln['caec_queixa'];?></td>
                                                                        
                                                                        <td><?php  echo "<a class='btn btn-primary'>$status</a>"; 
                                            
                                            ?>   
                                                                         
                                                                        </td>
                                                                    </tr>
                                                            </tbody>
                                                            <?php
                                                           }
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