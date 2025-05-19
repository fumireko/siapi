<?php
//include "../validar_session.php";  
//include "../Config/config_sistema.php";
include "bco_fun.php";
//$qr = mysql_query($sql) or die(mysql_error());
date_default_timezone_set('America/Sao_Paulo');
$hoje = date('d-m-Y H:i');

//"INSERT INTO `tb_emprestimo`(`status`, `local_cod`, `data`, `cti`, `nome_solicitante`, `nome_autorizador`, `previsao`, `usuario`, `temp`) VALUES('1','$unidade_id','$hoje','$ctrl_ti','$solicitante','$autorizador','$retorno','$nome_usuario','$temp')";
$ret_consulta = $_GET['id']; // RECEBE NUM DE PATRIMONIO 
$query = "UPDATE `tb_emprestimo` SET `status` = '0' ,`data_dev` = '".$hoje."'  WHERE `tb_emprestimo`.`id` = ".$ret_consulta. " ;"  ;
     $dados = mysqli_query($conn, $query);
     $resultadoDaInsercao = mysqli_num_rows($dados);
if ($resultadoDaInsercao == '0')
{
       ?>
                                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                                <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR" lang="pt-BR" ng-app="App">
                                    <head>
                                    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
                                        <meta name="author" content="Admin" />
                                        <title>SMTI - Sistema de Gestao T.I</title>
         
                                  <style>
                                      html,
                                      body,
                                      .intro {
                                          height: 45%;
                                      }

                                      table td,
                                      table th {
                                          text-overflow: ellipsis;
                                          white-space: nowrap;
                                          overflow: hidden;
                                      }

                                      thead th {
                                          color: #fff;
                                      }

                                      .card {
                                          border-radius: .5rem;
                                      }

                                      .table-scroll {
                                          border-radius: .5rem;
                                      }

                                          .table-scroll table thead th {
                                              font-size: 1.25rem;
                                          }

                                      thead {
                                          top: 0;
                                          position: sticky;
                                      }


                                  </style>
    
    
    
                                    </head>
                                    <!-- BEGIN BODY -->
                                    <body>
                                     <script type="text/javascript" src="ajaxbs_local2_emp.js"> </script>
                                      <script>
                                          $(document).on('Change', "[name='txtnome']", function () {
                                     getDados();
                                          });

                                          $(document).ready(function(){
                                               getDados();
                                               };



                                </script>
                                        <!-- START TOPBAR -->
                                        <?php
                                        include "index.php"
                                            ?> 
                                        <div id="main-content">
                                        <section class="wrapper main-wrapper">
                                        <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                                        <div class="page-title">
                                        <div class="pull-left">
                                            <h1 class="title">Sistema de Gestao T.I</h1>
                                        </div>
                                    </div>
                                    </div>
                                     <div class="clearfix"></div>
                                    <section class="box ">
                                    <header class="panel_header">
                                            <h2 class="title pull-left">Visualizar Emprestimo de equipamento  </h2><br />
     
                                        <div class="form-group  col-md-6">
                                            </div>
                                            <div class="actions panel_actions pull-right">
                                                 <a href='./emprest_cad.php' class='btn btn-primary'>Cadastrar Emprestimos </a>
              
                                                 <i class="box_toggle fa fa-chevron-down"></i>
                                                 <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                                 <i class="box_close fa fa-times"></i>
                                            </div>
                                     </header>
                                    <form class="form-horizontal" method="POST" id="sdev" action="emprest_consulta2.php">
                                    <fieldset>
                                            <div id="MsgSucesso" class="alert alert-success" style="text-align:center; display:none;"
                                            role="alert">Solicitacao feita com sucesso!</div>
                                            <div id="MsgErro" class="alert alert-danger" style="text-align:center; display:none;"
                                            role="alert">Erro ao realizar a solicitacao!</div>
                                            <!-- CAMPOS OCULTOS PARA INSERÇÃO DE DADOS-->
                                                      <input id="unidade_usuario" name="unidade_usuario" type="text" value="<?php echo $tbcmei_nome; ?>" hidden>
          
                                            <!-- FIM DOS CAMPOS CULTOS PARA INSERÇÃO DE DADOS-->
                                            <br/>
                                         <label> Nenhum Resultado Encontrado em id : " <?php echo $ret_consulta; ?> " </label>
                                     <section class="intro">
                                  <div class="bg-image h-70" style="background-color: #f5f7fa;">
                                    <div class="mask d-flex align-items-center h-70">
                                      <div class="container">
                                        <div class="row justify-content-center">
                                          <div class="col-12">
                                            <div class="card">
                                              <div class="card-body p-0">
                                                <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; height: 150px">
                                                  <table class="table table-striped mb-0">
                                                    <thead style="background-color: #002d72;">
                                                      <tr>
                                                        <th scope="col">Local</th>
                                                        <th scope="col">Previsao</th>
                                                        <th scope="col">Data</th>
                                                        <th scope="col">Solicitante</th>
                                                        <th scope="col">CTI</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                       <tr>
                                                        <td>----</td>
                                                        <td>----</td>
                                                        <td>----</td>
                                                        <td>---- </td>
                                                        <td>----</td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </section>   
  
                         
                                                        </div>
                                                        </fieldset>
                                                        </form>
                                                       <?php
                                                  //  }
                                                 ?>
                                    </section> 
                                    </section>   
                                    </div>
                                    </body>

                                    </html>

<?php 
}
else
{
           $query = "select * from tb_emprestimo where id ='". $ret_consulta . "' ";
           $dados = mysqli_query($conn, $query);
           $resultadoDaInsercao = mysqli_num_rows($dados);
    ?>
  
           <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                            <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR" lang="pt-BR" ng-app="App">
                                <head>
                                <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
                                    <meta name="author" content="Admin" />
                                    <title>SMTI - Sistema de Gestao T.I</title>
         
                              <style>
                                  html,
                                  body,
                                  .intro {
                                      height: 100%;
                                  }

                                  table td,
                                  table th {
                                      text-overflow: ellipsis;
                                      white-space: nowrap;
                                      overflow: hidden;
                                  }

                                  thead th {
                                      color: #fff;
                                  }

                                  .card {
                                      border-radius: .5rem;
                                  }

                                  .table-scroll {
                                      border-radius: .5rem;
                                  }

                                      .table-scroll table thead th {
                                          font-size: 1.25rem;
                                      }

                                  thead {
                                      top: 0;
                                      position: sticky;
                                  }


                              </style>
    
    
    
                                </head>
                                <!-- BEGIN BODY -->
                                <body>
                                 <script type="text/javascript" src="ajaxbs_local2_emp.js"> </script>
                                  <script>
                                      $(document).on('Change', "[name='txtnome']", function () {
                               getDados();
                                      });

                                      $(document).ready(function(){
                                           getDados();
                                           };



                            </script>
                                    <!-- START TOPBAR -->
                                    <?php
                                    include "index.php"
                                        ?> 
                                    <div id="main-content">
                                    <section class="wrapper main-wrapper">
                                    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
                                    <div class="page-title">
                                    <div class="pull-left">
                                        <h1 class="title">Sistema de Gestao T.I</h1>
                                    </div>
                                </div>
                                </div>
                                 <div class="clearfix"></div>
                                <section class="box ">
                                <header class="panel_header">
                                        <h2 class="title pull-left">Visualizar Emprestimo de equipamento  </h2><br />
     
                                    <div class="form-group  col-md-6">
                                        </div>
                                        <div class="actions panel_actions pull-right">
                                             <a href='./emprest_cad.php' class='btn btn-primary'>Cadastrar Emprestimos </a>
              
                                             <i class="box_toggle fa fa-chevron-down"></i>
                                             <i class="box_setting fa fa-cog" data-toggle="modal" href="#section-settings"></i>
                                             <i class="box_close fa fa-times"></i>
                                        </div>
                                 </header>
                                <form class="form-horizontal" method="POST" id="sdev" action="emprest_consulta2.php">
                                <fieldset>
                                        <div id="MsgSucesso" class="alert alert-success" style="text-align:center; display:none;"
                                        role="alert">Solicitacao feita com sucesso!</div>
                                        <div id="MsgErro" class="alert alert-danger" style="text-align:center; display:none;"
                                        role="alert">Erro ao realizar a solicitacao!</div>
                                        <!-- CAMPOS OCULTOS PARA INSERÇÃO DE DADOS-->
                                                  <input id="unidade_usuario" name="unidade_usuario" type="text" value="<?php echo $tbcmei_nome; ?>" hidden>
          
                                        <!-- FIM DOS CAMPOS CULTOS PARA INSERÇÃO DE DADOS-->
                                        <br/>
                                      <label> Resultado da consulta por " <?php echo $ret_consulta; ?> " </label>
                                 <section class="intro">
                              <div class="bg-image h-100" style="background-color: #f5f7fa;">
                                <div class="mask d-flex align-items-center h-100">
                                  <div class="container">
                                    <div class="row justify-content-center">
                                      <div class="col-12">
                                        <div class="card">
                                          <div class="card-body p-0">
                                            <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; height: 150px">
                                              <table class="table table-striped mb-0">
                                                <thead style="background-color: #002d72;">
                                                  <tr>
                                                    <th scope="col">Ação</th>
                                                      <th scope="col">Status</th>
                                                    <th scope="col">Id</th>
                                                    <th scope="col">Local</th>
                                                    <th scope="col">Previsao</th>
                                                     <th scope="col">Emprestado em</th>
                                                    <th scope="col">Devolução</th>
                                                      <th scope="col">Solicitante</th>
                                                      <th scope="col">Autorizador</th>
                                                    <th scope="col">CTI</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                do {

                                                    $linha = mysqli_fetch_assoc($dados);
                                                    ?>
                                                       <tr>
                                                       <td>  <span class="label label-danger">BAIXADO</span>  </td>
                                                       <td><?php echo $linha['status']; ?> </td>
                                                       <td><?php echo $linha['id']; ?> </td>
                                                        <td>  <a href='./emprest_baixa.php?id= <?php echo $linha['id']; ?>  ' title="Dar baixa em Emprestimos  <?php echo nomedolocal($conn, $linha['local_cod']); ?> " > <?php echo $linha['local_cod']; ?>  </a> </td>
                                                        <td><?php echo $linha['previsao']; ?> </td>
                                                        <td><?php echo $linha['data_cad']; ?> </td>
                                                       <td><?php echo $linha['data_dev']; ?> </td>
                                                        <td><?php echo $linha['nome_solicitante']; ?> </td>
                                                        <td><?php echo $linha['nome_autorizador']; ?> </td>
                                                        <td title=" <?php echo $linha['temp']; ?>   "  ><?php echo $linha['cti']; ?> </td>
                                                      </tr>
                                                   <?php
                                            } while ($linha = mysqli_fetch_assoc($dados));



                                                ?>
                     
                                                </tbody>
                                              </table>
                

                
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </section>   
                                           <a href='./emprest_consulta.php' class='btn btn-primary'>Consulta Geral  </a>
                                                    </div>
                                                    </fieldset>
                                                    </form>
                                                   <?php
                                                }
                                             ?>
    
                                </section> 
                                </section>   
                                </div>
                                </body>

                                </html>

    