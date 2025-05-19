<?php
//include "../validar_session.php";  
//include "../Config/config_sistema.php";
include "bco_fun.php";
//$qr = mysql_query($sql) or die(mysql_error());

//"INSERT INTO `tb_emprestimo`(`status`, `local_cod`, `data`, `cti`, `nome_solicitante`, `nome_autorizador`, `previsao`, `usuario`, `temp`) VALUES('1','$unidade_id','$hoje','$ctrl_ti','$solicitante','$autorizador','$retorno','$nome_usuario','$temp')";

if (isset($_GET['tipo'])) {
    $busca = $_GET['tipo'];
} else
    $busca = "0";
// tipo de amostragem colunas
switch ($busca) {
    case '0': {
       $query = "select * from tb_sac order by id desc ";
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
                                                              <input id="unidade_usuario" name="unidade_usuario" type="text" value="<?php echo ""; ?>" hidden>
          
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
                                                                 <th scope="col"> <a href='./sac_consulta2.php?tipo=1' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Local">Local </a>  </th>
                                                                <th scope="col">  <a href='./sac_consulta2.php?tipo=2' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Chamado">Chamado </a></th>
                                                                <th scope="col"> <a href='./sac_consulta2.php?tipo=3' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Data">Data </a></th>
                                                                <th scope="col"> <a href='./sac_consulta2.php?tipo=4' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Nome de Solicitante">Solicitante </a></th>
                                                                <th scope="col">  <a href='./sac_consulta2.php?tipo=5' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Tecnico">Tecnico</a></th>
                                                                <th scope="col">Avaliaçao</th>
                                                                <th scope="col"> <a href='./sac_consulta2.php?tipo=6' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Serviço">Serviço</a></th>
                                                                <th scope="col">Avaliaçao</th>
                                                      
                                                              </tr>
                                                            </thead>
                                                            <tbody>
                                                               <tr>
                                                                <td>----</td>
                                                                <td>----</td>
                                                                <td>----</td>
                                                                <td>---- </td>
                                                                <td>----</td>
                                                                 <td>----</td>
                                                                <td>-----</td>
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
                                        <h2 class="title pull-left">Visualizar Avaliaçoes de Atendimento  </h2><br />
     
                                    <div class="form-group  col-md-6">
                                        </div>
                                        <div class="actions panel_actions pull-right">
                                               <a href='./sac_chamados.php?tipo=2' class='btn btn-primary'title="Consultar emprestimos de equipamentos nao devolvidos">Consultar Chamados (SAC) </a> &nbsp&nbsp
                                            <a href='./sac_chamados.php?tipo=finalizado' class='btn btn-primary' title="Cadastrar novos emprestimos">Cadastrar Avaliacoes (SAC) </a>
              
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
                                                             
                                                                <th scope="col"> <a href='./sac_consulta2.php?tipo=1' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Local">Local </a>  </th>
                                                                <th scope="col">  <a href='./sac_consulta2.php?tipo=2' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Chamado">Chamado </a></th>
                                                                <th scope="col"> <a href='./sac_consulta2.php?tipo=3' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Data">Data </a></th>
                                                                <th scope="col"> <a href='./sac_consulta2.php?tipo=4' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Nome de Solicitante">Solicitante </a></th>
                                                                <th scope="col">  <a href='./sac_consulta2.php?tipo=5' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Tecnico">Tecnico</a></th>
                                                                <th scope="col">Avaliaçao</th>
                                                                <th scope="col"> <a href='./sac_consulta2.php?tipo=6' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Serviço">Serviço</a></th>
                                                                <th scope="col">Avaliaçao</th>
                                                              </tr>
                                                      
                                                </thead>
                                                <tbody>
                                                <?php
                                                do {
                                                  //  $linha = mysqli_fetch_assoc($dados);
                                                    // inicio da checagem do parametro tecnico
                                                    switch ($linha['aval_tec']) {
                                                        case '0': {
                                                     $ret_img_tec = "./img/star0.png";
                                                                  }
                                                            break;
                                                              case '1': {
                                                     $ret_img_tec = "./img/star1.png";
                                                                  }
                                                            break;
                                                            case '2': {
                                                     $ret_img_tec = "./img/star2.png";
                                                                  }
                                                            break;
                                                              case '3': {
                                                     $ret_img_tec = "./img/star3.png";
                                                                  }
                                                            break;
                                                              case '4': {
                                                     $ret_img_tec = "./img/star4.png";
                                                                  }
                                                            break;
                                                              case '5': {
                                                     $ret_img_tec = "./img/star5.png";
                                                                  }
                                                            break;
                                                              default:
                                                        $ret_img_tec = "./img/star0.png";
                                                    }
                                                   // fim do parametro img tecnico 
                                            
                                                    // inicio da checagem do parametro Serviço
                                                    switch ($linha['aval_serv']) {
                                                        case '0': {
                                                            $ret_img_serv = "./img/star0.png";
                                                        }
                                                            break;
                                                        case '1': {
                                                            $ret_img_serv = "./img/star1.png";
                                                        }
                                                            break;
                                                        case '2': {
                                                            $ret_img_serv = "./img/star2.png";
                                                        }
                                                            break;
                                                        case '3': {
                                                            $ret_img_serv = "./img/star3.png";
                                                        }
                                                            break;
                                                        case '4': {
                                                            $ret_img_serv = "./img/star4.png";
                                                        }
                                                            break;
                                                        case '5': {
                                                            $ret_img_serv = "./img/star5.png";
                                                        }
                                                            break;
                                                        default:
                                                            $ret_img_serv = "./img/star0.png";
                                                    }
                                                    // fim do parametro img Serviço 

                                                    
                                                    ?>
                                                    <tr>
                                                    <td title=" <?php echo nomedolocal($conn,$linha['cod_loc']); ?>   " ><?php echo $linha['cod_loc']; ?>  </td>
                                                    <td><?php echo $linha['cham_cod']; ?> </td>
                                                    <td title=" <?php echo $linha['cham_datas']; ?>"><?php echo $linha['dt_cad']; ?> </td>
                                                    <td><?php echo $linha['cham_solic']; ?> </td>
                                                     <td><?php echo $linha['cham_tecnico']; ?> </td>
                                                     <td title=" <?php echo $linha['aval_tec']; ?>">  <img src="<?php echo $ret_img_tec; ?>" width="85" height="35" > </td>
                                                     <td title=" <?php echo $linha['cham_desc']; ?>   "  ><?php echo $linha['cham_tipo']; ?> </td>
                                                      <td title=" <?php echo $linha['aval_serv']; ?>">  <img src="<?php echo $ret_img_serv; ?>" width="85" height="35" > </td>
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
                                 
                                 
                                    </fieldset>
                                                    </form>
                                                      
                                </section> 
                                </section>   
                                </div>
                                </body>

                                </html>

           <?php
}

    }
        break;
    case '1': { // local
        $query = "select * from tb_sac order by cod_loc  ";
        $dados = mysqli_query($conn, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        $linha = mysqli_fetch_assoc($dados);
        if ($resultadoDaInsercao == '0') {
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
                                                              <input id="unidade_usuario" name="unidade_usuario" type="text" value="<?php echo ""; ?>" hidden>
          
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
                                                                 <th scope="col"> <a href='./sac_consulta2.php?tipo=1' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Local">Local </a>  </th>
                                                                <th scope="col">  <a href='./sac_consulta2.php?tipo=2' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Chamado">Chamado </a></th>
                                                                <th scope="col"> <a href='./sac_consulta2.php?tipo=3' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Data">Data </a></th>
                                                                <th scope="col"> <a href='./sac_consulta2.php?tipo=4' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Nome de Solicitante">Solicitante </a></th>
                                                                <th scope="col">  <a href='./sac_consulta2.php?tipo=5' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Tecnico">Tecnico</a></th>
                                                                <th scope="col">Avaliaçao</th>
                                                                <th scope="col"> <a href='./sac_consulta2.php?tipo=6' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Serviço">Serviço</a></th>
                                                                <th scope="col">Avaliaçao</th>
                                                      
                                                              </tr>
                                                            </thead>
                                                            <tbody>
                                                               <tr>
                                                                <td>----</td>
                                                                <td>----</td>
                                                                <td>----</td>
                                                                <td>---- </td>
                                                                <td>----</td>
                                                                 <td>----</td>
                                                                <td>-----</td>
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
        } else // retorno de dados na tabela 
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
                                        <h2 class="title pull-left">Visualizar Avaliaçoes de Atendimento  </h2><br />
     
                                    <div class="form-group  col-md-6">
                                        </div>
                                        <div class="actions panel_actions pull-right">
                                               <a href='./sac_chamados.php?tipo=2' class='btn btn-primary'title="Consultar emprestimos de equipamentos nao devolvidos">Consultar Chamados (SAC) </a> &nbsp&nbsp
                                            <a href='./sac_chamados.php?tipo=finalizado' class='btn btn-primary' title="Cadastrar novos emprestimos">Cadastrar Avaliacoes (SAC) </a>
              
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
                                                             
                                                                <th scope="col"> <a href='./sac_consulta2.php?tipo=1' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Local">Local </a>  </th>
                                                                <th scope="col">  <a href='./sac_consulta2.php?tipo=2' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Chamado">Chamado </a></th>
                                                                <th scope="col"> <a href='./sac_consulta2.php?tipo=3' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Data">Data </a></th>
                                                                <th scope="col"> <a href='./sac_consulta2.php?tipo=4' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Nome de Solicitante">Solicitante </a></th>
                                                                <th scope="col">  <a href='./sac_consulta2.php?tipo=5' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Tecnico">Tecnico</a></th>
                                                                <th scope="col">Avaliaçao</th>
                                                                <th scope="col"> <a href='./sac_consulta2.php?tipo=6' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Serviço">Serviço</a></th>
                                                                <th scope="col">Avaliaçao</th>
                                                              </tr>
                                                      
                                                </thead>
                                                <tbody>
                                                <?php
                                                do {
                                                    //  $linha = mysqli_fetch_assoc($dados);
                                                    // inicio da checagem do parametro tecnico
                                                    switch ($linha['aval_tec']) {
                                                        case '0': {
                                                            $ret_img_tec = "./img/star0.png";
                                                        }
                                                            break;
                                                        case '1': {
                                                            $ret_img_tec = "./img/star1.png";
                                                        }
                                                            break;
                                                        case '2': {
                                                            $ret_img_tec = "./img/star2.png";
                                                        }
                                                            break;
                                                        case '3': {
                                                            $ret_img_tec = "./img/star3.png";
                                                        }
                                                            break;
                                                        case '4': {
                                                            $ret_img_tec = "./img/star4.png";
                                                        }
                                                            break;
                                                        case '5': {
                                                            $ret_img_tec = "./img/star5.png";
                                                        }
                                                            break;
                                                        default:
                                                            $ret_img_tec = "./img/star0.png";
                                                    }
                                                    // fim do parametro img tecnico 
                                    
                                                    // inicio da checagem do parametro Serviço
                                                    switch ($linha['aval_serv']) {
                                                        case '0': {
                                                            $ret_img_serv = "./img/star0.png";
                                                        }
                                                            break;
                                                        case '1': {
                                                            $ret_img_serv = "./img/star1.png";
                                                        }
                                                            break;
                                                        case '2': {
                                                            $ret_img_serv = "./img/star2.png";
                                                        }
                                                            break;
                                                        case '3': {
                                                            $ret_img_serv = "./img/star3.png";
                                                        }
                                                            break;
                                                        case '4': {
                                                            $ret_img_serv = "./img/star4.png";
                                                        }
                                                            break;
                                                        case '5': {
                                                            $ret_img_serv = "./img/star5.png";
                                                        }
                                                            break;
                                                        default:
                                                            $ret_img_serv = "./img/star0.png";
                                                    }
                                                    // fim do parametro img Serviço 
                                    

                                                    ?>
                                                    <tr>
                                                    <td title=" <?php echo nomedolocal($conn, $linha['cod_loc']); ?>   " ><?php echo $linha['cod_loc']; ?>  </td>
                                                    <td><?php echo $linha['cham_cod']; ?> </td>
                                                    <td title=" <?php echo $linha['cham_datas']; ?>"><?php echo $linha['dt_cad']; ?> </td>
                                                    <td><?php echo $linha['cham_solic']; ?> </td>
                                                     <td><?php echo $linha['cham_tecnico']; ?> </td>
                                                     <td title=" <?php echo $linha['aval_tec']; ?>">  <img src="<?php echo $ret_img_tec; ?>" width="85" height="35" > </td>
                                                     <td title=" <?php echo $linha['cham_desc']; ?>   "  ><?php echo $linha['cham_tipo']; ?> </td>
                                                      <td title=" <?php echo $linha['aval_serv']; ?>">  <img src="<?php echo $ret_img_serv; ?>" width="85" height="35" > </td>
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
                                 
                                 
                                    </fieldset>
                                                    </form>
                                                      
                                </section> 
                                </section>   
                                </div>
                                </body>

                                </html>

           <?php
        }



    }
        break;
    case '2': { // chamado
        $query = "select * from tb_sac order by cham_cod desc ";
        $dados = mysqli_query($conn, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        $linha = mysqli_fetch_assoc($dados);
        if ($resultadoDaInsercao == '0') {
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
                                                              <input id="unidade_usuario" name="unidade_usuario" type="text" value="<?php echo ""; ?>" hidden>
          
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
                                                                 <th scope="col"> <a href='./sac_consulta2.php?tipo=1' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Local">Local </a>  </th>
                                                                <th scope="col">  <a href='./sac_consulta2.php?tipo=2' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Chamado">Chamado </a></th>
                                                                <th scope="col"> <a href='./sac_consulta2.php?tipo=3' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Data">Data </a></th>
                                                                <th scope="col"> <a href='./sac_consulta2.php?tipo=4' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Nome de Solicitante">Solicitante </a></th>
                                                                <th scope="col">  <a href='./sac_consulta2.php?tipo=5' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Tecnico">Tecnico</a></th>
                                                                <th scope="col">Avaliaçao</th>
                                                                <th scope="col"> <a href='./sac_consulta2.php?tipo=6' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Serviço">Serviço</a></th>
                                                                <th scope="col">Avaliaçao</th>
                                                      
                                                              </tr>
                                                            </thead>
                                                            <tbody>
                                                               <tr>
                                                                <td>----</td>
                                                                <td>----</td>
                                                                <td>----</td>
                                                                <td>---- </td>
                                                                <td>----</td>
                                                                 <td>----</td>
                                                                <td>-----</td>
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
        } else // retorno de dados na tabela 
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
                                        <h2 class="title pull-left">Visualizar Avaliaçoes de Atendimento  </h2><br />
     
                                    <div class="form-group  col-md-6">
                                        </div>
                                        <div class="actions panel_actions pull-right">
                                               <a href='./sac_chamados.php?tipo=2' class='btn btn-primary'title="Consultar emprestimos de equipamentos nao devolvidos">Consultar Chamados (SAC) </a> &nbsp&nbsp
                                            <a href='./sac_chamados.php?tipo=finalizado' class='btn btn-primary' title="Cadastrar novos emprestimos">Cadastrar Avaliacoes (SAC) </a>
              
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
                                                             
                                                                <th scope="col"> <a href='./sac_consulta2.php?tipo=1' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Local">Local </a>  </th>
                                                                <th scope="col">  <a href='./sac_consulta2.php?tipo=2' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Chamado">Chamado </a></th>
                                                                <th scope="col"> <a href='./sac_consulta2.php?tipo=3' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Data">Data </a></th>
                                                                <th scope="col"> <a href='./sac_consulta2.php?tipo=4' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Nome de Solicitante">Solicitante </a></th>
                                                                <th scope="col">  <a href='./sac_consulta2.php?tipo=5' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Tecnico">Tecnico</a></th>
                                                                <th scope="col">Avaliaçao</th>
                                                                <th scope="col"> <a href='./sac_consulta2.php?tipo=6' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Serviço">Serviço</a></th>
                                                                <th scope="col">Avaliaçao</th>
                                                              </tr>
                                                      
                                                </thead>
                                                <tbody>
                                                <?php
                                                do {
                                                    //  $linha = mysqli_fetch_assoc($dados);
                                                    // inicio da checagem do parametro tecnico
                                                    switch ($linha['aval_tec']) {
                                                        case '0': {
                                                            $ret_img_tec = "./img/star0.png";
                                                        }
                                                            break;
                                                        case '1': {
                                                            $ret_img_tec = "./img/star1.png";
                                                        }
                                                            break;
                                                        case '2': {
                                                            $ret_img_tec = "./img/star2.png";
                                                        }
                                                            break;
                                                        case '3': {
                                                            $ret_img_tec = "./img/star3.png";
                                                        }
                                                            break;
                                                        case '4': {
                                                            $ret_img_tec = "./img/star4.png";
                                                        }
                                                            break;
                                                        case '5': {
                                                            $ret_img_tec = "./img/star5.png";
                                                        }
                                                            break;
                                                        default:
                                                            $ret_img_tec = "./img/star0.png";
                                                    }
                                                    // fim do parametro img tecnico 
                                    
                                                    // inicio da checagem do parametro Serviço
                                                    switch ($linha['aval_serv']) {
                                                        case '0': {
                                                            $ret_img_serv = "./img/star0.png";
                                                        }
                                                            break;
                                                        case '1': {
                                                            $ret_img_serv = "./img/star1.png";
                                                        }
                                                            break;
                                                        case '2': {
                                                            $ret_img_serv = "./img/star2.png";
                                                        }
                                                            break;
                                                        case '3': {
                                                            $ret_img_serv = "./img/star3.png";
                                                        }
                                                            break;
                                                        case '4': {
                                                            $ret_img_serv = "./img/star4.png";
                                                        }
                                                            break;
                                                        case '5': {
                                                            $ret_img_serv = "./img/star5.png";
                                                        }
                                                            break;
                                                        default:
                                                            $ret_img_serv = "./img/star0.png";
                                                    }
                                                    // fim do parametro img Serviço 
                                    

                                                    ?>
                                                    <tr>
                                                    <td title=" <?php echo nomedolocal($conn, $linha['cod_loc']); ?>   " ><?php echo $linha['cod_loc']; ?>  </td>
                                                    <td><?php echo $linha['cham_cod']; ?> </td>
                                                    <td title=" <?php echo $linha['cham_datas']; ?>"><?php echo $linha['dt_cad']; ?> </td>
                                                    <td><?php echo $linha['cham_solic']; ?> </td>
                                                     <td><?php echo $linha['cham_tecnico']; ?> </td>
                                                     <td title=" <?php echo $linha['aval_tec']; ?>">  <img src="<?php echo $ret_img_tec; ?>" width="85" height="35" > </td>
                                                     <td title=" <?php echo $linha['cham_desc']; ?>   "  ><?php echo $linha['cham_tipo']; ?> </td>
                                                      <td title=" <?php echo $linha['aval_serv']; ?>">  <img src="<?php echo $ret_img_serv; ?>" width="85" height="35" > </td>
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
                                 
                                 
                                    </fieldset>
                                                    </form>
                                                      
                                </section> 
                                </section>   
                                </div>
                                </body>

                                </html>

           <?php
        }

    }
        break;
    case '3': { // data
        $query = "select * from tb_sac order by dt_cad ";
        $dados = mysqli_query($conn, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        $linha = mysqli_fetch_assoc($dados);
        if ($resultadoDaInsercao == '0') {
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
                                                              <input id="unidade_usuario" name="unidade_usuario" type="text" value="<?php echo ""; ?>" hidden>
          
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
                                                                 <th scope="col"> <a href='./sac_consulta2.php?tipo=1' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Local">Local </a>  </th>
                                                                <th scope="col">  <a href='./sac_consulta2.php?tipo=2' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Chamado">Chamado </a></th>
                                                                <th scope="col"> <a href='./sac_consulta2.php?tipo=3' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Data">Data </a></th>
                                                                <th scope="col"> <a href='./sac_consulta2.php?tipo=4' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Nome de Solicitante">Solicitante </a></th>
                                                                <th scope="col">  <a href='./sac_consulta2.php?tipo=5' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Tecnico">Tecnico</a></th>
                                                                <th scope="col">Avaliaçao</th>
                                                                <th scope="col"> <a href='./sac_consulta2.php?tipo=6' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Serviço">Serviço</a></th>
                                                                <th scope="col">Avaliaçao</th>
                                                      
                                                              </tr>
                                                            </thead>
                                                            <tbody>
                                                               <tr>
                                                                <td>----</td>
                                                                <td>----</td>
                                                                <td>----</td>
                                                                <td>---- </td>
                                                                <td>----</td>
                                                                 <td>----</td>
                                                                <td>-----</td>
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
        } else // retorno de dados na tabela 
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
                                        <h2 class="title pull-left">Visualizar Avaliaçoes de Atendimento  </h2><br />
     
                                    <div class="form-group  col-md-6">
                                        </div>
                                        <div class="actions panel_actions pull-right">
                                               <a href='./sac_chamados.php?tipo=2' class='btn btn-primary'title="Consultar emprestimos de equipamentos nao devolvidos">Consultar Chamados (SAC) </a> &nbsp&nbsp
                                            <a href='./sac_chamados.php?tipo=finalizado' class='btn btn-primary' title="Cadastrar novos emprestimos">Cadastrar Avaliacoes (SAC) </a>
              
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
                                                             
                                                                <th scope="col"> <a href='./sac_consulta2.php?tipo=1' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Local">Local </a>  </th>
                                                                <th scope="col">  <a href='./sac_consulta2.php?tipo=2' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Chamado">Chamado </a></th>
                                                                <th scope="col"> <a href='./sac_consulta2.php?tipo=3' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Data">Data </a></th>
                                                                <th scope="col"> <a href='./sac_consulta2.php?tipo=4' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Nome de Solicitante">Solicitante </a></th>
                                                                <th scope="col">  <a href='./sac_consulta2.php?tipo=5' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Tecnico">Tecnico</a></th>
                                                                <th scope="col">Avaliaçao</th>
                                                                <th scope="col"> <a href='./sac_consulta2.php?tipo=6' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Serviço">Serviço</a></th>
                                                                <th scope="col">Avaliaçao</th>
                                                              </tr>
                                                      
                                                </thead>
                                                <tbody>
                                                <?php
                                                do {
                                                    //  $linha = mysqli_fetch_assoc($dados);
                                                    // inicio da checagem do parametro tecnico
                                                    switch ($linha['aval_tec']) {
                                                        case '0': {
                                                            $ret_img_tec = "./img/star0.png";
                                                        }
                                                            break;
                                                        case '1': {
                                                            $ret_img_tec = "./img/star1.png";
                                                        }
                                                            break;
                                                        case '2': {
                                                            $ret_img_tec = "./img/star2.png";
                                                        }
                                                            break;
                                                        case '3': {
                                                            $ret_img_tec = "./img/star3.png";
                                                        }
                                                            break;
                                                        case '4': {
                                                            $ret_img_tec = "./img/star4.png";
                                                        }
                                                            break;
                                                        case '5': {
                                                            $ret_img_tec = "./img/star5.png";
                                                        }
                                                            break;
                                                        default:
                                                            $ret_img_tec = "./img/star0.png";
                                                    }
                                                    // fim do parametro img tecnico 
                                    
                                                    // inicio da checagem do parametro Serviço
                                                    switch ($linha['aval_serv']) {
                                                        case '0': {
                                                            $ret_img_serv = "./img/star0.png";
                                                        }
                                                            break;
                                                        case '1': {
                                                            $ret_img_serv = "./img/star1.png";
                                                        }
                                                            break;
                                                        case '2': {
                                                            $ret_img_serv = "./img/star2.png";
                                                        }
                                                            break;
                                                        case '3': {
                                                            $ret_img_serv = "./img/star3.png";
                                                        }
                                                            break;
                                                        case '4': {
                                                            $ret_img_serv = "./img/star4.png";
                                                        }
                                                            break;
                                                        case '5': {
                                                            $ret_img_serv = "./img/star5.png";
                                                        }
                                                            break;
                                                        default:
                                                            $ret_img_serv = "./img/star0.png";
                                                    }
                                                    // fim do parametro img Serviço 
                                    

                                                    ?>
                                                    <tr>
                                                    <td title=" <?php echo nomedolocal($conn, $linha['cod_loc']); ?>   " ><?php echo $linha['cod_loc']; ?>  </td>
                                                    <td><?php echo $linha['cham_cod']; ?> </td>
                                                    <td title=" <?php echo $linha['cham_datas']; ?>"><?php echo $linha['dt_cad']; ?> </td>
                                                    <td><?php echo $linha['cham_solic']; ?> </td>
                                                     <td><?php echo $linha['cham_tecnico']; ?> </td>
                                                     <td title=" <?php echo $linha['aval_tec']; ?>">  <img src="<?php echo $ret_img_tec; ?>" width="85" height="35" > </td>
                                                     <td title=" <?php echo $linha['cham_desc']; ?>   "  ><?php echo $linha['cham_tipo']; ?> </td>
                                                      <td title=" <?php echo $linha['aval_serv']; ?>">  <img src="<?php echo $ret_img_serv; ?>" width="85" height="35" > </td>
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
                                 
                                 
                                    </fieldset>
                                                    </form>
                                                      
                                </section> 
                                </section>   
                                </div>
                                </body>

                                </html>

           <?php
        }
    }
        break;
    case '4': { // solicitante
        $query = "select * from tb_sac order by cham_solic ";
        $dados = mysqli_query($conn, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        $linha = mysqli_fetch_assoc($dados);
        if ($resultadoDaInsercao == '0') {
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
                                                              <input id="unidade_usuario" name="unidade_usuario" type="text" value="<?php echo ""; ?>" hidden>
          
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
                                                                 <th scope="col"> <a href='./sac_consulta2.php?tipo=1' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Local">Local </a>  </th>
                                                                <th scope="col">  <a href='./sac_consulta2.php?tipo=2' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Chamado">Chamado </a></th>
                                                                <th scope="col"> <a href='./sac_consulta2.php?tipo=3' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Data">Data </a></th>
                                                                <th scope="col"> <a href='./sac_consulta2.php?tipo=4' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Nome de Solicitante">Solicitante </a></th>
                                                                <th scope="col">  <a href='./sac_consulta2.php?tipo=5' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Tecnico">Tecnico</a></th>
                                                                <th scope="col">Avaliaçao</th>
                                                                <th scope="col"> <a href='./sac_consulta2.php?tipo=6' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Serviço">Serviço</a></th>
                                                                <th scope="col">Avaliaçao</th>
                                                      
                                                              </tr>
                                                            </thead>
                                                            <tbody>
                                                               <tr>
                                                                <td>----</td>
                                                                <td>----</td>
                                                                <td>----</td>
                                                                <td>---- </td>
                                                                <td>----</td>
                                                                 <td>----</td>
                                                                <td>-----</td>
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
        } else // retorno de dados na tabela 
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
                                        <h2 class="title pull-left">Visualizar Avaliaçoes de Atendimento  </h2><br />
     
                                    <div class="form-group  col-md-6">
                                        </div>
                                        <div class="actions panel_actions pull-right">
                                               <a href='./sac_chamados.php?tipo=2' class='btn btn-primary'title="Consultar emprestimos de equipamentos nao devolvidos">Consultar Chamados (SAC) </a> &nbsp&nbsp
                                            <a href='./sac_chamados.php?tipo=finalizado' class='btn btn-primary' title="Cadastrar novos emprestimos">Cadastrar Avaliacoes (SAC) </a>
              
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
                                                             
                                                                <th scope="col"> <a href='./sac_consulta2.php?tipo=1' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Local">Local </a>  </th>
                                                                <th scope="col">  <a href='./sac_consulta2.php?tipo=2' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Chamado">Chamado </a></th>
                                                                <th scope="col"> <a href='./sac_consulta2.php?tipo=3' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Data">Data </a></th>
                                                                <th scope="col"> <a href='./sac_consulta2.php?tipo=4' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Nome de Solicitante">Solicitante </a></th>
                                                                <th scope="col">  <a href='./sac_consulta2.php?tipo=5' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Tecnico">Tecnico</a></th>
                                                                <th scope="col">Avaliaçao</th>
                                                                <th scope="col"> <a href='./sac_consulta2.php?tipo=6' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Serviço">Serviço</a></th>
                                                                <th scope="col">Avaliaçao</th>
                                                              </tr>
                                                      
                                                </thead>
                                                <tbody>
                                                <?php
                                                do {
                                                    //  $linha = mysqli_fetch_assoc($dados);
                                                    // inicio da checagem do parametro tecnico
                                                    switch ($linha['aval_tec']) {
                                                        case '0': {
                                                            $ret_img_tec = "./img/star0.png";
                                                        }
                                                            break;
                                                        case '1': {
                                                            $ret_img_tec = "./img/star1.png";
                                                        }
                                                            break;
                                                        case '2': {
                                                            $ret_img_tec = "./img/star2.png";
                                                        }
                                                            break;
                                                        case '3': {
                                                            $ret_img_tec = "./img/star3.png";
                                                        }
                                                            break;
                                                        case '4': {
                                                            $ret_img_tec = "./img/star4.png";
                                                        }
                                                            break;
                                                        case '5': {
                                                            $ret_img_tec = "./img/star5.png";
                                                        }
                                                            break;
                                                        default:
                                                            $ret_img_tec = "./img/star0.png";
                                                    }
                                                    // fim do parametro img tecnico 
                                    
                                                    // inicio da checagem do parametro Serviço
                                                    switch ($linha['aval_serv']) {
                                                        case '0': {
                                                            $ret_img_serv = "./img/star0.png";
                                                        }
                                                            break;
                                                        case '1': {
                                                            $ret_img_serv = "./img/star1.png";
                                                        }
                                                            break;
                                                        case '2': {
                                                            $ret_img_serv = "./img/star2.png";
                                                        }
                                                            break;
                                                        case '3': {
                                                            $ret_img_serv = "./img/star3.png";
                                                        }
                                                            break;
                                                        case '4': {
                                                            $ret_img_serv = "./img/star4.png";
                                                        }
                                                            break;
                                                        case '5': {
                                                            $ret_img_serv = "./img/star5.png";
                                                        }
                                                            break;
                                                        default:
                                                            $ret_img_serv = "./img/star0.png";
                                                    }
                                                    // fim do parametro img Serviço 
                                    

                                                    ?>
                                                    <tr>
                                                    <td title=" <?php echo nomedolocal($conn, $linha['cod_loc']); ?>   " ><?php echo $linha['cod_loc']; ?>  </td>
                                                    <td><?php echo $linha['cham_cod']; ?> </td>
                                                    <td title=" <?php echo $linha['cham_datas']; ?>"><?php echo $linha['dt_cad']; ?> </td>
                                                    <td><?php echo $linha['cham_solic']; ?> </td>
                                                     <td><?php echo $linha['cham_tecnico']; ?> </td>
                                                     <td title=" <?php echo $linha['aval_tec']; ?>">  <img src="<?php echo $ret_img_tec; ?>" width="85" height="35" > </td>
                                                     <td title=" <?php echo $linha['cham_desc']; ?>   "  ><?php echo $linha['cham_tipo']; ?> </td>
                                                      <td title=" <?php echo $linha['aval_serv']; ?>">  <img src="<?php echo $ret_img_serv; ?>" width="85" height="35" > </td>
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
                                 
                                 
                                    </fieldset>
                                                    </form>
                                                      
                                </section> 
                                </section>   
                                </div>
                                </body>

                                </html>

           <?php
        }

    }
        break;
    case '5': { // tecnico
        $query = "select * from tb_sac order by cham_tecnico ";
        $dados = mysqli_query($conn, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        $linha = mysqli_fetch_assoc($dados);
        if ($resultadoDaInsercao == '0') {
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
                                                              <input id="unidade_usuario" name="unidade_usuario" type="text" value="<?php echo ""; ?>" hidden>
          
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
                                                                 <th scope="col"> <a href='./sac_consulta2.php?tipo=1' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Local">Local </a>  </th>
                                                                <th scope="col">  <a href='./sac_consulta2.php?tipo=2' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Chamado">Chamado </a></th>
                                                                <th scope="col"> <a href='./sac_consulta2.php?tipo=3' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Data">Data </a></th>
                                                                <th scope="col"> <a href='./sac_consulta2.php?tipo=4' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Nome de Solicitante">Solicitante </a></th>
                                                                <th scope="col">  <a href='./sac_consulta2.php?tipo=5' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Tecnico">Tecnico</a></th>
                                                                <th scope="col">Avaliaçao</th>
                                                                <th scope="col"> <a href='./sac_consulta2.php?tipo=6' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Serviço">Serviço</a></th>
                                                                <th scope="col">Avaliaçao</th>
                                                      
                                                              </tr>
                                                            </thead>
                                                            <tbody>
                                                               <tr>
                                                                <td>----</td>
                                                                <td>----</td>
                                                                <td>----</td>
                                                                <td>---- </td>
                                                                <td>----</td>
                                                                 <td>----</td>
                                                                <td>-----</td>
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
        } else // retorno de dados na tabela 
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
                                        <h2 class="title pull-left">Visualizar Avaliaçoes de Atendimento  </h2><br />
     
                                    <div class="form-group  col-md-6">
                                        </div>
                                        <div class="actions panel_actions pull-right">
                                               <a href='./sac_chamados.php?tipo=2' class='btn btn-primary'title="Consultar emprestimos de equipamentos nao devolvidos">Consultar Chamados (SAC) </a> &nbsp&nbsp
                                            <a href='./sac_chamados.php?tipo=finalizado' class='btn btn-primary' title="Cadastrar novos emprestimos">Cadastrar Avaliacoes (SAC) </a>
              
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
                                                             
                                                                <th scope="col"> <a href='./sac_consulta2.php?tipo=1' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Local">Local </a>  </th>
                                                                <th scope="col">  <a href='./sac_consulta2.php?tipo=2' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Chamado">Chamado </a></th>
                                                                <th scope="col"> <a href='./sac_consulta2.php?tipo=3' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Data">Data </a></th>
                                                                <th scope="col"> <a href='./sac_consulta2.php?tipo=4' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Nome de Solicitante">Solicitante </a></th>
                                                                <th scope="col">  <a href='./sac_consulta2.php?tipo=5' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Tecnico">Tecnico</a></th>
                                                                <th scope="col">Avaliaçao</th>
                                                                <th scope="col"> <a href='./sac_consulta2.php?tipo=6' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Serviço">Serviço</a></th>
                                                                <th scope="col">Avaliaçao</th>
                                                              </tr>
                                                      
                                                </thead>
                                                <tbody>
                                                <?php
                                                do {
                                                    //  $linha = mysqli_fetch_assoc($dados);
                                                    // inicio da checagem do parametro tecnico
                                                    switch ($linha['aval_tec']) {
                                                        case '0': {
                                                            $ret_img_tec = "./img/star0.png";
                                                        }
                                                            break;
                                                        case '1': {
                                                            $ret_img_tec = "./img/star1.png";
                                                        }
                                                            break;
                                                        case '2': {
                                                            $ret_img_tec = "./img/star2.png";
                                                        }
                                                            break;
                                                        case '3': {
                                                            $ret_img_tec = "./img/star3.png";
                                                        }
                                                            break;
                                                        case '4': {
                                                            $ret_img_tec = "./img/star4.png";
                                                        }
                                                            break;
                                                        case '5': {
                                                            $ret_img_tec = "./img/star5.png";
                                                        }
                                                            break;
                                                        default:
                                                            $ret_img_tec = "./img/star0.png";
                                                    }
                                                    // fim do parametro img tecnico 
                                    
                                                    // inicio da checagem do parametro Serviço
                                                    switch ($linha['aval_serv']) {
                                                        case '0': {
                                                            $ret_img_serv = "./img/star0.png";
                                                        }
                                                            break;
                                                        case '1': {
                                                            $ret_img_serv = "./img/star1.png";
                                                        }
                                                            break;
                                                        case '2': {
                                                            $ret_img_serv = "./img/star2.png";
                                                        }
                                                            break;
                                                        case '3': {
                                                            $ret_img_serv = "./img/star3.png";
                                                        }
                                                            break;
                                                        case '4': {
                                                            $ret_img_serv = "./img/star4.png";
                                                        }
                                                            break;
                                                        case '5': {
                                                            $ret_img_serv = "./img/star5.png";
                                                        }
                                                            break;
                                                        default:
                                                            $ret_img_serv = "./img/star0.png";
                                                    }
                                                    // fim do parametro img Serviço 
                                    

                                                    ?>
                                                    <tr>
                                                    <td title=" <?php echo nomedolocal($conn, $linha['cod_loc']); ?>   " ><?php echo $linha['cod_loc']; ?>  </td>
                                                    <td><?php echo $linha['cham_cod']; ?> </td>
                                                    <td title=" <?php echo $linha['cham_datas']; ?>"><?php echo $linha['dt_cad']; ?> </td>
                                                    <td><?php echo $linha['cham_solic']; ?> </td>
                                                     <td><?php echo $linha['cham_tecnico']; ?> </td>
                                                     <td title=" <?php echo $linha['aval_tec']; ?>">  <img src="<?php echo $ret_img_tec; ?>" width="85" height="35" > </td>
                                                     <td title=" <?php echo $linha['cham_desc']; ?>   "  ><?php echo $linha['cham_tipo']; ?> </td>
                                                      <td title=" <?php echo $linha['aval_serv']; ?>">  <img src="<?php echo $ret_img_serv; ?>" width="85" height="35" > </td>
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
                                 
                                 
                                    </fieldset>
                                                    </form>
                                                      
                                </section> 
                                </section>   
                                </div>
                                </body>

                                </html>

           <?php
        }

    }
        break;
    case '6': { // serviço
        $query = "select * from tb_sac order by cham_desc ";
        $dados = mysqli_query($conn, $query);
        $resultadoDaInsercao = mysqli_num_rows($dados);
        $linha = mysqli_fetch_assoc($dados);
        if ($resultadoDaInsercao == '0') {
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
                                                              <input id="unidade_usuario" name="unidade_usuario" type="text" value="<?php echo ""; ?>" hidden>
          
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
                                                                 <th scope="col"> <a href='./sac_consulta2.php?tipo=1' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Local">Local </a>  </th>
                                                                <th scope="col">  <a href='./sac_consulta2.php?tipo=2' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Chamado">Chamado </a></th>
                                                                <th scope="col"> <a href='./sac_consulta2.php?tipo=3' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Data">Data </a></th>
                                                                <th scope="col"> <a href='./sac_consulta2.php?tipo=4' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Nome de Solicitante">Solicitante </a></th>
                                                                <th scope="col">  <a href='./sac_consulta2.php?tipo=5' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Tecnico">Tecnico</a></th>
                                                                <th scope="col">Avaliaçao</th>
                                                                <th scope="col"> <a href='./sac_consulta2.php?tipo=6' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Serviço">Serviço</a></th>
                                                                <th scope="col">Avaliaçao</th>
                                                      
                                                              </tr>
                                                            </thead>
                                                            <tbody>
                                                               <tr>
                                                                <td>----</td>
                                                                <td>----</td>
                                                                <td>----</td>
                                                                <td>---- </td>
                                                                <td>----</td>
                                                                 <td>----</td>
                                                                <td>-----</td>
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
        } else // retorno de dados na tabela 
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
                                        <h2 class="title pull-left">Visualizar Avaliaçoes de Atendimento  </h2><br />
     
                                    <div class="form-group  col-md-6">
                                        </div>
                                        <div class="actions panel_actions pull-right">
                                               <a href='./sac_chamados.php?tipo=2' class='btn btn-primary'title="Consultar emprestimos de equipamentos nao devolvidos">Consultar Chamados (SAC) </a> &nbsp&nbsp
                                            <a href='./sac_chamados.php?tipo=finalizado' class='btn btn-primary' title="Cadastrar novos emprestimos">Cadastrar Avaliacoes (SAC) </a>
              
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
                                                             
                                                                <th scope="col"> <a href='./sac_consulta2.php?tipo=1' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Local">Local </a>  </th>
                                                                <th scope="col">  <a href='./sac_consulta2.php?tipo=2' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Chamado">Chamado </a></th>
                                                                <th scope="col"> <a href='./sac_consulta2.php?tipo=3' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Data">Data </a></th>
                                                                <th scope="col"> <a href='./sac_consulta2.php?tipo=4' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Nome de Solicitante">Solicitante </a></th>
                                                                <th scope="col">  <a href='./sac_consulta2.php?tipo=5' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Tecnico">Tecnico</a></th>
                                                                <th scope="col">Avaliaçao</th>
                                                                <th scope="col"> <a href='./sac_consulta2.php?tipo=6' class='btn btn-primary' title="Listar Avaliaçoes por Ordem de Serviço">Serviço</a></th>
                                                                <th scope="col">Avaliaçao</th>
                                                              </tr>
                                                      
                                                </thead>
                                                <tbody>
                                                <?php
                                                do {
                                                    //  $linha = mysqli_fetch_assoc($dados);
                                                    // inicio da checagem do parametro tecnico
                                                    switch ($linha['aval_tec']) {
                                                        case '0': {
                                                            $ret_img_tec = "./img/star0.png";
                                                        }
                                                            break;
                                                        case '1': {
                                                            $ret_img_tec = "./img/star1.png";
                                                        }
                                                            break;
                                                        case '2': {
                                                            $ret_img_tec = "./img/star2.png";
                                                        }
                                                            break;
                                                        case '3': {
                                                            $ret_img_tec = "./img/star3.png";
                                                        }
                                                            break;
                                                        case '4': {
                                                            $ret_img_tec = "./img/star4.png";
                                                        }
                                                            break;
                                                        case '5': {
                                                            $ret_img_tec = "./img/star5.png";
                                                        }
                                                            break;
                                                        default:
                                                            $ret_img_tec = "./img/star0.png";
                                                    }
                                                    // fim do parametro img tecnico 
                                    
                                                    // inicio da checagem do parametro Serviço
                                                    switch ($linha['aval_serv']) {
                                                        case '0': {
                                                            $ret_img_serv = "./img/star0.png";
                                                        }
                                                            break;
                                                        case '1': {
                                                            $ret_img_serv = "./img/star1.png";
                                                        }
                                                            break;
                                                        case '2': {
                                                            $ret_img_serv = "./img/star2.png";
                                                        }
                                                            break;
                                                        case '3': {
                                                            $ret_img_serv = "./img/star3.png";
                                                        }
                                                            break;
                                                        case '4': {
                                                            $ret_img_serv = "./img/star4.png";
                                                        }
                                                            break;
                                                        case '5': {
                                                            $ret_img_serv = "./img/star5.png";
                                                        }
                                                            break;
                                                        default:
                                                            $ret_img_serv = "./img/star0.png";
                                                    }
                                                    // fim do parametro img Serviço 
                                    

                                                    ?>
                                                    <tr>
                                                    <td title=" <?php echo nomedolocal($conn, $linha['cod_loc']); ?>   " ><?php echo $linha['cod_loc']; ?>  </td>
                                                    <td><?php echo $linha['cham_cod']; ?> </td>
                                                    <td title=" <?php echo $linha['cham_datas']; ?>"><?php echo $linha['dt_cad']; ?> </td>
                                                    <td><?php echo $linha['cham_solic']; ?> </td>
                                                     <td><?php echo $linha['cham_tecnico']; ?> </td>
                                                     <td title=" <?php echo $linha['aval_tec']; ?>">  <img src="<?php echo $ret_img_tec; ?>" width="85" height="35" > </td>
                                                     <td title=" <?php echo $linha['cham_desc']; ?>   "  ><?php echo $linha['cham_tipo']; ?> </td>
                                                      <td title=" <?php echo $linha['aval_serv']; ?>">  <img src="<?php echo $ret_img_serv; ?>" width="85" height="35" > </td>
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
                                 
                                 
                                    </fieldset>
                                                    </form>
                                                      
                                </section> 
                                </section>   
                                </div>
                                </body>

                                </html>

           <?php
        }

    }
        break;
    default:
        $ret_img_tec = "./img/star0.png";
}
// fim do parametro img tecnico 










