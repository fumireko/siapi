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
   $aluno_id = $_REQUEST['aluno_id'];
   $aluno_nome = $_POST['aluno_nome'];
   //$status = 'matriculado';
   $dta_nasc_busca = $_POST['dta_nasc_busca'];
   $dt = implode("-",array_reverse(explode("/",$dta_nasc_busca)));
   
        //so para trazer o nome do aluno
        $consulta = mysql_query("SELECT * from tbaluno where tbaluno_id = $aluno_id");
        while($linhas = mysql_fetch_object($consulta)) 
        {
        $nome = $linhas->tbaluno_nome;
        }

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
                <h1 class="title">Sistema de Gestao T.I </h1>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
        <section class="box ">
        <header class="panel_header">
            <h2 class="title pull-left">HISTÓRICO DE:  <?php echo $nome;?></h2>                    
        </header>
         <!-- Dados do aluno-->                 
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
            tbcaec.caec_datatriagem,
            tbcaec.caec_tbcmei_id,
            tbcaec.caec_aluno_id,
            tbcaec.caec_queixa,
            tbcaec.caec_status,
            tbcaec.caec_esp,
            tbcaec.dados_usuarios_ID,
            tbcmei.tbcmei_id, 
            tbcmei.tbcmei_nome
             FROM tbaluno INNER JOIN tbcaec 
             ON tbaluno.tbaluno_id = tbcaec.caec_aluno_id
             iNNER JOIN tbcmei 
             on tbcaec.caec_tbcmei_id = tbcmei.tbcmei_id 
             
             where tbaluno.tbaluno_id = '".$aluno_id."' 
             ORDER BY caec_id";
             $qr  = mysql_query($sql) or die(mysql_error());
             ?> 
              <tr> <td> <a href='incfilacaec.php' class='btn btn-primary'>Nova busca</a> </td></tr>
              <table class="table table-hover table-bordered display" >
           
              <thead>
                    <tr>
                       <th>Codigo</th>
                       <th>Cmei</th>
                       <th>Dt cad</th>
                       <th>Dt dev</th>
                       <th>Dt triagem</th>
                       <th>Especialidade</th>
                       <th>Queixa</th>
                       <th>Turma</th>
                       <th colspan = "2">Status devolutiva</th>
                     </tr>
                         </thead>
                               <?php
                                $i=0;
                                $ordem=0;
                                while( $ln = mysql_fetch_assoc($qr) )
                                {
                                  $ordem++;
                                  $i++;
                                  $datatriagem = $ln['caec_datatriagem'];
                                  $dataenvio = $ln['caec_dataenvio'];
                                  $dtadev = $ln['caec_datadev'];
                                  $id_fila = $ln['caec_id'];
                                  $status = $ln['caec_status'];
                                  $id = $ln['tbaluno_id'];
                                  $data_envio = implode("/",array_reverse(explode("-",$dataenvio)));
                                  $data_triagem =  implode("/",array_reverse(explode("-",$datatriagem)));
                                  $data_dev = implode("/",array_reverse(explode("-",$dtadev)));
                                  $style = ( $i % 2 == 0 )? "style='background:#eeeeee;'" : "style='background:#CCCCCC;'"
                                ?>
                                <tbody>
                                        <tr>
                                            <td>
                                            <?php if ($nivel == 5)
                                            {
                                             echo "<a href='' class='btn btn-primary'>$id_fila</a>";   
                                                                                        
                                            }  
                                            else
                                                    if ($nivel == 1) 
												{
                                                    echo "<a href='' class='btn btn-primary'>$id_fila</a>";        
												
                                                }
                                                else
                                                    if ($nivel == 3) 
												{
                                                    echo "$id_fila";        
												
                                                }
                                            ?>
                                           </td>
                                         
                                            <td><?php echo $ln['tbcmei_nome'];?></td>
                                            <td><?php echo $data_envio;?></td>
                                            <td><?php echo $data_dev;?></td>
                                            <td><?php echo $data_triagem;?></td>
                                            <td><?php echo $ln['caec_esp'];?></AAtd>
                                            <td><?php echo $ln['caec_queixa'];?></td>
                                            <td><?php echo $ln['tbaluno_turma'];?></td>
                                            <td><?php  echo "<a href='' class='btn btn-primary'>$status</a>"; 
                                            
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
                                        tbcaec.caec_datatriagem,
                                        tbcaec.caec_tbcmei_id,
                                        tbcaec.caec_aluno_id,
                                        tbcaec.caec_queixa,
                                        tbcaec.caec_status,
                                        tbcaec.caec_esp,
                                        tbcaec.dados_usuarios_ID,
                                        tbcmei.tbcmei_id, 
                                        tbcmei.tbcmei_nome
                                         FROM tbaluno INNER JOIN tbcaec 
                                         ON tbaluno.tbaluno_id = tbcaec.caec_aluno_id
                                         iNNER JOIN tbcmei 
                                         on tbcaec.caec_tbcmei_id = tbcmei.tbcmei_id 
                                         
                                         where tbaluno.tbaluno_id = '".$aluno_id."' 
                                         and tbcaec.caec_tbcmei_id = '".$cod_cmei."'
                                         ORDER BY caec_id";
                                         $qr  = mysql_query($sql) or die(mysql_error());
                                         ?> 
                                          <tr> <td> <a href='' class='btn btn-primary'>Nova busca</a> </td></tr>
                                          <table class="table table-hover table-bordered display" >
                                         
                                          <thead>
                                                <tr>
                                                   <th>Codigo</th>
                                                    <th>Cmei</th>
                                                   <th>Dt cad </th>
                                                   <th>Dt dev</th>
                                                   <th>Dt triagem</th>
                                                   <th>Especialidade</th>
                                                   <th>Queixa</th>
                                                   <th>Turma</th>
                                                   <th colspan = "2">Status devolutiva</th>
                                                 </tr>
                                                     </thead>
                                                           <?php
                                                            $i=0;
                                                            $ordem=0;
                                                            while( $ln = mysql_fetch_assoc($qr) )
                                                            {
                                                              $ordem++;
                                                              $i++;
                                                              $datatriagem = $ln['caec_datatriagem'];
                                                              $dataenvio = $ln['caec_dataenvio'];
                                                              $dtadev = $ln['caec_datadev'];
                                                              $id_fila = $ln['caec_id'];
                                                              $status = $ln['caec_status'];
                                                              $id = $ln['tbaluno_id'];
                                                              $data_envio = implode("/",array_reverse(explode("-",$dataenvio)));
                                                              $data_triagem =  implode("/",array_reverse(explode("-",$datatriagem)));
                                                              $data_dev = implode("/",array_reverse(explode("-",$dtadev)));
                                                              $style = ( $i % 2 == 0 )? "style='background:#eeeeee;'" : "style='background:#CCCCCC;'"
                                                            ?>
                                                            <tbody>
                                                                    <tr>
                                                                        <td>
                                                                        <?php if ($nivel == 5)
                                                                        {
                                                                         echo "<a href='' class='btn btn-primary'>$id_fila</a>";   
                                                                                                                    
                                                                        }  
                                                                        else
                                                                                if ($nivel == 1) 
                                                                            {
                                                                                echo "<a href='' class='btn btn-primary'>$id_fila</a>";        
                                                                            
                                                                            }
                                                                            else
                                                                                if ($nivel == 3) 
                                                                            {
                                                                                echo "$id_fila";        
                                                                            
                                                                            }
                                                                        ?>
                                                                       </td>
                                                                        
                                                                        <td><?php echo $ln['tbcmei_nome'];?></td>
                                                                       
                                                                        <td><?php echo $data_envio;?></td>
                                                                        <td><?php echo $data_dev;?></td>
                                                                        <td><?php echo $data_triagem;?></td>
                                                                        <td><?php echo $ln['caec_esp'];?></td>
                                                                        <td><?php echo $ln['caec_queixa'];?></td>
                                                                        <td><?php echo $ln['tbaluno_turma'];?></td>
                                                                        <td><?php  echo "<a href='' class='btn btn-primary'>$status</a>"; 
                                            
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
                            <?php 
                                if ($data_envio == "")
                                {
                                    
                                    echo "<div align=center><a href='dadosfilacaec.php?tbaluno_id=$aluno_id' class='btn btn-primary'>Registrar/enviar solicitação</a></div>"; 
                                    
                                }
                                else 
                                    if ($data_dev == "")
                                    {
                                        echo "<div align=center><font color=red><b>  ".'ALUNO AGUARDANDO DEVOLUTIVA  <br>';    
                                    }
                                    else 
                                    if ($data_triagem == "")
                                    {
                                        echo "<div align=center><font color=red><b>  ".'ALUNO AGUARDANDO TRIAGEM  <br>';    
                                    }
                            
                            ?>
                          
                    </div>
                   
                </div>
            </div>
            </section>
           </div>
        
</body>

</html>