
<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";
   //Variaveis de sessão
   $tbcmei_nome = $_SESSION['tbcmei_nome'];
   $nivel = $_SESSION['nivel_usuario'];
   $unidade_usuario = $_SESSION['unidade_usuario'];
   //variaves de busca
   $id_cmei = $_REQUEST['id_cmei'];
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
                <h2 class="title pull-left">Fila de transferência para matricula <?php echo $id_usuario?> </h2>
        </header>
        <header class="panel_header">
                <h2 class="title pull-left">Cmei  <?php echo $tbcmei_nome?> </h2>            
        </header>
        <header class="panel_header">
                <h2 class="title pull-left">Motivo  <?php echo $motivo?> </h2>            
        </header>
        <header class="panel_header">
                <h2 class="title pull-left">Turma  <?php echo $turma?> </h2>            
        </header>
         <!-- Dados do aluno-->
         <?php
            $sql = "SELECT tbaluno.tbaluno_id,
            tbaluno.tbaluno_nome, 
            tbaluno_tel,
            celu,
            celular,
            tbaluno.tbaluno_dtnasc,
            tbaluno.tbaluno_turma,
            tbaluno.tbaluno_cep,
            tbaluno.tbaluno_status,
            tbtran.tbtran_id,
            tbtran.tbfila_tbfila_id,
            tbtran.tbtran_idcmeiant,
            tbtran.tbtran_dtatran,
            tbtran.tbtran_status,
            tbtran.tbaluno_tbaluno_id,
            tbtran.cmei_antigo,
            tbtran.tbcmei_tbcmcei_id,
            tbtran.dados_usuarios_ID,
            tbcmei.tbcmei_id, 
            tbcmei.tbcmei_nome
            FROM tbaluno INNER JOIN tbtran 
            ON tbaluno.tbaluno_id = tbtran.tbaluno_tbaluno_id 
            iNNER JOIN tbcmei 
            on tbtran.tbcmei_tbcmcei_id = tbcmei.tbcmei_id
            where tbtran_status LIKE '%".$_REQUEST['motivo']."%' 
            and tbaluno_turma like '%".$_REQUEST['turma']."%' 
            and tbcmei.tbcmei_id = '".$id_cmei."' 
            ORDER BY tbtran_id";
             $qr  = mysql_query($sql) or die(mysql_error());
             ?> 
              <tr> <td> <a href='./#/listatransf' class='btn btn-primary'>Nova busca</a> </td></tr>
              <tr> <td> <a id="gerarExcel" href="mat_gExcelTRansf.php?motivo=<?php echo $motivo;?>&turma=<?php echo $turma;?>&id_cmei=<?php echo $id_cmei;?>" 
              class="btn btn-primary">Gerar Relatório</a> </td></tr>
              <table class="table table-hover table-bordered display" >
              <thead>
                    <tr>
                       <th>Codigo</th>
                       <th>CodTransf</th>
                       <th>Nome</th>
                       <th>Contatos</th>
                       <th>Ordem</th>
                       <th>Cmei</th>
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
                                  $dtcad = $ln['tbtran_dtatran'];
                                  $id_fila = $ln['tbfila_tbfila_id'];
								  $tbcmei_id = $ln['tbcmei_id'];
                                  $id_aluno = $ln['tbaluno_id'];
                                  $dt = implode("/",array_reverse(explode("-",$data)));
                                  $data_cad = implode("/",array_reverse(explode("-",$dtcad)));
                                  $style = ( $i % 2 == 0 )? "style='background:#eeeeee;'" : "style='background:#CCCCCC;'"
                                ?>
                                <tbody>
                                        <tr>
                                           <td align ="center"> <a href="../admin/alterafila.php?tbfila_id=<?php echo $id_fila;?>&ordem=<?php echo $ordem;?>"><?php echo $id_fila;?></a>         
                                           </td>
                                           <td><?php echo $ln['tbtran_id'];?></td>
                                            <td><?php echo $ln['tbaluno_nome'];?></td>
                                            <td> <?php echo $ln['tbaluno_tel'];?> -- <?php echo $ln['celu'];?>-- <?php echo $ln['celular'];?></td>
                                            <td><a href="../admin/impfila.php?tbaluno_id=<?php echo $ln['tbaluno_id'];?>&ordem=<?php echo $ordem;?>"target="_blanck"><?php echo $ordem;?></a></td>
                                            <td><?php echo $ln['tbcmei_nome'];?></td>
                                            <td><?php echo $dt;?></td>
                                            <td><?php echo $data_cad;?></td>
                                            <td><?php echo $ln['tbtran_status'];?></td>
                                            <td><?php echo $ln['tbaluno_turma'];?></td>
                                                                             
                                            <td><a href='minha_listatransf.php?id_aluno=<?php echo $id_aluno;?>&tbcmei_id=<?php echo $tbcmei_id;?>' class='btn btn-primary'>Matricular</a>
                                            <?php
												if ($nivel == 1)   
												{
												echo "<a href='remove_transf.php?id_fila=$id_fila' class='btn btn-primary'>Remover</a>";
                                                }
                                                else 
                                                    if ($id_usuario == 79)
                                                    {
                                                        echo "<a href='remove_transf.php?id_fila=$id_fila' class='btn btn-primary'>Remover</a>";   
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