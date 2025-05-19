
<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";
   //Variaveis de sessão
   $cmei_id = $_SESSION['unidade_usuario'];
   $nivel = $_SESSION['nivel_usuario'];
   $id_usuario = $_SESSION['id_usuario'];
   //variaves de busca
   $tbcmei_id = $_REQUEST['tbcmei_id'];
   $id_aluno = $_REQUEST['id_aluno'];
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
                <h2 class="title pull-left">Minha Lista de transferencia <?php echo $id_cmei ?></h2>
                     
        </header>
         <!-- Dados do aluno-->
         <?php
            $sql = "SELECT tbaluno.tbaluno_id, 
            tbaluno.tbaluno_nome, 
            tbaluno.tbaluno_dtnasc, 
            tbaluno.tbaluno_turma, 
            tbaluno.tbaluno_status, 
            tbfila.tbfila_id, 
            tbfila.tbaluno_tbaluno_id,
            tbfila.tbfila_motivo, 
            tbfila.tbfila_status, 
            tbfila.tbfila_turma, 
            tbfila.tbfila_dtacad, 
            tbfila.data_cadalterado,
            tbfila.tbfila_motivo,
            tbfila.tbcmei_tbcmcei_id, 
            tbcmei.tbcmei_id, tbfila.tbfila_ord, 
            tbcmei.tbcmei_nome FROM tbaluno 
            INNER JOIN tbfila ON tbaluno.tbaluno_id = tbfila.tbaluno_tbaluno_id 
            iNNER JOIN tbcmei on tbfila.tbcmei_tbcmcei_id = tbcmei.tbcmei_id 
            where tbcmei.tbcmei_id = '$tbcmei_id' 
            and tbaluno.tbaluno_id = '$id_aluno' 
            and tbfila.tbfila_status LIKE '%trans%'                       
			ORDER BY tbaluno_nome";
             $qr  = mysql_query($sql) or die(mysql_error());
             ?> 
              <tr> <td> <a href='./#/listatransf' class='btn btn-primary'>Nova busca</a>  </td></tr>
              <tr> <td> <a id="gerarExcel" href="mat_gerarExcel.php?motivo=<?php echo $motivo;?>&turma=<?php echo $turma;?>&id_cmei=<?php echo $cmei_id;?>"
              class="btn btn-primary">Gerar Relatório</a>  </td></tr>
              <table class="table table-hover table-bordered display" >
              <form class="form-horizontal" method="POST" id="mat_transf" action = "mat_transf.php">
              <thead>
                    <tr>
                       <th>Id fila</th><th>Id aluno</th><th>Nome</th><th>Cmei para tranferencia</th><th>Status Fila </th><th>Dt nasc</th><th>Dt cad</th><th>Motivo</th><th>Turma</th><th>Acao</th>
                      
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
                                  $tbfila_id_transf = $ln['tbfila_id'];
                                  $tbaluno_id = $ln['tbaluno_id'];
                                  $tbfila_status_transf = $ln['tbfila_status'];
                                  $cod_cmei_transf = $ln['tbcmei_tbcmcei_id'];
                                  $dt = implode("/",array_reverse(explode("-",$data)));
                                  $data_cad = implode("/",array_reverse(explode("-",$dtcad)));
                                  $style = ( $i % 2 == 0 )? "style='background:#eeeeee;'" : "style='background:#CCCCCC;'"
                                ?>
                                <tbody>
                                        <tr>
                                        <input type="hidden" name="cod_cmei_transf" value="<?php echo $cod_cmei_transf?>">
                                            <input type="hidden" name="tbfila_id_transf" value="<?php echo $tbfila_id_transf?>">
                                            <td><?php echo $ln['tbfila_id'];?></td>
                                            <input type="hidden" name="id_aluno" value="<?php echo $id_aluno?>">
											<td><?php echo $ln['tbaluno_id'];?></td>
                                            <td><?php echo $ln['tbaluno_nome'];?></td>
                                            <td><?php echo $ln['tbcmei_nome'];?></td>
											<input type="hidden" name="tbfila_status_transf" value="<?php echo $tbfila_status_transf?>">
                                            <td><?php echo $ln['tbfila_status'];?></td>
                                            <td><?php echo $dt;?></td>
                                            <td><?php echo $data_cad;?></td>
                                            <td><?php echo $ln['tbfila_motivo'];?></td>
                                            <td><?php echo $ln['tbaluno_turma'];?></td>
                                            
											<td>											
												
												<?php
											                                             
												if ($nivel == 1) 
												{
													echo "<a href='remove_fila.php?contagem=$id_fila' class='btn btn-primary'>Remover</a>";
												}
												else 
													if ($id_usuario == 79)
                                                {
                                                echo "<a href='remove_fila.php?tbfila_id=$id_fila' class='btn btn-primary'>Remover</a>";   
                                                }
												?>  
                                                </td>
                                     </tbody>
									 
                                    
                                <?php
                                 $i++;
                                							   
                                }
                                
                                ?>  
                               
                                        </td>								
                                                            </table>


                                                            <?php
            $sql = "SELECT tbaluno.tbaluno_id,
            tbaluno.tbaluno_nome, 
            tbaluno.tbaluno_dtnasc,
            tbaluno.tbaluno_turma,
            tbaluno.tbaluno_cep,
            tbaluno.tbaluno_status,
            tbfila.tbfila_id, 
            tbfila.tbaluno_tbaluno_id,
            tbfila.tbfila_motivo,
            tbfila.tbfila_status,
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
             where tbaluno_id = '".$id_aluno."' 
			 And tbfila_status like '%matriculado%'
              
			ORDER BY tbaluno_nome";
             $qr  = mysql_query($sql) or die(mysql_error());
             ?> 
              
              <table class="table table-hover table-bordered display" >
             
              <thead>
                    <tr>
                       <th>Id fila</th><th>Id aluno</th><th>Nome</th><th>Cmei matriculado</th><th>Status Fila </th><th>Dt nasc</th><th>Dt cad</th><th>Motivo</th><th>Turma</th><th>Acao</th>
                      
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
                                  $tbfila_id_mat = $ln['tbfila_id'];
                                  $tbaluno_id = $ln['tbaluno_id'];
                                  $tbfila_status_mat = $ln['tbfila_status'];
                                  $cod_cmei_mat = $ln['tbcmei_tbcmcei_id'];
                                  $dt = implode("/",array_reverse(explode("-",$data)));
                                  $data_cad = implode("/",array_reverse(explode("-",$dtcad)));
                                  $style = ( $i % 2 == 0 )? "style='background:#eeeeee;'" : "style='background:#CCCCCC;'"
                                ?>
                                <tbody>
                                        <tr>
                                        <input type="hidden" name="cod_cmei_mat" value="<?php echo $cod_cmei_mat?>">
                                            <input type="hidden" name="tbfila_id_mat" value="<?php echo $tbfila_id_mat?>">
                                            <td><?php echo $ln['tbfila_id'];?></td>
                                            <input type="hidden" name="id_aluno" value="<?php echo $id_aluno?>">
											<td><?php echo $ln['tbaluno_id'];?></td>
                                            <td><?php echo $ln['tbaluno_nome'];?></td>
                                            <td><?php echo $ln['tbcmei_nome'];?></td>
											<input type="hidden" name="tbfila_status_mat" value="<?php echo $tbfila_status_mat?>">
                                            <td><?php echo $ln['tbfila_status'];?></td>
                                            <td><?php echo $dt;?></td>
                                            <td><?php echo $data_cad;?></td>
                                            <td><?php echo $ln['tbfila_motivo'];?></td>
                                            <td><?php echo $ln['tbaluno_turma'];?></td>
                                            
											<td>											
												
												<?php
											                                             
												if ($nivel == 1) 
												{
													echo "<a href='remove_fila.php?contagem=$id_fila' class='btn btn-primary'>Remover</a>";
												}
												else 
													if ($id_usuario == 79)
                                                {
                                                echo "<a href='remove_fila.php?tbfila_id=$id_fila' class='btn btn-primary'>Remover</a>";   
                                                }
												?>  
                                                </td>
                                     </tbody>
									 
                                    
                                <?php
                                 $i++;
                                							   
                                }
                                
                                ?>  
                               
                                        </td>								
                                                            </table>
              
                    </div>
                </div>
            </div>
            </section>
           </div>
           <div align ="center"><input type="submit" value="Salvar" name="salvar"  class='btn btn-primary' /> </div> 
           </form>

</body>

</html>