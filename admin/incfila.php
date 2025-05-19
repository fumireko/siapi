

<?php
   include "../validar_session.php";  
   include "../Config/config_sistema.php";
   if (!isset($_SESSION)){
    session_start();
   }
   $email_usuario = $_SESSION['email_usuario'];
   $nome_usuario = $_SESSION['nome_usuario'];
   $nivel_usuario = $_SESSION['nivel_usuario'];
   $Status = $_REQUEST['Status'];
   // faz consulta no banco de dados
   
   if ($Status == 'matriculado') {
	echo '
    <script>
        alert("Aluno matriculado");
        window.location.href = "incluirnafila.php";
    </script>
';
	exit;
}
   
   
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
         require_once "index.php"
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
                <h2 class="title pull-left">Incluir na fila</h2>
                </header>
               <div class="content-body">
                  <div class="row">
                     <div class="col-md-12 col-sm-12 col-xs-12">
                        <div  id="consulta">
                        <div class="form-group  col-md-6">
                                <a id="gerarExcel" href="fila_gerarExcel.php" class="btn btn-primary">Gerar Relatório</a>                           
                            </div>
                            <div class="row">
                            <div class="form-group  col-md-6">
                            <form class="form-horizontal" method="POST" id="busca_inc" action = "busca_inc.php">
                            <label class="col-md-4 control-label" for="dta_nasc">Data de nascimento</label>
                                <div class="col-md-4">
                                    <input id="dta_nasc" name="dta_nasc_busca" type="date" placeholder="Digite a data de nascimento" class="form-control input-md" required>
                                </div> 
                                <div class="col-md-4">
                                
                                <div align ="center"><input type="submit" value="Buscar" name="buscar"  class='btn btn-primary' /> </div>   
                                </div> 
                                </form>                        
                            </div>
                        </div>
                             <table class="table table-hover table-bordered display" id="example">
                             <thead>
                                   <p class="bg-success text-center">
                                   RESUMO DE ALUNOS FILA DE ESPERA CMEI <?PHP echo $tbcmei_nome;?> 
                                </p>
                     
                                </thead>
                           <?php
                              $linha = 0;
                              function tranCount($linha) {
                                                                   //select na tavela transferencia com tabela aluno
                                  echo "Desconsidere";
                                 }
                           ?>      
                           <?php
                              $linha = 0;
                              $coluna = 0;
                              function tableCount($linha, $coluna) {
                                 
                                  $id_cmei = $_SESSION['unidade_usuario']; 
                                  $motivo = array("Normal", "Inclusão", "Rede de Proteção", "Transferencia");
                                  $turma = array("INF1", "INF2", "INF3", "INF4");
                                  $result=mysql_query(" SELECT COUNT(tbaluno_turma) as total FROM tbaluno 
                                  INNER JOIN tbfila 
                                  ON tbaluno.tbaluno_id = tbfila.tbaluno_tbaluno_id 
                                  INNER JOIN tbcmei 
                                  on tbfila.tbcmei_tbcmcei_id = tbcmei.tbcmei_id 
                                  where tbfila_motivo like '%".$motivo[$coluna]."%' 
                                  and tbcmei.tbcmei_id like '%".$id_cmei."%' 
                                  and tbaluno.tbaluno_turma like '%".$turma[$linha]."%' 
                                  and tbfila_status ='fila' ") or die('Erro, query falhou');
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
                                    <th>Rede de Proteção</th>
                                    <th>Outros</th>
                                 </tr>
                              </thead>
                              <tbody>
                              <tr>
                                    <td align="center"><i class="fa fa-heart" aria-hidden="true"></i>  Infantil 1</td>
                                    <td align="center"> <a href='lista_inf1n.php?motivo=Normal&turma=INF1'><?php tableCount($linha, $coluna); $coluna++;?></a></td>
                                    <td align="center"><a href='lista_inf1n.php?motivo=inclusao&turma=INF1'> <?php tableCount($linha, $coluna); $coluna++;?></a></td>
                                    <td align="center"><a href='lista_inf1n.php?motivo=Rede&turma=INF1'><?php tableCount($linha, $coluna); $coluna++;?></a></td>
                                    <td align="center"><?php tranCount($linha); $coluna = 0; $linha++;?></td>
                                 </tr>
                                 <tr>
                                    <td align="center"><i class="fa fa-star" aria-hidden="true"></i>  Infantil 2</td>
                                    <td align="center"><a href='lista_inf1n.php?motivo=Normal&turma=INF2'><?php tableCount($linha, $coluna); $coluna++;?></a></td>
                                    <td align="center"><a href='lista_inf1n.php?motivo=inclusao&turma=INF2'><?php tableCount($linha, $coluna); $coluna++;?></a></td>
                                    <td align="center"><a href='lista_inf1n.php?motivo=Servi&turma=INF2'><?php tableCount($linha, $coluna); $coluna++;?></a></td>
                                    <td align="center"><?php tranCount($linha); $coluna = 0; $linha++;?></td>
                                 </tr>
                                 <tr>
                                    <td align="center"><i class="fa fa-rocket" aria-hidden="true"></i>  Infantil 3</td>
                                    <td align="center"><a href='lista_inf1n.php?motivo=Normal&turma=INF3'><?php tableCount($linha, $coluna); $coluna++;?></a></td>
                                    <td align="center"><a href='lista_inf1n.php?motivo=inclusao&turma=INF3'><?php tableCount($linha, $coluna); $coluna++;?></a></td>
                                    <td align="center"><a href='lista_inf1n.php?motivo=Servi&turma=INF3'><?php tableCount($linha, $coluna); $coluna++;?></a></td>
                                    <td align="center"><?php tranCount($linha); $coluna = 0; $linha++;?></td>
                                 </tr>
                                 <tr>
                                    <td align="center"><i class="fa fa-futbol-o" aria-hidden="true"></i>  Infantil 4</td>
                                    <td align="center"><a href='lista_inf1n.php?motivo=Normal&turma=INF4'><?php tableCount($linha, $coluna); $coluna++;?></a></td>
                                    <td align="center"><a href='lista_inf1n.php?motivo=inclusao&turma=INF4'><?php tableCount($linha, $coluna); $coluna++;?></a></td>
                                    <td align="center"><a href='lista_inf1n.php?motivo=Servi&turma=INF4'><?php tableCount($linha, $coluna); $coluna++;?></a></td>
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