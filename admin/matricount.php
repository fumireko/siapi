

<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";
   if (!isset($_SESSION)){
    session_start();
   }
   $email_usuario = $_SESSION['email_usuario'];
   $nome_usuario = $_SESSION['nome_usuario'];
   $nivel_usuario = $_SESSION['nivel_usuario'];
   // faz consulta no banco de dados
   $consulta = mysql_query("SELECT * FROM usuarios where email = '".$email_usuario."'");
   ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-BR" lang="pt-BR" ng-app="App">
   <head>
      <meta name="author" content="Admin" />
      <title>SEMED - Sistema de Gestao Escolar</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
      <!-- MAIN MENU - END -->
      <!--  SIDEBAR - END -->
      <!-- START CONTENT -->
      <section id="main-content" class=" ">
         <section class="wrapper main-wrapper">
            <div class='col-lg-12 col-md-12 col-sm-12 col-xs-12'>
               <div class="page-title">
                  <div class="pull-left">
                     <h1 class="title">Fila de alunos</h1>
                  </div>
               </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-12">
            <section class="box ">
                <header class="panel_header">
                <h2 class="title pull-left">Numero de alunos por turma na fila por turma</h2>
                </header>
               <div class="content-body">
                  <div class="row">
                     <div class="col-md-12 col-sm-12 col-xs-12">
                        <div  id="consulta">
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
                                  $motivo = array("Normal", "Inclusão", "Conselho tutelar", "Servico Social", "Transferencia");
                                  $turma = array("INF1", "INF2", "INF3", "INF4");
                                  $result=mysql_query(" SELECT COUNT(tbaluno_turma) as total FROM tbaluno 
                                  INNER JOIN tbfila 
                                  ON tbaluno.tbaluno_id = tbfila.tbaluno_tbaluno_id 
                                  INNER JOIN tbcmei 
                                  on tbfila.tbcmei_tbcmcei_id = tbcmei.tbcmei_id 
                                  where tbfila_motivo like '%".$motivo[$coluna]."%' 
                                  and tbcmei.tbcmei_id like '%".$id_cmei."%' 
                                  and tbaluno.tbaluno_turma like '%".$turma[$linha]."%' 
                                  and tbfila_status ='fila' ");
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
                                  $id_cmei = $_SESSION['unidade_usuario']; 
                                  $turma = array("INF1", "INF2", "INF3", "INF4");
                                  $result=mysql_query(" SELECT COUNT(tbcmei_tbcmcei_id) as total FROM tbtran 
                                  where tbcmei_tbcmcei_id like '%".$id_cmei."%'
                                  and transf_turma like '%".$turma[$linha]."%'   ") or die('Erro, query falhou');
                                  $data = mysql_fetch_assoc($result);
                                  echo $data['total'];
                              }
                           ?> 
                            <table class="table table-hover table-bordered display">
                              <thead>
                                 <tr>
                                    <th>Turma</th>
                                    <th>Normal</th>
                                    <th>Inclusão</th>
                                    <th>Conselho Tutelar</th>
                                    <th>Serviço social</th>
                                    <th>Transferencia</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td align="center"><i class="fa fa-heart" aria-hidden="true"></i>  Infantil 1</td>
                                    <td align="center"><?php tableCount($linha, $coluna); $coluna++;?></td>
                                    <td align="center"><?php tableCount($linha, $coluna); $coluna++;?></td>
                                    <td align="center"><?php tableCount($linha, $coluna); $coluna++;?></td>
                                    <td align="center"><?php tableCount($linha, $coluna); $coluna++;?></td>
                                    <td align="center"><?php tranCount($linha); $coluna = 0; $linha++;?></td>
                                 </tr>
                                 <tr>
                                    <td align="center"><i class="fa fa-star" aria-hidden="true"></i>  Infantil 2</td>
                                    <td align="center"><?php tableCount($linha, $coluna); $coluna++;?></td>
                                    <td align="center"><?php tableCount($linha, $coluna); $coluna++;?></td>
                                    <td align="center"><?php tableCount($linha, $coluna); $coluna++;?></td>
                                    <td align="center"><?php tableCount($linha, $coluna); $coluna++;?></td>
                                    <td align="center"><?php tranCount($linha); $coluna = 0; $linha++;?></td>
                                 </tr>
                                 <tr>
                                    <td align="center"><i class="fa fa-rocket" aria-hidden="true"></i>  Infantil 3</td>
                                    <td align="center"><?php tableCount($linha, $coluna); $coluna++;?></td>
                                    <td align="center"><?php tableCount($linha, $coluna); $coluna++;?></td>
                                    <td align="center"><?php tableCount($linha, $coluna); $coluna++;?></td>
                                    <td align="center"><?php tableCount($linha, $coluna); $coluna++;?></td>
                                    <td align="center"><?php tranCount($linha); $coluna = 0; $linha++;?></td>
                                 </tr>
                                 <tr>
                                    <td align="center"><i class="fa fa-futbol-o" aria-hidden="true"></i>  Infantil 4</td>
                                    <td align="center"><?php tableCount($linha, $coluna); $coluna++;?></td>
                                    <td align="center"><?php tableCount($linha, $coluna); $coluna++;?></td>
                                    <td align="center"><?php tableCount($linha, $coluna); $coluna++;?></td>
                                    <td align="center"><?php tableCount($linha, $coluna); $coluna++;?></td>
                                    <td align="center"><?php tranCount($linha); $coluna = 0; $linha++;?></td>
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
            </section>
            </div>
         </section>
      </section>
   </body>
</html>