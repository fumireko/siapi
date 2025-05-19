<?php
//include "../validar_session.php";  
//include "../Config/config_sistema.php";
include "bco_fun.php";
//$qr = mysql_query($sql) or die(mysql_error());

//"INSERT INTO `tb_emprestimo`(`status`, `local_cod`, `data`, `cti`, `nome_solicitante`, `nome_autorizador`, `previsao`, `usuario`, `temp`) VALUES('1','$unidade_id','$hoje','$ctrl_ti','$solicitante','$autorizador','$retorno','$nome_usuario','$temp')";

          $query = "select * from tb_emprestimo order by id desc ";
           $dados = mysqli_query($conn, $query);
           $resultadoDaInsercao = mysqli_num_rows($dados);
$linha = mysqli_fetch_assoc($dados);
if ($resultadoDaInsercao == '0'){
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
                                                                <th scope="col">Status</th>
                                                              </tr>
                                                            </thead>
                                                            <tbody>
                                                               <tr>
                                                                <td>----</td>
                                                                <td>----</td>
                                                                <td>----</td>
                                                                <td>---- </td>
                                                                <td>----</td>
                                                                <td>-----</td>
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
  
                                            <!-- Text input-->
                                                    <div class="form-group">
                                                      <label class="col-md-4 control-label" for="telefone">Consulta : </label>
                                                      <div class="col-md-4">
                                                           <input  name="autorizador" id="autorizador" type="text" value = ""
                                                            placeholder="Digite dados da consulta" class="form-control input-md" > 
                                                       </div>
                                                            </div>
                    
                                                      <!-- Button -->
                                                                      <div class="form-group">
                                                                      <div align="center"><input type="submit" value="Consultar" name="salvar" class="btn btn-primary" /></div>
                                                                 </div>

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
else // retorno de dados na tabela 
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
                                               <a href='./emprest_visual.php?tipo=1' class='btn btn-primary'title="Consultar emprestimos de equipamentos ja devolvidos">Consultar Devolvidos </a>   &nbsp&nbsp
                                            <a href='./emprest_visual.php?tipo=2' class='btn btn-primary'title="Consultar emprestimos de equipamentos nao devolvidos">Consultar Pendentes </a> &nbsp&nbsp
                                            <a href='./emprest_cad.php' class='btn btn-primary' title="Cadastrar novos emprestimos">Cadastrar Emprestimos </a>
              
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
         
                                 <section class="intro">
                              <div class="bg-image h-100" style="background-color: #f5f7fa;">
                                <div class="mask d-flex align-items-center h-100">
                                  <div class="container">
                                    <div class="row justify-content-center">
                                      <div class="col-12">
                                        <div class="card">
                                          <div class="card-body p-0">
                                            <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; height: 350px">
                                              <table class="table table-striped mb-0">
                                                <thead style="background-color: #002d72;">
                                                  <tr>
                                                    <th scope="col">Local</th>
                                                    <th scope="col">Previsao</th>
                                                    <th scope="col">Emprestado em </th>
                                                    <th scope="col">Solicitante</th>
                                                    <th scope="col">CTI</th>
                                                    <th scope="col"></th>
                                                    <th scope="col">Status</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                do {
                                                  //  $linha = mysqli_fetch_assoc($dados);
                                                    ?>
                                                    <tr>
                                                    <td title=" <?php echo nomedolocal($conn,$linha['local_cod']); ?>   " ><?php echo $linha['local_cod']; ?>  </td>
                                                    <td><?php echo $linha['previsao']; ?> </td>
                                                    <td><?php echo $linha['data_cad']; ?> </td>
                                                    <td><?php echo $linha['nome_solicitante']; ?> </td>
                                                    <td title=" <?php echo $linha['temp']; ?>   "  ><?php echo $linha['cti']; ?> </td>
                                                    <td><?php echo "<a href=' busca_diversos.php' title='Consultar CTI ' > * </a> " ?> </td>
                                                      <?php
                                                      if ($linha['status'] == '0') {
                                                          ?>
                                                          <td><span class="label label-success">Finalizado</span> </td>
                                                     <?php
                                                      }
                                                      else
                                                      {
                                                          if ($linha['status'] == '1') {
                                                              ?>
                                                        <td><span class="label label-danger">Pendente</span> </td>
                                                    <?php
                                                          }}
                                                    ?>
                                                    </tr>
                                               <?php
                                                } while ($linha = mysqli_fetch_assoc($dados));
                                              //   } 
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
                                    <!-- Text input-->
                                        <div class="form-group">
                                          <label class="col-md-4 control-label" for="telefone">Consulta : </label>
                                          <div class="col-md-4">
                                               <input  name="autorizador" id="autorizador" type="text" value = ""
                                                placeholder="Digite dados da consulta" class="form-control input-md" > 
                                           </div>
                                                </div>     
        
                                                    </div>
                                          <!-- Button -->
                                                          <div class="form-group">
                                                          <div align="center"><input type="submit" value="Consultar" title="Consulta com base nas informaçoes digitadas" name="salvar" class="btn btn-primary" /></div>
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

    