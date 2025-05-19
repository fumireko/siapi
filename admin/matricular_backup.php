<?php
include "../validar_session.php";  
include "../Config/config_sistema.php";
$tbcmei_nome = $_SESSION['tbcmei_nome'];
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR" lang="pt-BR" ng-app="App">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="author" content="Admin" />
    <title>SEMED - Sistema de Gestao Escolar</title>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />
     <script src="js/app.js"></script>
    <body>
<section class="wrapper main-wrapper">
    <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
        <div class="page-title">
            <div class="pull-left">
                <h1 class="title">Sistema de Gestão Escolar</h1>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-lg-12">
        <section class="box ">
            <header class="panel_header">
                <h2 class="title pull-left">Matricular aluno</h2>
            </header>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">    
                    
                        <div id="consulta">
                        <div class="row">
                            <div class="form-group  col-md-6">
                                <a id="gerarExcel" href="fila_gerarExcel.php" class="btn btn-primary">Gerar Relatório</a>                           
                            </div>
                            <div class="row">
                            <div class="form-group  col-md-6">
                            <form class="form-horizontal" method="POST" id="busca_inc" action = "busca_mat.php">

                            <table>
                                <tr>    
                                    <td> <label class="col-md-4 control-label" for="fila">FILA</label></td>
                                    <td> <label class="col-md-4 control-label" for="turma">TURMA</label></td>  
                                </tr>
                                <tr>
                                    <td>
                                    <select name="motivo" required >
          			                    <option value=""> </option>
          			                    <option value="Normal">Normal</option>
					                    <option value="Inclusao">Inclusao</option>
          			                    <option value="Servico Social">Servico Social</option>
                                       
           			                </select>
                                    </td>
                                    
                                    <td>
                                    <select name="turma" required >
          			                    <option value=""> </option>
          			                    <option value="INF1">INF 1</option>
                                        <option value="INF2">INF 2</option>
              		                    <option value="INF3">INF 3</option>
                                        <option value="INF4">INF 4</option>
                                        <option value="INF5">INF 5</option>
           			                    </select>
                                    </td>
                                    <td><div align ="center"><input type="submit" value="Buscar" name="buscar"  class='btn btn-primary' /> </div> </td>
                                </tr>
                                <tr>
                                    

                                </tr>
                            </table>
                           
                                
                                
                                  
                                </div> 
                                </form>                        
                            </div>
                            <form class="form-horizontal" method="POST" id="dadosfila"   action="./#/dadosfila">
                        </div>
                            <br />
                            <?php
                                $sql = " SELECT * FROM tbaluno  ORDER BY tbaluno_id DESC LIMIT 5";
                                $qr  = mysql_query($sql) or die(mysql_error());
                            ?> 
                            <table class="table table-hover table-bordered display" id="example">
                                <thead>
                                   <p class="bg-success text-center">
                            RESUMO FILA DE ESPERA CMEI <?PHP echo $tbcmei_nome;?> 
                        </p>
                                   
                                </thead>
                                <?php
                              $linha = 0;
                              $coluna = 0;
                              function tableCount($linha, $coluna) {
                                  include "../validar_session.php";  
                                  include "../Config/config_sistema.php";
                                  if (!isset($_SESSION)){
                                      session_start();
                                   }
                                  $id_cmei = $_SESSION['unidade_usuario']; 
                                  $motivo = array("Normal", "Inclusão", "Rede de proteção");
                                  $turma = array("INF1", "INF2", "INF3", "INF4");
                                  $result=mysql_query(" SELECT COUNT(tbfila_id) as total FROM tbfila 
                                  INNER JOIN tbaluno 
                                  ON tbaluno.tbaluno_id = tbfila.tbaluno_tbaluno_id 
                                  where tbfila_motivo like '%".$motivo[$coluna]."%' 
                                  and tbcmei_tbcmcei_id	= '".$id_cmei."' 
                                  and tbaluno.tbaluno_turma like '%".$turma[$linha]."%' 
                                  and tbfila_status ='fila'
                                  and tbaluno_status = 'pendente' ") or die('Erro, query falhou');
                                  $data = mysql_fetch_assoc($result);
                                  echo $data['total'];
                              }
                              ?>  
                              <?php
                              $linha = 0;
                              function tranCount($linha) {
                                  include "../validar_session.php";  
                                  include "../Config/config_sistema.php";
                                  if (!isset($_SESSION)){
                                      session_start();
                                   }
                                  //select na tavela transferencia com tabela aluno
                                  echo "Em produção para contagem";
                              }
                           ?> 
                            <table class="table table-hover table-bordered display">
                              <thead>
                                 <tr>
                                    <th>Turma</th>
                                    <th>Normal</th>
                                    <th>Inclusão</th>
                                    <th>Rede de proteção</th>
                               
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td align="center"><i class="fa fa-heart" aria-hidden="true"></i>  Infantil 1</td>
                                    <td align="center"> <a href='lista_inf1n.php?motivo=Normal&turma=INF1'><?php tableCount($linha, $coluna); $coluna++;?></a></td>
                                    <td align="center"> <a href='lista_inf1n.php?motivo=inclusao&turma=INF1'><?php tableCount($linha, $coluna); $coluna++;?></a></td>
                                    <td align="center"><a href='lista_inf1n.php?motivo=Servi&turma=INF1'> <?php tableCount($linha, $coluna); $coluna++;?></a></td>
                                    
                                    
                                 </tr>
                                 <tr>
                                    <td align="center"><i class="fa fa-star" aria-hidden="true"></i>  Infantil 2</td>
                                    <td align="center"><a href='lista_inf1n.php?motivo=Normal&turma=INF2'><?php tableCount($linha, $coluna); $coluna++;?></a></td>
                                    <td align="center"><a href='lista_inf1n.php?motivo=inclusao&turma=INF2'><?php tableCount($linha, $coluna); $coluna++;?></a></td>
                                    <td align="center"><a href='lista_inf1n.php?motivo=Servi&turma=INF2'><?php tableCount($linha, $coluna); $coluna++;?></a></td>
                                    
                                 </tr>
                                 <tr>
                                    <td align="center"><i class="fa fa-rocket" aria-hidden="true"></i>  Infantil 3</td>
                                    <td align="center"><a href='lista_inf1n.php?motivo=Normal&turma=INF3'><?php tableCount($linha, $coluna); $coluna++;?></a></td>
                                    <td align="center"><a href='lista_inf1n.php?motivo=inclusao&turma=INF3'><?php tableCount($linha, $coluna); $coluna++;?></a></td>
                                    <td align="center"><a href='lista_inf1n.php?motivo=Servi&turma=INF3'><?php tableCount($linha, $coluna); $coluna++;?></a></td>
                                   
                                 </tr>
                                 <tr>
                                    <td align="center"><i class="fa fa-futbol-o" aria-hidden="true"></i>  Infantil 4</td>
                                    <td align="center"><a href='lista_inf1n.php?motivo=Normal&turma=INF4'><?php tableCount($linha, $coluna); $coluna++;?></a></td>
                                    <td align="center"><a href='lista_inf1n.php?motivo=inclusao&turma=INF4'><?php tableCount($linha, $coluna); $coluna++;?></a></td>
                                    <td align="center"><a href='lista_inf1n.php?motivo=Servi&turma=INF4'><?php tableCount($linha, $coluna); $coluna++;?></a></td>
                                    
                                 </tr>
                              </tbody>
                           </table>
                           </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>
</body>
</html>